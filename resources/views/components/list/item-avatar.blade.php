@props([
    'href' => null,
    'avatar' => null,
    'avatarText' => null,
    'avatarSize' => 'md', // 'sm', 'md', 'lg'
    'title' => null,
    'subtitle' => null,
    'badge' => null,
    'active' => false,
    'hover' => true,
])

@php
    $baseClasses = 'flex items-center gap-4 transition-all duration-300 ease-out';
    
    $hoverClasses = $hover ? ' hover:bg-gradient-to-r hover:from-gray-50/90 hover:to-gray-100/60 dark:hover:from-gray-800/70 dark:hover:to-gray-700/50 hover:shadow-lg hover:scale-[1.01] hover:-translate-y-0.5' : '';
    $activeClasses = $active ? ' bg-gradient-to-r from-dodger-blue-50 via-dodger-blue-100/50 to-dodger-blue-50 dark:from-dodger-blue-900/30 dark:via-dodger-blue-800/20 dark:to-dodger-blue-900/30 shadow-md shadow-dodger-blue-200/50 dark:shadow-dodger-blue-900/30' : '';
    
    $avatarSizeClasses = match($avatarSize) {
        'sm' => 'w-10 h-10 text-xs ring-2 ring-white dark:ring-gray-800',
        'lg' => 'w-14 h-14 text-base ring-3 ring-white dark:ring-gray-800',
        default => 'w-12 h-12 text-sm ring-2 ring-white dark:ring-gray-800',
    };
    
    $itemClasses = $baseClasses . ' px-5 py-4 rounded-xl backdrop-blur-sm bg-white/30 dark:bg-gray-800/30' . $hoverClasses . $activeClasses;
    
    $tag = $href ? 'a' : 'div';
    
    // Generate avatar initials if avatarText provided
    $initials = $avatarText ? strtoupper(substr($avatarText, 0, 2)) : null;
@endphp

<{{ $tag }} 
    @if($href) href="{{ $href }}" @endif
    {{ $attributes->merge(['class' => $itemClasses]) }}
>
    {{-- Avatar --}}
    <div class="flex-shrink-0">
        @if($avatar)
            <img src="{{ $avatar }}" alt="{{ $title ?? '' }}" class="{{ $avatarSizeClasses }} rounded-full object-cover shadow-lg">
        @elseif($initials)
            <div class="{{ $avatarSizeClasses }} rounded-full bg-gradient-to-br from-dodger-blue-500 via-dodger-blue-600 to-dodger-blue-700 dark:from-dodger-blue-600 dark:via-dodger-blue-700 dark:to-dodger-blue-800 flex items-center justify-center font-bold text-white shadow-lg">
                {{ $initials }}
            </div>
        @elseif(isset($avatarSlot))
            {{ $avatarSlot }}
        @else
            <div class="{{ $avatarSizeClasses }} rounded-full bg-gradient-to-br from-gray-300 to-gray-400 dark:from-gray-600 dark:to-gray-700 flex items-center justify-center shadow-lg">
                <svg class="w-1/2 h-1/2 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                </svg>
            </div>
        @endif
    </div>
    
    {{-- Content --}}
    <div class="flex-1 min-w-0">
        @if($title)
            <div class="flex items-center justify-between gap-2">
                <p class="text-base font-semibold text-gray-900 dark:text-gray-100 truncate tracking-tight">
                    {{ $title }}
                </p>
                @if($badge)
                    <span class="flex-shrink-0">
                        {{ $badge }}
                    </span>
                @endif
            </div>
        @endif
        @if($subtitle)
            <p class="text-sm text-gray-600 dark:text-gray-400 truncate mt-1">
                {{ $subtitle }}
            </p>
        @endif
        @if(!$title && !$subtitle)
            {{ $slot }}
        @endif
    </div>
    
    {{-- Action Slot --}}
    @if(isset($action))
        <div class="flex-shrink-0">
            {{ $action }}
        </div>
    @endif
</{{ $tag }}>

