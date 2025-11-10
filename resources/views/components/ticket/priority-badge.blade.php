@props([
    'priority' => 'medium', // 'low', 'medium', 'high', 'urgent'
])

@php
    $priorityConfig = match($priority) {
        'low' => [
            'label' => 'Low',
            'classes' => 'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300',
        ],
        'medium' => [
            'label' => 'Medium',
            'classes' => 'bg-blue-100 text-blue-800 dark:bg-blue-900/30 dark:text-blue-300',
        ],
        'high' => [
            'label' => 'High',
            'classes' => 'bg-orange-100 text-orange-800 dark:bg-orange-900/30 dark:text-orange-300',
        ],
        'urgent' => [
            'label' => 'Urgent',
            'classes' => 'bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-300',
        ],
        default => [
            'label' => ucfirst($priority),
            'classes' => 'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300',
        ],
    };
@endphp

<span {{ $attributes->merge(['class' => 'px-2.5 py-1 inline-flex text-xs font-semibold rounded-full ' . $priorityConfig['classes']]) }}>
    {{ $priorityConfig['label'] }}
</span>

