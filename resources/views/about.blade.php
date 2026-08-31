<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>About Us - Training For Life (TFL)</title>

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

    <!-- About Us Content Section -->
    <main class="pt-32 pb-20 bg-gray-50 dark:bg-slate-900 min-h-screen transition-colors duration-500">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Page Header -->
            <div class="text-center max-w-3xl mx-auto mb-20">
                <span class="text-primary font-bold text-xs uppercase tracking-[0.25em] bg-primary/10 px-4 py-1.5 rounded-full">Discover TFL</span>
                <h1 class="text-4xl md:text-6xl font-extrabold text-slate-900 dark:text-white mt-4 mb-6">Organisational Identity & Values</h1>
                <p class="text-slate-600 dark:text-gray-300 text-base md:text-lg">Breaking the cycle of poverty through strategic youth empowerment and sustainable community leadership.</p>
                <div class="w-24 h-1 bg-primary mx-auto rounded-full mt-6"></div>
            </div>

            <!-- Section 1.1: Who We Are & Story (Imesawazishwa ili kuzuia nafasi tupu) -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 mb-20 items-stretch">
                
                <!-- Who we are (Left Column - Span 5) -->
                <div class="lg:col-span-5 flex flex-col justify-between space-y-6">
                    <div class="bg-white dark:bg-slate-800 p-8 md:p-10 rounded-3xl shadow-sm border border-gray-100 dark:border-slate-700/80 flex-1 flex flex-col justify-between">
                        <div>
                            <h2 class="text-2xl font-bold text-slate-900 dark:text-white mb-6 flex items-center">
                                <span class="w-10 h-10 rounded-xl bg-primary/10 text-primary flex items-center justify-center mr-3 text-base">1.1</span> Who We Are
                            </h2>
                            <p class="text-slate-600 dark:text-gray-300 leading-relaxed text-base">
                                TFL (Training For Life) is a Tanzanian youth- centered NGO dedicated to breaking the cycle of poverty through strategic unemployment solutions. We identify, train and mentor talented young leaders from economically disadvantaged families equipping them with market-driven skills, scholarships an entrepreneurship pathways to become job creators and community change makers. TFL was founded in 1996 and its headquarters are in Moshi, Kilimanjaro.
                            </p>
                        </div>
                        <div class="mt-8 pt-6 border-t border-gray-100 dark:border-slate-700 flex items-center justify-between text-xs font-bold text-primary uppercase tracking-wider">
                            <span>Established 1996</span>
                            <span>Moshi, Tanzania</span>
                        </div>
                    </div>

                    <!-- Kakitu Ka Ziada ka Kuondoa Nafasi Tupu (Impact Quick Box) -->
                    <div class="bg-slate-900 text-white p-8 rounded-3xl shadow-xl relative overflow-hidden flex items-center justify-between">
                        <div class="absolute -right-10 -bottom-10 w-32 h-32 bg-primary/20 rounded-full blur-2xl"></div>
                        <div class="relative z-10">
                            <span class="text-xs font-bold uppercase tracking-widest text-orange-400">Our Commitment</span>
                            <h4 class="text-xl font-bold mt-1">Empowering Generations</h4>
                        </div>
                        <div class="w-12 h-12 rounded-2xl bg-primary text-white flex items-center justify-center shadow-lg relative z-10">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                        </div>
                    </div>
                </div>

                <!-- Our Founding Story & Commitment (Right Column - Span 7) -->
                <div class="lg:col-span-7 bg-white dark:bg-slate-800 p-8 md:p-10 rounded-3xl shadow-sm border border-gray-100 dark:border-slate-700/80 flex flex-col justify-between">
                    <h2 class="text-2xl font-bold text-slate-900 dark:text-white mb-6">Our Founding Story & Commitment</h2>
                    
                    <div class="space-y-4 text-slate-600 dark:text-gray-300 leading-relaxed text-sm md:text-base">
                        <p>
                            In 1996, Training for Life was born from a simple, powerful belief, <span class="italic font-medium text-slate-900 dark:text-white bg-primary/5 px-2 py-0.5 rounded">“that every young person, regardless of their background, holds the potential to become a leader and a catalyst for change in their own community.”</span>
                        </p>
                        <p>
                            We are a Tanzanian non-governmental organization dedicated to empowering youth (ages 15-35) from marginalized communities. We do this through practical, life-changing interventions: life skills trainings, job readiness training, entrepreneurship trainings, tangible skills, and educational scholarships. Registered in 2007 with registration number 00NGO/0245 to operate in Tanzania Mainland.
                        </p>
                        <p>
                            This Human Resources Manual is the blueprint for how we turn our belief into action. It is a declaration of our commitment to building an organization as strong and resilient as the youth we serve. It ensures that every member of our team from our Board of Directors to our field facilitators is united, empowered, and aligned to deliver exceptional, measurable impact. We pledge to be outstanding stewards of the trust and resources granted to us by our donors, our communities, and the young people who inspire us every day.
                        </p>
                    </div>
                </div>

            </div>

            <!-- Section 1.2: Vision, Mission & Core Belief -->
            <div class="mb-20">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-slate-900 dark:text-white">
                        <span class="text-primary mr-2">1.2</span> Why We Exist
                    </h2>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Vision -->
                    <div class="bg-white dark:bg-slate-800 p-8 rounded-3xl shadow-sm border border-gray-100 dark:border-slate-700 hover:-translate-y-1 transition-all duration-300 relative overflow-hidden group">
                        <div class="absolute top-0 left-0 right-0 h-1.5 bg-primary"></div>
                        <div class="w-12 h-12 rounded-2xl bg-primary/10 text-primary flex items-center justify-center font-bold mb-6 group-hover:bg-primary group-hover:text-white transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-4 tracking-wide">Our Vision</h3>
                        <p class="text-slate-600 dark:text-gray-300 text-sm leading-relaxed">
                            A future where every young person in Tanzania has the skills, confidence, and opportunity to build a thriving life and lead their community toward decent life.
                        </p>
                    </div>
                    <!-- Mission -->
                    <div class="bg-white dark:bg-slate-800 p-8 rounded-3xl shadow-sm border border-gray-100 dark:border-slate-700 hover:-translate-y-1 transition-all duration-300 relative overflow-hidden group">
                        <div class="absolute top-0 left-0 right-0 h-1.5 bg-primary"></div>
                        <div class="w-12 h-12 rounded-2xl bg-primary/10 text-primary flex items-center justify-center font-bold mb-6 group-hover:bg-primary group-hover:text-white transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-4 tracking-wide">Our Mission</h3>
                        <p class="text-slate-600 dark:text-gray-300 text-sm leading-relaxed">
                            To empower youth from marginalized communities with practical life skills, tangible knowledge, and educational support, fostering a generation of resilient, ethical, and self-reliant leaders.
                        </p>
                    </div>
                    <!-- Core Belief -->
                    <div class="bg-white dark:bg-slate-800 p-8 rounded-3xl shadow-sm border border-gray-100 dark:border-slate-700 hover:-translate-y-1 transition-all duration-300 relative overflow-hidden group">
                        <div class="absolute top-0 left-0 right-0 h-1.5 bg-primary"></div>
                        <div class="w-12 h-12 rounded-2xl bg-primary/10 text-primary flex items-center justify-center font-bold mb-6 group-hover:bg-primary group-hover:text-white transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-4 tracking-wide">Core Belief</h3>
                        <p class="text-slate-600 dark:text-gray-300 text-sm leading-relaxed">
                            Unemployment is not a lack of ability. It is a lack of opportunity. When a talented young person cannot afford school or training, poverty is not their failure; it is a system failure. TFL exists to fix that system, one young leader at a time.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Section 1.3: Core Values -->
            <div>
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-slate-900 dark:text-white">
                        <span class="text-primary mr-2">1.3</span> Core Values
                    </h2>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Empowerment -->
                    <div class="bg-white dark:bg-slate-800 p-8 rounded-2xl shadow-sm border border-gray-100 dark:border-slate-700 hover:-translate-y-1 transition-all duration-300">
                        <h4 class="text-lg font-bold text-primary mb-3 flex items-center">
                            <span class="w-2 h-2 rounded-full bg-primary mr-2"></span> a. Empowerment
                        </h4>
                        <p class="text-slate-600 dark:text-gray-300 text-sm leading-relaxed">We believe in handing over the tools, not just providing the solution. We equip youth to drive their own development.</p>
                    </div>
                    <!-- Integrity -->
                    <div class="bg-white dark:bg-slate-800 p-8 rounded-2xl shadow-sm border border-gray-100 dark:border-slate-700 hover:-translate-y-1 transition-all duration-300">
                        <h4 class="text-lg font-bold text-primary mb-3 flex items-center">
                            <span class="w-2 h-2 rounded-full bg-primary mr-2"></span> b. Integrity
                        </h4>
                        <p class="text-slate-600 dark:text-gray-300 text-sm leading-relaxed">We act with unwavering honesty and transparency. We are accountable to our youth, our donors, and each other.</p>
                    </div>
                    <!-- Excellence -->
                    <div class="bg-white dark:bg-slate-800 p-8 rounded-2xl shadow-sm border border-gray-100 dark:border-slate-700 hover:-translate-y-1 transition-all duration-300">
                        <h4 class="text-lg font-bold text-primary mb-3 flex items-center">
                            <span class="w-2 h-2 rounded-full bg-primary mr-2"></span> c. Excellence
                        </h4>
                        <p class="text-slate-600 dark:text-gray-300 text-sm leading-relaxed">We bring our best to everything we do, from designing a training module to managing a scholarship fund. Our beneficiaries deserve nothing less.</p>
                    </div>
                    <!-- Collaboration -->
                    <div class="bg-white dark:bg-slate-800 p-8 rounded-2xl shadow-sm border border-gray-100 dark:border-slate-700 hover:-translate-y-1 transition-all duration-300">
                        <h4 class="text-lg font-bold text-primary mb-3 flex items-center">
                            <span class="w-2 h-2 rounded-full bg-primary mr-2"></span> d. Collaboration
                        </h4>
                        <p class="text-slate-600 dark:text-gray-300 text-sm leading-relaxed">We work hand-in-hand with communities, local leaders, and each other. We achieve more together.</p>
                    </div>
                    <!-- Stewardship -->
                    <div class="bg-white dark:bg-slate-800 p-8 rounded-2xl shadow-sm border border-gray-100 dark:border-slate-700 hover:-translate-y-1 transition-all duration-300 md:col-span-2 lg:col-span-2">
                        <h4 class="text-lg font-bold text-primary mb-3 flex items-center">
                            <span class="w-2 h-2 rounded-full bg-primary mr-2"></span> e. Stewardship
                        </h4>
                        <p class="text-slate-600 dark:text-gray-300 text-sm leading-relaxed">We treat every donation, every piece of equipment, and every minute of time as a precious resource meant for maximum impact.</p>
                    </div>
                </div>
            </div>

        </div>
    </main>

    <!-- Interactive WhatsApp Widget -->
    @include('partials.whatsapp-float')

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
            class="fixed bottom-24 right-6 z-40 p-3 rounded-full bg-primary hover:bg-orange-600 text-white shadow-xl focus:outline-none transform transition-transform hover:-translate-y-1 cursor-pointer"
            style="display: none;"
            aria-label="Scroll to top">
        <!-- Up Arrow Icon -->
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M5 10l7-7m0 0l7 7m-7-7v18" />
        </svg>
    </button>

</body>
</html>