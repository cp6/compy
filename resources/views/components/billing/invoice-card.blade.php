@props([
    'invoiceNumber' => null,
    'date' => null,
    'amount' => 0,
    'status' => 'paid', // 'paid', 'pending', 'overdue', 'cancelled'
    'description' => null,
    'href' => '#',
])

@php
    $statusClasses = match($status) {
        'paid' => 'bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400',
        'pending' => 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900/30 dark:text-yellow-400',
        'overdue' => 'bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-400',
        'cancelled' => 'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-400',
        default => 'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-400',
    };
    
    $statusLabels = match($status) {
        'paid' => 'Paid',
        'pending' => 'Pending',
        'overdue' => 'Overdue',
        'cancelled' => 'Cancelled',
        default => 'Unknown',
    };
@endphp

<a href="{{ $href }}" class="block group">
    <div class="bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 p-4 sm:p-5 hover:shadow-md hover:border-dodger-blue-300 dark:hover:border-dodger-blue-700 transition-all duration-200">
        <div class="flex items-start justify-between">
            <div class="flex-1 min-w-0">
                <div class="flex items-center justify-between mb-2">
                    <h4 class="text-sm font-semibold text-gray-900 dark:text-gray-100 group-hover:text-dodger-blue-600 dark:group-hover:text-dodger-blue-400 transition-colors">
                        @if($invoiceNumber)
                            Invoice #{{ $invoiceNumber }}
                        @else
                            Invoice
                        @endif
                    </h4>
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $statusClasses }}">
                        {{ $statusLabels }}
                    </span>
                </div>
                
                @if($description)
                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">
                        {{ $description }}
                    </p>
                @endif
                
                <div class="flex items-center justify-between mt-3">
                    <div class="flex items-center space-x-2 text-xs text-gray-500 dark:text-gray-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <span>{{ $date ?? 'N/A' }}</span>
                    </div>
                    <div class="text-lg font-bold text-gray-900 dark:text-gray-100">
                        ${{ number_format($amount, 2) }}
                    </div>
                </div>
            </div>
            
            <div class="ml-4 flex-shrink-0">
                <svg class="w-5 h-5 text-gray-400 group-hover:text-dodger-blue-600 dark:group-hover:text-dodger-blue-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </div>
        </div>
    </div>
</a>

