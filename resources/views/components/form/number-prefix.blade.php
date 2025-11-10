@props([
    'label' => null,
    'name' => null,
    'value' => null,
    'prefix' => null,
    'min' => null,
    'max' => null,
    'step' => null,
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
    // Calculate padding based on prefix length
    $prefixPadding = $prefix ? 'pl-[' . (strlen($prefix) * 0.5 + 3) . 'rem]' : '';
@endphp

<div class="space-y-2">
    @if($label)
        <x-form.label :for="$name" :value="$label" />
    @endif

    <div class="relative flex items-center">
        @if($prefix)
            <div class="absolute left-0 pl-4 py-3 flex items-center pointer-events-none border-r border-gray-300 dark:border-gray-600 pr-3 z-10 bg-gray-50 dark:bg-gray-900 rounded-l-xl">
                <span class="text-sm text-gray-500 dark:text-gray-400 font-medium whitespace-nowrap">
                    {{ $prefix }}
                </span>
            </div>
        @endif
        <input
            type="number"
            name="{{ $name }}"
            id="{{ $name }}"
            value="{{ old($name, $value) }}"
            @if($min !== null) min="{{ $min }}" @endif
            @if($max !== null) max="{{ $max }}" @endif
            @if($step !== null) step="{{ $step }}" @endif
            @if($placeholder) placeholder="{{ $placeholder }}" @endif
            @if($required) required @endif
            @if($disabled) disabled @endif
            @if($readonly) readonly @endif
            {{ $attributes->merge([
                'class' => 'w-full rounded-xl border transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-offset-0 ' . 
                    ($prefix ? 'pl-24 pr-4' : 'px-4') . ' py-3 ' .
                    ($hasError 
                        ? 'border-red-500 dark:border-red-500 bg-red-50 dark:bg-red-900/20 text-gray-900 dark:text-gray-100 focus:ring-red-500 dark:focus:ring-red-400' 
                        : 'border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500 focus:border-emerald-500 dark:focus:border-emerald-400 focus:ring-emerald-500 dark:focus:ring-emerald-400')
            ]) }}
        />
    </div>

    @if($help && !$hasError)
        <p class="text-sm text-gray-500 dark:text-gray-400">{{ $help }}</p>
    @endif

    @if($hasError)
        <x-form.error :messages="$errorMessages" />
    @endif
</div>

