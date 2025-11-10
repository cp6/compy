@props([
    'view' => 'grid', // 'grid', 'list'
    'selectedCount' => 0,
    'path' => '/',
])

@php
    $breadcrumbs = array_filter(explode('/', trim($path, '/')));
    $breadcrumbItems = [];
    $currentPath = '';
    
    foreach ($breadcrumbs as $crumb) {
        $currentPath .= '/' . $crumb;
        $breadcrumbItems[] = [
            'label' => $crumb,
            'path' => $currentPath
        ];
    }
@endphp

<div {{ $attributes->merge(['class' => 'flex items-center justify-between gap-4 p-4 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700']) }}>
    <!-- Breadcrumb -->
    <div class="flex items-center gap-2 flex-1 min-w-0">
        <button 
            type="button"
            @click="$dispatch('file-navigate', { path: '..' })"
            class="p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors"
            title="Go back"
        >
            <svg class="w-5 h-5 text-gray-600 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
        </button>
        
        <div class="flex items-center gap-2 flex-1 min-w-0">
            <button
                type="button"
                @click="$dispatch('file-navigate', { path: '/' })"
                class="px-3 py-1.5 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 text-sm font-medium text-gray-700 dark:text-gray-300 transition-colors"
            >
                Home
            </button>
            @foreach($breadcrumbItems as $item)
                <span class="text-gray-400 dark:text-gray-600">/</span>
                <button
                    type="button"
                    @click="$dispatch('file-navigate', { path: '{{ $item['path'] }}' })"
                    class="px-3 py-1.5 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 text-sm font-medium text-gray-700 dark:text-gray-300 transition-colors truncate max-w-[150px]"
                    title="{{ $item['label'] }}"
                >
                    {{ $item['label'] }}
                </button>
            @endforeach
        </div>
    </div>
    
    <!-- Actions -->
    <div class="flex items-center gap-2">
        @if($selectedCount > 0)
            <span class="text-sm text-gray-600 dark:text-gray-400 mr-2">
                {{ $selectedCount }} selected
            </span>
            <x-button.button 
                size="sm" 
                variant="danger"
                @click="$dispatch('file-delete-selected')"
            >
                Delete
            </x-button>
        @endif
        
        <x-button.button 
            size="sm" 
            variant="primary"
            icon='<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" /></svg>'
            iconPosition="left"
            @click="$dispatch('file-upload')"
        >
            Upload
        </x-button>
        
        <x-button.button 
            size="sm" 
            variant="primary2"
            icon='<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" /></svg>'
            iconPosition="left"
            @click="$dispatch('file-new-folder')"
        >
            New Folder
        </x-button>
        
        <!-- View Toggle -->
        <div class="flex items-center gap-1 p-1 bg-gray-100 dark:bg-gray-700 rounded-lg">
            <button
                type="button"
                @click="$dispatch('file-view-change', { view: 'grid' })"
                class="p-2 rounded transition-colors {{ $view === 'grid' ? 'bg-white dark:bg-gray-600 text-dodger-blue-600 dark:text-dodger-blue-400 shadow-sm' : 'text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-200' }}"
                title="Grid view"
            >
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                </svg>
            </button>
            <button
                type="button"
                @click="$dispatch('file-view-change', { view: 'list' })"
                class="p-2 rounded transition-colors {{ $view === 'list' ? 'bg-white dark:bg-gray-600 text-dodger-blue-600 dark:text-dodger-blue-400 shadow-sm' : 'text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-200' }}"
                title="List view"
            >
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
    </div>
</div>

