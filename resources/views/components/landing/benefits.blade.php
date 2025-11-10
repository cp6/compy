@props([
    'benefits' => [
        ['title' => 'Lightning Fast', 'description' => 'Experience blazing-fast performance that keeps your team productive', 'icon' => 'M13 10V3L4 14h7v7l9-11h-7z'],
        ['title' => 'Secure & Reliable', 'description' => 'Enterprise-grade security to protect your valuable data', 'icon' => 'M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z'],
        ['title' => 'Real-time Analytics', 'description' => 'Make data-driven decisions with comprehensive insights', 'icon' => 'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z'],
        ['title' => 'Team Collaboration', 'description' => 'Work together seamlessly with powerful collaboration tools', 'icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z'],
        ['title' => 'Easy Integration', 'description' => 'Connect with your favorite tools in minutes, not hours', 'icon' => 'M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z'],
        ['title' => 'Smart Automation', 'description' => 'Automate repetitive tasks and focus on what matters', 'icon' => 'M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z'],
    ],
])

<section id="services" class="section-spacing bg-gray-100 dark:bg-gray-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 observe-fade-in">
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-gray-900 dark:text-gray-100 mb-4">
                Benefits
            </h2>
            <p class="text-lg text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">
                Focus on how it helps users instead of what features it has
            </p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($benefits as $index => $benefit)
                <div class="bento-card observe-fade-in bg-white dark:bg-gray-800 rounded-xl p-6 border border-gray-200 dark:border-gray-700 shadow-md hover:shadow-xl transition-all">
                    <div class="w-12 h-12 mb-4 bg-dodger-blue-100 dark:bg-dodger-blue-900/30 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-dodger-blue-600 dark:text-dodger-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $benefit['icon'] ?? 'M13 10V3L4 14h7v7l9-11h-7z' }}" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-gray-100 mb-2">
                        {{ $benefit['title'] }}
                    </h3>
                    <p class="text-gray-600 dark:text-gray-400">
                        {{ $benefit['description'] }}
                    </p>
                </div>
            @endforeach
        </div>
    </div>
</section>

