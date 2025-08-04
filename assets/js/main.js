/**
 * BTlabs Theme JavaScript
 * 
 * @package BTlabs
 */

(function($) {
    'use strict';

    // Document ready
    $(document).ready(function() {
        
        // Mobile menu toggle
        $('.menu-toggle').on('click', function() {
            $(this).toggleClass('active');
            $('.main-menu').toggleClass('active').slideToggle(300);
            
            // Toggle aria-expanded
            var isExpanded = $(this).attr('aria-expanded') === 'true';
            $(this).attr('aria-expanded', !isExpanded);
        });
        
        // Close mobile menu when clicking outside
        $(document).on('click', function(e) {
            if (!$(e.target).closest('.main-navigation').length && !$(e.target).hasClass('menu-toggle')) {
                $('.menu-toggle').removeClass('active');
                $('.main-menu').removeClass('active').slideUp(300);
                $('.menu-toggle').attr('aria-expanded', 'false');
            }
        });
        
        // Close mobile menu when clicking on a link
        $('.main-menu a').on('click', function() {
            $('.menu-toggle').removeClass('active');
            $('.main-menu').removeClass('active').slideUp(300);
            $('.menu-toggle').attr('aria-expanded', 'false');
        });

        // Smooth scrolling for anchor links
        $('a[href^="#"]').on('click', function(event) {
            var target = $(this.getAttribute('href'));
            if (target.length) {
                event.preventDefault();
                $('html, body').stop().animate({
                    scrollTop: target.offset().top - 80
                }, 1000);
            }
        });

        // Header scroll effect
        $(window).on('scroll', function() {
            var scroll = $(window).scrollTop();
            if (scroll >= 100) {
                $('.site-header').addClass('scrolled');
            } else {
                $('.site-header').removeClass('scrolled');
            }
        });

        // Lazy loading for images
        if ('IntersectionObserver' in window) {
            const imageObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        img.src = img.dataset.src;
                        img.classList.remove('lazy');
                        imageObserver.unobserve(img);
                    }
                });
            });

            document.querySelectorAll('img[data-src]').forEach(img => {
                imageObserver.observe(img);
            });
        }

        // Search form enhancement
        $('.search-form').on('submit', function(e) {
            var query = $(this).find('input[type="search"]').val().trim();
            if (query === '') {
                e.preventDefault();
                $(this).find('input[type="search"]').focus();
                return false;
            }
        });

        // Back to top button
        var backToTop = $('<button class="back-to-top" aria-label="Retour en haut">↑</button>');
        $('body').append(backToTop);

        $(window).on('scroll', function() {
            if ($(this).scrollTop() > 300) {
                backToTop.addClass('visible');
            } else {
                backToTop.removeClass('visible');
            }
        });

        backToTop.on('click', function() {
            // Utiliser GSAP pour un scroll fluide si disponible
            if (typeof gsap !== 'undefined') {
                gsap.to(window, {
                    duration: 1,
                    scrollTo: 0,
                    ease: 'power2.inOut'
                });
            } else {
                // Fallback jQuery
                $('html, body').animate({
                    scrollTop: 0
                }, 1000);
            }
        });

        // Form validation
        $('form').on('submit', function() {
            var isValid = true;
            var requiredFields = $(this).find('[required]');
            
            requiredFields.each(function() {
                if (!$(this).val().trim()) {
                    $(this).addClass('error');
                    isValid = false;
                } else {
                    $(this).removeClass('error');
                }
            });

            if (!isValid) {
                return false;
            }
        });

        // Remove error class on input
        $('input, textarea').on('input', function() {
            $(this).removeClass('error');
        });

        // Project filter (if needed)
        $('.project-filter').on('click', 'button', function() {
            var filter = $(this).data('filter');
            $('.project-filter button').removeClass('active');
            $(this).addClass('active');
            
            if (filter === 'all') {
                $('.projet-card').show();
            } else {
                $('.projet-card').hide();
                $('.projet-card[data-category="' + filter + '"]').show();
            }
        });

        // Animate elements on scroll
        function animateOnScroll() {
            $('.animate-on-scroll').each(function() {
                var elementTop = $(this).offset().top;
                var elementBottom = elementTop + $(this).outerHeight();
                var viewportTop = $(window).scrollTop();
                var viewportBottom = viewportTop + $(window).height();

                if (elementBottom > viewportTop && elementTop < viewportBottom) {
                    $(this).addClass('animated');
                }
            });
        }
        
        // Gestion des arrière-plans dynamiques du carrousel
        function setupCarouselBackgrounds() {
            $('.slide-project').each(function() {
                var backgroundUrl = $(this).data('background');
                if (backgroundUrl) {
                    $(this).css('--project-bg', 'url(' + backgroundUrl + ')');
                }
            });
        }
        
        // Initialiser les arrière-plans du carrousel
        setupCarouselBackgrounds();

        $(window).on('scroll', animateOnScroll);
        animateOnScroll(); // Run on page load

        // Contact form AJAX (if needed)
        $('#contact-form').on('submit', function(e) {
            e.preventDefault();
            
            var form = $(this);
            var submitBtn = form.find('button[type="submit"]');
            var originalText = submitBtn.text();
            
            submitBtn.text('Envoi en cours...').prop('disabled', true);
            
            $.ajax({
                url: btlabs_ajax.ajax_url,
                type: 'POST',
                data: {
                    action: 'btlabs_contact_form',
                    nonce: btlabs_ajax.nonce,
                    formData: form.serialize()
                },
                success: function(response) {
                    if (response.success) {
                        form.html('<div class="success-message">' + response.data.message + '</div>');
                    } else {
                        form.prepend('<div class="error-message">' + response.data.message + '</div>');
                    }
                },
                error: function() {
                    form.prepend('<div class="error-message">Une erreur est survenue. Veuillez réessayer.</div>');
                },
                complete: function() {
                    submitBtn.text(originalText).prop('disabled', false);
                }
            });
        });

        // Image lightbox (simple implementation)
        $('.lightbox-trigger').on('click', function(e) {
            e.preventDefault();
            var imageSrc = $(this).attr('href');
            var imageAlt = $(this).find('img').attr('alt');
            
            var lightbox = $('<div class="lightbox">' +
                '<div class="lightbox-content">' +
                '<img src="' + imageSrc + '" alt="' + imageAlt + '">' +
                '<button class="lightbox-close">&times;</button>' +
                '</div>' +
                '</div>');
            
            $('body').append(lightbox);
            $('body').addClass('lightbox-open');
            
            lightbox.fadeIn();
        });

        $(document).on('click', '.lightbox, .lightbox-close', function() {
            $('.lightbox').fadeOut(function() {
                $(this).remove();
                $('body').removeClass('lightbox-open');
            });
        });

        // Keyboard navigation for lightbox
        $(document).on('keydown', function(e) {
            if (e.keyCode === 27 && $('.lightbox').length) { // ESC key
                $('.lightbox').trigger('click');
            }
        });

    });

    // Window load
    $(window).on('load', function() {
        // Hide loading spinner if exists
        $('.loading-spinner').fadeOut();
        
        // Initialize any plugins that need window load
        initializePlugins();
    });

    // Window resize
    $(window).on('resize', function() {
        // Handle responsive adjustments
        handleResize();
    });

    // Utility functions
    function initializePlugins() {
        // Initialize any third-party plugins here
        console.log('BTlabs theme initialized');
    }

    function handleResize() {
        // Handle responsive design adjustments
        var windowWidth = $(window).width();
        
        if (windowWidth > 768) {
            $('.main-menu').show().removeClass('active');
            $('.menu-toggle').removeClass('active');
            $('.menu-toggle').attr('aria-expanded', 'false');
        } else {
            $('.main-menu').hide().removeClass('active');
        }
    }

    // Debounce function for performance
    function debounce(func, wait, immediate) {
        var timeout;
        return function() {
            var context = this, args = arguments;
            var later = function() {
                timeout = null;
                if (!immediate) func.apply(context, args);
            };
            var callNow = immediate && !timeout;
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
            if (callNow) func.apply(context, args);
        };
    }

    // Apply debounce to scroll events
    $(window).on('scroll', debounce(function() {
        // Scroll-based animations and effects
    }, 10));

})(jQuery); 