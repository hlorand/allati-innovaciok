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

                <!-- Publikálási adatok: dátum és szerző. -->
				<div class="mt-5 flex flex-wrap items-center gap-2 text-sm text-earth">
					<span class="inline-flex items-center rounded-full border border-sage/45 bg-white/55 px-3 py-1.5">
						Megjelent: <?php echo esc_html( get_the_date() ); ?>
					</span>

					<span class="inline-flex items-center rounded-full border border-sage/45 bg-white/55 px-3 py-1.5">
						Szerzők:
						<span class="ml-1 font-bold text-forest">
							<!--<?php echo wp_kses_post( get_the_author_posts_link() ); ?>-->
							Horváth Gábor, Kriska György
						</span>
					</span>
				</div>

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
				
				<!-- Bejegyzés címkéi. -->
				<?php
				$post_tags = get_the_tags();
				$visible_tags = array();

				if ( $post_tags ) {
					foreach ( $post_tags as $tag ) {
						// A nocover csak technikai tag, ne jelenjen meg látogatóknak.
						if ( 'nocover' !== $tag->slug ) {
							$visible_tags[] = $tag;
						}
					}
				}
				?>

				<?php if ( ! empty( $visible_tags ) ) : ?>
					<footer class="mt-9 border-t border-sage/35 pt-6">
						<p class="mb-3 text-xs font-bold uppercase tracking-[0.16em] text-earth">
							Címkék
						</p>

						<div class="flex flex-wrap gap-2">
							<?php foreach ( $visible_tags as $tag ) : ?>
								<a
									class="inline-flex items-center rounded-full border border-sage/50 bg-sage/15 px-3 py-1.5 text-xs font-bold text-forest transition hover:-translate-y-0.5 hover:border-forest hover:bg-forest hover:text-white focus:outline-none focus:ring-4 focus:ring-flower/40"
									href="<?php echo esc_url( get_tag_link( $tag ) ); ?>"
								>
									#<?php echo esc_html( $tag->name ); ?>
								</a>
							<?php endforeach; ?>
						</div>
					</footer>
				<?php endif; ?>

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