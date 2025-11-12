@props([
    'models' => [],
    'activeModel' => null,
    'activeEndpoint' => null,
])

@php
    // Default models if none provided
    $defaultModels = [
        [
            'name' => 'Products',
            'slug' => 'products',
            'description' => 'Manage product inventory and catalog',
            'endpoints' => [
                [
                    'method' => 'GET',
                    'path' => '/api/products',
                    'name' => 'List Products',
                    'description' => 'Retrieve paginated list of products',
                ],
                [
                    'method' => 'GET',
                    'path' => '/api/products/{id}',
                    'name' => 'Get Product',
                    'description' => 'Retrieve a single product by ID',
                ],
                [
                    'method' => 'POST',
                    'path' => '/api/products',
                    'name' => 'Create Product',
                    'description' => 'Create a new product',
                ],
                [
                    'method' => 'PATCH',
                    'path' => '/api/products/{id}',
                    'name' => 'Update Product',
                    'description' => 'Update an existing product',
                ],
                [
                    'method' => 'DELETE',
                    'path' => '/api/products/{id}',
                    'name' => 'Delete Product',
                    'description' => 'Delete a product',
                ],
            ],
        ],
        [
            'name' => 'Users',
            'slug' => 'users',
            'description' => 'User management and authentication',
            'endpoints' => [
                [
                    'method' => 'GET',
                    'path' => '/api/users',
                    'name' => 'List Users',
                    'description' => 'Retrieve paginated list of users',
                ],
                [
                    'method' => 'GET',
                    'path' => '/api/users/{id}',
                    'name' => 'Get User',
                    'description' => 'Retrieve a single user by ID',
                ],
                [
                    'method' => 'POST',
                    'path' => '/api/users',
                    'name' => 'Create User',
                    'description' => 'Create a new user account',
                ],
                [
                    'method' => 'PATCH',
                    'path' => '/api/users/{id}',
                    'name' => 'Update User',
                    'description' => 'Update user information',
                ],
            ],
        ],
        [
            'name' => 'Orders',
            'slug' => 'orders',
            'description' => 'Order processing and management',
            'endpoints' => [
                [
                    'method' => 'GET',
                    'path' => '/api/orders',
                    'name' => 'List Orders',
                    'description' => 'Retrieve paginated list of orders',
                ],
                [
                    'method' => 'GET',
                    'path' => '/api/orders/{id}',
                    'name' => 'Get Order',
                    'description' => 'Retrieve order details',
                ],
                [
                    'method' => 'POST',
                    'path' => '/api/orders',
                    'name' => 'Create Order',
                    'description' => 'Create a new order',
                ],
                [
                    'method' => 'PATCH',
                    'path' => '/api/orders/{id}',
                    'name' => 'Update Order',
                    'description' => 'Update order status',
                ],
            ],
        ],
        [
            'name' => 'Categories',
            'slug' => 'categories',
            'description' => 'Product categories and organization',
            'endpoints' => [
                [
                    'method' => 'GET',
                    'path' => '/api/categories',
                    'name' => 'List Categories',
                    'description' => 'Retrieve all categories',
                ],
                [
                    'method' => 'GET',
                    'path' => '/api/categories/{id}',
                    'name' => 'Get Category',
                    'description' => 'Retrieve category details',
                ],
                [
                    'method' => 'POST',
                    'path' => '/api/categories',
                    'name' => 'Create Category',
                    'description' => 'Create a new category',
                ],
            ],
        ],
    ];
    
    $models = !empty($models) ? $models : $defaultModels;
@endphp

<div 
    x-data="{
        searchQuery: '',
        expandedModels: @js([$activeModel ?? 'products']),
        models: @js($models),
        
        matchesSearch(text) {
            if (!this.searchQuery) return true;
            return text.toLowerCase().includes(this.searchQuery.toLowerCase());
        },
        
        toggleModel(slug) {
            const index = this.expandedModels.indexOf(slug);
            if (index > -1) {
                this.expandedModels.splice(index, 1);
            } else {
                this.expandedModels.push(slug);
            }
        },
        
        isModelExpanded(slug) {
            return this.expandedModels.includes(slug);
        },
        
        shouldShowModel(model) {
            if (!this.searchQuery) return true;
            if (this.matchesSearch(model.name) || this.matchesSearch(model.description)) return true;
            return model.endpoints.some(endpoint => 
                this.matchesSearch(endpoint.name) || 
                this.matchesSearch(endpoint.path) ||
                this.matchesSearch(endpoint.method)
            );
        },
        
        shouldShowEndpoint(endpoint, modelName) {
            if (!this.searchQuery) return true;
            if (!this.isModelExpanded(modelName)) return false;
            return this.matchesSearch(endpoint.name) || 
                   this.matchesSearch(endpoint.path) ||
                   this.matchesSearch(endpoint.method) ||
                   this.matchesSearch(endpoint.description);
        },
        
        get hasVisibleResults() {
            if (!this.searchQuery) return true;
            return this.models.some(model => this.shouldShowModel(model));
        },
        
        scrollToEndpoint(endpointId) {
            // Extract method from endpoint ID (e.g., 'products-get' -> 'get')
            const method = endpointId.split('-').pop();
            const tabId = method + '-endpoint';
            
            // Find the tabs container and switch to the appropriate tab
            const tabsContainer = document.querySelector('.tabs-container');
            if (tabsContainer) {
                const tabsData = Alpine.$data(tabsContainer);
                if (tabsData && tabsData.setActiveTab) {
                    tabsData.setActiveTab(tabId);
                }
            }
            
            // Wait for tab to switch, then scroll
            setTimeout(() => {
                const element = document.getElementById(endpointId);
                if (element) {
                    element.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            }, 150);
        }
    }"
    class="bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 shadow-sm"
