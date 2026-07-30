<?php
/**
 * Tartalék sablon.
 *
 * A WordPress ezt használja, ha az aktuális oldalhoz nincs
 * célzottabb sablon, például category.php vagy single.php.
 */

get_header();
?>

<section class="mx-auto max-w-3xl">
    <?php if ( have_posts() ) : ?>

        <!-- WordPress Loop: az aktuális lekérdezés bejegyzéseinek listája. -->
        <?php while ( have_posts() ) : ?>
            <?php the_post(); ?>

			<?php
              get_template_part( 'template-parts/card', 'category' );
            ?>
	<div style="margin-bottom: 20px; width:100%;"></div>
	
			<!--
            <article <?php post_class( 'mb-8 rounded-3xl border border-sage/60 bg-white/80 p-6 shadow-sm' ); ?>>
                <h2 class="font-display text-2xl font-bold text-forest">
                    <a
                        class="transition hover:text-coral focus:outline-none focus:ring-4 focus:ring-flower/40"
                        href="<?php the_permalink(); ?>"
                    >
                        <?php the_title(); ?>
                    </a>
                </h2>


                <div class="mt-3 text-ink">
                    <?php the_excerpt(); ?>
                </div>

                <a
                    class="mt-4 inline-flex rounded-full bg-coral px-4 py-2 text-sm font-bold text-white transition hover:-translate-y-0.5 hover:bg-earth hover:shadow-lg focus:outline-none focus:ring-4 focus:ring-flower/40"
                    href="<?php the_permalink(); ?>"
                >
                    Tovább olvasom
                </a>
            </article>
			-->
        <?php endwhile; ?>

    <?php else : ?>

        <!-- Akkor jelenik meg, ha nincs megjeleníthető bejegyzés. -->
        <p class="rounded-3xl border border-sage/60 bg-white/80 p-6">
            Jelenleg még nincs megjeleníthető tartalom.
        </p>

    <?php endif; ?>
</section>

<?php get_footer(); ?>