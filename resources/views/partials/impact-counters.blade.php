<!-- Impact Counters Section (Ultra Compact) -->
<section class="py-3 md:py-4 bg-white dark:bg-secondary border-b border-gray-100 dark:border-gray-800 transition-colors duration-500" x-data="impactCounters()" x-init="initObserver()">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" x-ref="counterSection">
        
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-2 md:gap-4 text-center lg:divide-x divide-gray-100 dark:divide-gray-800">
            
            <!-- Counter 1: Years -->
            <div class="py-1 px-2">
                <div class="text-xl md:text-3xl font-extrabold text-primary mb-0.5">
                    <span x-text="counts.years">0</span>
                </div>
                <div class="text-gray-500 dark:text-gray-400 font-bold text-[10px] md:text-[11px] tracking-wider uppercase">YEARS OF IMPACT</div>
            </div>

            <!-- Counter 2: Youth Empowered -->
            <div class="py-1 px-2">
                <div class="text-xl md:text-3xl font-extrabold text-gray-900 dark:text-white mb-0.5">
                    <span x-text="counts.youth">0</span>+
                </div>
                <div class="text-gray-500 dark:text-gray-400 font-bold text-[10px] md:text-[11px] tracking-wider uppercase">YOUTH EMPOWERED</div>
            </div>

            <!-- Counter 3: Active Programmes -->
            <div class="py-1 px-2">
                <div class="text-xl md:text-3xl font-extrabold text-primary mb-0.5">
                    <span x-text="counts.programmes">0</span>
                </div>
                <div class="text-gray-500 dark:text-gray-400 font-bold text-[10px] md:text-[11px] tracking-wider uppercase">ACTIVE PROGRAMMES</div>
            </div>

            <!-- Counter 4: Partners -->
            <div class="py-1 px-2">
                <div class="text-xl md:text-3xl font-extrabold text-gray-900 dark:text-white mb-0.5">
                    <span x-text="counts.partners">0</span>+
                </div>
                <div class="text-gray-500 dark:text-gray-400 font-bold text-[10px] md:text-[11px] tracking-wider uppercase">PARTNERS & FUNDERS</div>
            </div>

            <!-- Counter 5: Alumni -->
            <div class="py-1 px-2">
                <div class="text-xl md:text-3xl font-extrabold text-primary mb-0.5">
                    <span x-text="counts.alumni">0</span>+
                </div>
                <div class="text-gray-500 dark:text-gray-400 font-bold text-[10px] md:text-[11px] tracking-wider uppercase">ALUMNI</div>
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
                partners: 0,
                alumni: 0
            },
            targets: {
                years: 30,
                youth: 15000,
                programmes: 4,
                partners: 50,
                alumni: 850
            },
            initObserver() {
                const observer = new IntersectionObserver((entries) => {
                    if (entries[0].isIntersecting && !this.hasRun) {
                        this.hasRun = true;
                        this.animateCounter('years', this.targets.years, 2000);
                        this.animateCounter('youth', this.targets.youth, 2500);
                        this.animateCounter('programmes', this.targets.programmes, 1500);
                        this.animateCounter('partners', this.targets.partners, 2000);
                        this.animateCounter('alumni', this.targets.alumni, 2300);
                    }
                }, { threshold: 0.5 });
                
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