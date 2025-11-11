<x-app-layout>
    <x-slot name="header">
        <x-breadcrumb :items="[
            ['label' => 'Home', 'url' => route('dashboard')],
            ['label' => 'Billing', 'url' => '#'],
            ['label' => 'Demo'],
        ]" />
    </x-slot>

    <x-slot name="pageTitle">
        Billing Demo
    </x-slot>

    <x-slot name="pageSubtitle">
        A comprehensive billing demo with invoices, payment methods, usage meters, and billing history
    </x-slot>

    <x-alert.alerts />
    
    <div class="space-y-6 sm:space-y-8">
        <!-- Billing Summary -->
        <x-card.card variant="default" title="Billing Overview">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <div class="lg:col-span-2">
                    <x-billing.billing-summary
                        currentPlan="Professional"
                        nextBillingDate="Jan 15, 2025"
                        :amount="49.99"
                        billingCycle="monthly"
                    />
                </div>
                
                <div class="space-y-4">
                    <x-billing.usage-meter
                        label="Storage"
                        :used="45.2"
                        :limit="100"
                        unit="GB"
                    />
                    <x-billing.usage-meter
                        label="API Requests"
                        :used="8750"
                        :limit="10000"
                        unit="requests"
                        :showPercentage="true"
                    />
                </div>
            </div>
        </x-card>

        <!-- Payment Methods -->
        <x-card.card variant="default" title="Payment Methods">
            <p class="mb-6 text-gray-600 dark:text-gray-400">
                Manage your payment methods and billing information.
            </p>
            
            <div class="space-y-4">
                <x-billing.payment-method
                    type="card"
                    brand="visa"
                    last4="4242"
                    :expiryMonth="12"
                    :expiryYear="2025"
                    :isDefault="true"
                >
                    <x-button.secondary size="sm">Edit</x-button.secondary>
                </x-billing.payment-method>
                
                <x-billing.payment-method
                    type="card"
                    brand="mastercard"
                    last4="8888"
                    :expiryMonth="6"
                    :expiryYear="2026"
                    :isDefault="false"
                >
                    <x-button.secondary size="sm">Edit</x-button.secondary>
                    <x-button.danger size="sm">Remove</x-button.danger>
                </x-billing.payment-method>
                
                <x-billing.payment-method
                    type="paypal"
                    :isDefault="false"
                >
                    <x-button.secondary size="sm">Edit</x-button.secondary>
                    <x-button.danger size="sm">Remove</x-button.danger>
                </x-billing.payment-method>
            </div>
            
            <div class="mt-6">
                <x-button.primary>
                    <x-slot:icon>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                    </x-slot:icon>
                    Add Payment Method
                </x-button.primary>
            </div>
        </x-card>

        <!-- Recent Invoices -->
        <x-card.card variant="default" title="Recent Invoices">
            <p class="mb-6 text-gray-600 dark:text-gray-400">
                View and download your recent invoices.
            </p>
            
            <div class="space-y-4">
                @php
                    $invoices = [
                        [
                            'invoiceNumber' => 'INV-2025-001',
                            'date' => 'Dec 15, 2024',
                            'amount' => 49.99,
                            'status' => 'paid',
                            'description' => 'Professional Plan - Monthly Subscription',
                        ],
                        [
                            'invoiceNumber' => 'INV-2024-124',
                            'date' => 'Nov 15, 2024',
                            'amount' => 49.99,
                            'status' => 'paid',
                            'description' => 'Professional Plan - Monthly Subscription',
                        ],
                        [
                            'invoiceNumber' => 'INV-2024-123',
                            'date' => 'Oct 15, 2024',
                            'amount' => 49.99,
                            'status' => 'paid',
                            'description' => 'Professional Plan - Monthly Subscription',
                        ],
                        [
                            'invoiceNumber' => 'INV-2024-122',
                            'date' => 'Sep 15, 2024',
                            'amount' => 49.99,
                            'status' => 'paid',
                            'description' => 'Professional Plan - Monthly Subscription',
                        ],
                        [
                            'invoiceNumber' => 'INV-2025-002',
                            'date' => 'Jan 15, 2025',
                            'amount' => 49.99,
                            'status' => 'pending',
                            'description' => 'Professional Plan - Monthly Subscription',
                        ],
                    ];
                @endphp
                
                @foreach($invoices as $invoice)
                    <x-billing.invoice-card
                        :invoiceNumber="$invoice['invoiceNumber']"
                        :date="$invoice['date']"
                        :amount="$invoice['amount']"
                        :status="$invoice['status']"
                        :description="$invoice['description']"
                        href="#"
                    />
                @endforeach
            </div>
            
            <div class="mt-6 flex justify-center">
                <x-button.secondary>
                    View All Invoices
                </x-button.secondary>
            </div>
        </x-card>

        <!-- Billing History -->
        <x-card.card variant="default" title="Billing History">
            <p class="mb-6 text-gray-600 dark:text-gray-400">
                Complete transaction history and billing records.
            </p>
            
            <div class="overflow-x-auto">
                <x-table.table>
                    <x-slot:header>
                        <x-table.header>
                            <x-table.header-cell>Date</x-table.header-cell>
                            <x-table.header-cell>Description</x-table.header-cell>
                            <x-table.header-cell>Amount</x-table.header-cell>
                            <x-table.header-cell>Status</x-table.header-cell>
                            <x-table.header-cell>Invoice</x-table.header-cell>
                        </x-table.header>
                    </x-slot:header>
                    <x-table.body>
                        @php
                            $transactions = [
                                ['date' => 'Dec 15, 2024', 'description' => 'Professional Plan - Monthly', 'amount' => 49.99, 'status' => 'paid', 'invoice' => 'INV-2025-001'],
                                ['date' => 'Nov 15, 2024', 'description' => 'Professional Plan - Monthly', 'amount' => 49.99, 'status' => 'paid', 'invoice' => 'INV-2024-124'],
                                ['date' => 'Oct 15, 2024', 'description' => 'Professional Plan - Monthly', 'amount' => 49.99, 'status' => 'paid', 'invoice' => 'INV-2024-123'],
                                ['date' => 'Sep 15, 2024', 'description' => 'Professional Plan - Monthly', 'amount' => 49.99, 'status' => 'paid', 'invoice' => 'INV-2024-122'],
                                ['date' => 'Aug 15, 2024', 'description' => 'Professional Plan - Monthly', 'amount' => 49.99, 'status' => 'paid', 'invoice' => 'INV-2024-121'],
                                ['date' => 'Jul 15, 2024', 'description' => 'Professional Plan - Monthly', 'amount' => 49.99, 'status' => 'paid', 'invoice' => 'INV-2024-120'],
                            ];
                        @endphp
                        
                        @foreach($transactions as $transaction)
                            <x-table.row>
                                <x-table.cell>
                                    <div class="text-sm text-gray-900 dark:text-gray-100">
                                        {{ $transaction['date'] }}
                                    </div>
                                </x-table.cell>
                                <x-table.cell>
                                    <div class="text-sm text-gray-900 dark:text-gray-100">
                                        {{ $transaction['description'] }}
                                    </div>
                                </x-table.cell>
                                <x-table.cell>
                                    <div class="text-sm font-medium text-gray-900 dark:text-gray-100">
                                        ${{ number_format($transaction['amount'], 2) }}
                                    </div>
                                </x-table.cell>
                                <x-table.cell>
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400">
                                        {{ ucfirst($transaction['status']) }}
                                    </span>
                                </x-table.cell>
                                <x-table.cell>
                                    <a href="#" class="text-sm text-dodger-blue-600 dark:text-dodger-blue-400 hover:underline">
                                        {{ $transaction['invoice'] }}
                                    </a>
                                </x-table.cell>
                            </x-table.row>
                        @endforeach
                    </x-table.body>
                </x-table.table>
            </div>
        </x-card>

        <!-- Usage Statistics -->
        <x-card.card variant="default" title="Usage Statistics">
            <p class="mb-6 text-gray-600 dark:text-gray-400">
                Track your resource usage across different metrics.
            </p>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <x-billing.usage-meter
                    label="Storage"
                    :used="45.2"
                    :limit="100"
                    unit="GB"
                />
                <x-billing.usage-meter
                    label="Bandwidth"
                    :used="320.5"
                    :limit="500"
                    unit="GB"
                />
                <x-billing.usage-meter
                    label="API Requests"
                    :used="8750"
                    :limit="10000"
                    unit="requests"
                />
                <x-billing.usage-meter
                    label="Database Size"
                    :used="12.8"
                    :limit="50"
                    unit="GB"
                />
                <x-billing.usage-meter
                    label="Email Sends"
                    :used="4500"
                    :limit="10000"
                    unit="emails"
                />
                <x-billing.usage-meter
                    label="SMS Messages"
                    :used="250"
                    :limit="1000"
                    unit="messages"
                />
            </div>
        </x-card>

        <!-- Component Usage Examples -->
        <x-card.card variant="default" title="Component Usage Examples">
            <div class="bg-gray-50 dark:bg-gray-900/50 rounded-lg p-4 overflow-x-auto">
                <pre class="text-sm text-gray-800 dark:text-gray-200"><code>&lt;!-- Billing Summary --&gt;
&lt;x-billing.billing-summary
    currentPlan="Professional"
    nextBillingDate="Jan 15, 2025"
    :amount="49.99"
    billingCycle="monthly"
/&gt;

&lt;!-- Payment Method --&gt;
&lt;x-billing.payment-method
    type="card"
    brand="visa"
    last4="4242"
    :expiryMonth="12"
    :expiryYear="2025"
    :isDefault="true"
&gt;
    &lt;x-button.secondary size="sm"&gt;Edit&lt;/x-button.secondary&gt;
&lt;/x-billing.payment-method&gt;

&lt;!-- Invoice Card --&gt;
&lt;x-billing.invoice-card
    invoiceNumber="INV-2025-001"
    date="Dec 15, 2024"
    :amount="49.99"
    status="paid"
    description="Professional Plan - Monthly Subscription"
    href="/invoices/INV-2025-001"
/&gt;

&lt;!-- Usage Meter --&gt;
&lt;x-billing.usage-meter
    label="Storage"
    :used="45.2"
    :limit="100"
    unit="GB"
/&gt;</code></pre>
            </div>
        </x-card>
    </div>
</x-app-layout>

