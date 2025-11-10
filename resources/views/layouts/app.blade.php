<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="overflow-x-hidden">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, user-scalable=yes">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>
            @isset($title)
                {{ $title }} - {{ config('app.name', 'Laravel') }}
            @else
                {{ config('app.name', 'Laravel') }}
            @endisset
        </title>

        @isset($metaDescription)
            <meta name="description" content="{{ $metaDescription }}">
        @endisset

        @isset($metaKeywords)
            <meta name="keywords" content="{{ $metaKeywords }}">
        @endisset

        @isset($metaAuthor)
            <meta name="author" content="{{ $metaAuthor }}">
        @endisset

        <!-- Open Graph / Facebook -->
        @isset($ogTitle)
            <meta property="og:type" content="website">
            <meta property="og:title" content="{{ $ogTitle }}">
            <meta property="og:description" content="{{ $ogDescription ?? $metaDescription ?? '' }}">
            @isset($ogImage)
                <meta property="og:image" content="{{ $ogImage }}">
            @endisset
            <meta property="og:url" content="{{ url()->current() }}">
        @endisset

        <!-- Twitter -->
        @isset($twitterCard)
            <meta name="twitter:card" content="{{ $twitterCard }}">
            <meta name="twitter:title" content="{{ $twitterTitle ?? $title ?? config('app.name', 'Laravel') }}">
            <meta name="twitter:description" content="{{ $twitterDescription ?? $metaDescription ?? '' }}">
            @isset($twitterImage)
                <meta name="twitter:image" content="{{ $twitterImage }}">
            @endisset
        @endisset

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
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
        <!-- Alpine.js Store for page loading state -->
        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.store('pageLoading', {
                    loading: false,
                    setLoading(value) {
                        this.loading = value;
                    }
                });
            });
        </script>
        <style>
            [x-cloak] { display: none !important; }
        </style>
    </head>
    <body class="font-sans antialiased overflow-x-hidden">
        @php
            $hasSidebar = (isset($showSidebar) && $showSidebar) || (!isset($showSidebar) && auth()->check()) || isset($sidebar);
        @endphp
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900 flex overflow-x-hidden">
            @if($hasSidebar)
                @isset($sidebar)
                    {{ $sidebar }}
                @else
                    @include('layouts.partials.sidebar')
                @endisset
            @else
                @include('layouts.navigation')
            @endif

            <div class="flex-1 flex flex-col min-w-0 @if($hasSidebar) lg:ml-64 @endif">
                <!-- Page Heading / Breadcrumb -->
                @isset($header)
                    <header class="bg-transparent">
                        <div class="py-6 @if($hasSidebar) lg:py-6 pt-24 @endif">
                            <div class="max-w-8xl mx-auto px-2 sm:px-6 @if($hasSidebar) md:pl-8 md:pr-8 @else md:px-0 @endif">
                                {{ $header }}
                            </div>
                        </div>
                    </header>
                @endisset

                <!-- Page Title Section -->
                @isset($pageTitle)
                    <div class="@if(!isset($header)) pt-6 @if($hasSidebar) lg:pt-6 pt-20 @endif @endif">
                        <div class="max-w-8xl mx-auto px-2 sm:px-6 @if($hasSidebar) md:pl-8 md:pr-8 @else md:px-0 @endif">
                            <h1 class="text-2xl sm:text-4xl font-bold text-gray-900 dark:text-gray-100">
                                {{ $pageTitle }}
                            </h1>
                            @isset($pageSubtitle)
                                <p class="mt-1 sm:mt-2 text-base sm:text-lg text-gray-600 dark:text-gray-400">
                                    {{ $pageSubtitle }}
                                </p>
                            @endisset
                        </div>
                    </div>
                @endisset

                <!-- Page Content -->
                <main class="flex-1 min-w-0 overflow-x-hidden @if($hasSidebar) lg:pt-0 pt-4 @endif">
                    @if($spinner ?? false)
                        <div 
                            x-data="{ 
                                loading: true,
                                init() {
                                    $store.pageLoading.setLoading(true);
                                    setTimeout(() => {
                                        this.loading = false;
                                        $store.pageLoading.setLoading(false);
                                    }, {{ $spinnerTime ?? 1000 }});
                                }
                            }"
                        >
                            {{-- Page Loader - Shows immediately, hidden by Alpine when loading is false --}}
                            <div 
                                x-show="loading"
                                x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="opacity-100"
                                x-transition:enter-end="opacity-100"
                                x-transition:leave="transition ease-in duration-300"
                                x-transition:leave-start="opacity-100"
                                x-transition:leave-end="opacity-0"
                                style="display: block;"
                            >
                                <x-spinner 
                                    fullPage 
                                    variant="{{ $spinnerVariant ?? 'gradient' }}" 
                                    size="{{ $spinnerSize ?? 'xl' }}" 
                                />
                            </div>

                            {{-- Main Content - Hidden until loading is complete --}}
                            <div 
                                x-show="!loading"
                                x-transition:enter="transition ease-out duration-500"
                                x-transition:enter-start="opacity-0"
                                x-transition:enter-end="opacity-100"
                                x-transition:leave="transition ease-in duration-300"
                                x-transition:leave-start="opacity-100"
                                x-transition:leave-end="opacity-0"
                                class="pt-4 sm:pt-6 md:pt-8 pb-8 sm:pb-10 md:pb-12"
                                style="display: none;"
                                x-cloak
                            >
                                <div class="max-w-8xl mx-auto px-2 sm:px-6 @if($hasSidebar) md:pl-8 md:pr-8 @else md:px-0 @endif">
                                    {{ $slot }}
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="pt-4 sm:pt-6 md:pt-8 pb-8 sm:pb-10 md:pb-12">
                            <div class="max-w-8xl mx-auto px-2 sm:px-6 @if($hasSidebar) md:pl-8 md:pr-8 @else md:px-0 @endif">
                                {{ $slot }}
                            </div>
                        </div>
                    @endif
                </main>
            </div>
        </div>
        
        @stack('scripts')
    </body>
</html>
