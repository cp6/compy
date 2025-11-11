<x-app-layout>
    <x-slot name="header">
        <x-breadcrumb :items="[
            ['label' => 'Home', 'url' => route('dashboard')],
            ['label' => 'Products', 'url' => route('products.index')],
            ['label' => $product->name],
        ]" />
    </x-slot>

    <x-slot name="pageTitle">
        {{ $product->name }}
    </x-slot>

    <x-slot name="pageSubtitle">
        Product Details
    </x-slot>

    <div class="space-y-6 sm:space-y-8">
        <x-alert.alerts />

        <div class="flex flex-col sm:flex-row gap-4 sm:gap-6">
            <x-button.secondary href="{{ route('products.index') }}">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Back to Products
            </x-button.secondary>
            <x-button.primary href="{{ route('products.edit', $product) }}">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
                Edit Product
            </x-button.primary>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 sm:gap-8">
            <div class="lg:col-span-2">
                <x-card.card variant="gradient">
                    <x-slot name="header">
                        <h3 class="text-lg sm:text-xl font-semibold text-gray-900 dark:text-gray-100">
                            Product Information
                        </h3>
                    </x-slot>

                    <div class="space-y-6">
                        <div>
                            <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Name</h4>
                            <p class="text-base text-gray-900 dark:text-gray-100">{{ $product->name }}</p>
                        </div>

                        @if($product->description)
                            <div>
                                <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Description</h4>
                                <p class="text-base text-gray-900 dark:text-gray-100 whitespace-pre-wrap">{{ $product->description }}</p>
                            </div>
                        @endif

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div>
                                <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">SKU</h4>
                                <p class="text-base font-mono text-gray-900 dark:text-gray-100">{{ $product->sku }}</p>
                            </div>

                            <div>
                                <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">GUID</h4>
                                <p class="text-base font-mono text-sm text-gray-900 dark:text-gray-100">{{ $product->guid }}</p>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div>
                                <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Price</h4>
                                <p class="text-2xl font-semibold text-gray-900 dark:text-gray-100">${{ number_format($product->price, 2) }}</p>
                            </div>

                            <div>
                                <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Sold Amount</h4>
                                <p class="text-2xl font-semibold text-gray-900 dark:text-gray-100">${{ number_format($product->sold_amount, 2) }}</p>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div>
                                <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Stock Quantity</h4>
                                <p class="text-2xl font-semibold text-gray-900 dark:text-gray-100">{{ number_format($product->stock_quantity) }}</p>
                            </div>

                            <div>
                                <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Status</h4>
                                <x-badge.status :status="$product->status" />
                            </div>
                        </div>

                        @if($product->image_url)
                            <div>
                                <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-2">Image</h4>
                                <img 
                                    src="{{ $product->image_url }}" 
                                    alt="{{ $product->name }}"
                                    class="rounded-lg max-w-full h-auto"
                                    onerror="this.style.display='none'"
                                />
                            </div>
                        @endif
                    </div>
                </x-card.card>
            </div>

            <div>
                <x-card.card variant="gradient">
                    <x-slot name="header">
                        <h3 class="text-lg sm:text-xl font-semibold text-gray-900 dark:text-gray-100">
                            Metadata
                        </h3>
                    </x-slot>

                    <div class="space-y-4">
                        <div>
                            <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Created</h4>
                            <p class="text-sm text-gray-900 dark:text-gray-100">
                                {{ $product->created_at->format('M d, Y') }}<br>
                                <span class="text-gray-500 dark:text-gray-400">{{ $product->created_at->format('h:i A') }}</span>
                            </p>
                        </div>

                        <div>
                            <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Last Updated</h4>
                            <p class="text-sm text-gray-900 dark:text-gray-100">
                                {{ $product->updated_at->format('M d, Y') }}<br>
                                <span class="text-gray-500 dark:text-gray-400">{{ $product->updated_at->format('h:i A') }}</span>
                            </p>
                        </div>
                    </div>

                    <x-slot name="footer">
                        <form 
                            action="{{ route('products.destroy', $product) }}" 
                            method="POST"
                            onsubmit="return confirm('Are you sure you want to delete this product? This action cannot be undone.');"
                        >
                            @csrf
                            @method('DELETE')
                            <x-button.danger type="submit" class="w-full">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                                Delete Product
                            </x-button.danger>
                        </form>
                    </x-slot>
                </x-card.card>
            </div>
        </div>
    </div>
</x-app-layout>

