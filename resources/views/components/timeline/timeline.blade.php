@props([
    'orientation' => 'vertical', // 'vertical', 'horizontal'
    'variant' => 'default', // 'default', 'compact', 'detailed'
])

@php
    $orientationClasses = $orientation === 'horizontal' ? 'flex-row' : 'flex-col';
    $baseClasses = 'relative';
    $variantClasses = match($variant) {
        'compact' => 'space-y-2',
        'detailed' => 'space-y-6',
        default => 'space-y-4',
    };
@endphp

<div 
    class="timeline-container {{ $baseClasses }} {{ $orientationClasses }} {{ $variantClasses }}"
    {{ $attributes }}
>
    {{ $slot }}
</div>

