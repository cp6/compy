@props([
    'current' => 0,
    'total' => 0,
    'label' => null,
    'showProgress' => true,
    'variant' => 'default', // 'default', 'success', 'warning', 'danger'
])

@php
    $percentage = $total > 0 ? min(100, ($current / $total) * 100) : 0;
    $isOverLimit = $current > $total;
    
    $variantClasses = match($variant) {
        'success' => 'text-green-600 dark:text-green-400',
        'warning' => 'text-yellow-600 dark:text-yellow-400',
        'danger' => 'text-red-600 dark:text-red-400',
        default => 'text-dodger-blue-600 dark:text-dodger-blue-400',
    };
    
    $progressVariantClasses = match($variant) {
        'success' => 'bg-green-500 dark:bg-green-400',
        'warning' => 'bg-yellow-500 dark:bg-yellow-400',
        'danger' => 'bg-red-500 dark:bg-red-400',
        default => 'bg-dodger-blue-500 dark:bg-dodger-blue-400',
    };
@endphp

<div class="flex items-center space-x-3">
    @if($label)
        <span class="text-sm font-medium text-gray-700 dark:text-gray-300">
            {{ $label }}
        </span>
    @endif
    
    <div class="flex items-center space-x-2">
        <span class="text-sm font-semibold {{ $isOverLimit ? 'text-red-600 dark:text-red-400' : 'text-gray-900 dark:text-gray-100' }}">
            {{ $current == (int)$current ? number_format($current) : number_format($current, 1) }}
        </span>
        <span class="text-sm text-gray-500 dark:text-gray-400">/</span>
        <span class="text-sm text-gray-600 dark:text-gray-400">
            {{ $total == (int)$total ? number_format($total) : number_format($total, 1) }}
        </span>
        <span class="text-sm text-gray-500 dark:text-gray-400">
            {{ $label ? '' : 'used' }}
        </span>
    </div>
    
    @if($showProgress && $total > 0)
        <div class="flex-1 max-w-xs">
            <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2 overflow-hidden">
                <div 
                    class="h-2 rounded-full transition-all duration-300 {{ $progressVariantClasses }}"
                    style="width: {{ min(100, $percentage) }}%"
                ></div>
            </div>
        </div>
    @endif
    
    @if($isOverLimit)
        <span class="px-2 py-0.5 text-xs font-medium bg-red-100 dark:bg-red-900/30 text-red-800 dark:text-red-200 rounded-full">
            Over Limit
        </span>
    @endif
</div>

