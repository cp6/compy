<x-app-layout>
    <x-slot name="title">Notifications Center Demo</x-slot>
    <x-slot name="metaDescription">A comprehensive demo of notification components including dropdown, badge, and full notification center.</x-slot>
    <x-slot name="metaKeywords">notifications, notification center, badge, dropdown, demo</x-slot>

    <x-slot name="header">
        <x-breadcrumb :items="[
            ['label' => 'Home', 'url' => route('dashboard')],
            ['label' => 'Notifications Demo', 'url' => '#'],
        ]" />
    </x-slot>

    <x-slot name="pageTitle">
        Notifications Center Demo
    </x-slot>

    <x-slot name="pageSubtitle">
        Explore notification components including dropdown, badges, and full notification center
    </x-slot>

    <x-alert.alerts />

    <div class="space-y-8">
        <!-- Sample Notifications Data -->
        @php
            $sampleNotifications = collect([
                [
                    'id' => '1',
                    'type' => 'success',
                    'title' => 'Payment Received',
                    'message' => 'Your payment of $299.00 has been successfully processed.',
                    'time' => now()->subMinutes(5)->diffForHumans(),
                    'read' => false,
                    'actionUrl' => '#',
                    'actionLabel' => 'View Invoice',
                ],
                [
                    'id' => '2',
                    'type' => 'info',
                    'title' => 'New Message',
                    'message' => 'You have received a new message from John Doe.',
                    'time' => now()->subHours(1)->diffForHumans(),
                    'read' => false,
                    'actionUrl' => '#',
                    'actionLabel' => 'Reply',
                    'avatar' => 'https://ui-avatars.com/api/?name=John+Doe&background=dodger-blue&color=fff',
                ],
                [
                    'id' => '3',
                    'type' => 'warning',
                    'title' => 'Storage Limit Warning',
                    'message' => 'You are using 85% of your storage quota. Consider upgrading your plan.',
                    'time' => now()->subHours(3)->diffForHumans(),
                    'read' => false,
                    'actionUrl' => '#',
                    'actionLabel' => 'Upgrade',
                ],
                [
                    'id' => '4',
                    'type' => 'error',
                    'title' => 'Failed Login Attempt',
                    'message' => 'An unsuccessful login attempt was detected from a new device.',
                    'time' => now()->subDays(1)->diffForHumans(),
                    'read' => true,
                    'actionUrl' => '#',
                    'actionLabel' => 'Review',
                ],
                [
                    'id' => '5',
                    'type' => 'system',
                    'title' => 'System Maintenance',
                    'message' => 'Scheduled maintenance will occur on Saturday, 2:00 AM - 4:00 AM EST.',
                    'time' => now()->subDays(2)->diffForHumans(),
                    'read' => true,
                ],
                [
                    'id' => '6',
                    'type' => 'success',
                    'title' => 'Profile Updated',
                    'message' => 'Your profile information has been successfully updated.',
                    'time' => now()->subDays(3)->diffForHumans(),
                    'read' => true,
                ],
                [
                    'id' => '7',
                    'type' => 'info',
                    'title' => 'New Feature Available',
                    'message' => 'Check out our new dashboard analytics feature. Get insights into your data.',
                    'time' => now()->subDays(4)->diffForHumans(),
                    'read' => false,
                    'actionUrl' => '#',
                    'actionLabel' => 'Explore',
                ],
                [
                    'id' => '8',
                    'type' => 'warning',
                    'title' => 'API Rate Limit',
                    'message' => 'You are approaching your API rate limit. Consider upgrading your plan.',
                    'time' => now()->subDays(5)->diffForHumans(),
                    'read' => true,
                    'actionUrl' => '#',
                    'actionLabel' => 'View Limits',
                ],
            ])->toArray();
            
            $unreadCount = collect($sampleNotifications)->where('read', false)->count();
        @endphp

        <!-- Notification Badge Examples -->
        <section>
            <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-4">Notification Badge</h2>
            <x-card.card>
                <div class="space-y-4">
                    <div class="flex items-center gap-6 flex-wrap">
                        <div class="flex items-center gap-2">
                            <svg class="w-6 h-6 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>
                            <x-notification.notification-badge :count="5" />
                        </div>
                        <div class="flex items-center gap-2">
                            <svg class="w-6 h-6 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>
                            <x-notification.notification-badge :count="99" />
                        </div>
                        <div class="flex items-center gap-2">
                            <svg class="w-6 h-6 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>
                            <x-notification.notification-badge :count="150" />
                        </div>
                        <div class="flex items-center gap-2">
                            <svg class="w-6 h-6 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>
                            <x-notification.notification-badge :count="0" :show-zero="true" />
                        </div>
                    </div>
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        Badge components showing unread notification counts. Automatically displays "99+" for counts over 99.
                    </p>
                </div>
            </x-card.card>
        </section>

        <!-- Notification Dropdown Example -->
        <section>
            <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-4">Notification Dropdown</h2>
            <x-card.card>
                <div class="space-y-4">
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        Click the notification bell to see the dropdown with recent notifications. Perfect for header navigation.
                    </p>
                </div>
            </x-card.card>
            <div class="flex justify-center relative mt-4" style="z-index: 50;">
                <x-notification.notification-dropdown 
                    :notifications="$sampleNotifications"
                    :unread-count="$unreadCount"
                    view-all-url="{{ route('notifications.demo') }}"
                />
            </div>
        </section>

        <!-- Individual Notification Items -->
        <section>
            <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-4">Notification Types</h2>
            <x-card.card>
                <div class="space-y-2">
                    <x-notification.notification-item
                        type="success"
                        title="Payment Received"
                        message="Your payment of $299.00 has been successfully processed."
                        :time="now()->subMinutes(5)"
                        :read="false"
                        action-url="#"
                        action-label="View Invoice"
                    />
                    
                    <x-notification.notification-item
                        type="info"
                        title="New Message"
                        message="You have received a new message from John Doe."
                        :time="now()->subHours(1)"
                        :read="false"
                        action-url="#"
                        action-label="Reply"
                        avatar="https://ui-avatars.com/api/?name=John+Doe&background=dodger-blue&color=fff"
                    />
                    
                    <x-notification.notification-item
                        type="warning"
                        title="Storage Limit Warning"
                        message="You are using 85% of your storage quota. Consider upgrading your plan."
                        :time="now()->subHours(3)"
                        :read="false"
                        action-url="#"
                        action-label="Upgrade"
                    />
                    
                    <x-notification.notification-item
                        type="error"
                        title="Failed Login Attempt"
                        message="An unsuccessful login attempt was detected from a new device."
                        :time="now()->subDays(1)"
                        :read="true"
                        action-url="#"
                        action-label="Review"
                    />
                    
                    <x-notification.notification-item
                        type="system"
                        title="System Maintenance"
                        message="Scheduled maintenance will occur on Saturday, 2:00 AM - 4:00 AM EST."
                        :time="now()->subDays(2)"
                        :read="true"
                    />
                </div>
            </x-card.card>
        </section>

        <!-- Full Notification Center -->
        <section>
            <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-4">Full Notification Center</h2>
            <x-notification.notification-center 
                :notifications="$sampleNotifications"
            />
        </section>

        <!-- Usage Examples -->
        <section>
            <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-4">Usage Examples</h2>
            <x-card.card>
                <div class="space-y-6">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-2">In Header Navigation</h3>
                        <pre class="bg-gray-100 dark:bg-gray-800 p-4 rounded-lg overflow-x-auto text-sm"><code>&lt;x-notification.notification-dropdown 
    :notifications="$notifications"
    :unread-count="$unreadCount"
    view-all-url="{{ route('notifications.demo') }}"
/&gt;</code></pre>
                    </div>
                    
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-2">Individual Notification</h3>
                        <pre class="bg-gray-100 dark:bg-gray-800 p-4 rounded-lg overflow-x-auto text-sm"><code>&lt;x-notification.notification-item
    type="success"
    title="Payment Received"
    message="Your payment has been processed."
    :time="now()"
    :read="false"
    action-url="/invoices/1"
    action-label="View Invoice"
/&gt;</code></pre>
                    </div>
                    
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-2">Notification Badge</h3>
                        <pre class="bg-gray-100 dark:bg-gray-800 p-4 rounded-lg overflow-x-auto text-sm"><code>&lt;x-notification.notification-badge :count="5" /&gt;</code></pre>
                    </div>
                    
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-2">Full Notification Center Page</h3>
                        <pre class="bg-gray-100 dark:bg-gray-800 p-4 rounded-lg overflow-x-auto text-sm"><code>&lt;x-notification.notification-center 
    :notifications="$notifications"
    :categories="['all' => 'All', 'unread' => 'Unread']"
    :types="['all' => 'All Types', 'info' => 'Info']"
/&gt;</code></pre>
                    </div>
                </div>
            </x-card.card>
        </section>
    </div>
</x-app-layout>

