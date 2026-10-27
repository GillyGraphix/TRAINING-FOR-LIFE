<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Our Impact - Training For Life (TFL)</title>

    {{-- Hide reveal-elements only when JS is running, so content is never lost if JS fails --}}
    <script>document.documentElement.classList.add('js');</script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* ---------- Reveal on scroll (only when JS is available) ---------- */
        .js .impact-reveal {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity .6s ease, transform .6s ease;
        }

        .js .impact-reveal.active {
            opacity: 1;
            transform: translateY(0);
        }

        @keyframes impactFadeInUp {
            from { opacity: 0; transform: translateY(18px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .js .impact-reveal-stagger > * { opacity: 0; }

        .js .impact-reveal-stagger.active > * {
            animation: impactFadeInUp .5s ease both;
        }

        .impact-reveal-stagger.active > *:nth-child(1) { animation-delay: .04s; }
        .impact-reveal-stagger.active > *:nth-child(2) { animation-delay: .10s; }
        .impact-reveal-stagger.active > *:nth-child(3) { animation-delay: .16s; }
        .impact-reveal-stagger.active > *:nth-child(4) { animation-delay: .22s; }
        .impact-reveal-stagger.active > *:nth-child(5) { animation-delay: .28s; }
        .impact-reveal-stagger.active > *:nth-child(6) { animation-delay: .34s; }
        .impact-reveal-stagger.active > *:nth-child(7) { animation-delay: .40s; }
        .impact-reveal-stagger.active > *:nth-child(8) { animation-delay: .46s; }

        /* ---------- Hero headline shimmer ---------- */
        .impact-gradient-text {
            background: linear-gradient(90deg, #ffffff, #f79120, #ffffff);
            background-size: 200% auto;
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            animation: impactShimmer 7s linear infinite;
        }

        @keyframes impactShimmer {
            to { background-position: 200% center; }
        }

        /* ---------- Hero image stays fixed while the page content scrolls ---------- */
        #impact-hero {
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        /*
         * Keep the background fixed on mobile too.
         * The hero text and all following sections remain in normal page flow.
         */
        @media (max-width: 767px) {
            #impact-hero {
                background-attachment: fixed;
            }
        }

        /* ---------- Cards ---------- */
        .impact-card {
            transition: transform .3s ease, box-shadow .3s ease, border-color .3s ease;
        }

        .impact-card:hover {
            transform: translateY(-4px);
            border-color: rgba(247, 145, 32, .55);
            box-shadow: 0 18px 36px -18px rgba(15, 23, 42, .28);
        }

        .dark .impact-card:hover {
            box-shadow: 0 18px 36px -18px rgba(0, 0, 0, .7);
        }

        /* ---------- Section title underline ---------- */
        .impact-title-underline {
            position: relative;
            display: inline-block;
        }

        .impact-title-underline::after {
            content: "";
            position: absolute;
            left: 50%;
            bottom: -10px;
            width: 56px;
            height: 3px;
            transform: translateX(-50%);
            border-radius: 9999px;
            background: linear-gradient(90deg, #f79120, #fb923c);
        }

        /* ---------- Reduced motion ---------- */
        @media (prefers-reduced-motion: reduce) {
            .impact-card,
            .impact-gradient-text {
                animation: none !important;
                transition: none !important;
            }

            .js .impact-reveal,
            .js .impact-reveal-stagger > *,
            .js .impact-reveal-stagger.active > * {
                opacity: 1 !important;
                transform: none !important;
                animation: none !important;
                transition: none !important;
            }

            #impact-hero {
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
            $heroImage = asset('images/impact/impact-hero.jpg');
        @endphp

        <section
            id="impact-hero"
            class="relative isolate flex min-h-[540px] items-center overflow-hidden bg-[#070049] bg-cover bg-center"
            style="background-image: linear-gradient(110deg, rgba(7, 0, 73, .92) 0%, rgba(7, 0, 73, .78) 55%, rgba(7, 0, 73, .62) 100%), url('{{ $heroImage }}');"
        >
            <div class="pointer-events-none absolute inset-0 z-0 bg-gradient-to-t from-[#070049]/60 via-transparent to-[#070049]/20"></div>

            <div class="relative z-10 mx-auto w-full max-w-7xl px-4 py-20 text-center sm:px-6 lg:px-8">
                <h1 class="mx-auto max-w-4xl text-4xl font-extrabold leading-tight text-white sm:text-6xl">
                    Our Impact
                    <span class="impact-gradient-text mt-1 block pb-1">
                        Young people. Stronger communities.
                    </span>
                </h1>

                <p class="mx-auto mt-6 max-w-2xl text-base font-medium leading-relaxed text-white sm:text-lg">
                    Since 1996, TFL has helped young people build practical skills, confidence,
                    livelihoods, and opportunities to contribute to their communities.
                </p>
            </div>
        </section>

        {{-- ============ SECTION NAVIGATION ============ --}}
        <div class="relative z-10 border-b border-slate-200 bg-white px-4 py-5 dark:border-slate-800 dark:bg-slate-900 sm:px-6 lg:px-8">
            <nav aria-label="Impact page sections"
                 class="mx-auto flex max-w-5xl flex-wrap justify-center gap-2.5">
                @foreach ([
                    ['#results', 'Results'],
                    ['#stories', 'Impact Stories'],
                    ['#challenge', 'The Challenge'],
                ] as [$href, $label])
                    <a href="{{ $href }}"
                       class="rounded-full border border-slate-300 bg-slate-50 px-5 py-2 text-sm font-semibold text-slate-800 transition hover:border-primary hover:bg-primary hover:text-[#070049] focus:outline-none focus-visible:ring-2 focus-visible:ring-primary dark:border-slate-700 dark:bg-slate-800 dark:text-slate-100 dark:hover:border-primary dark:hover:bg-primary dark:hover:text-[#070049]">
                        {{ $label }}
                    </a>
                @endforeach
            </nav>
        </div>

        {{-- ============ RESULTS ============ --}}
        <section id="results"
                 class="impact-reveal relative z-10 scroll-mt-32 bg-slate-50 px-4 py-20 text-slate-800 dark:bg-slate-950 dark:text-slate-200 sm:px-6 lg:px-8"
                 data-impact-reveal>
            <div class="mx-auto max-w-7xl">
                <div class="mb-14 text-center">
                    <p class="mb-3 text-sm font-semibold text-orange-800 dark:text-primary">
                        What we have achieved
                    </p>

                    <h2 class="text-2xl font-bold text-slate-950 dark:text-white md:text-3xl">
                        <span class="impact-title-underline">TFL at a glance</span>
                    </h2>

                    <p class="mx-auto mt-8 max-w-2xl text-base leading-relaxed text-slate-700 dark:text-slate-300">
                        Our experience, reach, and outcomes show how young people are building
                        skills and creating new opportunities.
                    </p>
                </div>

                @php
                    $impactStats = [
                        [
                            'value' => '30+',
                            'label' => 'Years of experience',
                            'detail' => 'Continuous youth development work since 1996.',
                        ],
                        [
                            'value' => '900+',
                            'label' => 'Alumni and youth community',
                            'detail' => 'TFL alumni and young people in our wider community.',
                        ],
                        [
                            'value' => '64',
                            'label' => 'Young people reached in 2026',
                            'detail' => 'Through TFL’s flagship programmes.',
                        ],
                        [
                            'value' => '17',
                            'label' => 'Students supported to return',
                            'detail' => 'Secondary school dropouts supported through Soma na Matumaini.',
                        ],
                        [
                            'value' => '60%',
                            'label' => 'In employment or self-employment',
                            'detail' => 'Share of tracked alumni in work or self-employment.',
                        ],
                        [
                            'value' => '30%',
                            'label' => 'Started their own businesses',
                            'detail' => 'Share of tracked alumni who have started businesses.',
                        ],
                        [
                            'value' => '30%',
                            'label' => 'Giving back as mentors',
                            'detail' => 'Tracked alumni who returned as mentors or board members.',
                        ],
                        [
                            'value' => '50',
                            'label' => 'Alumni trained in green skills',
                            'detail' => 'Alumni building knowledge for sustainable livelihoods.',
                        ],
                    ];
                @endphp

                <div class="impact-reveal-stagger grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4"
                     data-impact-reveal>
                    @foreach($impactStats as $stat)
                        <article class="impact-card relative h-full overflow-hidden rounded-2xl border border-slate-200 bg-white p-6 shadow-sm dark:border-slate-700 dark:bg-slate-800">
                            <span class="absolute inset-x-0 top-0 h-1 bg-gradient-to-r from-primary to-orange-300" aria-hidden="true"></span>

                            <p class="text-4xl font-extrabold tracking-tight text-orange-800 dark:text-primary">
                                {{ $stat['value'] }}
                            </p>

                            <h3 class="mt-3 font-bold leading-snug text-slate-950 dark:text-white">
                                {{ $stat['label'] }}
                            </h3>

                            <p class="mt-2 text-sm leading-relaxed text-slate-700 dark:text-slate-300">
                                {{ $stat['detail'] }}
                            </p>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- ============ IMPACT STORIES ============ --}}
        <section id="stories"
                 class="impact-reveal relative z-10 scroll-mt-32 bg-white px-4 py-20 text-slate-800 dark:bg-slate-900 dark:text-slate-200 sm:px-6 lg:px-8"
                 data-impact-reveal>
            <div class="mx-auto max-w-7xl">
                <div class="mb-14 text-center">
                    <p class="mb-3 text-sm font-semibold text-orange-800 dark:text-primary">
                        Voices from our community
                    </p>

                    <h2 class="text-2xl font-bold text-slate-950 dark:text-white md:text-3xl">
                        <span class="impact-title-underline">Impact Stories</span>
                    </h2>

                    <p class="mx-auto mt-8 max-w-2xl text-base leading-relaxed text-slate-700 dark:text-slate-300">
                        The value of the work is seen in the confidence, skills, and choices
                        young people build for themselves.
                    </p>
                </div>

                {{-- Three equally sized cards on large screens; stacked on small screens --}}
                <div class="grid grid-cols-1 items-stretch gap-6 md:grid-cols-2 lg:grid-cols-3">

                    {{-- Ariel David Swai --}}
                    <article class="impact-card flex h-full flex-col overflow-hidden rounded-2xl border border-slate-200 bg-slate-50 shadow-sm dark:border-slate-700 dark:bg-slate-800">
                        <div class="relative aspect-[16/9] w-full shrink-0 overflow-hidden bg-gradient-to-br from-orange-100 to-orange-200 dark:from-slate-700 dark:to-slate-800">
                            <span class="absolute inset-0 flex items-center justify-center text-6xl font-extrabold text-orange-700/60 dark:text-primary/60" aria-hidden="true">AS</span>

                            <img src="{{ asset('images/impact/stories/ariel-david-swai.jpg') }}"
                                 alt="Ariel David Swai"
                                 loading="lazy"
                                 class="relative h-full w-full object-cover object-top"
                                 onerror="this.remove()">

                            <span class="absolute left-4 top-4 z-10 rounded-full bg-primary px-4 py-2 text-xs font-bold uppercase tracking-wide text-[#070049] shadow">
                                TFL participant
                            </span>
                        </div>

                        <div class="flex flex-1 flex-col p-6 sm:p-7">
                            <p class="text-sm font-semibold text-orange-800 dark:text-primary">
                                TFL participant, 2024
                            </p>

                            <h3 class="mt-2 text-xl font-bold leading-snug text-slate-950 dark:text-white">
                                Ariel David Swai
                            </h3>

                            <h4 class="mt-3 text-base font-semibold text-slate-900 dark:text-slate-100">
                                Learning skills for personal growth
                            </h4>

                            <p class="mt-4 text-sm leading-relaxed text-slate-700 dark:text-slate-300">
                                During my time at Training For Life in 2024, I acquired valuable
                                skills and knowledge that greatly impacted my personal growth.
                                I learned critical thinking, creativity, collaboration, commitment,
                                and how to create new opportunities.
                            </p>

                            <p class="mt-3 text-sm leading-relaxed text-slate-700 dark:text-slate-300">
                                I learned to analyse and evaluate information, explore different
                                perspectives, and collaborate effectively with diverse teams.
                                The experience equipped me to navigate personal and professional
                                challenges.
                            </p>
                        </div>
                    </article>

                    {{-- Genevieve Noel Kimaro --}}
                    <article class="impact-card flex h-full flex-col overflow-hidden rounded-2xl border border-slate-200 bg-slate-50 shadow-sm dark:border-slate-700 dark:bg-slate-800">
                        <div class="relative aspect-[16/9] w-full shrink-0 overflow-hidden bg-gradient-to-br from-orange-100 to-orange-200 dark:from-slate-700 dark:to-slate-800">
                            <span class="absolute inset-0 flex items-center justify-center text-6xl font-extrabold text-orange-700/60 dark:text-primary/60" aria-hidden="true">GK</span>

                            <img src="{{ asset('images/impact/stories/genevieve-noel-kimaro.jpg') }}"
                                 alt="Genevieve Noel Kimaro"
                                 loading="lazy"
                                 class="relative h-full w-full object-cover object-top"
                                 onerror="this.remove()">

                            <span class="absolute left-4 top-4 z-10 rounded-full bg-primary px-4 py-2 text-xs font-bold uppercase tracking-wide text-[#070049] shadow">
                                TFL participant
                            </span>
                        </div>

                        <div class="flex flex-1 flex-col p-6 sm:p-7">
                            <p class="text-sm font-semibold text-orange-800 dark:text-primary">
                                TFL participant
                            </p>

                            <h3 class="mt-2 text-xl font-bold leading-snug text-slate-950 dark:text-white">
                                Genevieve Noel Kimaro
                            </h3>

                            <h4 class="mt-3 text-base font-semibold text-slate-900 dark:text-slate-100">
                                Finding direction and purpose
                            </h4>

                            <p class="mt-4 text-sm leading-relaxed text-slate-700 dark:text-slate-300">
                                The TFL course helped me understand my career and set a clearer
                                direction for my future. It expanded my knowledge and gave me
                                opportunities to practise what I learned in real-life situations.
                            </p>

                            <p class="mt-3 text-sm leading-relaxed text-slate-700 dark:text-slate-300">
                                I also learned to become a responsible community member, practise
                                critical thinking, and value time in my daily activities.
                            </p>
                        </div>
                    </article>

                    {{-- Ester --}}
                    <article class="impact-card flex h-full flex-col overflow-hidden rounded-2xl border border-slate-200 bg-slate-50 shadow-sm dark:border-slate-700 dark:bg-slate-800">
                        <div class="relative aspect-[16/9] w-full shrink-0 overflow-hidden bg-gradient-to-br from-orange-100 to-orange-200 dark:from-slate-700 dark:to-slate-800">
                            <span class="absolute inset-0 flex items-center justify-center text-6xl font-extrabold text-orange-700/60 dark:text-primary/60" aria-hidden="true">E</span>

                            <img src="{{ asset('images/impact/stories/ester.jpg') }}"
                                 alt="Ester, TFL alumna"
                                 loading="lazy"
                                 class="relative h-full w-full object-cover object-top"
                                 onerror="this.remove()">

                            <span class="absolute left-4 top-4 z-10 rounded-full bg-primary px-4 py-2 text-xs font-bold uppercase tracking-wide text-[#070049] shadow">
                                TFL alumna
                            </span>
                        </div>

                        <div class="flex flex-1 flex-col p-6 sm:p-7">
                            <p class="text-sm font-semibold text-orange-800 dark:text-primary">
                                TFL alumna
                            </p>

                            <h3 class="mt-2 text-xl font-bold leading-snug text-slate-950 dark:text-white">
                                Ester
                            </h3>

                            <h4 class="mt-3 text-base font-semibold text-slate-900 dark:text-slate-100">
                                Building resilience
                            </h4>

                            <p class="mt-4 text-sm leading-relaxed text-slate-700 dark:text-slate-300">
                                TFL taught me resilience and gave me the courage to do things I
                                never thought I could do. I hiked Mount Meru, woke up early, ran,
                                and accomplished a lot.
                            </p>
                        </div>
                    </article>

                </div>
            </div>
        </section>

        {{-- ============ THE CHALLENGE ============ --}}
        <section id="challenge"
                 class="impact-reveal relative z-10 scroll-mt-32 bg-slate-50 px-4 py-20 text-slate-800 dark:bg-slate-950 dark:text-slate-200 sm:px-6 lg:px-8"
                 data-impact-reveal>
            <div class="mx-auto max-w-7xl">
                <div class="mb-14 text-center">
                    <p class="mb-3 text-sm font-semibold text-orange-800 dark:text-primary">
                        Why this work matters
                    </p>

                    <h2 class="text-2xl font-bold text-slate-950 dark:text-white md:text-3xl">
                        <span class="impact-title-underline">The Challenge</span>
                    </h2>
                </div>

                <div class="rounded-2xl border border-slate-200 bg-white p-7 shadow-sm dark:border-slate-700 dark:bg-slate-800 md:p-10">
                    <div class="grid grid-cols-1 gap-8 lg:grid-cols-3">
                        <div class="lg:col-span-2">
                            <p class="leading-relaxed text-slate-700 dark:text-slate-300">
                                Tanzania’s young population is a major opportunity, yet over 65% of
                                employers report difficulty finding suitably skilled workers. At the
                                same time, 66% of young Tanzanians aged 18–35 would like to start
                                their own business, while 28% identify a lack of entrepreneurial
                                skills or motivation as a barrier to employment.
                            </p>

                            <p class="mt-4 leading-relaxed text-slate-700 dark:text-slate-300">
                                Research from the University of Dodoma shows that soft skills are
                                important links between training and employability. As climate and
                                environmental pressures affect livelihoods, young people also need
                                green skills to build sustainable livelihoods and use resources
                                responsibly.
                            </p>

                            <p class="mt-5 border-l-4 border-primary pl-4 font-semibold leading-relaxed text-slate-950 dark:text-white">
                                The challenge is turning learning and ambition into practical skills,
                                experience, livelihoods, and responsible action.
                            </p>
                        </div>

                        <aside class="rounded-xl border border-slate-200 bg-slate-50 p-6 dark:border-slate-700 dark:bg-slate-900">
                            <h3 class="font-bold text-slate-950 dark:text-white">
                                What young people need
                            </h3>

                            <ul class="mt-4 space-y-4 text-sm leading-relaxed text-slate-700 dark:text-slate-300">
                                <li class="flex gap-3">
                                    <span class="mt-2 h-2 w-2 shrink-0 rounded-full bg-primary" aria-hidden="true"></span>
                                    Practical experience and relevant skills
                                </li>
                                <li class="flex gap-3">
                                    <span class="mt-2 h-2 w-2 shrink-0 rounded-full bg-primary" aria-hidden="true"></span>
                                    Support to turn ideas into livelihoods
                                </li>
                                <li class="flex gap-3">
                                    <span class="mt-2 h-2 w-2 shrink-0 rounded-full bg-primary" aria-hidden="true"></span>
                                    Green skills and responsible action
                                </li>
                            </ul>
                        </aside>
                    </div>
                </div>
            </div>
        </section>

    </main>

    @include('partials.footer')

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const sections = document.querySelectorAll('[data-impact-reveal]');

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
            }, { threshold: 0.05, rootMargin: '0px 0px -40px 0px' });

            sections.forEach(section => observer.observe(section));
        });
    </script>
</body>
</html>