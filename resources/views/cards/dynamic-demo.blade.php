<x-app-layout>
    <x-slot name="header">
        <x-breadcrumb :items="[
            ['label' => 'Home', 'url' => route('dashboard')],
            ['label' => 'Cards', 'url' => route('cards.demo')],
            ['label' => 'Dynamic Cards'],
        ]" />
    </x-slot>

    <x-slot name="pageTitle">
        Dynamic Cards with API
    </x-slot>

    <x-slot name="pageSubtitle">
        A fully interactive card grid with async loading, pagination, filtering, searching, and sorting powered by the Mock Data API
    </x-slot>

    <div 
        x-data="dynamicCards()"
        x-init="loadData()"
        class="space-y-6 sm:space-y-8"
    >
        <x-alert.alerts />

        <!-- Header Section -->
        <x-card.card variant="gradient">
            <x-slot name="header">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                    <div>
                        <h3 class="text-lg sm:text-xl font-semibold text-gray-900 dark:text-gray-100">
                            Dynamic Card Grid
                        </h3>
                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            Real-time data loading with advanced filtering and search capabilities
                        </p>
                    </div>
                    <div class="flex items-center gap-2">
                        <select 
                            x-model="resource"
                            @change="loadData()"
                            class="px-3 py-2 text-sm rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-emerald-500 dark:focus:ring-emerald-400"
                        >
                            <option value="">Generic Data</option>
                            <option value="users">Users</option>
                            <option value="products">Products</option>
                            <option value="orders">Orders</option>
                            <option value="posts">Posts</option>
                            <option value="tasks">Tasks</option>
                        </select>
                    </div>
                </div>
            </x-slot>
        </x-card.card>

        <!-- Filters Section -->
        <x-card.card variant="gradient">
            <div class="space-y-4">
                <!-- Filters and Search Bar -->
                <div class="flex flex-col lg:flex-row gap-4">
                    <!-- Search -->
                    <div class="flex-1">
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                            <input 
                                type="text"
                                x-model="searchQuery"
                                @input.debounce.500ms="loadData()"
                                placeholder="Search across all fields..."
                                class="block w-full pl-10 pr-3 py-2.5 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-emerald-500 dark:focus:ring-emerald-400 text-sm"
                            />
                        </div>
                    </div>

                    <!-- Quick Filters -->
                    <div class="flex flex-wrap gap-2">
                        <select 
                            x-show="resource === '' || resource === 'users'"
                            x-model="filters.status"
                            @change="loadData()"
                            class="px-3 py-2 text-sm rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-emerald-500 dark:focus:ring-emerald-400"
                        >
                            <option value="">All Status</option>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                            <option value="pending">Pending</option>
                            <option value="suspended">Suspended</option>
                        </select>

                        <select 
                            x-show="resource === '' || resource === 'users'"
                            x-model="filters.role"
                            @change="loadData()"
                            class="px-3 py-2 text-sm rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-emerald-500 dark:focus:ring-emerald-400"
                        >
                            <option value="">All Roles</option>
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                            <option value="manager">Manager</option>
                            <option value="editor">Editor</option>
                            <option value="viewer">Viewer</option>
                        </select>

                        <select 
                            x-show="resource === 'products'"
                            x-model="filters.category"
                            @change="loadData()"
                            class="px-3 py-2 text-sm rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-emerald-500 dark:focus:ring-emerald-400"
                        >
                            <option value="">All Categories</option>
                            <option value="Electronics">Electronics</option>
                            <option value="Clothing">Clothing</option>
                            <option value="Books">Books</option>
                            <option value="Home">Home</option>
                            <option value="Sports">Sports</option>
                            <option value="Toys">Toys</option>
                        </select>

                        <select 
                            x-show="resource === 'orders'"
                            x-model="filters.status"
                            @change="loadData()"
                            class="px-3 py-2 text-sm rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-emerald-500 dark:focus:ring-emerald-400"
                        >
                            <option value="">All Status</option>
                            <option value="pending">Pending</option>
                            <option value="processing">Processing</option>
                            <option value="shipped">Shipped</option>
                            <option value="delivered">Delivered</option>
                            <option value="cancelled">Cancelled</option>
                        </select>

                        <select 
                            x-show="resource === 'tasks'"
                            x-model="filters.status"
                            @change="loadData()"
                            class="px-3 py-2 text-sm rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-emerald-500 dark:focus:ring-emerald-400"
                        >
                            <option value="">All Status</option>
                            <option value="todo">Todo</option>
                            <option value="in_progress">In Progress</option>
                            <option value="review">Review</option>
                            <option value="done">Done</option>
                            <option value="cancelled">Cancelled</option>
                        </select>

                        <!-- Per Page Selector -->
                        <select 
                            x-model="perPage"
                            @change="loadData()"
                            class="px-3 py-2 text-sm rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-emerald-500 dark:focus:ring-emerald-400"
                        >
                            <option value="6">6 per page</option>
                            <option value="9">9 per page</option>
                            <option value="12">12 per page</option>
                            <option value="18">18 per page</option>
                            <option value="24">24 per page</option>
                        </select>

                        <!-- Sort Selector -->
                        <select 
                            x-model="sortBy"
                            @change="loadData()"
                            class="px-3 py-2 text-sm rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-emerald-500 dark:focus:ring-emerald-400"
                        >
                            <option value="id">Sort by ID</option>
                            <option value="name">Sort by Name</option>
                            <option value="created_at">Sort by Date</option>
                            <option x-show="resource === 'products'" value="price">Sort by Price</option>
                            <option x-show="resource === 'orders'" value="total">Sort by Total</option>
                        </select>

                        <button 
                            @click="sortDir = sortDir === 'asc' ? 'desc' : 'asc'; loadData()"
                            class="px-3 py-2 text-sm rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-emerald-500 dark:focus:ring-emerald-400 transition-colors"
                            title="Toggle sort direction"
                        >
                            <svg class="h-5 w-5" :class="sortDir === 'asc' ? '' : 'rotate-180'" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Error State -->
                <div x-show="error && !$store.pageLoading.loading" class="p-4 bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 rounded-lg">
                    <p class="text-sm text-red-800 dark:text-red-200" x-text="error"></p>
                </div>

            </div>
        </x-card.card>

        <!-- Cards Grid -->
        <div x-show="!$store.pageLoading.loading && !error">
            <!-- Generic/Users Cards -->
            <template x-if="resource === '' || resource === 'users'">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <template x-for="item in data" :key="item.id">
                        <x-card.card variant="gradient" hover class="h-full flex flex-col">
                            <x-slot name="header">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-3 min-w-0 flex-1">
                                        <div class="w-12 h-12 flex-shrink-0 rounded-full bg-gradient-to-br from-emerald-400 to-emerald-600 flex items-center justify-center text-white font-bold text-lg shadow-lg" x-text="item.name ? item.name.charAt(0).toUpperCase() : 'U'"></div>
                                        <div class="min-w-0 flex-1">
                                            <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 truncate" x-text="item.name"></h3>
                                            <p class="text-sm text-gray-600 dark:text-gray-400 truncate" x-text="item.email"></p>
                                        </div>
                                    </div>
                                </div>
                            </x-slot>
                            <div class="space-y-3 flex-1 flex flex-col">
                                <div class="flex items-center justify-between">
                                    <span class="text-sm text-gray-600 dark:text-gray-400">Role</span>
                                    <span class="px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200" x-text="item.role"></span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-sm text-gray-600 dark:text-gray-400">Status</span>
                                    <span 
                                        class="px-2 py-1 text-xs font-semibold rounded-full"
                                        :class="{
                                            'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200': item.status === 'active',
                                            'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200': item.status === 'inactive',
                                            'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200': item.status === 'pending',
                                            'bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-200': item.status === 'suspended'
                                        }"
                                        x-text="item.status"
                                    ></span>
                                </div>
                                <div x-show="item.company" class="flex items-center justify-between">
                                    <span class="text-sm text-gray-600 dark:text-gray-400">Company</span>
                                    <span class="text-sm font-medium text-gray-900 dark:text-gray-100 truncate ml-2 text-right" x-text="item.company"></span>
                                </div>
                                <div x-show="item.department" class="flex items-center justify-between">
                                    <span class="text-sm text-gray-600 dark:text-gray-400">Department</span>
                                    <span class="text-sm font-medium text-gray-900 dark:text-gray-100 truncate ml-2 text-right" x-text="item.department"></span>
                                </div>
                            </div>
                        </x-card.card>
                    </template>
                </div>
            </template>

            <!-- Products Cards -->
            <template x-if="resource === 'products'">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <template x-for="item in data" :key="item.id">
                        <x-card.card 
                            variant="gradient"
                            hover
                            class="h-full flex flex-col"
                        >
                            <x-slot name="header">
                                <h3 class="text-lg sm:text-xl font-bold text-gray-900 dark:text-gray-100 line-clamp-2" x-text="item.name"></h3>
                                <p class="mt-1.5 text-xs sm:text-sm text-gray-600 dark:text-gray-400 leading-relaxed truncate" x-text="item.sku"></p>
                            </x-slot>
                            <div class="space-y-3 flex-1 flex flex-col">
                                <p class="text-gray-700 dark:text-gray-300 mb-4 leading-relaxed line-clamp-3" x-text="item.description"></p>
                                <div class="flex items-center justify-between">
                                    <span class="text-sm text-gray-600 dark:text-gray-400">Price</span>
                                    <span class="text-lg font-bold text-emerald-600 dark:text-emerald-400" x-text="'$' + parseFloat(item.price).toFixed(2)"></span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-sm text-gray-600 dark:text-gray-400">Category</span>
                                    <span class="px-2 py-1 text-xs font-semibold rounded-full bg-purple-100 text-purple-800 dark:bg-purple-900 dark:text-purple-200" x-text="item.category"></span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-sm text-gray-600 dark:text-gray-400">Stock</span>
                                    <span 
                                        class="px-2 py-1 text-xs font-semibold rounded-full"
                                        :class="{
                                            'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200': item.stock > 50,
                                            'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200': item.stock > 0 && item.stock <= 50,
                                            'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200': item.stock === 0
                                        }"
                                        x-text="item.stock + ' units'"
                                    ></span>
                                </div>
                                <div x-show="item.rating" class="flex items-center justify-between">
                                    <span class="text-sm text-gray-600 dark:text-gray-400">Rating</span>
                                    <div class="flex items-center gap-1">
                                        <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                        </svg>
                                        <span class="text-sm font-medium text-gray-900 dark:text-gray-100" x-text="parseFloat(item.rating).toFixed(1)"></span>
                                    </div>
                                </div>
                                <div class="mt-auto pt-2">
                                    <x-button.primary variant="gradient" class="w-full">
                                        View Details
                                    </x-button.primary>
                                </div>
                            </div>
                        </x-card.card>
                    </template>
                </div>
            </template>

            <!-- Orders Cards -->
            <template x-if="resource === 'orders'">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <template x-for="item in data" :key="item.id">
                        <x-card.card variant="gradient" hover class="h-full flex flex-col">
                            <x-slot name="header">
                                <div class="flex items-center justify-between">
                                    <div class="min-w-0 flex-1">
                                        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 truncate" x-text="item.order_number"></h3>
                                        <p class="text-sm text-gray-600 dark:text-gray-400 mt-1 truncate" x-text="item.customer_name"></p>
                                    </div>
                                </div>
                            </x-slot>
                            <div class="space-y-3 flex-1 flex flex-col">
                                <div class="flex items-center justify-between">
                                    <span class="text-sm text-gray-600 dark:text-gray-400">Total</span>
                                    <span class="text-xl font-bold text-emerald-600 dark:text-emerald-400" x-text="'$' + parseFloat(item.total).toFixed(2)"></span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-sm text-gray-600 dark:text-gray-400">Status</span>
                                    <span 
                                        class="px-2 py-1 text-xs font-semibold rounded-full"
                                        :class="{
                                            'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200': item.status === 'delivered',
                                            'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200': item.status === 'shipped',
                                            'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200': item.status === 'processing' || item.status === 'pending',
                                            'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200': item.status === 'cancelled'
                                        }"
                                        x-text="item.status"
                                    ></span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-sm text-gray-600 dark:text-gray-400">Items</span>
                                    <span class="text-sm font-medium text-gray-900 dark:text-gray-100" x-text="item.items_count + ' items'"></span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-sm text-gray-600 dark:text-gray-400">Date</span>
                                    <span class="text-sm text-gray-500 dark:text-gray-400 truncate ml-2 text-right" x-text="item.created_at"></span>
                                </div>
                            </div>
                        </x-card.card>
                    </template>
                </div>
            </template>

            <!-- Posts Cards -->
            <template x-if="resource === 'posts'">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <template x-for="item in data" :key="item.id">
                        <x-card.card 
                            variant="gradient"
                            hover
                            class="h-full flex flex-col"
                        >
                            <x-slot name="header">
                                <h3 class="text-lg sm:text-xl font-bold text-gray-900 dark:text-gray-100 line-clamp-2" x-text="item.title"></h3>
                                <p class="mt-1.5 text-xs sm:text-sm text-gray-600 dark:text-gray-400 leading-relaxed truncate" x-text="item.author"></p>
                            </x-slot>
                            <div class="space-y-3 flex-1 flex flex-col">
                                <p class="text-gray-700 dark:text-gray-300 mb-4 leading-relaxed line-clamp-3" x-text="item.excerpt"></p>
                                <div class="flex items-center justify-between">
                                    <span class="text-sm text-gray-600 dark:text-gray-400">Category</span>
                                    <span class="px-2 py-1 text-xs font-semibold rounded-full bg-indigo-100 text-indigo-800 dark:bg-indigo-900 dark:text-indigo-200" x-text="item.category"></span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-sm text-gray-600 dark:text-gray-400">Views</span>
                                    <span class="text-sm font-medium text-gray-900 dark:text-gray-100" x-text="item.views ? item.views.toLocaleString() : '0'"></span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-sm text-gray-600 dark:text-gray-400">Status</span>
                                    <span 
                                        class="px-2 py-1 text-xs font-semibold rounded-full"
                                        :class="{
                                            'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200': item.status === 'published',
                                            'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200': item.status === 'draft',
                                            'bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-200': item.status === 'archived'
                                        }"
                                        x-text="item.status"
                                    ></span>
                                </div>
                                <div class="mt-auto pt-2">
                                    <x-button.primary variant="gradient" class="w-full">
                                        Read More
                                    </x-button.primary>
                                </div>
                            </div>
                        </x-card.card>
                    </template>
                </div>
            </template>

            <!-- Tasks Cards -->
            <template x-if="resource === 'tasks'">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <template x-for="item in data" :key="item.id">
                        <x-card.card variant="gradient" hover class="h-full flex flex-col">
                            <x-slot name="header">
                                <div class="min-w-0">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 line-clamp-2" x-text="item.title"></h3>
                                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-1 truncate" x-text="item.project"></p>
                                </div>
                            </x-slot>
                            <div class="space-y-3 flex-1 flex flex-col">
                                <div class="flex items-center justify-between">
                                    <span class="text-sm text-gray-600 dark:text-gray-400">Assignee</span>
                                    <span class="text-sm font-medium text-gray-900 dark:text-gray-100 truncate ml-2 text-right" x-text="item.assignee"></span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-sm text-gray-600 dark:text-gray-400">Status</span>
                                    <span 
                                        class="px-2 py-1 text-xs font-semibold rounded-full"
                                        :class="{
                                            'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200': item.status === 'done',
                                            'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200': item.status === 'in_progress',
                                            'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200': item.status === 'review',
                                            'bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-200': item.status === 'todo',
                                            'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200': item.status === 'cancelled'
                                        }"
                                        x-text="item.status.replace('_', ' ')"
                                    ></span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-sm text-gray-600 dark:text-gray-400">Priority</span>
                                    <span 
                                        class="px-2 py-1 text-xs font-semibold rounded-full"
                                        :class="{
                                            'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200': item.priority === 'urgent',
                                            'bg-orange-100 text-orange-800 dark:bg-orange-900 dark:text-orange-200': item.priority === 'high',
                                            'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200': item.priority === 'medium',
                                            'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200': item.priority === 'low'
                                        }"
                                        x-text="item.priority"
                                    ></span>
                                </div>
                                <div>
                                    <div class="flex items-center justify-between mb-1">
                                        <span class="text-sm text-gray-600 dark:text-gray-400">Progress</span>
                                        <span class="text-sm font-medium text-gray-900 dark:text-gray-100" x-text="item.progress + '%'"></span>
                                    </div>
                                    <div class="flex-1 bg-gray-200 dark:bg-gray-700 rounded-full h-2">
                                        <div 
                                            class="bg-emerald-500 h-2 rounded-full transition-all"
                                            :style="'width: ' + item.progress + '%'"
                                        ></div>
                                    </div>
                                </div>
                            </div>
                        </x-card.card>
                    </template>
                </div>
            </template>

            <!-- Empty State -->
            <div x-show="!$store.pageLoading.loading && data.length === 0" class="text-center py-12">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                </svg>
                <h3 class="mt-2 text-sm font-medium text-gray-900 dark:text-gray-100">No data found</h3>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Try adjusting your search or filters.</p>
            </div>
        </div>

        <!-- Pagination -->
        <div 
            x-show="!$store.pageLoading.loading && !error && meta.last_page > 1" 
            class="flex items-center justify-between border-t border-gray-200 dark:border-gray-700 px-4 py-3 sm:px-6"
        >
                    <div class="hidden sm:block">
                        <p class="text-sm text-gray-700 dark:text-gray-300">
                            Showing
                            <span class="font-medium" x-text="meta.from"></span>
                            to
                            <span class="font-medium" x-text="meta.to"></span>
                            of
                            <span class="font-medium" x-text="meta.total"></span>
                            results
                        </p>
                    </div>
                    <div class="flex flex-1 justify-between sm:justify-end">
                        <div class="flex items-center gap-1">
                            <!-- Previous Button -->
                            <button 
                                @click="goToPage(meta.current_page - 1)" 
                                :disabled="meta.current_page === 1"
                                :class="meta.current_page === 1 ? 'cursor-not-allowed text-gray-400 dark:text-gray-600' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700'"
                                class="relative inline-flex items-center px-3 py-2 text-sm font-medium bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500 dark:focus:ring-emerald-400 transition-colors"
                            >
                                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                                <span class="ml-1 hidden sm:inline">Previous</span>
                            </button>

                            <!-- Page Numbers -->
                            <div class="flex items-center gap-1">
                                <template x-for="element in pageElements" :key="element.type + '-' + (element.page || '')">
                                    <span 
                                        x-show="element.type === 'dots'"
                                        class="relative inline-flex items-center px-2 sm:px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300"
                                    >...</span>
                                    <span 
                                        x-show="element.type === 'page' && element.page === meta.current_page"
                                        class="relative inline-flex items-center px-2 sm:px-4 py-2 text-sm font-semibold text-white bg-emerald-600 dark:bg-emerald-500 border border-emerald-600 dark:border-emerald-500 rounded-lg cursor-default" 
                                        x-text="element.page"
                                    ></span>
                                    <button 
                                        x-show="element.type === 'page' && element.page !== meta.current_page"
                                        @click="goToPage(element.page)" 
                                        class="relative inline-flex items-center px-2 sm:px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500 dark:focus:ring-emerald-400 transition-colors"
                                        x-text="element.page"
                                    ></button>
                                </template>
                            </div>

                            <!-- Next Button -->
                            <button 
                                @click="goToPage(meta.current_page + 1)" 
                                :disabled="meta.current_page >= meta.last_page"
                                :class="meta.current_page >= meta.last_page ? 'cursor-not-allowed text-gray-400 dark:text-gray-600' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700'"
                                class="relative inline-flex items-center px-3 py-2 text-sm font-medium bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500 dark:focus:ring-emerald-400 transition-colors"
                            >
                                <span class="mr-1 hidden sm:inline">Next</span>
                                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
        </div>
    </div>

    @push('scripts')
    <script>
        function dynamicCards() {
            return {
                resource: '',
                data: [],
                meta: {
                    current_page: 1,
                    per_page: 6,
                    total: 0,
                    last_page: 1,
                    from: 0,
                    to: 0
                },
                error: null,
                searchQuery: '',
                sortBy: 'id',
                sortDir: 'asc',
                perPage: 6,
                filters: {
                    status: '',
                    role: '',
                    category: ''
                },

                async loadData() {
                    // Set loading state immediately
                    this.$store.pageLoading.setLoading(true);
                    this.error = null;
                    
                    // Use nextTick to ensure DOM updates before fetch
                    await this.$nextTick();
                    
                    // Small delay to ensure spinner is visible (even for fast requests)
                    await new Promise(resolve => setTimeout(resolve, 50));

                    try {
                        let url = '/api/mock-data';
                        if (this.resource) {
                            url = `/api/mock-data/${this.resource}`;
                        }

                        const params = new URLSearchParams({
                            page: this.meta.current_page,
                            per_page: this.perPage,
                            sort_by: this.sortBy,
                            sort_dir: this.sortDir,
                        });

                        if (this.searchQuery) {
                            params.append('search', this.searchQuery);
                        }

                        // Add filters
                        Object.keys(this.filters).forEach(key => {
                            if (this.filters[key]) {
                                params.append(key, this.filters[key]);
                            }
                        });

                        const response = await fetch(`${url}?${params.toString()}`);
                        
                        if (!response.ok) {
                            throw new Error(`HTTP error! status: ${response.status}`);
                        }

                        const result = await response.json();
                        this.data = result.data || [];
                        this.meta = result.meta || this.meta;
                    } catch (err) {
                        this.error = err.message || 'Failed to load data';
                        this.data = [];
                    } finally {
                        this.$store.pageLoading.setLoading(false);
                    }
                },

                goToPage(page) {
                    if (page >= 1 && page <= this.meta.last_page) {
                        this.meta.current_page = page;
                        this.loadData();
                    }
                },

                get pageElements() {
                    const elements = [];
                    const onEachSide = 2;
                    const start = Math.max(1, this.meta.current_page - onEachSide);
                    const end = Math.min(this.meta.last_page, this.meta.current_page + onEachSide);
                    
                    if (start > 1) {
                        elements.push({ type: 'page', page: 1 });
                        if (start > 2) {
                            elements.push({ type: 'dots' });
                        }
                    }
                    
                    for (let i = start; i <= end; i++) {
                        elements.push({ type: 'page', page: i });
                    }
                    
                    if (end < this.meta.last_page) {
                        if (end < this.meta.last_page - 1) {
                            elements.push({ type: 'dots' });
                        }
                        elements.push({ type: 'page', page: this.meta.last_page });
                    }
                    
                    return elements;
                }
            }
        }
    </script>
    @endpush
</x-app-layout>

