@props([
    'label' => null,
    'name' => null,
    'value' => null,
    'min' => null,
    'max' => null,
    'step' => null,
    'required' => false,
    'disabled' => false,
    'error' => null,
    'help' => null,
])

@php
    $hasError = $error || (isset($errors) && $errors->has($name));
    $errorMessages = $error ?? (isset($errors) ? $errors->get($name) : []);
    $initialValue = old($name, $value ?? ($min ?? 0));
@endphp

<div class="space-y-2">
    @if($label)
        <x-form.label :for="$name" :value="$label" />
    @endif

    <div class="relative" x-data="{ value: {{ $initialValue }} }">
        <input
            type="range"
            name="{{ $name }}"
            id="{{ $name }}"
            x-model="value"
            value="{{ $initialValue }}"
            @if($min !== null) min="{{ $min }}" @endif
            @if($max !== null) max="{{ $max }}" @endif
            @if($step !== null) step="{{ $step }}" @endif
            @if($required) required @endif
            @if($disabled) disabled @endif
            {{ $attributes->merge([
                'class' => 'w-full h-2 rounded-lg appearance-none cursor-pointer transition-all duration-200 ' .
                    ($hasError 
                        ? 'bg-red-200 dark:bg-red-900/30 accent-red-500' 
                        : 'bg-gray-200 dark:bg-gray-700 accent-emerald-600 dark:accent-emerald-500')
            ]) }}
        />
        <div class="mt-1 text-sm text-gray-600 dark:text-gray-400 text-center font-medium" x-text="value">
            {{ $initialValue }}
        </div>
    </div>

    @if($help && !$hasError)
        <p class="text-sm text-gray-500 dark:text-gray-400">{{ $help }}</p>
    @endif

    @if($hasError)
        <x-form.error :messages="$errorMessages" />
    @endif
</div>
