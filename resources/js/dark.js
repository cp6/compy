document.addEventListener("DOMContentLoaded", applyTheme);
window.addEventListener("popstate", applyTheme);

function applyTheme() {
    const themeToggle = document.getElementById("theme-toggle");
    const themeToggleLight = document.getElementById("theme-toggle-light");
    const themeToggleDark = document.getElementById("theme-toggle-dark");

    function setTheme(mode) {
        if (mode === "dark") {
            document.documentElement.classList.add("dark");
            localStorage.setItem("theme", "dark");
            if (themeToggleLight && themeToggleDark) {
                themeToggleLight.classList.remove("hidden");
                themeToggleDark.classList.add("hidden");
            }
        } else {
            document.documentElement.classList.remove("dark");
            localStorage.setItem("theme", "light");
            if (themeToggleLight && themeToggleDark) {
                themeToggleDark.classList.remove("hidden");
                themeToggleLight.classList.add("hidden");
            }
        }
    }

    // Check saved theme or use system preference if no saved theme
    const savedTheme = localStorage.getItem("theme");
    if (savedTheme) {
        setTheme(savedTheme);
    } else if (window.matchMedia("(prefers-color-scheme: dark)").matches) {
        setTheme("dark");
    } else {
        setTheme("light");
    }

    // Add event listener for the theme toggle button
    if (themeToggle && !themeToggle.dataset.listenerAdded) {
        themeToggle.addEventListener("click", () => {
            const isDark = document.documentElement.classList.contains("dark");
            setTheme(isDark ? "light" : "dark");
        });
        themeToggle.dataset.listenerAdded = true;
    }
}

