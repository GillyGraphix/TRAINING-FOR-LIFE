<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Our Impact - Training For Life (TFL)</title>

    {{-- Animation start-states only apply when JS runs, so nothing is lost if JS fails --}}
    <script>document.documentElement.classList.add('js');</script>

    <!-- Google Fonts: Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Tailwind & Alpine (Vite) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /*
         * IMPACT PAGE: "the slant"
         * Photos, buttons, tags and section edges lean forward at one angle, like young people moving ahead.
         * Colours: orange accent on a light (white / soft grey) page, and a true dark mode.
         * Every colour comes from the variables below, so light and dark mode both switch fully.
         * Plain CSS (prefix "imp-"), no Tailwind rebuild needed.
         */
        :root {
            --or: #f79120;
            --or-2: #fb923c;
            --heading: #0f172a;
            --text: #334155;
            --muted: #475569;
            --surface: #ffffff;      /* white sections */
            --card: #ffffff;
            --line: rgba(15, 23, 42, .14);
            --track: rgba(15, 23, 42, .10);
            --ghost: rgba(15, 23, 42, .07);
            --on-or: #0f172a;        /* text placed on orange */
            --role: #c2650a;         /* small orange text on white, darker for contrast */
            --shadow: rgba(15, 23, 42, .35);
        }
        .dark {
            --heading: #ffffff;
            --text: #e2e8f0;
            --muted: #94a3b8;
            --surface: #111827;
            --card: #172036;
            --line: rgba(148, 163, 184, .25);
            --track: rgba(255, 255, 255, .12);
            --ghost: rgba(255, 255, 255, .10);
            --role: #f79120;
            --shadow: rgba(0, 0, 0, .8);
        }

        .imp-wrap { width: 100%; max-width: 80rem; margin: 0 auto; padding: 0 1.25rem; }
        @media (min-width: 640px) { .imp-wrap { padding: 0 2rem; } }

        main.imp-main { overflow-x: clip; color: var(--text); }

        /* ---------- Reveal on scroll ---------- */
        .js .imp-rv { transition: opacity .7s ease, transform .7s ease; }
        .js .imp-rv:not(.is-in) { opacity: 0; transform: translateY(16px); }

        /* ---------- Buttons (slanted) ---------- */
        .imp-actions { display: flex; flex-wrap: wrap; gap: .75rem; margin-top: 1.75rem; }
        .imp-btn {
            display: inline-block; padding: .8rem 1.7rem; font-size: .9rem; font-weight: 700; text-decoration: none;
            clip-path: polygon(8% 0, 100% 0, 92% 100%, 0 100%);
            transition: transform .2s ease, background-color .2s ease;
        }
        .imp-btn:hover { transform: translateX(3px); }
        .imp-btn:focus-visible { outline: 3px solid var(--or); outline-offset: 3px; }
        .imp-btn-or { background: var(--or); color: var(--on-or); }
        .imp-btn-or:hover { background: var(--or-2); }
        .imp-btn-ghost { background: var(--ghost); color: var(--heading); }
        .imp-btn-ghost:hover { background: var(--line); }

        /* ================= HERO ================= */
        .imp-hero { position: relative; padding: 8rem 0 4.5rem; }
        .imp-hero-glow {
            position: absolute; top: 2rem; left: 50%; width: 46rem; height: 46rem; max-width: 140vw; transform: translateX(-50%);
            border-radius: 9999px; background: rgba(247, 145, 32, .07); filter: blur(70px); pointer-events: none;
        }
        .imp-hero-grid { position: relative; display: grid; grid-template-columns: minmax(0, 1fr); gap: 2.5rem; align-items: center; }
        .imp-kicker { display: flex; align-items: center; gap: .7rem; margin: 0 0 1rem; font-size: .95rem; font-weight: 600; color: var(--role); }
        .imp-kicker::before { content: ""; width: 2rem; height: 5px; background: var(--or); transform: skewX(-30deg); }
        .imp-h1 { margin: 0; font-size: clamp(2rem, 5.2vw, 3.6rem); line-height: 1.1; font-weight: 800; letter-spacing: -.025em; color: var(--heading); }
        .imp-h1 span { display: block; color: var(--or); }
        .imp-lead { margin: 1.2rem 0 0; max-width: 33rem; font-size: 1rem; line-height: 1.75; color: var(--muted); }

        /* Sliced photo: one picture cut into three leaning strips */
        .imp-slices-wrap { position: relative; padding: 1.5rem 1.25rem 1.5rem; }
        .imp-slices { display: flex; gap: 10px; height: clamp(240px, 42vw, 440px); }
        .imp-slice {
            position: relative; flex: 1; overflow: hidden;
            background-color: #1e293b; background-image: var(--img); background-size: 300% 100%;
            box-shadow: 0 24px 40px -24px var(--shadow);
        }
        .imp-slice:nth-child(1) { background-position: 0% 50%;   transform: skewX(-9deg) translateY(1.6rem); }
        .imp-slice:nth-child(2) { background-position: 50% 50%;  transform: skewX(-9deg) translateY(-.8rem); border-bottom: 7px solid var(--or); }
        .imp-slice:nth-child(3) { background-position: 100% 50%; transform: skewX(-9deg) translateY(1.6rem); }
        .imp-slice::after { content: ""; position: absolute; inset: 0; background: linear-gradient(to top, rgba(15, 23, 42, .4), transparent 55%); }
        .imp-badge {
            position: absolute; left: 0; bottom: -.25rem; z-index: 3; padding: .8rem 2rem .8rem 1.2rem;
            background: var(--or); color: var(--on-or); clip-path: polygon(0 0, 100% 0, 92% 100%, 0 100%);
        }
        .imp-badge b { display: block; font-size: 1.5rem; line-height: 1; font-weight: 800; }
        .imp-badge span { display: block; margin-top: .2rem; font-size: .72rem; font-weight: 600; }
        @media (min-width: 1024px) {
            .imp-hero { padding: 9rem 0 5rem; }
            .imp-hero-grid { grid-template-columns: minmax(0, 6fr) minmax(0, 6fr); gap: 3.5rem; }
            .imp-slices-wrap { padding: 2rem 1.5rem 1.5rem; }
        }

        /* ================= MARQUEE BAND ================= */
        .imp-band-wrap { position: relative; z-index: 5; padding: 1.4rem 0; overflow: hidden; }
        .imp-band {
            width: 104%; margin-left: -2%; transform: rotate(-1.4deg); overflow: hidden;
            background: var(--or); color: var(--on-or); box-shadow: 0 16px 28px -18px var(--shadow);
        }
        .imp-band-track { display: flex; width: max-content; animation: impBand 48s linear infinite; }
        .imp-band-set { display: flex; flex: none; }
        .imp-band-item { display: flex; align-items: baseline; gap: .5rem; padding: .8rem 0 .8rem 1.8rem; white-space: nowrap; font-size: .85rem; font-weight: 600; }
        .imp-band-item b { font-size: 1.15rem; font-weight: 800; }
        .imp-band-item::after { content: "/"; margin-left: 1.8rem; font-size: 1.2rem; font-weight: 300; opacity: .5; }
        @keyframes impBand { to { transform: translateX(-50%); } }

        /* ================= SECTIONS ================= */
        .imp-sec { padding: 5rem 0; }

        /* White sections with a gently leaning top and bottom edge */
        .imp-surface {
            background: var(--surface);
            clip-path: polygon(0 36px, 100% 0, 100% calc(100% - 36px), 0 100%);
            padding: 6.5rem 0;
        }
        .imp-surface.is-last { clip-path: polygon(0 36px, 100% 0, 100% 100%, 0 100%); padding-bottom: 5.5rem; }

        .imp-sec-head { display: grid; grid-template-columns: minmax(0, 1fr); gap: 1rem; align-items: end; margin-bottom: 2.5rem; }
        .imp-h2 { margin: 0; font-size: clamp(1.6rem, 3.6vw, 2.4rem); line-height: 1.15; font-weight: 800; letter-spacing: -.02em; color: var(--heading); }
        .imp-h2::after { content: ""; display: block; width: 3.5rem; height: 5px; margin-top: .9rem; background: var(--or); transform: skewX(-30deg); }
        .imp-sec-intro { margin: 0; max-width: 30rem; font-size: 1rem; line-height: 1.75; color: var(--muted); }
        @media (min-width: 900px) {
            .imp-sec-head { grid-template-columns: minmax(0, 1fr) minmax(0, 1fr); gap: 3rem; margin-bottom: 3rem; }
            .imp-sec-intro { justify-self: end; }
        }

        /* ---------- Reach numbers ---------- */
        .imp-reach { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); }
        .imp-reach-item { position: relative; padding: 1.4rem 1rem 1.4rem 0; border-top: 1px solid var(--line); }
        .imp-num { margin: 0; font-size: clamp(2.1rem, 4.6vw, 3.3rem); line-height: 1; font-weight: 800; letter-spacing: -.03em; font-variant-numeric: tabular-nums; color: var(--heading); }
        .imp-num i { font-style: normal; color: var(--or); }
        .imp-reach-label { margin: .8rem 0 .3rem; font-size: .95rem; font-weight: 700; line-height: 1.35; color: var(--heading); }
        .imp-reach-text { margin: 0; font-size: .85rem; line-height: 1.65; color: var(--muted); }
        @media (min-width: 900px) {
            .imp-reach { grid-template-columns: repeat(4, minmax(0, 1fr)); }
            .imp-reach-item { padding: .5rem 1.5rem .5rem 2rem; border-top: 0; }
            .imp-reach-item:first-child { padding-left: 0; }
            .imp-reach-item + .imp-reach-item::before {
                content: ""; position: absolute; left: 0; top: 0; bottom: 0; width: 2px; background: var(--line); transform: skewX(-14deg);
            }
        }

        /* ---------- Photo ribbon ---------- */
        .imp-ribbon {
            position: relative; margin-top: 4rem; height: clamp(220px, 32vw, 380px); overflow: hidden;
            clip-path: polygon(0 12%, 100% 0, 100% 88%, 0 100%); background: #1e293b;
        }
        .imp-ribbon img { position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; }
        .imp-ribbon-shade { position: absolute; inset: 0; background: linear-gradient(95deg, rgba(15, 23, 42, .85), rgba(15, 23, 42, .3) 65%, rgba(15, 23, 42, .05)); }
        .imp-ribbon-text {
            position: absolute; left: clamp(1.25rem, 4vw, 3rem); bottom: 20%; max-width: 26rem; margin: 0; padding-left: 1rem;
            border-left: 5px solid var(--or); font-size: clamp(1.05rem, 2.2vw, 1.6rem); line-height: 1.35; font-weight: 700; color: #fff;
        }

        /* ---------- Outcomes (gauges) ---------- */
        .imp-sub-h { margin: 0; font-size: clamp(1.3rem, 2.6vw, 1.8rem); font-weight: 800; letter-spacing: -.015em; color: var(--heading); }
        .imp-sub-p { margin: .5rem 0 0; max-width: 32rem; font-size: .95rem; line-height: 1.7; color: var(--muted); }
        .imp-gauges { display: grid; grid-template-columns: minmax(0, 1fr); gap: 2.5rem; margin-top: 2.5rem; }
        .imp-gauge { position: relative; width: 100%; max-width: 12.5rem; }
        .imp-gauge svg { display: block; width: 100%; height: auto; }
        .imp-gauge-track, .imp-gauge-val { fill: none; stroke-width: 14; stroke-linecap: round; }
        .imp-gauge-track { stroke: var(--track); }
        .imp-gauge-val { stroke: var(--or); stroke-dasharray: 100; stroke-dashoffset: calc(100 - var(--p)); transition: stroke-dashoffset 1.6s cubic-bezier(.2, .7, .2, 1) .2s; }
        .js [data-reveal]:not(.is-in) .imp-gauge-val { stroke-dashoffset: 100; }
        .imp-gauge-num { position: absolute; left: 0; right: 0; bottom: 0; margin: 0; text-align: center; font-size: 2rem; line-height: 1; font-weight: 800; color: var(--heading); }
        .imp-gauge-num i { font-style: normal; color: var(--or); }
        .imp-gauge-label { margin: .9rem 0 .25rem; font-size: .95rem; font-weight: 700; line-height: 1.35; color: var(--heading); }
        .imp-gauge-text { margin: 0; max-width: 16rem; font-size: .85rem; line-height: 1.65; color: var(--muted); }
        @media (min-width: 900px) { .imp-gauges { grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 2.5rem; } }

        /* Green skills: 50 leaning tally bars, one per alumnus */
        .imp-green { display: grid; grid-template-columns: minmax(0, 1fr); gap: 1.5rem; align-items: center; margin-top: 3.5rem; padding-top: 2.5rem; border-top: 1px solid var(--line); }
        .imp-green-num { margin: 0; font-size: clamp(2.8rem, 6vw, 4.2rem); line-height: 1; font-weight: 800; letter-spacing: -.03em; color: var(--or); }
        .imp-green-label { margin: .5rem 0 .2rem; font-size: 1.05rem; font-weight: 700; color: var(--heading); }
        .imp-green-text { margin: 0; font-size: .9rem; line-height: 1.65; color: var(--muted); }
        .imp-tally { display: flex; flex-wrap: wrap; gap: 6px 5px; max-width: 30rem; }
        .imp-tally i {
            display: block; width: 6px; height: 30px; background: var(--or); transform: skewX(-16deg); transform-origin: bottom;
            transition: transform .45s ease, opacity .45s ease; transition-delay: calc(var(--i) * 22ms);
        }
        .js [data-reveal]:not(.is-in) .imp-tally i { transform: skewX(-16deg) scaleY(0); opacity: 0; }
        @media (min-width: 900px) { .imp-green { grid-template-columns: minmax(0, 5fr) minmax(0, 7fr); gap: 3rem; } }

        /* ---------- Story cards ---------- */
        .imp-stories { display: grid; grid-template-columns: minmax(0, 1fr); gap: 1.75rem; }
        .imp-card {
            display: flex; flex-direction: column; overflow: hidden; background: var(--card); border-radius: 6px;
            border: 1px solid var(--line); box-shadow: 0 24px 40px -30px var(--shadow);
            transition: transform .3s ease, box-shadow .3s ease, border-color .3s ease;
        }
        .imp-card:hover { transform: translateY(-5px); border-color: rgba(247, 145, 32, .6); box-shadow: 0 32px 48px -28px var(--shadow); }
        .imp-card-photo {
            position: relative; aspect-ratio: 4 / 3; overflow: hidden; background: linear-gradient(135deg, #334155, #0f172a);
            clip-path: polygon(0 0, 100% 0, 100% 87%, 0 100%);
        }
        .imp-card-photo img { position: relative; display: block; width: 100%; height: 100%; object-fit: cover; object-position: top; transition: transform .8s ease; }
        .imp-card:hover .imp-card-photo img { transform: scale(1.05); }
        .imp-card-initials { position: absolute; inset: 0; display: flex; align-items: center; justify-content: center; font-size: 3rem; font-weight: 800; color: rgba(247, 145, 32, .85); }
        .imp-card-tag {
            position: absolute; left: 0; top: 1rem; z-index: 2; padding: .4rem 1.5rem .4rem 1rem;
            background: var(--or); color: var(--on-or); font-size: .75rem; font-weight: 700;
            clip-path: polygon(0 0, 100% 0, 88% 100%, 0 100%);
        }
        .imp-card-body { display: flex; flex: 1; flex-direction: column; padding: .3rem 1.4rem 1.6rem; }
        .imp-card-role { margin: 0; font-size: .8rem; font-weight: 600; color: var(--role); }
        .imp-card-name { margin: .2rem 0 0; font-size: 1.2rem; font-weight: 800; letter-spacing: -.01em; color: var(--heading); }
        .imp-card-title { margin: .8rem 0 0; padding-left: .8rem; border-left: 4px solid var(--or); font-size: .95rem; font-weight: 700; line-height: 1.4; color: var(--heading); }
        .imp-card-text { margin: .9rem 0 0; font-size: .88rem; line-height: 1.75; color: var(--muted); }
        .imp-card-text + .imp-card-text { margin-top: .7rem; }
        @media (min-width: 720px) { .imp-stories { grid-template-columns: repeat(2, minmax(0, 1fr)); } }
        @media (min-width: 1100px) { .imp-stories { grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 2rem; } }

        /* ---------- The Challenge ---------- */
        .imp-ch-top { display: grid; grid-template-columns: minmax(0, 1fr); gap: 3rem; align-items: center; }
        .imp-ch-p { margin: 0 0 1rem; max-width: 38rem; font-size: 1rem; line-height: 1.8; color: var(--muted); }
        .imp-slant { position: relative; width: 100%; max-width: 22rem; margin: 0 auto; aspect-ratio: 4 / 5; }
        .imp-slant::before {
            content: ""; position: absolute; inset: 0; background: var(--or); transform: translate(-14px, 14px);
            clip-path: polygon(16% 0, 100% 0, 84% 100%, 0 100%);
        }
        .imp-slant-img { position: absolute; inset: 0; overflow: hidden; background: #1e293b; clip-path: polygon(16% 0, 100% 0, 84% 100%, 0 100%); }
        .imp-slant-img img { width: 100%; height: 100%; object-fit: cover; }
        .imp-slant-img::after { content: ""; position: absolute; inset: 0; background: linear-gradient(to top, rgba(15, 23, 42, .45), transparent 50%); }
        @media (min-width: 1000px) { .imp-ch-top { grid-template-columns: minmax(0, 7fr) minmax(0, 5fr); gap: 4.5rem; } }

        .imp-key {
            margin: 1.8rem 0 0; max-width: 38rem; padding-left: 1rem; border-left: 5px solid var(--or);
            font-size: clamp(1.05rem, 2vw, 1.35rem); line-height: 1.5; font-weight: 700; color: var(--heading);
        }

        /* Three compact figure cards: moderate number, small bar, short text */
        .imp-figs { display: grid; grid-template-columns: minmax(0, 1fr); gap: 1rem; margin-top: 3.5rem; }
        .imp-fig { position: relative; padding: 1.25rem 1.4rem 1.4rem 1.7rem; overflow: hidden; background: var(--card); border: 1px solid var(--line); border-radius: 6px; }
        .imp-fig::before { content: ""; position: absolute; left: 0; top: 0; bottom: 0; width: 5px; background: var(--or); }
        .imp-fig-num { margin: 0; font-size: clamp(1.7rem, 3vw, 2.2rem); line-height: 1; font-weight: 800; letter-spacing: -.02em; font-variant-numeric: tabular-nums; color: var(--heading); }
        .imp-fig-num i { font-style: normal; color: var(--or); }
        .imp-fig-num small { margin-right: .4rem; font-size: .8rem; font-weight: 600; letter-spacing: 0; color: var(--muted); }
        .imp-fig-bar { height: 6px; margin-top: .9rem; overflow: hidden; border-radius: 9999px; background: var(--track); }
        .imp-fig-bar span { display: block; height: 100%; width: var(--w); border-radius: 9999px; background: var(--or); transition: width 1.3s cubic-bezier(.2, .7, .2, 1) .2s; }
        .js [data-reveal]:not(.is-in) .imp-fig-bar span { width: 0; }
        .imp-fig-text { margin: .85rem 0 0; font-size: .9rem; line-height: 1.6; color: var(--text); }
        @media (min-width: 800px) { .imp-figs { grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 1.25rem; } }

        .imp-needs-title { margin: 4rem 0 1.5rem; font-size: clamp(1.3rem, 2.6vw, 1.8rem); font-weight: 800; letter-spacing: -.015em; color: var(--heading); }
        .imp-needs { display: grid; grid-template-columns: minmax(0, 1fr); gap: 1rem; margin: 0; padding: 0; list-style: none; }
        .imp-need { position: relative; display: flex; align-items: center; gap: 1rem; padding: 1.15rem 1.4rem; background: var(--card); border: 1px solid var(--line); border-left: 0; clip-path: polygon(0 0, 100% 0, 97% 100%, 0 100%); }
        .imp-need::before { content: ""; position: absolute; left: 0; top: 0; bottom: 0; width: 5px; background: var(--or); }
        .imp-need svg { flex: none; width: 1.5rem; height: 1.5rem; color: var(--or); }
        .imp-need p { margin: 0; font-size: .95rem; font-weight: 600; line-height: 1.5; color: var(--heading); }
        @media (min-width: 800px) { .imp-needs { grid-template-columns: repeat(3, minmax(0, 1fr)); } }

        /* ---------- Reduced motion ---------- */
        @media (prefers-reduced-motion: reduce) {
            .imp-band-track { animation: none; width: auto; flex-wrap: wrap; justify-content: center; }
            .imp-band-set + .imp-band-set { display: none; }
            .js .imp-rv, .imp-card, .imp-card-photo img, .imp-btn, .imp-gauge-val, .imp-tally i, .imp-fig-bar span { transition: none; }
        }
    </style>
</head>
<body class="font-sans antialiased bg-[#F4F6F9] text-slate-800 dark:bg-[#0B0F19] dark:text-slate-100 transition-colors duration-300">

    <!-- Header Navigation -->
    @include('partials.header')

    @php
        // Photos. If a specific photo is missing we fall back to the hero photo, so nothing looks empty.
        $heroImage      = asset('images/impact/impact-hero.jpg');
        $ribbonImage    = file_exists(public_path('images/impact/glance/community.jpg'))
                            ? asset('images/impact/glance/community.jpg') : $heroImage;
        $challengeImage = file_exists(public_path('images/impact/challenge/challenge-main.jpg'))
                            ? asset('images/impact/challenge/challenge-main.jpg') : $heroImage;

        // TFL at a glance: reach
        $reach = [
            ['value' => 30,  'suffix' => '+', 'label' => 'Years of experience',
             'detail' => 'Continuous youth development work since 1996.'],
            ['value' => 900, 'suffix' => '+', 'label' => 'Alumni and youth community',
             'detail' => 'TFL alumni and young people in our wider community.'],
            ['value' => 64,  'suffix' => '',  'label' => 'Young people reached in 2026',
             'detail' => 'Through TFL’s flagship programmes.'],
            ['value' => 17,  'suffix' => '',  'label' => 'Students supported to return',
             'detail' => 'Secondary school dropouts supported through Soma na Matumaini.'],
        ];

        // TFL at a glance: outcomes of tracked alumni (gauges)
        $outcomes = [
            ['value' => 60, 'label' => 'In employment or self-employment',
             'detail' => 'Share of tracked alumni in work or self-employment.'],
            ['value' => 30, 'label' => 'Started their own businesses',
             'detail' => 'Share of tracked alumni who have started businesses.'],
            ['value' => 30, 'label' => 'Giving back as mentors',
             'detail' => 'Tracked alumni who returned as mentors or board members.'],
        ];

        // Orange band (short versions of the headline numbers)
        $band = [
            ['30+', 'years of experience'],
            ['900+', 'alumni and youth community'],
            ['64', 'young people reached in 2026'],
            ['17', 'students back in school'],
            ['60%', 'of tracked alumni at work'],
            ['30%', 'started a business'],
            ['30%', 'give back as mentors'],
            ['50', 'trained in green skills'],
        ];

        // The Challenge: figures from the research
        $figs = [
            ['value' => 65, 'prefix' => 'Over', 'text' => 'of employers report difficulty finding suitably skilled workers.'],
            ['value' => 66, 'prefix' => '',     'text' => 'of young Tanzanians aged 18–35 would like to start their own business.'],
            ['value' => 28, 'prefix' => '',     'text' => 'identify a lack of entrepreneurial skills or motivation as a barrier to employment.'],
        ];
    @endphp

    <main class="imp-main">

        <!-- ============ HERO ============ -->
        <section class="imp-hero">
            <div class="imp-hero-glow" aria-hidden="true"></div>

            <div class="imp-wrap imp-hero-grid">

                <div>
                    <p class="imp-kicker">Our Impact</p>

                    <h1 class="imp-h1">
                        Young people.
                        <span>Stronger communities.</span>
                    </h1>

                    <p class="imp-lead">
                        Since 1996, TFL has helped young people build practical skills, confidence,
                        livelihoods, and opportunities to contribute to their communities.
                    </p>

                    <div class="imp-actions">
                        <a class="imp-btn imp-btn-or" href="#results">See our results</a>
                        <a class="imp-btn imp-btn-ghost" href="#stories">Read impact stories</a>
                    </div>
                </div>

                <div class="imp-slices-wrap">
                    <div class="imp-slices" role="img" aria-label="Young people building skills with Training For Life"
                         style="--img: url('{{ $heroImage }}')">
                        <div class="imp-slice"></div>
                        <div class="imp-slice"></div>
                        <div class="imp-slice"></div>
                    </div>
                    <div class="imp-badge">
                        <b>1996</b>
                        <span>Making a difference since</span>
                    </div>
                </div>

            </div>
        </section>

        <!-- ============ NUMBERS BAND ============ -->
        <div class="imp-band-wrap" aria-label="TFL numbers">
            <div class="imp-band">
                <div class="imp-band-track">
                    @foreach ([false, true] as $copy)
                        <div class="imp-band-set" @if ($copy) aria-hidden="true" @endif>
                            @foreach ($band as [$n, $t])
                                <span class="imp-band-item"><b>{{ $n }}</b>{{ $t }}</span>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- ============ RESULTS: TFL AT A GLANCE ============ -->
        <section id="results" class="imp-sec" style="scroll-margin-top: 6rem; padding-bottom: 4rem;">
            <div class="imp-wrap">

                <div class="imp-sec-head imp-rv" data-reveal>
                    <h2 class="imp-h2">TFL at a glance</h2>
                    <p class="imp-sec-intro">
                        Our experience, reach, and outcomes show how young people are building
                        skills and creating new opportunities.
                    </p>
                </div>

                <div class="imp-reach imp-rv" data-reveal>
                    @foreach ($reach as $item)
                        <div class="imp-reach-item">
                            <p class="imp-num"><span data-count="{{ $item['value'] }}">{{ $item['value'] }}</span><i>{{ $item['suffix'] }}</i></p>
                            <h3 class="imp-reach-label">{{ $item['label'] }}</h3>
                            <p class="imp-reach-text">{{ $item['detail'] }}</p>
                        </div>
                    @endforeach
                </div>

                <div class="imp-ribbon imp-rv" data-reveal>
                    <img src="{{ $ribbonImage }}" alt="Young people learning together at TFL" loading="lazy">
                    <div class="imp-ribbon-shade"></div>
                    <p class="imp-ribbon-text">Skills, confidence, and livelihoods built side by side.</p>
                </div>
            </div>
        </section>

        <!-- Outcomes (white section) -->
        <section class="imp-surface">
            <div class="imp-wrap">
                <div class="imp-rv" data-reveal>
                    <h3 class="imp-sub-h">Where our alumni are today</h3>
                    <p class="imp-sub-p">Outcomes among the alumni we track.</p>
                </div>

                <div class="imp-gauges imp-rv" data-reveal>
                    @foreach ($outcomes as $o)
                        <div>
                            <div class="imp-gauge" role="img" aria-label="{{ $o['value'] }} percent: {{ $o['label'] }}">
                                <svg viewBox="0 0 200 108" aria-hidden="true">
                                    <path class="imp-gauge-track" pathLength="100" d="M12 100 A88 88 0 0 1 188 100"/>
                                    <path class="imp-gauge-val" pathLength="100" style="--p: {{ $o['value'] }}" d="M12 100 A88 88 0 0 1 188 100"/>
                                </svg>
                                <p class="imp-gauge-num"><span data-count="{{ $o['value'] }}">{{ $o['value'] }}</span><i>%</i></p>
                            </div>
                            <h4 class="imp-gauge-label">{{ $o['label'] }}</h4>
                            <p class="imp-gauge-text">{{ $o['detail'] }}</p>
                        </div>
                    @endforeach
                </div>

                <div class="imp-green imp-rv" data-reveal>
                    <div>
                        <p class="imp-green-num"><span data-count="50">50</span></p>
                        <p class="imp-green-label">Alumni trained in green skills</p>
                        <p class="imp-green-text">Alumni building knowledge for sustainable livelihoods.</p>
                    </div>
                    <div class="imp-tally" aria-hidden="true">
                        @for ($i = 0; $i < 50; $i++)
                            <i style="--i: {{ $i }}"></i>
                        @endfor
                    </div>
                </div>
            </div>
        </section>

        <!-- ============ IMPACT STORIES ============ -->
        <section id="stories" class="imp-sec" style="scroll-margin-top: 6rem;">
            <div class="imp-wrap">

                <div class="imp-sec-head imp-rv" data-reveal>
                    <h2 class="imp-h2">Impact Stories</h2>
                    <p class="imp-sec-intro">
                        The value of the work is seen in the confidence, skills, and choices
                        young people build for themselves.
                    </p>
                </div>

                <div class="imp-stories">

                    {{-- Ariel David Swai --}}
                    <article class="imp-card imp-rv" data-reveal>
                        <div class="imp-card-photo">
                            <span class="imp-card-initials" aria-hidden="true">AS</span>
                            <img src="{{ asset('images/impact/stories/ariel-david-swai.jpg') }}" alt="Ariel David Swai" loading="lazy" onerror="this.remove()">
                            <span class="imp-card-tag">TFL participant</span>
                        </div>
                        <div class="imp-card-body">
                            <p class="imp-card-role">TFL participant, 2024</p>
                            <h3 class="imp-card-name">Ariel David Swai</h3>
                            <h4 class="imp-card-title">Learning skills for personal growth</h4>
                            <p class="imp-card-text">
                                During my time at Training For Life in 2024, I acquired valuable
                                skills and knowledge that greatly impacted my personal growth.
                                I learned critical thinking, creativity, collaboration, commitment,
                                and how to create new opportunities.
                            </p>
                            <p class="imp-card-text">
                                I learned to analyse and evaluate information, explore different
                                perspectives, and collaborate effectively with diverse teams.
                                The experience equipped me to navigate personal and professional
                                challenges.
                            </p>
                        </div>
                    </article>

                    {{-- Genevieve Noel Kimaro --}}
                    <article class="imp-card imp-rv" data-reveal>
                        <div class="imp-card-photo">
                            <span class="imp-card-initials" aria-hidden="true">GK</span>
                            <img src="{{ asset('images/impact/stories/genevieve-noel-kimaro.jpg') }}" alt="Genevieve Noel Kimaro" loading="lazy" onerror="this.remove()">
                            <span class="imp-card-tag">TFL participant</span>
                        </div>
                        <div class="imp-card-body">
                            <p class="imp-card-role">TFL participant</p>
                            <h3 class="imp-card-name">Genevieve Noel Kimaro</h3>
                            <h4 class="imp-card-title">Finding direction and purpose</h4>
                            <p class="imp-card-text">
                                The TFL course helped me understand my career and set a clearer
                                direction for my future. It expanded my knowledge and gave me
                                opportunities to practise what I learned in real-life situations.
                            </p>
                            <p class="imp-card-text">
                                I also learned to become a responsible community member, practise
                                critical thinking, and value time in my daily activities.
                            </p>
                        </div>
                    </article>

                    {{-- Ester --}}
                    <article class="imp-card imp-rv" data-reveal>
                        <div class="imp-card-photo">
                            <span class="imp-card-initials" aria-hidden="true">E</span>
                            <img src="{{ asset('images/impact/stories/ester.jpg') }}" alt="Ester, TFL alumna" loading="lazy" onerror="this.remove()">
                            <span class="imp-card-tag">TFL alumna</span>
                        </div>
                        <div class="imp-card-body">
                            <p class="imp-card-role">TFL alumna</p>
                            <h3 class="imp-card-name">Ester</h3>
                            <h4 class="imp-card-title">Building resilience</h4>
                            <p class="imp-card-text">
                                TFL taught me resilience and gave me the courage to do things I
                                never thought I could do. I hiked Mount Meru, woke up early, ran,
                                and accomplished a lot.
                            </p>
                        </div>
                    </article>

                </div>
            </div>
        </section>

        <!-- ============ THE CHALLENGE (white section) ============ -->
        <section id="challenge" class="imp-surface is-last" style="scroll-margin-top: 4rem;">
            <div class="imp-wrap">

                <div class="imp-ch-top">
                    <div class="imp-rv" data-reveal>
                        <div class="imp-sec-head" style="margin-bottom: 1.75rem; grid-template-columns: minmax(0, 1fr);">
                            <h2 class="imp-h2">The Challenge</h2>
                        </div>

                        <p class="imp-ch-p">
                            Tanzania’s young population is a major opportunity, yet over 65% of
                            employers report difficulty finding suitably skilled workers. At the
                            same time, 66% of young Tanzanians aged 18–35 would like to start
                            their own business, while 28% identify a lack of entrepreneurial
                            skills or motivation as a barrier to employment.
                        </p>

                        <p class="imp-ch-p">
                            Research from the University of Dodoma shows that soft skills are
                            important links between training and employability. As climate and
                            environmental pressures affect livelihoods, young people also need
                            green skills to build sustainable livelihoods and use resources
                            responsibly.
                        </p>

                        <p class="imp-key">
                            The challenge is turning learning and ambition into practical skills,
                            experience, livelihoods, and responsible action.
                        </p>
                    </div>

                    <div class="imp-slant imp-rv" data-reveal>
                        <div class="imp-slant-img">
                            <img src="{{ $challengeImage }}" alt="Young Tanzanians learning practical skills" loading="lazy">
                        </div>
                    </div>
                </div>

                <div class="imp-figs">
                    @foreach ($figs as $f)
                        <div class="imp-fig imp-rv" data-reveal>
                            <p class="imp-fig-num">
                                @if ($f['prefix'])<small>{{ $f['prefix'] }}</small>@endif<span data-count="{{ $f['value'] }}">{{ $f['value'] }}</span><i>%</i>
                            </p>
                            <div class="imp-fig-bar" aria-hidden="true"><span style="--w: {{ $f['value'] }}%"></span></div>
                            <p class="imp-fig-text">{{ ucfirst($f['text']) }}</p>
                        </div>
                    @endforeach
                </div>

                <h3 class="imp-needs-title imp-rv" data-reveal>What young people need</h3>

                <ul class="imp-needs imp-rv" data-reveal>
                    <li class="imp-need">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="7" width="18" height="13" rx="2"/><path d="M9 7V5a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v2M3 13h18"/></svg>
                        <p>Practical experience and relevant skills</p>
                    </li>
                    <li class="imp-need">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M9 18h6M10 21h4M12 3a6 6 0 0 0-3.5 10.9c.6.5 1 1.2 1 2.1h5c0-.9.4-1.6 1-2.1A6 6 0 0 0 12 3Z"/></svg>
                        <p>Support to turn ideas into livelihoods</p>
                    </li>
                    <li class="imp-need">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M11 20A7 7 0 0 1 4 13c0-4 3-7 8-9 5 2 8 5 8 9a7 7 0 0 1-7 7"/><path d="M11 20v-6"/></svg>
                        <p>Green skills and responsible action</p>
                    </li>
                </ul>

            </div>
        </section>

    </main>

    <!-- Footer -->
    @include('partials.footer')

    <script>
        // Impact page: reveal blocks when scrolled into view, count numbers up.
        // Everything with data-reveal gets "is-in" once visible; gauges, tally bars and the
        // outlined numbers react to it in CSS. Final numbers are always in the HTML.
        (function () {
            var targets = document.querySelectorAll('[data-reveal]');
            if (!targets.length) return;

            var reduce = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

            function countUp(el) {
                var to = parseFloat(el.getAttribute('data-count'));
                if (isNaN(to) || el.getAttribute('data-done')) return;
                el.setAttribute('data-done', '1');
                if (reduce) return;

                var start = null, duration = 1500;
                function tick(t) {
                    if (start === null) start = t;
                    var p = Math.min((t - start) / duration, 1);
                    el.textContent = Math.round(to * (1 - Math.pow(1 - p, 3)));
                    if (p < 1) requestAnimationFrame(tick);
                }
                el.textContent = '0';
                requestAnimationFrame(tick);
            }

            function show(el) {
                el.classList.add('is-in');
                Array.prototype.forEach.call(el.querySelectorAll('[data-count]'), countUp);
            }

            if (reduce || !('IntersectionObserver' in window)) {
                Array.prototype.forEach.call(targets, function (el) { el.classList.add('is-in'); });
                return;
            }

            var io = new IntersectionObserver(function (entries) {
                entries.forEach(function (entry) {
                    if (entry.isIntersecting) {
                        show(entry.target);
                        io.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.15, rootMargin: '0px 0px -40px 0px' });

            Array.prototype.forEach.call(targets, function (el) { io.observe(el); });
        })();
    </script>
</body>
</html>