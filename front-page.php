<?php
/**
 * Főoldal sablon.
 *
 * Sorrend:
 * 1. Carousel helyőrző
 * 2. Négy legfrissebb bejegyzés kártyarácsban
 * 3. Később projektbemutató és kategóriaszekciók
 */

get_header();
?>

<!-- ------------------------------- HERO ---------------------------------- -->

<!-- Hero -->
<section class="home-hero" aria-labelledby="home-hero-title">
    <div class="home-hero__leaf home-hero__leaf--one" aria-hidden="true"></div>
    <div class="home-hero__leaf home-hero__leaf--two" aria-hidden="true"></div>
    <div class="home-hero__leaf home-hero__leaf--three" aria-hidden="true"></div>

    <div class="home-hero__content">
        <div
            class="home-hero__copy"
            data-aos="fade-right"
            data-aos-duration="850"
            data-aos-delay="80"
            data-aos-once="true"
        >
            <p class="home-hero__eyebrow">Állati innovációk</p>

            <h1 id="home-hero-title">
                A természet tele van<br>
                zseniális megoldásokkal.
            </h1>

            <p class="home-hero__lead">
                A készülő Állati innovációk film látványos történeteken
                keresztül mutatja meg, hogyan segíti a különleges látás,
                tájékozódás vagy alkalmazkodás a túlélést — és mit tanulhatunk
                mindebből mi, emberek.
            </p>
        </div>

        <div
            class="home-hero__visual"
            data-aos="zoom-in-left"
            data-aos-duration="950"
            data-aos-delay="180"
            data-aos-once="true"
        >
            <div class="home-hero__image-frame">
                <img
                    class="home-hero__image"
                    src="<?php echo esc_url( get_theme_file_uri( 'assets/images/csapat.jpg' ) ); ?>"
                    alt="Az Állati innovációk film illusztrációja"
                    width="1000"
                    height="1000"
                >
            </div>

            <span class="home-hero__image-orbit home-hero__image-orbit--one" aria-hidden="true"></span>
            <span class="home-hero__image-orbit home-hero__image-orbit--two" aria-hidden="true"></span>
        </div>
    </div>
</section>

