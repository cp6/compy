@props([
    'href' => null,
    'actions' => [],
    'active' => false,
    'hover' => true,
])

@php
    $baseClasses = 'flex items-center justify-between gap-3 transition-all duration-300 ease-out';
    
    $hoverClasses = $hover ? ' hover:bg-gradient-to-r hover:from-gray-50/90 hover:to-gray-100/60 dark:hover:from-gray-800/70 dark:hover:to-gray-700/50 hover:shadow-md hover:scale-[1.02] hover:-translate-y-0.5' : '';
    $activeClasses = $active ? ' bg-gradient-to-r from-dodger-blue-50 via-dodger-blue-100/50 to-dodger-blue-50 dark:from-dodger-blue-900/30 dark:via-dodger-blue-800/20 dark:to-dodger-blue-900/30 shadow-sm shadow-dodger-blue-200/50 dark:shadow-dodger-blue-900/30' : '';
    
    $itemClasses = $baseClasses . ' px-4 py-3 rounded-xl backdrop-blur-sm bg-white/30 dark:bg-gray-800/30' . $hoverClasses . $activeClasses;
    
    $tag = $href ? 'a' : 'div';
@endphp

<{{ $tag }} 
    @if($href) href="{{ $href }}" @endif
    {{ $attributes->merge(['class' => $itemClasses]) }}
>
    <div class="flex-1 min-w-0">
        {{ $slot }}
    </div>
    
    @if(isset($action))
        <div class="flex items-center gap-2 flex-shrink-0">
            {{ $action }}
        </div>
    @elseif(!empty($actions))
        <div class="flex items-center gap-2 flex-shrink-0">
            @foreach($actions as $action)
                @if(is_array($action))
                    <a href="{{ $action['href'] ?? '#' }}" 
                       class="p-2 rounded-lg text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition-all duration-200 hover:scale-110"
                       title="{{ $action['title'] ?? '' }}">
                        @if(isset($action['icon']))
                            {!! $action['icon'] !!}
                        @else
                            {{ $action['label'] ?? '' }}
                        @endif
                    </a>
                @else
                    {{ $action }}
                @endif
            @endforeach
        </div>
    @endif
</{{ $tag }}>

