@props([
    'currentPage' => 1,
    'lastPage' => 10,
    'onEachSide' => 3,
    'onPrevious' => null,
    'onNext' => null,
    'onPage' => null,
])

@php
    $elements = [];
    $onEachSide = $onEachSide;
    
    // Calculate page range
    $start = max(1, $currentPage - $onEachSide);
    $end = min($lastPage, $currentPage + $onEachSide);
    
    // Build elements array
    if ($start > 1) {
        $elements[] = ['type' => 'page', 'page' => 1];
        if ($start > 2) {
            $elements[] = ['type' => 'dots'];
        }
    }
    
    for ($i = $start; $i <= $end; $i++) {
        $elements[] = ['type' => 'page', 'page' => $i];
    }
    
    if ($end < $lastPage) {
        if ($end < $lastPage - 1) {
            $elements[] = ['type' => 'dots'];
        }
        $elements[] = ['type' => 'page', 'page' => $lastPage];
    }
@endphp

@if ($lastPage > 1)
    <nav class="flex items-center justify-center gap-2" aria-label="Pagination">
        <!-- Previous Button -->
        @if ($currentPage === 1)
            <button 
                disabled
                class="p-2 text-sm font-medium text-gray-400 dark:text-gray-600 bg-gray-100 dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-lg cursor-not-allowed transition-colors">
                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                </svg>
            </button>
        @else
            @if($onPrevious)
                <button 
                    x-on:click="{{ $onPrevious }}"
                    class="p-2 text-sm font-medium text-gray-700 dark:text-gray-300 bg-gray-100 dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 dark:focus:ring-blue-400 transition-colors">
                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                    </svg>
                </button>
            @else
                <button 
                    onclick="window.location.href='?page={{ $currentPage - 1 }}'"
                    class="p-2 text-sm font-medium text-gray-700 dark:text-gray-300 bg-gray-100 dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 dark:focus:ring-blue-400 transition-colors">
                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                    </svg>
                </button>
            @endif
        @endif

        <!-- Page Numbers -->
        <div class="flex items-center gap-1">
            @foreach ($elements as $element)
                @if ($element['type'] === 'dots')
                    <span class="px-2 sm:px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300">...</span>
                @elseif ($element['page'] === $currentPage)
                    <span class="px-2 sm:px-4 py-2 text-sm font-semibold text-white bg-blue-600 dark:bg-blue-500 border border-blue-600 dark:border-blue-500 rounded-lg cursor-default">
                        {{ $element['page'] }}
                    </span>
                @else
                    @if($onPage)
                        <button 
                            x-on:click="{{ $onPage }}({{ $element['page'] }})"
                            class="px-2 sm:px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 bg-transparent hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-gray-900 dark:hover:text-gray-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 dark:focus:ring-blue-400 transition-colors">
                            {{ $element['page'] }}
                        </button>
                    @else
                        <button 
                            onclick="window.location.href='?page={{ $element['page'] }}'"
                            class="px-2 sm:px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 bg-transparent hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-gray-900 dark:hover:text-gray-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 dark:focus:ring-blue-400 transition-colors">
                            {{ $element['page'] }}
                        </button>
                    @endif
                @endif
            @endforeach
        </div>

        <!-- Next Button -->
        @if ($currentPage >= $lastPage)
            <button 
                disabled
                class="p-2 text-sm font-medium text-gray-400 dark:text-gray-600 bg-gray-100 dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-lg cursor-not-allowed transition-colors">
                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                </svg>
            </button>
        @else
            @if($onNext)
                <button 
                    x-on:click="{{ $onNext }}"
                    class="p-2 text-sm font-medium text-gray-700 dark:text-gray-300 bg-gray-100 dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 dark:focus:ring-blue-400 transition-colors">
                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                    </svg>
                </button>
            @else
                <button 
                    onclick="window.location.href='?page={{ $currentPage + 1 }}'"
                    class="p-2 text-sm font-medium text-gray-700 dark:text-gray-300 bg-gray-100 dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 dark:focus:ring-blue-400 transition-colors">
                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                    </svg>
                </button>
            @endif
        @endif
    </nav>
@endif

