@props([
    'href' => null,
    'badge' => null,
    'badgeColor' => 'dodger-blue', // 'dodger-blue', 'blue', 'red', 'yellow', 'purple', 'gray'
    'badgePosition' => 'right', // 'left', 'right'
    'active' => false,
    'hover' => true,
])

@php
    $baseClasses = 'flex items-center gap-3 transition-all duration-300 ease-out';
    
    $hoverClasses = $hover ? ' hover:bg-gradient-to-r hover:from-gray-50/90 hover:to-gray-100/60 dark:hover:from-gray-800/70 dark:hover:to-gray-700/50 hover:shadow-md hover:scale-[1.02] hover:-translate-y-0.5' : '';
    $activeClasses = $active ? ' bg-gradient-to-r from-dodger-blue-50 via-dodger-blue-100/50 to-dodger-blue-50 dark:from-dodger-blue-900/30 dark:via-dodger-blue-800/20 dark:to-dodger-blue-900/30 text-dodger-blue-700 dark:text-dodger-blue-300 shadow-sm shadow-dodger-blue-200/50 dark:shadow-dodger-blue-900/30' : ' text-gray-700 dark:text-gray-300';
    
    $badgeColorClasses = match($badgeColor) {
        'dodger-blue' => 'bg-gradient-to-r from-dodger-blue-100 to-dodger-blue-200 dark:from-dodger-blue-900/40 dark:to-dodger-blue-800/40 text-dodger-blue-800 dark:text-dodger-blue-200 shadow-sm',
        'blue' => 'bg-gradient-to-r from-blue-100 to-blue-200 dark:from-blue-900/40 dark:to-blue-800/40 text-blue-800 dark:text-blue-200 shadow-sm',
        'red' => 'bg-gradient-to-r from-red-100 to-red-200 dark:from-red-900/40 dark:to-red-800/40 text-red-800 dark:text-red-200 shadow-sm',
        'yellow' => 'bg-gradient-to-r from-yellow-100 to-yellow-200 dark:from-yellow-900/40 dark:to-yellow-800/40 text-yellow-800 dark:text-yellow-200 shadow-sm',
        'purple' => 'bg-gradient-to-r from-purple-100 to-purple-200 dark:from-purple-900/40 dark:to-purple-800/40 text-purple-800 dark:text-purple-200 shadow-sm',
        default => 'bg-gradient-to-r from-gray-100 to-gray-200 dark:from-gray-700 dark:to-gray-600 text-gray-800 dark:text-gray-200 shadow-sm',
    };
    
    $itemClasses = $baseClasses . ' px-4 py-3 rounded-xl backdrop-blur-sm bg-white/30 dark:bg-gray-800/30' . $hoverClasses . $activeClasses;
    
    $tag = $href ? 'a' : 'div';
@endphp

<{{ $tag }} 
    @if($href) href="{{ $href }}" @endif
    {{ $attributes->merge(['class' => $itemClasses]) }}
>
    @if($badge && $badgePosition === 'left')
        <span class="flex-shrink-0 px-3 py-1 text-xs font-bold rounded-full {{ $badgeColorClasses }}">
            {{ $badge }}
        </span>
    @endif
    
    <div class="flex-1 min-w-0 font-medium">
        {{ $slot }}
    </div>
    
    @if($badge && $badgePosition === 'right')
        <span class="flex-shrink-0 px-3 py-1 text-xs font-bold rounded-full {{ $badgeColorClasses }}">
            {{ $badge }}
        </span>
    @endif
    
    @if(isset($badgeSlot))
        <span class="flex-shrink-0">
            {{ $badgeSlot }}
        </span>
    @endif
</{{ $tag }}>

