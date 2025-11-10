@props([
    'title' => 'Ready to Get Started?',
    'subtitle' => 'Join thousands of teams already using our platform to transform their workflow.',
    'ctaText' => 'Start Your Free Trial',
])

<section class="section-spacing bg-dodger-blue-800 dark:bg-dodger-blue-700 text-gray-900 dark:text-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center observe-fade-in">
        <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-gray-900 dark:text-white mb-4">
            {{ $title }}
        </h2>
        <p class="text-xl text-gray/90 dark:text-white/90 mb-8 max-w-2xl mx-auto">
            {{ $subtitle }}
        </p>
        <a href="{{ Route::has('register') ? route('register') : '#' }}" class="inline-block">
            <x-button.primary 
                variant="secondary" 
                size="lg"
                class="bg-white text-gray-600 hover:bg-gray-100 dark:bg-white dark:text-dodger-blue-600 dark:hover:bg-gray-100"
            >
                {{ $ctaText }}
            </x-button.primary>
        </a>
    </div>
</section>

