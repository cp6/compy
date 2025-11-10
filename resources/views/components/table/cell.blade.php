@props([
    'compact' => false,
    'align' => 'left', // 'left', 'center', 'right'
    'nowrap' => false,
])

@php
    $paddingClasses = $compact 
        ? 'px-4 py-2' 
        : 'px-6 py-4';
    
    $alignClasses = match($align) {
        'center' => 'text-center',
        'right' => 'text-right',
        default => 'text-left',
    };
    
    $wrapClasses = $nowrap ? 'whitespace-nowrap' : '';
    
    $cellClasses = $paddingClasses . ' ' . $alignClasses . ' ' . $wrapClasses . ' text-sm';
@endphp

<td {{ $attributes->merge(['class' => $cellClasses . ' text-gray-900 dark:text-gray-100']) }}>
    {{ $slot }}
</td>

