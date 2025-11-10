@props([
    'files' => [],
    'selected' => [],
    'view' => 'grid', // 'grid', 'list'
])

@php
    $containerClasses = $view === 'grid' 
        ? 'grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-4'
        : 'flex flex-col divide-y divide-gray-200 dark:divide-gray-700';
@endphp

<div {{ $attributes->merge(['class' => $containerClasses]) }}>
    @foreach($files as $file)
        <x-file.item
            :name="$file['name'] ?? ''"
            :type="$file['type'] ?? 'file'"
            :size="$file['size'] ?? null"
            :modified="$file['modified'] ?? null"
            :icon="$file['icon'] ?? null"
            :selected="in_array($file['name'] ?? '', $selected)"
            :view="$view"
        />
    @endforeach
</div>

