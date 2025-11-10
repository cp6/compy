@props([
    'currentDate' => null,
    'events' => [],
])

@php
    $currentDate = $currentDate ? \Carbon\Carbon::parse($currentDate) : \Carbon\Carbon::now();
    $startOfWeek = $currentDate->copy()->startOfWeek(\Carbon\Carbon::SUNDAY);
    $endOfWeek = $currentDate->copy()->endOfWeek(\Carbon\Carbon::SATURDAY);
    
    $days = [];
    $currentDay = $startOfWeek->copy();
    while ($currentDay <= $endOfWeek) {
        $days[] = $currentDay->copy();
        $currentDay->addDay();
    }
    
    $weekDays = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
@endphp

<div class="calendar-week-view">
    {{-- Week Header --}}
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100">
            {{ $startOfWeek->format('M d') }} - {{ $endOfWeek->format('M d, Y') }}
        </h2>
        <div class="flex items-center gap-2">
            <button 
                type="button"
                class="p-2 rounded-lg bg-gray-100 dark:bg-gray-800 hover:bg-gray-200 dark:hover:bg-gray-700 text-gray-700 dark:text-gray-300 transition-colors"
                x-on:click="currentDate = '{{ $currentDate->copy()->subWeek()->format('Y-m-d') }}'"
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
                x-on:click="currentDate = '{{ $currentDate->copy()->addWeek()->format('Y-m-d') }}'"
            >
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>
        </div>
    </div>

    {{-- Week Grid --}}
    <div class="grid grid-cols-7 gap-2">
        @foreach($days as $index => $day)
            @php
                $isToday = $day->isToday();
                $dayEvents = collect($events)->filter(function($event) use ($day) {
                    $eventDate = \Carbon\Carbon::parse($event['date'] ?? $event['start'] ?? '');
                    return $eventDate && $eventDate->format('Y-m-d') === $day->format('Y-m-d');
                })->sortBy(function($event) {
                    return $event['time'] ?? $event['start'] ?? '';
                });
            @endphp
            <div class="flex flex-col">
                {{-- Day Header --}}
                <div class="text-center mb-2">
                    <div class="text-sm font-medium text-gray-600 dark:text-gray-400">
                        {{ $weekDays[$index] }}
                    </div>
                    <div class="mt-1 text-lg font-bold 
                        {{ $isToday ? 'text-dodger-blue-600 dark:text-dodger-blue-400' : 'text-gray-900 dark:text-gray-100' }}
                        {{ $isToday ? 'bg-dodger-blue-100 dark:bg-dodger-blue-900/30 rounded-full w-10 h-10 flex items-center justify-center mx-auto' : '' }}">
                        {{ $day->day }}
                    </div>
                </div>
                
                {{-- Day Events --}}
                <div class="flex-1 min-h-[400px] p-2 border border-gray-200 dark:border-gray-700 rounded-lg 
                    {{ $isToday ? 'ring-2 ring-dodger-blue-500 dark:ring-dodger-blue-400 bg-dodger-blue-50/30 dark:bg-dodger-blue-900/10' : 'bg-white dark:bg-gray-800' }}">
                    <div class="space-y-2">
                        @foreach($dayEvents as $event)
                            <x-calendar.event-item 
                                :event="$event"
                                size="default"
                            />
                        @endforeach
                        @if($dayEvents->isEmpty())
                            <div class="text-xs text-gray-400 dark:text-gray-600 text-center py-4">
                                No events
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

