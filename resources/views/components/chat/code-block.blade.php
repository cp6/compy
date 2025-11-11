@props([
    'language' => 'php',
    'code' => '',
])

<div class="mt-2 mb-2 rounded-lg overflow-hidden border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-900/50 shadow-sm">
    @if($language)
        <div class="px-3 py-1.5 bg-gray-200 dark:bg-gray-800 border-b border-gray-300 dark:border-gray-600 flex items-center justify-between">
            <span class="text-xs font-medium text-gray-600 dark:text-gray-400 uppercase tracking-wide">{{ $language }}</span>
            <button
                type="button"
                onclick="navigator.clipboard.writeText({{ json_encode($code) }}); const span = this.querySelector('span'); span.textContent = 'Copied!'; setTimeout(() => span.textContent = 'Copy', 2000);"
                class="text-xs text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 transition-colors px-2 py-0.5 rounded hover:bg-gray-300 dark:hover:bg-gray-700"
            >
                <span>Copy</span>
            </button>
        </div>
    @endif
    <pre class="p-4 overflow-x-auto text-xs leading-relaxed font-mono text-gray-800 dark:text-gray-200"><code class="language-{{ $language }} whitespace-pre">{{ $code }}</code></pre>
</div>

