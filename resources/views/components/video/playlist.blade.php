@props([
    'videos' => [],
    'currentIndex' => 0,
])

<div class="space-y-2">
    @foreach($videos as $index => $video)
        <div 
            x-data="{ 
                isActive: {{ $index === $currentIndex ? 'true' : 'false' }},
                hover: false
            }"
            @click="$dispatch('video-selected', { index: {{ $index }}, video: @js($video) })"
            class="flex items-center gap-3 p-3 rounded-lg cursor-pointer transition-all duration-200"
            :class="isActive ? 'bg-dodger-blue-50 dark:bg-dodger-blue-900/20 border border-dodger-blue-200 dark:border-dodger-blue-800' : 'bg-gray-50 dark:bg-gray-800/50 hover:bg-gray-100 dark:hover:bg-gray-800 border border-gray-200 dark:border-gray-700'"
            @mouseenter="hover = true"
            @mouseleave="hover = false"
        >
            <!-- Thumbnail -->
            <div class="relative flex-shrink-0 w-24 h-16 rounded overflow-hidden bg-gray-200 dark:bg-gray-700">
                @if(isset($video['thumbnail']))
                    <img src="{{ $video['thumbnail'] }}" alt="{{ $video['title'] ?? 'Video thumbnail' }}" class="w-full h-full object-cover">
                @else
                    <div class="w-full h-full flex items-center justify-center">
                        <svg class="w-8 h-8 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M8 5v14l11-7z"/>
                        </svg>
                    </div>
                @endif
                
                <!-- Duration Badge -->
                @if(isset($video['duration']))
                    <div class="absolute bottom-1 right-1 px-1.5 py-0.5 bg-black/75 text-white text-xs rounded">
                        {{ $video['duration'] }}
                    </div>
                @endif
                
                <!-- Play Overlay -->
                <div 
                    x-show="hover || isActive"
                    x-transition
                    class="absolute inset-0 bg-black/40 flex items-center justify-center"
                >
                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M8 5v14l11-7z"/>
                    </svg>
                </div>
            </div>
            
            <!-- Video Info -->
            <div class="flex-1 min-w-0">
                <h4 class="text-sm font-semibold text-gray-900 dark:text-gray-100 truncate">
                    {{ $video['title'] ?? 'Untitled Video' }}
                </h4>
                @if(isset($video['author']))
                    <p class="text-xs text-gray-600 dark:text-gray-400 mt-0.5">
                        {{ $video['author'] }}
                    </p>
                @endif
                @if(isset($video['views']))
                    <p class="text-xs text-gray-500 dark:text-gray-500 mt-0.5">
                        {{ number_format($video['views']) }} views
                    </p>
                @endif
            </div>
            
            <!-- Active Indicator -->
            <div 
                x-show="isActive"
                class="flex-shrink-0 w-2 h-2 rounded-full bg-dodger-blue-500"
            ></div>
        </div>
    @endforeach
</div>

