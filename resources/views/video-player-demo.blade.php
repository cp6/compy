<x-app-layout>
    <x-slot name="title">Video Player Demo</x-slot>
    <x-slot name="metaDescription">Explore modern video player components with controls, playlists, and various player configurations</x-slot>

    <x-slot name="header">
        <x-breadcrumb :items="[
            ['label' => 'Home', 'url' => route('dashboard')],
            ['label' => 'Video Player', 'url' => '#'],
            ['label' => 'Demo'],
        ]" />
    </x-slot>

    <x-slot name="pageTitle">
        Video Player Demo
    </x-slot>

    <x-slot name="pageSubtitle">
        Modern video player components with custom controls, playlists, and playback features
    </x-slot>

    <x-alert.alerts />
    
    <div class="space-y-8">
        <!-- Basic Video Player -->
        <x-card.card variant="gradient" title="Basic Video Player">
            <p class="mb-6 text-gray-600 dark:text-gray-400">
                A fully-featured video player with custom controls including play/pause, volume control, progress bar, and fullscreen support.
            </p>
            
            <x-video.player 
                src="https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4"
                poster="https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/images/BigBuckBunny.jpg"
                :controls="true"
                preload="metadata"
            />
        </x-card>

        <!-- Video Player with Playlist -->
        <x-card.card variant="gradient" title="Video Player with Playlist">
            <p class="mb-6 text-gray-600 dark:text-gray-400">
                A video player with an integrated playlist sidebar. Click on any video in the playlist to switch playback.
            </p>
            
            <div 
                x-data="{
                    currentVideo: {
                        src: 'https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4',
                        poster: 'https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/images/BigBuckBunny.jpg',
                        title: 'Big Buck Bunny',
                        author: 'Blender Foundation',
                        views: 1250000,
                        likes: 45200,
                        duration: '9:56',
                        uploaded: '2 weeks ago',
                        fileSize: '125 MB',
                        description: 'Big Buck Bunny is a short animated film by the Blender Foundation. It features three main characters: a rabbit, a rat, and a flying squirrel.',
                        tags: ['Sample', 'Demo', 'Video Player', 'Component']
                    },
                    currentIndex: 0,
                    videoKey: 0,
                    videos: [
                        {
                            src: 'https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4',
                            poster: 'https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/images/BigBuckBunny.jpg',
                            title: 'Big Buck Bunny',
                            author: 'Blender Foundation',
                            duration: '9:56',
                            views: 1250000,
                            likes: 45200,
                            uploaded: '2 weeks ago',
                            fileSize: '125 MB',
                            description: 'Big Buck Bunny is a short animated film by the Blender Foundation. It features three main characters: a rabbit, a rat, and a flying squirrel.',
                            thumbnail: 'https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/images/BigBuckBunny.jpg',
                            tags: ['Sample', 'Animation', 'Open Movie']
                        },
                        {
                            src: 'https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ElephantsDream.mp4',
                            poster: 'https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/images/ElephantsDream.jpg',
                            title: 'Elephants Dream',
                            author: 'Blender Foundation',
                            duration: '10:53',
                            views: 890000,
                            likes: 32100,
                            uploaded: '1 month ago',
                            fileSize: '142 MB',
                            description: 'Elephants Dream is the world\'s first open movie, made entirely with open source graphics software such as Blender.',
                            thumbnail: 'https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/images/ElephantsDream.jpg',
                            tags: ['Open Movie', 'CGI']
                        },
                        {
                            src: 'https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerBlazes.mp4',
                            poster: 'https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/images/ForBiggerBlazes.jpg',
                            title: 'For Bigger Blazes',
                            author: 'Google',
                            duration: '0:15',
                            views: 450000,
                            likes: 8900,
                            uploaded: '3 days ago',
                            fileSize: '8.5 MB',
                            description: 'A short promotional video showcasing high-quality video playback capabilities.',
                            thumbnail: 'https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/images/ForBiggerBlazes.jpg',
                            tags: ['Promo', 'Short']
                        },
                        {
                            src: 'https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerEscapes.mp4',
                            poster: 'https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/images/ForBiggerEscapes.jpg',
                            title: 'For Bigger Escapes',
                            author: 'Google',
                            duration: '0:15',
                            views: 320000,
                            likes: 6400,
                            uploaded: '1 week ago',
                            fileSize: '7.2 MB',
                            description: 'A brief demonstration video highlighting video streaming and playback features.',
                            thumbnail: 'https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/images/ForBiggerEscapes.jpg',
                            tags: ['Demo', 'Short']
                        },
                        {
                            src: 'https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerFun.mp4',
                            poster: 'https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/images/ForBiggerFun.jpg',
                            title: 'For Bigger Fun',
                            author: 'Google',
                            duration: '0:15',
                            views: 280000,
                            likes: 5200,
                            uploaded: '5 days ago',
                            fileSize: '6.8 MB',
                            description: 'An entertaining short video clip perfect for testing video player functionality.',
                            thumbnail: 'https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/images/ForBiggerFun.jpg',
                            tags: ['Fun', 'Short']
                        }
                    ],
                    init() {
                        this.$watch('currentVideo', () => {
                            // Force video player to reload when video changes
                            this.videoKey++;
                        });
                    },
                    selectVideo(video, index) {
                        this.currentVideo = video;
                        this.currentIndex = index;
                        this.videoKey++;
                    }
                }"
                class="grid grid-cols-1 lg:grid-cols-3 gap-6"
            >
                <!-- Main Player -->
                <div class="lg:col-span-2">
                    <div x-show="currentVideo" x-transition>
                        <div x-bind:key="videoKey" class="relative bg-black rounded-lg overflow-hidden">
                            <video
                                x-bind:src="currentVideo.src"
                                x-bind:poster="currentVideo.poster"
                                controls
                                preload="metadata"
                                class="w-full"
                                x-on:loadstart="if ($el) $el.load()"
                            ></video>
                        </div>
                    </div>
                    
                    <!-- Video Info -->
                    <div class="mt-4">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100" x-text="currentVideo.title"></h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mt-1" x-text="currentVideo.author"></p>
                    </div>
                    
                    <!-- Video Stats (clean, icon-less) -->
                    <div class="mt-6 grid grid-cols-2 md:grid-cols-4 gap-4">
                        <div class="rounded-lg p-4 border border-gray-200/70 dark:border-gray-700/70 bg-white/70 dark:bg-gray-800/60">
                            <p class="text-[11px] uppercase tracking-wider text-gray-500 dark:text-gray-400">Views</p>
                            <p class="mt-1 text-xl font-semibold text-gray-900 dark:text-gray-100" x-text="currentVideo.views ? currentVideo.views.toLocaleString() : '1,200,000'"></p>
                        </div>
                        <div class="rounded-lg p-4 border border-gray-200/70 dark:border-gray-700/70 bg-white/70 dark:bg-gray-800/60">
                            <p class="text-[11px] uppercase tracking-wider text-gray-500 dark:text-gray-400">Likes</p>
                            <p class="mt-1 text-xl font-semibold text-gray-900 dark:text-gray-100" x-text="currentVideo.likes ? currentVideo.likes.toLocaleString() : '45,200'"></p>
                        </div>
                        <div class="rounded-lg p-4 border border-gray-200/70 dark:border-gray-700/70 bg-white/70 dark:bg-gray-800/60">
                            <p class="text-[11px] uppercase tracking-wider text-gray-500 dark:text-gray-400">Duration</p>
                            <p class="mt-1 text-xl font-semibold text-gray-900 dark:text-gray-100" x-text="currentVideo.duration || '9:56'"></p>
                        </div>
                        <div class="rounded-lg p-4 border border-gray-200/70 dark:border-gray-700/70 bg-white/70 dark:bg-gray-800/60">
                            <p class="text-[11px] uppercase tracking-wider text-gray-500 dark:text-gray-400">Quality</p>
                            <p class="mt-1 text-xl font-semibold text-gray-900 dark:text-gray-100">1080p</p>
                        </div>
                    </div>
                    
                    <!-- Video Description & Details -->
                    <div class="mt-6 rounded-xl border border-gray-200/60 dark:border-gray-700/60 bg-white/70 dark:bg-gray-800/60">
                        <div class="px-5 py-4 border-b border-gray-200/60 dark:border-gray-700/60">
                            <h4 class="text-sm font-semibold tracking-tight text-gray-900 dark:text-gray-100">Video Details</h4>
                        </div>
                        <div class="p-5 sm:p-6">
                            <div class="md:flex md:items-start md:justify-between md:gap-8">
                                <!-- Description -->
                                <div class="md:w-2/3">
                                    <p class="text-xs font-medium text-gray-600 dark:text-gray-400 mb-2">Description</p>
                                    <p class="text-sm leading-relaxed text-gray-900 dark:text-gray-100" x-text="currentVideo.description || 'A sample video demonstration showcasing the video player component with custom controls and features.'"></p>
                                </div>
                                
                                <!-- Quick Meta -->
                                <div class="mt-6 md:mt-0 md:w-1/3">
                                    <dl class="grid grid-cols-2 gap-x-4 gap-y-3">
                                        <div>
                                            <dt class="text-[11px] uppercase tracking-wide text-gray-500 dark:text-gray-400">Uploaded</dt>
                                            <dd class="mt-0.5 text-sm font-medium text-gray-900 dark:text-gray-100" x-text="currentVideo.uploaded || '2 weeks ago'"></dd>
                                        </div>
                                        <div>
                                            <dt class="text-[11px] uppercase tracking-wide text-gray-500 dark:text-gray-400">File Size</dt>
                                            <dd class="mt-0.5 text-sm font-medium text-gray-900 dark:text-gray-100" x-text="currentVideo.fileSize || '125 MB'"></dd>
                                        </div>
                                        <div>
                                            <dt class="text-[11px] uppercase tracking-wide text-gray-500 dark:text-gray-400">Format</dt>
                                            <dd class="mt-0.5 text-sm font-medium text-gray-900 dark:text-gray-100">MP4</dd>
                                        </div>
                                        <div>
                                            <dt class="text-[11px] uppercase tracking-wide text-gray-500 dark:text-gray-400">Quality</dt>
                                            <dd class="mt-0.5 text-sm font-medium text-gray-900 dark:text-gray-100">1080p</dd>
                                        </div>
                                    </dl>
                                </div>
                            </div>

                            <!-- Technical Specs -->
                            <div class="mt-6">
                                <div class="text-xs font-medium text-gray-600 dark:text-gray-400 mb-2">Technical Specs</div>
                                <dl class="grid grid-cols-2 md:grid-cols-4 gap-4 p-4 rounded-lg bg-gray-50/70 dark:bg-gray-900/30 border border-gray-200/60 dark:border-gray-700/60">
                                    <div>
                                        <dt class="text-[11px] uppercase tracking-wide text-gray-500 dark:text-gray-400">Resolution</dt>
                                        <dd class="mt-0.5 text-sm font-medium text-gray-900 dark:text-gray-100">1920x1080</dd>
                                    </div>
                                    <div>
                                        <dt class="text-[11px] uppercase tracking-wide text-gray-500 dark:text-gray-400">Frame Rate</dt>
                                        <dd class="mt-0.5 text-sm font-medium text-gray-900 dark:text-gray-100">30 fps</dd>
                                    </div>
                                    <div>
                                        <dt class="text-[11px] uppercase tracking-wide text-gray-500 dark:text-gray-400">Bitrate</dt>
                                        <dd class="mt-0.5 text-sm font-medium text-gray-900 dark:text-gray-100">5.2 Mbps</dd>
                                    </div>
                                    <div>
                                        <dt class="text-[11px] uppercase tracking-wide text-gray-500 dark:text-gray-400">Duration</dt>
                                        <dd class="mt-0.5 text-sm font-medium text-gray-900 dark:text-gray-100" x-text="currentVideo.duration || '9:56'"></dd>
                                    </div>
                                </dl>
                            </div>

                            <!-- Tags -->
                            <div class="mt-6">
                                <div class="text-xs font-medium text-gray-600 dark:text-gray-400 mb-2">Tags</div>
                                <div class="flex flex-wrap gap-2">
                                    <template x-for="(tag, i) in (currentVideo.tags ?? ['Sample','Demo','Video Player','Component'])" :key="i">
                                        <span class="inline-flex items-center px-2.5 py-1 text-xs font-medium rounded-full border border-gray-200/70 dark:border-gray-700/70 bg-white/70 dark:bg-gray-900/40 text-gray-700 dark:text-gray-200 hover:border-dodger-blue-400 dark:hover:border-dodger-blue-500 hover:text-dodger-blue-700 dark:hover:text-dodger-blue-300 transition-colors">
                                            <span x-text="tag"></span>
                                        </span>
                                    </template>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Playlist -->
                <div class="lg:col-span-1">
                    <div class="sticky top-4">
                        <h4 class="text-sm font-semibold text-gray-900 dark:text-gray-100 mb-3">Playlist</h4>
                        <div class="max-h-[600px] overflow-y-auto">
                            <template x-for="(video, index) in videos" :key="index">
                                <div 
                                    x-data="{ hover: false }"
                                    @click="selectVideo(video, index)"
                                    class="flex items-center gap-3 p-3 rounded-lg cursor-pointer transition-all duration-200 mb-2"
                                    :class="currentIndex === index ? 'bg-dodger-blue-50 dark:bg-dodger-blue-900/20 border border-dodger-blue-200 dark:border-dodger-blue-800' : 'bg-gray-50 dark:bg-gray-800/50 hover:bg-gray-100 dark:hover:bg-gray-800 border border-gray-200 dark:border-gray-700'"
                                    @mouseenter="hover = true"
                                    @mouseleave="hover = false"
                                >
                                    <!-- Thumbnail -->
                                    <div class="relative flex-shrink-0 w-24 h-16 rounded overflow-hidden bg-gray-200 dark:bg-gray-700">
                                        <img :src="video.thumbnail || video.poster" :alt="video.title" class="w-full h-full object-cover">
                                        
                                        <!-- Duration Badge -->
                                        <div x-show="video.duration" class="absolute bottom-1 right-1 px-1.5 py-0.5 bg-black/75 text-white text-xs rounded" x-text="video.duration"></div>
                                        
                                        <!-- Play Overlay -->
                                        <div 
                                            x-show="hover || currentIndex === index"
                                            x-transition
                                            class="absolute inset-0 bg-black/40 flex items-center justify-center"
                                        >
                                            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M8 5v14l11-7z"/>
                                            </svg>
                                        </div>
                                    </div>
                                    
                                    <!-- Video Info -->
                                    <div class="flex-1 min-w-0">
                                        <h4 class="text-sm font-semibold text-gray-900 dark:text-gray-100 truncate" x-text="video.title"></h4>
                                        <p x-show="video.author" class="text-xs text-gray-600 dark:text-gray-400 mt-0.5" x-text="video.author"></p>
                                        <p x-show="video.views" class="text-xs text-gray-500 dark:text-gray-500 mt-0.5" x-text="video.views.toLocaleString() + ' views'"></p>
                                    </div>
                                    
                                    <!-- Active Indicator -->
                                    <div 
                                        x-show="currentIndex === index"
                                        class="flex-shrink-0 w-2 h-2 rounded-full bg-dodger-blue-500"
                                    ></div>
                                </div>
                            </template>
                        </div>
                    </div>
                </div>
            </div>
        </x-card>

        <!-- Multiple Video Players -->
        <x-card.card variant="gradient" title="Multiple Video Players">
            <p class="mb-6 text-gray-600 dark:text-gray-400">
                Multiple video players displayed in a grid layout. Each player operates independently.
            </p>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <h4 class="text-sm font-semibold text-gray-900 dark:text-gray-100 mb-2">Sample Video 1</h4>
                    <x-video.player 
                        src="https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerBlazes.mp4"
                        poster="https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/images/ForBiggerBlazes.jpg"
                        :controls="true"
                        preload="metadata"
                    />
                </div>
                
                <div>
                    <h4 class="text-sm font-semibold text-gray-900 dark:text-gray-100 mb-2">Sample Video 2</h4>
                    <x-video.player 
                        src="https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerEscapes.mp4"
                        poster="https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/images/ForBiggerEscapes.jpg"
                        :controls="true"
                        preload="metadata"
                    />
                </div>
            </div>
        </x-card>

        <!-- Video Player Variants -->
        <x-card.card variant="gradient" title="Video Player Variants">
            <p class="mb-6 text-gray-600 dark:text-gray-400">
                Different video player configurations including autoplay, loop, and muted options.
            </p>
            
            <div class="space-y-6">
                <!-- Autoplay (Muted) -->
                <div>
                    <h4 class="text-sm font-semibold text-gray-900 dark:text-gray-100 mb-2">Autoplay (Muted)</h4>
                    <x-video.player 
                        src="https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerFun.mp4"
                        poster="https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/images/ForBiggerFun.jpg"
                        :autoplay="true"
                        :muted="true"
                        :controls="true"
                        preload="auto"
                    />
                </div>
                
                <!-- Looping Video -->
                <div>
                    <h4 class="text-sm font-semibold text-gray-900 dark:text-gray-100 mb-2">Looping Video</h4>
                    <x-video.player 
                        src="https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerBlazes.mp4"
                        poster="https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/images/ForBiggerBlazes.jpg"
                        :loop="true"
                        :controls="true"
                        preload="metadata"
                    />
                </div>
            </div>
        </x-card>

        <!-- Usage Examples -->
        <x-card.card variant="gradient" title="Usage Examples">
            <p class="mb-6 text-gray-600 dark:text-gray-400">
                Here are code examples showing how to use the video player components in your Blade templates.
            </p>
            
            <div class="bg-gray-50 dark:bg-gray-900/50 rounded-lg p-4 overflow-x-auto">
                <pre class="text-sm text-gray-800 dark:text-gray-200"><code>&lt;!-- Basic Video Player --&gt;
