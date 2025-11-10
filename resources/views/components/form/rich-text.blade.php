@props([
    'label' => null,
    'name' => null,
    'value' => null,
    'placeholder' => 'Start typing...',
    'required' => false,
    'disabled' => false,
    'error' => null,
    'help' => null,
    'height' => '300px',
])

@php
    $hasError = $error || (isset($errors) && $errors->has($name));
    $errorMessages = $error ?? (isset($errors) ? $errors->get($name) : []);
    $uniqueId = uniqid('richtext_');
@endphp

<div class="space-y-2" x-data="{
    content: {{ json_encode(old($name, $value ?? '')) }},
    isFocused: false,
    
    init() {
        this.$watch('content', value => {
            this.$dispatch('richtext-updated', value);
        });
    }
}">
    @if($label)
        <x-form.label :for="$uniqueId" :value="$label" />
    @endif

    <div 
        class="relative rounded-xl border transition-all duration-200 {{ $hasError ? 'border-red-500 dark:border-red-500 bg-red-50 dark:bg-red-900/20 focus-within:ring-red-500 dark:focus-within:ring-red-400' : 'border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 focus-within:border-emerald-500 dark:focus-within:border-emerald-400 focus-within:ring-2 focus-within:ring-emerald-500 dark:focus-within:ring-emerald-400' }} {{ $disabled ? 'opacity-50 cursor-not-allowed' : '' }}"
        @click="isFocused = true"
        @click.away="isFocused = false"
    >
        <!-- Toolbar -->
        <div class="flex items-center gap-1 p-2 border-b border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900/50 rounded-t-xl">
            <button
                type="button"
                @click.prevent="document.execCommand('bold', false, null)"
                class="p-2 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors text-gray-700 dark:text-gray-300"
                title="Bold"
            >
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 4h8a4 4 0 014 4 4 4 0 01-4 4H6z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 12h9a4 4 0 014 4 4 4 0 01-4 4H6z"></path>
                </svg>
            </button>
            <button
                type="button"
                @click.prevent="document.execCommand('italic', false, null)"
                class="p-2 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors text-gray-700 dark:text-gray-300"
                title="Italic"
            >
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                </svg>
            </button>
            <button
                type="button"
                @click.prevent="document.execCommand('underline', false, null)"
                class="p-2 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors text-gray-700 dark:text-gray-300"
                title="Underline"
            >
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
            </button>
            <div class="w-px h-6 bg-gray-300 dark:bg-gray-600 mx-1"></div>
            <button
                type="button"
                @click.prevent="document.execCommand('formatBlock', false, '<h2>')"
                class="p-2 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors text-gray-700 dark:text-gray-300 text-sm font-semibold"
                title="Heading"
            >
                H
            </button>
            <button
                type="button"
                @click.prevent="document.execCommand('insertUnorderedList', false, null)"
                class="p-2 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors text-gray-700 dark:text-gray-300"
                title="Bullet List"
            >
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
            <button
                type="button"
                @click.prevent="document.execCommand('insertOrderedList', false, null)"
                class="p-2 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors text-gray-700 dark:text-gray-300"
                title="Numbered List"
            >
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"></path>
                </svg>
            </button>
            <div class="w-px h-6 bg-gray-300 dark:bg-gray-600 mx-1"></div>
            <button
                type="button"
                @click.prevent="document.execCommand('justifyLeft', false, null)"
                class="p-2 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors text-gray-700 dark:text-gray-300"
                title="Align Left"
            >
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 14h18M3 18h18M3 6h18"></path>
                </svg>
            </button>
            <button
                type="button"
                @click.prevent="document.execCommand('justifyCenter', false, null)"
                class="p-2 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors text-gray-700 dark:text-gray-300"
                title="Align Center"
            >
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 14h10M3 18h18M3 6h18"></path>
                </svg>
            </button>
            <button
                type="button"
                @click.prevent="document.execCommand('justifyRight', false, null)"
                class="p-2 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors text-gray-700 dark:text-gray-300"
                title="Align Right"
            >
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M9 14h12M3 18h18M3 6h18"></path>
                </svg>
            </button>
        </div>

        <!-- Editor -->
        <div
            id="{{ $uniqueId }}"
            contenteditable="{{ $disabled ? 'false' : 'true' }}"
            @input="content = $event.target.innerHTML"
            @if($placeholder) data-placeholder="{{ $placeholder }}" @endif
            class="px-4 py-3 text-gray-900 dark:text-gray-100 focus:outline-none overflow-y-auto"
            style="min-height: {{ $height }}; max-height: {{ $height }};"
        >
            {!! old($name, $value ?? '') !!}
        </div>
    </div>

    <!-- Hidden input for form submission -->
    <textarea 
        name="{{ $name }}" 
        x-model="content" 
        class="hidden"
        @if($required) required @endif
    ></textarea>

    @if($help && !$hasError)
        <p class="text-sm text-gray-500 dark:text-gray-400">{{ $help }}</p>
    @endif

    @if($hasError)
        <x-form.error :messages="$errorMessages" />
    @endif
</div>

<style>
    [contenteditable][data-placeholder]:empty:before {
        content: attr(data-placeholder);
        color: rgb(156 163 175);
    }
    .dark [contenteditable][data-placeholder]:empty:before {
        color: rgb(107 114 128);
    }
    [contenteditable]:focus {
        outline: none;
    }
</style>

