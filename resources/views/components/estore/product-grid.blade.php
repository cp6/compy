@props([
    'products' => [],
    'columns' => 4, // 2, 3, 4, 5, 6
])

@php
    $gridClasses = match($columns) {
        2 => 'grid-cols-1 sm:grid-cols-2',
        3 => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3',
        4 => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4',
        5 => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5',
        6 => 'grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6',
        default => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4',
    };
@endphp

<div class="grid {{ $gridClasses }} gap-6" {{ $attributes }}>
    @foreach($products as $product)
        <x-estore.product-card
            :id="$product['id'] ?? null"
            :name="$product['name'] ?? 'Product'"
            :price="$product['price'] ?? 0"
            :originalPrice="$product['originalPrice'] ?? null"
            :image="$product['image'] ?? null"
            :badge="$product['badge'] ?? null"
            :rating="$product['rating'] ?? null"
            :reviews="$product['reviews'] ?? null"
            :href="$product['href'] ?? '#'"
            variant="default"
            hover
        />
    @endforeach
</div>

