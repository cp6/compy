@props([
    'label' => null,
    'name' => null,
    'options' => [],
    'value' => null,
    'placeholder' => 'Select an option',
    'required' => false,
    'disabled' => false,
    'error' => null,
    'help' => null,
])

@php
    $hasError = $error || (isset($errors) && $errors->has($name));
    $errorMessages = $error ?? (isset($errors) ? $errors->get($name) : []);
    $selectedValue = old($name, $value);
@endphp

<div class="space-y-2">
    @if($label)
        <x-form.label :for="$name" :value="$label" />
    @endif

    <select
        name="{{ $name }}"
        id="{{ $name }}"
        @if($required) required @endif
        @if($disabled) disabled @endif
        {{ $attributes->merge([
            'class' => 'w-full px-4 py-2.5 sm:py-3 rounded-lg border transition-all duration-200 ease-out focus:outline-none focus:ring-2 focus:ring-offset-0 appearance-none text-sm sm:text-base disabled:opacity-50 disabled:cursor-not-allowed disabled:bg-gray-100 dark:disabled:bg-gray-800 ' . 
                ($hasError 
                    ? 'border-red-500 dark:border-red-500 bg-red-50 dark:bg-red-900/20 text-gray-900 dark:text-gray-100 focus:ring-red-500 dark:focus:ring-red-400 focus:border-red-500 dark:focus:border-red-500' 
                    : 'border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:border-dodger-blue-500 dark:focus:border-dodger-blue-400 focus:ring-dodger-blue-500 dark:focus:ring-dodger-blue-400 shadow-sm focus:shadow-md')
        ]) }}
    >
        @if($placeholder)
            <option value="" @if($selectedValue === null || $selectedValue === '') selected @endif disabled>{{ $placeholder }}</option>
        @endif
        
        @foreach($options as $optionValue => $optionLabel)
            <option value="{{ $optionValue }}" @if($selectedValue == $optionValue) selected @endif>
                {{ $optionLabel }}
            </option>
        @endforeach
    </select>

    @if($help && !$hasError)
        <p class="text-xs sm:text-sm text-gray-500 dark:text-gray-400 mt-1">{{ $help }}</p>
    @endif

    @if($hasError)
        <x-form.error :messages="$errorMessages" />
    @endif
</div>

<style>
    select {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
        background-position: right 0.75rem center;
        background-repeat: no-repeat;
        background-size: 1.5em 1.5em;
        padding-right: 2.5rem;
    }
    .dark select {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%9ca3af' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
    }
</style>

