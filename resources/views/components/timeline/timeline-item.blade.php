@props([
    'title' => '',
    'description' => null,
    'timestamp' => null,
    'icon' => null,
    'color' => 'dodger-blue', // 'dodger-blue', 'green', 'red', 'yellow', 'purple', 'gray'
    'status' => 'default', // 'default', 'success', 'error', 'warning', 'pending'
])

@php
    $colorClasses = match($color) {
        'green' => 'bg-green-500 border-green-500 text-white',
        'red' => 'bg-red-500 border-red-500 text-white',
        'yellow' => 'bg-yellow-500 border-yellow-500 text-white',
        'purple' => 'bg-purple-500 border-purple-500 text-white',
        'gray' => 'bg-gray-500 border-gray-500 text-white',
        default => 'bg-dodger-blue-500 border-dodger-blue-500 text-white',
    };
    
    $statusIcon = match($status) {
        'success' => '<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>',
        'error' => '<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>',
        'warning' => '<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" /></svg>',
        'pending' => '<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>',
        default => null,
    };
@endphp

<div class="timeline-item flex gap-4 relative">
    <!-- Timeline Line -->
    <div class="flex flex-col items-center">
        <div class="w-10 h-10 rounded-full border-2 {{ $colorClasses }} flex items-center justify-center flex-shrink-0 z-10">
            @if($icon)
                <span class="text-sm">
                    {!! $icon !!}
                </span>
            @elseif($statusIcon)
                <span class="text-sm">
                    {!! $statusIcon !!}
                </span>
            @else
                <div class="w-2 h-2 rounded-full bg-current"></div>
            @endif
        </div>
        <div class="flex-1 w-0.5 bg-gray-200 dark:bg-gray-700 mt-2"></div>
    </div>
    
    <!-- Content -->
    <div class="flex-1 pb-6">
        <div class="flex items-start justify-between gap-4 mb-1">
            <h4 class="font-semibold text-gray-900 dark:text-gray-100">
                {{ $title }}
            </h4>
            @if($timestamp)
                <span class="text-xs text-gray-500 dark:text-gray-400 whitespace-nowrap">
                    {{ $timestamp }}
                </span>
            @endif
        </div>
        @if($description)
            <p class="text-sm text-gray-600 dark:text-gray-400">
                {{ $description }}
            </p>
        @endif
        @if(isset($slot) && trim($slot))
            <div class="mt-2">
                {{ $slot }}
            </div>
        @endif
    </div>
</div>

