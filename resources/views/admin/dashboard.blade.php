<x-app-layout>
    <style>
        body { background-color: #f8fafc; }
        html.dark body { background-color: #111827; }
        aside { transition: transform 0.3s ease-in-out; }
        .tab-content { transition: opacity 0.3s ease-in-out; }
        .clickable-row { user-select: none; -webkit-tap-highlight-color: transparent; }
    </style>

    {{-- HEADER --}}
    <x-slot name="header">
        <div class="flex justify-between items-center bg-[#070049] dark:bg-gray-900 p-4 rounded-xl shadow-lg border-b-4 border-[#f79120]">
            <div class="flex items-center gap-4">
                <button id="mobile-menu-btn" type="button" class="lg:hidden text-white hover:text-[#f79120] focus:outline-none" aria-label="Fungua menu">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>

                <img src="{{ asset('images/adminlogo.png') }}" alt="TFL Admin Logo" class="h-10 sm:h-12 w-auto object-contain bg-white p-1.5 rounded-lg shadow-sm">

                <h2 class="font-extrabold text-xl sm:text-2xl text-white leading-tight hidden sm:block tracking-wide">
                    {{ __('TFL System Admin') }}
                </h2>
            </div>

            <div class="flex items-center gap-3 sm:gap-5">
                <button id="theme-toggle" type="button" class="text-yellow-400 hover:text-yellow-300 focus:outline-none rounded-full p-2 bg-white/10 dark:bg-gray-800 transition-colors shadow-sm" aria-label="Badili mwonekano">
                    {{-- Mwezi: huonekana kwenye light mode --}}
                    <svg id="theme-toggle-dark-icon" class="w-6 h-6 text-yellow-300" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79Z"></path>
                    </svg>

                    {{-- Jua: huonekana kwenye dark mode --}}
                    <svg id="theme-toggle-light-icon" class="hidden w-7 h-7 transition-transform duration-500 hover:rotate-45" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <defs>
                            <radialGradient id="tflSunCore" cx="35%" cy="35%" r="70%">
                                <stop offset="0%" stop-color="#FFFDE7"/>
                                <stop offset="45%" stop-color="#FFD54F"/>
                                <stop offset="100%" stop-color="#FB923C"/>
                            </radialGradient>
                            <filter id="tflSunGlow" x="-50%" y="-50%" width="200%" height="200%">
                                <feGaussianBlur stdDeviation="1.2" result="blur"/>
                                <feMerge>
                                    <feMergeNode in="blur"/>
                                    <feMergeNode in="SourceGraphic"/>
                                </feMerge>
                            </filter>
                        </defs>
                        <g filter="url(#tflSunGlow)">
                            <g stroke="#FDBA74" stroke-width="1.7" stroke-linecap="round">
                                <line x1="12" y1="1.3" x2="12" y2="4"/>
                                <line x1="12" y1="20" x2="12" y2="22.7"/>
                                <line x1="3.9" y1="3.9" x2="5.8" y2="5.8"/>
                                <line x1="18.2" y1="18.2" x2="20.1" y2="20.1"/>
                                <line x1="1.3" y1="12" x2="4" y2="12"/>
                                <line x1="20" y1="12" x2="22.7" y2="12"/>
                                <line x1="3.9" y1="20.1" x2="5.8" y2="18.2"/>
                                <line x1="18.2" y1="5.8" x2="20.1" y2="3.9"/>
                            </g>
                            <circle cx="12" cy="12" r="5.3" fill="url(#tflSunCore)" stroke="#F59E0B" stroke-width="0.6"/>
                        </g>
                    </svg>
                </button>

                <div class="text-sm font-bold text-[#070049] bg-[#f79120] px-4 py-2 rounded-full shadow hidden md:block">
                    {{ Auth::user()->name }}
                </div>

                <form method="POST" action="{{ route('logout') }}" class="m-0">
                    @csrf
                    <button type="submit" title="Ondoka" class="flex items-center justify-center text-white bg-red-600 hover:bg-red-700 p-2 sm:px-4 sm:py-2 rounded-full shadow-md transition-all transform hover:scale-105">
                        <svg class="w-5 h-5 sm:w-4 sm:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                        </svg>
                        <span class="hidden sm:inline ml-2 text-sm font-bold">Ondoka</span>
                    </button>
                </form>
            </div>
        </div>
    </x-slot>

    <div class="flex flex-col lg:flex-row min-h-screen bg-slate-50 dark:bg-gray-900 transition-colors duration-300 relative">
        <div id="sidebar-backdrop" class="fixed inset-0 bg-gray-900/50 z-30 hidden lg:hidden backdrop-blur-sm transition-opacity"></div>

        {{-- SIDEBAR --}}
        <aside id="sidebar" class="fixed inset-y-0 left-0 z-40 w-64 bg-white dark:bg-gray-800 border-r border-gray-200 dark:border-gray-700 transform -translate-x-full lg:translate-x-0 lg:static lg:block transition-transform duration-300 shadow-xl lg:shadow-none">
            <div class="flex h-full flex-col px-3 py-6">
                <ul class="flex-1 space-y-2 overflow-y-auto font-medium">
                    <li>
                        <a href="#" onclick="switchTab('dashboard-tab', this, event)" class="tfl-nav-link flex items-center p-3 text-white rounded-lg bg-[#070049] dark:bg-blue-900 border-l-4 border-[#f79120] shadow-md group transition-all">
                            <svg class="w-5 h-5 nav-icon text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                            </svg>
                            <span class="ml-3 font-semibold">Dashboard</span>
                        </a>
                    </li>

                    <li class="pt-4 pb-2">
                        <span class="px-3 text-xs font-bold text-gray-500 uppercase tracking-wider dark:text-gray-400">Content Management</span>
                    </li>

                    {{-- HERO SECTION --}}
                    <li>
                        <a href="#" onclick="switchTab('hero-settings-tab', this, event)" class="tfl-nav-link flex items-center p-3 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 border-l-4 border-transparent group transition-all">
                            <svg class="w-5 h-5 nav-icon text-gray-500 group-hover:text-[#f79120]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a2 2 0 012-2h12a2 2 0 012 2v14H6a2 2 0 01-2-2V5zm4 3h8m-8 4h8m-8 4h5"></path>
                            </svg>
                            <span class="ml-3 font-semibold">Hero Section</span>
                        </a>
                    </li>

                    {{-- PARTNERS --}}
                    <li>
                        <a href="#" onclick="switchTab('partners-tab', this, event)" class="tfl-nav-link flex items-center p-3 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 border-l-4 border-transparent group transition-all">
                            <svg class="w-5 h-5 nav-icon text-gray-500 group-hover:text-[#f79120]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2a5 5 0 0110 0v2"></path>
                            </svg>
                            <span class="ml-3 font-semibold">Partners</span>
                        </a>
                    </li>

                    <li>
                        <a href="#" onclick="switchTab('news-tab', this, event)" class="tfl-nav-link flex items-center p-3 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 border-l-4 border-transparent group transition-all">
                            <svg class="w-5 h-5 nav-icon text-gray-500 group-hover:text-[#070049]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                            </svg>
                            <span class="ml-3 font-semibold">News &amp; Updates</span>
                        </a>
                    </li>

                    <li>
                        <a href="#" onclick="switchTab('programmes-tab', this, event)" class="tfl-nav-link flex items-center p-3 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 border-l-4 border-transparent group transition-all">
                            <svg class="w-5 h-5 nav-icon text-gray-500 group-hover:text-[#070049]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            <span class="ml-3 font-semibold">Our Programmes</span>
                        </a>
                    </li>

                    {{-- GALLERY, chini ya Our Programmes --}}
                    <li>
                        <a href="#" onclick="switchTab('gallery-tab', this, event)" class="tfl-nav-link flex items-center justify-between p-3 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 border-l-4 border-transparent group transition-all">
                            <span class="flex items-center">
                                <svg class="w-5 h-5 nav-icon text-gray-500 group-hover:text-[#f79120]" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <rect x="3" y="3" width="18" height="18" rx="2" stroke-width="2"></rect>
                                    <circle cx="8.5" cy="8.5" r="1.5" stroke-width="2"></circle>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 15l-5-5L5 21"></path>
                                </svg>
                                <span class="ml-3 font-semibold">Gallery</span>
                            </span>
                            <span class="inline-flex items-center justify-center min-w-6 h-6 px-1 ml-3 text-xs font-bold text-[#f79120] bg-[#f79120]/10 rounded-full">
                                {{ $totalGalleryImages ?? 0 }}
                            </span>
                        </a>
                    </li>

                    <hr class="my-4 border-gray-200 dark:border-gray-700">

                    <li class="pt-2 pb-2">
                        <span class="px-3 text-xs font-bold text-gray-500 uppercase tracking-wider dark:text-gray-400">Applications Received</span>
                    </li>

                    <li>
                        <a href="#" onclick="switchTab('kijana-tab', this, event)" class="tfl-nav-link flex items-center justify-between p-3 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 border-l-4 border-transparent group transition-all">
                            <span class="flex items-center">
                                <svg class="w-5 h-5 nav-icon text-gray-500 group-hover:text-[#f79120]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                <span class="ml-3 font-semibold">Kijana Fursa</span>
                            </span>
                            <span class="inline-flex items-center justify-center w-6 h-6 ml-3 text-xs font-bold text-[#f79120] bg-[#f79120]/10 rounded-full">{{ $totalApplications ?? 0 }}</span>
                        </a>
                    </li>

                    <li>
                        <a href="#" onclick="switchTab('course4-tab', this, event)" class="tfl-nav-link flex items-center justify-between p-3 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 border-l-4 border-transparent group transition-all">
                            <span class="flex items-center">
                                <svg class="w-5 h-5 nav-icon text-gray-500 group-hover:text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                </svg>
                                <span class="ml-3 font-semibold">Course 4 Prog.</span>
                            </span>
                            <span class="inline-flex items-center justify-center w-6 h-6 ml-3 text-xs font-bold text-green-600 bg-green-100 rounded-full">{{ $totalCourse4 ?? 0 }}</span>
                        </a>
                    </li>

                    <li>
                        <a href="#" onclick="switchTab('snm-tab', this, event)" class="tfl-nav-link flex items-center justify-between p-3 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 border-l-4 border-transparent group transition-all">
                            <span class="flex items-center">
                                <svg class="w-5 h-5 nav-icon text-gray-500 group-hover:text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0112 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path>
                                </svg>
                                <span class="ml-3 font-semibold">Scholarship</span>
                            </span>
                            <span class="inline-flex items-center justify-center w-6 h-6 ml-3 text-xs font-bold text-[#070049] bg-purple-100 rounded-full">{{ $totalScholarships ?? 0 }}</span>
                        </a>
                    </li>
                </ul>

                {{-- Link ya akaunti inabaki chini ya sidebar --}}
                <div class="shrink-0 border-t border-gray-200 dark:border-gray-700 pt-4 mt-4">
                    <a href="{{ route('profile.edit') }}"
                        class="flex items-center gap-3 rounded-lg border border-gray-200 dark:border-gray-700 p-3 text-gray-800 dark:text-gray-100 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                        <svg class="h-5 w-5 shrink-0 text-[#f79120]" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c1.657 0 3-1.343 3-3V6a3 3 0 00-6 0v2c0 1.657 1.343 3 3 3zm-7 0h14v10H5V11zm7 4v2"></path>
                        </svg>
                        <span>
                            <span class="block font-semibold">Account Profile</span>
                            <span class="block text-xs text-gray-500 dark:text-gray-400">Login Credentials</span>
                        </span>
                    </a>
                </div>
            </div>
        </aside>

        {{-- MAIN CONTENT AREA --}}
        <main class="flex-1 p-4 lg:p-8 w-full overflow-x-hidden relative">

            {{-- TAB 1: DASHBOARD SUMMARY --}}
            <div id="dashboard-tab" class="tab-content block">
                <div class="mb-6">
                    <h2 class="text-2xl font-extrabold text-[#070049] dark:text-white">Dashboard Summary</h2>
                    <p class="text-gray-500 dark:text-gray-400">Muhtasari wa maombi yote yaliyoingia kwenye mfumo.</p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-6 mb-8">
                    <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 flex items-center justify-between hover:shadow-md transition">
                        <div>
                            <p class="text-sm font-semibold text-gray-500 dark:text-gray-400">Jumla Maombi</p>
                            <p class="mt-2 text-3xl font-extrabold text-black dark:text-white">
                                {{ ($totalApplications ?? 0) + ($totalCourse4 ?? 0) + ($totalScholarships ?? 0) }}
                            </p>
                        </div>
                        <div class="p-4 bg-blue-50 dark:bg-gray-700 text-[#070049] dark:text-blue-400 rounded-full">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                        </div>
                    </div>

                    <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 flex items-center justify-between hover:shadow-md transition cursor-pointer" onclick="switchTab('kijana-tab', document.querySelector('[onclick*=\'kijana-tab\']'), event)">
                        <div>
                            <p class="text-sm font-semibold text-gray-500 dark:text-gray-400">Kijana Fursa</p>
                            <p class="mt-2 text-3xl font-extrabold text-black dark:text-white">{{ $totalApplications ?? 0 }}</p>
                        </div>
                        <div class="p-4 bg-[#f79120]/10 dark:bg-[#f79120]/20 text-[#f79120] rounded-full">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                    </div>

                    <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 flex items-center justify-between hover:shadow-md transition cursor-pointer" onclick="switchTab('course4-tab', document.querySelector('[onclick*=\'course4-tab\']'), event)">
                        <div>
                            <p class="text-sm font-semibold text-gray-500 dark:text-gray-400">Course 4 Prog.</p>
                            <p class="mt-2 text-3xl font-extrabold text-black dark:text-white">{{ $totalCourse4 ?? 0 }}</p>
                        </div>
                        <div class="p-4 bg-green-50 dark:bg-green-900/30 text-green-600 rounded-full">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                            </svg>
                        </div>
                    </div>

                    <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 flex items-center justify-between hover:shadow-md transition cursor-pointer" onclick="switchTab('snm-tab', document.querySelector('[onclick*=\'snm-tab\']'), event)">
                        <div>
                            <p class="text-sm font-semibold text-gray-500 dark:text-gray-400">SNM Scholarship</p>
                            <p class="mt-2 text-3xl font-extrabold text-black dark:text-white">{{ $totalScholarships ?? 0 }}</p>
                        </div>
                        <div class="p-4 bg-purple-50 dark:bg-purple-900/30 text-purple-600 rounded-full">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0112 20.055a11.952 11.952 0 01-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            {{-- TAB: HERO SECTION --}}
            @include('admin.dashboard.partials.hero-settings')

            {{-- TAB: PARTNERS --}}
            @include('admin.dashboard.partials.partners')

            {{-- TAB: NEWS & UPDATES --}}
            @include('admin.dashboard.partials.news')

            {{-- TAB: OUR PROGRAMMES --}}
            @include('admin.dashboard.partials.programmes')

            {{-- TAB: GALLERY --}}
            @includeIf('admin.dashboard.partials.gallery')

            {{-- Kila partial ina tab yake kamili; usiizungushie div nyingine hapa --}}
            @include('admin.dashboard.partials.kijana-fursa')
            @include('admin.dashboard.partials.course4')
            @include('admin.dashboard.partials.scholarship')

        </main>
    </div>

    {{-- SCRIPTS --}}
    <script>
        function switchTab(tabId, element, event) {
            if (event) event.preventDefault();

            document.querySelectorAll('.tab-content').forEach(tab => {
                tab.classList.remove('block');
                tab.classList.add('hidden', 'opacity-0');
            });

            const selectedTab = document.getElementById(tabId);

            if (selectedTab) {
                selectedTab.classList.remove('hidden');
                setTimeout(() => {
                    selectedTab.classList.remove('opacity-0');
                    selectedTab.classList.add('block');
                }, 50);
            }

            if (element) {
                document.querySelectorAll('.tfl-nav-link').forEach(link => {
                    link.classList.remove('bg-[#070049]', 'text-white', 'dark:bg-blue-900', 'border-[#f79120]', 'shadow-md');
                    link.classList.add('text-gray-900', 'dark:text-white', 'hover:bg-gray-100', 'dark:hover:bg-gray-700', 'border-transparent');

                    const icon = link.querySelector('.nav-icon');
                    if (icon) {
                        icon.classList.remove('text-white');
                        icon.classList.add('text-gray-500');
                    }
                });

                element.classList.remove('text-gray-900', 'dark:text-white', 'hover:bg-gray-100', 'dark:hover:bg-gray-700', 'border-transparent');
                element.classList.add('bg-[#070049]', 'text-white', 'dark:bg-blue-900', 'border-[#f79120]', 'shadow-md');

                const activeIcon = element.querySelector('.nav-icon');
                if (activeIcon) {
                    activeIcon.classList.remove('text-gray-500');
                    activeIcon.classList.add('text-white');
                }
            }

            closeSidebar();
        }

        function closeSidebar() {
            const sidebar = document.getElementById('sidebar');
            const backdrop = document.getElementById('sidebar-backdrop');

            if (window.innerWidth < 1024 && sidebar && backdrop) {
                sidebar.classList.add('-translate-x-full');
                backdrop.classList.add('hidden');
            }
        }

        document.addEventListener('DOMContentLoaded', function () {
            const themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
            const themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');
            const themeToggleBtn = document.getElementById('theme-toggle');

            const savedTheme = localStorage.getItem('color-theme');
            const isDark = savedTheme === 'dark' ||
                (savedTheme === null && window.matchMedia('(prefers-color-scheme: dark)').matches);

            document.documentElement.classList.toggle('dark', isDark);

            if (themeToggleDarkIcon && themeToggleLightIcon) {
                themeToggleDarkIcon.classList.toggle('hidden', isDark);
                themeToggleLightIcon.classList.toggle('hidden', !isDark);
            }

            if (themeToggleBtn && themeToggleDarkIcon && themeToggleLightIcon) {
                themeToggleBtn.addEventListener('click', function () {
                    const darkModeEnabled = document.documentElement.classList.toggle('dark');

                    localStorage.setItem('color-theme', darkModeEnabled ? 'dark' : 'light');
                    themeToggleDarkIcon.classList.toggle('hidden', darkModeEnabled);
                    themeToggleLightIcon.classList.toggle('hidden', !darkModeEnabled);
                });
            }

            const sidebar = document.getElementById('sidebar');
            const backdrop = document.getElementById('sidebar-backdrop');
            const mobileMenuBtn = document.getElementById('mobile-menu-btn');

            if (sidebar && backdrop && mobileMenuBtn) {
                mobileMenuBtn.addEventListener('click', function () {
                    sidebar.classList.toggle('-translate-x-full');
                    backdrop.classList.toggle('hidden');
                });

                backdrop.addEventListener('click', closeSidebar);
            }
        });
    </script>
</x-app-layout>