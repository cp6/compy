@php
    // Demo user data
    $demoEmail = 'john.doe@example.com';
    $demoName = 'John Doe';
    
    // Generate avatar URL using UI Avatars - generates avatar with initials
    // Color is determined by: config('app.avatar_ui_background', 'random')
    // If 'random', a deterministic color is picked based on name hash
    $background = config('app.avatar_ui_background', 'random');
    
    // If 'random', generate deterministic color based on name hash (same as User model)
    if ($background === 'random') {
        $colorPalette = [
            '264653', // Dark teal
            '2a9d8f', // Teal
            'e9c46a', // Yellow
            'f4a261', // Orange
            'e76f51', // Coral
            '92A1C6', // Blue-gray
            '146A7C', // Dark blue
            'F0AB3D', // Gold
            'C271B4', // Purple
            'C20D90', // Magenta
        ];
        $hash = crc32($demoName);
        $colorIndex = abs($hash) % count($colorPalette);
        $background = $colorPalette[$colorIndex];
    }
    
    $avatarUrl = "https://ui-avatars.com/api/?name=" . urlencode($demoName) . "&background={$background}&size=256&bold=true&color=fff&format=svg";
    
    $user = [
        'name' => 'John Doe',
        'email' => $demoEmail,
        'role' => 'Senior Developer',
        'bio' => 'Passionate full-stack developer with 8+ years of experience building scalable web applications. Love working with Laravel, React, and modern web technologies.',
        'avatar' => $avatarUrl,
        'avatarText' => 'JD',
        'location' => 'San Francisco, CA',
        'website' => 'https://johndoe.dev',
        'joined' => 'January 2020',
        'stats' => [
            ['label' => 'Projects', 'value' => '42'],
            ['label' => 'Followers', 'value' => '1.2K'],
            ['label' => 'Following', 'value' => '356'],
        ],
        'socialLinks' => [
            [
                'icon' => '<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"/></svg>',
                'url' => '#',
                'label' => 'Twitter',
            ],
            [
                'icon' => '<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>',
                'url' => '#',
                'label' => 'GitHub',
            ],
            [
                'icon' => '<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>',
                'url' => '#',
                'label' => 'LinkedIn',
            ],
        ],
    ];
    
    $skills = ['Laravel', 'PHP', 'JavaScript', 'React', 'Vue.js', 'MySQL', 'PostgreSQL', 'Redis', 'Docker', 'AWS'];
    $recentActivity = [
        ['type' => 'project', 'title' => 'Created new project "E-commerce Platform"', 'time' => '2 hours ago'],
        ['type' => 'update', 'title' => 'Updated profile information', 'time' => '1 day ago'],
        ['type' => 'achievement', 'title' => 'Earned "Code Master" badge', 'time' => '3 days ago'],
        ['type' => 'project', 'title' => 'Completed "Task Management System"', 'time' => '1 week ago'],
    ];
@endphp

