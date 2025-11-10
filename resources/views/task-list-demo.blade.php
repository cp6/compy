@php
    // Demo tasks data
    $tasks = [
        [
            'id' => 1001,
            'title' => 'Implement user authentication system',
            'description' => 'Create a secure authentication system with login, registration, password reset, and email verification features. Include two-factor authentication support.',
            'status' => 'in_progress',
            'priority' => 'high',
            'category' => 'Development',
            'assignee' => 'John Doe',
            'dueDate' => '2024-12-20',
            'tags' => ['backend', 'security', 'feature'],
            'progress' => 65,
        ],
        [
            'id' => 1002,
            'title' => 'Design new landing page',
            'description' => 'Create a modern, responsive landing page design with hero section, features, testimonials, and call-to-action sections.',
            'status' => 'review',
            'priority' => 'medium',
            'category' => 'Design',
            'assignee' => 'Jane Smith',
            'dueDate' => '2024-12-18',
            'tags' => ['design', 'frontend', 'ui/ux'],
            'progress' => 90,
        ],
        [
            'id' => 1003,
            'title' => 'Fix payment gateway integration',
            'description' => 'Resolve issues with payment processing. The gateway is timing out for some transactions. Need to implement retry logic and better error handling.',
            'status' => 'todo',
            'priority' => 'urgent',
            'category' => 'Bug Fix',
            'assignee' => 'Bob Johnson',
            'dueDate' => '2024-12-15',
            'tags' => ['bug', 'backend', 'payment'],
            'progress' => 0,
        ],
        [
            'id' => 1004,
            'title' => 'Write API documentation',
            'description' => 'Create comprehensive API documentation with examples, authentication guides, and endpoint descriptions. Include code samples for popular languages.',
            'status' => 'todo',
            'priority' => 'medium',
            'category' => 'Documentation',
            'assignee' => 'Alice Williams',
            'dueDate' => '2024-12-22',
            'tags' => ['documentation', 'api'],
            'progress' => 0,
        ],
        [
            'id' => 1005,
            'title' => 'Optimize database queries',
            'description' => 'Review and optimize slow database queries. Add proper indexes and refactor complex queries to improve performance.',
            'status' => 'in_progress',
            'priority' => 'high',
            'category' => 'Performance',
            'assignee' => 'Charlie Brown',
            'dueDate' => '2024-12-19',
            'tags' => ['backend', 'database', 'optimization'],
            'progress' => 40,
        ],
        [
            'id' => 1006,
            'title' => 'Set up CI/CD pipeline',
            'description' => 'Configure continuous integration and deployment pipeline using GitHub Actions. Include automated testing and deployment to staging and production.',
            'status' => 'done',
            'priority' => 'medium',
            'category' => 'DevOps',
            'assignee' => 'David Lee',
            'dueDate' => '2024-12-10',
            'tags' => ['devops', 'ci/cd', 'automation'],
            'progress' => 100,
        ],
        [
            'id' => 1007,
            'title' => 'Add dark mode support',
            'description' => 'Implement dark mode theme across all pages and components. Ensure proper contrast and accessibility standards.',
            'status' => 'done',
            'priority' => 'low',
            'category' => 'Feature',
            'assignee' => 'Emma Wilson',
            'dueDate' => '2024-12-12',
            'tags' => ['frontend', 'ui/ux', 'feature'],
            'progress' => 100,
        ],
        [
            'id' => 1008,
            'title' => 'Create mobile app wireframes',
            'description' => 'Design wireframes for the mobile application. Include main screens, navigation flow, and user interactions.',
            'status' => 'todo',
            'priority' => 'low',
            'category' => 'Design',
            'assignee' => 'Frank Miller',
            'dueDate' => '2024-12-25',
            'tags' => ['design', 'mobile', 'wireframes'],
            'progress' => 0,
        ],
        [
            'id' => 1009,
            'title' => 'Implement search functionality',
            'description' => 'Add advanced search functionality with filters, sorting, and pagination. Support full-text search across multiple content types.',
            'status' => 'in_progress',
            'priority' => 'high',
            'category' => 'Feature',
            'assignee' => 'Grace Taylor',
            'dueDate' => '2024-12-21',
            'tags' => ['feature', 'search', 'backend'],
            'progress' => 55,
        ],
        [
            'id' => 1010,
            'title' => 'Update user onboarding flow',
            'description' => 'Redesign the user onboarding experience to improve conversion rates. Add interactive tutorials and progress indicators.',
            'status' => 'review',
            'priority' => 'medium',
            'category' => 'UX',
            'assignee' => 'Henry Davis',
            'dueDate' => '2024-12-17',
            'tags' => ['ux', 'onboarding', 'frontend'],
            'progress' => 85,
        ],
    ];
