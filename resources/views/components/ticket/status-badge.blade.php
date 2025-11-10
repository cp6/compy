@props([
    'status' => 'open', // 'open', 'pending', 'resolved', 'closed', 'urgent'
])

@php
    $statusConfig = match($status) {
        'open' => [
            'label' => 'Open',
            'classes' => 'bg-dodger-blue-100 text-dodger-blue-800 dark:bg-dodger-blue-900/30 dark:text-dodger-blue-300',
        ],
        'pending' => [
            'label' => 'Pending',
            'classes' => 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900/30 dark:text-yellow-300',
        ],
        'resolved' => [
            'label' => 'Resolved',
            'classes' => 'bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-300',
        ],
        'closed' => [
            'label' => 'Closed',
            'classes' => 'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300',
        ],
        'urgent' => [
            'label' => 'Urgent',
            'classes' => 'bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-300',
        ],
        default => [
            'label' => ucfirst($status),
            'classes' => 'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300',
        ],
    };
@endphp

<span {{ $attributes->merge(['class' => 'px-2.5 py-1 inline-flex text-xs font-semibold rounded-full ' . $statusConfig['classes']]) }}>
    {{ $statusConfig['label'] }}
</span>

