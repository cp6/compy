@props([
    'type' => 'success', // 'success', 'error', 'warning', 'info'
    'dismissible' => true,
    'message' => null,
])

@php
    $typeClasses = match($type) {
        'error' => 'bg-red-50 dark:bg-red-900/20 border-red-200 dark:border-red-800 text-red-800 dark:text-red-200',
        'warning' => 'bg-yellow-50 dark:bg-yellow-900/20 border-yellow-200 dark:border-yellow-800 text-yellow-800 dark:text-yellow-200',
        'info' => 'bg-blue-50 dark:bg-blue-900/20 border-blue-200 dark:border-blue-800 text-blue-800 dark:text-blue-200',
        default => 'bg-dodger-blue-50 dark:bg-dodger-blue-900/20 border-dodger-blue-200 dark:border-dodger-blue-800 text-dodger-blue-800 dark:text-dodger-blue-200',
    };
    
    $iconClasses = match($type) {
        'error' => 'text-red-400 dark:text-red-500',
        'warning' => 'text-yellow-400 dark:text-yellow-500',
        'info' => 'text-blue-400 dark:text-blue-500',
        default => 'text-dodger-blue-400 dark:text-dodger-blue-500',
    };
    
    $icons = match($type) {
        'error' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>',
        'warning' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>',
        'info' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>',
        default => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>',
    };
    
    $uniqueId = uniqid('alert_');
@endphp

<div 
    id="{{ $uniqueId }}"
    x-data="{ show: true }"
    x-show="show"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 transform translate-y-2"
    x-transition:enter-end="opacity-100 transform translate-y-0"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100 transform translate-y-0"
    x-transition:leave-end="opacity-0 transform translate-y-2"
    class="rounded-xl border {{ $typeClasses }} p-4 shadow-sm"
    role="alert"
>
    <div class="flex items-center">
        <div class="flex-shrink-0">
            <svg class="h-5 w-5 {{ $iconClasses }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                {!! $icons !!}
            </svg>
        </div>
        <div class="ml-3 flex-1">
            <p class="text-sm font-medium">
                {{ $message ?? $slot }}
            </p>
        </div>
        @if($dismissible)
            <div class="ml-3 flex-shrink-0">
                <button
                    @click="show = false"
                    class="inline-flex rounded-md p-1.5 {{ $iconClasses }} hover:bg-opacity-20 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-transparent transition-colors"
                >
                    <span class="sr-only">Dismiss</span>
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        @endif
    </div>
</div>

