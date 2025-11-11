<x-app-layout>
    <x-slot name="header">
        <x-breadcrumb :items="[
            ['label' => 'Home', 'url' => route('dashboard')],
            ['label' => 'Tables', 'url' => route('tables.demo')],
            ['label' => 'Dynamic Table'],
        ]" />
    </x-slot>

    <x-slot name="pageTitle">
        Dynamic Table with API
    </x-slot>

    <x-slot name="pageSubtitle">
        A fully interactive table with async loading, pagination, filtering, searching, and sorting powered by the Mock Data API
    </x-slot>

    <div class="space-y-6 sm:space-y-8">
        <x-alert.alerts />

        <x-card.card variant="gradient">
            <x-slot name="header">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                    <div>
                        <h3 class="text-lg sm:text-xl font-semibold text-gray-900 dark:text-gray-100">
                            Dynamic Data Table
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

            <div 
                x-data="dynamicTable()"
                x-init="loadData()"
                class="space-y-4"
            >
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
                            <option value="10">10 per page</option>
                            <option value="15">15 per page</option>
                            <option value="25">25 per page</option>
                            <option value="50">50 per page</option>
                            <option value="100">100 per page</option>
                        </select>
                    </div>
                </div>

                <!-- Error State -->
                <div x-show="error && !$store.pageLoading.loading" class="p-4 bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 rounded-lg">
                    <p class="text-sm text-red-800 dark:text-red-200" x-text="error"></p>
                </div>

                <!-- Table -->
                <div x-show="!$store.pageLoading.loading && !error" class="overflow-x-auto">
                    <x-table.table striped hover>
                        <x-table.header>
                            <x-table.row>
                                <x-table.header-cell 
                                    class="cursor-pointer select-none"
                                    @click="sort('id')"
                                >
                                    <div class="flex items-center gap-2">
                                        <span>ID</span>
                                        <span x-show="sortBy === 'id'">
                                            <svg class="h-4 w-4" :class="sortDir === 'asc' ? '' : 'rotate-180'" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </span>
                                    </div>
                                </x-table.header-cell>
                                
                                <x-table.header-cell 
                                    x-show="resource === '' || resource === 'users'"
                                    class="cursor-pointer select-none"
                                    @click="sort('name')"
                                >
                                    <div class="flex items-center gap-2">
                                        <span>Name</span>
                                        <span x-show="sortBy === 'name'">
                                            <svg class="h-4 w-4" :class="sortDir === 'asc' ? '' : 'rotate-180'" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </span>
                                    </div>
                                </x-table.header-cell>

                                <x-table.header-cell 
                                    x-show="resource === 'products'"
                                    class="cursor-pointer select-none"
                                    @click="sort('name')"
                                >
                                    <div class="flex items-center gap-2">
                                        <span>Product</span>
                                        <span x-show="sortBy === 'name'">
                                            <svg class="h-4 w-4" :class="sortDir === 'asc' ? '' : 'rotate-180'" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </span>
                                    </div>
                                </x-table.header-cell>

                                <x-table.header-cell x-show="resource === 'orders'">Order #</x-table.header-cell>
                                <x-table.header-cell x-show="resource === 'orders'">Customer</x-table.header-cell>

                                <x-table.header-cell 
                                    x-show="resource === 'posts'"
                                    class="cursor-pointer select-none"
                                    @click="sort('title')"
                                >
                                    <div class="flex items-center gap-2">
                                        <span>Title</span>
                                        <span x-show="sortBy === 'title'">
                                            <svg class="h-4 w-4" :class="sortDir === 'asc' ? '' : 'rotate-180'" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </span>
                                    </div>
                                </x-table.header-cell>

                                <x-table.header-cell 
                                    x-show="resource === 'tasks'"
                                    class="cursor-pointer select-none"
                                    @click="sort('title')"
                                >
                                    <div class="flex items-center gap-2">
                                        <span>Task</span>
                                        <span x-show="sortBy === 'title'">
                                            <svg class="h-4 w-4" :class="sortDir === 'asc' ? '' : 'rotate-180'" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </span>
                                    </div>
                                </x-table.header-cell>

                                <x-table.header-cell x-show="resource === '' || resource === 'users'">Email</x-table.header-cell>
                                <x-table.header-cell x-show="resource === '' || resource === 'users'">Role</x-table.header-cell>
                                <x-table.header-cell x-show="resource === '' || resource === 'users'">Status</x-table.header-cell>

                                <x-table.header-cell 
                                    x-show="resource === 'products'"
                                    class="cursor-pointer select-none"
                                    @click="sort('price')"
                                >
                                    <div class="flex items-center gap-2">
                                        <span>Price</span>
                                        <span x-show="sortBy === 'price'">
                                            <svg class="h-4 w-4" :class="sortDir === 'asc' ? '' : 'rotate-180'" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </span>
                                    </div>
                                </x-table.header-cell>
                                <x-table.header-cell x-show="resource === 'products'">Category</x-table.header-cell>
                                <x-table.header-cell x-show="resource === 'products'">Stock</x-table.header-cell>

                                <x-table.header-cell 
                                    x-show="resource === 'orders'"
                                    class="cursor-pointer select-none"
                                    @click="sort('total')"
                                >
                                    <div class="flex items-center gap-2">
                                        <span>Total</span>
                                        <span x-show="sortBy === 'total'">
                                            <svg class="h-4 w-4" :class="sortDir === 'asc' ? '' : 'rotate-180'" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </span>
                                    </div>
                                </x-table.header-cell>
                                <x-table.header-cell x-show="resource === 'orders'">Status</x-table.header-cell>
                                <x-table.header-cell x-show="resource === 'orders'">Date</x-table.header-cell>

                                <x-table.header-cell x-show="resource === 'posts'">Author</x-table.header-cell>
                                <x-table.header-cell x-show="resource === 'posts'">Category</x-table.header-cell>
                                <x-table.header-cell x-show="resource === 'posts'">Views</x-table.header-cell>
                                <x-table.header-cell x-show="resource === 'posts'">Status</x-table.header-cell>

                                <x-table.header-cell x-show="resource === 'tasks'">Assignee</x-table.header-cell>
                                <x-table.header-cell x-show="resource === 'tasks'">Status</x-table.header-cell>
                                <x-table.header-cell x-show="resource === 'tasks'">Priority</x-table.header-cell>
                                <x-table.header-cell x-show="resource === 'tasks'">Progress</x-table.header-cell>

                                <x-table.header-cell x-show="resource === ''">Company</x-table.header-cell>
                                <x-table.header-cell x-show="resource === ''">Department</x-table.header-cell>
                                <x-table.header-cell x-show="resource === ''">Status</x-table.header-cell>
                            </x-table.row>
                        </x-table.header>
                        <x-table.body>
                            <template x-for="item in data" :key="item.id">
                                <x-table.row>
                                    <x-table.cell nowrap class="font-medium" x-text="item.id"></x-table.cell>
                                    
                                    <x-table.cell 
                                        x-show="resource === '' || resource === 'users'"
                                        nowrap 
                                        x-text="item.name"
                                    ></x-table.cell>
                                    <x-table.cell 
                                        x-show="resource === '' || resource === 'users'"
                                        nowrap 
                                        class="text-gray-500 dark:text-gray-400" 
                                        x-text="item.email"
                                    ></x-table.cell>
                                    <x-table.cell 
                                        x-show="resource === '' || resource === 'users'"
                                        nowrap
                                    >
                                        <span class="px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200" x-text="item.role"></span>
                                    </x-table.cell>
                                    <x-table.cell 
                                        x-show="resource === '' || resource === 'users'"
                                        nowrap
                                    >
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
                                    </x-table.cell>

                                    <x-table.cell x-show="resource === 'products'">
                                        <div class="font-medium" x-text="item.name"></div>
                                        <div class="text-sm text-gray-500 dark:text-gray-400" x-text="item.sku"></div>
                                    </x-table.cell>
                                    <x-table.cell 
                                        x-show="resource === 'products'"
                                        nowrap 
                                        class="font-medium" 
                                        x-text="'$' + parseFloat(item.price).toFixed(2)"
                                    ></x-table.cell>
                                    <x-table.cell 
                                        x-show="resource === 'products'"
                                        nowrap 
                                        class="text-gray-500 dark:text-gray-400" 
                                        x-text="item.category"
                                    ></x-table.cell>
                                    <x-table.cell 
                                        x-show="resource === 'products'"
                                        nowrap
                                    >
                                        <span 
                                            class="px-2 py-1 text-xs font-semibold rounded-full"
                                            :class="{
                                                'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200': item.stock > 50,
                                                'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200': item.stock > 0 && item.stock <= 50,
                                                'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200': item.stock === 0
                                            }"
                                            x-text="item.stock + ' units'"
                                        ></span>
                                    </x-table.cell>

                                    <x-table.cell 
                                        x-show="resource === 'orders'"
                                        nowrap 
                                        class="font-medium" 
                                        x-text="item.order_number"
                                    ></x-table.cell>
                                    <x-table.cell 
                                        x-show="resource === 'orders'"
                                        nowrap 
                                        x-text="item.customer_name"
                                    ></x-table.cell>
                                    <x-table.cell 
                                        x-show="resource === 'orders'"
                                        nowrap 
                                        class="font-medium" 
                                        x-text="'$' + parseFloat(item.total).toFixed(2)"
                                    ></x-table.cell>
                                    <x-table.cell 
                                        x-show="resource === 'orders'"
                                        nowrap
                                    >
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
                                    </x-table.cell>
                                    <x-table.cell 
                                        x-show="resource === 'orders'"
                                        nowrap 
                                        class="text-gray-500 dark:text-gray-400" 
                                        x-text="item.created_at"
                                    ></x-table.cell>

                                    <x-table.cell x-show="resource === 'posts'">
                                        <div class="font-medium" x-text="item.title"></div>
                                        <div class="text-sm text-gray-500 dark:text-gray-400 line-clamp-1" x-text="item.excerpt"></div>
                                    </x-table.cell>
                                    <x-table.cell 
                                        x-show="resource === 'posts'"
                                        nowrap 
                                        x-text="item.author"
                                    ></x-table.cell>
                                    <x-table.cell 
                                        x-show="resource === 'posts'"
                                        nowrap 
                                        class="text-gray-500 dark:text-gray-400" 
                                        x-text="item.category"
                                    ></x-table.cell>
                                    <x-table.cell 
                                        x-show="resource === 'posts'"
                                        nowrap 
                                        class="text-gray-500 dark:text-gray-400" 
                                        x-text="item.views ? item.views.toLocaleString() : '0'"
                                    ></x-table.cell>
                                    <x-table.cell 
                                        x-show="resource === 'posts'"
                                        nowrap
                                    >
                                        <span 
                                            class="px-2 py-1 text-xs font-semibold rounded-full"
                                            :class="{
                                                'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200': item.status === 'published',
                                                'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200': item.status === 'draft',
                                                'bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-200': item.status === 'archived'
                                            }"
                                            x-text="item.status"
                                        ></span>
                                    </x-table.cell>

                                    <x-table.cell x-show="resource === 'tasks'">
                                        <div class="font-medium" x-text="item.title"></div>
                                        <div class="text-sm text-gray-500 dark:text-gray-400" x-text="item.project"></div>
                                    </x-table.cell>
                                    <x-table.cell 
                                        x-show="resource === 'tasks'"
                                        nowrap 
                                        x-text="item.assignee"
                                    ></x-table.cell>
                                    <x-table.cell 
                                        x-show="resource === 'tasks'"
                                        nowrap
                                    >
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
                                    </x-table.cell>
                                    <x-table.cell 
                                        x-show="resource === 'tasks'"
                                        nowrap
                                    >
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
                                    </x-table.cell>
                                    <x-table.cell 
                                        x-show="resource === 'tasks'"
                                        nowrap
                                    >
                                        <div class="flex items-center gap-2">
                                            <div class="flex-1 bg-gray-200 dark:bg-gray-700 rounded-full h-2">
                                                <div 
                                                    class="bg-emerald-500 h-2 rounded-full transition-all"
                                                    :style="'width: ' + item.progress + '%'"
                                                ></div>
                                            </div>
                                            <span class="text-xs text-gray-600 dark:text-gray-400" x-text="item.progress + '%'"></span>
                                        </div>
                                    </x-table.cell>

                                    <x-table.cell 
                                        x-show="resource === ''"
                                        nowrap 
                                        x-text="item.company"
                                    ></x-table.cell>
                                    <x-table.cell 
                                        x-show="resource === ''"
                                        nowrap 
                                        class="text-gray-500 dark:text-gray-400" 
                                        x-text="item.department"
                                    ></x-table.cell>
                                    <x-table.cell 
                                        x-show="resource === ''"
                                        nowrap
                                    >
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
                                    </x-table.cell>
                                </x-table.row>
                            </template>
                            
                            <x-table.row x-show="!$store.pageLoading.loading && data.length === 0">
                                <x-table.cell colspan="10" class="text-center py-8 text-gray-500 dark:text-gray-400">
                                    No data found
                                </x-table.cell>
                            </x-table.row>
                        </x-table.body>
                    </x-table.table>
                </div>

                <!-- Pagination -->
                <div x-show="!$store.pageLoading.loading && !error && meta.last_page > 1" class="flex items-center justify-between border-t border-gray-200 dark:border-gray-700 px-4 py-3 sm:px-6">
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
        </x-card.card>
    </div>

    @push('scripts')
    <script>
        function dynamicTable() {
            return {
                resource: '',
                data: [],
                meta: {
                    current_page: 1,
                    per_page: 15,
                    total: 0,
                    last_page: 1,
                    from: 0,
                    to: 0
                },
                error: null,
                searchQuery: '',
                sortBy: 'id',
                sortDir: 'asc',
                perPage: 15,
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

                sort(field) {
                    if (this.sortBy === field) {
                        this.sortDir = this.sortDir === 'asc' ? 'desc' : 'asc';
                    } else {
                        this.sortBy = field;
                        this.sortDir = 'asc';
                    }
                    this.loadData();
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
