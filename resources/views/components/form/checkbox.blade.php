@props([
    'label' => null,
    'name' => null,
    'value' => null,
    'checked' => false,
    'disabled' => false,
    'error' => null,
    'help' => null,
])

@php
    $hasError = $error || (isset($errors) && $errors->has($name));
    $errorMessages = $error ?? (isset($errors) ? $errors->get($name) : []);
    $isChecked = old($name) !== null ? old($name) == $value : $checked;
@endphp

<div class="space-y-2">
    <label class="flex items-start cursor-pointer {{ $disabled ? 'cursor-not-allowed opacity-50' : '' }}">
        <div class="relative flex items-center">
            <input
                type="checkbox"
                name="{{ $name }}"
                id="{{ $name }}"
                value="{{ $value ?? '1' }}"
                @if($isChecked) checked @endif
                @if($disabled) disabled @endif
                class="sr-only peer"
                {{ $attributes }}
            />
            <div class="w-5 h-5 rounded-md border-2 transition-all duration-200 ease-in-out peer-checked:bg-emerald-600 dark:peer-checked:bg-emerald-500 peer-checked:border-emerald-600 dark:peer-checked:border-emerald-500 bg-white dark:bg-gray-800 border-gray-300 dark:border-gray-600 peer-focus:ring-2 peer-focus:ring-emerald-500 dark:peer-focus:ring-emerald-400 peer-focus:ring-offset-2 dark:peer-focus:ring-offset-gray-800 {{ $hasError ? 'border-red-500 dark:border-red-500 ring-2 ring-red-500 dark:ring-red-500' : '' }}">
                <svg class="w-3.5 h-3.5 text-white opacity-0 peer-checked:opacity-100 absolute top-0.5 left-0.5 transition-opacity duration-200 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>
        </div>
        @if($label)
            <span class="ml-3 text-sm font-medium text-gray-700 dark:text-gray-300">
                {{ $label }}
            </span>
        @endif
    </label>

    @if($help && !$hasError)
        <p class="text-sm text-gray-500 dark:text-gray-400 ml-8">{{ $help }}</p>
    @endif

    @if($hasError)
        <x-form.error :messages="$errorMessages" class="ml-8" />
    @endif
</div>
