<!-- Impact Counters Section (Optimized for Dark Mode & Navy Blue Theme) -->
<section class="py-16 bg-white dark:bg-secondary border-b border-gray-100 dark:border-gray-800 transition-colors duration-500" x-data="impactCounters()" x-init="initObserver()">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" x-ref="counterSection">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center divide-x divide-gray-100 dark:divide-gray-800">
            
            <!-- Counter 1: Years -->
            <div class="p-4">
                <div class="text-4xl md:text-5xl font-bold text-primary mb-2">
                    <span x-text="counts.years">0</span>
                </div>
                <div class="text-gray-500 dark:text-gray-400 font-semibold text-sm tracking-widest uppercase">YEARS OF IMPACT</div>
            </div>

            <!-- Counter 2: Youth Empowered -->
            <div class="p-4">
                <div class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-white mb-2">
                    <span x-text="counts.youth">0</span>+
                </div>
                <div class="text-gray-500 dark:text-gray-400 font-semibold text-sm tracking-widest uppercase">YOUTH EMPOWERED</div>
            </div>

            <!-- Counter 3: Active Programmes -->
            <div class="p-4">
                <div class="text-4xl md:text-5xl font-bold text-primary mb-2">
                    <span x-text="counts.programmes">0</span>
                </div>
                <div class="text-gray-500 dark:text-gray-400 font-semibold text-sm tracking-widest uppercase">ACTIVE PROGRAMMES</div>
            </div>

            <!-- Counter 4: Partners -->
            <div class="p-4">
                <div class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-white mb-2">
                    <span x-text="counts.partners">0</span>+
                </div>
                <div class="text-gray-500 dark:text-gray-400 font-semibold text-sm tracking-widest uppercase">PARTNERS & FUNDERS</div>
            </div>

        </div>
    </div>
</section>

<!-- Alpine.js Logic for Scroll Animation -->
<script>
    function impactCounters() {
        return {
            hasRun: false,
            counts: {
                years: 0,
                youth: 0,
                programmes: 0,
                partners: 0
            },
            targets: {
                years: 30,       // Miaka 30 ya impact
                youth: 15000,    // Mfano: Vijana elfu 15
                programmes: 3,   // Course 4, Kijana Fursa, Soma na Matumaini
                partners: 50     // Mfano: Partners 50
            },
            initObserver() {
                // Hii inachunguza kama element imeonekana kwenye screen
                const observer = new IntersectionObserver((entries) => {
                    if (entries[0].isIntersecting && !this.hasRun) {
                        this.hasRun = true; // Inazuia isijirudie rudie
                        this.animateCounter('years', this.targets.years, 2000);
                        this.animateCounter('youth', this.targets.youth, 2500);
                        this.animateCounter('programmes', this.targets.programmes, 1500);
                        this.animateCounter('partners', this.targets.partners, 2000);
                    }
                }, { threshold: 0.5 }); // Ina-trigger ikionekana kwa nusu (50%)
                
                observer.observe(this.$refs.counterSection);
            },
            animateCounter(key, target, duration) {
                let startTimestamp = null;
                const step = (timestamp) => {
                    if (!startTimestamp) startTimestamp = timestamp;
                    const progress = Math.min((timestamp - startTimestamp) / duration, 1);
                    // Inapiga hesabu kukuza namba taratibu
                    this.counts[key] = Math.floor(progress * target).toLocaleString();
                    if (progress < 1) {
                        window.requestAnimationFrame(step);
                    }
                };
                window.requestAnimationFrame(step);
            }
        }
    }
</script>