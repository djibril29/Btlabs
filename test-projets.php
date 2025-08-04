<?php
/**
 * Script de test pour diagnostiquer les problèmes avec les projets
 * À placer temporairement dans le dossier racine du thème
 */

// Inclure WordPress
require_once('../../../wp-load.php');

echo "<h1>Diagnostic des Projets BTLabs</h1>";

// Test 1: Vérifier si le type de post 'projets' existe
echo "<h2>1. Vérification du type de post 'projets'</h2>";
$post_type_object = get_post_type_object('projets');
if ($post_type_object) {
    echo "✅ Le type de post 'projets' existe<br>";
    echo "Nom: " . $post_type_object->labels->name . "<br>";
    echo "Singulier: " . $post_type_object->labels->singular_name . "<br>";
} else {
    echo "❌ Le type de post 'projets' n'existe pas<br>";
}

// Test 2: Compter tous les projets
echo "<h2>2. Comptage des projets</h2>";
$all_projects = get_posts(array(
    'post_type' => 'projets',
    'numberposts' => -1,
    'post_status' => 'any'
));
echo "Nombre total de projets (tous statuts): " . count($all_projects) . "<br>";

// Test 3: Compter les projets publiés
echo "<h2>3. Projets publiés</h2>";
$published_projects = get_posts(array(
    'post_type' => 'projets',
    'numberposts' => -1,
    'post_status' => 'publish'
));
echo "Nombre de projets publiés: " . count($published_projects) . "<br>";

// Test 4: Lister les projets avec leurs détails
echo "<h2>4. Détails des projets</h2>";
if ($published_projects) {
    echo "<table border='1' style='border-collapse: collapse; width: 100%;'>";
    echo "<tr><th>ID</th><th>Titre</th><th>Statut</th><th>Date</th><th>Image à la une</th></tr>";
    
    foreach ($published_projects as $project) {
        $has_thumbnail = has_post_thumbnail($project->ID) ? "✅ Oui" : "❌ Non";
        echo "<tr>";
        echo "<td>" . $project->ID . "</td>";
        echo "<td>" . $project->post_title . "</td>";
        echo "<td>" . $project->post_status . "</td>";
        echo "<td>" . $project->post_date . "</td>";
        echo "<td>" . $has_thumbnail . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Aucun projet publié trouvé.<br>";
}

// Test 5: Test de la requête WP_Query
echo "<h2>5. Test de WP_Query</h2>";
$test_query = new WP_Query(array(
    'post_type' => 'projets',
    'posts_per_page' => 3,
    'post_status' => 'publish',
    'orderby' => 'date',
    'order' => 'DESC'
));

echo "Requête SQL: " . $test_query->request . "<br>";
echo "Nombre de posts trouvés: " . $test_query->found_posts . "<br>";
echo "Nombre de posts dans la boucle: " . $test_query->post_count . "<br>";

if ($test_query->have_posts()) {
    echo "<h3>Projets trouvés:</h3>";
    while ($test_query->have_posts()) {
        $test_query->the_post();
        echo "- " . get_the_title() . " (ID: " . get_the_ID() . ")<br>";
    }
    wp_reset_postdata();
} else {
    echo "Aucun projet trouvé avec WP_Query.<br>";
}

// Test 6: Vérifier les taxonomies
echo "<h2>6. Taxonomies pour les projets</h2>";
$taxonomies = get_object_taxonomies('projets');
if ($taxonomies) {
    echo "Taxonomies trouvées: " . implode(', ', $taxonomies) . "<br>";
    
    foreach ($taxonomies as $taxonomy) {
        $terms = get_terms(array(
            'taxonomy' => $taxonomy,
            'hide_empty' => false
        ));
        echo "Termes pour '$taxonomy': " . count($terms) . "<br>";
    }
} else {
    echo "Aucune taxonomie trouvée pour les projets.<br>";
}

// Test 7: Vérifier les permissions
echo "<h2>7. Permissions utilisateur</h2>";
if (current_user_can('edit_posts')) {
    echo "✅ L'utilisateur peut éditer les posts<br>";
} else {
    echo "❌ L'utilisateur ne peut pas éditer les posts<br>";
}

if (current_user_can('publish_posts')) {
    echo "✅ L'utilisateur peut publier des posts<br>";
} else {
    echo "❌ L'utilisateur ne peut pas publier des posts<br>";
}

echo "<h2>8. Recommandations</h2>";
if (count($published_projects) == 0) {
    echo "🔧 <strong>Problème identifié:</strong> Aucun projet publié trouvé.<br>";
    echo "Solutions possibles:<br>";
    echo "1. Vérifiez que vous avez créé des projets dans l'admin WordPress<br>";
    echo "2. Assurez-vous que les projets sont publiés (pas en brouillon)<br>";
    echo "3. Vérifiez que le type de post 'projets' est bien enregistré<br>";
} else {
    echo "✅ Des projets publiés existent. Le problème pourrait être dans le code d'affichage.<br>";
}

echo "<br><strong>Note:</strong> Supprimez ce fichier après diagnostic pour des raisons de sécurité.";
?> 