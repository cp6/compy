<x-app-layout>
    <x-slot name="header">
        <x-breadcrumb :items="[
            ['label' => 'Home', 'url' => route('dashboard')],
            ['label' => 'File Manager', 'url' => '#'],
            ['label' => 'Demo'],
        ]" />
    </x-slot>

    <x-slot name="pageTitle">
        File Manager Demo
    </x-slot>

    <x-slot name="pageSubtitle">
        A modern, componentized file manager with drag & drop, multiple views, and context menus
    </x-slot>

    <x-alert.alerts />
    
    <x-card.card variant="gradient" class="overflow-hidden">
                @php
                    $demoFiles = [
                        [
                            'name' => 'Documents',
                            'type' => 'folder',
                            'size' => null,
                            'modified' => '2024-01-15',
                            'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" /></svg>'
                        ],
                        [
                            'name' => 'Images',
                            'type' => 'folder',
                            'size' => null,
                            'modified' => '2024-01-14',
                            'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" /></svg>'
                        ],
                        [
                            'name' => 'Videos',
                            'type' => 'folder',
                            'size' => null,
                            'modified' => '2024-01-13',
                            'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" /></svg>'
                        ],
                        [
                            'name' => 'project-proposal.pdf',
                            'type' => 'file',
                            'size' => 2456789,
                            'modified' => '2024-01-12',
                            'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" /></svg>'
                        ],
                        [
                            'name' => 'presentation.pptx',
                            'type' => 'file',
                            'size' => 5678901,
                            'modified' => '2024-01-11',
                            'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>'
                        ],
                        [
                            'name' => 'spreadsheet.xlsx',
                            'type' => 'file',
                            'size' => 1234567,
                            'modified' => '2024-01-10',
                            'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>'
                        ],
                        [
                            'name' => 'photo-1.jpg',
                            'type' => 'file',
                            'size' => 3456789,
                            'modified' => '2024-01-09',
                            'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>'
                        ],
                        [
                            'name' => 'video-tutorial.mp4',
                            'type' => 'file',
                            'size' => 45678901,
                            'modified' => '2024-01-08',
                            'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" /></svg>'
                        ],
                        [
                            'name' => 'archive.zip',
                            'type' => 'file',
                            'size' => 9876543,
                            'modified' => '2024-01-07',
                            'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" /></svg>'
                        ],
                        [
                            'name' => 'code.js',
                            'type' => 'file',
                            'size' => 12345,
                            'modified' => '2024-01-06',
                            'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" /></svg>'
                        ],
                        [
                            'name' => 'styles.css',
                            'type' => 'file',
                            'size' => 23456,
                            'modified' => '2024-01-05',
                            'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01" /></svg>'
                        ],
                        [
                            'name' => 'README.md',
                            'type' => 'file',
                            'size' => 5678,
                            'modified' => '2024-01-04',
                            'icon' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>'
                        ],
                    ];
                @endphp
                
                <div class="h-[600px]">
                    <x-file.manager :files="$demoFiles" path="/" />
                </div>
            </x-card>
            
            <!-- Features Section -->
            <div class="mt-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <x-card.card variant="gradient" title="Grid & List Views">
                    <p class="text-gray-600 dark:text-gray-400">
                        Switch between grid and list views with a single click. Grid view is perfect for visual browsing, while list view provides detailed information.
                    </p>
                </x-card>
                
                <x-card.card variant="gradient" title="Drag & Drop Upload">
                    <p class="text-gray-600 dark:text-gray-400">
                        Upload files easily by dragging and dropping them into the upload area, or use the traditional file picker.
                    </p>
                </x-card>
                
                <x-card.card variant="gradient" title="Context Menus">
                    <p class="text-gray-600 dark:text-gray-400">
                        Right-click on any file or folder to access quick actions like rename, copy, download, or delete.
                    </p>
                </x-card>
                
                <x-card.card variant="gradient" title="Search & Filter">
                    <p class="text-gray-600 dark:text-gray-400">
                        Quickly find files using the search bar. Real-time filtering helps you locate exactly what you need.
                    </p>
                </x-card>
                
                <x-card.card variant="gradient" title="Multi-Select">
                    <p class="text-gray-600 dark:text-gray-400">
                        Select multiple files at once using Ctrl/Cmd+Click or Shift+Click for bulk operations.
                    </p>
                </x-card>
                
                <x-card.card variant="gradient" title="Breadcrumb Navigation">
                    <p class="text-gray-600 dark:text-gray-400">
                        Navigate through folders easily with the breadcrumb navigation. Click any level to jump directly to that location.
                    </p>
                </x-card>
            </div>
</x-app-layout>

