@props([
    'name' => null,
    'value' => null,
])

<input
    type="hidden"
    name="{{ $name }}"
    value="{{ old($name, $value) }}"
    {{ $attributes }}
/>

