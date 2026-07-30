<?php
/**
 * Egyedi bejegyzés sablon.
 *
 * A WordPress ezt a fájlt tölti be egyetlen blogbejegyzés
 * megnyitásakor. A bal oldalon a teljes cikk, jobb oldalon
 * a sidebar jelenik meg.
 */

get_header();
?>

<div class="grid grid-cols-1 gap-10 lg:grid-cols-[minmax(0,1fr)_320px]">

    <!-- Bal oldal: az aktuális bejegyzés teljes tartalma. -->
    <section>
        <?php while ( have_posts() ) : ?>
            <?php the_post(); ?>

            <article <?php post_class( 'rounded-3xl border border-sage/60 bg-white/80 p-6 shadow-sm sm:p-9' ); ?>>

                <!-- Bejegyzés kategóriái. -->
                <p class="text-sm font-bold uppercase tracking-[0.16em] text-earth">
                    <?php the_category( ', ' ); ?>
                </p>

                <!-- Cikk címe. -->
                <h1 class="mt-3 font-display text-4xl font-bold leading-tight text-forest sm:text-5xl">
                    <?php the_title(); ?>
                </h1>

                <!-- Publikálás dátuma. -->
                <p class="mt-4 text-sm text-earth">
                    Megjelent: <?php echo esc_html( get_the_date() ); ?>
                </p>

                <!-- Kiemelt kép, ha van beállítva a bejegyzéshez. -->
                <?php if ( has_post_thumbnail() && ! has_tag( 'nocover' ) ) : ?>
                    <figure class="mt-7 overflow-hidden rounded-3xl">
                        <?php
                        the_post_thumbnail(
                            'large',
                            array(
                                'class' => 'h-auto w-full object-cover',
                                'alt'   => the_title_attribute( array( 'echo' => false ) ),
                            )
                        );
                        ?>
                    </figure>
                <?php endif; ?>

                <!-- Classic Editorból érkező teljes cikk: prose tipográfia. -->
                <div class="prose prose-lg mt-8 max-w-none prose-headings:font-display prose-headings:text-forest prose-a:text-coral prose-a:font-bold prose-a:no-underline hover:prose-a:text-earth hover:prose-a:underline prose-strong:text-forest prose-blockquote:border-l-moss prose-blockquote:text-earth prose-figcaption:text-earth">
                    <?php the_content(); ?>
                </div>

                <!-- Kommentek: WordPress beépített kommentrendszere. -->
                <?php
                if ( comments_open() || get_comments_number() ) {
                        comments_template();
                    }
                ?>

            </article>

        <?php endwhile; ?>
    </section>

    <!-- Jobb oldal: adminból kezelhető widgetek. -->
    <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>