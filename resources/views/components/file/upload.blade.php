@props([
    'show' => false,
])

<div
    x-data="{ 
        show: @js($show),
        isDragging: false,
        files: []
    }"
    x-show="show"
    x-on:file-upload.window="show = true"
    x-on:close.stop="show = false"
    x-on:keydown.escape.window="show = false"
    class="fixed inset-0 z-50 flex items-center justify-center p-4"
    style="display: none;"
    x-cloak
>
    <!-- Backdrop -->
    <div 
        class="absolute inset-0 bg-black/50 dark:bg-black/70 backdrop-blur-sm"
        @click="show = false"
    ></div>
    
    <!-- Upload Area -->
    <div 
        class="relative z-10 w-full max-w-2xl bg-white dark:bg-gray-800 rounded-2xl shadow-2xl border border-gray-200 dark:border-gray-700"
        @dragover.prevent="isDragging = true"
        @dragleave.prevent="isDragging = false"
        @drop.prevent="
            isDragging = false;
            files = Array.from($event.dataTransfer.files);
            $dispatch('files-dropped', files);
        "
        :class="{ 'ring-2 ring-dodger-blue-500 ring-offset-2': isDragging }"
    >
        <!-- Header -->
        <div class="flex items-center justify-between p-6 border-b border-gray-200 dark:border-gray-700">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">
                Upload Files
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
        
        <!-- Upload Zone -->
        <div class="p-8">
            <div 
                class="border-2 border-dashed rounded-xl p-12 text-center transition-colors"
                :class="isDragging 
                    ? 'border-dodger-blue-500 bg-dodger-blue-50 dark:bg-dodger-blue-900/20' 
                    : 'border-gray-300 dark:border-gray-600 hover:border-dodger-blue-400 dark:hover:border-dodger-blue-600'"
            >
                <div class="mx-auto w-16 h-16 mb-4 p-4 rounded-full bg-dodger-blue-100 dark:bg-dodger-blue-900/30">
                    <svg class="w-8 h-8 text-dodger-blue-600 dark:text-dodger-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                    </svg>
                </div>
                <h4 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-2">
                    Drop files here or click to browse
                </h4>
                <p class="text-sm text-gray-500 dark:text-gray-400 mb-6">
                    Support for multiple file uploads
                </p>
                <input
                    type="file"
                    multiple
                    class="hidden"
                    x-ref="fileInput"
                    @change="files = Array.from($event.target.files); $dispatch('files-selected', files);"
                >
                <x-button
                    variant="primary"
                    @click="$refs.fileInput.click()"
                >
                    Select Files
                </x-button>
            </div>
            
            <!-- File List -->
            <div x-show="files.length > 0" class="mt-6 space-y-2" style="display: none;">
                <template x-for="(file, index) in files" :key="index">
                    <div class="flex items-center justify-between p-3 bg-gray-50 dark:bg-gray-700/50 rounded-lg">
                        <div class="flex items-center gap-3 flex-1 min-w-0">
                            <div class="flex-shrink-0 w-10 h-10 rounded-lg bg-dodger-blue-100 dark:bg-dodger-blue-900/30 flex items-center justify-center">
                                <svg class="w-5 h-5 text-dodger-blue-600 dark:text-dodger-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-900 dark:text-gray-100 truncate" x-text="file.name"></p>
                                <p class="text-xs text-gray-500 dark:text-gray-400" x-text="formatBytes(file.size)"></p>
                            </div>
                        </div>
                        <button
                            type="button"
                            @click="files.splice(index, 1)"
                            class="p-1 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors"
                        >
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </template>
            </div>
            
            <!-- Actions -->
            <div class="flex items-center justify-end gap-3 mt-6">
                <x-button.button variant="secondary" @click="show = false">
                    Cancel
                </x-button>
                <x-button.button 
                    variant="primary" 
                    @click="$dispatch('files-upload', files); show = false; files = []"
                    x-bind:disabled="files.length === 0"
                >
                    Upload
                </x-button>
            </div>
        </div>
    </div>
</div>

<script>
function formatBytes(bytes, decimals = 2) {
    if (bytes === 0) return '0 Bytes';
    const k = 1024;
    const dm = decimals < 0 ? 0 : decimals;
    const sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
    const i = Math.floor(Math.log(bytes) / Math.log(k));
    return parseFloat((bytes / Math.pow(k, i)).toFixed(dm)) + ' ' + sizes[i];
}
</script>

