@props(['title'])

<div 
    x-data="{
        hasVisibleItems() {
            if (!searchQuery) return true;
            const items = $el.querySelectorAll('a, button');
            return Array.from(items).some(item => {
                const text = item.textContent.trim();
                return matchesSearch(text);
            });
        }
    }"
    x-show="hasVisibleItems()"
    class="mb-4"
    style="display: none;"
>
    @if(isset($title))
        <h3 class="px-2 text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-2">
            {{ $title }}
        </h3>
    @endif
    <div class="space-y-1">
        {{ $slot }}
    </div>
</div>

