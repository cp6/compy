<x-app-layout>
    <x-slot name="title">Weather Demo</x-slot>
    <x-slot name="metaDescription">A comprehensive weather demo showcasing current conditions, hourly and daily forecasts with beautiful UI components.</x-slot>
    <x-slot name="metaKeywords">weather, forecast, demo, components</x-slot>

    <x-slot name="header">
        <x-breadcrumb :items="[
            ['label' => 'Home', 'url' => route('dashboard')],
            ['label' => 'Weather Demo', 'url' => '#'],
        ]" />
    </x-slot>

    <x-slot name="pageTitle">
        Weather Demo
    </x-slot>

    <x-slot name="pageSubtitle">
        Current conditions, hourly forecast, and 7-day outlook
    </x-slot>

    <x-alert.alerts />

    @php
        // Mock weather data
        $currentWeather = [
            'location' => 'San Francisco, CA',
            'temperature' => 72,
            'feelsLike' => 75,
            'condition' => 'Partly Cloudy',
            'icon' => 'partly-cloudy',
            'humidity' => 65,
            'windSpeed' => 12,
            'windDirection' => 'SW',
            'pressure' => 30.15,
            'visibility' => 10,
            'uvIndex' => 6,
            'sunrise' => '6:45 AM',
            'sunset' => '7:30 PM',
        ];

        $hourlyForecast = [
            ['time' => 'Now', 'temp' => 72, 'icon' => 'partly-cloudy', 'precip' => 0],
            ['time' => '2 PM', 'temp' => 74, 'icon' => 'sunny', 'precip' => 0],
            ['time' => '3 PM', 'temp' => 75, 'icon' => 'sunny', 'precip' => 0],
            ['time' => '4 PM', 'temp' => 74, 'icon' => 'partly-cloudy', 'precip' => 0],
            ['time' => '5 PM', 'temp' => 73, 'icon' => 'cloudy', 'precip' => 10],
            ['time' => '6 PM', 'temp' => 71, 'icon' => 'cloudy', 'precip' => 20],
            ['time' => '7 PM', 'temp' => 69, 'icon' => 'rain', 'precip' => 40],
            ['time' => '8 PM', 'temp' => 67, 'icon' => 'rain', 'precip' => 60],
            ['time' => '9 PM', 'temp' => 65, 'icon' => 'rain', 'precip' => 30],
            ['time' => '10 PM', 'temp' => 64, 'icon' => 'cloudy', 'precip' => 10],
            ['time' => '11 PM', 'temp' => 63, 'icon' => 'partly-cloudy', 'precip' => 0],
            ['time' => '12 AM', 'temp' => 62, 'icon' => 'clear', 'precip' => 0],
        ];

        $dailyForecast = [
            ['day' => 'Today', 'high' => 75, 'low' => 62, 'icon' => 'partly-cloudy', 'condition' => 'Partly Cloudy', 'precip' => 20],
            ['day' => 'Tomorrow', 'high' => 78, 'low' => 64, 'icon' => 'sunny', 'condition' => 'Sunny', 'precip' => 0],
            ['day' => 'Wed', 'high' => 80, 'low' => 66, 'icon' => 'sunny', 'condition' => 'Sunny', 'precip' => 0],
            ['day' => 'Thu', 'high' => 77, 'low' => 63, 'icon' => 'partly-cloudy', 'condition' => 'Partly Cloudy', 'precip' => 10],
            ['day' => 'Fri', 'high' => 74, 'low' => 61, 'icon' => 'cloudy', 'condition' => 'Cloudy', 'precip' => 30],
            ['day' => 'Sat', 'high' => 72, 'low' => 59, 'icon' => 'rain', 'condition' => 'Rain', 'precip' => 60],
            ['day' => 'Sun', 'high' => 70, 'low' => 58, 'icon' => 'rain', 'condition' => 'Rain', 'precip' => 40],
        ];

        $weatherIcons = [
            'sunny' => '<svg class="w-full h-full" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.25a.75.75 0 01.75.75v2.25a.75.75 0 01-1.5 0V3a.75.75 0 01.75-.75zM7.5 12a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM18.894 6.166a.75.75 0 00-1.06-1.06l-1.591 1.59a.75.75 0 101.06 1.061l1.591-1.59zM21.75 12a.75.75 0 01-.75.75h-2.25a.75.75 0 010-1.5H21a.75.75 0 01.75.75zM17.834 18.894a.75.75 0 001.06-1.06l-1.59-1.591a.75.75 0 10-1.061 1.06l1.59 1.591zM12 18a.75.75 0 01.75.75V21a.75.75 0 01-1.5 0v-2.25A.75.75 0 0112 18zM7.758 17.303a.75.75 0 00-1.061-1.06l-1.591 1.59a.75.75 0 001.06 1.061l1.591-1.59zM6 12a.75.75 0 01-.75.75H3a.75.75 0 010-1.5h2.25A.75.75 0 016 12zM6.697 7.757a.75.75 0 001.06-1.06l-1.59-1.591a.75.75 0 00-1.061 1.06l1.59 1.591z"/></svg>',
            'partly-cloudy' => '<svg class="w-full h-full" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.25a.75.75 0 01.75.75v2.25a.75.75 0 01-1.5 0V3a.75.75 0 01.75-.75zM7.5 12a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM18.894 6.166a.75.75 0 00-1.06-1.06l-1.591 1.59a.75.75 0 101.06 1.061l1.591-1.59zM21.75 12a.75.75 0 01-.75.75h-2.25a.75.75 0 010-1.5H21a.75.75 0 01.75.75zM17.834 18.894a.75.75 0 001.06-1.06l-1.59-1.591a.75.75 0 10-1.061 1.06l1.59 1.591zM12 18a.75.75 0 01.75.75V21a.75.75 0 01-1.5 0v-2.25A.75.75 0 0112 18zM7.758 17.303a.75.75 0 00-1.061-1.06l-1.591 1.59a.75.75 0 001.06 1.061l1.591-1.59zM6 12a.75.75 0 01-.75.75H3a.75.75 0 010-1.5h2.25A.75.75 0 016 12zM6.697 7.757a.75.75 0 001.06-1.06l-1.59-1.591a.75.75 0 00-1.061 1.06l1.59 1.591z"/></svg>',
            'cloudy' => '<svg class="w-full h-full" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M2.25 12a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3a.75.75 0 01-.75-.75zm0-4.5a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3a.75.75 0 01-.75-.75zm0 9a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3a.75.75 0 01-.75-.75z" clip-rule="evenodd"/></svg>',
            'rain' => '<svg class="w-full h-full" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M4.5 12a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zm6 0a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zm6 0a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0z" clip-rule="evenodd"/></svg>',
            'clear' => '<svg class="w-full h-full" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M9.528 1.718a.75.75 0 01.162.819A8.97 8.97 0 009 6a9 9 0 009 9 8.97 8.97 0 003.463-.69.75.75 0 01.981.98 10.503 10.503 0 01-9.694 6.46c-5.799 0-10.5-4.701-10.5-10.5 0-4.368 2.667-8.112 6.46-9.694a.75.75 0 01.818.162z" clip-rule="evenodd"/></svg>',
        ];
    @endphp

    <div class="space-y-6">
        <!-- Current Weather -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Main Current Weather Card -->
            <x-card.card variant="gradient" class="lg:col-span-2">
                <div class="flex flex-col md:flex-row items-center md:items-start justify-between gap-6">
                    <div class="flex-1">
                        <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-2">
                            {{ $currentWeather['location'] }}
                        </h2>
                        <p class="text-gray-600 dark:text-gray-400 mb-4">
                            {{ \Carbon\Carbon::now()->format('l, F j, Y') }} • {{ \Carbon\Carbon::now()->format('g:i A') }}
                        </p>
                        <div class="flex items-center gap-4">
                            <div class="w-24 h-24 text-yellow-500 dark:text-yellow-400">
                                {!! $weatherIcons[$currentWeather['icon']] ?? $weatherIcons['sunny'] !!}
                            </div>
                            <div>
                                <div class="text-6xl font-bold text-gray-900 dark:text-gray-100">
                                    {{ $currentWeather['temperature'] }}°
                                </div>
                                <p class="text-lg text-gray-600 dark:text-gray-400">
                                    {{ $currentWeather['condition'] }}
                                </p>
                                <p class="text-sm text-gray-500 dark:text-gray-500">
                                    Feels like {{ $currentWeather['feelsLike'] }}°
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </x-card.card>

            <!-- Weather Details Card -->
            <x-card.card variant="gradient">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">Details</h3>
                <div class="space-y-4">
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600 dark:text-gray-400">Humidity</span>
                        <span class="font-semibold text-gray-900 dark:text-gray-100">{{ $currentWeather['humidity'] }}%</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600 dark:text-gray-400">Wind</span>
                        <span class="font-semibold text-gray-900 dark:text-gray-100">{{ $currentWeather['windSpeed'] }} mph {{ $currentWeather['windDirection'] }}</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600 dark:text-gray-400">Pressure</span>
                        <span class="font-semibold text-gray-900 dark:text-gray-100">{{ $currentWeather['pressure'] }} in</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600 dark:text-gray-400">Visibility</span>
                        <span class="font-semibold text-gray-900 dark:text-gray-100">{{ $currentWeather['visibility'] }} mi</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600 dark:text-gray-400">UV Index</span>
                        <span class="font-semibold text-gray-900 dark:text-gray-100">{{ $currentWeather['uvIndex'] }}</span>
                    </div>
                    <div class="flex justify-between items-center pt-2 border-t border-gray-200 dark:border-gray-700">
                        <span class="text-gray-600 dark:text-gray-400">Sunrise</span>
                        <span class="font-semibold text-gray-900 dark:text-gray-100">{{ $currentWeather['sunrise'] }}</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600 dark:text-gray-400">Sunset</span>
                        <span class="font-semibold text-gray-900 dark:text-gray-100">{{ $currentWeather['sunset'] }}</span>
                    </div>
                </div>
            </x-card.card>
        </div>

        <!-- Hourly Forecast -->
        <x-card.card variant="gradient" title="Hourly Forecast">
            <div class="overflow-x-auto">
                <div class="flex gap-4 pb-4">
                    @foreach($hourlyForecast as $hour)
                        <div class="flex flex-col items-center min-w-[80px] p-4 rounded-lg bg-gray-50 dark:bg-gray-900/50 hover:bg-gray-100 dark:hover:bg-gray-900 transition-colors">
                            <span class="text-sm font-medium text-gray-600 dark:text-gray-400 mb-2">{{ $hour['time'] }}</span>
                            <div class="w-10 h-10 text-blue-500 dark:text-blue-400 mb-2">
                                {!! $weatherIcons[$hour['icon']] ?? $weatherIcons['sunny'] !!}
                            </div>
                            <span class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-1">{{ $hour['temp'] }}°</span>
                            @if($hour['precip'] > 0)
                                <span class="text-xs text-blue-600 dark:text-blue-400">{{ $hour['precip'] }}%</span>
                            @else
                                <span class="text-xs text-gray-400">—</span>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </x-card.card>

        <!-- Daily Forecast -->
        <x-card.card variant="gradient" title="7-Day Forecast">
            <div class="space-y-3">
                @foreach($dailyForecast as $day)
                    <div class="flex items-center justify-between p-4 rounded-lg bg-gray-50 dark:bg-gray-900/50 hover:bg-gray-100 dark:hover:bg-gray-900 transition-colors">
                        <div class="flex items-center gap-4 flex-1">
                            <div class="w-16 font-medium text-gray-900 dark:text-gray-100">
                                {{ $day['day'] }}
                            </div>
                            <div class="w-12 h-12 text-blue-500 dark:text-blue-400">
                                {!! $weatherIcons[$day['icon']] ?? $weatherIcons['sunny'] !!}
                            </div>
                            <div class="flex-1">
                                <div class="text-sm text-gray-600 dark:text-gray-400">{{ $day['condition'] }}</div>
                                @if($day['precip'] > 0)
                                    <div class="text-xs text-blue-600 dark:text-blue-400 mt-1">Precipitation: {{ $day['precip'] }}%</div>
                                @endif
                            </div>
                        </div>
                        <div class="flex items-center gap-4">
                            <div class="flex items-center gap-2">
                                <span class="text-lg font-semibold text-gray-900 dark:text-gray-100">{{ $day['high'] }}°</span>
                                <span class="text-gray-500 dark:text-gray-500">{{ $day['low'] }}°</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </x-card.card>
    </div>
</x-app-layout>

