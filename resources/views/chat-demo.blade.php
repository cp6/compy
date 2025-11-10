@php
    // Demo chat messages (regular chat, not AI)
    $messages = [
        [
            'author' => 'Sarah Johnson',
            'content' => 'Hey team! Just wanted to check in on the project status.',
            'timestamp' => '10:30 AM',
            'isAi' => false,
            'avatar' => 'SJ',
        ],
        [
            'author' => 'You',
            'content' => 'Hi Sarah! We\'re making great progress. The new features are almost ready for testing.',
            'timestamp' => '10:32 AM',
            'isAi' => false,
            'avatar' => 'ME',
        ],
        [
            'author' => 'Mike Chen',
            'content' => 'That\'s awesome! Can you share a preview?',
            'timestamp' => '10:33 AM',
            'isAi' => false,
            'avatar' => 'MC',
        ],
        [
            'author' => 'You',
            'content' => 'Sure! I\'ll send it over in a few minutes.',
            'timestamp' => '10:34 AM',
            'isAi' => false,
            'avatar' => 'ME',
        ],
        [
            'author' => 'Emily Davis',
            'content' => 'Thanks for the update! Looking forward to seeing it.',
            'timestamp' => '10:35 AM',
            'isAi' => false,
            'avatar' => 'ED',
        ],
        [
            'author' => 'Sarah Johnson',
            'content' => 'Perfect timing. We have a client meeting tomorrow, so this will be great to show them.',
            'timestamp' => '10:36 AM',
            'isAi' => false,
            'avatar' => 'SJ',
        ],
    ];
    
    // Demo conversations list
    $conversations = [
        [
            'id' => 1,
            'name' => 'Team Project',
            'lastMessage' => 'Perfect timing. We have a client meeting tomorrow...',
            'timestamp' => '10:36 AM',
            'unread' => 2,
            'active' => true,
        ],
        [
            'id' => 2,
            'name' => 'Design Team',
            'lastMessage' => 'The new mockups are ready for review.',
            'timestamp' => '9:15 AM',
            'unread' => 0,
            'active' => false,
        ],
        [
            'id' => 3,
            'name' => 'Marketing',
            'lastMessage' => 'Can we schedule a meeting this week?',
            'timestamp' => 'Yesterday',
            'unread' => 1,
            'active' => false,
        ],
        [
            'id' => 4,
            'name' => 'Support Team',
            'lastMessage' => 'The issue has been resolved.',
            'timestamp' => '2 days ago',
            'unread' => 0,
            'active' => false,
        ],
    ];
@endphp

<x-app-layout>
    <x-slot name="title">Chat Demo</x-slot>
    <x-slot name="metaDescription">Interactive chat interface demo showcasing team messaging components with real-time communication capabilities.</x-slot>
    <x-slot name="metaKeywords">chat, messaging, team chat, communication, demo, components</x-slot>

    <x-slot name="header">
        <x-breadcrumb :items="[
            ['label' => 'Home', 'url' => route('dashboard')],
            ['label' => 'Chat Demo', 'url' => '#'],
        ]" />
    </x-slot>

    <x-slot name="pageTitle">
        Chat Demo
    </x-slot>

    <x-slot name="pageSubtitle">
        Interactive team chat interface with conversations and messaging
    </x-slot>

    <x-alert.alerts />

    <div class="space-y-6">
        {{-- Chat Interface with Sidebar --}}
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-6 min-h-[600px]">
            {{-- Conversations Sidebar --}}
            <div class="lg:col-span-1 flex flex-col">
                <x-card.card variant="gradient" class="flex flex-col h-full">
                    <x-slot name="header">
                        <div class="flex items-center justify-between">
                            <h3 class="text-lg font-bold text-gray-900 dark:text-gray-100">Conversations</h3>
                        </div>
                    </x-slot>
                    
                    <div class="flex-1 overflow-y-auto space-y-2 min-h-0">
                        @foreach($conversations as $conversation)
                            <a href="#" class="block">
                                <div class="p-3 rounded-lg transition-all duration-200 {{ $conversation['active'] ? 'bg-dodger-blue-50 dark:bg-dodger-blue-900/20 border border-dodger-blue-200 dark:border-dodger-blue-800' : 'bg-gray-50 dark:bg-gray-900/50 hover:bg-gray-100 dark:hover:bg-gray-800/50' }}">
                                    <div class="flex items-start justify-between gap-2 mb-1">
                                        <h4 class="font-semibold text-sm text-gray-900 dark:text-gray-100 flex-1 min-w-0">{{ $conversation['name'] }}</h4>
                                        @if($conversation['unread'] > 0)
                                            <span class="flex-shrink-0 px-2 py-0.5 text-xs font-bold rounded-full bg-dodger-blue-500 text-white">
                                                {{ $conversation['unread'] }}
                                            </span>
                                        @endif
                                    </div>
                                    <p class="text-xs text-gray-600 dark:text-gray-400 line-clamp-1 mb-1">{{ $conversation['lastMessage'] }}</p>
                                    <span class="text-xs text-gray-500 dark:text-gray-500">{{ $conversation['timestamp'] }}</span>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </x-card.card>
            </div>
            
            {{-- Main Chat Area --}}
            <div class="lg:col-span-3 flex flex-col">
                <x-card.card variant="gradient" class="overflow-hidden p-0 flex flex-col h-full">
                    <div class="flex-shrink-0 p-4 border-b border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900/50">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-gradient-to-br from-dodger-blue-500 to-dodger-blue-600 dark:from-dodger-blue-600 dark:to-dodger-blue-700 flex items-center justify-center text-white font-semibold text-sm">
                                TP
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900 dark:text-gray-100">Team Project</h3>
                                <p class="text-xs text-gray-600 dark:text-gray-400">5 members</p>
                            </div>
                        </div>
                    </div>
                    <div class="flex-1 min-h-0">
                        <x-chat.container :messages="$messages" height="h-full">
                            <x-chat.input placeholder="Type a message..." />
                        </x-chat.container>
                    </div>
                </x-card.card>
            </div>
        </div>

        {{-- Features Section --}}
        <x-card.card variant="gradient" title="Chat Features">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <div class="p-4 bg-gray-50 dark:bg-gray-900/50 rounded-lg">
                    <div class="flex items-center gap-3 mb-2">
                        <h3 class="font-semibold text-gray-900 dark:text-gray-100">Team Messaging</h3>
                    </div>
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        Communicate with your team in real-time with group conversations
                    </p>
                </div>

                <div class="p-4 bg-gray-50 dark:bg-gray-900/50 rounded-lg">
                    <div class="flex items-center gap-3 mb-2">
                        <h3 class="font-semibold text-gray-900 dark:text-gray-100">Notifications</h3>
                    </div>
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        Get notified about new messages and unread conversations
                    </p>
                </div>

                <div class="p-4 bg-gray-50 dark:bg-gray-900/50 rounded-lg">
                    <div class="flex items-center gap-3 mb-2">
                        <h3 class="font-semibold text-gray-900 dark:text-gray-100">Mobile Ready</h3>
                    </div>
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        Fully responsive design that works seamlessly on all devices
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
    author="John Doe"
    content="Hello team!"
    timestamp="10:30 AM"
    :isAi="false"
/&gt;

&lt;!-- Typing Indicator --&gt;
&lt;x-chat.message
    author="Sarah"
    content=""
    :isAi="false"
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

