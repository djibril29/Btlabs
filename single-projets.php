<?php get_header(); ?>

<main id="primary" class="site-main">
        <?php
        while (have_posts()) :
            the_post();
            ?>
            
        <!-- Hero Section avec image de fond -->
        <section class="projet-hero" style="background: linear-gradient(135deg, rgba(0, 166, 81, 0.8) 0%, rgba(55, 175, 174, 0.8) 100%), url('<?php echo get_the_post_thumbnail_url(get_the_ID(), 'btlabs-hero'); ?>'); background-size: cover; background-position: center; min-height: 60vh; display: flex; align-items: center; color: #fff; position: relative;">
            <div class="container" style="position: relative; z-index: 2;">
                <div class="projet-hero-content" style="max-width: 800px;">
                    <div class="projet-categories-hero" style="margin-bottom: 1rem;">
                        <?php
                        $categories = get_the_terms(get_the_ID(), 'categorie_projet');
                        if ($categories && !is_wp_error($categories)) {
                            foreach ($categories as $category) {
                                echo '<span class="category-badge" style="background: rgba(255,255,255,0.2); color: #fff; padding: 0.5rem 1rem; border-radius: 25px; margin-right: 0.5rem; font-size: 0.9rem; backdrop-filter: blur(10px);">' . esc_html($category->name) . '</span>';
                            }
                        }
                        ?>
                    </div>
                    
                    <h1 class="projet-title-hero" style="font-family: 'Intro Rust', Arial, sans-serif; font-size: 3.5rem; margin-bottom: 1.5rem; text-shadow: 2px 2px 4px rgba(0,0,0,0.3);">
                        <?php the_title(); ?>
                    </h1>
                    
                    <div class="projet-meta-hero" style="display: flex; gap: 2rem; margin-bottom: 2rem; font-size: 1.1rem;">
                        <span class="projet-date-hero">
                            <i class="fas fa-calendar" style="margin-right: 0.5rem;"></i>
                            <?php echo get_the_date('d/m/Y'); ?>
                        </span>
                        <span class="projet-client-hero">
                            <i class="fas fa-building" style="margin-right: 0.5rem;"></i>
                            <?php echo get_post_meta(get_the_ID(), 'client', true) ?: 'Client confidentiel'; ?>
                        </span>
                    </div>
                    
                    <div class="projet-excerpt-hero" style="font-size: 1.2rem; line-height: 1.6; opacity: 0.95;">
                        <?php echo get_the_excerpt(); ?>
                    </div>
                </div>
            </div>
        </section>

        <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 2rem;">
            <!-- Section Informations du Projet -->
            <section class="projet-info-section" style="background: #f8f9fa; border-radius: 15px; padding: 3rem; margin: -50px 0 3rem 0; position: relative; z-index: 3; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
                <div class="projet-info-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 2rem;">
                    
                    <!-- Détails du projet -->
                    <div class="projet-details">
                        <h3 style="color: var(--secondary-title); margin-bottom: 1.5rem; font-family: 'Intro Rust', Arial, sans-serif;">
                            <i class="fas fa-info-circle" style="margin-right: 0.5rem;"></i>
                            Détails du Projet
                        </h3>
                        <div class="detail-item" style="margin-bottom: 1rem; padding: 1rem; background: #fff; border-radius: 8px; border-left: 4px solid var(--primary-color);">
                            <strong style="color: var(--secondary-title);">Client:</strong>
                            <span><?php echo get_post_meta(get_the_ID(), 'client', true) ?: 'Non spécifié'; ?></span>
                        </div>
                        <div class="detail-item" style="margin-bottom: 1rem; padding: 1rem; background: #fff; border-radius: 8px; border-left: 4px solid var(--primary-color);">
                            <strong style="color: var(--secondary-title);">Localisation:</strong>
                            <span><?php echo get_post_meta(get_the_ID(), 'localisation', true) ?: 'Non spécifiée'; ?></span>
                        </div>
                        <div class="detail-item" style="margin-bottom: 1rem; padding: 1rem; background: #fff; border-radius: 8px; border-left: 4px solid var(--primary-color);">
                            <strong style="color: var(--secondary-title);">Durée:</strong>
                            <span><?php echo get_post_meta(get_the_ID(), 'duree', true) ?: 'Non spécifiée'; ?></span>
                        </div>
                        <div class="detail-item" style="margin-bottom: 1rem; padding: 1rem; background: #fff; border-radius: 8px; border-left: 4px solid var(--primary-color);">
                            <strong style="color: var(--secondary-title);">Budget:</strong>
                            <span><?php echo get_post_meta(get_the_ID(), 'budget', true) ?: 'Non spécifié'; ?></span>
                        </div>
                    </div>
                    
                    <!-- Services fournis -->
                    <div class="projet-services">
                        <h3 style="color: var(--secondary-title); margin-bottom: 1.5rem; font-family: 'Intro Rust', Arial, sans-serif;">
                            <i class="fas fa-cogs" style="margin-right: 0.5rem;"></i>
                            Services Fournis
                        </h3>
                        <?php
                        $services = get_post_meta(get_the_ID(), 'services', true);
                        if ($services) {
                            $services_array = explode(',', $services);
                            echo '<ul style="list-style: none; padding: 0;">';
                            foreach ($services_array as $service) {
                                echo '<li style="margin-bottom: 0.5rem; padding: 0.5rem 1rem; background: #fff; border-radius: 6px; border-left: 3px solid var(--highlight);">';
                                echo '<i class="fas fa-check" style="color: var(--primary-color); margin-right: 0.5rem;"></i>';
                                echo esc_html(trim($service));
                                echo '</li>';
                            }
                            echo '</ul>';
                        } else {
                            echo '<p style="color: #666; font-style: italic;">Services non spécifiés</p>';
                        }
                        ?>
                    </div>
                    
                    <!-- Technologies utilisées -->
                    <div class="projet-technologies">
                        <h3 style="color: var(--secondary-title); margin-bottom: 1.5rem; font-family: 'Intro Rust', Arial, sans-serif;">
                            <i class="fas fa-tools" style="margin-right: 0.5rem;"></i>
                            Technologies & Méthodes
                        </h3>
                        <?php
                        $technologies = get_post_meta(get_the_ID(), 'technologies', true);
                        if ($technologies) {
                            $tech_array = explode(',', $technologies);
                            echo '<div style="display: flex; flex-wrap: wrap; gap: 0.5rem;">';
                            foreach ($tech_array as $tech) {
                                echo '<span style="background: var(--primary-color); color: #fff; padding: 0.5rem 1rem; border-radius: 20px; font-size: 0.9rem;">';
                                echo esc_html(trim($tech));
                                echo '</span>';
                            }
                            echo '</div>';
                        } else {
                            echo '<p style="color: #666; font-style: italic;">Technologies non spécifiées</p>';
                        }
                        ?>
                    </div>
                </div>
            </section>

            <!-- Section Contenu Principal -->
            <section class="projet-content-section" style="margin-bottom: 4rem;">
                <article id="post-<?php the_ID(); ?>" <?php post_class('single-projet-content'); ?>>

                    <div class="entry-content" style="font-size: 1.1rem; line-height: 1.8; color: #333;">
                    <?php
                    the_content();

                    wp_link_pages(array(
                            'before' => '<div class="page-links" style="margin: 2rem 0; padding: 1rem; background: #f8f9fa; border-radius: 8px;">' . esc_html__('Pages:', 'btlabs'),
                        'after'  => '</div>',
                    ));
                    ?>
                </div>

                    <!-- Galerie d'images du projet -->
                    <?php
                    $gallery_images = get_post_meta(get_the_ID(), 'gallery_images', true);
                    if ($gallery_images) : ?>
                        <section class="projet-gallery" style="margin: 3rem 0;">
                            <h3 style="color: var(--secondary-title); margin-bottom: 2rem; font-family: 'Intro Rust', Arial, sans-serif;">
                                <i class="fas fa-images" style="margin-right: 0.5rem;"></i>
                                Galerie du Projet
                            </h3>
                            <div class="gallery-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 1rem;">
                                <?php
                                $image_ids = explode(',', $gallery_images);
                                foreach ($image_ids as $image_id) {
                                    $image_url = wp_get_attachment_image_url($image_id, 'large');
                                    $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
                                    if ($image_url) {
                                        echo '<div class="gallery-item" style="border-radius: 10px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">';
                                        echo '<img src="' . esc_url($image_url) . '" alt="' . esc_attr($image_alt) . '" style="width: 100%; height: 250px; object-fit: cover; transition: transform 0.3s ease;">';
                                        echo '</div>';
                                    }
                                }
                                ?>
                            </div>
                        </section>
                    <?php endif; ?>

                    <!-- Résultats et impacts -->
                    <section class="projet-results" style="background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%); border-radius: 15px; padding: 3rem; margin: 3rem 0;">
                        <h3 style="color: var(--secondary-title); margin-bottom: 2rem; font-family: 'Intro Rust', Arial, sans-serif; text-align: center;">
                            <i class="fas fa-chart-line" style="margin-right: 0.5rem;"></i>
                            Résultats & Impacts
                        </h3>
                        <div class="results-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 2rem;">
                            <?php
                            $results = get_post_meta(get_the_ID(), 'resultats', true);
                            if ($results) {
                                $results_array = explode("\n", $results);
                                foreach ($results_array as $result) {
                                    if (trim($result)) {
                                        echo '<div class="result-item" style="background: #fff; padding: 1.5rem; border-radius: 10px; text-align: center; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">';
                                        echo '<i class="fas fa-check-circle" style="color: var(--primary-color); font-size: 2rem; margin-bottom: 1rem;"></i>';
                                        echo '<p style="margin: 0; font-weight: 500;">' . esc_html(trim($result)) . '</p>';
                                        echo '</div>';
                                    }
                                }
                            } else {
                                echo '<p style="text-align: center; color: #666; font-style: italic; grid-column: 1 / -1;">Résultats non spécifiés</p>';
                            }
                            ?>
                        </div>
                    </section>

            </article>
            </section>

            <!-- Navigation entre projets -->
            <section class="projet-navigation" style="margin: 4rem 0; padding: 2rem; background: #f8f9fa; border-radius: 15px;">
                <h3 style="color: var(--secondary-title); margin-bottom: 2rem; font-family: 'Intro Rust', Arial, sans-serif; text-align: center;">
                    <i class="fas fa-arrow-left" style="margin-right: 0.5rem;"></i>
                    Navigation entre Projets
                    <i class="fas fa-arrow-right" style="margin-left: 0.5rem;"></i>
                </h3>
            <?php
            the_post_navigation(array(
                    'prev_text' => '<div class="nav-item" style="text-align: left;"><span class="nav-subtitle" style="color: var(--secondary-title); font-size: 0.9rem;">← Projet précédent</span><br><span class="nav-title" style="font-weight: 600;">%title</span></div>',
                    'next_text' => '<div class="nav-item" style="text-align: right;"><span class="nav-subtitle" style="color: var(--secondary-title); font-size: 0.9rem;">Projet suivant →</span><br><span class="nav-title" style="font-weight: 600;">%title</span></div>',
                    'class' => 'projet-nav-links',
            ));
                ?>
            </section>
        </div>
        
        <!-- Section Projets Similaires -->
        <section class="related-projects" style="background: #f8f9fa; padding: 4rem 0; margin-top: 4rem;">
            <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 2rem;">
                <h2 style="color: var(--secondary-title); margin-bottom: 3rem; font-family: 'Intro Rust', Arial, sans-serif; text-align: center; font-size: 2.5rem;">
                    <i class="fas fa-project-diagram" style="margin-right: 0.5rem;"></i>
                    Projets Similaires
                </h2>
                <div class="related-projects-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 2rem;">
                <?php
                    // Récupérer les projets de la même catégorie
                    $current_categories = wp_get_post_terms(get_the_ID(), 'categorie_projet', array('fields' => 'ids'));
                    
                $related_projects = new WP_Query(array(
                    'post_type' => 'projets',
                    'posts_per_page' => 3,
                    'post__not_in' => array(get_the_ID()),
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'categorie_projet',
                                'field' => 'term_id',
                                'terms' => $current_categories,
                            ),
                        ),
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
                            <article class="related-projet-card" style="background: #fff; border-radius: 15px; overflow: hidden; box-shadow: 0 8px 25px rgba(0,0,0,0.1); transition: transform 0.3s ease, box-shadow 0.3s ease;">
                            <?php if (has_post_thumbnail()) : ?>
                                    <div class="related-projet-thumbnail" style="position: relative; overflow: hidden;">
                                    <a href="<?php the_permalink(); ?>">
                                            <?php the_post_thumbnail('btlabs-card', array('style' => 'width: 100%; height: 250px; object-fit: cover; transition: transform 0.3s ease;')); ?>
                                    </a>
                                        <div class="related-projet-overlay" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: linear-gradient(135deg, rgba(0, 166, 81, 0.8) 0%, rgba(55, 175, 174, 0.8) 100%); opacity: 0; transition: opacity 0.3s ease; display: flex; align-items: center; justify-content: center;">
                                            <span style="color: #fff; font-weight: 600; font-size: 1.1rem;">Voir le projet</span>
                                        </div>
                                </div>
                            <?php endif; ?>
                            
                                <div class="related-projet-content" style="padding: 2rem;">
                                    <h3 class="related-projet-title" style="margin-bottom: 1rem;">
                                        <a href="<?php the_permalink(); ?>" style="color: var(--secondary-title); text-decoration: none; font-size: 1.3rem; font-weight: 600;"><?php the_title(); ?></a>
                                </h3>
                                    
                                    <div class="related-projet-meta" style="margin-bottom: 1rem;">
                                        <?php
                                        $related_categories = get_the_terms(get_the_ID(), 'categorie_projet');
                                        if ($related_categories && !is_wp_error($related_categories)) {
                                            echo '<span class="related-category" style="background: var(--primary-color); color: #fff; padding: 0.3rem 0.8rem; border-radius: 15px; font-size: 0.8rem;">';
                                            echo esc_html($related_categories[0]->name);
                                            echo '</span>';
                                        }
                                        ?>
                                    </div>
                                    
                                    <div class="related-projet-excerpt" style="color: #666; line-height: 1.6; margin-bottom: 1.5rem;">
                                        <?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?>
                                </div>
                                    
                                    <a href="<?php the_permalink(); ?>" class="read-more" style="display: inline-block; background: var(--primary-color); color: #fff; padding: 0.8rem 1.5rem; border-radius: 25px; text-decoration: none; font-weight: 600; transition: background 0.3s ease;">
                                        Découvrir le projet
                                    </a>
                            </div>
                        </article>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                    else : ?>
                        <p style="text-align: center; color: #666; font-style: italic; grid-column: 1 / -1;">Aucun projet similaire trouvé.</p>
                    <?php endif; ?>
                </div>
            </div>
        </section>

    <?php endwhile; // End of the loop. ?>
</main>

<style>
/* Styles pour les interactions hover */
.related-projet-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 40px rgba(0,0,0,0.15);
}

.related-projet-card:hover .related-projet-overlay {
    opacity: 1;
}

.related-projet-card:hover .related-projet-thumbnail img {
    transform: scale(1.1);
}

.gallery-item:hover img {
    transform: scale(1.05);
}

/* Responsive design */
@media (max-width: 768px) {
    .projet-hero-content h1 {
        font-size: 2.5rem !important;
    }
    
    .projet-info-grid {
        grid-template-columns: 1fr !important;
    }
    
    .results-grid {
        grid-template-columns: 1fr !important;
    }
    
    .related-projects-grid {
        grid-template-columns: 1fr !important;
    }
    
    .projet-meta-hero {
        flex-direction: column;
        gap: 1rem !important;
    }
}
</style>

<?php get_footer(); ?> 