@props(['class' => ''])

<div 
    x-data="{ 
        sidebarOpen: false,
        isMobile: window.innerWidth < 1024,
        searchQuery: '',
        init() {
            this.checkScreenSize();
            window.addEventListener('resize', () => {
                this.checkScreenSize();
            });
        },
        checkScreenSize() {
            const wasMobile = this.isMobile;
            this.isMobile = window.innerWidth < 1024;
            if (!this.isMobile) {
                this.sidebarOpen = true;
            } else if (wasMobile !== this.isMobile && this.isMobile) {
                this.sidebarOpen = false;
            }
        },
        toggleSidebar() {
            this.sidebarOpen = !this.sidebarOpen;
        },
        closeSidebar() {
            if (this.isMobile) {
                this.sidebarOpen = false;
            }
        },
        matchesSearch(text) {
            if (!this.searchQuery) return true;
            return text.toLowerCase().includes(this.searchQuery.toLowerCase());
        }
    }"
    x-ref="sidebar"
    @keydown.window.escape="closeSidebar()"
    class="lg:static"
>
    {{-- Mobile Toggle Button --}}
    <button
        @click="toggleSidebar()"
        class="fixed top-4 right-4 z-50 p-2 rounded-md text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-gray-700 lg:hidden focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-500 transition-all duration-200 bg-white dark:bg-gray-800 shadow-md"
        aria-label="Toggle sidebar"
        x-show="isMobile"
        style="display: none;"
    >
        <svg x-show="!sidebarOpen" class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="display: none;">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
        <svg x-show="sidebarOpen" class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="display: none;">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>

    {{-- Mobile Overlay --}}
    <div 
        x-show="sidebarOpen && isMobile"
        x-transition:enter="transition-opacity ease-linear duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition-opacity ease-linear duration-300"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        @click="closeSidebar()"
        class="fixed inset-0 bg-gray-600 bg-opacity-75 z-30 lg:hidden"
        style="display: none;"
    ></div>

    {{-- Sidebar --}}
    <aside 
        x-show="sidebarOpen || !isMobile"
        x-transition:enter="transition ease-in-out duration-300 transform"
        x-transition:enter-start="-translate-x-full"
        x-transition:enter-end="translate-x-0"
        x-transition:leave="transition ease-in-out duration-300 transform"
        x-transition:leave-start="translate-x-0"
        x-transition:leave-end="-translate-x-full"
        {{ $attributes->merge(['class' => 'fixed left-0 top-0 z-40 h-screen w-64 bg-white dark:bg-gray-800 border-r border-gray-200 dark:border-gray-700 flex flex-col lg:translate-x-0 ' . $class]) }}
        style="display: none;"
    >
        <div 
            class="flex-1 overflow-x-hidden py-4 px-2 transition-all duration-300"
            :class="$store.pageLoading.loading ? 'overflow-hidden' : 'overflow-y-auto'"
        >
            {{ $slot }}
        </div>
        
        @isset($footer)
            {{ $footer }}
        @endisset
    </aside>
</div>
