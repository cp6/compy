<x-app-layout>
    <x-slot name="header">
        <x-breadcrumb :items="[
            ['label' => 'Home', 'url' => route('dashboard')],
            ['label' => 'Products', 'url' => route('products.index')],
            ['label' => $product->name, 'url' => route('products.show', $product)],
            ['label' => 'Edit'],
        ]" />
    </x-slot>

    <x-slot name="pageTitle">
        Edit Product
    </x-slot>

    <x-slot name="pageSubtitle">
        Update product information
    </x-slot>

    <div class="space-y-6 sm:space-y-8">
        <x-alert.alerts />

        <x-card.card variant="gradient">
            <x-slot name="header">
                <h3 class="text-lg sm:text-xl font-semibold text-gray-900 dark:text-gray-100">
                    Product Information
                </h3>
            </x-slot>

            <form method="POST" action="{{ route('products.update', $product) }}" class="space-y-6">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <x-form.group>
                        <x-form.input
                            name="name"
                            label="Product Name"
                            value="{{ old('name', $product->name) }}"
                            placeholder="Enter product name"
                            required
                        />
                    </x-form.group>

                    <x-form.group>
                        <x-form.input
                            name="sku"
                            label="SKU"
                            value="{{ old('sku', $product->sku) }}"
                            placeholder="Enter SKU (e.g., PROD-001)"
                            required
                        />
                    </x-form.group>
                </div>

                <x-form.group>
                    <x-form.textarea
                        name="description"
                        label="Description"
                        rows="4"
                        placeholder="Enter product description (optional)"
                    >{{ old('description', $product->description) }}</x-form.textarea>
                </x-form.group>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <x-form.group>
                        <x-form.number
                            name="price"
                            label="Price"
                            value="{{ old('price', $product->price) }}"
                            placeholder="0.00"
                            min="0"
                            step="0.01"
                            required
                        />
                    </x-form.group>

                    <x-form.group>
                        <x-form.number
                            name="stock_quantity"
                            label="Stock Quantity"
                            value="{{ old('stock_quantity', $product->stock_quantity) }}"
                            placeholder="0"
                            min="0"
                            required
                        />
                    </x-form.group>

                    <x-form.group>
                        <x-form.number
                            name="sold_amount"
                            label="Sold Amount"
                            value="{{ old('sold_amount', $product->sold_amount) }}"
                            placeholder="0.00"
                            min="0"
                            step="0.01"
                        />
                    </x-form.group>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <x-form.group>
                        <x-form.select
                            name="status"
                            label="Status"
                            :options="[
                                'active' => 'Active',
                                'inactive' => 'Inactive',
                            ]"
                            value="{{ old('status', $product->status) }}"
                            required
                        />
                    </x-form.group>

                    <x-form.group>
                        <x-form.input
                            type="url"
                            name="image_url"
                            label="Image URL"
                            value="{{ old('image_url', $product->image_url) }}"
                            placeholder="https://example.com/image.jpg"
                        />
                    </x-form.group>
                </div>

                <div class="flex flex-col sm:flex-row gap-4 pt-4 border-t border-gray-200 dark:border-gray-700">
                    <x-button.primary type="submit">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Update Product
                    </x-button.primary>
                    <x-button.secondary href="{{ route('products.show', $product) }}">
                        Cancel
                    </x-button.secondary>
                </div>
            </form>
        </x-card.card>
    </div>
</x-app-layout>

