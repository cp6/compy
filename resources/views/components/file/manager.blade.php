@props([
    'files' => [],
    'path' => '/',
])

<div 
    {{ $attributes->merge(['class' => 'flex flex-col h-full bg-gray-50 dark:bg-gray-900']) }}
    x-data="{
        files: @js($files),
        path: @js($path),
        view: 'grid',
        selected: [],
        searchQuery: '',
        
        init() {
            // Make files available globally for file-details component
            window.fileManagerData = { files: this.files, path: this.path };
            this.$watch('files', value => {
                window.fileManagerData.files = value;
            });
            this.$watch('path', value => {
                window.fileManagerData.path = value;
            });
        },
        
        get filteredFiles() {
            if (!this.searchQuery) return this.files;
            const query = this.searchQuery.toLowerCase();
            return this.files.filter(file => 
                file.name.toLowerCase().includes(query)
            );
        },
        
        getSelectedFile() {
            if (this.selected.length === 1) {
                return this.files.find(f => f.name === this.selected[0]);
            }
            return null;
        },
        
        toggleSelection(name) {
            const index = this.selected.indexOf(name);
            if (index > -1) {
                this.selected.splice(index, 1);
            } else {
                this.selected.push(name);
            }
        },
        
        selectAll() {
            this.selected = this.filteredFiles.map(f => f.name);
        },
        
        clearSelection() {
            this.selected = [];
        }
    }"
    @file-select.window="
        if ($event.detail.shiftKey) {
            // Multi-select logic
        } else if ($event.detail.ctrlKey || $event.detail.metaKey) {
            toggleSelection($event.detail.name);
        } else {
            selected = [$event.detail.name];
            // Dispatch to show file details
            $dispatch('file-select', { name: $event.detail.name, type: $event.detail.type });
        }
    "
    @file-navigate.window="path = $event.detail.path"
    @file-view-change.window="view = $event.detail.view"
    @file-delete-selected.window="
        if (confirm('Delete ' + selected.length + ' item(s)?')) {
            // Handle delete
            selected = [];
        }
    "
