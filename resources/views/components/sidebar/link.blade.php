@props(['href' => '#', 'active' => false])

@php
$isActive = filter_var($active, FILTER_VALIDATE_BOOLEAN);
$classes = $isActive
    ? 'flex items-center px-3 py-2 text-sm font-medium rounded-md bg-blue-50 dark:bg-blue-900/20 text-blue-700 dark:text-blue-300'
    : 'flex items-center px-3 py-2 text-sm font-medium rounded-md text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-gray-900 dark:hover:text-white transition-colors duration-150';
@endphp

<a 
    href="{{ $href }}" 
    class="{{ $classes }}"
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
    {{ $attributes->except('class') }}
>
    @isset($icon)
        <div class="flex-shrink-0 mr-3">
            {{ $icon }}
        </div>
    @endisset
    
    <span class="flex-1">{{ $slot }}</span>
    
    @isset($badge)
        <div class="ml-2">
            {{ $badge }}
        </div>
    @endisset
</a>

