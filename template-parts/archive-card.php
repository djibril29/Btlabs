<?php
/**
 * Template part for displaying archive cards
 * 
 * @package BTlabs
 */

$post_type = get_post_type();
$post_id = get_the_ID();

// Get post type specific classes and data
switch ($post_type) {
    case 'equipe':
        $card_class = 'membre-card';
        $grid_class = 'equipe-grid';
        $thumbnail_class = 'membre-photo';
        $title_class = 'membre-nom';
        $content_class = 'membre-content';
        $excerpt_class = 'membre-excerpt';
        $read_more_text = 'Voir le profil';
        
        // Get custom meta
        $meta_field = get_post_meta($post_id, 'fonction', true);
        $meta_class = 'membre-fonction';
        $meta_label = '';
        break;
        
    case 'projets':
        $card_class = 'projet-card';
        $grid_class = 'projets-grid';
        $thumbnail_class = 'projet-thumbnail';
        $title_class = 'projet-title';
        $content_class = 'projet-content';
        $excerpt_class = 'projet-excerpt';
        $read_more_text = 'Voir le projet';
        
        // Get taxonomy terms
        $terms = get_the_terms($post_id, 'categorie_projet');
        $meta_class = 'projet-meta';
        break;
        
    case 'services':
        $card_class = 'service-card';
        $grid_class = 'services-grid';
        $thumbnail_class = 'service-thumbnail';
        $title_class = 'service-title';
        $content_class = 'service-content';
        $excerpt_class = 'service-excerpt';
        $read_more_text = 'En savoir plus';
        
        // Get taxonomy terms
        $terms = get_the_terms($post_id, 'type_service');
        $meta_class = 'service-meta';
        break;
        
    default:
        $card_class = 'post-card';
        $grid_class = 'posts-grid';
        $thumbnail_class = 'post-thumbnail';
        $title_class = 'post-title';
        $content_class = 'post-content';
        $excerpt_class = 'post-excerpt';
        $read_more_text = 'Lire la suite';
        $meta_class = 'post-meta';
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class($card_class); ?>>
    <?php if (has_post_thumbnail()) : ?>
        <div class="<?php echo esc_attr($thumbnail_class); ?>">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('btlabs-card'); ?>
            </a>
        </div>
    <?php endif; ?>
    
    <div class="<?php echo esc_attr($content_class); ?>">
        <h2 class="<?php echo esc_attr($title_class); ?>">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h2>
        
        <div class="<?php echo esc_attr($meta_class); ?>">
            <?php if ($post_type === 'equipe' && $meta_field) : ?>
                <span class="fonction"><?php echo esc_html($meta_field); ?></span>
            <?php elseif (($post_type === 'projets' || $post_type === 'services') && $terms && !is_wp_error($terms)) : ?>
                <span class="<?php echo $post_type === 'projets' ? 'projet-category' : 'service-type'; ?>">
                    <?php foreach ($terms as $term) : ?>
                        <a href="<?php echo esc_url(get_term_link($term)); ?>"><?php echo esc_html($term->name); ?></a>
                    <?php endforeach; ?>
                </span>
            <?php endif; ?>
        </div>
        
        <div class="<?php echo esc_attr($excerpt_class); ?>">
            <?php the_excerpt(); ?>
        </div>
        
        <a href="<?php the_permalink(); ?>" class="read-more"><?php echo esc_html($read_more_text); ?></a>
    </div>
</article>