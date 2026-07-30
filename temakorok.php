<section class="topic-grid-section" aria-labelledby="topic-grid-title">
    <div class="topic-grid-heading">
        <p class="topic-grid-eyebrow">Fedezd fel</p>
        <h2 id="topic-grid-title">Témakörök</h2>
        <span class="topic-grid-line" aria-hidden="true"></span>
    </div>

    <!-- A JavaScript ide tölti be a témakör-kártyákat. -->
    <div id="topic-grid" class="topic-grid"></div>
</section>

<style>
    .topic-grid-section {
        width: 100%;
        margin: 2.5rem 0 4rem;
    }

    .topic-grid-heading {
        margin-bottom: 2rem;
        text-align: center;
    }

    .topic-grid-eyebrow {
        display: inline-flex;
        margin: 0;
        padding: 0.4rem 0.85rem;
        border: 1px solid rgba(104, 137, 96, 0.28);
        border-radius: 999px;
        background: rgba(255, 255, 255, 0.42);
        color: #7a5c3e;
        font-size: 0.7rem;
        font-weight: 800;
        letter-spacing: 0.16em;
        line-height: 1;
        text-transform: uppercase;
    }

    .topic-grid-heading h2 {
        margin: 0.9rem 0 0;
        color: #315b3e;
        font-family: Fraunces, serif;
        font-size: clamp(2rem, 5vw, 3.25rem);
        font-weight: 700;
        letter-spacing: -0.04em;
        line-height: 1;
    }

    .topic-grid-line {
        display: block;
        width: 4rem;
        height: 0.25rem;
        margin: 1rem auto 0;
        border-radius: 999px;
        background: linear-gradient(90deg, #d9775c, #e9b949, #6f8f72);
    }

    /* Mindig kitölti a szülő konténer rendelkezésre álló szélességét. */
    .topic-grid {
        display: grid;
        width: 100%;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: clamp(0.7rem, 1.6vw, 1.25rem);
    }

    .topic-grid-card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        overflow: hidden;
        border: 1px solid rgba(255, 255, 255, 1);
        border-radius: 1.25rem;
        background: linear-gradient(
            145deg,
            rgba(255, 255, 255, 0.94),
            rgba(232, 241, 216, 0.64)
        );
        box-shadow:
            inset 0 1px 0 rgba(255, 255, 255, 0.82),
            0 0.45rem 1.1rem rgba(58, 77, 50, 0.08);
        color: #315b3e;
        text-decoration: none;
        transition:
            transform 220ms ease,
            border-color 220ms ease,
            background-color 220ms ease,
            box-shadow 220ms ease;
    }

    .topic-grid-card::before {
        position: absolute;
        inset: 0;
        z-index: 0;
        background: radial-gradient(
            circle at 80% 12%,
            rgba(233, 185, 73, 0.20),
            transparent 48%
        );
        content: "";
        opacity: 0;
        pointer-events: none;
        transition: opacity 220ms ease;
    }

    .topic-grid-card:not(.topic-grid-card--disabled):hover,
    .topic-grid-card:not(.topic-grid-card--disabled):focus-visible {
        transform: translateY(-0.35rem);
        border-color: rgba(104, 137, 96, 0.42);
        background: rgba(255, 255, 255, 0.74);
        box-shadow:
            inset 0 1px 0 rgba(255, 255, 255, 0.9),
            0 0.8rem 1.8rem rgba(58, 77, 50, 0.15);
        outline: none;
    }

    .topic-grid-card:not(.topic-grid-card--disabled):hover::before,
    .topic-grid-card:not(.topic-grid-card--disabled):focus-visible::before {
        opacity: 1;
    }

    .topic-grid-card:focus-visible {
        outline: 3px solid rgba(233, 185, 73, 0.65);
        outline-offset: 4px;
    }

    .topic-grid-image-wrap {
        position: relative;
        z-index: 1;
        display: grid;
        aspect-ratio: 1;
        place-items: center;
        padding: clamp(0.6rem, 1.4vw, 1rem);
    }

    .topic-grid-image {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: contain;
        filter: drop-shadow(0 0.35rem 0.35rem rgba(48, 74, 45, 0.16));
        transition: transform 280ms ease, filter 280ms ease;
    }

    .topic-grid-card:not(.topic-grid-card--disabled):hover .topic-grid-image,
    .topic-grid-card:not(.topic-grid-card--disabled):focus-visible .topic-grid-image {
        transform: scale(1.08) rotate(-1.5deg);
        filter: drop-shadow(0 0.55rem 0.5rem rgba(48, 74, 45, 0.22));
    }

    .topic-grid-title {
        position: relative;
        z-index: 1;
        display: block;
        padding: 0.75rem 0.7rem 0.9rem;
        border-top: 1px solid rgba(104, 129, 93, 0.16);
        color: #315b3e;
        font-size: clamp(0.72rem, 1.4vw, 0.88rem);
        font-weight: 800;
        letter-spacing: 0.035em;
        line-height: 1.2;
        text-align: center;
        text-transform: uppercase;
    }

    /* Még nem aktív témakör: megjelenik, de nem kattintható. */
    .topic-grid-card--disabled {
        cursor: not-allowed;
        opacity: 0.4;
    }

    .topic-grid-card--disabled::after {
        position: absolute;
        top: 0.65rem;
        right: 0.65rem;
        z-index: 2;
        padding: 0.32rem 0.5rem;
        border: 1px solid rgba(104, 129, 93, 0.24);
        border-radius: 999px;
        background: rgba(255, 255, 255, 0.72);
        color: #526550;
        content: "Hamarosan";
        font-size: 0.56rem;
        font-weight: 800;
        letter-spacing: 0.08em;
        line-height: 1;
        text-transform: uppercase;
    }

    @media (max-width: 1023px) {
        .topic-grid {
            grid-template-columns: repeat(3, minmax(0, 1fr));
        }
    }

    @media (max-width: 640px) {
        .topic-grid-section {
            margin: 1.75rem 0 3rem;
        }

        .topic-grid-heading {
            margin-bottom: 1.4rem;
        }

        .topic-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 0.7rem;
        }

        .topic-grid-card {
            border-radius: 1rem;
        }

        .topic-grid-title {
            padding: 0.62rem 0.4rem 0.7rem;
            font-size: 0.67rem;
        }
    }

    @media (prefers-reduced-motion: reduce) {
        .topic-grid-card,
        .topic-grid-card::before,
        .topic-grid-image {
            transition: none;
        }
    }
