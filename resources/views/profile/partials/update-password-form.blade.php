<form method="post" action="{{ route('password.update') }}" class="space-y-4">
    @csrf
    @method('put')

    <x-form.group>
        <x-form.input 
            name="current_password" 
            label="{{ __('Current Password') }}" 
            type="password"
            autocomplete="current-password"
            :error="$errors->updatePassword->get('current_password')"
        />

        <x-form.input 
            name="password" 
            label="{{ __('New Password') }}" 
            type="password"
            autocomplete="new-password"
            :error="$errors->updatePassword->get('password')"
        />

        <x-form.input 
            name="password_confirmation" 
            label="{{ __('Confirm Password') }}" 
            type="password"
            autocomplete="new-password"
            :error="$errors->updatePassword->get('password_confirmation')"
        />
    </x-form.group>

    <div class="flex flex-col sm:flex-row items-stretch sm:items-center justify-end gap-3 pt-3 border-t border-gray-200 dark:border-gray-700">
        @if (session('status') === 'password-updated')
            <p
                x-data="{ show: true }"
                x-show="show"
                x-transition
                x-init="setTimeout(() => show = false, 2000)"
                class="text-sm text-emerald-600 dark:text-emerald-400 font-medium"
            >{{ __('Saved.') }}</p>
        @endif
        
        <x-button.primary type="submit" variant="gradient" class="w-full sm:w-auto">
            {{ __('Save') }}
        </x-button.primary>
    </div>
</form>
