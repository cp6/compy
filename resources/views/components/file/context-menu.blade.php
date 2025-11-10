@props([
    'name' => '',
    'type' => 'file',
    'x' => 0,
    'y' => 0,
])

<div
    x-data="{ 
        show: false,
        x: 0,
        y: 0,
        name: '',
        type: 'file'
    }"
    x-on:file-context-menu.window="
        show = true;
        x = $event.detail.event.clientX;
        y = $event.detail.event.clientY;
        name = $event.detail.name;
        type = $event.detail.type;
    "
    x-on:click.outside="show = false"
    x-on:keydown.escape.window="show = false"
    x-show="show"
    class="fixed z-[10000] w-48 bg-white dark:bg-gray-800 rounded-lg shadow-xl border border-gray-200 dark:border-gray-700 py-1"
    style="display: none; left: 0; top: 0;"
    x-bind:style="`left: ${x}px; top: ${y}px;`"
    x-cloak
>
    <x-dropdown.item 
        href="#" 
        icon='<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" /></svg>'
        @click.prevent="$dispatch('file-rename', { name: name }); show = false"
    >
        Rename
    </x-dropdown.item>
    
    <x-dropdown.item 
        href="#" 
        icon='<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" /></svg>'
        @click.prevent="$dispatch('file-copy', { name: name }); show = false"
    >
        Copy
    </x-dropdown.item>
    
    <x-dropdown.item 
        href="#" 
        icon='<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" /></svg>'
        @click.prevent="$dispatch('file-download', { name: name }); show = false"
    >
        Download
    </x-dropdown.item>
    
    <div class="border-t border-gray-200 dark:border-gray-700 my-1"></div>
    
    <x-dropdown.item 
        href="#" 
        danger
        icon='<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>'
        @click.prevent="$dispatch('file-delete', { name: name }); show = false"
    >
        Delete
    </x-dropdown.item>
</div>

