<?php
/**
 * Állati innovációk – témafunkciók.
 *
 * Itt regisztráljuk a téma WordPress-funkcióit,
 * widget-területeit, valamint itt töltjük be a CSS- és JS-fájlokat.
 */

defined( 'ABSPATH' ) || exit; // Közvetlen fájlmegnyitás tiltása.

/**
 * Téma-alapbeállítások.
 *
 * Az after_setup_theme hook akkor fut le, amikor a WordPress
 * már betöltötte az aktuális témát.
 */
function allati_innovaciok_setup() {

    // A <title> tartalmát a WordPress állítja elő.
    add_theme_support( 'title-tag' );

    // Bekapcsolja a kiemelt kép használatát a bejegyzéseknél.
    add_theme_support( 'post-thumbnails' );

    // Korszerű HTML5 jelölést használ az alábbi WordPress-elemekhez.
    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        )
    );

    add_theme_support( 'responsive-embeds' );

    // A YouTube és más beágyazott videók reszponzívan jelenhetnek meg.
    add_theme_support( 'responsive-embeds' );

    // Adminból kezelhető navigációs menühely.
    register_nav_menus(
        array(
            'primary' => __( 'Főmenü', 'allati-innovaciok' ),
            'footer_menu'  => __( 'Footer menü', 'allati-innovaciok' ),
        )
    );
}
add_action( 'after_setup_theme', 'allati_innovaciok_setup' );

/**
 * Widget-területek regisztrálása.
 *
 * Ezt a területet a kategória- és bejegyzésoldalak sidebar.php fájlja
 * jeleníti majd meg. Az ügyfél itt helyezhet el widgeteket az adminban.
 */
function allati_innovaciok_widgets_init() {

    register_sidebar(
        array(
            'name'          => __( 'Fő oldalsáv', 'allati-innovaciok' ),
            'id'            => 'primary-sidebar',
            'description'   => __( 'A kategória- és bejegyzésoldal jobb oldali sávja.', 'allati-innovaciok' ),

            // A widget köré kerülő HTML és Tailwind stílusok.
            'before_widget' => '<section id="%1$s" class="widget %2$s mb-8 rounded-3xl border border-[#A8BFA3]/60 bg-white/80 p-5 shadow-sm">',
            'after_widget'  => '</section>',

            // A widget címe köré kerülő HTML és Tailwind stílusok.
            'before_title'  => '<h2 class="mb-4 text-xl font-bold text-[#315B3E]">',
            'after_title'   => '</h2>',
        )
    );
}
add_action( 'widgets_init', 'allati_innovaciok_widgets_init' );

/**
 * Stíluslapok és JavaScript betöltése a látogatói oldalon.
 *
 * A wp_enqueue_* funkciókat használjuk, nem közvetlen <link> vagy
 * <script> tageket, mert így a WordPress kezeli a függőségeket.
 */
function allati_innovaciok_enqueue_assets() {

    // A kötelező style.css: témaazonosító és későbbi alap CSS.
    wp_enqueue_style(
        'allati-innovaciok-style',
        get_stylesheet_uri(),
        array(),
        wp_get_theme()->get( 'Version' )
    );

    // A meglévő fő stíluslap.
    wp_enqueue_style(
        'allati-innovaciok-main',
        get_template_directory_uri() . '/assets/css/main.css',
        array(),
        wp_get_theme()->get( 'Version' )
    );

    // A külön kezelt animált háttér stíluslapja.
    wp_enqueue_style(
        'allati-innovaciok-background',
        get_template_directory_uri() . '/assets/css/background.css',
        array( 'allati-innovaciok-main' ),
        wp_get_theme()->get( 'Version' )
    );

    // A háttér dekorációs HTML-jét létrehozó script.
    wp_enqueue_script(
        'allati-innovaciok-background',
        get_template_directory_uri() . '/assets/js/background.js',
        array(),
        wp_get_theme()->get( 'Version' ),
        true
    );
}
add_action( 'wp_enqueue_scripts', 'allati_innovaciok_enqueue_assets' );


/***************
 * 
 * Szerkesztői adminmenü letisztítása.
 */

/**
 * Letisztított WordPress adminmenü szerkesztőknek.
 * Csak ez a négy menüpont marad látható:
 * Bejegyzések, Média, Oldalak, Hozzászólások.
 */
