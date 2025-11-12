<x-app-layout>
    <x-slot name="title">Bitcoin Demo</x-slot>
    <x-slot name="metaDescription">A comprehensive Bitcoin demo with price tracking, wallet balance, transaction history, and price charts.</x-slot>
    <x-slot name="metaKeywords">bitcoin, btc, cryptocurrency, crypto, demo, wallet, transactions</x-slot>

    <x-slot name="header">
        <x-breadcrumb :items="[
            ['label' => 'Home', 'url' => route('dashboard')],
            ['label' => 'Bitcoin Demo', 'url' => '#'],
        ]" />
    </x-slot>

    <x-slot name="pageTitle">
        Bitcoin Demo
    </x-slot>

    <x-slot name="pageSubtitle">
        Real-time Bitcoin price tracking, wallet management, and transaction history
    </x-slot>

    <x-alert.alerts />

    @php
        // Mock Bitcoin data
        $currentPrice = 43250.75;
        $priceChange = 1250.50;
        $priceChangePercent = 2.98;
        
        $walletBalance = 0.05234123;
        $walletAddress = 'bc1qxy2kgdygjrsqtzq2n0yrf2493p83kkfjhx0wlh';
        
        $transactions = [
            [
                'hash' => 'a1b2c3d4e5f6789012345678901234567890abcdef1234567890abcdef123456',
                'type' => 'received',
                'amount' => 0.00123456,
                'amountUsd' => 53.42,
                'fee' => 0,
                'confirmations' => 12,
                'timestamp' => now()->subHours(2),
                'address' => 'bc1qxy2kgdygjrsqtzq2n0yrf2493p83kkfjhx0wlh',
            ],
            [
                'hash' => 'b2c3d4e5f6789012345678901234567890abcdef1234567890abcdef1234567890',
                'type' => 'sent',
                'amount' => 0.00050000,
                'amountUsd' => 21.63,
                'fee' => 0.00001234,
                'confirmations' => 8,
                'timestamp' => now()->subHours(5),
                'address' => 'bc1qw508d6qejxtdg4y5r3zarvary0c5xw7kv8f3t4',
            ],
            [
                'hash' => 'c3d4e5f6789012345678901234567890abcdef1234567890abcdef1234567890ab',
                'type' => 'received',
                'amount' => 0.00250000,
                'amountUsd' => 108.13,
                'fee' => 0,
                'confirmations' => 24,
                'timestamp' => now()->subDays(1),
                'address' => 'bc1qxy2kgdygjrsqtzq2n0yrf2493p83kkfjhx0wlh',
            ],
            [
                'hash' => 'd4e5f6789012345678901234567890abcdef1234567890abcdef1234567890abcd',
                'type' => 'sent',
                'amount' => 0.00100000,
                'amountUsd' => 43.25,
                'fee' => 0.00001500,
                'confirmations' => 6,
                'timestamp' => now()->subDays(2),
                'address' => 'bc1qr583w2swedndelz5gsw37pk677vy3fcj77sxhc',
            ],
            [
                'hash' => 'e5f6789012345678901234567890abcdef1234567890abcdef1234567890abcdef',
                'type' => 'received',
                'amount' => 0.00500000,
                'amountUsd' => 216.25,
                'fee' => 0,
                'confirmations' => 48,
                'timestamp' => now()->subDays(3),
                'address' => 'bc1qxy2kgdygjrsqtzq2n0yrf2493p83kkfjhx0wlh',
            ],
        ];
        
        // Generate price history for chart (last 30 days)
        $priceHistory = [];
        $basePrice = $currentPrice - $priceChange;
        for ($i = 29; $i >= 0; $i--) {
            $date = now()->subDays($i);
            $variation = (rand(-500, 500) / 100); // Random variation
            $priceHistory[] = [
                'date' => $date->format('M d'),
                'price' => $basePrice + ($variation * 10) + (($i / 29) * $priceChange),
            ];
        }
        
        $lastUpdated = \Carbon\Carbon::now()->subMinutes(2)->format('g:i A');
    @endphp

    <div class="space-y-6" x-data="{
        selectedTimeframe: '24h',
        timeframes: ['24h', '7d', '30d', '1y'],
    }">
        <!-- Bitcoin Price and Wallet Overview -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Current Price -->
            <x-card.card variant="gradient" title="Current Bitcoin Price">
                <x-bitcoin.price-display
                    :price="$currentPrice"
                    :change="$priceChange"
                    :changePercent="$priceChangePercent"
                    currency="USD"
                    size="large"
                />
                <div class="mt-4 pt-4 border-t border-gray-200 dark:border-gray-700">
                    <div class="flex items-center justify-between text-sm">
                        <span class="text-gray-600 dark:text-gray-400">24h High</span>
                        <span class="font-semibold text-gray-900 dark:text-gray-100">${{ number_format($currentPrice + 500, 2) }}</span>
                    </div>
                    <div class="flex items-center justify-between text-sm mt-2">
                        <span class="text-gray-600 dark:text-gray-400">24h Low</span>
                        <span class="font-semibold text-gray-900 dark:text-gray-100">${{ number_format($currentPrice - 800, 2) }}</span>
                    </div>
                    <div class="flex items-center justify-between text-sm mt-2">
                        <span class="text-gray-600 dark:text-gray-400">24h Volume</span>
                        <span class="font-semibold text-gray-900 dark:text-gray-100">${{ number_format(rand(15000000000, 25000000000), 0) }}</span>
                    </div>
                    <div class="mt-4 pt-4 border-t border-gray-200 dark:border-gray-700">
                        <p class="text-xs text-gray-500 dark:text-gray-500">
                            Last updated: {{ $lastUpdated }}
                        </p>
                    </div>
                </div>
            </x-card.card>

            <!-- Wallet Balance -->
            <x-card.card variant="gradient" title="Wallet Balance">
                <x-bitcoin.wallet-balance
                    :balance="$walletBalance"
                    :balanceUsd="$walletBalance * $currentPrice"
                    :address="$walletAddress"
                    :showAddress="true"
                />
                <div class="mt-6 flex gap-3">
                    <x-button.primary class="flex-1">
                        Send BTC
                    </x-button.primary>
                    <x-button.secondary class="flex-1">
                        Receive BTC
                    </x-button.secondary>
                </div>
            </x-card.card>
        </div>

        <!-- Price Chart -->
        <x-card.card variant="gradient" title="Price Chart">
            <div class="mb-4 flex gap-2">
                <template x-for="timeframe in timeframes" :key="timeframe">
                    <button
                        @click="selectedTimeframe = timeframe"
                        :class="selectedTimeframe === timeframe 
                            ? 'bg-dodger-blue-500 text-white' 
                            : 'bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-600'"
                        class="px-4 py-2 rounded-lg text-sm font-medium transition-colors"
                    >
                        <span x-text="timeframe"></span>
                    </button>
                </template>
            </div>
            
            @php
                $chartData = [
                    'labels' => array_column($priceHistory, 'date'),
                    'datasets' => [[
                        'label' => 'BTC Price (USD)',
                        'data' => array_column($priceHistory, 'price'),
                        'borderColor' => 'rgb(59, 130, 246)',
                        'backgroundColor' => 'rgba(59, 130, 246, 0.1)',
                        'fill' => true,
                        'tension' => 0.4,
                        'pointRadius' => 0,
                        'pointHoverRadius' => 4,
                    ]],
                ];
                
                $chartOptions = [
                    'plugins' => [
                        'legend' => [
                            'display' => true,
                        ],
                    ],
                    'scales' => [
                        'y' => [
                            'beginAtZero' => false,
                            'ticks' => [
                                'callback' => 'function(value) { return "$" + value.toLocaleString(); }',
                            ],
                        ],
                    ],
                ];
            @endphp
            
            <x-chart.chart
                type="line"
                height="400px"
                :data="$chartData"
                :options="$chartOptions"
            />
        </x-card.card>

        <!-- Transaction History -->
        <x-card.card variant="gradient" title="Transaction History">
            <x-bitcoin.transaction-list :transactions="$transactions" />
            
            <div class="mt-6 pt-4 border-t border-gray-200 dark:border-gray-700">
                <div class="flex items-center justify-between">
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        Showing {{ count($transactions) }} recent transactions
                    </p>
                    <x-button.secondary>
                        View All Transactions
                    </x-button.secondary>
                </div>
            </div>
        </x-card.card>

        <!-- Market Statistics -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <x-card.card variant="gradient" title="Market Cap">
                <div class="text-3xl font-bold text-gray-900 dark:text-gray-100">
                    ${{ number_format(850000000000, 0) }}
                </div>
                <div class="text-sm text-gray-600 dark:text-gray-400 mt-2">
                    Rank #1
                </div>
            </x-card.card>

            <x-card.card variant="gradient" title="Circulating Supply">
                <div class="text-3xl font-bold text-gray-900 dark:text-gray-100">
                    {{ number_format(19600000, 0) }} BTC
                </div>
                <div class="text-sm text-gray-600 dark:text-gray-400 mt-2">
                    Max Supply: 21,000,000 BTC
                </div>
            </x-card.card>

            <x-card.card variant="gradient" title="Network Hash Rate">
                <div class="text-3xl font-bold text-gray-900 dark:text-gray-100">
                    {{ number_format(450, 1) }} EH/s
                </div>
                <div class="text-sm text-gray-600 dark:text-gray-400 mt-2">
                    All-time high: 500 EH/s
                </div>
            </x-card.card>
        </div>

        <!-- Quick Actions -->
        <x-card.card variant="gradient" title="Quick Actions">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <button class="p-4 rounded-lg bg-gray-50 dark:bg-gray-900/50 hover:bg-gray-100 dark:hover:bg-gray-900 transition-colors text-left">
                    <div class="font-semibold text-gray-900 dark:text-gray-100">Send</div>
                    <div class="text-sm text-gray-600 dark:text-gray-400">Send Bitcoin</div>
                </button>
                
                <button class="p-4 rounded-lg bg-gray-50 dark:bg-gray-900/50 hover:bg-gray-100 dark:hover:bg-gray-900 transition-colors text-left">
                    <div class="font-semibold text-gray-900 dark:text-gray-100">Receive</div>
                    <div class="text-sm text-gray-600 dark:text-gray-400">Receive Bitcoin</div>
                </button>
                
                <button class="p-4 rounded-lg bg-gray-50 dark:bg-gray-900/50 hover:bg-gray-100 dark:hover:bg-gray-900 transition-colors text-left">
                    <div class="font-semibold text-gray-900 dark:text-gray-100">Exchange</div>
                    <div class="text-sm text-gray-600 dark:text-gray-400">Swap coins</div>
                </button>
                
                <button class="p-4 rounded-lg bg-gray-50 dark:bg-gray-900/50 hover:bg-gray-100 dark:hover:bg-gray-900 transition-colors text-left">
                    <div class="font-semibold text-gray-900 dark:text-gray-100">Analytics</div>
                    <div class="text-sm text-gray-600 dark:text-gray-400">View analytics</div>
                </button>
            </div>
        </x-card.card>
    </div>
</x-app-layout>
