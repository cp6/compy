<x-app-layout>
    <x-slot name="header">
        <x-breadcrumb :items="[
            ['label' => 'Home', 'url' => route('dashboard')],
            ['label' => 'Tables', 'url' => '#'],
            ['label' => 'Demo'],
        ]" />
    </x-slot>

    <x-slot name="pageTitle">
        Table Components Demo
    </x-slot>

    <x-slot name="pageSubtitle">
        A comprehensive demo of various table layouts and styles using reusable components
    </x-slot>

    <div class="space-y-6 sm:space-y-8">
        <x-alert.alerts />
            
            <!-- Basic Table -->
            <x-card.card variant="gradient">
                <x-slot name="header">
                    <h3 class="text-lg sm:text-xl font-semibold text-gray-900 dark:text-gray-100">
                        Basic Table
                    </h3>
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                        A simple table with basic styling using table components
                    </p>
                </x-slot>

                <x-table.table>
                    <x-table.header>
                        <x-table.row>
                            <x-table.header-cell>Name</x-table.header-cell>
                            <x-table.header-cell>Email</x-table.header-cell>
                            <x-table.header-cell>Role</x-table.header-cell>
                            <x-table.header-cell>Status</x-table.header-cell>
                        </x-table.row>
                    </x-table.header>
                    <x-table.body>
                        <x-table.row>
                            <x-table.cell nowrap>
                                <span class="font-medium">John Doe</span>
                            </x-table.cell>
                            <x-table.cell nowrap class="text-gray-500 dark:text-gray-400">
                                john.doe@example.com
                            </x-table.cell>
                            <x-table.cell nowrap class="text-gray-500 dark:text-gray-400">
                                Admin
                            </x-table.cell>
                            <x-table.cell nowrap>
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                                    Active
                                </span>
                            </x-table.cell>
                        </x-table.row>
                        <x-table.row>
                            <x-table.cell nowrap>
                                <span class="font-medium">Jane Smith</span>
                            </x-table.cell>
                            <x-table.cell nowrap class="text-gray-500 dark:text-gray-400">
                                jane.smith@example.com
                            </x-table.cell>
                            <x-table.cell nowrap class="text-gray-500 dark:text-gray-400">
                                User
                            </x-table.cell>
                            <x-table.cell nowrap>
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                                    Active
                                </span>
                            </x-table.cell>
                        </x-table.row>
                        <x-table.row>
                            <x-table.cell nowrap>
                                <span class="font-medium">Bob Johnson</span>
                            </x-table.cell>
                            <x-table.cell nowrap class="text-gray-500 dark:text-gray-400">
                                bob.johnson@example.com
                            </x-table.cell>
                            <x-table.cell nowrap class="text-gray-500 dark:text-gray-400">
                                User
                            </x-table.cell>
                            <x-table.cell nowrap>
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200">
                                    Pending
                                </span>
                            </x-table.cell>
                        </x-table.row>
                        <x-table.row>
                            <x-table.cell nowrap>
                                <span class="font-medium">Alice Williams</span>
                            </x-table.cell>
                            <x-table.cell nowrap class="text-gray-500 dark:text-gray-400">
                                alice.williams@example.com
                            </x-table.cell>
                            <x-table.cell nowrap class="text-gray-500 dark:text-gray-400">
                                Moderator
                            </x-table.cell>
                            <x-table.cell nowrap>
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200">
                                    Inactive
                                </span>
                            </x-table.cell>
                        </x-table.row>
                    </x-table.body>
                </x-table>
            </x-card>

            <!-- Table with Actions -->
            <x-card.card variant="gradient">
                <x-slot name="header">
                    <h3 class="text-lg sm:text-xl font-semibold text-gray-900 dark:text-gray-100">
                        Table with Actions
                    </h3>
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                        Table with action buttons in each row
                    </p>
                </x-slot>

                <x-table.table>
                    <x-table.header>
                        <x-table.row>
                            <x-table.header-cell>Product</x-table.header-cell>
                            <x-table.header-cell>Price</x-table.header-cell>
                            <x-table.header-cell>Stock</x-table.header-cell>
                            <x-table.header-cell>Category</x-table.header-cell>
                            <x-table.header-cell align="right">Actions</x-table.header-cell>
                        </x-table.row>
                    </x-table.header>
                    <x-table.body>
                        <x-table.row>
                            <x-table.cell>
                                <div class="font-medium text-gray-900 dark:text-gray-100">Laptop Pro</div>
                                <div class="text-gray-500 dark:text-gray-400">High-performance laptop</div>
                            </x-table.cell>
                            <x-table.cell nowrap class="text-gray-900 dark:text-gray-100">
                                $1,299.99
                            </x-table.cell>
                            <x-table.cell nowrap class="text-gray-500 dark:text-gray-400">
                                45 units
                            </x-table.cell>
                            <x-table.cell nowrap class="text-gray-500 dark:text-gray-400">
                                Electronics
                            </x-table.cell>
                            <x-table.cell nowrap align="right">
                                <div class="flex justify-end">
                                    <x-dropdown.dropdown align="right" width="48">
                                        <x-slot name="trigger">
                                            <button class="inline-flex items-center p-2 text-sm font-medium text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-md hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500 dark:focus:ring-emerald-400 transition-colors">
                                                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"></path>
                                                </svg>
                                            </button>
                                        </x-slot>

                                        <x-slot name="content">
                                            <x-dropdown.link href="#" class="flex items-center">
                                                <svg class="mr-2 h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                </svg>
                                                Edit
                                            </x-dropdown.link>
                                            <x-dropdown.link href="#" class="flex items-center text-red-600 dark:text-red-400">
                                                <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                                Delete
                                            </x-dropdown.link>
                                        </x-slot>
                                    </x-dropdown>
                                </div>
                            </x-table.cell>
                        </x-table.row>
                        <x-table.row>
                            <x-table.cell>
                                <div class="font-medium text-gray-900 dark:text-gray-100">Wireless Mouse</div>
                                <div class="text-gray-500 dark:text-gray-400">Ergonomic design</div>
                            </x-table.cell>
                            <x-table.cell nowrap class="text-gray-900 dark:text-gray-100">
                                $29.99
                            </x-table.cell>
                            <x-table.cell nowrap class="text-gray-500 dark:text-gray-400">
                                120 units
                            </x-table.cell>
                            <x-table.cell nowrap class="text-gray-500 dark:text-gray-400">
                                Accessories
                            </x-table.cell>
                            <x-table.cell nowrap align="right">
                                <div class="flex justify-end">
                                    <x-dropdown.dropdown align="right" width="48">
                                        <x-slot name="trigger">
                                            <button class="inline-flex items-center p-2 text-sm font-medium text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-md hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500 dark:focus:ring-emerald-400 transition-colors">
                                                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"></path>
                                                </svg>
                                            </button>
                                        </x-slot>

                                        <x-slot name="content">
                                            <x-dropdown.link href="#" class="flex items-center">
                                                <svg class="mr-2 h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                </svg>
                                                Edit
                                            </x-dropdown.link>
                                            <x-dropdown.link href="#" class="flex items-center text-red-600 dark:text-red-400">
                                                <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                                Delete
                                            </x-dropdown.link>
                                        </x-slot>
                                    </x-dropdown>
                                </div>
                            </x-table.cell>
                        </x-table.row>
                        <x-table.row>
                            <x-table.cell>
                                <div class="font-medium text-gray-900 dark:text-gray-100">Mechanical Keyboard</div>
                                <div class="text-gray-500 dark:text-gray-400">RGB backlight</div>
                            </x-table.cell>
                            <x-table.cell nowrap class="text-gray-900 dark:text-gray-100">
                                $149.99
                            </x-table.cell>
                            <x-table.cell nowrap class="text-gray-500 dark:text-gray-400">
                                23 units
                            </x-table.cell>
                            <x-table.cell nowrap class="text-gray-500 dark:text-gray-400">
                                Accessories
                            </x-table.cell>
                            <x-table.cell nowrap align="right">
                                <div class="flex justify-end">
                                    <x-dropdown.dropdown align="right" width="48">
                                        <x-slot name="trigger">
                                            <button class="inline-flex items-center p-2 text-sm font-medium text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-md hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500 dark:focus:ring-emerald-400 transition-colors">
                                                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"></path>
                                                </svg>
                                            </button>
                                        </x-slot>

                                        <x-slot name="content">
                                            <x-dropdown.link href="#" class="flex items-center">
                                                <svg class="mr-2 h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                </svg>
                                                Edit
                                            </x-dropdown.link>
                                            <x-dropdown.link href="#" class="flex items-center text-red-600 dark:text-red-400">
                                                <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                                Delete
                                            </x-dropdown.link>
                                        </x-slot>
                                    </x-dropdown>
                                </div>
                            </x-table.cell>
                        </x-table.row>
                    </x-table.body>
                </x-table>
            </x-card>

            <!-- Striped Table -->
            <x-card.card variant="gradient">
                <x-slot name="header">
                    <h3 class="text-lg sm:text-xl font-semibold text-gray-900 dark:text-gray-100">
                        Striped Table
                    </h3>
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                        Table with alternating row colors for better readability
                    </p>
                </x-slot>

                <x-table.table striped>
                    <x-table.header>
                        <x-table.row>
                            <x-table.header-cell>ID</x-table.header-cell>
                            <x-table.header-cell>Task</x-table.header-cell>
                            <x-table.header-cell>Assignee</x-table.header-cell>
                            <x-table.header-cell>Priority</x-table.header-cell>
                            <x-table.header-cell>Due Date</x-table.header-cell>
                        </x-table.row>
                    </x-table.header>
                    <x-table.body>
                        <x-table.row striped>
                            <x-table.cell nowrap>
                                <span class="font-medium">#001</span>
                            </x-table.cell>
                            <x-table.cell>
                                Design new homepage layout
                            </x-table.cell>
                            <x-table.cell nowrap class="text-gray-500 dark:text-gray-400">
                                Sarah Chen
                            </x-table.cell>
                            <x-table.cell nowrap>
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200">
                                    High
                                </span>
                            </x-table.cell>
                            <x-table.cell nowrap class="text-gray-500 dark:text-gray-400">
                                2024-01-15
                            </x-table.cell>
                        </x-table.row>
                        <x-table.row>
                            <x-table.cell nowrap>
                                <span class="font-medium">#002</span>
                            </x-table.cell>
                            <x-table.cell>
                                Implement user authentication
                            </x-table.cell>
                            <x-table.cell nowrap class="text-gray-500 dark:text-gray-400">
                                Mike Johnson
                            </x-table.cell>
                            <x-table.cell nowrap>
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200">
                                    Medium
                                </span>
                            </x-table.cell>
                            <x-table.cell nowrap class="text-gray-500 dark:text-gray-400">
                                2024-01-20
                            </x-table.cell>
                        </x-table.row>
                        <x-table.row striped>
                            <x-table.cell nowrap>
                                <span class="font-medium">#003</span>
                            </x-table.cell>
                            <x-table.cell>
                                Write API documentation
                            </x-table.cell>
                            <x-table.cell nowrap class="text-gray-500 dark:text-gray-400">
                                Emily Davis
                            </x-table.cell>
                            <x-table.cell nowrap>
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                                    Low
                                </span>
                            </x-table.cell>
                            <x-table.cell nowrap class="text-gray-500 dark:text-gray-400">
                                2024-01-25
                            </x-table.cell>
                        </x-table.row>
                        <x-table.row>
                            <x-table.cell nowrap>
                                <span class="font-medium">#004</span>
                            </x-table.cell>
                            <x-table.cell>
                                Optimize database queries
                            </x-table.cell>
                            <x-table.cell nowrap class="text-gray-500 dark:text-gray-400">
                                David Wilson
                            </x-table.cell>
                            <x-table.cell nowrap>
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200">
                                    Medium
                                </span>
                            </x-table.cell>
                            <x-table.cell nowrap class="text-gray-500 dark:text-gray-400">
                                2024-01-18
                            </x-table.cell>
                        </x-table.row>
                    </x-table.body>
                </x-table>
            </x-card>

            <!-- Compact Table -->
            <x-card.card variant="gradient">
                <x-slot name="header">
                    <h3 class="text-lg sm:text-xl font-semibold text-gray-900 dark:text-gray-100">
                        Compact Table
                    </h3>
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                        Table with reduced padding for displaying more data
                    </p>
                </x-slot>

                <x-table.table compact>
                    <x-table.header>
                        <x-table.row>
                            <x-table.header-cell compact>Order #</x-table.header-cell>
                            <x-table.header-cell compact>Customer</x-table.header-cell>
                            <x-table.header-cell compact>Amount</x-table.header-cell>
                            <x-table.header-cell compact>Status</x-table.header-cell>
                            <x-table.header-cell compact>Date</x-table.header-cell>
                        </x-table.row>
                    </x-table.header>
                    <x-table.body>
                        <x-table.row>
                            <x-table.cell compact nowrap>
                                <span class="font-medium">#ORD-001</span>
                            </x-table.cell>
                            <x-table.cell compact nowrap class="text-gray-500 dark:text-gray-400">
                                John Doe
                            </x-table.cell>
                            <x-table.cell compact nowrap class="text-gray-900 dark:text-gray-100">
                                $299.99
                            </x-table.cell>
                            <x-table.cell compact nowrap>
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                                    Completed
                                </span>
                            </x-table.cell>
                            <x-table.cell compact nowrap class="text-gray-500 dark:text-gray-400">
                                2024-01-10
                            </x-table.cell>
                        </x-table.row>
                        <x-table.row>
                            <x-table.cell compact nowrap>
                                <span class="font-medium">#ORD-002</span>
                            </x-table.cell>
                            <x-table.cell compact nowrap class="text-gray-500 dark:text-gray-400">
                                Jane Smith
                            </x-table.cell>
                            <x-table.cell compact nowrap class="text-gray-900 dark:text-gray-100">
                                $149.50
                            </x-table.cell>
                            <x-table.cell compact nowrap>
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200">
                                    Processing
                                </span>
                            </x-table.cell>
                            <x-table.cell compact nowrap class="text-gray-500 dark:text-gray-400">
                                2024-01-11
                            </x-table.cell>
                        </x-table.row>
                        <x-table.row>
                            <x-table.cell compact nowrap>
                                <span class="font-medium">#ORD-003</span>
                            </x-table.cell>
                            <x-table.cell compact nowrap class="text-gray-500 dark:text-gray-400">
                                Bob Johnson
                            </x-table.cell>
                            <x-table.cell compact nowrap class="text-gray-900 dark:text-gray-100">
                                $89.99
                            </x-table.cell>
                            <x-table.cell compact nowrap>
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                                    Shipped
                                </span>
                            </x-table.cell>
                            <x-table.cell compact nowrap class="text-gray-500 dark:text-gray-400">
                                2024-01-12
                            </x-table.cell>
                        </x-table.row>
                        <x-table.row>
                            <x-table.cell compact nowrap>
                                <span class="font-medium">#ORD-004</span>
                            </x-table.cell>
                            <x-table.cell compact nowrap class="text-gray-500 dark:text-gray-400">
                                Alice Williams
                            </x-table.cell>
                            <x-table.cell compact nowrap class="text-gray-900 dark:text-gray-100">
                                $459.00
                            </x-table.cell>
                            <x-table.cell compact nowrap>
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                                    Completed
                                </span>
                            </x-table.cell>
                            <x-table.cell compact nowrap class="text-gray-500 dark:text-gray-400">
                                2024-01-13
                            </x-table.cell>
                        </x-table.row>
                    </x-table.body>
                </x-table>
            </x-card>

            <!-- Paginated Table -->
            <x-card.card variant="gradient">
                <x-slot name="header">
                    <h3 class="text-lg sm:text-xl font-semibold text-gray-900 dark:text-gray-100">
                        Paginated Table
                    </h3>
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                        Interactive table with working pagination controls
                    </p>
                </x-slot>

                @php
                    // Generate all mock data upfront
                    $customers = ['John Doe', 'Jane Smith', 'Bob Johnson', 'Alice Williams', 'Charlie Brown', 'Diana Prince', 'Edward Norton', 'Fiona Apple', 'George Clooney', 'Helen Mirren'];
                    $products = ['Laptop Pro', 'Wireless Mouse', 'Mechanical Keyboard', 'USB-C Hub', 'Monitor Stand', 'Webcam HD', 'Desk Mat', 'Cable Organizer', 'Laptop Stand', 'Headphones'];
                    $amounts = [1299.99, 29.99, 149.99, 79.99, 89.99, 129.99, 39.99, 19.99, 69.99, 199.99];
                    $statuses = [
                        ['label' => 'Completed', 'bg' => 'bg-green-100', 'text' => 'text-green-800', 'darkBg' => 'dark:bg-green-900', 'darkText' => 'dark:text-green-200'],
                        ['label' => 'Processing', 'bg' => 'bg-yellow-100', 'text' => 'text-yellow-800', 'darkBg' => 'dark:bg-yellow-900', 'darkText' => 'dark:text-yellow-200'],
                        ['label' => 'Shipped', 'bg' => 'bg-blue-100', 'text' => 'text-blue-800', 'darkBg' => 'dark:bg-blue-900', 'darkText' => 'dark:text-blue-200'],
                        ['label' => 'Pending', 'bg' => 'bg-yellow-100', 'text' => 'text-yellow-800', 'darkBg' => 'dark:bg-yellow-900', 'darkText' => 'dark:text-yellow-200'],
                        ['label' => 'Cancelled', 'bg' => 'bg-red-100', 'text' => 'text-red-800', 'darkBg' => 'dark:bg-red-900', 'darkText' => 'dark:text-red-200'],
                    ];
                    
                    $allOrders = [];
                    for ($i = 1; $i <= 100; $i++) {
                        $allOrders[] = [
                            'id' => $i,
                            'orderNumber' => str_pad($i, 3, '0', STR_PAD_LEFT),
                            'customer' => $customers[($i - 1) % count($customers)],
                            'product' => $products[($i - 1) % count($products)],
                            'amount' => $amounts[($i - 1) % count($amounts)],
                            'status' => $statuses[($i - 1) % count($statuses)],
                            'date' => str_pad(($i % 28) + 1, 2, '0', STR_PAD_LEFT),
                        ];
                    }
                @endphp

                <div x-data="{
                    currentPage: 3,
                    perPage: 10,
                    total: {{ count($allOrders) }},
                    orders: @js($allOrders),
                    showModal: false,
                    editingOrder: null,
                    formData: {
                        customer: '',
                        product: '',
                        amount: '',
                        status: '',
                        date: ''
                    },
                    
                    get lastPage() {
                        return Math.ceil(this.total / this.perPage);
                    },
                    
                    get paginatedOrders() {
                        const start = (this.currentPage - 1) * this.perPage;
                        const end = start + this.perPage;
                        return this.orders.slice(start, end);
                    },
                    
                    get startRecord() {
                        return (this.currentPage - 1) * this.perPage + 1;
                    },
                    
                    get endRecord() {
                        return Math.min(this.currentPage * this.perPage, this.total);
                    },
                    
                    goToPage(page) {
                        if (page >= 1 && page <= this.lastPage) {
                            this.currentPage = page;
                        }
                    },
                    
                    previousPage() {
                        if (this.currentPage > 1) {
                            this.currentPage--;
                        }
                    },
                    
                    nextPage() {
                        if (this.currentPage < this.lastPage) {
                            this.currentPage++;
                        }
                    },
                    
                    get pageElements() {
                        const elements = [];
                        const onEachSide = 3;
                        const start = Math.max(1, this.currentPage - onEachSide);
                        const end = Math.min(this.lastPage, this.currentPage + onEachSide);
                        
                        if (start > 1) {
                            elements.push({ type: 'page', page: 1 });
                            if (start > 2) {
                                elements.push({ type: 'dots' });
                            }
                        }
                        
                        for (let i = start; i <= end; i++) {
                            elements.push({ type: 'page', page: i });
                        }
                        
                        if (end < this.lastPage) {
                            if (end < this.lastPage - 1) {
                                elements.push({ type: 'dots' });
                            }
                            elements.push({ type: 'page', page: this.lastPage });
                        }
                        
                        return elements;
                    },
                    
                    openEditModal(order) {
                        console.log('Opening modal for order:', order);
                        this.editingOrder = order;
                        this.formData = {
                            customer: order.customer,
                            product: order.product,
                            amount: order.amount.toString(),
                            status: order.status.label,
                            date: '2024-01-' + order.date
                        };
                        this.showModal = true;
                        console.log('showModal set to:', this.showModal);
                        document.body.classList.add('overflow-y-hidden');
                    },
                    
                    closeModal() {
                        this.showModal = false;
                        this.editingOrder = null;
                        this.formData = {
                            customer: '',
                            product: '',
                            amount: '',
                            status: '',
                            date: ''
                        };
                        document.body.classList.remove('overflow-y-hidden');
                    },
                    
                    updateOrder() {
                        if (this.editingOrder) {
                            // Find and update the order in the orders array
                            const index = this.orders.findIndex(o => o.id === this.editingOrder.id);
                            if (index !== -1) {
                                this.orders[index].customer = this.formData.customer;
                                this.orders[index].product = this.formData.product;
                                this.orders[index].amount = parseFloat(this.formData.amount);
                                
                                // Find matching status object
                                const statuses = @js($statuses);
                                const status = statuses.find(s => s.label === this.formData.status);
                                if (status) {
                                    this.orders[index].status = status;
                                }
                                
                                // Extract date from formData.date (format: 2024-01-15)
                                const dateParts = this.formData.date.split('-');
                                if (dateParts.length === 3) {
                                    this.orders[index].date = dateParts[2];
                                }
                            }
                        }
                        this.closeModal();
                    }
                }">
                    <x-table.table>
                        <x-table.header>
                            <x-table.row>
                                <x-table.header-cell>ID</x-table.header-cell>
                                <x-table.header-cell>Customer</x-table.header-cell>
                                <x-table.header-cell>Product</x-table.header-cell>
                                <x-table.header-cell>Amount</x-table.header-cell>
                                <x-table.header-cell>Status</x-table.header-cell>
                                <x-table.header-cell>Date</x-table.header-cell>
                                <x-table.header-cell align="right">Actions</x-table.header-cell>
                            </x-table.row>
                        </x-table.header>
                        <x-table.body>
                            <template x-for="order in paginatedOrders" :key="order.id">
                                <x-table.row>
                                    <x-table.cell nowrap>
                                        <span class="font-medium" x-text="'#ORD-' + order.orderNumber"></span>
                                    </x-table.cell>
                                    <x-table.cell nowrap class="text-gray-500 dark:text-gray-400" x-text="order.customer"></x-table.cell>
                                    <x-table.cell x-text="order.product"></x-table.cell>
                                    <x-table.cell nowrap class="text-gray-900 dark:text-gray-100 font-medium" x-text="'$' + order.amount.toFixed(2)"></x-table.cell>
                                    <x-table.cell nowrap>
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full" 
                                              :class="order.status.bg + ' ' + order.status.text + ' ' + order.status.darkBg + ' ' + order.status.darkText"
                                              x-text="order.status.label"></span>
                                    </x-table.cell>
                                    <x-table.cell nowrap class="text-gray-500 dark:text-gray-400" x-text="'2024-01-' + order.date"></x-table.cell>
                                    <x-table.cell nowrap align="right">
                                        <div class="flex justify-end">
                                            <x-dropdown.dropdown align="right" width="48">
                                                <x-slot name="trigger">
                                                    <button class="inline-flex items-center p-2 text-sm font-medium text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-md hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500 dark:focus:ring-emerald-400 transition-colors">
                                                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                                            <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"></path>
                                                        </svg>
                                                    </button>
                                                </x-slot>

                                                <x-slot name="content">
                                                    <button @click.stop="openEditModal(order)" class="block w-full px-4 py-2 text-start text-sm leading-5 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-700 transition duration-150 ease-in-out flex items-center">
                                                        <svg class="mr-2 h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                        </svg>
                                                        Edit
                                                    </button>
                                                    <x-dropdown.link href="#" class="flex items-center text-red-600 dark:text-red-400">
                                                        <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                        </svg>
                                                        Delete
                                                    </x-dropdown.link>
                                                </x-slot>
                                            </x-dropdown>
                                        </div>
                                    </x-table.cell>
                                </x-table.row>
                            </template>
                        </x-table.body>
                    </x-table>

                    <!-- Pagination Controls -->
                    <nav class="flex items-center justify-between border-t border-gray-200 dark:border-gray-700 px-4 py-3 sm:px-6" aria-label="Pagination" x-show="lastPage > 1">
                        <div class="hidden sm:block">
                            <p class="text-sm text-gray-700 dark:text-gray-300">
                                Showing
                                <span class="font-medium" x-text="startRecord"></span>
                                to
                                <span class="font-medium" x-text="endRecord"></span>
                                of
                                <span class="font-medium" x-text="total"></span>
                                results
                            </p>
                        </div>
                        <div class="flex flex-1 justify-between sm:justify-end">
                            <div class="flex items-center gap-1">
                                <!-- Previous Button -->
                                <button @click="previousPage()" 
                                        :disabled="currentPage === 1"
                                        :class="currentPage === 1 ? 'cursor-not-allowed text-gray-400 dark:text-gray-600' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700'"
                                        class="relative inline-flex items-center px-3 py-2 text-sm font-medium bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500 dark:focus:ring-emerald-400 transition-colors">
                                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="ml-1 hidden sm:inline">Previous</span>
                                </button>

                                <!-- Page Numbers -->
                                <div class="flex items-center gap-1">
                                    <template x-for="element in pageElements" :key="element.type + '-' + (element.page || '')">
                                        <template x-if="element.type === 'dots'">
                                            <span class="relative inline-flex items-center px-2 sm:px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300">...</span>
                                        </template>
                                        <template x-if="element.type === 'page' && element.page === currentPage">
                                            <span class="relative inline-flex items-center px-2 sm:px-4 py-2 text-sm font-semibold text-white bg-emerald-600 dark:bg-emerald-500 border border-emerald-600 dark:border-emerald-500 rounded-lg cursor-default" x-text="element.page"></span>
                                        </template>
                                        <template x-if="element.type === 'page' && element.page !== currentPage">
                                            <button @click="goToPage(element.page)" 
                                                    class="relative inline-flex items-center px-2 sm:px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500 dark:focus:ring-emerald-400 transition-colors"
                                                    x-text="element.page"></button>
                                        </template>
                                    </template>
                                </div>

                                <!-- Next Button -->
                                <button @click="nextPage()" 
                                        :disabled="currentPage >= lastPage"
                                        :class="currentPage >= lastPage ? 'cursor-not-allowed text-gray-400 dark:text-gray-600' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700'"
                                        class="relative inline-flex items-center px-3 py-2 text-sm font-medium bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500 dark:focus:ring-emerald-400 transition-colors">
                                    <span class="mr-1 hidden sm:inline">Next</span>
                                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </nav>
                </div>
            </x-card>

            <!-- Edit Modal - Outside card but inside Alpine scope -->
            <template x-if="showModal">
                <div 
                     @keydown.escape.window="closeModal()"
                     class="fixed inset-0 z-[100] overflow-y-auto px-4 py-6 sm:px-0">
                    <!-- Backdrop -->
                    <div
                        class="fixed inset-0 bg-gray-500 dark:bg-gray-900 opacity-75 transition-opacity"
                        @click="closeModal()"
                    ></div>

                    <!-- Modal Content Container -->
                    <div class="relative min-h-full flex items-center justify-center py-6">
                        <!-- Modal Content -->
                        <div
                            class="relative bg-white dark:bg-gray-800 rounded-lg overflow-hidden shadow-xl transform transition-all w-full sm:max-w-2xl"
                            x-transition:enter="ease-out duration-300"
                            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                            x-transition:leave="ease-in duration-200"
                            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                            @click.stop
                        >
                            <!-- Modal Header -->
                            <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">
                                    Edit Order
                                </h3>
                            </div>

                            <!-- Modal Body -->
                            <div class="px-6 py-4">
                                <form @submit.prevent="updateOrder()" class="space-y-4">
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                        <div class="space-y-2">
                                            <x-form.label for="order_id" value="Order ID" />
                                            <input
                                                type="text"
                                                name="order_id"
                                                id="order_id"
                                                :value="editingOrder ? '#ORD-' + editingOrder.orderNumber : ''"
                                                readonly
                                                disabled
                                                class="w-full px-3 py-2.5 sm:px-4 sm:py-3 rounded-lg sm:rounded-xl border border-gray-300 dark:border-gray-600 bg-gray-100 dark:bg-gray-700 text-gray-500 dark:text-gray-400 text-sm sm:text-base cursor-not-allowed"
                                            />
                                        </div>

                                        <div class="space-y-2">
                                            <x-form.label for="customer" value="Customer" />
                                            <input
                                                type="text"
                                                name="customer"
                                                id="customer"
                                                x-model="formData.customer"
                                                placeholder="Enter customer name"
                                                required
                                                class="w-full px-3 py-2.5 sm:px-4 sm:py-3 rounded-lg sm:rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-0 focus:border-emerald-500 dark:focus:border-emerald-400 focus:ring-emerald-500 dark:focus:ring-emerald-400 text-sm sm:text-base transition-all duration-200"
                                            />
                                        </div>

                                        <div class="space-y-2">
                                            <x-form.label for="product" value="Product" />
                                            <input
                                                type="text"
                                                name="product"
                                                id="product"
                                                x-model="formData.product"
                                                placeholder="Enter product name"
                                                required
                                                class="w-full px-3 py-2.5 sm:px-4 sm:py-3 rounded-lg sm:rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-0 focus:border-emerald-500 dark:focus:border-emerald-400 focus:ring-emerald-500 dark:focus:ring-emerald-400 text-sm sm:text-base transition-all duration-200"
                                            />
                                        </div>

                                        <div class="space-y-2">
                                            <x-form.label for="amount" value="Amount" />
                                            <input
                                                type="number"
                                                name="amount"
                                                id="amount"
                                                step="0.01"
                                                min="0"
                                                x-model="formData.amount"
                                                placeholder="0.00"
                                                required
                                                class="w-full px-3 py-2.5 sm:px-4 sm:py-3 rounded-lg sm:rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-0 focus:border-emerald-500 dark:focus:border-emerald-400 focus:ring-emerald-500 dark:focus:ring-emerald-400 text-sm sm:text-base transition-all duration-200"
                                            />
                                        </div>

                                        <div class="space-y-2">
                                            <x-form.label for="status" value="Status" />
                                            <select
                                                name="status"
                                                id="status"
                                                x-model="formData.status"
                                                required
                                                class="w-full px-3 py-2.5 sm:px-4 sm:py-3 rounded-lg sm:rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-0 focus:border-emerald-500 dark:focus:border-emerald-400 focus:ring-emerald-500 dark:focus:ring-emerald-400 text-sm sm:text-base transition-all duration-200 appearance-none"
                                                style="background-image: url('data:image/svg+xml,%3csvg xmlns=\'http://www.w3.org/2000/svg\' fill=\'none\' viewBox=\'0 0 20 20\'%3e%3cpath stroke=\'%236b7280\' stroke-linecap=\'round\' stroke-linejoin=\'round\' stroke-width=\'1.5\' d=\'M6 8l4 4 4-4\'/%3e%3c/svg%3e'); background-position: right 0.75rem center; background-repeat: no-repeat; background-size: 1.5em 1.5em; padding-right: 2.5rem;"
                                            >
                                                <option value="">Select status</option>
                                                <option value="Completed">Completed</option>
                                                <option value="Processing">Processing</option>
                                                <option value="Shipped">Shipped</option>
                                                <option value="Pending">Pending</option>
                                                <option value="Cancelled">Cancelled</option>
                                            </select>
                                        </div>

                                        <div class="space-y-2">
                                            <x-form.label for="date" value="Date" />
                                            <input
                                                type="date"
                                                name="date"
                                                id="date"
                                                x-model="formData.date"
                                                required
                                                class="w-full px-3 py-2.5 sm:px-4 sm:py-3 rounded-lg sm:rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-0 focus:border-emerald-500 dark:focus:border-emerald-400 focus:ring-emerald-500 dark:focus:ring-emerald-400 text-sm sm:text-base transition-all duration-200"
                                            />
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <!-- Modal Footer -->
                            <div class="px-6 py-4 border-t border-gray-200 dark:border-gray-700 flex items-center justify-end gap-3">
                                <x-button.secondary @click="closeModal()" type="button">
                                    Cancel
                                </x-button.secondary>
                                <x-button.primary @click="updateOrder()" type="button" variant="gradient">
                                    Update
                                </x-button.primary>
                            </div>
                        </div>
                    </div>
                </div>
            </template>
        </div>

            <!-- Pagination Components -->
            <x-card.card variant="gradient">
                <x-slot name="header">
                    <h3 class="text-lg sm:text-xl font-semibold text-gray-900 dark:text-gray-100">
                        Pagination Components
                    </h3>
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                        Three pagination component variations with different button styles
                    </p>
                </x-slot>

                <div class="space-y-8">
                    <!-- Pagination with Text -->
                    <div x-data="{ paginationPage1: 1, lastPage: 10 }">
                        <h4 class="text-sm font-semibold text-gray-900 dark:text-gray-100 mb-4">
                            Pagination with Text
                        </h4>
                        <x-pagination.text 
                            currentPage="1" 
                            lastPage="10"
                            onPrevious="paginationPage1--"
                            onNext="paginationPage1++"
                            onPage="(page) => paginationPage1 = page"
                        />
                    </div>

                    <!-- Pagination with Text and Icon -->
                    <div x-data="{ paginationPage2: 1, lastPage: 10 }">
                        <h4 class="text-sm font-semibold text-gray-900 dark:text-gray-100 mb-4">
                            Pagination with Text and Icon
                        </h4>
                        <x-pagination.text-icon 
                            currentPage="1" 
                            lastPage="10"
                            onPrevious="paginationPage2--"
                            onNext="paginationPage2++"
                            onPage="(page) => paginationPage2 = page"
                        />
                    </div>

                    <!-- Pagination with Icon -->
                    <div x-data="{ paginationPage3: 1, lastPage: 10 }">
                        <h4 class="text-sm font-semibold text-gray-900 dark:text-gray-100 mb-4">
                            Pagination with Icon
                        </h4>
                        <x-pagination.icon 
                            currentPage="1" 
                            lastPage="10"
                            onPrevious="paginationPage3--"
                            onNext="paginationPage3++"
                            onPage="(page) => paginationPage3 = page"
                        />
                    </div>
                </div>
            </x-card>
        </div>
</x-app-layout>
