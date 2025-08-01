<?php get_header(); ?>

<main id="primary" class="site-main">
    <div class="container">
        <section class="error-404 not-found">
            <header class="page-header">
                <h1 class="page-title"><?php esc_html_e('Page non trouvée', 'btlabs'); ?></h1>
            </header>

            <div class="page-content">
                <div class="error-content">
                    <h2>404</h2>
                    <p><?php esc_html_e('Désolé, la page que vous recherchez n\'existe pas ou a été déplacée.', 'btlabs'); ?></p>
                    
                    <div class="error-actions">
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="btn-primary">
                            <?php esc_html_e('Retour à l\'accueil', 'btlabs'); ?>
                        </a>
                    </div>
                </div>

                <div class="error-suggestions">
                    <h3><?php esc_html_e('Vous cherchez quelque chose ?', 'btlabs'); ?></h3>
                    
                    <div class="search-form">
                        <?php get_search_form(); ?>
                    </div>
                    
                    <div class="popular-content">
                        <h4><?php esc_html_e('Contenu populaire', 'btlabs'); ?></h4>
                        <ul>
                            <li><a href="<?php echo home_url('/services/'); ?>">Nos Services</a></li>
                            <li><a href="<?php echo home_url('/projets/'); ?>">Nos Projets</a></li>
                            <li><a href="<?php echo home_url('/equipe/'); ?>">Notre Équipe</a></li>
                            <li><a href="<?php echo home_url('/contact/'); ?>">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>

<?php get_footer(); ?> 