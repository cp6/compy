@props([
    'file' => null,
    'show' => false,
])

<div
    x-data="{ 
        show: @js($show),
        file: @js($file)
    }"
    x-on:file-select.window="
        if ($event.detail.type === 'file') {
            // Find the full file object from the parent
            const fileData = window.fileManagerData?.files?.find(f => f.name === $event.detail.name);
            file = fileData || { name: $event.detail.name, type: $event.detail.type };
            show = true;
        }
    "
    x-on:file-open.window="
        if ($event.detail.type === 'file') {
            const fileData = window.fileManagerData?.files?.find(f => f.name === $event.detail.name);
            file = fileData || { name: $event.detail.name, type: $event.detail.type };
            show = true;
        }
    "
    x-show="show && file"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="translate-x-full"
    x-transition:enter-end="translate-x-0"
    x-transition:leave="transition ease-in duration-300"
    x-transition:leave-start="translate-x-0"
    x-transition:leave-end="translate-x-full"
    class="fixed right-0 top-0 bottom-0 w-80 bg-white dark:bg-gray-800 border-l border-gray-200 dark:border-gray-700 shadow-2xl z-40 overflow-y-auto"
    style="display: none;"
    x-cloak
>
    <!-- Header -->
    <div class="sticky top-0 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 p-4 z-10">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">
                File Details
            </h3>
            <button
                type="button"
                @click="show = false"
                class="p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors"
            >
                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>
    
    <!-- Content -->
    <div class="p-4" x-show="file">
        <template x-if="file">
            <div class="space-y-6">
                <!-- File Icon & Name -->
                <div class="text-center">
                    <div class="inline-flex items-center justify-center w-20 h-20 p-4 rounded-xl bg-gradient-to-br from-dodger-blue-100 to-dodger-blue-200 dark:from-dodger-blue-900/30 dark:to-dodger-blue-800/30 mb-4">
                        <svg class="w-10 h-10 text-dodger-blue-600 dark:text-dodger-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <h4 class="text-lg font-semibold text-gray-900 dark:text-gray-100 break-words" x-text="file.name"></h4>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-1" x-text="getFileExtension(file.name)"></p>
                </div>
                
                <!-- Actions -->
                <div class="space-y-2">
                    <x-button.button 
                        variant="primary" 
                        fullWidth
                        icon='<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" /></svg>'
                        iconPosition="left"
                        @click="$dispatch('file-download', { name: file.name })"
                    >
                        Download
                    </x-button>
                    
                    <div class="grid grid-cols-2 gap-2">
                        <x-button.button 
                            variant="secondary" 
                            fullWidth
                            icon='<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" /></svg>'
                            iconPosition="left"
                            @click="$dispatch('file-rename', { name: file.name })"
                        >
                            Rename
                        </x-button>
                        
                        <x-button.button 
                            variant="secondary" 
                            fullWidth
                            icon='<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" /></svg>'
                            iconPosition="left"
                            @click="$dispatch('file-copy', { name: file.name })"
                        >
                            Copy
                        </x-button>
                    </div>
                    
                    <x-button.button 
                        variant="danger" 
                        fullWidth
                        icon='<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>'
                        iconPosition="left"
                        @click="$dispatch('file-delete', { name: file.name }); show = false"
                    >
                        Delete
                    </x-button>
                </div>
                
                <!-- File Information -->
                <div class="border-t border-gray-200 dark:border-gray-700 pt-6">
                    <h5 class="text-sm font-semibold text-gray-900 dark:text-gray-100 mb-4">Information</h5>
                    <dl class="space-y-3">
                        <div>
                            <dt class="text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">Type</dt>
                            <dd class="mt-1 text-sm text-gray-900 dark:text-gray-100" x-text="getFileType(file.name)"></dd>
                        </div>
                        <div>
                            <dt class="text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">Size</dt>
                            <dd class="mt-1 text-sm text-gray-900 dark:text-gray-100" x-text="file.size ? formatBytes(file.size) : 'N/A'"></dd>
                        </div>
                        <div>
                            <dt class="text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">Modified</dt>
                            <dd class="mt-1 text-sm text-gray-900 dark:text-gray-100" x-text="file.modified ? formatDate(file.modified) : 'N/A'"></dd>
                        </div>
                        <div>
                            <dt class="text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">Location</dt>
                            <dd class="mt-1 text-sm text-gray-900 dark:text-gray-100 break-all" x-text="file.path || window.fileManagerData?.path || '/'"></dd>
                        </div>
                    </dl>
                </div>
                
                <!-- File Properties -->
                <div class="border-t border-gray-200 dark:border-gray-700 pt-6">
                    <h5 class="text-sm font-semibold text-gray-900 dark:text-gray-100 mb-4">Properties</h5>
                    <dl class="space-y-3">
                        <div>
                            <dt class="text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">Created</dt>
                            <dd class="mt-1 text-sm text-gray-900 dark:text-gray-100" x-text="file.created || 'N/A'"></dd>
                        </div>
                        <div>
                            <dt class="text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">Owner</dt>
                            <dd class="mt-1 text-sm text-gray-900 dark:text-gray-100" x-text="file.owner || 'Current User'"></dd>
                        </div>
                        <div>
                            <dt class="text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">Permissions</dt>
                            <dd class="mt-1 text-sm text-gray-900 dark:text-gray-100" x-text="file.permissions || 'Read/Write'"></dd>
                        </div>
                    </dl>
                </div>
            </div>
        </template>
    </div>
</div>

<script>
function getFileExtension(filename) {
    if (!filename) return '';
    const parts = filename.split('.');
    return parts.length > 1 ? parts[parts.length - 1].toUpperCase() + ' File' : 'File';
}

function getFileType(filename) {
    if (!filename) return 'Unknown';
    const ext = filename.split('.').pop()?.toLowerCase();
    const types = {
        'pdf': 'PDF Document',
        'doc': 'Word Document',
        'docx': 'Word Document',
        'xls': 'Excel Spreadsheet',
        'xlsx': 'Excel Spreadsheet',
        'ppt': 'PowerPoint Presentation',
        'pptx': 'PowerPoint Presentation',
        'jpg': 'JPEG Image',
        'jpeg': 'JPEG Image',
        'png': 'PNG Image',
        'gif': 'GIF Image',
        'mp4': 'MP4 Video',
        'zip': 'ZIP Archive',
        'js': 'JavaScript File',
        'css': 'CSS Stylesheet',
        'md': 'Markdown Document'
    };
    return types[ext] || ext?.toUpperCase() + ' File' || 'File';
}

window.getFileExtension = getFileExtension;
window.getFileType = getFileType;
</script>

