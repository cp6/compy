@props([
    'label' => null,
    'name' => null,
    'value' => null,
    'required' => false,
    'disabled' => false,
    'error' => null,
    'help' => null,
])

@php
    $hasError = $error || (isset($errors) && $errors->has($name));
    $errorMessages = $error ?? (isset($errors) ? $errors->get($name) : []);
    $currentValue = old($name, $value ?? '#10b981');
    $uniqueId = uniqid('color_');
@endphp

<div class="space-y-2" x-data="{ colorValue: '{{ $currentValue }}' }">
    @if($label)
        <x-form.label :for="$uniqueId" :value="$label" />
    @endif

    <div class="relative">
        <div class="flex items-center gap-3">
            <!-- Color Preview Box -->
            <div class="relative flex-shrink-0">
                <label 
                    for="{{ $uniqueId }}"
                    class="block w-16 h-16 sm:w-20 sm:h-20 rounded-xl border-2 cursor-pointer transition-all duration-200 shadow-md hover:shadow-lg {{ $hasError ? 'border-red-500 dark:border-red-500 ring-2 ring-red-500 dark:ring-red-500' : 'border-gray-300 dark:border-gray-600 hover:border-emerald-500 dark:hover:border-emerald-400' }} {{ $disabled ? 'opacity-50 cursor-not-allowed' : '' }}"
                    :style="'background-color: ' + colorValue"
                >
                    <div class="absolute inset-0 rounded-xl flex items-center justify-center bg-white/10 dark:bg-black/10 opacity-0 hover:opacity-100 transition-opacity duration-200">
                        <svg class="w-6 h-6 text-white dark:text-gray-200 drop-shadow-lg" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                        </svg>
                    </div>
                </label>
            </div>

            <!-- Input and Hex Display -->
            <div class="flex-1">
                <div class="flex items-center gap-2">
                    <input
                        type="color"
                        name="{{ $name }}"
                        id="{{ $uniqueId }}"
                        x-model="colorValue"
                        value="{{ $currentValue }}"
                        @if($required) required @endif
                        @if($disabled) disabled @endif
                        class="sr-only"
                        {{ $attributes }}
                    />
                    
                    <!-- Hex Value Display -->
                    <div class="flex-1">
                        <div class="relative">
                            <input
                                type="text"
                                x-model="colorValue"
                                @input="colorValue = $event.target.value"
                                placeholder="#000000"
                                @if($disabled) disabled @endif
                                class="w-full px-3 py-2.5 sm:px-4 sm:py-3 rounded-lg sm:rounded-xl border transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-offset-0 text-sm sm:text-base font-mono uppercase {{ $hasError ? 'border-red-500 dark:border-red-500 bg-red-50 dark:bg-red-900/20 text-gray-900 dark:text-gray-100 focus:ring-red-500 dark:focus:ring-red-400' : 'border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500 focus:border-emerald-500 dark:focus:border-emerald-400 focus:ring-emerald-500 dark:focus:ring-emerald-400' }}"
                            />
                            <div class="absolute right-3 top-1/2 -translate-y-1/2 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if($help && !$hasError)
        <p class="text-sm text-gray-500 dark:text-gray-400">{{ $help }}</p>
    @endif

    @if($hasError)
        <x-form.error :messages="$errorMessages" />
    @endif
</div>

