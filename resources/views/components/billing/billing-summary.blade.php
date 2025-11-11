@props([
    'currentPlan' => null,
    'nextBillingDate' => null,
    'amount' => 0,
    'billingCycle' => 'monthly', // 'monthly', 'yearly'
])

<div class="bg-gradient-to-br from-dodger-blue-500 to-dodger-blue-600 dark:from-dodger-blue-600 dark:to-dodger-blue-700 rounded-xl p-6 sm:p-8 text-white shadow-lg">
    <div class="flex items-start justify-between mb-6">
        <div>
            <h3 class="text-lg font-semibold mb-1">Current Plan</h3>
            <p class="text-2xl sm:text-3xl font-bold">{{ $currentPlan ?? 'Free Plan' }}</p>
        </div>
        <div class="bg-white/20 rounded-lg p-3">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
            </svg>
        </div>
    </div>
    
    <div class="space-y-4">
        <div class="flex items-center justify-between pb-4 border-b border-white/20">
            <span class="text-dodger-blue-100">Billing Amount</span>
            <span class="text-xl font-bold">${{ number_format($amount, 2) }}</span>
        </div>
        
        <div class="flex items-center justify-between">
            <div>
                <span class="text-dodger-blue-100 text-sm block mb-1">Billing Cycle</span>
                <span class="font-semibold capitalize">{{ $billingCycle }}</span>
            </div>
            <div class="text-right">
                <span class="text-dodger-blue-100 text-sm block mb-1">Next Billing</span>
                <span class="font-semibold">{{ $nextBillingDate ?? 'N/A' }}</span>
            </div>
        </div>
    </div>
</div>

