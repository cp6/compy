@props([])

<div class="mt-auto pt-6 border-t border-gray-200 dark:border-gray-700 px-3 pb-4 bg-gray-50/50 dark:bg-gray-800/50">
    <div class="flex items-center justify-between gap-2">
        @auth
            {{-- User Profile Icon --}}
            <a 
                href="{{ route('profile.edit') }}"
                class="inline-flex items-center justify-center px-3 py-2 border border-gray-200 dark:border-gray-700 text-sm leading-4 font-medium rounded-lg text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 hover:text-gray-900 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-dodger-blue-500 transition-all duration-200 shadow-sm hover:shadow"
                aria-label="Profile"
            >
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
            </a>
            
            {{-- Logout Button --}}
            <form method="POST" action="{{ route('logout') }}" class="flex-1">
                @csrf
                <button 
                    type="submit"
                    class="w-full inline-flex items-center justify-center px-3 py-2 border border-gray-200 dark:border-gray-700 text-sm leading-4 font-medium rounded-lg text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 hover:text-gray-900 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-dodger-blue-500 transition-all duration-200 shadow-sm hover:shadow"
                    aria-label="Log out"
                >
                    {{ __('Log Out') }}
                </button>
            </form>
        @else
            {{-- Login Button --}}
            <a 
                href="{{ route('login') }}"
                class="flex-1 inline-flex items-center justify-center px-3 py-2 border border-gray-200 dark:border-gray-700 text-sm leading-4 font-medium rounded-lg text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 hover:text-gray-900 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-dodger-blue-500 transition-all duration-200 shadow-sm hover:shadow"
                aria-label="Log in"
            >
                {{ __('Log In') }}
            </a>
        @endauth
        
        {{-- Theme Toggle Button --}}
        <button 
            id="theme-toggle-sidebar" 
            class="inline-flex items-center px-3 py-2 border border-gray-200 dark:border-gray-700 text-sm leading-4 font-medium rounded-lg text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-dodger-blue-500 transition-all duration-200 shadow-sm hover:shadow"
            aria-label="Toggle theme"
        >
            <svg id="theme-toggle-light-sidebar" class="hidden h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
            </svg>
            <svg id="theme-toggle-dark-sidebar" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>
            </svg>
        </button>
    </div>
</div>

<script>
(function() {
    function initSidebarThemeToggle() {
        const themeToggle = document.getElementById("theme-toggle-sidebar");
        const themeToggleLight = document.getElementById("theme-toggle-light-sidebar");
        const themeToggleDark = document.getElementById("theme-toggle-dark-sidebar");

        if (!themeToggle || !themeToggleLight || !themeToggleDark) return;

        function updateSidebarThemeIcons() {
            const isDark = document.documentElement.classList.contains("dark");
            if (isDark) {
                themeToggleLight.classList.remove("hidden");
                themeToggleDark.classList.add("hidden");
            } else {
                themeToggleDark.classList.remove("hidden");
                themeToggleLight.classList.add("hidden");
            }
        }

        // Initial state
        updateSidebarThemeIcons();

        // Watch for theme changes
        const observer = new MutationObserver(function(mutations) {
            mutations.forEach(function(mutation) {
                if (mutation.type === "attributes" && mutation.attributeName === "class") {
                    updateSidebarThemeIcons();
                }
            });
        });

        observer.observe(document.documentElement, {
            attributes: true,
            attributeFilter: ["class"]
        });

        // Add click handler
        if (!themeToggle.dataset.listenerAdded) {
            themeToggle.addEventListener("click", function() {
                const isDark = document.documentElement.classList.contains("dark");
                const newTheme = isDark ? "light" : "dark";
                
                if (newTheme === "dark") {
                    document.documentElement.classList.add("dark");
                    localStorage.setItem("theme", "dark");
                } else {
                    document.documentElement.classList.remove("dark");
                    localStorage.setItem("theme", "light");
                }
                
                // Sync with main theme toggle if it exists
                const mainToggle = document.getElementById("theme-toggle");
                if (mainToggle && mainToggle.dataset.listenerAdded) {
                    // Trigger the main toggle's click handler
                    mainToggle.click();
                } else {
                    // Update icons manually if main toggle doesn't exist
                    updateSidebarThemeIcons();
                }
            });
            themeToggle.dataset.listenerAdded = true;
        }
    }

    // Initialize when DOM is ready
    if (document.readyState === "loading") {
        document.addEventListener("DOMContentLoaded", initSidebarThemeToggle);
    } else {
        initSidebarThemeToggle();
    }

    // Also initialize after Alpine.js might have loaded
    if (window.Alpine) {
        document.addEventListener("alpine:init", initSidebarThemeToggle);
    }
})();
</script>

