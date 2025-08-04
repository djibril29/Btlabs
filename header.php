<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <!-- Basic metadata to help browsers render the page correctly -->
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); /* WordPress hook for scripts and styles */ ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); /* Hook that runs immediately after the opening body tag */ ?>

<div id="page" class="site">
    <!-- Accessibility link allowing users to skip directly to the main content -->
    <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Aller au contenu', 'btlabs'); ?></a>

    <header id="masthead" class="site-header">
        <div class="site-navigation">
            <div class="site-branding">
                <?php
                // Display the custom logo if available; otherwise show the site title
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
                // Output the site tagline when set in WordPress settings
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
                // Display the primary menu; if none is set, use a fallback
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'menu_id'        => 'primary-menu',
                    'menu_class'     => 'main-menu',
                    'container'      => false,
                    'fallback_cb'    => 'btlabs_fallback_menu',
                ));
                ?>
            </nav>
        </div>
    </header>

