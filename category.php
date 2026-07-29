<?php
/**
 * Kategóriaarchívum sablon.
 *
 * A WordPress a kategória-oldalakhoz automatikusan ezt a fájlt
 * választja a sablonhierarchia szerint (category.php).
 *
 * Bal oldal: az adott kategória összes cikke, lapozás nélkül.
 * Jobb oldal: sidebar.php.
 */

get_header();

// A jelenlegi kategória objektuma (cím, leírás, azonosító).
$current_category = get_queried_object();
?>

<div class="grid grid-cols-1 gap-10 lg:grid-cols-[minmax(0,1fr)_320px]">

    <!-- Bal oldal: a kategória cikkfolyama. -->
    <section>

        <!-- Kategória fejléce: cím és opcionális leírás. -->
        <header class="mb-8">
            <p class="text-sm font-bold uppercase tracking-[0.18em] text-earth">
                Témakör
            </p>

            <h1 class="mt-1 font-display text-3xl font-bold text-forest sm:text-4xl">
                <?php echo esc_html( $current_category->name ); ?>
            </h1>

            <?php if ( ! empty( $current_category->description ) ) : ?>
                <p class="mt-3 max-w-2xl text-ink">
                    <?php echo esc_html( $current_category->description ); ?>
                </p>
            <?php endif; ?>
        </header>

        <?php if ( have_posts() ) : ?>

            <!-- Minden bejegyzés egymás alatt, lapozás nélkül. -->
            <div class="flex flex-col gap-6">
                <?php while ( have_posts() ) : ?>
                    <?php the_post(); ?>

                    <?php
                    /**
                     * Egy nagy, vízszintes cikk-kártya.
                     * A kód a template-parts/card-category.php fájlban van.
                     */
                    get_template_part( 'template-parts/card', 'category' );
                    ?>
                <?php endwhile; ?>
            </div>

        <?php else : ?>

            <!-- Akkor jelenik meg, ha a kategóriában még nincs bejegyzés. -->
            <p class="rounded-3xl border border-sage/60 bg-white/80 p-6 text-ink">
                Ebben a témakörben még nincs publikált cikk.
            </p>

        <?php endif; ?>
    </section>

    <!-- Jobb oldal: adminból tölthető sidebar. -->
    <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>