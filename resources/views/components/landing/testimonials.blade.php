@props([
    'testimonials' => [
        ['rating' => 5, 'text' => 'This platform has completely transformed how our team works. The productivity gains are incredible!', 'author' => 'Sarah Johnson', 'role' => 'CEO, TechCorp'],
        ['rating' => 5, 'text' => 'Best investment we\'ve made this year. The ROI was visible within the first month of use.', 'author' => 'Michael Chen', 'role' => 'CTO, StartupXYZ'],
        ['rating' => 5, 'text' => 'Intuitive, powerful, and reliable. Everything we needed in one place. Highly recommend!', 'author' => 'Emily Rodriguez', 'role' => 'Operations Manager, GrowthCo'],
    ],
])

<section id="testimonials" class="section-spacing bg-gray-100 dark:bg-gray-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 observe-fade-in">
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-gray-900 dark:text-gray-100 mb-4">
                Loved by people worldwide
            </h2>
            <p class="text-lg text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">
                See what our customers have to say about their experience
            </p>
        </div>

        <div 
            id="testimonial-carousel"
            class="testimonial-carousel flex gap-6 overflow-x-auto pb-4 cursor-grab active:cursor-grabbing"
            style="scroll-snap-type: x mandatory;"
        >
            @foreach($testimonials as $testimonial)
                <div class="testimonial-card flex-shrink-0 w-full md:w-96 observe-fade-in bg-white dark:bg-gray-800 rounded-xl p-8 border border-gray-200 dark:border-gray-700 shadow-md">
                    <!-- Star Rating -->
                    <div class="star-rating mb-4">
                        @for($i = 0; $i < $testimonial['rating']; $i++)
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                        @endfor
                    </div>
                    
                    <!-- Testimonial Text -->
                    <p class="text-gray-700 dark:text-gray-300 mb-6 text-lg leading-relaxed">
                        "{{ $testimonial['text'] }}"
                    </p>
                    
                    <!-- Author -->
                    <div>
                        <p class="font-semibold text-gray-900 dark:text-gray-100">
                            {{ $testimonial['author'] }}
                        </p>
                        <p class="text-sm text-gray-600 dark:text-gray-400">
                            {{ $testimonial['role'] }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

