<div class="space-y-4">
    <div class="p-4 rounded-lg bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800">
        <p class="text-sm text-red-800 dark:text-red-200">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </div>

    <x-button.danger
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        variant="default"
    >{{ __('Delete Account') }}</x-button.danger>

    <x-modal.modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-2">
                {{ __('Are you sure you want to delete your account?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400 mb-4">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>

            <div class="mb-4">
                <x-form.input
                    name="password"
                    label="{{ __('Password') }}"
                    type="password"
                    placeholder="{{ __('Password') }}"
                    :error="$errors->userDeletion->get('password')"
                    required
                />
            </div>

            <div class="flex flex-col sm:flex-row items-stretch sm:items-center justify-end gap-3 pt-3 border-t border-gray-200 dark:border-gray-700">
                <x-button.secondary type="button" variant="outline" x-on:click="$dispatch('close-modal', 'confirm-user-deletion')" class="w-full sm:w-auto">
                    {{ __('Cancel') }}
                </x-button.secondary>

                <x-button.danger type="submit" variant="default" class="w-full sm:w-auto">
                    {{ __('Delete Account') }}
                </x-button.danger>
            </div>
        </form>
    </x-modal>
</div>
