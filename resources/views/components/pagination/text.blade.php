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
                class="px-3 py-2 text-sm font-medium text-gray-400 dark:text-gray-600 bg-gray-100 dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-lg cursor-not-allowed transition-colors">
                Previous
            </button>
        @else
            @if($onPrevious)
                <button 
                    x-on:click="{{ $onPrevious }}"
                    class="px-3 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 bg-gray-100 dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 dark:focus:ring-blue-400 transition-colors">
                    Previous
                </button>
            @else
                <button 
                    onclick="window.location.href='?page={{ $currentPage - 1 }}'"
                    class="px-3 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 bg-gray-100 dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 dark:focus:ring-blue-400 transition-colors">
                    Previous
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
                class="px-3 py-2 text-sm font-medium text-gray-400 dark:text-gray-600 bg-gray-100 dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-lg cursor-not-allowed transition-colors">
                Next
            </button>
        @else
            @if($onNext)
                <button 
                    x-on:click="{{ $onNext }}"
                    class="px-3 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 bg-gray-100 dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 dark:focus:ring-blue-400 transition-colors">
                    Next
                </button>
            @else
                <button 
                    onclick="window.location.href='?page={{ $currentPage + 1 }}'"
                    class="px-3 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 bg-gray-100 dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 dark:focus:ring-blue-400 transition-colors">
                    Next
                </button>
            @endif
        @endif
    </nav>
@endif

