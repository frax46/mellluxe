/**
 * Mell Luxe Theme JavaScript
 * GSAP Animations and Interactive Features
 */

document.addEventListener('DOMContentLoaded', function() {
    
    // Register GSAP ScrollTrigger plugin
    gsap.registerPlugin(ScrollTrigger);
    
    // Initialize theme functions
    initMobileMenu();
    initScrollAnimations();
    initSnapScrolling();
    initContactForm();
    initBackToTop();
    initFloatingElements();
    initProductAnimations();
    initHeaderScroll();
    initProductShowcaseAnimations();
    initBestSectionSlider();
    initCartSidebar();
    initShopPageAnimations();
    initViewCartFix();
    initCartPage();
    
    /**
     * Mobile Menu Toggle
     */
    function initMobileMenu() {
        const menuToggle = document.querySelector('.mobile-menu-toggle');
        const navigation = document.querySelector('.main-navigation');
        const overlay = document.querySelector('.mobile-menu-overlay');
        const menuLinks = document.querySelectorAll('.main-navigation .links a');
        
        if (menuToggle && navigation && overlay) {
            // Toggle mobile menu
            menuToggle.addEventListener('click', function() {
                const isActive = navigation.classList.contains('active');
                
                if (isActive) {
                    closeMobileMenu();
                } else {
                    openMobileMenu();
                }
            });
            
            // Close menu when clicking overlay
            overlay.addEventListener('click', function() {
                closeMobileMenu();
            });
            
            // Close menu when clicking on menu links
            menuLinks.forEach(link => {
                link.addEventListener('click', function() {
                    closeMobileMenu();
                });
            });
            
            // Close menu on escape key
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && navigation.classList.contains('active')) {
                    closeMobileMenu();
                }
            });
            
            // Handle window resize
            window.addEventListener('resize', function() {
                if (window.innerWidth >= 992) {
                    closeMobileMenu();
                }
            });
            
            function openMobileMenu() {
                navigation.classList.add('active');
                menuToggle.classList.add('active');
                overlay.classList.add('active');
                menuToggle.setAttribute('aria-expanded', 'true');
                document.body.style.overflow = 'hidden';
                
                // Focus trap
                const focusableElements = navigation.querySelectorAll('a, button, input, textarea, select');
                if (focusableElements.length > 0) {
                    focusableElements[0].focus();
                }
            }
            
            function closeMobileMenu() {
                navigation.classList.remove('active');
                menuToggle.classList.remove('active');
                overlay.classList.remove('active');
                menuToggle.setAttribute('aria-expanded', 'false');
                document.body.style.overflow = '';
            }
        }
    }
    
    /**
     * GSAP Scroll Animations
     */
    function initScrollAnimations() {
        // Fade in animations
        gsap.utils.toArray('.fade-in').forEach(element => {
            gsap.from(element, {
                opacity: 0,
                duration: 1,
                scrollTrigger: {
                    trigger: element,
                    start: 'top 80%',
                    end: 'bottom 20%',
                    toggleActions: 'play none none reverse'
                }
            });
        });
        
        // Slide animations
        gsap.utils.toArray('.slide-up').forEach(element => {
            gsap.from(element, {
                y: 50,
                opacity: 0,
                duration: 1,
                ease: 'power2.out',
                scrollTrigger: {
                    trigger: element,
                    start: 'top 80%',
                    toggleActions: 'play none none reverse'
                }
            });
        });
        
        // Slide left animations
        gsap.utils.toArray('.slide-left').forEach(element => {
            gsap.from(element, {
                x: -50,
                opacity: 0,
                duration: 1,
                ease: 'power2.out',
                scrollTrigger: {
                    trigger: element,
                    start: 'top 80%',
                    end: 'bottom 20%',
                    toggleActions: 'play none none reverse'
                }
            });
        });
        
        // Slide right animations
        gsap.utils.toArray('.slide-right').forEach(element => {
            gsap.from(element, {
                x: 50,
                opacity: 0,
                duration: 1,
                ease: 'power2.out',
                scrollTrigger: {
                    trigger: element,
                    start: 'top 80%',
                    end: 'bottom 20%',
                    toggleActions: 'play none none reverse'
                }
            });
        });
        
        // Scale in animations
        gsap.utils.toArray('.scale-in').forEach((element, index) => {
            const delay = element.dataset.delay || 0;
            
            gsap.from(element, {
                scale: 0.8,
                opacity: 0,
                duration: 0.8,
                delay: parseFloat(delay),
                ease: 'back.out(1.7)',
                scrollTrigger: {
                    trigger: element,
                    start: 'top 80%',
                    end: 'bottom 20%',
                    toggleActions: 'play none none reverse'
                }
            });
        });
    }
    
    /**
     * Enhanced ScrollTrigger Animations
     */
    function initSnapScrolling() {
        // Simple scroll effects without problematic snap
        const snapSections = document.querySelectorAll('.snap-section');
        
        if (snapSections.length > 0) {
            snapSections.forEach((section, index) => {
                ScrollTrigger.create({
                    trigger: section,
                    start: 'top 80%',
                    end: 'bottom 20%',
                    onEnter: () => section.classList.add('in-view'),
                    onLeave: () => section.classList.remove('in-view')
                });
            });
        }
    }
    
    /**
     * Contact Form AJAX
     */
    function initContactForm() {
        const contactForm = document.getElementById('contact-form');
        const responseDiv = document.getElementById('contact-response');
        
        if (contactForm && responseDiv) {
            contactForm.addEventListener('submit', function(e) {
                e.preventDefault();
                
                const formData = new FormData(contactForm);
                formData.append('action', 'contact_form');
                formData.append('nonce', mellluxe_ajax.nonce);
                
                responseDiv.innerHTML = '<p>Sending message...</p>';
                
                fetch(mellluxe_ajax.ajaxurl, {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        responseDiv.innerHTML = '<p style="color: green;">' + data.data + '</p>';
                        contactForm.reset();
                    } else {
                        responseDiv.innerHTML = '<p style="color: red;">' + data.data + '</p>';
                    }
                });
            });
        }
    }
    
    /**
     * Back to Top Button
     */
    function initBackToTop() {
        const backToTop = document.getElementById('back-to-top');
        
        if (backToTop) {
            // Show/hide button based on scroll position
            window.addEventListener('scroll', function() {
                if (window.scrollY > 400) {
                    backToTop.classList.add('show');
                } else {
                    backToTop.classList.remove('show');
                }
            });
            
            // Smooth scroll to top when clicked
            backToTop.addEventListener('click', function(e) {
                e.preventDefault();
                
                // Add click animation
                backToTop.style.transform = 'translateY(0) scale(0.9)';
                
                // Smooth scroll to top
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
                
                // Reset animation after a short delay
                setTimeout(() => {
                    backToTop.style.transform = '';
                }, 200);
            });
            
            // Add keyboard accessibility
            backToTop.addEventListener('keydown', function(e) {
                if (e.key === 'Enter' || e.key === ' ') {
                    e.preventDefault();
                    backToTop.click();
                }
            });
        }
    }
    
    /**
     * Floating Elements Animation
     */
    function initFloatingElements() {
        const floatingElements = document.querySelectorAll('.leaf-pattern');
        
        floatingElements.forEach((element, index) => {
            // Create floating animation
            gsap.to(element, {
                y: -20,
                rotation: 360,
                duration: 3 + index,
                repeat: -1,
                yoyo: true,
                ease: 'sine.inOut',
                delay: index * 0.5
            });
            
            // Parallax effect on scroll
            gsap.to(element, {
                y: -100,
                ease: 'none',
                scrollTrigger: {
                    trigger: element,
                    start: 'top bottom',
                    end: 'bottom top',
                    scrub: true
                }
            });
        });
    }
    
    /**
     * Product Card Animations
     */
    function initProductAnimations() {
        const productCards = document.querySelectorAll('.product-card');
        
        productCards.forEach(card => {
            // Hover animations
            card.addEventListener('mouseenter', function() {
                gsap.to(this, {
                    y: -10,
                    scale: 1.02,
                    duration: 0.3,
                    ease: 'power2.out'
                });
                
                gsap.to(this.querySelector('.product-image img'), {
                    scale: 1.1,
                    duration: 0.3,
                    ease: 'power2.out'
                });
            });
            
            card.addEventListener('mouseleave', function() {
                gsap.to(this, {
                    y: 0,
                    scale: 1,
                    duration: 0.3,
                    ease: 'power2.out'
                });
                
                gsap.to(this.querySelector('.product-image img'), {
                    scale: 1,
                    duration: 0.3,
                    ease: 'power2.out'
                });
            });
        });
    }
    
    /**
     * Header Scroll Effects
     */
    function initHeaderScroll() {
        const header = document.querySelector('.site-header');
        
        if (header) {
            ScrollTrigger.create({
                start: 'top -100px',
                end: 99999,
                toggleClass: {
                    targets: header,
                    className: 'scrolled'
                }
            });
        }
    }
    
    /**
     * Smooth anchor scrolling
     */
    function initSmoothScrolling() {
        const anchorLinks = document.querySelectorAll('a[href^="#"]');
        
        anchorLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                const target = document.querySelector(this.getAttribute('href'));
                
                if (target) {
                    e.preventDefault();
                    
                    gsap.to(window, {
                        scrollTo: {
                            y: target,
                            offsetY: 80
                        },
                        duration: 1,
                        ease: 'power2.inOut'
                    });
                }
            });
        });
    }
    
    // Initialize smooth scrolling
    initSmoothScrolling();
    
    /**
     * WooCommerce AJAX Add to Cart
     */
    if (typeof wc_add_to_cart_params !== 'undefined') {
        document.body.addEventListener('added_to_cart', function(e) {
            // Add animation when product is added to cart
            const cartButton = e.target;
            if (cartButton) {
                gsap.to(cartButton, {
                    scale: 1.1,
                    duration: 0.1,
                    yoyo: true,
                    repeat: 1,
                    ease: 'power2.inOut'
                });
            }
        });
    }
    
    /**
     * Intersection Observer for Performance
     */
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '50px'
    };
    
    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('in-view');
            }
        });
    }, observerOptions);
    
    // Observe elements for animations
    const elementsToObserve = document.querySelectorAll('.fade-in, .slide-left, .slide-right, .gsap-animated');
    elementsToObserve.forEach(el => observer.observe(el));
    
    /**
     * Product Showcase Animations with GSAP
     */
    function initProductShowcaseAnimations() {
        
        // Check if GSAP is loaded
        if (typeof gsap === 'undefined') {
            console.log('GSAP not loaded, elements will remain visible');
            return;
        }
        
        // Animate description text
        const showcaseDescription = document.querySelector('.showcase-description');
        if (showcaseDescription) {
            showcaseDescription.classList.add('gsap-animated');
            gsap.fromTo(showcaseDescription, {
                opacity: 0,
                y: 50
            }, {
                opacity: 1,
                y: 0,
                duration: 1,
                ease: 'power2.out',
                scrollTrigger: {
                    trigger: showcaseDescription,
                    start: 'top 80%',
                    end: 'bottom 20%',
                    toggleActions: 'play none none reverse'
                }
            });
        }
        
        // Enhanced animation handling for all GSAP elements
        const gsapElements = document.querySelectorAll('[data-gsap]');
        
        gsapElements.forEach((element, index) => {
            element.classList.add('gsap-animated');
            const animationType = element.getAttribute('data-gsap');
            let fromProps = { opacity: 0 };
            let toProps = { 
                opacity: 1,
                duration: 0.8,
                ease: 'power2.out',
                scrollTrigger: {
                    trigger: element,
                    start: 'top 85%',
                    end: 'bottom 20%',
                    toggleActions: 'play none none reverse'
                }
            };
            
            // Set different animation properties based on data-gsap attribute
            switch(animationType) {
                case 'slide-left':
                    fromProps.x = -100;
                    toProps.x = 0;
                    toProps.delay = 0.1;
                    break;
                case 'slide-right':
                    fromProps.x = 100;
                    toProps.x = 0;
                    toProps.delay = 0.1;
                    break;
                case 'slide-up':
                    fromProps.y = 80;
                    toProps.y = 0;
                    toProps.delay = 0.2;
                    break;
                case 'fade-in':
                    fromProps.y = 30;
                    toProps.y = 0;
                    toProps.delay = 0.3;
                    break;
                case 'slide-bottom':
                    fromProps.y = 150;
                    toProps.y = 0;
                    toProps.duration = 1.2;
                    toProps.delay = 0.4;
                    break;
                case 'slide-left-delay':
                    fromProps.x = -100;
                    toProps.x = 0;
                    toProps.delay = 0.5;
                    break;
                case 'slide-right-delay':
                    fromProps.x = 100;
                    toProps.x = 0;
                    toProps.delay = 0.5;
                    break;
                case 'slide-up-delay':
                    fromProps.y = 80;
                    toProps.y = 0;
                    toProps.delay = 0.6;
                    break;
            }
            
            gsap.fromTo(element, fromProps, toProps);
        });
        
        // Add hover animations for product items
        const showcaseProducts = document.querySelectorAll('.showcase-product-item');
        showcaseProducts.forEach(product => {
            const image = product.querySelector('.showcase-product-image');
            
            product.addEventListener('mouseenter', function() {
                gsap.to(this, {
                    y: -15,
                    duration: 0.3,
                    ease: 'power2.out'
                });
                
                if (image) {
                    gsap.to(image, {
                        scale: 1.1,
                        duration: 0.3,
                        ease: 'power2.out'
                    });
                }
            });
            
            product.addEventListener('mouseleave', function() {
                gsap.to(this, {
                    y: 0,
                    duration: 0.3,
                    ease: 'power2.out'
                });
                
                if (image) {
                    gsap.to(image, {
                        scale: 1,
                        duration: 0.3,
                        ease: 'power2.out'
                    });
                }
            });
        });
        
        // Animate the shop button with bounce effect
        const shopButton = document.querySelector('.showcase-shop-button');
        if (shopButton) {
            shopButton.addEventListener('mouseenter', function() {
                gsap.to(this, {
                    scale: 1.05,
                    y: -3,
                    duration: 0.3,
                    ease: 'back.out(1.7)'
                });
            });
            
            shopButton.addEventListener('mouseleave', function() {
                gsap.to(this, {
                    scale: 1,
                    y: 0,
                    duration: 0.3,
                    ease: 'power2.out'
                });
            });
        }
        
        // Special animation for strips image with parallax effect
        const stripsImage = document.querySelector('.strips-image');
        if (stripsImage) {
            // Parallax scroll effect for strips
            gsap.to(stripsImage, {
                y: -50,
                ease: 'none',
                scrollTrigger: {
                    trigger: stripsImage,
                    start: 'top bottom',
                    end: 'bottom top',
                    scrub: 1
                }
            });
        }
    }
    
    /**
     * Fix for WooCommerce "View cart" link
     */
    function initViewCartFix() {
        // This new version directly handles the click on the 'View cart' link
        // to ensure navigation happens, overriding any other scripts that might
        // be trying to prevent it.
        jQuery(document).on('click', '.added_to_cart', function(e) {
            // Prevent other scripts from interfering.
            e.preventDefault();
            e.stopImmediatePropagation();

            const cartUrl = jQuery(this).attr('href');
            if (cartUrl) {
                // Force the browser to navigate to the cart page.
                window.location.href = cartUrl;
            }
            return false;
        });
    }
});

