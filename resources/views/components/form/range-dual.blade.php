@props([
    'label' => null,
    'name' => null,
    'minValue' => null,
    'maxValue' => null,
    'min' => 0,
    'max' => 100,
    'step' => 1,
    'required' => false,
    'disabled' => false,
    'error' => null,
    'help' => null,
])

@php
    $hasError = $error || (isset($errors) && $errors->has($name . '_min')) || (isset($errors) && $errors->has($name . '_max'));
    $errorMessages = $error ?? [];
    $initialMin = old($name . '_min', $minValue ?? $min);
    $initialMax = old($name . '_max', $maxValue ?? $max);
    $uniqueId = uniqid('range_');
@endphp

<div class="space-y-2" x-data="{
    minValue: {{ $initialMin }},
    maxValue: {{ $initialMax }},
    min: {{ $min }},
    max: {{ $max }},
    step: {{ $step }},
    dragging: null,
    trackWidth: 0,
    trackLeft: 0,
    
    init() {
        this.$nextTick(() => {
            const track = this.$refs.track;
            if (track) {
                this.trackWidth = track.offsetWidth;
                this.trackLeft = track.getBoundingClientRect().left;
            }
        });
    },
    
    get minPercent() {
        return ((this.minValue - this.min) / (this.max - this.min)) * 100;
    },
    
    get maxPercent() {
        return ((this.maxValue - this.min) / (this.max - this.min)) * 100;
    },
    
    updateMin(value) {
        const numValue = parseFloat(value);
        if (numValue < this.min) {
            this.minValue = this.min;
        } else if (numValue > this.maxValue) {
            this.minValue = this.maxValue;
        } else {
            this.minValue = Math.round(numValue / this.step) * this.step;
        }
    },
    
    updateMax(value) {
        const numValue = parseFloat(value);
        if (numValue > this.max) {
            this.maxValue = this.max;
        } else if (numValue < this.minValue) {
            this.maxValue = this.minValue;
        } else {
            this.maxValue = Math.round(numValue / this.step) * this.step;
        }
    },
    
    handleMinInput(event) {
        this.updateMin(event.target.value);
    },
    
    handleMaxInput(event) {
        this.updateMax(event.target.value);
    },
    
    handleMinRange(event) {
        const value = parseFloat(event.target.value);
        if (value <= this.maxValue) {
            this.minValue = value;
        } else {
            this.minValue = this.maxValue;
        }
    },
    
    handleMaxRange(event) {
        const value = parseFloat(event.target.value);
        if (value >= this.minValue) {
            this.maxValue = value;
        } else {
            this.maxValue = this.minValue;
        }
    }
}">
    @if($label)
        <x-form.label :for="$uniqueId" :value="$label" />
    @endif

    <div class="relative">
        <!-- Slider Track Container -->
        <div 
            x-ref="track"
            id="{{ $uniqueId }}_track"
            class="relative h-2 rounded-lg {{ $hasError ? 'bg-red-200 dark:bg-red-900/30' : 'bg-gray-200 dark:bg-gray-700' }}"
        >
            <!-- Active Range -->
            <div 
                class="absolute h-2 rounded-lg {{ $hasError ? 'bg-red-500 dark:bg-red-500' : 'bg-emerald-500 dark:bg-emerald-500' }}"
                :style="'left: ' + minPercent + '%; width: ' + (maxPercent - minPercent) + '%'"
            ></div>
            
            <!-- Min Handle Input -->
            <div class="absolute inset-0">
                <input
                    type="range"
                    :min="min"
                    :max="max"
                    :step="step"
                    x-model.number="minValue"
                    @input="handleMinRange($event)"
                    @if($required) required @endif
                    @if($disabled) disabled @endif
                    class="absolute w-full h-2 opacity-0 cursor-pointer z-10"
                    style="pointer-events: auto;"
                />
            </div>
            
            <!-- Max Handle Input -->
            <div class="absolute inset-0">
                <input
                    type="range"
                    :min="min"
                    :max="max"
                    :step="step"
                    x-model.number="maxValue"
                    @input="handleMaxRange($event)"
                    @if($required) required @endif
                    @if($disabled) disabled @endif
                    class="absolute w-full h-2 opacity-0 cursor-pointer z-20"
                    style="pointer-events: auto;"
                />
            </div>
            
            <!-- Min Handle Visual -->
            <div 
                class="absolute top-1/2 -translate-y-1/2 w-5 h-5 rounded-full border-2 {{ $hasError ? 'border-red-500 dark:border-red-500 bg-white dark:bg-gray-800' : 'border-emerald-500 dark:border-emerald-500 bg-white dark:bg-gray-800' }} shadow-lg transition-all duration-200 hover:scale-110 z-30 pointer-events-none"
                :style="'left: calc(' + minPercent + '% - 10px)'"
            ></div>
            
            <!-- Max Handle Visual -->
            <div 
                class="absolute top-1/2 -translate-y-1/2 w-5 h-5 rounded-full border-2 {{ $hasError ? 'border-red-500 dark:border-red-500 bg-white dark:bg-gray-800' : 'border-emerald-500 dark:border-emerald-500 bg-white dark:bg-gray-800' }} shadow-lg transition-all duration-200 hover:scale-110 z-30 pointer-events-none"
                :style="'left: calc(' + maxPercent + '% - 10px)'"
            ></div>
        </div>
        
        <!-- Value Display -->
        <div class="flex items-center justify-between mt-3">
            <div class="flex items-center gap-2">
                <span class="text-xs sm:text-sm text-gray-600 dark:text-gray-400 font-medium">Min:</span>
                <input
                    type="number"
                    name="{{ $name }}_min"
                    x-model.number="minValue"
                    @input="updateMin($event.target.value)"
                    :min="min"
                    :max="max"
                    :step="step"
                    @if($required) required @endif
                    @if($disabled) disabled @endif
                    class="w-20 px-2 py-1.5 rounded-lg border text-sm text-center font-medium transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-offset-0 {{ $hasError ? 'border-red-500 dark:border-red-500 bg-red-50 dark:bg-red-900/20 text-gray-900 dark:text-gray-100 focus:ring-red-500 dark:focus:ring-red-400' : 'border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:border-emerald-500 dark:focus:border-emerald-400 focus:ring-emerald-500 dark:focus:ring-emerald-400' }}"
                />
            </div>
            
            <div class="flex items-center gap-2">
                <span class="text-xs sm:text-sm text-gray-600 dark:text-gray-400 font-medium">Max:</span>
                <input
                    type="number"
                    name="{{ $name }}_max"
                    x-model.number="maxValue"
                    @input="updateMax($event.target.value)"
                    :min="min"
                    :max="max"
                    :step="step"
                    @if($required) required @endif
                    @if($disabled) disabled @endif
                    class="w-20 px-2 py-1.5 rounded-lg border text-sm text-center font-medium transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-offset-0 {{ $hasError ? 'border-red-500 dark:border-red-500 bg-red-50 dark:bg-red-900/20 text-gray-900 dark:text-gray-100 focus:ring-red-500 dark:focus:ring-red-400' : 'border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:border-emerald-500 dark:focus:border-emerald-400 focus:ring-emerald-500 dark:focus:ring-emerald-400' }}"
                />
            </div>
        </div>
    </div>

    @if($help && !$hasError)
        <p class="text-sm text-gray-500 dark:text-gray-400">{{ $help }}</p>
    @endif

    @if($hasError)
        <x-form.error :messages="$errorMessages" />
    @endif
</div>

<style>
    #{{ $uniqueId }}_track input[type="range"] {
        -webkit-appearance: none;
        appearance: none;
        background: transparent;
    }
    
    #{{ $uniqueId }}_track input[type="range"]::-webkit-slider-thumb {
        -webkit-appearance: none;
        appearance: none;
        width: 20px;
        height: 20px;
        border-radius: 50%;
        cursor: pointer;
        background: transparent;
    }
    
    #{{ $uniqueId }}_track input[type="range"]::-moz-range-thumb {
        width: 20px;
        height: 20px;
        border-radius: 50%;
        cursor: pointer;
        border: none;
        background: transparent;
    }
    
    #{{ $uniqueId }}_track input[type="range"]::-webkit-slider-runnable-track {
        background: transparent;
    }
    
    #{{ $uniqueId }}_track input[type="range"]::-moz-range-track {
        background: transparent;
    }
</style>
