@props([
    'position' => 'top-right', // 'top-right', 'top-left', 'bottom-right', 'bottom-left', 'top-center', 'bottom-center'
])

@php
    $positionClasses = match($position) {
        'top-right' => 'top-4 right-4',
        'top-left' => 'top-4 left-4',
        'bottom-right' => 'bottom-4 right-4',
        'bottom-left' => 'bottom-4 left-4',
        'top-center' => 'top-4 left-1/2 -translate-x-1/2',
        'bottom-center' => 'bottom-4 left-1/2 -translate-x-1/2',
        default => 'top-4 right-4',
    };
@endphp

<div
    x-data="{
        toasts: [],
        addToast(toast) {
            this.toasts.push(toast);
        },
        removeToast(id) {
            this.toasts = this.toasts.filter(t => t.id !== id);
        }
    }"
    class="fixed {{ $positionClasses }} z-50 flex flex-col gap-2 pointer-events-none"
    aria-live="polite"
    aria-atomic="true"
    {{ $attributes }}
>
    <template x-for="toast in toasts" :key="toast.id">
        <div class="pointer-events-auto">
            <x-toast.toast
                :id="toast.id"
                :type="toast.type"
                :title="toast.title"
                :message="toast.message"
                :duration="toast.duration"
                :dismissible="toast.dismissible"
            />
        </div>
    </template>
    {{ $slot }}
</div>

