<?php
/**
 * BTlabs Theme Functions
 * 
 * @package BTlabs
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    // Exit if accessed directly to avoid security issues
    exit;
}

// Define theme version for cache busting
if (!defined('BTLABS_VERSION')) {
    // Use the theme's version number to help browsers cache assets
    define('BTLABS_VERSION', wp_get_theme()->get('Version'));
}

/**
 * Theme Setup
 */
function btlabs_setup() {
    // Enable featured images for posts and pages
    add_theme_support('post-thumbnails');
    // Let WordPress manage the document title
    add_theme_support('title-tag');
    // Allow uploading and displaying a custom logo
    add_theme_support('custom-logo');
    // Use HTML5 markup for the listed features
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
    // Refresh widgets in the Customizer without reloading the page
    add_theme_support('customize-selective-refresh-widgets');

    // Declare the locations where menus can be assigned
    register_nav_menus(array(
        'primary' => __('Menu Principal', 'btlabs'), // Main navigation at top
        'footer'  => __('Menu Footer', 'btlabs'),    // Links in the footer
    ));

    // Define custom image sizes used in templates
    add_image_size('btlabs-hero', 1200, 600, true);      // Large banner image
    add_image_size('btlabs-card', 400, 300, true);       // Image for cards
    add_image_size('btlabs-thumbnail', 300, 200, true);  // Small thumbnail
}
add_action('after_setup_theme', 'btlabs_setup');

/**
 * Enqueue scripts and styles
 */
function btlabs_scripts() {
    // Load the main stylesheet that comes with the theme
    wp_enqueue_style('btlabs-style', get_stylesheet_uri(), array(), BTLABS_VERSION);

    // Load additional CSS files located in the assets folder
    wp_enqueue_style('btlabs-custom', get_template_directory_uri() . '/assets/css/custom.css', array(), BTLABS_VERSION);
    wp_enqueue_style('btlabs-extras', get_template_directory_uri() . '/assets/css/theme-extras.css', array(), BTLABS_VERSION);

    // Add the core GSAP animation library from a CDN
    wp_enqueue_script('gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js', array(), '3.12.2', true);

    // Add the GSAP ScrollTrigger plugin
    wp_enqueue_script('gsap-scrolltrigger', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js', array('gsap'), '3.12.2', true);

    // Add the GSAP TextPlugin for animating text
    wp_enqueue_script('gsap-text', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/TextPlugin.min.js', array('gsap'), '3.12.2', true);

    // Load the main JavaScript file for the theme
    wp_enqueue_script('btlabs-main', get_template_directory_uri() . '/assets/js/main.js', array('jquery', 'gsap'), BTLABS_VERSION, true);

    // Load custom GSAP animations specific to this theme
    wp_enqueue_script('btlabs-gsap', get_template_directory_uri() . '/assets/js/gsap-animations.js', array('gsap', 'gsap-scrolltrigger'), BTLABS_VERSION, true);

    // Pass PHP data to the main JavaScript file for AJAX requests
    wp_localize_script('btlabs-main', 'btlabs_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),      // URL to handle AJAX requests
        'nonce'    => wp_create_nonce('btlabs_nonce'),  // Security token
    ));
}
add_action('wp_enqueue_scripts', 'btlabs_scripts');

/**
 * Register widget areas
 */
function btlabs_widgets_init() {
    // Register the main sidebar shown on blog posts
    register_sidebar(array(
        'name'          => __('Sidebar Principal', 'btlabs'),
        'id'            => 'sidebar-1',
        'description'   => __('Widgets de la barre latérale principale', 'btlabs'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));

    // Register three footer widget areas using a loop
    for ($i = 1; $i <= 3; $i++) {
        register_sidebar(array(
            'name'          => sprintf(__('Footer Widget %d', 'btlabs'), $i),
            'id'            => 'footer-' . $i,
            'description'   => sprintf(__('Widget %d du footer', 'btlabs'), $i),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        ));
    }
}
add_action('widgets_init', 'btlabs_widgets_init');

/**
 * Custom excerpt length
 */
function btlabs_excerpt_length($length) {
    // Limit automatic excerpts to 20 words
    return 20;
}
add_filter('excerpt_length', 'btlabs_excerpt_length');

/**
 * Custom excerpt more
 */
function btlabs_excerpt_more($more) {
    // Replace default excerpt suffix with ellipsis
    return '...';
}
add_filter('excerpt_more', 'btlabs_excerpt_more');

/**
 * Add custom post types for BTlabs
 */
function btlabs_custom_post_types() {
    // Custom post type for projects
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
    
    // Custom post type for services
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
    
    // Custom post type for team members
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
    // Hierarchical categories for projects
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
    
    // Hierarchical categories for services
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
    // Load a custom stylesheet in the WordPress admin area
    wp_enqueue_style('btlabs-admin', get_template_directory_uri() . '/assets/css/admin.css', array(), BTLABS_VERSION);
}
add_action('admin_enqueue_scripts', 'btlabs_admin_customization');

/**
 * Security enhancements
 */
function btlabs_security_enhancements() {
    // Remove WordPress version from the page head
    remove_action('wp_head', 'wp_generator');

    // Disable XML-RPC to reduce attack surface
    add_filter('xmlrpc_enabled', '__return_false');

    // Replace detailed login error messages with a generic one
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

    // Disable emojis to reduce script loading
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'print_emoji_styles');
}
add_action('init', 'btlabs_performance_optimizations');

/**
 * Include custom meta fields
 */
// Include file that registers custom meta boxes
require get_template_directory() . '/inc/custom-meta.php';

/**
 * Include theme options
 */
// Include file that defines theme options in the Customizer
require get_template_directory() . '/inc/theme-options.php';

/**
 * Fallback menu function
 */
function btlabs_fallback_menu() {
    // Display a simple menu if no custom menu is assigned
    echo '<ul class="main-menu">';
    echo '<li><a href="' . home_url('/') . '">Accueil</a></li>';
    echo '<li><a href="' . home_url('/a-propos/') . '">À propos</a></li>';
    echo '<li><a href="' . home_url('/services/') . '">Services</a></li>';
    echo '<li><a href="' . home_url('/projets/') . '">Projets</a></li>';
    echo '<li><a href="' . home_url('/equipe/') . '">Équipe</a></li>';
    echo '<li><a href="' . home_url('/contact/') . '">Contact</a></li>';
    echo '</ul>';
}
