@props([
    'suggestions' => [],
])

@if(!empty($suggestions))
    <div class="mt-3 flex flex-wrap gap-2">
        @foreach($suggestions as $suggestion)
            <button
                type="button"
                onclick="const textarea = document.querySelector('textarea[x-model=\"message\"]'); if (textarea) { textarea.value = {{ json_encode($suggestion) }}; textarea.dispatchEvent(new Event('input', { bubbles: true })); textarea.focus(); }"
                class="px-3 py-1.5 text-xs font-medium rounded-full border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors"
            >
                {{ $suggestion }}
            </button>
        @endforeach
    </div>
@endif

