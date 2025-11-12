@props([
    'sticky' => true,
])

<nav 
    id="landing-navbar"
    class="navbar-sticky fixed top-0 left-0 right-0 z-50 bg-white/80 dark:bg-gray-900/80 border-b border-gray-200/50 dark:border-gray-700/50"
    x-data="{ mobileMenuOpen: false }"
    {{ $attributes }}
>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <!-- Logo -->
            <div class="flex-shrink-0">
                <a href="/" class="flex items-center">
                    <x-application-logo class="w-8 h-8 fill-current text-dodger-blue-600 dark:text-dodger-blue-400" />
                    <span class="ml-2 text-xl font-bold text-gray-900 dark:text-gray-100">{{ config('app.name', 'Compy') }}</span>
                </a>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden md:flex md:items-center md:space-x-8">
                <a href="#services" class="text-gray-700 dark:text-gray-300 hover:text-dodger-blue-600 dark:hover:text-dodger-blue-400 transition-colors font-medium">Services</a>
                <a href="#how-it-works" class="text-gray-700 dark:text-gray-300 hover:text-dodger-blue-600 dark:hover:text-dodger-blue-400 transition-colors font-medium">How it works</a>
                <a href="#testimonials" class="text-gray-700 dark:text-gray-300 hover:text-dodger-blue-600 dark:hover:text-dodger-blue-400 transition-colors font-medium">Testimonials</a>
                <a href="#pricing" class="text-gray-700 dark:text-gray-300 hover:text-dodger-blue-600 dark:hover:text-dodger-blue-400 transition-colors font-medium">Pricing</a>
                <a href="#faq" class="text-gray-700 dark:text-gray-300 hover:text-dodger-blue-600 dark:hover:text-dodger-blue-400 transition-colors font-medium">FAQ</a>
            </div>

            <!-- CTA Button & Mobile Menu -->
            <div class="flex items-center space-x-4">
                <!-- Theme Switcher -->
                <div class="hidden md:block">
                    <x-theme-switcher />
                </div>
                
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="hidden md:inline-block">
                            <x-button.primary size="sm">Dashboard</x-button.primary>
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="hidden md:inline-block">
                            <x-button.primary size="sm">Get Started</x-button.primary>
                        </a>
                    @endauth
                @endif
                
                <!-- Mobile menu button -->
                <button 
                    type="button"
                    class="md:hidden p-2 rounded-md text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800"
                    @click="mobileMenuOpen = !mobileMenuOpen"
                    aria-label="Toggle menu"
                >
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" x-show="!mobileMenuOpen">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" x-show="mobileMenuOpen" x-cloak>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Navigation -->
        <div 
            class="md:hidden pb-4"
            x-show="mobileMenuOpen"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 transform -translate-y-2"
            x-transition:enter-end="opacity-100 transform translate-y-0"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100 transform translate-y-0"
            x-transition:leave-end="opacity-0 transform -translate-y-2"
            x-cloak
            @click.away="mobileMenuOpen = false"
        >
            <div class="flex flex-col space-y-2">
                <a href="#services" class="px-3 py-2 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-md">Services</a>
                <a href="#how-it-works" class="px-3 py-2 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-md">How it works</a>
                <a href="#testimonials" class="px-3 py-2 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-md">Testimonials</a>
                <a href="#pricing" class="px-3 py-2 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-md">Pricing</a>
                <a href="#faq" class="px-3 py-2 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-md">FAQ</a>
                <div class="px-3 py-2 md:hidden">
                    <x-theme-switcher />
                </div>
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="px-3 py-2">
                            <x-button.primary size="sm" class="w-full">Dashboard</x-button.primary>
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="px-3 py-2">
                            <x-button.primary size="sm" class="w-full">Get Started</x-button.primary>
                        </a>
                    @endauth
                @endif
            </div>
        </div>
    </div>
</nav>