/**
 * Best Section Product Slider
 */
function initBestSectionSlider() {
    const mainImg = document.getElementById('mainProductImg');
    const thumbnails = document.querySelectorAll('.thumbnail-item');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    
    if (!mainImg || !thumbnails.length || !prevBtn || !nextBtn) {
        return; // Exit if elements don't exist
    }
    
    let currentIndex = 0;
    const totalImages = thumbnails.length;
    
    // Function to update the main image and active thumbnail
    function updateSlider(index) {
        if (index < 0) index = totalImages - 1;
        if (index >= totalImages) index = 0;
        
        currentIndex = index;
        
        // Update main image with fade effect
        mainImg.style.opacity = '0';
        
        setTimeout(() => {
            const newImageSrc = thumbnails[currentIndex].getAttribute('data-img');
            const newAltText = thumbnails[currentIndex].querySelector('img').alt;
            
            mainImg.src = newImageSrc;
            mainImg.alt = newAltText;
            mainImg.style.opacity = '1';
        }, 150);
        
        // Update active thumbnail
        thumbnails.forEach((thumb, i) => {
            if (i === currentIndex) {
                thumb.classList.add('active');
            } else {
                thumb.classList.remove('active');
            }
        });
    }
    
    // Navigation arrow event listeners
    prevBtn.addEventListener('click', function() {
        updateSlider(currentIndex - 1);
    });
    
    nextBtn.addEventListener('click', function() {
        updateSlider(currentIndex + 1);
    });
    
    // Thumbnail click event listeners
    thumbnails.forEach((thumbnail, index) => {
        thumbnail.addEventListener('click', function() {
            updateSlider(index);
        });
    });
    
    // Auto-play slider (optional)
    let autoplayInterval;
    
    function startAutoplay() {
        autoplayInterval = setInterval(() => {
            updateSlider(currentIndex + 1);
        }, 5000); // Change image every 5 seconds
    }
    
    function stopAutoplay() {
        clearInterval(autoplayInterval);
    }
    
    // Start autoplay
    startAutoplay();
    
    // Pause autoplay on hover
    const sliderSection = document.querySelector('.product-slider-section');
    if (sliderSection) {
        sliderSection.addEventListener('mouseenter', stopAutoplay);
        sliderSection.addEventListener('mouseleave', startAutoplay);
    }
    
    // Keyboard navigation
    document.addEventListener('keydown', function(e) {
        if (document.querySelector('#best:hover')) {
            if (e.key === 'ArrowLeft') {
                updateSlider(currentIndex - 1);
            } else if (e.key === 'ArrowRight') {
                updateSlider(currentIndex + 1);
            }
        }
    });
    
    // Add smooth transition to main image
    mainImg.style.transition = 'opacity 0.3s ease, transform 0.3s ease';
    
    // Add loading state
    mainImg.addEventListener('load', function() {
        this.style.opacity = '1';
    });
    
    // Preload images for better performance
    thumbnails.forEach(thumbnail => {
        const img = new Image();
        img.src = thumbnail.getAttribute('data-img');
    });
}

