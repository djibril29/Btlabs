<?php get_header(); ?>

<main id="primary" class="site-main">
    <div class="container">
        <?php
        while (have_posts()) :
            the_post();
            ?>
            
            <article id="post-<?php the_ID(); ?>" <?php post_class('single-projet'); ?>>
                <?php get_template_part('template-parts/entry-header'); ?>

                <?php if (has_post_thumbnail()) : ?>
                    <div class="projet-thumbnail">
                        <?php the_post_thumbnail('btlabs-hero'); ?>
                    </div>
                <?php endif; ?>

                <div class="entry-content">
                    <?php
                    the_content();

                    wp_link_pages(array(
                        'before' => '<div class="page-links">' . esc_html__('Pages:', 'btlabs'),
                        'after'  => '</div>',
                    ));
                    ?>
                </div>

                <?php get_template_part('template-parts/entry-footer'); ?>
            </article>

            <?php
            // Projet navigation
            the_post_navigation(array(
                'prev_text' => '<span class="nav-subtitle">' . esc_html__('Projet précédent:', 'btlabs') . '</span> <span class="nav-title">%title</span>',
                'next_text' => '<span class="nav-subtitle">' . esc_html__('Projet suivant:', 'btlabs') . '</span> <span class="nav-title">%title</span>',
            ));

        endwhile; // End of the loop.
        ?>
        
        <!-- Related Projects -->
        <section class="related-projects">
            <h2>Projets similaires</h2>
            <div class="related-projects-grid">
                <?php
                $related_projects = new WP_Query(array(
                    'post_type' => 'projets',
                    'posts_per_page' => 3,
                    'post__not_in' => array(get_the_ID()),
                    'meta_query' => array(
                        array(
                            'key' => '_thumbnail_id',
                            'compare' => 'EXISTS'
                        ),
                    )
                ));
                
                if ($related_projects->have_posts()) :
                    while ($related_projects->have_posts()) : $related_projects->the_post();
                        ?>
                        <article class="related-projet-card">
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="related-projet-thumbnail">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('btlabs-thumbnail'); ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                            
                            <div class="related-projet-content">
                                <h3 class="related-projet-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h3>
                                <div class="related-projet-excerpt">
                                    <?php the_excerpt(); ?>
                                </div>
                            </div>
                        </article>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>
        </section>
    </div>
</main>

<?php get_footer(); ?> 