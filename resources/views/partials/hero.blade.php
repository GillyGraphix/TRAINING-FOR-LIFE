@php
    // Kusoma picha zote zilizopo kwenye public/images/gallery/hero/ kiotomatiki
    $heroPath = public_path('images/gallery/hero');
    $heroImages = [];

    if (\Illuminate\Support\Facades\File::exists($heroPath)) {
        $files = \Illuminate\Support\Facades\File::files($heroPath);
        foreach ($files as $file) {
            $ext = strtolower($file->getExtension());
            if (in_array($ext, ['jpg', 'jpeg', 'png', 'webp'])) {
                $heroImages[] = asset('images/gallery/hero/' . $file->getFilename());
            }
        }
    }

    if (empty($heroImages)) {
        $heroImages = [asset('images/gallery/hero/1.jpg')];
    }
@endphp

<!-- Main Page Wrapper -->
<div class="bg-gray-100 dark:bg-slate-950 min-h-screen p-3 md:p-6 lg:p-8 font-sans transition-colors duration-300">

    <!-- Hero Section Container -->
    <div x-data="heroCarousel({{ json_encode($heroImages) }})"
         x-init="start()"
         class="relative w-full h-[85vh] min-h-[650px] rounded-[32px] overflow-hidden bg-black shadow-2xl dark:shadow-none">

        <!-- Background Images -->
        <template x-for="(image, index) in images" :key="index">
            <div class="absolute inset-0 w-full h-full transition-opacity duration-1000 ease-in-out"
                 :class="active === index ? 'opacity-100 z-0' : 'opacity-0 z-0'">
                <!-- HAPA NDIPO KUBWA KILIPOBADILIKA: Tumeongeza 'bg-fixed bg-no-repeat' -->
                <div class="absolute inset-0 w-full h-full bg-cover bg-center bg-fixed bg-no-repeat"
                     :style="`background-image: url('${image}');`">
                </div>
            </div>
        </template>

        <!-- Gradient nyepesi -->
        <div class="absolute inset-0 bg-gradient-to-r from-black/80 via-black/40 to-transparent z-10 pointer-events-none"></div>

        <!-- Carousel Indicators -->
        <div class="absolute right-4 md:right-10 top-1/2 -translate-y-1/2 z-30 flex flex-col items-center gap-3">
            <template x-for="(image, index) in images" :key="index">
                <button @click="active = index"
                        class="h-1 rounded-full transition-all duration-500 ease-out shadow-sm"
                        :class="active === index ? 'w-10 bg-orange-500 shadow-[0_0_10px_rgba(249,115,22,0.8)]' : 'w-4 bg-white/50 hover:bg-white/90 hover:w-6'">
                </button>
            </template>
        </div>

        <!-- Hero Text Content -->
        <div class="relative z-20 flex flex-col justify-center h-full px-5 sm:px-6 md:px-12 lg:px-20 max-w-4xl pt-24 sm:pt-16 lg:pt-20 pb-32 text-center sm:text-left">
            <h1 class="italic text-2xl md:text-6xl lg:text-6xl font-extrabold text-white mb-6 leading-[1.1] tracking-tight drop-shadow-[0_4px_6px_rgba(0,0,0,0.8)]">
                <span class="mask-reveal-line" style="--mrl-delay:0.1s;">
                    <span>TRANSFORMING YOUTH INTO</span>
                </span>
                <span class="mask-reveal-line" style="--mrl-delay:0.19s;">
                    <span class="text-orange-500">EMPOWERED LEADERS</span>
                </span>
            </h1>
            <p class="hero-fade-up text-sm sm:text-base md:text-lg text-gray-200 font-medium max-w-2xl mx-auto sm:mx-0 leading-relaxed drop-shadow-[0_2px_4px_rgba(0,0,0,0.8)] mb-8">
                We equip young Tanzanians from disadvantaged families with the skills, confidence, and opportunities to build productive lives, launch enterprises, and lead their communities.
            </p>

            <!-- Hero Buttons -->
            <div class="flex flex-wrap items-center justify-center sm:justify-start gap-3 sm:gap-4 pointer-events-auto">
                <a href="#impact" class="btn-slide-in bg-white/10 hover:bg-white/20 text-white border border-white/30 backdrop-blur-md px-5 sm:px-6 py-3 sm:py-3.5 rounded-full font-bold text-xs sm:text-sm tracking-wide transition-all duration-300 hover:-translate-y-0.5" style="--bsi-delay:0.5s;">
                    Our Impact
                </a>
                <a href="#support" class="btn-slide-in bg-transparent hover:bg-white text-white hover:text-slate-950 border border-white/60 px-5 sm:px-6 py-3 sm:py-3.5 rounded-full font-bold text-xs sm:text-sm tracking-wide transition-all duration-300 hover:-translate-y-0.5" style="--bsi-delay:0.62s;">
                    Support TFL
                </a>
                
                <!-- Apply Now: Tumeweka kwenye div ili CSS animations zisigongane -->
                <div class="btn-slide-in" style="--bsi-delay:0.74s;">
                    <a href="#apply" class="btn-pulse inline-block bg-orange-500 hover:bg-orange-600 text-white px-5 sm:px-6 py-3 sm:py-3.5 rounded-full font-bold text-xs sm:text-sm tracking-wide transition-colors duration-300">
                        Apply Now
                    </a>
                </div>
            </div>
        </div>

    </div>

    <!-- Below-hero row: Caption text & Cards with scroll animations -->
    <div class="relative z-30 -mt-16 md:-mt-24 lg:-mt-28 max-w-[95%] lg:max-w-7xl mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-6 lg:gap-8 lg:items-end">

            <!-- Caption text (inachomoza scroll ikifika) -->
            <div class="lg:col-span-1 order-2 lg:order-1 px-1 pt-4 lg:pt-0 scroll-reveal">
                <p class="text-slate-600 dark:text-gray-300 text-sm leading-relaxed">
                    Join our programs to unlock your potential. We provide the tools, mentorship, and opportunities you need to shape a better future for yourself and your community.
                </p>
            </div>

            <!-- Thumbnail panel -->
            <div class="lg:col-span-3 order-1 lg:order-2">
                <div class="magicpattern-wrap relative isolate rounded-tl-[64px] rounded-2xl shadow-xl border border-white/10 p-4 md:p-5 flex gap-4 md:gap-5 overflow-x-auto momentum-x overscroll-x-contain hide-scrollbar md:grid md:grid-cols-3 md:overflow-visible transition-colors duration-300">

                    <!-- Card 1: Skill Building -->
                    <div class="scroll-reveal group relative z-10 min-w-[200px] sm:min-w-[220px] md:min-w-0 h-[220px] md:h-[240px] rounded-[28px] overflow-hidden shrink-0 md:shrink shadow-md" style="transition-delay: 100ms;">
                        <img src="{{ asset('images/gallery/home/skill-building.jpg') }}" alt="Skill Building" class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/85 via-slate-950/20 to-transparent"></div>
                        <div class="absolute top-3 left-3 w-9 h-9 rounded-full bg-orange-500/90 backdrop-blur-sm flex items-center justify-center text-white shadow-lg">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path></svg>
                        </div>
                        <div class="absolute bottom-0 left-0 p-4 w-full">
                            <h3 class="text-white font-bold text-base mb-1">Skill Building</h3>
                            <p class="text-gray-300 text-xs line-clamp-2">Equipping youth with practical technical and soft skills.</p>
                        </div>
                    </div>

                    <!-- Card 2: Launch Enterprises -->
                    <div class="scroll-reveal group relative z-10 min-w-[200px] sm:min-w-[220px] md:min-w-0 h-[220px] md:h-[240px] rounded-[28px] overflow-hidden shrink-0 md:shrink shadow-md" style="transition-delay: 250ms;">
                        <img src="{{ asset('images/gallery/home/launch-enterprises.jpg') }}" alt="Launch Enterprises" class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/85 via-slate-950/20 to-transparent"></div>
                        <div class="absolute top-3 left-3 w-9 h-9 rounded-full bg-orange-500/90 backdrop-blur-sm flex items-center justify-center text-white shadow-lg">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 0h8v12H6V4zm2 2a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1zm0 4a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                        </div>
                        <div class="absolute bottom-0 left-0 p-4 w-full">
                            <h3 class="text-white font-bold text-base mb-1">Launch Enterprises</h3>
                            <p class="text-gray-300 text-xs line-clamp-2">Supporting young entrepreneurs to build businesses.</p>
                        </div>
                    </div>

                    <!-- Card 3: Lead Communities -->
                    <div class="scroll-reveal group relative z-10 min-w-[200px] sm:min-w-[220px] md:min-w-0 h-[220px] md:h-[240px] rounded-[28px] overflow-hidden shrink-0 md:shrink shadow-md" style="transition-delay: 400ms;">
                        <img src="{{ asset('images/gallery/home/lead-communities.jpg') }}" alt="Lead Communities" class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/85 via-slate-950/20 to-transparent"></div>
                        <div class="absolute top-3 left-3 w-9 h-9 rounded-full bg-orange-500/90 backdrop-blur-sm flex items-center justify-center text-white shadow-lg">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path></svg>
                        </div>
                        <div class="absolute bottom-0 left-0 p-4 w-full">
                            <h3 class="text-white font-bold text-base mb-1">Lead Communities</h3>
                            <p class="text-gray-300 text-xs line-clamp-2">Creating impactful changes in local communities.</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Custom CSS (inabaki kama ilivyokua) -->
