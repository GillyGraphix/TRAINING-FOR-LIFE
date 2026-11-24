@php
    // Picha za zamani zilizopo kwenye public/images/gallery/hero/
    $legacyHeroPath = public_path('images/gallery/hero');
    $legacyHeroFiles = [];

    if (\Illuminate\Support\Facades\File::isDirectory($legacyHeroPath)) {
        $legacyHeroFiles = collect(\Illuminate\Support\Facades\File::files($legacyHeroPath))
            ->filter(function ($file) {
                return in_array(strtolower($file->getExtension()), ['jpg', 'jpeg', 'png', 'webp']);
            })
            ->sortBy(function ($file) {
                return $file->getFilename();
            })
            ->values();
    }

    // Tumia picha za admin; nafasi zisizo na picha mpya zitumie picha za zamani.
    $heroImages = [];

    for ($slot = 1; $slot <= 6; $slot++) {
        $databaseImagePath = $heroSetting->{'image_' . $slot . '_path'} ?? null;

        if ($databaseImagePath && \Illuminate\Support\Facades\Storage::disk('public')->exists($databaseImagePath)) {
            $heroImages[] = url('/storage/' . ltrim($databaseImagePath, '/'));
            continue;
        }

        $legacyImage = $legacyHeroFiles->get($slot - 1);

        if ($legacyImage) {
            $heroImages[] = asset('images/gallery/hero/' . $legacyImage->getFilename());
        }
    }

    // Picha ya fallback ikiwa hakuna picha nyingine.
    if (empty($heroImages)) {
        $heroImages[] = asset('images/gallery/hero/1.jpg');
    }

    $heroTitle = filled($heroSetting->title ?? null)
        ? $heroSetting->title
        : 'TRANSFORMING YOUTH INTO EMPOWERED LEADERS';

    $heroSubtitle = filled($heroSetting->subtitle ?? null)
        ? $heroSetting->subtitle
        : 'We equip young Tanzanians from disadvantaged families with the skills, confidence, and opportunities to build productive lives, launch enterprises, and lead their communities.';

    $heroHighlightText = trim($heroSetting->highlight_text ?? 'EMPOWERED LEADERS');
    $heroHighlightColor = $heroSetting->highlight_color ?? '#f97316';

    // Tafuta sehemu ya kwanza ya heading inayolingana na maneno yaliyochaguliwa.
    $heroHighlightPosition = $heroHighlightText !== ''
        ? mb_stripos($heroTitle, $heroHighlightText)
        : false;
@endphp

