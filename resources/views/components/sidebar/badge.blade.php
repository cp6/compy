@props(['variant' => 'new'])

@php
$classes = match($variant) {
    'new' => 'px-2 py-0.5 text-xs font-medium rounded-full bg-green-100 dark:bg-green-900/30 text-green-800 dark:text-green-300',
    'hot' => 'px-2 py-0.5 text-xs font-bold rounded-full bg-gradient-to-r from-orange-500 via-red-500 to-orange-600 dark:from-orange-600 dark:via-red-600 dark:to-orange-700 text-white shadow-lg shadow-orange-500/50 dark:shadow-orange-900/50 hot-badge-flame relative overflow-hidden',
    'default' => 'px-2 py-0.5 text-xs font-medium rounded-full bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-300',
    default => 'px-2 py-0.5 text-xs font-medium rounded-full bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-300',
};
@endphp

<span {{ $attributes->merge(['class' => $classes]) }}>
    @if($variant === 'hot')
        <span class="relative z-10">{{ $slot }}</span>
        <span class="absolute inset-0 bg-gradient-to-r from-transparent via-white/20 to-transparent animate-shimmer"></span>
    @else
        {{ $slot }}
    @endif
</span>

