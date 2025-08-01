<?php
/**
 * Custom Meta Fields for BTlabs Theme
 * 
 * @package BTlabs
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Add meta boxes for custom post types
 */
function btlabs_add_meta_boxes() {
    // Meta box for Team members
    add_meta_box(
        'btlabs_team_meta',
        'Informations du membre',
        'btlabs_team_meta_callback',
        'equipe',
        'normal',
        'high'
    );
    
    // Meta box for Projects
    add_meta_box(
        'btlabs_project_meta',
        'Détails du projet',
        'btlabs_project_meta_callback',
        'projets',
        'normal',
        'high'
    );
    
    // Meta box for Services
    add_meta_box(
        'btlabs_service_meta',
        'Détails du service',
        'btlabs_service_meta_callback',
        'services',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'btlabs_add_meta_boxes');

/**
 * Team member meta box callback
 */
function btlabs_team_meta_callback($post) {
    wp_nonce_field('btlabs_save_meta', 'btlabs_meta_nonce');
    
    $fonction = get_post_meta($post->ID, 'fonction', true);
    $email = get_post_meta($post->ID, 'email', true);
    $telephone = get_post_meta($post->ID, 'telephone', true);
    $linkedin = get_post_meta($post->ID, 'linkedin', true);
    $specialites = get_post_meta($post->ID, 'specialites', true);
    
    ?>
    <table class="form-table">
        <tr>
            <th><label for="fonction">Fonction</label></th>
            <td>
                <input type="text" id="fonction" name="fonction" value="<?php echo esc_attr($fonction); ?>" class="regular-text" />
            </td>
        </tr>
        <tr>
            <th><label for="email">Email</label></th>
            <td>
                <input type="email" id="email" name="email" value="<?php echo esc_attr($email); ?>" class="regular-text" />
            </td>
        </tr>
        <tr>
            <th><label for="telephone">Téléphone</label></th>
            <td>
                <input type="tel" id="telephone" name="telephone" value="<?php echo esc_attr($telephone); ?>" class="regular-text" />
            </td>
        </tr>
        <tr>
            <th><label for="linkedin">LinkedIn</label></th>
            <td>
                <input type="url" id="linkedin" name="linkedin" value="<?php echo esc_attr($linkedin); ?>" class="regular-text" />
            </td>
        </tr>
        <tr>
            <th><label for="specialites">Spécialités</label></th>
            <td>
                <textarea id="specialites" name="specialites" rows="3" class="large-text"><?php echo esc_textarea($specialites); ?></textarea>
                <p class="description">Séparez les spécialités par des virgules</p>
            </td>
        </tr>
    </table>
    <?php
}

/**
 * Project meta box callback
 */
function btlabs_project_meta_callback($post) {
    wp_nonce_field('btlabs_save_meta', 'btlabs_meta_nonce');
    
    $client = get_post_meta($post->ID, 'client', true);
    $date_debut = get_post_meta($post->ID, 'date_debut', true);
    $date_fin = get_post_meta($post->ID, 'date_fin', true);
    $budget = get_post_meta($post->ID, 'budget', true);
    $statut = get_post_meta($post->ID, 'statut', true);
    $technologies = get_post_meta($post->ID, 'technologies', true);
    
    ?>
    <table class="form-table">
        <tr>
            <th><label for="client">Client</label></th>
            <td>
                <input type="text" id="client" name="client" value="<?php echo esc_attr($client); ?>" class="regular-text" />
            </td>
        </tr>
        <tr>
            <th><label for="date_debut">Date de début</label></th>
            <td>
                <input type="date" id="date_debut" name="date_debut" value="<?php echo esc_attr($date_debut); ?>" />
            </td>
        </tr>
        <tr>
            <th><label for="date_fin">Date de fin</label></th>
            <td>
                <input type="date" id="date_fin" name="date_fin" value="<?php echo esc_attr($date_fin); ?>" />
            </td>
        </tr>
        <tr>
            <th><label for="budget">Budget</label></th>
            <td>
                <input type="text" id="budget" name="budget" value="<?php echo esc_attr($budget); ?>" class="regular-text" />
            </td>
        </tr>
        <tr>
            <th><label for="statut">Statut</label></th>
            <td>
                <select id="statut" name="statut">
                    <option value="">Sélectionner un statut</option>
                    <option value="en-cours" <?php selected($statut, 'en-cours'); ?>>En cours</option>
                    <option value="termine" <?php selected($statut, 'termine'); ?>>Terminé</option>
                    <option value="en-attente" <?php selected($statut, 'en-attente'); ?>>En attente</option>
                    <option value="annule" <?php selected($statut, 'annule'); ?>>Annulé</option>
                </select>
            </td>
        </tr>
        <tr>
            <th><label for="technologies">Technologies utilisées</label></th>
            <td>
                <textarea id="technologies" name="technologies" rows="3" class="large-text"><?php echo esc_textarea($technologies); ?></textarea>
                <p class="description">Séparez les technologies par des virgules</p>
            </td>
        </tr>
    </table>
    <?php
}

/**
 * Service meta box callback
 */
function btlabs_service_meta_callback($post) {
    wp_nonce_field('btlabs_save_meta', 'btlabs_meta_nonce');
    
    $duree = get_post_meta($post->ID, 'duree', true);
    $tarif = get_post_meta($post->ID, 'tarif', true);
    $disponibilite = get_post_meta($post->ID, 'disponibilite', true);
    $expertise = get_post_meta($post->ID, 'expertise', true);
    
    ?>
    <table class="form-table">
        <tr>
            <th><label for="duree">Durée moyenne</label></th>
            <td>
                <input type="text" id="duree" name="duree" value="<?php echo esc_attr($duree); ?>" class="regular-text" />
                <p class="description">Ex: 2-3 semaines, 1 mois, etc.</p>
            </td>
        </tr>
        <tr>
            <th><label for="tarif">Tarif indicatif</label></th>
            <td>
                <input type="text" id="tarif" name="tarif" value="<?php echo esc_attr($tarif); ?>" class="regular-text" />
                <p class="description">Ex: À partir de 5000€, Sur devis, etc.</p>
            </td>
        </tr>
        <tr>
            <th><label for="disponibilite">Disponibilité</label></th>
            <td>
                <select id="disponibilite" name="disponibilite">
                    <option value="">Sélectionner</option>
                    <option value="immediate" <?php selected($disponibilite, 'immediate'); ?>>Immédiate</option>
                    <option value="sous-2-semaines" <?php selected($disponibilite, 'sous-2-semaines'); ?>>Sous 2 semaines</option>
                    <option value="sous-1-mois" <?php selected($disponibilite, 'sous-1-mois'); ?>>Sous 1 mois</option>
                    <option value="sur-devis" <?php selected($disponibilite, 'sur-devis'); ?>>Sur devis</option>
                </select>
            </td>
        </tr>
        <tr>
            <th><label for="expertise">Niveau d'expertise</label></th>
            <td>
                <textarea id="expertise" name="expertise" rows="3" class="large-text"><?php echo esc_textarea($expertise); ?></textarea>
                <p class="description">Décrivez les compétences et expertises requises</p>
            </td>
        </tr>
    </table>
    <?php
}

/**
 * Save meta box data
 */
function btlabs_save_meta($post_id) {
    // Check if nonce is valid
    if (!isset($_POST['btlabs_meta_nonce']) || !wp_verify_nonce($_POST['btlabs_meta_nonce'], 'btlabs_save_meta')) {
        return;
    }
    
    // Check if user has permissions to save data
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    
    // Check if not an autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    
    // Save team member meta
    if (isset($_POST['fonction'])) {
        update_post_meta($post_id, 'fonction', sanitize_text_field($_POST['fonction']));
    }
    if (isset($_POST['email'])) {
        update_post_meta($post_id, 'email', sanitize_email($_POST['email']));
    }
    if (isset($_POST['telephone'])) {
        update_post_meta($post_id, 'telephone', sanitize_text_field($_POST['telephone']));
    }
    if (isset($_POST['linkedin'])) {
        update_post_meta($post_id, 'linkedin', esc_url_raw($_POST['linkedin']));
    }
    if (isset($_POST['specialites'])) {
        update_post_meta($post_id, 'specialites', sanitize_textarea_field($_POST['specialites']));
    }
    
    // Save project meta
    if (isset($_POST['client'])) {
        update_post_meta($post_id, 'client', sanitize_text_field($_POST['client']));
    }
    if (isset($_POST['date_debut'])) {
        update_post_meta($post_id, 'date_debut', sanitize_text_field($_POST['date_debut']));
    }
    if (isset($_POST['date_fin'])) {
        update_post_meta($post_id, 'date_fin', sanitize_text_field($_POST['date_fin']));
    }
    if (isset($_POST['budget'])) {
        update_post_meta($post_id, 'budget', sanitize_text_field($_POST['budget']));
    }
    if (isset($_POST['statut'])) {
        update_post_meta($post_id, 'statut', sanitize_text_field($_POST['statut']));
    }
    if (isset($_POST['technologies'])) {
        update_post_meta($post_id, 'technologies', sanitize_textarea_field($_POST['technologies']));
    }
    
    // Save service meta
    if (isset($_POST['duree'])) {
        update_post_meta($post_id, 'duree', sanitize_text_field($_POST['duree']));
    }
    if (isset($_POST['tarif'])) {
        update_post_meta($post_id, 'tarif', sanitize_text_field($_POST['tarif']));
    }
    if (isset($_POST['disponibilite'])) {
        update_post_meta($post_id, 'disponibilite', sanitize_text_field($_POST['disponibilite']));
    }
    if (isset($_POST['expertise'])) {
        update_post_meta($post_id, 'expertise', sanitize_textarea_field($_POST['expertise']));
    }
}
add_action('save_post', 'btlabs_save_meta'); 