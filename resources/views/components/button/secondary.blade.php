@props([
    'type' => 'button',
    'variant' => 'default', // 'default', 'outline', 'ghost'
])

@php
    $baseClasses = 'inline-flex items-center justify-center px-4 py-2.5 sm:px-6 sm:py-3 rounded-lg font-semibold text-xs sm:text-sm transition-all duration-200 ease-out focus:outline-none focus:ring-2 focus:ring-offset-2 disabled:opacity-50 disabled:cursor-not-allowed disabled:pointer-events-none';
    
    $variantClasses = match($variant) {
        'outline' => 'bg-transparent border-2 border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-800 focus:ring-gray-500 dark:focus:ring-gray-400 active:bg-gray-100 dark:active:bg-gray-700 hover:-translate-y-0.5 active:translate-y-0',
        'ghost' => 'bg-transparent border border-transparent text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 focus:ring-gray-500 dark:focus:ring-gray-400 active:bg-gray-200 dark:active:bg-gray-700 hover:-translate-y-0.5 active:translate-y-0',
        default => 'bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700/80 focus:ring-gray-500 dark:focus:ring-gray-400 active:bg-gray-100 dark:active:bg-gray-600 shadow-sm hover:shadow-md hover:-translate-y-0.5 active:translate-y-0',
    };
@endphp

<button type="{{ $type }}" {{ $attributes->merge(['class' => $baseClasses . ' ' . $variantClasses]) }}>
    {{ $slot }}
</button>
