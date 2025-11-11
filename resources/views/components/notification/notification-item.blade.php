@props([
    'id' => null,
    'type' => 'info', // 'info', 'success', 'warning', 'error', 'system'
    'title' => '',
    'message' => '',
    'time' => null,
    'read' => false,
    'actionUrl' => null,
    'actionLabel' => null,
    'icon' => null,
    'avatar' => null,
    'dismissible' => true,
])

@php
    if (!$id) {
        $id = 'notification-' . uniqid();
    }
    
    $typeConfig = match($type) {
        'success' => [
            'bg' => 'bg-green-50 dark:bg-green-900/20',
            'border' => 'border-green-200 dark:border-green-800',
            'iconColor' => 'text-green-600 dark:text-green-400',
            'icon' => '<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>',
        ],
        'error' => [
            'bg' => 'bg-red-50 dark:bg-red-900/20',
            'border' => 'border-red-200 dark:border-red-800',
            'iconColor' => 'text-red-600 dark:text-red-400',
            'icon' => '<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>',
        ],
        'warning' => [
            'bg' => 'bg-yellow-50 dark:bg-yellow-900/20',
            'border' => 'border-yellow-200 dark:border-yellow-800',
            'iconColor' => 'text-yellow-600 dark:text-yellow-400',
            'icon' => '<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" /></svg>',
        ],
        'system' => [
            'bg' => 'bg-purple-50 dark:bg-purple-900/20',
            'border' => 'border-purple-200 dark:border-purple-800',
            'iconColor' => 'text-purple-600 dark:text-purple-400',
            'icon' => '<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /></svg>',
        ],
        default => [
            'bg' => 'bg-blue-50 dark:bg-blue-900/20',
            'border' => 'border-blue-200 dark:border-blue-800',
            'iconColor' => 'text-blue-600 dark:text-blue-400',
            'icon' => '<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>',
        ],
    };
    
    $readClasses = $read 
        ? 'bg-white dark:bg-gray-800 opacity-75' 
        : 'bg-white dark:bg-gray-800';
    
    $timeDisplay = $time 
        ? \Carbon\Carbon::parse($time)->diffForHumans() 
        : 'Just now';
@endphp

<div 
    x-data="{ 
        read: {{ $read ? 'true' : 'false' }},
        dismiss() {
            this.read = true;
            this.$dispatch('notification-dismissed', { id: '{{ $id }}' });
        },
        markAsRead() {
            if (!this.read) {
                this.read = true;
                this.$dispatch('notification-read', { id: '{{ $id }}' });
            }
        }
    }"
    @click="markAsRead()"
    class="notification-item group relative p-4 border-l-4 {{ $typeConfig['border'] }} {{ $readClasses }} hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-all duration-200 cursor-pointer {{ $attributes->get('class') }}"
    data-notification-id="{{ $id }}"
    data-notification-type="{{ $type }}"
    x-bind:class="{ 'opacity-75': read }"
>
    <div class="flex items-start gap-3">
        @if($avatar)
            <div class="flex-shrink-0">
                <img src="{{ $avatar }}" alt="" class="w-10 h-10 rounded-full object-cover">
            </div>
        @elseif($icon)
            <div class="flex-shrink-0 {{ $typeConfig['iconColor'] }}">
                {!! $icon !!}
            </div>
        @else
            <div class="flex-shrink-0 w-10 h-10 rounded-full {{ $typeConfig['bg'] }} flex items-center justify-center {{ $typeConfig['iconColor'] }}">
                <div class="w-5 h-5">
                    {!! $typeConfig['icon'] !!}
                </div>
            </div>
        @endif
        
        <div class="flex-1 min-w-0">
            <div class="flex items-start justify-between gap-2">
                <div class="flex-1 min-w-0">
                    @if($title)
                        <h4 class="text-sm font-semibold text-gray-900 dark:text-gray-100 mb-1">
                            {{ $title }}
                        </h4>
                    @endif
                    <p class="text-sm text-gray-600 dark:text-gray-400 line-clamp-2">
                        {{ $message }}
                    </p>
                    <div class="flex items-center gap-3 mt-2">
                        <span class="text-xs text-gray-500 dark:text-gray-500">
                            {{ $timeDisplay }}
                        </span>
                        @if($actionUrl && $actionLabel)
                            <a 
                                href="{{ $actionUrl }}" 
                                class="text-xs font-medium text-dodger-blue-600 dark:text-dodger-blue-400 hover:text-dodger-blue-700 dark:hover:text-dodger-blue-300"
                                onclick="event.stopPropagation()"
                            >
                                {{ $actionLabel }}
                            </a>
                        @endif
                    </div>
                </div>
                
                @if($dismissible)
                    <button
                        @click.stop="dismiss()"
                        class="flex-shrink-0 opacity-0 group-hover:opacity-100 transition-opacity text-gray-400 hover:text-gray-600 dark:hover:text-gray-200 p-1"
                        title="Dismiss"
                    >
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                @endif
            </div>
        </div>
        
        @if(!$read)
            <div class="flex-shrink-0 mt-1">
                <div class="w-2 h-2 rounded-full bg-dodger-blue-500"></div>
            </div>
        @endif
    </div>
</div>