<x-app-layout>
    <x-slot name="title">User Profile Demo</x-slot>
    <x-slot name="metaDescription">Comprehensive user profile demo showcasing various profile layouts, components, and information displays.</x-slot>
    <x-slot name="metaKeywords">profile, user profile, profile card, demo, components</x-slot>

    <x-slot name="header">
        <x-breadcrumb :items="[
            ['label' => 'Home', 'url' => route('dashboard')],
            ['label' => 'User Profile Demo', 'url' => '#'],
        ]" />
    </x-slot>

    <x-slot name="pageTitle">
        User Profile Demo
    </x-slot>

    <x-slot name="pageSubtitle">
        Comprehensive profile layouts and components showcase
    </x-slot>

    <x-alert.alerts />

    <div class="space-y-6">
        {{-- Profile Card Variants --}}
        <div>
            <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-4">Profile Card Variants</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                {{-- Default Profile Card --}}
                <x-card.profile
                    :name="$user['name']"
                    :role="$user['role']"
                    :bio="$user['bio']"
                    :avatar="$user['avatar']"
                    :avatarText="$user['avatarText']"
                    variant="default"
                />

                {{-- Gradient Profile Card with Stats --}}
                <x-card.profile
                    :name="$user['name']"
                    :role="$user['role']"
                    :bio="$user['bio']"
                    :avatar="$user['avatar']"
                    :avatarText="$user['avatarText']"
                    variant="gradient"
                    :showStats="true"
                    :stats="$user['stats']"
                />

                {{-- Glass Profile Card with Social Links --}}
                <x-card.profile
                    :name="$user['name']"
                    :role="$user['role']"
                    :bio="$user['bio']"
                    :avatar="$user['avatar']"
                    :avatarText="$user['avatarText']"
                    variant="glass"
                    :showSocial="true"
                    :socialLinks="$user['socialLinks']"
                />
            </div>
        </div>

        {{-- Full Profile Layout --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            {{-- Left Sidebar - Profile Card --}}
            <div class="lg:col-span-1">
                <x-card.profile
                    :name="$user['name']"
                    :role="$user['role']"
                    :bio="$user['bio']"
                    :avatar="$user['avatar']"
                    :avatarText="$user['avatarText']"
                    avatarSize="xl"
                    variant="gradient"
                    :showStats="true"
                    :stats="$user['stats']"
                    :showSocial="true"
                    :socialLinks="$user['socialLinks']"
                >
                    <x-slot name="actions">
                        <div class="flex flex-col gap-2 mt-4">
                            <x-button.primary class="w-full">Edit Profile</x-button.primary>
                            <x-button.secondary class="w-full">Message</x-button.secondary>
                        </div>
                    </x-slot>
                </x-card.profile>

                {{-- Additional Info Card --}}
                <x-card.card variant="gradient" class="mt-6" title="Additional Information">
                    <div class="space-y-4">
                        <div class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <div>
                                <p class="text-sm font-medium text-gray-900 dark:text-gray-100">Location</p>
                                <p class="text-sm text-gray-600 dark:text-gray-400">{{ $user['location'] }}</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                            </svg>
                            <div>
                                <p class="text-sm font-medium text-gray-900 dark:text-gray-100">Website</p>
                                <a href="{{ $user['website'] }}" class="text-sm text-dodger-blue-600 dark:text-dodger-blue-400 hover:underline">{{ $user['website'] }}</a>
                            </div>
                        </div>

                        <div class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <div>
                                <p class="text-sm font-medium text-gray-900 dark:text-gray-100">Joined</p>
                                <p class="text-sm text-gray-600 dark:text-gray-400">{{ $user['joined'] }}</p>
                            </div>
                        </div>
                    </div>
                </x-card.card>
            </div>

            {{-- Right Content Area --}}
            <div class="lg:col-span-2 space-y-6">
                {{-- About Section --}}
                <x-card.card variant="gradient" title="About">
                    <p class="text-gray-700 dark:text-gray-300">
                        {{ $user['bio'] }}
                    </p>
                </x-card.card>

                {{-- Skills Section --}}
                <x-card.card variant="gradient" title="Skills">
                    <div class="flex flex-wrap gap-2">
                        @foreach($skills as $skill)
                            <span class="px-3 py-1.5 bg-dodger-blue-100 dark:bg-dodger-blue-900/30 text-dodger-blue-700 dark:text-dodger-blue-300 rounded-lg text-sm font-medium">
                                {{ $skill }}
                            </span>
                        @endforeach
                    </div>
                </x-card.card>

                {{-- Recent Activity --}}
                <x-card.card variant="gradient" title="Recent Activity">
                    <div class="space-y-4">
                        @foreach($recentActivity as $activity)
                            <div class="flex items-start gap-4 pb-4 border-b border-gray-200 dark:border-gray-700 last:border-0 last:pb-0">
                                <div class="flex-shrink-0 w-10 h-10 rounded-full bg-gradient-to-br from-dodger-blue-500 to-dodger-blue-600 dark:from-dodger-blue-600 dark:to-dodger-blue-700 flex items-center justify-center text-white">
                                    @if($activity['type'] === 'project')
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                        </svg>
                                    @elseif($activity['type'] === 'update')
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    @else
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                                        </svg>
                                    @endif
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-900 dark:text-gray-100">
                                        {{ $activity['title'] }}
                                    </p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                                        {{ $activity['time'] }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </x-card.card>
            </div>
        </div>

        {{-- Compact Profile Layout --}}
        <div>
            <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-4">Compact Profile Layout</h2>
            <x-card.card variant="gradient">
                <div class="flex flex-col sm:flex-row items-start sm:items-center gap-6">
                    @if($user['avatar'])
                        <img src="{{ $user['avatar'] }}" alt="{{ $user['name'] }}" class="w-20 h-20 rounded-full object-cover border-4 border-white dark:border-gray-800 shadow-xl ring-4 ring-dodger-blue-100 dark:ring-dodger-blue-900/30 flex-shrink-0">
                    @else
                        <div class="w-20 h-20 rounded-full bg-gradient-to-br from-dodger-blue-500 to-dodger-blue-600 dark:from-dodger-blue-600 dark:to-dodger-blue-700 flex items-center justify-center text-white font-bold text-2xl flex-shrink-0">
                            {{ $user['avatarText'] }}
                        </div>
                    @endif
                    <div class="flex-1 min-w-0">
                        <h3 class="text-xl font-bold text-gray-900 dark:text-gray-100">{{ $user['name'] }}</h3>
                        <p class="text-sm text-dodger-blue-600 dark:text-dodger-blue-400 font-medium mt-1">{{ $user['role'] }}</p>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mt-2">{{ $user['bio'] }}</p>
                    </div>
                    <div class="flex gap-2 flex-shrink-0">
                        <x-button.primary>Follow</x-button.primary>
                        <x-button.secondary>Message</x-button.secondary>
                    </div>
                </div>
            </x-card.card>
        </div>

        {{-- Component Usage --}}
        <x-card.card variant="gradient" title="Component Usage">
            <div class="bg-gray-50 dark:bg-gray-900/50 rounded-lg p-4 overflow-x-auto">
                <pre class="text-sm text-gray-800 dark:text-gray-200"><code>&lt;!-- Profile Card --&gt;
&lt;x-card.profile
    name="John Doe"
    role="Senior Developer"
    bio="Passionate developer..."
    :avatar="$user->avatar"
    avatarText="JD"
    variant="gradient"
    :showStats="true"
    :stats="[['label' => 'Projects', 'value' => '42']]"
    :showSocial="true"
    :socialLinks="[...]"
/&gt;

&lt;!-- Profile Card with Actions --&gt;
&lt;x-card.profile
    name="John Doe"
    role="Senior Developer"
    :avatar="$user->avatar"
    avatarText="JD"
    variant="gradient"
&gt;
    &lt;x-slot name="actions"&gt;
        &lt;x-button.primary&gt;Edit Profile&lt;/x-button.primary&gt;
    &lt;/x-slot&gt;
&lt;/x-card.profile&gt;</code></pre>
            </div>
        </x-card.card>
    </div>
</x-app-layout>


