<x-app-layout>
    <x-slot name="title">Accordion Demo</x-slot>
    <x-slot name="metaDescription">A comprehensive demo of accordion components with expandable/collapsible sections.</x-slot>
    <x-slot name="metaKeywords">accordion, collapse, expandable, components, demo</x-slot>

    <x-slot name="header">
        <x-breadcrumb :items="[
            ['label' => 'Home', 'url' => route('dashboard')],
            ['label' => 'Accordion Demo', 'url' => '#'],
        ]" />
    </x-slot>

    <x-slot name="pageTitle">
        Accordion Demo
    </x-slot>

    <x-slot name="pageSubtitle">
        Expandable and collapsible content sections
    </x-slot>

    <x-alert.alerts />

    <div class="space-y-8">
        <!-- Single Open Accordion -->
        <section>
            <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-4">Single Open (Default)</h2>
            <x-card.card variant="gradient">
                <x-accordion.accordion>
                    <x-accordion.accordion-item 
                        id="accordion-1"
                        title="What is Laravel?"
                        default-open="true"
                    >
                        <p class="text-sm text-gray-600 dark:text-gray-400">
                            Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling.
                        </p>
                    </x-accordion.accordion-item>

                    <x-accordion.accordion-item 
                        id="accordion-2"
                        title="How do I install Laravel?"
                    >
                        <p class="text-sm text-gray-600 dark:text-gray-400">
                            You can install Laravel using Composer. Run the command: <code class="px-2 py-1 bg-gray-100 dark:bg-gray-800 rounded">composer create-project laravel/laravel project-name</code>
                        </p>
                    </x-accordion.accordion-item>

                    <x-accordion.accordion-item 
                        id="accordion-3"
                        title="What are Blade components?"
                    >
                        <p class="text-sm text-gray-600 dark:text-gray-400">
                            Blade components are reusable UI elements that can be used throughout your application. They help maintain consistency and reduce code duplication.
                        </p>
                    </x-accordion.accordion-item>
                </x-accordion.accordion>
            </x-card.card>
        </section>

        <!-- Multiple Open Accordion -->
        <section>
            <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-4">Multiple Open</h2>
            <x-card.card variant="gradient">
                <x-accordion.accordion :allow-multiple="true">
                    <x-accordion.accordion-item 
                        id="multi-1"
                        title="Getting Started"
                        icon='<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" /></svg>'
                    >
                        <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">
                            Learn the basics of getting started with our framework.
                        </p>
                        <ul class="list-disc list-inside text-sm text-gray-600 dark:text-gray-400 space-y-1">
                            <li>Installation guide</li>
                            <li>Configuration</li>
                            <li>First steps</li>
                        </ul>
                    </x-accordion.accordion-item>

                    <x-accordion.accordion-item 
                        id="multi-2"
                        title="Components"
                        badge="New"
                        icon='<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" /></svg>'
                    >
                        <p class="text-sm text-gray-600 dark:text-gray-400">
                            Explore our comprehensive component library with over 100 reusable components.
                        </p>
                    </x-accordion.accordion-item>

                    <x-accordion.accordion-item 
                        id="multi-3"
                        title="Documentation"
                        icon='<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" /></svg>'
                    >
                        <p class="text-sm text-gray-600 dark:text-gray-400">
                            Comprehensive documentation covering all features and use cases.
                        </p>
                    </x-accordion.accordion-item>
                </x-accordion.accordion>
            </x-card.card>
        </section>

        <!-- With Rich Content -->
        <section>
            <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-4">With Rich Content</h2>
            <x-card.card variant="gradient">
                <x-accordion.accordion>
                    <x-accordion.accordion-item 
                        id="rich-1"
                        title="User Profile Settings"
                    >
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                    Display Name
                                </label>
                                <input type="text" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100" placeholder="Enter your name">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                    Email Address
                                </label>
                                <input type="email" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100" placeholder="Enter your email">
                            </div>
                            <button class="px-4 py-2 bg-dodger-blue-600 text-white rounded-lg hover:bg-dodger-blue-700 transition-colors">
                                Save Changes
                            </button>
                        </div>
                    </x-accordion.accordion-item>

                    <x-accordion.accordion-item 
                        id="rich-2"
                        title="Security Settings"
                    >
                        <div class="space-y-4">
                            <div class="flex items-center justify-between p-3 bg-gray-50 dark:bg-gray-900/50 rounded-lg">
                                <div>
                                    <h4 class="font-medium text-gray-900 dark:text-gray-100">Two-Factor Authentication</h4>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">Add an extra layer of security</p>
                                </div>
                                <button class="px-4 py-2 bg-dodger-blue-600 text-white rounded-lg hover:bg-dodger-blue-700 transition-colors text-sm">
                                    Enable
                                </button>
                            </div>
                            <div class="flex items-center justify-between p-3 bg-gray-50 dark:bg-gray-900/50 rounded-lg">
                                <div>
                                    <h4 class="font-medium text-gray-900 dark:text-gray-100">Password</h4>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">Last changed 30 days ago</p>
                                </div>
                                <button class="px-4 py-2 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors text-sm">
                                    Change
                                </button>
                            </div>
                        </div>
                    </x-accordion.accordion-item>
                </x-accordion.accordion>
            </x-card.card>
        </section>
    </div>
</x-app-layout>

