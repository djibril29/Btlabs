<?php get_header(); // Load the header template ?>

<main class="site-main">
    <div class="container">
        <?php if (have_posts()) : // If there are posts to display ?>
            <div class="posts-grid">
                <?php while (have_posts()) : the_post(); // Loop through posts ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('post-card'); ?>>
                        <?php if (has_post_thumbnail()) : // Display featured image if available ?>
                            <div class="post-thumbnail">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('medium'); ?>
                                </a>
                            </div>
                        <?php endif; ?>

                        <div class="post-content">
                            <h2 class="post-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>

                            <div class="post-meta">
                                <span class="post-date"><?php echo get_the_date(); ?></span>
                                <span class="post-author">par <?php the_author(); ?></span>
                            </div>

                            <div class="post-excerpt">
                                <?php the_excerpt(); // Automatic excerpt of the post ?>
                            </div>

                            <a href="<?php the_permalink(); ?>" class="read-more">Lire la suite</a>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>

            <?php
            // Display pagination links for multiple pages of posts
            the_posts_pagination(array(
                'mid_size'  => 2,
                'prev_text' => '&laquo; Précédent',
                'next_text' => 'Suivant &raquo;',
            ));
            ?>

        <?php else : // If no posts were found ?>
            <div class="no-posts">
                <h2>Aucun article trouvé</h2>
                <p>Désolé, aucun article ne correspond à votre recherche.</p>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); // Load the footer template ?>
