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

    <!-- 1. HEADER SECTION -->
    @include('partials.header')

    <!-- 2. MAIN GALLERY CONTENT -->
    <main class="pt-32 pb-24" x-data="{ 
        currentCategory: null, 
        activeImage: null,
        categories: {
            outreach: {
                title: 'Community Outreach',
                desc: 'Educational seminars, health awareness campaigns, and community engagement programs across local villages.',
                images: [
                    '{{ asset("images/gallery-1.jpg") }}',
                    '{{ asset("images/gallery-4.jpg") }}',
                    '{{ asset("images/gallery-3.jpg") }}'
                ]
            },
            clinical: {
                title: 'Clinical Care & Support',
                desc: 'Health check-ups, specialized consultations, and medical assistance provided by our expert practitioners.',
                images: [
                    '{{ asset("images/gallery-2.jpg") }}',
                    '{{ asset("images/gallery-5.jpg") }}'
                ]
            },
            empowerment: {
                title: 'Empowerment & Impact',
                desc: 'Workshops, maternal welfare sessions, and initiatives designed to build sustainable community growth.',
                images: [
                    '{{ asset("images/gallery-3.jpg") }}',
                    '{{ asset("images/gallery-6.jpg") }}'
                ]
            }
        }
    }">
        
        <!-- PAGE TITLE -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-8 pb-12 text-center">
            <span class="text-primary font-bold text-xs uppercase tracking-[0.25em] bg-primary/10 px-4 py-1.5 rounded-full">Our Visual Journey</span>
            <h1 class="text-4xl sm:text-5xl font-extrabold text-slate-900 dark:text-white mt-4 tracking-tight">Impact & Community Gallery</h1>
            <p class="text-slate-600 dark:text-slate-400 mt-4 max-w-2xl mx-auto text-base sm:text-lg">
                Explore our moments in action, health outreach programs, and the smiling faces of the communities we serve. Click any category below to explore its collection.
            </p>
        </div>

        <!-- CATEGORIES GRID -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                
                <!-- CATEGORY CARD 1: COMMUNITY OUTREACH -->
                <div @click="currentCategory = categories.outreach" class="group relative bg-white dark:bg-slate-800 rounded-3xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-500 cursor-pointer flex flex-col h-[380px] transform hover:-translate-y-2">
                    <div class="absolute inset-0 w-full h-full overflow-hidden bg-slate-200 dark:bg-slate-700">
                        <img src="{{ asset('images/gallery-1.jpg') }}" alt="Community Outreach" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/40 to-transparent"></div>
                    
                    <div class="relative z-10 p-6 flex justify-between items-start">
                        <span class="bg-primary/90 text-white text-[10px] font-black uppercase tracking-widest px-3 py-1 rounded-full shadow-md">3 Photos Inside</span>
                        <span class="w-10 h-10 rounded-full bg-white/20 backdrop-blur-md flex items-center justify-center text-white group-hover:bg-primary transition-colors">
                            <svg class="w-5 h-5 transform group-hover:translate-x-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
                        </span>
                    </div>

                    <div class="relative z-10 mt-auto p-6">
                        <span class="text-orange-400 text-xs font-bold uppercase tracking-widest">Explore Collection</span>
                        <h3 class="text-white text-2xl font-black mt-1 group-hover:text-orange-300 transition-colors">Community Outreach</h3>
                        <p class="text-slate-300 text-xs mt-2 line-clamp-2">Educational seminars, health awareness campaigns, and community engagement programs.</p>
                    </div>
                </div>

                <!-- CATEGORY CARD 2: CLINICAL CARE -->
                <div @click="currentCategory = categories.clinical" class="group relative bg-white dark:bg-slate-800 rounded-3xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-500 cursor-pointer flex flex-col h-[380px] transform hover:-translate-y-2">
                    <div class="absolute inset-0 w-full h-full overflow-hidden bg-slate-200 dark:bg-slate-700">
                        <img src="{{ asset('images/gallery-2.jpg') }}" alt="Clinical Care" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/40 to-transparent"></div>
                    
                    <div class="relative z-10 p-6 flex justify-between items-start">
                        <span class="bg-primary/90 text-white text-[10px] font-black uppercase tracking-widest px-3 py-1 rounded-full shadow-md">2 Photos Inside</span>
                        <span class="w-10 h-10 rounded-full bg-white/20 backdrop-blur-md flex items-center justify-center text-white group-hover:bg-primary transition-colors">
                            <svg class="w-5 h-5 transform group-hover:translate-x-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
                        </span>
                    </div>

                    <div class="relative z-10 mt-auto p-6">
                        <span class="text-orange-400 text-xs font-bold uppercase tracking-widest">Explore Collection</span>
                        <h3 class="text-white text-2xl font-black mt-1 group-hover:text-orange-300 transition-colors">Clinical Care & Support</h3>
                        <p class="text-slate-300 text-xs mt-2 line-clamp-2">Health check-ups, specialized consultations, and medical assistance.</p>
                    </div>
                </div>

                <!-- CATEGORY CARD 3: EMPOWERMENT -->
                <div @click="currentCategory = categories.empowerment" class="group relative bg-white dark:bg-slate-800 rounded-3xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-500 cursor-pointer flex flex-col h-[380px] transform hover:-translate-y-2">
                    <div class="absolute inset-0 w-full h-full overflow-hidden bg-slate-200 dark:bg-slate-700">
                        <img src="{{ asset('images/gallery-3.jpg') }}" alt="Empowerment" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/40 to-transparent"></div>
                    
                    <div class="relative z-10 p-6 flex justify-between items-start">
                        <span class="bg-primary/90 text-white text-[10px] font-black uppercase tracking-widest px-3 py-1 rounded-full shadow-md">2 Photos Inside</span>
                        <span class="w-10 h-10 rounded-full bg-white/20 backdrop-blur-md flex items-center justify-center text-white group-hover:bg-primary transition-colors">
                            <svg class="w-5 h-5 transform group-hover:translate-x-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
                        </span>
                    </div>

                    <div class="relative z-10 mt-auto p-6">
                        <span class="text-orange-400 text-xs font-bold uppercase tracking-widest">Explore Collection</span>
                        <h3 class="text-white text-2xl font-black mt-1 group-hover:text-orange-300 transition-colors">Empowerment & Impact</h3>
                        <p class="text-slate-300 text-xs mt-2 line-clamp-2">Workshops, maternal welfare sessions, and sustainable community growth.</p>
                    </div>
                </div>

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
             class="fixed inset-0 z-50 bg-slate-950/90 backdrop-blur-lg overflow-y-auto px-4 py-12">
            
            <div class="max-w-6xl mx-auto">
                <div class="flex justify-between items-center mb-8 border-b border-white/10 pb-6">
                    <div>
                        <span class="text-orange-400 font-bold text-xs uppercase tracking-widest">Category Collection</span>
                        <h2 class="text-3xl sm:text-4xl font-extrabold text-white mt-1" x-text="currentCategory?.title"></h2>
                    </div>
                    <button @click="currentCategory = null" class="rounded-full bg-white/10 text-white hover:bg-primary p-3 transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    <template x-for="img in currentCategory?.images">
                        <div @click="activeImage = img" class="group relative bg-slate-800 rounded-2xl overflow-hidden shadow-lg cursor-pointer h-72 border border-white/10">
                            <img :src="img" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                <span class="bg-white/90 text-slate-900 text-xs font-bold px-4 py-2 rounded-full shadow-lg">View Full Image</span>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
        </div>

        <!-- 4. LIGHTBOX MODAL -->
        <div x-show="activeImage" 
             style="display: none;"
             x-transition.opacity
             class="fixed inset-0 z-[60] bg-black/95 backdrop-blur-2xl flex items-center justify-center p-4"
             @click="activeImage = null">
            
            <div class="relative max-w-5xl w-full max-h-[90vh] flex items-center justify-center" @click.stop>
                <button @click="activeImage = null" class="absolute -top-12 right-0 text-white hover:text-orange-400 p-2">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
                <img :src="activeImage" class="max-h-[85vh] max-w-full rounded-2xl shadow-2xl object-contain border border-white/10">
            </div>
        </div>

    </main>

</body>
</html>