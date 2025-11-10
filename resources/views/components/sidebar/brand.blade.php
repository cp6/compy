@props(['href' => '/', 'logo' => null, 'name' => null])

<div class="flex items-center mb-6 px-2">
    <a href="{{ $href }}" class="flex items-center space-x-3">
        @if($logo)
            <div class="flex-shrink-0">
                {{ $logo }}
            </div>
        @else
            <div class="flex-shrink-0 w-8 h-8 bg-purple-600 rounded flex items-center justify-center">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                </svg>
            </div>
        @endif
        
        @if($name)
            <span class="text-lg font-semibold text-gray-900 dark:text-white">
                {{ $name }}
            </span>
        @endif
    </a>
</div>