</style>

<script>
    const topicImageBaseUrl =
        "<?php echo esc_url( get_theme_file_uri( 'assets/images/temakorok/' ) ); ?>";

    /*
     * enabled: true  → a kártya kattintható, a kategóriaoldalra vezet.
     * enabled: false → megjelenik „Hamarosan” állapotban, de nem link.
     */
    const topicCategories = [
        {
            image: "1-bogoly-zebrab.png",
            url: "/category/boglyok/",
            title: "Böglyök",
            enabled: false
        },
        {
            image: "10-legylarvak.png",
            url: "/category/larvak/",
            title: "Légylárvák",
            enabled: false
        },
        {
            image: "11-szentjanos.png",
            url: "/category/szentjanosbogar/",
            title: "Szentjánosbogarak",
            enabled: false
        },
        {
            image: "2-tigrisszunyog.png",
            url: "/category/szunyogok/",
            title: "Szúnyogok",
            enabled: false
        },
        {
            image: "3-napraforgo-meh.png",
            url: "/category/beporzo-rovarok/",
            title: "Beporzó rovarok",
            enabled: false
        },
        {
            image: "4-keresz-parkeres.png",
            url: "/category/kereszek/",
            title: "Kérészek",
            enabled: true
        },
        {
            image: "5-viz-csapda.png",
            url: "/category/vizkereso-rovarok/",
            title: "Vízkereső rovarok",
            enabled: false
        },
        {
            image: "6-aszfalt csapda.png",
            url: "/category/dunavirag/",
            title: "Dunavirágok",
            enabled: true
        },
        {
            image: "7-dunavirag-tomeg.png",
            url: "/category/tiszavirag/",
            title: "Tiszavirágok",
            enabled: false
        },
        {
            image: "8 barlangi rovar.png",
            url: "/category/barlangi-elovilag/",
            title: "Barlangi élővilág",
            enabled: false
        },
        {
            image: "8-molnarka-gem-hal.png",
            url: "/category/vizfelszini-rovarok/",
            title: "Vízfelszíni rovarok",
            enabled: false
        },
        {
            image: "logo-small.png",
            url: "/category/rovarvilag/",
            title: "Szkarabeusz bogarak",
            enabled: false
        }
    ];

    const topicGrid = document.getElementById("topic-grid");

    var cnt = 0;
    topicCategories.forEach((topic) => {
        const card = document.createElement(topic.enabled ? "a" : "div");

        card.className = "topic-grid-card";

        if (topic.enabled) {
            card.href = topic.url;
            card.setAttribute(
                "aria-label",
                `${topic.title} témakör megnyitása`
            );
            card.setAttribute("data-aos", "fade-up");
            card.setAttribute("data-aos-delay", 100 * cnt);
            cnt++;
        } else {
            card.classList.add("topic-grid-card--disabled");
            card.setAttribute("aria-disabled", "true");
            card.setAttribute("data-aos", "flip-up");
            card.setAttribute("data-aos-delay", 100 * cnt);
            cnt++;
            card.setAttribute(
                "aria-label",
                `${topic.title} témakör hamarosan elérhető`
            );
        }

        const imageWrap = document.createElement("span");
        imageWrap.className = "topic-grid-image-wrap";

        const image = document.createElement("img");
        image.className = "topic-grid-image";
        image.src = topicImageBaseUrl + topic.image;
        image.alt = "";
        image.loading = "lazy";
        image.width = 400;
        image.height = 400;

        const title = document.createElement("span");
        title.className = "topic-grid-title";
        title.textContent = topic.title;

        imageWrap.appendChild(image);
        card.appendChild(imageWrap);
        card.appendChild(title);
        topicGrid.appendChild(card);
    });
</script>