/**
 * Additional utility functions
 */

// Debounce function for performance
function debounce(func, wait, immediate) {
    let timeout;
    return function executedFunction() {
        const context = this;
        const args = arguments;
        const later = function() {
            timeout = null;
            if (!immediate) func.apply(context, args);
        };
        const callNow = immediate && !timeout;
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
        if (callNow) func.apply(context, args);
    };
}

// Throttle function for scroll events
function throttle(func, limit) {
    let inThrottle;
    return function() {
        const args = arguments;
        const context = this;
        if (!inThrottle) {
            func.apply(context, args);
            inThrottle = true;
            setTimeout(() => inThrottle = false, limit);
        }
    }
}

// Cart Sidebar Functionality
function initCartSidebar() {
    const cartToggle = document.getElementById('cart-toggle');
    const cartSidebar = document.getElementById('cart-sidebar');
    const cartSidebarClose = document.getElementById('cart-sidebar-close');
    const cartSidebarOverlay = document.getElementById('cart-sidebar-overlay');
    const cartSidebarBody = document.getElementById('cart-sidebar-body');
    
    if (!cartToggle || !cartSidebar) return;
    
    // Open cart sidebar
    cartToggle.addEventListener('click', function(e) {
        e.preventDefault();
        openCartSidebar();
    });
    
    // Close cart sidebar
    function closeCartSidebar() {
        cartSidebar.classList.remove('active');
        document.body.classList.remove('cart-sidebar-open');
    }
    
    // Open cart sidebar
    function openCartSidebar() {
        cartSidebar.classList.add('active');
        document.body.classList.add('cart-sidebar-open');
        loadCartContent();
    }
    
    // Close events
    if (cartSidebarClose) {
        cartSidebarClose.addEventListener('click', closeCartSidebar);
    }
    
    if (cartSidebarOverlay) {
        cartSidebarOverlay.addEventListener('click', closeCartSidebar);
    }
    
    // Close on escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && cartSidebar.classList.contains('active')) {
            closeCartSidebar();
        }
    });
    
    // Load cart content via AJAX
    function loadCartContent() {
        if (!cartSidebarBody) return;
        
        cartSidebarBody.innerHTML = '<div class="cart-loading"><p>Loading cart...</p></div>';
        
        fetch(mellluxe_ajax.ajax_url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: new URLSearchParams({
                action: 'get_cart_contents',
                nonce: mellluxe_ajax.nonce
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                cartSidebarBody.innerHTML = data.data.html;
                updateCartTotal(data.data.total);
                initCartItemEvents();
            } else {
                cartSidebarBody.innerHTML = '<div class="cart-empty"><p>Your cart is empty</p></div>';
            }
        })
        .catch(error => {
            console.error('Error loading cart:', error);
            cartSidebarBody.innerHTML = '<div class="cart-empty"><p>Error loading cart</p></div>';
        });
    }
    
    // Update cart total
    function updateCartTotal(total) {
        const cartTotalAmount = document.getElementById('cart-total-amount');
        if (cartTotalAmount) {
            cartTotalAmount.innerHTML = total;
        }
    }
    
    // Initialize cart item events (remove, quantity change)
    function initCartItemEvents() {
        // Remove item buttons
        const removeButtons = cartSidebarBody.querySelectorAll('.cart-item-remove');
        removeButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const cartKey = this.dataset.cartKey;
                removeCartItem(cartKey);
            });
        });
        
        // Quantity change buttons
        const quantityBtns = cartSidebarBody.querySelectorAll('.quantity-btn');
        quantityBtns.forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const cartKey = this.dataset.cartKey;
                const action = this.dataset.action;
                const currentQty = parseInt(this.parentNode.querySelector('.quantity-input').value);
                
                let newQty = currentQty;
                if (action === 'increase') {
                    newQty = currentQty + 1;
                } else if (action === 'decrease' && currentQty > 1) {
                    newQty = currentQty - 1;
                }
                
                if (newQty !== currentQty) {
                    updateCartItemQuantity(cartKey, newQty);
                }
            });
        });
    }
    
    // Remove cart item
    function removeCartItem(cartKey) {
        fetch(mellluxe_ajax.ajax_url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: new URLSearchParams({
                action: 'remove_cart_item',
                cart_key: cartKey,
                nonce: mellluxe_ajax.nonce
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                loadCartContent(); // Reload cart content
                updateCartCount(data.data.cart_count);
            }
        })
        .catch(error => {
            console.error('Error removing item:', error);
        });
    }
    
    // Update cart item quantity
    function updateCartItemQuantity(cartKey, quantity) {
        fetch(mellluxe_ajax.ajax_url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: new URLSearchParams({
                action: 'update_cart_item_quantity',
                cart_key: cartKey,
                quantity: quantity,
                nonce: mellluxe_ajax.nonce
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                loadCartContent(); // Reload cart content
                updateCartCount(data.data.cart_count);
            }
        })
        .catch(error => {
            console.error('Error updating quantity:', error);
        });
    }
    
    // Update cart count in header
    function updateCartCount(count) {
        const cartCount = document.getElementById('cart-count');
        if (cartCount) {
            if (count > 0) {
                cartCount.textContent = count;
                cartCount.style.display = 'flex';
                cartCount.classList.add('updating');
                setTimeout(() => {
                    cartCount.classList.remove('updating');
                }, 600);
            } else {
                cartCount.style.display = 'none';
            }
        }
    }
    
    // Listen for WooCommerce add to cart events
    document.body.addEventListener('added_to_cart', function(event) {
        // Update cart count
        const cartCount = document.getElementById('cart-count');
        if (cartCount) {
            fetch(mellluxe_ajax.ajax_url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: new URLSearchParams({
                    action: 'get_cart_count',
                    nonce: mellluxe_ajax.nonce
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    updateCartCount(data.data.cart_count);
                }
            });
        }
    });
}

