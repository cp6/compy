@php
    // Demo emails data
    $emails = [
        [
            'id' => 1,
            'from' => 'Sarah Johnson',
            'subject' => 'Project Update - Q4 Planning',
            'preview' => 'Hi team, I wanted to share an update on our Q4 planning. We\'ve made significant progress...',
            'timestamp' => '2 hours ago',
            'unread' => true,
            'important' => true,
            'attachments' => true,
        ],
        [
            'id' => 2,
            'from' => 'Mike Chen',
            'subject' => 'Re: Design Review Meeting',
            'preview' => 'Thanks for the feedback! I\'ve updated the designs based on your suggestions...',
            'timestamp' => '5 hours ago',
            'unread' => true,
            'important' => false,
            'attachments' => false,
        ],
        [
            'id' => 3,
            'from' => 'Emily Davis',
            'subject' => 'Weekly Newsletter - October 2024',
            'preview' => 'Check out this week\'s newsletter with the latest updates and announcements...',
            'timestamp' => 'Yesterday',
            'unread' => false,
            'important' => false,
            'attachments' => false,
        ],
        [
            'id' => 4,
            'from' => 'Support Team',
            'subject' => 'Your ticket has been resolved',
            'preview' => 'We\'ve successfully resolved your support ticket. Please let us know if you need any further assistance...',
            'timestamp' => '2 days ago',
            'unread' => false,
            'important' => false,
            'attachments' => false,
        ],
        [
            'id' => 5,
            'from' => 'Marketing Team',
            'subject' => 'New Product Launch - Save the Date',
            'preview' => 'We\'re excited to announce our new product launch event. Mark your calendars for November 15th...',
            'timestamp' => '3 days ago',
            'unread' => false,
            'important' => true,
            'attachments' => true,
        ],
        [
            'id' => 6,
            'from' => 'John Smith',
            'subject' => 'Re: Budget Approval',
            'preview' => 'The budget has been approved. You can proceed with the project as planned...',
            'timestamp' => '1 week ago',
            'unread' => false,
            'important' => false,
            'attachments' => false,
        ],
    ];
    
    // Selected email for detail view
    $selectedEmail = [
        'id' => 1,
        'from' => 'Sarah Johnson',
        'to' => 'team@example.com',
        'subject' => 'Project Update - Q4 Planning',
        'content' => 'Hi team,

I wanted to share an update on our Q4 planning. We\'ve made significant progress on several key initiatives:

1. Product Development: The new features are on track for release next month
2. Marketing Campaign: The Q4 campaign materials are ready for review
3. Team Expansion: We\'ve successfully onboarded 3 new team members

Please review the attached document and let me know if you have any questions or feedback.

Best regards,
Sarah',
        'timestamp' => 'October 15, 2024 at 2:30 PM',
        'important' => true,
        'attachments' => [
            ['name' => 'Q4_Planning_Document.pdf', 'size' => '2.4 MB'],
            ['name' => 'Budget_Proposal.xlsx', 'size' => '856 KB'],
        ],
    ];
    
    // Filter emails
    $unreadEmails = array_filter($emails, fn($e) => $e['unread']);
    $importantEmails = array_filter($emails, fn($e) => $e['important']);
@endphp

