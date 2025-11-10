@props([
    'allowMultiple' => false,
    'defaultOpen' => null,
])

@php
    $defaultOpenIds = $defaultOpen ? (is_array($defaultOpen) ? $defaultOpen : [$defaultOpen]) : [];
@endphp

<div 
    x-data="{ 
        openItems: @js($defaultOpenIds),
        toggleItem(id) {
            if (this.openItems.includes(id)) {
                this.openItems = this.openItems.filter(item => item !== id);
            } else {
                if (@js($allowMultiple)) {
                    this.openItems.push(id);
                } else {
                    this.openItems = [id];
                }
            }
        },
        isOpen(id) {
            return this.openItems.includes(id);
        }
    }"
    class="accordion-container space-y-2"
    {{ $attributes }}
>
    {{ $slot }}
</div>

