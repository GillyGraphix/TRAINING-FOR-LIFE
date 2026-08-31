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
                    Empowering Tanzanian youth through targeted interventions, practical skills, and life-changing opportunities.
                </p>
            </div>

            <!-- Programmes List -->
            <div class="space-y-12">

                <!-- 1. KIJANA FURSA PROGRAM -->
                <div class="bg-white dark:bg-slate-800 rounded-3xl shadow-sm border border-gray-100 dark:border-gray-800 overflow-hidden transition-transform duration-300 hover:shadow-md">
                    <div class="p-8 md:p-12">
                        <div class="flex items-center mb-6">
                            <span class="flex items-center justify-center w-14 h-14 rounded-xl bg-primary/10 text-primary mr-5 font-bold text-2xl">1</span>
                            <h2 class="text-2xl md:text-3xl font-bold text-slate-900 dark:text-white">KIJANA FURSA PROGRAM</h2>
                        </div>
                        
                        <p class="text-slate-600 dark:text-gray-300 leading-relaxed mb-6">
                            The Kijana Fursa program, initiated in 2024, is a five-year project aimed at empowering Tanzanian youth from economically disadvantaged backgrounds by equipping them with essential life skills and entrepreneurship training, particularly in agriculture. The program’s primary objective is to enable young participants to establish self-sustaining ventures, with a focus on agriculture, whereby the participants are linked to potential funders of seed capital.
                        </p>
                        
                        <p class="text-slate-600 dark:text-gray-300 leading-relaxed mb-6">
                            The programme combines practical skills training, life-skills development, mentorship, and exposure to real-world opportunities. Participants engage in a structured journey that builds both personal and professional capacity from self-awareness, goal setting, and leadership to entrepreneurship, employability, and financial literacy. The programme creates a safe, supportive environment where young people can discover their strengths, sharpen their talents, and connect with mentors and peers who believe in their growth.
                        </p>

                        <p class="text-slate-600 dark:text-gray-300 leading-relaxed mb-8">
                            By the end of their journey, Kijana Fursa graduates emerge equipped not only with skills, but with the confidence and vision to pursue meaningful livelihoods, contribute to their communities, and become role models for the next generation of Tanzanian youth.
                        </p>

                        <!-- Highlight Box -->
                        <div class="bg-primary/5 dark:bg-slate-700/50 border-l-4 border-primary p-6 rounded-r-2xl">
                            <p class="text-slate-700 dark:text-gray-200 font-medium italic leading-relaxed">
                                Kijana Fursa is TFL's flagship entrepreneurship program for young Tanzanians who are ready to create their own jobs instead of waiting for one. Through practical business training, seed capital linkages, savings groups and ongoing mentorship, we equip youth with the skills, capital, and confidence to launch and grow their own enterprises because opportunity, not employment, is what changes a young person's life.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- 2. COURSE 4 PROGRAM -->
                <div class="bg-white dark:bg-slate-800 rounded-3xl shadow-sm border border-gray-100 dark:border-gray-800 overflow-hidden transition-transform duration-300 hover:shadow-md">
                    <div class="p-8 md:p-12">
                        <div class="flex items-center mb-6">
                            <span class="flex items-center justify-center w-14 h-14 rounded-xl bg-primary/10 text-primary mr-5 font-bold text-2xl">2</span>
                            <h2 class="text-2xl md:text-3xl font-bold text-slate-900 dark:text-white">COURSE 4 PROGRAM</h2>
                        </div>
                        
                        <p class="text-slate-600 dark:text-gray-300 leading-relaxed mb-8">
                            Course 4 is a transformative 3-month residential program for young men and women who have completed Form Four. We prepare them for what comes next (high school, college or self-employment) by closing the gap between leaving school and stepping into real life. Through self-assessment, career guidance, work placements, business training, computer literacy, hands-on vocational skills, smart farming, leadership and a final mountain summit challenge. Participants leave with three certificates and something more valuable: working skills, confidence, and a clear sense of direction.
                        </p>

                        <!-- Highlight Box -->
                        <div class="bg-primary/5 dark:bg-slate-700/50 border-l-4 border-primary p-6 rounded-r-2xl">
                            <p class="text-slate-700 dark:text-gray-200 font-medium italic leading-relaxed">
                                A 3-month residential journey that turns Form Four leavers into job creators, leaders, and changemakers — through real skills, real work, and a real summit.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- 3. SOMA NA MATUMAINI -->
                <div class="bg-white dark:bg-slate-800 rounded-3xl shadow-sm border border-gray-100 dark:border-gray-800 overflow-hidden transition-transform duration-300 hover:shadow-md">
                    <div class="p-8 md:p-12">
                        <div class="flex items-center mb-6">
                            <span class="flex items-center justify-center w-14 h-14 rounded-xl bg-primary/10 text-primary mr-5 font-bold text-2xl">3</span>
                            <h2 class="text-2xl md:text-3xl font-bold text-slate-900 dark:text-white">SOMA NA MATUMAINI</h2>
                        </div>
                        
                        <p class="text-slate-600 dark:text-gray-300 leading-relaxed mb-6">
                            Soma na Matumaini ‘Study with Hope’, is TFL's flagship scholarship programme for talented young Tanzanians whose education was cut short by poverty. We identify boys and girls who dropped out of secondary school not because they lacked ability, but because their families could no longer afford the cost and we put them back on the path they should never have left.
                        </p>
                        
                        <p class="text-slate-600 dark:text-gray-300 leading-relaxed mb-6">
                            The program covers all education costs: tuition, books, uniforms, supplies and the support needed to keep a young scholar in school until completion. But Soma na Matumaini is more than school fees. Every scholar joins a 7-day residential leadership camp at the TFL Campus in Moshi, where they meet peers from across the country, build life skills, and become part of a covenant of young leaders committed to lifting up the next generation.
                        </p>

                        <p class="text-slate-600 dark:text-gray-300 leading-relaxed mb-8">
                            We believe poverty should never determine destiny. With Soma na Matumaini, talented young Tanzanians get the second chance they have always deserved and the country gains the leaders it needs.
                        </p>

                        <!-- Highlight Box -->
                        <div class="bg-primary/5 dark:bg-slate-700/50 border-l-4 border-primary p-6 rounded-r-2xl">
                            <p class="text-slate-700 dark:text-gray-200 font-medium italic leading-relaxed">
                                Soma na Matumaini is TFL's flagship scholarship program for talented young Tanzanians whose education was cut short by poverty. We cover the full cost of returning to school and welcome every scholar into a community of young leaders, because poverty should never determine destiny.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- 4. TFL FARM PROGRAM (Mpya) -->
                <div class="bg-white dark:bg-slate-800 rounded-3xl shadow-sm border border-gray-100 dark:border-gray-800 overflow-hidden transition-transform duration-300 hover:shadow-md">
                    <div class="p-8 md:p-12">
                        <div class="flex items-center mb-6">
                            <span class="flex items-center justify-center w-14 h-14 rounded-xl bg-primary/10 text-primary mr-5 font-bold text-2xl">4</span>
                            <h2 class="text-2xl md:text-3xl font-bold text-slate-900 dark:text-white">TFL FARM PROGRAM</h2>
                        </div>
                        
                        <p class="text-slate-600 dark:text-gray-300 leading-relaxed mb-6">
                            TFL Farm serves as our dynamic agricultural incubation and hands-on training hub. Recognizing that agriculture remains the backbone of Tanzania's economy and the most viable gateway to youth employment, this program transforms traditional farming into a profitable, high-tech, and modern agribusiness venture for the younger generation.
                        </p>
                        
                        <p class="text-slate-600 dark:text-gray-300 leading-relaxed mb-6">
                            At TFL Farm, participants move beyond theory. They undergo rigorous practical training in smart-farming technologies, greenhouse management, horticulture, modern livestock keeping, and value chain addition. The farm acts as an experiential laboratory where youth cultivate not only crops and livestock, but also the discipline, resilience, and business acumen required to commercialize agriculture.
                        </p>

                        <p class="text-slate-600 dark:text-gray-300 leading-relaxed mb-8">
                            By merging food security with agripreneurship, TFL Farm ensures that young people view farming not as a fallback option for the destitute, but as a lucrative, dignified, and sustainable career path that drives rural and national economic transformation.
                        </p>

                        <!-- Highlight Box -->
                        <div class="bg-primary/5 dark:bg-slate-700/50 border-l-4 border-primary p-6 rounded-r-2xl">
                            <p class="text-slate-700 dark:text-gray-200 font-medium italic leading-relaxed">
                                TFL Farm is our practical agricultural incubation hub where youth master smart farming, modern agribusiness, and value addition. We turn soil into success, proving that agriculture is a thriving business enterprise capable of generating sustainable wealth and employment for the youth.
                            </p>
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