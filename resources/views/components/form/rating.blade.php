@props([
    'label' => null,
    'name' => null,
    'value' => null,
    'max' => 5,
    'required' => false,
    'disabled' => false,
    'error' => null,
    'help' => null,
    'size' => 'default', // 'sm', 'default', 'lg'
])

@php
    $hasError = $error || (isset($errors) && $errors->has($name));
    $errorMessages = $error ?? (isset($errors) ? $errors->get($name) : []);
    $currentRating = old($name, $value ?? 0);
    
    $sizeClasses = match($size) {
        'sm' => 'w-5 h-5',
        'lg' => 'w-8 h-8',
        default => 'w-6 h-6',
    };
    
    $uniqueId = uniqid('rating_');
@endphp

<div class="space-y-2" x-data="{
    rating: {{ $currentRating }},
    hoverRating: 0,
    
    setRating(value) {
        @if(!$disabled)
            this.rating = value;
            this.$dispatch('rating-changed', value);
        @endif
    },
    
    getStarClass(index) {
        const activeRating = this.hoverRating || this.rating;
        if (index <= activeRating) {
            return 'text-yellow-400 dark:text-yellow-500 fill-current';
        }
        return 'text-gray-300 dark:text-gray-600 fill-none';
    }
}">
    @if($label)
        <x-form.label :for="$uniqueId" :value="$label" />
    @endif

    <div class="flex items-center gap-1 {{ $disabled ? 'opacity-50 cursor-not-allowed' : '' }}">
        @for($i = 1; $i <= $max; $i++)
            <button
                type="button"
                @click="setRating({{ $i }})"
                @mouseenter="hoverRating = {{ $i }}"
                @mouseleave="hoverRating = 0"
                @if($disabled) disabled @endif
                class="transition-colors duration-150 focus:outline-none focus:ring-2 focus:ring-emerald-500 dark:focus:ring-emerald-400 focus:ring-offset-2 dark:focus:ring-offset-gray-800 rounded {{ $sizeClasses }}"
                :class="getStarClass({{ $i }})"
            >
                <svg class="w-full h-full" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                </svg>
            </button>
        @endfor
        <span class="ml-2 text-sm text-gray-600 dark:text-gray-400" x-show="rating > 0">
            (<span x-text="rating"></span> / {{ $max }})
        </span>
    </div>

    <!-- Hidden input for form submission -->
    <input type="hidden" name="{{ $name }}" id="{{ $uniqueId }}" x-model="rating" @if($required) required @endif />

    @if($help && !$hasError)
        <p class="text-sm text-gray-500 dark:text-gray-400">{{ $help }}</p>
    @endif

    @if($hasError)
        <x-form.error :messages="$errorMessages" />
    @endif
</div>

