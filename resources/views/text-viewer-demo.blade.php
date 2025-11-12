<x-app-layout>
    <x-slot name="title">Text File Viewer Demo</x-slot>
    <x-slot name="metaDescription">A modern text file viewer component with line numbers, syntax highlighting, and copy functionality</x-slot>

    <x-slot name="header">
        <x-breadcrumb :items="[
            ['label' => 'Home', 'url' => route('dashboard')],
            ['label' => 'Text Viewer', 'url' => '#'],
            ['label' => 'Demo'],
        ]" />
    </x-slot>

    <x-slot name="pageTitle">
        Text File Viewer Demo
    </x-slot>

    <x-slot name="pageSubtitle">
        A modern, componentized text file viewer with line numbers, syntax highlighting, and copy functionality
    </x-slot>

    <x-alert.alerts />
    
    {{-- Laravel Log Viewer --}}
    <x-card.card variant="gradient" class="mb-6">
        <x-slot name="header">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Laravel Log File</h3>
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Viewing contents of storage/logs/laravel.log</p>
                </div>
            </div>
        </x-slot>
        
        @if(isset($logContent) && !empty($logContent))
            <x-text-viewer.viewer 
                :content="$logContent" 
                filename="laravel.log"
                language="log"
                :lineNumbers="true"
                :highlight="false"
                maxHeight="h-[600px]"
            />
        @else
            <div class="p-8 text-center">
                <svg class="w-16 h-16 mx-auto text-gray-400 dark:text-gray-500 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                <p class="text-gray-600 dark:text-gray-400 mb-2">Log file is empty or not found</p>
                <p class="text-sm text-gray-500 dark:text-gray-500">The laravel.log file doesn't contain any content yet.</p>
            </div>
        @endif
    </x-card>

    {{-- Example Code Files --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
        {{-- PHP Example --}}
        <x-card.card variant="gradient">
            <x-slot name="header">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">PHP Code Example</h3>
            </x-slot>
            
            @php
                $phpCode = '<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

final class ExampleController
{
    public function index(): \Illuminate\View\View
    {
        return view(\'example\', [
            \'title\' => \'Hello World\',
            \'data\' => [\'foo\' => \'bar\'],
        ]);
    }
}';
            @endphp
            <x-text-viewer.viewer 
                :content="$phpCode"
                filename="ExampleController.php"
                language="php"
                :lineNumbers="true"
                :highlight="true"
                maxHeight="h-[400px]"
            />
        </x-card>

        {{-- JavaScript Example --}}
        <x-card.card variant="gradient">
            <x-slot name="header">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">JavaScript Code Example</h3>
            </x-slot>
            
            @php
                $jsCode = '// Example JavaScript code
function greetUser(name) {
    const greeting = `Hello, ${name}!`;
    console.log(greeting);
    return greeting;
}

const user = {
    name: \'John Doe\',
    age: 30,
    email: \'john@example.com\'
};

greetUser(user.name);

// Arrow function example
const multiply = (a, b) => a * b;

console.log(multiply(5, 3));';
            @endphp
            <x-text-viewer.viewer 
                :content="$jsCode"
                filename="example.js"
                language="javascript"
                :lineNumbers="true"
                :highlight="true"
                maxHeight="h-[400px]"
            />
        </x-card>
    </div>

    {{-- Comparison: Highlighted vs Non-Highlighted --}}
    <x-card.card variant="gradient" class="mb-6">
        <x-slot name="header">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Syntax Highlighting Comparison</h3>
            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">See the difference between highlighted and plain text views</p>
        </x-slot>
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            {{-- With Highlighting --}}
            <div>
                <h4 class="text-sm font-semibold text-gray-900 dark:text-gray-100 mb-2">With Syntax Highlighting</h4>
                @php
                    $comparisonCode = 'function calculateTotal(items) {
    let total = 0;
    for (let item of items) {
        total += item.price * item.quantity;
    }
    return total;
}';
                @endphp
                <x-text-viewer.viewer 
                    :content="$comparisonCode"
                    filename="example.js"
                    language="javascript"
                    :lineNumbers="true"
                    :highlight="true"
                    maxHeight="h-[200px]"
                />
            </div>
            
            {{-- Without Highlighting --}}
            <div>
                <h4 class="text-sm font-semibold text-gray-900 dark:text-gray-100 mb-2">Without Syntax Highlighting</h4>
                <x-text-viewer.viewer 
                    :content="$comparisonCode"
                    filename="example.js"
                    language="javascript"
                    :lineNumbers="true"
                    :highlight="false"
                    maxHeight="h-[200px]"
                />
            </div>
        </div>
    </x-card>

    {{-- Features Section --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <x-card.card variant="gradient" title="Line Numbers">
            <p class="text-gray-600 dark:text-gray-400">
                Automatic line numbering for easy reference and debugging. Line numbers are displayed in a separate column for better readability.
            </p>
        </x-card>
        
        <x-card.card variant="gradient" title="Syntax Highlighting">
            <p class="text-gray-600 dark:text-gray-400">
                Support for various programming languages with syntax highlighting. Configure the language prop to enable language-specific highlighting.
            </p>
        </x-card>
        
        <x-card.card variant="gradient" title="Copy to Clipboard">
            <p class="text-gray-600 dark:text-gray-400">
                One-click copy functionality to quickly copy the entire file content to your clipboard. Perfect for sharing code snippets.
            </p>
        </x-card>
        
        <x-card.card variant="gradient" title="Scrollable Content">
            <p class="text-gray-600 dark:text-gray-400">
                Customizable maximum height with smooth scrolling for large files. The viewer automatically handles overflow with scrollbars.
            </p>
        </x-card>
        
        <x-card.card variant="gradient" title="Dark Mode Support">
            <p class="text-gray-600 dark:text-gray-400">
                Fully styled for both light and dark themes. Automatically adapts to your application's theme settings.
            </p>
        </x-card>
        
        <x-card.card variant="gradient" title="File Information">
            <p class="text-gray-600 dark:text-gray-400">
                Displays file name and line count in the header. Provides quick context about the file being viewed.
            </p>
        </x-card>
    </div>

    {{-- Usage Example --}}
    <x-card.card variant="gradient" class="mt-6">
        <x-slot name="header">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Usage Example</h3>
        </x-slot>
        
        <div class="space-y-4">
            <p class="text-gray-700 dark:text-gray-300">Use the text viewer component in your Blade templates:</p>
            
            <pre class="bg-gray-100 dark:bg-gray-900 rounded-lg p-4 overflow-x-auto text-sm font-mono text-gray-800 dark:text-gray-200"><code>&lt;x-text-viewer.viewer 
    content="{{ '{' }}{{ '$content' }}}"
    filename="example.txt"
    language="text"
    :lineNumbers="true"
    maxHeight="h-[600px]"
/&gt;</code></pre>
            
            <div class="pt-4 border-t border-gray-200 dark:border-gray-700">
                <h4 class="text-sm font-semibold text-gray-900 dark:text-gray-100 mb-2">Available Props:</h4>
                <ul class="space-y-1 text-sm text-gray-600 dark:text-gray-400">
                    <li><code class="px-1.5 py-0.5 bg-gray-100 dark:bg-gray-800 rounded text-xs">content</code> - The text content to display (required)</li>
                    <li><code class="px-1.5 py-0.5 bg-gray-100 dark:bg-gray-800 rounded text-xs">filename</code> - Display name for the file (default: 'file.txt')</li>
                    <li><code class="px-1.5 py-0.5 bg-gray-100 dark:bg-gray-800 rounded text-xs">language</code> - Language for syntax highlighting (default: 'text')</li>
                    <li><code class="px-1.5 py-0.5 bg-gray-100 dark:bg-gray-800 rounded text-xs">lineNumbers</code> - Show line numbers (default: true)</li>
                    <li><code class="px-1.5 py-0.5 bg-gray-100 dark:bg-gray-800 rounded text-xs">highlight</code> - Enable syntax highlighting (default: true)</li>
                    <li><code class="px-1.5 py-0.5 bg-gray-100 dark:bg-gray-800 rounded text-xs">maxHeight</code> - Maximum height class (default: 'h-[600px]')</li>
                </ul>
            </div>
        </div>
    </x-card>
</x-app-layout>

