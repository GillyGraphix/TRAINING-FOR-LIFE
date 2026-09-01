<!-- News & Updates Preview Section (Galaxy Theme with Orange Glow) -->
<section class="relative py-20 bg-gray-50 dark:bg-secondary overflow-hidden transition-colors duration-500" 
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
         
    <!-- Galaxy Background Elements (Nebulas & Stars) -->
    <div class="absolute inset-0 pointer-events-none overflow-hidden">
        
        <!-- 1. Starry Night Effect -->
        <div class="absolute inset-0 hidden dark:block opacity-20" 
             style="background-image: radial-gradient(white 1px, transparent 1px); background-size: 50px 50px;">
        </div>
        <div class="absolute inset-0 hidden dark:block opacity-10" 
             style="background-image: radial-gradient(white 1px, transparent 1px); background-size: 70px 70px; background-position: 25px 25px;">
        </div>

        <!-- 2. Main Orange Galaxy Glow (Top Right) -->
        <div class="absolute -top-32 -right-32 w-[500px] h-[500px] bg-primary/30 dark:bg-primary/20 rounded-full blur-[120px] mix-blend-multiply dark:mix-blend-screen animate-pulse" style="animation-duration: 7s;"></div>
        
        <!-- 3. Deep Cosmic Blue Glow (Bottom Left) -->
        <div class="absolute -bottom-48 -left-20 w-[600px] h-[600px] bg-blue-400/20 dark:bg-indigo-600/20 rounded-full blur-[150px] mix-blend-multiply dark:mix-blend-screen"></div>
        
        <!-- 4. Center Soft Orange Highlight -->
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-[800px] h-[400px] bg-orange-500/10 dark:bg-orange-500/10 rounded-full blur-[150px] mix-blend-multiply dark:mix-blend-screen"></div>
        
    </div>

    <!-- Main Content Container -->
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Section Header -->
        <div class="flex flex-col md:flex-row md:justify-between md:items-end mb-12 transition-all duration-1000 ease-out transform"
             :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'">
            <div class="max-w-2xl">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4">Latest News & Updates</h2>
                <p class="text-lg text-gray-600 dark:text-gray-300">
                    Stay informed about our recent activities, community outreach, and upcoming events.
                </p>
            </div>
            <div class="mt-6 md:mt-0">
                <a href="#" class="inline-flex items-center text-primary font-bold hover:text-orange-600 transition">
                    View All News
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </a>
            </div>
        </div>

        <!-- News Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            
            <!-- News Card 1 -->
            <div class="bg-white/90 dark:bg-slate-800/90 backdrop-blur-sm rounded-xl shadow-sm hover:shadow-xl transition-all duration-1000 ease-out transform delay-100 overflow-hidden border border-gray-100 dark:border-gray-700 flex flex-col group"
                 :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-16'">
                <div class="h-48 overflow-hidden relative">
                    <img src="{{ asset('images/news_photos/news1.jpg') }}" alt="News Image" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute top-4 left-4 bg-primary text-white text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wide shadow-md">Education</div>
                </div>
                <div class="p-6 flex flex-col flex-grow relative">
                    <div class="text-sm text-gray-500 dark:text-gray-400 mb-2 font-medium">July 20, 2026</div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3 group-hover:text-primary transition-colors cursor-pointer">TFL Launches New Community Library</h3>
                    <p class="text-gray-600 dark:text-gray-300 line-clamp-3 flex-grow">
                        In our continuous effort to bridge the educational gap, we have successfully opened a new modern library accessible to over 500 students.
                    </p>
                </div>
            </div>

            <!-- News Card 2 -->
            <div class="bg-white/90 dark:bg-slate-800/90 backdrop-blur-sm rounded-xl shadow-sm hover:shadow-xl transition-all duration-1000 ease-out transform delay-300 overflow-hidden border border-gray-100 dark:border-gray-700 flex flex-col group"
                 :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-16'">
                <div class="h-48 overflow-hidden relative">
                    <img src="{{ asset('images/news_photos/news2.jpg') }}" alt="News Image" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute top-4 left-4 bg-primary text-white text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wide shadow-md">Empowerment</div>
                </div>
                <div class="p-6 flex flex-col flex-grow relative">
                    <div class="text-sm text-gray-500 dark:text-gray-400 mb-2 font-medium">July 15, 2026</div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3 group-hover:text-primary transition-colors cursor-pointer">Youth Entrepreneurship Workshop Highlights</h3>
                    <p class="text-gray-600 dark:text-gray-300 line-clamp-3 flex-grow">
                        Over 100 young entrepreneurs gathered for a 3-day intensive workshop focused on digital marketing and business management.
                    </p>
                </div>
            </div>

            <!-- News Card 3 -->
            <div class="bg-white/90 dark:bg-slate-800/90 backdrop-blur-sm rounded-xl shadow-sm hover:shadow-xl transition-all duration-1000 ease-out transform delay-500 overflow-hidden border border-gray-100 dark:border-gray-700 flex flex-col group"
                 :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-16'">
                <div class="h-48 overflow-hidden relative">
                    <img src="{{ asset('images/news_photos/news3.jpg') }}" alt="News Image" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute top-4 left-4 bg-primary text-white text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wide shadow-md">Partnerships</div>
                </div>
                <div class="p-6 flex flex-col flex-grow relative">
                    <div class="text-sm text-gray-500 dark:text-gray-400 mb-2 font-medium">July 5, 2026</div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3 group-hover:text-primary transition-colors cursor-pointer">New Partnership Announced for 2026</h3>
                    <p class="text-gray-600 dark:text-gray-300 line-clamp-3 flex-grow">
                        TFL is proud to announce a strategic partnership with local tech hubs to provide free coding bootcamps for high school graduates.
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>