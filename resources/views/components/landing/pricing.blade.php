@props([
    'plans' => [
        [
            'name' => 'Starter',
            'price' => 100,
            'period' => 'month',
            'features' => ['Feature 1 goes here', 'Feature 2 goes here', 'Feature 3 goes here', 'Feature 4 goes here', 'Feature 5 goes here'],
            'popular' => false,
        ],
        [
            'name' => 'Pro',
            'price' => 200,
            'period' => 'month',
            'features' => ['Everything in Starter plus:', 'Feature 6 goes here', 'Feature 7 goes here', 'Feature 8 goes here', 'Feature 9 goes here'],
            'popular' => true,
        ],
        [
            'name' => 'Advanced',
            'price' => 300,
            'period' => 'month',
            'features' => ['Everything in Pro plus:', 'Feature 10 goes here', 'Feature 11 goes here', 'Feature 12 goes here', 'Feature 13 goes here'],
            'popular' => false,
        ],
    ],
])

<section id="pricing" class="section-spacing bg-gray-100 dark:bg-gray-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 observe-fade-in">
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-gray-900 dark:text-gray-100 mb-4">
                Pricing - Why to buy/How it helps
            </h2>
            <p class="text-lg text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">
                Choose the perfect plan for your needs. All plans include a 14-day free trial.
            </p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            @foreach($plans as $plan)
                <div class="relative {{ $plan['popular'] ? 'pricing-card-popular' : '' }} observe-fade-in">
                    @if($plan['popular'])
                        <div class="absolute -top-4 left-1/2 transform -translate-x-1/2">
                            <span class="bg-dodger-blue-600 dark:bg-dodger-blue-500 text-white text-xs font-semibold px-4 py-1 rounded-full">
                                Most Popular
                            </span>
                        </div>
                    @endif
                    
                    <div class="bg-white dark:bg-gray-800 rounded-xl p-8 border border-gray-200 dark:border-gray-700 shadow-lg hover:shadow-xl transition-all h-full flex flex-col">
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-2">
                            {{ $plan['name'] }}
                        </h3>
                        <div class="mb-6">
                            <span class="text-4xl font-bold text-gray-900 dark:text-gray-100">${{ $plan['price'] }}</span>
                            <span class="text-gray-600 dark:text-gray-400">/{{ $plan['period'] }}</span>
                        </div>
                        
                        <ul class="flex-1 space-y-3 mb-8">
                            @foreach($plan['features'] as $feature)
                                <li class="flex items-start">
                                    <svg class="w-5 h-5 text-dodger-blue-600 dark:text-dodger-blue-400 mr-2 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="text-gray-600 dark:text-gray-400">{{ $feature }}</span>
                                </li>
                            @endforeach
                        </ul>
                        
                        <a href="{{ Route::has('register') ? route('register') : '#' }}" class="block">
                            <x-button.primary 
                                variant="{{ $plan['popular'] ? 'primary' : 'outline' }}" 
                                class="w-full"
                                size="lg"
                            >
                                Get Started
                            </x-button.primary>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

