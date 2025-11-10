@props([
    'padding' => true,
])

@php
    $paddingClasses = $padding ? 'px-4 sm:px-6 py-4 sm:py-5' : '';
@endphp

<div {{ $attributes->merge(['class' => $paddingClasses . ' text-gray-600 dark:text-gray-400']) }}>
    {{ $slot }}
</div>

