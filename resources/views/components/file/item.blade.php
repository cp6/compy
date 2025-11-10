@props([
    'name' => '',
    'type' => 'file', // 'file', 'folder'
    'size' => null,
    'modified' => null,
    'icon' => null,
    'selected' => false,
    'view' => 'grid', // 'grid', 'list'
])

@php
    $baseClasses = 'group relative flex items-center transition-all duration-200 rounded-lg cursor-pointer';
    
    if ($view === 'grid') {
        $baseClasses .= ' flex-col p-4 hover:bg-gray-50 dark:hover:bg-gray-800/50 border border-transparent hover:border-gray-200 dark:hover:border-gray-700';
    } else {
        $baseClasses .= ' px-4 py-3 hover:bg-gray-50 dark:hover:bg-gray-800/50 border-l-2 border-transparent hover:border-dodger-blue-500';
    }
    
    $selectedClasses = $selected 
        ? ($view === 'grid' 
            ? ' bg-dodger-blue-50 dark:bg-dodger-blue-900/20 border-dodger-blue-300 dark:border-dodger-blue-700' 
            : ' bg-dodger-blue-50 dark:bg-dodger-blue-900/20 border-l-dodger-blue-500')
        : '';
    
    $itemClasses = $baseClasses . $selectedClasses;
    
    // Default icons
    if (!$icon) {
        if ($type === 'folder') {
            $icon = '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" /></svg>';
        } else {
            $icon = '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>';
        }
    }
    
    // Format size
    $formattedSize = $size ? formatBytes($size) : null;
    
    // Format date
    $formattedDate = $modified ? date('M d, Y', strtotime($modified)) : null;
@endphp

@php
    $viewClasses = $view === 'grid' 
        ? 'flex-col p-4 hover:bg-gray-50 dark:hover:bg-gray-800/50 border border-transparent hover:border-gray-200 dark:hover:border-gray-700'
        : 'px-4 py-3 hover:bg-gray-50 dark:hover:bg-gray-800/50 border-l-2 border-transparent hover:border-dodger-blue-500';
    
    $selectedClasses = $selected 
        ? ($view === 'grid' 
            ? ' bg-dodger-blue-50 dark:bg-dodger-blue-900/20 border-dodger-blue-300 dark:border-dodger-blue-700' 
            : ' bg-dodger-blue-50 dark:bg-dodger-blue-900/20 border-l-dodger-blue-500')
        : '';
    
    $itemClasses = $baseClasses . ' ' . $viewClasses . $selectedClasses;
@endphp

<div 
    {{ $attributes->merge(['class' => $itemClasses]) }}
    @contextmenu.prevent="$dispatch('file-context-menu', { name: '{{ $name }}', type: '{{ $type }}', event: $event })"
    @click="$dispatch('file-select', { name: '{{ $name }}', type: '{{ $type }}' })"
    @dblclick="$dispatch('file-open', { name: '{{ $name }}', type: '{{ $type }}' })"
>
    @if($view === 'grid')
        <div class="flex-shrink-0 mb-3 p-3 rounded-lg bg-gradient-to-br from-gray-100 to-gray-200 dark:from-gray-700 dark:to-gray-800 group-hover:from-dodger-blue-100 group-hover:to-dodger-blue-200 dark:group-hover:from-dodger-blue-900/30 dark:group-hover:to-dodger-blue-800/30 transition-colors">
            <div class="text-dodger-blue-600 dark:text-dodger-blue-400">
                {!! $icon !!}
            </div>
        </div>
        <div class="flex-1 w-full text-center">
            <p class="text-sm font-medium text-gray-900 dark:text-gray-100 truncate" title="{{ $name }}">
                {{ $name }}
            </p>
            @if($formattedSize)
                <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                    {{ $formattedSize }}
                </p>
            @endif
        </div>
    @else
        <div class="flex-shrink-0 mr-4">
            <div class="p-2 rounded-lg bg-gradient-to-br from-gray-100 to-gray-200 dark:from-gray-700 dark:to-gray-800 group-hover:from-dodger-blue-100 group-hover:to-dodger-blue-200 dark:group-hover:from-dodger-blue-900/30 dark:group-hover:to-dodger-blue-800/30 transition-colors">
                <div class="text-dodger-blue-600 dark:text-dodger-blue-400">
                    {!! $icon !!}
                </div>
            </div>
        </div>
        <div class="flex-1 min-w-0">
            <p class="text-sm font-medium text-gray-900 dark:text-gray-100 truncate" title="{{ $name }}">
                {{ $name }}
            </p>
            <div class="flex items-center gap-4 mt-1 text-xs text-gray-500 dark:text-gray-400">
                @if($formattedSize)
                    <span>{{ $formattedSize }}</span>
                @endif
                @if($formattedDate)
                    <span>{{ $formattedDate }}</span>
                @endif
            </div>
        </div>
    @endif
    
    @if($selected)
        <div class="absolute top-2 right-2">
            <div class="w-5 h-5 rounded-full bg-dodger-blue-600 dark:bg-dodger-blue-500 flex items-center justify-center">
                <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
            </div>
        </div>
    @endif
</div>

@php
function formatBytes($bytes, $precision = 2) {
    $units = ['B', 'KB', 'MB', 'GB', 'TB'];
    $bytes = max($bytes, 0);
    $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
    $pow = min($pow, count($units) - 1);
    $bytes /= pow(1024, $pow);
    return round($bytes, $precision) . ' ' . $units[$pow];
}
@endphp

