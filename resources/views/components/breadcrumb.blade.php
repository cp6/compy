@props([
    'items' => [],
])

@php
    // Ensure items is an array
    if (!is_array($items)) {
        $items = [];
    }
    
    // Default home item if not provided
    if (empty($items) || !isset($items[0]) || $items[0]['label'] !== 'Home') {
        array_unshift($items, [
            'label' => 'Home',
            'url' => route('dashboard'),
        ]);
    }
@endphp

<nav aria-label="Breadcrumb" class="flex items-center space-x-2 text-sm">
    @foreach($items as $index => $item)
        @if($index > 0)
            <svg class="w-4 h-4 text-gray-400 dark:text-gray-500 flex-shrink-0 mx-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        @endif
        
        @if(isset($item['url']) && $index < count($items) - 1)
            <a 
                href="{{ $item['url'] }}" 
                class="text-gray-600 dark:text-gray-400 hover:text-emerald-600 dark:hover:text-emerald-400 transition-colors duration-200 font-medium"
            >
                {{ $item['label'] }}
            </a>
        @else
            <span class="text-gray-900 dark:text-gray-100 font-semibold" aria-current="page">
                {{ $item['label'] }}
            </span>
        @endif
    @endforeach
</nav>

