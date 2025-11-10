@props([
    'currentDate' => null,
    'events' => [],
])

@php
    $currentDate = $currentDate ? \Carbon\Carbon::parse($currentDate) : \Carbon\Carbon::now();
    $startOfMonth = $currentDate->copy()->startOfMonth();
    $endOfMonth = $currentDate->copy()->endOfMonth();
    $startOfCalendar = $startOfMonth->copy()->startOfWeek(\Carbon\Carbon::SUNDAY);
    $endOfCalendar = $endOfMonth->copy()->endOfWeek(\Carbon\Carbon::SATURDAY);
    
    $days = [];
    $currentDay = $startOfCalendar->copy();
    while ($currentDay <= $endOfCalendar) {
        $days[] = $currentDay->copy();
        $currentDay->addDay();
    }
    
    $weekDays = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
@endphp

<div class="calendar-month-view">
    {{-- Calendar Header --}}
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100">
            {{ $currentDate->format('F Y') }}
        </h2>
        <div class="flex items-center gap-2">
            <button 
                type="button"
                class="p-2 rounded-lg bg-gray-100 dark:bg-gray-800 hover:bg-gray-200 dark:hover:bg-gray-700 text-gray-700 dark:text-gray-300 transition-colors"
                x-on:click="currentDate = '{{ $currentDate->copy()->subMonth()->format('Y-m-d') }}'"
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
                x-on:click="currentDate = '{{ $currentDate->copy()->addMonth()->format('Y-m-d') }}'"
            >
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>
        </div>
    </div>

    {{-- Week Day Headers --}}
    <div class="grid grid-cols-7 gap-1 mb-2">
        @foreach($weekDays as $day)
            <div class="text-center text-sm font-semibold text-gray-600 dark:text-gray-400 py-2">
                {{ $day }}
            </div>
        @endforeach
    </div>

    {{-- Calendar Grid --}}
    <div class="grid grid-cols-7 gap-1">
        @foreach($days as $day)
            @php
                $isCurrentMonth = $day->month === $currentDate->month;
                $isToday = $day->isToday();
                $dayEvents = collect($events)->filter(function($event) use ($day) {
                    $eventDate = \Carbon\Carbon::parse($event['date'] ?? $event['start'] ?? '');
                    return $eventDate && $eventDate->format('Y-m-d') === $day->format('Y-m-d');
                });
            @endphp
            <div 
                class="min-h-[100px] sm:min-h-[120px] p-2 border border-gray-200 dark:border-gray-700 rounded-lg 
                       {{ $isCurrentMonth ? 'bg-white dark:bg-gray-800' : 'bg-gray-50 dark:bg-gray-900/50' }}
                       {{ $isToday ? 'ring-2 ring-dodger-blue-500 dark:ring-dodger-blue-400' : '' }}
                       hover:bg-gray-50 dark:hover:bg-gray-800/70 transition-colors"
            >
                <div class="flex items-center justify-between mb-1">
                    <span class="text-sm font-medium 
                        {{ $isCurrentMonth ? 'text-gray-900 dark:text-gray-100' : 'text-gray-400 dark:text-gray-600' }}
                        {{ $isToday ? 'text-dodger-blue-600 dark:text-dodger-blue-400 font-bold' : '' }}">
                        {{ $day->day }}
                    </span>
                </div>
                <div class="space-y-1">
                    @foreach($dayEvents->take(3) as $event)
                        <x-calendar.event-item 
                            :event="$event"
                            size="small"
                        />
                    @endforeach
                    @if($dayEvents->count() > 3)
                        <div class="text-xs text-gray-500 dark:text-gray-400 font-medium">
                            +{{ $dayEvents->count() - 3 }} more
                        </div>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</div>

