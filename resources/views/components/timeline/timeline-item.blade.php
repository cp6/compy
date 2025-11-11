@props([
    'title' => '',
    'description' => null,
    'timestamp' => null,
    'icon' => null,
    'color' => 'dodger-blue', // 'dodger-blue', 'green', 'red', 'yellow', 'purple', 'gray'
    'status' => 'default', // 'default', 'success', 'error', 'warning', 'pending'
])

@php
    // Icon background colors (subtle, not full colored circles)
    $iconBgClasses = match($color) {
        'green' => 'bg-green-50 dark:bg-green-900/20 border-green-200 dark:border-green-800 text-green-600 dark:text-green-400',
        'red' => 'bg-red-50 dark:bg-red-900/20 border-red-200 dark:border-red-800 text-red-600 dark:text-red-400',
        'yellow' => 'bg-yellow-50 dark:bg-yellow-900/20 border-yellow-200 dark:border-yellow-800 text-yellow-600 dark:text-yellow-400',
        'purple' => 'bg-purple-50 dark:bg-purple-900/20 border-purple-200 dark:border-purple-800 text-purple-600 dark:text-purple-400',
        'gray' => 'bg-gray-50 dark:bg-gray-800 border-gray-200 dark:border-gray-700 text-gray-600 dark:text-gray-400',
        default => 'bg-dodger-blue-50 dark:bg-dodger-blue-900/20 border-dodger-blue-200 dark:border-dodger-blue-800 text-dodger-blue-600 dark:text-dodger-blue-400',
    };
    
    // Dot colors (for when no icon is provided)
    $dotColorClasses = match($color) {
        'green' => 'bg-green-500 border-green-500',
        'red' => 'bg-red-500 border-red-500',
        'yellow' => 'bg-yellow-500 border-yellow-500',
        'purple' => 'bg-purple-500 border-purple-500',
        'gray' => 'bg-gray-500 border-gray-500',
        default => 'bg-dodger-blue-500 border-dodger-blue-500',
    };
    
    $lineColorClasses = match($color) {
        'green' => 'bg-gradient-to-b from-green-200 dark:from-green-800/50 to-green-100 dark:to-green-900/30',
        'red' => 'bg-gradient-to-b from-red-200 dark:from-red-800/50 to-red-100 dark:to-red-900/30',
        'yellow' => 'bg-gradient-to-b from-yellow-200 dark:from-yellow-800/50 to-yellow-100 dark:to-yellow-900/30',
        'purple' => 'bg-gradient-to-b from-purple-200 dark:from-purple-800/50 to-purple-100 dark:to-purple-900/30',
        'gray' => 'bg-gradient-to-b from-gray-200 dark:from-gray-700 to-gray-100 dark:to-gray-800/50',
        default => 'bg-gradient-to-b from-dodger-blue-200 dark:from-dodger-blue-800/50 to-dodger-blue-100 dark:to-dodger-blue-900/30',
    };
    
    $statusIcon = match($status) {
        'success' => '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>',
        'error' => '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>',
        'warning' => '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" /></svg>',
        'pending' => '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>',
        default => null,
    };
    
    $hasIcon = $icon || $statusIcon;
@endphp

<div class="timeline-item flex gap-5 relative group">
    <!-- Timeline Line & Marker -->
    <div class="flex flex-col items-center relative flex-shrink-0 w-10 h-full">
        <!-- Marker Container - ensures consistent centering -->
        <div class="relative z-10 flex items-center justify-center w-10 h-10 flex-shrink-0">
            @if($hasIcon)
                <!-- Icon with subtle background -->
                <div class="w-10 h-10 rounded-lg {{ $iconBgClasses }} border flex items-center justify-center flex-shrink-0 shadow-sm transition-all duration-200 group-hover:scale-105 group-hover:shadow-md">
                    @if($icon)
                        <span>
                            {!! $icon !!}
                        </span>
                    @else
                        <span>
                            {!! $statusIcon !!}
                        </span>
                    @endif
                </div>
            @else
                <!-- Simple colored dot - centered in same space -->
                <div class="w-3 h-3 rounded-full {{ $dotColorClasses }} border-2 flex items-center justify-center flex-shrink-0 shadow-sm transition-all duration-200 group-hover:scale-125">
                </div>
            @endif
        </div>
        <!-- Line - extends from bottom of marker down to fill remaining space -->
        <div class="timeline-line absolute top-10 left-1/2 -translate-x-1/2 w-0.5 {{ $lineColorClasses }} rounded-full bottom-0"></div>
    </div>
    
    <!-- Content -->
    <div class="flex-1 pb-8 pt-0.5 min-h-[2.5rem]">
        <div class="flex items-start justify-between gap-4 mb-2">
            <h4 class="font-semibold text-base text-gray-900 dark:text-gray-100 leading-tight">
                {{ $title }}
            </h4>
            @if($timestamp)
                <span class="text-xs font-medium text-gray-500 dark:text-gray-400 whitespace-nowrap mt-0.5">
                    {{ $timestamp }}
                </span>
            @endif
        </div>
        @if($description)
            <p class="text-sm text-gray-600 dark:text-gray-400 leading-relaxed">
                {{ $description }}
            </p>
        @endif
        @if(isset($slot) && trim($slot))
            <div class="mt-3">
                {{ $slot }}
            </div>
        @endif
    </div>
</div>

