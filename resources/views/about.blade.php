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
            <div class="text-center mb-16">
                <h1 class="text-4xl md:text-5xl font-bold text-slate-900 dark:text-white mb-4">Organisational Identity & Values</h1>
                <div class="w-24 h-1 bg-primary mx-auto rounded-full"></div>
            </div>

            <!-- Section 1.1: Who We Are & Story -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 mb-16">
                <!-- Who we are -->
                <div class="bg-white dark:bg-slate-800 p-8 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-800">
                    <h2 class="text-2xl font-bold text-slate-900 dark:text-white mb-6 flex items-center">
                        <span class="text-primary mr-3">1.1</span> Who We Are
                    </h2>
                    <p class="text-slate-600 dark:text-gray-300 leading-relaxed">
                        TFL (Training For Life) is a Tanzanian youth- centered NGO dedicated to breaking the cycle of poverty through strategic unemployment solutions. We identify, train and mentor talented young leaders from economically disadvantaged families equipping them with market-driven skills, scholarships an entrepreneurship pathways to become job creators and community change makers. TFL was founded in 1996 and its headquarters are in Moshi, Kilimanjaro.
                    </p>
                </div>

                <!-- Our Founding Story & Commitment -->
                <div class="bg-white dark:bg-slate-800 p-8 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-800">
                    <h2 class="text-2xl font-bold text-slate-900 dark:text-white mb-6">Our Founding Story & Commitment</h2>
                    
                    <div class="space-y-4">
                        <p class="text-slate-600 dark:text-gray-300 leading-relaxed">
                            In 1996, Training for Life was born from a simple, powerful belief, <span class="italic font-medium text-slate-800 dark:text-gray-200">“that every young person, regardless of their background, holds the potential to become a leader and a catalyst for change in their own community.”</span>
                        </p>
                        <p class="text-slate-600 dark:text-gray-300 leading-relaxed">
                            We are a Tanzanian non-governmental organization dedicated to empowering youth (ages 15-35) from marginalized communities. We do this through practical, life-changing interventions: life skills trainings, job readiness training, entrepreneurship trainings, tangible skills, and educational scholarships. Registered in 2007 with registration number 00NGO/0245 to operate in Tanzania Mainland.
                        </p>
                        <p class="text-slate-600 dark:text-gray-300 leading-relaxed">
                            This Human Resources Manual is the blueprint for how we turn our belief into action. It is a declaration of our commitment to building an organization as strong and resilient as the youth we serve. It ensures that every member of our team from our Board of Directors to our field facilitators is united, empowered, and aligned to deliver exceptional, measurable impact. We pledge to be outstanding stewards of the trust and resources granted to us by our donors, our communities, and the young people who inspire us every day.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Section 1.2: Vision, Mission & Core Belief -->
            <div class="mb-16">
                <h2 class="text-2xl font-bold text-slate-900 dark:text-white mb-8 text-center">
                    <span class="text-primary">1.2</span> Why We Exist
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Vision -->
                    <div class="bg-primary/10 dark:bg-slate-800 p-8 rounded-2xl border-t-4 border-primary text-center">
                        <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-4 uppercase tracking-wider">Our Vision</h3>
                        <p class="text-slate-600 dark:text-gray-300">
                            A future where every young person in Tanzania has the skills, confidence, and opportunity to build a thriving life and lead their community toward decent life.
                        </p>
                    </div>
                    <!-- Mission -->
                    <div class="bg-primary/10 dark:bg-slate-800 p-8 rounded-2xl border-t-4 border-primary text-center">
                        <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-4 uppercase tracking-wider">Our Mission</h3>
                        <p class="text-slate-600 dark:text-gray-300">
                            To empower youth from marginalized communities with practical life skills, tangible knowledge, and educational support, fostering a generation of resilient, ethical, and self-reliant leaders.
                        </p>
                    </div>
                    <!-- Core Belief -->
                    <div class="bg-primary/10 dark:bg-slate-800 p-8 rounded-2xl border-t-4 border-primary text-center">
                        <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-4 uppercase tracking-wider">Core Belief</h3>
                        <p class="text-slate-600 dark:text-gray-300">
                            Unemployment is not a lack of ability. It is a lack of opportunity. When a talented young person cannot afford school or training, poverty is not their failure; it is a system failure. TFL exists to fix that system, one young leader at a time.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Section 1.3: Core Values -->
            <div>
                <h2 class="text-2xl font-bold text-slate-900 dark:text-white mb-8 text-center">
                    <span class="text-primary">1.3</span> Core Values
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Empowerment -->
                    <div class="bg-white dark:bg-slate-800 p-6 rounded-xl shadow-sm border border-gray-100 dark:border-gray-800 hover:-translate-y-1 transition-transform duration-300">
                        <h4 class="text-lg font-bold text-primary mb-3">a. Empowerment</h4>
                        <p class="text-slate-600 dark:text-gray-300 text-sm">We believe in handing over the tools, not just providing the solution. We equip youth to drive their own development.</p>
                    </div>
                    <!-- Integrity -->
                    <div class="bg-white dark:bg-slate-800 p-6 rounded-xl shadow-sm border border-gray-100 dark:border-gray-800 hover:-translate-y-1 transition-transform duration-300">
                        <h4 class="text-lg font-bold text-primary mb-3">b. Integrity</h4>
                        <p class="text-slate-600 dark:text-gray-300 text-sm">We act with unwavering honesty and transparency. We are accountable to our youth, our donors, and each other.</p>
                    </div>
                    <!-- Excellence -->
                    <div class="bg-white dark:bg-slate-800 p-6 rounded-xl shadow-sm border border-gray-100 dark:border-gray-800 hover:-translate-y-1 transition-transform duration-300">
                        <h4 class="text-lg font-bold text-primary mb-3">c. Excellence</h4>
                        <p class="text-slate-600 dark:text-gray-300 text-sm">We bring our best to everything we do, from designing a training module to managing a scholarship fund. Our beneficiaries deserve nothing less.</p>
                    </div>
                    <!-- Collaboration -->
                    <div class="bg-white dark:bg-slate-800 p-6 rounded-xl shadow-sm border border-gray-100 dark:border-gray-800 hover:-translate-y-1 transition-transform duration-300 lg:col-start-1 lg:ml-[50%]">
                        <h4 class="text-lg font-bold text-primary mb-3">d. Collaboration</h4>
                        <p class="text-slate-600 dark:text-gray-300 text-sm">We work hand-in-hand with communities, local leaders, and each other. We achieve more together.</p>
                    </div>
                    <!-- Stewardship -->
                    <div class="bg-white dark:bg-slate-800 p-6 rounded-xl shadow-sm border border-gray-100 dark:border-gray-800 hover:-translate-y-1 transition-transform duration-300 lg:ml-[50%]">
                        <h4 class="text-lg font-bold text-primary mb-3">e. Stewardship</h4>
                        <p class="text-slate-600 dark:text-gray-300 text-sm">We treat every donation, every piece of equipment, and every minute of time as a precious resource meant for maximum impact.</p>
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