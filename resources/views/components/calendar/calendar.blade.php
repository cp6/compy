@props([
    'view' => 'month', // 'month', 'week', 'day'
    'currentDate' => null,
])

@php
    $currentDate = $currentDate ? \Carbon\Carbon::parse($currentDate) : \Carbon\Carbon::now();
    $viewClasses = match($view) {
        'week' => 'calendar-week-view',
        'day' => 'calendar-day-view',
        default => 'calendar-month-view',
    };
@endphp

<div 
    class="calendar-container {{ $viewClasses }}"
    x-data="{
        currentDate: '{{ $currentDate->format('Y-m-d') }}',
        view: '{{ $view }}',
        events: @js($events ?? []),
        init() {
            // Initialize calendar logic
        }
    }"
    {{ $attributes }}
>
    {{ $slot }}
</div>

