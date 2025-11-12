<x-app-layout>
    <x-slot name="header">
        <x-breadcrumb :items="[
            ['label' => 'Home', 'url' => route('dashboard')],
            ['label' => 'Cards', 'url' => '#'],
            ['label' => 'Demo'],
        ]" />
    </x-slot>

    <x-slot name="pageTitle">
        Card Components Demo
    </x-slot>

    <x-slot name="pageSubtitle">
        A comprehensive demo of all available card component variants and styles
    </x-slot>

    <x-alert.alerts />
    
    <div class="space-y-6 sm:space-y-8">
                <!-- Card Variants -->
                <x-card.card variant="gradient" title="Card Variants">
                    <p class="mb-6 text-gray-600 dark:text-gray-400">
                        The card component comes in three variants: default, gradient, and glass. Each has its own unique styling and use cases.
                    </p>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 sm:gap-6">
                        <!-- Default Variant -->
                        <x-card.card variant="default" title="Default Card">
                            <p class="text-gray-600 dark:text-gray-400">
                                The default card variant with clean white background and standard shadow. Perfect for general content display.
                            </p>
                        </x-card>

                        <!-- Gradient Variant -->
                        <x-card.card variant="gradient" title="Gradient Card">
                            <p class="text-gray-600 dark:text-gray-400">
                                The gradient variant features a subtle gradient background and enhanced shadow. Great for highlighting important content.
                            </p>
                        </x-card>

                        <!-- Glass Variant -->
                        <x-card.card variant="glass" title="Glass Card">
                            <p class="text-gray-600 dark:text-gray-400">
                                The glass variant uses backdrop blur and transparency for a modern glassmorphism effect. Ideal for overlays and modern designs.
                            </p>
                        </x-card>
                    </div>
                </x-card>

                <!-- Cards with Titles and Subtitles -->
                <x-card.card variant="gradient" title="Cards with Titles and Subtitles">
                    <p class="mb-6 text-gray-600 dark:text-gray-400">
                        Cards can include titles and subtitles for better content organization.
                    </p>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6">
                        <x-card.card variant="gradient" title="Card with Title">
                            <p class="text-gray-600 dark:text-gray-400">
                                This card has a title only. The title uses a gradient text effect for visual appeal.
                            </p>
                        </x-card>

                        <x-card.card variant="gradient" title="Card with Title" subtitle="And a subtitle for additional context">
                            <p class="text-gray-600 dark:text-gray-400">
                                This card includes both a title and subtitle. Subtitles are perfect for providing additional context or descriptions.
                            </p>
                        </x-card>
                    </div>
                </x-card>

                <!-- Cards with Custom Headers -->
                <x-card.card variant="gradient" title="Cards with Custom Headers">
                    <p class="mb-6 text-gray-600 dark:text-gray-400">
                        You can use the header slot to create custom card headers with any content you need.
                    </p>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6">
                        <x-card.card variant="gradient">
                            <x-slot name="header">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <h3 class="text-xl font-bold text-gray-900 dark:text-gray-100">Custom Header</h3>
                                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">With additional elements</p>
                                    </div>
                                    <div class="px-3 py-1 bg-dodger-blue-100 dark:bg-dodger-blue-900/30 rounded-full">
                                        <span class="text-sm font-medium text-dodger-blue-600 dark:text-dodger-blue-400">New</span>
                                    </div>
                                </div>
                            </x-slot>
                            <p class="text-gray-600 dark:text-gray-400">
                                This card uses a custom header slot to include additional elements like badges or action buttons.
                            </p>
                        </x-card>

                        <x-card.card variant="gradient">
                            <x-slot name="header">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 rounded-full bg-dodger-blue-100 dark:bg-dodger-blue-900/30 flex items-center justify-center">
                                        <svg class="w-6 h-6 text-dodger-blue-600 dark:text-dodger-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="text-xl font-bold text-gray-900 dark:text-gray-100">Icon Header</h3>
                                        <p class="text-sm text-gray-600 dark:text-gray-400">With icon and description</p>
                                    </div>
                                </div>
                            </x-slot>
                            <p class="text-gray-600 dark:text-gray-400">
                                Custom headers can include icons, images, or any other content to make your cards more visually appealing.
                            </p>
                        </x-card>
                    </div>
                </x-card>

                <!-- Cards with Action Menus -->
                <x-card.card variant="gradient" title="Cards with Action Menus">
                    <p class="mb-6 text-gray-600 dark:text-gray-400">
                        The <code class="px-2 py-1 bg-gray-100 dark:bg-gray-800 rounded text-sm">x-card.with-actions</code> component provides a dedicated card variant with title and subtitle on the left, and a dropdown action menu on the right.
                    </p>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6">
                        <!-- Basic Card with Actions -->
                        <x-card.with-actions 
                            variant="gradient"
                            title="Project Dashboard"
                            subtitle="Last updated 2 hours ago"
                        >
                            <x-slot name="actions">
                                <x-dropdown.dropdown align="right" width="48">
                                    <x-slot name="trigger">
                                        <button class="inline-flex items-center p-2 text-sm font-medium text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-md hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-dodger-blue-500 dark:focus:ring-dodger-blue-400 transition-colors">
                                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"></path>
                                            </svg>
                                        </button>
                                    </x-slot>

                                    <x-slot name="content">
                                        <x-dropdown.item href="#" icon='<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>'>
                                            Edit
                                        </x-dropdown.item>
                                        <x-dropdown.item href="#" icon='<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>'>
                                            Duplicate
                                        </x-dropdown.item>
                                        <x-dropdown.item href="#" icon='<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path></svg>'>
                                            Share
                                        </x-dropdown.item>
                                        <div class="border-t border-gray-200 dark:border-gray-700 my-1"></div>
                                        <x-dropdown.item href="#" danger icon='<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>'>
                                            Delete
                                        </x-dropdown.item>
                                    </x-slot>
                                </x-dropdown.dropdown>
                            </x-slot>
                            <p class="text-gray-600 dark:text-gray-400">
                                This card demonstrates the basic usage with a dropdown action menu. Click the three-dot menu to see available actions.
                            </p>
                        </x-card.with-actions>

                        <!-- Card with Actions and Hover -->
                        <x-card.with-actions 
                            variant="gradient"
                            hover
                            title="User Profile"
                            subtitle="Active member since 2023"
                        >
                            <x-slot name="actions">
                                <x-dropdown.dropdown align="right" width="48">
                                    <x-slot name="trigger">
                                        <button class="inline-flex items-center p-2 text-sm font-medium text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-md hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-dodger-blue-500 dark:focus:ring-dodger-blue-400 transition-colors">
                                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"></path>
                                            </svg>
                                        </button>
                                    </x-slot>

                                    <x-slot name="content">
                                        <x-dropdown.item href="#" icon='<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>'>
                                            View Profile
                                        </x-dropdown.item>
                                        <x-dropdown.item href="#" icon='<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>'>
                                            Send Message
                                        </x-dropdown.item>
                                        <x-dropdown.item href="#" icon='<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>'>
                                            Block User
                                        </x-dropdown.item>
                                    </x-slot>
                                </x-dropdown.dropdown>
                            </x-slot>
                            <p class="text-gray-600 dark:text-gray-400">
                                This card includes hover effects for enhanced interactivity. Hover over the card to see the effect.
                            </p>
                        </x-card.with-actions>

                        <!-- Glass Variant with Actions -->
                        <x-card.with-actions 
                            variant="glass"
                            title="Settings"
                            subtitle="Configure your preferences"
                        >
                            <x-slot name="actions">
                                <x-dropdown.dropdown align="right" width="48">
                                    <x-slot name="trigger">
                                        <button class="inline-flex items-center p-2 text-sm font-medium text-gray-500 dark:text-gray-400 bg-white/50 dark:bg-gray-800/50 border border-gray-300/50 dark:border-gray-600/50 rounded-md hover:bg-white/80 dark:hover:bg-gray-800/80 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-dodger-blue-500 dark:focus:ring-dodger-blue-400 transition-colors backdrop-blur-sm">
                                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"></path>
                                            </svg>
                                        </button>
                                    </x-slot>

                                    <x-slot name="content">
                                        <x-dropdown.item href="#" icon='<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>'>
                                            Preferences
                                        </x-dropdown.item>
                                        <x-dropdown.item href="#" icon='<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path></svg>'>
                                            Advanced
                                        </x-dropdown.item>
                                        <div class="border-t border-gray-200 dark:border-gray-700 my-1"></div>
                                        <x-dropdown.item href="#" icon='<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>'>
                                            Reset to Defaults
                                        </x-dropdown.item>
                                    </x-slot>
                                </x-dropdown.dropdown>
                            </x-slot>
                            <p class="text-gray-600 dark:text-gray-400">
                                The glass variant works great with action menus, providing a modern glassmorphism effect.
                            </p>
                        </x-card.with-actions>

                        <!-- Default Variant with Actions -->
                        <x-card.with-actions 
                            variant="default"
                            title="Document"
                            subtitle="Created on January 15, 2024"
                        >
                            <x-slot name="actions">
                                <x-dropdown.dropdown align="right" width="48">
                                    <x-slot name="trigger">
                                        <button class="inline-flex items-center p-2 text-sm font-medium text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-md hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-dodger-blue-500 dark:focus:ring-dodger-blue-400 transition-colors">
                                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"></path>
                                            </svg>
                                        </button>
                                    </x-slot>

                                    <x-slot name="content">
                                        <x-dropdown.item href="#" icon='<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>'>
                                            Rename
                                        </x-dropdown.item>
                                        <x-dropdown.item href="#" icon='<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>'>
                                            Make a Copy
                                        </x-dropdown.item>
                                        <x-dropdown.item href="#" icon='<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.885 12.938 9 12.482 9 12c0-.482-.115-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"></path></svg>'>
                                            Share
                                        </x-dropdown.item>
                                        <div class="border-t border-gray-200 dark:border-gray-700 my-1"></div>
                                        <x-dropdown.item href="#" danger icon='<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>'>
                                            Delete
                                        </x-dropdown.item>
                                    </x-slot>
                                </x-dropdown.dropdown>
                            </x-slot>
                            <p class="text-gray-600 dark:text-gray-400">
                                The default variant provides a clean, professional look with standard shadows and borders.
                            </p>
                        </x-card.with-actions>
                    </div>
                </x-card>

                <!-- Cards with Hover Effects -->
                <x-card.card variant="gradient" title="Cards with Hover Effects">
                    <p class="mb-6 text-gray-600 dark:text-gray-400">
                        Enable hover effects to add interactivity to your cards. Hover over the cards below to see the effect.
                    </p>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 sm:gap-6">
                        <x-card.card variant="default" hover title="Default with Hover">
                            <p class="text-gray-600 dark:text-gray-400">
                                Hover over this card to see the scale and shadow effect.
                            </p>
                        </x-card>

                        <x-card.card variant="gradient" hover title="Gradient with Hover">
                            <p class="text-gray-600 dark:text-gray-400">
                                The gradient variant with hover effect creates a smooth interactive experience.
                            </p>
                        </x-card>

                        <x-card.card variant="glass" hover title="Glass with Hover">
                            <p class="text-gray-600 dark:text-gray-400">
                                Even glass cards can have hover effects for enhanced interactivity.
                            </p>
                        </x-card>
                    </div>
                </x-card>

                <!-- Card Content Examples -->
                <x-card.card variant="gradient" title="Card Content Examples">
                    <p class="mb-6 text-gray-600 dark:text-gray-400">
                        Cards can contain any type of content - text, images, forms, lists, or combinations of elements.
                    </p>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6">
                        <!-- Card with List -->
                        <x-card.card variant="gradient" title="Card with List">
                            <ul class="space-y-2 text-gray-600 dark:text-gray-400">
                                <li class="flex items-center">
                                    <svg class="w-5 h-5 text-dodger-blue-600 dark:text-dodger-blue-400 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                    Feature one
                                </li>
                                <li class="flex items-center">
                                    <svg class="w-5 h-5 text-dodger-blue-600 dark:text-dodger-blue-400 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                    Feature two
                                </li>
                                <li class="flex items-center">
                                    <svg class="w-5 h-5 text-dodger-blue-600 dark:text-dodger-blue-400 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                    Feature three
                                </li>
                            </ul>
                        </x-card>

                        <!-- Card with Stats -->
                        <x-card.card variant="gradient" title="Card with Statistics">
                            <div class="grid grid-cols-2 gap-4">
                                <div class="text-center p-4 bg-gray-50 dark:bg-gray-900/50 rounded-xl">
                                    <div class="text-3xl font-bold text-dodger-blue-600 dark:text-dodger-blue-400">1,234</div>
                                    <div class="text-sm text-gray-600 dark:text-gray-400 mt-1">Total Users</div>
                                </div>
                                <div class="text-center p-4 bg-gray-50 dark:bg-gray-900/50 rounded-xl">
                                    <div class="text-3xl font-bold text-emerald-600 dark:text-emerald-400">567</div>
                                    <div class="text-sm text-gray-600 dark:text-gray-400 mt-1">Active Now</div>
                                </div>
                            </div>
                        </x-card>

                        <!-- Card with Form -->
                        <x-card.card variant="gradient" title="Card with Form">
                            <form class="space-y-4">
                                <div>
                                    <x-form.label for="email" value="Email" />
                                    <input type="email" id="email" name="email" class="mt-1 w-full px-4 py-2 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-dodger-blue-500 dark:focus:ring-dodger-blue-400 focus:border-transparent" placeholder="you@example.com">
                                </div>
                                <x-button.primary variant="gradient" class="w-full">
                                    Subscribe
                                </x-button.primary>
                            </form>
                        </x-card>

                        <!-- Card with Image Placeholder -->
                        <x-card.card variant="gradient" title="Card with Image">
                            <div class="aspect-video bg-gradient-to-br from-dodger-blue-400 to-purple-500 rounded-xl flex items-center justify-center mb-4">
                                <svg class="w-16 h-16 text-white opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <p class="text-gray-600 dark:text-gray-400">
                                Cards can include images, graphics, or any visual content to enhance the user experience.
                            </p>
                        </x-card>
                    </div>
                </x-card>

                <!-- Card Grid Layouts -->
                <x-card.card variant="gradient" title="Card Grid Layouts">
                    <p class="mb-6 text-gray-600 dark:text-gray-400">
                        Cards work great in grid layouts for displaying multiple items or creating dashboard-style interfaces.
                    </p>
                    
                    <!-- 3 Column Grid -->
                    <div class="mb-6">
                        <h4 class="text-sm font-semibold text-gray-900 dark:text-gray-100 mb-3">3 Column Grid</h4>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <x-card.card variant="gradient" hover>
                                <div class="text-center">
                                    <div class="w-12 h-12 mx-auto mb-3 rounded-full bg-dodger-blue-100 dark:bg-dodger-blue-900/30 flex items-center justify-center">
                                        <svg class="w-6 h-6 text-dodger-blue-600 dark:text-dodger-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                        </svg>
                                    </div>
                                    <h5 class="font-semibold text-gray-900 dark:text-gray-100">Add New</h5>
                                </div>
                            </x-card>
                            <x-card.card variant="gradient" hover>
                                <div class="text-center">
                                    <div class="w-12 h-12 mx-auto mb-3 rounded-full bg-emerald-100 dark:bg-emerald-900/30 flex items-center justify-center">
                                        <svg class="w-6 h-6 text-emerald-600 dark:text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <h5 class="font-semibold text-gray-900 dark:text-gray-100">Completed</h5>
                                </div>
                            </x-card>
                            <x-card.card variant="gradient" hover>
                                <div class="text-center">
                                    <div class="w-12 h-12 mx-auto mb-3 rounded-full bg-purple-100 dark:bg-purple-900/30 flex items-center justify-center">
                                        <svg class="w-6 h-6 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                        </svg>
                                    </div>
                                    <h5 class="font-semibold text-gray-900 dark:text-gray-100">Quick Action</h5>
                                </div>
                            </x-card>
                        </div>
                    </div>

                    <!-- 4 Column Grid -->
                    <div class="mb-6">
                        <h4 class="text-sm font-semibold text-gray-900 dark:text-gray-100 mb-3">4 Column Grid</h4>
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                            <x-card.card variant="default" hover>
                                <div class="text-center">
                                    <div class="text-2xl font-bold text-gray-900 dark:text-gray-100">42</div>
                                    <div class="text-sm text-gray-600 dark:text-gray-400 mt-1">Items</div>
                                </div>
                            </x-card>
                            <x-card.card variant="default" hover>
                                <div class="text-center">
                                    <div class="text-2xl font-bold text-gray-900 dark:text-gray-100">128</div>
                                    <div class="text-sm text-gray-600 dark:text-gray-400 mt-1">Views</div>
                                </div>
                            </x-card>
                            <x-card.card variant="default" hover>
                                <div class="text-center">
                                    <div class="text-2xl font-bold text-gray-900 dark:text-gray-100">89</div>
                                    <div class="text-sm text-gray-600 dark:text-gray-400 mt-1">Likes</div>
                                </div>
                            </x-card>
                            <x-card.card variant="default" hover>
                                <div class="text-center">
                                    <div class="text-2xl font-bold text-gray-900 dark:text-gray-100">15</div>
                                    <div class="text-sm text-gray-600 dark:text-gray-400 mt-1">Shares</div>
                                </div>
                            </x-card>
                        </div>
                    </div>

                    <!-- 8 Column Grid -->
                    <div>
                        <h4 class="text-sm font-semibold text-gray-900 dark:text-gray-100 mb-3">8 Column Grid</h4>
                        <div class="grid grid-cols-2 sm:grid-cols-4 lg:grid-cols-8 gap-4">
                            <x-card.card variant="default" hover>
                                <div class="text-center">
                                    <div class="text-xl font-bold text-gray-900 dark:text-gray-100">42</div>
                                    <div class="text-xs text-gray-600 dark:text-gray-400 mt-1">Items</div>
                                </div>
                            </x-card>
                            <x-card.card variant="default" hover>
                                <div class="text-center">
                                    <div class="text-xl font-bold text-gray-900 dark:text-gray-100">128</div>
                                    <div class="text-xs text-gray-600 dark:text-gray-400 mt-1">Views</div>
                                </div>
                            </x-card>
                            <x-card.card variant="default" hover>
                                <div class="text-center">
                                    <div class="text-xl font-bold text-gray-900 dark:text-gray-100">89</div>
                                    <div class="text-xs text-gray-600 dark:text-gray-400 mt-1">Likes</div>
                                </div>
                            </x-card>
                            <x-card.card variant="default" hover>
                                <div class="text-center">
                                    <div class="text-xl font-bold text-gray-900 dark:text-gray-100">15</div>
                                    <div class="text-xs text-gray-600 dark:text-gray-400 mt-1">Shares</div>
                                </div>
                            </x-card>
                            <x-card.card variant="default" hover>
                                <div class="text-center">
                                    <div class="text-xl font-bold text-gray-900 dark:text-gray-100">256</div>
                                    <div class="text-xs text-gray-600 dark:text-gray-400 mt-1">Comments</div>
                                </div>
                            </x-card>
                            <x-card.card variant="default" hover>
                                <div class="text-center">
                                    <div class="text-xl font-bold text-gray-900 dark:text-gray-100">78</div>
                                    <div class="text-xs text-gray-600 dark:text-gray-400 mt-1">Downloads</div>
                                </div>
                            </x-card>
                            <x-card.card variant="default" hover>
                                <div class="text-center">
                                    <div class="text-xl font-bold text-gray-900 dark:text-gray-100">34</div>
                                    <div class="text-xs text-gray-600 dark:text-gray-400 mt-1">Favorites</div>
                                </div>
                            </x-card>
                            <x-card.card variant="default" hover>
                                <div class="text-center">
                                    <div class="text-xl font-bold text-gray-900 dark:text-gray-100">92</div>
                                    <div class="text-xs text-gray-600 dark:text-gray-400 mt-1">Subscribers</div>
                                </div>
                            </x-card>
                        </div>
                    </div>
                </x-card>

                <!-- Image Cards -->
                <x-card.card variant="gradient" title="Image Cards">
                    <p class="mb-6 text-gray-600 dark:text-gray-400">
                        Image cards are perfect for showcasing visual content with text. They support multiple layouts and overlay options.
                    </p>
                    
                    <!-- Top Image Cards -->
                    <div class="mb-6">
                        <h4 class="text-sm font-semibold text-gray-900 dark:text-gray-100 mb-3">Image on Top</h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
                            <x-card.image 
                                variant="gradient"
                                hover
                                title="Beautiful Landscape"
                                subtitle="Nature Photography"
                                description="A stunning view of mountains and valleys captured at golden hour."
                            >
                                <x-slot name="action">
                                    <x-button.primary variant="gradient" class="w-full">
                                        View More
                                    </x-button.primary>
                                </x-slot>
                            </x-card.image>

                            <x-card.image 
                                variant="gradient"
                                hover
                                title="City Lights"
                                subtitle="Urban Photography"
                                description="The vibrant energy of city life captured in a single frame."
                            >
                                <x-slot name="action">
                                    <x-button.primary variant="outline" class="w-full">
                                        Learn More
                                    </x-button.primary>
                                </x-slot>
                            </x-card.image>

                            <x-card.image 
                                variant="glass"
                                hover
                                title="Ocean Waves"
                                subtitle="Seascape"
                                description="The power and beauty of the ocean in motion."
                            >
                                <x-slot name="action">
                                    <a href="#" class="inline-block w-full text-center px-4 py-2 rounded-xl bg-dodger-blue-600 dark:bg-dodger-blue-500 text-white hover:bg-dodger-blue-700 dark:hover:bg-dodger-blue-600 transition-colors">
                                        Explore
                                    </a>
                                </x-slot>
                            </x-card.image>
                        </div>
                    </div>

                    <!-- Overlay Image Cards -->
                    <div class="mb-6">
                        <h4 class="text-sm font-semibold text-gray-900 dark:text-gray-100 mb-3">Image with Overlay Text</h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6">
                            <x-card.image 
                                variant="gradient"
                                hover
                                imagePosition="top"
                                overlay
                                title="Adventure Awaits"
                                subtitle="Explore the world"
                                description="Discover new places and create unforgettable memories."
                            >
                                <x-slot name="action">
                                    <x-button.primary variant="gradient" class="w-full">
                                        Start Journey
                                    </x-button.primary>
                                </x-slot>
                            </x-card.image>

                            <x-card.image 
                                variant="gradient"
                                hover
                                imagePosition="top"
                                overlay
                                title="Creative Design"
                                subtitle="Innovation & Style"
                                description="Where creativity meets functionality in perfect harmony."
                            >
                                <x-slot name="action">
                                    <x-button.primary variant="outline" class="w-full">
                                        View Portfolio
                                    </x-button.primary>
                                </x-slot>
                            </x-card.image>
                        </div>
                    </div>

                    <!-- Horizontal Image Cards -->
                    <div class="mb-6">
                        <h4 class="text-sm font-semibold text-gray-900 dark:text-gray-100 mb-3">Horizontal Layout</h4>
                        <div class="grid grid-cols-1 gap-4 sm:gap-6">
                            <x-card.image 
                                variant="gradient"
                                hover
                                imagePosition="left"
                                title="Product Showcase"
                                subtitle="Featured Item"
                                description="This horizontal layout is perfect for product displays, blog posts, or any content where you want the image to be prominent alongside the text."
                            >
                                <x-slot name="action">
                                    <div class="flex gap-3">
                                        <x-button.primary variant="gradient">
                                            Buy Now
                                        </x-button.primary>
                                        <x-button.secondary>
                                            Learn More
                                        </x-button.secondary>
                                    </div>
                                </x-slot>
                            </x-card.image>

                            <x-card.image 
                                variant="gradient"
                                hover
                                imagePosition="right"
                                title="Article Preview"
                                subtitle="Latest News"
                                description="The image on the right creates a balanced layout that draws attention to both the visual and textual content."
                            >
                                <x-slot name="action">
                                    <x-button.primary variant="gradient" class="w-full">
                                        Read Article
                                    </x-button.primary>
                                </x-slot>
                            </x-card.image>
                        </div>
                    </div>
                </x-card>

                <!-- Profile Cards -->
                <x-card.card variant="gradient" title="Profile Cards">
                    <p class="mb-6 text-gray-600 dark:text-gray-400">
                        Profile cards are ideal for displaying user information, team members, or author details with avatars, stats, and social links.
                    </p>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <!-- Basic Profile Card -->
                        <x-card.profile 
                            variant="gradient"
                            hover
                            name="Sarah Johnson"
                            role="Senior Designer"
                            bio="Creative professional with 8+ years of experience in UI/UX design. Passionate about creating beautiful and functional interfaces."
                            avatarText="SJ"
                        />

                        <!-- Profile Card with Stats -->
                        <x-card.profile 
                            variant="gradient"
                            hover
                            name="Michael Chen"
                            role="Full Stack Developer"
                            bio="Building scalable web applications with modern technologies. Always learning and sharing knowledge."
                            avatarText="MC"
                            :showStats="true"
                            :stats="[
                                ['label' => 'Projects', 'value' => '42'],
                                ['label' => 'Followers', 'value' => '1.2K'],
                                ['label' => 'Posts', 'value' => '89']
                            ]"
                        />

                        <!-- Profile Card with Social Links -->
                        @php
                            $emilySocialLinks = [
                                [
                                    'icon' => '<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>',
                                    'url' => '#',
                                    'label' => 'Facebook'
                                ],
                                [
                                    'icon' => '<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>',
                                    'url' => '#',
                                    'label' => 'Twitter'
                                ],
                                [
                                    'icon' => '<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z"/></svg>',
                                    'url' => '#',
                                    'label' => 'Instagram'
                                ]
                            ];
                        @endphp
                        <x-card.profile 
                            variant="gradient"
                            hover
                            name="Emily Davis"
                            role="Product Manager"
                            bio="Leading product strategy and working with cross-functional teams to deliver exceptional user experiences."
                            avatarText="ED"
                            :showSocial="true"
                            :socialLinks="$emilySocialLinks"
                        >
                            <x-slot name="badge">
                                <span class="px-3 py-1 text-xs font-medium bg-emerald-100 dark:bg-emerald-900/30 text-emerald-800 dark:text-emerald-200 rounded-full">
                                    Available
                                </span>
                            </x-slot>
                        </x-card.profile>

                        <!-- Profile Card with Actions -->
                        <x-card.profile 
                            variant="gradient"
                            hover
                            name="David Wilson"
                            role="Marketing Director"
                            bio="Driving brand growth through innovative marketing strategies and data-driven decisions."
                            avatarText="DW"
                            :showStats="true"
                            :stats="[
                                ['label' => 'Campaigns', 'value' => '156'],
                                ['label' => 'Reach', 'value' => '2.5M']
                            ]"
                        >
                            <x-slot name="actions">
                                <div class="flex gap-2">
                                    <x-button.primary variant="gradient" class="flex-1">
                                        Message
                                    </x-button.primary>
                                    <x-button.secondary>
                                        Follow
                                    </x-button.secondary>
                                </div>
                            </x-slot>
                        </x-card.profile>

                        <!-- Profile Card - Glass Variant -->
                        <x-card.profile 
                            variant="glass"
                            hover
                            name="Lisa Anderson"
                            role="UX Researcher"
                            bio="Understanding user behavior to create products that people love. Always curious, always learning."
                            avatarText="LA"
                            avatarSize="xl"
                        >
                            <x-slot name="badge">
                                <span class="px-3 py-1 text-xs font-medium bg-dodger-blue-100 dark:bg-dodger-blue-900/30 text-dodger-blue-800 dark:text-dodger-blue-200 rounded-full">
                                    Team Lead
                                </span>
                            </x-slot>
                        </x-card.profile>

                        <!-- Profile Card - Default Variant -->
                        <x-card.profile 
                            variant="default"
                            hover
                            name="James Taylor"
                            role="Backend Engineer"
                            bio="Building robust and scalable server-side solutions. Passionate about clean code and best practices."
                            avatarText="JT"
                            :showStats="true"
                            :stats="[
                                ['label' => 'Repos', 'value' => '78'],
                                ['label' => 'Stars', 'value' => '1.5K']
                            ]"
                        />
                    </div>
                </x-card>

                <!-- Sports Cards -->
                <x-card.card variant="gradient" title="Sports Cards">
                    <p class="mb-6 text-gray-600 dark:text-gray-400">
                        Sports-themed cards perfect for displaying live game scores, player statistics, and team information.
                    </p>
                    
                    <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-4 sm:gap-6 items-start">
                        <!-- Live NBA Game Score Card -->
                        <x-card.card variant="gradient" hover class="h-auto">
                            <x-slot name="header">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-2">
                                        <div class="relative">
                                            <div class="w-2 h-2 bg-red-500 rounded-full"></div>
                                            <div class="absolute inset-0 w-2 h-2 bg-red-500 rounded-full animate-ping opacity-75"></div>
                                        </div>
                                        <span class="text-sm font-semibold text-red-600 dark:text-red-400">LIVE</span>
                                    </div>
                                    <div class="text-sm text-gray-600 dark:text-gray-400">
                                        Q4 • 2:34
                                    </div>
                                </div>
                            </x-slot>
                            
                            <div class="space-y-4">
                                <!-- Away Team -->
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-3 flex-1">
                                        <div class="w-12 h-12 rounded-full bg-gradient-to-br from-orange-400 to-orange-600 flex items-center justify-center text-white font-bold text-lg shadow-lg">
                                            LAL
                                        </div>
                                        <div class="flex-1">
                                            <div class="font-semibold text-gray-900 dark:text-gray-100">Los Angeles Lakers</div>
                                            <div class="text-xs text-gray-500 dark:text-gray-400">Away • 42-30</div>
                                        </div>
                                    </div>
                                    <div class="text-3xl font-bold text-gray-900 dark:text-gray-100">108</div>
                                </div>
                                
                                <!-- Home Team -->
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-3 flex-1">
                                        <div class="w-12 h-12 rounded-full bg-gradient-to-br from-blue-500 to-blue-700 flex items-center justify-center text-white font-bold text-lg shadow-lg">
                                            BOS
                                        </div>
                                        <div class="flex-1">
                                            <div class="font-semibold text-gray-900 dark:text-gray-100">Boston Celtics</div>
                                            <div class="text-xs text-gray-500 dark:text-gray-400">Home • 48-24</div>
                                        </div>
                                    </div>
                                    <div class="text-3xl font-bold text-gray-900 dark:text-gray-100">112</div>
                                </div>
                                
                                <!-- Game Info -->
                                <div class="pt-4 border-t border-gray-200 dark:border-gray-700">
                                    <div class="flex items-center justify-between text-sm">
                                        <div class="flex items-center gap-4">
                                            <div>
                                                <span class="text-gray-500 dark:text-gray-400">Last Play:</span>
                                                <span class="ml-2 text-gray-900 dark:text-gray-100 font-medium">3-pointer by Tatum</span>
                                            </div>
                                        </div>
                                        <div class="text-gray-500 dark:text-gray-400">
                                            TD Garden
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </x-card>

                        <!-- Player Stats Card -->
                        <x-card.card variant="gradient" hover class="h-auto">
                            <x-slot name="header">
                                <div class="flex items-center justify-between">
                                    <h3 class="text-lg font-bold text-gray-900 dark:text-gray-100">Player Stats</h3>
                                    <span class="px-2.5 py-0.5 text-xs font-medium rounded-full bg-dodger-blue-100 dark:bg-dodger-blue-900/30 text-dodger-blue-800 dark:text-dodger-blue-300">
                                        #23
                                    </span>
                                </div>
                            </x-slot>
                            
                            <div class="space-y-4">
                                <!-- Player Header -->
                                <div class="flex items-center gap-4">
                                    <div class="w-20 h-20 rounded-full bg-gradient-to-br from-purple-500 to-pink-600 flex items-center justify-center text-white font-bold text-2xl shadow-lg">
                                        LB
                                    </div>
                                    <div class="flex-1">
                                        <div class="text-xl font-bold text-gray-900 dark:text-gray-100">LeBron James</div>
                                        <div class="text-sm text-gray-600 dark:text-gray-400">Forward • Los Angeles Lakers</div>
                                        <div class="mt-1 flex items-center gap-2">
                                            <span class="px-2 py-0.5 text-xs font-medium rounded bg-green-100 dark:bg-green-900/30 text-green-800 dark:text-green-300">
                                                Active
                                            </span>
                                            <span class="text-xs text-gray-500 dark:text-gray-400">6'9" • 250 lbs</span>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Season Stats -->
                                <div class="pt-4 border-t border-gray-200 dark:border-gray-700">
                                    <div class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase mb-3">Season Averages</div>
                                    <div class="grid grid-cols-2 gap-3">
                                        <div class="bg-gray-50 dark:bg-gray-900/50 rounded-lg p-3">
                                            <div class="text-2xl font-bold text-dodger-blue-600 dark:text-dodger-blue-400">25.2</div>
                                            <div class="text-xs text-gray-600 dark:text-gray-400 mt-1">Points</div>
                                        </div>
                                        <div class="bg-gray-50 dark:bg-gray-900/50 rounded-lg p-3">
                                            <div class="text-2xl font-bold text-emerald-600 dark:text-emerald-400">8.1</div>
                                            <div class="text-xs text-gray-600 dark:text-gray-400 mt-1">Rebounds</div>
                                        </div>
                                        <div class="bg-gray-50 dark:bg-gray-900/50 rounded-lg p-3">
                                            <div class="text-2xl font-bold text-purple-600 dark:text-purple-400">6.8</div>
                                            <div class="text-xs text-gray-600 dark:text-gray-400 mt-1">Assists</div>
                                        </div>
                                        <div class="bg-gray-50 dark:bg-gray-900/50 rounded-lg p-3">
                                            <div class="text-2xl font-bold text-yellow-600 dark:text-yellow-400">52.3%</div>
                                            <div class="text-xs text-gray-600 dark:text-gray-400 mt-1">FG%</div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Recent Performance -->
                                <div class="pt-4 border-t border-gray-200 dark:border-gray-700">
                                    <div class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase mb-2">Last Game</div>
                                    <div class="flex items-center justify-between text-sm">
                                        <div>
                                            <span class="font-medium text-gray-900 dark:text-gray-100">vs. Warriors</span>
                                            <span class="ml-2 text-gray-500 dark:text-gray-400">W 128-115</span>
                                        </div>
                                        <div class="font-semibold text-gray-900 dark:text-gray-100">
                                            28 PTS • 10 REB • 7 AST
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </x-card>

                        <!-- Team Stats Card -->
                        <x-card.card variant="gradient" hover class="h-auto">
                            <x-slot name="header">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-full bg-gradient-to-br from-orange-400 to-orange-600 flex items-center justify-center text-white font-bold text-sm shadow-lg">
                                            LAL
                                        </div>
                                        <h3 class="text-lg font-bold text-gray-900 dark:text-gray-100">Team Stats</h3>
                                    </div>
                                    <span class="px-2.5 py-0.5 text-xs font-medium rounded-full bg-orange-100 dark:bg-orange-900/30 text-orange-800 dark:text-orange-300">
                                        42-30
                                    </span>
                                </div>
                            </x-slot>
                            
                            <div class="space-y-4">
                                <!-- Team Header -->
                                <div>
                                    <div class="text-xl font-bold text-gray-900 dark:text-gray-100">Los Angeles Lakers</div>
                                    <div class="text-sm text-gray-600 dark:text-gray-400">Western Conference • Pacific Division</div>
                                    <div class="mt-2 flex items-center gap-2">
                                        <span class="px-2 py-0.5 text-xs font-medium rounded bg-green-100 dark:bg-green-900/30 text-green-800 dark:text-green-300">
                                            3rd in West
                                        </span>
                                        <span class="text-xs text-gray-500 dark:text-gray-400">58.3% Win Rate</span>
                                    </div>
                                </div>
                                
                                <!-- Season Stats -->
                                <div class="pt-4 border-t border-gray-200 dark:border-gray-700">
                                    <div class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase mb-3">Season Stats</div>
                                    <div class="grid grid-cols-2 gap-3">
                                        <div class="bg-gray-50 dark:bg-gray-900/50 rounded-lg p-3">
                                            <div class="text-2xl font-bold text-dodger-blue-600 dark:text-dodger-blue-400">115.8</div>
                                            <div class="text-xs text-gray-600 dark:text-gray-400 mt-1">PPG</div>
                                        </div>
                                        <div class="bg-gray-50 dark:bg-gray-900/50 rounded-lg p-3">
                                            <div class="text-2xl font-bold text-emerald-600 dark:text-emerald-400">44.2</div>
                                            <div class="text-xs text-gray-600 dark:text-gray-400 mt-1">RPG</div>
                                        </div>
                                        <div class="bg-gray-50 dark:bg-gray-900/50 rounded-lg p-3">
                                            <div class="text-2xl font-bold text-purple-600 dark:text-purple-400">28.5</div>
                                            <div class="text-xs text-gray-600 dark:text-gray-400 mt-1">APG</div>
                                        </div>
                                        <div class="bg-gray-50 dark:bg-gray-900/50 rounded-lg p-3">
                                            <div class="text-2xl font-bold text-yellow-600 dark:text-yellow-400">47.2%</div>
                                            <div class="text-xs text-gray-600 dark:text-gray-400 mt-1">FG%</div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Recent Games -->
                                <div class="pt-4 border-t border-gray-200 dark:border-gray-700">
                                    <div class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase mb-2">Last 5 Games</div>
                                    <div class="space-y-2">
                                        <div class="flex items-center justify-between text-sm">
                                            <span class="text-gray-900 dark:text-gray-100">vs. Warriors</span>
                                            <span class="font-semibold text-green-600 dark:text-green-400">W 128-115</span>
                                        </div>
                                        <div class="flex items-center justify-between text-sm">
                                            <span class="text-gray-900 dark:text-gray-100">@ Celtics</span>
                                            <span class="font-semibold text-red-600 dark:text-red-400">L 112-108</span>
                                        </div>
                                        <div class="flex items-center justify-between text-sm">
                                            <span class="text-gray-900 dark:text-gray-100">vs. Heat</span>
                                            <span class="font-semibold text-green-600 dark:text-green-400">W 120-105</span>
                                        </div>
                                        <div class="flex items-center justify-between text-sm">
                                            <span class="text-gray-900 dark:text-gray-100">@ Nuggets</span>
                                            <span class="font-semibold text-green-600 dark:text-green-400">W 119-108</span>
                                        </div>
                                        <div class="flex items-center justify-between text-sm">
                                            <span class="text-gray-900 dark:text-gray-100">vs. Clippers</span>
                                            <span class="font-semibold text-red-600 dark:text-red-400">L 125-118</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </x-card>
                    </div>
                </x-card>

                <!-- CS:GO Skin Cards -->
                <x-card.card variant="gradient" title="CS:GO Skin Cards">
                    <p class="mb-6 text-gray-600 dark:text-gray-400">
                        CS:GO skin cards are perfect for displaying Counter-Strike: Global Offensive weapon skins with detailed information including condition, float value, rarity, and special indicators like StatTrak™ and Souvenir.
                    </p>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <!-- AK-47 Redline Example -->
                        <x-card.csgo-skin
                            weaponName="AK-47"
                            skinName="Redline"
                            condition="Field-Tested"
                            :float="0.1823"
                            :price="45.50"
                            rarity="Restricted"
                            variant="gradient"
                            hover
                        >
                            <x-slot name="actions">
                                <div class="flex gap-2">
                                    <button class="flex-1 px-4 py-2 bg-dodger-blue-600 dark:bg-dodger-blue-500 text-white rounded-lg hover:bg-dodger-blue-700 dark:hover:bg-dodger-blue-600 transition-colors text-sm font-medium">
                                        View Details
                                    </button>
                                    <button class="px-4 py-2 bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-gray-100 rounded-lg hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors text-sm font-medium">
                                        Trade
                                    </button>
                                </div>
                            </x-slot>
                        </x-card.csgo-skin>

                        <!-- AWP Dragon Lore Example -->
                        <x-card.csgo-skin
                            weaponName="AWP"
                            skinName="Dragon Lore"
                            condition="Factory New"
                            :float="0.0123"
                            :price="12500.00"
                            rarity="Covert"
                            :statTrak="true"
                            variant="gradient"
                            hover
                        >
                            <x-slot name="actions">
                                <div class="flex gap-2">
                                    <button class="flex-1 px-4 py-2 bg-dodger-blue-600 dark:bg-dodger-blue-500 text-white rounded-lg hover:bg-dodger-blue-700 dark:hover:bg-dodger-blue-600 transition-colors text-sm font-medium">
                                        View Details
                                    </button>
                                    <button class="px-4 py-2 bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-gray-100 rounded-lg hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors text-sm font-medium">
                                        Trade
                                    </button>
                                </div>
                            </x-slot>
                        </x-card.csgo-skin>

                        <!-- M4A4 Howl Example -->
                        <x-card.csgo-skin
                            weaponName="M4A4"
                            skinName="Howl"
                            condition="Minimal Wear"
                            :float="0.0891"
                            :price="3200.00"
                            rarity="Contraband"
                            :pattern="123"
                            :stickerCount="4"
                            variant="gradient"
                            hover
                        >
                            <x-slot name="actions">
                                <div class="flex gap-2">
                                    <button class="flex-1 px-4 py-2 bg-dodger-blue-600 dark:bg-dodger-blue-500 text-white rounded-lg hover:bg-dodger-blue-700 dark:hover:bg-dodger-blue-600 transition-colors text-sm font-medium">
                                        View Details
                                    </button>
                                    <button class="px-4 py-2 bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-gray-100 rounded-lg hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors text-sm font-medium">
                                        Trade
                                    </button>
                                </div>
                            </x-slot>
                        </x-card.csgo-skin>

                        <!-- Glock-18 Fade Example -->
                        <x-card.csgo-skin
                            weaponName="Glock-18"
                            skinName="Fade"
                            condition="Factory New"
                            :float="0.0034"
                            :price="850.00"
                            rarity="Covert"
                            :souvenir="true"
                            variant="gradient"
                            hover
                        >
                            <x-slot name="actions">
                                <div class="flex gap-2">
                                    <button class="flex-1 px-4 py-2 bg-dodger-blue-600 dark:bg-dodger-blue-500 text-white rounded-lg hover:bg-dodger-blue-700 dark:hover:bg-dodger-blue-600 transition-colors text-sm font-medium">
                                        View Details
                                    </button>
                                    <button class="px-4 py-2 bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-gray-100 rounded-lg hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors text-sm font-medium">
                                        Trade
                                    </button>
                                </div>
                            </x-slot>
                        </x-card.csgo-skin>

                        <!-- Karambit Fade Example -->
                        <x-card.csgo-skin
                            weaponName="Karambit"
                            skinName="Fade"
                            condition="Factory New"
                            :float="0.0012"
                            :price="2800.00"
                            rarity="Covert"
                            :statTrak="true"
                            :pattern="456"
                            variant="gradient"
                            hover
                        >
                            <x-slot name="actions">
                                <div class="flex gap-2">
                                    <button class="flex-1 px-4 py-2 bg-dodger-blue-600 dark:bg-dodger-blue-500 text-white rounded-lg hover:bg-dodger-blue-700 dark:hover:bg-dodger-blue-600 transition-colors text-sm font-medium">
                                        View Details
                                    </button>
                                    <button class="px-4 py-2 bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-gray-100 rounded-lg hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors text-sm font-medium">
                                        Trade
                                    </button>
                                </div>
                            </x-slot>
                        </x-card.csgo-skin>

                        <!-- USP-S Kill Confirmed Example -->
                        <x-card.csgo-skin
                            weaponName="USP-S"
                            skinName="Kill Confirmed"
                            condition="Minimal Wear"
                            :float="0.0721"
                            :price="125.00"
                            rarity="Classified"
                            variant="gradient"
                            hover
                        >
                            <x-slot name="actions">
                                <div class="flex gap-2">
                                    <button class="flex-1 px-4 py-2 bg-dodger-blue-600 dark:bg-dodger-blue-500 text-white rounded-lg hover:bg-dodger-blue-700 dark:hover:bg-dodger-blue-600 transition-colors text-sm font-medium">
                                        View Details
                                    </button>
                                    <button class="px-4 py-2 bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-gray-100 rounded-lg hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors text-sm font-medium">
                                        Trade
                                    </button>
                                </div>
                            </x-slot>
                        </x-card.csgo-skin>
                    </div>
                </x-card>

                <!-- Usage Examples -->
                <x-card.card variant="gradient" title="Usage Examples">
                    <div class="bg-gray-50 dark:bg-gray-900/50 rounded-lg p-4 overflow-x-auto">
                        <pre class="text-sm text-gray-800 dark:text-gray-200"><code>&lt;!-- Basic Card --&gt;
