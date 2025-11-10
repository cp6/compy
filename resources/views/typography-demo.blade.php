<x-app-layout>
    <x-slot name="title">Typography Demo</x-slot>
    <x-slot name="metaDescription">A comprehensive showcase of typography styles, headings, paragraphs, lists, quotes, and text utilities.</x-slot>
    <x-slot name="metaKeywords">typography, demo, headings, text, fonts, styling</x-slot>

    <x-slot name="header">
        <x-breadcrumb :items="[
            ['label' => 'Home', 'url' => route('dashboard')],
            ['label' => 'Typography Demo', 'url' => '#'],
        ]" />
    </x-slot>

    <x-slot name="pageTitle">
        Typography Demo
    </x-slot>

    <x-slot name="pageSubtitle">
        A comprehensive showcase of typography styles and text utilities
    </x-slot>

    <div class="space-y-8">
        <!-- Headings Section -->
        <section>
            <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-4">Headings</h2>
            <x-card.card variant="gradient">
                <div class="space-y-6">
                    <div>
                        <h1 class="text-4xl font-bold text-gray-900 dark:text-gray-100">Heading 1 - 4xl Bold</h1>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Use for main page titles and hero sections</p>
                    </div>
                    <div>
                        <h2 class="text-3xl font-bold text-gray-900 dark:text-gray-100">Heading 2 - 3xl Bold</h2>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Use for major section titles</p>
                    </div>
                    <div>
                        <h3 class="text-2xl font-semibold text-gray-900 dark:text-gray-100">Heading 3 - 2xl Semibold</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Use for subsection titles</p>
                    </div>
                    <div>
                        <h4 class="text-xl font-semibold text-gray-900 dark:text-gray-100">Heading 4 - xl Semibold</h4>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Use for card titles and smaller sections</p>
                    </div>
                    <div>
                        <h5 class="text-lg font-medium text-gray-900 dark:text-gray-100">Heading 5 - lg Medium</h5>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Use for minor headings and labels</p>
                    </div>
                    <div>
                        <h6 class="text-base font-medium text-gray-900 dark:text-gray-100">Heading 6 - base Medium</h6>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Use for smallest headings</p>
                    </div>
                </div>
            </x-card.card>
        </section>

        <!-- Paragraphs Section -->
        <section>
            <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-4">Paragraphs & Body Text</h2>
            <x-card.card variant="gradient">
                <div class="space-y-6">
                    <div>
                        <p class="text-lg text-gray-700 dark:text-gray-300 leading-relaxed">
                            This is a large paragraph (text-lg). Perfect for introductory text, lead paragraphs, or important content that needs to stand out. It provides excellent readability and draws attention to key information.
                        </p>
                    </div>
                    <div>
                        <p class="text-base text-gray-700 dark:text-gray-300 leading-relaxed">
                            This is a base paragraph (text-base). This is the standard body text size used throughout the application. It offers optimal readability for most content types including articles, descriptions, and general information.
                        </p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600 dark:text-gray-400 leading-relaxed">
                            This is a small paragraph (text-sm). Ideal for secondary information, captions, helper text, or less prominent content. It maintains readability while taking up less visual space.
                        </p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 dark:text-gray-500 leading-relaxed">
                            This is an extra small paragraph (text-xs). Used for fine print, timestamps, metadata, or very minor details that don't require immediate attention.
                        </p>
                    </div>
                </div>
            </x-card.card>
        </section>

        <!-- Font Weights Section -->
        <section>
            <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-4">Font Weights</h2>
            <x-card.card variant="gradient">
                <div class="space-y-4">
                    <div>
                        <p class="text-base font-thin text-gray-900 dark:text-gray-100">Thin (100) - The quick brown fox jumps over the lazy dog</p>
                    </div>
                    <div>
                        <p class="text-base font-light text-gray-900 dark:text-gray-100">Light (300) - The quick brown fox jumps over the lazy dog</p>
                    </div>
                    <div>
                        <p class="text-base font-normal text-gray-900 dark:text-gray-100">Normal (400) - The quick brown fox jumps over the lazy dog</p>
                    </div>
                    <div>
                        <p class="text-base font-medium text-gray-900 dark:text-gray-100">Medium (500) - The quick brown fox jumps over the lazy dog</p>
                    </div>
                    <div>
                        <p class="text-base font-semibold text-gray-900 dark:text-gray-100">Semibold (600) - The quick brown fox jumps over the lazy dog</p>
                    </div>
                    <div>
                        <p class="text-base font-bold text-gray-900 dark:text-gray-100">Bold (700) - The quick brown fox jumps over the lazy dog</p>
                    </div>
                    <div>
                        <p class="text-base font-extrabold text-gray-900 dark:text-gray-100">Extra Bold (800) - The quick brown fox jumps over the lazy dog</p>
                    </div>
                </div>
            </x-card.card>
        </section>

        <!-- Text Colors Section -->
        <section>
            <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-4">Text Colors</h2>
            <x-card.card variant="gradient">
                <div class="space-y-4">
                    <div>
                        <p class="text-base text-gray-900 dark:text-gray-100">Primary Text - text-gray-900 dark:text-gray-100</p>
                    </div>
                    <div>
                        <p class="text-base text-gray-700 dark:text-gray-300">Secondary Text - text-gray-700 dark:text-gray-300</p>
                    </div>
                    <div>
                        <p class="text-base text-gray-600 dark:text-gray-400">Tertiary Text - text-gray-600 dark:text-gray-400</p>
                    </div>
                    <div>
                        <p class="text-base text-gray-500 dark:text-gray-500">Muted Text - text-gray-500 dark:text-gray-500</p>
                    </div>
                    <div>
                        <p class="text-base text-dodger-blue-600 dark:text-dodger-blue-400">Dodger Blue - text-dodger-blue-600 dark:text-dodger-blue-400</p>
                    </div>
                    <div>
                        <p class="text-base text-green-600 dark:text-green-400">Success Green - text-green-600 dark:text-green-400</p>
                    </div>
                    <div>
                        <p class="text-base text-yellow-600 dark:text-yellow-400">Warning Yellow - text-yellow-600 dark:text-yellow-400</p>
                    </div>
                    <div>
                        <p class="text-base text-red-600 dark:text-red-400">Error Red - text-red-600 dark:text-red-400</p>
                    </div>
                    <div>
                        <p class="text-base text-purple-600 dark:text-purple-400">Purple - text-purple-600 dark:text-purple-400</p>
                    </div>
                </div>
            </x-card.card>
        </section>

        <!-- Lists Section -->
        <section>
            <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-4">Lists</h2>
            <div class="grid md:grid-cols-2 gap-6">
                <x-card.card variant="gradient" title="Unordered List">
                    <ul class="space-y-2 text-gray-700 dark:text-gray-300">
                        <li class="flex items-start">
                            <span class="mr-2 text-dodger-blue-600 dark:text-dodger-blue-400">•</span>
                            <span>First item in the list</span>
                        </li>
                        <li class="flex items-start">
                            <span class="mr-2 text-dodger-blue-600 dark:text-dodger-blue-400">•</span>
                            <span>Second item with more content that wraps to multiple lines if needed</span>
                        </li>
                        <li class="flex items-start">
                            <span class="mr-2 text-dodger-blue-600 dark:text-dodger-blue-400">•</span>
                            <span>Third item</span>
                        </li>
                        <li class="flex items-start">
                            <span class="mr-2 text-dodger-blue-600 dark:text-dodger-blue-400">•</span>
                            <span>Nested list item
                                <ul class="mt-2 ml-4 space-y-1">
                                    <li class="flex items-start">
                                        <span class="mr-2 text-gray-500 dark:text-gray-500">◦</span>
                                        <span>Nested item one</span>
                                    </li>
                                    <li class="flex items-start">
                                        <span class="mr-2 text-gray-500 dark:text-gray-500">◦</span>
                                        <span>Nested item two</span>
                                    </li>
                                </ul>
                            </span>
                        </li>
                    </ul>
                </x-card.card>

                <x-card.card variant="gradient" title="Ordered List">
                    <ol class="space-y-2 text-gray-700 dark:text-gray-300 list-decimal list-inside">
                        <li>First numbered item in the ordered list</li>
                        <li>Second item with additional content that demonstrates how longer text wraps properly</li>
                        <li>Third item in the sequence</li>
                        <li>Fourth item with nested list
                            <ol class="mt-2 ml-4 space-y-1 list-decimal list-inside">
                                <li>Nested numbered item one</li>
                                <li>Nested numbered item two</li>
                            </ol>
                        </li>
                    </ol>
                </x-card.card>
            </div>
        </section>

        <!-- Blockquotes Section -->
        <section>
            <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-4">Blockquotes</h2>
            <x-card.card variant="gradient">
                <div class="space-y-6">
                    <blockquote class="border-l-4 border-dodger-blue-600 dark:border-dodger-blue-400 pl-4 py-2 italic text-gray-700 dark:text-gray-300">
                        <p class="text-lg">"The best way to predict the future is to invent it."</p>
                        <footer class="mt-2 text-sm text-gray-500 dark:text-gray-500 not-italic">
                            — Alan Kay
                        </footer>
                    </blockquote>
                    <blockquote class="border-l-4 border-green-600 dark:border-green-400 pl-4 py-2 italic text-gray-700 dark:text-gray-300">
                        <p>This is a standard blockquote with a different color accent. It's perfect for highlighting important quotes, testimonials, or callouts in your content.</p>
                    </blockquote>
                </div>
            </x-card.card>
        </section>

        <!-- Text Alignment Section -->
        <section>
            <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-4">Text Alignment</h2>
            <x-card.card variant="gradient">
                <div class="space-y-6">
                    <div>
                        <p class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Left Aligned (default)</p>
                        <p class="text-base text-gray-700 dark:text-gray-300 text-left">
                            This text is left-aligned, which is the default alignment for most content. It's the most natural reading direction for left-to-right languages.
                        </p>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Center Aligned</p>
                        <p class="text-base text-gray-700 dark:text-gray-300 text-center">
                            This text is center-aligned. Perfect for headings, call-to-action text, or content that needs to draw attention.
                        </p>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Right Aligned</p>
                        <p class="text-base text-gray-700 dark:text-gray-300 text-right">
                            This text is right-aligned. Useful for dates, timestamps, or content that should align with the right edge.
                        </p>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Justified</p>
                        <p class="text-base text-gray-700 dark:text-gray-300 text-justify">
                            This text is justified, meaning both the left and right edges are aligned. This creates a clean, uniform appearance but can sometimes create awkward spacing between words.
                        </p>
                    </div>
                </div>
            </x-card.card>
        </section>

        <!-- Text Utilities Section -->
        <section>
            <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-4">Text Utilities</h2>
            <x-card.card variant="gradient">
                <div class="space-y-4">
                    <div>
                        <p class="text-base text-gray-700 dark:text-gray-300">
                            <span class="font-bold">Bold text</span> and <span class="font-semibold">semibold text</span> for emphasis.
                        </p>
                    </div>
                    <div>
                        <p class="text-base text-gray-700 dark:text-gray-300">
                            <span class="italic">Italic text</span> for emphasis or quotes, and <span class="not-italic">not-italic</span> to override.
                        </p>
                    </div>
                    <div>
                        <p class="text-base text-gray-700 dark:text-gray-300">
                            <span class="underline">Underlined text</span> and <span class="line-through">strikethrough text</span>.
                        </p>
                    </div>
                    <div>
                        <p class="text-base text-gray-700 dark:text-gray-300">
                            <span class="uppercase">uppercase text</span>, <span class="lowercase">LOWERCASE TEXT</span>, and <span class="capitalize">capitalized text</span>.
                        </p>
                    </div>
                    <div>
                        <p class="text-base text-gray-700 dark:text-gray-300">
                            <span class="tracking-tight">Tight letter spacing</span> and <span class="tracking-wide">wide letter spacing</span>.
                        </p>
                    </div>
                    <div>
                        <p class="text-base text-gray-700 dark:text-gray-300">
                            <span class="leading-tight">Tight line height</span> for compact text, and <span class="leading-relaxed">relaxed line height</span> for better readability.
                        </p>
                    </div>
                    <div>
                        <p class="text-base text-gray-700 dark:text-gray-300">
                            <span class="truncate block">Truncated text that will be cut off with an ellipsis if it's too long to fit in the container</span>
                        </p>
                    </div>
                    <div>
                        <p class="text-base text-gray-700 dark:text-gray-300 break-words">
                            Break words: ThisIsAVeryLongWordThatWillBreakAcrossMultipleLinesIfNeededToPreventOverflow
                        </p>
                    </div>
                </div>
            </x-card.card>
        </section>

        <!-- Code & Pre Section -->
        <section>
            <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-4">Code & Preformatted Text</h2>
            <x-card.card variant="gradient">
                <div class="space-y-6">
                    <div>
                        <p class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Inline Code</p>
                        <p class="text-base text-gray-700 dark:text-gray-300">
                            Use <code class="px-1.5 py-0.5 bg-gray-100 dark:bg-gray-800 text-dodger-blue-600 dark:text-dodger-blue-400 rounded text-sm font-mono">inline code</code> for short code snippets or technical terms.
                        </p>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Code Block</p>
                        <pre class="bg-gray-100 dark:bg-gray-800 rounded-lg p-4 overflow-x-auto text-sm font-mono text-gray-800 dark:text-gray-200"><code>function greet(name) {
    return `Hello, ${name}!`;
}

