<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Get Involved & Donate - Training For Life (TFL)</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-slate-50 dark:bg-slate-900 text-slate-800 dark:text-gray-100 min-h-screen relative overflow-x-hidden transition-colors duration-300">

    @include('partials.header')

    <!-- Background Decorative Elements -->
    <div class="fixed inset-0 pointer-events-none z-0 overflow-hidden">
        <!-- Glows (Adjusts for Light/Dark) -->
        <div class="absolute -top-40 -left-40 w-96 h-96 bg-orange-100 dark:bg-primary/20 rounded-full blur-[140px]"></div>
        <div class="absolute top-1/3 -right-20 w-[500px] h-[500px] bg-amber-100 dark:bg-orange-600/15 rounded-full blur-[160px]"></div>
        <div class="absolute -bottom-40 left-1/3 w-[600px] h-[600px] bg-orange-50 dark:bg-amber-500/10 rounded-full blur-[180px]"></div>

        <!-- Subtle Pattern Overlay (Light Mode) -->
        <div class="absolute inset-0 opacity-[0.03] dark:hidden" style="background-image: radial-gradient(#000 1px, transparent 1px); background-size: 32px 32px;"></div>
        <!-- Subtle Pattern Overlay (Dark Mode) -->
        <div class="absolute inset-0 opacity-[0.03] hidden dark:block" style="background-image: radial-gradient(#fff 1px, transparent 1px); background-size: 32px 32px;"></div>
    </div>

    <main class="relative z-10 pt-32 pb-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Hero Header with Charity Icon -->
            <div class="text-center max-w-3xl mx-auto mb-20">
                <div class="inline-flex items-center gap-2 bg-orange-100/80 dark:bg-primary/10 border border-orange-200 dark:border-primary/30 text-orange-600 dark:text-primary px-4 py-2 rounded-full text-sm font-semibold mb-6 shadow-sm backdrop-blur-md">
                    <!-- Heart Icon -->
                    <svg class="w-5 h-5 animate-pulse" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                    </svg>
                    <span>Support Our Mission</span>
                </div>

                <h1 class="text-4xl sm:text-6xl font-extrabold text-slate-900 dark:text-white tracking-tight mb-6 leading-tight">
                    Get Involved & <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-600 to-amber-500 dark:from-primary dark:to-amber-400">Shape the Future</span>
                </h1>

                <p class="text-lg text-slate-600 dark:text-slate-300 leading-relaxed">
                    Your generous donation directly equips young people in Tanzania with market-relevant skills, leadership training, and sustainable opportunities.
                </p>

                <div class="w-24 h-1.5 bg-gradient-to-r from-orange-500 to-amber-400 dark:from-primary dark:to-amber-400 mx-auto mt-8 rounded-full"></div>
            </div>

            {{-- 5.1 Donate --}}
            <section class="mb-24">
                <div class="max-w-3xl mx-auto text-center mb-14">
                    <h2 class="text-2xl md:text-3xl font-bold text-slate-900 dark:text-white mt-1 mb-4">Support</h2>
                    <p class="text-slate-600 dark:text-slate-300 leading-relaxed">
                        Every shilling you give goes toward closing three gaps for a young Tanzanian: awareness of opportunity, access to capital, and marketable skills. In 2025, 89% of every donation went directly into programmes.
                    </p>
                </div>

                {{--
                    CONFIRM before publishing:
                    - Set real TZS amounts for a giving-tier table (e.g. "TZS X supports one youth
                      through Course 4" / "TZS Y funds a Seed Capital loan"). These figures need
                      sign-off from Finance/ED — do not estimate or invent numbers here.
                --}}

                <!-- Donation Methods Grid -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">

                    <!-- CARD 0: Mobile Money -->
                    <div class="bg-white dark:bg-slate-800/80 backdrop-blur-xl rounded-3xl p-8 border border-slate-200 dark:border-slate-700/80 shadow-xl dark:shadow-2xl relative overflow-hidden flex flex-col justify-between group hover:border-sky-500/40 dark:hover:border-sky-500/50 transition-all duration-300">

                        <div class="absolute -right-10 -bottom-10 opacity-5 group-hover:opacity-10 transition-opacity pointer-events-none">
                            <svg class="w-64 h-64 text-slate-900 dark:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                        </div>

                        <div>
                            <div class="flex items-center gap-4 mb-6">
                                <div class="w-14 h-14 bg-gradient-to-br from-sky-500 to-blue-600 rounded-2xl flex items-center justify-center text-white shadow-lg shadow-sky-500/20 shrink-0">
                                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                                </div>
                                <div>
                                    <h3 class="text-xl font-bold text-slate-900 dark:text-white">Mobile Money</h3>
                                    <p class="text-xs text-slate-500 dark:text-slate-400">Fastest way to give from Tanzania</p>
                                </div>
                            </div>

                            <p class="text-sm text-slate-600 dark:text-slate-300 mb-6 leading-relaxed">
                                Send directly via M-Pesa — no bank visit required.
                            </p>

                            <div class="bg-slate-50 dark:bg-slate-900/90 rounded-2xl p-5 border border-slate-200 dark:border-slate-700/60">
                                <span class="text-xs font-bold text-slate-500 dark:text-slate-400 block mb-2">M-PESA NUMBER</span>
                                <div class="flex justify-between items-center bg-white dark:bg-slate-800/80 border border-slate-200 dark:border-transparent px-3.5 py-2.5 rounded-xl" x-data="{ copied: false }">
                                    <span class="font-mono font-bold text-slate-900 dark:text-white">+255 765 082 693</span>
                                    <button @click="navigator.clipboard.writeText('+255765082693'); copied = true; setTimeout(() => copied = false, 2000)" class="text-slate-400 hover:text-sky-600 dark:hover:text-sky-400 transition p-1" title="Copy Number">
                                        <svg x-show="!copied" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                                        <svg x-show="copied" class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="mt-6 pt-4 border-t border-slate-200 dark:border-slate-700/60 text-xs text-slate-500 dark:text-slate-400">
                            Registered to: <strong class="text-slate-900 dark:text-white">Training For Life (TFL)</strong>
                        </div>
                    </div>

                    <!-- CARD 1: Tanzania Bank Accounts -->
                    <div class="bg-white dark:bg-slate-800/80 backdrop-blur-xl rounded-3xl p-8 border border-slate-200 dark:border-slate-700/80 shadow-xl dark:shadow-2xl relative overflow-hidden flex flex-col justify-between group hover:border-orange-500/40 dark:hover:border-primary/50 transition-all duration-300">

                        <div class="absolute -right-10 -bottom-10 opacity-5 group-hover:opacity-10 transition-opacity pointer-events-none">
                            <svg class="w-64 h-64 text-slate-900 dark:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5m0 0h4m-4 0V3m0 18v-6a2 2 0 012-2h2a2 2 0 012 2v6"></path></svg>
                        </div>

                        <div>
                            <div class="flex items-center gap-4 mb-6">
                                <div class="w-14 h-14 bg-gradient-to-br from-orange-500 to-amber-600 dark:from-primary dark:to-orange-600 rounded-2xl flex items-center justify-center text-white shadow-lg shadow-orange-500/20 shrink-0">
                                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                </div>
                                <div>
                                    <h3 class="text-xl font-bold text-slate-900 dark:text-white">Bank Transfer</h3>
                                    <p class="text-xs text-slate-500 dark:text-slate-400">Direct wire / deposit (TZS & USD)</p>
                                </div>
                            </div>

                            <div class="space-y-4">
                                <!-- KCB Bank Block -->
                                <div class="bg-slate-50 dark:bg-slate-900/90 rounded-2xl p-5 border border-slate-200 dark:border-slate-700/60 shadow-inner">
                                    <div class="flex justify-between items-start mb-3">
                                        <div>
                                            <h4 class="font-bold text-slate-900 dark:text-white text-sm">KCB BANK (TANZANIA) LTD</h4>
                                            <p class="text-xs text-slate-500 dark:text-slate-400">Branch: Moshi (Boma Rd)</p>
                                        </div>
                                        <span class="text-[10px] uppercase font-bold tracking-wider px-2.5 py-1 rounded-md bg-orange-100 dark:bg-amber-500/10 text-orange-700 dark:text-amber-400 border border-orange-200 dark:border-amber-500/20">
                                            SWIFT: KCBLTZTZ
                                        </span>
                                    </div>

                                    <div class="space-y-2 mt-4 text-sm font-mono">
                                        <div class="flex justify-between items-center bg-white dark:bg-slate-800/80 border border-slate-200 dark:border-transparent px-3.5 py-2.5 rounded-xl" x-data="{ copied: false }">
                                            <span class="text-slate-500 dark:text-slate-400 text-xs font-sans">TZS Account:</span>
                                            <div class="flex items-center gap-2">
                                                <span class="font-bold text-slate-900 dark:text-white">3391669756</span>
                                                <button @click="navigator.clipboard.writeText('3391669756'); copied = true; setTimeout(() => copied = false, 2000)" class="text-slate-400 hover:text-orange-600 dark:hover:text-primary transition p-1" title="Copy Number">
                                                    <svg x-show="!copied" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                                                    <svg x-show="copied" class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                                </button>
                                            </div>
                                        </div>

                                        <div class="flex justify-between items-center bg-white dark:bg-slate-800/80 border border-slate-200 dark:border-transparent px-3.5 py-2.5 rounded-xl" x-data="{ copied: false }">
                                            <span class="text-slate-500 dark:text-slate-400 text-xs font-sans">USD Account:</span>
                                            <div class="flex items-center gap-2">
                                                <span class="font-bold text-slate-900 dark:text-white">3391669764</span>
                                                <button @click="navigator.clipboard.writeText('3391669764'); copied = true; setTimeout(() => copied = false, 2000)" class="text-slate-400 hover:text-orange-600 dark:hover:text-primary transition p-1" title="Copy Number">
                                                    <svg x-show="!copied" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                                                    <svg x-show="copied" class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- CRDB & NMB Block -->
                                <div class="grid grid-cols-1 gap-3">
                                    <!-- CRDB -->
                                    <div class="bg-slate-50 dark:bg-slate-900/90 rounded-2xl p-4 border border-slate-200 dark:border-slate-700/60" x-data="{ copied: false }">
                                        <span class="text-xs font-bold text-slate-500 dark:text-slate-400 block mb-1">CRDB BANK</span>
                                        <div class="flex justify-between items-center font-mono">
                                            <span class="text-sm font-bold text-slate-900 dark:text-white">01J1040830000</span>
                                            <button @click="navigator.clipboard.writeText('01J1040830000'); copied = true; setTimeout(() => copied = false, 2000)" class="text-slate-400 hover:text-orange-600 dark:hover:text-primary transition p-1">
                                                <svg x-show="!copied" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                                                <svg x-show="copied" class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                            </button>
                                        </div>
                                    </div>

                                    <!-- NMB -->
                                    <div class="bg-slate-50 dark:bg-slate-900/90 rounded-2xl p-4 border border-slate-200 dark:border-slate-700/60" x-data="{ copied: false }">
                                        <span class="text-xs font-bold text-slate-500 dark:text-slate-400 block mb-1">NMB BANK</span>
                                        <div class="flex justify-between items-center font-mono">
                                            <span class="text-sm font-bold text-slate-900 dark:text-white">40310079986</span>
                                            <button @click="navigator.clipboard.writeText('40310079986'); copied = true; setTimeout(() => copied = false, 2000)" class="text-slate-400 hover:text-orange-600 dark:hover:text-primary transition p-1">
                                                <svg x-show="!copied" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                                                <svg x-show="copied" class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-6 pt-4 border-t border-slate-200 dark:border-slate-700/60 text-xs text-slate-500 dark:text-slate-400">
                            Account Name: <strong class="text-slate-900 dark:text-white">TRAINING FOR LIFE (TFL)</strong>
                        </div>
                    </div>

                    <!-- CARD 2: US Tax-Deductible -->
                    <div class="bg-white dark:bg-slate-800/80 backdrop-blur-xl rounded-3xl p-8 border border-slate-200 dark:border-slate-700/80 shadow-xl dark:shadow-2xl relative overflow-hidden flex flex-col justify-between group hover:border-emerald-500/40 dark:hover:border-emerald-500/50 transition-all duration-300">

                        <div class="absolute -right-10 -bottom-10 opacity-5 group-hover:opacity-10 transition-opacity pointer-events-none">
                            <svg class="w-64 h-64 text-slate-900 dark:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 002 2h1.5a2.5 2.5 0 002.5-2.5V11a2 2 0 012-2h1.055M11 20.055V18a2 2 0 00-2-2h-1a2 2 0 01-2-2v-1a2 2 0 00-2-2H3.055"></path></svg>
                        </div>

                        <div>
                            <div class="flex items-center gap-4 mb-6">
                                <div class="w-14 h-14 bg-gradient-to-br from-emerald-500 to-teal-600 dark:to-teal-700 rounded-2xl flex items-center justify-center text-white shadow-lg shadow-emerald-500/20 shrink-0">
                                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                </div>
                                <div>
                                    <h3 class="text-xl font-bold text-slate-900 dark:text-white">US Tax-Deductible</h3>
                                    <p class="text-xs text-slate-500 dark:text-primary font-medium">Via Fiscal Sponsor: Mama Hope International</p>
                                </div>
                            </div>

                            <p class="text-sm text-slate-600 dark:text-slate-300 mb-6 leading-relaxed">
                                Give easily via Donor-Advised Funds (DAF) or a direct contribution through our US 501(c)(3) fiscal sponsor.
                            </p>

                            <div class="bg-slate-50 dark:bg-slate-900/90 rounded-2xl p-5 border border-slate-200 dark:border-slate-700/60 space-y-3 font-mono text-sm">
                                <div class="flex justify-between items-center border-b border-slate-200 dark:border-slate-800 pb-2 font-sans">
                                    <span class="text-xs text-slate-500 dark:text-slate-400">Bank Name:</span>
                                    <span class="font-bold text-slate-900 dark:text-white text-right">JPMorgan Chase Bank, N.A.</span>
                                </div>

                                <div class="flex justify-between items-center bg-white dark:bg-slate-800/80 border border-slate-200 dark:border-transparent px-3.5 py-2.5 rounded-xl" x-data="{ copied: false }">
                                    <span class="text-slate-500 dark:text-slate-400 text-xs font-sans">Routing No.:</span>
                                    <div class="flex items-center gap-2">
                                        <span class="font-bold text-slate-900 dark:text-white">322271627</span>
                                        <button @click="navigator.clipboard.writeText('322271627'); copied = true; setTimeout(() => copied = false, 2000)" class="text-slate-400 hover:text-emerald-600 dark:hover:text-emerald-400 transition p-1">
                                            <svg x-show="!copied" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                                            <svg x-show="copied" class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                        </button>
                                    </div>
                                </div>

                                <div class="flex justify-between items-center bg-white dark:bg-slate-800/80 border border-slate-200 dark:border-transparent px-3.5 py-2.5 rounded-xl" x-data="{ copied: false }">
                                    <span class="text-slate-500 dark:text-slate-400 text-xs font-sans">Account No.:</span>
                                    <div class="flex items-center gap-2">
                                        <span class="font-bold text-slate-900 dark:text-white">478801082</span>
                                        <button @click="navigator.clipboard.writeText('478801082'); copied = true; setTimeout(() => copied = false, 2000)" class="text-slate-400 hover:text-emerald-600 dark:hover:text-emerald-400 transition p-1">
                                            <svg x-show="!copied" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                                            <svg x-show="copied" class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                        </button>
                                    </div>
                                </div>

                                <div class="text-xs text-slate-500 dark:text-slate-400 pt-2 font-sans">
                                    <strong>Address:</strong> 276 5th Avenue, Suite 704 #722, New York, NY 10001
                                </div>
                            </div>
                        </div>

                        <div class="mt-6 pt-4 border-t border-slate-200 dark:border-slate-700/60 text-xs text-slate-500 dark:text-slate-400">
                            * Eligible for 501(c)(3) tax deduction for US taxpayers.
                        </div>
                    </div>

                </div>

                <!-- Transparency / Trust Banner -->
                <div class="mt-10 max-w-6xl mx-auto bg-white dark:bg-gradient-to-r dark:from-slate-800 dark:to-slate-800/80 rounded-2xl p-6 border border-slate-200 dark:border-slate-700 shadow-md dark:shadow-none text-center flex flex-col sm:flex-row items-center justify-between gap-4">
                    <div class="flex items-center gap-4 text-left">
                        <div class="p-3 bg-orange-100 dark:bg-primary/20 text-orange-600 dark:text-primary rounded-2xl shrink-0">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-slate-900 dark:text-white text-sm">Transparency & Accountability</h4>
                            <p class="text-xs text-slate-500 dark:text-slate-400">Reg No. 00NGO/0245 — All funds are directly audited and dedicated to youth empowerment programs.</p>
                        </div>
                    </div>
                    <a href="{{ route('contact') }}" class="text-xs font-bold bg-slate-900 dark:bg-slate-700 hover:bg-slate-800 dark:hover:bg-slate-600 text-white px-5 py-3 rounded-xl transition whitespace-nowrap shadow-md dark:shadow-none">
                        Need Assistance? Contact Us
                    </a>
                </div>
            </section>

            {{-- 5.2 Become a Partner --}}
            <section class="mb-24 max-w-6xl mx-auto">
                <div class="mb-10 text-center max-w-3xl mx-auto">
                    <h2 class="text-2xl md:text-3xl font-bold text-slate-900 dark:text-white mt-1">Become a Partner</h2>
                </div>

                <div class="bg-white dark:bg-slate-800/80 backdrop-blur-xl rounded-3xl border border-slate-200 dark:border-slate-700/80 shadow-xl dark:shadow-2xl p-8 md:p-12 grid grid-cols-1 lg:grid-cols-5 gap-10 items-center">
                    <div class="lg:col-span-3">
                        <p class="text-slate-600 dark:text-slate-300 leading-relaxed mb-6">
                            TFL partners with foundations, corporates, government bodies, and international organisations who share our belief that poverty should never determine destiny. Our partnership with CRDB Bank Foundation created a zero interest seed capital fund for our graduates; our fiscal sponsorship with Mama Hope International opened the door to US tax deductible giving.
                        </p>
                        <p class="text-slate-800 dark:text-white font-medium mb-8">
                            If your organisation wants to invest in a proven, youth led model, would like to talk.
                        </p>
                        <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-orange-600 to-amber-500 dark:from-primary dark:to-amber-400 text-white font-semibold rounded-full shadow-lg shadow-orange-500/20 hover:shadow-orange-500/30 hover:-translate-y-0.5 transition-all duration-300">
                            Talk to us about partnering
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </a>
                    </div>

                    <div class="lg:col-span-2 grid grid-cols-1 gap-4">
                        <div class="flex items-center gap-4 bg-slate-50 dark:bg-slate-900/90 rounded-2xl p-5 border border-slate-200 dark:border-slate-700/60">
                            <div class="w-11 h-11 rounded-xl bg-orange-100 dark:bg-primary/10 text-orange-600 dark:text-primary flex items-center justify-center shrink-0">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-slate-900 dark:text-white">CRDB Bank Foundation</p>
                                <p class="text-xs text-slate-500 dark:text-slate-400">Zero-interest seed capital fund</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-4 bg-slate-50 dark:bg-slate-900/90 rounded-2xl p-5 border border-slate-200 dark:border-slate-700/60">
                            <div class="w-11 h-11 rounded-xl bg-orange-100 dark:bg-primary/10 text-orange-600 dark:text-primary flex items-center justify-center shrink-0">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-slate-900 dark:text-white">Mama Hope International</p>
                                <p class="text-xs text-slate-500 dark:text-slate-400">US fiscal sponsorship</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            {{-- 5.3 Volunteer & Careers --}}
            <section class="max-w-6xl mx-auto">
                <div class="mb-10 text-center max-w-3xl mx-auto">
                    <h2 class="text-2xl md:text-3xl font-bold text-slate-900 dark:text-white mt-1">Volunteer & Careers</h2>
                </div>

                {{--
                    HOLD BACK: this section needs real input from TFL before public copy can be
                    written — current volunteer opportunities, required skills, application
                    process, and any open job vacancies. Publishing with placeholder text would
                    undercut the professional tone of the rest of the site, so the block below is
                    an honest "coming soon" holding state rather than invented content. Swap it
                    for real listings once Programmes/HR confirm details.
                --}}
                <div class="bg-white dark:bg-slate-800/80 backdrop-blur-xl rounded-3xl border border-dashed border-slate-300 dark:border-slate-700 p-10 md:p-14 text-center">
                    <div class="w-14 h-14 mx-auto mb-6 rounded-2xl bg-orange-100 dark:bg-primary/10 text-orange-600 dark:text-primary flex items-center justify-center">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-3">This page is being built</h3>
                    <p class="text-slate-600 dark:text-slate-300 max-w-xl mx-auto mb-8">
                        We're putting together current volunteer roles and open positions so we can share accurate, up-to-date opportunities — not just a placeholder list. Check back soon, or reach out directly and our team will point you in the right direction.
                    </p>
                    <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-slate-900 dark:bg-slate-700 hover:bg-slate-800 dark:hover:bg-slate-600 text-white font-semibold rounded-full transition-colors">
                        Contact us about volunteering
                    </a>
                </div>
            </section>

        </div>
    </main>

    @include('partials.footer')
</body>
</html>