<x-app-layout>
    <x-slot name="title">Email Demo</x-slot>
    <x-slot name="metaDescription">Email interface demo showcasing inbox management, email viewing, and composition components.</x-slot>
    <x-slot name="metaKeywords">email, inbox, mail, messaging, demo, components</x-slot>

    <x-slot name="header">
        <x-breadcrumb :items="[
            ['label' => 'Home', 'url' => route('dashboard')],
            ['label' => 'Email Demo', 'url' => '#'],
        ]" />
    </x-slot>

    <x-slot name="pageTitle">
        Email Demo
    </x-slot>

    <x-slot name="pageSubtitle">
        Email inbox interface with reading and composition capabilities
    </x-slot>

    <x-alert.alerts />

    <div class="space-y-6">
        {{-- Statistics Cards --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 sm:gap-6">
            <div class="bg-gradient-to-br from-dodger-blue-50 to-dodger-blue-100/50 dark:from-dodger-blue-900/20 dark:to-dodger-blue-800/10 border border-dodger-blue-200/50 dark:border-dodger-blue-800/30 rounded-xl p-6 shadow-sm">
                <div class="space-y-2">
                    <p class="text-xs uppercase tracking-wider font-semibold text-dodger-blue-700 dark:text-dodger-blue-300">Unread Messages</p>
                    <div class="flex items-baseline gap-2">
                        <span class="text-4xl font-bold text-dodger-blue-900 dark:text-dodger-blue-100">{{ count($unreadEmails) }}</span>
                        <span class="text-sm text-dodger-blue-600 dark:text-dodger-blue-400">emails</span>
                    </div>
                    <p class="text-xs text-dodger-blue-600/70 dark:text-dodger-blue-400/70 mt-3">Requires your attention</p>
                </div>
            </div>

            <div class="bg-gradient-to-br from-red-50 to-red-100/50 dark:from-red-900/20 dark:to-red-800/10 border border-red-200/50 dark:border-red-800/30 rounded-xl p-6 shadow-sm">
                <div class="space-y-2">
                    <p class="text-xs uppercase tracking-wider font-semibold text-red-700 dark:text-red-300">Important</p>
                    <div class="flex items-baseline gap-2">
                        <span class="text-4xl font-bold text-red-900 dark:text-red-100">{{ count($importantEmails) }}</span>
                        <span class="text-sm text-red-600 dark:text-red-400">flagged</span>
                    </div>
                    <p class="text-xs text-red-600/70 dark:text-red-400/70 mt-3">Marked as priority</p>
                </div>
            </div>

            <div class="bg-gradient-to-br from-gray-50 to-gray-100/50 dark:from-gray-800/50 dark:to-gray-900/30 border border-gray-200/50 dark:border-gray-700/30 rounded-xl p-6 shadow-sm">
                <div class="space-y-2">
                    <p class="text-xs uppercase tracking-wider font-semibold text-gray-700 dark:text-gray-300">Total Inbox</p>
                    <div class="flex items-baseline gap-2">
                        <span class="text-4xl font-bold text-gray-900 dark:text-gray-100">{{ count($emails) }}</span>
                        <span class="text-sm text-gray-600 dark:text-gray-400">messages</span>
                    </div>
                    <p class="text-xs text-gray-600/70 dark:text-gray-400/70 mt-3">All conversations</p>
                </div>
            </div>
        </div>

        {{-- Email List --}}
        <x-card.card variant="gradient" title="Inbox">
            <x-slot name="header">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-lg sm:text-xl font-bold text-gray-900 dark:text-gray-100 tracking-tight">
                            Inbox
                        </h3>
                        <p class="mt-1.5 text-xs sm:text-sm text-gray-600 dark:text-gray-400 leading-relaxed">
                            Manage your emails
                        </p>
                    </div>
                    <x-button.primary>
                        Compose
                    </x-button.primary>
                </div>
            </x-slot>

            <x-email.list :emails="$emails" />
        </x-card.card>

        {{-- Email Detail View --}}
        <x-card.card variant="gradient" title="Email Details">
            <x-email.detail
                :id="$selectedEmail['id']"
                :from="$selectedEmail['from']"
                :to="$selectedEmail['to']"
                :subject="$selectedEmail['subject']"
                :content="$selectedEmail['content']"
                :timestamp="$selectedEmail['timestamp']"
                :important="$selectedEmail['important']"
                :attachments="$selectedEmail['attachments']"
            />
        </x-card.card>

        {{-- Compose Email Form --}}
        <x-card.card variant="gradient" title="Compose Email">
            <x-email.compose action="#" method="POST" />
        </x-card.card>

        {{-- Component Usage --}}
        <x-card.card variant="gradient" title="Component Usage">
            <div class="bg-gray-50 dark:bg-gray-900/50 rounded-lg p-4 overflow-x-auto">
                <pre class="text-sm text-gray-800 dark:text-gray-200"><code>&lt;!-- Email List --&gt;
&lt;x-email.list :emails="$emails" /&gt;

&lt;!-- Individual Email Item --&gt;
&lt;x-email.item
    id="1"
    from="John Doe"
    subject="Email Subject"
    preview="Email preview text..."
    timestamp="2 hours ago"
    :unread="true"
    :important="false"
    :attachments="true"
    href="#"
/&gt;

&lt;!-- Email Detail View --&gt;
&lt;x-email.detail
    :id="$email['id']"
    :from="$email['from']"
    :to="$email['to']"
    :subject="$email['subject']"
    :content="$email['content']"
    :timestamp="$email['timestamp']"
    :important="$email['important']"
    :attachments="$email['attachments']"
/&gt;

&lt;!-- Compose Email Form --&gt;
&lt;x-email.compose action="#" method="POST" /&gt;</code></pre>
            </div>
        </x-card.card>
    </div>
</x-app-layout>