<style>
    /* ================================================================
       FŐOLDAL HERO
       ================================================================ */

    .home-hero {
        position: relative;
        isolation: isolate;
        overflow: hidden;
        margin: clamp(1.25rem, 3vw, 2.5rem) 0 clamp(3rem, 7vw, 6rem);
        margin-top: 0;
        margin-bottom: 0;
        padding: clamp(1.5rem, 5vw, 4.5rem);
        border: 1px solid rgba(255, 255, 255, 0.18);
        border-radius: clamp(1.5rem, 3vw, 2.5rem);
        background:
            radial-gradient(
                circle at 84% 12%,
                rgba(210, 172, 82, 0.30) 0%,
                rgba(210, 172, 82, 0) 27%
            ),
            radial-gradient(
                circle at 12% 100%,
                rgba(121, 170, 122, 0.26) 0%,
                rgba(121, 170, 122, 0) 32%
            ),
            linear-gradient(
                135deg,
                #163d2c 0%,
                #24593c 48%,
                #183f31 100%
            );
        box-shadow:
            inset 0 1px 0 rgba(255, 255, 255, 0.16),
            0 1.3rem 3.5rem rgba(30, 67, 45, 0.18);
    }

    .home-hero::before {
        position: absolute;
        inset: 0;
        z-index: -1;
        background:
            linear-gradient(
                90deg,
                rgba(255, 255, 255, 0.045) 1px,
                transparent 1px
            ),
            linear-gradient(
                0deg,
                rgba(255, 255, 255, 0.035) 1px,
                transparent 1px
            );
        background-size: 2rem 2rem;
        content: "";
        opacity: 0.32;
        mask-image: linear-gradient(
            to bottom,
            rgba(0, 0, 0, 0.8),
            transparent
        );
        pointer-events: none;
    }

    .home-hero__content {
        position: relative;
        z-index: 2;
        display: grid;
        grid-template-columns: minmax(0, 1.06fr) minmax(17rem, 0.94fr);
        align-items: center;
        gap: clamp(2rem, 6vw, 5.5rem);
        max-width: 78rem;
        margin: 0 auto;
    }

    .home-hero__copy {
        max-width: 42rem;
    }

    .home-hero__eyebrow {
        display: inline-flex;
        margin: 0 0 1rem;
        padding: 0.48rem 0.85rem;
        border: 1px solid rgba(255, 255, 255, 0.22);
        border-radius: 999px;
        background: rgba(255, 255, 255, 0.10);
        box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.14);
        color: #f4d68c;
        font-size: 0.7rem;
        font-weight: 800;
        letter-spacing: 0.16em;
        line-height: 1;
        text-transform: uppercase;
    }

    .home-hero h1 {
        margin: 0;
        color: #fffdf5;
        font-family: Fraunces, Georgia, serif;
        font-size: clamp(1.35rem, 3.1vw, 3rem);
        font-weight: 700;
        letter-spacing: -0.055em;
        line-height: 0.98;
        text-wrap: balance;
    }

    .home-hero__lead {
        max-width: 39rem;
        margin: clamp(1.35rem, 2.5vw, 1.9rem) 0 0;
        color: rgba(255, 253, 245, 0.84);
        font-size: clamp(1rem, 1.45vw, 1.15rem);
        font-weight: 450;
        line-height: 1.7;
        text-wrap: pretty;
    }

    .home-hero__visual {
        position: relative;
        justify-self: center;
        width: min(100%, 31rem);
    }

    .home-hero__image-frame {
        position: relative;
        z-index: 2;
        aspect-ratio: 1;
        overflow: hidden;
        padding: clamp(0.45rem, 1.2vw, 0.7rem);
        border: 1px solid rgba(255, 255, 255, 0.36);
        border-radius: clamp(1.5rem, 3vw, 2.35rem);
        background: rgba(255, 255, 255, 0.13);
        box-shadow:
            inset 0 1px 0 rgba(255, 255, 255, 0.38),
            0 1.4rem 3.5rem rgba(7, 33, 21, 0.32);
        transform: rotate(2.5deg);
    }

    .home-hero__image-frame::before {
        position: absolute;
        inset: 0;
        z-index: 1;
        border-radius: inherit;
        background: linear-gradient(
            135deg,
            rgba(255, 255, 255, 0.20),
            transparent 42%
        );
        content: "";
        pointer-events: none;
    }

    .home-hero__image {
        display: block;
        width: 100%;
        height: 100%;
        border-radius: calc(clamp(1.5rem, 3vw, 2.35rem) - 0.35rem);
        object-fit: cover;
    }

    /* Dekoratív, levélszerű absztrakt elemek */
    .home-hero__leaf {
        position: absolute;
        z-index: -1;
        border: 1px solid rgba(237, 244, 218, 0.10);
        background: linear-gradient(
            145deg,
            rgba(156, 202, 132, 0.20),
            rgba(44, 108, 68, 0.04)
        );
        box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.08);
        opacity: 0.9;
        pointer-events: none;
    }

    .home-hero__leaf--one {
        top: -13rem;
        right: -6rem;
        width: 28rem;
        height: 44rem;
        border-radius: 100% 0 100% 0;
        transform: rotate(24deg);
    }

    .home-hero__leaf--two {
        bottom: -15rem;
        left: -8rem;
        width: 27rem;
        height: 41rem;
        border-radius: 0 100% 0 100%;
        transform: rotate(-26deg);
    }

    .home-hero__leaf--three {
        top: 37%;
        left: 43%;
        width: 13rem;
        height: 23rem;
        border-radius: 100% 0 100% 0;
        background: linear-gradient(
            145deg,
            rgba(238, 204, 112, 0.12),
            rgba(238, 204, 112, 0)
        );
        transform: rotate(-48deg);
    }

    .home-hero__image-orbit {
        position: absolute;
        z-index: 1;
        display: block;
        border: 1px solid rgba(255, 253, 245, 0.26);
        border-radius: 50%;
        pointer-events: none;
    }

    .home-hero__image-orbit--one {
        top: -1.4rem;
        right: -1.4rem;
        width: 7rem;
        height: 7rem;
        background: rgba(233, 185, 73, 0.18);
    }

    .home-hero__image-orbit--two {
        bottom: -1.1rem;
        left: -1.5rem;
        width: 4.5rem;
        height: 4.5rem;
        background: rgba(143, 187, 125, 0.18);
    }

    @media (max-width: 800px) {
        .home-hero {
            padding: clamp(1.4rem, 6vw, 2.25rem);
        }

        .home-hero__content {
            grid-template-columns: 1fr;
            gap: 2.2rem;
        }

        .home-hero__copy {
            max-width: none;
            text-align: center;
        }

        .home-hero__lead {
            margin-right: auto;
            margin-left: auto;
        }

        .home-hero__visual {
            width: min(100%, 26rem);
        }

        .home-hero__image-frame {
            transform: rotate(1.5deg);
        }

        .home-hero__leaf--one {
            top: -18rem;
            right: -11rem;
        }

        .home-hero__leaf--two {
            bottom: -21rem;
            left: -12rem;
        }
    }

    @media (max-width: 480px) {
        .home-hero {
            border-radius: 1.35rem;
        }

        .home-hero h1 {
            font-size: clamp(2.15rem, 11vw, 3rem);
        }

        .home-hero__eyebrow {
            font-size: 0.62rem;
        }

        .home-hero__lead {
            font-size: 0.96rem;
            line-height: 1.62;
        }

        .home-hero__visual {
            width: min(100%, 19rem);
        }

        .home-hero__image-frame {
            border-radius: 1.35rem;
        }
    }

    @media (prefers-reduced-motion: reduce) {
        .home-hero__image-frame {
            transform: none;
        }
    }
