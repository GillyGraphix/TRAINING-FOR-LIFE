<!-- CUSTOM STYLES KWA AJILI YA ANIMATION YA KUPUMUA -->
<style>
    .progress-breathe {
        background: linear-gradient(90deg, #ea580c, #1e3a8a, #f97316, #1e3a8a, #ea580c);
        background-size: 200% 100%;
        animation: breathe-scroll 3s linear infinite;
        box-shadow: 0 0 8px rgba(234, 88, 12, 0.5);
    }
    @keyframes breathe-scroll {
        0% { background-position: 200% 0; }
        100% { background-position: -200% 0; }
    }
</style>

<!-- WRAPPER KUU INAYOBEBA KILA KITU -->
<div x-data="{ 
        scrolled: false, 
        isHidden: false,
        lastScroll: 0,
        open: false,
        scrollPercent: 0,
        theme: localStorage.getItem('theme') || (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light'),
        toggleTheme() {
            this.theme = this.theme === 'dark' ? 'light' : 'dark';
            localStorage.setItem('theme', this.theme);
            this.applyTheme();
        },
        applyTheme() {
            if (this.theme === 'dark') {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        }
    }" 
    x-init="
        applyTheme();
        window.addEventListener('scroll', () => {
            let winScroll = document.documentElement.scrollTop || document.body.scrollTop;
            let height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            scrollPercent = height > 0 ? (winScroll / height) * 100 : 0;

            if (winScroll > 200) {
                if (winScroll > lastScroll + 8) {
                    isHidden = true; 
                    if(open) open = false; 
                } else if (winScroll < lastScroll - 4) {
                    isHidden = false; 
                }
            } else {
                isHidden = false;
            }
            lastScroll = winScroll;
            scrolled = (winScroll > 50);
        });
    ">

    <!-- Scroll Progress Bar -->
    <div class="fixed top-0 left-0 h-[3.5px] progress-breathe z-50 transition-all duration-75" 
         :style="'width: ' + scrollPercent + '%'">
    </div>

    <!-- 1. HEADER YENYEWE -->
    <header class="fixed w-full top-0 z-40 transition-all duration-500 ease-[cubic-bezier(0.16,1,0.3,1)]"
            :class="[
                isHidden ? '-translate-y-full' : 'translate-y-0',
                scrolled ? 'bg-white/95 dark:bg-slate-900/95 backdrop-blur-md border-b border-gray-100 dark:border-white/10 shadow-sm' : 'bg-black/25 backdrop-blur-sm border-b border-white/10 shadow-lg'
            ]">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-20">
            <div class="flex justify-between items-center transition-all duration-500"
                 :class="scrolled ? 'h-16' : 'h-24'">

                <!-- Logo Dynamic Switcher (Inabadilika kulingana na Scroll) -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="/" class="block hover:scale-105 transition-transform duration-300">
                        <img :src="scrolled ? '{{ asset('images/training logo.png') }}' : '{{ asset('images/training-logo-white.png') }}'" 
                             alt="Training For Life Logo" 
                             class="h-12 sm:h-14 w-auto object-contain transition-all duration-300">
                    </a>
                </div>

                <!-- Desktop Nav Links (Nimeongeza ml-8 hapa chini ili kutoa nafasi kati ya logo na Home) -->
                <nav class="hidden lg:flex items-center space-x-3 xl:space-x-5 ml-4">
                    <a href="/" class="relative py-2 font-medium text-sm xl:text-base transition-colors duration-300 {{ request()->is('/') ? 'text-primary font-bold' : 'hover:text-primary' }}" :class="scrolled ? 'text-slate-800 dark:text-gray-200' : 'text-white font-semibold drop-shadow-[0_1.2px_1.2px_rgba(0,0,0,0.8)] dark:text-gray-200'">
                        Home
                        @if(request()->is('/'))
                            <span class="absolute bottom-0 left-0 w-full h-[3px] bg-primary rounded-full transition-all duration-300"></span>
                        @endif
                    </a>
                    
                    <a href="/about" class="relative py-2 font-medium text-sm xl:text-base transition-colors duration-300 {{ request()->is('about*') ? 'text-primary font-bold' : 'hover:text-primary' }}" :class="scrolled ? 'text-slate-800 dark:text-gray-200' : 'text-white font-semibold drop-shadow-[0_1.2px_1.2px_rgba(0,0,0,0.8)] dark:text-gray-200'">
                        About Us
                        @if(request()->is('about*'))
                            <span class="absolute bottom-0 left-0 w-full h-[3px] bg-primary rounded-full transition-all duration-300"></span>
                        @endif
                    </a>
                    
                    <a href="/programmes" class="relative py-2 font-medium text-sm xl:text-base transition-colors duration-300 {{ request()->is('programmes*') ? 'text-primary font-bold' : 'hover:text-primary' }}" :class="scrolled ? 'text-slate-800 dark:text-gray-200' : 'text-white font-semibold drop-shadow-[0_1.2px_1.2px_rgba(0,0,0,0.8)] dark:text-gray-200'">
                        Our Programmes
                        @if(request()->is('programmes*'))
                            <span class="absolute bottom-0 left-0 w-full h-[3px] bg-primary rounded-full transition-all duration-300"></span>
                        @endif
                    </a>
                    
                    <a href="/impact" class="relative py-2 font-medium text-sm xl:text-base transition-colors duration-300 {{ request()->is('impact*') ? 'text-primary font-bold' : 'hover:text-primary' }}" :class="scrolled ? 'text-slate-800 dark:text-gray-200' : 'text-white font-semibold drop-shadow-[0_1.2px_1.2px_rgba(0,0,0,0.8)] dark:text-gray-200'">
                        Impact
                        @if(request()->is('impact*'))
                            <span class="absolute bottom-0 left-0 w-full h-[3px] bg-primary rounded-full transition-all duration-300"></span>
                        @endif
                    </a>
                    
                    <a href="/get-involved" class="relative py-2 font-medium text-sm xl:text-base transition-colors duration-300 {{ request()->is('get-involved*') ? 'text-primary font-bold' : 'hover:text-primary' }}" :class="scrolled ? 'text-slate-800 dark:text-gray-200' : 'text-white font-semibold drop-shadow-[0_1.2px_1.2px_rgba(0,0,0,0.8)] dark:text-gray-200'">
                        Get Involved
                        @if(request()->is('get-involved*'))
                            <span class="absolute bottom-0 left-0 w-full h-[3px] bg-primary rounded-full transition-all duration-300"></span>
                        @endif
                    </a>
                    
                    <a href="/news-stories" class="relative py-2 font-medium text-sm xl:text-base transition-colors duration-300 {{ request()->is('news-stories*') ? 'text-primary font-bold' : 'hover:text-primary' }}" :class="scrolled ? 'text-slate-800 dark:text-gray-200' : 'text-white font-semibold drop-shadow-[0_1.2px_1.2px_rgba(0,0,0,0.8)] dark:text-gray-200'">
                        News & Stories
                        @if(request()->is('news-stories*'))
                            <span class="absolute bottom-0 left-0 w-full h-[3px] bg-primary rounded-full transition-all duration-300"></span>
                        @endif
                    </a>

                    <a href="/gallery" class="relative py-2 font-medium text-sm xl:text-base transition-colors duration-300 {{ request()->is('gallery*') ? 'text-primary font-bold' : 'hover:text-primary' }}" :class="scrolled ? 'text-slate-800 dark:text-gray-200' : 'text-white font-semibold drop-shadow-[0_1.2px_1.2px_rgba(0,0,0,0.8)] dark:text-gray-200'">
                        Gallery
                        @if(request()->is('gallery*'))
                            <span class="absolute bottom-0 left-0 w-full h-[3px] bg-primary rounded-full transition-all duration-300"></span>
                        @endif
                    </a>
                    
                    <a href="/contact" class="relative py-2 font-medium text-sm xl:text-base transition-colors duration-300 {{ request()->is('contact*') ? 'text-primary font-bold' : 'hover:text-primary' }}" :class="scrolled ? 'text-slate-800 dark:text-gray-200' : 'text-white font-semibold drop-shadow-[0_1.2px_1.2px_rgba(0,0,0,0.8)] dark:text-gray-200'">
                        Contact
                        @if(request()->is('contact*'))
                            <span class="absolute bottom-0 left-0 w-full h-[3px] bg-primary rounded-full transition-all duration-300"></span>
                        @endif
                    </a>

                    <!-- Desktop Theme Toggle Button -->
                    <div class="relative flex items-center border-l-2 pl-4 ml-2 transition-colors duration-300 border-gray-300/40 dark:border-gray-600">
                        <button @click="toggleTheme()" class="focus:outline-none transition-transform duration-300 hover:scale-110 hover:text-primary" :class="scrolled ? 'text-slate-800 dark:text-gray-300' : 'text-white drop-shadow-[0_1.2px_1.2px_rgba(0,0,0,0.8)] dark:text-gray-300'">
                            <svg x-show="theme === 'light'" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" style="display: none;">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>
                            </svg>
                            <svg x-show="theme === 'dark'" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" style="display: none;">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
                            </svg>
                        </button>
                    </div>
                </nav>

                <!-- Desktop Donate Button -->
                <div class="hidden lg:block ml-4">
                    <a href="/get-involved" class="bg-primary hover:bg-orange-600 text-white font-semibold py-2 px-6 rounded-md shadow transition-transform duration-300 hover:-translate-y-0.5">Donate</a>
                </div>

                <!-- Mobile Actions -->
                <div class="lg:hidden flex items-center space-x-4">
                    <!-- Mobile Theme Toggle -->
                    <button @click="toggleTheme()" class="focus:outline-none transition-transform duration-300 hover:scale-110"
                            :class="scrolled ? 'text-slate-800 dark:text-gray-200' : 'text-white drop-shadow-[0_1.2px_1.2px_rgba(0,0,0,0.8)] dark:text-gray-200'">
                        <svg x-show="theme === 'light'" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" style="display: none;">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>
                        </svg>
                        <svg x-show="theme === 'dark'" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" style="display: none;">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                    </button>

                    <!-- Morphing Hamburger Button -->
                    <button @click="open = !open" class="relative w-10 h-10 flex items-center justify-center focus:outline-none transition-colors group"
                            :class="scrolled ? 'text-slate-800 dark:text-gray-200' : 'text-white drop-shadow-[0_1.2px_1.2px_rgba(0,0,0,0.8)] dark:text-gray-200'">
                        <div class="relative w-6 h-[18px] flex flex-col justify-between overflow-hidden">
                            <span class="w-full h-0.5 bg-current rounded-full transition-all duration-300 origin-left" :class="open ? 'rotate-45 translate-x-[2px] -translate-y-[1px]' : ''"></span>
                            <span class="w-full h-0.5 bg-current rounded-full transition-all duration-300" :class="open ? 'opacity-0 translate-x-2' : ''"></span>
                            <span class="w-full h-0.5 bg-current rounded-full transition-all duration-300 origin-left" :class="open ? '-rotate-45 translate-x-[2px] translate-y-[1px]' : ''"></span>
                        </div>
                    </button>
                </div>

            </div>
        </div>

        <!-- 2. APPLE-STYLE FLOATING MOBILE MENU -->
        <div x-show="open" 
             style="display: none;"
             x-transition:enter="transition-all duration-500 ease-[cubic-bezier(0.16,1,0.3,1)]"
             x-transition:enter-start="opacity-0 scale-95 -translate-y-4"
             x-transition:enter-end="opacity-100 scale-100 translate-y-0"
             x-transition:leave="transition-all duration-300 ease-in"
             x-transition:leave-start="opacity-100 scale-100 translate-y-0"
             x-transition:leave-end="opacity-0 scale-95 -translate-y-4"
             class="absolute top-[110%] left-4 right-4 z-50">
             
            <nav class="bg-white/95 dark:bg-slate-800/95 backdrop-blur-2xl border border-gray-100 dark:border-slate-700 shadow-[0_20px_50px_-12px_rgba(0,0,0,0.15)] rounded-3xl p-5 max-h-[80vh] overflow-y-auto">
                <ul class="flex flex-col space-y-1">
                    <li>
                        <a href="/" @click="open = false" class="block px-5 py-3.5 text-sm font-bold uppercase tracking-widest rounded-2xl transition-all duration-300 {{ request()->is('/') ? 'bg-primary/10 text-primary' : 'text-slate-600 dark:text-gray-200 hover:bg-slate-50 dark:hover:bg-slate-700 hover:text-primary hover:translate-x-1' }}">Home</a>
                    </li>
                    <li>
                        <a href="/about" @click="open = false" class="block px-5 py-3.5 text-sm font-bold uppercase tracking-widest rounded-2xl transition-all duration-300 {{ request()->is('about*') ? 'bg-primary/10 text-primary' : 'text-slate-600 dark:text-gray-200 hover:bg-slate-50 dark:hover:bg-slate-700 hover:text-primary hover:translate-x-1' }}">About Us</a>
                    </li>
                    <li>
                        <a href="/programmes" @click="open = false" class="block px-5 py-3.5 text-sm font-bold uppercase tracking-widest rounded-2xl transition-all duration-300 {{ request()->is('programmes*') ? 'bg-primary/10 text-primary' : 'text-slate-600 dark:text-gray-200 hover:bg-slate-50 dark:hover:bg-slate-700 hover:text-primary hover:translate-x-1' }}">Our Programmes</a>
                    </li>
                    <li>
                        <a href="/impact" @click="open = false" class="block px-5 py-3.5 text-sm font-bold uppercase tracking-widest rounded-2xl transition-all duration-300 {{ request()->is('impact*') ? 'bg-primary/10 text-primary' : 'text-slate-600 dark:text-gray-200 hover:bg-slate-50 dark:hover:bg-slate-700 hover:text-primary hover:translate-x-1' }}">Impact</a>
                    </li>
                    <li>
                        <a href="/get-involved" @click="open = false" class="block px-5 py-3.5 text-sm font-bold uppercase tracking-widest rounded-2xl transition-all duration-300 {{ request()->is('get-involved*') ? 'bg-primary/10 text-primary' : 'text-slate-600 dark:text-gray-200 hover:bg-slate-50 dark:hover:bg-slate-700 hover:text-primary hover:translate-x-1' }}">Get Involved</a>
                    </li>
                    <li>
                        <a href="/news-stories" @click="open = false" class="block px-5 py-3.5 text-sm font-bold uppercase tracking-widest rounded-2xl transition-all duration-300 {{ request()->is('news-stories*') ? 'bg-primary/10 text-primary' : 'text-slate-600 dark:text-gray-200 hover:bg-slate-50 dark:hover:bg-slate-700 hover:text-primary hover:translate-x-1' }}">News & Stories</a>
                    </li>
                    <li>
                        <a href="/gallery" @click="open = false" class="block px-5 py-3.5 text-sm font-bold uppercase tracking-widest rounded-2xl transition-all duration-300 {{ request()->is('gallery*') ? 'bg-primary/10 text-primary' : 'text-slate-600 dark:text-gray-200 hover:bg-slate-50 dark:hover:bg-slate-700 hover:text-primary hover:translate-x-1' }}">Gallery</a>
                    </li>
                    <li>
                        <a href="/contact" @click="open = false" class="block px-5 py-3.5 text-sm font-bold uppercase tracking-widest rounded-2xl transition-all duration-300 {{ request()->is('contact*') ? 'bg-primary/10 text-primary' : 'text-slate-600 dark:text-gray-200 hover:bg-slate-50 dark:hover:bg-slate-700 hover:text-primary hover:translate-x-1' }}">Contact</a>
                    </li>
                    
                    <li class="pt-4 mt-2 border-t border-gray-100 dark:border-slate-700"> 
                        <a href="/get-involved" class="flex items-center justify-center bg-primary hover:bg-orange-600 text-white font-black text-[12px] uppercase tracking-widest py-4 rounded-2xl shadow-lg shadow-orange-500/20 active:scale-95 transition-transform">
                            Donate Now
                            <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Dark Overlay -->
    <div x-show="open" 
         style="display: none;"
         x-transition.opacity.duration.300ms
         class="fixed inset-0 bg-black/40 backdrop-blur-sm z-30" 
         @click="open = false"></div>
</div>