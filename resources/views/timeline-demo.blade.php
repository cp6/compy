<x-app-layout>
    <x-slot name="title">Timeline Demo</x-slot>
    <x-slot name="metaDescription">A comprehensive demo of timeline components for displaying chronological events and activities.</x-slot>
    <x-slot name="metaKeywords">timeline, activity, history, events, components, demo</x-slot>

    <x-slot name="header">
        <x-breadcrumb :items="[
            ['label' => 'Home', 'url' => route('dashboard')],
            ['label' => 'Timeline Demo', 'url' => '#'],
        ]" />
    </x-slot>

    <x-slot name="pageTitle">
        Timeline Demo
    </x-slot>

    <x-slot name="pageSubtitle">
        Chronological event timelines with various styles
    </x-slot>

    <x-alert.alerts />

    <div class="space-y-8">
        <!-- Default Timeline -->
        <section>
            <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-4">Default Timeline</h2>
            <x-card.card variant="gradient">
                <x-timeline.timeline>
                    <x-timeline.timeline-item
                        title="Project Created"
                        description="New project 'Website Redesign' was created and assigned to the team."
                        timestamp="2 hours ago"
                        color="dodger-blue"
                    />
                    <x-timeline.timeline-item
                        title="Design Approved"
                        description="The initial design mockups have been approved by the client."
                        timestamp="1 day ago"
                        color="green"
                        status="success"
                    />
                    <x-timeline.timeline-item
                        title="Kickoff Meeting"
                        description="Project kickoff meeting scheduled and completed successfully."
                        timestamp="3 days ago"
                        color="purple"
                    />
                    <x-timeline.timeline-item
                        title="Requirements Gathered"
                        description="All project requirements have been collected and documented."
                        timestamp="1 week ago"
                        color="gray"
                    />
                </x-timeline.timeline>
            </x-card.card>
        </section>

        <!-- Timeline with Icons -->
        <section>
            <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-4">Timeline with Custom Icons</h2>
            <x-card.card variant="gradient">
                <x-timeline.timeline>
                    <x-timeline.timeline-item
                        title="User Registered"
                        description="New user account created successfully."
                        timestamp="5 minutes ago"
                        color="green"
                        :icon='\'<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>\''
                    />
                    <x-timeline.timeline-item
                        title="Payment Received"
                        description="Payment of $299.00 has been processed successfully."
                        timestamp="2 hours ago"
                        color="green"
                        status="success"
                        :icon='\'<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>\''
                    />
                    <x-timeline.timeline-item
                        title="Order Shipped"
                        description="Order #12345 has been shipped and is on its way."
                        timestamp="1 day ago"
                        color="dodger-blue"
                        :icon='\'<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" /></svg>\''
                    />
                    <x-timeline.timeline-item
                        title="Order Placed"
                        description="New order has been placed and is being processed."
                        timestamp="2 days ago"
                        color="purple"
                        :icon='\'<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" /></svg>\''
                    />
                </x-timeline.timeline>
            </x-card.card>
        </section>

        <!-- Activity Timeline -->
        <section>
            <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-4">Activity Timeline</h2>
            <x-card.card variant="gradient">
                <x-timeline.timeline variant="detailed">
                    <x-timeline.timeline-item
                        title="Document Updated"
                        timestamp="Just now"
                        color="dodger-blue"
                        status="success"
                    >
                        <div class="mt-2 p-3 bg-gray-50 dark:bg-gray-900/50 rounded-lg">
                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                <strong class="text-gray-900 dark:text-gray-100">John Doe</strong> updated the project documentation.
                            </p>
                            <p class="text-xs text-gray-500 dark:text-gray-500 mt-1">
                                Updated sections: Getting Started, API Reference
                            </p>
                        </div>
                    </x-timeline.timeline-item>

                    <x-timeline.timeline-item
                        title="Comment Added"
                        timestamp="30 minutes ago"
                        color="purple"
                    >
                        <div class="mt-2 p-3 bg-gray-50 dark:bg-gray-900/50 rounded-lg">
                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                <strong class="text-gray-900 dark:text-gray-100">Jane Smith</strong> commented on the design proposal.
                            </p>
                            <blockquote class="mt-2 text-sm italic text-gray-600 dark:text-gray-400 border-l-4 border-dodger-blue-500 pl-3">
                                "This looks great! Can we add more spacing between elements?"
                            </blockquote>
                        </div>
                    </x-timeline.timeline-item>

                    <x-timeline.timeline-item
                        title="Task Completed"
                        timestamp="2 hours ago"
                        color="green"
                        status="success"
                    >
                        <div class="mt-2 p-3 bg-gray-50 dark:bg-gray-900/50 rounded-lg">
                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                Task <strong class="text-gray-900 dark:text-gray-100">"Implement user authentication"</strong> has been marked as completed.
                            </p>
                        </div>
                    </x-timeline.timeline-item>

                    <x-timeline.timeline-item
                        title="Issue Reported"
                        timestamp="1 day ago"
                        color="red"
                        status="error"
                    >
                        <div class="mt-2 p-3 bg-gray-50 dark:bg-gray-900/50 rounded-lg">
                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                <strong class="text-gray-900 dark:text-gray-100">Bug Report #42</strong> - Login page not loading on mobile devices.
                            </p>
                            <span class="inline-block mt-2 px-2 py-1 text-xs font-medium rounded bg-red-100 dark:bg-red-900/30 text-red-800 dark:text-red-300">
                                High Priority
                            </span>
                        </div>
                    </x-timeline.timeline-item>
                </x-timeline.timeline>
            </x-card.card>
        </section>
    </div>
</x-app-layout>

