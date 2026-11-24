<!-- CUSTOM STYLES KWA AJILI YA ANIMATION YA KUPUMUA NA DROPDOWN YA ABOUT US -->
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

    /* ---------- Dropdown ya "About Us" (CSS ya kawaida, haihitaji npm run build) ---------- */
    .tfl-dd { position: relative; }

    .tfl-dd-panel {
        position: absolute;
        left: 0;
        top: 100%;
        z-index: 60;
        width: 19.5rem;
        padding-top: .85rem; /* daraja la hover: kipanya hakitoki nje wakati kinashuka */
        opacity: 0;
        visibility: hidden;
        transform: translateY(8px);
        transition: opacity .25s ease, transform .25s ease, visibility .25s;
    }

    .tfl-dd-panel.is-open { opacity: 1; visibility: visible; transform: translateY(0); }

    .tfl-dd-card {
        padding: .6rem;
        border-radius: 1.25rem;
        background: rgba(255, 255, 255, .97);
        border: 1px solid rgba(148, 163, 184, .35);
        box-shadow: 0 24px 50px -16px rgba(2, 6, 23, .35);
        -webkit-backdrop-filter: blur(16px);
        backdrop-filter: blur(16px);
    }

    .dark .tfl-dd-card { background: rgba(15, 23, 42, .97); border-color: rgba(51, 65, 85, .9); }

    .tfl-dd-head {
        padding: .5rem .8rem .35rem;
        font-size: .68rem;
        font-weight: 800;
        letter-spacing: .14em;
        text-transform: uppercase;
        color: #94a3b8;
    }

    .tfl-dd-item {
        display: flex;
        align-items: center;
        gap: .75rem;
        padding: .6rem .8rem;
        border-radius: .85rem;
        font-size: .9rem;
        font-weight: 600;
        line-height: 1.3;
        color: #334155;
        transition: background-color .2s ease, color .2s ease, transform .2s ease;
    }

    .dark .tfl-dd-item { color: #e2e8f0; }

    .tfl-dd-item:hover,
    .tfl-dd-item:focus-visible {
        background: rgba(249, 115, 22, .1);
        color: #ea580c;
        transform: translateX(3px);
    }

    .tfl-dd-item:focus-visible { outline: 2px solid #f97316; outline-offset: -2px; }

    .tfl-dd-num {
        display: flex;
        flex: none;
        align-items: center;
        justify-content: center;
        width: 1.6rem;
        height: 1.6rem;
        border-radius: .5rem;
        font-size: .7rem;
        font-weight: 800;
        background: rgba(7, 0, 73, .08);
        color: #070049;
        transition: background-color .2s ease, color .2s ease;
    }

    .dark .tfl-dd-num { background: rgba(249, 115, 22, .15); color: #fb923c; }
    .tfl-dd-item:hover .tfl-dd-num, .tfl-dd-item:focus-visible .tfl-dd-num { background: #f97316; color: #fff; }

    .tfl-chev { transition: transform .25s ease; }
    .tfl-chev.is-open { transform: rotate(180deg); }

    /* Mobile accordion */
    .tfl-m-sub {
        margin: .25rem 0 .5rem 1.25rem;
        padding-left: .6rem;
        border-left: 2px solid rgba(249, 115, 22, .45);
    }

    @media (prefers-reduced-motion: reduce) {
        .tfl-dd-panel, .tfl-dd-item, .tfl-chev { transition: none; }
    }
</style>

@php
    $aboutUrl = route('about');
    $impactUrl = route('impact');
    $involvedUrl = route('get-involved');

    $navLinks = [
        ['label' => 'Home', 'href' => route('home'), 'active' => request()->routeIs('home')],

        // About Us ina sub-menu: kila kimoja kinaenda sehemu husika ya ukurasa wa About (anchor #id)
        [
            'label' => 'About Us',
            'href' => $aboutUrl,
            'active' => request()->routeIs('about'),
            'key' => 'about',
            'children' => [
                ['label' => 'Our Story', 'href' => $aboutUrl . '#our-story', 'id' => 'our-story'],
                ['label' => 'Who We Are', 'href' => $aboutUrl . '#who-we-are', 'id' => 'who-we-are'],
                ['label' => 'Mission, Vision & Values', 'href' => $aboutUrl . '#mission-vision-values', 'id' => 'mission-vision-values'],
                ['label' => 'Our Approach', 'href' => $aboutUrl . '#our-approach', 'id' => 'our-approach'],
                ['label' => 'Leadership & Governance', 'href' => $aboutUrl . '#leadership-governance', 'id' => 'leadership-governance'],
                ['label' => 'Accountability', 'href' => $aboutUrl . '#accountability', 'id' => 'accountability'],
            ],
        ],

        ['label' => 'Our Programmes', 'href' => route('programmes'), 'active' => request()->routeIs('programmes')],
        // Impact ina sub-menu: kila kimoja kinaenda sehemu husika ya ukurasa wa Impact (anchor #id)
        [
            'label' => 'Impact',
            'href' => $impactUrl,
            'active' => request()->routeIs('impact'),
            'key' => 'impact',
            'children' => [
                ['label' => 'TFL at a glance', 'href' => $impactUrl . '#results', 'id' => 'results'],
                ['label' => 'Impact Stories', 'href' => $impactUrl . '#stories', 'id' => 'stories'],
                ['label' => 'The Challenge', 'href' => $impactUrl . '#challenge', 'id' => 'challenge'],
            ],
        ],
        // Get Involved ina sub-menu: kila kimoja kinaenda sehemu husika ya ukurasa wa Get Involved (anchor #id)
        [
            'label' => 'Get Involved',
            'href' => $involvedUrl,
            'active' => request()->routeIs('get-involved'),
            'key' => 'involved',
            'children' => [
                ['label' => 'Donate', 'href' => $involvedUrl . '#donate', 'id' => 'donate'],
                ['label' => 'Sponsor a Youth', 'href' => $involvedUrl . '#sponsor', 'id' => 'sponsor'],
                ['label' => 'Become a Partner', 'href' => $involvedUrl . '#partner', 'id' => 'partner'],
                ['label' => 'Volunteer', 'href' => $involvedUrl . '#volunteer', 'id' => 'volunteer'],
            ],
        ],
        ['label' => 'News and Resources', 'href' => route('news-stories'), 'active' => request()->routeIs('news-stories')],
    ];
@endphp

<!-- WRAPPER KUU INAYOBEBA KILA KITU -->
<div x-data="{
        scrolled: false,
        isHidden: false,
        lastScroll: 0,
        open: false,
        dd: '',
        mobileDd: '',
        lockUntil: 0,
        goSection(e, hash, here) {
            this.lockUntil = Date.now() + 1500;
            this.dd = '';
            this.open = false;
            this.mobileDd = '';
            if (!here) return;
            var el = document.querySelector(hash);
            if (!el) return;
            e.preventDefault();
            el.scrollIntoView({ behavior: 'smooth', block: 'start' });
            history.pushState(null, '', hash);
        },
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
        if (location.hash) lockUntil = Date.now() + 2000;

        window.addEventListener('scroll', () => {
            let winScroll = document.documentElement.scrollTop || document.body.scrollTop;
            let height = document.documentElement.scrollHeight - document.documentElement.clientHeight;

            scrollPercent = height > 0 ? (winScroll / height) * 100 : 0;

            if (Date.now() < lockUntil) {
                isHidden = false;
            } else if (winScroll > 200) {
                if (winScroll > lastScroll + 8) {
                    isHidden = true;
                    dd = '';
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
                        @if (!empty($link['children']))

                            {{-- ===== About Us: dropdown (hover kwa kipanya, bonyeza kwa kidole) ===== --}}
                            <div class="tfl-dd"
                                 @mouseenter="dd = '{{ $link['key'] }}'"
                                 @mouseleave="if (dd === '{{ $link['key'] }}') dd = ''"
                                 @focusin="dd = '{{ $link['key'] }}'"
                                 @focusout="if (!$el.contains($event.relatedTarget) && dd === '{{ $link['key'] }}') dd = ''"
                                 @keydown.escape="dd = ''">

                                <a href="{{ $link['href'] }}"
                                   aria-haspopup="true"
                                   :aria-expanded="(dd === '{{ $link['key'] }}').toString()"
                                   {{-- Kwenye skrini za kugusa (hakuna hover): kubonyeza kunafungua menu badala ya kuhama ukurasa --}}
                                   @click="if (window.matchMedia('(hover: none)').matches) { $event.preventDefault(); dd = (dd === '{{ $link['key'] }}') ? '' : '{{ $link['key'] }}' }"
                                   class="relative inline-flex items-center gap-1.5 px-4 py-2 rounded-full font-semibold text-sm xl:text-base whitespace-nowrap transition-all duration-300"
                                   :class="solid
                                        ? '{{ $link['active']
                                            ? 'bg-orange-500/10 text-orange-600 dark:text-orange-400'
                                            : 'text-slate-700 dark:text-gray-200 hover:bg-slate-100 dark:hover:bg-slate-800 hover:text-orange-500' }}'
                                        : '{{ $link['active']
                                            ? 'bg-white/15 text-white'
                                            : 'text-white/90 hover:bg-white/10 hover:text-white' }}'">
                                    {{ $link['label'] }}
                                    <svg class="tfl-chev w-3.5 h-3.5" :class="dd === '{{ $link['key'] }}' ? 'is-open' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </a>

                                <div class="tfl-dd-panel" :class="dd === '{{ $link['key'] }}' ? 'is-open' : ''">
                                    <div class="tfl-dd-card">
                                        <p class="tfl-dd-head">On this page</p>
                                        @foreach ($link['children'] as $child)
                                            <a href="{{ $child['href'] }}"
                                               @click="goSection($event, '#{{ $child['id'] }}', {{ $link['active'] ? 'true' : 'false' }})"
                                               class="tfl-dd-item">
                                                <span class="tfl-dd-num">{{ $loop->iteration }}</span>
                                                {{ $child['label'] }}
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                        @else

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

                        @endif
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
                        Donate
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
                            @if (!empty($link['children']))

                                {{-- ===== About Us (mobile): bonyeza ili ifunguke / ifungwe ===== --}}
                                <button type="button"
                                        @click="mobileDd = (mobileDd === '{{ $link['key'] }}') ? '' : '{{ $link['key'] }}'"
                                        :aria-expanded="(mobileDd === '{{ $link['key'] }}').toString()"
                                        class="flex w-full items-center justify-between px-5 py-3.5 text-sm font-bold uppercase tracking-widest rounded-2xl transition-all duration-300 {{ $link['active']
                                            ? 'bg-orange-500/10 text-orange-500'
                                            : 'text-slate-600 dark:text-gray-200 hover:bg-slate-100 dark:hover:bg-slate-800 hover:text-orange-500' }}">
                                    {{ $link['label'] }}
                                    <svg class="tfl-chev w-4 h-4" :class="mobileDd === '{{ $link['key'] }}' ? 'is-open' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="3" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>

                                <div x-show="mobileDd === '{{ $link['key'] }}'"
                                     style="display: none;"
                                     x-transition.opacity.duration.200ms
                                     class="tfl-m-sub">
                                    <a href="{{ $link['href'] }}"
                                       @click="open = false; mobileDd = ''"
                                       class="block px-4 py-2.5 text-[13px] font-bold rounded-xl text-slate-500 dark:text-gray-300 hover:bg-slate-100 dark:hover:bg-slate-800 hover:text-orange-500 transition-colors">
                                        {{ $link['label'] }} (overview)
                                    </a>
                                    @foreach ($link['children'] as $child)
                                        <a href="{{ $child['href'] }}"
                                           @click="goSection($event, '#{{ $child['id'] }}', {{ $link['active'] ? 'true' : 'false' }})"
                                           class="block px-4 py-2.5 text-[13px] font-semibold rounded-xl text-slate-600 dark:text-gray-200 hover:bg-slate-100 dark:hover:bg-slate-800 hover:text-orange-500 transition-colors">
                                            {{ $child['label'] }}
                                        </a>
                                    @endforeach
                                </div>

                            @else

                                <a href="{{ $link['href'] }}"
                                   @click="open = false"
                                   class="block px-5 py-3.5 text-sm font-bold uppercase tracking-widest rounded-2xl transition-all duration-300 {{ $link['active']
                                        ? 'bg-orange-500/10 text-orange-500'
                                        : 'text-slate-600 dark:text-gray-200 hover:bg-slate-100 dark:hover:bg-slate-800 hover:text-orange-500 hover:translate-x-1' }}">
                                    {{ $link['label'] }}
                                </a>

                            @endif
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