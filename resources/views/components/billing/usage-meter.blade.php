@props([
    'label' => 'Usage',
    'used' => 0,
    'limit' => 100,
    'unit' => 'GB',
    'showPercentage' => true,
])

@php
    $percentage = $limit > 0 ? min(100, ($used / $limit) * 100) : 0;
    $colorClass = match(true) {
        $percentage >= 90 => 'bg-red-500',
        $percentage >= 75 => 'bg-yellow-500',
        default => 'bg-dodger-blue-500',
    };
@endphp

<div class="bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 p-4 sm:p-5">
    <div class="flex items-center justify-between mb-3">
        <h4 class="text-sm font-semibold text-gray-900 dark:text-gray-100">
            {{ $label }}
        </h4>
        @if($showPercentage)
            <span class="text-sm font-medium text-gray-600 dark:text-gray-400">
                {{ number_format($percentage, 1) }}%
            </span>
        @endif
    </div>
    
    <div class="mb-2">
        <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2.5 overflow-hidden">
            <div 
                class="h-full {{ $colorClass }} rounded-full transition-all duration-500 ease-out"
                style="width: {{ $percentage }}%"
            ></div>
        </div>
    </div>
    
    <div class="flex items-center justify-between text-xs text-gray-600 dark:text-gray-400">
        <span>{{ number_format($used, 2) }} {{ $unit }} used</span>
        <span>{{ number_format($limit, 2) }} {{ $unit }} limit</span>
    </div>
</div>

