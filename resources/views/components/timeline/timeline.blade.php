@props([
    'orientation' => 'vertical', // 'vertical', 'horizontal'
    'variant' => 'default', // 'default', 'compact', 'detailed'
])

@php
    $orientationClasses = $orientation === 'horizontal' ? 'flex-row' : 'flex-col';
    $baseClasses = 'relative';
    $variantClasses = match($variant) {
        'compact' => 'space-y-3',
        'detailed' => 'space-y-8',
        default => 'space-y-6',
    };
@endphp

<div 
    class="timeline-container {{ $baseClasses }} {{ $orientationClasses }} {{ $variantClasses }} [&>.timeline-item:last-child_.timeline-line]:hidden"
    {{ $attributes }}
>
    {{ $slot }}
</div>

