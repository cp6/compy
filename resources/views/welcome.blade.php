<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <!-- Theme initialization script - must run before Alpine -->
        <script>
            (function() {
                const theme = localStorage.getItem('theme') || 
                    (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light');
                if (theme === 'dark') {
                    document.documentElement.classList.add('dark');
                } else {
                    document.documentElement.classList.remove('dark');
                }
            })();
        </script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen flex flex-col items-center justify-center px-4 py-12 sm:px-6 lg:px-8 bg-gradient-to-br from-gray-50 via-white to-gray-100 dark:from-gray-900 dark:via-gray-900 dark:to-gray-800 relative overflow-hidden">
            <!-- Background decoration -->
            <div class="absolute inset-0 overflow-hidden pointer-events-none">
                <div class="absolute -top-40 -right-40 w-80 h-80 bg-dodger-blue-300 dark:bg-dodger-blue-900/30 rounded-full mix-blend-multiply dark:mix-blend-soft-light filter blur-3xl opacity-20 animate-blob"></div>
                <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-purple-300 dark:bg-purple-900/30 rounded-full mix-blend-multiply dark:mix-blend-soft-light filter blur-3xl opacity-20 animate-blob animation-delay-2000"></div>
                <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-80 h-80 bg-pink-300 dark:bg-pink-900/30 rounded-full mix-blend-multiply dark:mix-blend-soft-light filter blur-3xl opacity-20 animate-blob animation-delay-4000"></div>
            </div>

            <!-- Theme switcher - top right -->
            <div class="absolute top-4 right-4 z-10">
                <x-theme-switcher />
            </div>

            <!-- Main content -->
            <div class="relative w-full max-w-md">
                <!-- Logo -->
                <div class="text-center mb-8">
                    <a href="/" class="inline-block transition-transform hover:scale-105">
                        <x-application-logo class="w-16 h-16 sm:w-20 sm:h-20 fill-current text-dodger-blue-600 dark:text-dodger-blue-400 mx-auto" />
                    </a>
                </div>

                <!-- Welcome Card -->
                <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-xl border border-white/20 dark:border-gray-700/50 rounded-2xl shadow-2xl shadow-gray-200/50 dark:shadow-gray-900/50 p-8 sm:p-10">
                    <div class="text-center mb-8">
                        <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-2">
                            Welcome
                        </h1>
                        <p class="text-gray-600 dark:text-gray-400">
                            Get started by signing in or creating an account
                        </p>
                    </div>

                    <!-- Action Buttons -->
                    @if (Route::has('login'))
                        <div class="space-y-4">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="block">
                                    <x-button.primary variant="gradient" class="w-full justify-center py-3 text-base">
                                        {{ __('Go to Dashboard') }}
                                    </x-button.primary>
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="block">
                                    <x-button.primary variant="gradient" class="w-full justify-center py-3 text-base">
                                        {{ __('Log in') }}
                                    </x-button.primary>
                                </a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="block">
                                        <x-button.primary variant="outline" class="w-full justify-center py-3 text-base">
                                            {{ __('Register') }}
                                        </x-button.primary>
                                    </a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <style>
            @keyframes blob {
                0%, 100% {
                    transform: translate(0px, 0px) scale(1);
                }
                33% {
                    transform: translate(30px, -50px) scale(1.1);
                }
                66% {
                    transform: translate(-20px, 20px) scale(0.9);
                }
            }
            .animate-blob {
                animation: blob 7s infinite;
            }
            .animation-delay-2000 {
                animation-delay: 2s;
            }
            .animation-delay-4000 {
                animation-delay: 4s;
            }
        </style>
    </body>
</html>
