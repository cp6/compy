<x-guest-layout>
    <div class="space-y-6">
        <!-- Header -->
        <div class="text-center">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100">
                Create your account
            </h1>
            <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                Get started with your free account today
            </p>
        </div>

        <form method="POST" action="{{ route('register') }}" class="space-y-5">
            @csrf

            <!-- First Name -->
            <div>
                <x-form.label for="first_name" :value="__('First name')" />
                <input 
                    id="first_name" 
                    type="text" 
                    name="first_name" 
                    value="{{ old('first_name') }}" 
                    required 
                    autofocus 
                    autocomplete="given-name"
                    class="mt-2 w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-dodger-blue-500 dark:focus:ring-dodger-blue-400 focus:border-transparent transition-all duration-200"
                    placeholder="John"
                />
                <x-form.error :messages="$errors->get('first_name')" class="mt-2" />
            </div>

            <!-- Last Name -->
            <div>
                <x-form.label for="last_name" :value="__('Last name')" />
                <input 
                    id="last_name" 
                    type="text" 
                    name="last_name" 
                    value="{{ old('last_name') }}" 
                    required 
                    autocomplete="family-name"
                    class="mt-2 w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-dodger-blue-500 dark:focus:ring-dodger-blue-400 focus:border-transparent transition-all duration-200"
                    placeholder="Doe"
                />
                <x-form.error :messages="$errors->get('last_name')" class="mt-2" />
            </div>

            <!-- Username -->
            <div>
                <x-form.label for="username" :value="__('Username')" />
                <input 
                    id="username" 
                    type="text" 
                    name="username" 
                    value="{{ old('username') }}" 
                    required 
                    autocomplete="username"
                    maxlength="32"
                    class="mt-2 w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-dodger-blue-500 dark:focus:ring-dodger-blue-400 focus:border-transparent transition-all duration-200"
                    placeholder="johndoe"
                />
                <x-form.error :messages="$errors->get('username')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div>
                <x-form.label for="email" :value="__('Email address')" />
                <input 
                    id="email" 
                    type="email" 
                    name="email" 
                    value="{{ old('email') }}" 
                    required 
                    autocomplete="username"
                    class="mt-2 w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-dodger-blue-500 dark:focus:ring-dodger-blue-400 focus:border-transparent transition-all duration-200"
                    placeholder="you@example.com"
                />
                <x-form.error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div>
                <x-form.label for="password" :value="__('Password')" />
                <input 
                    id="password" 
                    type="password" 
                    name="password" 
                    required 
                    autocomplete="new-password"
                    class="mt-2 w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-dodger-blue-500 dark:focus:ring-dodger-blue-400 focus:border-transparent transition-all duration-200"
                    placeholder="••••••••"
                />
                <x-form.error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div>
                <x-form.label for="password_confirmation" :value="__('Confirm password')" />
                <input 
                    id="password_confirmation" 
                    type="password" 
                    name="password_confirmation" 
                    required 
                    autocomplete="new-password"
                    class="mt-2 w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-dodger-blue-500 dark:focus:ring-dodger-blue-400 focus:border-transparent transition-all duration-200"
                    placeholder="••••••••"
                />
                <x-form.error :messages="$errors->get('password_confirmation')" class="mt-2" />
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

            <!-- Submit Button -->
            <div>
                <x-button.primary variant="gradient" class="w-full justify-center py-3 text-base">
                    {{ __('Create account') }}
                </x-button.primary>
            </div>
        </form>

        <!-- Login Link -->
        <div class="text-center pt-4 border-t border-gray-200 dark:border-gray-700">
            <p class="text-sm text-gray-600 dark:text-gray-400">
                Already have an account?
                <a href="{{ route('login') }}" class="font-medium text-dodger-blue-600 dark:text-dodger-blue-400 hover:text-dodger-blue-700 dark:hover:text-dodger-blue-300 transition-colors">
                    {{ __('Sign in') }}
                </a>
            </p>
        </div>
    </div>
</x-guest-layout>
