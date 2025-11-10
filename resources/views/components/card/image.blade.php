@props([
    'src' => null,
    'alt' => '',
    'title' => null,
    'subtitle' => null,
    'description' => null,
    'variant' => 'default', // 'default', 'gradient', 'glass'
    'hover' => false,
    'imagePosition' => 'top', // 'top', 'bottom', 'left', 'right'
    'overlay' => false, // For overlay text on image
    'action' => null, // Action button/link
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
    $cardClasses = $baseClasses . ' overflow-hidden rounded-2xl border border-gray-200/60 dark:border-gray-700/60 transition-all duration-500 ease-out ' . $shadowClasses . $hoverShadowClasses;
    
    $isHorizontal = in_array($imagePosition, ['left', 'right']);
@endphp

<div {{ $attributes->merge(['class' => $cardClasses]) }}>
    @if($isHorizontal)
        <div class="flex flex-col sm:flex-row">
            @if($imagePosition === 'left')
                <!-- Image on Left -->
                <div class="w-full sm:w-1/3 flex-shrink-0">
                    @if($overlay && ($title || $subtitle))
                        <div class="relative h-48 sm:h-full">
                            @if($src)
                                <img src="{{ $src }}" alt="{{ $alt }}" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-dodger-blue-400 to-purple-500"></div>
                            @endif
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent flex items-end p-4">
                                <div>
                                    @if($title)
                                        <h3 class="text-white font-bold text-lg">{{ $title }}</h3>
                                    @endif
                                    @if($subtitle)
                                        <p class="text-white/90 text-sm mt-1">{{ $subtitle }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="h-48 sm:h-full">
                            @if($src)
                                <img src="{{ $src }}" alt="{{ $alt }}" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-dodger-blue-400 to-purple-500"></div>
                            @endif
                        </div>
                    @endif
                </div>
            @endif

            <!-- Content -->
            <div class="flex-1 p-4 sm:p-6">
                @if(!$overlay && $title)
                    <h3 class="text-xl font-bold text-gray-900 dark:text-gray-100 mb-2">{{ $title }}</h3>
                @endif
                @if(!$overlay && $subtitle)
                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-3">{{ $subtitle }}</p>
                @endif
                @if($description)
                    <p class="text-gray-600 dark:text-gray-400 mb-4">{{ $description }}</p>
                @endif
                @if($slot->isNotEmpty())
                    <div class="text-gray-600 dark:text-gray-400">
                        {{ $slot }}
                    </div>
                @endif
                @if($action)
                    <div class="mt-4">
                        {{ $action }}
                    </div>
                @endif
            </div>

            @if($imagePosition === 'right')
                <!-- Image on Right -->
                <div class="w-full sm:w-1/3 flex-shrink-0">
                    @if($overlay && ($title || $subtitle))
                        <div class="relative h-48 sm:h-full">
                            @if($src)
                                <img src="{{ $src }}" alt="{{ $alt }}" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-dodger-blue-400 to-purple-500"></div>
                            @endif
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent flex items-end p-4">
                                <div>
                                    @if($title)
                                        <h3 class="text-white font-bold text-lg">{{ $title }}</h3>
                                    @endif
                                    @if($subtitle)
                                        <p class="text-white/90 text-sm mt-1">{{ $subtitle }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="h-48 sm:h-full">
                            @if($src)
                                <img src="{{ $src }}" alt="{{ $alt }}" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-dodger-blue-400 to-purple-500"></div>
                            @endif
                        </div>
                    @endif
                </div>
            @endif
        </div>
    @else
        <!-- Vertical Layout (top or bottom) -->
        @if($imagePosition === 'top')
            <!-- Image on Top -->
            <div class="relative">
                @if($overlay && ($title || $subtitle))
                    <div class="relative h-48">
                        @if($src)
                            <img src="{{ $src }}" alt="{{ $alt }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-dodger-blue-400 to-purple-500"></div>
                        @endif
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent flex items-end p-4">
                            <div>
                                @if($title)
                                    <h3 class="text-white font-bold text-lg">{{ $title }}</h3>
                                @endif
                                @if($subtitle)
                                    <p class="text-white/90 text-sm mt-1">{{ $subtitle }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                @else
                    <div class="h-48">
                        @if($src)
                            <img src="{{ $src }}" alt="{{ $alt }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-dodger-blue-400 to-purple-500"></div>
                        @endif
                    </div>
                @endif
            </div>
        @endif

        <!-- Content -->
        <div class="p-4 sm:p-6">
            @if(!$overlay && $title)
                <h3 class="text-xl font-bold text-gray-900 dark:text-gray-100 mb-2">{{ $title }}</h3>
            @endif
            @if(!$overlay && $subtitle)
                <p class="text-sm text-gray-600 dark:text-gray-400 mb-3">{{ $subtitle }}</p>
            @endif
            @if($description)
                <p class="text-gray-600 dark:text-gray-400 mb-4">{{ $description }}</p>
            @endif
            @if($slot->isNotEmpty())
                <div class="text-gray-600 dark:text-gray-400">
                    {{ $slot }}
                </div>
            @endif
            @if($action)
                <div class="mt-4">
                    {{ $action }}
                </div>
            @endif
        </div>

        @if($imagePosition === 'bottom')
            <!-- Image on Bottom -->
            <div class="relative">
                @if($overlay && ($title || $subtitle))
                    <div class="relative h-48">
                        @if($src)
                            <img src="{{ $src }}" alt="{{ $alt }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-dodger-blue-400 to-purple-500"></div>
                        @endif
                        <div class="absolute inset-0 bg-gradient-to-b from-black/60 via-black/20 to-transparent flex items-start p-4">
                            <div>
                                @if($title)
                                    <h3 class="text-white font-bold text-lg">{{ $title }}</h3>
                                @endif
                                @if($subtitle)
                                    <p class="text-white/90 text-sm mt-1">{{ $subtitle }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                @else
                    <div class="h-48">
                        @if($src)
                            <img src="{{ $src }}" alt="{{ $alt }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-dodger-blue-400 to-purple-500"></div>
                        @endif
                    </div>
                @endif
            </div>
        @endif
    @endif
</div>