&lt;x-card&gt;
    &lt;p&gt;Card content goes here&lt;/p&gt;
&lt;/x-card&gt;

&lt;!-- Card with Title --&gt;
&lt;x-card title="Card Title"&gt;
    &lt;p&gt;Card content&lt;/p&gt;
&lt;/x-card&gt;

&lt;!-- Card with Title and Subtitle --&gt;
&lt;x-card title="Card Title" subtitle="Card subtitle"&gt;
    &lt;p&gt;Card content&lt;/p&gt;
&lt;/x-card&gt;

&lt;!-- Card Variants --&gt;
&lt;x-card variant="default"&gt;...&lt;/x-card&gt;
&lt;x-card variant="gradient"&gt;...&lt;/x-card&gt;
&lt;x-card variant="glass"&gt;...&lt;/x-card&gt;

&lt;!-- Card with Hover Effect --&gt;
&lt;x-card hover variant="gradient"&gt;
    &lt;p&gt;Hover over this card&lt;/p&gt;
&lt;/x-card&gt;

&lt;!-- Card with Custom Header --&gt;
&lt;x-card variant="gradient"&gt;
    &lt;x-slot name="header"&gt;
        &lt;h3&gt;Custom Header&lt;/h3&gt;
    &lt;/x-slot&gt;
    &lt;p&gt;Card content&lt;/p&gt;
