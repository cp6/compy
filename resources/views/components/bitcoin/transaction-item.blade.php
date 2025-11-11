@props([
    'hash' => '',
    'type' => 'received', // 'received', 'sent'
    'amount' => 0,
    'amountUsd' => 0,
    'fee' => 0,
    'confirmations' => 0,
    'timestamp' => null,
    'address' => '',
])

@php
    $typeColor = $type === 'received' ? 'text-green-600 dark:text-green-400' : 'text-red-600 dark:text-red-400';
    $typeIcon = $type === 'received' ? 'M12 4v16m8-8H4' : 'M20 12H4';
    $typeLabel = $type === 'received' ? 'Received' : 'Sent';
    $confirmationsColor = $confirmations >= 6 ? 'text-green-600 dark:text-green-400' : 'text-yellow-600 dark:text-yellow-400';
@endphp

<div {{ $attributes->merge(['class' => 'flex items-center justify-between p-4 rounded-lg bg-gray-50 dark:bg-gray-900/50 hover:bg-gray-100 dark:hover:bg-gray-900 transition-colors']) }}>
    <div class="flex items-center gap-4 flex-1 min-w-0">
        <div class="flex-shrink-0 w-10 h-10 rounded-full bg-gradient-to-br {{ $type === 'received' ? 'from-green-400 to-green-600' : 'from-red-400 to-red-600' }} flex items-center justify-center">
            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $typeIcon }}" />
            </svg>
        </div>
        
        <div class="flex-1 min-w-0">
            <div class="flex items-center gap-2 mb-1">
                <span class="text-sm font-semibold text-gray-900 dark:text-gray-100">{{ $typeLabel }}</span>
                <span class="text-xs {{ $confirmationsColor }}">
                    {{ $confirmations >= 6 ? 'Confirmed' : $confirmations . ' confirmations' }}
                </span>
            </div>
            <div class="text-xs text-gray-500 dark:text-gray-400 truncate">
                {{ $address ? substr($address, 0, 10) . '...' . substr($address, -8) : substr($hash, 0, 16) . '...' }}
            </div>
            @if($timestamp)
                <div class="text-xs text-gray-400 dark:text-gray-500 mt-1">
                    {{ \Carbon\Carbon::parse($timestamp)->diffForHumans() }}
                </div>
            @endif
        </div>
    </div>
    
    <div class="flex flex-col items-end gap-1 flex-shrink-0">
        <div class="text-lg font-bold {{ $typeColor }}">
            {{ $type === 'received' ? '+' : '-' }}{{ number_format($amount, 8) }} BTC
        </div>
        <div class="text-sm text-gray-600 dark:text-gray-400">
            ${{ number_format($amountUsd, 2) }}
        </div>
        @if($fee > 0)
            <div class="text-xs text-gray-500 dark:text-gray-500">
                Fee: {{ number_format($fee, 8) }} BTC
            </div>
        @endif
    </div>
</div>
