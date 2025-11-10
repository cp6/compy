@props([
    'title' => null,
    'subtitle' => null,
    'hover' => false,
    'variant' => 'default', // 'default', 'gradient', 'glass', 'accent'
    'accent' => false, // Add accent border
])

@php
    $baseClasses = match($variant) {
        'gradient' => 'bg-gradient-to-br from-white via-gray-50/50 to-gray-100/50 dark:from-gray-800 dark:via-gray-800/90 dark:to-gray-900',
        'glass' => 'bg-white/90 dark:bg-gray-800/90 backdrop-blur-xl border border-white/30 dark:border-gray-700/40',
        'accent' => 'bg-white dark:bg-gray-800 border-l-4 border-dodger-blue-500',
        default => 'bg-white dark:bg-gray-800',
    };
    
    $shadowClasses = match($variant) {
        'gradient' => 'shadow-lg shadow-gray-200/40 dark:shadow-gray-900/60',
        'glass' => 'shadow-xl shadow-gray-200/30 dark:shadow-gray-900/40',
        'accent' => 'shadow-md shadow-gray-200/30 dark:shadow-gray-900/50',
        default => 'shadow-md shadow-gray-200/30 dark:shadow-gray-900/50',
    };
    
    $borderClasses = match($variant) {
        'accent' => 'border-t border-r border-b border-gray-200/60 dark:border-gray-700/60',
        default => 'border border-gray-200/60 dark:border-gray-700/60',
    };
    
    $hoverShadowClasses = $hover ? ' hover:shadow-xl hover:shadow-gray-300/50 dark:hover:shadow-gray-900/70 hover:-translate-y-0.5 transition-all duration-300 ease-out' : 'transition-all duration-300 ease-out';
    $cardClasses = $baseClasses . ' rounded-xl ' . $borderClasses . ' ' . $shadowClasses . ' ' . $hoverShadowClasses;
    
    // Header classes - improved gradient with better visual separation
    $headerClasses = match($variant) {
        'gradient' => 'bg-gradient-to-r from-gray-50/80 via-gray-50/40 to-transparent dark:from-gray-800/80 dark:via-gray-800/40 dark:to-transparent border-b border-gray-200/50 dark:border-gray-700/50',
        'glass' => 'bg-white/50 dark:bg-gray-800/50 border-b border-white/20 dark:border-gray-700/30',
        'accent' => 'bg-gradient-to-r from-dodger-blue-50/50 via-transparent to-transparent dark:from-dodger-blue-900/20 dark:via-transparent dark:to-transparent border-b border-gray-200/50 dark:border-gray-700/50',
        default => 'bg-gradient-to-r from-gray-50/60 via-transparent to-transparent dark:from-gray-800/60 dark:via-transparent dark:to-transparent border-b border-gray-200/50 dark:border-gray-700/50',
    };
@endphp

<div {{ $attributes->merge(['class' => $cardClasses]) }}>
    @if($title || $subtitle || isset($header))
        <div class="px-5 py-4 sm:px-6 sm:py-5 {{ $headerClasses }} overflow-hidden rounded-t-xl">
            @if(isset($header))
                {{ $header }}
            @else
                @if($title)
                    <h3 class="text-lg sm:text-xl font-bold text-gray-900 dark:text-gray-100 tracking-tight">
                        {{ $title }}
                    </h3>
                @endif
                @if($subtitle)
                    <p class="mt-1.5 text-xs sm:text-sm text-gray-600 dark:text-gray-400 leading-relaxed">
                        {{ $subtitle }}
                    </p>
                @endif
            @endif
        </div>
    @endif

    <div class="p-5 sm:p-6 text-gray-700 dark:text-gray-300 leading-relaxed text-sm sm:text-base">
        {{ $slot }}
    </div>
</div>

