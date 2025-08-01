<?php get_header(); ?>

<main id="primary" class="site-main">
    <!-- Section Hero -->
    <section class="hero-section" style="background: linear-gradient(135deg, rgba(0, 166, 81, 0.8) 60%, rgba(55, 175, 174, 0.8) 100%), url('<?php echo get_template_directory_uri(); ?>/assets/images/Biotox-images.png'); background-size: cover; background-position: center; background-repeat: no-repeat; color: #fff; padding: 6rem 0; text-align: left; min-height: 80vh; display: flex; align-items: center;">
        <div class="container" style="max-width: 900px; margin-left: 2rem;">
            <h1 class="hero-title" style="font-family: 'Intro Rust', Arial, sans-serif; font-size: 3.5rem; color: #fff; margin-bottom: 1.5rem; text-shadow: 2px 2px 4px rgba(0,0,0,0.5); text-align: left;">BTlabs Consulting</h1>
            <p class="hero-subtitle" style="font-size: 1.5rem; margin: 1.5rem 0; text-shadow: 1px 1px 2px rgba(0,0,0,0.5); text-align: left;">l'expertise environnementale et sociale pour le bien être et la santé des communautés</p>
            <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn-primary" style="font-size: 1.2rem; padding: 1rem 2rem; border-radius: 50px; box-shadow: 0 4px 15px rgba(0,0,0,0.3); display: inline-block; text-align: left;">Contactez-nous</a>
        </div>
    </section>

     <!-- Section Presentation -->
    <section class="presentation-section" style="background: #fff; padding: 4rem 0;">
        <div class="container" style="display: flex; flex-wrap: wrap; align-items: center; justify-content: center; gap: 3rem;">
            <div class="presentation-text" style="flex: 1 1 350px; min-width: 300px;">
                <h2 style="font-family: 'Intro Rust', Arial, sans-serif; color: #37afae; margin-bottom: 1.5rem;">PRÉSENTATION</h2>
                <p style="font-size: 1.15rem; color: #333; margin-bottom: 2rem;">
                    BTLABS Consulting est un cabinet expert en évaluation des impacts environnementaux et sociaux. Nous réalisons des projets durables en collaboration avec les parties prenantes pour identifier les enjeux spécifiques. Notre approche intégrée permet de proposer des solutions innovantes qui réduisent les impacts négatifs tout en augmentant les bénéfices pour l’environnement et la société. Nous croyons fermement que le développement durable est essentiel pour un avenir prospère et équitable.
                </p>
                <a href="<?php echo esc_url(home_url('/a-propos/')); ?>" class="btn-primary" style="font-size: 1.1rem; padding: 0.9rem 2rem; border-radius: 50px; background: #37afae; color: #fff; text-decoration: none; box-shadow: 0 4px 15px rgba(0,0,0,0.1); transition: background 0.2s;">Découvrir BTLABS</a>
            </div>
            <div class="presentation-image" style="flex: 1 1 350px; min-width: 300px; display: flex; justify-content: center;">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/image-presentation.png" alt="Présentation BTLABS" style="max-width: 100%; border-radius: 20px; box-shadow: 0 6px 24px rgba(55,175,174,0.12);">
            </div>
        </div>
    </section>

    <section class="domaines-section" style="background-image:url('assets/images/domaines.png'gis); padding: 4rem 0;">
        <div class="container">
            <h2 class="section-title" style="font-family: 'Intro Rust', Arial, sans-serif; color: #37afae; margin-bottom: 2.5rem;">NOS SERVICES</h2>
            <div class="domaines-grid" style="display: flex; flex-wrap: wrap; gap: 2.5rem; justify-content: center;">
                <!-- Domaine 1 -->
                <div class="domaine-card" style="background: #fff; border-radius: 16px; box-shadow: 0 2px 12px rgba(55,175,174,0.08); padding: 2rem 1.5rem; max-width: 320px; flex: 1 1 260px; display: flex; flex-direction: column; align-items: center; text-align: center;">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/domaines/eie.png" alt="Évaluation des impacts environnementaux et sociaux" style="width: 80px; height: 80px; object-fit: contain; margin-bottom: 1.2rem;">
                    <h3 style="color: #2c5aa0; font-size: 1.25rem; margin-bottom: 1rem;">Évaluation des impacts environnementaux et sociaux (EIES)</h3>
                    <p style="color: #555;">Réalisation d’études d’impact pour anticiper, évaluer et atténuer les effets des projets sur l’environnement et les communautés.</p>
                </div>
                <!-- Domaine 2 -->
                <div class="domaine-card" style="background: #fff; border-radius: 16px; box-shadow: 0 2px 12px rgba(55,175,174,0.08); padding: 2rem 1.5rem; max-width: 320px; flex: 1 1 260px; display: flex; flex-direction: column; align-items: center; text-align: center;">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/domaines/audit.png" alt="Audit environnemental et social" style="width: 80px; height: 80px; object-fit: contain; margin-bottom: 1.2rem;">
                    <h3 style="color: #2c5aa0; font-size: 1.25rem; margin-bottom: 1rem;">Audit environnemental et social</h3>
                    <p style="color: #555;">Évaluation de la conformité des activités et projets aux normes environnementales et sociales nationales et internationales.</p>
                </div>
                <!-- Domaine 3 -->
                <div class="domaine-card" style="background: #fff; border-radius: 16px; box-shadow: 0 2px 12px rgba(55,175,174,0.08); padding: 2rem 1.5rem; max-width: 320px; flex: 1 1 260px; display: flex; flex-direction: column; align-items: center; text-align: center;">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/domaines/suivi.png" alt="Suivi environnemental et social" style="width: 80px; height: 80px; object-fit: contain; margin-bottom: 1.2rem;">
                    <h3 style="color: #2c5aa0; font-size: 1.25rem; margin-bottom: 1rem;">Suivi environnemental et social</h3>
                    <p style="color: #555;">Mise en place et suivi de plans de gestion pour garantir la durabilité et la conformité des projets sur le long terme.</p>
                </div>
                <!-- Domaine 4 -->
                <div class="domaine-card" style="background: #fff; border-radius: 16px; box-shadow: 0 2px 12px rgba(55,175,174,0.08); padding: 2rem 1.5rem; max-width: 320px; flex: 1 1 260px; display: flex; flex-direction: column; align-items: center; text-align: center;">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/domaines/formations.png" alt="Formations et renforcement de capacités" style="width: 80px; height: 80px; object-fit: contain; margin-bottom: 1.2rem;">
                    <h3 style="color: #2c5aa0; font-size: 1.25rem; margin-bottom: 1rem;">Formations et renforcement de capacités</h3>
                    <p style="color: #555;">Organisation de sessions de formation sur les thématiques environnementales et sociales pour les entreprises et les institutions.</p>
                </div>
                <!-- Domaine 5 -->
                <div class="domaine-card" style="background: #fff; border-radius: 16px; box-shadow: 0 2px 12px rgba(55,175,174,0.08); padding: 2rem 1.5rem; max-width: 320px; flex: 1 1 260px; display: flex; flex-direction: column; align-items: center; text-align: center;">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/domaines/cartographie.png" alt="Cartographie et SIG" style="width: 80px; height: 80px; object-fit: contain; margin-bottom: 1.2rem;">
                    <h3 style="color: #2c5aa0; font-size: 1.25rem; margin-bottom: 1rem;">Cartographie & SIG</h3>
                    <p style="color: #555;">Production de cartes thématiques et analyses spatiales pour la gestion et la planification environnementale.</p>
                </div>
                <!-- Domaine 6 -->
                <div class="domaine-card" style="background: #fff; border-radius: 16px; box-shadow: 0 2px 12px rgba(55,175,174,0.08); padding: 2rem 1.5rem; max-width: 320px; flex: 1 1 260px; display: flex; flex-direction: column; align-items: center; text-align: center;">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/domaines/gestion.png" alt="Gestion des déchets et pollution" style="width: 80px; height: 80px; object-fit: contain; margin-bottom: 1.2rem;">
                    <h3 style="color: #2c5aa0; font-size: 1.25rem; margin-bottom: 1rem;">Gestion des déchets & pollution</h3>
                    <p style="color: #555;">Conseil et accompagnement pour la gestion durable des déchets et la réduction de la pollution.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Services -->
    <section class="services-section" style="padding: 4rem 0; background: #f8f8f8;">
        <div class="container">
            <h2 class="section-title" style="font-family: 'Intro Rust', Arial, sans-serif; color: #37afae;">Nos Services</h2>
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
    <section class="projets-section" style="padding: 4rem 0;">
        <div class="container">
            <h2 class="section-title" style="font-family: 'Intro Rust', Arial, sans-serif; color: #37afae;">Projets récents</h2>
            <div class="projets-grid">
                <?php
                $projets = new WP_Query(array(
                    'post_type' => 'projets',
                    'posts_per_page' => 3
                ));
                if ($projets->have_posts()) :
                    while ($projets->have_posts()) : $projets->the_post(); ?>
                        <article class="projet-card">
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="projet-thumbnail">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('btlabs-card'); ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                            <div class="projet-content">
                                <h3 class="projet-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <div class="projet-excerpt"><?php the_excerpt(); ?></div>
                                <a href="<?php the_permalink(); ?>" class="read-more">Voir le projet</a>
                            </div>
                        </article>
                    <?php endwhile;
                    wp_reset_postdata();
                else : ?>
                    <p>Aucun projet disponible pour le moment.</p>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- Section Équipe -->
    <section class="equipe-section" style="padding: 4rem 0; background: #f8f8f8;">
        <div class="container">
            <h2 class="section-title" style="font-family: 'Intro Rust', Arial, sans-serif; color: #37afae;">Notre équipe</h2>
            <div class="equipe-grid">
                <?php
                $equipe = new WP_Query(array(
                    'post_type' => 'equipe',
                    'posts_per_page' => 3
                ));
                if ($equipe->have_posts()) :
                    while ($equipe->have_posts()) : $equipe->the_post(); ?>
                        <article class="membre-card">
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="membre-photo">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('btlabs-card'); ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                            <div class="membre-content">
                                <h3 class="membre-nom"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <div class="membre-excerpt"><?php the_excerpt(); ?></div>
                            </div>
                        </article>
                    <?php endwhile;
                    wp_reset_postdata();
                else : ?>
                    <p>Aucun membre d'équipe pour le moment.</p>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="cta-section" style="background: #af3774; color: #fff; text-align: center; padding: 3rem 0;">
        <div class="container">
            <h2 class="cta-title" style="font-family: 'Intro Rust', Arial, sans-serif; font-size: 2.2rem; color: #fff;">Vous avez un projet ? Discutons-en !</h2>
            <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn-primary" style="font-size: 1.2rem; margin-top: 1rem;">Demander un devis</a>
        </div>
    </section>
</main>

<?php get_footer(); ?> 