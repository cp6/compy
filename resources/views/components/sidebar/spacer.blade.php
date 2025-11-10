@props(['size' => 'md'])

@php
$classes = match($size) {
    'xs' => 'h-2',
    'sm' => 'h-4',
    'md' => 'h-6',
    'lg' => 'h-8',
    'xl' => 'h-12',
    default => 'h-6',
};
@endphp

<div {{ $attributes->merge(['class' => $classes]) }}></div>

