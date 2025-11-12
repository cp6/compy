@props([
    'content' => '',
    'filename' => 'file.txt',
    'language' => 'text',
    'lineNumbers' => true,
    'maxHeight' => 'h-[600px]',
    'highlight' => true,
])

@php
    $lines = explode("\n", $content);
    $totalLines = count($lines);
    $uniqueId = 'text-viewer-' . uniqid();
@endphp

@if($highlight)
    @once
        @push('styles')
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/themes/prism.min.css" />
        @endpush
        @push('scripts')
            <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/prism.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/plugins/autoloader/prism-autoloader.min.js"></script>
        @endpush
    @endonce
@endif

<div 
    class="bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 overflow-hidden shadow-lg"
    data-viewer-id="{{ $uniqueId }}"
    x-data="{ 
        highlight: @js($highlight),
        language: @js($language),
        highlighted: false
    }"
    x-init="
        $nextTick(() => {
            if (highlight) {
                const highlightCode = () => {
                    if (window.Prism && this.$el) {
                        const codeElements = this.$el.querySelectorAll('code');
                        codeElements.forEach(el => {
                            if (el.className && el.className.includes('language-') && !el.className.includes('language-none')) {
                                Prism.highlightElement(el);
                            }
                        });
                        this.highlighted = true;
                    }
                };
                
                const initHighlight = () => {
                    if (window.Prism) {
                        highlightCode();
                    } else {
                        setTimeout(initHighlight, 100);
                    }
                };
                
                initHighlight();
            }
        });
    "
>
    {{-- Header --}}
    <div class="px-4 py-3 bg-gradient-to-r from-gray-50 via-gray-50/50 to-transparent dark:from-gray-800 dark:via-gray-800/50 dark:to-transparent border-b border-gray-200 dark:border-gray-700 flex items-center justify-between">
        <div class="flex items-center gap-3">
            <div class="w-8 h-8 rounded-lg bg-dodger-blue-100 dark:bg-dodger-blue-900/30 flex items-center justify-center">
                <svg class="w-5 h-5 text-dodger-blue-600 dark:text-dodger-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
            </div>
            <div>
                <h3 class="text-sm font-semibold text-gray-900 dark:text-gray-100">{{ $filename }}</h3>
                <p class="text-xs text-gray-500 dark:text-gray-400">{{ $totalLines }} line{{ $totalLines !== 1 ? 's' : '' }}</p>
            </div>
        </div>
        <div class="flex items-center gap-2">
            <button
                type="button"
                onclick="navigator.clipboard.writeText({{ json_encode($content) }}); const span = this.querySelector('span'); const original = span.textContent; span.textContent = 'Copied!'; setTimeout(() => span.textContent = original, 2000);"
                class="px-3 py-1.5 text-xs font-medium text-gray-700 dark:text-gray-300 bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 rounded-lg transition-colors flex items-center gap-1.5"
            >
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                </svg>
                <span>Copy</span>
            </button>
        </div>
    </div>

    {{-- Content Area --}}
    <div class="{{ $maxHeight }} overflow-auto bg-gray-50 dark:bg-gray-900/50">
        @if($lineNumbers)
            <div class="flex">
                {{-- Line Numbers Column --}}
                <div class="flex-shrink-0 px-4 py-2 bg-gray-100 dark:bg-gray-800/80 border-r border-gray-200 dark:border-gray-700 text-right select-none">
                    <div class="font-mono text-xs text-gray-500 dark:text-gray-400 leading-relaxed">
                        @foreach($lines as $index => $line)
                            <div class="py-0.5">{{ $index + 1 }}</div>
                        @endforeach
                    </div>
                </div>
                
                {{-- Content Column --}}
                <div class="flex-1 min-w-0">
                    @if($highlight)
                        <pre class="px-4 py-2 font-mono text-xs leading-relaxed whitespace-pre-wrap break-words"><code class="language-{{ $language }}">@foreach($lines as $line){{ $line }}
@endforeach</code></pre>
                    @else
                        <pre class="px-4 py-2 font-mono text-xs leading-relaxed text-gray-800 dark:text-gray-200 whitespace-pre-wrap break-words"><code>@foreach($lines as $line){{ $line }}
@endforeach</code></pre>
                    @endif
                </div>
            </div>
        @else
            @if($highlight)
                <pre class="px-4 py-2 font-mono text-xs leading-relaxed whitespace-pre-wrap break-words overflow-x-auto"><code class="language-{{ $language }}">{{ $content }}</code></pre>
            @else
                <pre class="px-4 py-2 font-mono text-xs leading-relaxed text-gray-800 dark:text-gray-200 whitespace-pre-wrap break-words overflow-x-auto"><code>{{ $content }}</code></pre>
            @endif
        @endif
    </div>
</div>

