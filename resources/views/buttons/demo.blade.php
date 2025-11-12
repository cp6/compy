<x-app-layout>
    <x-slot name="header">
        <x-breadcrumb :items="[
            ['label' => 'Home', 'url' => route('dashboard')],
            ['label' => 'Buttons', 'url' => '#'],
            ['label' => 'Demo'],
        ]" />
    </x-slot>

    <x-slot name="pageTitle">
        Button Components Demo
    </x-slot>

    <x-slot name="pageSubtitle">
        A comprehensive showcase of all available button components, variants, and styles
    </x-slot>

    <x-alert.alerts />
    
    <div class="space-y-6 sm:space-y-8">
                <!-- Button Variants -->
                <x-card.card variant="gradient" title="Button Variants">
                    <p class="mb-6 text-gray-600 dark:text-gray-400">
                        Buttons come in multiple color variants to suit different use cases and contexts.
                    </p>
                    
                    <div class="space-y-4">
                        <div>
                            <h4 class="text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">Dodger Blue Primary Variants</h4>
                            <div class="flex flex-wrap gap-3">
                                <x-button.button variant="primary">Primary</x-button>
                                <x-button.button variant="primary2">Primary 2</x-button>
                                <x-button.button variant="primary3">Primary 3</x-button>
                                <x-button.button variant="primary4">Primary 4</x-button>
                                <x-button.button variant="primary5">Primary 5</x-button>
                            </div>
                        </div>
                        
                        <div>
                            <h4 class="text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">Other Variants</h4>
                            <div class="flex flex-wrap gap-3">
                                <x-button.button variant="secondary">Secondary</x-button>
                                <x-button.button variant="danger">Danger</x-button>
                                <x-button.button variant="success">Success</x-button>
                                <x-button.button variant="warning">Warning</x-button>
                                <x-button.button variant="info">Info</x-button>
                                <x-button.button variant="ghost">Ghost</x-button>
                                <x-button.button variant="outline">Outline</x-button>
                            </div>
                        </div>
                    </div>
                </x-card>

                <!-- Button Sizes -->
                <x-card.card variant="gradient" title="Button Sizes">
                    <p class="mb-6 text-gray-600 dark:text-gray-400">
                        Buttons are available in five different sizes to match your design needs.
                    </p>
                    
                    <div class="flex flex-wrap items-center gap-3">
                        <x-button.button size="xs">Extra Small</x-button>
                        <x-button.button size="sm">Small</x-button>
                        <x-button.button size="md">Medium</x-button>
                        <x-button.button size="lg">Large</x-button>
                        <x-button.button size="xl">Extra Large</x-button>
                    </div>
                </x-card>

                <!-- Buttons with Icons -->
                <x-card.card variant="gradient" title="Buttons with Icons">
                    <p class="mb-6 text-gray-600 dark:text-gray-400">
                        Add icons to buttons for better visual communication. Icons can be positioned on the left or right.
                    </p>
                    
                    <div class="space-y-4">
                        <div class="flex flex-wrap gap-3">
                            <x-button.button 
                                icon='<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" /></svg>'
                                iconPosition="left"
                            >
                                Add Item
                            </x-button>
                            <x-button.button 
                                variant="success"
                                icon='<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>'
                                iconPosition="left"
                            >
                                Save Changes
                            </x-button>
                            <x-button.button 
                                variant="danger"
                                icon='<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>'
                                iconPosition="left"
                            >
                                Delete
                            </x-button>
                            <x-button.button 
                                variant="info"
                                icon='<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>'
                                iconPosition="right"
                            >
                                Learn More
                            </x-button>
                            <x-button.button 
                                variant="secondary"
                                icon='<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /></svg>'
                                iconPosition="right"
                            >
                                Settings
                            </x-button>
                        </div>
                        
                        <div class="flex flex-wrap gap-3">
                            <x-button.button 
                                size="lg"
                                icon='<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" /></svg>'
                                iconPosition="left"
                            >
                                Large with Icon
                            </x-button>
                            <x-button.button 
                                size="sm"
                                variant="success"
                                icon='<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>'
                                iconPosition="right"
                            >
                                Small Icon Right
                            </x-button>
                        </div>
                    </div>
                </x-card>

                <!-- Long and Skinny Buttons -->
                <x-card.card variant="gradient" title="Long and Skinny Buttons">
                    <p class="mb-6 text-gray-600 dark:text-gray-400">
                        Perfect for sidebars, navigation panels, or when you need buttons that span the full width with minimal height.
                    </p>
                    
                    <div class="space-y-3 max-w-md">
                        <x-button.button long fullWidth>Full Width Long Button</x-button>
                        <x-button.button long fullWidth variant="secondary">Secondary Long Button</x-button>
                        <x-button.button long fullWidth variant="outline">Outline Long Button</x-button>
                        <x-button.button 
                            long 
                            fullWidth 
                            variant="primary"
                            icon='<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>'
                            iconPosition="left"
                        >
                            Profile Settings
                        </x-button>
                    </div>
                </x-card>

                <!-- Loading States -->
                <x-card.card variant="gradient" title="Loading States">
                    <p class="mb-6 text-gray-600 dark:text-gray-400">
                        Show loading states to provide feedback during async operations. Buttons are automatically disabled while loading.
                    </p>
                    
                    <div class="space-y-4">
                        <div class="flex flex-wrap gap-3">
                            <x-button.button loading>Loading...</x-button>
                            <x-button.button loading loadingText="Saving...">Save</x-button>
                            <x-button.button loading variant="success" loadingText="Processing...">Process</x-button>
                            <x-button.button loading variant="danger" size="lg">Deleting...</x-button>
                        </div>
                        
                        <div class="flex flex-wrap gap-3">
                            <x-button.button 
                                loading 
                                icon='<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" /></svg>'
                            >
                                Submit Form
                            </x-button>
                            <x-button.button 
                                loading 
                                variant="info"
                                loadingText="Uploading..."
                                icon='<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" /></svg>'
                                iconPosition="left"
                            >
                                Upload File
                            </x-button>
                        </div>
                    </div>
                </x-card>

                <!-- Button Groups -->
                <x-card.card variant="gradient" title="Button Groups">
                    <p class="mb-6 text-gray-600 dark:text-gray-400">
                        Group related buttons together for better visual organization and user experience.
                    </p>
                    
                    <div class="space-y-6">
                        <div>
                            <h4 class="text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">Default Group</h4>
                            <x-button.group>
                                <x-button.button variant="primary">Left</x-button>
                                <x-button.button variant="primary">Center</x-button>
                                <x-button.button variant="primary">Right</x-button>
                            </x-button.group>
                        </div>
                        
                        <div>
                            <h4 class="text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">Attached Group</h4>
                            <x-button.group variant="attached">
                                <x-button.button variant="primary" class="rounded-r-none">First</x-button>
                                <x-button.button variant="primary" class="rounded-none">Second</x-button>
                                <x-button.button variant="primary" class="rounded-l-none">Third</x-button>
                            </x-button.group>
                        </div>
                        
                        <div>
                            <h4 class="text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">Segmented Group</h4>
                            <x-button.group variant="segmented">
                                <x-button.button variant="ghost">Grid</x-button>
                                <x-button.button variant="primary">List</x-button>
                                <x-button.button variant="ghost">Card</x-button>
                            </x-button.group>
                        </div>
                        
                        <div>
                            <h4 class="text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">Full Width Group</h4>
                            <x-button.group fullWidth>
                                <x-button.button variant="primary" fullWidth>Option 1</x-button>
                                <x-button.button variant="secondary" fullWidth>Option 2</x-button>
                                <x-button.button variant="outline" fullWidth>Option 3</x-button>
                            </x-button.group>
                        </div>
                        
                        <div>
                            <h4 class="text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">Group with Icons</h4>
                            <x-button.group>
                                <x-button.button 
                                    variant="primary"
                                    icon='<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11m0 5h6a2 2 0 002-2v-11m0 5h6a2 2 0 002-2V7a2 2 0 00-2-2h-5m-4 0V3a2 2 0 012-2h2a2 2 0 012 2v2m-6 0h6" /></svg>'
                                    iconPosition="left"
                                >
                                    Copy
                                </x-button>
                                <x-button.button 
                                    variant="primary"
                                    icon='<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" /></svg>'
                                    iconPosition="left"
                                >
                                    Paste
                                </x-button>
                                <x-button.button 
                                    variant="primary"
                                    icon='<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" /></svg>'
                                    iconPosition="left"
                                >
                                    Share
                                </x-button>
                            </x-button.group>
                        </div>
                    </div>
                </x-card>

                <!-- Button Dropdowns -->
                <x-card.card variant="gradient" title="Button Dropdowns">
                    <p class="mb-6 text-gray-600 dark:text-gray-400">
                        Create dropdown menus attached to buttons for additional actions or options.
                    </p>
                    
                    <div class="flex flex-wrap gap-3">
                        <x-button.dropdown variant="primary" label="Actions">
                            <x-slot name="content">
                                <x-dropdown.item href="#" icon='<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11m0 5h6a2 2 0 002-2v-11m0 5h6a2 2 0 002-2V7a2 2 0 00-2-2h-5m-4 0V3a2 2 0 012-2h2a2 2 0 012 2v2m-6 0h6" /></svg>'>Copy</x-dropdown.item>
                                <x-dropdown.item href="#" icon='<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2" /></svg>'>Cut</x-dropdown.item>
                                <x-dropdown.item href="#" icon='<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" /></svg>'>Paste</x-dropdown.item>
                                <div class="border-t border-gray-200 dark:border-gray-700 my-1"></div>
                                <x-dropdown.item href="#" danger icon='<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>'>Delete</x-dropdown.item>
                            </x-slot>
                        </x-button.dropdown>
                        
                        <x-button.dropdown variant="secondary" label="Options">
                            <x-slot name="content">
                                <x-dropdown.item href="#">Option 1</x-dropdown.item>
                                <x-dropdown.item href="#">Option 2</x-dropdown.item>
                                <x-dropdown.item href="#">Option 3</x-dropdown.item>
                            </x-slot>
                        </x-button.dropdown>
                        
                        <x-button.dropdown 
                            variant="success" 
                            icon='<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" /></svg>'
                            iconPosition="left"
                            label="Create New"
                        >
                            <x-slot name="content">
                                <x-dropdown.item href="#" icon='<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>'>Document</x-dropdown.item>
                                <x-dropdown.item href="#" icon='<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" /></svg>'>Folder</x-dropdown.item>
                                <x-dropdown.item href="#" icon='<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>'>Image</x-dropdown.item>
                            </x-slot>
                        </x-button.dropdown>
                        
                        <x-button.dropdown variant="danger" label="Danger Zone">
                            <x-slot name="content">
                                <x-dropdown.item href="#" danger>Delete Account</x-dropdown.item>
                                <x-dropdown.item href="#" danger>Remove Data</x-dropdown.item>
                            </x-slot>
                        </x-button.dropdown>
                    </div>
                </x-card>

                <!-- Disabled States -->
                <x-card.card variant="gradient" title="Disabled States">
                    <p class="mb-6 text-gray-600 dark:text-gray-400">
                        Disable buttons when actions are not available or conditions are not met.
                    </p>
                    
                    <div class="flex flex-wrap gap-3">
                        <x-button.button disabled>Disabled Primary</x-button>
                        <x-button.button disabled variant="secondary">Disabled Secondary</x-button>
                        <x-button.button disabled variant="danger">Disabled Danger</x-button>
                        <x-button.button 
                            disabled 
                            icon='<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" /></svg>'
                            iconPosition="left"
                        >
                            Disabled with Icon
                        </x-button>
                    </div>
                </x-card>

                <!-- Full Width Buttons -->
                <x-card.card variant="gradient" title="Full Width Buttons">
                    <p class="mb-6 text-gray-600 dark:text-gray-400">
                        Buttons can span the full width of their container for mobile-friendly layouts.
                    </p>
                    
                    <div class="space-y-3 max-w-md">
                        <x-button.button fullWidth>Full Width Button</x-button>
                        <x-button.button fullWidth variant="secondary">Full Width Secondary</x-button>
                        <x-button.button 
                            fullWidth 
                            variant="primary"
                            icon='<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" /></svg>'
                            iconPosition="left"
                        >
                            Full Width with Icon
                        </x-button>
                    </div>
                </x-card>

                <!-- Real World Examples -->
                <x-card.card variant="gradient" title="Real World Examples">
                    <p class="mb-6 text-gray-600 dark:text-gray-400">
                        Common button patterns and combinations used in real applications.
                    </p>
                    
                    <div class="space-y-6">
                        <!-- Form Actions -->
                        <div>
                            <h4 class="text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">Form Actions</h4>
                            <div class="flex flex-wrap gap-3">
                                <x-button.button variant="primary" type="submit">Save Changes</x-button>
                                <x-button.button variant="secondary" type="button">Cancel</x-button>
                                <x-button.button variant="ghost" type="button">Reset</x-button>
                            </div>
                        </div>
                        
                        <!-- Data Table Actions -->
                        <div>
                            <h4 class="text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">Data Table Actions</h4>
                            <div class="flex flex-wrap gap-3">
                                <x-button.button 
                                    size="sm"
                                    variant="primary"
                                    icon='<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" /></svg>'
                                    iconPosition="left"
                                >
                                    Add New
                                </x-button>
                                <x-button.button 
                                    size="sm"
                                    variant="secondary"
                                    icon='<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" /></svg>'
                                    iconPosition="left"
                                >
                                    Export
                                </x-button>
                                <x-button.button 
                                    size="sm"
                                    variant="secondary"
                                    icon='<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" /></svg>'
                                    iconPosition="left"
                                >
                                    Import
                                </x-button>
                            </div>
                        </div>
                        
                        <!-- Card Actions -->
                        <div>
                            <h4 class="text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">Card Actions</h4>
                            <div class="flex flex-wrap gap-3">
                                <x-button.button 
                                    variant="outline"
                                    icon='<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" /></svg>'
                                    iconPosition="left"
                                >
                                    Edit
                                </x-button>
                                <x-button.button 
                                    variant="outline"
                                    icon='<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" /></svg>'
                                    iconPosition="left"
                                >
                                    Share
                                </x-button>
                                <x-button.button 
                                    variant="outline"
                                    icon='<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" /></svg>'
                                    iconPosition="left"
                                >
                                    Bookmark
                                </x-button>
                                <x-button.button 
                                    variant="outline"
                                    icon='<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>'
                                    iconPosition="left"
                                >
                                    Delete
                                </x-button>
                            </div>
                        </div>
                    </div>
                </x-card>
            </div>
</x-app-layout>

