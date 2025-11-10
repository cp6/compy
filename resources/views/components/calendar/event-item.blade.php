@props([
    'event' => [],
    'size' => 'default', // 'small', 'default', 'large'
    'variant' => 'default', // 'default', 'primary', 'success', 'warning', 'danger'
])

@php
    $title = $event['title'] ?? 'Untitled Event';
    $time = $event['time'] ?? $event['start'] ?? '';
    $color = $event['color'] ?? 'dodger-blue';
    $variant = $event['variant'] ?? $variant;
    
    $sizeClasses = match($size) {
        'small' => 'text-xs px-1.5 py-0.5',
        'large' => 'text-sm px-3 py-1.5',
        default => 'text-xs px-2 py-1',
    };
    
    $variantClasses = match($variant) {
        'primary' => 'bg-dodger-blue-100 dark:bg-dodger-blue-900/30 text-dodger-blue-800 dark:text-dodger-blue-200 border-dodger-blue-200 dark:border-dodger-blue-800',
        'success' => 'bg-green-100 dark:bg-green-900/30 text-green-800 dark:text-green-200 border-green-200 dark:border-green-800',
        'warning' => 'bg-yellow-100 dark:bg-yellow-900/30 text-yellow-800 dark:text-yellow-200 border-yellow-200 dark:border-yellow-800',
        'danger' => 'bg-red-100 dark:bg-red-900/30 text-red-800 dark:text-red-200 border-red-200 dark:border-red-800',
        default => 'bg-gray-100 dark:bg-gray-800 text-gray-800 dark:text-gray-200 border-gray-200 dark:border-gray-700',
    };
    
    $colorMap = [
        'dodger-blue' => 'bg-dodger-blue-100 dark:bg-dodger-blue-900/30 text-dodger-blue-800 dark:text-dodger-blue-200 border-dodger-blue-200 dark:border-dodger-blue-800',
        'green' => 'bg-green-100 dark:bg-green-900/30 text-green-800 dark:text-green-200 border-green-200 dark:border-green-800',
        'purple' => 'bg-purple-100 dark:bg-purple-900/30 text-purple-800 dark:text-purple-200 border-purple-200 dark:border-purple-800',
        'yellow' => 'bg-yellow-100 dark:bg-yellow-900/30 text-yellow-800 dark:text-yellow-200 border-yellow-200 dark:border-yellow-800',
        'red' => 'bg-red-100 dark:bg-red-900/30 text-red-800 dark:text-red-200 border-red-200 dark:border-red-800',
        'pink' => 'bg-pink-100 dark:bg-pink-900/30 text-pink-800 dark:text-pink-200 border-pink-200 dark:border-pink-800',
        'indigo' => 'bg-indigo-100 dark:bg-indigo-900/30 text-indigo-800 dark:text-indigo-200 border-indigo-200 dark:border-indigo-800',
    ];
    
    $finalClasses = isset($colorMap[$color]) ? $colorMap[$color] : $variantClasses;
@endphp

<div 
    class="calendar-event-item {{ $sizeClasses }} rounded border truncate cursor-pointer hover:opacity-80 transition-opacity {{ $finalClasses }}"
    title="{{ $title }}{{ $time ? ' - ' . $time : '' }}"
    {{ $attributes }}
>
    @if($time && $size !== 'small')
        <span class="font-medium">{{ $time }}</span>
    @endif
    <span class="font-medium">{{ $title }}</span>
</div>

