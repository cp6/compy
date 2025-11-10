@props(['href' => '#', 'active' => false])

@php
$classes = ($active ?? false)
    ? 'block px-3 py-2 text-sm rounded-md bg-blue-50 dark:bg-blue-900/20 text-blue-700 dark:text-blue-300'
    : 'block px-3 py-2 text-sm rounded-md text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-gray-900 dark:hover:text-white transition-colors duration-150';
@endphp

<a 
    href="{{ $href }}" 
    data-dropdown-item
    {{ $attributes->merge(['class' => $classes]) }}
    x-show="!searchQuery || matchesSearch($el.textContent.trim())"
    @click="
        if (window.innerWidth < 1024) {
            const sidebar = $el.closest('[x-ref=\'sidebar\']');
            if (sidebar && sidebar.__x) {
                const data = sidebar.__x.$data;
                if (data && data.closeSidebar) {
                    data.closeSidebar();
                }
            }
        }
    "
    style="display: none;"
>
    {{ $slot }}
</a>

