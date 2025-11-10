@props([])

<div {{ $attributes->merge(['class' => 'space-y-4 sm:space-y-6']) }}>
    {{ $slot }}
</div>

