<?php get_header(); ?>

<main id="primary" class="site-main">
    <div class="container">
        <header class="page-header">
            <h1 class="page-title">Notre Équipe</h1>
            <div class="page-description">
                <p>Rencontrez nos experts en études environnementales et sociales.</p>
            </div>
        </header>

        <?php if (have_posts()) : ?>
            <div class="equipe-grid">
                <?php while (have_posts()) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('membre-card'); ?>>
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="membre-photo">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('btlabs-card'); ?>
                                </a>
                            </div>
                        <?php endif; ?>
                        
                        <div class="membre-content">
                            <h2 class="membre-nom">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>
                            
                            <div class="membre-fonction">
                                <?php
                                $fonction = get_post_meta(get_the_ID(), 'fonction', true);
                                if ($fonction) {
                                    echo '<span class="fonction">' . esc_html($fonction) . '</span>';
                                }
                                ?>
                            </div>
                            
                            <div class="membre-excerpt">
                                <?php the_excerpt(); ?>
                            </div>
                            
                            <a href="<?php the_permalink(); ?>" class="read-more">Voir le profil</a>
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
            <div class="no-membres">
                <h2>Aucun membre trouvé</h2>
                <p>Désolé, aucun membre ne correspond à votre recherche.</p>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?> 