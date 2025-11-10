@php
    // Demo chat messages
    $messages = [
        [
            'author' => 'AI Assistant',
            'content' => 'Hello! I\'m your AI assistant. How can I help you today?',
            'timestamp' => '10:30 AM',
            'isAi' => true,
        ],
        [
            'author' => 'You',
            'content' => 'Hi! Can you explain what Laravel is?',
            'timestamp' => '10:31 AM',
            'isAi' => false,
        ],
        [
            'author' => 'AI Assistant',
            'content' => 'Laravel is a free, open-source PHP web framework created by Taylor Otwell. It follows the model-view-controller (MVC) architectural pattern and is designed for the development of web applications following best practices and conventions.

Key features of Laravel include:
• Elegant syntax and expressive code
• Built-in authentication and authorization
• Powerful ORM (Eloquent) for database interactions
• Artisan command-line tool for common tasks
• Robust routing system
• Blade templating engine
• Comprehensive testing support

Laravel makes development faster and more enjoyable by providing tools and features that handle common tasks, allowing developers to focus on building their applications.',
            'timestamp' => '10:31 AM',
            'isAi' => true,
        ],
        [
            'author' => 'You',
            'content' => 'That\'s really helpful! Can you also tell me about Blade components?',
            'timestamp' => '10:32 AM',
            'isAi' => false,
        ],
        [
            'author' => 'AI Assistant',
            'content' => 'Blade components are reusable pieces of UI that make your templates more modular and maintainable. They\'re similar to components in frameworks like React or Vue.

In Laravel, you can create Blade components using:
• Class-based components (PHP classes with views)
• Anonymous components (just Blade templates)

Components help you:
• Reuse UI elements across your application
• Keep your code DRY (Don\'t Repeat Yourself)
• Make templates easier to read and maintain
• Encapsulate complex UI logic

For example, you might have a `<x-button>` component that you can use anywhere with different props like `<x-button variant="primary">Click me</x-button>`.',
            'timestamp' => '10:32 AM',
            'isAi' => true,
        ],
    ];
@endphp

<x-app-layout>
    <x-slot name="title">AI Chat Demo</x-slot>
    <x-slot name="metaDescription">Interactive AI chat interface demo showcasing modern chat components with real-time messaging capabilities.</x-slot>
    <x-slot name="metaKeywords">ai chat, chat interface, messaging, demo, components</x-slot>

    <x-slot name="header">
        <x-breadcrumb :items="[
            ['label' => 'Home', 'url' => route('dashboard')],
            ['label' => 'AI Chat Demo', 'url' => '#'],
        ]" />
    </x-slot>

    <x-slot name="pageTitle">
        AI Chat Demo
    </x-slot>

    <x-slot name="pageSubtitle">
        Interactive chat interface with AI assistant
    </x-slot>

    <x-alert.alerts />

    <div class="space-y-6">
        {{-- Main Chat Interface --}}
        <x-card.card variant="gradient" class="overflow-hidden p-0">
            <x-chat.container :messages="$messages" height="h-[600px]">
                <x-chat.input placeholder="Ask me anything..." />
            </x-chat.container>
        </x-card.card>

        {{-- Features Section --}}
        <x-card.card variant="gradient" title="Chat Features">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <div class="p-4 bg-gray-50 dark:bg-gray-900/50 rounded-lg">
                    <h3 class="font-semibold text-gray-900 dark:text-gray-100 mb-2">Real-time Messaging</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        Send and receive messages instantly with a smooth, responsive interface
                    </p>
                </div>

                <div class="p-4 bg-gray-50 dark:bg-gray-900/50 rounded-lg">
                    <h3 class="font-semibold text-gray-900 dark:text-gray-100 mb-2">AI-Powered</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        Intelligent responses powered by advanced AI technology
                    </p>
                </div>

                <div class="p-4 bg-gray-50 dark:bg-gray-900/50 rounded-lg">
                    <h3 class="font-semibold text-gray-900 dark:text-gray-100 mb-2">Dark Mode</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        Full dark mode support for comfortable viewing in any lighting
                    </p>
                </div>

                <div class="p-4 bg-gray-50 dark:bg-gray-900/50 rounded-lg">
                    <h3 class="font-semibold text-gray-900 dark:text-gray-100 mb-2">Fast & Responsive</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        Optimized for speed and works seamlessly on all devices
                    </p>
                </div>

                <div class="p-4 bg-gray-50 dark:bg-gray-900/50 rounded-lg">
                    <h3 class="font-semibold text-gray-900 dark:text-gray-100 mb-2">Customizable</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        Easily customize colors, styles, and behavior to match your brand
                    </p>
                </div>

                <div class="p-4 bg-gray-50 dark:bg-gray-900/50 rounded-lg">
                    <h3 class="font-semibold text-gray-900 dark:text-gray-100 mb-2">Secure</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        Built with security best practices and data protection in mind
                    </p>
                </div>
            </div>
        </x-card.card>

        {{-- Component Usage --}}
        <x-card.card variant="gradient" title="Component Usage">
            <div class="bg-gray-50 dark:bg-gray-900/50 rounded-lg p-4 overflow-x-auto">
                <pre class="text-sm text-gray-800 dark:text-gray-200"><code>&lt;!-- Chat Container with Messages --&gt;
&lt;x-chat.container :messages="$messages" height="h-[600px]"&gt;
    &lt;x-chat.input placeholder="Type your message..." /&gt;
&lt;/x-chat.container&gt;

&lt;!-- Individual Message --&gt;
&lt;x-chat.message
    author="AI Assistant"
    content="Hello! How can I help you?"
    timestamp="10:30 AM"
    :isAi="true"
/&gt;

&lt;x-chat.message
    author="You"
    content="Hi there!"
    timestamp="10:31 AM"
    :isAi="false"
/&gt;

&lt;!-- Typing Indicator --&gt;
&lt;x-chat.message
    author="AI Assistant"
    content=""
    :isAi="true"
    :isTyping="true"
/&gt;</code></pre>
            </div>
        </x-card.card>
    </div>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Auto-scroll to bottom when new messages arrive
            const container = document.querySelector('[x-ref="messagesContainer"]');
            if (container) {
                const observer = new MutationObserver(() => {
                    container.scrollTop = container.scrollHeight;
                });
                observer.observe(container, { childList: true, subtree: true });
            }
        });
    </script>
    @endpush
</x-app-layout>

