@if (isset($partners) && $partners->isNotEmpty())
    <style>
        .partner-logo-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 1rem;
        }

        .partner-logo-card {
            display: flex;
            min-height: 9rem;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
            padding: 1.25rem;
            border: 1px solid #e5e7eb;
            border-radius: 0.75rem;
            background: #ffffff;
            color: #374151;
            text-align: center;
            text-decoration: none;
            transition: border-color 0.2s ease, box-shadow 0.2s ease, transform 0.2s ease;
        }

        a.partner-logo-card {
            cursor: pointer;
        }

        a.partner-logo-card:hover {
            transform: translateY(-2px);
            border-color: #f79120;
            box-shadow: 0 8px 20px rgb(7 0 73 / 10%);
        }

        a.partner-logo-card:focus-visible {
            outline: 3px solid #f79120;
            outline-offset: 3px;
        }

        .partner-logo-image {
            display: block;
            width: 10rem;
            height: 5rem;
            object-fit: contain;
        }

        .partner-logo-name {
            max-width: 14rem;
            font-size: 0.95rem;
            font-weight: 700;
            line-height: 1.35;
        }

        html.dark .partner-logo-card {
            border-color: #374151;
            background: #1f2937;
            color: #f3f4f6;
        }

        html.dark a.partner-logo-card:hover {
            border-color: #f79120;
        }

        @media (min-width: 640px) {
            .partner-logo-grid {
                grid-template-columns: repeat(3, minmax(0, 1fr));
                gap: 1.25rem;
            }
        }

        @media (min-width: 1024px) {
            .partner-logo-grid {
                grid-template-columns: repeat(4, minmax(0, 1fr));
                gap: 1.5rem;
            }
        }
    </style>

    <section class="py-12 bg-white dark:bg-secondary border-t border-gray-100 dark:border-gray-800 transition-colors duration-500">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-8">
                <p class="text-center text-xs md:text-sm font-semibold text-gray-400 dark:text-gray-400 uppercase tracking-widest">
                    Trusted by our partners
                </p>
            </div>

            <div class="partner-logo-grid">
                @foreach ($partners as $partner)
                    @php
                        $partnerLabel = $partner->name ?: 'Partner';
                    @endphp

                    @if ($partner->website_url)
                        <a href="{{ $partner->website_url }}"
                           class="partner-logo-card"
                           aria-label="Tembelea website ya {{ $partnerLabel }}">
                    @else
                        <div class="partner-logo-card">
                    @endif

                        @if ($partner->logo_path)
                            <img
                                src="{{ asset('storage/' . $partner->logo_path) }}"
                                alt="{{ $partnerLabel }}"
                                class="partner-logo-image"
                                loading="lazy">
                        @endif

                        @if ($partner->name)
                            <span class="partner-logo-name">{{ $partner->name }}</span>
                        @endif

                    @if ($partner->website_url)
                        </a>
                    @else
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>
@endif