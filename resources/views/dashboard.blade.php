<x-app-layout>
    <x-slot name="title">Dashboard</x-slot>
    <x-slot name="metaDescription">Welcome to your dashboard. Manage your account and explore all available features.</x-slot>

    <x-slot name="header">
        <x-breadcrumb :items="[
            ['label' => 'Home', 'url' => route('dashboard')],
        ]" />
    </x-slot>

    <x-slot name="pageTitle">
        Dashboard
    </x-slot>

    <x-slot name="pageSubtitle">
        Welcome to your dashboard
    </x-slot>

    <x-alert.alerts />
    
    <x-card.card title="Welcome" hover variant="gradient" class="mb-6">
                <p class="text-gray-600 dark:text-gray-400 text-lg">
                    {{ __("You're logged in!") }}
                </p>
            </x-card>

            <!-- Demo Pages Section -->
            <div class="mb-6">
                <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-4">
                    Demo Pages
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4 sm:gap-6">
                    <!-- Forms Demo -->
                    <a href="{{ route('forms.demo') }}" class="group">
                        <x-card.card hover variant="gradient" class="h-full transition-all duration-300 group-hover:scale-[1.02]">
                            <div class="flex items-start space-x-4">
                                <div class="flex-shrink-0">
                                    <div class="w-12 h-12 rounded-xl bg-dodger-blue-100 dark:bg-dodger-blue-900/30 flex items-center justify-center">
                                        <svg class="w-6 h-6 text-dodger-blue-600 dark:text-dodger-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 group-hover:text-dodger-blue-600 dark:group-hover:text-dodger-blue-400 transition-colors">
                                        Form Components
                                    </h3>
                                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                        Explore all available form input components and their variations
                                    </p>
                                </div>
                                <div class="flex-shrink-0">
                                    <svg class="w-5 h-5 text-gray-400 group-hover:text-dodger-blue-600 dark:group-hover:text-dodger-blue-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </div>
                            </div>
                        </x-card>
                    </a>

                    <!-- Tables Demo -->
                    <a href="{{ route('tables.demo') }}" class="group">
                        <x-card.card hover variant="gradient" class="h-full transition-all duration-300 group-hover:scale-[1.02]">
                            <div class="flex items-start space-x-4">
                                <div class="flex-shrink-0">
                                    <div class="w-12 h-12 rounded-xl bg-dodger-blue-100 dark:bg-dodger-blue-900/30 flex items-center justify-center">
                                        <svg class="w-6 h-6 text-dodger-blue-600 dark:text-dodger-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V8a2 2 0 00-2-2H6a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 group-hover:text-dodger-blue-600 dark:group-hover:text-dodger-blue-400 transition-colors">
                                        Table Components
                                    </h3>
                                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                        View table layouts and data display components
                                    </p>
                                </div>
                                <div class="flex-shrink-0">
                                    <svg class="w-5 h-5 text-gray-400 group-hover:text-dodger-blue-600 dark:group-hover:text-dodger-blue-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </div>
                            </div>
                        </x-card>
                    </a>

                    <!-- Sidebar Demo -->
                    <a href="{{ route('sidebar.demo') }}" class="group">
                        <x-card.card hover variant="gradient" class="h-full transition-all duration-300 group-hover:scale-[1.02]">
                            <div class="flex items-start space-x-4">
                                <div class="flex-shrink-0">
                                    <div class="w-12 h-12 rounded-xl bg-dodger-blue-100 dark:bg-dodger-blue-900/30 flex items-center justify-center">
                                        <svg class="w-6 h-6 text-dodger-blue-600 dark:text-dodger-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 group-hover:text-dodger-blue-600 dark:group-hover:text-dodger-blue-400 transition-colors">
                                        Sidebar Components
                                    </h3>
                                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                        Check out the sidebar navigation and menu components
                                    </p>
                                </div>
                                <div class="flex-shrink-0">
                                    <svg class="w-5 h-5 text-gray-400 group-hover:text-dodger-blue-600 dark:group-hover:text-dodger-blue-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </div>
                            </div>
                        </x-card>
                    </a>

                    <!-- Lists Demo -->
                    <a href="{{ route('lists.demo') }}" class="group">
                        <x-card.card hover variant="gradient" class="h-full transition-all duration-300 group-hover:scale-[1.02]">
                            <div class="flex items-start space-x-4">
                                <div class="flex-shrink-0">
                                    <div class="w-12 h-12 rounded-xl bg-dodger-blue-100 dark:bg-dodger-blue-900/30 flex items-center justify-center">
                                        <svg class="w-6 h-6 text-dodger-blue-600 dark:text-dodger-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 group-hover:text-dodger-blue-600 dark:group-hover:text-dodger-blue-400 transition-colors">
                                        List Components
                                    </h3>
                                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                        Browse list and card layout components
                                    </p>
                                </div>
                                <div class="flex-shrink-0">
                                    <svg class="w-5 h-5 text-gray-400 group-hover:text-dodger-blue-600 dark:group-hover:text-dodger-blue-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </div>
                            </div>
                        </x-card>
                    </a>

                    <!-- Cards Demo -->
                    <a href="{{ route('cards.demo') }}" class="group">
                        <x-card.card hover variant="gradient" class="h-full transition-all duration-300 group-hover:scale-[1.02]">
                            <div class="flex items-start space-x-4">
                                <div class="flex-shrink-0">
                                    <div class="w-12 h-12 rounded-xl bg-dodger-blue-100 dark:bg-dodger-blue-900/30 flex items-center justify-center">
                                        <svg class="w-6 h-6 text-dodger-blue-600 dark:text-dodger-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 group-hover:text-dodger-blue-600 dark:group-hover:text-dodger-blue-400 transition-colors">
                                        Card Components
                                    </h3>
                                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                        Explore card variants, styles, and layout options
                                    </p>
                                </div>
                                <div class="flex-shrink-0">
                                    <svg class="w-5 h-5 text-gray-400 group-hover:text-dodger-blue-600 dark:group-hover:text-dodger-blue-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </div>
                            </div>
                        </x-card>
                    </a>

                    <!-- Buttons Demo -->
                    <a href="{{ route('buttons.demo') }}" class="group">
                        <x-card.card hover variant="gradient" class="h-full transition-all duration-300 group-hover:scale-[1.02]">
                            <div class="flex items-start space-x-4">
                                <div class="flex-shrink-0">
                                    <div class="w-12 h-12 rounded-xl bg-dodger-blue-100 dark:bg-dodger-blue-900/30 flex items-center justify-center">
                                        <svg class="w-6 h-6 text-dodger-blue-600 dark:text-dodger-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 group-hover:text-dodger-blue-600 dark:group-hover:text-dodger-blue-400 transition-colors">
                                        Button Components
                                    </h3>
                                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                        Explore button variants, sizes, icons, groups, and dropdowns
                                    </p>
                                </div>
                                <div class="flex-shrink-0">
                                    <svg class="w-5 h-5 text-gray-400 group-hover:text-dodger-blue-600 dark:group-hover:text-dodger-blue-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </div>
                            </div>
                        </x-card>
                    </a>

                    <!-- File Manager Demo -->
                    <a href="{{ route('files.demo') }}" class="group">
                        <x-card.card hover variant="gradient" class="h-full transition-all duration-300 group-hover:scale-[1.02]">
                            <div class="flex items-start space-x-4">
                                <div class="flex-shrink-0">
                                    <div class="w-12 h-12 rounded-xl bg-dodger-blue-100 dark:bg-dodger-blue-900/30 flex items-center justify-center">
                                        <svg class="w-6 h-6 text-dodger-blue-600 dark:text-dodger-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 group-hover:text-dodger-blue-600 dark:group-hover:text-dodger-blue-400 transition-colors">
                                        File Manager
                                    </h3>
                                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                        Modern file manager with drag & drop, multiple views, and context menus
                                    </p>
                                </div>
                                <div class="flex-shrink-0">
                                    <svg class="w-5 h-5 text-gray-400 group-hover:text-dodger-blue-600 dark:group-hover:text-dodger-blue-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </div>
                            </div>
                        </x-card>
                    </a>

                    <!-- Modals Demo -->
                    <a href="{{ route('modals.demo') }}" class="group">
                        <x-card.card hover variant="gradient" class="h-full transition-all duration-300 group-hover:scale-[1.02]">
                            <div class="flex items-start space-x-4">
                                <div class="flex-shrink-0">
                                    <div class="w-12 h-12 rounded-xl bg-dodger-blue-100 dark:bg-dodger-blue-900/30 flex items-center justify-center">
                                        <svg class="w-6 h-6 text-dodger-blue-600 dark:text-dodger-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 group-hover:text-dodger-blue-600 dark:group-hover:text-dodger-blue-400 transition-colors">
                                        Modal Components
                                    </h3>
                                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                        Explore modal components, sizes, forms, and various use cases
                                    </p>
                                </div>
                                <div class="flex-shrink-0">
                                    <svg class="w-5 h-5 text-gray-400 group-hover:text-dodger-blue-600 dark:group-hover:text-dodger-blue-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </div>
                            </div>
                        </x-card>
                    </a>

                    <!-- Misc Components Demo -->
                    <a href="{{ route('misc.demo') }}" class="group">
                        <x-card.card hover variant="gradient" class="h-full transition-all duration-300 group-hover:scale-[1.02]">
                            <div class="flex items-start space-x-4">
                                <div class="flex-shrink-0">
                                    <div class="w-12 h-12 rounded-xl bg-dodger-blue-100 dark:bg-dodger-blue-900/30 flex items-center justify-center">
                                        <svg class="w-6 h-6 text-dodger-blue-600 dark:text-dodger-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 group-hover:text-dodger-blue-600 dark:group-hover:text-dodger-blue-400 transition-colors">
                                        Misc Components
                                    </h3>
                                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                        Progress bars, alerts, badges, status indicators, spinners, and more
                                    </p>
                                </div>
                                <div class="flex-shrink-0">
                                    <svg class="w-5 h-5 text-gray-400 group-hover:text-dodger-blue-600 dark:group-hover:text-dodger-blue-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </div>
                            </div>
                        </x-card>
                    </a>

                    <!-- Comments Demo -->
                    <a href="{{ route('comments.demo') }}" class="group">
                        <x-card.card hover variant="gradient" class="h-full transition-all duration-300 group-hover:scale-[1.02]">
                            <div class="flex items-start space-x-4">
                                <div class="flex-shrink-0">
                                    <div class="w-12 h-12 rounded-xl bg-dodger-blue-100 dark:bg-dodger-blue-900/30 flex items-center justify-center">
                                        <svg class="w-6 h-6 text-dodger-blue-600 dark:text-dodger-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 group-hover:text-dodger-blue-600 dark:group-hover:text-dodger-blue-400 transition-colors">
                                        Comments Demo
                                    </h3>
                                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                        Nested comment system with replies, perfect for videos and discussions
                                    </p>
                                </div>
                                <div class="flex-shrink-0">
                                    <svg class="w-5 h-5 text-gray-400 group-hover:text-dodger-blue-600 dark:group-hover:text-dodger-blue-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </div>
                            </div>
                        </x-card>
                    </a>

                    <!-- Tabs Demo -->
                    <a href="{{ route('tabs.demo') }}" class="group">
                        <x-card.card hover variant="gradient" class="h-full transition-all duration-300 group-hover:scale-[1.02]">
                            <div class="flex items-start space-x-4">
                                <div class="flex-shrink-0">
                                    <div class="w-12 h-12 rounded-xl bg-dodger-blue-100 dark:bg-dodger-blue-900/30 flex items-center justify-center">
                                        <svg class="w-6 h-6 text-dodger-blue-600 dark:text-dodger-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 group-hover:text-dodger-blue-600 dark:group-hover:text-dodger-blue-400 transition-colors">
                                        Tabs Demo
                                    </h3>
                                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                        Tab navigation components with multiple variants and styles
                                    </p>
                                </div>
                                <div class="flex-shrink-0">
                                    <svg class="w-5 h-5 text-gray-400 group-hover:text-dodger-blue-600 dark:group-hover:text-dodger-blue-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </div>
                            </div>
                        </x-card>
                    </a>

                    <!-- Accordion Demo -->
                    <a href="{{ route('accordion.demo') }}" class="group">
                        <x-card.card hover variant="gradient" class="h-full transition-all duration-300 group-hover:scale-[1.02]">
                            <div class="flex items-start space-x-4">
                                <div class="flex-shrink-0">
                                    <div class="w-12 h-12 rounded-xl bg-dodger-blue-100 dark:bg-dodger-blue-900/30 flex items-center justify-center">
                                        <svg class="w-6 h-6 text-dodger-blue-600 dark:text-dodger-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 group-hover:text-dodger-blue-600 dark:group-hover:text-dodger-blue-400 transition-colors">
                                        Accordion Demo
                                    </h3>
                                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                        Expandable and collapsible content sections
                                    </p>
                                </div>
                                <div class="flex-shrink-0">
                                    <svg class="w-5 h-5 text-gray-400 group-hover:text-dodger-blue-600 dark:group-hover:text-dodger-blue-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </div>
                            </div>
                        </x-card>
                    </a>

                    <!-- Toast Demo -->
                    <a href="{{ route('toast.demo') }}" class="group">
                        <x-card.card hover variant="gradient" class="h-full transition-all duration-300 group-hover:scale-[1.02]">
                            <div class="flex items-start space-x-4">
                                <div class="flex-shrink-0">
                                    <div class="w-12 h-12 rounded-xl bg-dodger-blue-100 dark:bg-dodger-blue-900/30 flex items-center justify-center">
                                        <svg class="w-6 h-6 text-dodger-blue-600 dark:text-dodger-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 group-hover:text-dodger-blue-600 dark:group-hover:text-dodger-blue-400 transition-colors">
                                        Toast Demo
                                    </h3>
                                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                        Toast notifications for user feedback and messages
                                    </p>
                                </div>
                                <div class="flex-shrink-0">
                                    <svg class="w-5 h-5 text-gray-400 group-hover:text-dodger-blue-600 dark:group-hover:text-dodger-blue-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </div>
                            </div>
                        </x-card>
                    </a>

                    <!-- Timeline Demo -->
                    <a href="{{ route('timeline.demo') }}" class="group">
                        <x-card.card hover variant="gradient" class="h-full transition-all duration-300 group-hover:scale-[1.02]">
                            <div class="flex items-start space-x-4">
                                <div class="flex-shrink-0">
                                    <div class="w-12 h-12 rounded-xl bg-dodger-blue-100 dark:bg-dodger-blue-900/30 flex items-center justify-center">
                                        <svg class="w-6 h-6 text-dodger-blue-600 dark:text-dodger-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 group-hover:text-dodger-blue-600 dark:group-hover:text-dodger-blue-400 transition-colors">
                                        Timeline Demo
                                    </h3>
                                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                        Chronological event timelines with various styles
                                    </p>
                                </div>
                                <div class="flex-shrink-0">
                                    <svg class="w-5 h-5 text-gray-400 group-hover:text-dodger-blue-600 dark:group-hover:text-dodger-blue-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </div>
                            </div>
                        </x-card>
                    </a>

                    @if (app()->environment(['local', 'development']) && Route::has('email-preview.index'))
                        <!-- Email Preview -->
                        <a href="{{ route('email-preview.index') }}" class="group">
                            <x-card.card hover variant="gradient" class="h-full transition-all duration-300 group-hover:scale-[1.02]">
                                <div class="flex items-start space-x-4">
                                    <div class="flex-shrink-0">
                                        <div class="w-12 h-12 rounded-xl bg-dodger-blue-100 dark:bg-dodger-blue-900/30 flex items-center justify-center">
                                            <svg class="w-6 h-6 text-dodger-blue-600 dark:text-dodger-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 group-hover:text-dodger-blue-600 dark:group-hover:text-dodger-blue-400 transition-colors">
                                            Email Templates
                                        </h3>
                                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                            Preview email templates for verification and password reset
                                        </p>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <svg class="w-5 h-5 text-gray-400 group-hover:text-dodger-blue-600 dark:group-hover:text-dodger-blue-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                        </svg>
                                    </div>
                                </div>
                            </x-card>
                        </a>
                    @endif

                    <!-- Pricing Plans -->
                    <a href="{{ route('pricing') }}" class="group">
                        <x-card.card hover variant="gradient" class="h-full transition-all duration-300 group-hover:scale-[1.02]">
                            <div class="flex items-start space-x-4">
                                <div class="flex-shrink-0">
                                    <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-dodger-blue-100 to-purple-100 dark:from-dodger-blue-900/30 dark:to-purple-900/30 flex items-center justify-center">
                                        <svg class="w-6 h-6 text-dodger-blue-600 dark:text-dodger-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 group-hover:text-dodger-blue-600 dark:group-hover:text-dodger-blue-400 transition-colors">
                                        Pricing Plans
                                    </h3>
                                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                        View our pricing plans and choose the perfect option for your needs
                                    </p>
                                </div>
                                <div class="flex-shrink-0">
                                    <svg class="w-5 h-5 text-gray-400 group-hover:text-dodger-blue-600 dark:group-hover:text-dodger-blue-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </div>
                            </div>
                        </x-card>
                    </a>

                    <!-- Premium Demo -->
                    <a href="{{ route('premium-demo') }}" class="group">
                        <x-card.card hover variant="gradient" class="h-full transition-all duration-300 group-hover:scale-[1.02]">
                            <div class="flex items-start space-x-4">
                                <div class="flex-shrink-0">
                                    <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-yellow-100 to-orange-100 dark:from-yellow-900/30 dark:to-orange-900/30 flex items-center justify-center">
                                        <svg class="w-6 h-6 text-yellow-600 dark:text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 group-hover:text-dodger-blue-600 dark:group-hover:text-dodger-blue-400 transition-colors">
                                        Premium Features Demo
                                    </h3>
                                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                        Explore premium features and see what's locked behind a subscription
                                    </p>
                                </div>
                                <div class="flex-shrink-0">
                                    <svg class="w-5 h-5 text-gray-400 group-hover:text-dodger-blue-600 dark:group-hover:text-dodger-blue-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </div>
                            </div>
                        </x-card>
                    </a>

                    <!-- Usage Component Demo -->
                    <a href="{{ route('usage-demo') }}" class="group">
                        <x-card.card hover variant="gradient" class="h-full transition-all duration-300 group-hover:scale-[1.02]">
                            <div class="flex items-start space-x-4">
                                <div class="flex-shrink-0">
                                    <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-cyan-100 to-blue-100 dark:from-cyan-900/30 dark:to-blue-900/30 flex items-center justify-center">
                                        <svg class="w-6 h-6 text-cyan-600 dark:text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 group-hover:text-dodger-blue-600 dark:group-hover:text-dodger-blue-400 transition-colors">
                                        Usage Component Demo
                                    </h3>
                                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                        View examples of the usage component with various configurations
                                    </p>
                                </div>
                                <div class="flex-shrink-0">
                                    <svg class="w-5 h-5 text-gray-400 group-hover:text-dodger-blue-600 dark:group-hover:text-dodger-blue-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </div>
                            </div>
                        </x-card>
                    </a>

                    <!-- Icons Demo -->
                    <a href="{{ route('icons.demo') }}" class="group">
                        <x-card.card hover variant="gradient" class="h-full transition-all duration-300 group-hover:scale-[1.02]">
                            <div class="flex items-start space-x-4">
                                <div class="flex-shrink-0">
                                    <div class="w-12 h-12 rounded-xl bg-dodger-blue-100 dark:bg-dodger-blue-900/30 flex items-center justify-center">
                                        <x-sidebar.icon name="ui" />
                                    </div>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 group-hover:text-dodger-blue-600 dark:group-hover:text-dodger-blue-400 transition-colors">
                                        Icons Demo
                                    </h3>
                                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                        Browse all available sidebar icons and their usage
                                    </p>
                                </div>
                                <div class="flex-shrink-0">
                                    <svg class="w-5 h-5 text-gray-400 group-hover:text-dodger-blue-600 dark:group-hover:text-dodger-blue-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </div>
                            </div>
                        </x-card>
                    </a>
                </div>
            </div>
</x-app-layout>
