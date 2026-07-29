<?php
/**
 * Oldalsáv sablon.
 *
 * Kategória- és bejegyzésoldalon jelenik meg.
 * A tartalmát az adminban, a Megjelenés → Widgetek oldalon
 * lehet összeállítani (primary-sidebar widget-terület).
 */
?>

<aside class="flex flex-col" aria-label="<?php esc_attr_e( 'Oldalsáv', 'allati-innovaciok' ); ?>">
    <?php if ( is_active_sidebar( 'primary-sidebar' ) ) : ?>

        <?php dynamic_sidebar( 'primary-sidebar' ); ?>

    <?php else : ?>

        <!-- Akkor jelenik meg, ha még nincs widget elhelyezve. -->
        <p class="rounded-3xl border border-sage/60 bg-white/80 p-5 text-sm text-ink">
            Az oldalsáv jelenleg üres. Widgetek a Megjelenés → Widgetek menüben adhatók hozzá.
        </p>

    <?php endif; ?>
</aside>