&lt;x-video.player 
    src="https://example.com/video.mp4"
    poster="https://example.com/poster.jpg"
    :controls="true"
    preload="metadata"
/&gt;

&lt;!-- Video Player with Autoplay (Muted) --&gt;
&lt;x-video.player 
    src="https://example.com/video.mp4"
    :autoplay="true"
    :muted="true"
    :controls="true"
    preload="auto"
/&gt;

&lt;!-- Looping Video Player --&gt;
&lt;x-video.player 
    src="https://example.com/video.mp4"
    :loop="true"
    :controls="true"
/&gt;

&lt;!-- Video Player with Custom Size --&gt;
&lt;x-video.player 
    src="https://example.com/video.mp4"
    width="800px"
    height="450px"
    :controls="true"
/&gt;

&lt;!-- Video Player with Playlist --&gt;
&lt;div x-data="{ currentVideo: {...}, videos: [...] }"&gt;
    &lt;x-video.player 
        :src="currentVideo.src"
        :poster="currentVideo.poster"
        :controls="true"
    /&gt;
    
    &lt;x-video.playlist 
        :videos="$videos"
        :currentIndex="0"
    /&gt;
&lt;/div&gt;

&lt;!-- Video Player Inside Card --&gt;
&lt;x-card.card variant="gradient" title="My Video"&gt;
    &lt;x-video.player 
        src="https://example.com/video.mp4"
        :controls="true"
    /&gt;
