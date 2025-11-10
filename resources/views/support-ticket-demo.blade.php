@php
    // Demo tickets data
    $tickets = [
        [
            'id' => 1001,
            'title' => 'Unable to access dashboard after login',
            'description' => 'I can log in successfully, but after logging in, I get redirected to a blank page. This started happening after the latest update. I\'ve tried clearing my browser cache and cookies, but the issue persists.',
            'status' => 'open',
            'priority' => 'high',
            'category' => 'Technical Support',
            'author' => 'John Doe',
            'createdAt' => '2 hours ago',
            'updatedAt' => '1 hour ago',
            'replies' => [
                [
                    'author' => 'Support Agent',
                    'content' => 'Thank you for reporting this issue. We\'re looking into it and will get back to you shortly.',
                    'timestamp' => '1 hour ago',
                ],
            ],
        ],
        [
            'id' => 1002,
            'title' => 'Payment processing error',
            'description' => 'When trying to process a payment, I receive an error message saying "Payment gateway timeout". This happens consistently for all payment methods.',
            'status' => 'pending',
            'priority' => 'urgent',
            'category' => 'Billing',
            'author' => 'Jane Smith',
            'createdAt' => '5 hours ago',
            'updatedAt' => '3 hours ago',
            'replies' => [
                [
                    'author' => 'Billing Team',
                    'content' => 'We\'ve identified the issue and are working with our payment provider to resolve it. Expected resolution time: 2-4 hours.',
                    'timestamp' => '3 hours ago',
                ],
            ],
        ],
        [
            'id' => 1003,
            'title' => 'Feature request: Dark mode toggle',
            'description' => 'It would be great to have a dark mode toggle in the user settings. Many users have requested this feature, and it would improve the user experience significantly.',
            'status' => 'resolved',
            'priority' => 'medium',
            'category' => 'Feature Request',
            'author' => 'Mike Johnson',
            'createdAt' => '2 days ago',
            'updatedAt' => '1 day ago',
            'replies' => [
                [
                    'author' => 'Product Team',
                    'content' => 'Great suggestion! We\'ve added this to our roadmap and it will be included in the next release.',
                    'timestamp' => '1 day ago',
                ],
                [
                    'author' => 'Product Team',
                    'content' => 'Update: Dark mode has been implemented and will be available in version 2.1.0, scheduled for release next week.',
                    'timestamp' => '12 hours ago',
                ],
            ],
        ],
        [
            'id' => 1004,
            'title' => 'Bug: Form validation not working',
            'description' => 'The contact form on the landing page doesn\'t validate email addresses correctly. It accepts invalid email formats like "test@" or "test@test".',
            'status' => 'open',
            'priority' => 'medium',
            'category' => 'Bug Report',
            'author' => 'Sarah Williams',
            'createdAt' => '1 day ago',
            'updatedAt' => '1 day ago',
        ],
        [
            'id' => 1005,
            'title' => 'Account deletion request',
            'description' => 'I would like to delete my account and all associated data. Please confirm the deletion process.',
            'status' => 'closed',
            'priority' => 'low',
            'category' => 'Other',
            'author' => 'Robert Brown',
            'createdAt' => '3 days ago',
            'updatedAt' => '2 days ago',
            'replies' => [
                [
                    'author' => 'Support Agent',
                    'content' => 'Your account has been successfully deleted. All associated data has been removed from our systems.',
                    'timestamp' => '2 days ago',
                ],
            ],
        ],
        [
            'id' => 1006,
            'title' => 'API rate limit too restrictive',
            'description' => 'The current API rate limit of 100 requests per hour is too low for our use case. We need at least 1000 requests per hour to function properly.',
            'status' => 'pending',
            'priority' => 'high',
            'category' => 'Feature Request',
            'author' => 'Emily Davis',
            'createdAt' => '4 hours ago',
            'updatedAt' => '4 hours ago',
        ],
    ];
    
    // Filter tickets by status for demo
    $openTickets = array_filter($tickets, fn($t) => $t['status'] === 'open');
    $pendingTickets = array_filter($tickets, fn($t) => $t['status'] === 'pending');
    $resolvedTickets = array_filter($tickets, fn($t) => $t['status'] === 'resolved');
    $closedTickets = array_filter($tickets, fn($t) => $t['status'] === 'closed');
    
    // Selected ticket for detail view (demo - first ticket)
    $selectedTicket = $tickets[0] ?? null;
@endphp

