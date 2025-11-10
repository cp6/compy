@props([
    'label' => null,
    'name' => null,
    'options' => [],
    'value' => null,
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
        <x-form.label :value="$label" />
    @endif

    <div class="space-y-3">
        @foreach($options as $optionValue => $optionLabel)
            <div class="flex items-center">
                <input
                    type="radio"
                    name="{{ $name }}"
                    id="{{ $name }}_{{ $optionValue }}"
                    value="{{ $optionValue }}"
                    @if($selectedValue == $optionValue) checked @endif
                    {{ $attributes->merge([
                        'class' => 'w-4 h-4 border-gray-300 dark:border-gray-600 text-emerald-600 dark:text-emerald-500 focus:ring-2 focus:ring-emerald-500 dark:focus:ring-emerald-400 bg-white dark:bg-gray-800 transition-colors duration-200 ' .
                            ($hasError ? 'border-red-500 dark:border-red-500' : '')
                    ]) }}
                />
                <label for="{{ $name }}_{{ $optionValue }}" class="ml-3 text-sm font-medium text-gray-700 dark:text-gray-300 cursor-pointer">
                    {{ $optionLabel }}
                </label>
            </div>
        @endforeach
    </div>

    @if($help && !$hasError)
        <p class="text-sm text-gray-500 dark:text-gray-400">{{ $help }}</p>
    @endif

    @if($hasError)
        <x-form.error :messages="$errorMessages" />
    @endif
</div>

