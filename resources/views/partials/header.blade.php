<!-- Navigation Bar (With Apple-style Genie Effect & Theme Switcher) -->
<header x-data="{ 
            scrolled: false, 
            open: false,
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
        x-init="applyTheme()"
        @scroll.window="scrolled = (window.pageYOffset > 50)"
        class="fixed w-full top-0 z-40 transition-all duration-500"
        :class="scrolled ? 'bg-white dark:bg-slate-900 shadow-md' : 'bg-black/30 backdrop-blur-md border-b border-white/10 shadow-sm'">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center transition-all duration-500"
             :class="scrolled ? 'h-16' : 'h-24'">

            <!-- Logo -->
            <div class="flex-shrink-0 flex items-center">
                <span class="font-bold text-2xl text-primary transition-colors duration-300">TFL LOGO</span>
            </div>

            <!-- Desktop Nav Links -->
            <nav class="hidden lg:flex items-center space-x-6">
                <a href="/" class="font-medium text-sm xl:text-base transition-colors duration-300 hover:text-primary" :class="scrolled ? 'text-slate-900 dark:text-gray-200' : 'text-gray-100 dark:text-gray-200'">Home</a>
                
                <a href="/about" class="font-medium text-sm xl:text-base transition-colors duration-300 hover:text-primary" :class="scrolled ? 'text-slate-900 dark:text-gray-200' : 'text-gray-100 dark:text-gray-200'">About Us</a>
                
                <a href="/programmes" class="font-medium text-sm xl:text-base transition-colors duration-300 hover:text-primary" :class="scrolled ? 'text-slate-900 dark:text-gray-200' : 'text-gray-100 dark:text-gray-200'">Our Programmes</a>
                
                <a href="/impact" class="font-medium text-sm xl:text-base transition-colors duration-300 hover:text-primary" :class="scrolled ? 'text-slate-900 dark:text-gray-200' : 'text-gray-100 dark:text-gray-200'">Impact</a>
                
                <a href="/get-involved" class="font-medium text-sm xl:text-base transition-colors duration-300 hover:text-primary" :class="scrolled ? 'text-slate-900 dark:text-gray-200' : 'text-gray-100 dark:text-gray-200'">Get Involved</a>
                
                <a href="/news-stories" class="font-medium text-sm xl:text-base transition-colors duration-300 hover:text-primary" :class="scrolled ? 'text-slate-900 dark:text-gray-200' : 'text-gray-100 dark:text-gray-200'">News & Stories</a>
                
                <a href="/contact" class="font-medium text-sm xl:text-base transition-colors duration-300 hover:text-primary" :class="scrolled ? 'text-slate-900 dark:text-gray-200' : 'text-gray-100 dark:text-gray-200'">Contact</a>

                <!-- Desktop Theme Toggle Button -->
                <div class="relative flex items-center border-l-2 pl-4 ml-2 transition-colors duration-300 border-gray-300 dark:border-gray-600">
                    <button @click="toggleTheme()" class="focus:outline-none transition-transform duration-300 hover:scale-110 hover:text-primary" :class="scrolled ? 'text-slate-900 dark:text-gray-300' : 'text-white dark:text-gray-300'">
                        <!-- Moon Icon (Light Mode) -->
                        <svg x-show="theme === 'light'" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" style="display: none;">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>
                        </svg>
                        <!-- Sun Icon (Dark Mode) -->
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

            <!-- Mobile Actions (Theme Toggle & Hamburger) -->
            <div class="lg:hidden flex items-center space-x-4">
                <!-- Mobile Theme Toggle Button -->
                <button @click="toggleTheme()" class="focus:outline-none transition-transform duration-300 hover:scale-110"
                        :class="scrolled ? 'text-slate-900 dark:text-gray-200' : 'text-white dark:text-gray-200'">
                    <!-- Moon Icon (Light Mode) -->
                    <svg x-show="theme === 'light'" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" style="display: none;">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>
                    </svg>
                    <!-- Sun Icon (Dark Mode) -->
                    <svg x-show="theme === 'dark'" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" style="display: none;">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                </button>

                <!-- Mobile Hamburger Button -->
                <button @click="open = true" class="focus:outline-none transition-colors duration-300"
                        :class="scrolled ? 'text-slate-900 dark:text-gray-200' : 'text-white dark:text-gray-200'">
                    <svg class="w-8 h-8 transform transition-transform duration-300 hover:scale-110 active:scale-95" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                </button>
            </div>

        </div>
    </div>

    <!-- Mobile Side Drawer (Genie Effect) -->
    <div x-show="open" class="fixed inset-0 overflow-hidden z-[60]" style="display: none;" aria-labelledby="slide-over-title" role="dialog" aria-modal="true">
        <div class="absolute inset-0 overflow-hidden">

            <!-- Dark Overlay -->
            <div x-show="open" 
                 x-transition:enter="ease-out duration-500" 
                 x-transition:enter-start="opacity-0" 
                 x-transition:enter-end="opacity-100" 
                 x-transition:leave="ease-in duration-500" 
                 x-transition:leave-start="opacity-100" 
                 x-transition:leave-end="opacity-0" 
                 class="absolute inset-0 bg-black bg-opacity-60 transition-opacity backdrop-blur-sm" 
                 @click="open = false" aria-hidden="true"></div>

            <div class="pointer-events-none fixed inset-y-0 right-0 flex max-w-full">

                <!-- Drawer Box -->
                <div x-show="open" 
                     x-transition:enter="transform transition-all duration-[1000ms] ease-out origin-top" 
                     x-transition:enter-start="opacity-0 scale-y-0" 
                     x-transition:enter-end="opacity-100 scale-y-100" 
                     x-transition:leave="transform transition-all duration-[600ms] ease-in origin-top" 
                     x-transition:leave-start="opacity-100 scale-y-100" 
                     x-transition:leave-end="opacity-0 scale-y-0" 
                     class="pointer-events-auto relative w-screen max-w-sm h-full bg-white dark:bg-slate-900 shadow-2xl flex flex-col overflow-hidden">

                        <!-- Header ya Side Menu & Kitufe cha Kufunga (X) -->
                        <div class="px-6 flex justify-between items-center border-b border-gray-100 dark:border-gray-800 pb-4 mt-6">
                            <h2 class="text-2xl font-bold text-primary">TFL LOGO</h2>
                            <button type="button" @click="open = false" class="rounded-full bg-gray-50 dark:bg-slate-800 text-gray-500 dark:text-gray-300 hover:text-slate-900 dark:hover:text-white focus:outline-none p-2 transition-transform duration-300 hover:rotate-90">
                                <span class="sr-only">Close panel</span>
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>

                        <!-- Links za Menu -->
                        <div class="relative mt-4 flex-1 px-6 overflow-y-auto">
                            <nav class="flex flex-col space-y-1">
                                <a href="/" class="px-4 py-3 text-base font-medium text-slate-700 dark:text-gray-200 hover:text-primary dark:hover:text-primary hover:bg-orange-50 dark:hover:bg-slate-800 rounded-lg transition-colors">Home</a>
                                
                                <a href="/about" class="px-4 py-3 text-base font-medium text-slate-700 dark:text-gray-200 hover:text-primary dark:hover:text-primary hover:bg-orange-50 dark:hover:bg-slate-800 rounded-lg transition-colors">About Us</a>
                                
                                <a href="/programmes" class="px-4 py-3 text-base font-medium text-slate-700 dark:text-gray-200 hover:text-primary dark:hover:text-primary hover:bg-orange-50 dark:hover:bg-slate-800 rounded-lg transition-colors">Our Programmes</a>
                                
                                <a href="/impact" class="px-4 py-3 text-base font-medium text-slate-700 dark:text-gray-200 hover:text-primary dark:hover:text-primary hover:bg-orange-50 dark:hover:bg-slate-800 rounded-lg transition-colors">Impact</a>
                                
                                <a href="/get-involved" class="px-4 py-3 text-base font-medium text-slate-700 dark:text-gray-200 hover:text-primary dark:hover:text-primary hover:bg-orange-50 dark:hover:bg-slate-800 rounded-lg transition-colors">Get Involved</a>
                                
                                <a href="/news-stories" class="px-4 py-3 text-base font-medium text-slate-700 dark:text-gray-200 hover:text-primary dark:hover:text-primary hover:bg-orange-50 dark:hover:bg-slate-800 rounded-lg transition-colors">News & Stories</a>
                                
                                <a href="/contact" class="px-4 py-3 text-base font-medium text-slate-700 dark:text-gray-200 hover:text-primary dark:hover:text-primary hover:bg-orange-50 dark:hover:bg-slate-800 rounded-lg transition-colors">Contact</a>

                                <!-- Donate Button (Mobile) -->
                                <div class="pt-6 mt-2 border-t border-gray-100 dark:border-gray-800">
                                    <a href="/get-involved" class="block w-full text-center bg-primary hover:bg-orange-600 text-white font-semibold py-4 px-6 rounded-md shadow-lg transition-transform duration-300 hover:-translate-y-1">
                                        Donate Now
                                    </a>
                                </div>
                            </nav>
                        </div>

                </div>
            </div>
        </div>
    </div>
</header>