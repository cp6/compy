@props([
    'striped' => false,
    'hover' => true,
    'variant' => 'default', // 'default', 'dark'
])

@php
    $rowClasses = '';
    
    if ($striped) {
        $rowClasses .= 'bg-gray-50 dark:bg-gray-800 ';
    }
    
    if ($hover) {
        $rowClasses .= 'hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors';
    }
    
    if ($striped && $hover) {
        $rowClasses = 'bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors';
    }
@endphp

<tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-200 dark:divide-gray-700">
    {{ $slot }}
</tbody>

