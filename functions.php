<?php
/**
 * BTlabs Theme Functions
 * 
 * @package BTlabs
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Theme Setup
 */
function btlabs_setup() {
    // Add theme support for various features
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
    add_theme_support('customize-selective-refresh-widgets');
    
    // Elementor compatibility
    add_theme_support('elementor');
    add_theme_support('elementor-pro');
    
    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Menu Principal', 'btlabs'),
        'footer' => __('Menu Footer', 'btlabs'),
    ));
    
    // Add image sizes
    add_image_size('btlabs-hero', 1200, 600, true);
    add_image_size('btlabs-card', 400, 300, true);
    add_image_size('btlabs-thumbnail', 300, 200, true);
}
add_action('after_setup_theme', 'btlabs_setup');

/**
 * Elementor compatibility and optimization
 */
function btlabs_elementor_setup() {
    // Disable default Elementor color schemes
    update_option('elementor_disable_color_schemes', 'yes');
    
    // Disable default Elementor typography schemes
    update_option('elementor_disable_typography_schemes', 'yes');
    
    // Set CSS print method to external for better performance
    update_option('elementor_css_print_method', 'external');
    
    // Enable improved asset loading
    update_option('elementor_optimized_dom_output', 'enabled');
    
    // Set container width to match theme
    update_option('elementor_container_width', array(
        'size' => 1200,
        'unit' => 'px'
    ));
    
    // Enable page transitions
    update_option('elementor_page_transitions_library', 'yes');
}
add_action('elementor/init', 'btlabs_elementor_setup');

/**
 * Enqueue scripts and styles
 */
function btlabs_scripts() {
    // Enqueue main stylesheet
    wp_enqueue_style('btlabs-style', get_stylesheet_uri(), array(), '1.0.0');
    
    // Enqueue custom CSS
    wp_enqueue_style('btlabs-custom', get_template_directory_uri() . '/assets/css/custom.css', array(), '1.0.0');
    wp_enqueue_style('btlabs-extras', get_template_directory_uri() . '/assets/css/theme-extras.css', array(), '1.0.0');
    
    // Enqueue JavaScript
    wp_enqueue_script('btlabs-main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0.0', true);
    
    // Localize script for AJAX
    wp_localize_script('btlabs-main', 'btlabs_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('btlabs_nonce'),
    ));
}
add_action('wp_enqueue_scripts', 'btlabs_scripts');

/**
 * Elementor CSS compatibility
 */
function btlabs_elementor_css_compatibility() {
    // Add custom CSS for Elementor compatibility
    $custom_css = "
        /* Elementor compatibility with BTlabs theme */
        .elementor-page .site-header {
            position: relative;
            z-index: 1000;
        }
        
        .elementor-page .site-footer {
            margin-top: 0;
        }
        
        .elementor-section.elementor-section-stretched {
            left: 0;
            width: 100vw;
        }
        
        .elementor-container {
            max-width: 1200px;
            margin: 0 auto;
        }
        
        /* Ensure theme colors work with Elementor */
        .elementor-widget-container {
            color: var(--text-main);
        }
        
        .elementor-heading-title {
            color: var(--secondary-title);
        }
        
        /* Responsive compatibility */
        @media (max-width: 768px) {
            .elementor-container {
                padding: 0 1rem;
            }
        }
    ";
    
    wp_add_inline_style('btlabs-custom', $custom_css);
}
add_action('wp_enqueue_scripts', 'btlabs_elementor_css_compatibility');

/**
 * Force CSS loading for specific pages
 */
