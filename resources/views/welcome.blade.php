<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Compy') }} - High-Converting SaaS Landing Page</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/landing.css', 'resources/js/landing.js'])
        
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
    <body class="font-sans antialiased bg-white dark:bg-gray-900">
        <!-- Navbar -->
        <x-landing.navbar />

        <!-- Hero Section -->
        <x-landing.hero />

        <!-- Partners Section -->
        <x-landing.partners />

        <!-- Benefits Section -->
        <x-landing.benefits />

        <!-- How It Works Section -->
        <x-landing.how-it-works />

        <!-- Pricing Section -->
        <x-landing.pricing />

        <!-- Testimonials Section -->
        <x-landing.testimonials />

        <!-- FAQ Section -->
        <x-landing.faq />

        <!-- Bottom CTA Section -->
        <x-landing.cta-section />

        <!-- Footer -->
        <x-landing.footer />

        <!-- Alpine.js -->
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    </body>
</html>
