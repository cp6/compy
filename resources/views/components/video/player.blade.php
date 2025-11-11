@props([
    'src' => '',
    'poster' => null,
    'autoplay' => false,
    'controls' => true,
    'loop' => false,
    'muted' => false,
    'preload' => 'metadata', // 'none', 'metadata', 'auto'
    'width' => '100%',
    'height' => 'auto',
    'class' => '',
])

@php
    $playerId = 'video-player-' . uniqid();
@endphp

<div 
    x-data="{
        playing: false,
        currentTime: 0,
        duration: 0,
        volume: 1,
        muted: {{ $muted ? 'true' : 'false' }},
        fullscreen: false,
        buffered: 0,
        showControls: true,
        controlsTimeout: null,
        
        init() {
            const video = this.$refs.video;
            
            video.addEventListener('loadedmetadata', () => {
                this.duration = video.duration;
            });
            
            video.addEventListener('timeupdate', () => {
                this.currentTime = video.currentTime;
                this.updateBuffered();
            });
            
            video.addEventListener('play', () => {
                this.playing = true;
            });
            
            video.addEventListener('pause', () => {
                this.playing = false;
            });
            
            video.addEventListener('volumechange', () => {
                this.volume = video.volume;
                this.muted = video.muted;
            });
            
            video.addEventListener('ended', () => {
                this.playing = false;
            });
            
            // Auto-hide controls
            this.$refs.playerContainer.addEventListener('mousemove', () => {
                this.showControls = true;
                clearTimeout(this.controlsTimeout);
                this.controlsTimeout = setTimeout(() => {
                    if (this.playing) {
                        this.showControls = false;
                    }
                }, 3000);
            });
            
            this.$refs.playerContainer.addEventListener('mouseleave', () => {
                if (this.playing) {
                    this.showControls = false;
                }
            });
        },
        
        togglePlay() {
            const video = this.$refs.video;
            if (this.playing) {
                video.pause();
            } else {
                video.play();
            }
        },
        
        seek(event) {
            const video = this.$refs.video;
            const rect = event.currentTarget.getBoundingClientRect();
            const percent = (event.clientX - rect.left) / rect.width;
            video.currentTime = percent * this.duration;
        },
        
        setVolume(event) {
            const video = this.$refs.video;
            const rect = event.currentTarget.getBoundingClientRect();
            const percent = (event.clientX - rect.left) / rect.width;
            video.volume = Math.max(0, Math.min(1, percent));
            video.muted = false;
        },
        
        toggleMute() {
            const video = this.$refs.video;
            video.muted = !video.muted;
        },
        
        toggleFullscreen() {
            const container = this.$refs.playerContainer;
            if (!this.fullscreen) {
                if (container.requestFullscreen) {
                    container.requestFullscreen();
                } else if (container.webkitRequestFullscreen) {
                    container.webkitRequestFullscreen();
                } else if (container.msRequestFullscreen) {
                    container.msRequestFullscreen();
                }
            } else {
                if (document.exitFullscreen) {
                    document.exitFullscreen();
                } else if (document.webkitExitFullscreen) {
                    document.webkitExitFullscreen();
                } else if (document.msExitFullscreen) {
                    document.msExitFullscreen();
                }
            }
        },
        
        updateBuffered() {
            const video = this.$refs.video;
            if (video.buffered.length > 0) {
                this.buffered = (video.buffered.end(video.buffered.length - 1) / this.duration) * 100;
            }
        },
        
        formatTime(seconds) {
            if (!seconds || isNaN(seconds)) return '0:00';
            const h = Math.floor(seconds / 3600);
            const m = Math.floor((seconds % 3600) / 60);
            const s = Math.floor(seconds % 60);
            if (h > 0) {
                return `${h}:${m.toString().padStart(2, '0')}:${s.toString().padStart(2, '0')}`;
            }
            return `${m}:${s.toString().padStart(2, '0')}`;
        }
    }"
    x-init="
        document.addEventListener('fullscreenchange', () => {
            fullscreen = !!document.fullscreenElement;
        });
        document.addEventListener('webkitfullscreenchange', () => {
            fullscreen = !!document.webkitFullscreenElement;
        });
        document.addEventListener('msfullscreenchange', () => {
            fullscreen = !!document.msFullscreenElement;
        });
    "
    class="relative bg-black rounded-lg overflow-hidden {{ $class }}"
    :class="{ 'cursor-none': !showControls && playing }"
    style="width: {{ $width }}; height: {{ $height === 'auto' ? 'auto' : $height }};"
    x-ref="playerContainer"
    id="{{ $playerId }}"
