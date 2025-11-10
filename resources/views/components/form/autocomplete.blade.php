@props([
    'label' => null,
    'name' => null,
    'value' => null,
    'suggestions' => [],
    'placeholder' => 'Type to search...',
    'required' => false,
    'disabled' => false,
    'readonly' => false,
    'error' => null,
    'help' => null,
    'minLength' => 1,
])

@php
    $hasError = $error || (isset($errors) && $errors->has($name));
    $errorMessages = $error ?? (isset($errors) ? $errors->get($name) : []);
    $uniqueId = uniqid('autocomplete_');
    
    // Convert associative array to array of objects if needed
    $suggestionsArray = [];
    foreach ($suggestions as $key => $suggestion) {
        if (is_array($suggestion) && isset($suggestion['value']) && isset($suggestion['label'])) {
            // Already an object with value/label
            $suggestionsArray[] = $suggestion;
        } elseif (is_string($suggestion) || is_numeric($suggestion)) {
            // String or number - check if key is numeric (indexed array) or string (associative)
            if (is_numeric($key)) {
                // Indexed array - use value as both value and label
                $suggestionsArray[] = ['value' => $suggestion, 'label' => $suggestion];
            } else {
                // Associative array - key is value, value is label
                $suggestionsArray[] = ['value' => $key, 'label' => $suggestion];
            }
        }
    }
    $suggestionsJson = json_encode($suggestionsArray);
@endphp

<div class="space-y-2" x-data="{
    inputValue: '{{ old($name, $value) }}',
    suggestions: {{ $suggestionsJson }},
    showSuggestions: false,
    filteredSuggestions: [],
    selectedIndex: -1,
    isFocused: false,
    
    filterSuggestions() {
        if (this.inputValue.trim().length < {{ $minLength }}) {
            this.filteredSuggestions = [];
            this.showSuggestions = false;
            return;
        }
        
        const query = this.inputValue.toLowerCase();
        this.filteredSuggestions = this.suggestions.filter(suggestion => {
            const label = typeof suggestion === 'string' ? suggestion : suggestion.label;
            return label.toLowerCase().includes(query);
        });
        this.showSuggestions = this.isFocused && this.filteredSuggestions.length > 0;
        this.selectedIndex = -1;
    },
    
    selectSuggestion(suggestion) {
        const value = typeof suggestion === 'string' ? suggestion : suggestion.value;
        const label = typeof suggestion === 'string' ? suggestion : suggestion.label;
        this.inputValue = label;
        this.showSuggestions = false;
        this.isFocused = false;
        this.$dispatch('autocomplete-selected', { value: value, label: label });
    },
    
    handleKeydown(event) {
        if (event.key === 'Enter') {
            event.preventDefault();
            if (this.selectedIndex >= 0 && this.filteredSuggestions[this.selectedIndex]) {
                this.selectSuggestion(this.filteredSuggestions[this.selectedIndex]);
            }
        } else if (event.key === 'ArrowDown') {
            event.preventDefault();
            this.selectedIndex = Math.min(this.selectedIndex + 1, this.filteredSuggestions.length - 1);
        } else if (event.key === 'ArrowUp') {
            event.preventDefault();
            this.selectedIndex = Math.max(this.selectedIndex - 1, -1);
        } else if (event.key === 'Escape') {
            this.showSuggestions = false;
            this.isFocused = false;
        }
    },
    
    handleFocus() {
        this.isFocused = true;
        this.filterSuggestions();
    },
    
    handleBlur() {
        setTimeout(() => {
            this.isFocused = false;
            this.showSuggestions = false;
        }, 200);
    }
}">
    @if($label)
        <x-form.label :for="$uniqueId" :value="$label" />
    @endif

    <div class="relative">
        <input
            type="text"
            id="{{ $uniqueId }}"
            name="{{ $name }}"
            x-model="inputValue"
            @input="filterSuggestions()"
            @keydown="handleKeydown($event)"
            @focus="handleFocus()"
            @blur="handleBlur()"
            @if($placeholder) placeholder="{{ $placeholder }}" @endif
            @if($required) required @endif
            @if($disabled) disabled @endif
            @if($readonly) readonly @endif
            {{ $attributes->merge([
                'class' => 'w-full px-4 py-2.5 sm:py-3 rounded-lg border transition-all duration-200 ease-out focus:outline-none focus:ring-2 focus:ring-offset-0 text-sm sm:text-base disabled:opacity-50 disabled:cursor-not-allowed disabled:bg-gray-100 dark:disabled:bg-gray-800 ' . 
                    ($hasError 
                        ? 'border-red-500 dark:border-red-500 bg-red-50 dark:bg-red-900/20 text-gray-900 dark:text-gray-100 focus:ring-red-500 dark:focus:ring-red-400' 
                        : 'border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500 focus:border-dodger-blue-500 dark:focus:border-dodger-blue-400 focus:ring-dodger-blue-500 dark:focus:ring-dodger-blue-400 shadow-sm focus:shadow-md')
            ]) }}
        />

        <!-- Suggestions Dropdown -->
        <div 
            x-show="showSuggestions"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 transform scale-95"
            x-transition:enter-end="opacity-100 transform scale-100"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100 transform scale-100"
            x-transition:leave-end="opacity-0 transform scale-95"
            @click.away="showSuggestions = false; isFocused = false"
            class="absolute z-50 w-full mt-1 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg shadow-lg max-h-60 overflow-auto"
            style="display: none;"
        >
            <template x-for="(suggestion, index) in filteredSuggestions" :key="index">
                <button
                    type="button"
                    @click="selectSuggestion(suggestion)"
                    :class="index === selectedIndex ? 'bg-emerald-50 dark:bg-emerald-900/30 text-emerald-900 dark:text-emerald-100' : 'text-gray-900 dark:text-gray-100 hover:bg-gray-50 dark:hover:bg-gray-700'"
                    class="w-full text-left px-4 py-2 text-sm transition-colors duration-150"
                >
                    <span x-text="typeof suggestion === 'string' ? suggestion : suggestion.label"></span>
                </button>
            </template>
            <template x-if="filteredSuggestions.length === 0 && inputValue.trim().length >= {{ $minLength }}">
                <div class="px-4 py-2 text-sm text-gray-500 dark:text-gray-400">
                    No suggestions found
                </div>
            </template>
        </div>
    </div>

    @if($help && !$hasError)
        <p class="text-sm text-gray-500 dark:text-gray-400">{{ $help }}</p>
    @endif

    @if($hasError)
        <x-form.error :messages="$errorMessages" />
    @endif
</div>

