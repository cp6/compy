<x-app-layout>
    <x-slot name="title">Currency Exchange Demo</x-slot>
    <x-slot name="metaDescription">A comprehensive currency exchange demo with live rates, converter, and popular currency pairs.</x-slot>
    <x-slot name="metaKeywords">currency, exchange, rates, converter, demo</x-slot>

    <x-slot name="header">
        <x-breadcrumb :items="[
            ['label' => 'Home', 'url' => route('dashboard')],
            ['label' => 'Currency Exchange Demo', 'url' => '#'],
        ]" />
    </x-slot>

    <x-slot name="pageTitle">
        Currency Exchange Demo
    </x-slot>

    <x-slot name="pageSubtitle">
        Real-time exchange rates and currency converter
    </x-slot>

    <x-alert.alerts />

    @php
        // Mock exchange rates data
        $baseCurrency = 'USD';
        $exchangeRates = [
            'EUR' => ['code' => 'EUR', 'name' => 'Euro', 'rate' => 0.92, 'change' => 0.0012, 'flag' => '🇪🇺'],
            'GBP' => ['code' => 'GBP', 'name' => 'British Pound', 'rate' => 0.79, 'change' => -0.0008, 'flag' => '🇬🇧'],
            'JPY' => ['code' => 'JPY', 'name' => 'Japanese Yen', 'rate' => 149.50, 'change' => 0.25, 'flag' => '🇯🇵'],
            'CAD' => ['code' => 'CAD', 'name' => 'Canadian Dollar', 'rate' => 1.35, 'change' => -0.0015, 'flag' => '🇨🇦'],
            'AUD' => ['code' => 'AUD', 'name' => 'Australian Dollar', 'rate' => 1.52, 'change' => 0.0020, 'flag' => '🇦🇺'],
            'CHF' => ['code' => 'CHF', 'name' => 'Swiss Franc', 'rate' => 0.88, 'change' => -0.0005, 'flag' => '🇨🇭'],
            'CNY' => ['code' => 'CNY', 'name' => 'Chinese Yuan', 'rate' => 7.15, 'change' => 0.01, 'flag' => '🇨🇳'],
            'INR' => ['code' => 'INR', 'name' => 'Indian Rupee', 'rate' => 83.25, 'change' => -0.15, 'flag' => '🇮🇳'],
            'BRL' => ['code' => 'BRL', 'name' => 'Brazilian Real', 'rate' => 4.95, 'change' => 0.02, 'flag' => '🇧🇷'],
            'MXN' => ['code' => 'MXN', 'name' => 'Mexican Peso', 'rate' => 17.10, 'change' => -0.05, 'flag' => '🇲🇽'],
            'SGD' => ['code' => 'SGD', 'name' => 'Singapore Dollar', 'rate' => 1.34, 'change' => 0.0008, 'flag' => '🇸🇬'],
            'KRW' => ['code' => 'KRW', 'name' => 'South Korean Won', 'rate' => 1320.00, 'change' => 2.50, 'flag' => '🇰🇷'],
        ];

        $popularPairs = [
            ['from' => 'USD', 'to' => 'EUR', 'rate' => 0.92, 'change' => 0.0012],
            ['from' => 'USD', 'to' => 'GBP', 'rate' => 0.79, 'change' => -0.0008],
            ['from' => 'EUR', 'to' => 'GBP', 'rate' => 0.86, 'change' => -0.0015],
            ['from' => 'USD', 'to' => 'JPY', 'rate' => 149.50, 'change' => 0.25],
            ['from' => 'EUR', 'to' => 'JPY', 'rate' => 162.54, 'change' => 0.30],
        ];

        $lastUpdated = \Carbon\Carbon::now()->subMinutes(5)->format('g:i A');
    @endphp

    <div class="space-y-6" x-data="{
        amount: 100,
        fromCurrency: 'USD',
        toCurrency: 'EUR',
        convertedAmount: 0,
        rates: @js($exchangeRates),
        
        init() {
            this.convert();
        },
        
        convert() {
            if (this.fromCurrency === 'USD') {
                this.convertedAmount = (this.amount * (this.rates[this.toCurrency]?.rate || 1)).toFixed(2);
            } else if (this.toCurrency === 'USD') {
                this.convertedAmount = (this.amount / (this.rates[this.fromCurrency]?.rate || 1)).toFixed(2);
            } else {
                // Convert from -> USD -> to
                const fromToUsd = this.rates[this.fromCurrency]?.rate || 1;
                const usdToTo = this.rates[this.toCurrency]?.rate || 1;
                this.convertedAmount = ((this.amount / fromToUsd) * usdToTo).toFixed(2);
            }
        },
        
        swapCurrencies() {
            const temp = this.fromCurrency;
            this.fromCurrency = this.toCurrency;
            this.toCurrency = temp;
            this.convert();
        }
    }">
        <!-- Currency Converter -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <x-card.card variant="gradient" title="Currency Converter">
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Amount
                        </label>
                        <div class="relative">
                            <input 
                                type="number" 
                                x-model.number="amount"
                                @input="convert()"
                                class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-dodger-blue-500 focus:border-transparent"
                                placeholder="Enter amount"
                                step="0.01"
                            />
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                From
                            </label>
                            <select 
                                x-model="fromCurrency"
                                @change="convert()"
                                class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-dodger-blue-500 focus:border-transparent"
                            >
                                <option value="USD">USD - US Dollar</option>
                                @foreach($exchangeRates as $currency)
                                    <option value="{{ $currency['code'] }}">{{ $currency['code'] }} - {{ $currency['name'] }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex items-end">
                            <button 
                                @click="swapCurrencies()"
                                class="w-full py-3 px-4 bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 rounded-lg transition-colors flex items-center justify-center"
                                title="Swap currencies"
                            >
                                <svg class="w-5 h-5 text-gray-600 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                                </svg>
                            </button>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                To
                            </label>
                            <select 
                                x-model="toCurrency"
                                @change="convert()"
                                class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-dodger-blue-500 focus:border-transparent"
                            >
                                <option value="USD">USD - US Dollar</option>
                                @foreach($exchangeRates as $currency)
                                    <option value="{{ $currency['code'] }}">{{ $currency['code'] }} - {{ $currency['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="pt-4 border-t border-gray-200 dark:border-gray-700">
                        <div class="text-sm text-gray-600 dark:text-gray-400 mb-1">Converted Amount</div>
                        <div class="text-3xl font-bold text-gray-900 dark:text-gray-100">
                            <span x-text="convertedAmount"></span> <span x-text="toCurrency"></span>
                        </div>
                        <div class="text-sm text-gray-500 dark:text-gray-500 mt-2">
                            1 <span x-text="fromCurrency"></span> = <span x-text="(fromCurrency === 'USD' ? rates[toCurrency]?.rate : toCurrency === 'USD' ? (1 / rates[fromCurrency]?.rate) : ((1 / rates[fromCurrency]?.rate) * rates[toCurrency]?.rate)).toFixed(4)"></span> <span x-text="toCurrency"></span>
                        </div>
                    </div>
                </div>
            </x-card.card>

            <!-- Popular Currency Pairs -->
            <x-card.card variant="gradient" title="Popular Currency Pairs">
                <div class="space-y-3">
                    @foreach($popularPairs as $pair)
                        <div class="flex items-center justify-between p-3 rounded-lg bg-gray-50 dark:bg-gray-900/50 hover:bg-gray-100 dark:hover:bg-gray-900 transition-colors">
                            <div class="flex items-center gap-3">
                                <div class="text-lg font-semibold text-gray-900 dark:text-gray-100">
                                    {{ $pair['from'] }}/{{ $pair['to'] }}
                                </div>
                                <div class="text-sm text-gray-600 dark:text-gray-400">
                                    {{ $pair['from'] === 'USD' ? $pair['rate'] : number_format($pair['rate'], 4) }}
                                </div>
                            </div>
                            <div class="flex items-center gap-2">
                                @if($pair['change'] >= 0)
                                    <span class="text-green-600 dark:text-green-400 text-sm font-medium">
                                        +{{ number_format(abs($pair['change']), 4) }}
                                    </span>
                                    <svg class="w-4 h-4 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                                    </svg>
                                @else
                                    <span class="text-red-600 dark:text-red-400 text-sm font-medium">
                                        {{ number_format($pair['change'], 4) }}
                                    </span>
                                    <svg class="w-4 h-4 text-red-600 dark:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                                    </svg>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="mt-4 pt-4 border-t border-gray-200 dark:border-gray-700">
                    <p class="text-xs text-gray-500 dark:text-gray-500">
                        Last updated: {{ $lastUpdated }}
                    </p>
                </div>
            </x-card.card>
        </div>

        <!-- Exchange Rates Table -->
        <x-card.card variant="gradient" title="Exchange Rates (Base: {{ $baseCurrency }})">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gray-50 dark:bg-gray-800">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                Currency
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                Name
                            </th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                Rate
                            </th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                Change (24h)
                            </th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                Convert
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach($exchangeRates as $currency)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-800/50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center gap-2">
                                        <span class="text-2xl">{{ $currency['flag'] }}</span>
                                        <span class="text-sm font-semibold text-gray-900 dark:text-gray-100">
                                            {{ $currency['code'] }}
                                        </span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="text-sm text-gray-600 dark:text-gray-400">
                                        {{ $currency['name'] }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right">
                                    <span class="text-sm font-semibold text-gray-900 dark:text-gray-100">
                                        {{ number_format($currency['rate'], $currency['code'] === 'JPY' || $currency['code'] === 'KRW' ? 2 : 4) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right">
                                    <div class="flex items-center justify-end gap-1">
                                        @if($currency['change'] >= 0)
                                            <span class="text-sm font-medium text-green-600 dark:text-green-400">
                                                +{{ number_format(abs($currency['change']), 4) }}
                                            </span>
                                            <svg class="w-4 h-4 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                                            </svg>
                                        @else
                                            <span class="text-sm font-medium text-red-600 dark:text-red-400">
                                                {{ number_format($currency['change'], 4) }}
                                            </span>
                                            <svg class="w-4 h-4 text-red-600 dark:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                                            </svg>
                                        @endif
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right">
                                    <button 
                                        @click="fromCurrency = 'USD'; toCurrency = '{{ $currency['code'] }}'; amount = 100; convert();"
                                        class="text-sm text-dodger-blue-600 dark:text-dodger-blue-400 hover:text-dodger-blue-700 dark:hover:text-dodger-blue-300 font-medium"
                                    >
                                        Convert
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-4 pt-4 border-t border-gray-200 dark:border-gray-700">
                <p class="text-xs text-gray-500 dark:text-gray-500">
                    Rates are updated every 5 minutes. Last updated: {{ $lastUpdated }}
                </p>
            </div>
        </x-card.card>

        <!-- Quick Convert Examples -->
        <x-card.card variant="gradient" title="Quick Convert Examples">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="p-4 rounded-lg bg-gray-50 dark:bg-gray-900/50">
                    <div class="text-sm text-gray-600 dark:text-gray-400 mb-1">100 USD</div>
                    <div class="text-xl font-bold text-gray-900 dark:text-gray-100">
                        {{ number_format(100 * $exchangeRates['EUR']['rate'], 2) }} EUR
                    </div>
                </div>
                <div class="p-4 rounded-lg bg-gray-50 dark:bg-gray-900/50">
                    <div class="text-sm text-gray-600 dark:text-gray-400 mb-1">100 USD</div>
                    <div class="text-xl font-bold text-gray-900 dark:text-gray-100">
                        {{ number_format(100 * $exchangeRates['GBP']['rate'], 2) }} GBP
                    </div>
                </div>
                <div class="p-4 rounded-lg bg-gray-50 dark:bg-gray-900/50">
                    <div class="text-sm text-gray-600 dark:text-gray-400 mb-1">100 USD</div>
                    <div class="text-xl font-bold text-gray-900 dark:text-gray-100">
                        {{ number_format(100 * $exchangeRates['JPY']['rate'], 0) }} JPY
                    </div>
                </div>
            </div>
        </x-card.card>
    </div>
</x-app-layout>

