@props([
    'href' => null,
    'icon' => null,
    'danger' => false,
])

@php
    $baseClasses = 'block px-4 py-2 text-sm transition-colors duration-150';
    
    $variantClasses = $danger 
        ? 'text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-900/20'
        : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700';
    
    $classes = $baseClasses . ' ' . $variantClasses;
@endphp

@if($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        @if($icon)
            <span class="w-4 h-4 inline-block mr-2 align-middle">
                {!! $icon !!}
            </span>
        @endif
        {{ $slot }}
    </a>
@else
    <button type="button" {{ $attributes->merge(['class' => $classes . ' w-full text-left']) }}>
        @if($icon)
            <span class="w-4 h-4 inline-block mr-2 align-middle">
                {!! $icon !!}
            </span>
        @endif
        {{ $slot }}
    </button>
@endif

