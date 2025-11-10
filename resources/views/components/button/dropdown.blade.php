@props([
    'variant' => 'primary',
    'size' => 'md',
    'icon' => null,
    'iconPosition' => 'left',
    'label' => null,
    'align' => 'right',
    'width' => '48',
])

@php
    $alignmentClasses = match ($align) {
        'left' => 'ltr:origin-top-left rtl:origin-top-right start-0',
        'top' => 'origin-top',
        default => 'ltr:origin-top-right rtl:origin-top-left end-0',
    };

    $width = match ($width) {
        '48' => 'w-48',
        '56' => 'w-56',
        '64' => 'w-64',
        default => $width,
    };
    
    // Chevron down icon
    $chevronIcon = '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
    </svg>';
@endphp

<div class="relative" x-data="{ open: false }" @click.outside="open = false" @close.stop="open = false">
    @php
        // Build button classes based on variant
        $buttonBaseClasses = 'inline-flex items-center justify-center px-4 py-2.5 sm:px-6 sm:py-3 rounded-lg sm:rounded-xl font-semibold text-xs sm:text-sm transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 disabled:opacity-50 disabled:cursor-not-allowed space-x-2';
        
        $buttonVariantClasses = match($variant) {
            'primary' => 'bg-dodger-blue-600 dark:bg-dodger-blue-500 text-white hover:bg-dodger-blue-700 dark:hover:bg-dodger-blue-600 focus:ring-dodger-blue-500 dark:focus:ring-dodger-blue-400 active:bg-dodger-blue-800 dark:active:bg-dodger-blue-700 shadow-md hover:shadow-lg',
            'primary2' => 'bg-dodger-blue-500 dark:bg-dodger-blue-400 text-white hover:bg-dodger-blue-600 dark:hover:bg-dodger-blue-500 focus:ring-dodger-blue-400 dark:focus:ring-dodger-blue-300 active:bg-dodger-blue-700 dark:active:bg-dodger-blue-600 shadow-md hover:shadow-lg',
            'primary3' => 'bg-dodger-blue-700 dark:bg-dodger-blue-600 text-white hover:bg-dodger-blue-800 dark:hover:bg-dodger-blue-700 focus:ring-dodger-blue-600 dark:focus:ring-dodger-blue-500 active:bg-dodger-blue-900 dark:active:bg-dodger-blue-800 shadow-md hover:shadow-lg',
            'primary4' => 'bg-dodger-blue-400 dark:bg-dodger-blue-300 text-white hover:bg-dodger-blue-500 dark:hover:bg-dodger-blue-400 focus:ring-dodger-blue-300 dark:focus:ring-dodger-blue-200 active:bg-dodger-blue-600 dark:active:bg-dodger-blue-500 shadow-md hover:shadow-lg',
            'primary5' => 'bg-dodger-blue-800 dark:bg-dodger-blue-700 text-white hover:bg-dodger-blue-900 dark:hover:bg-dodger-blue-800 focus:ring-dodger-blue-700 dark:focus:ring-dodger-blue-600 active:bg-dodger-blue-950 dark:active:bg-dodger-blue-900 shadow-md hover:shadow-lg',
            'secondary' => 'bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 focus:ring-gray-500 dark:focus:ring-gray-400 active:bg-gray-100 dark:active:bg-gray-600 shadow-sm hover:shadow-md',
            'danger' => 'bg-red-600 dark:bg-red-500 text-white hover:bg-red-700 dark:hover:bg-red-600 focus:ring-red-500 dark:focus:ring-red-400 active:bg-red-800 dark:active:bg-red-700 shadow-md hover:shadow-lg',
            'success' => 'bg-green-600 dark:bg-green-500 text-white hover:bg-green-700 dark:hover:bg-green-600 focus:ring-green-500 dark:focus:ring-green-400 active:bg-green-800 dark:active:bg-green-700 shadow-md hover:shadow-lg',
            'warning' => 'bg-yellow-600 dark:bg-yellow-500 text-white hover:bg-yellow-700 dark:hover:bg-yellow-600 focus:ring-yellow-500 dark:focus:ring-yellow-400 active:bg-yellow-800 dark:active:bg-yellow-700 shadow-md hover:shadow-lg',
            'info' => 'bg-cyan-600 dark:bg-cyan-500 text-white hover:bg-cyan-700 dark:hover:bg-cyan-600 focus:ring-cyan-500 dark:focus:ring-cyan-400 active:bg-cyan-800 dark:active:bg-cyan-700 shadow-md hover:shadow-lg',
            'ghost' => 'bg-transparent border border-transparent text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 focus:ring-gray-500 dark:focus:ring-gray-400 active:bg-gray-200 dark:active:bg-gray-700',
            'outline' => 'bg-transparent border-2 border-dodger-blue-600 dark:border-dodger-blue-500 text-dodger-blue-600 dark:text-dodger-blue-400 hover:bg-dodger-blue-50 dark:hover:bg-dodger-blue-900/20 focus:ring-dodger-blue-500 dark:focus:ring-dodger-blue-400 active:bg-dodger-blue-100 dark:active:bg-dodger-blue-900/30',
            default => 'bg-dodger-blue-600 dark:bg-dodger-blue-500 text-white hover:bg-dodger-blue-700 dark:hover:bg-dodger-blue-600 focus:ring-dodger-blue-500 dark:focus:ring-dodger-blue-400 active:bg-dodger-blue-800 dark:active:bg-dodger-blue-700 shadow-md hover:shadow-lg',
        };
        
        $buttonClasses = $buttonBaseClasses . ' ' . $buttonVariantClasses;
    @endphp
    
    <button 
        type="button"
        @click="open = ! open"
        class="{{ $buttonClasses }}"
        {{ $attributes->only(['class']) }}
    >
        @if($icon && $iconPosition === 'left')
            <span class="w-4 h-4 flex-shrink-0">
                {!! $icon !!}
            </span>
        @endif
        <span>{{ $label ?? $slot }}</span>
        <span class="w-4 h-4 flex-shrink-0">
            {!! $chevronIcon !!}
        </span>
    </button>

    <div 
        x-show="open"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        class="absolute z-[9999] mt-2 {{ $width }} rounded-md shadow-lg {{ $alignmentClasses }}"
        style="display: none;"
        @click="open = false"
    >
        <div class="rounded-md ring-1 ring-black ring-opacity-5 bg-white dark:bg-gray-800 py-1">
            {{ $content }}
        </div>
    </div>
</div>