</style>

<!-- ------------------------------- FRISS ---------------------------------- -->


<!-- A négy időben legfrissebb bejegyzés listája. -->
<section class="mt-12 sm:mt-16">
    <div class="mb-6 flex flex-col gap-2 sm:mb-8 sm:flex-row sm:items-end sm:justify-between">
        <div>
            <p class="text-sm font-bold uppercase tracking-[0.18em] text-earth">
                Friss tartalom
            </p>

            <h1 class="mt-1 font-display text-3xl font-bold text-forest sm:text-4xl">
                Legfrissebb cikkek
            </h1>
        </div>

        <!-- Később opcionálisan a teljes blog-archívumra mutathat. -->
        <a
            class="inline-flex w-fit rounded-full border border-forest px-4 py-2 text-sm font-bold text-forest transition hover:bg-forest hover:text-white focus:outline-none focus:ring-4 focus:ring-flower/40"
            href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ); ?>"
        >
            Összes cikk
        </a>
    </div>

    <?php
    /**
     * Külön lekérdezés: a négy legutóbb publikált bejegyzés.
     *
     * A WP_Query WordPress-szabványos módja az egyedi post-lekérdezéseknek.
     */
    $latest_posts = new WP_Query(
        array(
            'post_type'           => 'post',
            'post_status'         => 'publish',
            'posts_per_page'      => 4,
            'ignore_sticky_posts' => true,
        )
    );
    ?>

    <?php if ( $latest_posts->have_posts() ) : ?>

        <!-- Mobil: 1, tablet: 2, nagy asztal: 4 oszlop. -->
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 xl:grid-cols-4">
            <?php $cnt = 0; while ( $latest_posts->have_posts() ) : $cnt++; ?>
                <?php $latest_posts->the_post(); ?>

                <?php
                /**
                 * Egyetlen álló cikk-kártya.
                 * A kódot a template-parts/card-latest.php fájl tartalmazza.
                 */
                get_template_part( 'template-parts/card', 'latest' );
                ?>
            <?php endwhile; ?>
        </div>

        <?php
        // Visszaállítja a WordPress globális bejegyzésadatait az egyedi lekérdezés után.
        wp_reset_postdata();
        ?>

    <?php else : ?>

        <!-- Akkor jelenik meg, ha még nincs publikált bejegyzés. -->
        <p class="rounded-3xl border border-sage/60 bg-white/80 p-6 text-ink">
            Még nincs publikált bejegyzés. Az első cikk hamarosan érkezik.
        </p>

    <?php endif; ?>
