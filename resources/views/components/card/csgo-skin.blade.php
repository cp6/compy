@props([
    'weaponName' => null,
    'skinName' => null,
    'condition' => null, // 'Factory New', 'Minimal Wear', 'Field-Tested', 'Well-Worn', 'Battle-Scarred'
    'float' => null, // Float value (0.00 - 1.00)
    'price' => null, // Price in USD or currency
    'image' => null, // Image URL
    'statTrak' => false, // StatTrak indicator
    'souvenir' => false, // Souvenir indicator
    'rarity' => 'Mil-Spec', // 'Consumer Grade', 'Industrial Grade', 'Mil-Spec', 'Restricted', 'Classified', 'Covert', 'Contraband'
    'variant' => 'default', // 'default', 'gradient', 'glass'
    'hover' => false,
    'pattern' => null, // Pattern index
    'stickerCount' => 0, // Number of stickers
])

@php
    $baseClasses = match($variant) {
        'gradient' => 'bg-gradient-to-br from-white via-white to-gray-50 dark:from-gray-800 dark:via-gray-800 dark:to-gray-900',
        'glass' => 'bg-white/80 dark:bg-gray-800/80 backdrop-blur-xl border border-white/20 dark:border-gray-700/50',
        default => 'bg-white dark:bg-gray-800',
    };
    
    $shadowClasses = match($variant) {
        'gradient' => 'shadow-2xl shadow-gray-200/50 dark:shadow-gray-900/50',
        'glass' => 'shadow-xl shadow-gray-200/20 dark:shadow-gray-900/30',
        default => 'shadow-xl shadow-gray-200/50 dark:shadow-gray-900/30',
    };
    
    $hoverShadowClasses = $hover ? ' hover:shadow-2xl hover:shadow-gray-300/60 dark:hover:shadow-gray-900/50 hover:scale-[1.02]' : '';
    $cardClasses = $baseClasses . ' overflow-hidden rounded-2xl border border-gray-200/60 dark:border-gray-700/60 transition-all duration-500 ease-out ' . $shadowClasses . $hoverShadowClasses;
    
    // Rarity color mapping
    $rarityColors = [
        'Consumer Grade' => ['bg' => 'bg-gray-100 dark:bg-gray-700', 'text' => 'text-gray-800 dark:text-gray-200', 'border' => 'border-gray-300 dark:border-gray-600'],
        'Industrial Grade' => ['bg' => 'bg-blue-100 dark:bg-blue-900/30', 'text' => 'text-blue-800 dark:text-blue-200', 'border' => 'border-blue-300 dark:border-blue-700'],
        'Mil-Spec' => ['bg' => 'bg-indigo-100 dark:bg-indigo-900/30', 'text' => 'text-indigo-800 dark:text-indigo-200', 'border' => 'border-indigo-300 dark:border-indigo-700'],
        'Restricted' => ['bg' => 'bg-purple-100 dark:bg-purple-900/30', 'text' => 'text-purple-800 dark:text-purple-200', 'border' => 'border-purple-300 dark:border-purple-700'],
        'Classified' => ['bg' => 'bg-pink-100 dark:bg-pink-900/30', 'text' => 'text-pink-800 dark:text-pink-200', 'border' => 'border-pink-300 dark:border-pink-700'],
        'Covert' => ['bg' => 'bg-red-100 dark:bg-red-900/30', 'text' => 'text-red-800 dark:text-red-200', 'border' => 'border-red-300 dark:border-red-700'],
        'Contraband' => ['bg' => 'bg-amber-100 dark:bg-amber-900/30', 'text' => 'text-amber-800 dark:text-amber-200', 'border' => 'border-amber-300 dark:border-amber-700'],
    ];
    
    $rarityColor = $rarityColors[$rarity] ?? $rarityColors['Mil-Spec'];
    
    // Condition color mapping
    $conditionColors = [
        'Factory New' => 'text-green-600 dark:text-green-400',
        'Minimal Wear' => 'text-lime-600 dark:text-lime-400',
        'Field-Tested' => 'text-yellow-600 dark:text-yellow-400',
        'Well-Worn' => 'text-orange-600 dark:text-orange-400',
        'Battle-Scarred' => 'text-red-600 dark:text-red-400',
    ];
    
    $conditionColor = $conditionColors[$condition] ?? 'text-gray-600 dark:text-gray-400';
@endphp

