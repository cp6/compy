@props([
    'name' => null,
    'role' => null,
    'bio' => null,
    'avatar' => null,
    'avatarText' => null,
    'avatarSize' => 'lg', // 'sm', 'md', 'lg', 'xl'
    'variant' => 'default', // 'default', 'gradient', 'glass'
    'hover' => false,
    'showStats' => false,
    'stats' => [], // ['label' => 'Posts', 'value' => '123']
    'showSocial' => false,
    'socialLinks' => [], // ['icon' => 'svg', 'url' => '#', 'label' => 'Twitter']
    'actions' => null, // Action buttons
    'badge' => null, // Badge component
])

@php
    $baseClasses = match($variant) {
        'gradient' => 'bg-gradient-to-br from-white via-gray-50/50 to-gray-100/50 dark:from-gray-800 dark:via-gray-800/90 dark:to-gray-900',
        'glass' => 'bg-white/90 dark:bg-gray-800/90 backdrop-blur-xl border border-white/30 dark:border-gray-700/40',
        default => 'bg-white dark:bg-gray-800',
    };
    
    $shadowClasses = match($variant) {
        'gradient' => 'shadow-lg shadow-gray-200/40 dark:shadow-gray-900/60',
        'glass' => 'shadow-xl shadow-gray-200/30 dark:shadow-gray-900/40',
        default => 'shadow-md shadow-gray-200/30 dark:shadow-gray-900/50',
    };
    
    $hoverShadowClasses = $hover ? ' hover:shadow-xl hover:shadow-gray-300/50 dark:hover:shadow-gray-900/70 hover:-translate-y-0.5 transition-all duration-300 ease-out' : 'transition-all duration-300 ease-out';
    $cardClasses = $baseClasses . ' overflow-hidden rounded-xl border border-gray-200/60 dark:border-gray-700/60 ' . $shadowClasses . ' ' . $hoverShadowClasses;
    
    $avatarSizeClasses = match($avatarSize) {
        'sm' => 'w-16 h-16 text-lg',
        'md' => 'w-20 h-20 text-xl',
        'lg' => 'w-24 h-24 text-2xl',
        'xl' => 'w-32 h-32 text-3xl',
        default => 'w-24 h-24 text-2xl',
    };
@endphp

<div {{ $attributes->merge(['class' => $cardClasses]) }}>
    <div class="p-5 sm:p-6 text-center">
        <!-- Avatar -->
        <div class="flex justify-center mb-5">
            @if($avatar)
                <img src="{{ $avatar }}" alt="{{ $name }}" class="{{ $avatarSizeClasses }} rounded-full object-cover border-4 border-white dark:border-gray-800 shadow-xl ring-4 ring-dodger-blue-100 dark:ring-dodger-blue-900/30">
            @elseif($avatarText)
                <div class="{{ $avatarSizeClasses }} rounded-full bg-gradient-to-br from-dodger-blue-500 to-dodger-blue-600 dark:from-dodger-blue-600 dark:to-dodger-blue-700 flex items-center justify-center text-white font-bold border-4 border-white dark:border-gray-800 shadow-xl ring-4 ring-dodger-blue-100 dark:ring-dodger-blue-900/30">
                    {{ $avatarText }}
                </div>
            @else
                <div class="{{ $avatarSizeClasses }} rounded-full bg-gradient-to-br from-dodger-blue-500 to-dodger-blue-600 dark:from-dodger-blue-600 dark:to-dodger-blue-700 flex items-center justify-center text-white font-bold border-4 border-white dark:border-gray-800 shadow-xl ring-4 ring-dodger-blue-100 dark:ring-dodger-blue-900/30">
                    <svg class="w-1/2 h-1/2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                    </svg>
                </div>
            @endif
        </div>

        <!-- Badge -->
        @if($badge)
            <div class="flex justify-center mb-3">
                {{ $badge }}
            </div>
        @endif

        <!-- Name -->
        @if($name)
            <h3 class="text-xl sm:text-2xl font-bold text-gray-900 dark:text-gray-100 mb-1">
                {{ $name }}
            </h3>
        @endif

        <!-- Role -->
        @if($role)
            <p class="text-sm sm:text-base text-dodger-blue-600 dark:text-dodger-blue-400 font-medium mb-3">
                {{ $role }}
            </p>
        @endif

        <!-- Bio -->
        @if($bio)
            <p class="text-sm text-gray-700 dark:text-gray-300 mb-4 max-w-md mx-auto">
                {{ $bio }}
            </p>
        @endif

        <!-- Stats -->
        @if($showStats && count($stats) > 0)
            <div class="grid grid-cols-{{ count($stats) }} gap-4 my-6 pt-6 border-t border-gray-200/60 dark:border-gray-700/60">
                @foreach($stats as $stat)
                    <div class="text-center">
                        <div class="text-2xl font-bold text-gray-900 dark:text-gray-100">
                            {{ $stat['value'] ?? '0' }}
                        </div>
                        <div class="text-xs sm:text-sm text-gray-600 dark:text-gray-400 mt-1">
                            {{ $stat['label'] ?? '' }}
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        <!-- Social Links -->
        @if($showSocial && count($socialLinks) > 0)
            <div class="flex justify-center gap-3 my-5">
                @foreach($socialLinks as $link)
                    <a href="{{ $link['url'] ?? '#' }}" 
                       class="w-10 h-10 rounded-full bg-gray-100 dark:bg-gray-700/50 flex items-center justify-center text-gray-600 dark:text-gray-400 hover:bg-dodger-blue-100 dark:hover:bg-dodger-blue-900/30 hover:text-dodger-blue-600 dark:hover:text-dodger-blue-400 hover:scale-110 transition-all duration-200 shadow-sm hover:shadow-md"
                       title="{{ $link['label'] ?? '' }}">
                        @if(isset($link['icon']))
                            {!! $link['icon'] !!}
                        @else
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 0C4.477 0 0 4.477 0 10c0 4.42 2.865 8.17 6.839 9.49.5.092.682-.217.682-.482 0-.237-.008-.866-.013-1.7-2.782.603-3.369-1.34-3.369-1.34-.454-1.156-1.11-1.463-1.11-1.463-.908-.62.069-.608.069-.608 1.003.07 1.531 1.03 1.531 1.03.892 1.529 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.11-4.555-4.943 0-1.091.39-1.984 1.029-2.683-.103-.253-.446-1.27.098-2.647 0 0 .84-.269 2.75 1.025A9.578 9.578 0 0110 4.837c.85.004 1.705.114 2.504.336 1.909-1.294 2.747-1.025 2.747-1.025.546 1.377.203 2.394.1 2.647.64.699 1.028 1.592 1.028 2.683 0 3.842-2.339 4.687-4.566 4.935.359.309.678.919.678 1.852 0 1.336-.012 2.415-.012 2.743 0 .267.18.578.688.48C17.138 18.167 20 14.418 20 10c0-5.523-4.477-10-10-10z"/>
                            </svg>
                        @endif
                    </a>
                @endforeach
            </div>
        @endif

        <!-- Actions -->
        @if($actions)
            <div class="mt-4">
                {{ $actions }}
            </div>
        @endif

        <!-- Slot Content -->
        @if($slot->isNotEmpty())
            <div class="mt-4 text-gray-700 dark:text-gray-300">
                {{ $slot }}
            </div>
        @endif
    </div>
</div>

