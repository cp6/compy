@props([
    'type' => 'submit',
    'variant' => 'default', // 'default', 'outline', 'ghost'
])

@php
    $baseClasses = 'inline-flex items-center justify-center px-4 py-2.5 sm:px-6 sm:py-3 rounded-lg font-semibold text-xs sm:text-sm transition-all duration-200 ease-out focus:outline-none focus:ring-2 focus:ring-offset-2 disabled:opacity-50 disabled:cursor-not-allowed disabled:pointer-events-none';
    
    $variantClasses = match($variant) {
        'outline' => 'bg-transparent border-2 border-red-600 dark:border-red-500 text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-900/20 focus:ring-red-500 dark:focus:ring-red-400 active:bg-red-100 dark:active:bg-red-900/30 hover:-translate-y-0.5 active:translate-y-0',
        'ghost' => 'bg-transparent border border-transparent text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-900/20 focus:ring-red-500 dark:focus:ring-red-400 active:bg-red-100 dark:active:bg-red-900/30 hover:-translate-y-0.5 active:translate-y-0',
        default => 'bg-red-600 dark:bg-red-500 text-white hover:bg-red-700 dark:hover:bg-red-600 focus:ring-red-500 dark:focus:ring-red-400 active:bg-red-800 dark:active:bg-red-700 shadow-md hover:shadow-lg hover:-translate-y-0.5 active:translate-y-0',
    };
@endphp

<button type="{{ $type }}" {{ $attributes->merge(['class' => $baseClasses . ' ' . $variantClasses]) }}>
    {{ $slot }}
</button>
