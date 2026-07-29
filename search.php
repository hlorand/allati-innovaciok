<?php
/**
 * Keresési találatok sablon.
 */

get_header();

$search_term = get_search_query();
?>

<section class="mt-10 sm:mt-14">
    <header class="mb-8 rounded-3xl border border-sage/60 bg-white/40 p-6 shadow-sm sm:mb-10 sm:p-8">
        <p class="text-sm font-bold uppercase tracking-[0.18em] text-earth">
            Keresés
        </p>

        <h1 class="mt-2 font-display text-3xl font-bold text-forest sm:text-4xl">
            <?php if ( have_posts() ) : ?>
                Találatok erre:
                <span class="text-earth">„<?php echo esc_html( $search_term ); ?>”</span>
            <?php else : ?>
                Nincs találat erre:
                <span class="text-earth">„<?php echo esc_html( $search_term ); ?>”</span>
            <?php endif; ?>
        </h1>

        <div class="mt-5 max-w-xl">
            <?php get_search_form(); ?>
        </div>
    </header>

    <?php if ( have_posts() ) : ?>
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 xl:grid-cols-4">
            <?php while ( have_posts() ) : ?>
                <?php the_post(); ?>

                <?php get_template_part( 'template-parts/card', 'latest' ); ?>
            <?php endwhile; ?>
        </div>

        <nav class="mt-10" aria-label="Keresési találatok lapozása">
            <?php
            the_posts_pagination(
                array(
                    'mid_size'  => 1,
                    'prev_text' => '← Előző',
                    'next_text' => 'Következő →',
                )
            );
            ?>
        </nav>

    <?php else : ?>
        <div class="rounded-3xl border border-sage/60 bg-white/70 p-6 text-ink shadow-sm sm:p-8">
            <h2 class="font-display text-2xl font-bold text-forest">
                Próbálj más kifejezést
            </h2>

            <p class="mt-2 leading-relaxed">
                Nem találtunk olyan cikket, amely megfelel ennek a keresésnek.
            </p>

            <div class="mt-5 max-w-xl">
                <?php get_search_form(); ?>
            </div>
        </div>
    <?php endif; ?>
</section>

<?php get_footer(); ?>