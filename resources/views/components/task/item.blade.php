@props([
    'id' => null,
    'title' => '',
    'description' => null,
    'status' => 'todo',
    'priority' => 'medium',
    'category' => null,
    'assignee' => null,
    'dueDate' => null,
    'tags' => [],
    'progress' => null,
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
                    <div class="flex items-center gap-2 mb-2 flex-wrap">
                        <span class="text-xs font-mono text-gray-500 dark:text-gray-400">#{{ $id }}</span>
                        <x-task.status-badge :status="$status" />
                        <x-task.priority-badge :priority="$priority" />
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

                @if($tags && count($tags) > 0)
                    <div class="flex items-center gap-1.5 mb-3 flex-wrap">
                        @foreach($tags as $tag)
                            <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300">
                                {{ $tag }}
                            </span>
                        @endforeach
                    </div>
                @endif

                @if($progress !== null)
                    <div class="mb-3">
                        <div class="flex items-center justify-between mb-1">
                            <span class="text-xs font-medium text-gray-700 dark:text-gray-300">Progress</span>
                            <span class="text-xs font-semibold text-gray-900 dark:text-gray-100">{{ $progress }}%</span>
                        </div>
                        <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2">
                            <div class="bg-gradient-to-r from-dodger-blue-500 to-dodger-blue-600 h-2 rounded-full transition-all duration-300" style="width: {{ $progress }}%"></div>
                        </div>
                    </div>
                @endif
                
                <div class="flex items-center gap-4 text-xs text-gray-500 dark:text-gray-400 flex-wrap">
                    @if($category)
                        <span>
                            {{ $category }}
                        </span>
                    @endif
                    
                    @if($assignee)
                        <span>
                            {{ $assignee }}
                        </span>
                    @endif
                    
                    @if($dueDate)
                        <span class="{{ \Carbon\Carbon::parse($dueDate)->isPast() && $status !== 'done' ? 'text-red-600 dark:text-red-400' : '' }}">
                            {{ $dueDate }}
                        </span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</{{ $tag }}>

