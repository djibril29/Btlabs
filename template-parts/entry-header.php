<?php
/**
 * Template part for displaying entry headers
 * 
 * @package BTlabs
 */

$post_type = get_post_type();
?>

<header class="entry-header">
    <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
    
    <div class="entry-meta">
        <?php if ($post_type === 'projets') : ?>
            <?php
            $categories = get_the_terms(get_the_ID(), 'categorie_projet');
            if ($categories && !is_wp_error($categories)) {
                echo '<span class="projet-categories">';
                echo '<strong>Catégories:</strong> ';
                foreach ($categories as $category) {
                    echo '<a href="' . esc_url(get_term_link($category)) . '">' . esc_html($category->name) . '</a>';
                }
                echo '</span>';
            }
            ?>
            <span class="projet-date">
                <?php echo get_the_date(); ?>
            </span>
        <?php else : ?>
            <span class="posted-on">
                <?php
                printf(
                    esc_html__('Publié le %s', 'btlabs'),
                    '<time class="entry-date published" datetime="' . esc_attr(get_the_date(DATE_W3C)) . '">' . esc_html(get_the_date()) . '</time>'
                );
                ?>
            </span>
            
            <span class="byline">
                <?php
                printf(
                    esc_html__('par %s', 'btlabs'),
                    '<span class="author vcard"><a class="url fn n" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a></span>'
                );
                ?>
            </span>
            
            <?php if (has_category()) : ?>
                <span class="cat-links">
                    <?php the_category(', '); ?>
                </span>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</header>