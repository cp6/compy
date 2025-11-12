@props([
    'title' => 'Request Example',
    'method' => 'GET',
    'url' => '',
    'headers' => [],
    'body' => null,
    'queryParams' => [],
])

<div class="space-y-4">
    <h4 class="text-sm font-semibold text-gray-900 dark:text-gray-100">{{ $title }}</h4>
    
    {{-- URL --}}
    <div>
        <p class="text-xs font-semibold text-gray-700 dark:text-gray-300 mb-1">URL</p>
        <div class="bg-gray-50 dark:bg-gray-950 rounded-lg p-4 overflow-x-auto border border-gray-200 dark:border-gray-800">
            <code class="text-sm text-green-600 dark:text-green-400 font-mono">
                <span class="text-gray-600 dark:text-gray-400">{{ strtoupper($method) }}</span> {{ $url }}
            </code>
        </div>
    </div>
    
    {{-- Query Parameters --}}
    @if(!empty($queryParams))
        <div>
            <p class="text-xs font-semibold text-gray-700 dark:text-gray-300 mb-1">Query Parameters</p>
            <div class="bg-gray-50 dark:bg-gray-950 rounded-lg p-4 overflow-x-auto border border-gray-200 dark:border-gray-800">
                <code class="text-sm text-gray-800 dark:text-gray-200 font-mono">
                    {{ $url }}?{{ http_build_query($queryParams) }}
                </code>
            </div>
        </div>
    @endif
    
    {{-- Headers --}}
    @if(!empty($headers))
        <div>
            <p class="text-xs font-semibold text-gray-700 dark:text-gray-300 mb-1">Headers</p>
            <div class="bg-gray-50 dark:bg-gray-950 rounded-lg p-4 overflow-x-auto border border-gray-200 dark:border-gray-800">
                <pre class="text-sm text-gray-800 dark:text-gray-200 font-mono"><code>@foreach($headers as $key => $value){{ $key }}: {{ $value }}
@endforeach</code></pre>
            </div>
        </div>
    @endif
    
    {{-- Request Body --}}
    @if($body !== null)
        <div>
            <p class="text-xs font-semibold text-gray-700 dark:text-gray-300 mb-1">Request Body</p>
            <div class="bg-gray-50 dark:bg-gray-950 rounded-lg p-4 overflow-x-auto border border-gray-200 dark:border-gray-800">
                <pre class="text-sm text-gray-800 dark:text-gray-200 font-mono"><code>{{ is_string($body) ? $body : json_encode($body, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) }}</code></pre>
            </div>
        </div>
    @endif
</div>

