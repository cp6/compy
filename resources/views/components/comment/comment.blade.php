@props([
    'id' => null,
    'author' => 'Anonymous',
    'avatar' => null,
    'content' => '',
    'timestamp' => null,
    'replies' => [],
    'level' => 0,
])

@php
    $maxLevel = 5; // Maximum nesting level
    $isNested = $level > 0;
    $marginLeft = $isNested ? 'ml-8 sm:ml-12' : '';
    $borderLeft = $isNested ? 'border-l-2 border-gray-200 dark:border-gray-700 pl-4 sm:pl-6' : '';
@endphp

<div 
    x-data="{ 
        showReplyForm: false,
        showReplies: {{ count($replies) > 0 ? 'true' : 'false' }}
    }"
    @close-all-replies.window="showReplies = false"
    class="comment-item {{ $marginLeft }} {{ $borderLeft }} transition-all duration-200"
    data-comment-id="{{ $id }}"
>
    <div class="flex gap-3 sm:gap-4">
        <!-- Avatar -->
        <div class="flex-shrink-0">
            @if($avatar)
                <img 
                    src="{{ $avatar }}" 
                    alt="{{ $author }}"
                    class="w-10 h-10 sm:w-12 sm:h-12 rounded-full object-cover ring-2 ring-gray-200 dark:ring-gray-700"
                >
            @else
                <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-full bg-gradient-to-br from-dodger-blue-400 to-dodger-blue-600 flex items-center justify-center text-white font-semibold text-sm sm:text-base ring-2 ring-gray-200 dark:ring-gray-700">
                    {{ strtoupper(substr($author, 0, 1)) }}
                </div>
            @endif
        </div>

        <!-- Comment Content -->
        <div class="flex-1 min-w-0">
            <!-- Author & Timestamp -->
            <div class="flex items-center gap-2 mb-1">
                <span class="font-semibold text-gray-900 dark:text-gray-100 text-sm sm:text-base">
                    {{ $author }}
                </span>
                @if($timestamp)
                    <span class="text-xs sm:text-sm text-gray-500 dark:text-gray-400">
                        {{ $timestamp }}
                    </span>
                @endif
            </div>

            <!-- Comment Text -->
            <div class="text-sm sm:text-base text-gray-700 dark:text-gray-300 mb-3 leading-relaxed">
                {{ $content }}
            </div>

            <!-- Actions -->
            <div class="flex items-center gap-4 mb-3">
                <button 
                    @click="showReplyForm = !showReplyForm"
                    class="flex items-center gap-1.5 text-xs sm:text-sm text-gray-600 dark:text-gray-400 hover:text-dodger-blue-600 dark:hover:text-dodger-blue-400 transition-colors"
                >
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6" />
                    </svg>
                    <span>Reply</span>
                </button>
                
                <button class="flex items-center gap-1.5 text-xs sm:text-sm text-gray-600 dark:text-gray-400 hover:text-red-600 dark:hover:text-red-400 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                    <span>Like</span>
                </button>
            </div>

            <!-- Reply Form -->
            <div 
                x-show="showReplyForm"
                x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 transform scale-95"
                x-transition:enter-end="opacity-100 transform scale-100"
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100 transform scale-100"
                x-transition:leave-end="opacity-0 transform scale-95"
                class="mb-4"
            >
                <x-comment.form 
                    :parent-id="$id"
                    placeholder="Write a reply..."
                />
            </div>

            <!-- Replies -->
            @if(count($replies) > 0)
                <div class="mt-4 space-y-4">
                    <button 
                        @click="showReplies = !showReplies"
                        class="flex items-center gap-1.5 text-xs sm:text-sm font-medium text-dodger-blue-600 dark:text-dodger-blue-400 hover:text-dodger-blue-700 dark:hover:text-dodger-blue-300 transition-colors mb-2"
                    >
                        <svg 
                            class="w-4 h-4 transition-transform duration-200"
                            :class="{ 'rotate-90': showReplies }"
                            fill="none" 
                            stroke="currentColor" 
                            viewBox="0 0 24 24"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                        <span x-text="showReplies ? 'Hide' : 'Show'"></span>
                        <span>{{ count($replies) }} {{ count($replies) === 1 ? 'reply' : 'replies' }}</span>
                    </button>

                    <div 
                        x-show="showReplies"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0"
                        x-transition:enter-end="opacity-100"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0"
                        class="space-y-4"
                    >
                        @foreach($replies as $reply)
                            <x-comment.comment
                                :id="$reply['id'] ?? null"
                                :author="$reply['author'] ?? 'Anonymous'"
                                :avatar="$reply['avatar'] ?? null"
                                :content="$reply['content'] ?? ''"
                                :timestamp="$reply['timestamp'] ?? null"
                                :replies="$reply['replies'] ?? []"
                                :level="$level + 1"
                            />
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

