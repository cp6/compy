<x-app-layout>
    <x-slot name="title">API Documentation</x-slot>
    <x-slot name="metaDescription">Complete API documentation with interactive navigation. Browse endpoints for Products, Users, Orders, and Categories.</x-slot>

    <x-slot name="header">
        <x-breadcrumb :items="[
            ['label' => 'Home', 'url' => route('dashboard')],
            ['label' => 'API Documentation', 'url' => '#'],
        ]" />
    </x-slot>

    <x-slot name="pageTitle">
        API Documentation
    </x-slot>

    <x-slot name="pageSubtitle">
        Complete API reference with interactive navigation and examples
    </x-slot>

    <x-alert.alerts />
    
    @php
        // GET endpoint response example
        $getResponseExample = [
            'data' => [
                [
                    'id' => 1,
                    'name' => 'MacBook Pro 16"',
                    'description' => 'Powerful laptop for professionals',
                    'price' => 2499.99,
                    'category' => 'electronics',
                    'stock_quantity' => 15,
                    'created_at' => '2024-01-15T10:30:00Z',
                ],
                [
                    'id' => 2,
                    'name' => 'Dell XPS 13',
                    'description' => 'Ultra-thin laptop with great performance',
                    'price' => 1299.99,
                    'category' => 'electronics',
                    'stock_quantity' => 8,
                    'created_at' => '2024-01-14T14:20:00Z',
                ],
            ],
            'meta' => [
                'current_page' => 1,
                'per_page' => 20,
                'total' => 150,
                'last_page' => 8,
                'from' => 1,
                'to' => 20,
            ],
            'links' => [
                'first' => '/api/products?page=1',
                'last' => '/api/products?page=8',
                'prev' => null,
                'next' => '/api/products?page=2',
            ],
        ];

        // POST endpoint response example
        $postResponseExample = [
            'data' => [
                'id' => 123,
                'guid' => '550e8400-e29b-41d4-a716-446655440000',
                'name' => 'iPhone 15 Pro',
                'description' => 'Latest iPhone with A17 Pro chip',
                'sku' => 'IPH15PRO-256-BLK',
                'price' => '999.99',
                'stock_quantity' => 50,
                'sold_amount' => '0.00',
                'status' => 'active',
                'category' => 'electronics',
                'image_url' => 'https://example.com/images/iphone15pro.jpg',
                'created_at' => '2024-01-20T10:30:00Z',
                'updated_at' => '2024-01-20T10:30:00Z',
            ],
            'message' => 'Product created successfully',
        ];

        // PATCH endpoint response example
        $patchResponseExample = [
            'data' => [
                'id' => 123,
                'guid' => '550e8400-e29b-41d4-a716-446655440000',
                'name' => 'iPhone 15 Pro',
                'description' => 'Latest iPhone with A17 Pro chip',
                'sku' => 'IPH15PRO-256-BLK',
                'price' => '899.99',
                'stock_quantity' => 75,
                'sold_amount' => '0.00',
                'status' => 'active',
                'category' => 'electronics',
                'image_url' => 'https://example.com/images/iphone15pro.jpg',
                'created_at' => '2024-01-20T10:30:00Z',
                'updated_at' => '2024-01-20T11:45:00Z',
            ],
            'message' => 'Product updated successfully',
        ];

        // DELETE endpoint response example
        $deleteResponseExample = [
            'message' => 'Product deleted successfully',
        ];

        // GET endpoint parameters
        $getParameters = [
            [
                'name' => 'page',
                'type' => 'integer',
                'required' => false,
                'default' => 1,
                'description' => 'Page number for pagination',
            ],
            [
                'name' => 'per_page',
                'type' => 'integer',
                'required' => false,
                'default' => 15,
                'description' => 'Number of items per page (max: 100)',
            ],
            [
                'name' => 'search',
                'type' => 'string',
                'required' => false,
                'description' => 'Search term to filter products by name or description',
            ],
            [
                'name' => 'category',
                'type' => 'string',
                'required' => false,
                'description' => 'Filter products by category',
            ],
            [
                'name' => 'sort_by',
                'type' => 'string',
                'required' => false,
                'default' => 'created_at',
                'description' => 'Field to sort by (name, price, created_at)',
            ],
            [
                'name' => 'sort_dir',
                'type' => 'string',
                'required' => false,
                'default' => 'desc',
                'description' => 'Sort direction (asc or desc)',
            ],
        ];

        // GET endpoint request example
        $getRequestExample = [
            'title' => 'Request Example',
            'url' => '/api/products',
            'queryParams' => [
                'page' => 1,
                'per_page' => 20,
                'search' => 'laptop',
                'category' => 'electronics',
                'sort_by' => 'price',
                'sort_dir' => 'asc',
            ],
        ];

        // POST endpoint parameters
        $postParameters = [
            [
                'name' => 'name',
                'type' => 'string',
                'required' => true,
                'description' => 'Product name (min: 3, max: 255 characters)',
            ],
            [
                'name' => 'description',
                'type' => 'string',
                'required' => false,
                'description' => 'Product description',
            ],
            [
                'name' => 'sku',
                'type' => 'string',
                'required' => true,
                'description' => 'Unique SKU identifier',
            ],
            [
                'name' => 'price',
                'type' => 'decimal',
                'required' => true,
                'description' => 'Product price (must be greater than 0)',
            ],
            [
                'name' => 'stock_quantity',
                'type' => 'integer',
                'required' => false,
                'default' => 0,
                'description' => 'Initial stock quantity',
            ],
            [
                'name' => 'category',
                'type' => 'string',
                'required' => false,
                'description' => 'Product category',
            ],
            [
                'name' => 'image_url',
                'type' => 'string',
                'required' => false,
                'description' => 'URL to product image',
            ],
        ];

        // POST endpoint request example
        $postRequestExample = [
            'title' => 'Request Example',
            'url' => '/api/products',
            'headers' => [
                'Authorization' => 'Bearer your-api-token-here',
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ],
            'body' => [
                'name' => 'iPhone 15 Pro',
                'description' => 'Latest iPhone with A17 Pro chip',
                'sku' => 'IPH15PRO-256-BLK',
                'price' => 999.99,
                'stock_quantity' => 50,
                'category' => 'electronics',
                'image_url' => 'https://example.com/images/iphone15pro.jpg',
            ],
        ];

        // PATCH endpoint parameters
        $patchParameters = [
            [
                'name' => 'id',
                'type' => 'integer',
                'required' => true,
                'description' => 'Product ID (path parameter)',
            ],
            [
                'name' => 'name',
                'type' => 'string',
                'required' => false,
                'description' => 'Product name (min: 3, max: 255 characters)',
            ],
            [
                'name' => 'description',
                'type' => 'string',
                'required' => false,
                'description' => 'Product description',
            ],
            [
                'name' => 'price',
                'type' => 'decimal',
                'required' => false,
                'description' => 'Product price (must be greater than 0)',
            ],
            [
                'name' => 'stock_quantity',
                'type' => 'integer',
                'required' => false,
                'description' => 'Stock quantity',
            ],
            [
                'name' => 'status',
                'type' => 'string',
                'required' => false,
                'description' => 'Product status (active or inactive)',
            ],
        ];

        // PATCH endpoint request example
        $patchRequestExample = [
            'title' => 'Request Example',
            'url' => '/api/products/123',
            'headers' => [
                'Authorization' => 'Bearer your-api-token-here',
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ],
            'body' => [
                'price' => 899.99,
                'stock_quantity' => 75,
                'status' => 'active',
            ],
        ];

        // DELETE endpoint parameters
        $deleteParameters = [
            [
                'name' => 'id',
                'type' => 'integer',
                'required' => true,
                'description' => 'Product ID (path parameter)',
            ],
        ];

        // DELETE endpoint request example
        $deleteRequestExample = [
            'title' => 'Request Example',
            'url' => '/api/products/123',
            'headers' => [
                'Authorization' => 'Bearer your-api-token-here',
                'Accept' => 'application/json',
            ],
        ];
    @endphp
    
    {{-- Content Tree --}}
    <div class="mb-6">
        <x-api-doc.content-tree 
            :activeModel="'products'"
            :activeEndpoint="'get'"
        />
    </div>
    
    {{-- Main Content --}}
    <div class="space-y-8">
            {{-- Introduction --}}
            <x-card.card variant="gradient">
                <x-slot name="header">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">API Overview</h3>
                </x-slot>
                
                <p class="text-gray-600 dark:text-gray-400 mb-4">
                    Welcome to the API documentation. Use the navigation tree on the left to browse available endpoints 
                    for different models. Each endpoint includes detailed information about parameters, request examples, 
                    and response formats.
                </p>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mt-6">
                    <div class="p-4 bg-gray-50 dark:bg-gray-900/50 rounded-lg">
                        <x-api-doc.method-badge method="GET" class="mb-2" />
                        <p class="text-xs text-gray-600 dark:text-gray-400 mt-2">Retrieve resources</p>
                    </div>
                    <div class="p-4 bg-gray-50 dark:bg-gray-900/50 rounded-lg">
                        <x-api-doc.method-badge method="POST" class="mb-2" />
                        <p class="text-xs text-gray-600 dark:text-gray-400 mt-2">Create new resources</p>
                    </div>
                    <div class="p-4 bg-gray-50 dark:bg-gray-900/50 rounded-lg">
                        <x-api-doc.method-badge method="PATCH" class="mb-2" />
                        <p class="text-xs text-gray-600 dark:text-gray-400 mt-2">Update existing resources</p>
                    </div>
                    <div class="p-4 bg-gray-50 dark:bg-gray-900/50 rounded-lg">
                        <x-api-doc.method-badge method="DELETE" class="mb-2" />
                        <p class="text-xs text-gray-600 dark:text-gray-400 mt-2">Remove resources</p>
                    </div>
                </div>
            </x-card>

            {{-- Products API Endpoints --}}
            <x-card.card variant="gradient">
                <x-slot name="header">
                    <div class="flex items-center gap-2">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Products API</h3>
                        <span class="px-2 py-1 text-xs font-medium rounded-full bg-dodger-blue-100 dark:bg-dodger-blue-900/30 text-dodger-blue-800 dark:text-dodger-blue-300">
                            /api/products
                        </span>
                    </div>
                </x-slot>
                
                <x-tabs.tabs variant="pills" default-tab="get-endpoint">
                    <x-slot name="tabs">
                        <x-tabs.tab-item id="get-endpoint" label="GET" />
                        <x-tabs.tab-item id="post-endpoint" label="POST" />
                        <x-tabs.tab-item id="patch-endpoint" label="PATCH" />
                        <x-tabs.tab-item id="delete-endpoint" label="DELETE" />
                    </x-slot>
                    
                    <x-slot name="panels">
                        {{-- GET Endpoint --}}
                        <x-tabs.tab-panel id="get-endpoint">
                            <x-api-doc.endpoint
                                id="products-get"
                                method="GET"
                                path="/api/products"
                                title="Get All Products"
                                description="Retrieve a paginated list of all products. Supports filtering, sorting, and searching."
                                :parameters="$getParameters"
                                :requestExample="$getRequestExample"
                                :responseExample="$getResponseExample"
                                authentication="Bearer token required. Include in Authorization header."
                            />
                        </x-tabs.tab-panel>

                        {{-- POST Endpoint --}}
                        <x-tabs.tab-panel id="post-endpoint">
                            <x-api-doc.endpoint
                                id="products-post"
                                method="POST"
                                path="/api/products"
                                title="Create Product"
                                description="Create a new product in the system. All required fields must be provided."
                                :parameters="$postParameters"
                                :requestExample="$postRequestExample"
                                :responseExample="$postResponseExample"
                                :responseStatusCode="201"
                                authentication="Bearer token required. Include in Authorization header."
                            />
                        </x-tabs.tab-panel>

                        {{-- PATCH Endpoint --}}
                        <x-tabs.tab-panel id="patch-endpoint">
                            <x-api-doc.endpoint
                                id="products-patch"
                                method="PATCH"
                                path="/api/products/{id}"
                                title="Update Product"
                                description="Update an existing product. Only provided fields will be updated."
                                :parameters="$patchParameters"
                                :requestExample="$patchRequestExample"
                                :responseExample="$patchResponseExample"
                                authentication="Bearer token required. Include in Authorization header."
                            />
                        </x-tabs.tab-panel>

                        {{-- DELETE Endpoint --}}
                        <x-tabs.tab-panel id="delete-endpoint">
                            <x-api-doc.endpoint
                                id="products-delete"
                                method="DELETE"
                                path="/api/products/{id}"
                                title="Delete Product"
                                description="Permanently delete a product from the system. This action cannot be undone."
                                :parameters="$deleteParameters"
                                :requestExample="$deleteRequestExample"
                                :responseExample="$deleteResponseExample"
                                :responseStatusCode="200"
                                authentication="Bearer token required. Include in Authorization header."
                            />
                        </x-tabs.tab-panel>
                    </x-slot>
                </x-tabs.tabs>
            </x-card>
    </div>
</x-app-layout>

