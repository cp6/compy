@props(['href' => '#', 'active' => false])

@php
$classes = ($active ?? false)
    ? 'block px-3 py-2 text-sm rounded-lg bg-dodger-blue-50 dark:bg-dodger-blue-900/20 text-dodger-blue-700 dark:text-dodger-blue-300 font-medium'
    : 'block px-3 py-2 text-sm rounded-lg text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700/50 hover:text-gray-900 dark:hover:text-white transition-all duration-200';
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