<style>
    .hide-scrollbar::-webkit-scrollbar { display: none; }
    .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    .momentum-x { -webkit-overflow-scrolling: touch; touch-action: pan-x; }

    .magicpattern-wrap::before {
        content: ""; position: absolute; inset: 0; z-index: 0; border-radius: inherit;
        background-color: #E5E5F7; opacity: 0.2;
        background-image: repeating-radial-gradient(circle at 0 0, transparent 0, #E5E5F7 23px), repeating-linear-gradient(#444CF755, #444CF7);
        transition: background-color 0.3s ease, opacity 0.3s ease;
    }
    .dark .magicpattern-wrap::before {
        background-color: #0f172a; opacity: 0.3;
        background-image: repeating-radial-gradient(circle at 0 0, transparent 0, #0f172a 23px), repeating-linear-gradient(#6366f155, #6366f1);
    }

    /* Apply Now: Breathing effect */
    @keyframes pantingBreath {
        0%, 100% { 
            transform: scale(1);
            box-shadow: 0 4px 10px rgba(249,115,22,0.4), 0 0 0 0 rgba(249,115,22,0.6); 
        }
        50% { 
            transform: scale(1.08); 
            box-shadow: 0 10px 25px rgba(249,115,22,0.8), 0 0 0 8px rgba(249,115,22,0.15); 
        }
    }
    
    .btn-pulse {
        animation: pantingBreath 2.5s ease-in-out infinite; 
    }
    
    .btn-pulse:hover {
        animation: pantingBreath 1.2s ease-in-out infinite; 
    }

    /* CSS Zingine zote zinabaki kama zilivyokuwa... */
    @keyframes heroMaskRevealUp {
        0% { opacity: 0; transform: translateY(30px); filter: blur(6px); }
        100% { opacity: 1; transform: translateY(0); filter: blur(0px); }
    }
    .mask-reveal-line { display: block; overflow: hidden; }
    .mask-reveal-line > span {
        display: block;
        animation: heroMaskRevealUp 1s cubic-bezier(0.22, 1, 0.36, 1) both; 
        animation-delay: var(--mrl-delay, 0s);
    }

    @keyframes heroFadeUp {
        0% { opacity: 0; transform: translateY(16px); filter: blur(4px); }
        100% { opacity: 1; transform: translateY(0); filter: blur(0px); }
    }
    .hero-fade-up {
        animation: heroFadeUp 1s cubic-bezier(0.22, 1, 0.36, 1) both;
        animation-delay: 0.32s;
    }

    @keyframes btnSlideInFromRight {
        0% { opacity: 0; transform: translateX(70px); }
        100% { opacity: 1; transform: translateX(0); }
    }
    .btn-slide-in {
        animation: btnSlideInFromRight 0.9s cubic-bezier(0.22, 1, 0.36, 1) both;
        animation-delay: var(--bsi-delay, 0s);
    }

    .mask-reveal-line > span, .hero-fade-up, .btn-slide-in { animation-play-state: paused; }
    .hero-ready .mask-reveal-line > span, .hero-ready .hero-fade-up, .hero-ready .btn-slide-in { animation-play-state: running; }

    .scroll-reveal {
        opacity: 0;
        transform: translateY(40px);
        transition: opacity 0.8s cubic-bezier(0.22, 1, 0.36, 1), transform 0.8s cubic-bezier(0.22, 1, 0.36, 1);
    }
    .scroll-reveal.visible {
        opacity: 1;
        transform: translateY(0);
    }

    @media (prefers-reduced-motion: reduce) {
        .mask-reveal-line > span, .hero-fade-up, .btn-slide-in, .scroll-reveal {
            animation: none !important; transition: none !important;
            opacity: 1 !important; transform: none !important; filter: none !important;
        }
        .btn-pulse { animation: none !important; }
    }
</style>

<!-- Alpine.js Script & Scroll Observer (Inabaki kama ilivyokua) -->
<script>
    function heroCarousel(imagesList = []) {
        return {
            active: 0,
            images: imagesList,
            start() {
                if (this.images.length > 1) {
                    setInterval(() => {
                        this.active = (this.active + 1) % this.images.length;
                    }, 6000); 
                }
            }
        }
    }

    (function () {
        function markHeroReady() { document.body.classList.add('hero-ready'); }
        window.addEventListener('preloader:done', markHeroReady);
        if (!document.getElementById('tfl-preloader')) { markHeroReady(); }
    })();

    document.addEventListener("DOMContentLoaded", () => {
        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    observer.unobserve(entry.target);
                }
            });
        }, { 
            threshold: 0.15, 
            rootMargin: "0px 0px -50px 0px"
        });

        document.querySelectorAll('.scroll-reveal').forEach(el => {
            observer.observe(el);
        });
    });
</script>