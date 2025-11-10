@props([
    'variant' => 'default', // 'default', 'bordered', 'flush'
    'title' => null,
])

@php
    $baseClasses = 'bg-white/80 dark:bg-gray-800/80 backdrop-blur-md rounded-xl overflow-hidden';
    
    $variantClasses = match($variant) {
        'bordered' => 'border border-gray-200/80 dark:border-gray-700/80 shadow-xl shadow-gray-200/50 dark:shadow-gray-900/50',
        'flush' => 'bg-transparent rounded-none backdrop-blur-none',
        default => 'shadow-lg shadow-gray-200/50 dark:shadow-gray-900/50',
    };
    
    $groupClasses = $baseClasses . ' ' . $variantClasses;
@endphp

<div {{ $attributes->merge(['class' => $groupClasses]) }}>
    @if($title)
        <div class="px-5 py-4 bg-gradient-to-r from-gray-50 via-gray-100/50 to-gray-50 dark:from-gray-900/70 dark:via-gray-800/50 dark:to-gray-900/70 border-b border-gray-200/60 dark:border-gray-700/60">
            <h3 class="text-sm font-bold text-gray-900 dark:text-gray-100 tracking-wide uppercase">
                {{ $title }}
            </h3>
        </div>
    @endif
    
    <div class="divide-y divide-gray-200/50 dark:divide-gray-700/50">
        {{ $slot }}
    </div>
</div>