</section>


<!-- Carousel helye: később ide kerül az óriáskerék alapú kategória-navigáció. -->
<section
    class="flex min-h-72 mt-8 items-center justify-center rounded-3xl border border-sage/60 bg-gradient-to-br from-sage/70 via-sand/60 to-flower/40 p-8 shadow-sm sm:min-h-96"
    aria-label="Kiemelt kategóriák"
>
        <?php include "temakorok.php"; ?>
</section>


<?php
/**
 * Kategóriák véletlen sorrendben.
 * Minden kategóriához a 4 legfrissebb publikált bejegyzés jelenik meg.
 */
$categories = get_categories(
    array(
        'hide_empty' => true,
    )
);

shuffle( $categories );
?>

<?php if ( ! empty( $categories ) ) : ?>
    <section class="mt-16 sm:mt-24" aria-label="Témakörök">
        <div class="mb-10 text-center sm:mb-14">
            <p class="inline-flex rounded-full border border-sage/60 bg-white/45 px-4 py-1.5 text-xs font-bold uppercase tracking-[0.18em] text-earth shadow-sm">
                Fedezd fel
            </p>

            <h2 class="mt-4 font-display text-4xl font-bold tracking-tight text-forest sm:text-5xl">
                Témakörök
            </h2>

            <div class="mx-auto mt-4 h-1 w-16 rounded-full bg-gradient-to-r from-flower via-ochre to-sage"></div>
        </div>

        <?php foreach ( $categories as $category ) : ?>
            <?php
            $category_posts = new WP_Query(
                array(
                    'post_type'           => 'post',
                    'post_status'         => 'publish',
                    'posts_per_page'      => 4,
                    'ignore_sticky_posts' => true,
                    'cat'                 => $category->term_id,
                )
            );

            $category_url = get_category_link( $category );
            ?>

            <?php if ( $category_posts->have_posts() ) : ?>
                <section class="mb-16 sm:mb-24">
                    <div class="mb-6 flex flex-col gap-3 sm:mb-8 sm:flex-row sm:items-end sm:justify-left sm:gap-6">
                        <div>
                            <p class="text-sm font-bold uppercase tracking-[0.18em] text-earth">
                                Témakör
                            </p>

                            <h3 class="mt-1 font-display text-3xl font-bold text-forest sm:text-4xl">
                                <?php echo esc_html( $category->name ); ?>
                            </h3>

                            <?php if ( ! empty( $category->description ) ) : ?>
                                <p class="mt-2 max-w-2xl text-ink">
                                    <?php echo esc_html( $category->description ); ?>
                                </p>
                            <?php endif; ?>
                        </div>

                        <a
                            class="inline-flex w-fit rounded-full border border-forest px-4 py-2 text-sm font-bold text-forest transition hover:bg-forest hover:text-white focus:outline-none focus:ring-4 focus:ring-flower/40"
                            href="<?php echo esc_url( $category_url ); ?>"
                        >
                            Téma megnyitása <span aria-hidden="true">&raquo;</span>
                        </a>
                    </div>

                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2 xl:grid-cols-4">
                        <?php while ( $category_posts->have_posts() ) : ?>
                            <?php $category_posts->the_post(); ?>

                            <?php get_template_part( 'template-parts/card', 'latest' ); ?>
                        <?php endwhile; ?>
                    </div>
                </section>

                <?php wp_reset_postdata(); ?>
            <?php endif; ?>
        <?php endforeach; ?>
    </section>
<?php endif; ?>

<?php get_footer(); ?>