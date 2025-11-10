<x-app-layout>
    <x-slot name="header">
        <x-breadcrumb :items="[
            ['label' => 'Home', 'url' => route('dashboard')],
            ['label' => 'Premium Demo', 'url' => '#'],
        ]" />
    </x-slot>

    <x-slot name="pageTitle">
        Premium Features Demo
    </x-slot>

    <x-slot name="pageSubtitle">
        See what's available with a premium subscription
    </x-slot>

    <x-alert.alerts />
            
            <!-- Premium Banner -->
            <x-card.card variant="gradient" class="mb-8 bg-gradient-to-r from-dodger-blue-600 via-dodger-blue-500 to-purple-600 dark:from-dodger-blue-700 dark:via-dodger-blue-600 dark:to-purple-700 text-white border-0">
                <div class="flex flex-col md:flex-row items-center justify-between gap-4">
                    <div>
                        <h2 class="text-2xl font-bold mb-2">Unlock Premium Features</h2>
                        <p class="text-dodger-blue-100 dark:text-dodger-blue-200">Get access to advanced analytics, unlimited exports, priority support, and more.</p>
                    </div>
                    <x-button.button variant="primary" size="lg" class="bg-white text-dodger-blue-600 hover:bg-gray-100 dark:bg-gray-100 dark:text-dodger-blue-700 dark:hover:bg-gray-200">
                        Upgrade to Premium
                    </x-button>
                </div>
            </x-card>

            <!-- Analytics Dashboard Section -->
            <x-card.card variant="gradient" class="mb-8">
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100">Analytics Dashboard</h2>
                        <p class="text-gray-600 dark:text-gray-400 mt-1">Track your performance with detailed insights</p>
                    </div>
                    <span class="px-3 py-1 text-xs font-semibold bg-dodger-blue-100 dark:bg-dodger-blue-900/30 text-dodger-blue-800 dark:text-dodger-blue-200 rounded-full">
                        Premium
                    </span>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
                    <!-- Free Stats -->
                    <div class="p-4 bg-gray-50 dark:bg-gray-900/50 rounded-xl">
                        <div class="text-2xl font-bold text-gray-900 dark:text-gray-100">1,234</div>
                        <div class="text-sm text-gray-600 dark:text-gray-400 mt-1">Total Views</div>
                    </div>
                    <div class="p-4 bg-gray-50 dark:bg-gray-900/50 rounded-xl">
                        <div class="text-2xl font-bold text-gray-900 dark:text-gray-100">567</div>
                        <div class="text-sm text-gray-600 dark:text-gray-400 mt-1">Active Users</div>
                    </div>
                    
                    <!-- Premium Stats (Locked) -->
                    <div class="relative p-4 bg-gray-50 dark:bg-gray-900/50 rounded-xl opacity-60">
                        <div class="absolute inset-0 bg-gray-200/50 dark:bg-gray-800/50 rounded-xl backdrop-blur-sm flex items-center justify-center">
                            <div class="text-center">
                                <svg class="w-8 h-8 text-gray-400 dark:text-gray-500 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                                <span class="text-xs font-medium text-gray-500 dark:text-gray-400">Premium</span>
                            </div>
                        </div>
                        <div class="text-2xl font-bold text-gray-400 dark:text-gray-600">--</div>
                        <div class="text-sm text-gray-500 dark:text-gray-600 mt-1">Conversion Rate</div>
                    </div>
                    <div class="relative p-4 bg-gray-50 dark:bg-gray-900/50 rounded-xl opacity-60">
                        <div class="absolute inset-0 bg-gray-200/50 dark:bg-gray-800/50 rounded-xl backdrop-blur-sm flex items-center justify-center">
                            <div class="text-center">
                                <svg class="w-8 h-8 text-gray-400 dark:text-gray-500 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                                <span class="text-xs font-medium text-gray-500 dark:text-gray-400">Premium</span>
                            </div>
                        </div>
                        <div class="text-2xl font-bold text-gray-400 dark:text-gray-600">--</div>
                        <div class="text-sm text-gray-500 dark:text-gray-600 mt-1">Revenue (MRR)</div>
                    </div>
                </div>

                <!-- Advanced Chart (Locked) -->
                <div class="relative">
                    <div class="absolute inset-0 bg-white/80 dark:bg-gray-900/80 backdrop-blur-md rounded-xl z-10 flex flex-col items-center justify-center p-8">
                        <svg class="w-16 h-16 text-gray-400 dark:text-gray-500 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-gray-100 mb-2">Advanced Analytics</h3>
                        <p class="text-gray-600 dark:text-gray-400 text-center mb-6 max-w-md">
                            Unlock detailed charts, custom date ranges, export capabilities, and real-time data updates.
                        </p>
                        <x-button.button variant="primary" size="lg">
                            Upgrade to Unlock
                        </x-button>
                    </div>
                    <div class="h-64 bg-gradient-to-br from-gray-100 to-gray-200 dark:from-gray-800 dark:to-gray-900 rounded-xl flex items-center justify-center opacity-30">
                        <svg class="w-24 h-24 text-gray-300 dark:text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                    </div>
                </div>
            </x-card>

            <!-- Feature Comparison Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <!-- Export Features -->
                <x-card.card variant="gradient" class="relative">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-xl font-bold text-gray-900 dark:text-gray-100">Export Options</h3>
                        <span class="px-3 py-1 text-xs font-semibold bg-yellow-100 dark:bg-yellow-900/30 text-yellow-800 dark:text-yellow-200 rounded-full">
                            Limited
                        </span>
                    </div>
                    
                    <div class="space-y-3">
                        <!-- Free Feature -->
                        <div class="flex items-center justify-between p-3 bg-gray-50 dark:bg-gray-900/50 rounded-lg">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-green-600 dark:text-green-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <span class="text-gray-700 dark:text-gray-300">CSV Export (5/month)</span>
                            </div>
                        </div>
                        
                        <!-- Premium Feature (Locked) -->
                        <div class="relative p-3 bg-gray-50 dark:bg-gray-900/50 rounded-lg opacity-60">
                            <div class="absolute inset-0 bg-gray-200/30 dark:bg-gray-800/30 rounded-lg flex items-center justify-end pr-3">
                                <svg class="w-5 h-5 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </div>
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-gray-400 dark:text-gray-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                                <span class="text-gray-500 dark:text-gray-600">Unlimited Exports</span>
                            </div>
                        </div>
                        
                        <!-- Premium Feature (Locked) -->
                        <div class="relative p-3 bg-gray-50 dark:bg-gray-900/50 rounded-lg opacity-60">
                            <div class="absolute inset-0 bg-gray-200/30 dark:bg-gray-800/30 rounded-lg flex items-center justify-end pr-3">
                                <svg class="w-5 h-5 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </div>
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-gray-400 dark:text-gray-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                                <span class="text-gray-500 dark:text-gray-600">PDF Reports</span>
                            </div>
                        </div>
                        
                        <!-- Premium Feature (Locked) -->
                        <div class="relative p-3 bg-gray-50 dark:bg-gray-900/50 rounded-lg opacity-60">
                            <div class="absolute inset-0 bg-gray-200/30 dark:bg-gray-800/30 rounded-lg flex items-center justify-end pr-3">
                                <svg class="w-5 h-5 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </div>
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-gray-400 dark:text-gray-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                                <span class="text-gray-500 dark:text-gray-600">Excel Format</span>
                            </div>
                        </div>
                    </div>
                </x-card>

                <!-- Advanced Settings -->
                <x-card.card variant="gradient" class="relative">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-xl font-bold text-gray-900 dark:text-gray-100">Advanced Settings</h3>
                        <span class="px-3 py-1 text-xs font-semibold bg-dodger-blue-100 dark:bg-dodger-blue-900/30 text-dodger-blue-800 dark:text-dodger-blue-200 rounded-full">
                            Premium
                        </span>
                    </div>
                    
                    <div class="space-y-3">
                        <!-- Premium Feature (Locked) -->
                        <div class="relative p-3 bg-gray-50 dark:bg-gray-900/50 rounded-lg opacity-60">
                            <div class="absolute inset-0 bg-gray-200/30 dark:bg-gray-800/30 rounded-lg flex items-center justify-end pr-3">
                                <svg class="w-5 h-5 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </div>
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-gray-400 dark:text-gray-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                                <span class="text-gray-500 dark:text-gray-600">Custom Branding</span>
                            </div>
                        </div>
                        
                        <!-- Premium Feature (Locked) -->
                        <div class="relative p-3 bg-gray-50 dark:bg-gray-900/50 rounded-lg opacity-60">
                            <div class="absolute inset-0 bg-gray-200/30 dark:bg-gray-800/30 rounded-lg flex items-center justify-end pr-3">
                                <svg class="w-5 h-5 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </div>
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-gray-400 dark:text-gray-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                                <span class="text-gray-500 dark:text-gray-600">API Access</span>
                            </div>
                        </div>
                        
                        <!-- Premium Feature (Locked) -->
                        <div class="relative p-3 bg-gray-50 dark:bg-gray-900/50 rounded-lg opacity-60">
                            <div class="absolute inset-0 bg-gray-200/30 dark:bg-gray-800/30 rounded-lg flex items-center justify-end pr-3">
                                <svg class="w-5 h-5 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </div>
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-gray-400 dark:text-gray-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                                <span class="text-gray-500 dark:text-gray-600">Webhook Integrations</span>
                            </div>
                        </div>
                        
                        <!-- Premium Feature (Locked) -->
                        <div class="relative p-3 bg-gray-50 dark:bg-gray-900/50 rounded-lg opacity-60">
                            <div class="absolute inset-0 bg-gray-200/30 dark:bg-gray-800/30 rounded-lg flex items-center justify-end pr-3">
                                <svg class="w-5 h-5 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </div>
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-gray-400 dark:text-gray-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                                <span class="text-gray-500 dark:text-gray-600">White Label Options</span>
                            </div>
                        </div>
                    </div>
                </x-card>
            </div>

            <!-- Team Collaboration Section -->
            <x-card.card variant="gradient" class="mb-8 relative">
                <div class="absolute inset-0 bg-white/90 dark:bg-gray-900/90 backdrop-blur-sm rounded-2xl z-10 flex flex-col items-center justify-center p-8">
                    <svg class="w-20 h-20 text-dodger-blue-500 dark:text-dodger-blue-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-2">Team Collaboration</h3>
                    <p class="text-gray-600 dark:text-gray-400 text-center mb-6 max-w-md">
                        Invite team members, assign roles, collaborate in real-time, and manage permissions. Perfect for growing teams.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-3">
                        <x-button.button variant="primary" size="lg">
                            Upgrade to Unlock
                        </x-button>
                        <x-button.button variant="outline" size="lg">
                            View Pricing
                        </x-button>
                    </div>
                </div>
                
                <div class="opacity-30">
                    <div class="flex items-center justify-between mb-6">
                        <div>
                            <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100">Team Members</h2>
                            <p class="text-gray-600 dark:text-gray-400 mt-1">Manage your team and permissions</p>
                        </div>
                        <x-button.button variant="primary" disabled>Invite Member</x-button>
                    </div>
                    
                    <div class="space-y-3">
                        <div class="flex items-center p-4 bg-gray-50 dark:bg-gray-900/50 rounded-lg">
                            <div class="w-10 h-10 rounded-full bg-dodger-blue-100 dark:bg-dodger-blue-900/30 flex items-center justify-center mr-4">
                                <span class="text-dodger-blue-600 dark:text-dodger-blue-400 font-semibold">JD</span>
                            </div>
                            <div class="flex-1">
                                <div class="font-semibold text-gray-900 dark:text-gray-100">John Doe</div>
                                <div class="text-sm text-gray-600 dark:text-gray-400">Administrator</div>
                            </div>
                            <span class="px-3 py-1 text-xs font-medium bg-green-100 dark:bg-green-900/30 text-green-800 dark:text-green-200 rounded-full">Active</span>
                        </div>
                        <div class="flex items-center p-4 bg-gray-50 dark:bg-gray-900/50 rounded-lg">
                            <div class="w-10 h-10 rounded-full bg-purple-100 dark:bg-purple-900/30 flex items-center justify-center mr-4">
                                <span class="text-purple-600 dark:text-purple-400 font-semibold">JS</span>
                            </div>
                            <div class="flex-1">
                                <div class="font-semibold text-gray-900 dark:text-gray-100">Jane Smith</div>
                                <div class="text-sm text-gray-600 dark:text-gray-400">Editor</div>
                            </div>
                            <span class="px-3 py-1 text-xs font-medium bg-green-100 dark:bg-green-900/30 text-green-800 dark:text-green-200 rounded-full">Active</span>
                        </div>
                    </div>
                </div>
            </x-card>

            <!-- Priority Support Section -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <!-- Support Options -->
                <x-card.card variant="gradient">
                    <h3 class="text-xl font-bold text-gray-900 dark:text-gray-100 mb-4">Support Options</h3>
                    
                    <div class="space-y-3">
                        <!-- Free Support -->
                        <div class="p-4 bg-gray-50 dark:bg-gray-900/50 rounded-lg border-2 border-gray-200 dark:border-gray-700">
                            <div class="flex items-center justify-between mb-2">
                                <span class="font-semibold text-gray-900 dark:text-gray-100">Email Support</span>
                                <span class="px-2 py-1 text-xs font-medium bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded">Free</span>
                            </div>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Response within 48 hours</p>
                        </div>
                        
                        <!-- Premium Support (Locked) -->
                        <div class="relative p-4 bg-gray-50 dark:bg-gray-900/50 rounded-lg border-2 border-dashed border-gray-300 dark:border-gray-600 opacity-60">
                            <div class="absolute inset-0 bg-gray-200/30 dark:bg-gray-800/30 rounded-lg flex items-center justify-end pr-4">
                                <svg class="w-6 h-6 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </div>
                            <div class="flex items-center justify-between mb-2">
                                <span class="font-semibold text-gray-500 dark:text-gray-600">Priority Support</span>
                                <span class="px-2 py-1 text-xs font-medium bg-dodger-blue-100 dark:bg-dodger-blue-900/30 text-dodger-blue-800 dark:text-dodger-blue-200 rounded">Premium</span>
                            </div>
                            <p class="text-sm text-gray-500 dark:text-gray-600">Response within 2 hours</p>
                        </div>
                        
                        <!-- Premium Support (Locked) -->
                        <div class="relative p-4 bg-gray-50 dark:bg-gray-900/50 rounded-lg border-2 border-dashed border-gray-300 dark:border-gray-600 opacity-60">
                            <div class="absolute inset-0 bg-gray-200/30 dark:bg-gray-800/30 rounded-lg flex items-center justify-end pr-4">
                                <svg class="w-6 h-6 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </div>
                            <div class="flex items-center justify-between mb-2">
                                <span class="font-semibold text-gray-500 dark:text-gray-600">Live Chat</span>
                                <span class="px-2 py-1 text-xs font-medium bg-dodger-blue-100 dark:bg-dodger-blue-900/30 text-dodger-blue-800 dark:text-dodger-blue-200 rounded">Premium</span>
                            </div>
                            <p class="text-sm text-gray-500 dark:text-gray-600">24/7 instant support</p>
                        </div>
                    </div>
                </x-card>

                <!-- Storage Limits -->
                <x-card.card variant="gradient">
                    <h3 class="text-xl font-bold text-gray-900 dark:text-gray-100 mb-4">Storage & Limits</h3>
                    
                    <div class="space-y-4">
                        <div>
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Storage Used</span>
                                <span class="text-sm text-gray-600 dark:text-gray-400">2.5 GB / 10 GB</span>
                            </div>
                            <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2">
                                <div class="bg-dodger-blue-600 dark:bg-dodger-blue-500 h-2 rounded-full" style="width: 25%"></div>
                            </div>
                        </div>
                        
                        <div class="relative p-4 bg-gray-50 dark:bg-gray-900/50 rounded-lg border-2 border-dashed border-gray-300 dark:border-gray-600">
                            <div class="absolute top-2 right-2">
                                <svg class="w-5 h-5 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </div>
                            <div class="flex items-center justify-between mb-1">
                                <span class="font-semibold text-gray-700 dark:text-gray-300">Unlimited Storage</span>
                                <span class="px-2 py-1 text-xs font-medium bg-dodger-blue-100 dark:bg-dodger-blue-900/30 text-dodger-blue-800 dark:text-dodger-blue-200 rounded">Premium</span>
                            </div>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Never worry about running out of space</p>
                        </div>
                    </div>
                </x-card>
            </div>

            <!-- Upgrade CTA -->
            <x-card.card variant="gradient" class="text-center bg-gradient-to-r from-dodger-blue-50 via-purple-50 to-dodger-blue-50 dark:from-dodger-blue-900/20 dark:via-purple-900/20 dark:to-dodger-blue-900/20">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-3">Ready to Unlock Premium?</h2>
                <p class="text-gray-600 dark:text-gray-400 mb-6 text-lg max-w-2xl mx-auto">
                    Get access to all premium features, priority support, unlimited storage, and more. Start your 14-day free trial today.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <x-button.button variant="primary" size="lg">
                        Start Free Trial
                    </x-button>
                    <a href="{{ route('pricing') }}">
                        <x-button.button variant="outline" size="lg">
                            View Pricing Plans
                        </x-button>
                    </a>
                </div>
            </x-card>
        </div>
</x-app-layout>

