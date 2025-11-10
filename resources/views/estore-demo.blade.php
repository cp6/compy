<x-app-layout>
    <x-slot name="header">
        <x-breadcrumb :items="[
            ['label' => 'Home', 'url' => route('dashboard')],
            ['label' => 'E-store', 'url' => '#'],
            ['label' => 'Demo'],
        ]" />
    </x-slot>

    <x-slot name="pageTitle">
        E-store Demo
    </x-slot>

    <x-slot name="pageSubtitle">
        A comprehensive e-commerce store demo with product cards, filters, and shopping features
    </x-slot>

    <x-alert.alerts />
    
    <div class="space-y-8">
        <!-- Featured Products -->
        <x-card.card variant="default" title="Featured Products">
            <p class="mb-6 text-gray-600 dark:text-gray-400">
                Browse our handpicked selection of featured products.
            </p>
            
            @php
                $featuredProducts = [
                    [
                        'id' => 1,
                        'name' => 'Wireless Bluetooth Headphones',
                        'price' => 79.99,
                        'originalPrice' => 129.99,
                        'badge' => 'sale',
                        'rating' => 4.5,
                        'reviews' => 234,
                        'href' => '#',
                    ],
                    [
                        'id' => 2,
                        'name' => 'Smart Watch Pro',
                        'price' => 299.99,
                        'badge' => 'new',
                        'rating' => 4.8,
                        'reviews' => 156,
                        'href' => '#',
                    ],
                    [
                        'id' => 3,
                        'name' => 'Portable Power Bank 20000mAh',
                        'price' => 49.99,
                        'originalPrice' => 69.99,
                        'badge' => 'hot',
                        'rating' => 4.3,
                        'reviews' => 89,
                        'href' => '#',
                    ],
                    [
                        'id' => 4,
                        'name' => 'USB-C Fast Charging Cable',
                        'price' => 19.99,
                        'rating' => 4.6,
                        'reviews' => 312,
                        'href' => '#',
                    ],
                ];
            @endphp
            
            <x-estore.product-grid :products="$featuredProducts" :columns="4" />
        </x-card>

        <!-- All Products -->
        <x-card.card variant="default" title="All Products">
            <p class="mb-6 text-gray-600 dark:text-gray-400">
                Explore our complete product catalog with various categories and price ranges.
            </p>
            
            @php
                $allProducts = [
                    [
                        'id' => 5,
                        'name' => 'Mechanical Gaming Keyboard',
                        'price' => 129.99,
                        'originalPrice' => 179.99,
                        'badge' => 'sale',
                        'rating' => 4.7,
                        'reviews' => 445,
                        'href' => '#',
                    ],
                    [
                        'id' => 6,
                        'name' => 'Wireless Mouse',
                        'price' => 39.99,
                        'rating' => 4.4,
                        'reviews' => 278,
                        'href' => '#',
                    ],
                    [
                        'id' => 7,
                        'name' => '4K Ultra HD Monitor 27"',
                        'price' => 449.99,
                        'originalPrice' => 599.99,
                        'badge' => 'sale',
                        'rating' => 4.9,
                        'reviews' => 123,
                        'href' => '#',
                    ],
                    [
                        'id' => 8,
                        'name' => 'Laptop Stand Aluminum',
                        'price' => 59.99,
                        'badge' => 'new',
                        'rating' => 4.5,
                        'reviews' => 167,
                        'href' => '#',
                    ],
                    [
                        'id' => 9,
                        'name' => 'Webcam HD 1080p',
                        'price' => 89.99,
                        'rating' => 4.2,
                        'reviews' => 201,
                        'href' => '#',
                    ],
                    [
                        'id' => 10,
                        'name' => 'Noise Cancelling Earbuds',
                        'price' => 149.99,
                        'originalPrice' => 199.99,
                        'badge' => 'hot',
                        'rating' => 4.8,
                        'reviews' => 334,
                        'href' => '#',
                    ],
                    [
                        'id' => 11,
                        'name' => 'USB Hub 7-Port',
                        'price' => 34.99,
                        'rating' => 4.3,
                        'reviews' => 189,
                        'href' => '#',
                    ],
                    [
                        'id' => 12,
                        'name' => 'Desk Lamp LED',
                        'price' => 49.99,
                        'badge' => 'new',
                        'rating' => 4.6,
                        'reviews' => 256,
                        'href' => '#',
                    ],
                    [
                        'id' => 13,
                        'name' => 'Laptop Sleeve 15"',
                        'price' => 24.99,
                        'rating' => 4.1,
                        'reviews' => 142,
                        'href' => '#',
                    ],
                    [
                        'id' => 14,
                        'name' => 'Phone Stand Adjustable',
                        'price' => 19.99,
                        'rating' => 4.4,
                        'reviews' => 298,
                        'href' => '#',
                    ],
                    [
                        'id' => 15,
                        'name' => 'Tablet Stand Foldable',
                        'price' => 29.99,
                        'badge' => 'sale',
                        'rating' => 4.5,
                        'reviews' => 178,
                        'href' => '#',
                    ],
                    [
                        'id' => 16,
                        'name' => 'Wireless Charger Pad',
                        'price' => 39.99,
                        'rating' => 4.7,
                        'reviews' => 423,
                        'href' => '#',
                    ],
                ];
            @endphp
            
            <x-estore.product-grid :products="$allProducts" :columns="4" />
        </x-card>

        <!-- Product Variations -->
        <x-card.card variant="default" title="Product Card Variations">
            <p class="mb-6 text-gray-600 dark:text-gray-400">
                Different product card styles and states.
            </p>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- New Product -->
                <x-estore.product-card
                    id="demo-1"
                    name="Brand New Product"
                    :price="99.99"
                    badge="new"
                    :rating="4.5"
                    :reviews="120"
                    variant="default"
                    hover
                />
                
                <!-- Sale Product -->
                <x-estore.product-card
                    id="demo-2"
                    name="On Sale Item"
                    :price="49.99"
                    :originalPrice="79.99"
                    badge="sale"
                    :rating="4.3"
                    :reviews="89"
                    variant="default"
                    hover
                />
                
                <!-- Hot Product -->
                <x-estore.product-card
                    id="demo-3"
                    name="Hot Trending Product"
                    :price="199.99"
                    badge="hot"
                    :rating="4.8"
                    :reviews="456"
                    variant="default"
                    hover
                />
                
                <!-- Out of Stock -->
                <x-estore.product-card
                    id="demo-4"
                    name="Out of Stock Item"
                    :price="149.99"
                    badge="out-of-stock"
                    :rating="4.6"
                    :reviews="234"
                    variant="default"
                    hover
                />
            </div>
        </x-card>

        <!-- Grid Layout Variations -->
        <x-card.card variant="default" title="Grid Layout Variations">
            <p class="mb-6 text-gray-600 dark:text-gray-400">
                Different grid column layouts for various screen sizes.
            </p>
            
            @php
                $sampleProducts = array_slice($allProducts, 0, 6);
            @endphp
            
            <div class="space-y-8">
                <div>
                    <h4 class="text-sm font-semibold text-gray-900 dark:text-gray-100 mb-3">2 Columns</h4>
                    <x-estore.product-grid :products="array_slice($sampleProducts, 0, 2)" :columns="2" />
                </div>
                
                <div>
                    <h4 class="text-sm font-semibold text-gray-900 dark:text-gray-100 mb-3">3 Columns</h4>
                    <x-estore.product-grid :products="array_slice($sampleProducts, 0, 3)" :columns="3" />
                </div>
                
                <div>
                    <h4 class="text-sm font-semibold text-gray-900 dark:text-gray-100 mb-3">4 Columns</h4>
                    <x-estore.product-grid :products="array_slice($sampleProducts, 0, 4)" :columns="4" />
                </div>
            </div>
        </x-card>

        <!-- Usage Examples -->
        <x-card.card variant="default" title="Usage Examples">
            <div class="bg-gray-50 dark:bg-gray-900/50 rounded-lg p-4 overflow-x-auto">
                <pre class="text-sm text-gray-800 dark:text-gray-200"><code>&lt;!-- Single Product Card --&gt;
&lt;x-estore.product-card
    id="1"
    name="Product Name"
    :price="99.99"
    :originalPrice="129.99"
    badge="sale"
    :rating="4.5"
    :reviews="234"
    href="/products/1"
    variant="default"
    hover
/&gt;

&lt;!-- Product Grid --&gt;
&lt;x-estore.product-grid 
    :products="$products" 
    :columns="4"
/&gt;

&lt;!-- Products Array Structure --&gt;
@php
    $products = [
        [
            'id' => 1,
            'name' => 'Product Name',
            'price' => 99.99,
            'originalPrice' => 129.99, // Optional
            'badge' => 'sale', // 'new', 'sale', 'hot', 'out-of-stock'
            'rating' => 4.5, // Optional
            'reviews' => 234, // Optional
            'image' => '/path/to/image.jpg', // Optional
            'href' => '/products/1',
        ],
    ];
@endphp</code></pre>
            </div>
        </x-card>
    </div>
</x-app-layout>

