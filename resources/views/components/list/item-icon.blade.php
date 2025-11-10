@props([
    'href' => null,
    'icon' => null,
    'iconColor' => 'default', // 'default', 'dodger-blue', 'blue', 'red', 'yellow', 'purple'
    'active' => false,
    'hover' => true,
])

@php
    $baseClasses = 'flex items-center gap-3 transition-all duration-300 ease-out';
    
    $hoverClasses = $hover ? ' hover:bg-gradient-to-r hover:from-gray-50/90 hover:to-gray-100/60 dark:hover:from-gray-800/70 dark:hover:to-gray-700/50 hover:shadow-md hover:scale-[1.02] hover:-translate-y-0.5' : '';
    $activeClasses = $active ? ' bg-gradient-to-r from-dodger-blue-50 via-dodger-blue-100/50 to-dodger-blue-50 dark:from-dodger-blue-900/30 dark:via-dodger-blue-800/20 dark:to-dodger-blue-900/30 text-dodger-blue-700 dark:text-dodger-blue-300 shadow-sm shadow-dodger-blue-200/50 dark:shadow-dodger-blue-900/30' : ' text-gray-700 dark:text-gray-300';
    
    $iconColorClasses = match($iconColor) {
        'dodger-blue' => 'text-dodger-blue-600 dark:text-dodger-blue-400',
        'blue' => 'text-blue-600 dark:text-blue-400',
        'red' => 'text-red-600 dark:text-red-400',
        'yellow' => 'text-yellow-600 dark:text-yellow-400',
        'purple' => 'text-purple-600 dark:text-purple-400',
        default => 'text-gray-500 dark:text-gray-400',
    };
    
    $itemClasses = $baseClasses . ' px-4 py-3 rounded-xl backdrop-blur-sm bg-white/30 dark:bg-gray-800/30' . $hoverClasses . $activeClasses;
    
    $tag = $href ? 'a' : 'div';
@endphp

<{{ $tag }} 
    @if($href) href="{{ $href }}" @endif
    {{ $attributes->merge(['class' => $itemClasses]) }}
>
    @if(isset($iconSlot))
        <div class="flex-shrink-0 p-2 rounded-lg bg-gradient-to-br from-gray-100 to-gray-200/50 dark:from-gray-700 dark:to-gray-800/50 shadow-sm {{ $iconColorClasses }}">
            {{ $iconSlot }}
        </div>
    @elseif($icon)
        <div class="flex-shrink-0 p-2 rounded-lg bg-gradient-to-br from-gray-100 to-gray-200/50 dark:from-gray-700 dark:to-gray-800/50 shadow-sm {{ $iconColorClasses }}">
            @if(str_starts_with($icon, '<svg'))
                {!! $icon !!}
            @else
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $icon }}"></path>
                </svg>
            @endif
        </div>
    @endif
    
    <div class="flex-1 min-w-0 font-medium">
        {{ $slot }}
    </div>
</{{ $tag }}>

