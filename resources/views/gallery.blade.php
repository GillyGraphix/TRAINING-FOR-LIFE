<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery - Training for Life (TFL)</title>
    <!-- Tailwind CSS & AlpineJS via Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 dark:bg-slate-900 text-slate-800 dark:text-gray-100 font-sans antialiased transition-colors duration-300">

    @php
        // Function ya kusoma picha zote zilizopo kwenye folder kiotomatiki
        $getCategoryImages = function($folderName) {
            $path = public_path("images/gallery/{$folderName}");
            if (!\Illuminate\Support\Facades\File::exists($path)) {
                return [];
            }
            
            $files = \Illuminate\Support\Facades\File::files($path);
            $imageUrls = [];
            
            foreach ($files as $file) {
                $ext = strtolower($file->getExtension());
                if (in_array($ext, ['jpg', 'jpeg', 'png', 'webp', 'gif'])) {
                    $imageUrls[] = asset("images/gallery/{$folderName}/" . $file->getFilename());
                }
            }
            
            return $imageUrls;
        };

        // Kujenga categories data kiotomatiki bila ku-hardcode majina ya picha
        $galleryCategories = [
            'outreach' => [
                'title' => 'Community Outreach',
                'desc' => 'Educational seminars, health awareness campaigns, and community engagement programs across local villages.',
                'images' => $getCategoryImages('outreach')
            ],
            'clinical' => [
                'title' => 'Clinical Care & Support',
                'desc' => 'Health check-ups, specialized consultations, and medical assistance provided by our expert practitioners.',
                'images' => $getCategoryImages('clinical')
            ],
            'empowerment' => [
                'title' => 'Empowerment & Impact',
                'desc' => 'Workshops, maternal welfare sessions, and initiatives designed to build sustainable community growth.',
                'images' => $getCategoryImages('empowerment')
            ],
            'agriculture' => [
                'title' => 'TFL Farm & Agriculture',
                'desc' => 'Hands-on training in smart farming, greenhouse management, and agribusiness for youth sustainability.',
                'images' => $getCategoryImages('agriculture')
            ],
            'members' => [
                'title' => 'Community Members',
                'desc' => 'The inspiring faces of our youth, mentors, staff, and the resilient individuals driving change in our society.',
                'images' => $getCategoryImages('members')
            ]
        ];
    @endphp

    <!-- 1. HEADER SECTION -->
    @include('partials.header')

    <!-- 2. MAIN GALLERY CONTENT -->
    <main class="pt-32 pb-24" 
          x-data="{ 
              currentCategory: null, 
              activeImageIndex: null,
              categories: {{ json_encode($galleryCategories) }},

              openLightbox(index) {
                  this.activeImageIndex = index;
              },
              closeLightbox() {
                  this.activeImageIndex = null;
              },
              nextImage() {
                  if (this.currentCategory && this.currentCategory.images.length > 0) {
                      this.activeImageIndex = (this.activeImageIndex + 1) % this.currentCategory.images.length;
                  }
              },
              prevImage() {
                  if (this.currentCategory && this.currentCategory.images.length > 0) {
                      this.activeImageIndex = (this.activeImageIndex - 1 + this.currentCategory.images.length) % this.currentCategory.images.length;
                  }
              }
          }"
          @keydown.window.escape="closeLightbox()"
          @keydown.window.arrow-right="if(activeImageIndex !== null) nextImage()"
          @keydown.window.arrow-left="if(activeImageIndex !== null) prevImage()">
        
        <!-- PAGE TITLE -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-8 pb-12 text-center">
            <span class="text-primary font-bold text-xs uppercase tracking-[0.25em] bg-primary/10 px-4 py-1.5 rounded-full">Our Visual Journey</span>
            <h1 class="text-4xl sm:text-5xl font-extrabold text-slate-900 dark:text-white mt-6 tracking-tight">Impact & Community Gallery</h1>
            <p class="text-slate-600 dark:text-slate-400 mt-4 max-w-2xl mx-auto text-base sm:text-lg">
                Explore our moments in action, youth empowerment programs, and the smiling faces of the communities we serve. Click any category below to view its collection.
            </p>
        </div>

        <!-- CATEGORIES GRID -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                
                <!-- Kadi Zinazojiunda Kiotomatiki kulingana na Alpine Data -->
                <template x-for="(category, key) in categories" :key="key">
                    <div @click="currentCategory = category" class="group relative bg-white dark:bg-slate-800 rounded-3xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-500 cursor-pointer flex flex-col h-[380px] transform hover:-translate-y-2 border border-gray-100 dark:border-slate-700/80">
                        <!-- Background Image (Inachukua picha ya kwanza kama Cover) -->
                        <div class="absolute inset-0 w-full h-full overflow-hidden bg-slate-200 dark:bg-slate-700 flex items-center justify-center">
                            <template x-if="category.images.length > 0">
                                <img :src="category.images[0]" :alt="category.title" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            </template>
                            <template x-if="category.images.length === 0">
                                <div class="text-slate-400 text-sm font-medium">Hakuna Picha</div>
                            </template>
                        </div>
                        <!-- Gradient Overlay For Readability -->
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/60 to-transparent"></div>
                        
                        <!-- Top Badges (Inahesabu Picha Kiotomatiki) -->
                        <div class="relative z-10 p-6 flex justify-between items-start">
                            <div class="flex items-center space-x-2 bg-primary/90 text-white text-[11px] font-black uppercase tracking-widest px-4 py-1.5 rounded-full shadow-lg backdrop-blur-sm">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                <span x-text="category.images.length + ' Photos'"></span>
                            </div>
                            <span class="w-10 h-10 rounded-full bg-white/20 backdrop-blur-md flex items-center justify-center text-white group-hover:bg-primary transition-colors shadow-lg">
                                <svg class="w-5 h-5 transform group-hover:translate-x-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
                            </span>
                        </div>

                        <!-- Content Bottom -->
                        <div class="relative z-10 mt-auto p-6">
                            <span class="text-orange-400 text-[10px] font-bold uppercase tracking-widest block mb-1">Explore Collection</span>
                            <h3 class="text-white text-2xl font-black group-hover:text-orange-300 transition-colors leading-tight" x-text="category.title"></h3>
                            <p class="text-slate-300 text-sm mt-3 line-clamp-2 leading-relaxed" x-text="category.desc"></p>
                        </div>
                    </div>
                </template>

            </div>
        </div>

        <!-- 3. MODAL: UNFURLS WHEN A CATEGORY IS CLICKED -->
        <div x-show="currentCategory" 
             style="display: none;"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="fixed inset-0 z-50 bg-slate-950/95 backdrop-blur-md overflow-y-auto px-4 py-12">
            
            <div class="max-w-7xl mx-auto relative">
                <!-- Close Modal Button -->
                <button @click="currentCategory = null" class="absolute -top-6 right-0 md:-right-4 rounded-full bg-white/10 text-white hover:bg-primary p-3 transition-colors z-50 shadow-lg">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>

                <!-- Modal Header -->
                <div class="mb-12 text-center mt-8">
                    <span class="text-orange-400 font-bold text-xs uppercase tracking-widest">Category Collection</span>
                    <h2 class="text-3xl sm:text-5xl font-extrabold text-white mt-2" x-text="currentCategory?.title"></h2>
                    <p class="text-slate-400 mt-4 max-w-2xl mx-auto text-base" x-text="currentCategory?.desc"></p>
                </div>

                <!-- Inner Gallery Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    <template x-for="(img, index) in currentCategory?.images" :key="index">
                        <div @click="openLightbox(index)" class="group relative bg-slate-800 rounded-3xl overflow-hidden shadow-lg cursor-pointer h-64 border border-white/10">
                            <img :src="img" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center backdrop-blur-[2px]">
                                <span class="bg-white/95 text-slate-900 text-xs font-bold px-5 py-2.5 rounded-full shadow-xl flex items-center transform scale-95 group-hover:scale-100 transition-transform">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"/></svg>
                                    Enlarge Image
                                </span>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
        </div>

        <!-- 4. LIGHTBOX MODAL (Slider yenye Navigation ya Next / Prev) -->
        <div x-show="activeImageIndex !== null" 
             style="display: none;"
             x-transition.opacity
             class="fixed inset-0 z-[60] bg-black/98 backdrop-blur-3xl flex items-center justify-center p-4 select-none"
             @click.self="closeLightbox()">
            
            <!-- Close Button -->
            <button @click="closeLightbox()" class="absolute top-6 right-6 text-white hover:text-orange-400 p-3 bg-white/10 hover:bg-white/20 rounded-full transition-all z-50">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>

            <!-- Image Counter Badge (Mfano: 2 / 7) -->
            <div class="absolute top-6 left-6 bg-white/10 backdrop-blur-md px-4 py-1.5 rounded-full text-white text-xs font-bold border border-white/10">
                <span x-text="(activeImageIndex + 1) + ' / ' + currentCategory?.images.length"></span>
            </div>

            <!-- Previous Button (Kushoto) -->
            <button @click="prevImage()" 
                    x-show="currentCategory?.images.length > 1"
                    class="absolute left-4 md:left-8 text-white hover:text-orange-400 p-3 bg-white/10 hover:bg-white/20 rounded-full transition-all z-50 focus:outline-none">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/></svg>
            </button>

            <!-- Main Enlarged Image -->
            <div class="relative max-w-6xl w-full max-h-[85vh] flex items-center justify-center px-12">
                <template x-if="activeImageIndex !== null && currentCategory?.images[activeImageIndex]">
                    <img :src="currentCategory.images[activeImageIndex]" 
                         class="max-h-[85vh] max-w-full rounded-2xl shadow-2xl object-contain border border-white/5 transition-all duration-300">
                </template>
            </div>

            <!-- Next Button (Kulia) -->
            <button @click="nextImage()" 
                    x-show="currentCategory?.images.length > 1"
                    class="absolute right-4 md:right-8 text-white hover:text-orange-400 p-3 bg-white/10 hover:bg-white/20 rounded-full transition-all z-50 focus:outline-none">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
            </button>

        </div>

    </main>
    
    <!-- FOOTER SECTION -->
    @include('partials.footer')

</body>
</html>