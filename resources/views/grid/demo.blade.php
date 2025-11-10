<x-app-layout>
    <x-slot name="header">
        <x-breadcrumb :items="[
            ['label' => 'Home', 'url' => route('dashboard')],
            ['label' => 'Pages', 'url' => '#'],
            ['label' => 'Grid Demo'],
        ]" />
    </x-slot>

    <x-slot name="pageTitle">
        Grid Layout Demo
    </x-slot>

    <x-slot name="pageSubtitle">
        A comprehensive demo of various grid layouts using Tailwind CSS grid system
    </x-slot>

    <div class="space-y-6 sm:space-y-8">
        <x-alert.alerts />

        <!-- Basic Grid -->
        <x-card.card variant="gradient">
            <x-slot name="header">
                <h3 class="text-lg sm:text-xl font-semibold text-gray-900 dark:text-gray-100">
                    Basic Grid (3 Columns)
                </h3>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    A simple 3-column grid layout that adapts to different screen sizes
                </p>
            </x-slot>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                @for($i = 1; $i <= 6; $i++)
                    <div class="p-4 rounded-lg bg-gray-100 dark:bg-gray-800 border border-gray-200 dark:border-gray-700">
                        <div class="text-sm font-medium text-gray-900 dark:text-gray-100">Item {{ $i }}</div>
                        <div class="text-xs text-gray-500 dark:text-gray-400 mt-1">Grid item content</div>
                    </div>
                @endfor
            </div>
        </x-card.card>

        <!-- Responsive Grid -->
        <x-card.card variant="gradient">
            <x-slot name="header">
                <h3 class="text-lg sm:text-xl font-semibold text-gray-900 dark:text-gray-100">
                    Responsive Grid
                </h3>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    Grid that changes columns based on screen size: 1 column (mobile), 2 columns (tablet), 4 columns (desktop)
                </p>
            </x-slot>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                @for($i = 1; $i <= 8; $i++)
                    <div class="p-4 rounded-lg bg-emerald-50 dark:bg-emerald-900/20 border border-emerald-200 dark:border-emerald-800">
                        <div class="text-sm font-medium text-emerald-900 dark:text-emerald-100">Card {{ $i }}</div>
                        <div class="text-xs text-emerald-600 dark:text-emerald-400 mt-1">Responsive item</div>
                    </div>
                @endfor
            </div>
        </x-card.card>

        <!-- Grid with Gaps -->
        <x-card.card variant="gradient">
            <x-slot name="header">
                <h3 class="text-lg sm:text-xl font-semibold text-gray-900 dark:text-gray-100">
                    Grid with Different Gaps
                </h3>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    Demonstrating different gap sizes between grid items
                </p>
            </x-slot>

            <div class="space-y-6">
                <div>
                    <h4 class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-3">Small Gap (gap-2)</h4>
                    <div class="grid grid-cols-3 gap-2">
                        @for($i = 1; $i <= 6; $i++)
                            <div class="p-3 rounded bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 text-sm text-blue-900 dark:text-blue-100">Item {{ $i }}</div>
                        @endfor
                    </div>
                </div>

                <div>
                    <h4 class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-3">Medium Gap (gap-4)</h4>
                    <div class="grid grid-cols-3 gap-4">
                        @for($i = 1; $i <= 6; $i++)
                            <div class="p-3 rounded bg-purple-50 dark:bg-purple-900/20 border border-purple-200 dark:border-purple-800 text-sm text-purple-900 dark:text-purple-100">Item {{ $i }}</div>
                        @endfor
                    </div>
                </div>

                <div>
                    <h4 class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-3">Large Gap (gap-8)</h4>
                    <div class="grid grid-cols-3 gap-8">
                        @for($i = 1; $i <= 6; $i++)
                            <div class="p-3 rounded bg-pink-50 dark:bg-pink-900/20 border border-pink-200 dark:border-pink-800 text-sm text-pink-900 dark:text-pink-100">Item {{ $i }}</div>
                        @endfor
                    </div>
                </div>
            </div>
        </x-card.card>

        <!-- Grid with Spanning -->
        <x-card.card variant="gradient">
            <x-slot name="header">
                <h3 class="text-lg sm:text-xl font-semibold text-gray-900 dark:text-gray-100">
                    Grid with Column Spanning
                </h3>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    Items that span multiple columns using col-span utilities
                </p>
            </x-slot>

            <div class="grid grid-cols-4 gap-4">
                <div class="col-span-4 p-4 rounded-lg bg-gradient-to-r from-emerald-500 to-teal-500 text-white">
                    <div class="font-semibold">Full Width (col-span-4)</div>
                    <div class="text-sm opacity-90 mt-1">This item spans all 4 columns</div>
                </div>
                <div class="col-span-2 p-4 rounded-lg bg-indigo-50 dark:bg-indigo-900/20 border border-indigo-200 dark:border-indigo-800">
                    <div class="text-sm font-medium text-indigo-900 dark:text-indigo-100">Half Width (col-span-2)</div>
                </div>
                <div class="col-span-2 p-4 rounded-lg bg-indigo-50 dark:bg-indigo-900/20 border border-indigo-200 dark:border-indigo-800">
                    <div class="text-sm font-medium text-indigo-900 dark:text-indigo-100">Half Width (col-span-2)</div>
                </div>
                <div class="col-span-1 p-4 rounded-lg bg-amber-50 dark:bg-amber-900/20 border border-amber-200 dark:border-amber-800">
                    <div class="text-xs font-medium text-amber-900 dark:text-amber-100">1/4</div>
                </div>
                <div class="col-span-3 p-4 rounded-lg bg-amber-50 dark:bg-amber-900/20 border border-amber-200 dark:border-amber-800">
                    <div class="text-sm font-medium text-amber-900 dark:text-amber-100">3/4 Width (col-span-3)</div>
                </div>
            </div>
        </x-card.card>

        <!-- Grid with Auto-fit -->
        <x-card.card variant="gradient">
            <x-slot name="header">
                <h3 class="text-lg sm:text-xl font-semibold text-gray-900 dark:text-gray-100">
                    Auto-fit Grid
                </h3>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    Grid that automatically fits items with a minimum width
                </p>
            </x-slot>

            <div class="grid grid-cols-[repeat(auto-fit,minmax(200px,1fr))] gap-4">
                @for($i = 1; $i <= 8; $i++)
                    <div class="p-4 rounded-lg bg-cyan-50 dark:bg-cyan-900/20 border border-cyan-200 dark:border-cyan-800">
                        <div class="text-sm font-medium text-cyan-900 dark:text-cyan-100">Auto Item {{ $i }}</div>
                        <div class="text-xs text-cyan-600 dark:text-cyan-400 mt-1">Min 200px width</div>
                    </div>
                @endfor
            </div>
        </x-card.card>

        <!-- Nested Grid -->
        <x-card.card variant="gradient">
            <x-slot name="header">
                <h3 class="text-lg sm:text-xl font-semibold text-gray-900 dark:text-gray-100">
                    Nested Grid
                </h3>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    Grid items containing their own grid layouts
                </p>
            </x-slot>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="p-4 rounded-lg bg-gray-100 dark:bg-gray-800 border border-gray-200 dark:border-gray-700">
                    <div class="text-sm font-medium text-gray-900 dark:text-gray-100 mb-3">Parent Grid Item 1</div>
                    <div class="grid grid-cols-2 gap-2">
                        <div class="p-2 rounded bg-blue-50 dark:bg-blue-900/20 text-xs text-blue-900 dark:text-blue-100">Nested 1</div>
                        <div class="p-2 rounded bg-blue-50 dark:bg-blue-900/20 text-xs text-blue-900 dark:text-blue-100">Nested 2</div>
                        <div class="p-2 rounded bg-blue-50 dark:bg-blue-900/20 text-xs text-blue-900 dark:text-blue-100">Nested 3</div>
                        <div class="p-2 rounded bg-blue-50 dark:bg-blue-900/20 text-xs text-blue-900 dark:text-blue-100">Nested 4</div>
                    </div>
                </div>
                <div class="p-4 rounded-lg bg-gray-100 dark:bg-gray-800 border border-gray-200 dark:border-gray-700">
                    <div class="text-sm font-medium text-gray-900 dark:text-gray-100 mb-3">Parent Grid Item 2</div>
                    <div class="grid grid-cols-3 gap-2">
                        <div class="p-2 rounded bg-green-50 dark:bg-green-900/20 text-xs text-green-900 dark:text-green-100">A</div>
                        <div class="p-2 rounded bg-green-50 dark:bg-green-900/20 text-xs text-green-900 dark:text-green-100">B</div>
                        <div class="p-2 rounded bg-green-50 dark:bg-green-900/20 text-xs text-green-900 dark:text-green-100">C</div>
                    </div>
                </div>
            </div>
        </x-card.card>

        <!-- Grid with Different Heights -->
        <x-card.card variant="gradient">
            <x-slot name="header">
                <h3 class="text-lg sm:text-xl font-semibold text-gray-900 dark:text-gray-100">
                    Grid with Variable Heights
                </h3>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    Grid items with different content heights
                </p>
            </x-slot>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                <div class="p-4 rounded-lg bg-rose-50 dark:bg-rose-900/20 border border-rose-200 dark:border-rose-800">
                    <div class="text-sm font-medium text-rose-900 dark:text-rose-100">Short Content</div>
                </div>
                <div class="p-4 rounded-lg bg-rose-50 dark:bg-rose-900/20 border border-rose-200 dark:border-rose-800">
                    <div class="text-sm font-medium text-rose-900 dark:text-rose-100">Medium Content</div>
                    <div class="text-xs text-rose-600 dark:text-rose-400 mt-2">This item has more content to demonstrate variable heights in the grid layout.</div>
                </div>
                <div class="p-4 rounded-lg bg-rose-50 dark:bg-rose-900/20 border border-rose-200 dark:border-rose-800">
                    <div class="text-sm font-medium text-rose-900 dark:text-rose-100">Long Content</div>
                    <div class="text-xs text-rose-600 dark:text-rose-400 mt-2">
                        This grid item contains significantly more content than the others. It demonstrates how grid items can have different heights while maintaining proper alignment and spacing.
                    </div>
                </div>
                <div class="p-4 rounded-lg bg-rose-50 dark:bg-rose-900/20 border border-rose-200 dark:border-rose-800">
                    <div class="text-sm font-medium text-rose-900 dark:text-rose-100">Another Item</div>
                    <div class="text-xs text-rose-600 dark:text-rose-400 mt-2">Standard content here.</div>
                </div>
            </div>
        </x-card.card>

        <!-- Grid Alignment -->
        <x-card.card variant="gradient">
            <x-slot name="header">
                <h3 class="text-lg sm:text-xl font-semibold text-gray-900 dark:text-gray-100">
                    Grid Alignment
                </h3>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    Demonstrating different alignment options for grid items
                </p>
            </x-slot>

            <div class="space-y-6">
                <div>
                    <h4 class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-3">Items Start (items-start)</h4>
                    <div class="grid grid-cols-3 gap-4 items-start">
                        <div class="p-4 rounded-lg bg-violet-50 dark:bg-violet-900/20 border border-violet-200 dark:border-violet-800 h-20">
                            <div class="text-sm text-violet-900 dark:text-violet-100">Item 1</div>
                        </div>
                        <div class="p-4 rounded-lg bg-violet-50 dark:bg-violet-900/20 border border-violet-200 dark:border-violet-800 h-32">
                            <div class="text-sm text-violet-900 dark:text-violet-100">Item 2 (taller)</div>
                        </div>
                        <div class="p-4 rounded-lg bg-violet-50 dark:bg-violet-900/20 border border-violet-200 dark:border-violet-800 h-16">
                            <div class="text-sm text-violet-900 dark:text-violet-100">Item 3</div>
                        </div>
                    </div>
                </div>

                <div>
                    <h4 class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-3">Items Center (items-center)</h4>
                    <div class="grid grid-cols-3 gap-4 items-center">
                        <div class="p-4 rounded-lg bg-orange-50 dark:bg-orange-900/20 border border-orange-200 dark:border-orange-800 h-20">
                            <div class="text-sm text-orange-900 dark:text-orange-100">Item 1</div>
                        </div>
                        <div class="p-4 rounded-lg bg-orange-50 dark:bg-orange-900/20 border border-orange-200 dark:border-orange-800 h-32">
                            <div class="text-sm text-orange-900 dark:text-orange-100">Item 2 (taller)</div>
                        </div>
                        <div class="p-4 rounded-lg bg-orange-50 dark:bg-orange-900/20 border border-orange-200 dark:border-orange-800 h-16">
                            <div class="text-sm text-orange-900 dark:text-orange-100">Item 3</div>
                        </div>
                    </div>
                </div>

                <div>
                    <h4 class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-3">Items End (items-end)</h4>
                    <div class="grid grid-cols-3 gap-4 items-end">
                        <div class="p-4 rounded-lg bg-teal-50 dark:bg-teal-900/20 border border-teal-200 dark:border-teal-800 h-20">
                            <div class="text-sm text-teal-900 dark:text-teal-100">Item 1</div>
                        </div>
                        <div class="p-4 rounded-lg bg-teal-50 dark:bg-teal-900/20 border border-teal-200 dark:border-teal-800 h-32">
                            <div class="text-sm text-teal-900 dark:text-teal-100">Item 2 (taller)</div>
                        </div>
                        <div class="p-4 rounded-lg bg-teal-50 dark:bg-teal-900/20 border border-teal-200 dark:border-teal-800 h-16">
                            <div class="text-sm text-teal-900 dark:text-teal-100">Item 3</div>
                        </div>
                    </div>
                </div>
            </div>
        </x-card.card>

        <!-- Form/Inputs Grid -->
        <x-card.card variant="gradient">
            <x-slot name="header">
                <h3 class="text-lg sm:text-xl font-semibold text-gray-900 dark:text-gray-100">
                    Form/Inputs Grid Layout
                </h3>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    Demonstrating how to arrange form inputs in various grid layouts
                </p>
            </x-slot>

            <div class="space-y-8">
                <!-- Two Column Form Grid -->
                <div>
                    <h4 class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-4">Two Column Form Layout</h4>
                    <form class="space-y-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <x-form.input 
                                name="first_name" 
                                label="First Name" 
                                placeholder="Enter first name"
                            />
                            <x-form.input 
                                name="last_name" 
                                label="Last Name" 
                                placeholder="Enter last name"
                            />
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <x-form.input 
                                name="email" 
                                label="Email Address" 
                                type="email"
                                placeholder="you@example.com"
                            />
                            <x-form.input 
                                name="phone" 
                                label="Phone Number" 
                                type="tel"
                                placeholder="+1 (555) 123-4567"
                            />
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <x-form.select 
                                name="country" 
                                label="Country"
                                :options="[
                                    'us' => 'United States',
                                    'ca' => 'Canada',
                                    'uk' => 'United Kingdom',
                                    'au' => 'Australia',
                                ]"
                                placeholder="Select country"
                            />
                            <x-form.select 
                                name="state" 
                                label="State/Province"
                                :options="[
                                    'ny' => 'New York',
                                    'ca' => 'California',
                                    'tx' => 'Texas',
                                    'fl' => 'Florida',
                                ]"
                                placeholder="Select state"
                            />
                        </div>
                        <x-form.textarea 
                            name="address" 
                            label="Street Address" 
                            rows="3"
                            placeholder="Enter your street address"
                        />
                    </form>
                </div>

                <!-- Three Column Form Grid -->
                <div class="pt-6 border-t border-gray-200 dark:border-gray-700">
                    <h4 class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-4">Three Column Form Layout</h4>
                    <form class="space-y-4">
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                            <x-form.input 
                                name="city" 
                                label="City" 
                                placeholder="Enter city"
                            />
                            <x-form.input 
                                name="zip" 
                                label="ZIP Code" 
                                placeholder="12345"
                            />
                            <x-form.input 
                                name="country_code" 
                                label="Country Code" 
                                placeholder="US"
                            />
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                            <x-form.number 
                                name="age" 
                                label="Age" 
                                min="18"
                                max="100"
                                placeholder="Enter age"
                            />
                            <x-form.select 
                                name="gender" 
                                label="Gender"
                                :options="[
                                    'male' => 'Male',
                                    'female' => 'Female',
                                    'other' => 'Other',
                                ]"
                                placeholder="Select gender"
                            />
                            <x-form.date 
                                name="birthday" 
                                label="Date of Birth"
                            />
                        </div>
                    </form>
                </div>

                <!-- Mixed Column Spans -->
                <div class="pt-6 border-t border-gray-200 dark:border-gray-700">
                    <h4 class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-4">Mixed Column Spans</h4>
                    <form class="space-y-4">
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                            <div class="md:col-span-2">
                                <x-form.input 
                                    name="company" 
                                    label="Company Name" 
                                    placeholder="Enter company name"
                                />
                            </div>
                            <div class="md:col-span-1">
                                <x-form.input 
                                    name="tax_id" 
                                    label="Tax ID" 
                                    placeholder="TAX-123"
                                />
                            </div>
                            <div class="md:col-span-1">
                                <x-form.select 
                                    name="industry" 
                                    label="Industry"
                                    :options="[
                                        'tech' => 'Technology',
                                        'finance' => 'Finance',
                                        'healthcare' => 'Healthcare',
                                        'retail' => 'Retail',
                                    ]"
                                    placeholder="Select"
                                />
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                            <div class="md:col-span-1">
                                <x-form.input 
                                    name="prefix" 
                                    label="Prefix" 
                                    placeholder="Mr."
                                />
                            </div>
                            <div class="md:col-span-2">
                                <x-form.input 
                                    name="full_name" 
                                    label="Full Name" 
                                    placeholder="Enter full name"
                                />
                            </div>
                            <div class="md:col-span-1">
                                <x-form.input 
                                    name="suffix" 
                                    label="Suffix" 
                                    placeholder="Jr."
                                />
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                            <div class="md:col-span-3">
                                <x-form.input 
                                    name="website" 
                                    label="Website URL" 
                                    type="url"
                                    placeholder="https://example.com"
                                />
                            </div>
                            <div class="md:col-span-1">
                                <x-form.select 
                                    name="status" 
                                    label="Status"
                                    :options="[
                                        'active' => 'Active',
                                        'inactive' => 'Inactive',
                                        'pending' => 'Pending',
                                    ]"
                                    placeholder="Select"
                                />
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Responsive Form Grid -->
                <div class="pt-6 border-t border-gray-200 dark:border-gray-700">
                    <h4 class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-4">Responsive Form Grid</h4>
                    <form class="space-y-4">
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                            <x-form.input 
                                name="field1" 
                                label="Field 1" 
                                placeholder="Responsive field"
                            />
                            <x-form.input 
                                name="field2" 
                                label="Field 2" 
                                placeholder="Responsive field"
                            />
                            <x-form.input 
                                name="field3" 
                                label="Field 3" 
                                placeholder="Responsive field"
                            />
                            <x-form.input 
                                name="field4" 
                                label="Field 4" 
                                placeholder="Responsive field"
                            />
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                            <x-form.number 
                                name="number1" 
                                label="Number 1" 
                                placeholder="0"
                            />
                            <x-form.number 
                                name="number2" 
                                label="Number 2" 
                                placeholder="0"
                            />
                            <x-form.number 
                                name="number3" 
                                label="Number 3" 
                                placeholder="0"
                            />
                            <x-form.number 
                                name="number4" 
                                label="Number 4" 
                                placeholder="0"
                            />
                        </div>
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                            <x-form.textarea 
                                name="notes1" 
                                label="Notes (Left)" 
                                rows="4"
                                placeholder="Enter notes here..."
                            />
                            <x-form.textarea 
                                name="notes2" 
                                label="Notes (Right)" 
                                rows="4"
                                placeholder="Enter notes here..."
                            />
                        </div>
                    </form>
                </div>

                <!-- Form with Prefix/Suffix in Grid -->
                <div class="pt-6 border-t border-gray-200 dark:border-gray-700">
                    <h4 class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-4">Form with Prefix/Suffix in Grid</h4>
                    <form class="space-y-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <x-form.input-prefix 
                                name="website_url" 
                                label="Website URL" 
                                prefix="https://"
                                placeholder="example.com"
                            />
                            <x-form.number-prefix 
                                name="price" 
                                label="Price" 
                                prefix="$"
                                placeholder="0.00"
                                step="0.01"
                            />
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <x-form.tel 
                                name="phone_number" 
                                label="Phone Number" 
                                placeholder="+1 (555) 123-4567"
                            />
                            <x-form.url 
                                name="website" 
                                label="Website" 
                                placeholder="https://example.com"
                            />
                        </div>
                    </form>
                </div>
            </div>
        </x-card.card>

        <!-- Grid with Cards -->
        <x-card.card variant="gradient">
            <x-slot name="header">
                <h3 class="text-lg sm:text-xl font-semibold text-gray-900 dark:text-gray-100">
                    Grid with Card Components
                </h3>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    Using grid layout with card components for a modern dashboard look
                </p>
            </x-slot>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                <x-card.card>
                    <div class="text-2xl font-bold text-emerald-600 dark:text-emerald-400">1,234</div>
                    <div class="text-sm text-gray-600 dark:text-gray-400 mt-1">Total Users</div>
                </x-card.card>
                <x-card.card>
                    <div class="text-2xl font-bold text-blue-600 dark:text-blue-400">567</div>
                    <div class="text-sm text-gray-600 dark:text-gray-400 mt-1">Active Sessions</div>
                </x-card.card>
                <x-card.card>
                    <div class="text-2xl font-bold text-purple-600 dark:text-purple-400">89</div>
                    <div class="text-sm text-gray-600 dark:text-gray-400 mt-1">Pending Orders</div>
                </x-card.card>
                <x-card.card>
                    <div class="text-2xl font-bold text-orange-600 dark:text-orange-400">$12.5K</div>
                    <div class="text-sm text-gray-600 dark:text-gray-400 mt-1">Revenue</div>
                </x-card.card>
            </div>
        </x-card.card>
    </div>
</x-app-layout>

