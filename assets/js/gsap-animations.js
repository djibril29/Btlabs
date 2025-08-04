/**
 * GSAP Animations pour le thème BTlabs
 * Animations fluides et performantes pour améliorer l'expérience utilisateur
 */

// Enregistrer les plugins GSAP
gsap.registerPlugin(ScrollTrigger, TextPlugin);

// Attendre que le DOM soit prêt
document.addEventListener('DOMContentLoaded', function() {
    
    // ===== ANIMATIONS DU CARROUSEL HERO =====
    
    // Animation d'entrée des éléments du carrousel
    function animateCarouselElements() {
        const heroTitle = document.querySelector('.hero-title');
        const heroSubtitle = document.querySelector('.hero-subtitle');
        const projectTitle = document.querySelector('.project-title');
        const projectExcerpt = document.querySelector('.project-excerpt');
        const projectActions = document.querySelector('.project-actions');
        const slideIndicator = document.querySelector('.slide-indicator');
        const projectBadge = document.querySelector('.project-badge');
        
        // Timeline pour les animations séquentielles
        const tl = gsap.timeline({ defaults: { ease: 'power2.out' } });
        
        // Animation du titre principal
        if (heroTitle) {
            tl.from(heroTitle, {
                duration: 1.2,
                x: -100,
                opacity: 0,
                delay: 0.3
            });
        }
        
        // Animation du sous-titre
        if (heroSubtitle) {
            tl.from(heroSubtitle, {
                duration: 1,
                x: -100,
                opacity: 0
            }, '-=0.8');
        }
        
        // Animation du titre de projet
        if (projectTitle) {
            tl.from(projectTitle, {
                duration: 1.2,
                x: -100,
                opacity: 0
            }, '-=0.8');
        }
        
        // Animation de l'extrait de projet
        if (projectExcerpt) {
            tl.from(projectExcerpt, {
                duration: 1,
                x: -100,
                opacity: 0
            }, '-=0.8');
        }
        
        // Animation des actions de projet
        if (projectActions) {
            tl.from(projectActions, {
                duration: 0.8,
                y: 30,
                opacity: 0
            }, '-=0.6');
        }
        
        // Animation de l'indicateur de slide
        if (slideIndicator) {
            tl.from(slideIndicator, {
                duration: 0.6,
                y: -20,
                opacity: 0
            }, '-=0.4');
        }
        
        // Animation du badge projet
        if (projectBadge) {
            tl.from(projectBadge, {
                duration: 0.6,
                scale: 0.8,
                opacity: 0
            }, '-=0.4');
        }
    }
    
    // Exécuter les animations du carrousel
    animateCarouselElements();
    
    // ===== ANIMATIONS AU SCROLL =====
    
    // Animation des titres de sections
    gsap.from('.section-title', {
        duration: 1,
        y: 50,
        opacity: 0,
        scrollTrigger: {
            trigger: '.section-title',
            start: 'top 80%',
            end: 'bottom 20%',
            toggleActions: 'play none none reverse'
        }
    });
    
    // Animation des cartes de domaines
    gsap.from('.domaine-card', {
        duration: 0.8,
        y: 50,
        opacity: 0,
        stagger: 0.1,
        scrollTrigger: {
            trigger: '.domaines-grid',
            start: 'top 80%',
            end: 'bottom 20%',
            toggleActions: 'play none none reverse'
        }
    });
    
    // Animation des logos partenaires
    gsap.from('.partenaire-logo', {
        duration: 0.6,
        scale: 0.8,
        opacity: 0,
        stagger: 0.1,
        scrollTrigger: {
            trigger: '.partenaires-grid',
            start: 'top 80%',
            end: 'bottom 20%',
            toggleActions: 'play none none reverse'
        }
    });
    
    // Animation des cartes de services
    gsap.from('.service-card', {
        duration: 0.8,
        y: 50,
        opacity: 0,
        stagger: 0.1,
        scrollTrigger: {
            trigger: '.services-grid',
            start: 'top 80%',
            end: 'bottom 20%',
            toggleActions: 'play none none reverse'
        }
    });
    
    // Animation des cartes de projets
    gsap.from('.projet-card', {
        duration: 0.8,
        y: 50,
        opacity: 0,
        stagger: 0.1,
        scrollTrigger: {
            trigger: '.projets-grid',
            start: 'top 80%',
            end: 'bottom 20%',
            toggleActions: 'play none none reverse'
        }
    });
    
    // Animation des cartes équipe
    gsap.from('.membre-card', {
        duration: 0.8,
        y: 50,
        opacity: 0,
        stagger: 0.1,
        scrollTrigger: {
            trigger: '.equipe-grid',
            start: 'top 80%',
            end: 'bottom 20%',
            toggleActions: 'play none none reverse'
        }
    });
    
    // ===== ANIMATIONS DE LA SECTION CTA =====
    
    gsap.from('.cta-section', {
        duration: 1.2,
        backgroundPosition: '0% 0%',
        scrollTrigger: {
            trigger: '.cta-section',
            start: 'top 80%',
            end: 'bottom 20%',
            scrub: 1
        }
    });
    
    gsap.from('.cta-title', {
        duration: 1,
        y: 30,
        opacity: 0,
        scrollTrigger: {
            trigger: '.cta-section',
            start: 'top 80%',
            end: 'bottom 20%',
            toggleActions: 'play none none reverse'
        }
    });
    
    // ===== ANIMATIONS DES BOUTONS =====
    
    // Animation hover des boutons
    const buttons = document.querySelectorAll('.btn-primary, .btn-secondary');
    buttons.forEach(button => {
        button.addEventListener('mouseenter', function() {
            gsap.to(this, {
                duration: 0.3,
                scale: 1.05,
                ease: 'power2.out'
            });
        });
        
        button.addEventListener('mouseleave', function() {
            gsap.to(this, {
                duration: 0.3,
                scale: 1,
                ease: 'power2.out'
            });
        });
    });
    
    // ===== ANIMATIONS DU CARROUSEL (Navigation) =====
    
    // Animation de transition entre les slides
    function animateSlideTransition(currentSlide, nextSlide) {
        const tl = gsap.timeline();
        
        tl.to(currentSlide, {
            duration: 0.8,
            opacity: 0,
            x: -50,
            ease: 'power2.inOut'
        })
        .from(nextSlide, {
            duration: 0.8,
            opacity: 0,
            x: 50,
            ease: 'power2.inOut'
        }, '-=0.8');
    }
    
    // ===== ANIMATIONS RESPONSIVE =====
    
    // Désactiver certaines animations sur mobile pour les performances
    if (window.innerWidth <= 768) {
        ScrollTrigger.getAll().forEach(trigger => {
            if (trigger.vars.stagger) {
                trigger.vars.stagger = 0.05; // Réduire le stagger sur mobile
            }
        });
    }
    
    // ===== ANIMATIONS DE CHARGEMENT =====
    
    // Animation d'entrée de la page
    gsap.from('body', {
        duration: 0.5,
        opacity: 0,
        ease: 'power2.out'
    });
    
    // ===== OPTIMISATIONS DE PERFORMANCE =====
    
    // Pause des animations quand la page n'est pas visible
    document.addEventListener('visibilitychange', function() {
        if (document.hidden) {
            gsap.globalTimeline.pause();
        } else {
            gsap.globalTimeline.resume();
        }
    });
    
    // ===== ANIMATIONS SPÉCIALES =====
    
    // Animation du breadcrumb trail
    gsap.from('.breadcrumb-trail', {
        duration: 0.8,
        y: -20,
        opacity: 0,
        delay: 0.5
    });
    
    // Animation des points de navigation du carrousel
    gsap.from('.nav-dot', {
        duration: 0.6,
        scale: 0,
        opacity: 0,
        stagger: 0.1,
        delay: 1
    });
    
    // Animation des boutons de navigation du carrousel
    gsap.from('.carousel-btn', {
        duration: 0.6,
        x: function(index) {
            return index === 0 ? -30 : 30;
        },
        opacity: 0,
        delay: 1.2
    });
    
    console.log('🎬 GSAP Animations BTlabs chargées avec succès !');
});

// ===== FONCTIONS UTILITAIRES =====

// Fonction pour animer un élément spécifique
function animateElement(selector, animation) {
    const element = document.querySelector(selector);
    if (element) {
        gsap.from(element, animation);
    }
}

// Fonction pour créer une animation de parallax
function createParallax(selector, speed = 0.5) {
    gsap.to(selector, {
        yPercent: -50 * speed,
        ease: 'none',
        scrollTrigger: {
            trigger: selector,
            start: 'top bottom',
            end: 'bottom top',
            scrub: true
        }
    });
}

// Export des fonctions pour utilisation externe
window.BTlabsGSAP = {
    animateElement,
    createParallax,
    animateSlideTransition: function(current, next) {
        // Fonction pour les transitions de carrousel
    }
}; 