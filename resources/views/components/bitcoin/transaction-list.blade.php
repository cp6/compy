@props([
    'transactions' => [],
])

<div {{ $attributes->merge(['class' => 'space-y-2']) }}>
    @forelse($transactions as $transaction)
        <x-bitcoin.transaction-item
            :hash="$transaction['hash'] ?? ''"
            :type="$transaction['type'] ?? 'received'"
            :amount="$transaction['amount'] ?? 0"
            :amountUsd="$transaction['amountUsd'] ?? 0"
            :fee="$transaction['fee'] ?? 0"
            :confirmations="$transaction['confirmations'] ?? 0"
            :timestamp="$transaction['timestamp'] ?? null"
            :address="$transaction['address'] ?? ''"
        />
    @empty
        <div class="text-center py-8 text-gray-500 dark:text-gray-400">
            <svg class="w-12 h-12 mx-auto mb-4 text-gray-400 dark:text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
            </svg>
            <p>No transactions found</p>
        </div>
    @endforelse
</div>
