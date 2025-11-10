@props([
    'title' => 'Transform Your Business with Our Powerful SaaS Platform',
    'subtitle' => 'Streamline your workflow, boost productivity, and achieve your goals faster with our all-in-one solution designed for modern teams.',
    'socialProof' => '1200+ active users',
    'primaryCta' => 'Start Free Trial',
    'secondaryCta' => 'Watch Demo',
])

<section class="section-spacing pt-32 pb-16 bg-gray-100 dark:bg-gray-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <!-- Left Content -->
            <div class="text-center lg:text-left observe-fade-in">
                <!-- Social Proof -->
                <div class="inline-flex items-center gap-2 mb-6 px-4 py-2 bg-white/80 dark:bg-gray-800/80 backdrop-blur-sm rounded-full border border-gray-200/50 dark:border-gray-700/50 shadow-sm">
                    <svg class="w-5 h-5 text-dodger-blue-600 dark:text-dodger-blue-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" />
                    </svg>
                    <span class="text-sm font-medium text-gray-700 dark:text-gray-300">{{ $socialProof }}</span>
                </div>

                <!-- Title -->
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-gray-900 dark:text-gray-100 mb-6 leading-tight">
                    {{ $title }}
                </h1>

                <!-- Subtitle -->
                <p class="text-lg sm:text-xl text-gray-600 dark:text-gray-400 mb-8 max-w-2xl mx-auto lg:mx-0">
                    {{ $subtitle }}
                </p>

                <!-- CTAs -->
                <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                    <a href="{{ Route::has('register') ? route('register') : '#' }}" class="inline-block">
                        <x-button.primary size="lg" class="w-full sm:w-auto">
                            {{ $primaryCta }}
                        </x-button.primary>
                    </a>
                    <a href="#how-it-works" class="inline-block">
                        <x-button.button variant="outline" size="lg" class="w-full sm:w-auto">
                            {{ $secondaryCta }}
                        </x-button.button>
                    </a>
                </div>
            </div>

            <!-- Right Media -->
            <div class="observe-fade-in animate-fade-in-up-delay-1">
                <div class="relative">
                    <div class="absolute inset-0 bg-dodger-blue-400 dark:bg-dodger-blue-900/30 rounded-2xl blur-2xl opacity-20 dark:opacity-10 transform rotate-3"></div>
                    <div class="relative bg-white dark:bg-gray-800 rounded-2xl shadow-2xl p-8 border border-gray-200/50 dark:border-gray-700/50">
                        <!-- Mock Product Screenshot -->
                        <div class="aspect-video bg-gradient-to-br from-gray-100 to-gray-200 dark:from-gray-700 dark:to-gray-800 rounded-lg flex items-center justify-center">
                            <div class="text-center">
                                <svg class="w-24 h-24 mx-auto text-gray-400 dark:text-gray-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                <p class="text-gray-500 dark:text-gray-400 font-medium">Product Video or Screenshot</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

