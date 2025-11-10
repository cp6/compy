@props([
    'status' => 'todo', // 'todo', 'in_progress', 'review', 'done'
])

@php
    $statusConfig = match($status) {
        'todo' => [
            'label' => 'To Do',
            'classes' => 'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300',
        ],
        'in_progress' => [
            'label' => 'In Progress',
            'classes' => 'bg-dodger-blue-100 text-dodger-blue-800 dark:bg-dodger-blue-900/30 dark:text-dodger-blue-300',
        ],
        'review' => [
            'label' => 'In Review',
            'classes' => 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900/30 dark:text-yellow-300',
        ],
        'done' => [
            'label' => 'Done',
            'classes' => 'bg-emerald-100 text-emerald-800 dark:bg-emerald-900/30 dark:text-emerald-300',
        ],
        default => [
            'label' => ucfirst(str_replace('_', ' ', $status)),
            'classes' => 'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300',
        ],
    };
@endphp

<span {{ $attributes->merge(['class' => 'px-2.5 py-1 inline-flex text-xs font-semibold rounded-full ' . $statusConfig['classes']]) }}>
    {{ $statusConfig['label'] }}
</span>

