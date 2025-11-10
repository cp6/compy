import './bootstrap';
import './dark';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// Copy to clipboard function with fallback
function copyToClipboard(text) {
    // Modern clipboard API
    if (navigator.clipboard && window.isSecureContext) {
        return navigator.clipboard.writeText(text).then(() => {
            return true;
        }).catch(err => {
            console.error('Clipboard API failed:', err);
            return fallbackCopyToClipboard(text);
        });
    } else {
        // Fallback for older browsers or non-secure contexts
        return fallbackCopyToClipboard(text);
    }
}

// Fallback copy method
function fallbackCopyToClipboard(text) {
    const textArea = document.createElement('textarea');
    textArea.value = text;
    textArea.style.position = 'fixed';
    textArea.style.left = '-999999px';
    textArea.style.top = '-999999px';
    document.body.appendChild(textArea);
    textArea.focus();
    textArea.select();
    
    try {
        const successful = document.execCommand('copy');
        document.body.removeChild(textArea);
        return Promise.resolve(successful);
    } catch (err) {
        document.body.removeChild(textArea);
        console.error('Fallback copy failed:', err);
        return Promise.resolve(false);
    }
}

// Show copy feedback
function showCopyFeedback(button) {
    if (!button) return;
    
    const originalHTML = button.innerHTML;
    button.innerHTML = `
        <svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
        </svg>
    `;
    button.classList.add('text-emerald-500');
    
    setTimeout(() => {
        button.innerHTML = originalHTML;
        button.classList.remove('text-emerald-500');
    }, 2000);
}

// Initialize copy buttons when DOM is ready
document.addEventListener('DOMContentLoaded', function() {
    // Handle copy buttons with data-copy attribute
    document.querySelectorAll('[data-copy]').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const textToCopy = this.getAttribute('data-copy');
            const inputId = this.getAttribute('data-input-id');
            
            copyToClipboard(textToCopy).then(success => {
                if (success) {
                    showCopyFeedback(this);
                } else {
                    // Show error feedback
                    const originalHTML = this.innerHTML;
                    this.innerHTML = `
                        <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    `;
                    setTimeout(() => {
                        this.innerHTML = originalHTML;
                    }, 2000);
                }
            });
        });
    });
});

// Export for global use (backward compatibility)
window.copyToClipboard = function(text, elementId) {
    copyToClipboard(text).then(success => {
        if (success && elementId) {
            const input = document.getElementById(elementId);
            if (input) {
                const button = input.parentElement.querySelector('button[data-copy]');
                if (button) {
                    showCopyFeedback(button);
                }
            }
        }
    });
};
