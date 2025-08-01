<?php 
/**
 * Generic Archive Template
 * 
 * @package BTlabs
 */

get_header(); 

// Get current post type and set appropriate titles and descriptions
$post_type = get_post_type();
$post_type_object = get_post_type_object($post_type);

switch ($post_type) {
    case 'equipe':
        $page_title = 'Notre Équipe';
        $page_description = 'Rencontrez nos experts en études environnementales et sociales.';
        $grid_class = 'equipe-grid';
        $no_posts_title = 'Aucun membre trouvé';
        $no_posts_description = 'Désolé, aucun membre ne correspond à votre recherche.';
        break;
        
    case 'projets':
        $page_title = 'Nos Projets';
        $page_description = 'Découvrez nos réalisations en matière d\'études environnementales et sociales.';
        $grid_class = 'projets-grid';
        $no_posts_title = 'Aucun projet trouvé';
        $no_posts_description = 'Désolé, aucun projet ne correspond à votre recherche.';
        break;
        
    case 'services':
        $page_title = 'Nos Services';
        $page_description = 'Découvrez notre gamme complète de services en études environnementales et sociales.';
        $grid_class = 'services-grid';
        $no_posts_title = 'Aucun service trouvé';
        $no_posts_description = 'Désolé, aucun service ne correspond à votre recherche.';
        break;
        
    default:
        $page_title = $post_type_object ? $post_type_object->labels->name : 'Archives';
        $page_description = '';
        $grid_class = 'posts-grid';
        $no_posts_title = 'Aucun contenu trouvé';
        $no_posts_description = 'Désolé, aucun contenu ne correspond à votre recherche.';
}
?>

<main id="primary" class="site-main">
    <div class="container">
        <header class="page-header">
            <h1 class="page-title"><?php echo esc_html($page_title); ?></h1>
            <?php if ($page_description) : ?>
                <div class="page-description">
                    <p><?php echo esc_html($page_description); ?></p>
                </div>
            <?php endif; ?>
        </header>

        <?php if (have_posts()) : ?>
            <div class="<?php echo esc_attr($grid_class); ?>">
                <?php while (have_posts()) : the_post(); ?>
                    <?php get_template_part('template-parts/archive-card'); ?>
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
            <div class="no-posts">
                <h2><?php echo esc_html($no_posts_title); ?></h2>
                <p><?php echo esc_html($no_posts_description); ?></p>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>