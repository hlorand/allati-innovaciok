<?php
/**
 * Statikus oldal sablon.
 *
 * Ha az oldal rendelkezik a "nosidebar" címkével, a sidebar nem jelenik meg,
 * és a tartalom teljes szélességben jelenik meg.
 */

get_header();

/* Az aktuális oldal rendelkezik-e nosidebar címkével? */
$has_no_sidebar = has_tag( 'nosidebar', get_queried_object_id() );
?>

<div class="grid grid-cols-1 gap-10<?php echo $has_no_sidebar ? '' : ' lg:grid-cols-[minmax(0,1fr)_320px]'; ?>">

    <!-- Az aktuális statikus oldal tartalma. -->
    <section>
        <?php while ( have_posts() ) : ?>
            <?php the_post(); ?>

            <article <?php post_class( 'rounded-3xl border border-sage/60 bg-white/80 p-6 shadow-sm sm:p-9' ); ?>>

                <!-- Az adminban megadott oldal címe. -->
                <h1 class="font-display text-4xl font-bold leading-tight text-forest sm:text-5xl">
                    <?php the_title(); ?>
                </h1>

                <!-- Classic Editorból érkező oldal-tartalom. -->
                <div class="prose prose-lg mt-8 max-w-none prose-headings:font-display prose-headings:text-forest prose-a:text-coral prose-a:font-bold prose-a:no-underline hover:prose-a:text-earth hover:prose-a:underline prose-strong:text-forest prose-blockquote:border-l-moss prose-blockquote:text-earth prose-figcaption:text-earth">
                    <?php the_content(); ?>
                </div>

            </article>
        <?php endwhile; ?>
    </section>

    <!-- Csak nosidebar címke nélkül jelenjen meg. -->
    <?php if ( ! $has_no_sidebar ) : ?>
        <?php get_sidebar(); ?>
    <?php endif; ?>

</div>

<?php get_footer(); ?>