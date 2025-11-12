@props([
    'method' => 'GET', // GET, POST, PATCH, PUT, DELETE, etc.
])

@php
    $methodColors = match(strtoupper($method)) {
        'GET' => 'bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400 border-green-300 dark:border-green-700',
        'POST' => 'bg-blue-100 text-blue-800 dark:bg-blue-900/30 dark:text-blue-400 border-blue-300 dark:border-blue-700',
        'PUT', 'PATCH' => 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900/30 dark:text-yellow-400 border-yellow-300 dark:border-yellow-700',
        'DELETE' => 'bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-400 border-red-300 dark:border-red-700',
        default => 'bg-gray-100 text-gray-800 dark:bg-gray-900/30 dark:text-gray-400 border-gray-300 dark:border-gray-700',
    };
@endphp

<span {{ $attributes->merge(['class' => "inline-flex items-center px-2.5 py-0.5 rounded-md text-xs font-semibold font-mono border {$methodColors}"]) }}>
    {{ strtoupper($method) }}
</span>

