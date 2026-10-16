<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Our Programmes - Training For Life (TFL)</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>[x-cloak]{display:none!important}</style>
</head>
<body class="font-sans antialiased bg-white text-gray-800 dark:bg-slate-900 dark:text-gray-200 transition-colors duration-300">

    @include('partials.header')

    <main class="pt-32 pb-20 bg-gray-50 dark:bg-slate-900 min-h-screen transition-colors duration-500">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="text-center mb-16">
                <span class="text-primary font-bold text-xs uppercase tracking-[0.25em] bg-primary/10 px-4 py-1.5 rounded-full">Our Initiatives</span>
                <h1 class="text-4xl md:text-5xl font-extrabold text-slate-900 dark:text-white mt-4 mb-4">Our Programmes</h1>
                <div class="w-24 h-1 bg-primary mx-auto rounded-full"></div>
                <p class="mt-6 text-lg text-slate-600 dark:text-gray-400 max-w-3xl mx-auto">
                    TFL develops young people through practical training, leadership development, and real pathways into income because opportunity, not charity, is what changes a young person's life.
                </p>
            </div>

            <div x-data="{ active: null }" x-on:keydown.escape.window="active = null">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-8">

                    @foreach ($programmes as $programme)
                    <div class="bg-white dark:bg-slate-800 rounded-3xl shadow-sm border border-gray-100 dark:border-gray-800 overflow-hidden transition-shadow duration-300 hover:shadow-md flex flex-col">
                        <div class="p-8 md:p-10 flex flex-col flex-1">
                            <div class="flex items-center gap-4 mb-5">
                                <span class="w-12 h-12 rounded-xl bg-primary/10 text-primary font-bold text-xl flex items-center justify-center shrink-0">{{ $loop->iteration }}</span>
                                <div>
                                    <h2 class="text-xl md:text-2xl font-bold text-slate-900 dark:text-white leading-snug">{{ $programme->title }}</h2>
                                    @if ($programme->subtitle)
                                        <p class="text-xs font-semibold text-primary/70 uppercase tracking-wide mt-0.5">{{ $programme->subtitle }}</p>
                                    @endif
                                </div>
                            </div>
                            <p class="text-slate-600 dark:text-gray-300 leading-relaxed mb-6 flex-1">
                                {{ $programme->summary }}
                            </p>
                            @if (!empty($programme->sections))
                            <button @click="active = '{{ $programme->slug }}'" class="inline-flex items-center gap-2 text-primary font-semibold text-sm self-start group">
                                Read more
                                <svg class="w-4 h-4 transition-transform duration-300 group-hover:translate-x-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
                            </button>
                            @endif
                        </div>
                    </div>
                    @endforeach

                </div>

                @foreach ($programmes as $programme)
                @if (!empty($programme->sections))
                <div x-show="active === '{{ $programme->slug }}'" x-cloak
                     class="fixed inset-0 z-50 flex items-center justify-center p-4 md:p-8"
                     x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                     x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                    <div class="absolute inset-0 bg-slate-950/70 backdrop-blur-sm" @click="active = null"></div>
                    <div class="relative bg-white dark:bg-slate-800 rounded-3xl shadow-2xl w-full max-w-2xl max-h-[85vh] overflow-y-auto"
                         x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                         x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95">
                        <div class="sticky top-0 bg-white dark:bg-slate-800 border-b border-gray-100 dark:border-gray-700 px-6 md:px-8 py-5 flex items-center justify-between rounded-t-3xl">
                            <div class="flex items-center gap-4">
                                <span class="w-11 h-11 rounded-xl bg-primary/10 text-primary font-bold text-lg flex items-center justify-center shrink-0">{{ $loop->iteration }}</span>
                                <h2 class="text-xl md:text-2xl font-bold text-slate-900 dark:text-white">{{ $programme->title }}</h2>
                            </div>
                            <button @click="active = null" class="w-9 h-9 rounded-full flex items-center justify-center text-slate-400 hover:text-slate-700 hover:bg-gray-100 dark:hover:bg-slate-700 dark:hover:text-white transition-colors shrink-0" aria-label="Close">
                                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18M6 6l12 12"/></svg>
                            </button>
                        </div>
                        <div class="px-6 md:px-8 py-7 space-y-6">
                            @foreach ($programme->sections as $section)
                                @if (!empty($section['highlight']))
                                <div class="bg-primary/5 dark:bg-slate-700/50 border-l-4 border-primary p-5 rounded-r-2xl">
                                    <p class="text-xs font-semibold uppercase tracking-wide text-primary mb-1.5">{{ $section['label'] }}</p>
                                    <p class="text-slate-700 dark:text-gray-200 leading-relaxed">{{ $section['content'] }}</p>
                                </div>
                                @else
                                <div>
                                    <p class="text-xs font-semibold uppercase tracking-wide text-primary mb-1.5">{{ $section['label'] }}</p>
                                    <p class="text-slate-600 dark:text-gray-300 leading-relaxed">{{ $section['content'] }}</p>
                                </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif
                @endforeach

            </div>

        </div>
    </main>

    @include('partials.footer')

    <button x-data="{ show: false }"
            @scroll.window="show = window.pageYOffset > 300"
            @click="window.scrollTo({ top: 0, behavior: 'smooth' })"
            x-show="show"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-10"
            x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 translate-y-10"
            class="fixed bottom-8 right-8 z-50 p-3 rounded-full bg-primary hover:bg-orange-600 text-white shadow-xl focus:outline-none transform transition-transform hover:-translate-y-1 cursor-pointer"
            style="display: none;"
            aria-label="Scroll to top">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M5 10l7-7m0 0l7 7m-7-7v18" />
        </svg>
    </button>

</body>
</html>