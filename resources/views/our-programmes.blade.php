<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Our Programmes - Training For Life (TFL)</title>

    <!-- Google Fonts: Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Tailwind & Alpine (Vite) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>[x-cloak]{display:none!important}</style>
</head>
<body class="font-sans antialiased bg-white text-gray-800 dark:bg-slate-900 dark:text-gray-200 transition-colors duration-300">

    <!-- Header Navigation -->
    @include('partials.header')

    <!-- Our Programmes Content Section -->
    <main class="pt-32 pb-20 bg-gray-50 dark:bg-slate-900 min-h-screen transition-colors duration-500">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Page Header -->
            <div class="text-center mb-16">
                <span class="text-primary font-bold text-xs uppercase tracking-[0.25em] bg-primary/10 px-4 py-1.5 rounded-full">Our Initiatives</span>
                <h1 class="text-4xl md:text-5xl font-extrabold text-slate-900 dark:text-white mt-4 mb-4">Our Programmes</h1>
                <div class="w-24 h-1 bg-primary mx-auto rounded-full"></div>
                <p class="mt-6 text-lg text-slate-600 dark:text-gray-400 max-w-3xl mx-auto">
                    TFL develops young people through practical training, leadership development, and real pathways into income &mdash; because opportunity, not charity, is what changes a young person's life.
                </p>
            </div>

            <!-- Programmes: summary cards + read-more modals, all sharing one 'active' state -->
            <div x-data="{ active: null }" x-on:keydown.escape.window="active = null">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-8">

                    <!-- Card 1: Kijana Fursa -->
                    <div class="bg-white dark:bg-slate-800 rounded-3xl shadow-sm border border-gray-100 dark:border-gray-800 overflow-hidden transition-shadow duration-300 hover:shadow-md flex flex-col">
                        <div class="p-8 md:p-10 flex flex-col flex-1">
                            <div class="flex items-center gap-4 mb-5">
                                <span class="w-12 h-12 rounded-xl bg-primary/10 text-primary font-bold text-xl flex items-center justify-center shrink-0">1</span>
                                <div>
                                    <h2 class="text-xl md:text-2xl font-bold text-slate-900 dark:text-white leading-snug">Kijana Fursa</h2>
                                    <p class="text-xs font-semibold text-primary/70 uppercase tracking-wide mt-0.5">5 months &middot; Moshi, Kilimanjaro</p>
                                </div>
                            </div>
                            <p class="text-slate-600 dark:text-gray-300 leading-relaxed mb-6 flex-1">
                                Kijana Fursa is TFL's flagship entrepreneurship and agribusiness incubation programme for young Tanzanians ready to create their own jobs instead of waiting for one.
                            </p>
                            <button @click="active = 'kijana-fursa'" class="inline-flex items-center gap-2 text-primary font-semibold text-sm self-start group">
                                Read more
                                <svg class="w-4 h-4 transition-transform duration-300 group-hover:translate-x-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
                            </button>
                        </div>
                    </div>

                    <!-- Card 2: Course 4 -->
                    <div class="bg-white dark:bg-slate-800 rounded-3xl shadow-sm border border-gray-100 dark:border-gray-800 overflow-hidden transition-shadow duration-300 hover:shadow-md flex flex-col">
                        <div class="p-8 md:p-10 flex flex-col flex-1">
                            <div class="flex items-center gap-4 mb-5">
                                <span class="w-12 h-12 rounded-xl bg-primary/10 text-primary font-bold text-xl flex items-center justify-center shrink-0">2</span>
                                <div>
                                    <h2 class="text-xl md:text-2xl font-bold text-slate-900 dark:text-white leading-snug">Course 4</h2>
                                    <p class="text-xs font-semibold text-primary/70 uppercase tracking-wide mt-0.5">3 months &middot; Moshi (residential)</p>
                                </div>
                            </div>
                            <p class="text-slate-600 dark:text-gray-300 leading-relaxed mb-6 flex-1">
                                Course 4 is a 3 month residential programme for young men and women who have just completed Form Four.
                            </p>
                            <button @click="active = 'course-4'" class="inline-flex items-center gap-2 text-primary font-semibold text-sm self-start group">
                                Read more
                                <svg class="w-4 h-4 transition-transform duration-300 group-hover:translate-x-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
                            </button>
                        </div>
                    </div>

                    <!-- Card 3: Soma na Matumaini -->
                    <div class="bg-white dark:bg-slate-800 rounded-3xl shadow-sm border border-gray-100 dark:border-gray-800 overflow-hidden transition-shadow duration-300 hover:shadow-md flex flex-col">
                        <div class="p-8 md:p-10 flex flex-col flex-1">
                            <div class="flex items-center gap-4 mb-5">
                                <span class="w-12 h-12 rounded-xl bg-primary/10 text-primary font-bold text-xl flex items-center justify-center shrink-0">3</span>
                                <div>
                                    <h2 class="text-xl md:text-2xl font-bold text-slate-900 dark:text-white leading-snug">Soma na Matumaini</h2>
                                    <p class="text-xs font-semibold text-primary/70 uppercase tracking-wide mt-0.5">Full scholarship &middot; Moshi camp</p>
                                </div>
                            </div>
                            <p class="text-slate-600 dark:text-gray-300 leading-relaxed mb-6 flex-1">
                                Soma na Matumaini (&ldquo;Study with Hope&rdquo;) is TFL's scholarship programme for talented young Tanzanians whose education was cut short by poverty.
                            </p>
                            <button @click="active = 'soma-na-matumaini'" class="inline-flex items-center gap-2 text-primary font-semibold text-sm self-start group">
                                Read more
                                <svg class="w-4 h-4 transition-transform duration-300 group-hover:translate-x-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
                            </button>
                        </div>
                    </div>

                    <!-- Card 4: TFL Farm -->
                    <div class="bg-white dark:bg-slate-800 rounded-3xl shadow-sm border border-gray-100 dark:border-gray-800 overflow-hidden transition-shadow duration-300 hover:shadow-md flex flex-col">
                        <div class="p-8 md:p-10 flex flex-col flex-1">
                            <div class="flex items-center gap-4 mb-5">
                                <span class="w-12 h-12 rounded-xl bg-primary/10 text-primary font-bold text-xl flex items-center justify-center shrink-0">4</span>
                                <div>
                                    <h2 class="text-xl md:text-2xl font-bold text-slate-900 dark:text-white leading-snug">TFL Farm</h2>
                                    <p class="text-xs font-semibold text-primary/70 uppercase tracking-wide mt-0.5">5 acres &middot; Kawawa Village, Moshi</p>
                                </div>
                            </div>
                            <p class="text-slate-600 dark:text-gray-300 leading-relaxed mb-6 flex-1">
                                TFL Farm is our practical agricultural incubation hub on 5 acres of land in Kawawa Village, Moshi District.
                            </p>
                            <button @click="active = 'tfl-farm'" class="inline-flex items-center gap-2 text-primary font-semibold text-sm self-start group">
                                Read more
                                <svg class="w-4 h-4 transition-transform duration-300 group-hover:translate-x-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
                            </button>
                        </div>
                    </div>

                </div>

                <!-- ===== MODAL 1: Kijana Fursa ===== -->
                <div x-show="active === 'kijana-fursa'" x-cloak
                     class="fixed inset-0 z-50 flex items-center justify-center p-4 md:p-8"
                     x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                     x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                    <div class="absolute inset-0 bg-slate-950/70 backdrop-blur-sm" @click="active = null"></div>
                    <div class="relative bg-white dark:bg-slate-800 rounded-3xl shadow-2xl w-full max-w-2xl max-h-[85vh] overflow-y-auto"
                         x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                         x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95">
                        <div class="sticky top-0 bg-white dark:bg-slate-800 border-b border-gray-100 dark:border-gray-700 px-6 md:px-8 py-5 flex items-center justify-between rounded-t-3xl">
                            <div class="flex items-center gap-4">
                                <span class="w-11 h-11 rounded-xl bg-primary/10 text-primary font-bold text-lg flex items-center justify-center shrink-0">1</span>
                                <h2 class="text-xl md:text-2xl font-bold text-slate-900 dark:text-white">Kijana Fursa</h2>
                            </div>
                            <button @click="active = null" class="w-9 h-9 rounded-full flex items-center justify-center text-slate-400 hover:text-slate-700 hover:bg-gray-100 dark:hover:bg-slate-700 dark:hover:text-white transition-colors shrink-0" aria-label="Close">
                                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18M6 6l12 12"/></svg>
                            </button>
                        </div>
                        <div class="px-6 md:px-8 py-7 space-y-6">
                            <div>
                                <p class="text-xs font-semibold uppercase tracking-wide text-primary mb-1.5">What is it</p>
                                <p class="text-slate-600 dark:text-gray-300 leading-relaxed">Kijana Fursa is TFL's flagship entrepreneurship and agribusiness incubation programme for young Tanzanians ready to create their own jobs instead of waiting for one.</p>
                            </div>
                            <div>
                                <p class="text-xs font-semibold uppercase tracking-wide text-primary mb-1.5">Why it exists</p>
                                <p class="text-slate-600 dark:text-gray-300 leading-relaxed">Most training programmes teach skills and then leave. Kijana Fursa goes further linking graduates to seed capital, savings groups, and markets so training turns into an actual, running business.</p>
                            </div>
                            <div>
                                <p class="text-xs font-semibold uppercase tracking-wide text-primary mb-1.5">Who it's for</p>
                                <p class="text-slate-600 dark:text-gray-300 leading-relaxed">Youth aged 15&ndash;35 from economically disadvantaged families in and around Moshi, with a demonstrated interest in agriculture or small business.</p>
                            </div>
                            <div>
                                <p class="text-xs font-semibold uppercase tracking-wide text-primary mb-1.5">What participants learn</p>
                                <p class="text-slate-600 dark:text-gray-300 leading-relaxed">Scientific, climate adaptive horticulture; business plan development and pitching; personal finance and responsible use of credit; enterprise registration and formalisation; savings group (VSLA) participation.</p>
                            </div>
                            <div>
                                <p class="text-xs font-semibold uppercase tracking-wide text-primary mb-1.5">Duration &amp; location</p>
                                <p class="text-slate-600 dark:text-gray-300 leading-relaxed">5 months, based at TFL's demonstration farm and campus in Moshi, Kilimanjaro.</p>
                            </div>
                            <div>
                                <p class="text-xs font-semibold uppercase tracking-wide text-primary mb-1.5">What happens during the programme</p>
                                <p class="text-slate-600 dark:text-gray-300 leading-relaxed">Hands on training on TFL's demonstration farm; study visits to established farms and markets; constitution writing and business registration support with the Moshi District Council; access to zero interest seed capital loans (TZS 500,000&ndash;5,000,000) through our partnership with CRDB Bank Foundation.</p>
                            </div>
                            <div>
                                <p class="text-xs font-semibold uppercase tracking-wide text-primary mb-1.5">Expected outcomes</p>
                                <p class="text-slate-600 dark:text-gray-300 leading-relaxed">70% of graduates launch and sustain a business within 12 months of completing training.</p>
                            </div>
                            <div class="bg-primary/5 dark:bg-slate-700/50 border-l-4 border-primary p-5 rounded-r-2xl">
                                <p class="text-xs font-semibold uppercase tracking-wide text-primary mb-1.5">Results to date</p>
                                <p class="text-slate-700 dark:text-gray-200 leading-relaxed">In 2025, 26 youth completed Kijana Fursa. The cohort registered 2 formal businesses with the Moshi District Council and developed 13 business plans, each pitched to real investors.</p>
                            </div>
                        </div>
                        {{-- TODO (pending TFL confirmation): eligibility/application requirements, next intake dates, and any cost to participants. Add once confirmed. --}}
                    </div>
                </div>

                <!-- ===== MODAL 2: Course 4 ===== -->
                <div x-show="active === 'course-4'" x-cloak
                     class="fixed inset-0 z-50 flex items-center justify-center p-4 md:p-8"
                     x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                     x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                    <div class="absolute inset-0 bg-slate-950/70 backdrop-blur-sm" @click="active = null"></div>
                    <div class="relative bg-white dark:bg-slate-800 rounded-3xl shadow-2xl w-full max-w-2xl max-h-[85vh] overflow-y-auto"
                         x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                         x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95">
                        <div class="sticky top-0 bg-white dark:bg-slate-800 border-b border-gray-100 dark:border-gray-700 px-6 md:px-8 py-5 flex items-center justify-between rounded-t-3xl">
                            <div class="flex items-center gap-4">
                                <span class="w-11 h-11 rounded-xl bg-primary/10 text-primary font-bold text-lg flex items-center justify-center shrink-0">2</span>
                                <h2 class="text-xl md:text-2xl font-bold text-slate-900 dark:text-white">Course 4</h2>
                            </div>
                            <button @click="active = null" class="w-9 h-9 rounded-full flex items-center justify-center text-slate-400 hover:text-slate-700 hover:bg-gray-100 dark:hover:bg-slate-700 dark:hover:text-white transition-colors shrink-0" aria-label="Close">
                                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18M6 6l12 12"/></svg>
                            </button>
                        </div>
                        <div class="px-6 md:px-8 py-7 space-y-6">
                            <div>
                                <p class="text-xs font-semibold uppercase tracking-wide text-primary mb-1.5">What is it</p>
                                <p class="text-slate-600 dark:text-gray-300 leading-relaxed">Course 4 is a 3 month residential programme for young men and women who have just completed Form Four.</p>
                            </div>
                            <div>
                                <p class="text-xs font-semibold uppercase tracking-wide text-primary mb-1.5">Why it exists</p>
                                <p class="text-slate-600 dark:text-gray-300 leading-relaxed">Many capable Form Four leavers have nowhere to go next no money for further school, no work experience, and no guidance. Course 4 closes the gap between leaving school and stepping into real life.</p>
                            </div>
                            <div>
                                <p class="text-xs font-semibold uppercase tracking-wide text-primary mb-1.5">Who it's for</p>
                                <p class="text-slate-600 dark:text-gray-300 leading-relaxed">Form Four school leavers, in gender balanced cohorts.</p>
                            </div>
                            <div>
                                <p class="text-xs font-semibold uppercase tracking-wide text-primary mb-1.5">What participants learn</p>
                                <p class="text-slate-600 dark:text-gray-300 leading-relaxed">Practical trades (smart horticulture, baking, juice making, batiki and soap making, event decoration, graphic design); business plan development and pitching to real investors; personal finance and responsible use of financial institutions; digital and social media literacy; ethical leadership and community service; resilience and teamwork, including a Mt Meru summit challenge.</p>
                            </div>
                            <div>
                                <p class="text-xs font-semibold uppercase tracking-wide text-primary mb-1.5">Duration &amp; location</p>
                                <p class="text-slate-600 dark:text-gray-300 leading-relaxed">3 months, residential, at the TFL Campus in Moshi.</p>
                            </div>
                            <div>
                                <p class="text-xs font-semibold uppercase tracking-wide text-primary mb-1.5">Expected outcomes</p>
                                <p class="text-slate-600 dark:text-gray-300 leading-relaxed">Graduates leave with three certificates and the confidence, work readiness, and direction to pursue further education, employment, or self employment.</p>
                            </div>
                            <div class="bg-primary/5 dark:bg-slate-700/50 border-l-4 border-primary p-5 rounded-r-2xl">
                                <p class="text-xs font-semibold uppercase tracking-wide text-primary mb-1.5">Results to date</p>
                                <p class="text-slate-700 dark:text-gray-200 leading-relaxed">26 Form Four leavers completed Course 4 in 2025, part of a 98% overall completion rate across TFL's residential programmes that year.</p>
                            </div>
                        </div>
                        {{-- TODO (pending TFL confirmation): eligibility/application process, next intake dates, and any cost to participants. Add once confirmed. --}}
                    </div>
                </div>

                <!-- ===== MODAL 3: Soma na Matumaini ===== -->
                <div x-show="active === 'soma-na-matumaini'" x-cloak
                     class="fixed inset-0 z-50 flex items-center justify-center p-4 md:p-8"
                     x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                     x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                    <div class="absolute inset-0 bg-slate-950/70 backdrop-blur-sm" @click="active = null"></div>
                    <div class="relative bg-white dark:bg-slate-800 rounded-3xl shadow-2xl w-full max-w-2xl max-h-[85vh] overflow-y-auto"
                         x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                         x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95">
                        <div class="sticky top-0 bg-white dark:bg-slate-800 border-b border-gray-100 dark:border-gray-700 px-6 md:px-8 py-5 flex items-center justify-between rounded-t-3xl">
                            <div class="flex items-center gap-4">
                                <span class="w-11 h-11 rounded-xl bg-primary/10 text-primary font-bold text-lg flex items-center justify-center shrink-0">3</span>
                                <h2 class="text-xl md:text-2xl font-bold text-slate-900 dark:text-white">Soma na Matumaini</h2>
                            </div>
                            <button @click="active = null" class="w-9 h-9 rounded-full flex items-center justify-center text-slate-400 hover:text-slate-700 hover:bg-gray-100 dark:hover:bg-slate-700 dark:hover:text-white transition-colors shrink-0" aria-label="Close">
                                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18M6 6l12 12"/></svg>
                            </button>
                        </div>
                        <div class="px-6 md:px-8 py-7 space-y-6">
                            <div>
                                <p class="text-xs font-semibold uppercase tracking-wide text-primary mb-1.5">What is it</p>
                                <p class="text-slate-600 dark:text-gray-300 leading-relaxed">Soma na Matumaini (Study with Hope) is TFL's scholarship programme for talented young Tanzanians whose education was cut short by poverty.</p>
                            </div>
                            <div>
                                <p class="text-xs font-semibold uppercase tracking-wide text-primary mb-1.5">Why it exists</p>
                                <p class="text-slate-600 dark:text-gray-300 leading-relaxed">Every year, capable students drop out of secondary school only because their families can no longer afford fees not because they lack ability. Soma na Matumaini puts them back on the path they should never have left.</p>
                            </div>
                            <div>
                                <p class="text-xs font-semibold uppercase tracking-wide text-primary mb-1.5">Who it's for</p>
                                <p class="text-slate-600 dark:text-gray-300 leading-relaxed">Secondary school dropouts from high poverty regions, selected for demonstrated talent and drive.</p>
                            </div>
                            <div>
                                <p class="text-xs font-semibold uppercase tracking-wide text-primary mb-1.5">What scholars receive</p>
                                <p class="text-slate-600 dark:text-gray-300 leading-relaxed">Full education costs tuition, books, uniforms, and supplies plus a 7 day residential leadership camp at the TFL Campus in Moshi and ongoing quarterly check-ins throughout their studies.</p>
                            </div>
                            <div>
                                <p class="text-xs font-semibold uppercase tracking-wide text-primary mb-1.5">Location</p>
                                <p class="text-slate-600 dark:text-gray-300 leading-relaxed">Scholars study in their home regions; the leadership camp is held at the TFL Campus in Moshi.</p>
                            </div>
                            <div>
                                <p class="text-xs font-semibold uppercase tracking-wide text-primary mb-1.5">Expected outcomes</p>
                                <p class="text-slate-600 dark:text-gray-300 leading-relaxed">Scholars complete their education and join TFL's covenant of young leaders who mentor future cohorts.</p>
                            </div>
                        </div>
                        {{-- TODO (pending TFL confirmation): 2026 is this programme's first year of full rollout per TFL's Strategic Plan -- publish first-cohort results once available rather than a placeholder figure. Also confirm eligibility/application process and next intake. --}}
                    </div>
                </div>

                <!-- ===== MODAL 4: TFL Farm ===== -->
                <div x-show="active === 'tfl-farm'" x-cloak
                     class="fixed inset-0 z-50 flex items-center justify-center p-4 md:p-8"
                     x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                     x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                    <div class="absolute inset-0 bg-slate-950/70 backdrop-blur-sm" @click="active = null"></div>
                    <div class="relative bg-white dark:bg-slate-800 rounded-3xl shadow-2xl w-full max-w-2xl max-h-[85vh] overflow-y-auto"
                         x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                         x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95">
                        <div class="sticky top-0 bg-white dark:bg-slate-800 border-b border-gray-100 dark:border-gray-700 px-6 md:px-8 py-5 flex items-center justify-between rounded-t-3xl">
                            <div class="flex items-center gap-4">
                                <span class="w-11 h-11 rounded-xl bg-primary/10 text-primary font-bold text-lg flex items-center justify-center shrink-0">4</span>
                                <h2 class="text-xl md:text-2xl font-bold text-slate-900 dark:text-white">TFL Farm</h2>
                            </div>
                            <button @click="active = null" class="w-9 h-9 rounded-full flex items-center justify-center text-slate-400 hover:text-slate-700 hover:bg-gray-100 dark:hover:bg-slate-700 dark:hover:text-white transition-colors shrink-0" aria-label="Close">
                                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18M6 6l12 12"/></svg>
                            </button>
                        </div>
                        <div class="px-6 md:px-8 py-7 space-y-6">
                            <div>
                                <p class="text-xs font-semibold uppercase tracking-wide text-primary mb-1.5">What is it</p>
                                <p class="text-slate-600 dark:text-gray-300 leading-relaxed">TFL Farm is our practical agricultural incubation hub on 5 acres of land in Kawawa Village, Moshi District.</p>
                            </div>
                            <div>
                                <p class="text-xs font-semibold uppercase tracking-wide text-primary mb-1.5">Why it exists</p>
                                <p class="text-slate-600 dark:text-gray-300 leading-relaxed">Agriculture is the backbone of Tanzania's economy and one of the most viable paths into youth employment but most young people are never shown how to run it as a business. TFL Farm proves that farming, done well, is a profitable, modern enterprise.</p>
                            </div>
                            <div>
                                <p class="text-xs font-semibold uppercase tracking-wide text-primary mb-1.5">Who it's for</p>
                                <p class="text-slate-600 dark:text-gray-300 leading-relaxed">Kijana Fursa participants and graduates, and TFL programme cohorts more broadly.</p>
                            </div>
                            <div>
                                <p class="text-xs font-semibold uppercase tracking-wide text-primary mb-1.5">What participants learn</p>
                                <p class="text-slate-600 dark:text-gray-300 leading-relaxed">Smart farming technologies, greenhouse management, horticulture, modern livestock keeping, and value chain addition.</p>
                            </div>
                            <div class="bg-primary/5 dark:bg-slate-700/50 border-l-4 border-primary p-5 rounded-r-2xl">
                                <p class="text-xs font-semibold uppercase tracking-wide text-primary mb-1.5">Results to date</p>
                                <p class="text-slate-700 dark:text-gray-200 leading-relaxed">The land was purchased outright in 2025 by TFL's alumni community for TZS 30 million. The first cultivation cycle produced 33 bags (100kg each) of maize. The farm is intended to progressively fund TFL's other programmes, reducing dependence on donor cycles.</p>
                            </div>
                            <div>
                                <p class="text-xs font-semibold uppercase tracking-wide text-primary dark:text-primay mb-1.5">What's next (goal, not yet achieved)</p>
                                <p class="text-slate-600 dark:text-gray-300 leading-relaxed">Poultry, goats, pigs, and fish will be introduced progressively as each enterprise proves viable, with a longer term aim of the farm covering 15%&ndash;20% of TFL's operating costs.</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </main>

    <!-- Footer Section -->
    @include('partials.footer')

    <!-- Scroll to Top Button -->
    <button x-data="{ show: false }"
            @scroll.window="show = window.pageYOffset > 300"
            @click="window.scrollTo({ top: 0, behavior: 'smooth' })"
            x-show="show"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-10"
            x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 translate-y-10"
            class="fixed bottom-8 right-8 z-50 p-3 rounded-full bg-primary hover:bg-orange-600 text-white shadow-xl focus:outline-none transform transition-transform hover:-translate-y-1 cursor-pointer"
            style="display: none;"
            aria-label="Scroll to top">
        <!-- Up Arrow Icon -->
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M5 10l7-7m0 0l7 7m-7-7v18" />
        </svg>
    </button>

</body>
</html>