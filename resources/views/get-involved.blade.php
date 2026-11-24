<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Get Involved - Training For Life (TFL)</title>
    <meta name="description" content="Support Training For Life and help young people in Tanzania build skills, livelihoods, and brighter futures.">

    <script>document.documentElement.classList.add('js');</script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .js .involved-reveal {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity .6s ease, transform .6s ease;
        }

        .js .involved-reveal.active {
            opacity: 1;
            transform: translateY(0);
        }

        .involved-card {
            transition: transform .3s ease, box-shadow .3s ease, border-color .3s ease;
        }

        .involved-card:hover {
            transform: translateY(-4px);
            border-color: rgba(247, 145, 32, .55);
            box-shadow: 0 18px 36px -18px rgba(15, 23, 42, .28);
        }

        .dark .involved-card:hover {
            box-shadow: 0 18px 36px -18px rgba(0, 0, 0, .65);
        }

        .involved-title-underline {
            position: relative;
            display: inline-block;
            padding-bottom: .35rem;
        }

        .involved-title-underline::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: -4px;
            width: 100%;
            height: 3px;
            border-radius: 9999px;
            background: linear-gradient(90deg, #f79120, #fb923c);
        }

        .involved-hero-title {
            background: linear-gradient(90deg, #ffffff, #fbbf24, #ffffff);
            background-size: 200% auto;
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            animation: involvedShimmer 7s linear infinite;
        }

        @keyframes involvedShimmer {
            to { background-position: 200% center; }
        }

        #involved-hero {
            background-attachment: fixed;
        }

        /* Sehemu zikifikiwa kutoka kwenye menyu ya header: zinasimama chini ya header */
        .tfl-anchor { scroll-margin-top: 7rem; }

        /* ---------- Spacing helpers (do not depend on the Tailwind build) ---------- */
        .involved-lead {
            margin-top: 1.75rem;
        }

        .involved-pad {
            padding: 1.75rem;
        }

        /* ---------- Sponsor cards ---------- */
        .involved-plan {
            position: relative;
            display: flex;
            flex-direction: column;
            height: 100%;
            padding: 2rem 1.75rem 1.75rem;
        }

        .involved-plan-label {
            margin: 0;
            font-size: .75rem;
            font-weight: 700;
            line-height: 1.4;
            letter-spacing: .14em;
            text-transform: uppercase;
        }

        .involved-plan-price {
            margin: 1rem 0 0;
            font-size: 2.25rem;
            font-weight: 800;
            line-height: 1.1;
            letter-spacing: -.02em;
        }

        .involved-plan-text {
            flex: 1 1 auto;
            margin: 1rem 0 0;
            font-size: .9375rem;
            line-height: 1.7;
        }

        .involved-plan-btn {
            margin-top: 1.75rem;
        }

        .involved-plan-badge {
            position: absolute;
            top: 0;
            left: 50%;
            transform: translate(-50%, -50%);
            white-space: nowrap;
        }

        @media (max-width: 767px) {
            #involved-hero {
                background-attachment: scroll;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            .involved-card,
            .involved-hero-title {
                animation: none !important;
                transition: none !important;
            }

            .js .involved-reveal {
                opacity: 1 !important;
                transform: none !important;
                transition: none !important;
            }

            #involved-hero {
                background-attachment: scroll;
            }
        }
    </style>
</head>

