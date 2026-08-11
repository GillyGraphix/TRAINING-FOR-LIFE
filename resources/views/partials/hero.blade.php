<!-- Hero Section with Alpine.js Dissolve, Static Background & Scroll Parallax Text -->
<div x-data="heroCarousel()" x-init="start()" class="relative h-[80vh] flex items-center justify-center overflow-hidden bg-black dark:bg-slate-950 transition-colors duration-500">
    
    <!-- Background Images (Static Dissolve) -->
    <template x-for="(image, index) in images" :key="index">
        <!-- Fade effect container (Dissolve) -->
        <div class="absolute inset-0 w-full h-full transition-opacity duration-1000 ease-in-out"
             :class="active === index ? 'opacity-100 z-10' : 'opacity-0 z-0'">
             
             <!-- Picha imebaki static bila scale/zoom effect -->
            <div class="absolute inset-0 w-full h-full bg-cover bg-center"
                 :style="`background-image: url('${image}');`">
            </div>
        </div>
    </template>

    <!-- Dark Overlay for Text Readability -->
    <div class="absolute inset-0 bg-black bg-opacity-50 z-20"></div>

    <!-- Hero Content (Maandishi yanapanda juu kadri mtumiaji anavyoscream/scrolling) -->
    <div x-data="{ scrollY: 0 }" 
         @scroll.window="scrollY = window.pageYOffset"
         class="relative z-30 text-center px-4 max-w-4xl mx-auto mt-10 transition-transform duration-75 ease-out"
         :style="`transform: translateY(-${scrollY * 0.3}px); opacity: ${Math.max(1 - scrollY / 400, 0)};`">
         
        <h1 class="text-4xl md:text-6xl font-bold italic text-white mb-6 leading-tight drop-shadow-lg">
            Transforming Youth into <span class="text-primary">Empowered Leaders</span>
        </h1>
        <p class="text-base md:text-xl text-gray-200 mb-8 font-light drop-shadow">
            Closing the gaps of awareness, access, and marketable skills for a brighter Tanzania.
        </p>
        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <!-- Vitufe vimewekewa hover:-translate-y-1 ili vidunde kidogo juu -->
            <a href="#" class="bg-primary hover:bg-orange-600 text-white font-semibold py-3 px-8 rounded-md shadow-lg transition-transform duration-300 hover:-translate-y-1 text-center">
                Partner With Us
            </a>
            <a href="#" class="bg-transparent border-2 border-white text-white hover:bg-white hover:text-slate-900 font-semibold py-3 px-8 rounded-md shadow-lg transition-transform duration-300 hover:-translate-y-1 text-center">
                Our Stories
            </a>
        </div>
    </div>
</div>

<!-- Alpine.js Logic Script -->
<script>
    function heroCarousel() {
        return {
            active: 0,
            images: [
                'https://images.unsplash.com/photo-1529390079861-591de354faf5?auto=format&fit=crop&w=1920&q=80',
                'https://images.unsplash.com/photo-1509062522246-3755977927d7?auto=format&fit=crop&w=1920&q=80',
                'https://images.unsplash.com/photo-1511632765486-a01980e01a18?auto=format&fit=crop&w=1920&q=80',
                'https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?auto=format&fit=crop&w=1920&q=80',
                'https://images.unsplash.com/photo-1582213782179-e0d53f98f2ca?auto=format&fit=crop&w=1920&q=80',
                'https://images.unsplash.com/photo-1526976663112-00d58dc2a11b?auto=format&fit=crop&w=1920&q=80'
            ],
            start() {
                setInterval(() => {
                    this.active = (this.active + 1) % this.images.length;
                }, 6000);
            }
        }
    }
</script>