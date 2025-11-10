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
    
    $headerClasses = match($variant) {
        'gradient' => 'bg-gradient-to-br from-white via-white to-gray-50 dark:from-gray-800 dark:via-gray-800 dark:to-gray-900',
        'glass' => 'bg-white/80 dark:bg-gray-800/80 backdrop-blur-xl',
        default => 'bg-white dark:bg-gray-800',
    };
    
    $shadowClasses = match($variant) {
        'gradient' => 'shadow-2xl shadow-gray-200/50 dark:shadow-gray-900/50',
        'glass' => 'shadow-xl shadow-gray-200/20 dark:shadow-gray-900/30',
        default => 'shadow-xl shadow-gray-200/50 dark:shadow-gray-900/30',
    };
    
    $hoverShadowClasses = $hover ? ' hover:shadow-2xl hover:shadow-gray-300/60 dark:hover:shadow-gray-900/50 hover:scale-[1.02]' : '';
    $cardClasses = $baseClasses . ' rounded-2xl border border-gray-200/60 dark:border-gray-700/60 transition-all duration-500 ease-out ' . $shadowClasses . $hoverShadowClasses;
@endphp

<div {{ $attributes->merge(['class' => $cardClasses . ' relative']) }}>
    @if($title || $subtitle || isset($actions))
        <div class="px-4 py-4 sm:px-6 sm:py-5 md:px-8 md:py-6 {{ $headerClasses }} rounded-t-2xl relative z-10">
            <div class="flex items-center justify-between gap-4">
                <div class="flex-1 min-w-0">
                    @if($title)
                        <h3 class="text-xl sm:text-2xl font-bold bg-gradient-to-r from-gray-900 via-gray-800 to-gray-900 dark:from-gray-100 dark:via-gray-50 dark:to-gray-100 bg-clip-text text-transparent tracking-tight">
                            {{ $title }}
                        </h3>
                    @endif
                    @if($subtitle)
                        <p class="mt-1 sm:mt-2 text-xs sm:text-sm text-gray-600 dark:text-gray-400">
                            {{ $subtitle }}
                        </p>
                    @endif
                </div>
                @if(isset($actions))
                    <div class="flex-shrink-0 relative z-20">
                        {{ $actions }}
                    </div>
                @endif
            </div>
        </div>
    @endif

    <div class="p-4 sm:p-6 md:p-8 text-gray-600 dark:text-gray-300 leading-relaxed text-sm sm:text-base relative z-0">
        {{ $slot }}
    </div>
</div>