<x-app-layout>
    <x-slot name="title">Support Ticket Demo</x-slot>
    <x-slot name="metaDescription">Interactive support ticket system demo showcasing ticket management components with status tracking, priorities, and replies.</x-slot>
    <x-slot name="metaKeywords">support ticket, help desk, customer support, ticket system, demo</x-slot>

    <x-slot name="header">
        <x-breadcrumb :items="[
            ['label' => 'Home', 'url' => route('dashboard')],
            ['label' => 'Support Ticket Demo', 'url' => '#'],
        ]" />
    </x-slot>

    <x-slot name="pageTitle">
        Support Ticket Demo
    </x-slot>

    <x-slot name="pageSubtitle">
        Interactive ticket management system with status tracking and replies
    </x-slot>

    <x-alert.alerts />

    <div class="space-y-6">
        {{-- Statistics Cards --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
            <x-card.card variant="gradient" class="border-l-4 border-l-dodger-blue-500">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Open Tickets</p>
                        <p class="text-2xl font-bold text-gray-900 dark:text-gray-100 mt-1">{{ count($openTickets) }}</p>
                    </div>
                    <div class="w-12 h-12 rounded-lg bg-dodger-blue-100 dark:bg-dodger-blue-900/30 flex items-center justify-center">
                        <svg class="w-6 h-6 text-dodger-blue-600 dark:text-dodger-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                </div>
            </x-card.card>

            <x-card.card variant="gradient" class="border-l-4 border-l-yellow-500">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Pending</p>
                        <p class="text-2xl font-bold text-gray-900 dark:text-gray-100 mt-1">{{ count($pendingTickets) }}</p>
                    </div>
                    <div class="w-12 h-12 rounded-lg bg-yellow-100 dark:bg-yellow-900/30 flex items-center justify-center">
                        <svg class="w-6 h-6 text-yellow-600 dark:text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
            </x-card.card>

            <x-card.card variant="gradient" class="border-l-4 border-l-green-500">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Resolved</p>
                        <p class="text-2xl font-bold text-gray-900 dark:text-gray-100 mt-1">{{ count($resolvedTickets) }}</p>
                    </div>
                    <div class="w-12 h-12 rounded-lg bg-green-100 dark:bg-green-900/30 flex items-center justify-center">
                        <svg class="w-6 h-6 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
            </x-card.card>

            <x-card.card variant="gradient" class="border-l-4 border-l-gray-500">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Closed</p>
                        <p class="text-2xl font-bold text-gray-900 dark:text-gray-100 mt-1">{{ count($closedTickets) }}</p>
                    </div>
                    <div class="w-12 h-12 rounded-lg bg-gray-100 dark:bg-gray-700 flex items-center justify-center">
                        <svg class="w-6 h-6 text-gray-600 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </div>
                </div>
            </x-card.card>
        </div>

        {{-- Ticket List --}}
        <x-card.card variant="gradient" title="All Tickets">
            <x-slot name="header">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-lg sm:text-xl font-bold text-gray-900 dark:text-gray-100 tracking-tight">
                            All Tickets
                        </h3>
                        <p class="mt-1.5 text-xs sm:text-sm text-gray-600 dark:text-gray-400 leading-relaxed">
                            Manage and track all support tickets
                        </p>
                    </div>
                    <x-button.primary>
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        New Ticket
                    </x-button.primary>
                </div>
            </x-slot>

            <x-ticket.list :tickets="$tickets" />
        </x-card.card>

        {{-- Ticket Detail View --}}
        @if($selectedTicket)
            <x-card.card variant="gradient" title="Ticket Details">
                <x-ticket.detail
                    :id="$selectedTicket['id']"
                    :title="$selectedTicket['title']"
                    :description="$selectedTicket['description']"
                    :status="$selectedTicket['status']"
                    :priority="$selectedTicket['priority']"
                    :category="$selectedTicket['category']"
                    :author="$selectedTicket['author']"
                    :createdAt="$selectedTicket['createdAt']"
                    :updatedAt="$selectedTicket['updatedAt']"
                    :replies="$selectedTicket['replies'] ?? []"
                />
            </x-card.card>
        @endif

        {{-- Create Ticket Form --}}
        <x-card.card variant="gradient" title="Create New Ticket">
            <x-ticket.form action="#" method="POST" />
        </x-card.card>

        {{-- Component Usage --}}
        <x-card.card variant="gradient" title="Component Usage">
            <div class="bg-gray-50 dark:bg-gray-900/50 rounded-lg p-4 overflow-x-auto">
                <pre class="text-sm text-gray-800 dark:text-gray-200"><code>&lt;!-- Ticket List --&gt;
&lt;x-ticket.list :tickets="$tickets" /&gt;

&lt;!-- Individual Ticket Item --&gt;
&lt;x-ticket.item
    id="1001"
    title="Ticket Title"
    description="Ticket description..."
    status="open"
    priority="high"
    category="Technical Support"
    author="John Doe"
    createdAt="2 hours ago"
    href="#"
/&gt;

&lt;!-- Ticket Detail View --&gt;
&lt;x-ticket.detail
    :id="$ticket['id']"
    :title="$ticket['title']"
    :description="$ticket['description']"
    :status="$ticket['status']"
    :priority="$ticket['priority']"
    :category="$ticket['category']"
    :author="$ticket['author']"
    :createdAt="$ticket['createdAt']"
    :replies="$ticket['replies']"
/&gt;

&lt;!-- Status Badge --&gt;
&lt;x-ticket.status-badge status="open" /&gt;
&lt;x-ticket.status-badge status="pending" /&gt;
&lt;x-ticket.status-badge status="resolved" /&gt;
&lt;x-ticket.status-badge status="closed" /&gt;
&lt;x-ticket.status-badge status="urgent" /&gt;

&lt;!-- Priority Badge --&gt;
&lt;x-ticket.priority-badge priority="low" /&gt;
&lt;x-ticket.priority-badge priority="medium" /&gt;
&lt;x-ticket.priority-badge priority="high" /&gt;
&lt;x-ticket.priority-badge priority="urgent" /&gt;

&lt;!-- Create Ticket Form --&gt;
&lt;x-ticket.form action="#" method="POST" /&gt;</code></pre>
            </div>
        </x-card.card>
    </div>
</x-app-layout>

