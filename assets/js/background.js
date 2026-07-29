/**
 * Állati innovációk – dekoratív természetes háttér.
 *
 * A CSS rajzolja és animálja az elemeket.
 * Ez a fájl csak létrehozza:
 * - a papírgrain réteget
 * - a három felhőt
 * - a lebegő rovarpontokat
 * - az eltérő magasságú és irányú fűszálakat
 *
 * Nincs külső könyvtár, nincs folyamatos JavaScript animáció.
 */

(function () {
    "use strict";

    const reducedMotion = window.matchMedia(
        "(prefers-reduced-motion: reduce)"
    );

    /**
     * A teljes háttérdekorációt létrehozza.
     *
     * A CSS keyframe-ek végzik a mozgást; ezért a JavaScript
     * a betöltés után nem használ requestAnimationFrame-et.
     */
    function createNatureBackground() {
        if (!document.body.classList.contains("site-background")) {
            return;
        }

        if (document.querySelector(".nature-background")) {
            return;
        }

        const background = document.createElement("div");
        background.className = "nature-background";
        background.setAttribute("aria-hidden", "true");

        const grain = document.createElement("div");
        grain.className = "nature-background__grain";

        const clouds = createClouds();
        const specks = createSpecks();
        const grass = createGrass();

        background.append(grain, clouds, specks, grass);

        document.body.insertAdjacentElement("afterbegin", background);
    }

    /**
     * Három eltérő méretű és tempójú, CSS-ben formázott felhőt ad vissza.
     */
    function createClouds() {
        const clouds = document.createElement("div");
        clouds.className = "nature-background__clouds";

        ["one", "two", "three", "four", "five", "six"].forEach(function (name) {
            const cloud = document.createElement("div");
            cloud.className = "nature-cloud nature-cloud--" + name;

            for (let index = 0; index < 3; index += 1) {
                cloud.appendChild(document.createElement("span"));
            }

            clouds.appendChild(cloud);
        });

        return clouds;
    }

    /**
     * Tizenkét absztrakt, muslicára utaló lebegő pont.
     *
     * A kiinduló pozíciókat CSS nth-child szabályok adják.
     */
    function createSpecks() {
        const specks = document.createElement("div");
        specks.className = "nature-background__specks";

        const fragment = document.createDocumentFragment();

        for (let index = 0; index < 12; index += 1) {
            fragment.appendChild(document.createElement("i"));
        }

        specks.appendChild(fragment);

        return specks;
    }

    /**
     * Negyven fűszálat generál.
     *
     * Az eltérő inline CSS változók természetes, ismétlődésmentes
     * ritmust adnak. A fűszál mozgását ezután teljesen a CSS kezeli.
     */
    function createGrass() {
        const grass = document.createElement("div");
        grass.className = "nature-background__grass";

        const fragment = document.createDocumentFragment();
        const bladeCount = 110;

        for (let index = 0; index < bladeCount; index += 1) {
            const blade = document.createElement("i");

            const height = 42 + Math.round(Math.random() * 54);
            const angle = -16 + Math.round(Math.random() * 32);
            const speed = (4.4 + Math.random() * 3.4).toFixed(2);
            const delay = (-Math.random() * 7).toFixed(2);
            const opacity = (0.58 + Math.random() * 0.34).toFixed(2);

            blade.className = "nature-grass-blade";
            blade.style.setProperty("--blade-height", height + "%");
            blade.style.setProperty("--blade-angle", angle + "deg");
            blade.style.setProperty("--blade-speed", speed + "s");
            blade.style.setProperty("--blade-delay", delay + "s");
            blade.style.setProperty("--blade-opacity", opacity);

            fragment.appendChild(blade);
        }

        grass.appendChild(fragment);

        return grass;
    }

    /**
     * Csökkentett mozgásnál semmilyen dekoratív DOM-ot nem építünk. DE.
     */
    //if (!reducedMotion.matches) {
        if (document.readyState === "loading") {
            document.addEventListener(
                "DOMContentLoaded",
                createNatureBackground,
                { once: true }
            );
        } else {
            createNatureBackground();
        }
    //}
})();