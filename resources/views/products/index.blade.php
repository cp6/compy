<x-app-layout>
    <x-slot name="header">
        <x-breadcrumb :items="[
            ['label' => 'Home', 'url' => route('dashboard')],
            ['label' => 'Products', 'url' => route('products.index')],
        ]" />
    </x-slot>

    <x-slot name="pageTitle">
        Products
    </x-slot>

    <x-slot name="pageSubtitle">
        Manage your product inventory
    </x-slot>

    <div class="space-y-6">
        <x-alert.alerts />

        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
            <div>
                <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100">Products</h2>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    {{ $products->total() }} {{ Str::plural('product', $products->total()) }} total
                </p>
            </div>
            <x-button.primary href="{{ route('products.create') }}" class="shrink-0">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Add Product
            </x-button.primary>
        </div>

        <x-card.card>
            @if($products->count() > 0)
                <div class="overflow-x-auto -mx-5 sm:-mx-6">
                    <x-table.table>
                        <x-table.header>
                            <x-table.row>
                                <x-table.header-cell class="pl-6">Product</x-table.header-cell>
                                <x-table.header-cell>SKU</x-table.header-cell>
                                <x-table.header-cell class="text-right">Price</x-table.header-cell>
                                <x-table.header-cell class="text-right">Stock</x-table.header-cell>
                                <x-table.header-cell class="text-right">Sold</x-table.header-cell>
                                <x-table.header-cell>Status</x-table.header-cell>
                                <x-table.header-cell class="text-right pr-6">Actions</x-table.header-cell>
                            </x-table.row>
                        </x-table.header>
                        <x-table.body>
                            @foreach($products as $product)
                                <x-table.row class="hover:bg-gray-50 dark:hover:bg-gray-800/50 transition-colors">
                                    <x-table.cell class="pl-6">
                                        <div class="flex items-center gap-3">
                                            @if($product->image_url)
                                                <img 
                                                    src="{{ $product->image_url }}" 
                                                    alt="{{ $product->name }}"
                                                    class="w-10 h-10 rounded-lg object-cover bg-gray-100 dark:bg-gray-700"
                                                    onerror="this.style.display='none'"
                                                />
                                            @else
                                                <div class="w-10 h-10 rounded-lg bg-gradient-to-br from-dodger-blue-100 to-dodger-blue-200 dark:from-dodger-blue-900/30 dark:to-dodger-blue-800/30 flex items-center justify-center">
                                                    <svg class="w-5 h-5 text-dodger-blue-600 dark:text-dodger-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                                    </svg>
                                                </div>
                                            @endif
                                            <div class="min-w-0 flex-1">
                                                <div class="font-semibold text-gray-900 dark:text-gray-100 truncate">
                                                    {{ $product->name }}
                                                </div>
                                                @if($product->description)
                                                    <div class="text-xs text-gray-500 dark:text-gray-400 mt-0.5 truncate">
                                                        {{ Str::limit($product->description, 45) }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </x-table.cell>
                                    <x-table.cell>
                                        <span class="font-mono text-sm text-gray-600 dark:text-gray-400">
                                            {{ $product->sku }}
                                        </span>
                                    </x-table.cell>
                                    <x-table.cell class="text-right">
                                        <span class="font-semibold text-gray-900 dark:text-gray-100">
                                            ${{ number_format($product->price, 2) }}
                                        </span>
                                    </x-table.cell>
                                    <x-table.cell class="text-right">
                                        <x-badge.stock :quantity="$product->stock_quantity" />
                                    </x-table.cell>
                                    <x-table.cell class="text-right">
                                        <span class="text-sm text-gray-600 dark:text-gray-400">
                                            ${{ number_format($product->sold_amount, 2) }}
                                        </span>
                                    </x-table.cell>
                                    <x-table.cell>
                                        <x-badge.status :status="$product->status" />
                                    </x-table.cell>
                                    <x-table.cell class="pr-6">
                                        <div class="flex justify-end">
                                            <div class="relative inline-block">
                                                <x-dropdown.dropdown align="right" width="48">
                                                    <x-slot name="trigger">
                                                        <button type="button" class="inline-flex items-center justify-center p-1.5 text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-md transition-colors focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-dodger-blue-500">
                                                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                                                <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"></path>
                                                            </svg>
                                                        </button>
                                                    </x-slot>

                                            <x-slot name="content">
                                                <x-dropdown.item href="{{ route('products.show', $product) }}">
                                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                    </svg>
                                                    View
                                                </x-dropdown.item>
                                                <x-dropdown.item href="{{ route('products.edit', $product) }}">
                                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                    </svg>
                                                    Edit
                                                </x-dropdown.item>
                                                <div class="border-t border-gray-200 dark:border-gray-700 my-1"></div>
                                                <form action="{{ route('products.destroy', $product) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product? This action cannot be undone.');" class="w-full">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="block w-full px-4 py-2 text-sm text-left text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-900/20 transition-colors duration-150">
                                                        <span class="w-4 h-4 inline-block mr-2 align-middle">
                                                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                            </svg>
                                                        </span>
                                                        Delete
                                                    </button>
                                                </form>
                                            </x-slot>
                                        </x-dropdown.dropdown>
                                            </div>
                                        </div>
                                    </x-table.cell>
                                </x-table.row>
                            @endforeach
                        </x-table.body>
                    </x-table.table>
                </div>

                @if($products->hasPages())
                    <div class="px-6 py-4 border-t border-gray-200 dark:border-gray-700">
                        {{ $products->links() }}
                    </div>
                @endif
            @else
                <x-empty-state.empty-state
                    title="No products found"
                    description="Get started by creating your first product."
                    action-label="Create Product"
                    action-route="products.create"
                >
                    <x-slot name="icon">
                        <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                        </svg>
                    </x-slot>
                    <x-slot name="actionIcon">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                    </x-slot>
                </x-empty-state.empty-state>
            @endif
        </x-card.card>
    </div>
</x-app-layout>

