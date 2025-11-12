@props([
    'title' => 'Response Example',
    'statusCode' => 200,
    'body' => [],
    'description' => null,
])

@php
    $statusColors = match(true) {
        $statusCode >= 200 && $statusCode < 300 => 'bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400',
        $statusCode >= 300 && $statusCode < 400 => 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900/30 dark:text-yellow-400',
        $statusCode >= 400 => 'bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-400',
        default => 'bg-gray-100 text-gray-800 dark:bg-gray-900/30 dark:text-gray-400',
    };
@endphp

<div class="space-y-4">
    <div class="flex items-center justify-between">
        <h4 class="text-sm font-semibold text-gray-900 dark:text-gray-100">{{ $title }}</h4>
        <span class="inline-flex items-center px-2.5 py-0.5 rounded-md text-xs font-semibold font-mono {{ $statusColors }}">
            {{ $statusCode }}
        </span>
    </div>
    
    @if($description)
        <p class="text-sm text-gray-600 dark:text-gray-400">{{ $description }}</p>
    @endif
    
    <div class="bg-gray-900 dark:bg-gray-950 rounded-lg p-4 overflow-x-auto">
        <pre class="text-sm text-gray-300 dark:text-gray-200 font-mono"><code>{{ is_string($body) ? $body : json_encode($body, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) }}</code></pre>
    </div>
</div>

