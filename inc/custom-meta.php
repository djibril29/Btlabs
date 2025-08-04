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
    $localisation = get_post_meta($post->ID, 'localisation', true);
    $duree = get_post_meta($post->ID, 'duree', true);
    $budget = get_post_meta($post->ID, 'budget', true);
    $services = get_post_meta($post->ID, 'services', true);
    $technologies = get_post_meta($post->ID, 'technologies', true);
    $resultats = get_post_meta($post->ID, 'resultats', true);
    $gallery_images = get_post_meta($post->ID, 'gallery_images', true);
    $statut = get_post_meta($post->ID, 'statut', true);
    $date_debut = get_post_meta($post->ID, 'date_debut', true);
    $date_fin = get_post_meta($post->ID, 'date_fin', true);
    
    ?>
    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem;">
        <!-- Colonne gauche -->
        <div>
            <h3 style="color: #00a651; border-bottom: 2px solid #00a651; padding-bottom: 0.5rem;">Informations Générales</h3>
            
            <table class="form-table">
                <tr>
                    <th><label for="client">Client</label></th>
                    <td>
                        <input type="text" id="client" name="client" value="<?php echo esc_attr($client); ?>" class="regular-text" />
                    </td>
                </tr>
                <tr>
                    <th><label for="localisation">Localisation</label></th>
                    <td>
                        <input type="text" id="localisation" name="localisation" value="<?php echo esc_attr($localisation); ?>" class="regular-text" placeholder="Ex: Dakar, Sénégal" />
                    </td>
                </tr>
                <tr>
                    <th><label for="duree">Durée du projet</label></th>
                    <td>
                        <input type="text" id="duree" name="duree" value="<?php echo esc_attr($duree); ?>" class="regular-text" placeholder="Ex: 6 mois, 1 an" />
                    </td>
                </tr>
                <tr>
                    <th><label for="budget">Budget</label></th>
                    <td>
                        <input type="text" id="budget" name="budget" value="<?php echo esc_attr($budget); ?>" class="regular-text" placeholder="Ex: 50 000€, Sur devis" />
                    </td>
                </tr>
                <tr>
                    <th><label for="statut">Statut</label></th>
                    <td>
                        <select id="statut" name="statut" style="width: 100%;">
                            <option value="">Sélectionner un statut</option>
                            <option value="en-cours" <?php selected($statut, 'en-cours'); ?>>🟡 En cours</option>
                            <option value="termine" <?php selected($statut, 'termine'); ?>>🟢 Terminé</option>
                            <option value="en-attente" <?php selected($statut, 'en-attente'); ?>>🟠 En attente</option>
                            <option value="annule" <?php selected($statut, 'annule'); ?>>🔴 Annulé</option>
                        </select>
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
            </table>
        </div>
        
        <!-- Colonne droite -->
        <div>
            <h3 style="color: #37afae; border-bottom: 2px solid #37afae; padding-bottom: 0.5rem;">Détails Techniques</h3>
            
            <table class="form-table">
                <tr>
                    <th><label for="services">Services fournis</label></th>
                    <td>
                        <textarea id="services" name="services" rows="4" class="large-text" placeholder="Ex: Étude d'impact environnemental, Audit social, Formation"><?php echo esc_textarea($services); ?></textarea>
                        <p class="description">Séparez les services par des virgules</p>
                    </td>
                </tr>
                <tr>
                    <th><label for="technologies">Technologies & Méthodes</label></th>
                    <td>
                        <textarea id="technologies" name="technologies" rows="4" class="large-text" placeholder="Ex: SIG, Analyse statistique, Enquêtes terrain"><?php echo esc_textarea($technologies); ?></textarea>
                        <p class="description">Séparez les technologies par des virgules</p>
                    </td>
                </tr>
                <tr>
                    <th><label for="resultats">Résultats & Impacts</label></th>
                    <td>
                        <textarea id="resultats" name="resultats" rows="6" class="large-text" placeholder="Ex: Réduction de 30% des émissions de CO2&#10;Formation de 50 employés&#10;Certification ISO 14001 obtenue"><?php echo esc_textarea($resultats); ?></textarea>
                        <p class="description">Un résultat par ligne</p>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    
    <!-- Section Galerie -->
    <div style="margin-top: 2rem; padding-top: 2rem; border-top: 1px solid #ddd;">
        <h3 style="color: #af3774; border-bottom: 2px solid #af3774; padding-bottom: 0.5rem;">Galerie d'Images</h3>
        <p class="description">Ajoutez des images supplémentaires pour le projet (optionnel)</p>
        <input type="hidden" id="gallery_images" name="gallery_images" value="<?php echo esc_attr($gallery_images); ?>" />
        <div id="gallery_preview" style="display: flex; flex-wrap: wrap; gap: 1rem; margin-top: 1rem;">
            <?php
            if ($gallery_images) {
                $image_ids = explode(',', $gallery_images);
                foreach ($image_ids as $image_id) {
                    $image_url = wp_get_attachment_image_url($image_id, 'thumbnail');
                    if ($image_url) {
                        echo '<div class="gallery-item" style="position: relative; width: 100px; height: 100px;">';
                        echo '<img src="' . esc_url($image_url) . '" style="width: 100%; height: 100%; object-fit: cover; border-radius: 5px;" />';
                        echo '<button type="button" class="remove-image" data-id="' . $image_id . '" style="position: absolute; top: -5px; right: -5px; background: #dc3545; color: white; border: none; border-radius: 50%; width: 20px; height: 20px; cursor: pointer;">×</button>';
                        echo '</div>';
                    }
                }
            }
            ?>
        </div>
        <button type="button" id="add_gallery_images" class="button" style="margin-top: 1rem;">
            <span class="dashicons dashicons-plus-alt"></span> Ajouter des images
        </button>
    </div>
    
    <script>
    jQuery(document).ready(function($) {
        // Gestion de la galerie d'images
        $('#add_gallery_images').click(function() {
            var frame = wp.media({
                title: 'Sélectionner des images pour la galerie',
                button: {
                    text: 'Utiliser ces images'
                },
                multiple: true
            });
            
            frame.on('select', function() {
                var attachments = frame.state().get('selection').toJSON();
                var imageIds = $('#gallery_images').val();
                var currentIds = imageIds ? imageIds.split(',') : [];
                
                attachments.forEach(function(attachment) {
                    if (currentIds.indexOf(attachment.id.toString()) === -1) {
                        currentIds.push(attachment.id);
                        
                        // Ajouter l'aperçu
                        var preview = '<div class="gallery-item" style="position: relative; width: 100px; height: 100px;">';
                        preview += '<img src="' + attachment.sizes.thumbnail.url + '" style="width: 100%; height: 100%; object-fit: cover; border-radius: 5px;" />';
                        preview += '<button type="button" class="remove-image" data-id="' + attachment.id + '" style="position: absolute; top: -5px; right: -5px; background: #dc3545; color: white; border: none; border-radius: 50%; width: 20px; height: 20px; cursor: pointer;">×</button>';
                        preview += '</div>';
                        $('#gallery_preview').append(preview);
                    }
                });
                
                $('#gallery_images').val(currentIds.join(','));
            });
            
            frame.open();
        });
        
        // Supprimer une image
        $(document).on('click', '.remove-image', function() {
            var imageId = $(this).data('id');
            var currentIds = $('#gallery_images').val().split(',');
            var newIds = currentIds.filter(function(id) {
                return id != imageId;
            });
            
            $('#gallery_images').val(newIds.join(','));
            $(this).parent().remove();
        });
    });
    </script>
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

    $meta_fields = [
        'fonction' => 'sanitize_text_field',
        'email' => 'sanitize_email',
        'telephone' => 'sanitize_text_field',
        'linkedin' => 'esc_url_raw',
        'specialites' => 'sanitize_textarea_field',
        'client' => 'sanitize_text_field',
        'localisation' => 'sanitize_text_field',
        'duree' => 'sanitize_text_field',
        'budget' => 'sanitize_text_field',
        'services' => 'sanitize_textarea_field',
        'technologies' => 'sanitize_textarea_field',
        'resultats' => 'sanitize_textarea_field',
        'gallery_images' => 'sanitize_text_field',
        'statut' => 'sanitize_text_field',
        'date_debut' => 'sanitize_text_field',
        'date_fin' => 'sanitize_text_field',
        'tarif' => 'sanitize_text_field',
        'disponibilite' => 'sanitize_text_field',
        'expertise' => 'sanitize_textarea_field',
    ];

    foreach ($meta_fields as $field => $sanitize_callback) {
        if (isset($_POST[$field])) {
            update_post_meta($post_id, $field, call_user_func($sanitize_callback, $_POST[$field]));
        }
    }
}
add_action('save_post', 'btlabs_save_meta'); 
