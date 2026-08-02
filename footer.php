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

			<!-- Közösségi média linkek a láblécben. -->
			<nav class="site-social site-social--footer" aria-label="Közösségi média">
				<a
					class="site-social__link"
					href="https://www.youtube.com/@kriskagyorgy"
					target="_blank"
					rel="noopener noreferrer"
					aria-label="Állati Innovációk a YouTube-on"
				>
					<img
						src="<?php echo esc_url( get_theme_file_uri( 'assets/images/icons/youtube.png' ) ); ?>"
						alt=""
						width="28"
						height="28"
					>
				</a>
				
				<a
					class="site-social__link"
					href="https://www.facebook.com/profile.php?id=61592487846119"
					target="_blank"
					rel="noopener noreferrer"
					aria-label="Állati Innovációk a Facebookon"
				>
					<img
						src="<?php echo esc_url( get_theme_file_uri( 'assets/images/icons/facebook.png' ) ); ?>"
						alt=""
						width="28"
						height="28"
					>
				</a>

				<a
					class="site-social__link"
					href="https://www.instagram.com/allati.innovaciok"
					target="_blank"
					rel="noopener noreferrer"
					aria-label="Állati Innovációk az Instagramon"
				>
					<img
						src="<?php echo esc_url( get_theme_file_uri( 'assets/images/icons/instagram.png' ) ); ?>"
						alt=""
						width="28"
						height="28"
					>
				</a>

				<a
					class="site-social__link"
					href="https://www.tiktok.com/@allati.innovaciok"
					target="_blank"
					rel="noopener noreferrer"
					aria-label="Állati Innovációk a TikTokon"
				>
					<img
						src="<?php echo esc_url( get_theme_file_uri( 'assets/images/icons/tiktok.png' ) ); ?>"
						alt=""
						width="28"
						height="28"
					>
				</a>
			</nav>

            <a class="site-footer__top-link" href="#top" style="margin-top:50px;">
                Vissza az elejére <span aria-hidden="true">↑</span>
            </a>
        </div>

        <p style="text-align: center; margin: 0 auto; margin-top: 20px;">
			<a href="https://arago.elte.hu/" target="_blank">Horváth Gábor</a> &sdot; <a href="https://kriska.web.elte.hu/" target="_blank">Kriska György</a> &sdot; <a href="https://www.youtube.com/@kriskaferenc" target="_blank">Kriska Ferenc</a> &sdot; <a href="https://hlorand.hu" target="_blank">Horváth Loránd</a>
        </p>
		
		<p>
			<img style="margin: 0 auto; width: clamp(50%, 400px, 100%); border-radius: 12px;" src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/nkfi-logo/nkfi logo horizontal.jpg' ); ?>">
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