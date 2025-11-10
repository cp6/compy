@props([
    'variant' => 'default', // 'default', 'dark'
])

@php
    $headerClasses = match($variant) {
        'dark' => 'bg-gray-800 dark:bg-gray-900',
        default => 'bg-gray-50 dark:bg-gray-800',
    };
@endphp

<thead {{ $attributes->merge(['class' => $headerClasses]) }}>
    {{ $slot }}
</thead>

