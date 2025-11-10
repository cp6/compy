<form id="send-verification" method="post" action="{{ route('verification.send') }}">
    @csrf
</form>

<form method="post" action="{{ route('profile.update') }}" class="space-y-4">
    @csrf
    @method('patch')

    <x-form.group>
        <x-form.input 
            name="first_name" 
            label="{{ __('First name') }}" 
            type="text"
            :value="old('first_name', $user->first_name)"
            required
            autofocus
            autocomplete="given-name"
        />

        <x-form.input 
            name="last_name" 
            label="{{ __('Last name') }}" 
            type="text"
            :value="old('last_name', $user->last_name)"
            required
            autocomplete="family-name"
        />

        <x-form.input 
            name="username" 
            label="{{ __('Username') }}" 
            type="text"
            :value="old('username', $user->username)"
            required
            autocomplete="username"
            maxlength="32"
        />

        <x-form.input 
            name="email" 
            label="{{ __('Email') }}" 
            type="email"
            :value="old('email', $user->email)"
            required
            autocomplete="username"
        />

        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
            <div class="p-4 rounded-lg bg-yellow-50 dark:bg-yellow-900/20 border border-yellow-200 dark:border-yellow-800">
                <p class="text-sm text-yellow-800 dark:text-yellow-200">
                    {{ __('Your email address is unverified.') }}

                    <button form="send-verification" class="underline text-sm font-medium hover:text-yellow-900 dark:hover:text-yellow-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 dark:focus:ring-yellow-400">
                        {{ __('Click here to re-send the verification email.') }}
                    </button>
                </p>

                @if (session('status') === 'verification-link-sent')
                    <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                        {{ __('A new verification link has been sent to your email address.') }}
                    </p>
                @endif
            </div>
        @endif
    </x-form.group>

    <div class="flex flex-col sm:flex-row items-stretch sm:items-center justify-end gap-3 pt-3 border-t border-gray-200 dark:border-gray-700">
        @if (session('status') === 'profile-updated')
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
