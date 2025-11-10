@props(['href' => '#', 'active' => false])

@php
$isActive = filter_var($active, FILTER_VALIDATE_BOOLEAN);
$classes = $isActive
    ? 'flex items-center px-3 py-2.5 text-sm font-medium rounded-lg bg-dodger-blue-50 dark:bg-dodger-blue-900/20 text-dodger-blue-700 dark:text-dodger-blue-300 border-l-4 border-dodger-blue-600 dark:border-dodger-blue-400 shadow-sm'
    : 'flex items-center px-3 py-2.5 text-sm font-medium rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700/50 hover:text-gray-900 dark:hover:text-white transition-all duration-200 hover:translate-x-0.5';
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
        <div class="flex-shrink-0 mr-3 flex items-center justify-center w-5 h-5">
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

