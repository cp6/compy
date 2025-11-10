@props([
    'size' => 'md', // 'sm', 'md', 'lg', 'xl'
    'variant' => 'default', // 'default', 'gradient', 'pulse'
    'text' => null,
    'fullPage' => false,
    'overlay' => true,
])

@php
    $sizeClasses = match($size) {
        'sm' => 'h-4 w-4 border-2',
        'lg' => 'h-12 w-12 border-4',
        'xl' => 'h-16 w-16 border-4',
        default => 'h-8 w-8 border-2',
    };
    
    $variantClasses = match($variant) {
        'gradient' => 'border-t-dodger-blue-600 dark:border-t-dodger-blue-400 border-r-dodger-blue-500 dark:border-r-dodger-blue-500 border-b-dodger-blue-400 dark:border-b-dodger-blue-600 border-l-transparent',
        'pulse' => 'border-dodger-blue-600 dark:border-dodger-blue-400 bg-dodger-blue-600/20 dark:bg-dodger-blue-400/20',
        default => 'border-t-dodger-blue-600 dark:border-t-dodger-blue-400 border-r-transparent border-b-transparent border-l-transparent',
    };
    
    $textSizeClasses = match($size) {
        'sm' => 'text-xs',
        'lg' => 'text-base',
        'xl' => 'text-lg',
        default => 'text-sm',
    };
    
    $spinnerClasses = 'rounded-full animate-spin ' . $sizeClasses . ' ' . $variantClasses;
    
    $containerClasses = $fullPage 
        ? 'fixed inset-0 z-50 flex items-center justify-center ' . ($overlay ? 'bg-white/80 dark:bg-gray-900/80 backdrop-blur-sm' : '')
        : 'flex items-center justify-center';
@endphp

<div {{ $attributes->merge(['class' => $containerClasses]) }}>
    <div class="flex flex-col items-center justify-center gap-3">
        @if($variant === 'pulse')
            <div class="{{ $sizeClasses }} rounded-full {{ $variantClasses }} animate-pulse"></div>
        @else
            <div class="{{ $spinnerClasses }}"></div>
        @endif
        
        @if($text)
            <p class="{{ $textSizeClasses }} font-medium text-gray-700 dark:text-gray-300 animate-pulse">
                {{ $text }}
            </p>
        @endif
        
        {{ $slot }}
    </div>
</div>

