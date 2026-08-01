<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <!-- Karakterkódolás és mobilos reszponzív nézet. -->
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<?php
        // Alapértelmezett kép
        $og_image = 'https://allati.innovaciok.hu/wp-content/uploads/2026/07/ogimage.jpg';
        
        // Ha bejegyzésen/oldalon vagyunk és van kiemelt kép, cseréljük le
        if ( is_singular() && has_post_thumbnail() ) {
            $og_image = get_the_post_thumbnail_url( get_the_ID(), 'full' );
        }
    ?>
    <meta property="og:image" content="<?php echo esc_url( $og_image ); ?>" />
    <meta property="og:image:secure_url" content="<?php echo esc_url( $og_image ); ?>" />
    <meta property="og:image:type" content="image/jpeg" />

    <!-- Google Fonts: játékos, de jól olvasható betűpár. -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,600;9..144,700&family=Source+Sans+3:wght@400;600;700&display=swap" rel="stylesheet">

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- Tailwind CDN fejlesztéshez, Typography/prose bővítménnyel. -->
    <script src="https://cdn.tailwindcss.com?plugins=typography"></script>

    <!-- Tailwind színek és betűtípusok központi konfigurációja. -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        cream: '#F7F4EC',
                        sage: '#A8BFA3',
                        forest: '#315B3E',
                        moss: '#6F8F72',
                        sand: '#D9C7A3',
                        earth: '#7A5C3E',
                        coral: '#D9775C',
                        flower: '#E9B949',
                        ink: '#253126'
                    },
                    fontFamily: {
                        display: ['Fraunces', 'serif'],
                        body: ['Source Sans 3', 'sans-serif']
                    }
                }
            }
        };
    </script>
	
	<link rel="icon" type="image/png" href="<?php echo esc_url( get_theme_file_uri( 'assets/images/favicon/favicon-96x96.png' ) ); ?>" sizes="96x96" />
	<link rel="icon" type="image/svg+xml" href="<?php echo esc_url( get_theme_file_uri( 'assets/images/favicon/favicon.svg' ) ); ?>" />
	<link rel="shortcut icon" href="<?php echo esc_url( get_theme_file_uri( 'assets/images/favicon/favicon.ico' ) ); ?>" />
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo esc_url( get_theme_file_uri( 'assets/favicon/images/apple-touch-icon.png' ) ); ?>" />
	<link rel="manifest" href="<?php echo esc_url( get_theme_file_uri( 'assets/images/favicon/site.webmanifest' ) ); ?>" />

    <!-- WordPress és pluginok CSS/JS beszúrási pontja. -->
    <?php wp_head(); ?>
</head>

<!-- A természetes, animált háttérhez szükséges globális body class. -->
<body <?php body_class( 'site-background bg-cream font-body text-ink antialiased' ); ?>>
<?php wp_body_open(); ?>

<!-- Teljes oldal központi, maximális szélességű kerete. -->
<div class="mx-auto min-h-screen max-w-7xl px-4 sm:px-6 lg:px-8">

    <!-- Fejléc: cím, alcím és adminból kezelhető navigáció. -->
    <header class="site-header">
        <div class="site-header__inner">

            <!-- Brand: embléma, cím és rövid leírás. -->
            <a
                class="site-brand"
                href="<?php echo esc_url( home_url( '/' ) ); ?>"
                aria-label="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?> – főoldal"
            >
                <span data-aos="fade-right" class="site-brand__logo-wrap">
                    <img 
                        class="site-brand__logo"
                        src="<?php echo esc_url( get_theme_file_uri( 'assets/images/logo-small.png' ) ); ?>"
                        alt=""
                        width="88"
                        height="88"
                    >
                </span>

                <span class="site-brand__copy">
                    <span data-aos="fade-right" class="site-brand__eyebrow">Zoológia · Ökológia · Etológia · Ismeretterjesztés</span>
                    <span data-aos="fade-right" class="site-brand__title">
                        <?php bloginfo( 'name' ); ?>
                    </span>
                    <span data-aos="fade-right" class="site-brand__subtitle">
                        <?php bloginfo( 'description' ); ?>
                    </span>
                </span>
            </a>
			
			<!-- Közösségi média linkek. Asztali nézetben jobb felül, kisebb kijelzőn a brand alá kerülnek. -->
			<nav class="site-social" aria-label="Közösségi média">
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

            <!-- Teljes szélességű navigációs felület. -->
            <nav
                class="site-navigation"
                aria-label="<?php esc_attr_e( 'Elsődleges menü', 'allati-innovaciok' ); ?>"
            >
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'primary',
                        'container'      => false,
                        'menu_class'     => 'site-navigation__menu',
                        'fallback_cb'    => false,
                    )
                );
                ?>
            </nav>

        </div>
    </header>

    <!-- Az aktuális oldal fő tartalma itt kezdődik. -->
    <main class="py-2 sm:py-4">
