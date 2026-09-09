{{--
    TFL Preloader / Intro Splash
    ----------------------------
    Weka include hii mara moja tu, mara baada ya <body> kufunguka kwenye layout
    kuu (kwa mfano resources/views/layouts/app.blade.php), KABLA ya @include('partials.header'):

        <body ...>
            @include('partials.preloader')
            @include('partials.header')
            ...

    Badilisha src ya logo hapa chini kuelekeza kwenye logo halisi ya site (public/images/logo.png
    au njia yoyote uliyo nayo). Progress bar inapanda 0 -> 100% moja kwa moja (bila namba
    kuonyeshwa), kisha intro inafifia (fade out) na kujiondoa mara tovuti ikisha-load kabisa.

    NOTE: Mara loader inapoanza ku-fade (hideLoader), tunatuma event 'preloader:done'
    kwenye window. Hero section (partials.hero au popote unapotumia
    data-hero-animate / class .hero-anim-ready) inasikiliza event hii kuanzisha
    animations zake za maandishi/buttons/cards mara moja preloader inapoanza kutoweka.
--}}

<style>
    #tfl-preloader {
        position: fixed;
        inset: 0;
        z-index: 9999;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #ffffff;
        transition: opacity 0.5s ease, visibility 0.5s ease;
    }
    .dark #tfl-preloader {
        background-color: rgb(15 23 42);
    }
    #tfl-preloader.tfl-preloader--hidden {
        opacity: 0;
        visibility: hidden;
        pointer-events: none;
    }

    .tfl-preloader__inner {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 0.75rem;
    }

    .tfl-preloader__logo {
        width: 340px;
        height: 340px;
        object-fit: contain;
        animation: tfl-pulse 1.6s ease-in-out infinite;
    }

    .tfl-preloader__bar {
        /* Namba hii inaweza kuwa NEGATIVE ili kuvuta bar juu zaidi, karibu na logo —
           hasa kama faili la logo lina transparent padding ndani yake.
           Jaribu -10px, -20px, -30px n.k. kutegemea unavyoona kwenye browser. */
        margin-top: -100px;
        width: 360px;
        height: 5px;
        border-radius: 999px;
        background-color: rgba(148, 163, 184, 0.25);
        overflow: hidden;
    }

    .tfl-preloader__bar-fill {
        height: 100%;
        width: 0%;
        border-radius: inherit;
        background-image: linear-gradient(90deg, #F97316, #1E3A8A);
        transition: width 0.25s ease-out;
    }

    @keyframes tfl-pulse {
        0%, 100% { transform: scale(1); opacity: 1; }
        50% { transform: scale(1.06); opacity: 0.85; }
    }

    @media (prefers-reduced-motion: reduce) {
        .tfl-preloader__logo { animation: none; }
    }
</style>

<div id="tfl-preloader">
    <div class="tfl-preloader__inner">
        <img
            src="{{ asset('images/logo.png') }}"
            alt="Training For Life"
            class="tfl-preloader__logo"
        >
        <div class="tfl-preloader__bar">
            <div class="tfl-preloader__bar-fill" id="tfl-preloader-fill"></div>
        </div>
    </div>
</div>

<script>
    (function () {
        var fill = document.getElementById('tfl-preloader-fill');
        var loader = document.getElementById('tfl-preloader');
        if (!fill || !loader) return;

        // Muda mdogo zaidi (milliseconds) preloader inatakiwa ionekane, hata kama
        // page ime-load haraka zaidi ya hapo. Badilisha namba hii ukitaka muda tofauti.
        var MIN_DISPLAY_TIME = 3000;
        var startTime = Date.now();
        var pageLoaded = false;
        var progress = 0;

        // Inches progress toward ~90% while real assets are still loading,
        // so the bar never looks "stuck" at 100% before the page is actually ready.
        var ticker = setInterval(function () {
            progress += (90 - progress) / 12 + 0.6;
            if (progress > 90) progress = 90;
            fill.style.width = progress + '%';
        }, 90);

        function hideLoader() {
            clearInterval(ticker);
            fill.style.width = '100%';

            setTimeout(function () {
                loader.classList.add('tfl-preloader--hidden');

                // 🔔 Hapa ndipo tunaambia hero section "nianze kutembea" —
                // hii inatokea wakati huo huo preloader inapoanza kufifia (fade),
                // hivyo hero animations zinaanza "kwa siri" chini ya preloader
                // na zinapoonekana ni smooth, sio za ghafla/za kuchelewa.
                window.dispatchEvent(new Event('preloader:done'));

                setTimeout(function () {
                    loader.remove();
                }, 550);
            }, 300);
        }

        function finishLoading() {
            if (pageLoaded) return;
            pageLoaded = true;

            var elapsed = Date.now() - startTime;
            var remaining = MIN_DISPLAY_TIME - elapsed;

            if (remaining > 0) {
                setTimeout(hideLoader, remaining);
            } else {
                hideLoader();
            }
        }

        if (document.readyState === 'complete') {
            finishLoading();
        } else {
            window.addEventListener('load', finishLoading);
        }
    })();
</script>