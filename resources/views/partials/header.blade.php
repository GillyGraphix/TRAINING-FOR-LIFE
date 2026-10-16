<!-- CUSTOM STYLES KWA AJILI YA ANIMATION YA KUPUMUA -->
<style>
    .progress-breathe {
        /* Rangi za Orange na Dark Blue */
        background: linear-gradient(90deg, #f97316, #172554, #ea580c, #1e3a8a, #f97316);
        background-size: 200% 100%;
        animation: breathe-scroll 3s linear infinite;
        box-shadow: 0 0 8px rgba(249, 115, 22, 0.6);
    }

    @keyframes breathe-scroll {
        0% { background-position: 200% 0; }
        100% { background-position: -200% 0; }
    }
</style>

@php
    $navLinks = [
        ['label' => 'Home', 'href' => route('home'), 'active' => request()->routeIs('home')],
        ['label' => 'About Us', 'href' => route('about'), 'active' => request()->routeIs('about')],
        ['label' => 'Our Programmes', 'href' => route('programmes'), 'active' => request()->routeIs('programmes')],
        ['label' => 'Impact', 'href' => route('impact'), 'active' => request()->routeIs('impact')],
        ['label' => 'Get Involved', 'href' => route('get-involved'), 'active' => request()->routeIs('get-involved')],
        ['label' => 'News and Resources', 'href' => route('news-stories'), 'active' => request()->routeIs('news-stories')],
        ['label' => 'Gallery', 'href' => route('gallery'), 'active' => request()->routeIs('gallery')],
    ];
@endphp

<!-- WRAPPER KUU INAYOBEBA KILA KITU -->
<div x-data="{
        scrolled: false,
        isHidden: false,
        lastScroll: 0,
        open: false,
        scrollPercent: 0,
        isHome: {{ request()->routeIs('home') ? 'true' : 'false' }},
        get solid() {
            return this.scrolled || !this.isHome;
        },
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
                    if (open) open = false;
                } else if (winScroll < lastScroll - 4) {
                    isHidden = false;
                }
            } else {
                isHidden = false;
            }

            lastScroll = winScroll;
            scrolled = winScroll > 50;
        });
    ">

    <!-- Scroll Progress Bar -->
    <div class="fixed top-0 left-0 h-[3.5px] progress-breathe z-50 transition-all duration-75"
         :style="'width: ' + scrollPercent + '%'">
    </div>

    <!-- HEADER -->
    <header class="fixed w-full z-40 transition-all duration-500 ease-[cubic-bezier(0.16,1,0.3,1)]"
            :class="[
                isHidden ? '-translate-y-full' : 'translate-y-0',
                solid
                    ? 'top-0 bg-white/90 dark:bg-slate-950/90 backdrop-blur-xl border-b border-gray-200 dark:border-slate-800 shadow-sm'
                    : 'top-6 md:top-8 bg-transparent'
            ]">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-20">
            <div class="flex justify-between items-center transition-all duration-500"
                 :class="solid ? 'h-16' : 'h-16 md:h-20'">

                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('home') }}" class="block hover:scale-105 transition-transform duration-300">
                        <img :src="(solid && theme === 'light')
                                    ? '{{ asset('images/training logo.png') }}'
                                    : '{{ asset('images/training-logo-white.png') }}'"
                             alt="Training For Life Logo"
                             class="h-12 sm:h-14 w-auto object-contain transition-all duration-300 drop-shadow-md">
                    </a>
                </div>

                <!-- Desktop Navigation -->
                <nav class="hidden lg:flex items-center space-x-1 xl:space-x-2 ml-4">
                    @foreach ($navLinks as $link)
                        <a href="{{ $link['href'] }}"
                           class="relative px-4 py-2 rounded-full font-semibold text-sm xl:text-base whitespace-nowrap transition-all duration-300"
                           :class="solid
                                ? '{{ $link['active']
                                    ? 'bg-orange-500/10 text-orange-600 dark:text-orange-400'
                                    : 'text-slate-700 dark:text-gray-200 hover:bg-slate-100 dark:hover:bg-slate-800 hover:text-orange-500' }}'
                                : '{{ $link['active']
                                    ? 'bg-white/15 text-white'
                                    : 'text-white/90 hover:bg-white/10 hover:text-white' }}'">
                            {{ $link['label'] }}
                        </a>
                    @endforeach

                    <!-- Desktop Theme Toggle -->
                    <div class="relative flex items-center border-l-2 pl-4 ml-2 transition-colors duration-300"
                         :class="solid ? 'border-gray-300 dark:border-gray-700' : 'border-white/30'">
                        <button @click="toggleTheme()"
                                class="focus:outline-none transition-transform duration-300 hover:scale-110 hover:text-orange-500"
                                :class="solid ? 'text-slate-800 dark:text-gray-300' : 'text-white drop-shadow-md'"
                                aria-label="Toggle color theme">
                            <svg x-show="theme === 'light'"
                                 class="w-5 h-5"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24"
                                 stroke-width="2"
                                 style="display: none;">
                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z">
                                </path>
                            </svg>

                            <svg x-show="theme === 'dark'"
                                 class="w-5 h-5"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24"
                                 stroke-width="2"
                                 style="display: none;">
                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z">
                                </path>
                            </svg>
                        </button>
                    </div>
                </nav>

                <!-- Desktop Support Button -->
                <div class="hidden lg:block ml-4">
                    <a href="{{ route('get-involved') }}"
                       class="font-bold py-2 px-6 rounded-full transition-all duration-300 hover:-translate-y-0.5 tracking-wide"
                       :class="solid
                            ? 'bg-orange-500 hover:bg-orange-600 text-white shadow-[0_4px_14px_rgba(249,115,22,0.4)]'
                            : 'border-2 border-orange-500 bg-black/20 backdrop-blur-sm text-orange-400 hover:bg-orange-500 hover:text-white shadow-[0_0_15px_rgba(249,115,22,0.3)]'">
                        Support
                    </a>
                </div>

                <!-- Mobile Actions -->
                <div class="lg:hidden flex items-center space-x-4">

                    <!-- Mobile Theme Toggle -->
                    <button @click="toggleTheme()"
                            class="focus:outline-none transition-transform duration-300 hover:scale-110"
                            :class="solid ? 'text-slate-800 dark:text-gray-200' : 'text-white drop-shadow-md'"
                            aria-label="Toggle color theme">
                        <svg x-show="theme === 'light'"
                             class="w-6 h-6"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24"
                             stroke-width="2"
                             style="display: none;">
                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z">
                            </path>
                        </svg>

                        <svg x-show="theme === 'dark'"
                             class="w-6 h-6"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24"
                             stroke-width="2"
                             style="display: none;">
                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z">
                            </path>
                        </svg>
                    </button>

                    <!-- Mobile Menu Button -->
                    <button @click="open = !open"
                            class="relative w-10 h-10 flex items-center justify-center focus:outline-none transition-colors group"
                            :class="solid ? 'text-slate-800 dark:text-gray-200' : 'text-white drop-shadow-md'"
                            aria-label="Toggle navigation menu">
                        <div class="relative w-6 h-[18px] flex flex-col justify-between overflow-hidden">
                            <span class="w-full h-0.5 bg-current rounded-full transition-all duration-300 origin-left"
                                  :class="open ? 'rotate-45 translate-x-[2px] -translate-y-[1px]' : ''"></span>

                            <span class="w-full h-0.5 bg-current rounded-full transition-all duration-300"
                                  :class="open ? 'opacity-0 translate-x-2' : ''"></span>

                            <span class="w-full h-0.5 bg-current rounded-full transition-all duration-300 origin-left"
                                  :class="open ? '-rotate-45 translate-x-[2px] translate-y-[1px]' : ''"></span>
                        </div>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div x-show="open"
             style="display: none;"
             x-transition:enter="transition-all duration-500 ease-[cubic-bezier(0.16,1,0.3,1)]"
             x-transition:enter-start="opacity-0 scale-95 -translate-y-4"
             x-transition:enter-end="opacity-100 scale-100 translate-y-0"
             x-transition:leave="transition-all duration-300 ease-in"
             x-transition:leave-start="opacity-100 scale-100 translate-y-0"
             x-transition:leave-end="opacity-0 scale-95 -translate-y-4"
             class="absolute top-[110%] left-4 right-4 z-50">

            <nav class="bg-white/95 dark:bg-slate-900/95 backdrop-blur-2xl border border-gray-200 dark:border-slate-700 shadow-[0_20px_50px_-12px_rgba(0,0,0,0.2)] rounded-[24px] p-5 max-h-[80vh] overflow-y-auto">
                <ul class="flex flex-col space-y-1">
                    @foreach ($navLinks as $link)
                        <li>
                            <a href="{{ $link['href'] }}"
                               @click="open = false"
                               class="block px-5 py-3.5 text-sm font-bold uppercase tracking-widest rounded-2xl transition-all duration-300 {{ $link['active']
                                    ? 'bg-orange-500/10 text-orange-500'
                                    : 'text-slate-600 dark:text-gray-200 hover:bg-slate-100 dark:hover:bg-slate-800 hover:text-orange-500 hover:translate-x-1' }}">
                                {{ $link['label'] }}
                            </a>
                        </li>
                    @endforeach

                    <li class="pt-4 mt-2 border-t border-gray-200 dark:border-slate-700">
                        <a href="{{ route('get-involved') }}"
                           @click="open = false"
                           class="flex items-center justify-center bg-orange-500 hover:bg-orange-600 text-white font-black text-[12px] uppercase tracking-widest py-4 rounded-xl shadow-lg shadow-orange-500/30 active:scale-95 transition-transform">
                            Support
                            <svg class="ml-2 w-4 h-4"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">
                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="3"
                                      d="M17 8l4 4m0 0l-4 4m4-4H3">
                                </path>
                            </svg>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Dark Overlay ya Mobile Menu -->
    <div x-show="open"
         style="display: none;"
         x-transition.opacity.duration.300ms
         class="fixed inset-0 bg-black/60 backdrop-blur-sm z-30"
         @click="open = false">
    </div>
</div>