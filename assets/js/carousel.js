/**
 * Hero Carousel JavaScript
 * BTlabs Theme
 */

document.addEventListener('DOMContentLoaded', function() {
    const slides = document.querySelectorAll('.carousel-slide');
    const dots = document.querySelectorAll('.nav-dot');
    const prevBtn = document.querySelector('.carousel-btn.prev');
    const nextBtn = document.querySelector('.carousel-btn.next');
    
    // Exit if carousel elements don't exist
    if (!slides.length || !dots.length || !prevBtn || !nextBtn) {
        return;
    }
    
    let currentSlide = 0;
    let slideInterval;

    // Fonction pour changer de slide
    function goToSlide(index) {
        // Masquer toutes les slides
        slides.forEach(slide => {
            slide.style.opacity = '0';
            slide.classList.remove('active');
        });
        
        // Désactiver tous les dots
        dots.forEach(dot => dot.classList.remove('active'));
        
        // Afficher la slide actuelle
        slides[index].style.opacity = '1';
        slides[index].classList.add('active');
        dots[index].classList.add('active');
        
        currentSlide = index;
    }

    // Fonction pour passer à la slide suivante
    function nextSlide() {
        const next = (currentSlide + 1) % slides.length;
        goToSlide(next);
    }

    // Fonction pour passer à la slide précédente
    function prevSlide() {
        const prev = (currentSlide - 1 + slides.length) % slides.length;
        goToSlide(prev);
    }

    // Événements pour les boutons de navigation
    nextBtn.addEventListener('click', nextSlide);
    prevBtn.addEventListener('click', prevSlide);

    // Événements pour les dots
    dots.forEach((dot, index) => {
        dot.addEventListener('click', () => goToSlide(index));
    });

    // Auto-play du carrousel
    function startAutoPlay() {
        slideInterval = setInterval(nextSlide, 5000); // Change toutes les 5 secondes
    }

    function stopAutoPlay() {
        clearInterval(slideInterval);
    }

    // Démarrer l'auto-play
    startAutoPlay();

    // Arrêter l'auto-play au survol
    const carousel = document.querySelector('.hero-carousel');
    if (carousel) {
        carousel.addEventListener('mouseenter', stopAutoPlay);
        carousel.addEventListener('mouseleave', startAutoPlay);
    }

    // Navigation au clavier
    document.addEventListener('keydown', function(e) {
        if (e.key === 'ArrowLeft') {
            prevSlide();
        } else if (e.key === 'ArrowRight') {
            nextSlide();
        }
    });

    // Swipe pour mobile
    let touchStartX = 0;
    let touchEndX = 0;

    if (carousel) {
        carousel.addEventListener('touchstart', e => {
            touchStartX = e.changedTouches[0].screenX;
        });

        carousel.addEventListener('touchend', e => {
            touchEndX = e.changedTouches[0].screenX;
            handleSwipe();
        });
    }

    function handleSwipe() {
        const swipeThreshold = 50;
        const diff = touchStartX - touchEndX;
        
        if (Math.abs(diff) > swipeThreshold) {
            if (diff > 0) {
                nextSlide(); // Swipe gauche
            } else {
                prevSlide(); // Swipe droite
            }
        }
    }
});