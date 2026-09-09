<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Our Impact - Training For Life (TFL)</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* Page-wide subtle dotted/grid background (low opacity so it stays quiet behind content) */
        .tfl-page-bg {
            position: relative;
        }
        .tfl-page-bg::before {
            content: "";
            position: absolute;
            inset: 0;
            z-index: 0;
            pointer-events: none;
            background-color: #E5E5F7;
            opacity: 0.1;
            background-image:
                repeating-radial-gradient(circle at 0 0, transparent 0, #E5E5F7 23px),
                repeating-linear-gradient(#444CF755, #444CF7);
        }
        .tfl-page-bg > * {
            position: relative;
            z-index: 1;
        }

        /* Soft orange -> dark blue gradient for stat / content cards (kept gentle, not glossy) */
        .tfl-card-gradient {
            background-image: linear-gradient(135deg, rgba(249, 115, 22, 0.10) 0%, rgba(30, 41, 59, 0.10) 100%);
            background-color: #ffffff;
        }
        .dark .tfl-card-gradient {
            background-image: linear-gradient(135deg, rgba(249, 115, 22, 0.18) 0%, rgba(15, 23, 42, 0.55) 100%);
            background-color: rgb(30 41 59);
        }
    </style>
</head>
<body class="font-sans antialiased bg-white text-gray-800 dark:bg-slate-900 dark:text-gray-200 transition-colors duration-300">

    @include('partials.header')

    <main class="tfl-page-bg pt-32 pb-20 bg-gray-50 dark:bg-slate-900 min-h-screen transition-colors duration-500">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="text-center mb-16">
                <h1 class="text-4xl md:text-5xl font-bold text-slate-900 dark:text-white mb-4">Our 2025 Impact</h1>
                <div class="w-24 h-1 bg-primary mx-auto rounded-full"></div>
                <p class="mt-6 text-lg text-slate-600 dark:text-gray-400 max-w-3xl mx-auto">
                    Measuring our commitment to youth empowerment through tangible assets and powerful partnerships.
                </p>
            </div>

            {{-- 4.1 TFL at a Glance --}}
            <section class="mb-24">
                <div class="mb-10">
                    <h2 class="text-2xl md:text-3xl font-bold text-slate-900 dark:text-white mt-1">Results — TFL at a Glance (2025)</h2>
                </div>

                <div class="grid grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="tfl-card-gradient p-8 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-800 text-center">
                        <div class="text-4xl font-bold text-primary mb-2">52</div>
                        <p class="text-slate-600 dark:text-gray-300 font-medium">Youth Trained in 2025</p>
                        <p class="text-sm text-slate-500 dark:text-gray-400 mt-2">26 Course 4 &amp; 26 Kijana Fursa graduates.</p>
                    </div>
                    <div class="tfl-card-gradient p-8 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-800 text-center">
                        <div class="text-4xl font-bold text-primary mb-2">845+</div>
                        <p class="text-slate-600 dark:text-gray-300 font-medium">Alumni Strong</p>
                        <p class="text-sm text-slate-500 dark:text-gray-400 mt-2">Grew by 52 members in 2025.</p>
                    </div>
                    <div class="tfl-card-gradient p-8 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-800 text-center">
                        <div class="text-4xl font-bold text-primary mb-2">13</div>
                        <p class="text-slate-600 dark:text-gray-300 font-medium">Businesses Launched</p>
                        <p class="text-sm text-slate-500 dark:text-gray-400 mt-2">Started by 2025 graduates.</p>
                    </div>
                    <div class="tfl-card-gradient p-8 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-800 text-center">
                        <div class="text-4xl font-bold text-primary mb-2">89%</div>
                        <p class="text-slate-600 dark:text-gray-300 font-medium">To Programmes</p>
                        <p class="text-sm text-slate-500 dark:text-gray-400 mt-2">Of every shilling spent — only 11% went to administration.</p>
                    </div>
                </div>

                {{-- Legacy strip: founding year + land --}}
                <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div class="tfl-card-gradient flex items-center gap-6 rounded-2xl p-8 border border-primary/20 dark:border-gray-700">
                        <div class="text-5xl font-bold text-primary leading-none">30</div>
                        <div>
                            <p class="text-slate-800 dark:text-gray-200 font-medium">Years of TFL</p>
                            <p class="text-sm text-slate-500 dark:text-gray-400 mt-1">Founded in 1996, still opening doors for young people in 2026.</p>
                        </div>
                    </div>
                    <div class="tfl-card-gradient flex items-center gap-6 rounded-2xl p-8 border border-primary/20 dark:border-gray-700">
                        <div class="text-5xl font-bold text-primary leading-none">5</div>
                        <div>
                            <p class="text-slate-800 dark:text-gray-200 font-medium">Acres in Kawawa Village</p>
                            <p class="text-sm text-slate-500 dark:text-gray-400 mt-1">Farmland purchased outright by TFL's alumni community.</p>
                        </div>
                    </div>
                </div>
            </section>

            {{-- Strategic Asset Development & Partnerships --}}
            <section class="mb-24">
                <div class="tfl-card-gradient rounded-3xl p-8 md:p-12 border border-primary/20 dark:border-gray-700">
                    <h2 class="text-2xl font-bold text-slate-900 dark:text-white mb-6">Strategic Asset Development &amp; Partnerships</h2>
                    <ul class="space-y-4 text-slate-600 dark:text-gray-300">
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-primary mr-3 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            <span>Our Alumni Collective purchased a 5-acre plot of land in Kawawa Village for TZS 30 Million.</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-primary mr-3 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            <span>In its first cultivation cycle on the new land, we successfully harvested 33 bags of maize.</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-primary mr-3 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            <span>Collaboration with CRDB Bank Foundation established a Seed Capital zero-interest Loan Fund, providing graduates TZS 500,000 to TZS 5 million.</span>
                        </li>
                    </ul>
                </div>
            </section>

            {{-- 4.2 Success Stories --}}
            <section class="mb-24">
                <div class="mb-10">
                    <h2 class="text-2xl md:text-3xl font-bold text-slate-900 dark:text-white mt-1">Success Stories</h2>
                </div>

                <!-- Adjusted grid gap to 6 for a more compact look -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    
                    {{-- Aingaya Lema --}}
                    <!-- Reduced padding from p-8 to p-6 to make card smaller -->
                    <article class="tfl-card-gradient relative rounded-2xl border border-gray-100 dark:border-gray-800 p-6 overflow-hidden">
                        
                        <!-- New Quote Icon positioned on the right side -->
                        <svg class="absolute right-4 top-1/2 -translate-y-1/2 w-20 h-20 text-primary/50 dark:text-primary/30 pointer-events-none z-0" fill="currentColor" viewBox="0 0 290 290">
                            <path d="M267.88 145V47.35h-97.65V145h48.82c0 26.92-21.9 48.82-48.82 48.82v48.82c53.93.01 97.65-43.71 97.65-97.64zM22.12 193.82v48.82c53.93 0 97.65-43.72 97.65-97.65V47.35H22.12V145h48.82c.01 26.92-21.89 48.82-48.82 48.82z"></path>
                        </svg>

                        <!-- Added z-10 and relative so text stays above the background quote -->
                        <div class="relative z-10 pr-6">
                            <!-- Reduced avatar size to w-12 h-12 -->
                            <div class="flex items-center gap-4 mb-4">
                                <div class="w-12 h-12 rounded-full bg-primary/30 text-primary flex items-center justify-center font-semibold text-lg flex-shrink-0">AL</div>
                                <div>
                                    <p class="font-semibold text-slate-900 dark:text-white">Aingaya Lema</p>
                                    <p class="text-sm text-slate-500 dark:text-gray-400">Kijana Fursa Alumnus, 2024</p>
                                </div>
                            </div>
                            <p class="text-slate-600 dark:text-gray-300 mb-3 text-sm md:text-base">
                                Aingaya is now a trainee facilitator with TFL, guiding new Kijana Fursa students through the same programme that shaped his own path.
                            </p>
                            <p class="text-slate-800 dark:text-gray-200 font-medium italic">"I want to give back what was given to me."</p>
                        </div>
                    </article>

                    {{-- Victoria Kessy --}}
                    <article class="tfl-card-gradient relative rounded-2xl border border-gray-100 dark:border-gray-800 p-6 overflow-hidden">
                        
                        <!-- New Quote Icon positioned on the right side -->
                        <svg class="absolute right-4 top-1/2 -translate-y-1/2 w-20 h-20 text-primary/50 dark:text-primary/30 pointer-events-none z-0" fill="currentColor" viewBox="0 0 290 290">
                            <path d="M267.88 145V47.35h-97.65V145h48.82c0 26.92-21.9 48.82-48.82 48.82v48.82c53.93.01 97.65-43.71 97.65-97.64zM22.12 193.82v48.82c53.93 0 97.65-43.72 97.65-97.65V47.35H22.12V145h48.82c.01 26.92-21.89 48.82-48.82 48.82z"></path>
                        </svg>

                        <div class="relative z-10 pr-6">
                            <div class="flex items-center gap-4 mb-4">
                                <div class="w-12 h-12 rounded-full bg-primary/30 text-primary flex items-center justify-center font-semibold text-lg flex-shrink-0">VK</div>
                                <div>
                                    <p class="font-semibold text-slate-900 dark:text-white">Victoria Kessy</p>
                                    <p class="text-sm text-slate-500 dark:text-gray-400">Class of 2019 Alumna</p>
                                </div>
                            </div>
                            <p class="text-slate-600 dark:text-gray-300 mb-3 text-sm md:text-base">
                                Victoria is now a teacher at New Beginning Primary School in Mwereni, shaping the next generation of learners.
                            </p>
                            <p class="text-slate-800 dark:text-gray-200 font-medium italic">"TFL equipped me with self-management skills, courage, and resilience."</p>
                        </div>
                    </article>
                </div>
            </section>

            {{-- 4.3 Alumni --}}
            <section>
                <div class="mb-10">
                    <h2 class="text-2xl md:text-3xl font-bold text-slate-900 dark:text-white mt-1">Alumni</h2>
                </div>

                <div class="tfl-card-gradient rounded-3xl border border-gray-100 dark:border-gray-800 p-8 md:p-12">
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-10 items-start">
                        <div class="lg:col-span-2">
                            <p class="text-slate-600 dark:text-gray-300 leading-relaxed">
                                TFL's alumni network has grown to more than 845 members — our most powerful proof of impact. In 2025, alumni didn't just stay connected: they raised the funds to purchase 5 acres of land for TFL's farm, and they volunteered as mentors for the newest Course 4 and Kijana Fursa cohorts.
                            </p>
                            <a href="#" class="inline-flex items-center gap-2 mt-6 px-6 py-3 bg-primary text-white font-medium rounded-full hover:bg-primary/90 transition-colors">
                                Become an alumni member
                            </a>
                        </div>
                        <div class="border-t lg:border-t-0 lg:border-l border-gray-100 dark:border-gray-700 pt-8 lg:pt-0 lg:pl-10">
                            <div class="text-4xl font-bold text-primary mb-1">845+</div>
                            <p class="text-sm text-slate-500 dark:text-gray-400 mb-6">Members strong</p>
                            <div class="text-4xl font-bold text-primary mb-1">52</div>
                            <p class="text-sm text-slate-500 dark:text-gray-400">New members in 2025</p>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </main>

    @include('partials.footer')
</body>
</html>