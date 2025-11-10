@props([
    'comments' => [],
    'emptyMessage' => 'No comments yet. Be the first to comment!',
    'showCloseAll' => false,
])

<div 
    x-data="{ 
        closeAll() {
            // Dispatch event to close all comment trees
            window.dispatchEvent(new CustomEvent('close-all-replies'));
        }
    }"
    class="comments-list space-y-6"
>
    @if($showCloseAll && count($comments) > 0)
        <div class="flex justify-end mb-4">
            <button 
                @click="closeAll()"
                class="flex items-center gap-2 px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 bg-gray-100 dark:bg-gray-800 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-lg transition-colors duration-200"
            >
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                </svg>
                <span>Close All</span>
            </button>
        </div>
    @endif
    @if(count($comments) > 0)
        @foreach($comments as $comment)
            <x-comment.comment
                :id="$comment['id'] ?? null"
                :author="$comment['author'] ?? 'Anonymous'"
                :avatar="$comment['avatar'] ?? null"
                :content="$comment['content'] ?? ''"
                :timestamp="$comment['timestamp'] ?? null"
                :replies="$comment['replies'] ?? []"
                :level="0"
            />
        @endforeach
    @else
        <div class="text-center py-12">
            <svg class="mx-auto h-12 w-12 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
            </svg>
            <p class="mt-4 text-sm text-gray-500 dark:text-gray-400">
                {{ $emptyMessage }}
            </p>
        </div>
    @endif
</div>