/**
 * Shop Page Animations
 */
function initShopPageAnimations() {
    // Only run on shop page
    if (!document.querySelector('.shop-page-container')) {
        return;
    }
    
    // Shop Hero Animations
    gsap.timeline()
        .from('.shop-hero-title', {
            y: 50,
            opacity: 0,
            duration: 1,
            ease: 'power2.out'
        })
        .from('.shop-hero-subtitle', {
            y: 30,
            opacity: 0,
            duration: 0.8,
            ease: 'power2.out'
        }, '-=0.5')
        .from('.category-item', {
            y: 30,
            opacity: 0,
            duration: 0.6,
            stagger: 0.2,
            ease: 'back.out(1.7)'
        }, '-=0.3')
        .from('.hero-product-showcase', {
            x: 50,
            opacity: 0,
            duration: 1,
            ease: 'power2.out'
        }, '-=0.8');
    
    // Trust Indicators Animation
    gsap.from('.trust-item', {
        y: 50,
        opacity: 0,
        duration: 0.8,
        stagger: 0.2,
        ease: 'power2.out',
        scrollTrigger: {
            trigger: '.shop-trust-section',
            start: 'top 80%',
            end: 'bottom 20%',
            toggleActions: 'play none none reverse'
        }
    });
    
    // Collections Animation
    gsap.from('.collection-item', {
        scale: 0.8,
        opacity: 0,
        duration: 0.8,
        stagger: 0.2,
        ease: 'back.out(1.7)',
        scrollTrigger: {
            trigger: '.collections-grid',
            start: 'top 80%',
            end: 'bottom 20%',
            toggleActions: 'play none none reverse'
        }
    });
    
    // Enhanced Product Grid Animations
    gsap.from('.woocommerce .product', {
        y: 30,
        opacity: 0,
        duration: 0.6,
        stagger: 0.1,
        ease: 'power2.out',
        scrollTrigger: {
            trigger: '.products',
            start: 'top 80%',
            end: 'bottom 20%',
            toggleActions: 'play none none reverse'
        }
    });
    
    // Category hover interactions
    const categoryItems = document.querySelectorAll('.category-item');
    categoryItems.forEach(item => {
        item.addEventListener('mouseenter', function() {
            gsap.to(this, {
                scale: 1.05,
                duration: 0.3,
                ease: 'power2.out'
            });
        });
        
        item.addEventListener('mouseleave', function() {
            gsap.to(this, {
                scale: 1,
                duration: 0.3,
                ease: 'power2.out'
            });
        });
    });
    
    // Collection overlay animations
    const collectionItems = document.querySelectorAll('.collection-item');
    collectionItems.forEach(item => {
        const overlay = item.querySelector('.collection-overlay');
        const image = item.querySelector('.collection-image img');
        
        item.addEventListener('mouseenter', function() {
            gsap.to(image, {
                scale: 1.1,
                duration: 0.5,
                ease: 'power2.out'
            });
        });
        
        item.addEventListener('mouseleave', function() {
            gsap.to(image, {
                scale: 1,
                duration: 0.5,
                ease: 'power2.out'
            });
        });
    });
    
    // Product sorting functionality
    const sortSelect = document.getElementById('product-sort');
    if (sortSelect) {
        sortSelect.addEventListener('change', function() {
            const value = this.value;
            // Add loading animation
            const productsGrid = document.querySelector('.woocommerce .products');
            if (productsGrid) {
                gsap.to(productsGrid, {
                    opacity: 0.5,
                    duration: 0.3,
                    onComplete: function() {
                        // Trigger WooCommerce sorting
                        const url = new URL(window.location);
                        url.searchParams.set('orderby', value);
                        window.location.href = url.toString();
                    }
                });
            }
        });
    }
}

