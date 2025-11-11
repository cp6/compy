@props([
    'type' => 'card', // 'card', 'paypal', 'bank'
    'last4' => null,
    'brand' => null, // 'visa', 'mastercard', 'amex', 'discover'
    'expiryMonth' => null,
    'expiryYear' => null,
    'isDefault' => false,
    'name' => null,
])

@php
    $brandColors = match($brand) {
        'visa' => 'bg-blue-600',
        'mastercard' => 'bg-red-600',
        'amex' => 'bg-blue-500',
        'discover' => 'bg-orange-600',
        default => 'bg-gray-600',
    };
    
    $typeIcons = match($type) {
        'card' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" /></svg>',
        'paypal' => '<svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M7.076 21.337H2.47a.641.641 0 0 1-.633-.74L4.944.901C5.026.382 5.474 0 5.998 0h7.46c2.57 0 4.578.543 5.69 1.81 1.01 1.15 1.304 2.42 1.012 4.287-.023.143-.047.288-.077.437-.983 5.05-4.349 6.797-8.647 6.797h-2.19c-.524 0-.968.382-1.05.9l-1.12 7.106zm14.146-14.42a.805.805 0 0 0-.777-.637h-3.02c-.491 0-.894.357-.977.836l-.423 2.68a.804.804 0 0 0 .777.97h1.76c.582 0 1.06-.442 1.117-1.02.12-1.186.176-2.1.15-2.789z"/></svg>',
        'bank' => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" /></svg>',
        default => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" /></svg>',
    };
@endphp

<div class="bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 p-4 sm:p-5">
    <div class="flex items-start justify-between">
        <div class="flex items-start space-x-4 flex-1">
            <div class="flex-shrink-0">
                @if($type === 'card' && $brand)
                    <div class="w-12 h-8 {{ $brandColors }} rounded flex items-center justify-center">
                        <span class="text-white text-xs font-bold">
                            @if($brand === 'visa')
                                VISA
                            @elseif($brand === 'mastercard')
                                MC
                            @elseif($brand === 'amex')
                                AMEX
                            @elseif($brand === 'discover')
                                DISC
                            @endif
                        </span>
                    </div>
                @else
                    <div class="w-12 h-8 bg-gray-200 dark:bg-gray-700 rounded flex items-center justify-center text-gray-600 dark:text-gray-400">
                        {!! $typeIcons !!}
                    </div>
                @endif
            </div>
            
            <div class="flex-1 min-w-0">
                <div class="flex items-center space-x-2 mb-1">
                    <h4 class="text-sm font-semibold text-gray-900 dark:text-gray-100">
                        @if($type === 'card' && $last4)
                            •••• •••• •••• {{ $last4 }}
                        @elseif($type === 'paypal')
                            PayPal Account
                        @elseif($type === 'bank')
                            Bank Account
                        @else
                            {{ $name ?? 'Payment Method' }}
                        @endif
                    </h4>
                    @if($isDefault)
                        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-dodger-blue-100 text-dodger-blue-800 dark:bg-dodger-blue-900/30 dark:text-dodger-blue-400">
                            Default
                        </span>
                    @endif
                </div>
                
                @if($type === 'card' && $expiryMonth && $expiryYear)
                    <p class="text-xs text-gray-500 dark:text-gray-400">
                        Expires {{ str_pad($expiryMonth, 2, '0', STR_PAD_LEFT) }}/{{ substr($expiryYear, -2) }}
                    </p>
                @endif
            </div>
        </div>
        
        <div class="flex items-center space-x-2 ml-4">
            {{ $slot }}
        </div>
    </div>
</div>

