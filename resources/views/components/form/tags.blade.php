@props([
    'label' => null,
    'name' => null,
    'value' => null,
    'suggestions' => [],
    'placeholder' => 'Type and press Enter',
    'maxTags' => null,
    'required' => false,
    'disabled' => false,
    'error' => null,
    'help' => null,
])

@php
    $hasError = $error || (isset($errors) && $errors->has($name));
    $errorMessages = $error ?? (isset($errors) ? $errors->get($name) : []);
    $initialTags = old($name, $value ? (is_array($value) ? $value : explode(',', $value)) : []);
    $suggestionsJson = json_encode($suggestions);
    $uniqueId = uniqid('tag_input_');
@endphp

<div class="space-y-2" x-data="{
    tags: {{ json_encode($initialTags) }},
    suggestions: {{ $suggestionsJson }},
    inputValue: '',
    showSuggestions: false,
    filteredSuggestions: [],
    selectedIndex: -1,
    isFocused: false,
    
    filterSuggestions() {
        if (this.inputValue.trim() === '') {
            this.filteredSuggestions = this.suggestions.filter(s => !this.tags.includes(s));
        } else {
            const query = this.inputValue.toLowerCase();
            this.filteredSuggestions = this.suggestions.filter(s => 
                s.toLowerCase().includes(query) && !this.tags.includes(s)
            );
        }
        this.showSuggestions = this.isFocused && this.filteredSuggestions.length > 0;
        this.selectedIndex = -1;
    },
    
    addTag(tag = null) {
        const tagToAdd = tag || this.inputValue.trim();
        if (tagToAdd && !this.tags.includes(tagToAdd)) {
            @if($maxTags)
                if (this.tags.length >= {{ $maxTags }}) {
                    return;
                }
            @endif
            this.tags.push(tagToAdd);
            this.inputValue = '';
            this.filterSuggestions();
            this.$dispatch('tags-updated', this.tags);
        }
    },
    
    removeTag(index) {
        this.tags.splice(index, 1);
        this.filterSuggestions();
        this.$dispatch('tags-updated', this.tags);
    },
    
    handleKeydown(event) {
        if (event.key === 'Enter') {
            event.preventDefault();
            if (this.selectedIndex >= 0 && this.filteredSuggestions[this.selectedIndex]) {
                this.addTag(this.filteredSuggestions[this.selectedIndex]);
            } else if (this.inputValue.trim()) {
                this.addTag();
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
        } else if (event.key === 'Backspace' && this.inputValue === '' && this.tags.length > 0) {
            this.removeTag(this.tags.length - 1);
        }
    },
    
    handleFocus() {
        this.isFocused = true;
        this.filterSuggestions();
    },
    
    handleBlur() {
        // Delay to allow click events on suggestions
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
        <div 
            class="min-h-[3rem] w-full px-3 py-2 rounded-lg border transition-all duration-200 ease-out focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-0 {{ $hasError ? 'border-red-500 dark:border-red-500 bg-red-50 dark:bg-red-900/20 focus-within:ring-red-500 dark:focus-within:ring-red-400 focus-within:border-red-500 dark:focus-within:border-red-500' : 'border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 focus-within:border-dodger-blue-500 dark:focus-within:border-dodger-blue-400 focus-within:ring-dodger-blue-500 dark:focus-within:ring-dodger-blue-400 shadow-sm focus-within:shadow-md' }} {{ $disabled ? 'opacity-50 cursor-not-allowed' : '' }}"
            @click.away="showSuggestions = false; isFocused = false"
        >
            <div class="flex flex-wrap gap-2 items-center">
                <template x-for="(tag, index) in tags" :key="index">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-emerald-100 dark:bg-emerald-900/30 text-emerald-800 dark:text-emerald-200 rounded-lg text-sm font-medium">
                        <span x-text="tag"></span>
                        @if(!$disabled)
                            <button 
                                type="button"
                                @click="removeTag(index)"
                                class="hover:text-emerald-600 dark:hover:text-emerald-300 transition-colors"
                            >
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        @endif
                    </span>
                </template>
                
                <input
                    type="text"
                    id="{{ $uniqueId }}"
                    x-model="inputValue"
                    @input="filterSuggestions()"
                    @keydown="handleKeydown($event)"
                    @focus="handleFocus()"
                    @blur="handleBlur()"
                    placeholder="{{ $placeholder }}"
                    @if($required) required @endif
                    @if($disabled) disabled @endif
                    class="flex-1 min-w-[120px] bg-transparent border-0 focus:outline-none text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500"
                />
            </div>
        </div>

        <!-- Hidden input for form submission -->
        <template x-for="(tag, index) in tags" :key="index">
            <input type="hidden" name="{{ $name }}[]" :value="tag" />
        </template>

        <!-- Suggestions Dropdown -->
        <div 
            x-show="showSuggestions"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 transform scale-95"
            x-transition:enter-end="opacity-100 transform scale-100"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100 transform scale-100"
            x-transition:leave-end="opacity-0 transform scale-95"
            class="absolute z-50 w-full mt-1 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg shadow-lg max-h-60 overflow-auto"
            style="display: none;"
        >
            <template x-for="(suggestion, index) in filteredSuggestions" :key="index">
                <button
                    type="button"
                    @click="addTag(suggestion)"
                    :class="index === selectedIndex ? 'bg-emerald-50 dark:bg-emerald-900/30 text-emerald-900 dark:text-emerald-100' : 'text-gray-900 dark:text-gray-100 hover:bg-gray-50 dark:hover:bg-gray-700'"
                    class="w-full text-left px-4 py-2 text-sm transition-colors duration-150"
                >
                    <span x-text="suggestion"></span>
                </button>
            </template>
            <template x-if="filteredSuggestions.length === 0 && inputValue.trim()">
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