function initCartPage() {
    const cartPage = document.querySelector('.cart-page-container');
    if (!cartPage) return;

    const updateCartButton = cartPage.querySelector('.update-cart-button');

    // Handle custom quantity buttons using CSS pseudo-elements
    cartPage.addEventListener('click', function(e) {
        const productQuantity = e.target.closest('.product-quantity');
        if (!productQuantity) return;

        const rect = productQuantity.getBoundingClientRect();
        const clickX = e.clientX - rect.left;
        const input = productQuantity.querySelector('input[type="number"]');
        
        if (!input) return;

        let currentValue = parseInt(input.value, 10) || 0;

        // Check if click is on the minus button (left side)
        if (clickX <= 35) {
            currentValue = Math.max(0, currentValue - 1);
            input.value = currentValue;
        }
        // Check if click is on the plus button (right side)  
        else if (clickX >= rect.width - 35) {
            currentValue++;
            input.value = currentValue;
        }
        else {
            return; // Click was on the input itself
        }

        // Trigger change event for WooCommerce
        const changeEvent = new Event('change', { bubbles: true });
        input.dispatchEvent(changeEvent);

        // Enable update button
        if (updateCartButton) {
            updateCartButton.disabled = false;
        }
    });

    // Enable update button when quantity changes manually
    cartPage.addEventListener('change', function(e) {
        if (e.target.type === 'number') {
            if (updateCartButton) {
                updateCartButton.disabled = false;
            }
        }
    });

    // Handle input focus/blur for better UX
    cartPage.addEventListener('focus', function(e) {
        if (e.target.type === 'number') {
            e.target.select();
        }
    }, true);

    // For AJAX based themes, we might need to re-init this
    document.body.addEventListener('updated_cart_totals', initCartPage);
}

// Debug function to check if AJAX variables are available
console.log('AJAX Variables:', window.mellluxe_ajax); 