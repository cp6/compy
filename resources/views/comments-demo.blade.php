@php
    // Demo comments data - in a real app, this would come from a controller
    $comments = [
        [
            'id' => 1,
            'author' => 'Sarah Johnson',
            'avatar' => null,
            'content' => 'This is an amazing tutorial! I\'ve been looking for a way to implement nested comments in my Laravel app. The component structure is really clean and well-organized.',
            'timestamp' => '2 hours ago',
            'replies' => [
                [
                    'id' => 2,
                    'author' => 'Mike Chen',
                    'avatar' => null,
                    'content' => 'I totally agree! The nested structure makes it so easy to follow conversations.',
                    'timestamp' => '1 hour ago',
                    'replies' => [
                        [
                            'id' => 3,
                            'author' => 'Sarah Johnson',
                            'avatar' => null,
                            'content' => 'Thanks! I\'m glad you found it helpful.',
                            'timestamp' => '45 minutes ago',
                            'replies' => [],
                        ],
                    ],
                ],
                [
                    'id' => 4,
                    'author' => 'Alex Rivera',
                    'avatar' => null,
                    'content' => 'The dark mode support is also really well done. Great work!',
                    'timestamp' => '30 minutes ago',
                    'replies' => [],
                ],
            ],
        ],
        [
            'id' => 5,
            'author' => 'Emily Davis',
            'avatar' => null,
            'content' => 'How would you handle pagination for nested comments? I\'m working on a similar feature and would love to know your approach.',
            'timestamp' => '5 hours ago',
            'replies' => [
                [
                    'id' => 6,
                    'author' => 'David Kim',
                    'avatar' => null,
                    'content' => 'Great question! You could implement lazy loading for nested replies, showing only the first few levels initially.',
                    'timestamp' => '4 hours ago',
                    'replies' => [],
                ],
            ],
        ],
        [
            'id' => 7,
            'author' => 'Chris Taylor',
            'avatar' => null,
            'content' => 'The component architecture is spot on. Using Blade components makes it so reusable across different parts of the application.',
            'timestamp' => '1 day ago',
            'replies' => [],
        ],
    ];
@endphp

<x-app-layout>
    <x-slot name="title">Comments Demo</x-slot>
    <x-slot name="metaDescription">A comprehensive demo of nested comment components with reply functionality, perfect for videos, posts, and discussions.</x-slot>
    <x-slot name="metaKeywords">comments, nested comments, replies, discussion, demo, components</x-slot>

    <x-slot name="header">
        <x-breadcrumb :items="[
            ['label' => 'Home', 'url' => route('dashboard')],
            ['label' => 'Comments Demo', 'url' => '#'],
        ]" />
    </x-slot>

    <x-slot name="pageTitle">
        Comments Demo
    </x-slot>

    <x-slot name="pageSubtitle">
        Fully componentized nested comment system with reply functionality
    </x-slot>

    <x-alert.alerts />

    <div class="space-y-6">
        <!-- Video/Content Section -->
        <x-card.card variant="gradient" class="overflow-hidden">
            <div class="relative aspect-video bg-gradient-to-br from-gray-800 to-gray-900 dark:from-gray-900 dark:to-gray-950 rounded-xl overflow-hidden mb-4">
                <div class="absolute inset-0 flex items-center justify-center">
                    <div class="text-center">
                        <svg class="w-20 h-20 mx-auto text-white/50 mb-4" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z" />
                        </svg>
                        <h3 class="text-xl font-semibold text-white/80">Demo Video Content</h3>
                        <p class="text-sm text-white/60 mt-2">This is where your video or content would appear</p>
                    </div>
                </div>
            </div>
            <div>
                <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-2">
                    Amazing Tutorial: Building Nested Comments
                </h2>
                <p class="text-gray-600 dark:text-gray-400">
                    Learn how to build a fully componentized nested comment system with Laravel and Blade components. 
                    This demo showcases a modern comment interface with replies, likes, and more.
                </p>
                <div class="flex items-center gap-4 mt-4 text-sm text-gray-500 dark:text-gray-400">
                    <span class="flex items-center gap-1.5">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                        </svg>
                        1,234 views
                    </span>
                    <span class="flex items-center gap-1.5">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        2 days ago
                    </span>
                </div>
            </div>
        </x-card.card>

        <!-- Comments Section -->
        <x-card.card variant="gradient">
            <div class="mb-6">
                <h3 class="text-xl font-bold text-gray-900 dark:text-gray-100 mb-1">
                    Comments
                </h3>
                <p class="text-sm text-gray-600 dark:text-gray-400">
                    {{ count($comments) }} {{ count($comments) === 1 ? 'comment' : 'comments' }}
                </p>
            </div>

            <!-- Comment Form -->
            <div class="mb-8 pb-6 border-b border-gray-200 dark:border-gray-700">
                <x-comment.form />
            </div>

            <!-- Comments List -->
            <x-comment.list :comments="$comments" :show-close-all="true" />
        </x-card.card>
    </div>

    @push('scripts')
    <script>
        // Pass comments data to Alpine.js if needed
        document.addEventListener('DOMContentLoaded', function() {
            // Any additional JavaScript for comments functionality
        });
    </script>
    @endpush
</x-app-layout>

