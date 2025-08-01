<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Aller au contenu', 'btlabs'); ?></a>

    <header id="masthead" class="site-header">
        <div class="site-navigation">
            <div class="site-branding">
                <?php
                if (has_custom_logo()) {
                    the_custom_logo();
                } else {
                    ?>
                    <h1 class="site-logo">
                        <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                            <?php bloginfo('name'); ?>
                        </a>
                    </h1>
                    <?php
                }
                ?>
                <?php
                $btlabs_description = get_bloginfo('description', 'display');
                if ($btlabs_description || is_customize_preview()) :
                    ?>
                    <p class="site-description"><?php echo $btlabs_description; ?></p>
                <?php endif; ?>
            </div>

            <nav id="site-navigation" class="main-navigation">
                <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                    <span class="menu-toggle-icon"></span>
                    <span class="screen-reader-text"><?php esc_html_e('Menu', 'btlabs'); ?></span>
                </button>
                
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'menu_id' => 'primary-menu',
                    'menu_class' => 'main-menu',
                    'container' => false,
                    'fallback_cb' => 'btlabs_fallback_menu',
                ));
                ?>
            </nav>
        </div>
    </header>

    <?php
    // Fallback menu function
    function btlabs_fallback_menu() {
        echo '<ul class="main-menu">';
        echo '<li><a href="' . home_url('/') . '">Accueil</a></li>';
        echo '<li><a href="' . home_url('/a-propos/') . '">À propos</a></li>';
        echo '<li><a href="' . home_url('/services/') . '">Services</a></li>';
        echo '<li><a href="' . home_url('/projets/') . '">Projets</a></li>';
        echo '<li><a href="' . home_url('/equipe/') . '">Équipe</a></li>';
        echo '<li><a href="' . home_url('/contact/') . '">Contact</a></li>';
        echo '</ul>';
    }
    ?>