<div class="bg-gray-100 dark:bg-slate-950 min-h-screen p-3 md:p-6 lg:p-8 font-sans transition-colors duration-300">

    <!-- Hero -->
    <section class="hero-carousel relative w-full h-[85vh] min-h-[650px] rounded-[32px] overflow-hidden bg-black shadow-2xl dark:shadow-none">

        <!-- Picha za nyuma -->
        @foreach ($heroImages as $index => $image)
            <img
                src="{{ $image }}"
                alt="Training for Life"
                class="hero-slide absolute inset-0 h-full w-full object-cover object-center {{ $index === 0 ? 'is-active' : '' }}"
                loading="{{ $index === 0 ? 'eager' : 'lazy' }}"
                onerror="this.style.display='none'; console.error('Picha ya hero haikupatikana:', this.src)"
            >
        @endforeach

        <!-- Kivuli juu ya picha ili maandishi yasomeke -->
        <div class="absolute inset-0 z-10 pointer-events-none bg-gradient-to-r from-black/80 via-black/40 to-transparent"></div>

        <!-- Viashiria vya picha -->
        @if (count($heroImages) > 1)
            <div class="hero-indicators absolute right-4 md:right-10 top-1/2 -translate-y-1/2 z-30 flex flex-col items-center gap-3">
                @foreach ($heroImages as $index => $image)
                    <button
                        type="button"
                        class="hero-indicator h-1 rounded-full transition-all duration-500 ease-out {{ $index === 0 ? 'is-active' : '' }}"
                        data-slide-to="{{ $index }}"
                        aria-label="Onyesha picha ya {{ $index + 1 }}"
                    ></button>
                @endforeach
            </div>
        @endif

        <!-- Maandishi na kitufe -->
        <div class="relative z-20 flex flex-col justify-center h-full px-5 sm:px-6 md:px-12 lg:px-20 max-w-4xl pt-24 sm:pt-16 lg:pt-20 pb-32 text-center sm:text-left">
            <h1 class="italic text-xl md:text-4xl lg:text-4xl font-extrabold text-white mb-6 leading-[1.1] tracking-tight drop-shadow-[0_4px_6px_rgba(0,0,0,0.8)]">
                <span class="mask-reveal-line" style="--mrl-delay:0.1s;">
                    <span>
                        @if ($heroHighlightPosition !== false)
                            {{ mb_substr($heroTitle, 0, $heroHighlightPosition) }}<br class="hidden sm:block"><span data-hero-highlight-color="{{ $heroHighlightColor }}">{{ mb_substr($heroTitle, $heroHighlightPosition, mb_strlen($heroHighlightText)) }}</span>{{ mb_substr($heroTitle, $heroHighlightPosition + mb_strlen($heroHighlightText)) }}
                        @else
                            {{ $heroTitle }}
                        @endif
                    </span>
                </span>
            </h1>

            <p class="hero-fade-up text-sm sm:text-base md:text-lg text-gray-200 font-medium max-w-2xl mx-auto sm:mx-0 leading-relaxed drop-shadow-[0_2px_4px_rgba(0,0,0,0.8)] mb-8">
                {{ $heroSubtitle }}
            </p>

            <div class="flex flex-wrap items-center justify-center sm:justify-start gap-3 sm:gap-4">
                <div class="btn-slide-in" style="--bsi-delay:0.5s;">
                    <button
                        type="button"
                        data-open-apply-modal
                        class="btn-pulse inline-block rounded-full bg-orange-500 px-5 py-3 text-xs font-bold text-white transition-colors hover:bg-orange-600 sm:px-6 sm:py-3.5 sm:text-sm"
                    >
                        Apply Now
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Dirisha la kuchagua fomu ya maombi -->
    <dialog
        id="apply-program-modal"
        aria-labelledby="apply-modal-title"
        class="apply-dialog m-auto w-[calc(100%-1rem)] max-w-5xl rounded-2xl bg-white p-0 text-slate-900 shadow-2xl dark:bg-slate-900 dark:text-white sm:w-[calc(100%-2rem)] sm:rounded-[28px]"
    >
        <div class="p-4 sm:p-8">
            <div class="mb-4 flex items-start justify-between gap-3 sm:mb-6 sm:gap-4">
                <div>
                    <p class="text-[10px] font-bold uppercase tracking-[0.2em] text-orange-500 sm:text-xs">
                        Training for Life
                    </p>
                    <h2 id="apply-modal-title" class="mt-1.5 text-xl font-extrabold sm:mt-2 sm:text-3xl">
                        Choose a program to apply for
                    </h2>
                    <p class="mt-1 text-xs text-slate-600 dark:text-slate-300 sm:mt-2 sm:text-sm">
                        Select the form for the program you wish to apply for.
                    </p>
                </div>

                <button
                    type="button"
                    data-close-apply-modal
                    aria-label="Funga dirisha"
                    class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-slate-100 text-xl text-slate-700 transition hover:bg-slate-200 dark:bg-slate-800 dark:text-white dark:hover:bg-slate-700 sm:h-10 sm:w-10"
                >
                    &times;
                </button>
            </div>

            <div class="grid grid-cols-1 gap-3 md:grid-cols-3 md:gap-4">

                <!-- TFL Course 4 -->
                <article class="flex flex-col rounded-xl border border-slate-200 bg-slate-50 p-4 transition hover:-translate-y-1 hover:border-orange-300 hover:shadow-lg dark:border-slate-700 dark:bg-slate-800 sm:rounded-2xl sm:p-5">
                    <div class="flex items-center gap-3 sm:block">
                        <span class="mb-0 flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-orange-100 text-orange-600 dark:bg-orange-500/20 dark:text-orange-400 sm:mb-4 sm:h-12 sm:w-12 sm:rounded-xl">
                            <svg class="h-5 w-5 sm:h-6 sm:w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <path d="M12 7v14"></path>
                                <path d="M3 18V5a2 2 0 0 1 2-2h3a4 4 0 0 1 4 4 4 4 0 0 1 4-4h3a2 2 0 0 1 2 2v13"></path>
                                <path d="M3 18a2 2 0 0 1 2-2h3a4 4 0 0 1 4 4 4 4 0 0 1 4-4h3a2 2 0 0 1 2 2"></path>
                            </svg>
                        </span>
                        <h3 class="text-base font-bold sm:text-lg">TFL Course 4</h3>
                    </div>

                    <p class="mt-2 text-xs leading-relaxed text-slate-600 dark:text-slate-300 sm:flex-1 sm:text-sm">
                        Life skills and leadership training for youth.
                    </p>

                    <a
                        href="{{ route('course.apply') }}"
                        class="mt-3 inline-flex items-center justify-center rounded-lg bg-orange-500 px-4 py-2.5 text-xs font-bold text-white transition hover:bg-orange-600 sm:mt-5 sm:rounded-xl sm:px-5 sm:py-3 sm:text-sm"
                    >
                        Start application
                    </a>
                </article>

                <!-- Kijana Fursa -->
                <article class="flex flex-col rounded-xl border border-slate-200 bg-slate-50 p-4 transition hover:-translate-y-1 hover:border-blue-300 hover:shadow-lg dark:border-slate-700 dark:bg-slate-800 sm:rounded-2xl sm:p-5">
                    <div class="flex items-center gap-3 sm:block">
                        <span class="mb-0 flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-blue-100 text-blue-700 dark:bg-blue-500/20 dark:text-blue-400 sm:mb-4 sm:h-12 sm:w-12 sm:rounded-xl">
                            <svg class="h-5 w-5 sm:h-6 sm:w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <path d="m3 17 6-6 4 4 8-8"></path>
                                <path d="M15 7h6v6"></path>
                            </svg>
                        </span>
                        <h3 class="text-base font-bold sm:text-lg">Kijana Fursa</h3>
                    </div>

                    <p class="mt-2 text-xs leading-relaxed text-slate-600 dark:text-slate-300 sm:flex-1 sm:text-sm">
                        Submit an application for the Kijana Fursa program.
                    </p>

                    <a
                        href="{{ url('/apply/kijana-fursa') }}"
                        class="mt-3 inline-flex items-center justify-center rounded-lg bg-blue-700 px-4 py-2.5 text-xs font-bold text-white transition hover:bg-blue-800 sm:mt-5 sm:rounded-xl sm:px-5 sm:py-3 sm:text-sm"
                    >
                        Start application
                    </a>
                </article>

                <!-- Soma na Matumaini Scholarship -->
                <article class="flex flex-col rounded-xl border border-slate-200 bg-slate-50 p-4 transition hover:-translate-y-1 hover:border-emerald-300 hover:shadow-lg dark:border-slate-700 dark:bg-slate-800 sm:rounded-2xl sm:p-5">
                    <div class="flex items-center gap-3 sm:block">
                        <span class="mb-0 flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-emerald-100 text-emerald-700 dark:bg-emerald-500/20 dark:text-emerald-400 sm:mb-4 sm:h-12 sm:w-12 sm:rounded-xl">
                            <svg class="h-5 w-5 sm:h-6 sm:w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <path d="m22 10-10-5-10 5 10 5 10-5Z"></path>
                                <path d="M6 12v5c3.5 3 8.5 3 12 0v-5"></path>
                                <path d="M22 10v6"></path>
                            </svg>
                        </span>
                        <h3 class="text-base font-bold sm:text-lg">Soma na Matumaini</h3>
                    </div>

                    <p class="mt-2 text-xs leading-relaxed text-slate-600 dark:text-slate-300 sm:flex-1 sm:text-sm">
                        Scholarship application form for secondary school students.
                    </p>

                    <a
                        href="{{ route('snm.create') }}"
                        class="mt-3 inline-flex items-center justify-center rounded-lg bg-emerald-700 px-4 py-2.5 text-xs font-bold text-white transition hover:bg-emerald-800 sm:mt-5 sm:rounded-xl sm:px-5 sm:py-3 sm:text-sm"
                    >
                        Start application
                    </a>
                </article>

            </div>
        </div>
    </dialog>