function btlabs_force_css_loading() {
    // Force CSS loading for about page
    if (is_page('a-propos') || is_page_template('page-a-propos.php')) {
        wp_enqueue_style('btlabs-about-page', get_template_directory_uri() . '/assets/css/custom.css', array(), '1.0.1');
        
        // Add specific CSS for about page
        $about_css = "
            /* Force CSS loading for About page */
            .about-hero {
                background: linear-gradient(135deg, rgba(0, 166, 81, 0.9) 0%, rgba(55, 175, 174, 0.9) 100%), url('" . get_template_directory_uri() . "/assets/images/Biotox-images.png');
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
                color: #fff;
                padding: 6rem 0;
                text-align: center;
            }
            
            .about-hero .hero-title {
                font-family: 'Intro Rust', Arial, sans-serif;
                font-size: 3rem;
                margin-bottom: 1.5rem;
                animation: fadeInUp 1s ease-out;
            }
            
            .about-hero .hero-subtitle {
                font-size: 1.3rem;
                max-width: 800px;
                margin: 0 auto;
                line-height: 1.6;
                animation: fadeInUp 1s ease-out 0.3s both;
            }
            
            .mission-section {
                padding: 5rem 0;
                background: #fff;
            }
            
            .mission-grid {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 4rem;
                align-items: center;
            }
            
            .valeurs-grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
                gap: 2.5rem;
                margin-top: 3rem;
            }
            
            .valeur-card {
                background: #fff;
                padding: 2.5rem;
                border-radius: 15px;
                box-shadow: 0 8px 25px rgba(0,0,0,0.08);
                text-align: center;
                transition: transform 0.3s ease, box-shadow 0.3s ease;
                border: 1px solid rgba(0,0,0,0.05);
            }
            
            .valeur-card:hover {
                transform: translateY(-10px);
                box-shadow: 0 15px 40px rgba(0,0,0,0.15);
            }
            
            .valeur-icon {
                width: 80px;
                height: 80px;
                background: linear-gradient(135deg, #00a651, #37afae);
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                margin: 0 auto 1.5rem;
                color: #fff;
                font-size: 2rem;
            }
            
            .about-cta-section {
                padding: 5rem 0;
                background: linear-gradient(135deg, rgba(175, 55, 116, 0.9) 0%, rgba(175, 55, 116, 0.8) 100%), url('" . get_template_directory_uri() . "/assets/images/Biotox-images.png');
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
                color: #fff;
                text-align: center;
            }
        ";
        
        wp_add_inline_style('btlabs-about-page', $about_css);
    }
}
add_action('wp_enqueue_scripts', 'btlabs_force_css_loading', 20);

/**
 * Debug CSS loading
 */
function btlabs_debug_css_loading() {
    if (is_page('a-propos') || is_page_template('page-a-propos.php')) {
        // Add debug info to page
        add_action('wp_footer', function() {
            echo '<!-- BTlabs About Page CSS Debug: CSS should be loaded -->';
        });
    }
}
add_action('wp_enqueue_scripts', 'btlabs_debug_css_loading');

/**
 * Register widget areas
 */
