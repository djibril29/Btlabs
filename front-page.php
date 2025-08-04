<?php get_header(); ?>

<main id="primary" class="site-main">
    <!-- Carrousel Hero -->
    <section class="hero-carousel">
        <!-- Fil d'Ariane -->
        <div class="breadcrumb-trail">
            <span>Accueil</span>
            <span>›</span>
            <span>Découvrez nos projets</span>
        </div>

        <!-- Slides -->
        <div class="carousel-container">
            
            <!-- Slide 1: Présentation -->
            <div class="carousel-slide active" style="background: linear-gradient(135deg, rgba(0, 166, 81, 0.8) 60%, rgba(55, 175, 174, 0.8) 100%), url('<?php echo get_template_directory_uri(); ?>/assets/images/Biotox-images.png');">
                <div class="container">
                    <div class="hero-content">
                        <div class="slide-indicator">
                            <span class="slide-number">1</span> / <span class="total-slides">3</span>
                        </div>
                        <h1 class="hero-title" style="animation: slideInLeft 1s ease-out;">BTlabs Consulting</h1>
                        <p class="hero-subtitle" style="animation: slideInLeft 1s ease-out 0.3s both;">l'expertise environnementale et sociale pour le bien être et la santé des communautés</p>
                        <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn-primary" style="animation: slideInLeft 1s ease-out 0.6s both;">Contactez-nous</a>
                    </div>
                </div>
            </div>

            <!-- Slides des projets récents -->
            <?php
            $recent_projects = new WP_Query(array(
                'post_type' => 'projets',
                'posts_per_page' => 2,
                'post_status' => 'publish',
                'orderby' => 'date',
                'order' => 'DESC',
                'meta_query' => array(
                    array(
                        'key' => '_thumbnail_id',
                        'compare' => 'EXISTS'
                    ),
                )
            ));
            
            $slide_number = 2;
            if ($recent_projects->have_posts()) :
                while ($recent_projects->have_posts()) : $recent_projects->the_post();
                    $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'btlabs-hero');
                    if (!$thumbnail_url) {
                        $thumbnail_url = get_template_directory_uri() . '/assets/images/Biotox-images.png';
                    }
                    ?>
                    <div class="carousel-slide" style="background: linear-gradient(135deg, rgba(0, 166, 81, 0.7) 0%, rgba(55, 175, 174, 0.7) 100%), url('<?php echo esc_url($thumbnail_url); ?>');">
                        <div class="container">
                            <div class="hero-content">
                                <div class="slide-indicator">
                                    <span class="slide-number"><?php echo $slide_number; ?></span> / <span class="total-slides">3</span>
                                </div>
                                
                                <!-- Badge du projet -->
                                <div class="project-badge">
                                    <i class="fas fa-project-diagram"></i>
                                    Projet Récent
                                </div>
                                
                                <h2 class="project-title" style="animation: slideInLeft 1s ease-out;">
                                    <?php the_title(); ?>
                                </h2>
                                
                                <p class="project-excerpt" style="animation: slideInLeft 1s ease-out 0.3s both;">
                                    <?php echo wp_trim_words(get_the_excerpt(), 25, '...'); ?>
                                </p>
                                
                                <div class="project-actions" style="animation: slideInLeft 1s ease-out 0.6s both;">
                                    <a href="<?php the_permalink(); ?>" class="btn-primary">
                                        <i class="fas fa-eye"></i>
                                        Voir le projet
                                    </a>
                                    <a href="<?php echo esc_url(home_url('/projets/')); ?>" class="btn-secondary">
                                        <i class="fas fa-th-large"></i>
                                        Tous les projets
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    $slide_number++;
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>

        <!-- Navigation du carrousel -->
        <div class="carousel-nav">
            <button class="nav-dot active" data-slide="0"></button>
            <button class="nav-dot" data-slide="1"></button>
            <button class="nav-dot" data-slide="2"></button>
        </div>

        <!-- Boutons de navigation -->
        <button class="carousel-btn prev">
            <i class="fas fa-chevron-left"></i>
        </button>
        <button class="carousel-btn next">
            <i class="fas fa-chevron-right"></i>
        </button>
    </section>

    <!-- JavaScript pour le carrousel -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const slides = document.querySelectorAll('.carousel-slide');
        const dots = document.querySelectorAll('.nav-dot');
        const prevBtn = document.querySelector('.carousel-btn.prev');
        const nextBtn = document.querySelector('.carousel-btn.next');
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
        carousel.addEventListener('mouseenter', stopAutoPlay);
        carousel.addEventListener('mouseleave', startAutoPlay);

        // Navigation au clavier
        document.addEventListener('keydown', function(e) {
            if (e.key === 'ArrowLeft') {
                prevSlide();
            } else if (e.key === 'ArrowRight') {
                nextSlide();
            }
        });

        // Swipe pour mobile (optionnel)
        let touchStartX = 0;
        let touchEndX = 0;

        carousel.addEventListener('touchstart', e => {
            touchStartX = e.changedTouches[0].screenX;
        });

        carousel.addEventListener('touchend', e => {
            touchEndX = e.changedTouches[0].screenX;
            handleSwipe();
        });

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
    </script>

     <!-- Section Presentation -->
    <section class="presentation-section">
        <div class="container">
            <div class="presentation-grid">
                <div class="presentation-text">
                    <h2>PRÉSENTATION</h2>
                    <p>
                        BTLABS Consulting est un cabinet expert en évaluation des impacts environnementaux et sociaux. Nous réalisons des projets durables en collaboration avec les parties prenantes pour identifier les enjeux spécifiques. Notre approche intégrée permet de proposer des solutions innovantes qui réduisent les impacts négatifs tout en augmentant les bénéfices pour l'environnement et la société. Nous croyons fermement que le développement durable est essentiel pour un avenir prospère et équitable.
                    </p>
                    <a href="<?php echo esc_url(home_url('/a-propos/')); ?>" class="btn-primary">Découvrir BTLABS</a>
                </div>
                <div class="presentation-image">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/image-presentation.png" alt="Présentation BTLABS">
                </div>
            </div>
        </div>
    </section>
    
