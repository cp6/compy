@props([
    'title' => 'No items found',
    'description' => 'Get started by creating your first item.',
    'actionLabel' => 'Create Item',
    'actionHref' => null,
    'actionRoute' => null,
    'actionRouteParams' => [],
])

@php
    $actionUrl = $actionHref ?? ($actionRoute ? route($actionRoute, $actionRouteParams) : null);
@endphp

<div class="text-center py-16">
    @if(isset($icon))
        <div class="mx-auto w-16 h-16 rounded-full bg-gray-100 dark:bg-gray-800 flex items-center justify-center mb-4">
            <div class="w-8 h-8 text-gray-400">
                {{ $icon }}
            </div>
        </div>
    @elseif(isset($slot) && $slot->isNotEmpty())
        <div class="mx-auto w-16 h-16 rounded-full bg-gray-100 dark:bg-gray-800 flex items-center justify-center mb-4">
            <div class="w-8 h-8 text-gray-400">
                {{ $slot }}
            </div>
        </div>
    @endif
    
    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-1">{{ $title }}</h3>
    <p class="text-sm text-gray-500 dark:text-gray-400 mb-6">{{ $description }}</p>
    
    @if($actionUrl)
        <x-button.primary href="{{ $actionUrl }}">
            @if(isset($actionIcon))
                {{ $actionIcon }}
            @endif
            {{ $actionLabel }}
        </x-button.primary>
    @endif
</div>

