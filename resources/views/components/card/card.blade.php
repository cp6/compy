@props([
    'title' => null,
    'subtitle' => null,
    'hover' => false,
    'variant' => 'default', // 'default', 'gradient', 'glass'
])

@php
    $baseClasses = match($variant) {
        'gradient' => 'bg-gradient-to-br from-white via-white to-gray-50 dark:from-gray-800 dark:via-gray-800 dark:to-gray-900',
        'glass' => 'bg-white/80 dark:bg-gray-800/80 backdrop-blur-xl border border-white/20 dark:border-gray-700/50',
        default => 'bg-white dark:bg-gray-800',
    };
    
    $shadowClasses = match($variant) {
        'gradient' => 'shadow-2xl shadow-gray-200/50 dark:shadow-gray-900/50',
        'glass' => 'shadow-xl shadow-gray-200/20 dark:shadow-gray-900/30',
        default => 'shadow-xl shadow-gray-200/50 dark:shadow-gray-900/30',
    };
    
    $hoverShadowClasses = $hover ? ' hover:shadow-2xl hover:shadow-gray-300/60 dark:hover:shadow-gray-900/50 hover:scale-[1.02]' : '';
    $cardClasses = $baseClasses . ' rounded-2xl border border-gray-200/60 dark:border-gray-700/60 transition-all duration-500 ease-out ' . $shadowClasses . $hoverShadowClasses;
    
    // Header classes - gradient in light mode, no background in dark mode to match card body
    $headerClasses = 'bg-gradient-to-r from-gray-50/50 via-transparent to-gray-50/50 dark:bg-none';
@endphp

<div {{ $attributes->merge(['class' => $cardClasses]) }}>
    @if($title || $subtitle || isset($header))
        <div class="px-4 py-3 sm:px-5 sm:py-4 md:px-6 md:py-5 {{ $headerClasses }} overflow-hidden rounded-t-2xl">
            @if(isset($header))
                {{ $header }}
            @else
                @if($title)
                    <h3 class="text-lg sm:text-xl font-bold bg-gradient-to-r from-gray-900 via-gray-800 to-gray-900 dark:from-gray-100 dark:via-gray-50 dark:to-gray-100 bg-clip-text text-transparent tracking-tight">
                        {{ $title }}
                    </h3>
                @endif
                @if($subtitle)
                    <p class="mt-1 text-xs sm:text-sm text-gray-600 dark:text-gray-400">
                        {{ $subtitle }}
                    </p>
                @endif
            @endif
        </div>
    @endif

    <div class="p-4 sm:p-5 md:p-6 text-gray-600 dark:text-gray-300 leading-relaxed text-sm sm:text-base">
        {{ $slot }}
    </div>
</div>

