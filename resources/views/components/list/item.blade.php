@props([
    'href' => null,
    'active' => false,
    'hover' => true,
    'variant' => 'default', // 'default', 'bordered', 'padded'
])

@php
    $baseClasses = 'flex items-center transition-all duration-300 ease-out';
    
    $variantClasses = match($variant) {
        'bordered' => 'px-5 py-3.5 border border-gray-200/60 dark:border-gray-700/60 rounded-xl backdrop-blur-sm bg-white/40 dark:bg-gray-800/40 shadow-sm',
        'padded' => 'px-5 py-3.5',
        default => 'px-3 py-2.5',
    };
    
    $hoverClasses = $hover ? ' hover:bg-gradient-to-r hover:from-gray-50/80 hover:to-gray-100/50 dark:hover:from-gray-800/60 dark:hover:to-gray-700/40 hover:shadow-md hover:scale-[1.02] hover:-translate-y-0.5' : '';
    $activeClasses = $active ? ' bg-gradient-to-r from-dodger-blue-50 via-dodger-blue-100/50 to-dodger-blue-50 dark:from-dodger-blue-900/30 dark:via-dodger-blue-800/20 dark:to-dodger-blue-900/30 text-dodger-blue-700 dark:text-dodger-blue-300 border-l-4 border-dodger-blue-500 dark:border-dodger-blue-400 shadow-sm shadow-dodger-blue-200/50 dark:shadow-dodger-blue-900/30' : ' text-gray-700 dark:text-gray-300';
    
    $itemClasses = $baseClasses . ' ' . $variantClasses . $hoverClasses . $activeClasses;
    
    $tag = $href ? 'a' : 'li';
@endphp

<{{ $tag }} 
    @if($href) href="{{ $href }}" @endif
    {{ $attributes->merge(['class' => $itemClasses]) }}
>
    {{ $slot }}
</{{ $tag }}>

