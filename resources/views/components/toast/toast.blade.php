@props([
    'id' => null,
    'type' => 'info', // 'success', 'error', 'warning', 'info'
    'title' => null,
    'message' => '',
    'duration' => 5000,
    'dismissible' => true,
])

@php
    if (!$id) {
        $id = 'toast-' . uniqid();
    }
    
    $typeClasses = match($type) {
        'success' => 'bg-green-50 dark:bg-green-900/20 border-green-200 dark:border-green-800',
        'error' => 'bg-red-50 dark:bg-red-900/20 border-red-200 dark:border-red-800',
        'warning' => 'bg-yellow-50 dark:bg-yellow-900/20 border-yellow-200 dark:border-yellow-800',
        default => 'bg-blue-50 dark:bg-blue-900/20 border-blue-200 dark:border-blue-800',
    };
    
    $iconClasses = match($type) {
        'success' => 'text-green-600 dark:text-green-400',
        'error' => 'text-red-600 dark:text-red-400',
        'warning' => 'text-yellow-600 dark:text-yellow-400',
        default => 'text-blue-600 dark:text-blue-400',
    };
    
    $icon = match($type) {
        'success' => '<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>',
        'error' => '<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>',
        'warning' => '<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" /></svg>',
        default => '<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>',
    };
@endphp

<div
    x-data="{
        show: true,
        init() {
            @if($duration > 0)
                setTimeout(() => {
                    this.dismiss();
                }, {{ $duration }});
            @endif
        },
        dismiss() {
            this.show = false;
            setTimeout(() => {
                this.$el.remove();
            }, 300);
        }
    }"
    x-show="show"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 transform translate-x-full"
    x-transition:enter-end="opacity-100 transform translate-x-0"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100 transform translate-x-0"
    x-transition:leave-end="opacity-0 transform translate-x-full"
    class="toast-item max-w-sm w-full border rounded-lg shadow-lg p-4 {{ $typeClasses }}"
    role="alert"
    data-toast-id="{{ $id }}"
>
    <div class="flex items-start gap-3">
        <div class="flex-shrink-0 {{ $iconClasses }}">
            {!! $icon !!}
        </div>
        <div class="flex-1 min-w-0">
            @if($title)
                <h4 class="text-sm font-semibold text-gray-900 dark:text-gray-100 mb-1">
                    {{ $title }}
                </h4>
            @endif
            <p class="text-sm text-gray-700 dark:text-gray-300">
                {{ $message }}
            </p>
        </div>
        @if($dismissible)
            <button
                @click="dismiss()"
                class="flex-shrink-0 text-gray-400 hover:text-gray-600 dark:hover:text-gray-200 transition-colors"
            >
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        @endif
    </div>
</div>

