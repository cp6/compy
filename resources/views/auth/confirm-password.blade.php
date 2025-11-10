<x-guest-layout>
    <div class="space-y-6">
        <!-- Header -->
        <div class="text-center">
            <div class="mx-auto flex items-center justify-center h-16 w-16 rounded-full bg-dodger-blue-100 dark:bg-dodger-blue-900/30 mb-4">
                <svg class="h-8 w-8 text-dodger-blue-600 dark:text-dodger-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                </svg>
            </div>
            <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100">
                Confirm password
            </h1>
            <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
            </p>
        </div>

        <form method="POST" action="{{ route('password.confirm') }}" class="space-y-5">
            @csrf

            <!-- Password -->
            <div>
                <x-form.label for="password" :value="__('Password')" />
                <input 
                    id="password" 
                    type="password" 
                    name="password" 
                    required 
                    autocomplete="current-password"
                    class="mt-2 w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-dodger-blue-500 dark:focus:ring-dodger-blue-400 focus:border-transparent transition-all duration-200"
                    placeholder="••••••••"
                />
                <x-form.error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Submit Button -->
            <div>
                <x-button.primary variant="gradient" class="w-full justify-center py-3 text-base">
                    {{ __('Confirm') }}
                </x-button.primary>
            </div>
        </form>
    </div>
</x-guest-layout>
