@props([
    'label' => null,
    'name' => null,
    'options' => [],
    'value' => null,
    'placeholder' => 'Select options',
    'required' => false,
    'disabled' => false,
    'error' => null,
    'help' => null,
    'maxSelections' => null,
])

@php
    $hasError = $error || (isset($errors) && $errors->has($name));
    $errorMessages = $error ?? (isset($errors) ? $errors->get($name) : []);
    $selectedValues = old($name, $value ? (is_array($value) ? $value : explode(',', $value)) : []);
    $uniqueId = uniqid('multiselect_');
    // Convert associative array to array of objects for easier handling
    $optionsArray = [];
    foreach ($options as $optionValue => $optionLabel) {
        $optionsArray[] = ['value' => $optionValue, 'label' => $optionLabel];
    }
    $optionsJson = json_encode($optionsArray);
@endphp

<div class="space-y-2" x-data="{
    open: false,
    selectedValues: {{ json_encode($selectedValues) }},
    searchTerm: '',
    options: {{ $optionsJson }},
    
    get filteredOptions() {
        if (this.searchTerm === '') {
            return this.options;
        }
        const term = this.searchTerm.toLowerCase();
        return this.options.filter(option => 
            option.label.toLowerCase().includes(term)
        );
    },
    
    isSelected(value) {
        return this.selectedValues.includes(String(value));
    },
    
    toggleSelection(value) {
        const stringValue = String(value);
        const index = this.selectedValues.indexOf(stringValue);
        if (index > -1) {
            this.selectedValues.splice(index, 1);
        } else {
            @if($maxSelections)
                if (this.selectedValues.length >= {{ $maxSelections }}) {
                    return;
                }
            @endif
            this.selectedValues.push(stringValue);
        }
        this.$dispatch('multiselect-updated', this.selectedValues);
    },
    
    removeSelection(value) {
        const stringValue = String(value);
        const index = this.selectedValues.indexOf(stringValue);
        if (index > -1) {
            this.selectedValues.splice(index, 1);
            this.$dispatch('multiselect-updated', this.selectedValues);
        }
    },
    
    getSelectedLabels() {
        return this.selectedValues.map(val => {
            const option = this.options.find(opt => String(opt.value) === String(val));
            return option ? option.label : val;
        });
    }
}">
    @if($label)
        <x-form.label :for="$uniqueId" :value="$label" />
    @endif

    <div class="relative">
        <div 
            @click.away="open = false"
            class="relative"
        >
            <button
                type="button"
                @click="open = !open"
                @if($disabled) disabled @endif
                class="w-full px-4 py-2.5 sm:py-3 rounded-lg border transition-all duration-200 ease-out focus:outline-none focus:ring-2 focus:ring-offset-0 text-left flex items-center justify-between text-sm sm:text-base {{ $hasError ? 'border-red-500 dark:border-red-500 bg-red-50 dark:bg-red-900/20 text-gray-900 dark:text-gray-100 focus:ring-red-500 dark:focus:ring-red-400 focus:border-red-500 dark:focus:border-red-500' : 'border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:border-dodger-blue-500 dark:focus:border-dodger-blue-400 focus:ring-dodger-blue-500 dark:focus:ring-dodger-blue-400 shadow-sm focus:shadow-md' }} {{ $disabled ? 'opacity-50 cursor-not-allowed' : 'cursor-pointer' }}"
            >
                <div class="flex flex-wrap gap-2 flex-1 min-w-0">
                    <template x-if="selectedValues.length === 0">
                        <span class="text-gray-400 dark:text-gray-500" x-text="'{{ $placeholder }}'"></span>
                    </template>
                    <template x-for="(val, index) in selectedValues" :key="index">
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-emerald-100 dark:bg-emerald-900/30 text-emerald-800 dark:text-emerald-200 rounded-lg text-sm font-medium">
                            <span x-text="getSelectedLabels()[index]"></span>
                            @if(!$disabled)
                                <button 
                                    type="button"
                                    @click.stop="removeSelection(val)"
                                    class="hover:text-emerald-600 dark:hover:text-emerald-300 transition-colors"
                                >
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </button>
                            @endif
                        </span>
                    </template>
                </div>
                <svg class="w-5 h-5 text-gray-400 dark:text-gray-500 ml-2 flex-shrink-0 transition-transform duration-200" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>

            <!-- Dropdown -->
            <div 
                x-show="open"
                x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 transform scale-95"
                x-transition:enter-end="opacity-100 transform scale-100"
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100 transform scale-100"
                x-transition:leave-end="opacity-0 transform scale-95"
                class="absolute z-50 w-full mt-1 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg shadow-lg max-h-60 overflow-hidden"
                style="display: none;"
            >
                <!-- Search input -->
                <div class="p-2 border-b border-gray-200 dark:border-gray-700">
                    <input
                        type="text"
                        x-model="searchTerm"
                        placeholder="Search options..."
                        class="w-full px-3 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-dodger-blue-500 dark:focus:ring-dodger-blue-400 focus:border-dodger-blue-500 dark:focus:border-dodger-blue-400"
                    />
                </div>
                
                <!-- Options list -->
                <div class="overflow-auto max-h-48">
                    <template x-for="(option, index) in filteredOptions" :key="index">
                        <button
                            type="button"
                            @click="toggleSelection(option.value)"
                            :class="isSelected(option.value) ? 'bg-emerald-50 dark:bg-emerald-900/30 text-emerald-900 dark:text-emerald-100' : 'text-gray-900 dark:text-gray-100 hover:bg-gray-50 dark:hover:bg-gray-700'"
                            class="w-full text-left px-4 py-2 text-sm transition-colors duration-150 flex items-center justify-between"
                        >
                            <span x-text="option.label"></span>
                            <template x-if="isSelected(option.value)">
                                <svg class="w-5 h-5 text-emerald-600 dark:text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </template>
                        </button>
                    </template>
                    <template x-if="filteredOptions.length === 0">
                        <div class="px-4 py-2 text-sm text-gray-500 dark:text-gray-400">
                            No options found
                        </div>
                    </template>
                </div>
            </div>
        </div>

        <!-- Hidden inputs for form submission -->
        <template x-for="(val, index) in selectedValues" :key="index">
            <input type="hidden" name="{{ $name }}[]" :value="val" />
        </template>
    </div>

    @if($help && !$hasError)
        <p class="text-sm text-gray-500 dark:text-gray-400">{{ $help }}</p>
    @endif

    @if($hasError)
        <x-form.error :messages="$errorMessages" />
    @endif
</div>

