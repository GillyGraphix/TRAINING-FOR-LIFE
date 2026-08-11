<!-- Programme Highlights Section (Optimized for Dark Mode & Navy Blue Theme) -->
<section class="py-20 bg-gray-50 dark:bg-secondary overflow-hidden transition-colors duration-500" 
         x-data="{ shown: false }" 
         x-init="
            const observer = new IntersectionObserver(entries => {
                if (entries[0].isIntersecting) {
                    shown = true;
                    observer.disconnect();
                }
            }, { threshold: 0.15 });
            observer.observe($el);
         ">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Section Header -->
        <div class="text-center max-w-3xl mx-auto mb-16 transition-all duration-1000 ease-out transform"
             :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4">Our Core Programmes</h2>
            <p class="text-lg text-gray-600 dark:text-gray-300">
                Discover how we are closing the gaps of awareness, access, and marketable skills for Tanzanian youth.
            </p>
        </div>

        <!-- Programmes Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            
            <!-- Card 1: Course 4 -->
            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm hover:shadow-xl transition-all duration-1000 ease-out transform delay-100 p-8 border border-gray-100 dark:border-gray-700 group"
                 :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-16'">
                <div class="w-14 h-14 bg-orange-50 dark:bg-slate-700 rounded-lg flex items-center justify-center text-primary mb-6 group-hover:bg-primary group-hover:text-white transition-colors duration-300">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3">Course 4</h3>
                <p class="text-gray-600 dark:text-gray-300 mb-6 line-clamp-3">
                    Our foundational youth empowerment programme focused on building self-awareness, leadership, and essential life skills.
                </p>
                <a href="#" class="inline-flex items-center text-primary font-semibold hover:text-orange-600 transition-colors">
                    Learn More 
                    <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </a>
            </div>

            <!-- Card 2: Kijana Fursa -->
            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm hover:shadow-xl transition-all duration-1000 ease-out transform delay-300 p-8 border border-gray-100 dark:border-gray-700 group"
                 :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-16'">
                <div class="w-14 h-14 bg-orange-50 dark:bg-slate-700 rounded-lg flex items-center justify-center text-primary mb-6 group-hover:bg-primary group-hover:text-white transition-colors duration-300">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3">Kijana Fursa</h3>
                <p class="text-gray-600 dark:text-gray-300 mb-6 line-clamp-3">
                    Equipping young people with marketable skills, entrepreneurship training, and direct pathways to economic livelihoods.
                </p>
                <a href="#" class="inline-flex items-center text-primary font-semibold hover:text-orange-600 transition-colors">
                    Learn More 
                    <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </a>
            </div>

            <!-- Card 3: Soma na Matumaini -->
            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm hover:shadow-xl transition-all duration-1000 ease-out transform delay-500 p-8 border border-gray-100 dark:border-gray-700 group"
                 :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-16'">
                <div class="w-14 h-14 bg-orange-50 dark:bg-slate-700 rounded-lg flex items-center justify-center text-primary mb-6 group-hover:bg-primary group-hover:text-white transition-colors duration-300">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path></svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3">Soma na Matumaini</h3>
                <p class="text-gray-600 dark:text-gray-300 mb-6 line-clamp-3">
                    Providing critical educational scholarships and support networks for marginalized youth across the nation.
                </p>
                <a href="#" class="inline-flex items-center text-primary font-semibold hover:text-orange-600 transition-colors">
                    Learn More 
                    <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </a>
            </div>

        </div>
    </div>
</section>