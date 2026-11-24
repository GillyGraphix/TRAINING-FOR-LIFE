<!-- WHY THE YOUTH SECTION -->
@php
    // Picha kuu ya sehemu hii. Weka picha yako kwenye: public/images/home/why-the-youth.jpg
    // (wima, mfano 900x1100). Kabla ya hapo inatumia picha ya About ikiwa ipo.
    $whyImage = null;
    foreach (['images/home/why-the-youth.jpg', 'images/about/about-who.jpg', 'images/about/about-hero.jpg'] as $whyFile) {
        if (file_exists(public_path($whyFile))) {
            $whyImage = asset($whyFile);
            break;
        }
    }
@endphp

<style>
    /* =====================================================================
       WHY THE YOUTH - CSS ya kawaida (haihitaji npm run build)
       Rangi za brand: orange #f79120, dark blue #070049, nyeupe, nyeusi
       ===================================================================== */
    .wty {
        position: relative;
        --wty-line: rgba(148, 163, 184, .4);
    }

    .dark .wty {
        --wty-line: rgba(71, 85, 105, .7);
    }

    .wty-orb {
        position: absolute;
        top: -8rem;
        right: -8rem;
        width: 26rem;
        height: 26rem;
        border-radius: 9999px;
        background: radial-gradient(circle, rgba(247, 145, 32, .16), transparent 65%);
        pointer-events: none;
    }

    .wty-main {
        display: grid;
        grid-template-columns: minmax(0, 1fr);
        gap: 3.5rem;
        align-items: center;
    }

    @media (min-width: 1024px) {
        .wty-main {
            grid-template-columns: minmax(0, 5fr) minmax(0, 7fr);
            gap: 5rem;
        }
    }

    /* Picha */
    .wty-photo {
        position: relative;
        width: 100%;
        max-width: 30rem;
        margin: 0 auto;
        padding: 0 1rem 1.25rem 0;
    }

    .wty-photo::before {
        content: "";
        position: absolute;
        top: 1.25rem;
        left: 1.25rem;
        right: 0;
        bottom: 0;
        z-index: 0;
        border: 2px solid rgba(247, 145, 32, .75);
        border-radius: 2rem 2rem 6rem 2rem;
    }

    .wty-dots {
        position: absolute;
        top: -1.25rem;
        left: -1.25rem;
        z-index: 0;
        width: 7rem;
        height: 7rem;
        opacity: .55;
        background: radial-gradient(#f79120 2px, transparent 2px) 0 0 / 14px 14px;
    }

    .wty-frame {
        position: relative;
        z-index: 1;
        overflow: hidden;
        aspect-ratio: 4 / 5;
        border-radius: 2rem 2rem 6rem 2rem;
        background:
            radial-gradient(rgba(255, 255, 255, .2) 1.4px, transparent 1.4px) 0 0 / 18px 18px,
            linear-gradient(135deg, #f79120 0%, #070049 95%);
        box-shadow: 0 30px 60px -24px rgba(7, 0, 73, .55);
    }

    .wty-frame img {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
        transition: transform 1.2s ease;
    }

    .wty-photo:hover .wty-frame img {
        transform: scale(1.05);
    }

    .wty-frame::after {
        content: "";
        position: absolute;
        inset: 0;
        pointer-events: none;
        background: linear-gradient(to top, rgba(7, 0, 73, .78), rgba(7, 0, 73, 0) 55%);
    }

    .wty-chip {
        position: absolute;
        left: 1.25rem;
        right: 1.25rem;
        bottom: 1.25rem;
        z-index: 2;
        padding: .9rem 1.1rem;
        border-radius: 1rem;
        color: #fff;
        background: rgba(255, 255, 255, .14);
        border: 1px solid rgba(255, 255, 255, .28);
        -webkit-backdrop-filter: blur(10px);
        backdrop-filter: blur(10px);
    }

    .wty-chip strong {
        display: block;
        font-size: 1rem;
        line-height: 1.3;
        font-weight: 700;
    }

    .wty-chip span {
        display: block;
        margin-top: .2rem;
        font-size: .8rem;
        line-height: 1.45;
        color: rgba(255, 255, 255, .85);
    }

    .wty-chip::before {
        content: "";
        display: block;
        width: 2.5rem;
        height: 3px;
        margin-bottom: .6rem;
        border-radius: 9999px;
        background: #f79120;
    }

    /* Takwimu */
    .wty-stats {
        margin: 0;
        padding: 0;
        list-style: none;
        border-top: 1px solid var(--wty-line);
    }

    .wty-row {
        position: relative;
        display: grid;
        grid-template-columns: 5.5rem minmax(0, 1fr);
        gap: 1.25rem;
        align-items: center;
        padding: 1.15rem 0;
        border-bottom: 1px solid var(--wty-line);
    }

    .wty-row::after {
        content: "";
        position: absolute;
        left: 0;
        bottom: -1px;
        width: var(--w);
        height: 3px;
        border-radius: 9999px;
        background: #f79120;
        transform-origin: left;
        transition: transform 1.6s cubic-bezier(.2, .7, .2, 1) .25s;
    }

    .wty-stats.is-ready:not(.is-in) .wty-row::after {
        transform: scaleX(0);
    }

    .wty-n {
        margin: 0;
        font-size: 2rem;
        line-height: 1;
        font-weight: 800;
        letter-spacing: -.03em;
        font-variant-numeric: tabular-nums;
        color: #070049;
    }

    .dark .wty-n {
        color: #fff;
    }

    .wty-n i {
        font-style: normal;
        color: #f79120;
    }

    .wty-pre {
        display: block;
        margin-bottom: .3rem;
        font-size: .62rem;
        line-height: 1;
        font-weight: 800;
        letter-spacing: .16em;
        text-transform: uppercase;
        color: #f79120;
    }

    .wty-t {
        margin: 0;
        line-height: 1.6;
    }

    @media (min-width: 640px) {
        .wty-row {
            grid-template-columns: 6.5rem minmax(0, 1fr);
        }

        .wty-n {
            font-size: 2.3rem;
        }
    }

    /* Maelezo ya changamoto */
    .wty-callout {
        padding: 1.1rem 1.25rem;
        border-left: 4px solid #f79120;
        border-radius: 0 1rem 1rem 0;
        background: rgba(247, 145, 32, .09);
    }

    /* Sehemu ya chini */
    .wty-lower {
        margin-top: 5.5rem;
    }

    .wty-eyebrow {
        display: inline-flex;
        align-items: center;
        gap: .65rem;
        margin: 0 0 1.75rem;
        font-size: .8rem;
        font-weight: 800;
        letter-spacing: .16em;
        text-transform: uppercase;
        color: #070049;
    }

    .dark .wty-eyebrow {
        color: #f79120;
    }

    .wty-eyebrow::before {
        content: "";
        width: 2rem;
        height: 3px;
        border-radius: 9999px;
        background: #f79120;
    }

    /* Pengo -> Fursa */
    .wty-duo {
        display: grid;
        grid-template-columns: minmax(0, 1fr);
        gap: 1.75rem;
        align-items: start;
    }

    .wty-side {
        padding: 1.5rem;
        border: 1px solid var(--wty-line);
        border-radius: 1.25rem;
        background: rgba(255, 255, 255, .6);
        box-shadow: 0 12px 30px -24px rgba(7, 0, 73, .35);
    }

    .dark .wty-side {
        background: rgba(15, 23, 42, .55);
    }

    .wty-side-opportunity {
        border-color: rgba(247, 145, 32, .4);
        background: linear-gradient(145deg, rgba(247, 145, 32, .12), rgba(247, 145, 32, .035));
    }

    .dark .wty-side-opportunity {
        background: linear-gradient(145deg, rgba(247, 145, 32, .16), rgba(15, 23, 42, .55));
    }

    .wty-side-no {
        font-size: .75rem;
        font-weight: 800;
        letter-spacing: .16em;
        color: #f79120;
    }

    .wty-side h4 {
        margin: .5rem 0 .8rem;
        font-size: 1.5rem;
        line-height: 1.2;
        font-weight: 800;
    }

    .wty-side p {
        margin: 0;
        line-height: 1.75;
    }

    .wty-mid {
        display: flex;
        align-items: center;
        gap: .75rem;
    }

    .wty-vline {
        flex: 1;
        height: 2px;
        background: linear-gradient(to right, transparent, rgba(247, 145, 32, .8));
    }

    .wty-vline:last-child {
        transform: scaleX(-1);
    }

    .wty-dot {
        display: flex;
        flex: none;
        align-items: center;
        justify-content: center;
        width: 3rem;
        height: 3rem;
        border-radius: 9999px;
        border: 2px solid #f79120;
        color: #f79120;
        transform: rotate(90deg);
    }

    .wty-dot svg {
        width: 1.3rem;
        height: 1.3rem;
    }

    @media (min-width: 768px) {
        .wty-duo {
            grid-template-columns: minmax(0, 1fr) auto minmax(0, 1fr);
            gap: 2rem;
        }

        .wty-mid {
            flex-direction: column;
            align-self: stretch;
            gap: .75rem;
        }

        .wty-vline {
            width: 2px;
            height: auto;
            min-height: 2.5rem;
            background: linear-gradient(to bottom, transparent, rgba(247, 145, 32, .8));
        }

        .wty-vline:last-child {
            transform: scaleY(-1);
        }

        .wty-dot {
            transform: none;
        }
    }

    /* Mahitaji manne */
    .wty-needs {
        display: grid;
        grid-template-columns: minmax(0, 1fr);
        margin: 0;
        padding: 0;
        list-style: none;
        border-top: 1px solid var(--wty-line);
    }

    .wty-need {
        position: relative;
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 1.4rem 0;
        border-bottom: 1px solid var(--wty-line);
    }

    .wty-need::after {
        content: "";
        position: absolute;
        left: 0;
        top: -1px;
        width: 100%;
        height: 3px;
        border-radius: 9999px;
        background: #f79120;
        transform: scaleX(0);
        transform-origin: left;
        transition: transform .45s ease;
    }

    .wty-need:hover::after {
        transform: scaleX(1);
    }

    .wty-need-ico {
        display: flex;
        flex: none;
        align-items: center;
        justify-content: center;
        width: 2.9rem;
        height: 2.9rem;
        border-radius: 9999px;
        border: 1.5px solid rgba(247, 145, 32, .7);
        color: #070049;
        transition: background-color .3s ease, color .3s ease;
    }

    .dark .wty-need-ico {
        color: #f79120;
    }

    .wty-need:hover .wty-need-ico {
        background: #f79120;
        color: #070049;
    }

    .wty-need-ico svg {
        width: 1.35rem;
        height: 1.35rem;
    }

    .wty-need-no {
        display: block;
        margin-bottom: .2rem;
        font-size: .7rem;
        font-weight: 800;
        letter-spacing: .16em;
        color: #f79120;
    }

    .wty-need h5 {
        margin: 0;
        font-size: 1rem;
        line-height: 1.35;
        font-weight: 700;
    }

    @media (min-width: 640px) {
        .wty-needs {
            grid-template-columns: repeat(2, minmax(0, 1fr));
            column-gap: 2rem;
        }
    }

    @media (min-width: 1024px) {
        .wty-needs {
            grid-template-columns: repeat(4, minmax(0, 1fr));
            column-gap: 0;
            border-bottom: 1px solid var(--wty-line);
        }

        .wty-need {
            border-bottom: 0;
            padding: 1.75rem 1.5rem;
        }

        .wty-need:first-child {
            padding-left: 0;
        }

        .wty-need + .wty-need {
            border-left: 1px solid var(--wty-line);
        }
    }

    @media (prefers-reduced-motion: reduce) {
        .wty-row::after,
        .wty-need::after,
        .wty-need-ico,
        .wty-frame img {
            transition: none;
        }

        .wty-photo:hover .wty-frame img {
            transform: none;
        }
    }
</style>

<section class="wty relative py-20 bg-white dark:bg-slate-900 transition-colors duration-500 overflow-hidden">
    <span class="wty-orb" aria-hidden="true"></span>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Section Header -->
        <div class="text-center max-w-3xl mx-auto mb-16">
            <span class="text-primary font-bold text-xs uppercase tracking-[0.25em] bg-primary/10 px-4 py-1.5 rounded-full">Our Core Focus</span>

            <h2 class="text-3xl md:text-5xl font-extrabold text-slate-900 dark:text-white mt-4 mb-6">
                Why The Youth?
            </h2>

            <p class="text-slate-600 dark:text-gray-300 text-base md:text-lg leading-relaxed">
                Tanzania’s young population is a major opportunity, yet many young people face a gap between what they learn and the skills and opportunities needed to build a livelihood.
            </p>

            <div class="w-24 h-1 bg-primary mx-auto rounded-full mt-6"></div>
        </div>

        <!-- Photo + story -->
        <div class="wty-main">

            <!-- Photo -->
            <div class="wty-photo">
                

                <div class="wty-frame">
                    @if ($whyImage)
                        <img src="{{ $whyImage }}" alt="Young people learning and working together at Training For Life" loading="lazy" onerror="this.remove()">
                    @endif

                    <div class="wty-chip">
                        <strong>Turning learning into livelihoods</strong>
                        <span>Practical, soft, entrepreneurial and green skills.</span>
                    </div>
                </div>
            </div>

            <!-- Story -->
            <div class="space-y-6">
                <h3 class="text-2xl md:text-3xl font-bold text-slate-900 dark:text-white leading-snug">
                    The Problem: A Gap Between <span class="text-primary">Skills</span> and <span class="text-primary">Opportunity</span>
                </h3>

                <ul class="wty-stats" data-wty-stats>
                    <li class="wty-row" style="--w: 65%">
                        <p class="wty-n">
                            <span class="wty-pre">Over</span>
                            <span data-count="65">65</span><i>%</i>
                        </p>
                        <p class="wty-t text-slate-600 dark:text-gray-300">of employers report difficulty finding suitably skilled workers.</p>
                    </li>

                    <li class="wty-row" style="--w: 66%">
                        <p class="wty-n">
                            <span data-count="66">66</span><i>%</i>
                        </p>
                        <p class="wty-t text-slate-600 dark:text-gray-300">of young Tanzanians aged 18–35 would like to start their own business.</p>
                    </li>

                    <li class="wty-row" style="--w: 28%">
                        <p class="wty-n">
                            <span data-count="28">28</span><i>%</i>
                        </p>
                        <p class="wty-t text-slate-600 dark:text-gray-300">identify lack of entrepreneurial skills or motivation as a barrier to employment.</p>
                    </li>
                </ul>

                <p class="text-slate-600 dark:text-gray-300 leading-relaxed">
                    Research from the University of Dodoma shows that soft skills are an important link between training and employability. As climate and environmental pressures increasingly affect livelihoods, young people also need green skills to build sustainable livelihoods and use resources responsibly.
                </p>

                <p class="wty-callout font-semibold leading-relaxed text-slate-800 dark:text-gray-100">
                    The challenge is not simply education or ambition, but the practical skills, experience and opportunities to turn learning into livelihoods and responsible action.
                </p>
            </div>
        </div>

        <div class="wty-lower">

            <!-- Pengo -> Fursa -->
            <div class="wty-duo">
                <div class="wty-side">
                    <span class="wty-side-no">01</span>
                    <h4 class="text-slate-900 dark:text-white">The Skills Gap</h4>
                    <p class="text-slate-600 dark:text-gray-300">
                        Many employers struggle to find suitably skilled workers, pointing to a gap between training and workplace needs.
                    </p>
                </div>

                <div class="wty-mid" aria-hidden="true">
                    <span class="wty-vline"></span>
                    <span class="wty-dot">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5 12h14M13 6l6 6-6 6"/>
                        </svg>
                    </span>
                    <span class="wty-vline"></span>
                </div>

                <div class="wty-side wty-side-opportunity">
                    <span class="wty-side-no">02</span>
                    <h4 class="text-slate-900 dark:text-white">The Opportunity</h4>
                    <p class="text-slate-600 dark:text-gray-300">
                        Practical, soft, entrepreneurial and green skills can help young people turn learning into livelihoods and responsible action.
                    </p>
                </div>
            </div>

            <!-- Mahitaji -->
            <div style="margin-top: 4.5rem;">
                <p class="wty-eyebrow">What young people need</p>

                <ul class="wty-needs">
                    <li class="wty-need">
                        <span class="wty-need-ico" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="3" y="7" width="18" height="13" rx="2"/>
                                <path d="M9 7V5a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v2M3 13h18"/>
                            </svg>
                        </span>
                        <div>
                            <span class="wty-need-no">01</span>
                            <h5 class="text-slate-900 dark:text-white">Practical and Job-Ready Skills</h5>
                        </div>
                    </li>

                    <li class="wty-need">
                        <span class="wty-need-ico" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="9" cy="8" r="3"/>
                                <path d="M2 20c0-3.3 3.1-6 7-6s7 2.7 7 6"/>
                                <path d="M17 8a3 3 0 1 0 0-6"/>
                                <path d="M22 20c0-2.5-1.9-4.6-4.5-5.5"/>
                            </svg>
                        </span>
                        <div>
                            <span class="wty-need-no">02</span>
                            <h5 class="text-slate-900 dark:text-white">Soft Skills and Work Experience</h5>
                        </div>
                    </li>

                    <li class="wty-need">
                        <span class="wty-need-ico" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M9 18h6M10 21h4"/>
                                <path d="M12 3a6 6 0 0 0-4 10.5c.7.7 1 1.5 1 2.5h6c0-1 .3-1.8 1-2.5A6 6 0 0 0 12 3z"/>
                            </svg>
                        </span>
                        <div>
                            <span class="wty-need-no">03</span>
                            <h5 class="text-slate-900 dark:text-white">Entrepreneurial Skills and Support</h5>
                        </div>
                    </li>

                    <li class="wty-need">
                        <span class="wty-need-ico" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 21v-8"/>
                                <path d="M12 13c0-4-3-6-7-6 0 4 3 6 7 6z"/>
                                <path d="M12 11c0-3 2-5 6-5 0 3-2 5-6 5z"/>
                            </svg>
                        </span>
                        <div>
                            <span class="wty-need-no">04</span>
                            <h5 class="text-slate-900 dark:text-white">Green Skills and Sustainable Livelihoods</h5>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<script>
    // Why The Youth: nambari zinahesabu kutoka 0 na mistari inajaa mara moja, sehemu ikionekana
    (function () {
        var list = document.querySelector('[data-wty-stats]');
        if (!list) return;

        var reduce = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
        if (reduce || !('IntersectionObserver' in window)) return;

        var nums = list.querySelectorAll('[data-count]');

        function countUp(el) {
            var target = parseFloat(el.getAttribute('data-count'));
            var start = null;
            var dur = 1600;

            function tick(t) {
                if (start === null) start = t;
                var p = Math.min(1, (t - start) / dur);
                el.textContent = Math.round(target * (1 - Math.pow(1 - p, 3)));

                if (p < 1) requestAnimationFrame(tick);
            }

            requestAnimationFrame(tick);
        }

        list.classList.add('is-ready');
        Array.prototype.forEach.call(nums, function (el) {
            el.textContent = '0';
        });

        var io = new IntersectionObserver(function (entries) {
            entries.forEach(function (e) {
                if (!e.isIntersecting) return;

                list.classList.add('is-in');

                Array.prototype.forEach.call(nums, function (el, i) {
                    setTimeout(function () {
                        countUp(el);
                    }, 200 + i * 140);
                });

                io.disconnect();
            });
        }, { threshold: 0.4 });

        io.observe(list);
    })();
</script>