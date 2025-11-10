@props([
    'title' => null,
    'subtitle' => null,
    'closeButton' => true,
    'modalName' => null,
])

<div class="px-4 sm:px-6 py-4 sm:py-5 border-b border-gray-200 dark:border-gray-700 flex items-start justify-between">
    <div class="flex-1">
        @if($title)
            <h3 class="text-lg sm:text-xl font-semibold text-gray-900 dark:text-gray-100">
                {{ $title }}
            </h3>
        @endif
        @if($subtitle)
            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ $subtitle }}
            </p>
        @endif
        @if(!$title && !$subtitle)
            {{ $slot }}
        @endif
    </div>
    @if($closeButton)
        <button
            type="button"
            class="ml-4 flex-shrink-0 rounded-lg p-1.5 text-gray-400 hover:text-gray-500 dark:hover:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-dodger-blue-500 dark:focus:ring-dodger-blue-400 transition-colors"
            x-on:click.stop="$dispatch('close-modal', '{{ $modalName ?? $attributes->get('modal-name', '') }}')"
        >
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    @endif
</div>

