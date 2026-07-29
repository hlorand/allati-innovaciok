<?php
/**
 * Statikus oldal sablon.
 *
 * Ezt használja a WordPress a hagyományos Oldal típusú tartalmakhoz,
 * például a Rólunk, Kapcsolat és Impresszum oldalhoz.
 *
 * Bal oldalon az oldal tartalma, jobb oldalon ugyanaz a sidebar,
 * mint az egyedi bejegyzéseknél.
 */

get_header();
?>

<div class="grid grid-cols-1 gap-10 lg:grid-cols-[minmax(0,1fr)_320px]">

    <!-- Bal oldal: az aktuális statikus oldal tartalma. -->
    <section>
        <?php while ( have_posts() ) : ?>
            <?php the_post(); ?>

            <article <?php post_class( 'rounded-3xl border border-sage/60 bg-white/80 p-6 shadow-sm sm:p-9' ); ?>>

                <!-- Az adminban megadott oldal címe. -->
                <h1 class="font-display text-4xl font-bold leading-tight text-forest sm:text-5xl">
                    <?php the_title(); ?>
                </h1>

                <!-- Classic Editorból érkező oldal-tartalom, prose tipográfiával. -->
                <div class="prose prose-lg mt-8 max-w-none prose-headings:font-display prose-headings:text-forest prose-a:text-coral prose-a:font-bold prose-a:no-underline hover:prose-a:text-earth hover:prose-a:underline prose-strong:text-forest prose-blockquote:border-l-moss prose-blockquote:text-earth prose-figcaption:text-earth">
                    <?php the_content(); ?>
                </div>

            </article>
        <?php endwhile; ?>
    </section>

    <!-- Jobb oldal: adminból kezelhető widgetek. -->
    <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>