@endphp

<x-app-layout>
    <x-slot name="header">
        <x-breadcrumb :items="[
            ['label' => 'Home', 'url' => route('dashboard')],
            ['label' => 'Task', 'url' => '#'],
            ['label' => 'Task List'],
        ]" />
    </x-slot>

    <x-slot name="pageTitle">
        Task List
    </x-slot>

    <x-slot name="pageSubtitle">
        Manage and track all your tasks in one place
    </x-slot>

    <x-alert.alerts />
    
    <div class="space-y-6">
        {{-- Filters and Actions --}}
        <x-card.card variant="gradient">
            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                <div class="flex flex-wrap items-center gap-3">
                    <button class="px-4 py-2 text-sm font-medium rounded-lg bg-dodger-blue-600 text-white hover:bg-dodger-blue-700 transition-colors">
                        All Tasks
                    </button>
                    <button class="px-4 py-2 text-sm font-medium rounded-lg bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300 border border-gray-300 dark:border-gray-600 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                        To Do
                    </button>
                    <button class="px-4 py-2 text-sm font-medium rounded-lg bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300 border border-gray-300 dark:border-gray-600 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                        In Progress
                    </button>
                    <button class="px-4 py-2 text-sm font-medium rounded-lg bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300 border border-gray-300 dark:border-gray-600 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                        In Review
                    </button>
                    <button class="px-4 py-2 text-sm font-medium rounded-lg bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300 border border-gray-300 dark:border-gray-600 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                        Done
                    </button>
                </div>
                <a href="{{ route('task.create') }}" class="inline-flex items-center gap-2 px-4 py-2 text-sm font-medium rounded-lg bg-gradient-to-r from-dodger-blue-600 to-dodger-blue-700 text-white hover:from-dodger-blue-700 hover:to-dodger-blue-800 transition-all shadow-lg shadow-dodger-blue-500/25 dark:shadow-dodger-blue-900/50">
                    Create Task
                </a>
            </div>
        </x-card>

        {{-- Stats Cards --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            <x-card.card variant="gradient" hover>
                <div>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Total Tasks</p>
                    <p class="text-2xl font-bold text-gray-900 dark:text-gray-100 mt-1">{{ count($tasks) }}</p>
                </div>
            </x-card>

            <x-card.card variant="gradient" hover>
                <div>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400">In Progress</p>
                    <p class="text-2xl font-bold text-gray-900 dark:text-gray-100 mt-1">{{ count(array_filter($tasks, fn($t) => $t['status'] === 'in_progress')) }}</p>
                </div>
            </x-card>

            <x-card.card variant="gradient" hover>
                <div>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400">In Review</p>
                    <p class="text-2xl font-bold text-gray-900 dark:text-gray-100 mt-1">{{ count(array_filter($tasks, fn($t) => $t['status'] === 'review')) }}</p>
                </div>
            </x-card>

            <x-card.card variant="gradient" hover>
                <div>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Completed</p>
                    <p class="text-2xl font-bold text-gray-900 dark:text-gray-100 mt-1">{{ count(array_filter($tasks, fn($t) => $t['status'] === 'done')) }}</p>
                </div>
            </x-card>
        </div>

        {{-- Task List --}}
        <x-card.card variant="gradient" title="All Tasks">
            <x-task.list :tasks="$tasks" />
        </x-card>
    </div>
</x-app-layout>

