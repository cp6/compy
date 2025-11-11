@props([
    'quantity' => 0,
    'highThreshold' => 50, // Threshold for "high" stock (green)
    'lowThreshold' => 0, // Threshold for "low" stock (yellow/amber)
])

@php
    $stockConfig = match(true) {
        $quantity > $highThreshold => [
            'classes' => 'bg-emerald-50 text-emerald-700 dark:bg-emerald-900/30 dark:text-emerald-400',
        ],
        $quantity > $lowThreshold => [
            'classes' => 'bg-amber-50 text-amber-700 dark:bg-amber-900/30 dark:text-amber-400',
        ],
        default => [
            'classes' => 'bg-red-50 text-red-700 dark:bg-red-900/30 dark:text-red-400',
        ],
    };
@endphp

<span {{ $attributes->merge(['class' => 'inline-flex items-center px-2.5 py-0.5 rounded-md text-xs font-medium ' . $stockConfig['classes']]) }}>
    {{ number_format($quantity) }}
</span>

