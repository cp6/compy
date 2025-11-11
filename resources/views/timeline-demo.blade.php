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

    <div class="space-y-10">
        <!-- Project Milestones -->
        <section>
            <div class="mb-6">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-2">Project Milestones</h2>
                <p class="text-sm text-gray-600 dark:text-gray-400">Track key project phases and deliverables</p>
            </div>
            <x-card.card>
                <x-timeline.timeline>
                    <x-timeline.timeline-item
                        title="Q4 Release Deployed"
                        description="Version 2.4.0 successfully deployed to production. Includes new dashboard analytics, improved API performance, and security enhancements."
                        timestamp="Dec 15, 2024"
                        color="green"
                        status="success"
                    />
                    <x-timeline.timeline-item
                        title="Security Audit Completed"
                        description="Third-party security assessment passed with zero critical vulnerabilities. All recommendations have been implemented."
                        timestamp="Dec 8, 2024"
                        color="green"
                        status="success"
                    />
                    <x-timeline.timeline-item
                        title="Beta Testing Phase"
                        description="Beta release distributed to 500+ users. Collecting feedback and monitoring performance metrics."
                        timestamp="Nov 28, 2024"
                        color="dodger-blue"
                    />
                    <x-timeline.timeline-item
                        title="Development Sprint Completed"
                        description="Sprint 12 completed ahead of schedule. All planned features implemented and unit tests passing."
                        timestamp="Nov 15, 2024"
                        color="purple"
                    />
                </x-timeline.timeline>
            </x-card.card>
        </section>

        <!-- Transaction History -->
        <section>
            <div class="mb-6">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-2">Transaction History</h2>
                <p class="text-sm text-gray-600 dark:text-gray-400">Recent account activity and payment processing</p>
            </div>
            <x-card.card>
                <x-timeline.timeline>
                    <x-timeline.timeline-item
                        title="Subscription Renewed"
                        description="Annual Pro plan subscription renewed automatically. Payment of $1,199.00 processed via credit card ending in 4242."
                        timestamp="2 hours ago"
                        color="green"
                        status="success"
                        icon='<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>'
                    />
                    <x-timeline.timeline-item
                        title="Invoice #INV-2024-0847 Generated"
                        description="Monthly invoice generated for December 2024. Includes usage-based charges and platform fees."
                        timestamp="Yesterday"
                        color="dodger-blue"
                        icon='<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>'
                    />
                    <x-timeline.timeline-item
                        title="Payment Method Updated"
                        description="Credit card information updated. New card ending in 4242 is now the default payment method."
                        timestamp="3 days ago"
                        color="purple"
                        icon='<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>'
                    />
                    <x-timeline.timeline-item
                        title="Refund Processed"
                        description="Refund of $299.00 issued for canceled subscription. Funds will appear in 5-7 business days."
                        timestamp="1 week ago"
                        color="gray"
                        icon='<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" /></svg>'
                    />
                </x-timeline.timeline>
            </x-card.card>
        </section>

        <!-- Activity Feed -->
        <section>
            <div class="mb-6">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-2">Activity Feed</h2>
                <p class="text-sm text-gray-600 dark:text-gray-400">Team collaboration and system events</p>
            </div>
            <x-card.card>
                <x-timeline.timeline variant="detailed">
                    <x-timeline.timeline-item
                        title="Code Review Completed"
                        timestamp="45 minutes ago"
                        color="green"
                        status="success"
                    >
                        <div class="mt-3 p-4 bg-gray-50 dark:bg-gray-900/50 rounded-lg border border-gray-200 dark:border-gray-800">
                            <div class="flex items-start justify-between mb-2">
                                <div>
                                    <p class="text-sm text-gray-900 dark:text-gray-100 font-medium">
                                        Sarah Chen approved pull request #847
                                    </p>
                                    <p class="text-xs text-gray-500 dark:text-gray-500 mt-1">
                                        Feature: User notification preferences
                                    </p>
                                </div>
                            </div>
                            <div class="flex gap-2 mt-3">
                                <span class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-medium bg-green-100 dark:bg-green-900/30 text-green-800 dark:text-green-300">
                                    Approved
                                </span>
                                <span class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-medium bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-300">
                                    12 files changed
                                </span>
                            </div>
                        </div>
                    </x-timeline.timeline-item>

                    <x-timeline.timeline-item
                        title="Database Migration Executed"
                        timestamp="2 hours ago"
                        color="dodger-blue"
                    >
                        <div class="mt-3 p-4 bg-gray-50 dark:bg-gray-900/50 rounded-lg border border-gray-200 dark:border-gray-800">
                            <p class="text-sm text-gray-900 dark:text-gray-100 font-medium mb-2">
                                Migration: add_user_preferences_table
                            </p>
                            <p class="text-xs text-gray-600 dark:text-gray-400">
                                Executed by system automatically. Added new table for storing user notification preferences with indexes on user_id and preference_key.
                            </p>
                        </div>
                    </x-timeline.timeline-item>

                    <x-timeline.timeline-item
                        title="Deployment Started"
                        timestamp="4 hours ago"
                        color="purple"
                    >
                        <div class="mt-3 p-4 bg-gray-50 dark:bg-gray-900/50 rounded-lg border border-gray-200 dark:border-gray-800">
                            <p class="text-sm text-gray-900 dark:text-gray-100 font-medium mb-2">
                                Staging environment deployment initiated
                            </p>
                            <p class="text-xs text-gray-600 dark:text-gray-400 mb-3">
                                Build #2847 deploying to staging. Includes bug fixes and performance improvements.
                            </p>
                            <div class="flex items-center gap-2 text-xs text-gray-500 dark:text-gray-500">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                </svg>
                                <span>Deployment completed successfully</span>
                            </div>
                        </div>
                    </x-timeline.timeline-item>

                    <x-timeline.timeline-item
                        title="Security Alert"
                        timestamp="Yesterday"
                        color="red"
                        status="error"
                    >
                        <div class="mt-3 p-4 bg-red-50 dark:bg-red-950/40 rounded-lg border border-red-200 dark:border-red-800/50">
                            <p class="text-sm text-gray-900 dark:text-red-100 font-medium mb-2">
                                Multiple failed login attempts detected
                            </p>
                            <p class="text-xs text-gray-600 dark:text-red-200/80 mb-3">
                                IP address 192.168.1.45 attempted to access account with invalid credentials 5 times within 10 minutes.
                            </p>
                            <div class="flex items-center gap-2">
                                <span class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-medium bg-red-100 dark:bg-red-900/50 text-red-800 dark:text-red-200 border border-red-300 dark:border-red-800/50">
                                    High Priority
                                </span>
                                <span class="text-xs text-gray-500 dark:text-red-300/70">
                                    Account temporarily locked for security
                                </span>
                            </div>
                        </div>
                    </x-timeline.timeline-item>
                </x-timeline.timeline>
            </x-card.card>
        </section>
    </div>
</x-app-layout>

