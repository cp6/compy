@props([
    'variant' => 'default', // 'default', 'pills', 'underline', 'bordered'
    'orientation' => 'horizontal', // 'horizontal', 'vertical'
    'defaultTab' => null,
])

@php
    $baseClasses = 'flex';
    $variantClasses = match($variant) {
        'pills' => 'gap-2',
        'underline' => 'border-b border-gray-200 dark:border-gray-700',
        'bordered' => 'border border-gray-200 dark:border-gray-700 rounded-lg p-1 bg-gray-50 dark:bg-gray-800/50',
        default => 'gap-1',
    };
    $orientationClasses = $orientation === 'vertical' ? 'flex-col' : 'flex-row';
    $tabsClasses = $baseClasses . ' ' . $variantClasses . ' ' . $orientationClasses;
@endphp

<div 
    x-data="{ 
        activeTab: '{{ $defaultTab ?? '' }}',
        setActiveTab(tabId) {
            this.activeTab = tabId;
            // Dispatch event for child components
            this.$dispatch('tab-changed', tabId);
        },
        init() {
            // Listen for tab change requests from children
            this.$watch('activeTab', (value) => {
                this.$dispatch('tab-changed', value);
            });
        }
    }"
    class="tabs-container"
    {{ $attributes }}
    x-id="['tabs']"
>
    <div class="{{ $tabsClasses }}">
        @if(isset($tabs))
            {{ $tabs }}
        @else
            {{ $slot }}
        @endif
    </div>
    @if(isset($panels))
        <div class="tabs-panels">
            {{ $panels }}
        </div>
    @endif
</div>

