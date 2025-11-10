@props([
    'currentDate' => null,
    'events' => [],
])

@php
    $currentDate = $currentDate ? \Carbon\Carbon::parse($currentDate) : \Carbon\Carbon::now();
    $dayEvents = collect($events)->filter(function($event) use ($currentDate) {
        $eventDate = \Carbon\Carbon::parse($event['date'] ?? $event['start'] ?? '');
        return $eventDate && $eventDate->format('Y-m-d') === $currentDate->format('Y-m-d');
    })->sortBy(function($event) {
        return $event['time'] ?? $event['start'] ?? '';
    });
    
    $hours = range(0, 23);
@endphp

<div class="calendar-day-view">
    {{-- Day Header --}}
    <div class="flex items-center justify-between mb-6">
        <div>
            <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100">
                {{ $currentDate->format('l, F d, Y') }}
            </h2>
            <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">
                {{ $dayEvents->count() }} {{ Str::plural('event', $dayEvents->count()) }}
            </p>
        </div>
        <div class="flex items-center gap-2">
            <button 
                type="button"
                class="p-2 rounded-lg bg-gray-100 dark:bg-gray-800 hover:bg-gray-200 dark:hover:bg-gray-700 text-gray-700 dark:text-gray-300 transition-colors"
                x-on:click="currentDate = '{{ $currentDate->copy()->subDay()->format('Y-m-d') }}'"
            >
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>
            <button 
                type="button"
                class="p-2 rounded-lg bg-gray-100 dark:bg-gray-800 hover:bg-gray-200 dark:hover:bg-gray-700 text-gray-700 dark:text-gray-300 transition-colors"
                x-on:click="currentDate = '{{ \Carbon\Carbon::now()->format('Y-m-d') }}'"
            >
                Today
            </button>
            <button 
                type="button"
                class="p-2 rounded-lg bg-gray-100 dark:bg-gray-800 hover:bg-gray-200 dark:hover:bg-gray-700 text-gray-700 dark:text-gray-300 transition-colors"
                x-on:click="currentDate = '{{ $currentDate->copy()->addDay()->format('Y-m-d') }}'"
            >
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>
        </div>
    </div>

    {{-- Day Timeline --}}
    <div class="grid grid-cols-12 gap-4">
        {{-- Time Column --}}
        <div class="col-span-2 space-y-4">
            @foreach($hours as $hour)
                <div class="text-right text-sm text-gray-600 dark:text-gray-400 pr-4 pt-2">
                    {{ str_pad($hour, 2, '0', STR_PAD_LEFT) }}:00
                </div>
            @endforeach
        </div>
        
        {{-- Events Column --}}
        <div class="col-span-10">
            <div class="space-y-4">
                @if($dayEvents->isEmpty())
                    <div class="text-center py-12 text-gray-400 dark:text-gray-600">
                        <svg class="w-16 h-16 mx-auto mb-4 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <p class="text-lg font-medium">No events scheduled for this day</p>
                    </div>
                @else
                    @foreach($dayEvents as $event)
                        <div class="p-4 border border-gray-200 dark:border-gray-700 rounded-lg bg-white dark:bg-gray-800 hover:shadow-md transition-shadow">
                            <div class="flex items-start justify-between">
                                <div class="flex-1">
                                    <div class="flex items-center gap-2 mb-2">
                                        <x-calendar.event-item 
                                            :event="$event"
                                            size="small"
                                        />
                                    </div>
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-1">
                                        {{ $event['title'] ?? 'Untitled Event' }}
                                    </h3>
                                    @if(isset($event['description']))
                                        <p class="text-sm text-gray-600 dark:text-gray-400">
                                            {{ $event['description'] }}
                                        </p>
                                    @endif
                                    @if(isset($event['time']) || isset($event['start']))
                                        <p class="text-xs text-gray-500 dark:text-gray-500 mt-2">
                                            <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            {{ $event['time'] ?? $event['start'] }}
                                            @if(isset($event['end']))
                                                - {{ $event['end'] }}
                                            @endif
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>