<!-- Section Domaines -->
    <section class="domaines-section" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/domaines.png'); background-size: cover; background-position: center; background-repeat: no-repeat; padding: 4rem 0 6rem 0;">
        <div class="container">
            <h2 class="section-title">NOS SERVICES</h2>
            <div class="domaines-grid">
                <!-- Domaine 1 -->
                <div class="domaine-card">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/domaines/eie.png" alt="Évaluation des impacts environnementaux et sociaux">
                    <h3>Évaluation des impacts environnementaux et sociaux (EIES)</h3>
                    <p>Réalisation d'études d'impact pour anticiper, évaluer et atténuer les effets des projets sur l'environnement et les communautés.</p>
                </div>
                <!-- Domaine 2 -->
                <div class="domaine-card">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/domaines/audit.png" alt="Audit environnemental et social">
                    <h3>Audit environnemental et social</h3>
                    <p>Évaluation de la conformité des activités et projets aux normes environnementales et sociales nationales et internationales.</p>
                </div>
                <!-- Domaine 3 -->
                <div class="domaine-card">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/domaines/suivi.png" alt="Suivi environnemental et social">
                    <h3>Suivi environnemental et social</h3>
                    <p>Mise en place et suivi de plans de gestion pour garantir la durabilité et la conformité des projets sur le long terme.</p>
                </div>
                <!-- Domaine 4 -->
                <div class="domaine-card">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/domaines/formations.png" alt="Formations et renforcement de capacités">
                    <h3>Formations et renforcement de capacités</h3>
                    <p>Organisation de sessions de formation sur les thématiques environnementales et sociales pour les entreprises et les institutions.</p>
                </div>
                <!-- Domaine 5 -->
                <div class="domaine-card">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/domaines/cartographie.png" alt="Cartographie et SIG">
                    <h3>Cartographie & SIG</h3>
                    <p>Production de cartes thématiques et analyses spatiales pour la gestion et la planification environnementale.</p>
                </div>
                <!-- Domaine 6 -->
                <div class="domaine-card">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/domaines/gestion.png" alt="Gestion des déchets et pollution">
                    <h3>Gestion des déchets & pollution</h3>
                    <p>Conseil et accompagnement pour la gestion durable des déchets et la réduction de la pollution.</p>
                </div>
            </div>
        </div>
    </section>

   

    <!-- Section Services -->
    <section class="services-section">
        <div class="container">
            <h2 class="section-title">Nos Services</h2>
            <div class="services-grid">
                <?php
                $services = new WP_Query(array(
                    'post_type' => 'services',
                    'posts_per_page' => 3
                ));
                if ($services->have_posts()) :
                    while ($services->have_posts()) : $services->the_post(); ?>
                        <article class="service-card">
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="service-thumbnail">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('btlabs-card'); ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                            <div class="service-content">
                                <h3 class="service-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <div class="service-excerpt"><?php the_excerpt(); ?></div>
                                <a href="<?php the_permalink(); ?>" class="read-more">En savoir plus</a>
                            </div>
                        </article>
                    <?php endwhile;
                    wp_reset_postdata();
                else : ?>
                    <p>Aucun service disponible pour le moment.</p>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- Section Projets récents -->
    <section class="projets-section">
        <div class="container">
            <h2 class="section-title">Projets récents</h2>
            <div class="projets-grid">
                <?php
                // Version 1: Requête avec image à la une (priorité)
                $projets = new WP_Query(array(
                    'post_type' => 'projets',
                    'posts_per_page' => 3,
                    'post_status' => 'publish',
                    'orderby' => 'date',
                    'order' => 'DESC',
                    'meta_query' => array(
                        array(
                            'key' => '_thumbnail_id',
                            'compare' => 'EXISTS'
                        ),
                    )
                ));
                
                // Si aucun projet avec image, essayer sans cette condition
                if (!$projets->have_posts()) {
                    $projets = new WP_Query(array(
                        'post_type' => 'projets',
                        'posts_per_page' => 3,
                        'post_status' => 'publish',
                        'orderby' => 'date',
                        'order' => 'DESC'
                    ));
                }
                
                // Débogage (à retirer en production)
                if (current_user_can('administrator')) {
                    echo '<!-- Debug: Nombre de projets trouvés: ' . $projets->found_posts . ' -->';
                    echo '<!-- Debug: Post type: projets -->';
                    echo '<!-- Debug: Query: ' . $projets->request . ' -->';
                }
                
                if ($projets->have_posts()) :
                    while ($projets->have_posts()) : $projets->the_post(); ?>
                        <article class="projet-card">
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="projet-thumbnail">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('btlabs-card', array('style' => 'width: 100%; height: 250px; object-fit: cover; transition: transform 0.3s ease;')); ?>
                                    </a>
                                    <div class="projet-overlay">
                                        <span>Voir le projet</span>
                                    </div>
                                </div>
                            <?php else : ?>
                                <!-- Image par défaut si pas d'image à la une -->
                                <div class="projet-thumbnail" style="position: relative; overflow: hidden; background: linear-gradient(135deg, #00a651 0%, #37afae 100%); height: 250px; display: flex; align-items: center; justify-content: center;">
                                    <div style="text-align: center; color: #fff;">
                                        <i class="fas fa-project-diagram" style="font-size: 3rem; margin-bottom: 1rem; opacity: 0.7;"></i>
                                        <p style="margin: 0; font-size: 1.1rem; opacity: 0.9;">Projet BTLabs</p>
                                    </div>
                                </div>
                            <?php endif; ?>
                            
                            <div class="projet-content">
                                <h3 class="projet-title">
                                    <a href="<?php the_permalink(); ?>" style="color: var(--secondary-title); text-decoration: none; font-size: 1.3rem; font-weight: 600;"><?php the_title(); ?></a>
                                </h3>
                                
                                <div class="projet-meta">
                                    <?php
                                    $categories = get_the_terms(get_the_ID(), 'categorie_projet');
                                    if ($categories && !is_wp_error($categories)) {
                                        echo '<span class="projet-category" style="background: var(--primary-color); color: #fff; padding: 0.3rem 0.8rem; border-radius: 15px; font-size: 0.8rem;">';
                                        echo esc_html($categories[0]->name);
                                        echo '</span>';
                                    }
                                    ?>
                                    <span class="projet-date">
                                        <?php echo get_the_date('d/m/Y'); ?>
                                    </span>
                                </div>
                                
                                <div class="projet-excerpt">
                                    <?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?>
                                </div>
                                
                                <a href="<?php the_permalink(); ?>" class="read-more">
                                    Découvrir le projet
                                </a>
                            </div>
                        </article>
                    <?php endwhile;
                    wp_reset_postdata();
                else : ?>
                    <div style="text-align: center; padding: 3rem; background: #f8f9fa; border-radius: 15px; border: 2px dashed #ddd;">
                        <h3 style="color: #666; margin-bottom: 1rem;">Aucun projet disponible pour le moment</h3>
                        <p style="color: #888; margin-bottom: 2rem;">Nous travaillons actuellement sur de nouveaux projets passionnants. Revenez bientôt !</p>
                        <a href="<?php echo esc_url(home_url('/projets/')); ?>" class="btn-primary">
                            Voir tous nos projets
                        </a>
                    </div>
                <?php endif; ?>
            </div>
            
            <!-- Bouton "Voir tous les projets" -->
            <?php if ($projets->have_posts()) : ?>
                <div style="text-align: center; margin-top: 3rem;">
                    <a href="<?php echo esc_url(home_url('/projets/')); ?>" class="btn-primary">
                        Voir tous nos projets
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <style>
    /* Styles pour les interactions hover des cartes de projets */
    .projet-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 40px rgba(0,0,0,0.15);
    }
    
    .projet-card:hover .projet-overlay {
        opacity: 1;
    }
    
    .projet-card:hover .projet-thumbnail img {
        transform: scale(1.1);
    }
    
    .projet-card .read-more:hover {
        background: var(--highlight) !important;
        transform: translateY(-2px);
    }
    
    /* Responsive pour la grille de projets */
    @media (max-width: 768px) {
        .projets-grid {
            grid-template-columns: 1fr !important;
            gap: 1.5rem !important;
        }
    }
    </style>
     <!-- Section Partenaires -->
     <section class="partenaires-section">
        <div class="container">
            <h2 class="section-title">ILS NOUS FONT CONFIANCE</h2>
            <div class="partenaires-grid">
                <!-- Partenaire 1 -->
                <div class="partenaire-logo">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/partenaires/partenaire1.png" alt="Ministère de l'Environnement">
                </div>
                <!-- Partenaire 2 -->
                <div class="partenaire-logo">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/partenaires/partenaire2.png" alt="Banque Mondiale">
                </div>
                <!-- Partenaire 3 -->
                <div class="partenaire-logo">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/partenaires/partenaire3.png" alt="PNUD">
                </div>
                <!-- Partenaire 4 -->
                <div class="partenaire-logo">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/partenaires/partenaire4.png" alt="AFD">
                </div>
                <!-- Partenaire 5 -->
                <div class="partenaire-logo">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/partenaires/partenaire5.png" alt="Union Européenne">
                </div>
                <!-- Partenaire 6 -->
                <div class="partenaire-logo">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/partenaires/partenaire6.png" alt="ONG Internationales">
                </div>
            </div>
        </div>
    </section>

    
    <!-- Call to Action -->
    <section class="cta-section">
        <div class="container">
            <h2 class="cta-title">Vous avez un projet ? Discutons-en !</h2>
            <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn-primary">Demander un devis</a>
        </div>
    </section>
</main>

<?php get_footer(); ?> 