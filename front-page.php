<?php get_header(); ?>

<main id="primary" class="site-main">
    <!-- Section Hero -->
    <section class="hero-section" style="background: linear-gradient(135deg, rgba(0, 166, 81, 0.8) 60%, rgba(55, 175, 174, 0.8) 100%), url('<?php echo get_template_directory_uri(); ?>/assets/images/Biotox-images.png'); background-size: cover; background-position: center; background-repeat: no-repeat; color: #fff; padding: 6rem 0; text-align: center; min-height: 80vh; display: flex; align-items: center;">
        <div class="container">
            <h1 class="hero-title" style="font-family: 'Intro Rust', Arial, sans-serif; font-size: 3.5rem; color: #fff; margin-bottom: 1.5rem; text-shadow: 2px 2px 4px rgba(0,0,0,0.5);">Bienvenue chez BTlabs</h1>
            <p class="hero-subtitle" style="font-size: 1.5rem; margin: 1.5rem 0; text-shadow: 1px 1px 2px rgba(0,0,0,0.5);">Cabinet d'étude environnementale et sociale</p>
            <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn-primary" style="font-size: 1.2rem; padding: 1rem 2rem; border-radius: 50px; box-shadow: 0 4px 15px rgba(0,0,0,0.3);">Contactez-nous</a>
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