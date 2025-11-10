@props([
    'id' => null,
    'label' => '',
])

@php
    if (!$id) {
        $id = 'panel-' . uniqid();
    }
@endphp

<div
    x-data="{
        panelId: '{{ $id }}',
        isActive: false,
        updateActive() {
            const tabsContainer = this.$el.closest('[x-data*=\'activeTab\']');
            if (tabsContainer) {
                const parentData = Alpine.$data(tabsContainer);
                this.isActive = parentData && parentData.activeTab === this.panelId;
            }
        },
        init() {
            this.updateActive();
            // Poll for changes (Alpine will optimize this)
            setInterval(() => this.updateActive(), 100);
        }
    }"
    @tab-changed.window="updateActive()"
    x-show="isActive"
    x-transition:enter="transition ease-out duration-200"
    x-transition:enter-start="opacity-0 transform translate-y-2"
    x-transition:enter-end="opacity-100 transform translate-y-0"
    x-transition:leave="transition ease-in duration-150"
    x-transition:leave-start="opacity-100 transform translate-y-0"
    x-transition:leave-end="opacity-0 transform translate-y-2"
    role="tabpanel"
    :aria-hidden="!isActive"
    class="mt-4"
>
    {{ $slot }}
</div>

