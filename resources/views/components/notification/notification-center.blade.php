@props([
    'notifications' => [],
    'categories' => ['all' => 'All', 'unread' => 'Unread', 'read' => 'Read'],
    'types' => ['all' => 'All Types', 'info' => 'Info', 'success' => 'Success', 'warning' => 'Warning', 'error' => 'Error', 'system' => 'System'],
    'emptyMessage' => 'No notifications found',
])

<div 
    x-data="{
        notifications: @js($notifications),
        filteredNotifications: @js($notifications),
        selectedCategory: 'all',
        selectedType: 'all',
        searchQuery: '',
        
        init() {
            this.filterNotifications();
        },
        
        filterNotifications() {
            let filtered = this.notifications;
            
            // Filter by category
            if (this.selectedCategory === 'unread') {
                filtered = filtered.filter(n => !n.read);
            } else if (this.selectedCategory === 'read') {
                filtered = filtered.filter(n => n.read);
            }
            
            // Filter by type
            if (this.selectedType !== 'all') {
                filtered = filtered.filter(n => n.type === this.selectedType);
            }
            
            // Filter by search query
            if (this.searchQuery) {
                const query = this.searchQuery.toLowerCase();
                filtered = filtered.filter(n => 
                    (n.title && n.title.toLowerCase().includes(query)) ||
                    (n.message && n.message.toLowerCase().includes(query))
                );
            }
            
            this.filteredNotifications = filtered;
        },
        
        markAsRead(id) {
            const notification = this.notifications.find(n => n.id === id);
            if (notification && !notification.read) {
                notification.read = true;
                this.filterNotifications();
            }
        },
        
        markAllAsRead() {
            this.notifications.forEach(n => n.read = true);
            this.filterNotifications();
        },
        
        dismiss(id) {
            this.notifications = this.notifications.filter(n => n.id !== id);
            this.filterNotifications();
        },
        
        clearAll() {
            this.notifications = [];
            this.filteredNotifications = [];
        },
        
        getUnreadCount() {
            return this.notifications.filter(n => !n.read).length;
        }
    }"
    @notification-read.window="markAsRead($event.detail.id)"
    @notification-dismissed.window="dismiss($event.detail.id)"
    class="space-y-6"
>
    <!-- Header with Actions -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100">
                Notifications
            </h2>
            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                <span x-text="getUnreadCount()"></span> unread notifications
            </p>
        </div>
        
        <div class="flex items-center gap-2">
            <button
                @click="markAllAsRead()"
                x-show="getUnreadCount() > 0"
                class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors"
            >
                Mark all as read
            </button>
            <button
                @click="clearAll()"
                x-show="notifications.length > 0"
                class="px-4 py-2 text-sm font-medium text-red-700 dark:text-red-400 bg-white dark:bg-gray-800 border border-red-300 dark:border-red-600 rounded-lg hover:bg-red-50 dark:hover:bg-red-900/20 transition-colors"
            >
                Clear all
            </button>
        </div>
    </div>

    <!-- Filters -->
    <x-card.card>
        <div class="space-y-4">
            <!-- Search -->
            <div>
                <label for="notification-search" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    Search
                </label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <input
                        type="text"
                        id="notification-search"
                        x-model="searchQuery"
                        @input.debounce.300ms="filterNotifications()"
                        placeholder="Search notifications..."
                        class="block w-full pl-10 pr-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 placeholder-gray-500 dark:placeholder-gray-400 focus:ring-2 focus:ring-dodger-blue-500 focus:border-dodger-blue-500"
                    >
                </div>
            </div>

            <!-- Category and Type Filters -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label for="notification-category" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Category
                    </label>
                    <select
                        id="notification-category"
                        x-model="selectedCategory"
                        @change="filterNotifications()"
                        class="block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-dodger-blue-500 focus:border-dodger-blue-500"
                    >
                        @foreach($categories as $value => $label)
                            <option value="{{ $value }}">{{ $label }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="notification-type" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Type
                    </label>
                    <select
                        id="notification-type"
                        x-model="selectedType"
                        @change="filterNotifications()"
                        class="block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-dodger-blue-500 focus:border-dodger-blue-500"
                    >
                        @foreach($types as $value => $label)
                            <option value="{{ $value }}">{{ $label }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </x-card.card>

    <!-- Notifications List -->
    <div class="space-y-2">
        <template x-if="filteredNotifications.length === 0">
            <x-card.card>
                <div class="text-center py-12">
                    <svg class="mx-auto h-12 w-12 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                    </svg>
                    <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                        {{ $emptyMessage }}
                    </p>
                </div>
            </x-card.card>
        </template>

        <template x-for="notification in filteredNotifications" :key="notification.id">
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
                class="notification-item group relative p-4 border-l-4 transition-all duration-200 cursor-pointer rounded-lg"
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
</div>

