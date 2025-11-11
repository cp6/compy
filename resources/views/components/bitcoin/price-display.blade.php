@props([
    'price' => 0,
    'change' => 0,
    'changePercent' => 0,
    'currency' => 'USD',
    'size' => 'default', // 'small', 'default', 'large'
])

@php
    $sizeClasses = match($size) {
        'small' => 'text-2xl',
        'large' => 'text-5xl',
        default => 'text-4xl',
    };
    
    $isPositive = $change >= 0;
    $changeColor = $isPositive ? 'text-green-600 dark:text-green-400' : 'text-red-600 dark:text-red-400';
@endphp

<div {{ $attributes->merge(['class' => 'flex flex-col gap-2']) }}>
    <div class="flex items-center gap-3">
        <div class="text-3xl">₿</div>
        <div>
            <div class="text-xs text-gray-500 dark:text-gray-400 uppercase tracking-wider">Bitcoin Price</div>
            <div class="{{ $sizeClasses }} font-bold text-gray-900 dark:text-gray-100">
                {{ number_format($price, 2) }} {{ $currency }}
            </div>
        </div>
    </div>
    
    <div class="flex items-center gap-2">
        <div class="flex items-center gap-1 {{ $changeColor }}">
            @if($isPositive)
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                </svg>
            @else
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                </svg>
            @endif
            <span class="text-sm font-semibold">
                {{ $isPositive ? '+' : '' }}{{ number_format($change, 2) }} ({{ $isPositive ? '+' : '' }}{{ number_format($changePercent, 2) }}%)
            </span>
        </div>
        <span class="text-xs text-gray-500 dark:text-gray-400">24h</span>
    </div>
</div>
