@props([
    'author' => 'User',
    'avatar' => null,
    'content' => '',
    'timestamp' => null,
    'isAi' => false,
    'isTyping' => false,
    'codeBlocks' => [],
    'suggestedResponses' => [],
])

@php
    $messageClasses = $isAi
        ? 'flex items-start gap-3 mb-4'
        : 'flex items-start gap-3 mb-4 flex-row-reverse';
    
    $bubbleClasses = $isAi
        ? 'bg-gray-100 dark:bg-gray-800 text-gray-900 dark:text-gray-100 rounded-2xl rounded-tl-sm px-4 py-3 max-w-[80%] sm:max-w-[70%]'
        : 'bg-dodger-blue-600 dark:bg-dodger-blue-500 text-white rounded-2xl rounded-tr-sm px-4 py-3 max-w-[80%] sm:max-w-[70%]';
@endphp

<div class="{{ $messageClasses }}">
    @if($isAi)
        <div class="flex-shrink-0">
            @if($avatar)
                <img src="{{ $avatar }}" alt="{{ $author }}" class="w-8 h-8 rounded-full">
            @else
                <div class="w-8 h-8 rounded-full bg-gradient-to-br from-dodger-blue-500 to-purple-600 dark:from-dodger-blue-600 dark:to-purple-700"></div>
            @endif
        </div>
    @endif

    <div class="flex-1 min-w-0">
        <div class="{{ $bubbleClasses }}">
            @if($isTyping)
                <div class="flex items-center gap-1.5">
                    <div class="w-2 h-2 bg-current opacity-60 rounded-full animate-bounce" style="animation-delay: 0s"></div>
                    <div class="w-2 h-2 bg-current opacity-60 rounded-full animate-bounce" style="animation-delay: 0.2s"></div>
                    <div class="w-2 h-2 bg-current opacity-60 rounded-full animate-bounce" style="animation-delay: 0.4s"></div>
                </div>
            @else
                <div class="space-y-2">
                    <p class="text-sm leading-relaxed whitespace-pre-wrap break-words">{{ $content }}</p>
                    
                    @if(!empty($codeBlocks))
                        @foreach($codeBlocks as $codeBlock)
                            <x-chat.code-block 
                                :language="$codeBlock['language'] ?? 'text'"
                                :code="$codeBlock['code'] ?? ''"
                            />
                        @endforeach
                    @endif
                    
                    @if(!empty($suggestedResponses) && $isAi)
                        <x-chat.suggested-responses :suggestions="$suggestedResponses" />
                    @endif
                </div>
            @endif
        </div>
        @if($timestamp && !$isTyping)
            <p class="text-xs text-gray-500 dark:text-gray-400 mt-1 {{ $isAi ? 'text-left' : 'text-right' }}">
                {{ $timestamp }}
            </p>
        @endif
    </div>

    @if(!$isAi)
        <div class="flex-shrink-0">
            @if($avatar)
                <img src="{{ $avatar }}" alt="{{ $author }}" class="w-8 h-8 rounded-full">
            @else
                <div class="w-8 h-8 rounded-full bg-gradient-to-br from-gray-400 to-gray-600 dark:from-gray-500 dark:to-gray-700"></div>
            @endif
        </div>
    @endif
</div>

