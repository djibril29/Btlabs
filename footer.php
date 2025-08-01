    <footer id="colophon" class="site-footer">
        <div class="footer-content">
            <div class="footer-widgets">
                <div class="footer-widget-area">
                    <?php if (is_active_sidebar('footer-1')) : ?>
                        <?php dynamic_sidebar('footer-1'); ?>
                    <?php else : ?>
                        <div class="widget">
                            <h3 class="widget-title">BTlabs</h3>
                            <p>Cabinet d'étude environnementale et sociale spécialisé dans l'analyse et la gestion des impacts environnementaux et sociaux.</p>
                        </div>
                    <?php endif; ?>
                </div>
                
                <div class="footer-widget-area">
                    <?php if (is_active_sidebar('footer-2')) : ?>
                        <?php dynamic_sidebar('footer-2'); ?>
                    <?php else : ?>
                        <div class="widget">
                            <h3 class="widget-title">Services</h3>
                            <ul>
                                <li><a href="<?php echo home_url('/services/'); ?>">Études d'impact</a></li>
                                <li><a href="<?php echo home_url('/services/'); ?>">Audits environnementaux</a></li>
                                <li><a href="<?php echo home_url('/services/'); ?>">Consultation sociale</a></li>
                                <li><a href="<?php echo home_url('/services/'); ?>">Formation</a></li>
                            </ul>
                        </div>
                    <?php endif; ?>
                </div>
                
                <div class="footer-widget-area">
                    <?php if (is_active_sidebar('footer-3')) : ?>
                        <?php dynamic_sidebar('footer-3'); ?>
                    <?php else : ?>
                        <div class="widget">
                            <h3 class="widget-title">Contact</h3>
                            <p>Email: contact@btlabs.com<br>
                            Téléphone: +33 1 23 45 67 89<br>
                            Adresse: Paris, France</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            
            <div class="footer-bottom">
                <div class="footer-info">
                    <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. Tous droits réservés.</p>
                </div>
                
                <div class="footer-menu">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer',
                        'menu_class' => 'footer-menu-list',
                        'container' => false,
                        'fallback_cb' => false,
                    ));
                    ?>
                </div>
            </div>
        </div>
    </footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html> 