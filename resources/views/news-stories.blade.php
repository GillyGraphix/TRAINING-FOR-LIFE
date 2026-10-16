<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>News & Stories - Training For Life (TFL)</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* ===================== ANIMATIONS ===================== */
        @keyframes fadeInUp {
            0%   { opacity: 0; transform: translateY(24px); }
            100% { opacity: 1; transform: translateY(0); }
        }
        @keyframes shimmer {
            0%   { background-position: 0% 50%; }
            100% { background-position: 200% 50%; }
        }
        @keyframes floatSlow {
            0%, 100% { transform: translateY(0); }
            50%      { transform: translateY(-6px); }
        }

        .reveal { opacity: 0; transform: translateY(24px); transition: opacity .6s ease, transform .6s ease; }
        .reveal.active { opacity: 1; transform: translateY(0); }
        .reveal-stagger.active > * { animation: fadeInUp .6s ease forwards; }
        .reveal-stagger.active > *:nth-child(1) { animation-delay: .05s; }
        .reveal-stagger.active > *:nth-child(2) { animation-delay: .12s; }
        .reveal-stagger.active > *:nth-child(3) { animation-delay: .19s; }
        .reveal-stagger.active > *:nth-child(4) { animation-delay: .26s; }
        .reveal-stagger.active > *:nth-child(5) { animation-delay: .33s; }
        .reveal-stagger.active > *:nth-child(6) { animation-delay: .40s; }
        .reveal-stagger > * { opacity: 0; }

        .hero-gradient-text {
            background: linear-gradient(90deg, #0f172a, #ea580c, #0f172a);
            background-size: 200% auto;
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            animation: shimmer 6s linear infinite;
        }
        .dark .hero-gradient-text {
            background: linear-gradient(90deg, #ffffff, #fb923c, #ffffff);
            background-size: 200% auto;
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            animation: shimmer 6s linear infinite;
        }

        .section-icon-float { animation: floatSlow 3.5s ease-in-out infinite; }

        /* Card lift + glow on hover */
        .lift-card { transition: transform .35s cubic-bezier(.2,.8,.2,1), box-shadow .35s ease, border-color .35s ease; }
        .lift-card:hover { transform: translateY(-8px); box-shadow: 0 20px 40px -12px rgba(0,0,0,.18); }

        /* Image zoom on hover */
        .zoom-img { transition: transform .6s cubic-bezier(.2,.8,.2,1), filter .6s ease; }
        .zoom-wrap:hover .zoom-img { transform: scale(1.08); }

        /* Underline sweep for section titles */
        .title-underline { position: relative; display: inline-block; }
        .title-underline::after {
            content: '';
            position: absolute;
            left: 0; bottom: -6px;
            height: 3px; width: 0;
            background: linear-gradient(90deg, #ea580c, #f97316);
            border-radius: 9999px;
            transition: width .6s cubic-bezier(.2,.8,.2,1);
        }
        .reveal.active .title-underline::after { width: 100%; }

        /* Pills nav */
        .pill { transition: all .3s ease; }
        .pill:hover { transform: translateY(-2px); }
    </style>
</head>
<body class="font-sans antialiased bg-white text-gray-800 dark:bg-slate-900 dark:text-gray-200 transition-colors duration-300">

    @include('partials.header')

    <main class="pt-32 pb-24 bg-gray-50 dark:bg-slate-900 min-h-screen transition-colors duration-500">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- ============ PAGE HEADER ============ --}}
            <div class="text-center mb-14 reveal" data-reveal>
                <span class="inline-block text-xs font-bold tracking-[0.2em] text-primary uppercase mb-3">TFL Updates</span>
                <h1 class="text-4xl md:text-6xl font-extrabold mb-4 hero-gradient-text">News & Stories.</h1>
                <p class="text-slate-500 dark:text-gray-400 max-w-xl mx-auto">
                    The latest news, events, publications, reports and media from Training For Life.
                </p>
                <div class="w-20 h-1 bg-primary mx-auto rounded-full mt-6"></div>
            </div>

            {{-- ============ CATEGORY PILLS NAV ============ --}}
            <div class="flex flex-wrap justify-center gap-3 mb-20 reveal" data-reveal>
                <a href="#news" class="pill px-5 py-2 rounded-full text-sm font-semibold bg-white dark:bg-slate-800 border border-gray-200 dark:border-gray-700 hover:bg-primary hover:text-white hover:border-primary shadow-sm">News</a>
                <a href="#events" class="pill px-5 py-2 rounded-full text-sm font-semibold bg-white dark:bg-slate-800 border border-gray-200 dark:border-gray-700 hover:bg-primary hover:text-white hover:border-primary shadow-sm">Events</a>
                <a href="#publications" class="pill px-5 py-2 rounded-full text-sm font-semibold bg-white dark:bg-slate-800 border border-gray-200 dark:border-gray-700 hover:bg-primary hover:text-white hover:border-primary shadow-sm">Publications</a>
                <a href="#reports" class="pill px-5 py-2 rounded-full text-sm font-semibold bg-white dark:bg-slate-800 border border-gray-200 dark:border-gray-700 hover:bg-primary hover:text-white hover:border-primary shadow-sm">Reports</a>
                <a href="#media" class="pill px-5 py-2 rounded-full text-sm font-semibold bg-white dark:bg-slate-800 border border-gray-200 dark:border-gray-700 hover:bg-primary hover:text-white hover:border-primary shadow-sm">Media</a>
            </div>

            {{-- ================= NEWS ================= --}}
            <section id="news" class="mb-24 scroll-mt-32 reveal" data-reveal>
                <div class="flex items-center gap-3 mb-8">
                    <span class="section-icon-float w-10 h-10 flex items-center justify-center rounded-xl bg-primary/10 text-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h7"/></svg>
                    </span>
                    <h2 class="text-2xl md:text-3xl font-bold text-slate-900 dark:text-white title-underline">Latest News</h2>
                </div>

                @if ($newsItems->isEmpty())
                    @include('partials.empty-state', ['message' => 'No news posted yet.'])
                @else
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 reveal-stagger active">
                        @foreach ($newsItems as $item)
                            <article class="lift-card bg-white dark:bg-slate-800 rounded-2xl shadow-sm overflow-hidden border border-gray-100 dark:border-gray-800">
                                <div class="zoom-wrap relative w-full h-48 bg-gray-100 dark:bg-slate-700 overflow-hidden">
                                    @if ($item->image)
                                        <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}"
                                             class="zoom-img w-full h-full object-cover"
                                             onerror="this.parentElement.innerHTML='<div class=\'w-full h-full flex items-center justify-center text-slate-300 dark:text-slate-600\'><svg xmlns=\'http://www.w3.org/2000/svg\' class=\'w-10 h-10\' viewBox=\'0 0 24 24\' fill=\'none\' stroke=\'currentColor\' stroke-width=\'1.5\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' d=\'M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14M14 8h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z\'/></svg></div>'">
                                        <span class="absolute top-3 left-3 bg-primary text-white text-[10px] font-bold uppercase tracking-wide px-3 py-1 rounded-full shadow">News</span>
                                    @else
                                        <div class="w-full h-full flex items-center justify-center text-slate-300 dark:text-slate-600">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14M14 8h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                        </div>
                                    @endif
                                </div>
                                <div class="p-6">
                                    @if ($item->published_at)
                                        <p class="text-xs text-primary font-semibold uppercase tracking-wide mb-2">{{ $item->published_at->format('d M Y') }}</p>
                                    @endif
                                    <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-2 line-clamp-2">{{ $item->title }}</h3>
                                    <p class="text-slate-600 dark:text-gray-300 text-sm line-clamp-3">{{ $item->excerpt }}</p>
                                </div>
                            </article>
                        @endforeach
                    </div>
                @endif
            </section>

            {{-- ================= EVENTS ================= --}}
            <section id="events" class="mb-24 scroll-mt-32 reveal" data-reveal>
                <div class="flex items-center gap-3 mb-8">
                    <span class="section-icon-float w-10 h-10 flex items-center justify-center rounded-xl bg-primary/10 text-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    </span>
                    <h2 class="text-2xl md:text-3xl font-bold text-slate-900 dark:text-white title-underline">Events</h2>
                </div>

                @if ($events->isEmpty())
                    @include('partials.empty-state', ['message' => 'No events posted yet.'])
                @else
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 reveal-stagger active">
                        @foreach ($events as $event)
                            <article class="lift-card bg-white dark:bg-slate-800 rounded-2xl shadow-sm overflow-hidden border border-gray-100 dark:border-gray-800">
                                <div class="zoom-wrap relative w-full h-48 bg-gray-100 dark:bg-slate-700 overflow-hidden">
                                    @if ($event->image)
                                        <img src="{{ asset('storage/' . $event->image) }}" alt="{{ $event->title }}"
                                             class="zoom-img w-full h-full object-cover"
                                             onerror="this.parentElement.classList.add('flex','items-center','justify-center');this.remove();">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center text-slate-300 dark:text-slate-600">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                        </div>
                                    @endif

                                    @if ($event->event_date)
                                        <div class="absolute top-3 left-3 bg-white/95 dark:bg-slate-900/90 rounded-xl px-3 py-1.5 text-center shadow-lg leading-none">
                                            <p class="text-lg font-extrabold text-orange-500">{{ $event->event_date->format('d') }}</p>
                                            <p class="text-[10px] font-bold text-slate-500 uppercase">{{ $event->event_date->format('M') }}</p>
                                        </div>
                                    @endif
                                </div>
                                <div class="p-6">
                                    @if ($event->location)
                                        <p class="text-xs text-primary font-semibold uppercase tracking-wide mb-2 flex items-center gap-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a2 2 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                            {{ $event->location }}
                                        </p>
                                    @endif
                                    <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-2 line-clamp-2">{{ $event->title }}</h3>
                                    <p class="text-slate-600 dark:text-gray-300 text-sm line-clamp-3">{{ $event->excerpt }}</p>
                                </div>
                            </article>
                        @endforeach
                    </div>
                @endif
            </section>

            {{-- ================= PUBLICATIONS ================= --}}
            <section id="publications" class="mb-24 scroll-mt-32 reveal" data-reveal>
                <div class="flex items-center gap-3 mb-8">
                    <span class="section-icon-float w-10 h-10 flex items-center justify-center rounded-xl bg-primary/10 text-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                    </span>
                    <h2 class="text-2xl md:text-3xl font-bold text-slate-900 dark:text-white title-underline">Publications</h2>
                </div>

                @if ($publications->isEmpty())
                    @include('partials.empty-state', ['message' => 'No publications posted yet.'])
                @else
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 reveal-stagger active">
                        @foreach ($publications as $pub)
                            <article class="lift-card bg-white dark:bg-slate-800 rounded-2xl shadow-sm overflow-hidden border border-gray-100 dark:border-gray-800">
                                <div class="zoom-wrap relative w-full h-48 bg-gray-100 dark:bg-slate-700 overflow-hidden">
                                    @if ($pub->image)
                                        <img src="{{ asset('storage/' . $pub->image) }}" alt="{{ $pub->title }}"
                                             class="zoom-img w-full h-full object-cover"
                                             onerror="this.remove();">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center text-slate-300 dark:text-slate-600">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                                        </div>
                                    @endif
                                </div>
                                <div class="p-6">
                                    @if ($pub->published_at)
                                        <p class="text-xs text-primary font-semibold uppercase tracking-wide mb-2">{{ $pub->published_at->format('d M Y') }}</p>
                                    @endif
                                    <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-2 line-clamp-2">{{ $pub->title }}</h3>
                                    <p class="text-slate-600 dark:text-gray-300 text-sm line-clamp-2 mb-4">{{ $pub->excerpt }}</p>
                                    @if ($pub->file)
                                        <a href="{{ asset('storage/' . $pub->file) }}" target="_blank"
                                           class="inline-flex items-center gap-2 text-sm font-bold text-primary hover:text-orange-600">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M7 10l5 5 5-5M12 15V3"/></svg>
                                            Download
                                        </a>
                                    @endif
                                </div>
                            </article>
                        @endforeach
                    </div>
                @endif
            </section>

            {{-- ================= REPORTS ================= --}}
            <section id="reports" class="mb-24 scroll-mt-32 reveal" data-reveal>
                <div class="flex items-center gap-3 mb-8">
                    <span class="section-icon-float w-10 h-10 flex items-center justify-center rounded-xl bg-primary/10 text-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    </span>
                    <h2 class="text-2xl md:text-3xl font-bold text-slate-900 dark:text-white title-underline">Reports</h2>
                </div>

                @if ($reports->isEmpty())
                    @include('partials.empty-state', ['message' => 'No reports posted yet.'])
                @else
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 reveal-stagger active">
                        @foreach ($reports as $report)
                            <article class="lift-card bg-white dark:bg-slate-800 rounded-2xl shadow-sm overflow-hidden border border-gray-100 dark:border-gray-800">
                                <div class="zoom-wrap relative w-full h-48 bg-gray-100 dark:bg-slate-700 overflow-hidden">
                                    @if ($report->image)
                                        <img src="{{ asset('storage/' . $report->image) }}" alt="{{ $report->title }}"
                                             class="zoom-img w-full h-full object-cover"
                                             onerror="this.remove();">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center text-slate-300 dark:text-slate-600">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                                        </div>
                                    @endif
                                    <span class="absolute top-3 left-3 bg-primary text-white text-[10px] font-bold uppercase tracking-wide px-3 py-1 rounded-full shadow">Report</span>
                                </div>
                                <div class="p-6">
                                    @if ($report->published_at)
                                        <p class="text-xs text-primary font-semibold uppercase tracking-wide mb-2">{{ $report->published_at->format('d M Y') }}</p>
                                    @endif
                                    <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-2 line-clamp-2">{{ $report->title }}</h3>
                                    @if ($report->excerpt)
                                        <p class="text-slate-600 dark:text-gray-300 text-sm line-clamp-2 mb-4">{{ $report->excerpt }}</p>
                                    @endif
                                    @if ($report->file)
                                        <a href="{{ asset('storage/' . $report->file) }}" target="_blank"
                                           class="inline-flex items-center gap-2 text-sm font-bold text-primary hover:text-orange-600">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M7 10l5 5 5-5M12 15V3"/></svg>
                                            View Report
                                        </a>
                                    @endif
                                </div>
                            </article>
                        @endforeach
                    </div>
                @endif
            </section>

            {{-- ================= MEDIA (image / uploaded video / youtube link) ================= --}}
            <section id="media" class="scroll-mt-32 reveal" data-reveal>
                <div class="flex items-center gap-3 mb-8">
                    <span class="section-icon-float w-10 h-10 flex items-center justify-center rounded-xl bg-primary/10 text-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14M14 8h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    </span>
                    <h2 class="text-2xl md:text-3xl font-bold text-slate-900 dark:text-white title-underline">Media</h2>
                </div>

                @if ($media->isEmpty())
                    @include('partials.empty-state', ['message' => 'No media posted yet.'])
                @else
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 reveal-stagger active">
                        @foreach ($media as $item)
                            <article class="lift-card bg-white dark:bg-slate-800 rounded-2xl shadow-sm overflow-hidden border border-gray-100 dark:border-gray-800">
                                <div class="zoom-wrap relative w-full h-48 bg-gray-100 dark:bg-slate-700 overflow-hidden">
                                    @if (!empty($item->youtube_url))
                                        @php
                                            preg_match(
                                                '/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/',
                                                $item->youtube_url,
                                                $ytMatch
                                            );
                                            $ytId = $ytMatch[1] ?? null;
                                        @endphp
                                        @if ($ytId)
                                            <iframe class="w-full h-full"
                                                    src="https://www.youtube.com/embed/{{ $ytId }}"
                                                    title="{{ $item->title }}"
                                                    frameborder="0"
                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                    allowfullscreen></iframe>
                                        @else
                                            <div class="w-full h-full flex items-center justify-center text-slate-300 dark:text-slate-600">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/><path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                            </div>
                                        @endif
                                        <span class="absolute top-3 left-3 bg-red-600 text-white text-[10px] font-bold uppercase tracking-wide px-3 py-1 rounded-full shadow">YouTube</span>
                                    @elseif (!empty($item->video))
                                        <video class="w-full h-full object-cover" controls preload="metadata"
                                               @if ($item->image) poster="{{ asset('storage/' . $item->image) }}" @endif>
                                            <source src="{{ asset('storage/' . $item->video) }}" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                        <span class="absolute top-3 left-3 bg-primary text-white text-[10px] font-bold uppercase tracking-wide px-3 py-1 rounded-full shadow">Video</span>
                                    @elseif ($item->image)
                                        <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}"
                                             class="zoom-img w-full h-full object-cover"
                                             onerror="this.remove();">
                                        <span class="absolute top-3 left-3 bg-primary text-white text-[10px] font-bold uppercase tracking-wide px-3 py-1 rounded-full shadow">Photo</span>
                                    @else
                                        <div class="w-full h-full flex items-center justify-center text-slate-300 dark:text-slate-600">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14M14 8h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                        </div>
                                    @endif
                                </div>
                                <div class="p-6">
                                    <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-2 line-clamp-2">{{ $item->title }}</h3>
                                    @if (!empty($item->excerpt))
                                        <p class="text-slate-600 dark:text-gray-300 text-sm line-clamp-3">{{ $item->excerpt }}</p>
                                    @endif
                                </div>
                            </article>
                        @endforeach
                    </div>
                @endif
            </section>

        </div>
    </main>

    @include('partials.footer')

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const items = document.querySelectorAll('[data-reveal]');
            const io = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('active');
                        io.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.12 });
            items.forEach(el => io.observe(el));
        });
    </script>
</body>
</html>