console.log(greet('World'));</code></pre>
                    </div>
                </div>
            </x-card.card>
        </section>

        <!-- Links Section -->
        <section>
            <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-4">Links</h2>
            <x-card.card variant="gradient">
                <div class="space-y-4">
                    <div>
                        <p class="text-base text-gray-700 dark:text-gray-300">
                            <a href="#" class="text-dodger-blue-600 dark:text-dodger-blue-400 hover:text-dodger-blue-700 dark:hover:text-dodger-blue-300 underline">Default link</a> with hover effects.
                        </p>
                    </div>
                    <div>
                        <p class="text-base text-gray-700 dark:text-gray-300">
                            <a href="#" class="text-dodger-blue-600 dark:text-dodger-blue-400 hover:text-dodger-blue-700 dark:hover:text-dodger-blue-300 hover:underline">Link with hover underline</a>.
                        </p>
                    </div>
                    <div>
                        <p class="text-base text-gray-700 dark:text-gray-300">
                            <a href="#" class="text-dodger-blue-600 dark:text-dodger-blue-400 hover:text-dodger-blue-700 dark:hover:text-dodger-blue-300 no-underline font-semibold">Bold link without underline</a>.
                        </p>
                    </div>
                </div>
            </x-card.card>
        </section>

        <!-- Responsive Typography Section -->
        <section>
            <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-4">Responsive Typography</h2>
            <x-card.card variant="gradient">
                <div class="space-y-4">
                    <div>
                        <h3 class="text-base sm:text-lg md:text-xl lg:text-2xl font-bold text-gray-900 dark:text-gray-100">
                            Responsive Heading
                        </h3>
                        <p class="text-xs sm:text-sm md:text-base text-gray-600 dark:text-gray-400 mt-1">
                            This heading scales from base to 2xl based on screen size
                        </p>
                    </div>
                    <div>
                        <p class="text-sm sm:text-base md:text-lg text-gray-700 dark:text-gray-300">
                            This paragraph text scales responsively from small on mobile to large on desktop screens, ensuring optimal readability across all devices.
                        </p>
                    </div>
                </div>
            </x-card.card>
        </section>
    </div>
</x-app-layout>

