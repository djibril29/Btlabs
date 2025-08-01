<?php
/**
 * Theme Options for BTlabs
 * 
 * @package BTlabs
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Add theme options page
 */
function btlabs_add_theme_options_page() {
    add_theme_page(
        'Options BTlabs',
        'Options BTlabs',
        'manage_options',
        'btlabs-options',
        'btlabs_theme_options_page'
    );
}
add_action('admin_menu', 'btlabs_add_theme_options_page');

/**
 * Register settings
 */
function btlabs_register_settings() {
    register_setting('btlabs_options', 'btlabs_contact_email');
    register_setting('btlabs_options', 'btlabs_contact_phone');
    register_setting('btlabs_options', 'btlabs_contact_address');
    register_setting('btlabs_options', 'btlabs_social_facebook');
    register_setting('btlabs_options', 'btlabs_social_linkedin');
    register_setting('btlabs_options', 'btlabs_social_twitter');
    register_setting('btlabs_options', 'btlabs_analytics_code');
    register_setting('btlabs_options', 'btlabs_hero_title');
    register_setting('btlabs_options', 'btlabs_hero_subtitle');
    register_setting('btlabs_options', 'btlabs_hero_button_text');
    register_setting('btlabs_options', 'btlabs_hero_button_url');
}
add_action('admin_init', 'btlabs_register_settings');

/**
 * Theme options page callback
 */
function btlabs_theme_options_page() {
    ?>
    <div class="wrap">
        <h1>Options BTlabs</h1>
        
        <form method="post" action="options.php">
            <?php settings_fields('btlabs_options'); ?>
            <?php do_settings_sections('btlabs_options'); ?>
            
            <h2>Informations de contact</h2>
            <table class="form-table">
                <tr>
                    <th scope="row">
                        <label for="btlabs_contact_email">Email de contact</label>
                    </th>
                    <td>
                        <input type="email" id="btlabs_contact_email" name="btlabs_contact_email" 
                               value="<?php echo esc_attr(get_option('btlabs_contact_email')); ?>" class="regular-text" />
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="btlabs_contact_phone">Téléphone</label>
                    </th>
                    <td>
                        <input type="tel" id="btlabs_contact_phone" name="btlabs_contact_phone" 
                               value="<?php echo esc_attr(get_option('btlabs_contact_phone')); ?>" class="regular-text" />
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="btlabs_contact_address">Adresse</label>
                    </th>
                    <td>
                        <textarea id="btlabs_contact_address" name="btlabs_contact_address" rows="3" class="large-text"><?php echo esc_textarea(get_option('btlabs_contact_address')); ?></textarea>
                    </td>
                </tr>
            </table>
            
            <h2>Réseaux sociaux</h2>
            <table class="form-table">
                <tr>
                    <th scope="row">
                        <label for="btlabs_social_facebook">Facebook</label>
                    </th>
                    <td>
                        <input type="url" id="btlabs_social_facebook" name="btlabs_social_facebook" 
                               value="<?php echo esc_attr(get_option('btlabs_social_facebook')); ?>" class="regular-text" />
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="btlabs_social_linkedin">LinkedIn</label>
                    </th>
                    <td>
                        <input type="url" id="btlabs_social_linkedin" name="btlabs_social_linkedin" 
                               value="<?php echo esc_attr(get_option('btlabs_social_linkedin')); ?>" class="regular-text" />
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="btlabs_social_twitter">Twitter</label>
                    </th>
                    <td>
                        <input type="url" id="btlabs_social_twitter" name="btlabs_social_twitter" 
                               value="<?php echo esc_attr(get_option('btlabs_social_twitter')); ?>" class="regular-text" />
                    </td>
                </tr>
            </table>
            
            <h2>Page d'accueil</h2>
            <table class="form-table">
                <tr>
                    <th scope="row">
                        <label for="btlabs_hero_title">Titre principal</label>
                    </th>
                    <td>
                        <input type="text" id="btlabs_hero_title" name="btlabs_hero_title" 
                               value="<?php echo esc_attr(get_option('btlabs_hero_title')); ?>" class="regular-text" />
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="btlabs_hero_subtitle">Sous-titre</label>
                    </th>
                    <td>
                        <textarea id="btlabs_hero_subtitle" name="btlabs_hero_subtitle" rows="2" class="large-text"><?php echo esc_textarea(get_option('btlabs_hero_subtitle')); ?></textarea>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="btlabs_hero_button_text">Texte du bouton</label>
                    </th>
                    <td>
                        <input type="text" id="btlabs_hero_button_text" name="btlabs_hero_button_text" 
                               value="<?php echo esc_attr(get_option('btlabs_hero_button_text')); ?>" class="regular-text" />
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="btlabs_hero_button_url">URL du bouton</label>
                    </th>
                    <td>
                        <input type="url" id="btlabs_hero_button_url" name="btlabs_hero_button_url" 
                               value="<?php echo esc_attr(get_option('btlabs_hero_button_url')); ?>" class="regular-text" />
                    </td>
                </tr>
            </table>
            
            <h2>Analytics</h2>
            <table class="form-table">
                <tr>
                    <th scope="row">
                        <label for="btlabs_analytics_code">Code Google Analytics</label>
                    </th>
                    <td>
                        <textarea id="btlabs_analytics_code" name="btlabs_analytics_code" rows="5" class="large-text"><?php echo esc_textarea(get_option('btlabs_analytics_code')); ?></textarea>
                        <p class="description">Collez ici votre code de suivi Google Analytics (gtag.js ou analytics.js)</p>
                    </td>
                </tr>
            </table>
            
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}

/**
 * Helper functions to get theme options
 */
function btlabs_get_contact_email() {
    return get_option('btlabs_contact_email', 'contact@btlabs.com');
}

function btlabs_get_contact_phone() {
    return get_option('btlabs_contact_phone', '+33 1 23 45 67 89');
}

function btlabs_get_contact_address() {
    return get_option('btlabs_contact_address', 'Paris, France');
}

function btlabs_get_social_facebook() {
    return get_option('btlabs_social_facebook');
}

function btlabs_get_social_linkedin() {
    return get_option('btlabs_social_linkedin');
}

function btlabs_get_social_twitter() {
    return get_option('btlabs_social_twitter');
}

function btlabs_get_hero_title() {
    return get_option('btlabs_hero_title', 'BTlabs - Cabinet d\'étude environnementale et sociale');
}

function btlabs_get_hero_subtitle() {
    return get_option('btlabs_hero_subtitle', 'Expertise en études d\'impact environnemental et social');
}

function btlabs_get_hero_button_text() {
    return get_option('btlabs_hero_button_text', 'Découvrir nos services');
}

function btlabs_get_hero_button_url() {
    return get_option('btlabs_hero_button_url', '/services/');
}

function btlabs_get_analytics_code() {
    return get_option('btlabs_analytics_code');
} 