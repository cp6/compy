@props([
    'label' => null,
    'name' => null,
    'type' => 'text',
    'value' => null,
    'prefix' => null,
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

    <div class="relative flex items-center">
        @if($prefix)
            <div class="absolute left-0 pl-4 py-2.5 sm:py-3 flex items-center pointer-events-none border-r border-gray-300 dark:border-gray-600 pr-3 z-10 bg-gray-100 dark:bg-gray-700/50 rounded-l-lg">
                <span class="text-sm text-gray-600 dark:text-gray-300 font-medium whitespace-nowrap">
                    {{ $prefix }}
                </span>
            </div>
        @endif
        <input
            type="{{ $type }}"
            name="{{ $name }}"
            id="{{ $name }}"
            value="{{ old($name, $value) }}"
            @if($placeholder) placeholder="{{ $placeholder }}" @endif
            @if($required) required @endif
            @if($disabled) disabled @endif
            @if($readonly) readonly @endif
            {{ $attributes->merge([
                'class' => 'w-full rounded-lg border transition-all duration-200 ease-out focus:outline-none focus:ring-2 focus:ring-offset-0 disabled:opacity-50 disabled:cursor-not-allowed disabled:bg-gray-100 dark:disabled:bg-gray-800 ' . 
                    ($prefix ? 'pl-20 sm:pl-24 pr-4' : 'px-4') . ' py-2.5 sm:py-3 text-sm sm:text-base ' .
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

