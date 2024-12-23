        <footer class="pied">
            <section class="pied__global">
                <section class="footer__section">
                    <h2>Liens utiles</h2>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer_menu',
                        'container' => 'nav',
                        'container_class' => 'footer__nav',
                    ));
                    ?>
                    <?php get_search_form(); ?>
                </section>

                <section class="footer__section">
                    <h2>Contact</h2>
                    <address>
                        <p><strong>Adresse :</strong> <?php echo esc_html(get_theme_mod('footer_college_address', 'Adresse non définie')); ?></p>
                        <p><strong>Téléphone :</strong> <?php echo esc_html(get_theme_mod('footer_phone', 'Téléphone non défini')); ?></p>
                        <p><strong>Courriel :</strong> <a href="mailto:<?php echo esc_attr(get_theme_mod('footer_email', 'email@example.com')); ?>">
                        <?php echo esc_html(get_theme_mod('footer_email', 'email@example.com')); ?>
                        </a></p>
                    </address>

                    <div class="footer__social-icons">
                        <?php if ($facebook_image = get_theme_mod('social_facebook_image')) : ?>
                            <a href="<?php echo esc_url(get_theme_mod('social_facebook_link', '#')); ?>" target="_blank">
                                <img src="<?php echo esc_url($facebook_image); ?>" alt="Facebook" class="footer__social-icon">
                            </a>
                        <?php endif; ?>

                        <?php if ($instagram_image = get_theme_mod('social_instagram_image')) : ?>
                            <a href="<?php echo esc_url(get_theme_mod('social_instagram_link', '#')); ?>" target="_blank">
                                <img src="<?php echo esc_url($instagram_image); ?>" alt="Instagram" class="footer__social-icon">
                            </a>
                        <?php endif; ?>
                    </div>
                </section>



                <!-- Nom de l'auteur et lien GitHub -->
                <section class="footer__section">
                    <p>Auteur : Emilie Desmarais</p>
                    <br>
                    <p>lien github: https://github.com/emilie0022/31w.git</p>
                    <br>
                    <p>lien github pays: https://github.com/emilie0022/filtre-pays.git</p>
                </section>
            </section>
        </footer>
        <?php wp_footer(); ?>
    </body>
</html>

