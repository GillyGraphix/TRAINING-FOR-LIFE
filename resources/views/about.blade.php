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
</head>
<body class="font-sans antialiased bg-[#F4F6F9] text-slate-800 dark:bg-[#0B0F19] dark:text-slate-100 transition-colors duration-300">

    <!-- Header Navigation -->
    @include('partials.header')

    {{--
        TODO (content, pending TFL confirmation): once finalised, add links here to
        TFL's safeguarding policy, complaints/feedback mechanism, and privacy/data
        policy (see section 2.6). Not published yet — placeholder left out of the
        rendered page until real links exist.
    --}}

    <!-- Main Content -->
    <main class="pt-28 pb-28 min-h-screen relative overflow-hidden">

        <!-- Ambient background glow (single, restrained) -->
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[800px] h-[800px] bg-primary/5 rounded-full blur-3xl pointer-events-none"></div>

        <!-- ============ HERO ============ -->
        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 mb-28">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-8 items-center">

                <div class="lg:col-span-7 space-y-7">
                    <p class="flex items-center gap-2 text-primary font-semibold text-sm">
                        About TFL - Moshi, Kilimanjaro
                    </p>

                    <h1 class="text-4xl md:text-5xl lg:text-[3.4rem] font-bold text-slate-900 dark:text-white leading-[1.12] tracking-tight">
                        A prosperous, poverty-free Tanzania, built by empowered youth.
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

                <!-- Kilimanjaro motif -->
                <div class="lg:col-span-5">
                    <svg viewBox="0 0 400 320" xmlns="http://www.w3.org/2000/svg" class="w-full h-auto max-w-sm mx-auto">
                        <circle cx="300" cy="72" r="40" class="fill-orange-400/70 dark:fill-orange-400/50"/>
                        <path d="M0 225 L95 118 L165 225 Z" class="fill-primary/15 dark:fill-primary/10"/>
                        <path d="M115 225 L235 88 L335 225 Z" class="fill-primary/25 dark:fill-primary/15"/>
                        <path d="M55 240 L192 58 L228 58 L365 240 Z" class="fill-slate-800 dark:fill-slate-200"/>
                        <path d="M168 92 L192 58 L228 58 L252 92 L230 83 L210 102 L190 83 Z" class="fill-white dark:fill-slate-50"/>
                        <path d="M0 262 Q100 242 200 262 T400 260 L400 320 L0 320 Z" class="fill-emerald-500/20 dark:fill-emerald-400/15"/>
                        <path d="M0 288 Q100 273 200 290 T400 286 L400 320 L0 320 Z" class="fill-emerald-600/30 dark:fill-emerald-500/20"/>
                        <path d="M38 52 q6 -8 12 0 q6 -8 12 0" class="stroke-slate-400 dark:stroke-slate-500" fill="none" stroke-width="2" stroke-linecap="round"/>
                        <path d="M68 36 q5 -7 10 0 q5 -7 10 0" class="stroke-slate-400 dark:stroke-slate-500" fill="none" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                </div>
            </div>
        </section>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 space-y-28">

            <!-- ============ 2.2 OUR STORY (timeline) ============ -->
            <section>
                <div class="flex items-baseline gap-3 mb-10">
                    <h2 class="text-2xl md:text-3xl font-bold text-slate-900 dark:text-white">Our Story</h2>
                </div>

                <div class="relative pl-10 sm:pl-14">
                    <div class="absolute left-[7px] sm:left-[7.5px] top-2 bottom-2 w-px bg-slate-200 dark:bg-slate-700"></div>

                    <div class="relative pb-10">
                        <span class="absolute -left-10 sm:-left-14 top-1 w-4 h-4 rounded-full bg-primary ring-4 ring-primary/15"></span>
                        <p class="text-sm font-semibold text-primary mb-1">1996 &mdash; Founded</p>
                        <p class="text-slate-600 dark:text-slate-300 leading-relaxed max-w-2xl">
                            TFL was founded in 1996 on a simple belief: every young person, regardless of background, holds the potential to lead and to change their community.
                        </p>
                    </div>

                    <div class="relative pb-10">
                        <span class="absolute -left-10 sm:-left-14 top-1 w-4 h-4 rounded-full bg-primary/70 ring-4 ring-primary/10"></span>
                        <p class="text-sm font-semibold text-primary mb-1">2007 &mdash; Registered</p>
                        <p class="text-slate-600 dark:text-slate-300 leading-relaxed max-w-2xl">
                            What began as a training initiative in Moshi has grown into a movement of more than 845 alumni &mdash; young people who completed our programmes and are now giving back as mentors, donors, and employers of the next generation.
                        </p>
                    </div>

                    <div class="relative">
                        <span class="absolute -left-10 sm:-left-14 top-1 w-4 h-4 rounded-full bg-primary/70 ring-4 ring-primary/10"></span>
                        <p class="text-sm font-semibold text-primary dark:text-primary mb-1">2025 &mdash; Land of their own</p>
                        <p class="text-slate-600 dark:text-slate-300 leading-relaxed max-w-2xl">
                            In 2025, that alumni community raised its own funds to purchase 5 acres of farmland, turning TFL graduates from beneficiaries into owners of the organisation&rsquo;s future.
                        </p>
                    </div>
                </div>
            </section>

            <!-- ============ 2.1 WHO WE ARE ============ -->
            <section class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-start">
                <div class="lg:col-span-4">
                    <div class="flex items-baseline gap-3">
                        <h2 class="text-2xl md:text-3xl font-bold text-slate-900 dark:text-white">Who We Are</h2>
                    </div>
                </div>
                <div class="lg:col-span-9">
                    <p class="text-slate-600 dark:text-slate-300 text-lg leading-relaxed">
                        Training For Life (TFL) is a Tanzanian, youth-led NGO founded in 1996 and registered in 2007 (Reg. No. 00NGO/0245), based in Moshi, Kilimanjaro. We identify, train, and mentor talented young people aged 15&ndash;35 from economically disadvantaged families across Tanzania, equipping them with market-driven skills, scholarships, and entrepreneurship pathways to become job creators and community changemakers.
                    </p>
                </div>
            </section>

            <!-- ============ 2.3 MISSION, VISION & VALUES ============ -->
            <section class="space-y-10">
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

                <!-- Core belief: pull-quote treatment, deliberately distinct -->
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
                                <p class="text-slate-600 dark:text-slate-300 text-sm leading-relaxed">We believe in handling over the tools, not just providing the solution. We equip youth to drive their own development</p>
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <span class="shrink-0 w-11 h-11 rounded-xl bg-primary/10 text-primary flex items-center justify-center">
                                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3 4 6v6c0 5 3.5 8 8 9 4.5-1 8-4 8-9V6l-8-3Z"/><path d="m9 12 2 2 4-4"/></svg>
                            </span>
                            <div>
                                <h4 class="font-semibold text-slate-900 dark:text-white mb-1">Integrity</h4>
                                <p class="text-slate-600 dark:text-slate-300 text-sm leading-relaxed">We act with unwavering honesty and transparency. We are accountable to our youth, our donirs and each other.</p>
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
                                <p class="text-slate-600 dark:text-slate-300 text-sm leading-relaxed">We work hand-in-hand with communities, local leaders and each either. We achieve more together.</p>
                            </div>
                        </div>
                        <div class="flex gap-4 sm:col-span-2">
                            <span class="shrink-0 w-11 h-11 rounded-xl bg-primary/10 text-primary dark:text-primary flex items-center justify-center">
                                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M11 20A7 7 0 0 1 4 13c0-4 3-7 8-9 5 2 8 5 8 9a7 7 0 0 1-7 7"/><path d="M11 20v-6"/></svg>
                            </span>
                            <div>
                                <h4 class="font-semibold text-slate-900 dark:text-white mb-1">Stewardship</h4>
                                <p class="text-slate-600 dark:text-slate-300 text-sm leading-relaxed">We treat every donation, every piece of equipment and every minute of time as a precious resource meant for maximum impact</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- ============ 2.4 OUR APPROACH (cycle) ============ -->
            <section>
                <div class="flex items-baseline gap-3 mb-3">
                    <h2 class="text-2xl md:text-3xl font-bold text-slate-900 dark:text-white">Our Approach</h2>
                </div>
                <p class="text-slate-500 dark:text-slate-400 mb-10 max-w-2xl">A six-step cycle, where the most committed graduates return to power the next one.</p>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-6 gap-y-10">
                    <div class="relative">
                        <div class="flex items-center gap-3 mb-2">
                            <span class="w-8 h-8 rounded-full bg-primary text-white text-sm font-semibold flex items-center justify-center">1</span>
                            <h4 class="text-lg font-semibold text-slate-900 dark:text-white">Identify</h4>
                        </div>
                        <p class="text-slate-600 dark:text-slate-300 text-sm leading-relaxed pl-11">We find talented young people excluded from opportunity, not because of ability, but because of poverty, geography, or lack of connections.</p>
                    </div>
                    <div class="relative">
                        <div class="flex items-center gap-3 mb-2">
                            <span class="w-8 h-8 rounded-full bg-primary text-white text-sm font-semibold flex items-center justify-center">2</span>
                            <h4 class="text-lg font-semibold text-slate-900 dark:text-white">Develop</h4>
                        </div>
                        <p class="text-slate-600 dark:text-slate-300 text-sm leading-relaxed pl-11">Through Course 4, Kijana Fursa, and Soma na Matumaini, we build practical skills, character, and leadership.</p>
                    </div>
                    <div class="relative">
                        <div class="flex items-center gap-3 mb-2">
                            <span class="w-8 h-8 rounded-full bg-primary text-white text-sm font-semibold flex items-center justify-center">3</span>
                            <h4 class="text-lg font-semibold text-slate-900 dark:text-white">Equip</h4>
                        </div>
                        <p class="text-slate-600 dark:text-slate-300 text-sm leading-relaxed pl-11">We connect graduates to seed capital, savings groups, and scholarships.</p>
                    </div>
                    <div class="relative">
                        <div class="flex items-center gap-3 mb-2">
                            <span class="w-8 h-8 rounded-full bg-primary text-white text-sm font-semibold flex items-center justify-center">4</span>
                            <h4 class="text-lg font-semibold text-slate-900 dark:text-white">Connect</h4>
                        </div>
                        <p class="text-slate-600 dark:text-slate-300 text-sm leading-relaxed pl-11">We link youth to mentors, employers, and markets, closing the &ldquo;experience trap&rdquo; that keeps first-time job seekers locked out.</p>
                    </div>
                    <div class="relative">
                        <div class="flex items-center gap-3 mb-2">
                            <span class="w-8 h-8 rounded-full bg-primary text-white text-sm font-semibold flex items-center justify-center">5</span>
                            <h4 class="text-lg font-semibold text-slate-900 dark:text-white">Create</h4>
                        </div>
                        <p class="text-slate-600 dark:text-slate-300 text-sm leading-relaxed pl-11">Graduates launch businesses and take up employment, creating income for themselves and jobs for others.</p>
                    </div>
                    <div class="relative">
                        <div class="flex items-center gap-3 mb-2">
                            <span class="w-8 h-8 rounded-full bg-primary text-white text-sm font-semibold flex items-center justify-center">6</span>
                            <h4 class="text-lg font-semibold text-slate-900 dark:text-white">Lead</h4>
                        </div>
                        <p class="text-slate-600 dark:text-slate-300 text-sm leading-relaxed pl-11">Our most committed graduates return as alumni mentors, donors, and future board members, sustaining the cycle for the next cohort.</p>
                    </div>
                </div>
            </section>

            <!-- ============ 2.5 LEADERSHIP & GOVERNANCE ============ -->
            <section>
                <div class="flex items-baseline gap-3 mb-10">
                    <h2 class="text-2xl md:text-3xl font-bold text-slate-900 dark:text-white">Leadership &amp; Governance</h2>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-6">
                    <div class="bg-white dark:bg-slate-800/90 border border-slate-200/80 dark:border-slate-700/80 rounded-2xl p-5 flex items-center gap-4">
                        <span class="shrink-0 w-12 h-12 rounded-full bg-primary/10 text-primary font-semibold flex items-center justify-center">MS</span>
                        <div>
                            <p class="font-semibold text-slate-900 dark:text-white text-sm leading-tight">Rev. Mathew Saruma</p>
                            <p class="text-xs text-slate-500 dark:text-slate-400">Chairperson</p>
                        </div>
                    </div>
                    <div class="bg-white dark:bg-slate-800/90 border border-slate-200/80 dark:border-slate-700/80 rounded-2xl p-5 flex items-center gap-4">
                        <span class="shrink-0 w-12 h-12 rounded-full bg-primary/10 text-primary font-semibold flex items-center justify-center">GZ</span>
                        <div>
                            <p class="font-semibold text-slate-900 dark:text-white text-sm leading-tight">Mr. Gasper Zavu</p>
                            <p class="text-xs text-slate-500 dark:text-slate-400">Managing Director</p>
                        </div>
                    </div>
                    <div class="bg-white dark:bg-slate-800/90 border border-slate-200/80 dark:border-slate-700/80 rounded-2xl p-5 flex items-center gap-4">
                        <span class="shrink-0 w-12 h-12 rounded-full bg-primary/10 text-primary font-semibold flex items-center justify-center">VM</span>
                        <div>
                            <p class="font-semibold text-slate-900 dark:text-white text-sm leading-tight">Mr. Victor Mshana, CPA(T)</p>
                            <p class="text-xs text-slate-500 dark:text-slate-400">Treasurer</p>
                        </div>
                    </div>
                    <div class="bg-white dark:bg-slate-800/90 border border-slate-200/80 dark:border-slate-700/80 rounded-2xl p-5 flex items-center gap-4">
                        <span class="shrink-0 w-12 h-12 rounded-full bg-primary/10 text-primary font-semibold flex items-center justify-center">EM</span>
                        <div>
                            <p class="font-semibold text-slate-900 dark:text-white text-sm leading-tight">Mr. Emmanuel Mtowe</p>
                            <p class="text-xs text-slate-500 dark:text-slate-400">Director</p>
                        </div>
                    </div>
                    <div class="bg-white dark:bg-slate-800/90 border border-slate-200/80 dark:border-slate-700/80 rounded-2xl p-5 flex items-center gap-4">
                        <span class="shrink-0 w-12 h-12 rounded-full bg-primary/10 text-primary font-semibold flex items-center justify-center">AN</span>
                        <div>
                            <p class="font-semibold text-slate-900 dark:text-white text-sm leading-tight">Ms. Aikande Nkya</p>
                            <p class="text-xs text-slate-500 dark:text-slate-400">Director</p>
                        </div>
                    </div>
                    <div class="bg-white dark:bg-slate-800/90 border border-slate-200/80 dark:border-slate-700/80 rounded-2xl p-5 flex items-center gap-4">
                        <span class="shrink-0 w-12 h-12 rounded-full bg-primary/10 text-primary font-semibold flex items-center justify-center">FL</span>
                        <div>
                            <p class="font-semibold text-slate-900 dark:text-white text-sm leading-tight">Ms. Francisca Lengeju</p>
                            <p class="text-xs text-slate-500 dark:text-slate-400">Director</p>
                        </div>
                    </div>
                    <div class="bg-white dark:bg-slate-800/90 border border-slate-200/80 dark:border-slate-700/80 rounded-2xl p-5 flex items-center gap-4">
                        <span class="shrink-0 w-12 h-12 rounded-full bg-primary/10 text-primary font-semibold flex items-center justify-center">PN</span>
                        <div>
                            <p class="font-semibold text-slate-900 dark:text-white text-sm leading-tight">Dr. Paul Nandrie</p>
                            <p class="text-xs text-slate-500 dark:text-slate-400">Director</p>
                        </div>
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

            <!-- ============ 2.6 ACCOUNTABILITY ============ -->
            <section class="bg-white dark:bg-slate-800/90 border border-slate-200/80 dark:border-slate-700/80 rounded-2xl p-8 md:p-12">
                <div class="flex items-baseline gap-3 mb-6">
                    <h2 class="text-2xl md:text-3xl font-bold text-slate-900 dark:text-white">Accountability</h2>
                </div>
                <p class="text-slate-600 dark:text-slate-300 text-base md:text-lg leading-relaxed mb-8 max-w-3xl">
                    TFL is governed by an active Board of Directors that meets at least twice a year, with an Annual General Meeting open to our community each April. Our finances use dual signatories, quarterly internal audits, and QuickBooks-based tracking.
                </p>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-6 pt-6 border-t border-slate-100 dark:border-slate-700/60">
                    <div class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-primary mt-0.5 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="5" width="18" height="16" rx="2"/><path d="M8 3v4M16 3v4M3 10h18"/></svg>
                        <p class="text-sm text-slate-600 dark:text-slate-300">Board meets at least twice a year</p>
                    </div>
                    <div class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-primary mt-0.5 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="8" r="3"/><path d="M2 20c0-3.3 3.1-6 7-6s7 2.7 7 6"/><path d="M17 8a3 3 0 1 0 0-6"/><path d="M22 20c0-2.5-1.9-4.6-4.5-5.5"/></svg>
                        <p class="text-sm text-slate-600 dark:text-slate-300">AGM open to our community every April</p>
                    </div>
                    <div class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-primary mt-0.5 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3v18M5 7l-3 6a3 3 0 0 0 6 0l-3-6ZM19 7l-3 6a3 3 0 0 0 6 0l-3-6ZM5 7h14M8 3h8"/></svg>
                        <p class="text-sm text-slate-600 dark:text-slate-300">Dual signatories on all finances</p>
                    </div>
                    <div class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-primary mt-0.5 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="4" y="3" width="16" height="18" rx="2"/><path d="M9 3v2h6V3M9 12l2 2 4-4"/></svg>
                        <p class="text-sm text-slate-600 dark:text-slate-300">Quarterly internal audits, QuickBooks-tracked</p>
                    </div>
                </div>
            </section>

        </div>
    </main>

    <!-- Footer Section -->
    @include('partials.footer')

</body>
</html>