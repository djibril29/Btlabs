<?php get_header(); ?>

<main id="primary" class="site-main">
    <div class="container">
        <header class="page-header">
            <h1 class="page-title">Nos Services</h1>
            <div class="page-description">
                <p>Découvrez notre gamme complète de services en études environnementales et sociales.</p>
            </div>
        </header>

        <?php if (have_posts()) : ?>
            <div class="services-grid">
                <?php while (have_posts()) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('service-card'); ?>>
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="service-thumbnail">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('btlabs-card'); ?>
                                </a>
                            </div>
                        <?php endif; ?>
                        
                        <div class="service-content">
                            <h2 class="service-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>
                            
                            <div class="service-meta">
                                <?php
                                $types = get_the_terms(get_the_ID(), 'type_service');
                                if ($types && !is_wp_error($types)) {
                                    echo '<span class="service-type">';
                                    foreach ($types as $type) {
                                        echo '<a href="' . esc_url(get_term_link($type)) . '">' . esc_html($type->name) . '</a>';
                                    }
                                    echo '</span>';
                                }
                                ?>
                            </div>
                            
                            <div class="service-excerpt">
                                <?php the_excerpt(); ?>
                            </div>
                            
                            <a href="<?php the_permalink(); ?>" class="read-more">En savoir plus</a>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>
            
            <?php
            // Pagination
            the_posts_pagination(array(
                'mid_size' => 2,
                'prev_text' => '&laquo; Précédent',
                'next_text' => 'Suivant &raquo;',
            ));
            ?>
            
        <?php else : ?>
            <div class="no-services">
                <h2>Aucun service trouvé</h2>
                <p>Désolé, aucun service ne correspond à votre recherche.</p>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?> 