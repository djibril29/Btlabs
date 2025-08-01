<?php get_header(); ?>

<main id="primary" class="site-main">
    <div class="container">
        <header class="page-header">
            <h1 class="page-title">Nos Projets</h1>
            <div class="page-description">
                <p>Découvrez nos réalisations en matière d'études environnementales et sociales.</p>
            </div>
        </header>

        <?php if (have_posts()) : ?>
            <div class="projets-grid">
                <?php while (have_posts()) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('projet-card'); ?>>
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="projet-thumbnail">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('btlabs-card'); ?>
                                </a>
                            </div>
                        <?php endif; ?>
                        
                        <div class="projet-content">
                            <h2 class="projet-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>
                            
                            <div class="projet-meta">
                                <?php
                                $categories = get_the_terms(get_the_ID(), 'categorie_projet');
                                if ($categories && !is_wp_error($categories)) {
                                    echo '<span class="projet-category">';
                                    foreach ($categories as $category) {
                                        echo '<a href="' . esc_url(get_term_link($category)) . '">' . esc_html($category->name) . '</a>';
                                    }
                                    echo '</span>';
                                }
                                ?>
                            </div>
                            
                            <div class="projet-excerpt">
                                <?php the_excerpt(); ?>
                            </div>
                            
                            <a href="<?php the_permalink(); ?>" class="read-more">Voir le projet</a>
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
            <div class="no-projets">
                <h2>Aucun projet trouvé</h2>
                <p>Désolé, aucun projet ne correspond à votre recherche.</p>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?> 