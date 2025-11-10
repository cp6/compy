<x-app-layout>
    <x-slot name="title">Calendar Demo</x-slot>
    <x-slot name="metaDescription">A comprehensive demo of calendar components for displaying events and scheduling.</x-slot>
    <x-slot name="metaKeywords">calendar, events, schedule, date, time, components, demo</x-slot>

    <x-slot name="header">
        <x-breadcrumb :items="[
            ['label' => 'Home', 'url' => route('dashboard')],
            ['label' => 'Calendar Demo', 'url' => '#'],
        ]" />
    </x-slot>

    <x-slot name="pageTitle">
        Calendar Demo
    </x-slot>

    <x-slot name="pageSubtitle">
        Interactive calendar views with event management
    </x-slot>

    <x-alert.alerts />

    @php
        $sampleEvents = [
            [
                'title' => 'Team Meeting',
                'date' => now()->format('Y-m-d'),
                'time' => '10:00 AM',
                'end' => '11:00 AM',
                'description' => 'Weekly team sync meeting',
                'color' => 'dodger-blue',
                'variant' => 'primary',
            ],
            [
                'title' => 'Project Deadline',
                'date' => now()->addDays(3)->format('Y-m-d'),
                'time' => '5:00 PM',
                'description' => 'Submit final project deliverables',
                'color' => 'red',
                'variant' => 'danger',
            ],
            [
                'title' => 'Client Presentation',
                'date' => now()->addDays(5)->format('Y-m-d'),
                'time' => '2:00 PM',
                'end' => '3:30 PM',
                'description' => 'Present quarterly results to stakeholders',
                'color' => 'purple',
            ],
            [
                'title' => 'Lunch with Team',
                'date' => now()->addDays(7)->format('Y-m-d'),
                'time' => '12:00 PM',
                'end' => '1:00 PM',
                'description' => 'Team lunch at the new restaurant',
                'color' => 'green',
                'variant' => 'success',
            ],
            [
                'title' => 'Code Review',
                'date' => now()->addDays(2)->format('Y-m-d'),
                'time' => '3:00 PM',
                'end' => '4:00 PM',
                'description' => 'Review pull requests and provide feedback',
                'color' => 'indigo',
            ],
            [
                'title' => 'Training Session',
                'date' => now()->addDays(10)->format('Y-m-d'),
                'time' => '9:00 AM',
                'end' => '12:00 PM',
                'description' => 'New framework training workshop',
                'color' => 'yellow',
                'variant' => 'warning',
            ],
            [
                'title' => 'Product Launch',
                'date' => now()->addDays(14)->format('Y-m-d'),
                'time' => '10:00 AM',
                'description' => 'Launch new product features',
                'color' => 'pink',
            ],
            [
                'title' => 'Budget Review',
                'date' => now()->addDays(1)->format('Y-m-d'),
                'time' => '11:00 AM',
                'end' => '12:30 PM',
                'description' => 'Quarterly budget review meeting',
                'color' => 'dodger-blue',
            ],
        ];
    @endphp

    <div class="space-y-8" x-data="{ view: 'month' }">
        {{-- View Toggle --}}
        <div class="flex items-center justify-end gap-2">
            <button
                type="button"
                @click="view = 'month'"
                :class="view === 'month' ? 'bg-dodger-blue-500 text-white' : 'bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-300'"
                class="px-4 py-2 rounded-lg font-medium transition-colors"
            >
                Month
            </button>
            <button
                type="button"
                @click="view = 'week'"
                :class="view === 'week' ? 'bg-dodger-blue-500 text-white' : 'bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-300'"
                class="px-4 py-2 rounded-lg font-medium transition-colors"
            >
                Week
            </button>
            <button
                type="button"
                @click="view = 'day'"
                :class="view === 'day' ? 'bg-dodger-blue-500 text-white' : 'bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-300'"
                class="px-4 py-2 rounded-lg font-medium transition-colors"
            >
                Day
            </button>
        </div>

        {{-- Month View --}}
        <section x-show="view === 'month'" x-transition>
            <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-4">Month View</h2>
            <x-card.card variant="gradient">
                <x-calendar.month-view :events="$sampleEvents" />
            </x-card.card>
        </section>

        {{-- Week View --}}
        <section x-show="view === 'week'" x-transition style="display: none;">
            <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-4">Week View</h2>
            <x-card.card variant="gradient">
                <x-calendar.week-view :events="$sampleEvents" />
            </x-card.card>
        </section>

        {{-- Day View --}}
        <section x-show="view === 'day'" x-transition style="display: none;">
            <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-4">Day View</h2>
            <x-card.card variant="gradient">
                <x-calendar.day-view :events="$sampleEvents" />
            </x-card.card>
        </section>

        {{-- Event Examples --}}
        <section>
            <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-4">Event Examples</h2>
            <x-card.card variant="gradient">
                <div class="space-y-4">
                    <div>
                        <h3 class="text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">Different Event Types</h3>
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3">
                            <x-calendar.event-item 
                                :event="['title' => 'Primary Event', 'time' => '10:00 AM', 'color' => 'dodger-blue', 'variant' => 'primary']"
                                size="default"
                            />
                            <x-calendar.event-item 
                                :event="['title' => 'Success Event', 'time' => '2:00 PM', 'color' => 'green', 'variant' => 'success']"
                                size="default"
                            />
                            <x-calendar.event-item 
                                :event="['title' => 'Warning Event', 'time' => '4:00 PM', 'color' => 'yellow', 'variant' => 'warning']"
                                size="default"
                            />
                            <x-calendar.event-item 
                                :event="['title' => 'Danger Event', 'time' => '6:00 PM', 'color' => 'red', 'variant' => 'danger']"
                                size="default"
                            />
                            <x-calendar.event-item 
                                :event="['title' => 'Purple Event', 'time' => '8:00 AM', 'color' => 'purple']"
                                size="default"
                            />
                            <x-calendar.event-item 
                                :event="['title' => 'Pink Event', 'time' => '12:00 PM', 'color' => 'pink']"
                                size="default"
                            />
                        </div>
                    </div>
                    
                    <div class="pt-4 border-t border-gray-200 dark:border-gray-700">
                        <h3 class="text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">Event Sizes</h3>
                        <div class="space-y-2">
                            <x-calendar.event-item 
                                :event="['title' => 'Small Event', 'time' => '9:00 AM', 'color' => 'dodger-blue']"
                                size="small"
                            />
                            <x-calendar.event-item 
                                :event="['title' => 'Default Event', 'time' => '10:00 AM', 'color' => 'green']"
                                size="default"
                            />
                            <x-calendar.event-item 
                                :event="['title' => 'Large Event', 'time' => '11:00 AM', 'color' => 'purple']"
                                size="large"
                            />
                        </div>
                    </div>
                </div>
            </x-card.card>
        </section>
    </div>
</x-app-layout>

