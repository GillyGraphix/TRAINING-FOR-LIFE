<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>About TFL - Training For Life</title>

    <!-- Google Fonts: Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Tailwind & Alpine (Vite) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* "Who We Are" photo section: plain CSS so it works without rebuilding Tailwind */
        .tfl-who {
            position: relative; overflow: hidden; display: flex; align-items: flex-end;
            min-height: 520px; border-radius: 1.5rem; background: #1e293b;
            box-shadow: 0 25px 50px -12px rgba(15, 23, 42, .25);
        }
        .tfl-who-img { position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; object-position: center; }
        .tfl-who-shade {
            position: absolute; inset: 0;
            background:
                linear-gradient(to top, rgba(2, 6, 23, .92), rgba(2, 6, 23, .55) 55%, rgba(2, 6, 23, .2)),
                linear-gradient(135deg, rgba(249, 115, 22, .16), transparent 55%);
        }
        .tfl-who-grid {
            position: relative; z-index: 10; width: 100%;
            display: grid; grid-template-columns: minmax(0, 1fr); gap: 1.75rem; padding: 1.75rem;
        }
        .tfl-who-bar { display: block; height: 4px; width: 3rem; border-radius: 9999px; background: #fb923c; margin-bottom: 1.25rem; }
        .tfl-who-title { margin: 0; color: #fff; font-size: 2rem; line-height: 1.15; font-weight: 700; }
        .tfl-who-panel {
            background: rgba(255, 255, 255, .12);
            -webkit-backdrop-filter: blur(12px); backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, .22); border-radius: 1rem; padding: 1.5rem;
        }
        .tfl-who-text { margin: 0; color: rgba(255, 255, 255, .92); font-size: 1.05rem; line-height: 1.75; }
        @media (min-width: 1024px) {
            .tfl-who { min-height: 540px; }
            .tfl-who-grid { grid-template-columns: minmax(0, 4fr) minmax(0, 8fr); align-items: end; gap: 2.5rem; padding: 3.5rem; }
            .tfl-who-title { font-size: 2.5rem; }
            .tfl-who-panel { padding: 2rem; }
        }

        /* "Our Approach": arch photo + connected steps (plain CSS, no Tailwind rebuild needed) */
        .tfl-app-grid {
            display: grid; grid-template-columns: minmax(0, 1fr); gap: 3rem; align-items: start;
        }
        .tfl-app-media { position: relative; width: 100%; max-width: 24rem; margin: 0 auto; }
        .tfl-app-media::before {
            content: ""; position: absolute; inset: 0; transform: translate(14px, 14px);
            border: 2px solid rgba(251, 146, 60, .7); border-radius: 999px 999px 1.5rem 1.5rem; z-index: 0;
        }
        .tfl-app-frame {
            position: relative; z-index: 1; overflow: hidden; background: #1e293b;
            border-radius: 999px 999px 1.5rem 1.5rem; box-shadow: 0 25px 50px -12px rgba(15, 23, 42, .3);
        }
        .tfl-app-img { display: block; width: 100%; aspect-ratio: 4 / 5; object-fit: cover; object-position: center; }
        .tfl-app-fade {
            position: absolute; inset: 0;
            background: linear-gradient(to top, rgba(2, 6, 23, .75), rgba(2, 6, 23, 0) 45%);
        }
        .tfl-app-chip {
            position: absolute; left: 1.25rem; right: 1.25rem; bottom: 1.25rem; z-index: 2;
            padding: .9rem 1.1rem; border-radius: 1rem; color: #fff;
            background: rgba(255, 255, 255, .14); border: 1px solid rgba(255, 255, 255, .25);
            -webkit-backdrop-filter: blur(10px); backdrop-filter: blur(10px);
        }
        .tfl-app-chip strong { display: block; font-size: 1rem; font-weight: 700; line-height: 1.3; }
        .tfl-app-chip span { display: block; margin-top: .15rem; font-size: .8rem; color: rgba(255, 255, 255, .8); line-height: 1.4; }
        .tfl-app-list { position: relative; list-style: none; margin: 0; padding: 0; }
        .tfl-app-list::before {
            content: ""; position: absolute; left: calc(1rem - 1px); top: 1.25rem; bottom: 1.25rem; width: 2px;
            background: linear-gradient(to bottom, rgba(251, 146, 60, .6), rgba(251, 146, 60, .12));
        }
        .tfl-app-step {
            position: relative; display: grid; grid-template-columns: 2rem minmax(0, 1fr); column-gap: 1.25rem;
            padding: 1rem 0 1.4rem;
        }
        .tfl-app-step > :first-child { position: relative; z-index: 1; }
        @media (min-width: 1024px) {
            .tfl-app-grid { grid-template-columns: minmax(0, 5fr) minmax(0, 7fr); gap: 4.5rem; }
            .tfl-app-media { position: sticky; top: 7rem; max-width: none; }
        }

        /* "Accountability": year wheel (plain CSS + tiny vanilla JS, no Tailwind rebuild needed) */
        .tfl-acc-grid { display: grid; grid-template-columns: minmax(0, 1fr); gap: 2.5rem; align-items: center; }
        .tfl-acc-wheel { width: 100%; max-width: 27rem; margin: 0 auto; }
        .tfl-acc-wheel { color: #0f172a; }
        .dark .tfl-acc-wheel { color: #ffffff; }
        .tfl-acc-wheel svg { display: block; width: 100%; height: auto; overflow: visible; }
        .tfl-acc-ring { transition: opacity .3s ease; }
        .tfl-acc-wheel[data-focus] .tfl-acc-ring { opacity: .2; }
        .tfl-acc-wheel[data-focus="board"] [data-ring="board"],
        .tfl-acc-wheel[data-focus="agm"] [data-ring="agm"],
        .tfl-acc-wheel[data-focus="sign"] [data-ring="sign"],
        .tfl-acc-wheel[data-focus="audit"] [data-ring="audit"] { opacity: 1; }
        .tfl-acc-list { display: grid; grid-template-columns: minmax(0, 1fr); gap: .75rem; list-style: none; margin: 0; padding: 0; }
        .tfl-acc-item {
            display: flex; align-items: flex-start; gap: .9rem; width: 100%; text-align: left; cursor: pointer;
            padding: .9rem 1rem; border-radius: 1rem; border: 1px solid rgba(148, 163, 184, .35);
            background: transparent; color: inherit; font: inherit;
            transition: border-color .2s ease, background-color .2s ease;
        }
        .tfl-acc-item:hover, .tfl-acc-item:focus-visible, .tfl-acc-item.is-on {
            border-color: rgba(251, 146, 60, .85); background: rgba(251, 146, 60, .08);
        }
        .tfl-acc-item:focus-visible { outline: 2px solid #fb923c; outline-offset: 2px; }
        @media (min-width: 1024px) {
            .tfl-acc-grid { grid-template-columns: minmax(0, 1fr) minmax(0, 1fr); gap: 4rem; }
        }
        @media (prefers-reduced-motion: reduce) {
            .tfl-acc-ring, .tfl-acc-item { transition: none; }
        }

        /* Registration certificate card */
        .tfl-cert {
            position: relative; display: grid; grid-template-columns: minmax(0, 1fr); gap: 1.5rem;
            justify-items: center; text-align: center; margin-top: 2.5rem; padding: 2rem 1.5rem;
            border-radius: 1.25rem;
        }
        .tfl-cert::before {
            content: ""; position: absolute; inset: .6rem; border-radius: .85rem;
            border: 1px dashed currentColor; opacity: .22; pointer-events: none;
        }
        .tfl-cert-seal { width: 9.5rem; height: 9.5rem; flex: none; transform: rotate(-6deg); filter: drop-shadow(0 10px 18px rgba(234, 88, 12, .3)); }
        .tfl-cert-seal svg { display: block; width: 100%; height: 100%; }
        .tfl-cert.is-ready:not(.is-in) .tfl-cert-seal { opacity: 0; transform: scale(1.4) rotate(-16deg); }
        .tfl-cert.is-ready .tfl-cert-seal { transition: opacity .35s ease, transform .7s cubic-bezier(.3, 1.35, .5, 1); }
        .tfl-cert-no { margin: .15rem 0 0; font-size: 1.6rem; font-weight: 700; letter-spacing: .01em; line-height: 1.2; }
        .tfl-cert-copy {
            display: inline-flex; align-items: center; gap: .5rem; padding: .65rem 1.1rem; border-radius: 9999px;
            border: 1px solid rgba(251, 146, 60, .7); background: transparent; color: inherit; cursor: pointer;
            font: inherit; font-size: .875rem; font-weight: 600; transition: background-color .2s ease, border-color .2s ease;
        }
        .tfl-cert-copy:hover, .tfl-cert-copy:focus-visible { background: rgba(251, 146, 60, .12); border-color: #fb923c; }
        .tfl-cert-copy:focus-visible { outline: 2px solid #fb923c; outline-offset: 2px; }
        @media (min-width: 768px) {
            .tfl-cert { grid-template-columns: auto minmax(0, 1fr) auto; justify-items: start; text-align: left; align-items: center; gap: 2.5rem; padding: 2rem 2.5rem; }
        }
        @media (prefers-reduced-motion: reduce) {
            .tfl-cert.is-ready .tfl-cert-seal, .tfl-cert-copy { transition: none; }
        }

        /* Accountability wheel: "you are here" needle, caption */
        .tfl-acc-needle { transform-box: view-box; transform-origin: 210px 210px; transform: rotate(var(--now, -90deg)); opacity: 0; }
        .tfl-acc-wheel.has-now .tfl-acc-needle { opacity: 1; }
        .tfl-acc-now { margin: .9rem 0 0; text-align: center; font-size: .875rem; }
        .tfl-acc-now-dot { display: inline-block; width: .55rem; height: .55rem; margin-right: .45rem; border-radius: 9999px; background: #fb923c; vertical-align: middle; }


        /* Our Story: climbing trail + summit panel (plain CSS) */
        .tfl-story-grid { display: grid; grid-template-columns: minmax(0, 1fr); gap: 3rem; align-items: start; }
        .tfl-trail { position: relative; padding-left: 4.5rem; color: #0f172a; }
        .dark .tfl-trail { color: #ffffff; }
        .tfl-trail:not(.has-svg)::before {
            content: ""; position: absolute; left: calc(2rem - 1px); top: .5rem; bottom: .5rem; width: 2px;
            background: rgba(148, 163, 184, .45);
        }
        .tfl-trail-svg { position: absolute; left: 0; top: 0; width: 4rem; overflow: visible; pointer-events: none; }
        .tfl-trail-list { list-style: none; margin: 0; padding: 0; }
        .tfl-stop { position: relative; }
        .tfl-stop-marker {
            position: absolute; left: -2.5rem; top: .9rem; width: 1.75rem; height: 1.75rem; transform: translateX(-50%);
            border-radius: 9999px; background: #fb923c; border: 2px solid #fb923c;
            box-shadow: 0 0 0 6px rgba(251, 146, 60, .18); transition: background-color .5s ease, border-color .5s ease, box-shadow .5s ease;
            display: flex; align-items: center; justify-content: center; color: #fff;
        }
        .tfl-stop-marker.is-summit { width: 2.4rem; height: 2.4rem; top: .55rem; background: #ea580c; border-color: #ea580c; box-shadow: 0 0 0 8px rgba(234, 88, 12, .2); }
        .tfl-stop-marker svg { width: 1.2rem; height: 1.2rem; }
        .tfl-stop-body { transition: opacity .6s ease, transform .6s ease; }
        .tfl-stop-year { margin: 0; font-size: 2.25rem; line-height: 1.1; font-weight: 700; letter-spacing: -.01em; }
        .tfl-trail.is-ready .tfl-stop:not(.is-reached) .tfl-stop-body { opacity: .28; transform: translateY(10px); }
        .tfl-trail.is-ready .tfl-stop:not(.is-reached) .tfl-stop-marker {
            background: transparent; border-color: rgba(148, 163, 184, .7); box-shadow: 0 0 0 0 rgba(251, 146, 60, 0);
        }
        .tfl-gap { margin: 1.75rem 0; }
        .tfl-gap span {
            display: inline-block; padding: .2rem .8rem; border-radius: 9999px; font-size: .8rem; font-weight: 500;
            border: 1px dashed rgba(148, 163, 184, .6);
        }
        .tfl-stat {
            display: inline-flex; align-items: baseline; gap: .6rem; margin-top: 1.1rem; padding: .7rem 1.1rem;
            border: 1px solid rgba(148, 163, 184, .4); border-radius: 1rem;
        }
        .tfl-stat-num { font-size: 2rem; line-height: 1; font-weight: 800; font-variant-numeric: tabular-nums; }
        .tfl-stat-label { font-size: .85rem; }
        @media (min-width: 1024px) {
            .tfl-story-grid { grid-template-columns: minmax(0, 7fr) minmax(0, 5fr); gap: 4rem; }
        }
        @media (prefers-reduced-motion: reduce) {
            .tfl-stop-marker, .tfl-stop-body { transition: none; }
        }

        /* Our Story: lower heading + arch photo (reuses the Our Approach photo styles) */
        .tfl-story-head { display: flex; align-items: baseline; gap: 1.5rem; padding-top: 2.5rem; margin-bottom: 2.75rem; }
        .tfl-story-media { order: -1; }
        .tfl-story-media.is-mirror::before { transform: translate(-14px, 14px); }
        @media (min-width: 1024px) {
            .tfl-story-media { order: 0; }
            .tfl-story-grid > .tfl-trail { max-width: 42rem; }
        }

        /* Anchors kutoka dropdown ya header: sehemu inasimama chini ya header isiyobadilika */
        .tfl-anchor { scroll-margin-top: 7rem; }
    </style>
</head>
<body class="font-sans antialiased bg-[#F4F6F9] text-slate-800 dark:bg-[#0B0F19] dark:text-slate-100 transition-colors duration-300">

    <!-- Header Navigation -->
    @include('partials.header')

    {{-- TODO: Add finalized safeguarding, complaints, and privacy policy links here when available. --}}

    <!-- Main Content -->
    <main class="pt-28 pb-28 min-h-screen relative overflow-hidden" style="overflow: clip;">

        <!-- Ambient background glow -->
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[800px] h-[800px] bg-primary/5 rounded-full blur-3xl pointer-events-none"></div>

        <!-- ============ HERO ============ -->
        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 mb-32">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-16 lg:gap-10 items-center">

                <!-- Left Content -->
                <div class="lg:col-span-7 space-y-7">
                    <p class="flex items-center gap-2 text-primary font-semibold text-sm tracking-wide uppercase">
                        About TFL - Moshi, Kilimanjaro
                    </p>

                    <h1 class="text-3xl md:text-5xl lg:text-[1.1rem] font-bold text-slate-900 dark:text-white leading-[1.12] tracking-tight">
                        A prosperous, poverty free Tanzania, built by empowered youth.
                    </h1>

                    <p class="text-lg text-slate-600 dark:text-slate-300 leading-relaxed max-w-xl">
                        Training For Life (TFL) is a Tanzanian, youth-led NGO founded in 1996 and registered in 2007 (Reg. No. 00NGO/0245), based in Moshi, Kilimanjaro. We identify, train, and mentor talented young people aged 15&ndash;35 from economically disadvantaged families across Tanzania, equipping them with market-driven skills, scholarships, and entrepreneurship pathways to become job creators and community changemakers.
                    </p>

                    <div class="flex flex-wrap gap-x-10 gap-y-5 pt-6 border-t border-slate-200 dark:border-slate-700/60">
                        <div>
                            <p class="text-3xl font-bold text-slate-900 dark:text-white">1996</p>
                            <p class="text-sm text-slate-500 dark:text-slate-400">Founded in Moshi</p>
                        </div>
                        <div>
                            <p class="text-3xl font-bold text-slate-900 dark:text-white">845+</p>
                            <p class="text-sm text-slate-500 dark:text-slate-400">Alumni giving back</p>
                        </div>
                        <div>
                            <p class="text-3xl font-bold text-primary dark:text-primary">5 acres</p>
                            <p class="text-sm text-slate-500 dark:text-slate-400">Farmland, alumni&#8209;owned</p>
                        </div>
                    </div>
                </div>

                <!-- Right Content: Premium Image Design -->
                <div class="lg:col-span-5 relative mt-8 lg:mt-0 z-10">

                    <!-- Ambient Orbs for 3D Depth -->
                    <div class="absolute -top-8 -right-8 w-64 h-64 bg-orange-400/20 dark:bg-orange-500/20 rounded-full blur-3xl -z-10"></div>
                    <div class="absolute -bottom-8 -left-8 w-64 h-64 bg-blue-500/10 dark:bg-blue-500/20 rounded-full blur-3xl -z-10"></div>

                    <!-- Offset Decorative Dots Pattern -->
                    <div class="absolute -top-6 -right-6 w-32 h-32 opacity-40 dark:opacity-20 -z-10"
                         style="background-image: radial-gradient(#fb923c 2px, transparent 2px); background-size: 16px 16px;">
                    </div>

                    <!-- Main Image Container with Asymmetrical Geometry -->
                    <div class="relative rounded-t-3xl rounded-bl-3xl rounded-br-[6rem] overflow-hidden shadow-2xl shadow-slate-900/15 dark:shadow-black/50 border border-white/40 dark:border-slate-700/50 group">

                        <!-- Subtle Image Overlay Gradient -->
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/70 via-slate-900/10 to-transparent z-10"></div>

                        <img
                            src="{{ asset('images/about/about-hero.jpg') }}"
                            alt="Training For Life youth and community in Moshi, Kilimanjaro"
                            class="w-full h-[400px] sm:h-[480px] lg:h-[560px] object-cover transition-transform duration-1000 group-hover:scale-105"
                            loading="eager"
                        >

                        <!-- Inner Overlay Element -->
                        <div class="absolute bottom-6 left-6 sm:bottom-8 sm:left-8 z-20 flex items-center gap-4">
                            <div class="w-12 h-12 rounded-full bg-primary flex items-center justify-center text-white shadow-lg">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-white font-bold text-lg leading-tight">Empowering Youth</p>
                                <p class="text-white/80 text-sm">Since 1996</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 space-y-28">

            <!-- ============ OUR STORY (trail + arch photo) ============ -->
            @php
                // Uses about-story.jpg when it exists, otherwise about-who.jpg, otherwise the hero photo
                $storyImage = file_exists(public_path('images/about/about-story.jpg'))
                    ? asset('images/about/about-story.jpg')
                    : (file_exists(public_path('images/about/about-who.jpg'))
                        ? asset('images/about/about-who.jpg')
                        : asset('images/about/about-hero.jpg'));
            @endphp
            <section id="our-story" class="tfl-anchor">
                <div class="tfl-story-head">
                    <h2 class="text-2xl md:text-3xl font-bold text-slate-900 dark:text-white">Our Story</h2>
                </div>

                <div class="tfl-story-grid">

                    <!-- Trail: the line draws as you scroll, each stop lights up when reached -->
                    <div class="tfl-trail" data-trail>
                        <svg class="tfl-trail-svg" data-trail-svg width="64" aria-hidden="true">
                            <path data-trail-base fill="none" stroke="currentColor" stroke-opacity=".28" stroke-width="2" stroke-dasharray="2 7" stroke-linecap="round"/>
                            <path data-trail-line fill="none" stroke="#fb923c" stroke-width="3" stroke-linecap="round"/>
                        </svg>

                        <ol class="tfl-trail-list">
                            <li class="tfl-stop" data-stop>
                                <span class="tfl-stop-marker" aria-hidden="true"></span>
                                <div class="tfl-stop-body">
                                    <p class="tfl-stop-year text-slate-900 dark:text-white">1996</p>
                                    <p class="text-sm font-semibold text-primary mb-2">Founded</p>
                                    <p class="text-slate-600 dark:text-slate-300 leading-relaxed max-w-xl">
                                        TFL was founded in 1996 on a simple belief: every young person, regardless of background, holds the potential to lead and to change their community.
                                    </p>
                                </div>
                            </li>

                            <li class="tfl-gap text-slate-400 dark:text-slate-500" aria-hidden="true"><span>11 years later</span></li>

                            <li class="tfl-stop" data-stop>
                                <span class="tfl-stop-marker" aria-hidden="true"></span>
                                <div class="tfl-stop-body">
                                    <p class="tfl-stop-year text-slate-900 dark:text-white">2007</p>
                                    <p class="text-sm font-semibold text-primary mb-2">Registered</p>
                                    <p class="text-slate-600 dark:text-slate-300 leading-relaxed max-w-xl">
                                        What began as a training initiative in Moshi has grown into a movement of more than 845 alumni &mdash; young people who completed our programmes and are now giving back as mentors, donors, and employers of the next generation.
                                    </p>
                                    <div class="tfl-stat">
                                        <span class="tfl-stat-num text-primary" data-count="845" data-suffix="+">845+</span>
                                        <span class="tfl-stat-label text-slate-500 dark:text-slate-400">alumni giving back</span>
                                    </div>
                                </div>
                            </li>

                            <li class="tfl-gap text-slate-400 dark:text-slate-500" aria-hidden="true"><span>18 years later</span></li>

                            <li class="tfl-stop" data-stop>
                                <span class="tfl-stop-marker is-summit" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m3 20 6-10 4 6 2-3 6 7H3Z"/></svg></span>
                                <div class="tfl-stop-body">
                                    <p class="tfl-stop-year text-slate-900 dark:text-white">2025</p>
                                    <p class="text-sm font-semibold text-primary mb-2">Land of their own</p>
                                    <p class="text-slate-600 dark:text-slate-300 leading-relaxed max-w-xl">
                                        In 2025, that alumni community raised its own funds to purchase 5 acres of farmland, turning TFL graduates from beneficiaries into owners of the organisation&rsquo;s future.
                                    </p>
                                    <div class="tfl-stat">
                                        <span class="tfl-stat-num text-primary" data-count="5" data-suffix="">5</span>
                                        <span class="tfl-stat-label text-slate-500 dark:text-slate-400">acres of alumni-owned farmland</span>
                                    </div>
                                </div>
                            </li>
                        </ol>
                    </div>

                    <!-- Arch photo (same design as Our Approach, outline mirrored) -->
                    <div class="tfl-app-media tfl-story-media is-mirror">
                        <div class="tfl-app-frame">
                            <img src="{{ $storyImage }}" alt="TFL alumni and community in Moshi, Kilimanjaro" class="tfl-app-img" loading="lazy">
                            <div class="tfl-app-fade"></div>
                        </div>
                        <div class="tfl-app-chip">
                            <strong>Since 1996</strong>
                            <span>Youth-led, in Moshi, Kilimanjaro.</span>
                        </div>
                    </div>
                </div>
            </section>

            <!-- ============ WHO WE ARE (photo background) ============ -->
            @php
                // Uses about-who.jpg when it exists, otherwise falls back to the hero photo
                $whoImage = file_exists(public_path('images/about/about-who.jpg'))
                    ? asset('images/about/about-who.jpg')
                    : asset('images/about/about-hero.jpg');
            @endphp
            <section id="who-we-are" class="tfl-anchor tfl-who">
                <img src="{{ $whoImage }}" alt="" aria-hidden="true" class="tfl-who-img" loading="lazy">
                <div class="tfl-who-shade"></div>

                <div class="tfl-who-grid">
                    <div>
                        <span class="tfl-who-bar"></span>
                        <h2 class="tfl-who-title">Who We Are</h2>
                    </div>
                    <div class="tfl-who-panel">
                        <p class="tfl-who-text">
                            Training For Life (TFL) is a Tanzanian, youth-led NGO founded in 1996 and registered in 2007 (Reg. No. 00NGO/0245), based in Moshi, Kilimanjaro. We identify, train, and mentor talented young people aged 15&ndash;35 from economically disadvantaged families across Tanzania, equipping them with market-driven skills, scholarships, and entrepreneurship pathways to become job creators and community changemakers.
                        </p>
                    </div>
                </div>
            </section>

            <!-- ============ MISSION, VISION & VALUES ============ -->
            <section id="mission-vision-values" class="tfl-anchor space-y-10">
                <div class="flex items-baseline gap-3">
                    <h2 class="text-2xl md:text-3xl font-bold text-slate-900 dark:text-white">Mission, Vision &amp; Values</h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-white dark:bg-slate-800/90 p-8 md:p-9 rounded-2xl border border-slate-200/80 dark:border-slate-700/80">
                        <h3 class="text-sm font-semibold uppercase tracking-wide text-primary mb-3">Vision</h3>
                        <p class="text-slate-700 dark:text-slate-200 text-lg leading-relaxed">
                            A prosperous, poverty-free Tanzania, where empowered youth are the primary drivers of resilient, thriving communities.
                        </p>
                    </div>
                    <div class="bg-white dark:bg-slate-800/90 p-8 md:p-9 rounded-2xl border border-slate-200/80 dark:border-slate-700/80">
                        <h3 class="text-sm font-semibold uppercase tracking-wide text-primary mb-3">Mission</h3>
                        <p class="text-slate-700 dark:text-slate-200 text-lg leading-relaxed">
                            To identify, equip, and connect youth from economically disadvantaged families with scholarships, market-driven skills, and dignified employment pathways, so they become job creators, leaders, and agents of lasting change in their communities.
                        </p>
                    </div>
                </div>

                <!-- Core belief -->
                <div class="bg-gradient-to-br from-slate-900 to-slate-800 text-white p-9 md:p-12 rounded-2xl relative overflow-hidden">
                    <div class="absolute -right-16 -bottom-16 w-56 h-56 bg-primary/20 rounded-full blur-3xl"></div>
                    <p class="text-xs font-semibold uppercase tracking-wide text-orange-400 mb-4 relative">Our Core Belief</p>
                    <p class="text-xl md:text-2xl font-medium leading-snug max-w-3xl relative">
                        Unemployment is not a lack of ability. It is a lack of opportunity. When a talented young person cannot afford school or training, poverty is not their failure; it is a system failure. TFL exists to fix that system, one young leader at a time.
                    </p>
                </div>

                <!-- Values -->
                <div class="pt-4">
                    <h3 class="text-lg font-semibold text-slate-900 dark:text-white mb-6">Values</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-8 gap-y-8">
                        <div class="flex gap-4">
                            <span class="shrink-0 w-11 h-11 rounded-xl bg-primary/10 text-primary flex items-center justify-center">
                                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M7 11V7a3 3 0 0 1 6 0v1"/><path d="M5 11h14l-1 9a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2l-1-9Z"/></svg>
                            </span>
                            <div>
                                <h4 class="font-semibold text-slate-900 dark:text-white mb-1">Empowerment</h4>
                                <p class="text-slate-600 dark:text-slate-300 text-sm leading-relaxed">We believe in handing over the tools, not just providing the solution. We equip youth to drive their own development</p>
                            </div>
                        </div>

                        <div class="flex gap-4">
                            <span class="shrink-0 w-11 h-11 rounded-xl bg-primary/10 text-primary flex items-center justify-center">
                                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3 4 6v6c0 5 3.5 8 8 9 4.5-1 8-4 8-9V6l-8-3Z"/><path d="m9 12 2 2 4-4"/></svg>
                            </span>
                            <div>
                                <h4 class="font-semibold text-slate-900 dark:text-white mb-1">Integrity</h4>
                                <p class="text-slate-600 dark:text-slate-300 text-sm leading-relaxed">We act with unwavering honesty and transparency. We are accountable to our youth, our donors and each other.</p>
                            </div>
                        </div>

                        <div class="flex gap-4">
                            <span class="shrink-0 w-11 h-11 rounded-xl bg-primary/10 text-primary flex items-center justify-center">
                                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="m12 2 2.9 6.3 6.9.9-5 4.7 1.3 6.8L12 17.6 5.9 20.7l1.3-6.8-5-4.7 6.9-.9L12 2Z"/></svg>
                            </span>
                            <div>
                                <h4 class="font-semibold text-slate-900 dark:text-white mb-1">Excellence</h4>
                                <p class="text-slate-600 dark:text-slate-300 text-sm leading-relaxed">We bring our best to everything we do, from designing a training module to managing a scholarship fund. Our beneficiaries deserve nothing less.</p>
                            </div>
                        </div>

                        <div class="flex gap-4">
                            <span class="shrink-0 w-11 h-11 rounded-xl bg-primary/10 text-primary flex items-center justify-center">
                                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="8" cy="9" r="3"/><circle cx="16" cy="9" r="3"/><path d="M3 20c0-3 2.5-5 5-5s5 2 5 5"/><path d="M11 20c0-3 2.5-5 5-5s5 2 5 5"/></svg>
                            </span>
                            <div>
                                <h4 class="font-semibold text-slate-900 dark:text-white mb-1">Collaboration</h4>
                                <p class="text-slate-600 dark:text-slate-300 text-sm leading-relaxed">We work hand-in-hand with communities, local leaders and each other. We achieve more together.</p>
                            </div>
                        </div>

                        <div class="flex gap-4 sm:col-span-2">
                            <span class="shrink-0 w-11 h-11 rounded-xl bg-primary/10 text-primary dark:text-primary flex items-center justify-center">
                                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M11 20A7 7 0 0 1 4 13c0-4 3-7 8-9 5 2 8 5 8 9a7 7 0 0 1-7 7"/><path d="M11 20v-6"/></svg>
                            </span>
                            <div>
                                <h4 class="font-semibold text-slate-900 dark:text-white mb-1">Stewardship</h4>
                                <p class="text-slate-600 dark:text-slate-300 text-sm leading-relaxed">We treat every donation, every piece of equipment and every minute of time as a precious resource meant for maximum impact.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- ============ OUR APPROACH (arch photo + steps) ============ -->
            @php
                // Uses about-approach.jpg when it exists, otherwise falls back to the Who We Are / hero photo
                $approachImage = file_exists(public_path('images/about/about-approach.jpg'))
                    ? asset('images/about/about-approach.jpg')
                    : $whoImage;
            @endphp
            <section id="our-approach" class="tfl-anchor">
                <div class="flex items-baseline gap-3 mb-3">
                    <h2 class="text-2xl md:text-3xl font-bold text-slate-900 dark:text-white">Our Approach</h2>
                </div>
                <p class="text-slate-500 dark:text-slate-400 mb-12 max-w-2xl">A six-step cycle, where the most committed graduates return to power the next one.</p>

                <div class="tfl-app-grid">
                    <!-- Arch photo -->
                    <div class="tfl-app-media">
                        <div class="tfl-app-frame">
                            <img src="{{ $approachImage }}" alt="TFL youth learning and working together in Moshi" class="tfl-app-img" loading="lazy">
                            <div class="tfl-app-fade"></div>
                        </div>
                        <div class="tfl-app-chip">
                            <strong>Six steps, one cycle</strong>
                            <span>Graduates return to lead the next cohort.</span>
                        </div>
                    </div>

                    <!-- Steps -->
                    <ol class="tfl-app-list">
                        <li class="tfl-app-step">
                            <span class="w-8 h-8 rounded-full bg-primary text-white text-sm font-semibold flex items-center justify-center">1</span>
                            <div>
                                <h4 class="text-lg font-semibold text-slate-900 dark:text-white mb-1">Identify</h4>
                                <p class="text-slate-600 dark:text-slate-300 text-sm leading-relaxed">We find talented young people excluded from opportunity, not because of ability, but because of poverty, geography, or lack of connections.</p>
                            </div>
                        </li>
                        <li class="tfl-app-step">
                            <span class="w-8 h-8 rounded-full bg-primary text-white text-sm font-semibold flex items-center justify-center">2</span>
                            <div>
                                <h4 class="text-lg font-semibold text-slate-900 dark:text-white mb-1">Develop</h4>
                                <p class="text-slate-600 dark:text-slate-300 text-sm leading-relaxed">Through Course 4, Kijana Fursa, and Soma na Matumaini, we build practical skills, character, and leadership.</p>
                            </div>
                        </li>
                        <li class="tfl-app-step">
                            <span class="w-8 h-8 rounded-full bg-primary text-white text-sm font-semibold flex items-center justify-center">3</span>
                            <div>
                                <h4 class="text-lg font-semibold text-slate-900 dark:text-white mb-1">Equip</h4>
                                <p class="text-slate-600 dark:text-slate-300 text-sm leading-relaxed">We connect graduates to seed capital, savings groups, and scholarships.</p>
                            </div>
                        </li>
                        <li class="tfl-app-step">
                            <span class="w-8 h-8 rounded-full bg-primary text-white text-sm font-semibold flex items-center justify-center">4</span>
                            <div>
                                <h4 class="text-lg font-semibold text-slate-900 dark:text-white mb-1">Connect</h4>
                                <p class="text-slate-600 dark:text-slate-300 text-sm leading-relaxed">We link youth to mentors, employers, and markets, closing the &ldquo;experience trap&rdquo; that keeps first-time job seekers locked out.</p>
                            </div>
                        </li>
                        <li class="tfl-app-step">
                            <span class="w-8 h-8 rounded-full bg-primary text-white text-sm font-semibold flex items-center justify-center">5</span>
                            <div>
                                <h4 class="text-lg font-semibold text-slate-900 dark:text-white mb-1">Create</h4>
                                <p class="text-slate-600 dark:text-slate-300 text-sm leading-relaxed">Graduates launch businesses and take up employment, creating income for themselves and jobs for others.</p>
                            </div>
                        </li>
                        <li class="tfl-app-step">
                            <span class="w-8 h-8 rounded-full bg-primary text-white text-sm font-semibold flex items-center justify-center">6</span>
                            <div>
                                <h4 class="text-lg font-semibold text-slate-900 dark:text-white mb-1">Lead</h4>
                                <p class="text-slate-600 dark:text-slate-300 text-sm leading-relaxed">Our most committed graduates return as alumni mentors, donors, and future board members, sustaining the cycle for the next cohort.</p>
                            </div>
                        </li>
                    </ol>
                </div>
            </section>

            <!-- ============ LEADERSHIP & GOVERNANCE ============ -->
            <section id="leadership-governance" class="tfl-anchor">
                <div class="flex items-baseline gap-3 mb-10">
                    <h2 class="text-2xl md:text-3xl font-bold text-slate-900 dark:text-white">Leadership &amp; Governance</h2>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-6">
                    <div class="bg-white dark:bg-slate-800/90 border border-slate-200/80 dark:border-slate-700/80 rounded-2xl p-5 flex items-center gap-4">
                        <span class="shrink-0 w-12 h-12 rounded-full bg-primary/10 text-primary font-semibold flex items-center justify-center">MS</span>
                        <div><p class="font-semibold text-slate-900 dark:text-white text-sm leading-tight">Rev. Mathew Saruma</p><p class="text-xs text-slate-500 dark:text-slate-400">Chairperson</p></div>
                    </div>
                    <div class="bg-white dark:bg-slate-800/90 border border-slate-200/80 dark:border-slate-700/80 rounded-2xl p-5 flex items-center gap-4">
                        <span class="shrink-0 w-12 h-12 rounded-full bg-primary/10 text-primary font-semibold flex items-center justify-center">GZ</span>
                        <div><p class="font-semibold text-slate-900 dark:text-white text-sm leading-tight">Mr. Gasper Zavu</p><p class="text-xs text-slate-500 dark:text-slate-400">Managing Director</p></div>
                    </div>
                    <div class="bg-white dark:bg-slate-800/90 border border-slate-200/80 dark:border-slate-700/80 rounded-2xl p-5 flex items-center gap-4">
                        <span class="shrink-0 w-12 h-12 rounded-full bg-primary/10 text-primary font-semibold flex items-center justify-center">VM</span>
                        <div><p class="font-semibold text-slate-900 dark:text-white text-sm leading-tight">Mr. Victor Mshana, CPA(T)</p><p class="text-xs text-slate-500 dark:text-slate-400">Treasurer</p></div>
                    </div>
                    <div class="bg-white dark:bg-slate-800/90 border border-slate-200/80 dark:border-slate-700/80 rounded-2xl p-5 flex items-center gap-4">
                        <span class="shrink-0 w-12 h-12 rounded-full bg-primary/10 text-primary font-semibold flex items-center justify-center">EM</span>
                        <div><p class="font-semibold text-slate-900 dark:text-white text-sm leading-tight">Mr. Emmanuel Mtowe</p><p class="text-xs text-slate-500 dark:text-slate-400">Director</p></div>
                    </div>
                    <div class="bg-white dark:bg-slate-800/90 border border-slate-200/80 dark:border-slate-700/80 rounded-2xl p-5 flex items-center gap-4">
                        <span class="shrink-0 w-12 h-12 rounded-full bg-primary/10 text-primary font-semibold flex items-center justify-center">AN</span>
                        <div><p class="font-semibold text-slate-900 dark:text-white text-sm leading-tight">Ms. Aikande Nkya</p><p class="text-xs text-slate-500 dark:text-slate-400">Director</p></div>
                    </div>
                    <div class="bg-white dark:bg-slate-800/90 border border-slate-200/80 dark:border-slate-700/80 rounded-2xl p-5 flex items-center gap-4">
                        <span class="shrink-0 w-12 h-12 rounded-full bg-primary/10 text-primary font-semibold flex items-center justify-center">FL</span>
                        <div><p class="font-semibold text-slate-900 dark:text-white text-sm leading-tight">Ms. Francisca Lengeju</p><p class="text-xs text-slate-500 dark:text-slate-400">Director</p></div>
                    </div>
                    <div class="bg-white dark:bg-slate-800/90 border border-slate-200/80 dark:border-slate-700/80 rounded-2xl p-5 flex items-center gap-4">
                        <span class="shrink-0 w-12 h-12 rounded-full bg-primary/10 text-primary font-semibold flex items-center justify-center">PN</span>
                        <div><p class="font-semibold text-slate-900 dark:text-white text-sm leading-tight">Dr. Paul Nandrie</p><p class="text-xs text-slate-500 dark:text-slate-400">Director</p></div>
                    </div>
                </div>

                <p class="text-xs font-semibold uppercase tracking-wide text-slate-400 dark:text-slate-500 mb-4">Honorary Members</p>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div class="bg-slate-50 dark:bg-slate-900/50 border border-slate-200/80 dark:border-slate-700/60 rounded-2xl p-5 flex items-center gap-4">
                        <span class="shrink-0 w-12 h-12 rounded-full bg-slate-200 dark:bg-slate-700 text-slate-500 dark:text-slate-300 font-semibold flex items-center justify-center">DS</span>
                        <p class="font-semibold text-slate-900 dark:text-white text-sm">Mr. Dominic Shoo</p>
                    </div>
                    <div class="bg-slate-50 dark:bg-slate-900/50 border border-slate-200/80 dark:border-slate-700/60 rounded-2xl p-5 flex items-center gap-4">
                        <span class="shrink-0 w-12 h-12 rounded-full bg-slate-200 dark:bg-slate-700 text-slate-500 dark:text-slate-300 font-semibold flex items-center justify-center">EC</span>
                        <p class="font-semibold text-slate-900 dark:text-white text-sm">Mr. Edson Chongolo</p>
                    </div>
                </div>
            </section>

            <!-- ============ ACCOUNTABILITY (year wheel) ============ -->
            <section id="accountability" class="tfl-anchor bg-white dark:bg-slate-800/90 border border-slate-200/80 dark:border-slate-700/80 rounded-2xl p-8 md:p-12">
                <div class="flex items-baseline gap-3 mb-6">
                    <h2 class="text-2xl md:text-3xl font-bold text-slate-900 dark:text-white">Accountability</h2>
                </div>
                <p class="text-slate-600 dark:text-slate-300 text-base md:text-lg leading-relaxed mb-10 max-w-3xl">
                    TFL is governed by an active Board of Directors that meets at least twice a year, with an Annual General Meeting open to our community each April. Our finances use dual signatories, quarterly internal audits, and QuickBooks-based tracking.
                </p>

                <div class="tfl-acc-grid pt-8 border-t border-slate-100 dark:border-slate-700/60">

                    <!-- Legend: hover, focus or tap an item to highlight it on the wheel -->
                    <div>
                        <p class="text-sm text-slate-500 dark:text-slate-400 mb-4">One year of oversight. Hover or tap a point to find it on the wheel.</p>
                        <ul class="tfl-acc-list">
                            <li>
                                <button type="button" class="tfl-acc-item" data-key="board">
                                    <span class="shrink-0 w-10 h-10 rounded-xl bg-primary/10 text-primary flex items-center justify-center">
                                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="5" width="18" height="16" rx="2"/><path d="M8 3v4M16 3v4M3 10h18"/></svg>
                                    </span>
                                    <span class="text-sm text-slate-600 dark:text-slate-300 leading-relaxed pt-2">Board meets at least twice a year</span>
                                </button>
                            </li>
                            <li>
                                <button type="button" class="tfl-acc-item" data-key="agm">
                                    <span class="shrink-0 w-10 h-10 rounded-xl bg-primary/10 text-primary flex items-center justify-center">
                                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="9" cy="8" r="3"/><path d="M2 20c0-3.3 3.1-6 7-6s7 2.7 7 6"/><path d="M17 8a3 3 0 1 0 0-6"/><path d="M22 20c0-2.5-1.9-4.6-4.5-5.5"/></svg>
                                    </span>
                                    <span class="text-sm text-slate-600 dark:text-slate-300 leading-relaxed pt-2">AGM open to our community every April</span>
                                </button>
                            </li>
                            <li>
                                <button type="button" class="tfl-acc-item" data-key="sign">
                                    <span class="shrink-0 w-10 h-10 rounded-xl bg-primary/10 text-primary flex items-center justify-center">
                                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 3v18M5 7l-3 6a3 3 0 0 0 6 0l-3-6ZM19 7l-3 6a3 3 0 0 0 6 0l-3-6ZM5 7h14M8 3h8"/></svg>
                                    </span>
                                    <span class="text-sm text-slate-600 dark:text-slate-300 leading-relaxed pt-2">Dual signatories on all finances</span>
                                </button>
                            </li>
                            <li>
                                <button type="button" class="tfl-acc-item" data-key="audit">
                                    <span class="shrink-0 w-10 h-10 rounded-xl bg-primary/10 text-primary flex items-center justify-center">
                                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="4" y="3" width="16" height="18" rx="2"/><path d="M9 3v2h6V3M9 12l2 2 4-4"/></svg>
                                    </span>
                                    <span class="text-sm text-slate-600 dark:text-slate-300 leading-relaxed pt-2">Quarterly internal audits, QuickBooks-tracked</span>
                                </button>
                            </li>
                        </ul>
                    </div>

                    <!-- Accountability year wheel -->
                    <div>
                    <div class="tfl-acc-wheel text-slate-900 dark:text-white" data-acc>
                        <svg viewBox="0 0 420 420" role="img" aria-label="Accountability year: Board of Directors at the centre, dual-signatory finances all year, internal audits every quarter, and the AGM in April.">

                            <!-- Dual signatories: all year (inner ring with two signature nodes) -->
                            <g class="tfl-acc-ring" data-ring="sign">
                                <defs>
                                    <linearGradient id="tfl-sign-grad" gradientUnits="userSpaceOnUse" x1="94" y1="94" x2="326" y2="326">
                                        <stop offset="0" stop-color="#ff6201"/>
                                        <stop offset="1" stop-color="#f46a00"/>
                                    </linearGradient>
                                </defs>
                                <circle cx="210" cy="210" r="116" fill="none" stroke="currentColor" stroke-width="18" opacity=".1"/>
                                <circle cx="210" cy="210" r="116" fill="none" stroke="url(#tfl-sign-grad)" stroke-width="18" stroke-linecap="round" transform="rotate(-90 210 210)"/>
                                <circle cx="210" cy="210" r="100" fill="none" stroke="currentColor" stroke-width="1.5" stroke-dasharray="1.5 7" stroke-linecap="round" opacity=".4"/>
                                <g class="tfl-acc-node">
                                    <circle cx="292.0" cy="292.0" r="13" fill="#070d10" stroke="#fff" stroke-width="3"/>
                                    <text x="292.0" y="292.0" text-anchor="middle" dominant-baseline="central" font-size="13" font-weight="800" fill="#fff">1</text>
                                </g>
                                <g class="tfl-acc-node">
                                    <circle cx="128.0" cy="128.0" r="13" fill="#070d10" stroke="#fff" stroke-width="3"/>
                                    <text x="128.0" y="128.0" text-anchor="middle" dominant-baseline="central" font-size="13" font-weight="800" fill="#fff">2</text>
                                </g>
                            </g>

                            <!-- Quarterly internal audits (middle ring) -->
                            <g class="tfl-acc-ring text-primary" data-ring="audit">
                            <path d="M218.16 54.21 A156 156 0 0 1 365.79 201.84" fill="none" stroke="currentColor" stroke-width="24"/>
                            <path d="M365.79 218.16 A156 156 0 0 1 218.16 365.79" fill="none" stroke="currentColor" stroke-width="24"/>
                            <path d="M201.84 365.79 A156 156 0 0 1 54.21 218.16" fill="none" stroke="currentColor" stroke-width="24"/>
                            <path d="M54.21 201.84 A156 156 0 0 1 201.84 54.21" fill="none" stroke="currentColor" stroke-width="24"/>
                            <text x="320.3" y="99.7" text-anchor="middle" dominant-baseline="central" font-size="13" font-weight="800" fill="#fff" stroke="rgba(15,23,42,.5)" stroke-width="3" stroke-linejoin="round" paint-order="stroke">Q1</text>
                            <text x="320.3" y="320.3" text-anchor="middle" dominant-baseline="central" font-size="13" font-weight="800" fill="#fff" stroke="rgba(15,23,42,.5)" stroke-width="3" stroke-linejoin="round" paint-order="stroke">Q2</text>
                            <text x="99.7" y="320.3" text-anchor="middle" dominant-baseline="central" font-size="13" font-weight="800" fill="#fff" stroke="rgba(15,23,42,.5)" stroke-width="3" stroke-linejoin="round" paint-order="stroke">Q3</text>
                            <text x="99.7" y="99.7" text-anchor="middle" dominant-baseline="central" font-size="13" font-weight="800" fill="#fff" stroke="rgba(15,23,42,.5)" stroke-width="3" stroke-linejoin="round" paint-order="stroke">Q4</text>
                            </g>

                            <!-- Months + AGM in April (outer ring) -->
                            <g class="tfl-acc-ring" data-ring="agm">
                            <text x="259.7" y="24.5" text-anchor="middle" dominant-baseline="central" font-size="13" fill="currentColor" opacity=".92" font-weight="600">Jan</text>
                            <text x="345.8" y="74.2" text-anchor="middle" dominant-baseline="central" font-size="13" fill="currentColor" opacity=".92" font-weight="600">Feb</text>
                            <text x="395.5" y="160.3" text-anchor="middle" dominant-baseline="central" font-size="13" fill="currentColor" opacity=".92" font-weight="600">Mar</text>
                            <text x="395.5" y="259.7" text-anchor="middle" dominant-baseline="central" font-size="14" font-weight="800" fill="#ea580c">Apr</text>
                            <text x="345.8" y="345.8" text-anchor="middle" dominant-baseline="central" font-size="13" fill="currentColor" opacity=".92" font-weight="600">May</text>
                            <text x="259.7" y="395.5" text-anchor="middle" dominant-baseline="central" font-size="13" fill="currentColor" opacity=".92" font-weight="600">Jun</text>
                            <text x="160.3" y="395.5" text-anchor="middle" dominant-baseline="central" font-size="13" fill="currentColor" opacity=".92" font-weight="600">Jul</text>
                            <text x="74.2" y="345.8" text-anchor="middle" dominant-baseline="central" font-size="13" fill="currentColor" opacity=".92" font-weight="600">Aug</text>
                            <text x="24.5" y="259.7" text-anchor="middle" dominant-baseline="central" font-size="13" fill="currentColor" opacity=".92" font-weight="600">Sep</text>
                            <text x="24.5" y="160.3" text-anchor="middle" dominant-baseline="central" font-size="13" fill="currentColor" opacity=".92" font-weight="600">Oct</text>
                            <text x="74.2" y="74.2" text-anchor="middle" dominant-baseline="central" font-size="13" fill="currentColor" opacity=".92" font-weight="600">Nov</text>
                            <text x="160.3" y="24.5" text-anchor="middle" dominant-baseline="central" font-size="13" fill="currentColor" opacity=".92" font-weight="600">Dec</text>
                                <circle cx="360.7" cy="250.4" r="16" fill="#ea580c" stroke="#fff" stroke-width="3"/>
                                <text x="360.7" y="250.4" text-anchor="middle" dominant-baseline="central" font-size="9.5" font-weight="800" fill="#fff">AGM</text>
                            </g>

                            <!-- "You are here" needle: positioned by JS from today's date -->
                            <g class="tfl-acc-needle" aria-hidden="true">
                                <line x1="336" y1="210" x2="384" y2="210" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                <circle cx="386" cy="210" r="6" fill="#fb923c" stroke="currentColor" stroke-width="2"/>
                            </g>

                            <!-- Board at the centre -->
                            <g class="tfl-acc-ring" data-ring="board">
                                <text x="210" y="190" text-anchor="middle" font-size="18" font-weight="700" fill="currentColor">Board of</text>
                                <text x="210" y="212" text-anchor="middle" font-size="18" font-weight="700" fill="currentColor">Directors</text>
                                <text x="210" y="236" text-anchor="middle" font-size="12" fill="currentColor" opacity=".9">meets at least</text>
                                <text x="210" y="251" text-anchor="middle" font-size="12" fill="currentColor" opacity=".9">twice a year</text>
                            </g>
                        </svg>
                    </div>
                    <p class="tfl-acc-now text-slate-500 dark:text-slate-400" data-now-text hidden><span class="tfl-acc-now-dot" aria-hidden="true"></span><span data-now-label></span></p>
                    </div>
                </div>

                <!-- Registration certificate -->
                <div class="tfl-cert text-slate-900 dark:text-white bg-slate-50 dark:bg-slate-900/50 border border-slate-200/80 dark:border-slate-700/60" data-cert>
                    <div class="tfl-cert-seal">
                        <svg viewBox="0 0 200 200" role="img" aria-label="TFL registration seal: registered NGO, Reg. No. 00NGO/0245, 2007">
                            <defs>
                                <linearGradient id="tfl-seal-grad" x1="0" y1="0" x2="1" y2="1">
                                    <stop offset="0" stop-color="#ea580c"/>
                                    <stop offset="1" stop-color="#9a3412"/>
                                </linearGradient>
                                <path id="tfl-seal-path" d="M100,100 m-58,0 a58,58 0 1,1 116,0 a58,58 0 1,1 -116,0"/>
                            </defs>
                            <polygon points="100.00,10.00 107.32,16.32 115.63,11.37 121.74,18.86 130.78,15.43 135.50,23.87 145.00,22.06 148.18,31.19 157.85,31.06 159.40,40.60 168.94,42.15 168.81,51.82 177.94,55.00 176.13,64.50 184.57,69.22 181.14,78.26 188.63,84.37 183.68,92.68 190.00,100.00 183.68,107.32 188.63,115.63 181.14,121.74 184.57,130.78 176.13,135.50 177.94,145.00 168.81,148.18 168.94,157.85 159.40,159.40 157.85,168.94 148.18,168.81 145.00,177.94 135.50,176.13 130.78,184.57 121.74,181.14 115.63,188.63 107.32,183.68 100.00,190.00 92.68,183.68 84.37,188.63 78.26,181.14 69.22,184.57 64.50,176.13 55.00,177.94 51.82,168.81 42.15,168.94 40.60,159.40 31.06,157.85 31.19,148.18 22.06,145.00 23.87,135.50 15.43,130.78 18.86,121.74 11.37,115.63 16.32,107.32 10.00,100.00 16.32,92.68 11.37,84.37 18.86,78.26 15.43,69.22 23.87,64.50 22.06,55.00 31.19,51.82 31.06,42.15 40.60,40.60 42.15,31.06 51.82,31.19 55.00,22.06 64.50,23.87 69.22,15.43 78.26,18.86 84.37,11.37 92.68,16.32" fill="url(#tfl-seal-grad)"/>
                            <circle cx="100" cy="100" r="74" fill="none" stroke="#fff" stroke-opacity=".55" stroke-width="1"/>
                            <circle cx="100" cy="100" r="45" fill="none" stroke="#fff" stroke-opacity=".55" stroke-width="1"/>
                            <text font-size="10.5" font-weight="800" fill="#fff" letter-spacing="1">
                                <textPath href="#tfl-seal-path" textLength="352" lengthAdjust="spacing">TRAINING FOR LIFE &#8226; REGISTERED NGO &#8226; MOSHI &#8226;</textPath>
                            </text>
                            <text x="100" y="84" text-anchor="middle" font-size="8.5" font-weight="700" fill="#fff" letter-spacing="1.5">REG. NO.</text>
                            <text x="100" y="101" text-anchor="middle" font-size="13" font-weight="800" fill="#fff">00NGO/0245</text>
                            <text x="100" y="125" text-anchor="middle" font-size="20" font-weight="800" fill="#fff">2007</text>
                        </svg>
                    </div>

                    <div>
                        <p class="text-sm font-semibold text-primary">Officially registered</p>
                        <p class="tfl-cert-no">Reg. No. 00NGO/0245</p>
                        <p class="text-slate-600 dark:text-slate-300 text-sm leading-relaxed mt-2">Registered in 2007. Based in Moshi, Kilimanjaro, Tanzania.</p>
                    </div>

                    <button type="button" class="tfl-cert-copy" data-copy="00NGO/0245">
                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="9" y="9" width="12" height="12" rx="2"/><path d="M5 15V5a2 2 0 0 1 2-2h10"/></svg>
                        <span data-copy-label aria-live="polite">Copy Reg. No.</span>
                    </button>
                </div>
            </section>

        </div>
    </main>

    <!-- Footer -->
    @include('partials.footer')


    <script>
        // Accountability wheel: hover, tap or focus a point in the legend to highlight it on the wheel
        (function () {
            var wheel = document.querySelector('[data-acc]');
            if (!wheel) return;
            var items = document.querySelectorAll('.tfl-acc-item');
            var nowText = document.querySelector('[data-now-text]');
            var nowLabel = document.querySelector('[data-now-label]');
            var pinned = '', hovered = '';

            function render() {
                var key = hovered || pinned;
                if (key) { wheel.setAttribute('data-focus', key); } else { wheel.removeAttribute('data-focus'); }
                items.forEach(function (el) {
                    el.classList.toggle('is-on', el.getAttribute('data-key') === pinned);
                });
            }

            items.forEach(function (el) {
                var key = el.getAttribute('data-key');
                el.addEventListener('mouseenter', function () { hovered = key; render(); });
                el.addEventListener('focus', function () { hovered = key; render(); });
                el.addEventListener('mouseleave', function () { hovered = ''; render(); });
                el.addEventListener('blur', function () { hovered = ''; render(); });
                el.addEventListener('click', function () {
                    pinned = (pinned === key) ? '' : key;
                    // Kwenye simu hakuna "mouseleave": futa hover ili kubonyeza tena kuzime
                    if (window.matchMedia && window.matchMedia('(hover: none)').matches) { hovered = ''; }
                    render();
                });
            });

            // "You are here": angle from today's date (each month is 30 degrees, January starts at the top)
            var now = new Date();
            var m = now.getMonth(), d = now.getDate();
            var dim = new Date(now.getFullYear(), m + 1, 0).getDate();
            var angle = -90 + 30 * (m + (d - 1) / dim);
            var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
            wheel.style.setProperty('--now', angle.toFixed(1) + 'deg');
            wheel.classList.add('has-now');
            if (nowText && nowLabel) {
                nowLabel.textContent = 'You are here: ' + d + ' ' + months[m] + ', Q' + (Math.floor(m / 3) + 1);
                nowText.removeAttribute('hidden');
            }
        })();
    </script>

    <script>
        // Registration certificate: stamp the seal in once, and copy the registration number
        (function () {
            var cert = document.querySelector('[data-cert]');
            if (!cert) return;

            var reduce = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
            if (!reduce && 'IntersectionObserver' in window) {
                cert.classList.add('is-ready');
                var io = new IntersectionObserver(function (entries) {
                    entries.forEach(function (e) {
                        if (e.isIntersecting) { cert.classList.add('is-in'); io.disconnect(); }
                    });
                }, { threshold: 0.4 });
                io.observe(cert);
            }

            var btn = cert.querySelector('[data-copy]');
            var label = cert.querySelector('[data-copy-label]');
            if (!btn || !label) return;
            var original = label.textContent;
            var timer;

            function done(ok) {
                label.textContent = ok ? 'Copied' : 'Press Ctrl+C to copy';
                clearTimeout(timer);
                timer = setTimeout(function () { label.textContent = original; }, 1800);
            }
            function fallback(text) {
                try {
                    var t = document.createElement('textarea');
                    t.value = text; t.setAttribute('readonly', '');
                    t.style.position = 'fixed'; t.style.opacity = '0';
                    document.body.appendChild(t); t.select();
                    var ok = document.execCommand('copy');
                    document.body.removeChild(t);
                    done(ok);
                } catch (err) { done(false); }
            }
            btn.addEventListener('click', function () {
                var text = btn.getAttribute('data-copy');
                if (navigator.clipboard && navigator.clipboard.writeText) {
                    navigator.clipboard.writeText(text).then(function () { done(true); }, function () { fallback(text); });
                } else { fallback(text); }
            });
        })();
    </script>

    <script>
        // Our Story: the trail draws with scroll, stops light up, numbers count up
        (function () {
            var trail = document.querySelector('[data-trail]');
            if (!trail) return;
            var svg = trail.querySelector('[data-trail-svg]');
            var base = trail.querySelector('[data-trail-base]');
            var line = trail.querySelector('[data-trail-line]');
            var stops = Array.prototype.slice.call(trail.querySelectorAll('[data-stop]'));
            var markers = stops.map(function (s) { return s.querySelector('.tfl-stop-marker'); });
            var reduce = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
            var pts = [], len = 0, reached = [], ticking = false;

            function clamp(v) { return Math.max(0, Math.min(1, v)); }

            function countUp(el) {
                var target = parseFloat(el.getAttribute('data-count'));
                var suffix = el.getAttribute('data-suffix') || '';
                if (reduce) { el.textContent = target + suffix; return; }
                var start = null, dur = 1400;
                function tick(t) {
                    if (start === null) start = t;
                    var p = clamp((t - start) / dur);
                    var eased = 1 - Math.pow(1 - p, 3);
                    el.textContent = Math.round(target * eased) + suffix;
                    if (p < 1) requestAnimationFrame(tick);
                }
                requestAnimationFrame(tick);
            }

            function reach(stop) {
                stop.classList.add('is-reached');
                Array.prototype.forEach.call(stop.querySelectorAll('[data-count]'), countUp);
            }

            function build() {
                var h = trail.offsetHeight;
                var top = trail.getBoundingClientRect().top;
                svg.setAttribute('viewBox', '0 0 64 ' + h);
                svg.style.height = h + 'px';
                pts = markers.map(function (m) {
                    var r = m.getBoundingClientRect();
                    return { x: 32, y: r.top - top + r.height / 2 };
                });
                if (!pts.length) return;

                var d = 'M' + pts[0].x + ' ' + pts[0].y;
                for (var i = 1; i < pts.length; i++) {
                    var a = pts[i - 1], b = pts[i], k = (b.y - a.y) * 0.4, cx = (i % 2 === 1) ? 4 : 60;
                    d += ' C' + cx + ' ' + (a.y + k) + ' ' + cx + ' ' + (b.y - k) + ' ' + b.x + ' ' + b.y;
                }
                base.setAttribute('d', d);
                line.setAttribute('d', d);
                len = line.getTotalLength();
                line.style.strokeDasharray = len;
                trail.classList.add('has-svg');

                update();
            }

            function update() {
                ticking = false;
                if (!pts.length) return;
                var top = trail.getBoundingClientRect().top;
                var yRead = window.innerHeight * 0.6 - top;
                var span = pts[pts.length - 1].y - pts[0].y;
                var prog = reduce ? 1 : clamp(span ? (yRead - pts[0].y) / span : 1);
                line.style.strokeDashoffset = len * (1 - prog);
                stops.forEach(function (s, i) {
                    if (!reached[i] && (reduce || yRead >= pts[i].y)) { reached[i] = true; reach(s); }
                });
            }

            function onScroll() {
                if (!ticking) { ticking = true; requestAnimationFrame(update); }
            }

            if (!reduce) {
                trail.classList.add('is-ready');
                Array.prototype.forEach.call(trail.querySelectorAll('[data-count]'), function (el) {
                    el.textContent = '0' + (el.getAttribute('data-suffix') || '');
                });
            }

            build();
            window.addEventListener('scroll', onScroll, { passive: true });
            window.addEventListener('resize', build);
            window.addEventListener('load', build);
            if (document.fonts && document.fonts.ready) { document.fonts.ready.then(build); }
        })();
    </script>

    <script>
        // Kiungo cha sehemu (#our-story, #accountability n.k.): nenda moja kwa moja sehemu hiyo,
        // na urudie mara moja baada ya ukurasa kumaliza kupakia ili nafasi isibadilike.
        (function () {
            function target() {
                var id = decodeURIComponent((location.hash || '').slice(1));
                return id ? document.getElementById(id) : null;
            }
            function go(behavior) {
                var el = target();
                if (!el) return;
                try { el.scrollIntoView({ behavior: behavior, block: 'start' }); }
                catch (err) { el.scrollIntoView(true); }
            }
            window.addEventListener('load', function () {
                if (!target()) return;
                go('instant');
                setTimeout(function () { go('instant'); }, 400);
            });
            window.addEventListener('hashchange', function () { go('smooth'); });
        })();
    </script>
</body>
</html>