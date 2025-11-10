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
        <h3 class="px-3 text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-3 mt-6 first:mt-0">
            {{ $title }}
        </h3>
    @endif
    <div class="space-y-1.5">
        {{ $slot }}
    </div>
</div>