function allati_innovaciok_editor_admin_menu() {
    // Adminokhoz ne nyúljunk.
    if ( current_user_can( 'manage_options' ) ) {
        return;
    }

    // Csak szerkesztői szintű felhasználóknál fusson.
    if ( ! current_user_can( 'edit_others_posts' ) ) {
        return;
    }

    global $menu;

    /*
     * Engedélyezett felső szintű admin-menük slugjai.
     * Plugin menü nincs benne, tehát automatikusan eltűnik.
     */
    $allowed_menu_slugs = array(
        'edit.php',          // Bejegyzések
        'upload.php',        // Média
        'edit.php?post_type=page', // Oldalak
        'edit-comments.php', // Hozzászólások
    );

    foreach ( $menu as $menu_key => $menu_item ) {
        $menu_slug = isset( $menu_item[2] ) ? $menu_item[2] : '';

        if ( ! in_array( $menu_slug, $allowed_menu_slugs, true ) ) {
            unset( $menu[ $menu_key ] );
        }
    }
}
add_action( 'admin_menu', 'allati_innovaciok_editor_admin_menu', 9999 );

/**
 * Letisztított felső admin eszköztár szerkesztőknek.
 */
function allati_innovaciok_editor_admin_bar( $wp_admin_bar ) {
    // Az adminok felső sávját ne módosítsuk.
    if ( current_user_can( 'manage_options' ) ) {
        return;
    }

    // Csak szerkesztői szintű felhasználóknál fusson.
    if ( ! current_user_can( 'edit_others_posts' ) ) {
        return;
    }

    // WordPress logó és almenüi.
    $wp_admin_bar->remove_node( 'wp-logo' );

    // Frissítési értesítés (sárga jelzés).
    $wp_admin_bar->remove_node( 'updates' );

    // Ctrl + K / keresés.
    $wp_admin_bar->remove_node( 'command-palette' );


    // Opcionális: bal felső webhelynév / „Webhely megtekintése”.
    // $wp_admin_bar->remove_node( 'site-name' );

    // Opcionális: „Új” menü.
    // $wp_admin_bar->remove_node( 'new-content' );

    // Opcionális: profil menü jobb felül.
    // Ezt általában hagyd meg, mert itt tud kijelentkezni.
    // $wp_admin_bar->remove_node( 'my-account' );
}
add_action( 'admin_bar_menu', 'allati_innovaciok_editor_admin_bar', 999 );


/**
 * Súgó fülek elrejtése szerkesztőknek.
 */
function allati_innovaciok_remove_editor_help_tabs() {
    if ( current_user_can( 'manage_options' ) ) {
        return;
    }

    if ( ! current_user_can( 'edit_others_posts' ) ) {
        return;
    }

    $screen = get_current_screen();

    if ( $screen ) {
        $screen->remove_help_tabs();
    }
}
add_action( 'current_screen', 'allati_innovaciok_remove_editor_help_tabs' );

/**
 * Szerkesztők adminfelületének további tisztítása:
 * - WordPress core-frissítés figyelmeztetés elrejtése
 * - Képernyő opciók fül elrejtése
 * - Súgó fül elrejtése
 */
function allati_innovaciok_editor_admin_cleanup() {
    // Az adminok mindent lássanak.
    if ( current_user_can( 'manage_options' ) ) {
        return;
    }

    // Csak szerkesztői szintű felhasználóknál.
    if ( ! current_user_can( 'edit_others_posts' ) ) {
        return;
    }

    // A képen látható „Új WordPress verzió elérhető” figyelmeztetés.
    remove_action( 'admin_notices', 'update_nag', 3 );

    // Súgó fülek eltávolítása az aktuális admin képernyőről.
    $screen = get_current_screen();

    if ( $screen ) {
        $screen->remove_help_tabs();
    }
}
add_action( 'current_screen', 'allati_innovaciok_editor_admin_cleanup' );


/**
 * Képernyő opciók fül elrejtése szerkesztőknek.
 */
function allati_innovaciok_hide_editor_screen_options( $show_screen_options ) {
    if ( current_user_can( 'manage_options' ) ) {
        return $show_screen_options;
    }

    if ( current_user_can( 'edit_others_posts' ) ) {
        return false;
    }

    return $show_screen_options;
}
add_filter(
    'screen_options_show_screen',
    'allati_innovaciok_hide_editor_screen_options'
);

