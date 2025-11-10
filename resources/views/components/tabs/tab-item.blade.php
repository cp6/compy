@props([
    'id' => null,
    'label' => '',
    'icon' => null,
    'badge' => null,
    'disabled' => false,
])

@php
    if (!$id) {
        $id = 'tab-' . uniqid();
    }
    
    $baseClasses = 'px-4 py-2 text-sm font-medium transition-all duration-200 rounded-lg';
    $activeClasses = 'bg-dodger-blue-600 text-white dark:bg-dodger-blue-500';
    $inactiveClasses = 'text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 hover:bg-gray-100 dark:hover:bg-gray-800';
    $disabledClasses = 'opacity-50 cursor-not-allowed';
@endphp

<button
    type="button"
    x-data="{ 
        tabId: '{{ $id }}',
        isActive: false,
        updateActive() {
            const tabsContainer = this.$el.closest('[x-data*=\'activeTab\']');
            if (tabsContainer) {
                const parentData = Alpine.$data(tabsContainer);
                this.isActive = parentData && parentData.activeTab === this.tabId;
            }
        },
        init() {
            this.updateActive();
            // Poll for changes (Alpine will optimize this)
            setInterval(() => this.updateActive(), 100);
        }
    }"
    @click="
        const tabsContainer = $el.closest('[x-data*=\'activeTab\']');
        if (tabsContainer) {
            const parentData = Alpine.$data(tabsContainer);
            if (parentData && parentData.setActiveTab) {
                parentData.setActiveTab('{{ $id }}');
            }
        }
    "
    @tab-changed.window="updateActive()"
    :class="isActive ? '{{ $activeClasses }}' : '{{ $inactiveClasses }}'"
    @if($disabled) disabled @endif
    class="{{ $baseClasses }} {{ $disabled ? $disabledClasses : '' }}"
    role="tab"
    :aria-selected="isActive"
    :tabindex="isActive ? 0 : -1"
>
    <div class="flex items-center gap-2">
        @if($icon)
            <span class="flex-shrink-0">
                {!! $icon !!}
            </span>
        @endif
        <span>{{ $label }}</span>
        @if($badge)
            <span class="px-2 py-0.5 text-xs font-medium rounded-full bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-300">
                {{ $badge }}
            </span>
        @endif
    </div>
</button>

