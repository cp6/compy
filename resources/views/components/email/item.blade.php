@props([
    'id' => null,
    'from' => '',
    'subject' => '',
    'preview' => null,
    'timestamp' => null,
    'unread' => false,
    'important' => false,
    'attachments' => false,
    'href' => null,
    'hover' => true,
])

@php
    $baseClasses = 'block transition-all duration-300 ease-out';
    $hoverClasses = $hover ? ' hover:shadow-lg hover:shadow-gray-300/50 dark:hover:shadow-gray-900/70 hover:-translate-y-0.5' : '';
    $itemClasses = $baseClasses . $hoverClasses;
    
    $tag = $href ? 'a' : 'div';
@endphp

<{{ $tag }} 
    @if($href) href="{{ $href }}" @endif
    {{ $attributes->merge(['class' => $itemClasses]) }}
>
    <div class="bg-white dark:bg-gray-800 border border-gray-200/60 dark:border-gray-700/60 rounded-xl p-4 shadow-md shadow-gray-200/30 dark:shadow-gray-900/50 {{ $unread ? 'bg-dodger-blue-50/30 dark:bg-dodger-blue-900/10 border-dodger-blue-200 dark:border-dodger-blue-800' : '' }}">
        <div class="flex items-start gap-4">
            <div class="flex-shrink-0">
                <div class="w-10 h-10 rounded-full bg-gradient-to-br from-dodger-blue-500 to-dodger-blue-600 dark:from-dodger-blue-600 dark:to-dodger-blue-700 flex items-center justify-center text-white font-semibold text-sm">
                    {{ strtoupper(substr($from, 0, 1)) }}
                </div>
            </div>
            
            <div class="flex-1 min-w-0">
                <div class="flex items-center gap-2 mb-1">
                    <span class="font-semibold text-gray-900 dark:text-gray-100 {{ $unread ? 'font-bold' : '' }}">
                        {{ $from }}
                    </span>
                    @if($unread)
                        <span class="w-2 h-2 rounded-full bg-dodger-blue-500 flex-shrink-0"></span>
                    @endif
                </div>
                
                <h3 class="text-sm font-medium text-gray-900 dark:text-gray-100 mb-1 {{ $unread ? 'font-semibold' : '' }}">
                    {{ $subject }}
                </h3>
                
                @if($preview)
                    <p class="text-sm text-gray-600 dark:text-gray-400 line-clamp-1 mb-2">
                        {{ $preview }}
                    </p>
                @endif
                
                <div class="flex items-center gap-3 text-xs text-gray-500 dark:text-gray-400">
                    @if($timestamp)
                        <span>{{ $timestamp }}</span>
                    @endif
                    @if($attachments)
                        <span class="flex items-center gap-1">
                            Attachment
                        </span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</{{ $tag }}>

