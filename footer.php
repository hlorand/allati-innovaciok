<?php include "temakorok.php"; ?>

</main>

<!-- Lábléc: üvegpapír stílusban, a fejléccel egységesen. -->
<footer class="site-footer mt-12 pb-8 pt-4 sm:mt-16 sm:pb-12">
    <div class="site-footer__inner">
        <div class="site-footer__top">
            <a
                class="site-footer__brand"
                href="<?php echo esc_url( home_url( '/' ) ); ?>"
                rel="home"
            >
                <img
                    class="site-footer__logo"
                    src="<?php echo esc_url( get_theme_file_uri( 'assets/images/logo-small.png' ) ); ?>"
                    alt=""
                    width="88"
                    height="88"
                >

                <span>
                    <strong><?php bloginfo( 'name' ); ?></strong>
                    <small><?php bloginfo( 'description' ); ?></small>
                </span>

            </a>

            <ul>
                    <li><a href="https://www.facebook.com/profile.php?id=100051141878890" target="_blank" rel="noopener noreferrer">▶ Facebook</a></li>
                    <li><a href="https://www.instagram.com/" target="_blank" rel="noopener noreferrer">▶ Instagram</a></li>
                    <li><a href="https://www.youtube.com/@kriskagyorgy/videos" target="_blank" rel="noopener noreferrer">▶ YouTube</a></li>
                </ul>

            <a class="site-footer__top-link" href="#top">
                Vissza az elejére <span aria-hidden="true">↑</span>
            </a>
        </div>

        <p style="text-align: center; margin: 0 auto; margin-top: 20px;">
            Horváth Gábor &sdot; Kriska György &sdot; Kriska Ferenc &sdot; Horváth Loránd
        </p>

        <?php if ( has_nav_menu( 'footer_menu' ) ) : ?>
            <nav class="site-footer__nav" aria-label="Lábléc navigáció">
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'footer_menu',
                        'container'      => false,
                        'menu_class'     => 'site-footer__menu',
                        'fallback_cb'    => false,
                    )
                );
                ?>
            </nav>
        <?php endif; ?>

        <div class="site-footer__bottom">
            <p>
                &copy; <?php echo esc_html( wp_date( 'Y' ) ); ?>
                <?php bloginfo( 'name' ); ?>. Minden jog fenntartva.
            </p>

            <?php if ( function_exists( 'the_privacy_policy_link' ) ) : ?>
                <p class="site-footer__privacy">
                    <?php the_privacy_policy_link( '', '' ); ?>
                </p>
            <?php endif; ?>
        </div>
    </div>
</footer>

</div>

    <script>
    AOS.init();
    </script>

<!-- WordPress és pluginok JavaScript beszúrási pontja. -->
<?php wp_footer(); ?>
</body>
</html>