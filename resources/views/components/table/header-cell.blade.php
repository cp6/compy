@props([
    'compact' => false,
    'align' => 'left', // 'left', 'center', 'right'
    'nowrap' => false,
])

@php
    $paddingClasses = $compact 
        ? 'px-4 py-2' 
        : 'px-6 py-3';
    
    $alignClasses = match($align) {
        'center' => 'text-center',
        'right' => 'text-right',
        default => 'text-left',
    };
    
    $wrapClasses = $nowrap ? 'whitespace-nowrap' : '';
    
    $headerClasses = $paddingClasses . ' ' . $alignClasses . ' ' . $wrapClasses . ' text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider';
@endphp

<th {{ $attributes->merge(['scope' => 'col', 'class' => $headerClasses]) }}>
    {{ $slot }}
</th>

