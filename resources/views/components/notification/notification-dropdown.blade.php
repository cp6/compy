@props([
    'notifications' => [],
    'unreadCount' => 0,
    'maxHeight' => 'max-h-96',
    'emptyMessage' => 'No notifications',
    'viewAllUrl' => null,
])

@php
    $hasNotifications = count($notifications) > 0;
@endphp

<div 
    x-data="{
        open: false,
        notifications: @js($notifications),
        unreadCount: @js($unreadCount),
        markAsRead(id) {
            const notification = this.notifications.find(n => n.id === id);
            if (notification && !notification.read) {
                notification.read = true;
                this.unreadCount = Math.max(0, this.unreadCount - 1);
            }
        },
        dismiss(id) {
            this.notifications = this.notifications.filter(n => n.id !== id);
            const notification = this.notifications.find(n => n.id === id);
            if (notification && !notification.read) {
                this.unreadCount = Math.max(0, this.unreadCount - 1);
            }
        }
    }"
    @notification-read.window="markAsRead($event.detail.id)"
    @notification-dismissed.window="dismiss($event.detail.id)"
    class="relative"
    @click.outside="open = false"
>
    <!-- Trigger Button -->
    <button
        @click="open = !open"
        class="relative inline-flex items-center p-2 text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition-colors"
        aria-label="Notifications"
    >
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
        </svg>
        
        @if($unreadCount > 0)
            <x-notification.notification-badge :count="$unreadCount" class="absolute -top-1 -right-1" />
        @endif
    </button>

    <!-- Dropdown Panel -->
    <div
        x-show="open"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        class="absolute right-0 mt-2 w-80 sm:w-96 bg-white dark:bg-gray-800 rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 z-[100]"
        style="display: none;"
    >
        <!-- Header -->
        <div class="px-4 py-3 border-b border-gray-200 dark:border-gray-700 flex items-center justify-between">
            <h3 class="text-sm font-semibold text-gray-900 dark:text-gray-100">
                Notifications
                <span x-show="unreadCount > 0" class="ml-2 text-xs font-normal text-gray-500 dark:text-gray-400">
                    (<span x-text="unreadCount"></span> unread)
                </span>
            </h3>
            @if($viewAllUrl)
                <a 
                    href="{{ $viewAllUrl }}" 
                    class="text-xs font-medium text-dodger-blue-600 dark:text-dodger-blue-400 hover:text-dodger-blue-700 dark:hover:text-dodger-blue-300"
                    onclick="open = false"
                >
                    View all
                </a>
            @endif
        </div>

        <!-- Notifications List -->
        <div class="{{ $maxHeight }} overflow-y-auto">
            <template x-if="notifications.length === 0">
                <div class="px-4 py-8 text-center">
                    <svg class="mx-auto h-12 w-12 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                    </svg>
                    <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                        {{ $emptyMessage }}
                    </p>
                </div>
            </template>
            
            <template x-for="notification in notifications" :key="notification.id">
                <div 
                    x-data="{ 
                        read: notification.read || false,
                        dismiss() {
                            this.read = true;
                            $dispatch('notification-dismissed', { id: notification.id });
                        },
                        markAsRead() {
                            if (!this.read) {
                                this.read = true;
                                $dispatch('notification-read', { id: notification.id });
                            }
                        }
                    }"
                    @click="markAsRead()"
                    class="notification-item group relative p-4 border-l-4 transition-all duration-200 cursor-pointer"
                    :class="{
                        'border-green-200 dark:border-green-800': notification.type === 'success',
                        'border-blue-200 dark:border-blue-800': notification.type === 'info' || !notification.type,
                        'border-yellow-200 dark:border-yellow-800': notification.type === 'warning',
                        'border-red-200 dark:border-red-800': notification.type === 'error',
                        'border-purple-200 dark:border-purple-800': notification.type === 'system',
                        'bg-white dark:bg-gray-800 opacity-75': read,
                        'bg-white dark:bg-gray-800': !read,
                        'hover:bg-gray-50 dark:hover:bg-gray-700/50': true
                    }"
                    data-notification-id="notification.id"
                >
                    <div class="flex items-start gap-3">
                        <template x-if="notification.avatar">
                            <div class="flex-shrink-0">
                                <img :src="notification.avatar" alt="" class="w-10 h-10 rounded-full object-cover">
                            </div>
                        </template>
                        <template x-if="!notification.avatar">
                            <div class="flex-shrink-0 w-10 h-10 rounded-full flex items-center justify-center"
                                :class="{
                                    'bg-green-50 dark:bg-green-900/20 text-green-600 dark:text-green-400': notification.type === 'success',
                                    'bg-blue-50 dark:bg-blue-900/20 text-blue-600 dark:text-blue-400': notification.type === 'info' || !notification.type,
                                    'bg-yellow-50 dark:bg-yellow-900/20 text-yellow-600 dark:text-yellow-400': notification.type === 'warning',
                                    'bg-red-50 dark:bg-red-900/20 text-red-600 dark:text-red-400': notification.type === 'error',
                                    'bg-purple-50 dark:bg-purple-900/20 text-purple-600 dark:text-purple-400': notification.type === 'system'
                                }">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" x-show="notification.type === 'success'">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" x-show="notification.type === 'error'">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" x-show="notification.type === 'warning'">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                </svg>
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" x-show="notification.type === 'system'">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" x-show="!notification.type || notification.type === 'info'">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                        </template>
                        
                        <div class="flex-1 min-w-0">
                            <div class="flex items-start justify-between gap-2">
                                <div class="flex-1 min-w-0">
                                    <template x-if="notification.title">
                                        <h4 class="text-sm font-semibold text-gray-900 dark:text-gray-100 mb-1" x-text="notification.title"></h4>
                                    </template>
                                    <p class="text-sm text-gray-600 dark:text-gray-400 line-clamp-2" x-text="notification.message || ''"></p>
                                    <div class="flex items-center gap-3 mt-2">
                                        <span class="text-xs text-gray-500 dark:text-gray-500" x-text="notification.time || 'Just now'"></span>
                                        <template x-if="notification.actionUrl && notification.actionLabel">
                                            <a 
                                                :href="notification.actionUrl" 
                                                class="text-xs font-medium text-dodger-blue-600 dark:text-dodger-blue-400 hover:text-dodger-blue-700 dark:hover:text-dodger-blue-300"
                                                @click.stop
                                            >
                                                <span x-text="notification.actionLabel"></span>
                                            </a>
                                        </template>
                                    </div>
                                </div>
                                
                                <template x-if="notification.dismissible !== false">
                                    <button
                                        @click.stop="dismiss()"
                                        class="flex-shrink-0 opacity-0 group-hover:opacity-100 transition-opacity text-gray-400 hover:text-gray-600 dark:hover:text-gray-200 p-1"
                                        title="Dismiss"
                                    >
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </template>
                            </div>
                        </div>
                        
                        <template x-if="!read">
                            <div class="flex-shrink-0 mt-1">
                                <div class="w-2 h-2 rounded-full bg-dodger-blue-500"></div>
                            </div>
                        </template>
                    </div>
                </div>
            </template>
        </div>

        <!-- Footer Actions -->
        @if($hasNotifications && $viewAllUrl)
            <div class="px-4 py-2 border-t border-gray-200 dark:border-gray-700">
                <a 
                    href="{{ $viewAllUrl }}" 
                    class="block w-full text-center text-sm font-medium text-dodger-blue-600 dark:text-dodger-blue-400 hover:text-dodger-blue-700 dark:hover:text-dodger-blue-300 py-2"
                    onclick="open = false"
                >
                    View all notifications
                </a>
            </div>
        @endif
    </div>
</div>

