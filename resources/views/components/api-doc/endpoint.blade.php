@props([
    'method' => 'GET',
    'path' => '',
    'title' => null,
    'description' => null,
    'parameters' => [],
    'requestExample' => null,
    'responseExample' => null,
    'responseStatusCode' => 200,
    'authentication' => null,
    'id' => null,
])

<div 
    @if($id) id="{{ $id }}" @endif
    class="border border-gray-200 dark:border-gray-700 rounded-xl overflow-hidden bg-white dark:bg-gray-800 scroll-mt-4"
>
    {{-- Header --}}
    <div class="px-6 py-4 bg-gradient-to-r from-gray-50/80 via-gray-50/40 to-transparent dark:from-gray-800/80 dark:via-gray-800/40 dark:to-transparent border-b border-gray-200/50 dark:border-gray-700/50">
        <div class="flex items-start justify-between gap-4">
            <div class="flex-1">
                <div class="flex items-center gap-3 mb-2">
                    <x-api-doc.method-badge :method="$method" />
                    <code class="text-base font-mono text-gray-900 dark:text-gray-100">{{ $path }}</code>
                </div>
                @if($title)
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-1">{{ $title }}</h3>
                @endif
                @if($description)
                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">{{ $description }}</p>
                @endif
            </div>
        </div>
    </div>
    
    {{-- Content --}}
    <div class="p-6 space-y-6">
        {{-- Authentication --}}
        @if($authentication)
            <div class="p-4 bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-lg">
                <div class="flex items-start gap-2">
                    <svg class="w-5 h-5 text-blue-600 dark:text-blue-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                    <div>
                        <p class="text-sm font-semibold text-blue-900 dark:text-blue-100">Authentication Required</p>
                        <p class="text-sm text-blue-700 dark:text-blue-300 mt-1">{{ $authentication }}</p>
                    </div>
                </div>
            </div>
        @endif
        
        {{-- Parameters --}}
        @if(!empty($parameters))
            <div>
                <h4 class="text-sm font-semibold text-gray-900 dark:text-gray-100 mb-3">Parameters</h4>
                <x-api-doc.parameter-table :parameters="$parameters" />
            </div>
        @endif
        
        {{-- Request Example --}}
        @if($requestExample)
            <div>
                <x-api-doc.request-example 
                    :title="$requestExample['title'] ?? 'Request Example'"
                    :method="$method"
                    :url="$requestExample['url'] ?? $path"
                    :headers="$requestExample['headers'] ?? []"
                    :body="$requestExample['body'] ?? null"
                    :queryParams="$requestExample['queryParams'] ?? []"
                />
            </div>
        @endif
        
        {{-- Response Example --}}
        @if($responseExample)
            <div>
                <x-api-doc.response-example 
                    :title="(is_array($responseExample) && isset($responseExample['title'])) ? $responseExample['title'] : 'Response Example'"
                    :statusCode="$responseStatusCode"
                    :body="(is_array($responseExample) && isset($responseExample['body'])) ? $responseExample['body'] : $responseExample"
                    :description="(is_array($responseExample) && isset($responseExample['description'])) ? $responseExample['description'] : null"
                />
            </div>
        @endif
        
        {{-- Slot for additional content --}}
        {{ $slot }}
    </div>
</div>

