@props([
    'variant' => 'default', // 'default', 'bordered', 'divided', 'spaced'
    'ordered' => false,
])

@php
    $baseClasses = 'space-y-0';
    
    $variantClasses = match($variant) {
        'bordered' => 'divide-y divide-gray-200/60 dark:divide-gray-700/60 border border-gray-200/80 dark:border-gray-700/80 rounded-xl overflow-hidden backdrop-blur-sm bg-white/50 dark:bg-gray-800/50 shadow-lg shadow-gray-200/50 dark:shadow-gray-900/50',
        'divided' => 'divide-y divide-gray-200/50 dark:divide-gray-700/50',
        'spaced' => 'space-y-3',
        default => 'space-y-1.5',
    };
    
    $listClasses = $baseClasses . ' ' . $variantClasses;
    $tag = $ordered ? 'ol' : 'ul';
@endphp

<{{ $tag }} {{ $attributes->merge(['class' => $listClasses]) }}>
    {{ $slot }}
</{{ $tag }}>

