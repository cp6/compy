@props([
    'fullWidth' => true, // Extends table to card edges
    'striped' => false, // Alternating row colors
    'hover' => true, // Hover effect on rows
    'compact' => false, // Reduced padding
])

@php
    $wrapperClasses = 'overflow-x-auto';
    if ($fullWidth) {
        $wrapperClasses .= ' -mx-4 sm:-mx-6 md:-mx-8';
    }
    
    $tableClasses = 'min-w-full divide-y divide-gray-200 dark:divide-gray-700';
@endphp

<div class="{{ $wrapperClasses }}">
    <table {{ $attributes->merge(['class' => $tableClasses]) }}>
        {{ $slot }}
    </table>
</div>

