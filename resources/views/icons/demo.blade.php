<x-app-layout>
    <x-slot name="title">Icons Demo</x-slot>
    <x-slot name="metaDescription">A comprehensive demo of all available sidebar icons used throughout the application.</x-slot>
    <x-slot name="metaKeywords">icons, sidebar, navigation, demo</x-slot>

    <x-slot name="header">
        <x-breadcrumb :items="[
            ['label' => 'Home', 'url' => route('dashboard')],
            ['label' => 'Icons', 'url' => '#'],
            ['label' => 'Demo'],
        ]" />
    </x-slot>

    <x-slot name="pageTitle">
        Icons Demo
    </x-slot>

    <x-slot name="pageSubtitle">
        A comprehensive demo of all available sidebar icons
    </x-slot>

    <x-alert.alerts />
    
    <x-card.card variant="gradient" title="Sidebar Icons">
        <p class="mb-6 text-gray-600 dark:text-gray-400">
            These are all the icons available for use in the sidebar navigation. Each icon is displayed with its name and can be used with the <code class="px-2 py-1 bg-gray-100 dark:bg-gray-700 rounded text-sm">x-sidebar.icon</code> component.
        </p>
        
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6">
            @php
                $iconNames = [
                    'dashboard' => 'Dashboard',
                    'ai' => 'AI Assistant',
                    'ecommerce' => 'E-commerce',
                    'calendar' => 'Calendar',
                    'user' => 'User Profile',
                    'task' => 'Task',
                    'forms' => 'Forms',
                    'tables' => 'Tables',
                    'pages' => 'Pages',
                    'chat' => 'Chat',
                    'ticket' => 'Support Ticket',
                    'email' => 'Email',
                    'charts' => 'Charts',
                    'ui' => 'UI Elements',
                    'auth' => 'Authentication',
                    'settings' => 'Settings',
                    'home' => 'Home',
                    'folder' => 'Folder',
                    'file' => 'File',
                    'search' => 'Search',
                    'bell' => 'Notifications',
                    'star' => 'Star',
                    'heart' => 'Heart',
                    'bookmark' => 'Bookmark',
                    'tag' => 'Tag',
                    'image' => 'Image',
                    'video' => 'Video',
                    'music' => 'Music',
                    'download' => 'Download',
                    'upload' => 'Upload',
                    'share' => 'Share',
                    'edit' => 'Edit',
                    'trash' => 'Delete',
                    'plus' => 'Plus',
                    'minus' => 'Minus',
                    'check' => 'Check',
                    'x' => 'Close',
                    'arrow-left' => 'Arrow Left',
                    'arrow-right' => 'Arrow Right',
                    'arrow-up' => 'Arrow Up',
                    'arrow-down' => 'Arrow Down',
                    'lock' => 'Lock',
                    'unlock' => 'Unlock',
                    'eye' => 'Eye',
                    'eye-off' => 'Eye Off',
                    'filter' => 'Filter',
                    'menu' => 'Menu',
                    'more' => 'More',
                    'info' => 'Info',
                    'warning' => 'Warning',
                    'question' => 'Question',
                ];
            @endphp

            @foreach($iconNames as $iconName => $iconLabel)
                <div class="flex flex-col items-center p-4 rounded-xl bg-gray-50 dark:bg-gray-700/50 border border-gray-200 dark:border-gray-600 hover:border-dodger-blue-400 dark:hover:border-dodger-blue-500 transition-colors">
                    <div class="w-12 h-12 flex items-center justify-center mb-3 text-gray-700 dark:text-gray-300">
                        <x-sidebar.icon name="{{ $iconName }}" />
                    </div>
                    <div class="text-center">
                        <p class="text-sm font-semibold text-gray-900 dark:text-gray-100 mb-1">
                            {{ $iconLabel }}
                        </p>
                        <code class="text-xs text-gray-500 dark:text-gray-400 bg-gray-100 dark:bg-gray-800 px-2 py-1 rounded">
                            {{ $iconName }}
                        </code>
                    </div>
                </div>
            @endforeach
        </div>
    </x-card.card>

    <x-card.card variant="gradient" title="Usage Example" class="mt-6">
        <p class="mb-4 text-gray-600 dark:text-gray-400">
            To use an icon in the sidebar, simply use the <code class="px-2 py-1 bg-gray-100 dark:bg-gray-700 rounded text-sm">x-sidebar.icon</code> component with the icon name:
        </p>
        
        <div class="bg-gray-900 dark:bg-gray-800 rounded-lg p-4 overflow-x-auto">
            <pre class="text-sm text-gray-100"><code>&lt;x-sidebar.icon name="dashboard" /&gt;
&lt;x-sidebar.icon name="ai" /&gt;
&lt;x-sidebar.icon name="ecommerce" /&gt;</code></pre>
        </div>
    </x-card.card>
</x-app-layout>

