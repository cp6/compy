@props([
    'steps' => [
        ['number' => '1', 'title' => 'Sign Up', 'description' => 'Create your account in less than 2 minutes with our simple onboarding process'],
        ['number' => '2', 'title' => 'Customize', 'description' => 'Configure your workspace and integrate with your existing tools'],
        ['number' => '3', 'title' => 'Launch', 'description' => 'Start using our platform and see immediate improvements to your workflow'],
    ],
])

<section id="how-it-works" class="section-spacing bg-gray-100 dark:bg-gray-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 observe-fade-in">
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-gray-900 dark:text-gray-100 mb-4">
                How it works?
            </h2>
            <p class="text-lg text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">
                Explain how to get started with the product in 3 simple steps
            </p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            @foreach($steps as $index => $step)
                <div class="bento-card observe-fade-in bg-white dark:bg-gray-800 rounded-xl p-8 border border-gray-200 dark:border-gray-700 shadow-md hover:shadow-xl transition-all text-center">
                    <div class="w-16 h-16 mx-auto mb-6 bg-dodger-blue-100 dark:bg-dodger-blue-900/30 rounded-full flex items-center justify-center">
                        <span class="text-2xl font-bold text-dodger-blue-600 dark:text-dodger-blue-400">{{ $step['number'] }}</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-gray-100 mb-3">
                        {{ $step['title'] }}
                    </h3>
                    <p class="text-gray-600 dark:text-gray-400">
                        {{ $step['description'] }}
                    </p>
                </div>
            @endforeach
        </div>
    </div>
</section>

