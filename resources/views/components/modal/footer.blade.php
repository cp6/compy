@props([
    'align' => 'right', // 'left', 'right', 'center', 'between'
])

@php
    $alignClasses = match($align) {
        'left' => 'justify-start',
        'center' => 'justify-center',
        'between' => 'justify-between',
        default => 'justify-end',
    };
@endphp

<div {{ $attributes->merge(['class' => 'px-4 sm:px-6 py-4 sm:py-5 border-t border-gray-200 dark:border-gray-700 flex items-center gap-3 ' . $alignClasses]) }}>
    {{ $slot }}
</div>