@if($highlight)
    @once
        <style>
            /* Prism.js styling with dark/light mode support */
            pre[class*="language-"] {
                margin: 0 !important;
                padding: 1rem !important;
                background: #f5f5f5 !important;
                border-radius: 0 !important;
            }
            
            code[class*="language-"] {
                font-size: 0.8125rem !important; /* 13px - slightly larger for better clarity */
                line-height: 1.5 !important;
                color: #333 !important;
            }
            
            /* Dark mode styles - VS Code Dark+ inspired theme (sharp and clear) */
            .dark pre[class*="language-"] {
                background: #1e1e1e !important;
            }
            
            .dark code[class*="language-"] {
                color: #d4d4d4 !important;
            }
            
            /* Prism token colors for light mode */
            .token.comment,
            .token.prolog,
            .token.doctype,
            .token.cdata {
                color: #708090;
            }
            
            .token.punctuation {
                color: #999;
            }
            
            .token.property,
            .token.tag,
            .token.boolean,
            .token.number,
            .token.constant,
            .token.symbol,
            .token.deleted {
                color: #905;
            }
            
            .token.selector,
            .token.attr-name,
            .token.string,
            .token.char,
            .token.builtin,
            .token.inserted {
                color: #690;
            }
            
            .token.operator,
            .token.entity,
            .token.url,
            .language-css .token.string,
            .style .token.string {
                color: #9a6e3a;
            }
            
            .token.atrule,
            .token.attr-value,
            .token.keyword {
                color: #07a;
            }
            
            .token.function,
            .token.class-name {
                color: #dd4a68;
            }
            
            .token.regex,
            .token.important,
            .token.variable {
                color: #e90;
            }
            
            /* Dark mode token colors - VS Code Dark+ theme (sharp, high contrast) */
            .dark .token.comment,
            .dark .token.prolog,
            .dark .token.doctype,
            .dark .token.cdata {
                color: #6a9955 !important;
            }
            
            .dark .token.punctuation {
                color: #d4d4d4 !important;
            }
            
            .dark .token.property,
            .dark .token.tag,
            .dark .token.boolean,
            .dark .token.number,
            .dark .token.constant,
            .dark .token.symbol,
            .dark .token.deleted {
                color: #569cd6 !important;
            }
            
            .dark .token.selector,
            .dark .token.attr-name,
            .dark .token.string,
            .dark .token.char,
            .dark .token.builtin,
            .dark .token.inserted {
                color: #ce9178 !important;
            }
            
            .dark .token.operator,
            .dark .token.entity,
            .dark .token.url,
            .dark .language-css .token.string,
            .dark .style .token.string {
                color: #d4d4d4 !important;
            }
            
            .dark .token.atrule,
            .dark .token.attr-value,
            .dark .token.keyword {
                color: #569cd6 !important;
            }
            
            .dark .token.function,
            .dark .token.class-name {
                color: #dcdcaa !important;
            }
            
            .dark .token.regex,
            .dark .token.important,
            .dark .token.variable {
                color: #d4d4d4 !important;
            }
            
            /* Additional token types for better coverage */
            .dark .token.namespace {
                color: #4ec9b0 !important;
            }
            
            .dark .token.parameter {
                color: #9cdcfe !important;
            }
            
            .dark .token.type {
                color: #4ec9b0 !important;
            }
            
            /* Remove text shadows that cause blurriness */
            pre[class*="language-"],
            code[class*="language-"],
            .dark pre[class*="language-"],
            .dark code[class*="language-"],
            .dark .token,
            .token,
            [data-viewer-id] pre,
            [data-viewer-id] code {
                text-shadow: none !important;
            }
            
            /* Ensure text is crisp and not blurry - optimized for monospace fonts */
            pre[class*="language-"],
            code[class*="language-"],
            .dark pre[class*="language-"],
            .dark code[class*="language-"] {
                text-rendering: optimizeSpeed !important;
                -webkit-font-smoothing: auto !important;
                -moz-osx-font-smoothing: auto !important;
                font-weight: 400 !important;
                transform: translateZ(0) !important;
                backface-visibility: hidden !important;
                -webkit-backface-visibility: hidden !important;
                will-change: auto !important;
            }
            
            /* Ensure tokens are also crisp */
            .dark .token,
            .token {
                text-rendering: optimizeSpeed !important;
                -webkit-font-smoothing: auto !important;
                -moz-osx-font-smoothing: auto !important;
            }
            
            /* Apply sharp rendering to all code elements in the viewer */
            [data-viewer-id] pre,
            [data-viewer-id] code {
                text-rendering: optimizeSpeed !important;
                -webkit-font-smoothing: auto !important;
                -moz-osx-font-smoothing: auto !important;
                font-size: 0.8125rem !important; /* 13px for better clarity */
            }
            
            /* Dark mode specific - ensure high contrast */
            .dark code[class*="language-"] {
                font-size: 0.8125rem !important;
            }
        </style>
    @endonce
@endif