function btlabs_widgets_init() {
    register_sidebar(array(
        'name' => __('Sidebar Principal', 'btlabs'),
        'id' => 'sidebar-1',
        'description' => __('Widgets de la barre latérale principale', 'btlabs'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
    
    // Register footer widgets using a loop to reduce code duplication
    for ($i = 1; $i <= 3; $i++) {
        register_sidebar(array(
            'name' => sprintf(__('Footer Widget %d', 'btlabs'), $i),
            'id' => 'footer-' . $i,
            'description' => sprintf(__('Widget %d du footer', 'btlabs'), $i),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ));
    }
    
    // Elementor compatible widget areas
    register_sidebar(array(
        'name' => __('Zone Contact Accueil', 'btlabs'),
        'id' => 'contact-homepage',
        'description' => __('Zone pour le formulaire de contact sur la page d\'accueil', 'btlabs'),
        'before_widget' => '<div class="contact-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
    
    register_sidebar(array(
        'name' => __('Zone CTA Accueil', 'btlabs'),
        'id' => 'cta-homepage',
        'description' => __('Zone pour les appels à l\'action sur la page d\'accueil', 'btlabs'),
        'before_widget' => '<div class="cta-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
}
add_action('widgets_init', 'btlabs_widgets_init');

/**
 * Custom excerpt length
 */
function btlabs_excerpt_length($length) {
    return 20;
}
add_filter('excerpt_length', 'btlabs_excerpt_length');

/**
 * Custom excerpt more
 */
function btlabs_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'btlabs_excerpt_more');

/**
 * Add custom post types for BTlabs
 */
function btlabs_custom_post_types() {
    // Projets
    register_post_type('projets', array(
        'labels' => array(
            'name' => 'Projets',
            'singular_name' => 'Projet',
            'add_new' => 'Ajouter un projet',
            'add_new_item' => 'Ajouter un nouveau projet',
            'edit_item' => 'Modifier le projet',
            'new_item' => 'Nouveau projet',
            'view_item' => 'Voir le projet',
            'search_items' => 'Rechercher des projets',
            'not_found' => 'Aucun projet trouvé',
            'not_found_in_trash' => 'Aucun projet trouvé dans la corbeille'
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_icon' => 'dashicons-portfolio',
        'rewrite' => array('slug' => 'projets')
    ));
    
    // Services
    register_post_type('services', array(
        'labels' => array(
            'name' => 'Services',
            'singular_name' => 'Service',
            'add_new' => 'Ajouter un service',
            'add_new_item' => 'Ajouter un nouveau service',
            'edit_item' => 'Modifier le service',
            'new_item' => 'Nouveau service',
            'view_item' => 'Voir le service',
            'search_items' => 'Rechercher des services',
            'not_found' => 'Aucun service trouvé',
            'not_found_in_trash' => 'Aucun service trouvé dans la corbeille'
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_icon' => 'dashicons-admin-tools',
        'rewrite' => array('slug' => 'services')
    ));
    
    // Équipe
    register_post_type('equipe', array(
        'labels' => array(
            'name' => 'Équipe',
            'singular_name' => 'Membre',
            'add_new' => 'Ajouter un membre',
            'add_new_item' => 'Ajouter un nouveau membre',
            'edit_item' => 'Modifier le membre',
            'new_item' => 'Nouveau membre',
            'view_item' => 'Voir le membre',
            'search_items' => 'Rechercher des membres',
            'not_found' => 'Aucun membre trouvé',
            'not_found_in_trash' => 'Aucun membre trouvé dans la corbeille'
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_icon' => 'dashicons-groups',
        'rewrite' => array('slug' => 'equipe')
    ));
}
add_action('init', 'btlabs_custom_post_types');

/**
 * Add custom taxonomies
 */
function btlabs_custom_taxonomies() {
    // Catégories de projets
    register_taxonomy('categorie_projet', 'projets', array(
        'labels' => array(
            'name' => 'Catégories de projets',
            'singular_name' => 'Catégorie de projet',
            'search_items' => 'Rechercher des catégories',
            'all_items' => 'Toutes les catégories',
            'parent_item' => 'Catégorie parente',
            'parent_item_colon' => 'Catégorie parente:',
            'edit_item' => 'Modifier la catégorie',
            'update_item' => 'Mettre à jour la catégorie',
            'add_new_item' => 'Ajouter une nouvelle catégorie',
            'new_item_name' => 'Nom de la nouvelle catégorie',
            'menu_name' => 'Catégories'
        ),
        'hierarchical' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'categorie-projet')
    ));
    
    // Types de services
    register_taxonomy('type_service', 'services', array(
        'labels' => array(
            'name' => 'Types de services',
            'singular_name' => 'Type de service',
            'search_items' => 'Rechercher des types',
            'all_items' => 'Tous les types',
            'parent_item' => 'Type parent',
            'parent_item_colon' => 'Type parent:',
            'edit_item' => 'Modifier le type',
            'update_item' => 'Mettre à jour le type',
            'add_new_item' => 'Ajouter un nouveau type',
            'new_item_name' => 'Nom du nouveau type',
            'menu_name' => 'Types'
        ),
        'hierarchical' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'type-service')
    ));
}
add_action('init', 'btlabs_custom_taxonomies');

/**
 * Customize admin
 */
function btlabs_admin_customization() {
    // Add custom admin styles
    wp_enqueue_style('btlabs-admin', get_template_directory_uri() . '/assets/css/admin.css');
}
add_action('admin_enqueue_scripts', 'btlabs_admin_customization');

/**
 * Security enhancements
 */
function btlabs_security_enhancements() {
    // Remove WordPress version
    remove_action('wp_head', 'wp_generator');
    
    // Disable XML-RPC
    add_filter('xmlrpc_enabled', '__return_false');
    
    // Hide login errors
    add_filter('login_errors', function() {
        return 'Erreur de connexion';
    });
}
add_action('init', 'btlabs_security_enhancements');

/**
 * Performance optimizations
 */
function btlabs_performance_optimizations() {
    // Remove unnecessary WordPress features
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wp_shortlink_wp_head');
    
    // Disable emojis
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'print_emoji_styles');
}
add_action('init', 'btlabs_performance_optimizations');

/**
 * Include custom meta fields
 */
require get_template_directory() . '/inc/custom-meta.php';

/**
 * Include theme options
 */
require get_template_directory() . '/inc/theme-options.php';

/**
 * Fallback menu function
 */
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