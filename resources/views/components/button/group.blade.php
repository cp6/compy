@props([
    'variant' => 'default', // 'default', 'attached', 'segmented'
    'size' => 'md', // 'xs', 'sm', 'md', 'lg', 'xl'
    'fullWidth' => false,
])

@php
    $groupClasses = 'inline-flex';
    
    if ($fullWidth) {
        $groupClasses .= ' w-full';
    }
    
    $variantClasses = match($variant) {
        'attached' => 'space-x-0',
        'segmented' => 'space-x-1 p-1 bg-gray-100 dark:bg-gray-800 rounded-lg',
        default => 'space-x-2',
    };
    
    $groupClasses .= ' ' . $variantClasses;
@endphp

<div {{ $attributes->merge(['class' => $groupClasses]) }} role="group" aria-label="Button group">
    {{ $slot }}
</div>

