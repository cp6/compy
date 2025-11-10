@props([
    'label' => null,
    'name' => null,
    'type' => 'file',
    'accept' => null,
    'required' => false,
    'disabled' => false,
    'error' => null,
    'help' => null,
    'multiple' => false,
    'maxSize' => null, // in MB
])

@php
    $hasError = $error || (isset($errors) && $errors->has($name));
    $errorMessages = $error ?? (isset($errors) ? $errors->get($name) : []);
    $uniqueId = uniqid('file_');
@endphp

<div class="space-y-2" x-data="{
    files: [],
    isDragging: false,
    
    handleFiles(selectedFiles) {
        this.files = Array.from(selectedFiles);
    },
    
    handleDrop(event) {
        event.preventDefault();
        this.isDragging = false;
        if (event.dataTransfer.files.length > 0) {
            this.handleFiles(event.dataTransfer.files);
            this.$refs.fileInput.files = event.dataTransfer.files;
        }
    },
    
    handleDragOver(event) {
        event.preventDefault();
        this.isDragging = true;
    },
    
    handleDragLeave(event) {
        event.preventDefault();
        this.isDragging = false;
    },
    
    removeFile(index) {
        this.files.splice(index, 1);
        this.$refs.fileInput.value = '';
    },
    
    formatFileSize(bytes) {
        if (bytes === 0) return '0 Bytes';
        const k = 1024;
        const sizes = ['Bytes', 'KB', 'MB', 'GB'];
        const i = Math.floor(Math.log(bytes) / Math.log(k));
        return Math.round(bytes / Math.pow(k, i) * 100) / 100 + ' ' + sizes[i];
    }
}">
    @if($label)
        <x-form.label :for="$uniqueId" :value="$label" />
    @endif

    <div class="relative">
        <!-- Drop Zone -->
        <label
            for="{{ $uniqueId }}"
            @dragover.prevent="handleDragOver($event)"
            @dragleave.prevent="handleDragLeave($event)"
            @drop.prevent="handleDrop($event)"
            class="block w-full rounded-xl border-2 border-dashed transition-all duration-200 cursor-pointer {{ $hasError ? 'border-red-500 dark:border-red-500 bg-red-50 dark:bg-red-900/20' : 'border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-800/50 hover:border-emerald-500 dark:hover:border-emerald-400 hover:bg-emerald-50 dark:hover:bg-emerald-900/20' }} {{ $disabled ? 'opacity-50 cursor-not-allowed' : '' }}"
            :class="{ 'border-emerald-500 dark:border-emerald-400 bg-emerald-50 dark:bg-emerald-900/20': isDragging }"
        >
            <div class="flex flex-col items-center justify-center px-6 py-8 sm:py-10 text-center">
                <div class="mb-4">
                    <svg class="w-12 h-12 sm:w-16 sm:h-16 mx-auto text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                    </svg>
                </div>
                <div class="mb-2">
                    <span class="text-sm sm:text-base font-semibold text-gray-700 dark:text-gray-300">
                        <span class="text-emerald-600 dark:text-emerald-400">Click to upload</span>
                        <span class="text-gray-500 dark:text-gray-400"> or drag and drop</span>
                    </span>
                </div>
                <p class="text-xs sm:text-sm text-gray-500 dark:text-gray-400">
                    @if($accept)
                        {{ str_replace('*', '', $accept) }}
                    @else
                        SVG, PNG, JPG or GIF
                    @endif
                    @if($maxSize)
                        <span class="block mt-1">(MAX. {{ $maxSize }}MB)</span>
                    @endif
                </p>
            </div>
            
            <input
                type="{{ $type }}"
                name="{{ $name }}"
                id="{{ $uniqueId }}"
                x-ref="fileInput"
                @change="handleFiles($event.target.files)"
                @if($accept) accept="{{ $accept }}" @endif
                @if($required) required @endif
                @if($disabled) disabled @endif
                @if($multiple) multiple @endif
                class="hidden"
                {{ $attributes }}
            />
        </label>

        <!-- File List -->
        <div x-show="files.length > 0" class="mt-4 space-y-2" style="display: none;">
            <template x-for="(file, index) in files" :key="index">
                <div class="flex items-center gap-3 p-3 rounded-lg bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700">
                    <div class="flex-shrink-0">
                        <svg class="w-8 h-8 text-emerald-500 dark:text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-gray-900 dark:text-gray-100 truncate" x-text="file.name"></p>
                        <p class="text-xs text-gray-500 dark:text-gray-400" x-text="formatFileSize(file.size)"></p>
                    </div>
                    @if(!$disabled)
                        <button
                            type="button"
                            @click="removeFile(index)"
                            class="flex-shrink-0 p-1.5 rounded-lg text-gray-400 dark:text-gray-500 hover:text-red-500 dark:hover:text-red-400 hover:bg-red-50 dark:hover:bg-red-900/20 transition-colors"
                        >
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    @endif
                </div>
            </template>
        </div>
    </div>

    @if($help && !$hasError)
        <p class="text-sm text-gray-500 dark:text-gray-400">{{ $help }}</p>
    @endif

    @if($hasError)
        <x-form.error :messages="$errorMessages" />
    @endif
</div>

