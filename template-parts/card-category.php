<?php
/**
 * Kategóriaoldali cikk-kártya.
 *
 * Elrendezés: bal oldalon kép, jobb oldalon cím és
 * hosszabb kivonat, alul „Tovább olvasom” link.
 */
?>

<article data-aos="fade-up" <?php post_class( 'group flex flex-col overflow-hidden rounded-3xl border border-sage/60 bg-white/80 shadow-sm transition duration-300 hover:-translate-y-1 hover:border-moss hover:shadow-[0_12px_30px_rgba(49,91,62,0.18)] sm:flex-row' ); ?>>

    <!-- Bal oldali kép, vagy annak helyőrzője. -->
    <a
        class="block overflow-hidden sm:w-64 sm:flex-shrink-0"
        href="<?php the_permalink(); ?>"
        aria-label="<?php echo esc_attr( get_the_title() ); ?>"
    >
        <?php if ( has_post_thumbnail() ) : ?>
            <?php
            the_post_thumbnail(
                'medium_large',
                array(
                    'class' => 'aspect-[4/3] h-full w-full object-cover transition duration-500 scale-105 group-hover:scale-110',
                    'alt'   => the_title_attribute( array( 'echo' => false ) ),
                )
            );
            ?>
        <?php else : ?>
            <div class="aspect-[4/3] h-full w-full bg-gradient-to-br from-sage/70 via-sand/60 to-flower/40 sm:aspect-auto"></div>
        <?php endif; ?>
    </a>

    <!-- Jobb oldali szöveges rész. -->
    <div class="flex flex-1 flex-col p-6">
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

        <!-- Hosszabb kivonat, mint a főoldali kártyán. -->
        <p class="mt-3 text-base leading-relaxed text-ink">
            <?php echo esc_html( wp_trim_words( get_the_excerpt(), 45, '…' ) ); ?>
        </p>

        <a
            class="mt-5 inline-flex w-fit rounded-full bg-coral px-4 py-2 text-sm font-bold text-white transition duration-300 hover:-translate-y-0.5 hover:bg-earth hover:shadow-lg focus:outline-none focus:ring-4 focus:ring-flower/40"
            href="<?php the_permalink(); ?>"
        >
            Tovább olvasom
        </a>
    </div>
</article>