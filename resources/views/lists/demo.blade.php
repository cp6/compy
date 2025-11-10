<x-app-layout>
    <x-slot name="header">
        <x-breadcrumb :items="[
            ['label' => 'Home', 'url' => route('dashboard')],
            ['label' => 'Lists', 'url' => '#'],
            ['label' => 'Demo'],
        ]" />
    </x-slot>

    <x-slot name="pageTitle">
        List Components Demo
    </x-slot>

    <x-slot name="pageSubtitle">
        A comprehensive demo of various list components and styles
    </x-slot>

    <x-alert.alerts />
    
    <div class="space-y-8">
                {{-- Basic List --}}
                <x-card.card variant="gradient" title="Basic List">
                    <p class="mb-4 text-gray-600 dark:text-gray-400">
                        Simple list with default styling and variants.
                    </p>
                    
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <div>
                            <h4 class="text-sm font-semibold text-gray-900 dark:text-gray-100 mb-3">Default</h4>
                            <x-list.list>
                                <x-list.item>First item</x-list.item>
                                <x-list.item>Second item</x-list.item>
                                <x-list.item>Third item</x-list.item>
                            </x-list>
                        </div>
                        
                        <div>
                            <h4 class="text-sm font-semibold text-gray-900 dark:text-gray-100 mb-3">Bordered</h4>
                            <x-list.list variant="bordered">
                                <x-list.item variant="padded">First item</x-list.item>
                                <x-list.item variant="padded">Second item</x-list.item>
                                <x-list.item variant="padded">Third item</x-list.item>
                            </x-list>
                        </div>
                        
                        <div>
                            <h4 class="text-sm font-semibold text-gray-900 dark:text-gray-100 mb-3">Divided</h4>
                            <x-list.list variant="divided">
                                <x-list.item>First item</x-list.item>
                                <x-list.item>Second item</x-list.item>
                                <x-list.item>Third item</x-list.item>
                            </x-list>
                        </div>
                        
                        <div>
                            <h4 class="text-sm font-semibold text-gray-900 dark:text-gray-100 mb-3">Spaced</h4>
                            <x-list.list variant="spaced">
                                <x-list.item variant="bordered">First item</x-list.item>
                                <x-list.item variant="bordered">Second item</x-list.item>
                                <x-list.item variant="bordered">Third item</x-list.item>
                            </x-list>
                        </div>
                    </div>
                </x-card>

                {{-- List with Icons --}}
                <x-card.card variant="gradient" title="List with Icons">
                    <p class="mb-4 text-gray-600 dark:text-gray-400">
                        List items with icons and different icon colors.
                    </p>
                    
                    <x-list.list variant="divided">
                        <x-list.item-icon icon="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" iconColor="emerald">
                            Dashboard
                        </x-list.item-icon>
                        <x-list.item-icon icon="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" iconColor="blue">
                            Documents
                        </x-list.item-icon>
                        <x-list.item-icon icon="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" iconColor="yellow">
                            Settings
                        </x-list.item-icon>
                        <x-list.item-icon icon="M10 9v6m4-6v6m7-3a9 9 0 11-18 0 9 9 0 0118 0z" iconColor="purple">
                            Analytics
                        </x-list.item-icon>
                    </x-list>
                </x-card>

                {{-- List with Avatars --}}
                <x-card.card variant="gradient" title="List with Avatars">
                    <p class="mb-4 text-gray-600 dark:text-gray-400">
                        List items with user avatars, initials, and metadata.
                    </p>
                    
                    <x-list.group>
                        <x-list.item-avatar 
                            title="John Doe" 
                            subtitle="Software Engineer"
                            avatarText="JD"
                            badge="<span class='px-2 py-0.5 text-xs font-medium bg-emerald-100 dark:bg-emerald-900/30 text-emerald-800 dark:text-emerald-200 rounded-full'>Active</span>"
                        />
                        <x-list.item-avatar 
                            title="Jane Smith" 
                            subtitle="Product Designer"
                            avatarText="JS"
                            avatarSize="lg"
                        />
                        <x-list.item-avatar 
                            title="Bob Johnson" 
                            subtitle="Marketing Manager"
                            avatarText="BJ"
                            avatarSize="sm"
                        />
                    </x-list.group>
                </x-card>

                {{-- List with Badges --}}
                <x-card.card variant="gradient" title="List with Badges">
                    <p class="mb-4 text-gray-600 dark:text-gray-400">
                        List items with badges showing counts or status indicators.
                    </p>
                    
                    <x-list.list variant="divided">
                        <x-list.item-badge badge="12" badgeColor="emerald" badgePosition="right">
                            Inbox
                        </x-list.item-badge>
                        <x-list.item-badge badge="3" badgeColor="red" badgePosition="right">
                            Unread Messages
                        </x-list.item-badge>
                        <x-list.item-badge badge="New" badgeColor="blue" badgePosition="left">
                            Features
                        </x-list.item-badge>
                        <x-list.item-badge badge="5" badgeColor="yellow" badgePosition="right">
                            Pending Tasks
                        </x-list.item-badge>
                    </x-list>
                </x-card>

                {{-- List with Actions --}}
                <x-card.card variant="gradient" title="List with Actions">
                    <p class="mb-4 text-gray-600 dark:text-gray-400">
                        List items with action buttons or links.
                    </p>
                    
                    <x-list.list variant="divided">
                        <x-list.item-action>
                            <div>
                                <p class="text-sm font-medium text-gray-900 dark:text-gray-100">Document.pdf</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">2.4 MB • Updated 2 hours ago</p>
                            </div>
                            <x-slot name="action">
                                <button class="p-1.5 text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                                    </svg>
                                </button>
                                <button class="p-1.5 text-gray-400 hover:text-red-600 dark:hover:text-red-400 transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                </button>
                            </x-slot>
                        </x-list.item-action>
                        <x-list.item-action>
                            <div>
                                <p class="text-sm font-medium text-gray-900 dark:text-gray-100">Presentation.pptx</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">5.1 MB • Updated yesterday</p>
                            </div>
                            <x-slot name="action">
                                <button class="p-1.5 text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                                    </svg>
                                </button>
                                <button class="p-1.5 text-gray-400 hover:text-red-600 dark:hover:text-red-400 transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                </button>
                            </x-slot>
                        </x-list.item-action>
                    </x-list>
                </x-card>

                {{-- List with Descriptions --}}
                <x-card.card variant="gradient" title="List with Descriptions">
                    <p class="mb-4 text-gray-600 dark:text-gray-400">
                        List items with titles and descriptions.
                    </p>
                    
                    <x-list.list variant="divided">
                        <x-list.item-description 
                            title="Project Alpha"
                            description="A comprehensive project management tool with advanced features"
                            icon="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"
                        />
                        <x-list.item-description 
                            title="Website Redesign"
                            description="Complete redesign of the company website with modern UI/UX"
                            icon="M4 5a1 1 0 011-1h4a1 1 0 011 1v7a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM14 5a1 1 0 011-1h4a1 1 0 011 1v7a1 1 0 01-1 1h-4a1 1 0 01-1-1V5zM4 16a1 1 0 011-1h4a1 1 0 011 1v3a1 1 0 01-1 1H5a1 1 0 01-1-1v-3zM14 16a1 1 0 011-1h4a1 1 0 011 1v3a1 1 0 01-1 1h-4a1 1 0 01-1-1v-3z"
                        />
                        <x-list.item-description 
                            title="Mobile App"
                            description="Native mobile application for iOS and Android platforms"
                            icon="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"
                        />
                    </x-list>
                </x-card>

                {{-- List Group --}}
                <x-card.card variant="gradient" title="List Group">
                    <p class="mb-4 text-gray-600 dark:text-gray-400">
                        Grouped lists with titles and borders.
                    </p>
                    
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <x-list.group title="Recent Activity">
                            <x-list.item variant="padded">Created new document</x-list.item>
                            <x-list.item variant="padded">Updated profile settings</x-list.item>
                            <x-list.item variant="padded">Shared project files</x-list.item>
                        </x-list.group>
                        
                        <x-list.group title="Notifications" variant="bordered">
                            <x-list.item variant="padded">New message from John</x-list.item>
                            <x-list.item variant="padded">Task deadline approaching</x-list.item>
                            <x-list.item variant="padded">System update available</x-list.item>
                        </x-list.group>
                    </div>
                </x-card>

                {{-- Complex Example --}}
                <x-card.card variant="gradient" title="Complex Example">
                    <p class="mb-4 text-gray-600 dark:text-gray-400">
                        Combining multiple list components for a rich user interface.
                    </p>
                    
                    <x-list.group title="Team Members">
                        <x-list.item-avatar 
                            title="Sarah Johnson" 
                            subtitle="Lead Developer • sarah@example.com"
                            avatarText="SJ"
                            avatarSize="lg"
                        >
                            <x-slot name="badge">
                                <span class="px-2 py-0.5 text-xs font-medium bg-emerald-100 dark:bg-emerald-900/30 text-emerald-800 dark:text-emerald-200 rounded-full">Online</span>
                            </x-slot>
                            <x-slot name="action">
                                <button class="p-2 text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path>
                                    </svg>
                                </button>
                            </x-slot>
                        </x-list.item-avatar>
                        <x-list.item-avatar 
                            title="Mike Chen" 
                            subtitle="UI/UX Designer • mike@example.com"
                            avatarText="MC"
                            avatarSize="lg"
                        >
                            <x-slot name="badge">
                                <span class="px-2 py-0.5 text-xs font-medium bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200 rounded-full">Away</span>
                            </x-slot>
                            <x-slot name="action">
                                <button class="p-2 text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path>
                                    </svg>
                                </button>
                            </x-slot>
                        </x-list.item-avatar>
                        <x-list.item-avatar 
                            title="Emily Davis" 
                            subtitle="Product Manager • emily@example.com"
                            avatarText="ED"
                            avatarSize="lg"
                        >
                            <x-slot name="badge">
                                <span class="px-2 py-0.5 text-xs font-medium bg-red-100 dark:bg-red-900/30 text-red-800 dark:text-red-200 rounded-full">Busy</span>
                            </x-slot>
                            <x-slot name="action">
                                <button class="p-2 text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path>
                                    </svg>
                                </button>
                            </x-slot>
                        </x-list.item-avatar>
                    </x-list.group>
                </x-card>

                {{-- Usage Examples --}}
                <x-card.card variant="gradient" title="Usage Examples">
                    <div class="bg-gray-50 dark:bg-gray-900/50 rounded-lg p-4 overflow-x-auto">
                        <pre class="text-sm text-gray-800 dark:text-gray-200"><code>&lt;!-- Basic List --&gt;
&lt;x-list variant="divided"&gt;
    &lt;x-list.item&gt;Item 1&lt;/x-list.item&gt;
    &lt;x-list.item&gt;Item 2&lt;/x-list.item&gt;
&lt;/x-list&gt;

&lt;!-- List with Icons --&gt;
&lt;x-list.item-icon icon="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" iconColor="emerald"&gt;
    Dashboard
&lt;/x-list.item-icon&gt;

&lt;!-- List with Avatar --&gt;
&lt;x-list.item-avatar 
    title="John Doe" 
    subtitle="Software Engineer"
    avatarText="JD"
    badge="&lt;span class='px-2 py-0.5 text-xs font-medium bg-emerald-100 dark:bg-emerald-900/30 text-emerald-800 dark:text-emerald-200 rounded-full'&gt;Active&lt;/span&gt;"
/&gt;

&lt;!-- List Group --&gt;
&lt;x-list.group title="Recent Activity"&gt;
    &lt;x-list.item variant="padded"&gt;Item 1&lt;/x-list.item&gt;
    &lt;x-list.item variant="padded"&gt;Item 2&lt;/x-list.item&gt;
&lt;/x-list.group&gt;</code></pre>
                    </div>
                </x-card>
            </div>
</x-app-layout>

