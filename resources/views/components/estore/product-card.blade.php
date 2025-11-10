@props([
    'id' => null,
    'name' => '',
    'price' => 0,
    'originalPrice' => null,
    'image' => null,
    'badge' => null, // 'new', 'sale', 'hot', 'out-of-stock'
    'rating' => null,
    'reviews' => null,
    'variant' => 'default',
    'hover' => true,
    'href' => '#',
])

@php
    $baseClasses = match($variant) {
        'gradient' => 'bg-gradient-to-br from-white via-gray-50/50 to-gray-100/50 dark:from-gray-800 dark:via-gray-800/90 dark:to-gray-900',
        'glass' => 'bg-white/90 dark:bg-gray-800/90 backdrop-blur-xl border border-white/30 dark:border-gray-700/40',
        default => 'bg-white dark:bg-gray-800',
    };
    
    $shadowClasses = match($variant) {
        'gradient' => 'shadow-lg shadow-gray-200/40 dark:shadow-gray-900/60',
        'glass' => 'shadow-xl shadow-gray-200/30 dark:shadow-gray-900/40',
        default => 'shadow-md shadow-gray-200/30 dark:shadow-gray-900/50',
    };
    
    $hoverShadowClasses = $hover ? ' hover:shadow-xl hover:shadow-gray-300/50 dark:hover:shadow-gray-900/70 hover:-translate-y-1 transition-all duration-300 ease-out' : 'transition-all duration-300 ease-out';
    $cardClasses = $baseClasses . ' overflow-hidden rounded-xl border border-gray-200/60 dark:border-gray-700/60 ' . $shadowClasses . ' ' . $hoverShadowClasses;
    
    $badgeClasses = match($badge) {
        'new' => 'bg-emerald-500 text-white',
        'sale' => 'bg-red-500 text-white',
        'hot' => 'bg-orange-500 text-white',
        'out-of-stock' => 'bg-gray-500 text-white',
        default => '',
    };
    
    $badgeText = match($badge) {
        'new' => 'NEW',
        'sale' => 'SALE',
        'hot' => 'HOT',
        'out-of-stock' => 'OUT OF STOCK',
        default => '',
    };
    
    $isOnSale = $originalPrice && $originalPrice > $price;
    $discountPercent = $isOnSale ? round((($originalPrice - $price) / $originalPrice) * 100) : null;
@endphp

<a href="{{ $href }}" {{ $attributes->merge(['class' => $cardClasses . ' block group']) }}>
    <!-- Image Container -->
    <div class="relative aspect-square overflow-hidden bg-gray-100 dark:bg-gray-700">
        @if($image)
            <img src="{{ $image }}" alt="{{ $name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
        @else
            <div class="w-full h-full bg-gray-200 dark:bg-gray-600 flex items-center justify-center">
                <svg class="w-16 h-16 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
            </div>
        @endif
        
        <!-- Badge -->
        @if($badge && $badge !== 'out-of-stock')
            <div class="absolute top-3 left-3">
                <span class="px-2.5 py-1 text-xs font-bold rounded-lg {{ $badgeClasses }} shadow-lg">
                    {{ $badgeText }}
                </span>
            </div>
        @endif
        
        <!-- Discount Badge -->
        @if($isOnSale && $discountPercent)
            <div class="absolute top-3 right-3">
                <span class="px-2.5 py-1 text-xs font-bold rounded-lg bg-red-500 text-white shadow-lg">
                    -{{ $discountPercent }}%
                </span>
            </div>
        @endif
        
        <!-- Out of Stock Overlay -->
        @if($badge === 'out-of-stock')
            <div class="absolute inset-0 bg-black/50 flex items-center justify-center">
                <span class="px-4 py-2 text-sm font-bold rounded-lg bg-gray-800 text-white">
                    OUT OF STOCK
                </span>
            </div>
        @endif
        
        <!-- Quick View Button (on hover) -->
        <div class="absolute inset-0 bg-black/0 group-hover:bg-black/20 transition-colors duration-300 flex items-center justify-center opacity-0 group-hover:opacity-100">
            <span class="px-4 py-2 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 rounded-lg font-medium text-sm shadow-lg">
                Quick View
            </span>
        </div>
    </div>
    
    <!-- Content -->
    <div class="p-4">
        <!-- Product Name -->
        <h3 class="text-sm font-semibold text-gray-900 dark:text-gray-100 mb-2 line-clamp-2 group-hover:text-dodger-blue-600 dark:group-hover:text-dodger-blue-400 transition-colors">
            {{ $name }}
        </h3>
        
        <!-- Rating -->
        @if($rating !== null)
            <div class="flex items-center gap-2 mb-2">
                <div class="flex items-center">
                    @for($i = 1; $i <= 5; $i++)
                        @if($i <= floor($rating))
                            <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                        @elseif($i - 0.5 <= $rating)
                            <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <defs>
                                    <linearGradient id="half-{{ $id }}-{{ $i }}">
                                        <stop offset="50%" stop-color="currentColor" />
                                        <stop offset="50%" stop-color="transparent" stop-opacity="1" />
                                    </linearGradient>
                                </defs>
                                <path fill="url(#half-{{ $id }}-{{ $i }})" d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                        @else
                            <svg class="w-4 h-4 text-gray-300 dark:text-gray-600" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                        @endif
                    @endfor
                </div>
                @if($reviews !== null)
                    <span class="text-xs text-gray-500 dark:text-gray-400">({{ $reviews }})</span>
                @endif
            </div>
        @endif
        
        <!-- Price -->
        <div class="flex items-center gap-2">
            <span class="text-lg font-bold text-gray-900 dark:text-gray-100">
                ${{ number_format($price, 2) }}
            </span>
            @if($isOnSale)
                <span class="text-sm text-gray-500 dark:text-gray-400 line-through">
                    ${{ number_format($originalPrice, 2) }}
                </span>
            @endif
        </div>
    </div>
</a>

