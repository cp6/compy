@props(['label', 'active' => false, 'open' => false])

@php
$baseClasses = 'flex items-center px-3 py-2.5 text-sm font-medium rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700/50 hover:text-gray-900 dark:hover:text-white transition-all duration-200 w-full';
$activeClasses = ($active ?? false) ? 'bg-dodger-blue-50 dark:bg-dodger-blue-900/20 text-dodger-blue-700 dark:text-dodger-blue-300 border-l-4 border-dodger-blue-600 dark:border-dodger-blue-400 shadow-sm' : '';
@endphp

<div 
    x-data="{ 
        open: {{ $open ? 'true' : 'false' }},
        hasVisibleChildren() {
            if (!searchQuery) return true;
            const children = $el.querySelectorAll('[data-dropdown-item]');
            return Array.from(children).some(child => {
                const text = child.textContent.trim();
                return matchesSearch(text);
            });
        },
        init() {
            this.$watch('searchQuery', (value) => {
                if (value && this.hasVisibleChildren()) {
                    this.open = true;
                } else if (!value) {
                    this.open = {{ $open ? 'true' : 'false' }};
                }
            });
        }
    }"
    x-show="!searchQuery || matchesSearch('{{ $label }}') || hasVisibleChildren()"
    class="space-y-1"
    style="display: none;"
>
    <button 
        @click="open = !open" 
        {{ $attributes->merge(['class' => $baseClasses . ' ' . $activeClasses]) }}
    >
        @isset($icon)
            <div class="flex-shrink-0 mr-3 flex items-center justify-center w-5 h-5">
                {{ $icon }}
            </div>
        @endisset
        
        <span class="flex-1 text-left">{{ $label ?? $slot }}</span>
        
        @isset($badge)
            <div class="ml-2">
                {{ $badge }}
            </div>
        @endisset
        
        <svg 
            class="ml-2 h-4 w-4 transition-transform duration-200" 
            :class="{ 'rotate-180': open }"
            fill="none" 
            stroke="currentColor" 
            viewBox="0 0 24 24"
        >
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
    </button>
    
    <div 
        x-show="open || searchQuery"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-1"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-1"
        class="pl-6 ml-2 border-l-2 border-gray-200 dark:border-gray-700 space-y-1.5 mt-1.5"
        style="display: none;"
    >
        {{ $items ?? $slot }}
    </div>
</div>