&lt;/x-card&gt;

&lt;!-- Card with Action Menu --&gt;
&lt;x-card.with-actions 
    variant="gradient"
    title="Card Title"
    subtitle="Card subtitle"
    hover
&gt;
    &lt;x-slot name="actions"&gt;
        &lt;x-dropdown.dropdown align="right" width="48"&gt;
            &lt;x-slot name="trigger"&gt;
                &lt;button class="inline-flex items-center p-2 text-sm font-medium text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-md hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-dodger-blue-500 dark:focus:ring-dodger-blue-400 transition-colors"&gt;
                    &lt;svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20"&gt;
                        &lt;path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"&gt;&lt;/path&gt;
                    &lt;/svg&gt;
                &lt;/button&gt;
            &lt;/x-slot&gt;
            &lt;x-slot name="content"&gt;
                &lt;x-dropdown.item href="#" icon="..."&gt;Edit&lt;/x-dropdown.item&gt;
                &lt;x-dropdown.item href="#" icon="..."&gt;Duplicate&lt;/x-dropdown.item&gt;
                &lt;div class="border-t border-gray-200 dark:border-gray-700 my-1"&gt;&lt;/div&gt;
                &lt;x-dropdown.item href="#" danger icon="..."&gt;Delete&lt;/x-dropdown.item&gt;
            &lt;/x-slot&gt;
        &lt;/x-dropdown.dropdown&gt;
    &lt;/x-slot&gt;
    &lt;p&gt;Card content&lt;/p&gt;
