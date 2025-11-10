<x-app-layout>
    <x-slot name="header">
        <x-breadcrumb :items="[
            ['label' => 'Home', 'url' => route('dashboard')],
            ['label' => 'Usage Component Demo', 'url' => '#'],
        ]" />
    </x-slot>

    <x-slot name="pageTitle">
        Usage Component Demo
    </x-slot>

    <x-slot name="pageSubtitle">
        Showcase of the usage component with various examples and configurations
    </x-slot>

    <x-alert.alerts />
    
    <x-card.card variant="gradient" title="Usage Component Examples" class="mb-6">
                <div class="space-y-6">
                    <!-- Basic Usage -->
                    <div>
                        <h3 class="text-sm font-semibold text-gray-900 dark:text-gray-100 mb-3">Basic Usage</h3>
                        <x-usage :current="2" :total="4" />
                    </div>
                    
                    <!-- With Label -->
                    <div>
                        <h3 class="text-sm font-semibold text-gray-900 dark:text-gray-100 mb-3">With Label</h3>
                        <x-usage :current="5" :total="10" label="Projects" />
                    </div>
                    
                    <!-- With Progress Bar -->
                    <div>
                        <h3 class="text-sm font-semibold text-gray-900 dark:text-gray-100 mb-3">With Progress Bar (Default)</h3>
                        <x-usage :current="7" :total="10" label="Storage" :showProgress="true" />
                    </div>
                    
                    <!-- Without Progress Bar -->
                    <div>
                        <h3 class="text-sm font-semibold text-gray-900 dark:text-gray-100 mb-3">Without Progress Bar</h3>
                        <x-usage :current="3" :total="5" label="Team Members" :showProgress="false" />
                    </div>
                    
                    <!-- Success Variant -->
                    <div>
                        <h3 class="text-sm font-semibold text-gray-900 dark:text-gray-100 mb-3">Success Variant</h3>
                        <x-usage :current="8" :total="10" label="API Calls" variant="success" />
                    </div>
                    
                    <!-- Warning Variant -->
                    <div>
                        <h3 class="text-sm font-semibold text-gray-900 dark:text-gray-100 mb-3">Warning Variant</h3>
                        <x-usage :current="8" :total="10" label="Storage" variant="warning" />
                    </div>
                    
                    <!-- Danger Variant -->
                    <div>
                        <h3 class="text-sm font-semibold text-gray-900 dark:text-gray-100 mb-3">Danger Variant</h3>
                        <x-usage :current="9" :total="10" label="Monthly Requests" variant="danger" />
                    </div>
                    
                    <!-- Over Limit -->
                    <div>
                        <h3 class="text-sm font-semibold text-gray-900 dark:text-gray-100 mb-3">Over Limit Example</h3>
                        <x-usage :current="12" :total="10" label="Projects" variant="danger" />
                    </div>
                    
                    <!-- Large Numbers -->
                    <div>
                        <h3 class="text-sm font-semibold text-gray-900 dark:text-gray-100 mb-3">Large Numbers</h3>
                        <x-usage :current="1250" :total="5000" label="API Requests" />
                    </div>
                </div>
            </x-card>
            
            <x-card.card variant="gradient" title="Usage in Context" class="mb-6">
                <div class="space-y-4">
                    <div class="flex items-center justify-between p-4 bg-gray-50 dark:bg-gray-900/50 rounded-lg">
                        <div>
                            <h4 class="font-semibold text-gray-900 dark:text-gray-100">Free Plan</h4>
                            <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Basic features included</p>
                        </div>
                        <x-usage :current="2" :total="5" label="Projects" />
                    </div>
                    
                    <div class="flex items-center justify-between p-4 bg-gray-50 dark:bg-gray-900/50 rounded-lg">
                        <div>
                            <h4 class="font-semibold text-gray-900 dark:text-gray-100">Storage Usage</h4>
                            <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">2.5 GB of 10 GB used</p>
                        </div>
                        <x-usage :current="2.5" :total="10" label="GB" variant="warning" />
                    </div>
                    
                    <div class="flex items-center justify-between p-4 bg-gray-50 dark:bg-gray-900/50 rounded-lg">
                        <div>
                            <h4 class="font-semibold text-gray-900 dark:text-gray-100">API Usage</h4>
                            <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Monthly API request limit</p>
                        </div>
                        <x-usage :current="450" :total="500" label="Requests" variant="success" />
                    </div>
                    
                    <div class="flex items-center justify-between p-4 bg-gray-50 dark:bg-gray-900/50 rounded-lg">
                        <div>
                            <h4 class="font-semibold text-gray-900 dark:text-gray-100">Team Members</h4>
                            <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Active team members</p>
                        </div>
                        <x-usage :current="8" :total="10" label="Members" :showProgress="false" />
                    </div>
                </div>
            </x-card>

            <x-card.card variant="gradient" title="Component Usage">
                <div class="bg-gray-50 dark:bg-gray-900/50 rounded-lg p-4 overflow-x-auto">
                    <pre class="text-sm text-gray-800 dark:text-gray-200"><code>&lt;!-- Basic Usage --&gt;
&lt;x-usage :current="2" :total="4" /&gt;

&lt;!-- With Label --&gt;
&lt;x-usage :current="5" :total="10" label="Projects" /&gt;

&lt;!-- With Progress Bar --&gt;
&lt;x-usage :current="7" :total="10" label="Storage" :showProgress="true" /&gt;

&lt;!-- Without Progress Bar --&gt;
&lt;x-usage :current="3" :total="5" label="Team Members" :showProgress="false" /&gt;

&lt;!-- Color Variants --&gt;
&lt;x-usage :current="8" :total="10" label="API Calls" variant="success" /&gt;
&lt;x-usage :current="8" :total="10" label="Storage" variant="warning" /&gt;
&lt;x-usage :current="9" :total="10" label="Requests" variant="danger" /&gt;

&lt;!-- Over Limit --&gt;
&lt;x-usage :current="12" :total="10" label="Projects" variant="danger" /&gt;</code></pre>
                </div>
            </x-card>
</x-app-layout>

