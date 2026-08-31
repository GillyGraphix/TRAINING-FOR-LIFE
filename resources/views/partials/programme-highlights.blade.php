<!-- Programme Highlights Section (Optimized for Dark Mode, Grid Pattern & Navy Blue Theme) -->
<section class="relative py-24 overflow-hidden transition-colors duration-500 bg-slate-50 dark:bg-slate-900" 
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
         
    <!-- Background Grid Pattern & Ambient Gradients -->
    <div class="absolute inset-0 z-0 opacity-40 dark:opacity-20" 
         style="background-image: radial-gradient(#cbd5e1 1px, transparent 1px); background-size: 32px 32px;"></div>
    
    <!-- Soft Glows to make it pop -->
    <div class="absolute top-0 left-1/4 w-96 h-96 bg-primary/20 dark:bg-primary/10 rounded-full blur-3xl -translate-y-1/2 z-0"></div>
    <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-orange-400/20 dark:bg-orange-500/10 rounded-full blur-3xl translate-y-1/2 z-0"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Section Header -->
        <div class="text-center max-w-3xl mx-auto mb-16 transition-all duration-1000 ease-out transform"
             :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'">
            <span class="text-primary font-bold text-xs uppercase tracking-[0.25em] bg-white dark:bg-slate-800 px-4 py-1.5 rounded-full shadow-sm">Empowering the Future</span>
            <h2 class="text-3xl md:text-5xl font-extrabold text-slate-900 dark:text-white mt-4 mb-4 tracking-tight">Our Core Programmes</h2>
            <p class="text-lg text-slate-600 dark:text-slate-300">
                Discover how we are closing the gaps of awareness, access, and marketable skills for Tanzanian youth and communities.
            </p>
        </div>

        <!-- Programmes Grid (4 Columns on Large Screens) -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            
            <!-- Card 1: Course 4 -->
            <div class="bg-white/80 dark:bg-slate-800/90 backdrop-blur-md rounded-2xl shadow-sm hover:shadow-2xl transition-all duration-700 ease-out transform delay-100 p-8 border border-white dark:border-slate-700 group hover:-translate-y-2 relative overflow-hidden"
                 :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-16'">
                
                <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-primary to-orange-400 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-left"></div>

                <div class="w-14 h-14 bg-orange-50 dark:bg-slate-700 rounded-xl flex items-center justify-center text-primary mb-6 group-hover:bg-primary group-hover:text-white transition-colors duration-300 shadow-sm">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                </div>
                <h3 class="text-xl font-black text-slate-900 dark:text-white mb-3">Course 4</h3>
                <p class="text-slate-600 dark:text-slate-400 mb-6 line-clamp-3 text-sm leading-relaxed">
                    Our foundational youth empowerment programme focused on building self-awareness, leadership, and essential life skills.
                </p>
                <a href="#" class="inline-flex items-center text-sm text-primary font-bold hover:text-orange-600 transition-colors mt-auto">
                    Learn More 
                    <svg class="w-4 h-4 ml-1.5 group-hover:translate-x-1.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </a>
            </div>

            <!-- Card 2: Kijana Fursa -->
            <div class="bg-white/80 dark:bg-slate-800/90 backdrop-blur-md rounded-2xl shadow-sm hover:shadow-2xl transition-all duration-700 ease-out transform delay-200 p-8 border border-white dark:border-slate-700 group hover:-translate-y-2 relative overflow-hidden"
                 :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-16'">
                
                <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-primary to-orange-400 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-left"></div>

                <div class="w-14 h-14 bg-orange-50 dark:bg-slate-700 rounded-xl flex items-center justify-center text-primary mb-6 group-hover:bg-primary group-hover:text-white transition-colors duration-300 shadow-sm">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                </div>
                <h3 class="text-xl font-black text-slate-900 dark:text-white mb-3">Kijana Fursa</h3>
                <p class="text-slate-600 dark:text-slate-400 mb-6 line-clamp-3 text-sm leading-relaxed">
                    Equipping young people with marketable skills, entrepreneurship training, and direct pathways to economic livelihoods.
                </p>
                <a href="#" class="inline-flex items-center text-sm text-primary font-bold hover:text-orange-600 transition-colors mt-auto">
                    Learn More 
                    <svg class="w-4 h-4 ml-1.5 group-hover:translate-x-1.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </a>
            </div>

            <!-- Card 3: Soma na Matumaini -->
            <div class="bg-white/80 dark:bg-slate-800/90 backdrop-blur-md rounded-2xl shadow-sm hover:shadow-2xl transition-all duration-700 ease-out transform delay-300 p-8 border border-white dark:border-slate-700 group hover:-translate-y-2 relative overflow-hidden"
                 :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-16'">
                
                <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-primary to-orange-400 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-left"></div>

                <div class="w-14 h-14 bg-orange-50 dark:bg-slate-700 rounded-xl flex items-center justify-center text-primary mb-6 group-hover:bg-primary group-hover:text-white transition-colors duration-300 shadow-sm">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path></svg>
                </div>
                <h3 class="text-xl font-black text-slate-900 dark:text-white mb-3">Soma na Matumaini</h3>
                <p class="text-slate-600 dark:text-slate-400 mb-6 line-clamp-3 text-sm leading-relaxed">
                    Providing critical educational scholarships and support networks for marginalized youth across the nation.
                </p>
                <a href="#" class="inline-flex items-center text-sm text-primary font-bold hover:text-orange-600 transition-colors mt-auto">
                    Learn More 
                    <svg class="w-4 h-4 ml-1.5 group-hover:translate-x-1.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </a>
            </div>

            <!-- Card 4: TFL Farm (NEW PROGRAMME - RANGI IMERUDISHWA) -->
            <div class="bg-white/80 dark:bg-slate-800/90 backdrop-blur-md rounded-2xl shadow-sm hover:shadow-2xl transition-all duration-700 ease-out transform delay-400 p-8 border border-white dark:border-slate-700 group hover:-translate-y-2 relative overflow-hidden"
                 :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-16'">
                
                <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-primary to-orange-400 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-left"></div>

                <div class="w-14 h-14 bg-orange-50 dark:bg-slate-700 rounded-xl flex items-center justify-center text-primary mb-6 group-hover:bg-primary group-hover:text-white transition-colors duration-300 shadow-sm">
                    <!-- Icon ya kilimo/majani inabaki -->
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                </div>
                <h3 class="text-xl font-black text-slate-900 dark:text-white mb-3">TFL Farm</h3>
                <p class="text-slate-600 dark:text-slate-400 mb-6 line-clamp-3 text-sm leading-relaxed">
                    A sustainable agriculture initiative teaching modern farming techniques, food security, and agribusiness to empower rural communities.
                </p>
                <a href="#" class="inline-flex items-center text-sm text-primary font-bold hover:text-orange-600 transition-colors mt-auto">
                    Learn More 
                    <svg class="w-4 h-4 ml-1.5 group-hover:translate-x-1.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </a>
            </div>

        </div>
    </div>
</section>