>
    <!-- Toolbar -->
    <x-file.toolbar 
        x-bind:view="view"
        x-bind:selectedCount="selected.length"
        x-bind:path="path"
    />
    
    <!-- Search Bar -->
    <div class="px-4 py-3 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
        <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
            <input
                type="text"
                x-model="searchQuery"
                placeholder="Search files..."
                class="block w-full pl-10 pr-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-dodger-blue-500 focus:border-transparent"
            >
        </div>
    </div>
    
    <!-- File List -->
    <div class="flex-1 overflow-auto p-4">
        <template x-if="filteredFiles.length > 0">
            <div x-bind:class="view === 'grid' 
                ? 'grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-4' 
                : 'flex flex-col divide-y divide-gray-200 dark:divide-gray-700'">
                <template x-for="file in filteredFiles" :key="file.name">
                    <div
                        x-bind:class="{
                            'flex-col p-4 hover:bg-gray-50 dark:hover:bg-gray-800/50 border border-transparent hover:border-gray-200 dark:hover:border-gray-700': view === 'grid',
                            'px-4 py-3 hover:bg-gray-50 dark:hover:bg-gray-800/50 border-l-2 border-transparent hover:border-dodger-blue-500': view === 'list',
                            'bg-dodger-blue-50 dark:bg-dodger-blue-900/20 border-dodger-blue-300 dark:border-dodger-blue-700': view === 'grid' && selected.includes(file.name),
                            'bg-dodger-blue-50 dark:bg-dodger-blue-900/20 border-l-dodger-blue-500': view === 'list' && selected.includes(file.name)
                        }"
                        class="group relative flex items-center transition-all duration-200 rounded-lg cursor-pointer"
                        @contextmenu.prevent="$dispatch('file-context-menu', { name: file.name, type: file.type, event: $event })"
                        @click="
                            if ($event.shiftKey) {
                                // Multi-select logic
                            } else if ($event.ctrlKey || $event.metaKey) {
                                toggleSelection(file.name);
                            } else {
                                selected = [file.name];
                                $dispatch('file-select', { name: file.name, type: file.type });
                            }
                        "
                        @dblclick="$dispatch('file-open', { name: file.name, type: file.type })"
                    >
                        <template x-if="view === 'grid'">
                            <div class="w-full">
                                <div class="flex-shrink-0 mb-3 p-3 rounded-lg bg-gradient-to-br from-gray-100 to-gray-200 dark:from-gray-700 dark:to-gray-800 group-hover:from-dodger-blue-100 group-hover:to-dodger-blue-200 dark:group-hover:from-dodger-blue-900/30 dark:group-hover:to-dodger-blue-800/30 transition-colors">
                                    <div class="text-dodger-blue-600 dark:text-dodger-blue-400" x-html="file.icon || getDefaultIcon(file.type)"></div>
                                </div>
                                <div class="flex-1 w-full text-center">
                                    <p class="text-sm font-medium text-gray-900 dark:text-gray-100 truncate" x-text="file.name"></p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1" x-show="file.size" x-text="formatBytes(file.size)"></p>
                                </div>
                            </div>
                        </template>
                        <template x-if="view === 'list'">
                            <div class="flex items-center w-full">
                                <div class="flex-shrink-0 mr-4">
                                    <div class="p-2 rounded-lg bg-gradient-to-br from-gray-100 to-gray-200 dark:from-gray-700 dark:to-gray-800 group-hover:from-dodger-blue-100 group-hover:to-dodger-blue-200 dark:group-hover:from-dodger-blue-900/30 dark:group-hover:to-dodger-blue-800/30 transition-colors">
                                        <div class="text-dodger-blue-600 dark:text-dodger-blue-400" x-html="file.icon || getDefaultIcon(file.type)"></div>
                                    </div>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-900 dark:text-gray-100 truncate" x-text="file.name"></p>
                                    <div class="flex items-center gap-4 mt-1 text-xs text-gray-500 dark:text-gray-400">
                                        <span x-show="file.size" x-text="formatBytes(file.size)"></span>
                                        <span x-show="file.modified" x-text="formatDate(file.modified)"></span>
                                    </div>
                                </div>
                            </div>
                        </template>
                        <div x-show="selected.includes(file.name)" class="absolute top-2 right-2">
                            <div class="w-5 h-5 rounded-full bg-dodger-blue-600 dark:bg-dodger-blue-500 flex items-center justify-center">
                                <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </template>
            </div>
        </template>
        <template x-if="filteredFiles.length === 0">
            <div class="flex flex-col items-center justify-center h-full text-center py-12">
                <div class="w-16 h-16 mb-4 p-4 rounded-full bg-gray-100 dark:bg-gray-800">
                    <svg class="w-8 h-8 text-gray-400 dark:text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
                <p class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-1">
                    No files found
                </p>
                <p class="text-sm text-gray-500 dark:text-gray-400">
                    <span x-show="searchQuery">Try adjusting your search</span>
                    <span x-show="!searchQuery">Upload files to get started</span>
                </p>
            </div>
        </template>
    </div>
    
    <!-- Upload Modal -->
    <x-file.upload />
    
    <!-- Context Menu -->
    <x-file.context-menu />
    
    <!-- File Details Panel -->
    <x-file.details />
</div>

<script>
function formatBytes(bytes, decimals = 2) {
    if (!bytes) return '';
    if (bytes === 0) return '0 Bytes';
    const k = 1024;
    const dm = decimals < 0 ? 0 : decimals;
    const sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
    const i = Math.floor(Math.log(bytes) / Math.log(k));
    return parseFloat((bytes / Math.pow(k, i)).toFixed(dm)) + ' ' + sizes[i];
}

function formatDate(dateString) {
    if (!dateString) return '';
    const date = new Date(dateString);
    return date.toLocaleDateString('en-US', { month: 'short', day: 'numeric', year: 'numeric' });
}

function getDefaultIcon(type) {
    if (type === 'folder') {
        return '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" /></svg>';
    }
    return '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>';
}

// Make functions available globally for Alpine.js
window.formatBytes = formatBytes;
window.formatDate = formatDate;
window.getDefaultIcon = getDefaultIcon;
</script>

