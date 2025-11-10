<x-app-layout>
    <x-slot name="title">Misc Components Demo</x-slot>
    <x-slot name="metaDescription">A comprehensive showcase of miscellaneous UI components including progress bars, alerts, badges, status indicators, and more.</x-slot>
    <x-slot name="metaKeywords">components, demo, progress bars, alerts, badges, UI elements</x-slot>

    <x-slot name="header">
        <x-breadcrumb :items="[
            ['label' => 'Home', 'url' => route('dashboard')],
            ['label' => 'Misc Components Demo', 'url' => '#'],
        ]" />
    </x-slot>

    <x-slot name="pageTitle">
        Misc Components Demo
    </x-slot>

    <x-slot name="pageSubtitle">
        A showcase of various UI components and their variations
    </x-slot>

    <div class="space-y-8">
        <!-- Alerts Section -->
        <section>
            <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-4">Alerts</h2>
            <div class="space-y-4">
                <x-alert.alert type="success" dismissible>
                    This is a success alert! Everything went smoothly.
                </x-alert.alert>
                <x-alert.alert type="error" dismissible>
                    This is an error alert! Something went wrong.
                </x-alert.alert>
                <x-alert.alert type="warning" dismissible>
                    This is a warning alert! Please be careful.
                </x-alert.alert>
                <x-alert.alert type="info" dismissible>
                    This is an info alert! Here's some useful information.
                </x-alert.alert>
                <x-alert.alert type="success" :dismissible="false">
                    Non-dismissible success alert
                </x-alert.alert>
            </div>
        </section>

        <!-- Progress Bars Section -->
        <section>
            <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-4">Progress Bars</h2>
            <div class="space-y-6">
                <!-- Basic Progress Bars -->
                <div class="space-y-3">
                    <h3 class="text-sm font-medium text-gray-700 dark:text-gray-300">Basic Progress Bars</h3>
                    <div class="space-y-2">
                        <div>
                            <div class="flex justify-between text-sm text-gray-600 dark:text-gray-400 mb-1">
                                <span>Loading...</span>
                                <span>25%</span>
                            </div>
                            <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2.5">
                                <div class="bg-dodger-blue-600 h-2.5 rounded-full transition-all duration-500" style="width: 25%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex justify-between text-sm text-gray-600 dark:text-gray-400 mb-1">
                                <span>Processing...</span>
                                <span>50%</span>
                            </div>
                            <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2.5">
                                <div class="bg-green-600 h-2.5 rounded-full transition-all duration-500" style="width: 50%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex justify-between text-sm text-gray-600 dark:text-gray-400 mb-1">
                                <span>Almost done...</span>
                                <span>75%</span>
                            </div>
                            <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2.5">
                                <div class="bg-yellow-600 h-2.5 rounded-full transition-all duration-500" style="width: 75%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex justify-between text-sm text-gray-600 dark:text-gray-400 mb-1">
                                <span>Complete!</span>
                                <span>100%</span>
                            </div>
                            <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2.5">
                                <div class="bg-green-600 h-2.5 rounded-full transition-all duration-500" style="width: 100%"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Animated Progress Bar -->
                <div class="space-y-3">
                    <h3 class="text-sm font-medium text-gray-700 dark:text-gray-300">Animated Progress Bar</h3>
                    <div 
                        x-data="{ progress: 0 }"
                        x-init="
                            setInterval(() => {
                                if (progress < 100) {
                                    progress += 1;
                                } else {
                                    progress = 0;
                                }
                            }, 50);
                        "
                    >
                        <div class="flex justify-between text-sm text-gray-600 dark:text-gray-400 mb-1">
                            <span>Processing...</span>
                            <span x-text="progress + '%'"></span>
                        </div>
                        <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-3">
                            <div 
                                class="bg-gradient-to-r from-dodger-blue-500 to-dodger-blue-600 h-3 rounded-full transition-all duration-300 shadow-lg"
                                :style="'width: ' + progress + '%'"
                            ></div>
                        </div>
                    </div>
                </div>

                <!-- Colored Progress Bars -->
                <div class="space-y-3">
                    <h3 class="text-sm font-medium text-gray-700 dark:text-gray-300">Colored Progress Bars</h3>
                    <div class="space-y-2">
                        <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2.5">
                            <div class="bg-blue-600 h-2.5 rounded-full" style="width: 30%"></div>
                        </div>
                        <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2.5">
                            <div class="bg-green-600 h-2.5 rounded-full" style="width: 45%"></div>
                        </div>
                        <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2.5">
                            <div class="bg-yellow-600 h-2.5 rounded-full" style="width: 60%"></div>
                        </div>
                        <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2.5">
                            <div class="bg-red-600 h-2.5 rounded-full" style="width: 80%"></div>
                        </div>
                        <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2.5">
                            <div class="bg-purple-600 h-2.5 rounded-full" style="width: 90%"></div>
                        </div>
                    </div>
                </div>

                <!-- Striped Progress Bar -->
                <div class="space-y-3">
                    <h3 class="text-sm font-medium text-gray-700 dark:text-gray-300">Striped Progress Bar</h3>
                    <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-3 overflow-hidden">
                        <div 
                            class="bg-dodger-blue-600 h-3 rounded-full relative"
                            style="width: 65%; background-image: linear-gradient(45deg, rgba(255,255,255,.15) 25%, transparent 25%, transparent 50%, rgba(255,255,255,.15) 50%, rgba(255,255,255,.15) 75%, transparent 75%, transparent); background-size: 1rem 1rem;"
                        ></div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Badges Section -->
        <section>
            <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-4">Badges</h2>
            <div class="space-y-6">
                <!-- Basic Badges -->
                <div class="space-y-3">
                    <h3 class="text-sm font-medium text-gray-700 dark:text-gray-300">Basic Badges</h3>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-2.5 py-0.5 text-xs font-medium rounded-full bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-300">Default</span>
                        <span class="px-2.5 py-0.5 text-xs font-medium rounded-full bg-blue-100 dark:bg-blue-900/30 text-blue-800 dark:text-blue-300">Info</span>
                        <span class="px-2.5 py-0.5 text-xs font-medium rounded-full bg-green-100 dark:bg-green-900/30 text-green-800 dark:text-green-300">Success</span>
                        <span class="px-2.5 py-0.5 text-xs font-medium rounded-full bg-yellow-100 dark:bg-yellow-900/30 text-yellow-800 dark:text-yellow-300">Warning</span>
                        <span class="px-2.5 py-0.5 text-xs font-medium rounded-full bg-red-100 dark:bg-red-900/30 text-red-800 dark:text-red-300">Error</span>
                        <span class="px-2.5 py-0.5 text-xs font-medium rounded-full bg-purple-100 dark:bg-purple-900/30 text-purple-800 dark:text-purple-300">Purple</span>
                        <span class="px-2.5 py-0.5 text-xs font-medium rounded-full bg-pink-100 dark:bg-pink-900/30 text-pink-800 dark:text-pink-300">Pink</span>
                        <span class="px-2.5 py-0.5 text-xs font-medium rounded-full bg-indigo-100 dark:bg-indigo-900/30 text-indigo-800 dark:text-indigo-300">Indigo</span>
                    </div>
                </div>

                <!-- Badge Sizes -->
                <div class="space-y-3">
                    <h3 class="text-sm font-medium text-gray-700 dark:text-gray-300">Badge Sizes</h3>
                    <div class="flex flex-wrap items-center gap-3">
                        <span class="px-2 py-0.5 text-xs font-medium rounded-full bg-dodger-blue-100 dark:bg-dodger-blue-900/30 text-dodger-blue-800 dark:text-dodger-blue-300">Small</span>
                        <span class="px-3 py-1 text-sm font-medium rounded-full bg-dodger-blue-100 dark:bg-dodger-blue-900/30 text-dodger-blue-800 dark:text-dodger-blue-300">Medium</span>
                        <span class="px-4 py-1.5 text-base font-medium rounded-full bg-dodger-blue-100 dark:bg-dodger-blue-900/30 text-dodger-blue-800 dark:text-dodger-blue-300">Large</span>
                    </div>
                </div>

                <!-- Badge with Icons -->
                <div class="space-y-3">
                    <h3 class="text-sm font-medium text-gray-700 dark:text-gray-300">Badges with Icons</h3>
                    <div class="flex flex-wrap gap-2">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 dark:bg-green-900/30 text-green-800 dark:text-green-300">
                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            Verified
                        </span>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 dark:bg-red-900/30 text-red-800 dark:text-red-300">
                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                            </svg>
                            Rejected
                        </span>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 dark:bg-yellow-900/30 text-yellow-800 dark:text-yellow-300">
                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                            </svg>
                            Pending
                        </span>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 dark:bg-blue-900/30 text-blue-800 dark:text-blue-300">
                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                            </svg>
                            New
                        </span>
                    </div>
                </div>
            </div>
        </section>

        <!-- Status Indicators / Live Flashing Dots -->
        <section>
            <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-4">Status Indicators & Live Flashing Dots</h2>
            <div class="space-y-6">
                <!-- Flashing Dots -->
                <div class="space-y-3">
                    <h3 class="text-sm font-medium text-gray-700 dark:text-gray-300">Live Status Dots</h3>
                    <div class="space-y-3">
                        <div class="flex items-center gap-3">
                            <div class="relative">
                                <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                                <div class="absolute inset-0 w-3 h-3 bg-green-500 rounded-full animate-ping opacity-75"></div>
                            </div>
                            <span class="text-sm text-gray-700 dark:text-gray-300">Online</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="relative">
                                <div class="w-3 h-3 bg-yellow-500 rounded-full"></div>
                                <div class="absolute inset-0 w-3 h-3 bg-yellow-500 rounded-full animate-ping opacity-75"></div>
                            </div>
                            <span class="text-sm text-gray-700 dark:text-gray-300">Away</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="relative">
                                <div class="w-3 h-3 bg-red-500 rounded-full"></div>
                                <div class="absolute inset-0 w-3 h-3 bg-red-500 rounded-full animate-ping opacity-75"></div>
                            </div>
                            <span class="text-sm text-gray-700 dark:text-gray-300">Busy</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-3 h-3 bg-gray-400 rounded-full"></div>
                            <span class="text-sm text-gray-700 dark:text-gray-300">Offline</span>
                        </div>
                    </div>
                </div>

                <!-- Status Badges with Dots -->
                <div class="space-y-3">
                    <h3 class="text-sm font-medium text-gray-700 dark:text-gray-300">Status Badges</h3>
                    <div class="flex flex-wrap gap-3">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 dark:bg-green-900/30 text-green-800 dark:text-green-300">
                            <span class="relative flex h-2 w-2 mr-2">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-2 w-2 bg-green-500"></span>
                            </span>
                            Active
                        </span>
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-yellow-100 dark:bg-yellow-900/30 text-yellow-800 dark:text-yellow-300">
                            <span class="relative flex h-2 w-2 mr-2">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-yellow-400 opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-2 w-2 bg-yellow-500"></span>
                            </span>
                            Pending
                        </span>
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 dark:bg-red-900/30 text-red-800 dark:text-red-300">
                            <span class="relative flex h-2 w-2 mr-2">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-2 w-2 bg-red-500"></span>
                            </span>
                            Inactive
                        </span>
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-300">
                            <span class="relative flex h-2 w-2 mr-2">
                                <span class="relative inline-flex rounded-full h-2 w-2 bg-gray-400"></span>
                            </span>
                            Offline
                        </span>
                    </div>
                </div>

                <!-- Pulsing Indicators -->
                <div class="space-y-3">
                    <h3 class="text-sm font-medium text-gray-700 dark:text-gray-300">Pulsing Indicators</h3>
                    <div class="flex items-center gap-6">
                        <div class="flex items-center gap-2">
                            <div class="relative">
                                <div class="w-4 h-4 bg-blue-500 rounded-full"></div>
                                <div class="absolute inset-0 w-4 h-4 bg-blue-500 rounded-full animate-pulse opacity-50"></div>
                            </div>
                            <span class="text-sm text-gray-700 dark:text-gray-300">Processing</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <div class="relative">
                                <div class="w-4 h-4 bg-purple-500 rounded-full"></div>
                                <div class="absolute inset-0 w-4 h-4 bg-purple-500 rounded-full animate-pulse opacity-50"></div>
                            </div>
                            <span class="text-sm text-gray-700 dark:text-gray-300">Syncing</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <div class="relative">
                                <div class="w-4 h-4 bg-indigo-500 rounded-full"></div>
                                <div class="absolute inset-0 w-4 h-4 bg-indigo-500 rounded-full animate-pulse opacity-50"></div>
                            </div>
                            <span class="text-sm text-gray-700 dark:text-gray-300">Loading</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Spinners & Loaders -->
        <section>
            <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-4">Spinners & Loaders</h2>
            <div class="space-y-6">
                <!-- Basic Spinners -->
                <div class="space-y-3">
                    <h3 class="text-sm font-medium text-gray-700 dark:text-gray-300">Basic Spinners</h3>
                    <div class="flex items-center gap-6">
                        <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-dodger-blue-600"></div>
                        <div class="animate-spin rounded-full h-8 w-8 border-2 border-dodger-blue-600 border-t-transparent"></div>
                        <div class="animate-spin rounded-full h-8 w-8 border-4 border-dodger-blue-200 dark:border-dodger-blue-800 border-t-dodger-blue-600"></div>
                    </div>
                </div>

                <!-- Colored Spinners -->
                <div class="space-y-3">
                    <h3 class="text-sm font-medium text-gray-700 dark:text-gray-300">Colored Spinners</h3>
                    <div class="flex items-center gap-6">
                        <div class="animate-spin rounded-full h-8 w-8 border-2 border-green-600 border-t-transparent"></div>
                        <div class="animate-spin rounded-full h-8 w-8 border-2 border-yellow-600 border-t-transparent"></div>
                        <div class="animate-spin rounded-full h-8 w-8 border-2 border-red-600 border-t-transparent"></div>
                        <div class="animate-spin rounded-full h-8 w-8 border-2 border-purple-600 border-t-transparent"></div>
                    </div>
                </div>

                <!-- Dots Loader -->
                <div class="space-y-3">
                    <h3 class="text-sm font-medium text-gray-700 dark:text-gray-300">Dots Loader</h3>
                    <div class="flex items-center gap-2">
                        <div class="w-2 h-2 bg-dodger-blue-600 rounded-full animate-bounce" style="animation-delay: 0s"></div>
                        <div class="w-2 h-2 bg-dodger-blue-600 rounded-full animate-bounce" style="animation-delay: 0.2s"></div>
                        <div class="w-2 h-2 bg-dodger-blue-600 rounded-full animate-bounce" style="animation-delay: 0.4s"></div>
                    </div>
                </div>

                <!-- Bars Loader -->
                <div class="space-y-3">
                    <h3 class="text-sm font-medium text-gray-700 dark:text-gray-300">Bars Loader</h3>
                    <div class="flex items-end gap-1 h-8">
                        <div class="w-2 bg-dodger-blue-600 rounded-t animate-pulse" style="height: 20%; animation-delay: 0s"></div>
                        <div class="w-2 bg-dodger-blue-600 rounded-t animate-pulse" style="height: 40%; animation-delay: 0.1s"></div>
                        <div class="w-2 bg-dodger-blue-600 rounded-t animate-pulse" style="height: 60%; animation-delay: 0.2s"></div>
                        <div class="w-2 bg-dodger-blue-600 rounded-t animate-pulse" style="height: 80%; animation-delay: 0.3s"></div>
                        <div class="w-2 bg-dodger-blue-600 rounded-t animate-pulse" style="height: 100%; animation-delay: 0.4s"></div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Tags Section -->
        <section>
            <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-4">Tags</h2>
            <div class="space-y-6">
                <!-- Basic Tags -->
                <div class="space-y-3">
                    <h3 class="text-sm font-medium text-gray-700 dark:text-gray-300">Basic Tags</h3>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 text-sm font-medium rounded-md bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-300">Tag 1</span>
                        <span class="px-3 py-1 text-sm font-medium rounded-md bg-blue-100 dark:bg-blue-900/30 text-blue-800 dark:text-blue-300">Tag 2</span>
                        <span class="px-3 py-1 text-sm font-medium rounded-md bg-green-100 dark:bg-green-900/30 text-green-800 dark:text-green-300">Tag 3</span>
                        <span class="px-3 py-1 text-sm font-medium rounded-md bg-purple-100 dark:bg-purple-900/30 text-purple-800 dark:text-purple-300">Tag 4</span>
                        <span class="px-3 py-1 text-sm font-medium rounded-md bg-pink-100 dark:bg-pink-900/30 text-pink-800 dark:text-pink-300">Tag 5</span>
                    </div>
                </div>

                <!-- Dismissible Tags -->
                <div class="space-y-3">
                    <h3 class="text-sm font-medium text-gray-700 dark:text-gray-300">Dismissible Tags</h3>
                    <div class="flex flex-wrap gap-2">
                        <span 
                            x-data="{ show: true }"
                            x-show="show"
                            x-transition
                            class="inline-flex items-center px-3 py-1 text-sm font-medium rounded-md bg-dodger-blue-100 dark:bg-dodger-blue-900/30 text-dodger-blue-800 dark:text-dodger-blue-300"
                        >
                            Dismissible
                            <button @click="show = false" class="ml-2 text-dodger-blue-600 dark:text-dodger-blue-400 hover:text-dodger-blue-800 dark:hover:text-dodger-blue-200">
                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </span>
                        <span 
                            x-data="{ show: true }"
                            x-show="show"
                            x-transition
                            class="inline-flex items-center px-3 py-1 text-sm font-medium rounded-md bg-green-100 dark:bg-green-900/30 text-green-800 dark:text-green-300"
                        >
                            Click to remove
                            <button @click="show = false" class="ml-2 text-green-600 dark:text-green-400 hover:text-green-800 dark:hover:text-green-200">
                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </span>
                    </div>
                </div>
            </div>
        </section>

        <!-- Tooltips Section -->
        <section>
            <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-4">Tooltips</h2>
            <div class="space-y-6">
                <div class="space-y-3">
                    <h3 class="text-sm font-medium text-gray-700 dark:text-gray-300">Hover Tooltips</h3>
                    <div class="flex flex-wrap gap-4">
                        <div class="relative group">
                            <button class="px-4 py-2 bg-dodger-blue-600 text-white rounded-lg hover:bg-dodger-blue-700 transition-colors">
                                Hover me
                            </button>
                            <div class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 hidden group-hover:block">
                                <div class="bg-gray-900 dark:bg-gray-700 text-white text-xs rounded-lg py-2 px-3 shadow-lg whitespace-nowrap">
                                    This is a tooltip
                                    <div class="absolute top-full left-1/2 transform -translate-x-1/2 -mt-1">
                                        <div class="border-4 border-transparent border-t-gray-900 dark:border-t-gray-700"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="relative group">
                            <button class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors">
                                Top tooltip
                            </button>
                            <div class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 hidden group-hover:block">
                                <div class="bg-gray-900 dark:bg-gray-700 text-white text-xs rounded-lg py-2 px-3 shadow-lg whitespace-nowrap">
                                    Tooltip on top
                                    <div class="absolute top-full left-1/2 transform -translate-x-1/2 -mt-1">
                                        <div class="border-4 border-transparent border-t-gray-900 dark:border-t-gray-700"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="relative group">
                            <button class="px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition-colors">
                                Right tooltip
                            </button>
                            <div class="absolute left-full top-1/2 transform -translate-y-1/2 ml-2 hidden group-hover:block">
                                <div class="bg-gray-900 dark:bg-gray-700 text-white text-xs rounded-lg py-2 px-3 shadow-lg whitespace-nowrap">
                                    Tooltip on right
                                    <div class="absolute right-full top-1/2 transform -translate-y-1/2 -mr-1">
                                        <div class="border-4 border-transparent border-r-gray-900 dark:border-r-gray-700"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Dividers Section -->
        <section>
            <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-4">Dividers</h2>
            <div class="space-y-6">
                <div class="space-y-3">
                    <h3 class="text-sm font-medium text-gray-700 dark:text-gray-300">Horizontal Dividers</h3>
                    <div class="space-y-4">
                        <div class="border-t border-gray-200 dark:border-gray-700"></div>
                        <div class="border-t-2 border-gray-300 dark:border-gray-600"></div>
                        <div class="border-t border-dashed border-gray-300 dark:border-gray-600"></div>
                        <div class="border-t border-dotted border-gray-300 dark:border-gray-600"></div>
                    </div>
                </div>
                <div class="space-y-3">
                    <h3 class="text-sm font-medium text-gray-700 dark:text-gray-300">Dividers with Text</h3>
                    <div class="relative">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-gray-200 dark:border-gray-700"></div>
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="px-2 bg-white dark:bg-gray-900 text-gray-500 dark:text-gray-400">OR</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Skeleton Loaders -->
        <section>
            <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-4">Skeleton Loaders</h2>
            <div class="space-y-6">
                <div class="space-y-3">
                    <h3 class="text-sm font-medium text-gray-700 dark:text-gray-300">Text Skeleton</h3>
                    <div class="space-y-2">
                        <div class="h-4 bg-gray-200 dark:bg-gray-700 rounded animate-pulse" style="width: 100%"></div>
                        <div class="h-4 bg-gray-200 dark:bg-gray-700 rounded animate-pulse" style="width: 80%"></div>
                        <div class="h-4 bg-gray-200 dark:bg-gray-700 rounded animate-pulse" style="width: 90%"></div>
                    </div>
                </div>
                <div class="space-y-3">
                    <h3 class="text-sm font-medium text-gray-700 dark:text-gray-300">Card Skeleton</h3>
                    <div class="border border-gray-200 dark:border-gray-700 rounded-lg p-4 space-y-3">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 bg-gray-200 dark:bg-gray-700 rounded-full animate-pulse"></div>
                            <div class="flex-1 space-y-2">
                                <div class="h-4 bg-gray-200 dark:bg-gray-700 rounded animate-pulse" style="width: 60%"></div>
                                <div class="h-3 bg-gray-200 dark:bg-gray-700 rounded animate-pulse" style="width: 40%"></div>
                            </div>
                        </div>
                        <div class="h-3 bg-gray-200 dark:bg-gray-700 rounded animate-pulse"></div>
                        <div class="h-3 bg-gray-200 dark:bg-gray-700 rounded animate-pulse" style="width: 80%"></div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-app-layout>