>
    {{-- Header --}}
    <div class="px-4 py-3 border-b border-gray-200 dark:border-gray-700">
        <h3 class="text-sm font-semibold text-gray-900 dark:text-gray-100">API Models</h3>
        <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Navigate to API endpoints</p>
    </div>
    
    {{-- Search --}}
    <div class="px-4 py-3 border-b border-gray-200 dark:border-gray-700">
        <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
            <input
                type="text"
                x-model="searchQuery"
                placeholder="Search models or endpoints..."
                class="block w-full pl-9 pr-3 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-dodger-blue-500 focus:border-transparent"
            >
            <button
                x-show="searchQuery"
                @click="searchQuery = ''"
                class="absolute inset-y-0 right-0 pr-3 flex items-center"
                aria-label="Clear search"
                style="display: none;"
            >
                <svg class="h-4 w-4 text-gray-400 hover:text-gray-600 dark:hover:text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>
    
    {{-- Tree --}}
    <div class="max-h-[600px] overflow-y-auto p-2">
        <div class="space-y-1">
            @foreach($models as $model)
                <div 
                    x-show="shouldShowModel(@js($model))"
                    class="space-y-1"
                >
                    {{-- Model Header --}}
                    <button
                        @click="toggleModel('{{ $model['slug'] }}')"
                        class="w-full flex items-center justify-between px-3 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700/50 rounded-lg transition-colors group"
                    >
                        <div class="flex items-center gap-2 flex-1 min-w-0">
                            <svg 
                                class="h-4 w-4 text-gray-400 dark:text-gray-500 transition-transform"
                                :class="{ 'rotate-90': isModelExpanded('{{ $model['slug'] }}') }"
                                fill="none" 
                                stroke="currentColor" 
                                viewBox="0 0 24 24"
                            >
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                            <span class="truncate">{{ $model['name'] }}</span>
                        </div>
                        <span class="text-xs text-gray-500 dark:text-gray-400 ml-2">
                            {{ count($model['endpoints']) }}
                        </span>
                    </button>
                    
                    {{-- Model Description --}}
                    <div 
                        x-show="isModelExpanded('{{ $model['slug'] }}')"
                        class="px-3 pb-2"
                    >
                        <p class="text-xs text-gray-500 dark:text-gray-400 mb-2">
                            {{ $model['description'] }}
                        </p>
                        
                        {{-- Endpoints --}}
                        <div class="space-y-1 pl-4 border-l-2 border-gray-200 dark:border-gray-700">
                            @foreach($model['endpoints'] as $endpoint)
                                <a
                                    href="#{{ $model['slug'] }}-{{ strtolower($endpoint['method']) }}"
                                    @click.prevent="scrollToEndpoint('{{ $model['slug'] }}-{{ strtolower($endpoint['method']) }}')"
                                    x-show="shouldShowEndpoint(@js($endpoint), '{{ $model['slug'] }}')"
                                    class="block px-3 py-1.5 text-xs text-gray-600 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-gray-700/50 rounded-md transition-colors group"
                                >
                                    <div class="flex items-center gap-2">
                                        <x-api-doc.method-badge :method="$endpoint['method']" class="text-xs" />
                                        <span class="flex-1 truncate">{{ $endpoint['name'] }}</span>
                                    </div>
                                    <div class="text-xs text-gray-500 dark:text-gray-500 mt-1 truncate font-mono">
                                        {{ $endpoint['path'] }}
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
        {{-- Empty State --}}
        <div 
            x-show="searchQuery && !hasVisibleResults"
            class="px-4 py-8 text-center"
            style="display: none;"
        >
            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">No models or endpoints found</p>
            <p class="mt-1 text-xs text-gray-400 dark:text-gray-500">Try a different search term</p>
        </div>
    </div>
</div>

