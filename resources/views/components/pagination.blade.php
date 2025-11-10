@props([
    'paginator' => null,
    'onEachSide' => 3,
])

@php
    if (!$paginator) {
        // Create a mock paginator for demo purposes
        $paginator = new class {
            public $currentPage = 1;
            public $lastPage = 10;
            public $perPage = 10;
            public $total = 100;
            public $path = '#';
            
            public function url($page) {
                return $this->path . '?page=' . $page;
            }
            
            public function hasMorePages() {
                return $this->currentPage < $this->lastPage;
            }
            
            public function onFirstPage() {
                return $this->currentPage === 1;
            }
        };
    }
    
    $elements = [];
    $onEachSide = $onEachSide;
    
    // Calculate page range
    $start = max(1, $paginator->currentPage - $onEachSide);
    $end = min($paginator->lastPage, $paginator->currentPage + $onEachSide);
    
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
    
    if ($end < $paginator->lastPage) {
        if ($end < $paginator->lastPage - 1) {
            $elements[] = ['type' => 'dots'];
        }
        $elements[] = ['type' => 'page', 'page' => $paginator->lastPage];
    }
@endphp

@if ($paginator->lastPage > 1)
    <nav class="flex items-center justify-between border-t border-gray-200 dark:border-gray-700 px-4 py-3 sm:px-6" aria-label="Pagination">
        <div class="hidden sm:block">
            <p class="text-sm text-gray-700 dark:text-gray-300">
                Showing
                <span class="font-medium">{{ ($paginator->currentPage - 1) * $paginator->perPage + 1 }}</span>
                to
                <span class="font-medium">{{ min($paginator->currentPage * $paginator->perPage, $paginator->total) }}</span>
                of
                <span class="font-medium">{{ $paginator->total }}</span>
                results
            </p>
        </div>
        <div class="flex flex-1 justify-between sm:justify-end">
            <div class="flex items-center gap-1">
                <!-- Previous Button -->
                @if ($paginator->onFirstPage())
                    <span class="relative inline-flex items-center px-3 py-2 text-sm font-medium text-gray-400 dark:text-gray-600 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-lg cursor-not-allowed">
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                        <span class="ml-1 hidden sm:inline">Previous</span>
                    </span>
                @else
                    <a href="{{ $paginator->url($paginator->currentPage - 1) }}" class="relative inline-flex items-center px-3 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500 dark:focus:ring-emerald-400 transition-colors">
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                        <span class="ml-1 hidden sm:inline">Previous</span>
                    </a>
                @endif

                <!-- Page Numbers -->
                <div class="hidden sm:flex items-center gap-1">
                    @foreach ($elements as $element)
                        @if ($element['type'] === 'dots')
                            <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300">...</span>
                        @elseif ($element['page'] === $paginator->currentPage)
                            <span class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-white bg-emerald-600 dark:bg-emerald-500 border border-emerald-600 dark:border-emerald-500 rounded-lg cursor-default">
                                {{ $element['page'] }}
                            </span>
                        @else
                            <a href="{{ $paginator->url($element['page']) }}" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500 dark:focus:ring-emerald-400 transition-colors">
                                {{ $element['page'] }}
                            </a>
                        @endif
                    @endforeach
                </div>

                <!-- Next Button -->
                @if (!$paginator->hasMorePages())
                    <span class="relative inline-flex items-center px-3 py-2 text-sm font-medium text-gray-400 dark:text-gray-600 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-lg cursor-not-allowed">
                        <span class="mr-1 hidden sm:inline">Next</span>
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                    </span>
                @else
                    <a href="{{ $paginator->url($paginator->currentPage + 1) }}" class="relative inline-flex items-center px-3 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500 dark:focus:ring-emerald-400 transition-colors">
                        <span class="mr-1 hidden sm:inline">Next</span>
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                    </a>
                @endif
            </div>
        </div>
    </nav>
@endif