&lt;/x-card.with-actions&gt;

&lt;!-- Image Card --&gt;
&lt;x-card.image 
    variant="gradient"
    hover
    title="Card Title"
    subtitle="Subtitle"
    description="Card description"
    imagePosition="top"
    overlay
&gt;
    &lt;x-slot name="action"&gt;
        &lt;x-button.primary&gt;Action&lt;/x-button.primary&gt;
    &lt;/x-slot&gt;
&lt;/x-card.image&gt;

&lt;!-- Profile Card --&gt;
&lt;x-card.profile 
    variant="gradient"
    hover
    name="John Doe"
    role="Software Engineer"
    bio="Bio text here"
    avatarText="JD"
    :showStats="true"
    :stats="[['label' => 'Posts', 'value' => '42']]"
    :showSocial="true"
    :socialLinks="[['icon' => '...', 'url' => '#', 'label' => 'Twitter']]"
&gt;
    &lt;x-slot name="actions"&gt;
        &lt;x-button.primary&gt;Contact&lt;/x-button.primary&gt;
    &lt;/x-slot&gt;
&lt;/x-card.profile&gt;

&lt;!-- CS:GO Skin Card --&gt;
&lt;x-card.csgo-skin 
    weaponName="AK-47"
    skinName="Redline"
    condition="Field-Tested"
    :float="0.1823"
    :price="45.50"
    rarity="Restricted"
    variant="gradient"
    hover
    :statTrak="false"
    :souvenir="false"
    :pattern="123"
    :stickerCount="2"
&gt;
    &lt;x-slot name="actions"&gt;
        &lt;button&gt;View Details&lt;/button&gt;
    &lt;/x-slot&gt;
&lt;/x-card.csgo-skin&gt;</code></pre>
                    </div>
                </x-card>
            </div>
</x-app-layout>

