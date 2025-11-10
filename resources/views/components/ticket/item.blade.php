@props([
    'id' => null,
    'title' => '',
    'description' => null,
    'status' => 'open',
    'priority' => 'medium',
    'category' => null,
    'author' => null,
    'createdAt' => null,
    'updatedAt' => null,
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
    <div class="bg-white dark:bg-gray-800 border border-gray-200/60 dark:border-gray-700/60 rounded-xl p-5 shadow-md shadow-gray-200/30 dark:shadow-gray-900/50">
        <div class="flex items-start justify-between gap-4">
            <div class="flex-1 min-w-0">
                @if($id)
                    <div class="flex items-center gap-2 mb-2">
                        <span class="text-xs font-mono text-gray-500 dark:text-gray-400">#{{ $id }}</span>
                        <x-ticket.status-badge :status="$status" />
                        <x-ticket.priority-badge :priority="$priority" />
                    </div>
                @endif
                
                <h3 class="text-base font-semibold text-gray-900 dark:text-gray-100 mb-1.5">
                    {{ $title }}
                </h3>
                
                @if($description)
                    <p class="text-sm text-gray-600 dark:text-gray-400 line-clamp-2 mb-3">
                        {{ $description }}
                    </p>
                @endif
                
                <div class="flex items-center gap-4 text-xs text-gray-500 dark:text-gray-400">
                    @if($category)
                        <span class="flex items-center gap-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                            </svg>
                            {{ $category }}
                        </span>
                    @endif
                    
                    @if($author)
                        <span class="flex items-center gap-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            {{ $author }}
                        </span>
                    @endif
                    
                    @if($createdAt)
                        <span class="flex items-center gap-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            {{ $createdAt }}
                        </span>
                    @endif
                </div>
            </div>
            
            <div class="flex-shrink-0">
                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </div>
        </div>
    </div>
</{{ $tag }}>

