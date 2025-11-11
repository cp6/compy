@props([
    'status' => 'active', // 'active', 'inactive'
])

@php
    $statusConfig = match($status) {
        'active' => [
            'label' => 'Active',
            'classes' => 'bg-emerald-50 text-emerald-700 dark:bg-emerald-900/30 dark:text-emerald-400',
        ],
        'inactive' => [
            'label' => 'Inactive',
            'classes' => 'bg-gray-100 text-gray-700 dark:bg-gray-700 dark:text-gray-300',
        ],
        default => [
            'label' => ucfirst($status),
            'classes' => 'bg-gray-100 text-gray-700 dark:bg-gray-700 dark:text-gray-300',
        ],
    };
@endphp

<span {{ $attributes->merge(['class' => 'inline-flex items-center px-2.5 py-0.5 rounded-md text-xs font-medium ' . $statusConfig['classes']]) }}>
    {{ $statusConfig['label'] }}
</span>

