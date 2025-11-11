@props([
    'balance' => 0,
    'balanceUsd' => 0,
    'address' => '',
    'showAddress' => true,
])

<div {{ $attributes->merge(['class' => 'space-y-4']) }}>
    <div>
        <div class="text-xs text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-2">Wallet Balance</div>
        <div class="text-3xl font-bold text-gray-900 dark:text-gray-100">
            {{ number_format($balance, 8) }} BTC
        </div>
        <div class="text-lg text-gray-600 dark:text-gray-400 mt-1">
            ≈ ${{ number_format($balanceUsd, 2) }} USD
        </div>
    </div>
    
    @if($showAddress && $address)
        <div class="pt-4 border-t border-gray-200 dark:border-gray-700">
            <div class="text-xs text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-2">Wallet Address</div>
            <div class="flex items-center gap-2">
                <code class="text-xs font-mono text-gray-700 dark:text-gray-300 bg-gray-100 dark:bg-gray-800 px-3 py-2 rounded-lg break-all">
                    {{ $address }}
                </code>
                <button 
                    onclick="navigator.clipboard.writeText('{{ $address }}'); this.querySelector('span').textContent = 'Copied!'; setTimeout(() => this.querySelector('span').textContent = 'Copy', 2000);"
                    class="text-xs text-dodger-blue-600 dark:text-dodger-blue-400 hover:text-dodger-blue-700 dark:hover:text-dodger-blue-300 font-medium whitespace-nowrap"
                >
                    <span>Copy</span>
                </button>
            </div>
        </div>
    @endif
</div>
