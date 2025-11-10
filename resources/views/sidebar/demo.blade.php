<x-app-layout :spinner="true" :spinnerTime="1000" spinnerVariant="gradient" spinnerSize="xl">
    <x-slot name="sidebar">
        <x-sidebar.sidebar>
            {{-- Brand/Logo Section --}}
            <x-sidebar.brand href="{{ route('dashboard') }}" name="TailAdmin">
                {{-- Optional: Custom logo slot --}}
                {{-- <x-slot:logo>
                    <img src="/logo.png" alt="Logo" class="w-8 h-8">
                </x-slot:logo> --}}
            </x-sidebar.brand>

            {{-- Search Input --}}
            <x-sidebar.search />
            <x-sidebar.section title="MENU">
                {{-- Simple Link --}}
                <x-sidebar.link 
                    href="{{ route('dashboard') }}" 
                    :active="request()->routeIs('dashboard') || request()->routeIs('sidebar.demo')"
                >
                    <x-slot:icon>
                        <x-sidebar.icon name="dashboard" />
                    </x-slot:icon>
                    Dashboard
                </x-sidebar.link>

                {{-- Link with Badge --}}
                <x-sidebar.link href="#">
                    <x-slot:icon>
                        <x-sidebar.icon name="ai" />
                    </x-slot:icon>
                    <x-slot:badge>
                        <x-sidebar.badge>NEW</x-sidebar.badge>
                    </x-slot:badge>
                    AI Assistant
                </x-sidebar.link>

                {{-- Link with Badge (Alternative) --}}
                <x-sidebar.link href="#">
                    <x-slot:icon>
                        <x-sidebar.icon name="ecommerce" />
                    </x-slot:icon>
                    <x-slot:badge>
                        <x-sidebar.badge>NEW</x-sidebar.badge>
                    </x-slot:badge>
                    E-commerce
                </x-sidebar.link>

                {{-- Simple Link --}}
                <x-sidebar.link href="#">
                    <x-slot:icon>
                        <x-sidebar.icon name="calendar" />
                    </x-slot:icon>
                    Calendar
                </x-sidebar.link>

                {{-- Simple Link --}}
                <x-sidebar.link href="#">
                    <x-slot:icon>
                        <x-sidebar.icon name="user" />
                    </x-slot:icon>
                    User Profile
                </x-sidebar.link>

                {{-- Dropdown Menu --}}
                <x-sidebar.dropdown 
                    label="Task" 
                    :active="request()->routeIs('task.*')"
                >
                    <x-slot:icon>
                        <x-sidebar.icon name="task" />
                    </x-slot:icon>
                    <x-sidebar.dropdown-item href="#" :active="request()->routeIs('task.list')">
                        Task List
                    </x-sidebar.dropdown-item>
                    <x-sidebar.dropdown-item href="#" :active="request()->routeIs('task.create')">
                        Create Task
                    </x-sidebar.dropdown-item>
                </x-sidebar.dropdown>

                {{-- Dropdown Menu --}}
                <x-sidebar.dropdown 
                    label="Forms" 
                    :active="request()->routeIs('forms.*')"
                >
                    <x-slot:icon>
                        <x-sidebar.icon name="forms" />
                    </x-slot:icon>
                    <x-sidebar.dropdown-item href="{{ route('forms.demo') }}" :active="request()->routeIs('forms.demo')">
                        Form Demo
                    </x-sidebar.dropdown-item>
                    <x-sidebar.dropdown-item href="#">
                        Form Elements
                    </x-sidebar.dropdown-item>
                </x-sidebar.dropdown>

                {{-- Dropdown Menu --}}
                <x-sidebar.dropdown 
                    label="Tables" 
                    :active="request()->routeIs('tables.*')"
                >
                    <x-slot:icon>
                        <x-sidebar.icon name="tables" />
                    </x-slot:icon>
                    <x-sidebar.dropdown-item href="{{ route('tables.demo') }}" :active="request()->routeIs('tables.demo')">
                        Table Demo
                    </x-sidebar.dropdown-item>
                </x-sidebar.dropdown>

                {{-- Dropdown Menu --}}
                <x-sidebar.dropdown label="Pages">
                    <x-slot:icon>
                        <x-sidebar.icon name="pages" />
                    </x-slot:icon>
                    <x-sidebar.dropdown-item href="#">
                        Blank Page
                    </x-sidebar.dropdown-item>
                </x-sidebar.dropdown>
            </x-sidebar.section>

            {{-- Spacer --}}
            <x-sidebar.spacer size="md" />

            {{-- Support Section --}}
            <x-sidebar.section title="SUPPORT">
                <x-sidebar.link href="#">
                    <x-slot:icon>
                        <x-sidebar.icon name="chat" />
                    </x-slot:icon>
                    Chat
                </x-sidebar.link>

                <x-sidebar.link href="#">
                    <x-slot:icon>
                        <x-sidebar.icon name="ticket" />
                    </x-slot:icon>
                    <x-slot:badge>
                        <x-sidebar.badge>NEW</x-sidebar.badge>
                    </x-slot:badge>
                    Support Ticket
                </x-sidebar.link>

                <x-sidebar.link href="#">
                    <x-slot:icon>
                        <x-sidebar.icon name="email" />
                    </x-slot:icon>
                    Email
                </x-sidebar.link>
            </x-sidebar.section>

            {{-- Spacer --}}
            <x-sidebar.spacer size="md" />

            {{-- Others Section --}}
            <x-sidebar.section title="OTHERS">
                <x-sidebar.link href="#">
                    <x-slot:icon>
                        <x-sidebar.icon name="charts" />
                    </x-slot:icon>
                    Charts
                </x-sidebar.link>

                <x-sidebar.dropdown label="UI Elements">
                    <x-slot:icon>
                        <x-sidebar.icon name="ui" />
                    </x-slot:icon>
                    <x-sidebar.dropdown-item href="#">
                        Buttons
                    </x-sidebar.dropdown-item>
                    <x-sidebar.dropdown-item href="#">
                        Cards
                    </x-sidebar.dropdown-item>
                    <x-sidebar.dropdown-item href="#">
                        Modals
                    </x-sidebar.dropdown-item>
                </x-sidebar.dropdown>

                <x-sidebar.dropdown label="Authentication">
                    <x-slot:icon>
                        <x-sidebar.icon name="auth" />
                    </x-slot:icon>
                    <x-sidebar.dropdown-item href="{{ route('login') }}">
                        Login
                    </x-sidebar.dropdown-item>
                    <x-sidebar.dropdown-item href="{{ route('register') }}">
                        Register
                    </x-sidebar.dropdown-item>
                </x-sidebar.dropdown>
            </x-sidebar.section>
            
            {{-- Sidebar Footer with Theme Switcher --}}
            <x-slot:footer>
                <x-sidebar.footer />
            </x-slot:footer>
        </x-sidebar>
    </x-slot>

    <x-slot name="header">
        <x-breadcrumb :items="[
            ['label' => 'Home', 'url' => route('dashboard')],
            ['label' => 'Sidebar', 'url' => '#']
        ]" />
    </x-slot>

    <x-slot name="pageTitle">
        Sidebar Demo
    </x-slot>

    <x-slot name="pageSubtitle">
        This page demonstrates the modular sidebar component system
    </x-slot>

    <div class="max-w-7xl mx-auto">
            <x-alert.alerts />
            
            <x-card.card variant="gradient" title="Sidebar Component System">
                <p class="mb-6 text-gray-600 dark:text-gray-400">
                    This page showcases the modular sidebar component system. The sidebar is composed of multiple reusable components:
                </p>
                <ul class="list-disc list-inside space-y-2 mb-6 text-gray-600 dark:text-gray-400">
                    <li><strong>Sidebar Brand</strong> - Logo and brand name</li>
                    <li><strong>Sidebar Section</strong> - Grouped menu items with headers</li>
                    <li><strong>Sidebar Link</strong> - Simple navigation links</li>
                    <li><strong>Sidebar Dropdown</strong> - Collapsible menu items</li>
                    <li><strong>Sidebar Badge</strong> - Badge component for "NEW" tags</li>
                    <li><strong>Sidebar Spacer</strong> - Visual spacing between sections</li>
                    <li><strong>Sidebar Icon</strong> - Predefined icon set</li>
                </ul>
                <div class="p-4 bg-blue-50 dark:bg-blue-900/20 rounded-lg">
                    <p class="text-blue-800 dark:text-blue-200">
                        <strong>Note:</strong> The sidebar is fixed on the left side. The main content area automatically adjusts to accommodate the sidebar width.
                    </p>
                </div>
            </x-card>

            <x-card.card variant="gradient" title="Spinner Component Demo" class="mt-6">
                <p class="mb-6 text-gray-600 dark:text-gray-400">
                    The spinner component provides various loading indicators for your application. It supports multiple sizes, variants, and can be used inline or as a full-page overlay.
                </p>

                <div class="space-y-8">
                    {{-- Sizes --}}
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">Sizes</h3>
                        <div class="flex items-center gap-8 flex-wrap">
                            <div class="flex flex-col items-center gap-2">
                                <x-spinner size="sm" />
                                <span class="text-xs text-gray-600 dark:text-gray-400">Small</span>
                            </div>
                            <div class="flex flex-col items-center gap-2">
                                <x-spinner size="md" />
                                <span class="text-xs text-gray-600 dark:text-gray-400">Medium</span>
                            </div>
                            <div class="flex flex-col items-center gap-2">
                                <x-spinner size="lg" />
                                <span class="text-xs text-gray-600 dark:text-gray-400">Large</span>
                            </div>
                            <div class="flex flex-col items-center gap-2">
                                <x-spinner size="xl" />
                                <span class="text-xs text-gray-600 dark:text-gray-400">Extra Large</span>
                            </div>
                        </div>
                    </div>

                    {{-- Variants --}}
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">Variants</h3>
                        <div class="flex items-center gap-8 flex-wrap">
                            <div class="flex flex-col items-center gap-2">
                                <x-spinner variant="default" size="lg" />
                                <span class="text-xs text-gray-600 dark:text-gray-400">Default</span>
                            </div>
                            <div class="flex flex-col items-center gap-2">
                                <x-spinner variant="gradient" size="lg" />
                                <span class="text-xs text-gray-600 dark:text-gray-400">Gradient</span>
                            </div>
                            <div class="flex flex-col items-center gap-2">
                                <x-spinner variant="pulse" size="lg" />
                                <span class="text-xs text-gray-600 dark:text-gray-400">Pulse</span>
                            </div>
                        </div>
                    </div>

                    {{-- With Text --}}
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">With Loading Text</h3>
                        <div class="flex items-center gap-8 flex-wrap">
                            <x-spinner size="md" text="Loading..." />
                            <x-spinner size="lg" variant="gradient" text="Please wait..." />
                            <x-spinner size="xl" variant="pulse" text="Processing..." />
                        </div>
                    </div>

                    {{-- Code Examples --}}
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">Usage Examples</h3>
                        <div class="bg-gray-50 dark:bg-gray-900/50 rounded-lg p-4 overflow-x-auto">
                            <pre class="text-sm text-gray-800 dark:text-gray-200"><code>&lt;!-- Basic inline spinner --&gt;
&lt;x-spinner /&gt;

&lt;!-- Full-page loader with text --&gt;
&lt;x-spinner fullPage text="Loading..." /&gt;

&lt;!-- Large gradient spinner --&gt;
&lt;x-spinner size="lg" variant="gradient" text="Please wait..." /&gt;

&lt;!-- Small spinner without overlay --&gt;
&lt;x-spinner size="sm" fullPage :overlay="false" /&gt;

&lt;!-- Pulse variant --&gt;
&lt;x-spinner variant="pulse" size="xl" text="Processing..." /&gt;</code></pre>
                        </div>
                    </div>
                </div>
            </x-card>
    </div>
</x-app-layout>

