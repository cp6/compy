@props([
    'type' => 'button',
    'variant' => 'primary', // 'primary', 'primary2', 'primary3', 'primary4', 'primary5', 'secondary', 'danger', 'success', 'warning', 'info', 'ghost', 'outline'
    'size' => 'md', // 'xs', 'sm', 'md', 'lg', 'xl'
    'icon' => null, // Icon name or SVG
    'iconPosition' => 'left', // 'left', 'right'
    'loading' => false,
    'loadingText' => null,
    'fullWidth' => false,
    'long' => false, // Long and skinny variant
    'disabled' => false,
])

@php
    // Base classes
    $baseClasses = 'inline-flex items-center justify-center font-semibold transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 disabled:opacity-50 disabled:cursor-not-allowed';
    
    // Size classes
    $sizeClasses = match($size) {
        'xs' => $long ? 'px-3 py-1 text-xs' : 'px-2.5 py-1.5 text-xs',
        'sm' => $long ? 'px-4 py-2 text-sm' : 'px-3 py-2 text-sm',
        'lg' => $long ? 'px-8 py-3 text-base' : 'px-6 py-3 text-base',
        'xl' => $long ? 'px-10 py-4 text-lg' : 'px-8 py-4 text-lg',
        default => $long ? 'px-6 py-2.5 text-sm' : 'px-4 py-2.5 text-sm',
    };
    
    // Rounded corners
    $roundedClasses = $long ? 'rounded-md' : 'rounded-lg sm:rounded-xl';
    
    // Variant classes
    $variantClasses = match($variant) {
        'primary' => 'bg-dodger-blue-600 dark:bg-dodger-blue-500 text-white hover:bg-dodger-blue-700 dark:hover:bg-dodger-blue-600 focus:ring-dodger-blue-500 dark:focus:ring-dodger-blue-400 active:bg-dodger-blue-800 dark:active:bg-dodger-blue-700 shadow-md hover:shadow-lg',
        'primary2' => 'bg-dodger-blue-500 dark:bg-dodger-blue-400 text-white hover:bg-dodger-blue-600 dark:hover:bg-dodger-blue-500 focus:ring-dodger-blue-400 dark:focus:ring-dodger-blue-300 active:bg-dodger-blue-700 dark:active:bg-dodger-blue-600 shadow-md hover:shadow-lg',
        'primary3' => 'bg-dodger-blue-700 dark:bg-dodger-blue-600 text-white hover:bg-dodger-blue-800 dark:hover:bg-dodger-blue-700 focus:ring-dodger-blue-600 dark:focus:ring-dodger-blue-500 active:bg-dodger-blue-900 dark:active:bg-dodger-blue-800 shadow-md hover:shadow-lg',
        'primary4' => 'bg-dodger-blue-400 dark:bg-dodger-blue-300 text-white hover:bg-dodger-blue-500 dark:hover:bg-dodger-blue-400 focus:ring-dodger-blue-300 dark:focus:ring-dodger-blue-200 active:bg-dodger-blue-600 dark:active:bg-dodger-blue-500 shadow-md hover:shadow-lg',
        'primary5' => 'bg-dodger-blue-800 dark:bg-dodger-blue-700 text-white hover:bg-dodger-blue-900 dark:hover:bg-dodger-blue-800 focus:ring-dodger-blue-700 dark:focus:ring-dodger-blue-600 active:bg-dodger-blue-950 dark:active:bg-dodger-blue-900 shadow-md hover:shadow-lg',
        'secondary' => 'bg-indigo-600 dark:bg-indigo-500 text-white hover:bg-violet-600 dark:hover:bg-violet-500 focus:ring-violet-500 dark:focus:ring-violet-400 active:bg-indigo-700 dark:active:bg-indigo-600 shadow-md hover:shadow-lg',
        'danger' => 'bg-red-600 dark:bg-red-500 text-white hover:bg-red-700 dark:hover:bg-red-600 focus:ring-red-500 dark:focus:ring-red-400 active:bg-red-800 dark:active:bg-red-700 shadow-md hover:shadow-lg',
        'success' => 'bg-green-600 dark:bg-green-500 text-white hover:bg-green-700 dark:hover:bg-green-600 focus:ring-green-500 dark:focus:ring-green-400 active:bg-green-800 dark:active:bg-green-700 shadow-md hover:shadow-lg',
        'warning' => 'bg-yellow-600 dark:bg-yellow-500 text-white hover:bg-yellow-700 dark:hover:bg-yellow-600 focus:ring-yellow-500 dark:focus:ring-yellow-400 active:bg-yellow-800 dark:active:bg-yellow-700 shadow-md hover:shadow-lg',
        'info' => 'bg-cyan-600 dark:bg-cyan-500 text-white hover:bg-cyan-700 dark:hover:bg-cyan-600 focus:ring-cyan-500 dark:focus:ring-cyan-400 active:bg-cyan-800 dark:active:bg-cyan-700 shadow-md hover:shadow-lg',
        'ghost' => 'bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 focus:ring-gray-500 dark:focus:ring-gray-400 active:bg-gray-100 dark:active:bg-gray-600 shadow-sm hover:shadow-md',
        'outline' => 'bg-transparent border-2 border-dodger-blue-600 dark:border-dodger-blue-500 text-dodger-blue-600 dark:text-dodger-blue-400 hover:bg-dodger-blue-50 dark:hover:bg-dodger-blue-900/20 focus:ring-dodger-blue-500 dark:focus:ring-dodger-blue-400 active:bg-dodger-blue-100 dark:active:bg-dodger-blue-900/30',
        default => 'bg-dodger-blue-600 dark:bg-dodger-blue-500 text-white hover:bg-dodger-blue-700 dark:hover:bg-dodger-blue-600 focus:ring-dodger-blue-500 dark:focus:ring-dodger-blue-400 active:bg-dodger-blue-800 dark:active:bg-dodger-blue-700 shadow-md hover:shadow-lg',
    };
    
    // Full width
    $widthClasses = $fullWidth ? 'w-full' : '';
    
    // Icon spacing
    $iconSizeClasses = match($size) {
        'xs' => 'w-3 h-3',
        'sm' => 'w-4 h-4',
        'lg' => 'w-5 h-5',
        'xl' => 'w-6 h-6',
        default => 'w-4 h-4',
    };
    
    $iconSpacingClasses = match($size) {
        'xs' => 'space-x-1.5',
        'sm' => 'space-x-2',
        'lg' => 'space-x-2.5',
        'xl' => 'space-x-3',
        default => 'space-x-2',
    };
    
    $buttonClasses = trim($baseClasses . ' ' . $sizeClasses . ' ' . $roundedClasses . ' ' . $variantClasses . ' ' . $widthClasses);
    
    // Determine if button should be disabled
    $isDisabled = $disabled || $loading;
@endphp

<button 
    type="{{ $type }}" 
    {{ $attributes->merge(['class' => $buttonClasses]) }}
    @if($isDisabled) disabled @endif
>
    <span class="{{ ($icon || $loading) ? $iconSpacingClasses : '' }} flex items-center">
        @if($loading)
            <x-spinner size="{{ $size === 'xs' ? 'sm' : ($size === 'xl' ? 'lg' : 'md') }}" />
        @elseif($icon && $iconPosition === 'left')
            <span class="{{ $iconSizeClasses }} flex-shrink-0">
                {!! $icon !!}
            </span>
        @endif
        
        @if($loading && $loadingText)
            <span>{{ $loadingText }}</span>
        @else
            {{ $slot }}
        @endif
        
        @if($icon && $iconPosition === 'right' && !$loading)
            <span class="{{ $iconSizeClasses }} flex-shrink-0">
                {!! $icon !!}
            </span>
        @endif
    </span>
</button>

