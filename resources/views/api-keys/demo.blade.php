<x-app-layout>
    <x-slot name="header">
        <x-breadcrumb :items="[
            ['label' => 'Home', 'url' => route('dashboard')],
            ['label' => 'API Keys', 'url' => '#'],
            ['label' => 'Demo'],
        ]" />
    </x-slot>

    <x-slot name="pageTitle">
        API Keys Management
    </x-slot>

    <x-slot name="pageSubtitle">
        Manage your API keys across different platforms
    </x-slot>

    <div class="space-y-6 sm:space-y-8">
        <x-alert.alerts />

        <x-card.card variant="gradient">
            <x-slot name="header">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-lg sm:text-xl font-semibold text-gray-900 dark:text-gray-100">
                            API Keys
                        </h3>
                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            View and manage all your API keys in one place
                        </p>
                    </div>
                    <x-button.primary>
                        Add New Key
                    </x-button.primary>
                </div>
            </x-slot>

            @php
                $apiKeys = [
                    [
                        'platform' => 'Amazon AWS',
                        'key' => '3aec8277-da8a-44cd-9249-031519c5a521',
                        'renewal_date' => '20 Feb 2025',
                        'status' => 'active',
                        'enabled' => false,
                    ],
                    [
                        'platform' => 'Mailchimp',
                        'key' => '3aec8277-da8a-44cd-9249-031519c5a521',
                        'renewal_date' => '20 Feb 2025',
                        'status' => 'active',
                        'enabled' => true,
                    ],
                    [
                        'platform' => 'Upwork',
                        'key' => '3aec8277-da8a-44cd-9249-031519c5a521',
                        'renewal_date' => '31 Mar 2025',
                        'status' => 'active',
                        'enabled' => false,
                    ],
                    [
                        'platform' => 'Google',
                        'key' => '3aec8277-da8a-44cd-9249-031519c5a521',
                        'renewal_date' => '07 Apr 2025',
                        'status' => 'inactive',
                        'enabled' => true,
                    ],
                    [
                        'platform' => 'Facebook',
                        'key' => '3aec8277-da8a-44cd-9249-031519c5a521',
                        'renewal_date' => '15 Apr 2025',
                        'status' => 'active',
                        'enabled' => true,
                    ],
                    [
                        'platform' => 'Twitter',
                        'key' => '3aec8277-da8a-44cd-9249-031519c5a521',
                        'renewal_date' => '01 May 2025',
                        'status' => 'active',
                        'enabled' => false,
                    ],
                    [
                        'platform' => 'Zapier',
                        'key' => '3aec8277-da8a-44cd-9249-031519c5a521',
                        'renewal_date' => '15 May 2025',
                        'status' => 'active',
                        'enabled' => false,
                    ],
                    [
                        'platform' => 'Algolia',
                        'key' => '3aec8277-da8a-44cd-9249-031519c5a521',
                        'renewal_date' => '30 May 2025',
                        'status' => 'inactive',
                        'enabled' => false,
                    ],
                    [
                        'platform' => 'Node JS',
                        'key' => '3aec8277-da8a-44cd-9249-031519c5a521',
                        'renewal_date' => '30 May 2025',
                        'status' => 'inactive',
                        'enabled' => true,
                    ],
                ];
            @endphp

            <x-api-keys.table :apiKeys="$apiKeys" />
        </x-card>
    </div>
</x-app-layout>