>
    <video
        x-ref="video"
        src="{{ $src }}"
        @if($poster) poster="{{ $poster }}" @endif
        @if($autoplay) autoplay @endif
        @if($loop) loop @endif
        @if($muted) muted @endif
        preload="{{ $preload }}"
        class="w-full h-full"
        @if(!$controls) controls="false" @endif
    ></video>
    
    @if($controls)
        <!-- Controls Overlay -->
        <div 
            x-show="showControls || !playing"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent flex flex-col justify-end"
        >
            <!-- Progress Bar -->
            <div class="px-4 pb-2">
                <div 
                    @click="seek($event)"
                    class="relative h-1 bg-gray-700/50 rounded-full cursor-pointer group"
                >
                    <!-- Buffered Progress -->
                    <div 
                        class="absolute top-0 left-0 h-full bg-gray-600/50 rounded-full transition-all duration-300"
                        :style="`width: ${buffered}%`"
                    ></div>
                    
                    <!-- Current Progress -->
                    <div 
                        class="absolute top-0 left-0 h-full bg-dodger-blue-500 rounded-full transition-all duration-300"
                        :style="`width: ${(currentTime / duration) * 100}%`"
                    ></div>
                    
                    <!-- Progress Handle -->
                    <div 
                        class="absolute top-1/2 -translate-y-1/2 w-3 h-3 bg-dodger-blue-500 rounded-full opacity-0 group-hover:opacity-100 transition-opacity"
                        :style="`left: ${(currentTime / duration) * 100}%`"
                    ></div>
                </div>
            </div>
            
            <!-- Control Buttons -->
            <div class="px-4 pb-4 flex items-center justify-between gap-4">
                <div class="flex items-center gap-3">
                    <!-- Play/Pause Button -->
                    <button 
                        @click="togglePlay()"
                        class="flex-shrink-0 w-10 h-10 flex items-center justify-center rounded-full bg-white/10 hover:bg-white/20 backdrop-blur-sm transition-colors"
                    >
                        <svg x-show="!playing" class="w-5 h-5 text-white ml-0.5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M8 5v14l11-7z"/>
                        </svg>
                        <svg x-show="playing" class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M6 4h4v16H6V4zm8 0h4v16h-4V4z"/>
                        </svg>
                    </button>
                    
                    <!-- Volume Control -->
                    <div class="flex items-center gap-2">
                        <button 
                            @click="toggleMute()"
                            class="w-8 h-8 flex items-center justify-center rounded-full hover:bg-white/10 transition-colors"
                        >
                            <svg x-show="!muted && volume > 0" class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M3 9v6h4l5 5V4L7 9H3zm13.5 3c0-1.77-1.02-3.29-2.5-4.03v8.05c1.48-.73 2.5-2.25 2.5-4.02zM14 3.23v2.06c2.89.86 5 3.54 5 6.71s-2.11 5.85-5 6.71v2.06c4.01-.91 7-4.49 7-8.77s-2.99-7.86-7-8.77z"/>
                            </svg>
                            <svg x-show="muted || volume === 0" class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M16.5 12c0-1.77-1.02-3.29-2.5-4.03v2.21l2.45 2.45c.03-.2.05-.41.05-.63zm2.5 0c0 .94-.2 1.82-.54 2.64l1.51 1.51C20.63 14.91 21 13.5 21 12c0-4.28-2.99-7.86-7-8.77v2.06c2.89.86 5 3.54 5 6.71zM4.27 3L3 4.27 7.73 9H3v6h4l5 5v-6.73l4.25 4.25c-.67.52-1.42.93-2.25 1.18v2.06c1.38-.31 2.63-.95 3.69-1.81L19.73 21 21 19.73l-9-9L4.27 3zM12 4L9.91 6.09 12 8.18V4z"/>
                            </svg>
                        </button>
                        
                        <div 
                            @click="setVolume($event)"
                            class="hidden sm:flex relative w-20 h-1 bg-gray-700/50 rounded-full cursor-pointer group"
                        >
                            <div 
                                class="absolute top-0 left-0 h-full bg-white rounded-full transition-all duration-300"
                                :style="`width: ${muted ? 0 : volume * 100}%`"
                            ></div>
                            <div 
                                class="absolute top-1/2 -translate-y-1/2 w-3 h-3 bg-white rounded-full opacity-0 group-hover:opacity-100 transition-opacity"
                                :style="`left: ${muted ? 0 : volume * 100}%`"
                            ></div>
                        </div>
                    </div>
                    
                    <!-- Time Display -->
                    <div class="text-white text-sm font-mono">
                        <span x-text="formatTime(currentTime)"></span> / <span x-text="formatTime(duration)"></span>
                    </div>
                </div>
                
                <!-- Right Controls -->
                <div class="flex items-center gap-2">
                    <!-- Fullscreen Button -->
                    <button 
                        @click="toggleFullscreen()"
                        class="w-8 h-8 flex items-center justify-center rounded-full hover:bg-white/10 transition-colors"
                    >
                        <svg x-show="!fullscreen" class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"/>
                        </svg>
                        <svg x-show="fullscreen" class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    @endif
    
    <!-- Play Button Overlay (when paused) -->
    <div 
        x-show="!playing && showControls"
        @click="togglePlay()"
        class="absolute inset-0 flex items-center justify-center cursor-pointer"
    >
        <div class="w-20 h-20 rounded-full bg-black/50 backdrop-blur-sm flex items-center justify-center hover:bg-black/70 transition-colors">
            <svg class="w-10 h-10 text-white ml-1" fill="currentColor" viewBox="0 0 24 24">
                <path d="M8 5v14l11-7z"/>
            </svg>
        </div>
    </div>
</div>

