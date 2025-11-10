@props([
    'label' => null,
    'name' => null,
    'value' => null,
    'placeholder' => null,
    'required' => false,
    'disabled' => false,
    'readonly' => false,
    'error' => null,
    'help' => null,
])

@php
    $hasError = $error || (isset($errors) && $errors->has($name));
    $errorMessages = $error ?? (isset($errors) ? $errors->get($name) : []);
@endphp

<div class="space-y-2">
    @if($label)
        <x-form.label :for="$name" :value="$label" />
    @endif

    <div class="relative">
        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
            <svg class="w-5 h-5 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path>
            </svg>
        </div>
        <input
            type="url"
            name="{{ $name }}"
            id="{{ $name }}"
            value="{{ old($name, $value) }}"
            @if($placeholder) placeholder="{{ $placeholder }}" @endif
            @if($required) required @endif
            @if($disabled) disabled @endif
            @if($readonly) readonly @endif
            {{ $attributes->merge([
                'class' => 'w-full pl-12 pr-4 py-2.5 sm:py-3 rounded-lg border transition-all duration-200 ease-out focus:outline-none focus:ring-2 focus:ring-offset-0 text-sm sm:text-base disabled:opacity-50 disabled:cursor-not-allowed disabled:bg-gray-100 dark:disabled:bg-gray-800 ' . 
                    ($hasError 
                        ? 'border-red-500 dark:border-red-500 bg-red-50 dark:bg-red-900/20 text-gray-900 dark:text-gray-100 focus:ring-red-500 dark:focus:ring-red-400 focus:border-red-500 dark:focus:border-red-500' 
                        : 'border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500 focus:border-dodger-blue-500 dark:focus:border-dodger-blue-400 focus:ring-dodger-blue-500 dark:focus:ring-dodger-blue-400 shadow-sm focus:shadow-md')
            ]) }}
        />
    </div>

    @if($help && !$hasError)
        <p class="text-xs sm:text-sm text-gray-500 dark:text-gray-400 mt-1">{{ $help }}</p>
    @endif

    @if($hasError)
        <x-form.error :messages="$errorMessages" />
    @endif
</div>

