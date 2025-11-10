<x-app-layout>
    <x-slot name="header">
        <x-breadcrumb :items="[
            ['label' => 'Home', 'url' => route('dashboard')],
            ['label' => 'Profile', 'url' => '#'],
        ]" />
    </x-slot>

    <x-slot name="pageTitle">
        Profile
    </x-slot>

    <x-slot name="pageSubtitle">
        Manage your account settings and profile information
    </x-slot>

    <div class="space-y-4 sm:space-y-5">
        <x-alert.alerts />
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 sm:gap-5">
            <x-card.card title="{{ __('Profile Information') }}" subtitle="{{ __('Update your account\'s profile information and email address.') }}" variant="gradient">
                @include('profile.partials.update-profile-information-form')
            </x-card>

            <x-card.card title="{{ __('API Credentials') }}" subtitle="{{ __('Your unique identifier and API key for accessing the API.') }}" variant="gradient">
                <div class="space-y-4">
                    <x-form.group>
                        <div class="space-y-2">
                            <x-form.label for="uuid" :value="__('UUID')" />
                            <div class="relative flex items-center">
                                <input
                                    type="text"
                                    id="uuid"
                                    name="uuid"
                                    value="{{ $user->uuid }}"
                                    readonly
                                    class="w-full px-3 py-2.5 sm:px-4 sm:py-3 pr-10 rounded-lg sm:rounded-xl border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-gray-100 text-sm sm:text-base font-mono"
                                />
                                <button
                                    type="button"
                                    data-copy="{{ $user->uuid }}"
                                    data-input-id="uuid"
                                    class="absolute right-2 p-2 text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200 transition-colors rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800"
                                    title="{{ __('Copy to clipboard') }}"
                                >
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                    </svg>
                                </button>
                            </div>
                            <p class="text-sm text-gray-500 dark:text-gray-400">{{ __('Your unique user identifier.') }}</p>
                        </div>

                        <div class="space-y-2">
                            <x-form.label for="api_key" :value="__('API Key')" />
                            <div class="relative flex items-center">
                                <input
                                    type="text"
                                    id="api_key"
                                    name="api_key"
                                    value="{{ $user->api_key }}"
                                    readonly
                                    class="w-full px-3 py-2.5 sm:px-4 sm:py-3 pr-10 rounded-lg sm:rounded-xl border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-gray-100 text-sm sm:text-base font-mono"
                                />
                                <button
                                    type="button"
                                    data-copy="{{ $user->api_key }}"
                                    data-input-id="api_key"
                                    class="absolute right-2 p-2 text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200 transition-colors rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800"
                                    title="{{ __('Copy to clipboard') }}"
                                >
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                    </svg>
                                </button>
                            </div>
                            <p class="text-sm text-gray-500 dark:text-gray-400">{{ __('Your API key for authenticating requests. Keep this secure and do not share it publicly.') }}</p>
                        </div>
                    </x-form.group>
                </div>
            </x-card>

            <x-card.card title="{{ __('Update Password') }}" subtitle="{{ __('Ensure your account is using a long, random password to stay secure.') }}" variant="gradient">
                @include('profile.partials.update-password-form')
            </x-card>

            <x-card.card title="{{ __('Delete Account') }}" subtitle="{{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}" variant="gradient">
                @include('profile.partials.delete-user-form')
            </x-card>
        </div>
    </div>
</x-app-layout>
