@props([
    'count' => 0,
    'max' => 99,
    'showZero' => false,
])

@php
    $displayCount = $count > $max ? $max . '+' : $count;
    $showBadge = $showZero || $count > 0;
@endphp

@if($showBadge)
    <span 
        {{ $attributes->merge(['class' => 'inline-flex items-center justify-center min-w-[1.25rem] h-5 px-1.5 text-xs font-semibold text-white bg-red-500 dark:bg-red-600 rounded-full']) }}
        title="{{ $count }} {{ Str::plural('notification', $count) }}"
    >
        {{ $displayCount }}
    </span>
@endif

