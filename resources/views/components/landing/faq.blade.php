@props([
    'faqs' => [
        ['question' => 'Can I cancel my subscription anytime?', 'answer' => 'Yes, you can cancel your subscription at any time. There are no long-term contracts or cancellation fees. Your access will continue until the end of your current billing period.'],
        ['question' => 'Do you offer refunds?', 'answer' => 'We offer a 30-day money-back guarantee for all new subscriptions. If you\'re not satisfied with our service, contact us within 30 days for a full refund.'],
        ['question' => 'What payment methods do you accept?', 'answer' => 'We accept all major credit cards, PayPal, and bank transfers for annual plans. All payments are processed securely through our payment partners.'],
        ['question' => 'Is there a free trial available?', 'answer' => 'Yes! All plans include a 14-day free trial. No credit card required to start. You can explore all features during the trial period.'],
    ],
])

<section id="faq" class="section-spacing bg-gray-100 dark:bg-gray-900">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 observe-fade-in">
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-gray-900 dark:text-gray-100 mb-4">
                Frequently Asked Questions
            </h2>
            <p class="text-lg text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">
                Address major questions, e.g., cancellation/refunds
            </p>
        </div>

        <x-accordion.accordion class="space-y-4">
            @foreach($faqs as $index => $faq)
                <x-accordion.accordion-item 
                    :title="$faq['question']"
                    :id="'faq-' . $index"
                >
                    <p class="text-gray-600 dark:text-gray-400 leading-relaxed">
                        {{ $faq['answer'] }}
                    </p>
                </x-accordion.accordion-item>
            @endforeach
        </x-accordion.accordion>
    </div>
</section>

