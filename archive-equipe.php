<?php 
/**
 * Archive Template for Team Members
 * 
 * @package BTlabs
 */

get_header(); 
?>

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
                <h2>Aucun membre trouvé</h2>
                <p>Désolé, aucun membre ne correspond à votre recherche.</p>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>