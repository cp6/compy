@props([
    'label' => null,
    'name' => null,
    'value' => null,
    'checked' => false,
    'disabled' => false,
    'error' => null,
    'help' => null,
    'size' => 'default', // 'default', 'sm', 'lg'
])

@php
    $hasError = $error || (isset($errors) && $errors->has($name));
    $errorMessages = $error ?? (isset($errors) ? $errors->get($name) : []);
    $isChecked = old($name) !== null ? old($name) == $value : $checked;
    
    $sizeClasses = match($size) {
        'sm' => 'w-9 h-5',
        'lg' => 'w-14 h-7',
        default => 'w-11 h-6',
    };
    
    $thumbSizeClasses = match($size) {
        'sm' => 'w-3 h-3',
        'lg' => 'w-6 h-6',
        default => 'w-4 h-4',
    };
    
    $thumbPositionClasses = match($size) {
        'sm' => 'left-0.5 top-0.5',
        'lg' => 'left-1 top-0.5',
        default => 'left-1 top-1',
    };
    
    $thumbTranslateClasses = match($size) {
        'sm' => 'translate-x-4',
        'lg' => 'translate-x-7',
        default => 'translate-x-5',
    };
    
    $uniqueId = uniqid('toggle_');
@endphp

<div class="space-y-2" x-data="{ checked: {{ $isChecked ? 'true' : 'false' }} }">
    <label class="flex items-start cursor-pointer {{ $disabled ? 'cursor-not-allowed opacity-50' : '' }}">
        <div class="relative flex items-center">
            <input
                type="checkbox"
                name="{{ $name }}"
                id="{{ $uniqueId }}"
                value="{{ $value ?? '1' }}"
                @if($isChecked) checked @endif
                @if($disabled) disabled @endif
                x-model="checked"
                class="sr-only"
                {{ $attributes }}
            />
            <div 
                class="{{ $sizeClasses }} rounded-full transition-all duration-300 ease-in-out peer-focus:ring-2 peer-focus:ring-emerald-500 dark:peer-focus:ring-emerald-400 peer-focus:ring-offset-2 dark:peer-focus:ring-offset-gray-800 {{ $hasError ? 'ring-2 ring-red-500 dark:ring-red-500' : '' }} relative"
                :class="checked ? 'bg-emerald-600 dark:bg-emerald-500' : 'bg-gray-300 dark:bg-gray-600'"
            >
                <div 
                    class="absolute {{ $thumbPositionClasses }} {{ $thumbSizeClasses }} bg-white dark:bg-gray-200 rounded-full shadow-md transform transition-transform duration-300 ease-in-out"
                    :class="checked ? '{{ $thumbTranslateClasses }}' : 'translate-x-0'"
                ></div>
            </div>
        </div>
        @if($label)
            <span class="ml-3 text-sm font-medium text-gray-700 dark:text-gray-300">
                {{ $label }}
            </span>
        @endif
    </label>

    @if($help && !$hasError)
        <p class="text-sm text-gray-500 dark:text-gray-400 ml-14">{{ $help }}</p>
    @endif

    @if($hasError)
        <x-form.error :messages="$errorMessages" class="ml-14" />
    @endif
</div>
