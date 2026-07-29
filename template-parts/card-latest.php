<?php
/**
 * Főoldali „legfrissebb cikk” kártya.
 *
 * A front-page.php WP_Query loopjában fut.
 * Kép, cím, rövid kivonat és „Tovább olvasom” link jelenik meg.
 */
?>

<article data-aos="fade-up" data-aos-delay="<?php global $cnt; echo 100 * $cnt; ?>" <?php post_class( 'group flex h-full flex-col overflow-hidden rounded-3xl border border-sage/60 bg-white/80 shadow-sm transition duration-300 hover:-translate-y-1 hover:border-moss hover:shadow-[0_12px_30px_rgba(49,91,62,0.18)]' ); ?>>

    <!-- Kiemelt kép vagy egységes képhelyőrző. -->
    <a
        class="block overflow-hidden"
        href="<?php the_permalink(); ?>"
        aria-label="<?php echo esc_attr( get_the_title() ); ?>"
    >
        <?php if ( has_post_thumbnail() ) : ?>
            <?php
            the_post_thumbnail(
                'medium_large',
                array(
                    'class' => 'aspect-[4/3] w-full object-cover transition duration-500 scale-105 group-hover:scale-110',
                    'alt'   => the_title_attribute( array( 'echo' => false ) ),
                )
            );
            ?>
        <?php else : ?>
            <div class="aspect-[4/3] w-full bg-gradient-to-br from-sage/70 via-sand/60 to-flower/40"></div>
        <?php endif; ?>
    </a>

    <!-- A kártya szöveges része. -->
    <div class="flex flex-1 flex-col p-5">
        <p class="text-xs font-bold uppercase tracking-[0.16em] text-earth">
            <?php echo esc_html( get_the_date() ); ?>
        </p>

        <h2 class="mt-2 font-display text-2xl font-bold leading-tight text-forest">
            <a
                class="transition hover:text-coral focus:outline-none focus:ring-4 focus:ring-flower/40"
                href="<?php the_permalink(); ?>"
            >
                <?php the_title(); ?>
            </a>
        </h2>

        <!-- Rövid, maximum kb. 22 szavas kivonat. -->
        <p class="mt-3 text-base leading-relaxed text-ink">
            <?php echo esc_html( wp_trim_words( get_the_excerpt(), 22, '…' ) ); ?>
        </p>

        <a
            class="mt-5 inline-flex w-fit rounded-full bg-coral px-4 py-2 text-sm font-bold text-white transition duration-300 hover:-translate-y-0.5 hover:bg-earth hover:shadow-lg focus:outline-none focus:ring-4 focus:ring-flower/40"
            href="<?php the_permalink(); ?>"
        >
            Tovább olvasom
        </a>
    </div>
</article>