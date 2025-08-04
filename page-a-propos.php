<?php
/*
Template Name: Page À Propos
*/

get_header(); ?>

<style>
/* CSS de secours pour la page À propos */
.about-hero {
    background: linear-gradient(135deg, rgba(0, 166, 81, 0.9) 0%, rgba(55, 175, 174, 0.9) 100%), url('<?php echo get_template_directory_uri(); ?>/assets/images/Biotox-images.png');
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
}

.about-hero .hero-subtitle {
    font-size: 1.3rem;
    max-width: 800px;
    margin: 0 auto;
    line-height: 1.6;
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

.mission-content .section-title {
    color: #37afae;
    margin-bottom: 2rem;
    font-size: 2.5rem;
}

.mission-text {
    font-size: 1.1rem;
    line-height: 1.8;
    color: #333;
    margin-bottom: 1.5rem;
}

.vision-section {
    padding: 5rem 0;
    background: #f8f9fa;
}

.vision-content {
    max-width: 900px;
    margin: 0 auto;
    text-align: center;
}

.vision-content .section-title {
    color: #37afae;
    margin-bottom: 2rem;
    font-size: 2.5rem;
}

.valeurs-section {
    padding: 5rem 0;
    background: #fff;
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

.valeur-title {
    font-family: 'Intro Rust', Arial, sans-serif;
    color: #37afae;
    font-size: 1.4rem;
    margin-bottom: 1rem;
    font-weight: 600;
}

.valeur-description {
    color: #333;
    line-height: 1.6;
    font-size: 1rem;
}

.equipe-about-section {
    padding: 5rem 0;
    background: #f8f9fa;
}

.about-cta-section {
    padding: 5rem 0;
    background: linear-gradient(135deg, rgba(175, 55, 116, 0.9) 0%, rgba(175, 55, 116, 0.8) 100%), url('<?php echo get_template_directory_uri(); ?>/assets/images/Biotox-images.png');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    color: #fff;
    text-align: center;
}

.cta-content {
    max-width: 700px;
    margin: 0 auto;
}

.cta-title {
    font-family: 'Intro Rust', Arial, sans-serif;
    font-size: 2.5rem;
    margin-bottom: 1rem;
}

.cta-subtitle {
    font-size: 1.2rem;
    margin-bottom: 2rem;
    opacity: 0.9;
}

.cta-buttons {
    display: flex;
    gap: 1rem;
    justify-content: center;
    flex-wrap: wrap;
}

.cta-buttons .btn-primary,
.cta-buttons .btn-secondary {
    padding: 1rem 2rem;
    border-radius: 8px;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
}

.cta-buttons .btn-primary {
    background: #fff;
    color: #af3774;
}

.cta-buttons .btn-secondary {
    background: transparent;
    color: #fff;
    border: 2px solid #fff;
}

/* Responsive */
@media (max-width: 768px) {
    .mission-grid {
        grid-template-columns: 1fr;
        gap: 2rem;
    }
    
    .valeurs-grid {
        grid-template-columns: 1fr;
        gap: 2rem;
    }
    
    .about-hero .hero-title {
        font-size: 2.2rem;
    }
}
</style>

<main id="primary" class="site-main">
    <!-- Hero Section -->
    <section class="about-hero">
        <div class="container">
            <div class="hero-content">
                <h1 class="hero-title">À PROPOS DE BTLABS</h1>
                <p class="hero-subtitle">Cabinet d'étude environnementale et sociale spécialisé dans l'analyse et la gestion des impacts environnementaux et sociaux.</p>
            </div>
        </div>
    </section>

    <!-- Mission Section -->
    <section class="mission-section">
        <div class="container">
            <div class="mission-grid">
                <div class="mission-content">
                    <h2 class="section-title">Notre Mission</h2>
                    <p class="mission-text">
                        Chez BTLabs, notre mission est de contribuer au développement durable en fournissant des solutions innovantes et des expertises de pointe en matière d'études environnementales et sociales. Nous nous engageons à accompagner nos clients dans leurs projets en minimisant les impacts négatifs sur l'environnement et en maximisant les bénéfices pour les communautés locales.
                    </p>
                    <p class="mission-text">
                        Nous croyons fermement que le développement économique peut et doit aller de pair avec la protection de l'environnement et le bien-être social. Notre approche holistique nous permet d'identifier, d'évaluer et de proposer des solutions durables pour les défis environnementaux et sociaux actuels.
                    </p>
                </div>
                <div class="mission-image">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/mission-btlabs.png" alt="Mission BTLabs">
                </div>
            </div>
        </div>
    </section>

    <!-- Vision Section -->
    <section class="vision-section">
        <div class="container">
            <div class="vision-content">
                <h2 class="section-title">Notre Vision</h2>
                <div class="vision-text">
                    <p>
                        Nous aspirons à devenir un leader reconnu dans le domaine des études environnementales et sociales, en établissant de nouveaux standards d'excellence et d'innovation. Notre vision est de créer un monde où chaque projet de développement intègre naturellement les considérations environnementales et sociales dès sa conception.
                    </p>
                    <p>
                        Nous envisageons un avenir où les entreprises, les gouvernements et les organisations comprennent que la durabilité n'est pas une contrainte, mais un moteur d'innovation et de croissance responsable. BTLabs s'engage à être un catalyseur de ce changement en fournissant des outils, des méthodologies et des expertises qui transforment les défis en opportunités.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Valeurs Section -->
    <section class="valeurs-section">
        <div class="container">
            <h2 class="section-title">Nos Valeurs</h2>
            <div class="valeurs-grid">
                <!-- Valeur 1 -->
                <div class="valeur-card">
                    <div class="valeur-icon">
                        <i class="fas fa-leaf"></i>
                    </div>
                    <h3 class="valeur-title">Durabilité</h3>
                    <p class="valeur-description">
                        Nous intégrons systématiquement les principes de développement durable dans toutes nos analyses et recommandations, en considérant les impacts à long terme sur l'environnement et les générations futures.
                    </p>
                </div>

                <!-- Valeur 2 -->
                <div class="valeur-card">
                    <div class="valeur-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3 class="valeur-title">Responsabilité Sociale</h3>
                    <p class="valeur-description">
                        Nous nous engageons à promouvoir le bien-être des communautés locales et à respecter les droits de tous les acteurs impliqués dans les projets que nous accompagnons.
                    </p>
                </div>

                <!-- Valeur 3 -->
                <div class="valeur-card">
                    <div class="valeur-icon">
                        <i class="fas fa-lightbulb"></i>
                    </div>
                    <h3 class="valeur-title">Innovation</h3>
                    <p class="valeur-description">
                        Nous recherchons constamment de nouvelles approches et technologies pour améliorer nos méthodologies et offrir des solutions plus efficaces et durables.
                    </p>
                </div>

                <!-- Valeur 4 -->
                <div class="valeur-card">
                    <div class="valeur-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h3 class="valeur-title">Intégrité</h3>
                    <p class="valeur-description">
                        Nous maintenons les plus hauts standards d'éthique professionnelle, en garantissant l'indépendance de nos analyses et la transparence de nos processus.
                    </p>
                </div>

                <!-- Valeur 5 -->
                <div class="valeur-card">
                    <div class="valeur-icon">
                        <i class="fas fa-handshake"></i>
                    </div>
                    <h3 class="valeur-title">Collaboration</h3>
                    <p class="valeur-description">
                        Nous croyons en la puissance de la collaboration et travaillons en étroite relation avec nos clients, les communautés locales et les parties prenantes pour atteindre des résultats optimaux.
                    </p>
                </div>

                <!-- Valeur 6 -->
                <div class="valeur-card">
                    <div class="valeur-icon">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <h3 class="valeur-title">Excellence</h3>
                    <p class="valeur-description">
                        Nous nous engageons à maintenir les plus hauts standards de qualité dans tous nos services, en nous appuyant sur l'expertise de notre équipe et les meilleures pratiques du secteur.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Équipe Section -->
    <section class="equipe-about-section">
        <div class="container">
            <h2 class="section-title">Notre Équipe</h2>
            <p class="section-subtitle">Des experts passionnés par l'environnement et le développement durable</p>
            <div class="equipe-grid">
                <?php
                $equipe_query = new WP_Query(array(
                    'post_type' => 'equipe',
                    'posts_per_page' => 4,
                    'post_status' => 'publish'
                ));

                if ($equipe_query->have_posts()) :
                    while ($equipe_query->have_posts()) : $equipe_query->the_post();
                        ?>
                        <div class="membre-card">
                            <div class="membre-photo">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('btlabs-card'); ?>
                                <?php else : ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/default-member.png" alt="<?php the_title(); ?>">
                                <?php endif; ?>
                            </div>
                            <div class="membre-content">
                                <h3 class="membre-nom"><?php the_title(); ?></h3>
                                <p class="fonction"><?php echo get_post_meta(get_the_ID(), 'fonction', true); ?></p>
                                <div class="membre-excerpt">
                                    <?php echo wp_trim_words(get_the_excerpt(), 15, '...'); ?>
                                </div>
                            </div>
                        </div>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>
            <div class="equipe-cta">
                <a href="<?php echo esc_url(home_url('/equipe/')); ?>" class="btn-primary">Voir Toute l'Équipe</a>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="about-cta-section">
        <div class="container">
            <div class="cta-content">
                <h2 class="cta-title">Prêt à Collaborer avec BTLabs ?</h2>
                <p class="cta-subtitle">Découvrez comment nous pouvons vous accompagner dans vos projets environnementaux et sociaux</p>
                <div class="cta-buttons">
                    <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn-primary">Nous Contacter</a>
                    <a href="<?php echo esc_url(home_url('/services/')); ?>" class="btn-secondary">Nos Services</a>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?> 