<x-app-layout>
    <x-slot name="header">
        <x-breadcrumb :items="[
            ['label' => 'Home', 'url' => route('dashboard')],
            ['label' => 'Pricing', 'url' => '#'],
        ]" />
    </x-slot>

    <x-slot name="pageTitle">
        Pricing Plans
    </x-slot>

    <x-slot name="pageSubtitle">
        Choose the perfect plan for your needs
    </x-slot>

    <x-alert.alerts />
            
            <!-- Pricing Plans Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8 mb-12">
                <!-- Starter Plan -->
                <x-card.card variant="gradient" class="relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-dodger-blue-100 dark:bg-dodger-blue-900/20 rounded-full blur-3xl -mr-16 -mt-16"></div>
                    
                    <div class="relative">
                        <div class="mb-6">
                            <h3 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-2">Starter</h3>
                            <p class="text-gray-600 dark:text-gray-400 text-sm">Perfect for individuals and small projects</p>
                        </div>
                        
                        <div class="mb-6">
                            <div class="flex items-baseline">
                                <span class="text-5xl font-bold text-gray-900 dark:text-gray-100">$9</span>
                                <span class="text-xl text-gray-600 dark:text-gray-400 ml-2">/month</span>
                            </div>
                        </div>
                        
                        <x-button.button variant="outline" size="lg" fullWidth class="mb-8">
                            Get Started
                        </x-button>
                        
                        <div class="space-y-4">
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-dodger-blue-600 dark:text-dodger-blue-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <span class="ml-3 text-gray-700 dark:text-gray-300">Up to 5 projects</span>
                            </div>
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-dodger-blue-600 dark:text-dodger-blue-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <span class="ml-3 text-gray-700 dark:text-gray-300">10GB storage</span>
                            </div>
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-dodger-blue-600 dark:text-dodger-blue-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <span class="ml-3 text-gray-700 dark:text-gray-300">Basic support</span>
                            </div>
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-dodger-blue-600 dark:text-dodger-blue-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <span class="ml-3 text-gray-700 dark:text-gray-300">Email notifications</span>
                            </div>
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-dodger-blue-600 dark:text-dodger-blue-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <span class="ml-3 text-gray-700 dark:text-gray-300">Mobile app access</span>
                            </div>
                        </div>
                    </div>
                </x-card>

                <!-- Professional Plan (Featured) -->
                <x-card.card variant="gradient" class="relative overflow-hidden border-2 border-dodger-blue-500 dark:border-dodger-blue-400 scale-105 lg:scale-110 z-10">
                    <div class="absolute top-0 right-0 w-40 h-40 bg-dodger-blue-200 dark:bg-dodger-blue-800/40 rounded-full blur-3xl -mr-20 -mt-20"></div>
                    
                    <!-- Popular Badge -->
                    <div class="absolute top-6 right-6">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-dodger-blue-600 dark:bg-dodger-blue-500 text-white shadow-lg">
                            Most Popular
                        </span>
                    </div>
                    
                    <div class="relative">
                        <div class="mb-6">
                            <h3 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-2">Professional</h3>
                            <p class="text-gray-600 dark:text-gray-400 text-sm">Ideal for growing teams and businesses</p>
                        </div>
                        
                        <div class="mb-6">
                            <div class="flex items-baseline">
                                <span class="text-5xl font-bold text-gray-900 dark:text-gray-100">$29</span>
                                <span class="text-xl text-gray-600 dark:text-gray-400 ml-2">/month</span>
                            </div>
                        </div>
                        
                        <x-button.button variant="primary" size="lg" fullWidth class="mb-8">
                            Get Started
                        </x-button>
                        
                        <div class="space-y-4">
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-dodger-blue-600 dark:text-dodger-blue-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <span class="ml-3 text-gray-700 dark:text-gray-300">Unlimited projects</span>
                            </div>
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-dodger-blue-600 dark:text-dodger-blue-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <span class="ml-3 text-gray-700 dark:text-gray-300">100GB storage</span>
                            </div>
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-dodger-blue-600 dark:text-dodger-blue-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <span class="ml-3 text-gray-700 dark:text-gray-300">Priority support</span>
                            </div>
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-dodger-blue-600 dark:text-dodger-blue-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <span class="ml-3 text-gray-700 dark:text-gray-300">Advanced analytics</span>
                            </div>
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-dodger-blue-600 dark:text-dodger-blue-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <span class="ml-3 text-gray-700 dark:text-gray-300">Team collaboration</span>
                            </div>
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-dodger-blue-600 dark:text-dodger-blue-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <span class="ml-3 text-gray-700 dark:text-gray-300">API access</span>
                            </div>
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-dodger-blue-600 dark:text-dodger-blue-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <span class="ml-3 text-gray-700 dark:text-gray-300">Custom integrations</span>
                            </div>
                        </div>
                    </div>
                </x-card>

                <!-- Enterprise Plan -->
                <x-card.card variant="gradient" class="relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-purple-100 dark:bg-purple-900/20 rounded-full blur-3xl -mr-16 -mt-16"></div>
                    
                    <div class="relative">
                        <div class="mb-6">
                            <h3 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-2">Enterprise</h3>
                            <p class="text-gray-600 dark:text-gray-400 text-sm">For large organizations with advanced needs</p>
                        </div>
                        
                        <div class="mb-6">
                            <div class="flex items-baseline">
                                <span class="text-5xl font-bold text-gray-900 dark:text-gray-100">$99</span>
                                <span class="text-xl text-gray-600 dark:text-gray-400 ml-2">/month</span>
                            </div>
                        </div>
                        
                        <x-button.button variant="outline" size="lg" fullWidth class="mb-8">
                            Contact Sales
                        </x-button>
                        
                        <div class="space-y-4">
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-dodger-blue-600 dark:text-dodger-blue-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <span class="ml-3 text-gray-700 dark:text-gray-300">Unlimited everything</span>
                            </div>
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-dodger-blue-600 dark:text-dodger-blue-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <span class="ml-3 text-gray-700 dark:text-gray-300">1TB+ storage</span>
                            </div>
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-dodger-blue-600 dark:text-dodger-blue-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <span class="ml-3 text-gray-700 dark:text-gray-300">24/7 dedicated support</span>
                            </div>
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-dodger-blue-600 dark:text-dodger-blue-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <span class="ml-3 text-gray-700 dark:text-gray-300">Custom SLA</span>
                            </div>
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-dodger-blue-600 dark:text-dodger-blue-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <span class="ml-3 text-gray-700 dark:text-gray-300">Advanced security</span>
                            </div>
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-dodger-blue-600 dark:text-dodger-blue-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <span class="ml-3 text-gray-700 dark:text-gray-300">On-premise deployment</span>
                            </div>
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-dodger-blue-600 dark:text-dodger-blue-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <span class="ml-3 text-gray-700 dark:text-gray-300">Account manager</span>
                            </div>
                        </div>
                    </div>
                </x-card>
            </div>

            <!-- FAQ Section -->
            <x-card.card variant="gradient" class="mb-8">
                <div class="mb-6">
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-2">Frequently Asked Questions</h2>
                    <p class="text-gray-600 dark:text-gray-400">Everything you need to know about our pricing</p>
                </div>
                
                <div class="space-y-6">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-2">Can I change plans later?</h3>
                        <p class="text-gray-600 dark:text-gray-400">Yes, you can upgrade or downgrade your plan at any time. Changes will be reflected in your next billing cycle.</p>
                    </div>
                    
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-2">What payment methods do you accept?</h3>
                        <p class="text-gray-600 dark:text-gray-400">We accept all major credit cards, PayPal, and bank transfers for Enterprise plans.</p>
                    </div>
                    
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-2">Is there a free trial?</h3>
                        <p class="text-gray-600 dark:text-gray-400">Yes! All plans come with a 14-day free trial. No credit card required.</p>
                    </div>
                    
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-2">Do you offer refunds?</h3>
                        <p class="text-gray-600 dark:text-gray-400">We offer a 30-day money-back guarantee. If you're not satisfied, we'll refund your payment.</p>
                    </div>
                </div>
            </x-card>

            <!-- CTA Section -->
            <x-card.card variant="gradient" class="text-center">
                <div class="max-w-2xl mx-auto">
                    <h2 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-4">Still have questions?</h2>
                    <p class="text-gray-600 dark:text-gray-400 mb-6 text-lg">
                        Our team is here to help you find the perfect plan for your needs.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <x-button.button variant="primary" size="lg">
                            Contact Support
                        </x-button>
                        <x-button.button variant="outline" size="lg">
                            Schedule a Demo
                        </x-button>
                    </div>
                </div>
            </x-card>
        </div>
</x-app-layout>

