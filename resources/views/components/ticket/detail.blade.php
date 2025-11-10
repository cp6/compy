@props([
    'id' => null,
    'title' => '',
    'description' => '',
    'status' => 'open',
    'priority' => 'medium',
    'category' => null,
    'author' => null,
    'createdAt' => null,
    'updatedAt' => null,
    'replies' => [],
])

<div {{ $attributes->merge(['class' => 'space-y-6']) }}>
    {{-- Ticket Header --}}
    <div class="bg-white dark:bg-gray-800 border border-gray-200/60 dark:border-gray-700/60 rounded-xl p-6 shadow-md shadow-gray-200/30 dark:shadow-gray-900/50">
        <div class="flex items-start justify-between gap-4 mb-4">
            <div class="flex-1">
                @if($id)
                    <div class="flex items-center gap-3 mb-3">
                        <span class="text-sm font-mono text-gray-500 dark:text-gray-400">Ticket #{{ $id }}</span>
                        <x-ticket.status-badge :status="$status" />
                        <x-ticket.priority-badge :priority="$priority" />
                    </div>
                @endif
                
                <h1 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-3">
                    {{ $title }}
                </h1>
                
                <div class="flex flex-wrap items-center gap-4 text-sm text-gray-600 dark:text-gray-400">
                    @if($category)
                        <span class="flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                            </svg>
                            {{ $category }}
                        </span>
                    @endif
                    
                    @if($author)
                        <span class="flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            {{ $author }}
                        </span>
                    @endif
                    
                    @if($createdAt)
                        <span class="flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Created {{ $createdAt }}
                        </span>
                    @endif
                    
                    @if($updatedAt && $updatedAt !== $createdAt)
                        <span class="flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                            </svg>
                            Updated {{ $updatedAt }}
                        </span>
                    @endif
                </div>
            </div>
        </div>
        
        {{-- Description --}}
        <div class="mt-6 pt-6 border-t border-gray-200 dark:border-gray-700">
            <h2 class="text-sm font-semibold text-gray-900 dark:text-gray-100 mb-3">Description</h2>
            <div class="prose prose-sm dark:prose-invert max-w-none text-gray-700 dark:text-gray-300">
                <p class="whitespace-pre-wrap">{{ $description }}</p>
            </div>
        </div>
    </div>
    
    {{-- Replies Section --}}
    @if(count($replies) > 0)
        <div class="bg-white dark:bg-gray-800 border border-gray-200/60 dark:border-gray-700/60 rounded-xl p-6 shadow-md shadow-gray-200/30 dark:shadow-gray-900/50">
            <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">
                Replies ({{ count($replies) }})
            </h2>
            
            <div class="space-y-4">
                @foreach($replies as $reply)
                    <div class="border-l-4 border-dodger-blue-500 dark:border-dodger-blue-400 pl-4 py-2">
                        <div class="flex items-center gap-2 mb-2">
                            <span class="font-semibold text-gray-900 dark:text-gray-100">
                                {{ $reply['author'] ?? 'Support Agent' }}
                            </span>
                            @if(isset($reply['timestamp']))
                                <span class="text-xs text-gray-500 dark:text-gray-400">
                                    {{ $reply['timestamp'] }}
                                </span>
                            @endif
                        </div>
                        <p class="text-sm text-gray-700 dark:text-gray-300 whitespace-pre-wrap">
                            {{ $reply['content'] ?? '' }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
</div>

