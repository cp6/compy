@props([
    'fullWidth' => true, // Extends table to card edges
    'striped' => false, // Alternating row colors
    'hover' => true, // Hover effect on rows
    'compact' => false, // Reduced padding
])

@php
    $wrapperClasses = 'overflow-x-auto';
    if ($fullWidth) {
        // Match card padding exactly: p-5 (px-5 = 1.25rem) and sm:p-6 (sm:px-6 = 1.5rem)
        $wrapperClasses .= ' -mx-5 sm:-mx-6';
    }
    
    $tableClasses = 'min-w-full divide-y divide-gray-200 dark:divide-gray-700';
@endphp

<div class="{{ $wrapperClasses }}">
    <table {{ $attributes->merge(['class' => $tableClasses]) }}>
        {{ $slot }}
    </table>
</div>

