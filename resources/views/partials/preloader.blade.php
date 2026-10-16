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
        0%, 100% {
            transform: scale(1);
            opacity: 1;
        }

        50% {
            transform: scale(1.06);
            opacity: 0.85;
        }
    }

    @media (prefers-reduced-motion: reduce) {
        .tfl-preloader__logo {
            animation: none;
        }
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
            <div
                class="tfl-preloader__bar-fill"
                id="tfl-preloader-fill"
            ></div>
        </div>
    </div>
</div>

<script>
    (function () {
        var fill = document.getElementById('tfl-preloader-fill');
        var loader = document.getElementById('tfl-preloader');

        if (!fill || !loader) return;

        var storageKey = 'tfl_preloader_seen';
        var hasSeenPreloader = false;

        try {
            hasSeenPreloader = sessionStorage.getItem(storageKey) === '1';
        } catch (error) {
            // Ikiwa sessionStorage haipatikani, preloader itaendelea kawaida.
        }

        // Ameshauona preloader kwenye tab hii: ondoa mara moja.
        if (hasSeenPreloader) {
            loader.remove();
            window.dispatchEvent(new Event('preloader:done'));
            return;
        }

        var MIN_DISPLAY_TIME = 3000;
        var startTime = Date.now();
        var pageLoaded = false;
        var progress = 0;

        var ticker = setInterval(function () {
            progress += (90 - progress) / 12 + 0.6;

            if (progress > 90) {
                progress = 90;
            }

            fill.style.width = progress + '%';
        }, 90);

        function hideLoader() {
            clearInterval(ticker);
            fill.style.width = '100%';

            // Hifadhi kuwa preloader imeonekana; kurasa zinazofuata zitauruka.
            try {
                sessionStorage.setItem(storageKey, '1');
            } catch (error) {
                // Endelea hata kama sessionStorage haipatikani.
            }

            setTimeout(function () {
                loader.classList.add('tfl-preloader--hidden');
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