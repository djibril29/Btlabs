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