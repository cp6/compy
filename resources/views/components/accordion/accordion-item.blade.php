@props([
    'id' => null,
    'title' => '',
    'icon' => null,
    'badge' => null,
    'defaultOpen' => false,
])

@php
    if (!$id) {
        $id = 'accordion-' . uniqid();
    }
@endphp

<div 
    x-data="{ 
        itemId: '{{ $id }}',
        isOpen: @js($defaultOpen),
        init() {
            // Watch parent accordion state if it exists
            if (this.$parent && this.$parent.toggleItem) {
                // Check if item should be open initially
                if (this.$parent.openItems && this.$parent.openItems.includes(this.itemId)) {
                    this.isOpen = true;
                }
                // Watch for changes
                this.$watch('this.$parent.openItems', (items) => {
                    this.isOpen = items.includes(this.itemId);
                });
            }
        },
        toggle() {
            if (this.$parent && this.$parent.toggleItem) {
                this.$parent.toggleItem(this.itemId);
            } else {
                this.isOpen = !this.isOpen;
            }
        }
    }"
    class="border border-gray-200 dark:border-gray-700 rounded-lg overflow-hidden bg-white dark:bg-gray-800"
>
    <button
        type="button"
        @click="toggle()"
        class="w-full px-4 py-3 flex items-center justify-between text-left hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors duration-200"
    >
        <div class="flex items-center gap-3">
            @if($icon)
                <span class="flex-shrink-0 text-gray-600 dark:text-gray-400">
                    {!! $icon !!}
                </span>
            @endif
            <span class="font-medium text-gray-900 dark:text-gray-100">{{ $title }}</span>
            @if($badge)
                <span class="px-2 py-0.5 text-xs font-medium rounded-full bg-dodger-blue-100 dark:bg-dodger-blue-900/30 text-dodger-blue-800 dark:text-dodger-blue-300">
                    {{ $badge }}
                </span>
            @endif
        </div>
        <svg 
            class="w-5 h-5 text-gray-500 dark:text-gray-400 transition-transform duration-200 flex-shrink-0"
            :class="{ 'rotate-180': isOpen }"
            fill="none" 
            stroke="currentColor" 
            viewBox="0 0 24 24"
        >
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
    </button>
    
    <div 
        x-show="isOpen"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 max-h-0"
        x-transition:enter-end="opacity-100 max-h-screen"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 max-h-screen"
        x-transition:leave-end="opacity-0 max-h-0"
        class="px-4 pb-4 text-gray-600 dark:text-gray-400 overflow-hidden"
    >
        {{ $slot }}
    </div>
</div>

