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

    // Kama folder halina picha bado, itaweka angalau moja kama fallback
    if (empty($heroImages)) {
        $heroImages = [asset('images/gallery/hero/1.jpg')];
    }
@endphp

<!-- Hero Section with Alpine.js Dissolve, Static Background & Scroll Parallax Text -->
<div x-data="heroCarousel({{ json_encode($heroImages) }})" 
     x-init="start()" 
     class="relative h-[90vh] min-h-[600px] flex items-center justify-center overflow-hidden bg-black dark:bg-slate-950 transition-colors duration-500">
    
    <!-- Background Images (Static Dissolve) -->
    <template x-for="(image, index) in images" :key="index">
        <!-- Fade effect container (Dissolve) -->
        <div class="absolute inset-0 w-full h-full transition-opacity duration-1000 ease-in-out"
             :class="active === index ? 'opacity-100 z-10' : 'opacity-0 z-0'">
             
            <!-- Picha static kutoka folder la public/images/gallery/hero/ -->
            <div class="absolute inset-0 w-full h-full bg-cover bg-center"
                 :style="`background-image: url('${image}');`">
            </div>
        </div>
    </template>

    <!-- Dark Overlay for Text Readability -->
    <div class="absolute inset-0 bg-black/50 z-20"></div>

    <!-- SIDE INDICATORS (Vi-Dash Pekee) -->
    <div class="absolute right-6 md:right-10 top-1/2 -translate-y-1/2 z-30 flex flex-col items-end gap-2.5 select-none">
        <template x-for="(image, index) in images" :key="index">
            <button @click="active = index" 
                    :aria-label="'Go to slide ' + (index + 1)"
                    class="h-1 rounded-full transition-all duration-500 focus:outline-none cursor-pointer"
                    :class="active === index ? 'w-8 bg-primary shadow-lg shadow-primary/50' : 'w-4 bg-white/40 hover:bg-white/80 hover:w-6'">
            </button>
        </template>
    </div>

    <!-- Hero Content -->
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
            <!-- Link ya Get Involved -->
            <a href="{{ route('get-involved') }}" class="bg-primary hover:bg-orange-600 text-white font-semibold py-3 px-8 rounded-md shadow-lg transition-transform duration-300 hover:-translate-y-1 text-center">
                Partner With Us
            </a>
            <!-- Link ya News and Stories -->
            <a href="{{ route('news-stories') }}" class="bg-transparent border-2 border-white text-white hover:bg-white hover:text-slate-900 font-semibold py-3 px-8 rounded-md shadow-lg transition-transform duration-300 hover:-translate-y-1 text-center">
                Our Stories
            </a>
        </div>
    </div>
</div>

<!-- Alpine.js Logic Script -->
<script>
    function heroCarousel(imagesList = []) {
        return {
            active: 0,
            images: imagesList,
            start() {
                if (this.images.length > 0) {
                    setInterval(() => {
                        this.active = (this.active + 1) % this.images.length;
                    }, 6000);
                }
            }
        }
    }
</script>