@props([
    'striped' => false,
    'hover' => true,
])

@php
    $rowClasses = '';
    
    if ($striped) {
        $rowClasses .= 'bg-gray-50 dark:bg-gray-800 ';
    }
    
    if ($hover) {
        if ($striped) {
            $rowClasses .= 'hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors';
        } else {
            $rowClasses .= 'hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors';
        }
    }
@endphp

<tr {{ $attributes->merge(['class' => $rowClasses]) }}>
    {{ $slot }}
</tr>

