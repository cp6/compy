// Landing Page Specific JavaScript

// Import theme switching from dark.js (same as authenticated app)
import './dark';

// Sticky Navbar
document.addEventListener('DOMContentLoaded', function() {
    const navbar = document.getElementById('landing-navbar');
    if (navbar) {
        let lastScroll = 0;
        
        window.addEventListener('scroll', function() {
            const currentScroll = window.pageYOffset;
            
            if (currentScroll > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
            
            lastScroll = currentScroll;
        });
    }
    
    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const href = this.getAttribute('href');
            if (href !== '#' && href.length > 1) {
                e.preventDefault();
                const target = document.querySelector(href);
                if (target) {
                    const offsetTop = target.offsetTop - 80; // Account for sticky navbar
                    window.scrollTo({
                        top: offsetTop,
                        behavior: 'smooth'
                    });
                }
            }
        });
    });
    
    // Testimonial carousel scroll
    const testimonialCarousel = document.getElementById('testimonial-carousel');
    if (testimonialCarousel) {
        let isDown = false;
        let startX;
        let scrollLeft;
        
        testimonialCarousel.addEventListener('mousedown', (e) => {
            isDown = true;
            testimonialCarousel.style.cursor = 'grabbing';
            startX = e.pageX - testimonialCarousel.offsetLeft;
            scrollLeft = testimonialCarousel.scrollLeft;
        });
        
        testimonialCarousel.addEventListener('mouseleave', () => {
            isDown = false;
            testimonialCarousel.style.cursor = 'grab';
        });
        
        testimonialCarousel.addEventListener('mouseup', () => {
            isDown = false;
            testimonialCarousel.style.cursor = 'grab';
        });
        
        testimonialCarousel.addEventListener('mousemove', (e) => {
            if (!isDown) return;
            e.preventDefault();
            const x = e.pageX - testimonialCarousel.offsetLeft;
            const walk = (x - startX) * 2;
            testimonialCarousel.scrollLeft = scrollLeft - walk;
        });
        
        // Touch support
        let touchStartX = 0;
        let touchScrollLeft = 0;
        
        testimonialCarousel.addEventListener('touchstart', (e) => {
            touchStartX = e.touches[0].pageX - testimonialCarousel.offsetLeft;
            touchScrollLeft = testimonialCarousel.scrollLeft;
        });
        
        testimonialCarousel.addEventListener('touchmove', (e) => {
            if (!touchStartX) return;
            const x = e.touches[0].pageX - testimonialCarousel.offsetLeft;
            const walk = (x - touchStartX) * 2;
            testimonialCarousel.scrollLeft = touchScrollLeft - walk;
        });
    }
    
    // Intersection Observer for fade-in animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-fade-in-up');
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);
    
    // Observe all sections
    document.querySelectorAll('.observe-fade-in').forEach(el => {
        observer.observe(el);
    });
    
    // Newsletter form handling
    const newsletterForm = document.getElementById('newsletter-form');
    if (newsletterForm) {
        newsletterForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const email = this.querySelector('input[type="email"]').value;
            
            // Here you would typically send the email to your backend
            console.log('Newsletter signup:', email);
            
            // Show success message (you can replace this with a toast notification)
            const button = this.querySelector('button[type="submit"]');
            const originalText = button.textContent;
            button.textContent = 'Subscribed!';
            button.disabled = true;
            button.classList.add('opacity-50');
            
            setTimeout(() => {
                button.textContent = originalText;
                button.disabled = false;
                button.classList.remove('opacity-50');
                this.reset();
            }, 2000);
        });
    }
});

