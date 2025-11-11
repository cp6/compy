<x-app-layout>
    <x-slot name="title">Tabs Demo</x-slot>
    <x-slot name="metaDescription">A comprehensive demo of tab components with various styles and configurations.</x-slot>
    <x-slot name="metaKeywords">tabs, navigation, components, demo</x-slot>

    <x-slot name="header">
        <x-breadcrumb :items="[
            ['label' => 'Home', 'url' => route('dashboard')],
            ['label' => 'Tabs Demo', 'url' => '#'],
        ]" />
    </x-slot>

    <x-slot name="pageTitle">
        Tabs Demo
    </x-slot>

    <x-slot name="pageSubtitle">
        Componentized tab navigation with multiple variants
    </x-slot>

    <x-alert.alerts />

    <div class="space-y-8">
        <!-- Default Tabs -->
        <section>
            <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-4">Default Tabs</h2>
            <x-card.card variant="gradient">
                <x-tabs.tabs default-tab="tab1">
                    <x-slot name="tabs">
                        <x-tabs.tab-item id="tab1" label="Overview" />
                        <x-tabs.tab-item id="tab2" label="Settings" />
                        <x-tabs.tab-item id="tab3" label="Analytics" />
                        <x-tabs.tab-item id="tab4" label="Reports" />
                    </x-slot>
                    <x-slot name="panels">
                        <x-tabs.tab-panel id="tab1">
                            <div class="p-4 bg-gray-50 dark:bg-gray-900/50 rounded-lg">
                                <h3 class="font-semibold text-gray-900 dark:text-gray-100 mb-2">Overview Content</h3>
                                <p class="text-gray-600 dark:text-gray-400">
                                    This is the overview tab content. You can display any content here including charts, statistics, or other components.
                                </p>
                            </div>
                        </x-tabs.tab-panel>

                        <x-tabs.tab-panel id="tab2">
                            <div class="p-4 bg-gray-50 dark:bg-gray-900/50 rounded-lg">
                                <h3 class="font-semibold text-gray-900 dark:text-gray-100 mb-2">Settings Content</h3>
                                <p class="text-gray-600 dark:text-gray-400">
                                    Configure your application settings here. This tab contains all the configuration options.
                                </p>
                            </div>
                        </x-tabs.tab-panel>

                        <x-tabs.tab-panel id="tab3">
                            <div class="p-4 bg-gray-50 dark:bg-gray-900/50 rounded-lg">
                                <h3 class="font-semibold text-gray-900 dark:text-gray-100 mb-2">Analytics Content</h3>
                                <p class="text-gray-600 dark:text-gray-400">
                                    View your analytics data and insights. Track performance metrics and user engagement.
                                </p>
                            </div>
                        </x-tabs.tab-panel>

                        <x-tabs.tab-panel id="tab4">
                            <div class="p-4 bg-gray-50 dark:bg-gray-900/50 rounded-lg">
                                <h3 class="font-semibold text-gray-900 dark:text-gray-100 mb-2">Reports Content</h3>
                                <p class="text-gray-600 dark:text-gray-400">
                                    Generate and view detailed reports. Export data and analyze trends over time.
                                </p>
                            </div>
                        </x-tabs.tab-panel>
                    </x-slot>
                </x-tabs.tabs>
            </x-card.card>
        </section>

        <!-- Tabs with Icons and Badges -->
        <section>
            <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-4">Tabs with Icons and Badges</h2>
            <x-card.card variant="gradient">
                <x-tabs.tabs default-tab="icon-tab1">
                    <x-slot name="tabs">
                        <x-tabs.tab-item 
                            id="icon-tab1" 
                            label="Dashboard"
                            icon='<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" /></svg>'
                        />
                        <x-tabs.tab-item 
                            id="icon-tab2" 
                            label="Messages"
                            badge="3"
                            icon='<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>'
                        />
                        <x-tabs.tab-item 
                            id="icon-tab3" 
                            label="Notifications"
                            badge="12"
                            icon='<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" /></svg>'
                        />
                    </x-slot>
                    <x-slot name="panels">
                        <x-tabs.tab-panel id="icon-tab1">
                            <div class="p-4 bg-gray-50 dark:bg-gray-900/50 rounded-lg">
                                <p class="text-gray-600 dark:text-gray-400">Dashboard content with icon tab.</p>
                            </div>
                        </x-tabs.tab-panel>

                        <x-tabs.tab-panel id="icon-tab2">
                            <div class="p-4 bg-gray-50 dark:bg-gray-900/50 rounded-lg">
                                <p class="text-gray-600 dark:text-gray-400">Messages tab with badge showing unread count.</p>
                            </div>
                        </x-tabs.tab-panel>

                        <x-tabs.tab-panel id="icon-tab3">
                            <div class="p-4 bg-gray-50 dark:bg-gray-900/50 rounded-lg">
                                <p class="text-gray-600 dark:text-gray-400">Notifications tab with badge.</p>
                            </div>
                        </x-tabs.tab-panel>
                    </x-slot>
                </x-tabs.tabs>
            </x-card.card>
        </section>

        <!-- Pills Variant -->
        <section>
            <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-4">Pills Variant</h2>
            <x-card.card variant="gradient">
                <x-tabs.tabs variant="pills" default-tab="pills-tab1">
                    <x-slot name="tabs">
                        <x-tabs.tab-item id="pills-tab1" label="Active" />
                        <x-tabs.tab-item id="pills-tab2" label="Inactive" />
                        <x-tabs.tab-item id="pills-tab3" label="Disabled" :disabled="true" />
                    </x-slot>
                    <x-slot name="panels">
                        <x-tabs.tab-panel id="pills-tab1">
                            <div class="p-4 bg-gray-50 dark:bg-gray-900/50 rounded-lg mt-4">
                                <p class="text-gray-600 dark:text-gray-400">Pills style tabs with rounded appearance.</p>
                            </div>
                        </x-tabs.tab-panel>

                        <x-tabs.tab-panel id="pills-tab2">
                            <div class="p-4 bg-gray-50 dark:bg-gray-900/50 rounded-lg mt-4">
                                <p class="text-gray-600 dark:text-gray-400">Second pills tab content.</p>
                            </div>
                        </x-tabs.tab-panel>
                    </x-slot>
                </x-tabs.tabs>
            </x-card.card>
        </section>
    </div>
</x-app-layout>

