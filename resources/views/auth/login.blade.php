<x-guest-layout>
    <x-slot name="title">Login</x-slot>
    <x-slot name="metaDescription">Sign in to your account to access all features and manage your profile.</x-slot>

    <div class="space-y-6">
        <!-- Header -->
        <div class="text-center">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100">
                Welcome back
            </h1>
            <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                Sign in to your account to continue
            </p>
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf

            <!-- Username or Email -->
            <div>
                <x-form.label for="login" :value="__('Username or Email')" />
                <input 
                    id="login" 
                    type="text" 
                    name="login" 
                    value="{{ old('login') }}" 
                    required 
                    autofocus 
                    autocomplete="username"
                    class="mt-2 w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-dodger-blue-500 dark:focus:ring-dodger-blue-400 focus:border-transparent transition-all duration-200"
                    placeholder="username or you@example.com"
                />
                <x-form.error :messages="$errors->get('login')" class="mt-2" />
            </div>

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

            <!-- CAPTCHA -->
            <div>
                <x-form.label for="captcha" :value="__('Captcha')" />
                <div class="mt-2 space-y-3">
                    <div>
                        {!! captcha_img('default', ['class' => 'captcha-img cursor-pointer rounded-xl border border-gray-300 dark:border-gray-600', 'onclick' => 'this.src=\''.captcha_src().'?\'+Math.random()']) !!}
                    </div>
                    <div>
                        <input 
                            id="captcha" 
                            type="text" 
                            name="captcha" 
                            required 
                            autocomplete="off"
                            class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-dodger-blue-500 dark:focus:ring-dodger-blue-400 focus:border-transparent transition-all duration-200"
                            placeholder="{{ __('Enter captcha') }}"
                        />
                    </div>
                </div>
                <x-form.error :messages="$errors->get('captcha')" class="mt-2" />
            </div>

            <!-- Remember Me & Forgot Password -->
            <div class="flex items-center justify-between">
                <label for="remember_me" class="inline-flex items-center cursor-pointer">
                    <input 
                        id="remember_me" 
                        type="checkbox" 
                        name="remember"
                        class="rounded border-gray-300 dark:border-gray-600 text-dodger-blue-600 dark:text-dodger-blue-400 shadow-sm focus:ring-dodger-blue-500 dark:focus:ring-dodger-blue-400 dark:bg-gray-700 cursor-pointer"
                    >
                    <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                </label>

                @if (Route::has('password.request'))
                    <a 
                        href="{{ route('password.request') }}" 
                        class="text-sm font-medium text-dodger-blue-600 dark:text-dodger-blue-400 hover:text-dodger-blue-700 dark:hover:text-dodger-blue-300 transition-colors"
                    >
                        {{ __('Forgot password?') }}
                    </a>
                @endif
            </div>

            <!-- Submit Button -->
            <div>
                <x-button.primary variant="gradient" class="w-full justify-center py-3 text-base">
                    {{ __('Sign in') }}
                </x-button.primary>
            </div>
        </form>

        <!-- Register Link -->
        @if (Route::has('register'))
            <div class="text-center pt-4 border-t border-gray-200 dark:border-gray-700">
                <p class="text-sm text-gray-600 dark:text-gray-400">
                    Don't have an account?
                    <a href="{{ route('register') }}" class="font-medium text-dodger-blue-600 dark:text-dodger-blue-400 hover:text-dodger-blue-700 dark:hover:text-dodger-blue-300 transition-colors">
                        {{ __('Sign up') }}
                    </a>
                </p>
            </div>
        @endif
    </div>
</x-guest-layout>
