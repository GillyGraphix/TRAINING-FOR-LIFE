<!-- OUR APPROACH SECTION -->
@php
    // Picha ya sehemu hii. Weka picha yako kwenye: public/images/home/our-approach.jpg
    // (wima, mfano 900x1300). Kabla ya hapo inatumia picha za About ikiwa zipo.
    $approachImage = null;
    foreach (['images/home/our-approach.jpg', 'images/about/about-hero.jpg', 'images/about/about-who.jpg'] as $approachFile) {
        if (file_exists(public_path($approachFile))) {
            $approachImage = asset($approachFile);
            break;
        }
    }
@endphp

<style>
    /* =====================================================================
       OUR APPROACH - CSS ya kawaida (haihitaji npm run build)
       Rangi za brand: orange #f79120, dark blue #070049, nyeupe, nyeusi
       ===================================================================== */
    .oa {
        position: relative;
        --oa-line: rgba(148, 163, 184, .4);
    }

    .dark .oa {
        --oa-line: rgba(71, 85, 105, .7);
    }

    .oa-orb {
        position: absolute;
        top: -8rem;
        left: -8rem;
        width: 26rem;
        height: 26rem;
        border-radius: 9999px;
        background: radial-gradient(circle, rgba(247, 145, 32, .16), transparent 65%);
        pointer-events: none;
    }

    /* Picha iko KULIA; inanyooshwa kufikia urefu wote wa hatua, kwa hiyo hakuna nafasi tupu chini yake */
    .oa-main {
        display: grid;
        grid-template-columns: minmax(0, 1fr);
        gap: 2rem;
        align-items: stretch;
    }

    .oa-photo-col { order: -1; }

    @media (min-width: 1024px) {
        .oa-main {
            grid-template-columns: minmax(0, 7fr) minmax(0, 5fr);
            gap: 3.5rem;
        }

        .oa-photo-col { order: 0; }
    }

    /* ----- Picha: tao (arch) juu, mstari wa machungwa chini-kushoto ----- */
    .oa-photo {
        position: relative;
        display: flex;
        flex-direction: column;
        height: 100%;
        padding: 0 0 1.25rem 1.25rem;
    }

    .oa-photo::before {
        content: "";
        position: absolute;
        top: 1.25rem;
        left: 0;
        right: 1.25rem;
        bottom: 0;
        z-index: 0;
        border: 2px solid rgba(247, 145, 32, .75);
        border-radius: 999px 999px 2rem 2rem;
    }

    .oa-frame {
        position: relative;
        z-index: 1;
        flex: 1 1 auto;
        min-height: 24rem;
        overflow: hidden;
        border-radius: 999px 999px 2rem 2rem;
        background:
            radial-gradient(rgba(255, 255, 255, .2) 1.4px, transparent 1.4px) 0 0 / 18px 18px,
            linear-gradient(160deg, #070049 0%, #f79120 100%);
        box-shadow: 0 30px 60px -24px rgba(7, 0, 73, .55);
    }

    @media (min-width: 1024px) {
        .oa-frame { min-height: 30rem; }
    }

    .oa-frame img {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
        transition: transform 1.2s ease;
    }

    .oa-photo:hover .oa-frame img {
        transform: scale(1.05);
    }

    .oa-frame::after {
        content: "";
        position: absolute;
        inset: 0;
        pointer-events: none;
        background: linear-gradient(to top, rgba(7, 0, 73, .85), rgba(7, 0, 73, 0) 55%);
    }

    /* Nambari kubwa "6" juu katikati ya tao (inaonekana hata bila picha) */
    .oa-big {
        position: absolute;
        top: 2.25rem;
        left: 0;
        right: 0;
        z-index: 2;
        color: #fff;
        text-align: center;
        line-height: 1;
    }

    .oa-big b {
        display: block;
        font-size: 5rem;
        font-weight: 800;
        letter-spacing: -.04em;
        text-shadow: 0 6px 24px rgba(7, 0, 73, .5);
    }

    .oa-big span {
        display: block;
        margin-top: .4rem;
        font-size: .65rem;
        font-weight: 800;
        letter-spacing: .2em;
        text-transform: uppercase;
        color: #f79120;
    }

    .oa-chip {
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

    .oa-chip::before {
        content: "";
        display: block;
        width: 2.5rem;
        height: 3px;
        margin-bottom: .6rem;
        border-radius: 9999px;
        background: #f79120;
    }

    .oa-chip strong {
        display: block;
        font-size: 1rem;
        line-height: 1.3;
        font-weight: 700;
    }

    .oa-chip span {
        display: block;
        margin-top: .2rem;
        font-size: .8rem;
        line-height: 1.45;
        color: rgba(255, 255, 255, .85);
    }

    /* ----- Hatua 6 (zimebanwa ili zisiache nafasi) ----- */
    .oa-steps {
        margin: 0;
        padding: 0;
        list-style: none;
        border-top: 1px solid var(--oa-line);
    }

    .oa-step {
        position: relative;
        display: grid;
        grid-template-columns: 3.75rem minmax(0, 1fr);
        gap: 1rem;
        align-items: start;
        padding: 1.1rem 0;
        border-bottom: 1px solid var(--oa-line);
        transition: opacity .6s ease, transform .6s ease;
    }

    .oa-step::after {
        content: "";
        position: absolute;
        left: 0;
        bottom: -1px;
        width: 100%;
        height: 3px;
        border-radius: 9999px;
        background: #f79120;
        transform: scaleX(0);
        transform-origin: left;
        transition: transform .5s ease;
    }

    .oa-step:hover::after {
        transform: scaleX(1);
    }

    /* Hali ya kuingia (reveal) */
    .oa-steps.is-ready:not(.is-in) .oa-step {
        opacity: 0;
        transform: translateY(18px);
    }

    .oa-num {
        margin: 0;
        font-size: 1.7rem;
        line-height: 1;
        font-weight: 800;
        letter-spacing: -.03em;
        font-variant-numeric: tabular-nums;
        color: #070049;
    }

    .dark .oa-num {
        color: #fff;
    }

    .oa-num i {
        font-style: normal;
        color: #f79120;
    }

    .oa-head {
        display: flex;
        align-items: center;
        gap: .7rem;
        margin-bottom: .3rem;
    }

    .oa-ico {
        display: flex;
        flex: none;
        align-items: center;
        justify-content: center;
        width: 2.25rem;
        height: 2.25rem;
        border-radius: 9999px;
        border: 1.5px solid rgba(247, 145, 32, .7);
        color: #070049;
        transition: background-color .3s ease, color .3s ease;
    }

    .dark .oa-ico {
        color: #f79120;
    }

    .oa-step:hover .oa-ico {
        background: #f79120;
        color: #070049;
    }

    .oa-ico svg {
        width: 1.1rem;
        height: 1.1rem;
    }

    .oa-head h4 {
        margin: 0;
        font-size: 1.2rem;
        line-height: 1.2;
        font-weight: 800;
    }

    .oa-tag {
        display: block;
        margin-bottom: .4rem;
        font-size: .62rem;
        line-height: 1;
        font-weight: 800;
        letter-spacing: .16em;
        text-transform: uppercase;
        color: #f79120;
    }

    .oa-t {
        margin: 0;
        font-size: .95rem;
        line-height: 1.6;
    }

    @media (min-width: 640px) {
        .oa-step {
            grid-template-columns: 4.5rem minmax(0, 1fr);
        }

        .oa-num {
            font-size: 2.4rem;
        }
    }

    /* Maelezo ya chini ya hatua */
    .oa-callout {
        margin: 1.25rem 0 0;
        padding: 1rem 1.25rem;
        border-left: 4px solid #f79120;
        border-radius: 0 1rem 1rem 0;
        background: rgba(247, 145, 32, .09);
    }

    /* ----- Mzunguko kwa mtazamo mmoja (umebanwa) ----- */
    .oa-lower {
        margin-top: 2.25rem;
    }

    .oa-eyebrow {
        display: inline-flex;
        align-items: center;
        gap: .65rem;
        margin: 0 0 1rem;
        font-size: .8rem;
        font-weight: 800;
        letter-spacing: .16em;
        text-transform: uppercase;
        color: #070049;
    }

    .dark .oa-eyebrow {
        color: #f79120;
    }

    .oa-eyebrow::before {
        content: "";
        width: 2rem;
        height: 3px;
        border-radius: 9999px;
        background: #f79120;
    }

    .oa-flow {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        margin: 0;
        padding: 0;
        list-style: none;
        border: 1px solid var(--oa-line);
        border-radius: 1.25rem;
        overflow: hidden;
        background: rgba(255, 255, 255, .6);
    }

    .dark .oa-flow {
        background: rgba(15, 23, 42, .55);
    }

    .oa-node {
        display: flex;
        align-items: center;
        gap: .7rem;
        padding: .85rem 1.1rem;
        border-bottom: 1px solid var(--oa-line);
        font-weight: 700;
        transition: background-color .3s ease;
    }

    .oa-node:hover {
        background: rgba(247, 145, 32, .1);
    }

    .oa-node b {
        font-size: .75rem;
        letter-spacing: .16em;
        color: #f79120;
    }

    .oa-node span {
        color: #070049;
    }

    .dark .oa-node span {
        color: #fff;
    }

    .oa-node:nth-child(odd) {
        border-right: 1px solid var(--oa-line);
    }

    .oa-node:nth-last-child(-n+2) {
        border-bottom: 0;
    }

    .oa-loop {
        display: flex;
        align-items: center;
        gap: .75rem;
        margin: 1rem 0 0;
        font-size: .85rem;
        color: #f79120;
        font-weight: 700;
    }

    .oa-loop svg {
        flex: none;
        width: 1.4rem;
        height: 1.4rem;
    }

    @media (min-width: 1024px) {
        .oa-flow {
            grid-template-columns: repeat(6, minmax(0, 1fr));
        }

        .oa-node {
            border-bottom: 0;
            border-right: 1px solid var(--oa-line);
            justify-content: center;
        }

        .oa-node:last-child {
            border-right: 0;
        }
    }

    @media (prefers-reduced-motion: reduce) {
        .oa-step,
        .oa-step::after,
        .oa-ico,
        .oa-frame img {
            transition: none;
        }

        .oa-steps.is-ready:not(.is-in) .oa-step {
            opacity: 1;
            transform: none;
        }

        .oa-photo:hover .oa-frame img {
            transform: none;
        }
    }
</style>

<section class="oa relative py-14 bg-gray-50 dark:bg-slate-900/60 transition-colors duration-500 overflow-hidden">
    <span class="oa-orb" aria-hidden="true"></span>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Section Header -->
        <div class="text-center max-w-3xl mx-auto mb-10">
            <span class="text-primary font-bold text-xs uppercase tracking-[0.25em] bg-primary/10 px-4 py-1.5 rounded-full">How We Work</span>

            <h2 class="text-3xl md:text-5xl font-extrabold text-slate-900 dark:text-white mt-4 mb-4">
                Our Strategic Approach
            </h2>

            <p class="text-slate-600 dark:text-gray-300 text-base md:text-lg leading-relaxed">
                We close the gap between potential and opportunity through a comprehensive six-step model designed to transition youth from passive observers to active economic and social leaders.
            </p>

            <div class="w-24 h-1 bg-primary mx-auto rounded-full mt-5"></div>
        </div>

        <div class="oa-main">

            <!-- Steps (kushoto) -->
            <div>
                <ol class="oa-steps" data-oa-steps>

                    <!-- 01 Identify -->
                    <li class="oa-step">
                        <p class="oa-num">01<i>.</i></p>
                        <div>
                            <div class="oa-head">
                                <span class="oa-ico" aria-hidden="true">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                        <circle cx="11" cy="11" r="7"/>
                                        <path d="M21 21l-4.3-4.3"/>
                                    </svg>
                                </span>
                                <h4 class="text-slate-900 dark:text-white">Identify</h4>
                            </div>
                            <span class="oa-tag">Talent Discovery</span>
                            <p class="oa-t text-slate-600 dark:text-gray-300">
                                We find talented young people excluded from opportunity, not because of ability, but because of poverty, geography, or lack of connections.
                            </p>
                        </div>
                    </li>

                    <!-- 02 Develop -->
                    <li class="oa-step">
                        <p class="oa-num">02<i>.</i></p>
                        <div>
                            <div class="oa-head">
                                <span class="oa-ico" aria-hidden="true">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M12 21v-8"/>
                                        <path d="M12 13c0-4-3-6-7-6 0 4 3 6 7 6z"/>
                                        <path d="M12 11c0-3 2-5 6-5 0 3-2 5-6 5z"/>
                                    </svg>
                                </span>
                                <h4 class="text-slate-900 dark:text-white">Develop</h4>
                            </div>
                            <span class="oa-tag">Skill Building</span>
                            <p class="oa-t text-slate-600 dark:text-gray-300">
                                Through Course 4, Kijana Fursa, and Soma na Matumaini, we build practical skills, character, and leadership.
                            </p>
                        </div>
                    </li>

                    <!-- 03 Equip -->
                    <li class="oa-step">
                        <p class="oa-num">03<i>.</i></p>
                        <div>
                            <div class="oa-head">
                                <span class="oa-ico" aria-hidden="true">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="3" y="7" width="18" height="13" rx="2"/>
                                        <path d="M9 7V5a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v2M3 13h18"/>
                                    </svg>
                                </span>
                                <h4 class="text-slate-900 dark:text-white">Equip</h4>
                            </div>
                            <span class="oa-tag">Resource Allocation</span>
                            <p class="oa-t text-slate-600 dark:text-gray-300">
                                We connect graduates to seed capital, savings groups, and scholarships to ensure they have the resources to succeed.
                            </p>
                        </div>
                    </li>

                    <!-- 04 Connect -->
                    <li class="oa-step">
                        <p class="oa-num">04<i>.</i></p>
                        <div>
                            <div class="oa-head">
                                <span class="oa-ico" aria-hidden="true">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                        <circle cx="9" cy="8" r="3"/>
                                        <path d="M2 20c0-3.3 3.1-6 7-6s7 2.7 7 6"/>
                                        <path d="M17 8a3 3 0 1 0 0-6"/>
                                        <path d="M22 20c0-2.5-1.9-4.6-4.5-5.5"/>
                                    </svg>
                                </span>
                                <h4 class="text-slate-900 dark:text-white">Connect</h4>
                            </div>
                            <span class="oa-tag">Network Integration</span>
                            <p class="oa-t text-slate-600 dark:text-gray-300">
                                We link youth to mentors, employers, and markets, closing the "experience trap" that keeps first-time job seekers locked out.
                            </p>
                        </div>
                    </li>

                    <!-- 05 Create -->
                    <li class="oa-step">
                        <p class="oa-num">05<i>.</i></p>
                        <div>
                            <div class="oa-head">
                                <span class="oa-ico" aria-hidden="true">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M9 18h6M10 21h4"/>
                                        <path d="M12 3a6 6 0 0 0-4 10.5c.7.7 1 1.5 1 2.5h6c0-1 .3-1.8 1-2.5A6 6 0 0 0 12 3z"/>
                                    </svg>
                                </span>
                                <h4 class="text-slate-900 dark:text-white">Create</h4>
                            </div>
                            <span class="oa-tag">Economic Growth</span>
                            <p class="oa-t text-slate-600 dark:text-gray-300">
                                Graduates launch businesses and take up employment, creating sustainable income for themselves and new jobs for others.
                            </p>
                        </div>
                    </li>

                    <!-- 06 Lead -->
                    <li class="oa-step">
                        <p class="oa-num">06<i>.</i></p>
                        <div>
                            <div class="oa-head">
                                <span class="oa-ico" aria-hidden="true">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M5 21V4"/>
                                        <path d="M5 4h12l-2.5 4L17 12H5"/>
                                    </svg>
                                </span>
                                <h4 class="text-slate-900 dark:text-white">Lead</h4>
                            </div>
                            <span class="oa-tag">Community Impact</span>
                            <p class="oa-t text-slate-600 dark:text-gray-300">
                                Our most committed graduates return as alumni mentors, donors, and future board members, sustaining the cycle for the next cohort.
                            </p>
                        </div>
                    </li>
                </ol>

                <p class="oa-callout font-semibold leading-relaxed text-slate-800 dark:text-gray-100">
                    Every graduate who leads becomes the reason the next young person is identified, a cycle that grows stronger with each cohort.
                </p>
            </div>

            <!-- Picha (kulia): inafikia urefu wote wa hatua -->
            <div class="oa-photo-col">
                <div class="oa-photo">
                    <div class="oa-frame">
                        @if ($approachImage)
                            <img src="{{ $approachImage }}" alt="Young people building skills and opportunities with Training For Life" loading="lazy" onerror="this.remove()">
                        @endif

                        <div class="oa-chip">
                            <strong>From observers to leaders</strong>
                            <span>Identify, develop, equip, connect, create and lead.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    // Our Approach: hatua zinaingia moja baada ya nyingine sehemu ikionekana
    (function () {
        var list = document.querySelector('[data-oa-steps]');
        if (!list) return;

        var reduce = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
        if (reduce || !('IntersectionObserver' in window)) return;

        var items = list.querySelectorAll('.oa-step');

        Array.prototype.forEach.call(items, function (el, i) {
            el.style.transitionDelay = (i * 120) + 'ms';
        });

        list.classList.add('is-ready');

        var io = new IntersectionObserver(function (entries) {
            entries.forEach(function (e) {
                if (!e.isIntersecting) return;

                list.classList.add('is-in');

                // Ondoa delay baada ya kuingia ili hover isichelewe
                setTimeout(function () {
                    Array.prototype.forEach.call(items, function (el) {
                        el.style.transitionDelay = '';
                    });
                }, 1400);

                io.disconnect();
            });
        }, { threshold: 0.15 });

        io.observe(list);
    })();
</script>