&lt;/x-card&gt;</code></pre>
            </div>
        </x-card>

        <!-- Features -->
        <x-card.card variant="gradient" title="Video Player Features">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="flex items-start gap-3">
                    <div class="flex-shrink-0 w-8 h-8 rounded-lg bg-dodger-blue-100 dark:bg-dodger-blue-900/30 flex items-center justify-center">
                        <svg class="w-5 h-5 text-dodger-blue-600 dark:text-dodger-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-900 dark:text-gray-100">Custom Controls</h4>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Play/pause, volume, progress bar, and fullscreen controls</p>
                    </div>
                </div>
                
                <div class="flex items-start gap-3">
                    <div class="flex-shrink-0 w-8 h-8 rounded-lg bg-dodger-blue-100 dark:bg-dodger-blue-900/30 flex items-center justify-center">
                        <svg class="w-5 h-5 text-dodger-blue-600 dark:text-dodger-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-900 dark:text-gray-100">Playlist Support</h4>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Integrated playlist component with thumbnail previews</p>
                    </div>
                </div>
                
                <div class="flex items-start gap-3">
                    <div class="flex-shrink-0 w-8 h-8 rounded-lg bg-dodger-blue-100 dark:bg-dodger-blue-900/30 flex items-center justify-center">
                        <svg class="w-5 h-5 text-dodger-blue-600 dark:text-dodger-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"/>
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-900 dark:text-gray-100">Fullscreen Mode</h4>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Native fullscreen support with cross-browser compatibility</p>
                    </div>
                </div>
                
                <div class="flex items-start gap-3">
                    <div class="flex-shrink-0 w-8 h-8 rounded-lg bg-dodger-blue-100 dark:bg-dodger-blue-900/30 flex items-center justify-center">
                        <svg class="w-5 h-5 text-dodger-blue-600 dark:text-dodger-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-900 dark:text-gray-100">Responsive Design</h4>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Fully responsive and mobile-friendly video players</p>
                    </div>
                </div>
                
                <div class="flex items-start gap-3">
                    <div class="flex-shrink-0 w-8 h-8 rounded-lg bg-dodger-blue-100 dark:bg-dodger-blue-900/30 flex items-center justify-center">
                        <svg class="w-5 h-5 text-dodger-blue-600 dark:text-dodger-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-900 dark:text-gray-100">Auto-hide Controls</h4>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Controls automatically hide during playback for immersive viewing</p>
                    </div>
                </div>
            </div>
        </x-card>
    </div>
</x-app-layout>

