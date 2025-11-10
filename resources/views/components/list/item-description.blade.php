@props([
    'href' => null,
    'title' => null,
    'description' => null,
    'icon' => null,
    'badge' => null,
    'active' => false,
    'hover' => true,
])

@php
    $baseClasses = 'flex items-start gap-4 transition-all duration-300 ease-out';
    
    $hoverClasses = $hover ? ' hover:bg-gradient-to-r hover:from-gray-50/90 hover:to-gray-100/60 dark:hover:from-gray-800/70 dark:hover:to-gray-700/50 hover:shadow-lg hover:scale-[1.01] hover:-translate-y-0.5' : '';
    $activeClasses = $active ? ' bg-gradient-to-r from-dodger-blue-50 via-dodger-blue-100/50 to-dodger-blue-50 dark:from-dodger-blue-900/30 dark:via-dodger-blue-800/20 dark:to-dodger-blue-900/30 shadow-md shadow-dodger-blue-200/50 dark:shadow-dodger-blue-900/30' : '';
    
    $itemClasses = $baseClasses . ' px-5 py-4 rounded-xl backdrop-blur-sm bg-white/30 dark:bg-gray-800/30' . $hoverClasses . $activeClasses;
    
    $tag = $href ? 'a' : 'div';
@endphp

<{{ $tag }} 
    @if($href) href="{{ $href }}" @endif
    {{ $attributes->merge(['class' => $itemClasses]) }}
>
    @if($icon)
        <div class="flex-shrink-0 mt-0.5 p-2 rounded-lg bg-gradient-to-br from-gray-100 to-gray-200/50 dark:from-gray-700 dark:to-gray-800/50 text-gray-600 dark:text-gray-300 shadow-sm">
            @if(str_starts_with($icon, '<svg'))
                {!! $icon !!}
            @else
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $icon }}"></path>
                </svg>
            @endif
        </div>
    @elseif(isset($iconSlot))
        <div class="flex-shrink-0 mt-0.5">
            {{ $iconSlot }}
        </div>
    @endif
    
    <div class="flex-1 min-w-0">
        @if($title)
            <div class="flex items-start justify-between gap-2">
                <p class="text-base font-semibold text-gray-900 dark:text-gray-100 tracking-tight">
                    {{ $title }}
                </p>
                @if($badge)
                    <span class="flex-shrink-0">
                        {{ $badge }}
                    </span>
                @endif
            </div>
        @endif
        @if($description)
            <p class="text-sm text-gray-600 dark:text-gray-400 mt-1.5 leading-relaxed">
                {{ $description }}
            </p>
        @endif
        @if(!$title && !$description)
            {{ $slot }}
        @endif
    </div>
    
    @if(isset($action))
        <div class="flex-shrink-0">
            {{ $action }}
        </div>
    @endif
</{{ $tag }}>