</div>

<style>
    .hero-slide {
        opacity: 0;
        transition: opacity 1s ease-in-out;
    }

    .hero-slide.is-active {
        opacity: 1;
    }

    .hero-indicator {
        width: 1rem;
        background: rgba(255, 255, 255, 0.5);
    }

    .hero-indicator:hover {
        width: 1.5rem;
        background: rgba(255, 255, 255, 0.9);
    }

    .hero-indicator.is-active {
        width: 2.5rem;
        background: #f97316;
        box-shadow: 0 0 10px rgba(249, 115, 22, 0.8);
    }

    .hide-scrollbar::-webkit-scrollbar {
        display: none;
    }

    .hide-scrollbar {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }

    .momentum-x {
        -webkit-overflow-scrolling: touch;
        touch-action: pan-x pan-y pinch-zoom;
        overscroll-behavior-x: contain;
    }

    .magicpattern-wrap {
        background: linear-gradient(135deg, rgba(224, 231, 255, 0.9), rgba(255, 247, 237, 0.9));
        background-size: 100% 100%;
    }

    .dark .magicpattern-wrap {
        background: linear-gradient(135deg, rgba(15, 23, 42, 0.98), rgba(30, 41, 59, 0.98));
    }

    .apply-dialog {
        width: min(100% - 1rem, 64rem);
        max-height: calc(100dvh - 1rem);
        overflow-y: auto;
        border: 0;
    }

    @media (min-width: 640px) {
        .apply-dialog {
            width: min(100% - 2rem, 64rem);
            max-height: calc(100dvh - 2rem);
        }
    }

    .apply-dialog::backdrop {
        background: rgba(2, 6, 23, 0.72);
        backdrop-filter: blur(5px);
    }

    @keyframes pantingBreath {
        0%, 100% {
            transform: scale(1);
            box-shadow: 0 4px 10px rgba(249, 115, 22, 0.4), 0 0 0 0 rgba(249, 115, 22, 0.6);
        }

        50% {
            transform: scale(1.08);
            box-shadow: 0 10px 25px rgba(249, 115, 22, 0.8), 0 0 0 8px rgba(249, 115, 22, 0.15);
        }
    }

    .btn-pulse {
        animation: pantingBreath 2.5s ease-in-out infinite;
    }

    .btn-pulse:hover {
        animation-duration: 1.2s;
    }

    @keyframes heroMaskRevealUp {
        0% {
            opacity: 0;
            transform: translateY(30px);
            filter: blur(6px);
        }

        100% {
            opacity: 1;
            transform: translateY(0);
            filter: blur(0);
        }
    }

    .mask-reveal-line {
        display: block;
        overflow: hidden;
    }

    .mask-reveal-line > span {
        display: block;
        animation: heroMaskRevealUp 1s cubic-bezier(0.22, 1, 0.36, 1) both;
        animation-delay: var(--mrl-delay, 0s);
    }

    @keyframes heroFadeUp {
        0% {
            opacity: 0;
            transform: translateY(16px);
            filter: blur(4px);
        }

        100% {
            opacity: 1;
            transform: translateY(0);
            filter: blur(0);
        }
    }

    .hero-fade-up {
        animation: heroFadeUp 1s cubic-bezier(0.22, 1, 0.36, 1) both;
        animation-delay: 0.32s;
    }

    @keyframes btnSlideInFromRight {
        0% {
            opacity: 0;
            transform: translateX(70px);
        }

        100% {
            opacity: 1;
            transform: translateX(0);
        }
    }

    .btn-slide-in {
        animation: btnSlideInFromRight 0.9s cubic-bezier(0.22, 1, 0.36, 1) both;
        animation-delay: var(--bsi-delay, 0s);
    }

    .scroll-reveal {
        opacity: 0;
        transform: translateY(40px);
        transition: opacity 0.8s cubic-bezier(0.22, 1, 0.36, 1), transform 0.8s cubic-bezier(0.22, 1, 0.36, 1);
    }

    .scroll-reveal.visible {
        opacity: 1;
        transform: translateY(0);
    }

    @media (max-width: 767px) {
        .magicpattern-wrap {
            min-height: 250px;
            touch-action: pan-x pan-y pinch-zoom;
        }

        .magicpattern-wrap > article,
        .magicpattern-wrap > div {
            scroll-snap-align: start;
        }
    }

    @media (prefers-reduced-motion: reduce) {
        .mask-reveal-line > span,
        .hero-fade-up,
        .btn-slide-in,
        .scroll-reveal {
            animation: none !important;
            transition: none !important;
            opacity: 1 !important;
            transform: none !important;
            filter: none !important;
        }

        .btn-pulse {
            animation: none !important;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Tumia rangi iliyohifadhiwa kwenye database kwa kipande cha heading.
        document.querySelectorAll('[data-hero-highlight-color]').forEach(function (element) {
            const selectedColor = element.dataset.heroHighlightColor;

            if (selectedColor && /^#[0-9A-Fa-f]{6}$/.test(selectedColor)) {
                element.style.color = selectedColor;
            }
        });

        // Fungua na funga modal ya kuchagua programu.
        const applyDialog = document.getElementById('apply-program-modal');

        document.querySelectorAll('[data-open-apply-modal]').forEach(function (button) {
            button.addEventListener('click', function () {
                if (applyDialog && typeof applyDialog.showModal === 'function') {
                    applyDialog.showModal();
                }
            });
        });

        document.querySelectorAll('[data-close-apply-modal]').forEach(function (button) {
            button.addEventListener('click', function () {
                if (applyDialog && applyDialog.open) {
                    applyDialog.close();
                }
            });
        });

        if (applyDialog) {
            applyDialog.addEventListener('click', function (event) {
                if (event.target === applyDialog) {
                    applyDialog.close();
                }
            });
        }

        // Carousel ya picha za hero bila Alpine.js.
        document.querySelectorAll('.hero-carousel').forEach(function (carousel) {
            const slides = Array.from(carousel.querySelectorAll('.hero-slide'));
            const indicators = Array.from(carousel.querySelectorAll('.hero-indicator'));

            if (slides.length > 1) {
                let activeIndex = 0;

                function showSlide(index) {
                    slides[activeIndex].classList.remove('is-active');

                    if (indicators[activeIndex]) {
                        indicators[activeIndex].classList.remove('is-active');
                    }

                    activeIndex = index;
                    slides[activeIndex].classList.add('is-active');

                    if (indicators[activeIndex]) {
                        indicators[activeIndex].classList.add('is-active');
                    }
                }

                indicators.forEach(function (button) {
                    button.addEventListener('click', function () {
                        showSlide(Number(button.dataset.slideTo));
                    });
                });

                window.setInterval(function () {
                    showSlide((activeIndex + 1) % slides.length);
                }, 6000);
            }
        });

        // Anzisha animations za maandishi baada ya preloader.
        function markHeroReady() {
            document.body.classList.add('hero-ready');
        }

        window.addEventListener('preloader:done', markHeroReady);

        if (!document.getElementById('tfl-preloader')) {
            markHeroReady();
        }

        // Animations za vitu vinapoingia kwenye eneo linaloonekana.
        if ('IntersectionObserver' in window) {
            const observer = new IntersectionObserver(function (entries, currentObserver) {
                entries.forEach(function (entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                        currentObserver.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.15,
                rootMargin: '0px 0px -50px 0px'
            });

            document.querySelectorAll('.scroll-reveal').forEach(function (element) {
                observer.observe(element);
            });
        } else {
            document.querySelectorAll('.scroll-reveal').forEach(function (element) {
                element.classList.add('visible');
            });
        }
    });
</script>