<div {{ $attributes->merge(['class' => $cardClasses]) }}>
    <!-- Skin Image Section -->
    <div class="relative bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 dark:from-gray-950 dark:via-gray-900 dark:to-gray-950">
        @if($image)
            <img src="{{ $image }}" alt="{{ $weaponName }} {{ $skinName }}" class="w-full h-64 object-contain">
        @else
            <!-- Placeholder for weapon skin -->
            <div class="w-full h-64 flex items-center justify-center">
                <div class="text-center">
                    <svg class="w-24 h-24 mx-auto text-gray-600 dark:text-gray-500 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                    </svg>
                    <p class="text-gray-500 dark:text-gray-400 text-sm">Weapon Skin</p>
                </div>
            </div>
        @endif
        
        <!-- StatTrak Badge -->
        @if($statTrak)
            <div class="absolute top-3 left-3">
                <div class="px-2.5 py-1 bg-gradient-to-r from-orange-500 to-red-600 rounded-md shadow-lg">
                    <span class="text-white text-xs font-bold">★ StatTrak™</span>
                </div>
            </div>
        @endif
        
        <!-- Souvenir Badge -->
        @if($souvenir)
            <div class="absolute top-3 {{ $statTrak ? 'right-3' : 'left-3' }}">
                <div class="px-2.5 py-1 bg-gradient-to-r from-yellow-400 to-amber-500 rounded-md shadow-lg">
                    <span class="text-white text-xs font-bold">Souvenir</span>
                </div>
            </div>
        @endif
        
        <!-- Rarity Border -->
        <div class="absolute inset-0 border-2 {{ $rarityColor['border'] }} pointer-events-none"></div>
    </div>
    
    <!-- Content Section -->
    <div class="p-4 sm:p-6">
        <!-- Weapon and Skin Name -->
        <div class="mb-3">
            <h3 class="text-lg font-bold text-gray-900 dark:text-gray-100">
                {{ $weaponName ?? 'Weapon' }}
            </h3>
            <p class="text-sm font-semibold {{ $rarityColor['text'] }} mt-1">
                {{ $skinName ?? 'Skin Name' }}
            </p>
        </div>
        
        <!-- Rarity Badge -->
        <div class="mb-3">
            <span class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-medium {{ $rarityColor['bg'] }} {{ $rarityColor['text'] }} {{ $rarityColor['border'] }} border">
                {{ $rarity }}
            </span>
        </div>
        
        <!-- Condition and Float -->
        <div class="space-y-2 mb-4">
            @if($condition)
                <div class="flex items-center justify-between text-sm">
                    <span class="text-gray-600 dark:text-gray-400">Condition:</span>
                    <span class="font-semibold {{ $conditionColor }}">{{ $condition }}</span>
                </div>
            @endif
            
            @if($float !== null)
                <div class="flex items-center justify-between text-sm">
                    <span class="text-gray-600 dark:text-gray-400">Float Value:</span>
                    <span class="font-mono font-semibold text-gray-900 dark:text-gray-100">{{ number_format($float, 4) }}</span>
                </div>
            @endif
            
            @if($pattern !== null)
                <div class="flex items-center justify-between text-sm">
                    <span class="text-gray-600 dark:text-gray-400">Pattern:</span>
                    <span class="font-mono font-semibold text-gray-900 dark:text-gray-100">#{{ $pattern }}</span>
                </div>
            @endif
            
            @if($stickerCount > 0)
                <div class="flex items-center justify-between text-sm">
                    <span class="text-gray-600 dark:text-gray-400">Stickers:</span>
                    <span class="font-semibold text-gray-900 dark:text-gray-100">{{ $stickerCount }} Applied</span>
                </div>
            @endif
        </div>
        
        <!-- Price -->
        @if($price !== null)
            <div class="pt-4 border-t border-gray-200 dark:border-gray-700">
                <div class="flex items-center justify-between">
                    <span class="text-sm text-gray-600 dark:text-gray-400">Price:</span>
                    <span class="text-xl font-bold text-gray-900 dark:text-gray-100">${{ number_format($price, 2) }}</span>
                </div>
            </div>
        @endif
        
        <!-- Action Slot -->
        @if(isset($actions))
            <div class="mt-4 pt-4 border-t border-gray-200 dark:border-gray-700">
                {{ $actions }}
            </div>
        @endif
    </div>
</div>

