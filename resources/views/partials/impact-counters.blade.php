<!-- Impact Counters Section (Ultra Compact) -->
<section class="py-4 md:py-6 bg-white dark:bg-slate-900 border-b border-gray-100 dark:border-slate-800 transition-colors duration-500 shadow-sm" x-data="impactCounters()" x-init="initObserver()">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" x-ref="counterSection">
        
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4 text-center lg:divide-x divide-gray-100 dark:divide-slate-800">
            
            <!-- Counter 1: Years of Impact -->
            <div class="py-2 px-2">
                <div class="text-2xl md:text-3xl font-extrabold text-primary mb-1">
                    <span x-text="counts.years">0</span>
                </div>
                <div class="text-gray-500 dark:text-gray-400 font-bold text-[10px] md:text-[11px] tracking-wider uppercase">Years of Impact</div>
            </div>

            <!-- Counter 2: Youth Trained in 2025 -->
            <div class="py-2 px-2">
                <div class="text-2xl md:text-3xl font-extrabold text-slate-900 dark:text-white mb-1">
                    <span x-text="counts.youth">0</span>
                </div>
                <div class="text-gray-500 dark:text-gray-400 font-bold text-[10px] md:text-[11px] tracking-wider uppercase">Trained in 2025</div>
            </div>

            <!-- Counter 3: Alumni Network -->
            <div class="py-2 px-2">
                <div class="text-2xl md:text-3xl font-extrabold text-primary mb-1">
                    <span x-text="counts.alumni">0</span>+
                </div>
                <div class="text-gray-500 dark:text-gray-400 font-bold text-[10px] md:text-[11px] tracking-wider uppercase">Alumni Network</div>
            </div>

            <!-- Counter 4: Businesses Launched -->
            <div class="py-2 px-2">
                <div class="text-2xl md:text-3xl font-extrabold text-slate-900 dark:text-white mb-1">
                    <span x-text="counts.businesses">0</span>
                </div>
                <div class="text-gray-500 dark:text-gray-400 font-bold text-[10px] md:text-[11px] tracking-wider uppercase">Businesses Launched</div>
            </div>

            <!-- Counter 5: Active Programmes -->
            <div class="py-2 px-2 col-span-2 md:col-span-1">
                <div class="text-2xl md:text-3xl font-extrabold text-primary mb-1">
                    <span x-text="counts.programmes">0</span>
                </div>
                <div class="text-gray-500 dark:text-gray-400 font-bold text-[10px] md:text-[11px] tracking-wider uppercase">Core Programmes</div>
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
                alumni: 0,
                businesses: 0,
                programmes: 0
            },
            targets: {
                years: 30,       // 1996 - 2026
                youth: 52,       // Vijana waliohitimu 2025
                alumni: 845,     // Jumla ya alumni
                businesses: 13,  // Biashara zilizozinduliwa 2025
                programmes: 4    // Programu kuu 4
            },
            initObserver() {
                const observer = new IntersectionObserver((entries) => {
                    if (entries[0].isIntersecting && !this.hasRun) {
                        this.hasRun = true;
                        this.animateCounter('years', this.targets.years, 1500);
                        this.animateCounter('youth', this.targets.youth, 1800);
                        this.animateCounter('alumni', this.targets.alumni, 2200);
                        this.animateCounter('businesses', this.targets.businesses, 1800);
                        this.animateCounter('programmes', this.targets.programmes, 1200);
                    }
                }, { threshold: 0.3 });
                
                observer.observe(this.$refs.counterSection);
            },
            animateCounter(key, target, duration) {
                let startTimestamp = null;
                const step = (timestamp) => {
                    if (!startTimestamp) startTimestamp = timestamp;
                    const progress = Math.min((timestamp - startTimestamp) / duration, 1);
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