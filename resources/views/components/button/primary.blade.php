@props([
    'type' => 'submit',
    'variant' => 'default', // 'default', 'gradient', 'outline'
])

@php
    $baseClasses = 'inline-flex items-center justify-center px-4 py-2.5 sm:px-6 sm:py-3 rounded-lg sm:rounded-xl font-semibold text-xs sm:text-sm transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 disabled:opacity-50 disabled:cursor-not-allowed';
    
    $variantClasses = match($variant) {
        'gradient' => 'bg-gradient-to-r from-dodger-blue-600 to-dodger-blue-500 dark:from-dodger-blue-500 dark:to-dodger-blue-400 text-white hover:from-dodger-blue-700 hover:to-dodger-blue-600 dark:hover:from-dodger-blue-600 dark:hover:to-dodger-blue-500 focus:ring-dodger-blue-500 dark:focus:ring-dodger-blue-400 active:from-dodger-blue-800 active:to-dodger-blue-700 dark:active:from-dodger-blue-700 dark:active:to-dodger-blue-600 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 active:translate-y-0',
        'outline' => 'bg-transparent border-2 border-dodger-blue-600 dark:border-dodger-blue-500 text-dodger-blue-600 dark:text-dodger-blue-400 hover:bg-dodger-blue-50 dark:hover:bg-dodger-blue-900/20 focus:ring-dodger-blue-500 dark:focus:ring-dodger-blue-400 active:bg-dodger-blue-100 dark:active:bg-dodger-blue-900/30',
        default => 'bg-dodger-blue-600 dark:bg-dodger-blue-500 text-white hover:bg-dodger-blue-700 dark:hover:bg-dodger-blue-600 focus:ring-dodger-blue-500 dark:focus:ring-dodger-blue-400 active:bg-dodger-blue-800 dark:active:bg-dodger-blue-700 shadow-md hover:shadow-lg',
    };
@endphp

<button type="{{ $type }}" {{ $attributes->merge(['class' => $baseClasses . ' ' . $variantClasses]) }}>
    {{ $slot }}
</button>
