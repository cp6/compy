<x-app-layout>
    <x-slot name="title">Toast/Notification Demo</x-slot>
    <x-slot name="metaDescription">A comprehensive demo of toast notification components for displaying messages.</x-slot>
    <x-slot name="metaKeywords">toast, notification, alert, components, demo</x-slot>

    <x-slot name="header">
        <x-breadcrumb :items="[
            ['label' => 'Home', 'url' => route('dashboard')],
            ['label' => 'Toast Demo', 'url' => '#'],
        ]" />
    </x-slot>

    <x-slot name="pageTitle">
        Toast/Notification Demo
    </x-slot>

    <x-slot name="pageSubtitle">
        Toast notifications for user feedback and messages
    </x-slot>

    <x-alert.alerts />

    <!-- Toast Container -->
    <div
        x-data="{
            toasts: [],
            addToast(toast) {
                this.toasts.push(toast);
            },
            removeToast(id) {
                this.toasts = this.toasts.filter(t => t.id !== id);
            },
            getToastClasses(type) {
                const colorMap = {
                    success: { bg: 'bg-green-50 dark:bg-green-900/20', border: 'border-green-200 dark:border-green-800', icon: 'text-green-600 dark:text-green-400' },
                    error: { bg: 'bg-red-50 dark:bg-red-900/20', border: 'border-red-200 dark:border-red-800', icon: 'text-red-600 dark:text-red-400' },
                    warning: { bg: 'bg-yellow-50 dark:bg-yellow-900/20', border: 'border-yellow-200 dark:border-yellow-800', icon: 'text-yellow-600 dark:text-yellow-400' },
                    info: { bg: 'bg-blue-50 dark:bg-blue-900/20', border: 'border-blue-200 dark:border-blue-800', icon: 'text-blue-600 dark:text-blue-400' }
                };
                return colorMap[type] || colorMap.info;
            }
        }"
        class="fixed top-4 right-4 z-50 flex flex-col gap-2 pointer-events-none"
        aria-live="polite"
        aria-atomic="true"
    >
        <template x-for="toast in toasts" :key="toast.id">
            <div 
                x-data="{ 
                    show: true, 
                    init() { 
                        if (toast.duration > 0) {
                            setTimeout(() => { 
                                this.show = false; 
                                setTimeout(() => this.$el.remove(), 300); 
                            }, toast.duration); 
                        }
                    }, 
                    dismiss() { 
                        this.show = false; 
                        setTimeout(() => this.$el.remove(), 300); 
                    } 
                }"
                x-show="show"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 transform translate-x-full"
                x-transition:enter-end="opacity-100 transform translate-x-0"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 transform translate-x-0"
                x-transition:leave-end="opacity-0 transform translate-x-full"
                :class="'max-w-sm w-full border rounded-lg shadow-lg p-4 pointer-events-auto ' + getToastClasses(toast.type).bg + ' ' + getToastClasses(toast.type).border"
                role="alert"
                :data-toast-id="toast.id"
            >
                <div class="flex items-start gap-3">
                    <div :class="'flex-shrink-0 ' + getToastClasses(toast.type).icon">
                        <template x-if="toast.type === 'success'">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                        </template>
                        <template x-if="toast.type === 'error'">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </template>
                        <template x-if="toast.type === 'warning'">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                        </template>
                        <template x-if="toast.type === 'info' || !toast.type">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </template>
                    </div>
                    <div class="flex-1 min-w-0">
                        <h4 x-show="toast.title" class="text-sm font-semibold text-gray-900 dark:text-gray-100 mb-1" x-text="toast.title"></h4>
                        <p class="text-sm text-gray-700 dark:text-gray-300" x-text="toast.message"></p>
                    </div>
                    <button 
                        x-show="toast.dismissible !== false"
                        @click="dismiss()" 
                        class="flex-shrink-0 text-gray-400 hover:text-gray-600 dark:hover:text-gray-200 transition-colors"
                    >
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </template>
    </div>

    <div class="space-y-8">
        <!-- Toast Types -->
        <section>
            <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-4">Toast Types</h2>
            <x-card.card variant="gradient">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <button
                        onclick="showToast('success', 'Success!', 'Your changes have been saved successfully.')"
                        class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors"
                    >
                        Show Success Toast
                    </button>
                    <button
                        onclick="showToast('error', 'Error!', 'Something went wrong. Please try again.')"
                        class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors"
                    >
                        Show Error Toast
                    </button>
                    <button
                        onclick="showToast('warning', 'Warning!', 'Please review your input before proceeding.')"
                        class="px-4 py-2 bg-yellow-600 text-white rounded-lg hover:bg-yellow-700 transition-colors"
                    >
                        Show Warning Toast
                    </button>
                    <button
                        onclick="showToast('info', 'Information', 'Here is some useful information for you.')"
                        class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors"
                    >
                        Show Info Toast
                    </button>
                </div>
            </x-card.card>
        </section>

        <!-- Toast Examples -->
        <section>
            <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-4">Toast Examples</h2>
            <x-card.card variant="gradient">
                <div class="space-y-4">
                    <div>
                        <h3 class="font-medium text-gray-900 dark:text-gray-100 mb-2">Simple Toast</h3>
                        <button
                            onclick="showToast('info', null, 'This is a simple toast message without a title.')"
                            class="px-4 py-2 bg-dodger-blue-600 text-white rounded-lg hover:bg-dodger-blue-700 transition-colors"
                        >
                            Show Simple Toast
                        </button>
                    </div>

                    <div>
                        <h3 class="font-medium text-gray-900 dark:text-gray-100 mb-2">Long Duration Toast</h3>
                        <button
                            onclick="showToast('info', 'Long Toast', 'This toast will stay visible for 10 seconds.', 10000)"
                            class="px-4 py-2 bg-dodger-blue-600 text-white rounded-lg hover:bg-dodger-blue-700 transition-colors"
                        >
                            Show Long Duration Toast
                        </button>
                    </div>

                    <div>
                        <h3 class="font-medium text-gray-900 dark:text-gray-100 mb-2">Persistent Toast</h3>
                        <button
                            onclick="showToast('warning', 'Persistent', 'This toast will not auto-dismiss. You must close it manually.', 0)"
                            class="px-4 py-2 bg-yellow-600 text-white rounded-lg hover:bg-yellow-700 transition-colors"
                        >
                            Show Persistent Toast
                        </button>
                    </div>

                    <div>
                        <h3 class="font-medium text-gray-900 dark:text-gray-100 mb-2">Multiple Toasts</h3>
                        <button
                            onclick="showMultipleToasts()"
                            class="px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition-colors"
                        >
                            Show Multiple Toasts
                        </button>
                    </div>
                </div>
            </x-card.card>
        </section>
    </div>

    @push('scripts')
    <script>
        function showToast(type, title, message, duration = 5000) {
            const container = document.querySelector('[x-data*="toasts"]');
            if (!container) return;
            
            const toastId = 'toast-' + Date.now();
            const toast = {
                id: toastId,
                type: type,
                title: title,
                message: message,
                duration: duration,
                dismissible: true
            };
            
            // Get Alpine data
            if (window.Alpine) {
                const data = Alpine.$data(container);
                if (data && data.addToast) {
                    data.addToast(toast);
                    return;
                }
            }
            
            // Fallback: create toast element directly
            const toastElement = document.createElement('div');
            toastElement.className = 'pointer-events-auto';
            const bgColor = type === 'success' ? 'green' : type === 'error' ? 'red' : type === 'warning' ? 'yellow' : 'blue';
            toastElement.innerHTML = `
                <div x-data="{ show: true, init() { if (${duration} > 0) setTimeout(() => { this.show = false; setTimeout(() => this.$el.remove(), 300); }, ${duration}); }, dismiss() { this.show = false; setTimeout(() => this.$el.remove(), 300); } }" 
                     x-show="show" 
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0 transform translate-x-full"
                     x-transition:enter-end="opacity-100 transform translate-x-0"
                     x-transition:leave="transition ease-in duration-200"
                     x-transition:leave-start="opacity-100 transform translate-x-0"
                     x-transition:leave-end="opacity-0 transform translate-x-full"
                     class="max-w-sm w-full border rounded-lg shadow-lg p-4 bg-${bgColor}-50 dark:bg-${bgColor}-900/20 border-${bgColor}-200 dark:border-${bgColor}-800">
                    <div class="flex items-start gap-3">
                        <div class="flex-1">
                            ${title ? `<h4 class="text-sm font-semibold text-gray-900 dark:text-gray-100 mb-1">${title}</h4>` : ''}
                            <p class="text-sm text-gray-700 dark:text-gray-300">${message}</p>
                        </div>
                        <button @click="dismiss()" class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-200 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            `;
            container.appendChild(toastElement);
        }

        function showMultipleToasts() {
            setTimeout(() => showToast('success', 'First', 'First toast message'), 0);
            setTimeout(() => showToast('info', 'Second', 'Second toast message'), 300);
            setTimeout(() => showToast('warning', 'Third', 'Third toast message'), 600);
        }
    </script>
    @endpush
</x-app-layout>

