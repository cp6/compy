@props([
    'dismissible' => true,
])

@php
    $alerts = [];
    
    if (session('success')) {
        $alerts[] = ['type' => 'success', 'message' => session('success')];
    }
    
    if (session('error')) {
        $alerts[] = ['type' => 'error', 'message' => session('error')];
    }
    
    if (session('warning')) {
        $alerts[] = ['type' => 'warning', 'message' => session('warning')];
    }
    
    if (session('info')) {
        $alerts[] = ['type' => 'info', 'message' => session('info')];
    }
    
    // Also check for 'notice' as an alias for 'info'
    if (session('notice')) {
        $alerts[] = ['type' => 'info', 'message' => session('notice')];
    }
@endphp

@if(!empty($alerts))
    <div class="space-y-3 mb-6">
        @foreach($alerts as $alert)
            <x-alert.alert type="{{ $alert['type'] }}" :dismissible="$dismissible">
                {{ $alert['message'] }}
            </x-alert.alert>
        @endforeach
    </div>
@endif