<body class="bg-white font-sans antialiased text-slate-800 transition-colors duration-300 dark:bg-slate-950 dark:text-slate-200">

    @include('partials.header')

    <main class="min-h-screen bg-slate-50 pt-24 text-slate-800 transition-colors duration-500 dark:bg-slate-950 dark:text-slate-200">

        {{-- ============ HERO ============ --}}
        @php
            $heroImage = asset('images/impact/getinvolved-hero.jpg');
        @endphp

        <section
            id="involved-hero"
            class="relative isolate flex min-h-[520px] items-center overflow-hidden bg-[#070049] bg-cover bg-center"
            style="background-image: linear-gradient(110deg, rgba(7, 0, 73, .92) 0%, rgba(7, 0, 73, .78) 55%, rgba(7, 0, 73, .62) 100%), url('{{ $heroImage }}');"
        >
            <div class="pointer-events-none absolute inset-0 z-0 bg-gradient-to-t from-[#070049]/60 via-transparent to-[#070049]/20"></div>

            <div class="relative z-10 mx-auto w-full max-w-7xl px-4 py-20 text-center sm:px-6 lg:px-8">
                <p class="mb-4 text-sm font-bold uppercase tracking-[0.2em] text-orange-200">
                    Support our mission
                </p>

                <h1 class="mx-auto max-w-4xl text-4xl font-extrabold leading-tight text-white sm:text-6xl">
                    Get Involved
                    <span class="involved-hero-title mt-2 block pb-1">
                        Shape the Future
                    </span>
                </h1>

                <div class="mt-8 flex flex-wrap justify-center gap-3">
                    <a href="#sponsor"
                       class="inline-flex items-center justify-center rounded-full bg-primary px-6 py-3 text-sm font-bold text-[#070049] shadow-lg transition hover:bg-orange-400 focus:outline-none focus-visible:ring-4 focus-visible:ring-orange-200">
                        Sponsor a young person
                    </a>
                    <a href="#donate"
                       class="inline-flex items-center justify-center rounded-full border border-white/70 bg-white/10 px-6 py-3 text-sm font-bold text-white transition hover:bg-white hover:text-[#070049] focus:outline-none focus-visible:ring-4 focus-visible:ring-white/50">
                        See ways to donate
                    </a>
                </div>
            </div>
        </section>

        <div class="mx-auto max-w-7xl px-4 pb-24 sm:px-6 lg:px-8">

            {{-- ============ PAGE NAVIGATION ============ --}}
            <nav aria-label="Get involved page sections"
                 class="relative z-10 -mt-6 mb-16 flex flex-wrap justify-center gap-2 rounded-2xl border border-slate-200 bg-white p-4 shadow-lg dark:border-slate-700 dark:bg-slate-900">
                <a href="#donate"
                   class="rounded-full border border-slate-300 bg-slate-50 px-5 py-2 text-sm font-semibold text-slate-800 transition hover:border-primary hover:bg-primary hover:text-[#070049] focus:outline-none focus-visible:ring-2 focus-visible:ring-primary dark:border-slate-700 dark:bg-slate-800 dark:text-slate-100">
                    Donate
                </a>
                <a href="#sponsor"
                   class="rounded-full border border-slate-300 bg-slate-50 px-5 py-2 text-sm font-semibold text-slate-800 transition hover:border-primary hover:bg-primary hover:text-[#070049] focus:outline-none focus-visible:ring-2 focus-visible:ring-primary dark:border-slate-700 dark:bg-slate-800 dark:text-slate-100">
                    Sponsor a Youth
                </a>
                <a href="#partner"
                   class="rounded-full border border-slate-300 bg-slate-50 px-5 py-2 text-sm font-semibold text-slate-800 transition hover:border-primary hover:bg-primary hover:text-[#070049] focus:outline-none focus-visible:ring-2 focus-visible:ring-primary dark:border-slate-700 dark:bg-slate-800 dark:text-slate-100">
                    Partner with TFL
                </a>
                <a href="#volunteer"
                   class="rounded-full border border-slate-300 bg-slate-50 px-5 py-2 text-sm font-semibold text-slate-800 transition hover:border-primary hover:bg-primary hover:text-[#070049] focus:outline-none focus-visible:ring-2 focus-visible:ring-primary dark:border-slate-700 dark:bg-slate-800 dark:text-slate-100">
                    Volunteer
                </a>
            </nav>

            {{-- ============ DONATE ============ --}}
            <section id="donate"
                     class="tfl-anchor involved-reveal mb-24 scroll-mt-32"
                     data-involved-reveal>
                <div class="mx-auto mb-10 max-w-3xl text-center">
                    <p class="mb-3 text-sm font-semibold uppercase tracking-[0.18em] text-orange-800 dark:text-primary">
                        Make a contribution
                    </p>

                    <h2 class="text-2xl font-bold text-slate-950 dark:text-white md:text-3xl">
                        <span class="involved-title-underline">Donate to TFL</span>
                    </h2>

                    <p class="involved-lead leading-relaxed text-slate-700 dark:text-slate-300">
                        Your contribution helps make training, education, and livelihood opportunities
                        available to young people. In 2025, 89% of donations went directly to programmes.
                    </p>
                </div>

                {{-- How donations help --}}
                <div class="mb-8 grid grid-cols-1 gap-4 sm:grid-cols-3">
                    
                </div>

                <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">

                    {{-- M-PESA --}}
                    <article class="involved-card involved-pad rounded-2xl border border-slate-200 bg-white shadow-sm dark:border-slate-700 dark:bg-slate-800">
                        <div class="flex items-center gap-4">
                            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-orange-100 text-xl font-extrabold text-orange-800 dark:bg-slate-700 dark:text-primary" aria-hidden="true">
                                M
                            </div>
                            <div>
                                <h3 class="text-lg font-bold text-slate-950 dark:text-white">Mobile Money</h3>
                                <p class="text-sm text-slate-600 dark:text-slate-300">M-Pesa in Tanzania</p>
                            </div>
                        </div>

                        <p class="mt-5 text-sm leading-relaxed text-slate-700 dark:text-slate-300">
                            Send your contribution using the M-Pesa number below. Please keep your
                            transaction reference so TFL can confirm receipt.
                        </p>

                        <div class="mt-5 flex flex-wrap items-center justify-between gap-3 rounded-xl bg-slate-50 p-4 dark:bg-slate-900"
                             x-data="{ copied: false }">
                            <div>
                                <span class="block text-xs font-semibold uppercase tracking-wide text-slate-600 dark:text-slate-300">
                                    M-Pesa number
                                </span>
                                <strong class="mt-1 block font-mono text-lg text-slate-950 dark:text-white">
                                    +255 765 082 693
                                </strong>
                            </div>
                            <button type="button"
                                    @click="navigator.clipboard.writeText('+255765082693'); copied = true; setTimeout(() => copied = false, 2000)"
                                    class="rounded-lg border border-slate-300 bg-white px-4 py-2 text-sm font-semibold text-slate-800 transition hover:border-primary hover:text-orange-800 focus:outline-none focus-visible:ring-2 focus-visible:ring-primary dark:border-slate-700 dark:bg-slate-800 dark:text-slate-100">
                                <span x-show="!copied">Copy number</span>
                                <span x-show="copied">Copied</span>
                            </button>
                        </div>

                        <p class="mt-4 text-xs text-slate-600 dark:text-slate-300">
                            Registered to <strong class="text-slate-800 dark:text-white">Training For Life (TFL)</strong>.
                        </p>
                    </article>

                    {{-- TANZANIA BANK ACCOUNTS --}}
                    <article class="involved-card involved-pad rounded-2xl border border-slate-200 bg-white shadow-sm dark:border-slate-700 dark:bg-slate-800">
                        <div class="flex items-center gap-4">
                            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-orange-100 text-xl font-extrabold text-orange-800 dark:bg-slate-700 dark:text-primary" aria-hidden="true">
                                T
                            </div>
                            <div>
                                <h3 class="text-lg font-bold text-slate-950 dark:text-white">Bank Transfer</h3>
                                <p class="text-sm text-slate-600 dark:text-slate-300">Tanzania TZS and USD accounts</p>
                            </div>
                        </div>

                        <div class="mt-5 rounded-xl bg-slate-50 p-5 dark:bg-slate-900">
                            <div class="flex flex-wrap items-start justify-between gap-3 border-b border-slate-200 pb-4 dark:border-slate-700">
                                <div>
                                    <h4 class="text-sm font-bold text-slate-950 dark:text-white">
                                        KCB BANK (TANZANIA) LTD
                                    </h4>
                                    <p class="mt-1 text-xs text-slate-600 dark:text-slate-300">
                                        Branch: Moshi (Boma Rd)
                                    </p>
                                </div>
                                <span class="rounded-md bg-orange-100 px-2.5 py-1 text-xs font-bold text-orange-900 dark:bg-slate-800 dark:text-primary">
                                    SWIFT: KCBLTZTZ
                                </span>
                            </div>

                            <div class="mt-4 space-y-3">
                                <div class="flex flex-wrap items-center justify-between gap-3 rounded-lg bg-white p-3 dark:bg-slate-800"
                                     x-data="{ copied: false }">
                                    <span class="text-sm text-slate-600 dark:text-slate-300">TZS Account</span>
                                    <div class="flex items-center gap-3">
                                        <strong class="font-mono text-slate-950 dark:text-white">3391669756</strong>
                                        <button type="button"
                                                @click="navigator.clipboard.writeText('3391669756'); copied = true; setTimeout(() => copied = false, 2000)"
                                                class="text-xs font-bold text-orange-800 hover:underline dark:text-primary">
                                            <span x-show="!copied">Copy</span>
                                            <span x-show="copied">Copied</span>
                                        </button>
                                    </div>
                                </div>

                                <div class="flex flex-wrap items-center justify-between gap-3 rounded-lg bg-white p-3 dark:bg-slate-800"
                                     x-data="{ copied: false }">
                                    <span class="text-sm text-slate-600 dark:text-slate-300">USD Account</span>
                                    <div class="flex items-center gap-3">
                                        <strong class="font-mono text-slate-950 dark:text-white">3391669764</strong>
                                        <button type="button"
                                                @click="navigator.clipboard.writeText('3391669764'); copied = true; setTimeout(() => copied = false, 2000)"
                                                class="text-xs font-bold text-orange-800 hover:underline dark:text-primary">
                                            <span x-show="!copied">Copy</span>
                                            <span x-show="copied">Copied</span>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <p class="mt-4 text-xs text-slate-600 dark:text-slate-300">
                                Account name: <strong class="text-slate-800 dark:text-white">TRAINING FOR LIFE (TFL)</strong>
                            </p>
                        </div>
                    </article>
                </div>


                {{-- DONATION STEPS AND CONFIRMATION --}}
                <div class="mt-6 rounded-2xl border border-slate-200 bg-white p-6 shadow-sm dark:border-slate-700 dark:bg-slate-900 sm:p-8">
                    <h3 class="text-lg font-bold text-slate-950 dark:text-white">
                        How to complete and confirm your donation
                    </h3>

                    <ol class="mt-5 grid grid-cols-1 gap-4 md:grid-cols-3">
                        <li class="flex gap-3">
                            <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-primary text-sm font-extrabold text-[#070049]">1</span>
                            <span class="text-sm leading-relaxed text-slate-700 dark:text-slate-300">
                                Choose M-Pesa, a TFL bank account, or the US giving option that suits you.
                            </span>
                        </li>
                        <li class="flex gap-3">
                            <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-primary text-sm font-extrabold text-[#070049]">2</span>
                            <span class="text-sm leading-relaxed text-slate-700 dark:text-slate-300">
                                Complete the transfer and save the transaction reference or payment receipt.
                            </span>
                        </li>
                        <li class="flex gap-3">
                            <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-primary text-sm font-extrabold text-[#070049]">3</span>
                            <span class="text-sm leading-relaxed text-slate-700 dark:text-slate-300">
                                Send TFL the date, amount, payment method, and reference to confirm receipt.
                            </span>
                        </li>
                    </ol>

                    <div class="mt-6 flex flex-col gap-4 rounded-xl border border-orange-200 bg-orange-50 p-5 sm:flex-row sm:items-center sm:justify-between dark:border-slate-700 dark:bg-slate-800">
                        <div>
                            <h4 class="font-bold text-slate-950 dark:text-white">Need help or want to confirm a donation?</h4>
                            <p class="mt-1 text-sm leading-relaxed text-slate-700 dark:text-slate-300">
                                Contact TFL and include your payment details so the team can assist.
                            </p>
                        </div>
                        <a href="{{ route('contact') }}"
                           class="inline-flex shrink-0 justify-center rounded-full bg-primary px-5 py-3 text-sm font-bold text-[#070049] transition hover:bg-orange-400 focus:outline-none focus-visible:ring-4 focus-visible:ring-orange-300/60">
                            Contact TFL
                        </a>
                    </div>
                </div>
            </section>

            {{-- ============ SPONSOR A YOUTH ============ --}}
            <section id="sponsor"
                     class="tfl-anchor involved-reveal mb-24 scroll-mt-32"
                     data-involved-reveal>
                <div class="mb-12 text-center">
                    <p class="mb-3 text-sm font-semibold uppercase tracking-[0.18em] text-orange-800 dark:text-primary">
                        Sponsor a youth
                    </p>

                    <h2 class="text-2xl font-bold text-slate-950 dark:text-white md:text-3xl">
                        <span class="involved-title-underline">Choose how you would like to help</span>
                    </h2>

                    <p class="involved-lead mx-auto max-w-2xl leading-relaxed text-slate-700 dark:text-slate-300">
                        You can contribute toward training materials, support one young person through
                        a programme cohort, or help a student return to secondary school.
                    </p>
                </div>

                <div class="grid grid-cols-1 items-stretch gap-8 md:grid-cols-3 md:gap-6">

                    {{-- 1. Support youth training --}}
                    <article class="involved-card involved-plan rounded-2xl border border-slate-200 bg-white shadow-sm dark:border-slate-700 dark:bg-slate-900">
                        <p class="involved-plan-label text-orange-800 dark:text-primary">
                            1. Support youth training
                        </p>

                        <p class="involved-plan-price text-slate-950 dark:text-white">
                            $100
                        </p>

                        <p class="involved-plan-text text-slate-700 dark:text-slate-300">
                            Provide essential training materials for Kijana Fursa Programme participants.
                        </p>

                        <a href="#donate"
                           class="involved-plan-btn inline-flex w-full items-center justify-center rounded-full bg-primary px-5 py-3 text-sm font-bold text-[#070049] transition hover:bg-orange-400 focus:outline-none focus-visible:ring-4 focus-visible:ring-orange-300/60">
                            Donate $100
                        </a>
                    </article>

                    {{-- 2. Empower a young person (featured) --}}
                    <article class="involved-card involved-plan rounded-2xl border-2 border-primary bg-white shadow-md dark:bg-slate-900">
                        <span class="involved-plan-badge rounded-full bg-primary px-4 py-1.5 text-xs font-bold text-[#070049] shadow">
                            Sponsor a youth
                        </span>

                        <p class="involved-plan-label text-orange-800 dark:text-primary">
                            2. Empower a young person
                        </p>

                        <p class="involved-plan-price text-slate-950 dark:text-white">
                            $1,000
                        </p>

                        <p class="involved-plan-text text-slate-700 dark:text-slate-300">
                            Support one young person through the entire Kijana Fursa Programme cohort.
                        </p>

                        <a href="#donate"
                           class="involved-plan-btn inline-flex w-full items-center justify-center rounded-full bg-primary px-5 py-3 text-sm font-bold text-[#070049] transition hover:bg-orange-400 focus:outline-none focus-visible:ring-4 focus-visible:ring-orange-300/60">
                            Sponsor a youth
                        </a>
                    </article>

                    {{-- 3. Return a student to school --}}
                    <article class="involved-card involved-plan rounded-2xl border border-slate-200 bg-white shadow-sm dark:border-slate-700 dark:bg-slate-900">
                        <p class="involved-plan-label text-orange-800 dark:text-primary">
                            3. Return a student to school
                        </p>

                        <p class="involved-plan-price text-slate-950 dark:text-white">
                            $1,500
                        </p>

                        <p class="involved-plan-text text-slate-700 dark:text-slate-300">
                            Help one school dropout return to secondary school and complete a year of education.
                        </p>

                        <a href="#donate"
                           class="involved-plan-btn inline-flex w-full items-center justify-center rounded-full bg-primary px-5 py-3 text-sm font-bold text-[#070049] transition hover:bg-orange-400 focus:outline-none focus-visible:ring-4 focus-visible:ring-orange-300/60">
                            Support a student
                        </a>
                    </article>
                </div>

                <p class="mx-auto mt-8 max-w-3xl text-center text-xs leading-relaxed text-slate-600 dark:text-slate-300">
                    To arrange a sponsorship, make a donation using one of the options above and contact TFL
                    with your preferred sponsorship option and payment reference.
                </p>
            </section>

            {{-- ============ PARTNER WITH TFL ============ --}}
            <section id="partner"
                     class="tfl-anchor involved-reveal mb-24 scroll-mt-32"
                     data-involved-reveal>
                <div class="mb-10 text-center">
                    <p class="mb-3 text-sm font-semibold uppercase tracking-[0.18em] text-orange-800 dark:text-primary">
                        An opportunity to partner
                    </p>

                    <h2 class="text-2xl font-bold text-slate-950 dark:text-white md:text-3xl">
                        <span class="involved-title-underline">Why partner with TFL?</span>
                    </h2>

                    <p class="involved-lead mx-auto max-w-3xl leading-relaxed text-slate-700 dark:text-slate-300">
                        TFL brings more than 30 years of youth development experience. Our work is
                        locally led, practical, integrated, youth-centred, and grounded in evidence.
                        We welcome partners who want to expand opportunities for young people.
                    </p>
                </div>

                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
                    <article class="involved-card rounded-2xl border border-slate-200 bg-white p-6 shadow-sm dark:border-slate-700 dark:bg-slate-900">
                        <span class="mb-4 inline-flex h-11 w-11 items-center justify-center rounded-xl bg-orange-100 font-extrabold text-orange-900 dark:bg-slate-800 dark:text-primary" aria-hidden="true">01</span>
                        <h3 class="font-bold text-slate-950 dark:text-white">Locally led</h3>
                        <p class="mt-2 text-sm leading-relaxed text-slate-700 dark:text-slate-300">
                            Rooted in local experience and community priorities.
                        </p>
                    </article>

                    <article class="involved-card rounded-2xl border border-slate-200 bg-white p-6 shadow-sm dark:border-slate-700 dark:bg-slate-900">
                        <span class="mb-4 inline-flex h-11 w-11 items-center justify-center rounded-xl bg-orange-100 font-extrabold text-orange-900 dark:bg-slate-800 dark:text-primary" aria-hidden="true">30+</span>
                        <h3 class="font-bold text-slate-950 dark:text-white">Years of experience</h3>
                        <p class="mt-2 text-sm leading-relaxed text-slate-700 dark:text-slate-300">
                            More than three decades of youth development work.
                        </p>
                    </article>

                    <article class="involved-card rounded-2xl border border-slate-200 bg-white p-6 shadow-sm dark:border-slate-700 dark:bg-slate-900">
                        <span class="mb-4 inline-flex h-11 w-11 items-center justify-center rounded-xl bg-orange-100 font-extrabold text-orange-900 dark:bg-slate-800 dark:text-primary" aria-hidden="true">02</span>
                        <h3 class="font-bold text-slate-950 dark:text-white">Practical</h3>
                        <p class="mt-2 text-sm leading-relaxed text-slate-700 dark:text-slate-300">
                            Builds usable skills and experience for life and work.
                        </p>
                    </article>

                    <article class="involved-card rounded-2xl border border-slate-200 bg-white p-6 shadow-sm dark:border-slate-700 dark:bg-slate-900">
                        <span class="mb-4 inline-flex h-11 w-11 items-center justify-center rounded-xl bg-orange-100 font-extrabold text-orange-900 dark:bg-slate-800 dark:text-primary" aria-hidden="true">03</span>
                        <h3 class="font-bold text-slate-950 dark:text-white">Integrated</h3>
                        <p class="mt-2 text-sm leading-relaxed text-slate-700 dark:text-slate-300">
                            Connects learning, skills, opportunity, and self-reliance.
                        </p>
                    </article>

                    <article class="involved-card rounded-2xl border border-slate-200 bg-white p-6 shadow-sm dark:border-slate-700 dark:bg-slate-900">
                        <span class="mb-4 inline-flex h-11 w-11 items-center justify-center rounded-xl bg-orange-100 font-extrabold text-orange-900 dark:bg-slate-800 dark:text-primary" aria-hidden="true">04</span>
                        <h3 class="font-bold text-slate-950 dark:text-white">Youth-centred</h3>
                        <p class="mt-2 text-sm leading-relaxed text-slate-700 dark:text-slate-300">
                            Puts young people’s needs, voices, and potential at the centre.
                        </p>
                    </article>

                    <article class="involved-card rounded-2xl border border-slate-200 bg-white p-6 shadow-sm dark:border-slate-700 dark:bg-slate-900">
                        <span class="mb-4 inline-flex h-11 w-11 items-center justify-center rounded-xl bg-orange-100 font-extrabold text-orange-900 dark:bg-slate-800 dark:text-primary" aria-hidden="true">05</span>
                        <h3 class="font-bold text-slate-950 dark:text-white">Evidence-informed</h3>
                        <p class="mt-2 text-sm leading-relaxed text-slate-700 dark:text-slate-300">
                            Uses learning and evidence to guide and strengthen programmes.
                        </p>
                    </article>
                </div>

                <div class="mt-8 grid grid-cols-1 gap-6 lg:grid-cols-5">
                    <article class="involved-card involved-pad rounded-2xl border border-slate-200 bg-white shadow-sm dark:border-slate-700 dark:bg-slate-900 lg:col-span-2">
                        <h3 class="text-xl font-bold text-slate-950 dark:text-white">
                            An opportunity to partner
                        </h3>

                        <p class="mt-4 text-sm leading-relaxed text-slate-700 dark:text-slate-300">
                            We are seeking partners interested in youth development, life skills,
                            education, employability, entrepreneurship, poverty reduction, sustainable
                            livelihoods, green skills, environmental responsibility, and youth innovation.
                        </p>

                        <a href="{{ route('contact') }}"
                           class="mt-6 inline-flex items-center gap-2 rounded-full bg-primary px-5 py-3 text-sm font-bold text-[#070049] transition hover:bg-orange-400 focus:outline-none focus-visible:ring-4 focus-visible:ring-orange-300/60">
                            Talk to us about partnering
                            <span aria-hidden="true">→</span>
                        </a>
                    </article>

                    <article class="involved-card involved-pad rounded-2xl border border-slate-200 bg-white shadow-sm dark:border-slate-700 dark:bg-slate-900 lg:col-span-3">
                        <h3 class="text-xl font-bold text-slate-950 dark:text-white">
                            Partnership can support
                        </h3>

                        <ul class="mt-5 grid grid-cols-1 gap-3 text-sm sm:grid-cols-2">
                            <li class="rounded-xl bg-slate-50 p-4 leading-relaxed text-slate-800 dark:bg-slate-800 dark:text-slate-200">Youth scholarships and transition programmes</li>
                            <li class="rounded-xl bg-slate-50 p-4 leading-relaxed text-slate-800 dark:bg-slate-800 dark:text-slate-200">Life-skills and employability training</li>
                            <li class="rounded-xl bg-slate-50 p-4 leading-relaxed text-slate-800 dark:bg-slate-800 dark:text-slate-200">Entrepreneurship and business incubation</li>
                            <li class="rounded-xl bg-slate-50 p-4 leading-relaxed text-slate-800 dark:bg-slate-800 dark:text-slate-200">Practical and digital skills</li>
                            <li class="rounded-xl bg-slate-50 p-4 leading-relaxed text-slate-800 dark:bg-slate-800 dark:text-slate-200">Green skills and environmental action</li>
                            <li class="rounded-xl bg-slate-50 p-4 leading-relaxed text-slate-800 dark:bg-slate-800 dark:text-slate-200">Youth innovation and community projects</li>
                            <li class="rounded-xl bg-slate-50 p-4 leading-relaxed text-slate-800 dark:bg-slate-800 dark:text-slate-200">Development of the TFL youth innovation campus</li>
                            <li class="rounded-xl bg-slate-50 p-4 leading-relaxed text-slate-800 dark:bg-slate-800 dark:text-slate-200">Organisational and programme strengthening</li>
                        </ul>
                    </article>
                </div>

                <div class="mt-8 rounded-2xl bg-[#070049] px-6 py-7 text-center text-white sm:px-10">
                    <p class="text-sm font-bold tracking-wide text-orange-300">
                        Education → Skills → Opportunity → Self-Reliance
                    </p>
                    <p class="mx-auto mt-3 max-w-2xl text-sm leading-relaxed text-slate-200">
                        Partner with TFL to help young people progress along this pathway.
                    </p>
                </div>
            </section>

            {{-- ============ VOLUNTEER ============ --}}
            <section id="volunteer"
                     class="tfl-anchor involved-reveal scroll-mt-32"
                     data-involved-reveal>
                <div class="rounded-2xl bg-[#070049] px-6 py-12 text-center text-white sm:px-10">
                    <p class="text-sm font-bold uppercase tracking-[0.18em] text-orange-300">
                        Give your time and skills
                    </p>

                    <h2 class="mt-3 text-2xl font-bold md:text-3xl">
                        Volunteer with TFL
                    </h2>

                    <p class="mx-auto mt-4 max-w-2xl text-sm leading-relaxed text-slate-200">
                        Contact our team to discuss volunteering, careers, or other ways you can
                        contribute to the work of Training For Life.
                    </p>

                    <a href="{{ route('contact') }}"
                       class="mt-6 inline-flex rounded-full bg-primary px-6 py-3 text-sm font-bold text-[#070049] transition hover:bg-orange-400 focus:outline-none focus-visible:ring-4 focus-visible:ring-white/50">
                        Contact TFL
                    </a>
                </div>
            </section>

        </div>
    </main>

    @include('partials.footer')

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const sections = document.querySelectorAll('[data-involved-reveal]');

            if (!('IntersectionObserver' in window)) {
                sections.forEach(section => section.classList.add('active'));
                return;
            }

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('active');
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.08, rootMargin: '0px 0px -30px 0px' });

            sections.forEach(section => observer.observe(section));
        });
    </script>

    <script>
        // Kiungo cha sehemu (#donate, #sponsor, #partner, #volunteer): nenda moja kwa moja sehemu hiyo,
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