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

    <style>
        [x-cloak]{display:none!important}

        /* Programme cards with photo: plain CSS so it works without rebuilding Tailwind */
        .tfl-pc-card { transition: box-shadow .3s ease, transform .3s ease; }
        .tfl-pc-card:hover { transform: translateY(-3px); }

        .tfl-pc-media {
            position: relative; overflow: hidden; aspect-ratio: 3 / 2;
            background:
                radial-gradient(rgba(251, 146, 60, .35) 1.5px, transparent 1.5px) 0 0 / 18px 18px,
                linear-gradient(135deg, rgba(251, 146, 60, .22), rgba(234, 88, 12, .08));
        }
        .dark .tfl-pc-media {
            background:
                radial-gradient(rgba(251, 146, 60, .3) 1.5px, transparent 1.5px) 0 0 / 18px 18px,
                linear-gradient(135deg, rgba(251, 146, 60, .25), rgba(30, 41, 59, .9));
        }
        .tfl-pc-ghost {
            position: absolute; right: 1.25rem; bottom: -1.25rem; z-index: 0;
            font-size: 9rem; line-height: 1; font-weight: 800; color: rgba(234, 88, 12, .22); user-select: none;
        }
        .tfl-pc-img {
            position: absolute; inset: 0; z-index: 1; width: 100%; height: 100%;
            object-fit: cover; object-position: center; transition: transform 1s ease;
        }
        .tfl-pc-card:hover .tfl-pc-img { transform: scale(1.06); }
        .tfl-pc-shade {
            position: absolute; inset: 0; z-index: 2; pointer-events: none;
            background: linear-gradient(to top, rgba(2, 6, 23, .6), rgba(2, 6, 23, 0) 55%);
        }
        .tfl-pc-num {
            position: absolute; top: 1rem; left: 1rem; z-index: 3; width: 2.75rem; height: 2.75rem;
            border-radius: .85rem; display: flex; align-items: center; justify-content: center;
            font-size: 1.15rem; font-weight: 700; box-shadow: 0 8px 18px rgba(2, 6, 23, .25);
        }
        .tfl-pc-tag {
            position: absolute; left: 1rem; bottom: 1rem; z-index: 3; max-width: calc(100% - 2rem);
            padding: .3rem .8rem; border-radius: 9999px; color: #fff; font-size: .7rem; font-weight: 600;
            letter-spacing: .06em; text-transform: uppercase; line-height: 1.3;
            background: rgba(2, 6, 23, .55); border: 1px solid rgba(255, 255, 255, .2);
            -webkit-backdrop-filter: blur(8px); backdrop-filter: blur(8px);
        }

        /* Modal banner */
        .tfl-pm-banner {
            position: relative; overflow: hidden; min-height: 9rem; display: flex; align-items: flex-end;
            background: linear-gradient(135deg, #fb923c, #ea580c);
        }
        .tfl-pm-banner.has-img { aspect-ratio: 16 / 8; min-height: 11rem; }
        .tfl-pm-ghost {
            position: absolute; right: 1.5rem; bottom: -1.5rem; font-size: 9rem; line-height: 1;
            font-weight: 800; color: rgba(255, 255, 255, .18); user-select: none;
        }
        .tfl-pm-img { position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; object-position: center; }
        .tfl-pm-shade { position: absolute; inset: 0; background: linear-gradient(to top, rgba(2, 6, 23, .78), rgba(2, 6, 23, .05) 70%); }
        .tfl-pm-head { position: relative; z-index: 2; width: 100%; padding: 1.25rem 1.5rem; display: flex; align-items: center; gap: 1rem; color: #fff; }
        .tfl-pm-num {
            flex: none; width: 2.75rem; height: 2.75rem; border-radius: .85rem; display: flex; align-items: center; justify-content: center;
            font-weight: 700; font-size: 1.1rem; background: rgba(255, 255, 255, .22); border: 1px solid rgba(255, 255, 255, .35);
            -webkit-backdrop-filter: blur(6px); backdrop-filter: blur(6px);
        }
        .tfl-pm-title { margin: 0; font-size: 1.4rem; line-height: 1.25; font-weight: 700; text-shadow: 0 2px 10px rgba(2, 6, 23, .35); }
        .tfl-pm-sub { margin: .2rem 0 0; font-size: .72rem; font-weight: 600; letter-spacing: .08em; text-transform: uppercase; color: rgba(255, 255, 255, .85); }
        .tfl-pm-close {
            position: absolute; top: 1rem; right: 1rem; z-index: 10; width: 2.4rem; height: 2.4rem; border-radius: 9999px;
            display: flex; align-items: center; justify-content: center; cursor: pointer; border: 0;
            background: rgba(255, 255, 255, .92); color: #334155; box-shadow: 0 6px 16px rgba(2, 6, 23, .3);
            transition: transform .2s ease, background-color .2s ease;
        }
        .tfl-pm-close:hover { transform: scale(1.08); background: #fff; }
        @media (min-width: 768px) { .tfl-pm-title { font-size: 1.7rem; } .tfl-pm-head { padding: 1.5rem 2rem; } }
        @media (prefers-reduced-motion: reduce) {
            .tfl-pc-card, .tfl-pc-img, .tfl-pm-close { transition: none; }
            .tfl-pc-card:hover { transform: none; }
            .tfl-pc-card:hover .tfl-pc-img { transform: none; }
        }
    </style>
</head>
<body class="font-sans antialiased bg-white text-gray-800 dark:bg-slate-900 dark:text-gray-200 transition-colors duration-300">

    @include('partials.header')

    @php
        // Photo for a programme. Order of preference:
        //   1) the image uploaded in the admin (stored on the "public" disk -> public/storage/...)
        //   2) a manual file at public/images/programmes/{slug}.jpg (or .jpeg / .png / .webp)
        //   3) nothing, and the card shows the soft branded fallback
        $imgUrl = function ($programme) {
            $path = $programme->image ?? null;
            if ($path) {
                return \Illuminate\Support\Str::startsWith($path, ['http://', 'https://', '/'])
                    ? $path
                    : asset('storage/' . ltrim($path, '/'));
            }
            foreach (['jpg', 'jpeg', 'png', 'webp'] as $ext) {
                $file = 'images/programmes/' . $programme->slug . '.' . $ext;
                if (file_exists(public_path($file))) {
                    return asset($file);
                }
            }
            return null;
        };
    @endphp

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

            <div x-data="{ active: null }"
                 x-on:keydown.escape.window="active = null"
                 x-effect="document.body.style.overflow = active ? 'hidden' : ''">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-8">

                    @foreach ($programmes as $programme)
                    @php $img = $imgUrl($programme); @endphp
                    <div class="tfl-pc-card bg-white dark:bg-slate-800 rounded-3xl shadow-sm border border-gray-100 dark:border-gray-800 overflow-hidden hover:shadow-md flex flex-col">

                        <!-- Photo (or a soft branded fallback when no photo was uploaded) -->
                        <div class="tfl-pc-media">
                            <span class="tfl-pc-ghost" aria-hidden="true">{{ $loop->iteration }}</span>
                            @if ($img)
                                <img src="{{ $img }}" alt="{{ $programme->title }}" class="tfl-pc-img" loading="lazy" onerror="this.style.display='none'">
                                <div class="tfl-pc-shade"></div>
                            @endif
                            <span class="tfl-pc-num bg-primary text-white">{{ $loop->iteration }}</span>
                            @if ($programme->subtitle)
                                <span class="tfl-pc-tag">{{ $programme->subtitle }}</span>
                            @endif
                        </div>

                        <div class="p-8 md:p-9 flex flex-col flex-1">
                            <h2 class="text-xl md:text-2xl font-bold text-slate-900 dark:text-white leading-snug mb-3">{{ $programme->title }}</h2>
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
                @php $img = $imgUrl($programme); @endphp
                <div x-show="active === '{{ $programme->slug }}'" x-cloak
                     class="fixed inset-0 z-50 flex items-center justify-center p-4 md:p-8"
                     x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                     x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                    <div class="absolute inset-0 bg-slate-950/70 backdrop-blur-sm" @click="active = null"></div>

                    <div class="relative bg-white dark:bg-slate-800 rounded-3xl shadow-2xl w-full max-w-2xl overflow-hidden"
                         x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                         x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95">

                        <!-- Close stays visible while the content scrolls -->
                        <button @click="active = null" class="tfl-pm-close" aria-label="Close">
                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18M6 6l12 12"/></svg>
                        </button>

                        <div class="max-h-[85vh] overflow-y-auto">
                            <!-- Banner with the programme photo and title -->
                            <div class="tfl-pm-banner {{ $img ? 'has-img' : '' }}">
                                <span class="tfl-pm-ghost" aria-hidden="true">{{ $loop->iteration }}</span>
                                @if ($img)
                                    <img src="{{ $img }}" alt="{{ $programme->title }}" class="tfl-pm-img" loading="lazy" onerror="this.style.display='none'">
                                @endif
                                <div class="tfl-pm-shade"></div>
                                <div class="tfl-pm-head">
                                    <span class="tfl-pm-num">{{ $loop->iteration }}</span>
                                    <div>
                                        <h2 class="tfl-pm-title">{{ $programme->title }}</h2>
                                        @if ($programme->subtitle)
                                            <p class="tfl-pm-sub">{{ $programme->subtitle }}</p>
                                        @endif
                                    </div>
                                </div>
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
                </div>
                @endif
                @endforeach

            </div>

        </div>
    </main>

    @include('partials.footer')

</body>
</html>