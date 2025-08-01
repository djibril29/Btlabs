<?php get_header(); ?>

<main id="primary" class="site-main">
    <div class="container">
        <header class="page-header">
            <h1 class="page-title">
                <?php
                printf(
                    esc_html__('Résultats de recherche pour: %s', 'btlabs'),
                    '<span>' . get_search_query() . '</span>'
                );
                ?>
            </h1>
        </header>

        <?php if (have_posts()) : ?>
            <div class="search-results">
                <?php while (have_posts()) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('search-result'); ?>>
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="result-thumbnail">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('btlabs-thumbnail'); ?>
                                </a>
                            </div>
                        <?php endif; ?>
                        
                        <div class="result-content">
                            <h2 class="result-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>
                            
                            <div class="result-meta">
                                <span class="result-type"><?php echo get_post_type_object(get_post_type())->labels->singular_name; ?></span>
                                <span class="result-date"><?php echo get_the_date(); ?></span>
                            </div>
                            
                            <div class="result-excerpt">
                                <?php the_excerpt(); ?>
                            </div>
                            
                            <a href="<?php the_permalink(); ?>" class="read-more">Lire la suite</a>
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
            <div class="no-results">
                <h2>Aucun résultat trouvé</h2>
                <p>Désolé, aucun contenu ne correspond à votre recherche.</p>
                
                <div class="search-suggestions">
                    <h3>Suggestions :</h3>
                    <ul>
                        <li>Vérifiez l'orthographe des mots-clés</li>
                        <li>Essayez des mots-clés plus généraux</li>
                        <li>Essayez un nombre différent de mots-clés</li>
                    </ul>
                </div>
                
                <div class="search-form">
                    <?php get_search_form(); ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?> 