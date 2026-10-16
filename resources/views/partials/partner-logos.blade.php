<style>
    @keyframes partner-marquee {
        from {
            transform: translateX(0);
        }
        to {
            transform: translateX(-25%);
        }
    }

    .partner-marquee-track {
        display: flex;
        width: max-content;
        animation: partner-marquee 12s linear infinite;
        will-change: transform;
    }

    .partner-marquee-group {
        display: flex;
        flex: none;
        align-items: center;
        justify-content: space-evenly;
        width: 50vw;
        gap: 1.5rem;
        padding: 0 0.75rem;
    }

    .partner-marquee:hover .partner-marquee-track {
        animation-play-state: paused;
    }

    .crdb-logo-mark {
        display: flex;
        width: 8rem;
        height: 8rem;
        flex: none;
        align-items: center;
        justify-content: center;
        border: 3px solid #16834a;
        border-radius: 9999px;
        color: #16834a;
        text-align: center;
    }

    .crdb-logo-text {
        display: flex;
        flex-direction: column;
        align-items: center;
        line-height: 1;
    }

    .crdb-logo-name {
        font-family: Georgia, "Times New Roman", serif;
        font-size: 1.1rem;
        font-weight: 900;
        letter-spacing: -0.08em;
    }

    .crdb-logo-bank {
        margin-top: 0.15rem;
        padding: 0.15rem 0.35rem;
        background: #16834a;
        color: white;
        font-size: 0.9rem;
        font-weight: 900;
        letter-spacing: 0.04em;
    }

    .crdb-logo-foundation {
        margin-top: 0.2rem;
        font-size: 0.9rem;
        font-weight: 800;
        letter-spacing: -0.04em;
    }

    .crdb-logo-lines {
        display: flex;
        align-items: center;
        gap: 0.25rem;
        margin-top: 0.2rem;
    }

    .crdb-logo-lines::before,
    .crdb-logo-lines::after {
        content: "";
        display: block;
        width: 1rem;
        height: 0.4rem;
        border-top: 2px solid currentColor;
        border-bottom: 2px solid currentColor;
    }

    .mama-hope-logo {
        flex: none;
        color: #6b7280;
        font-size: 1.5rem;
        font-weight: 800;
        font-style: italic;
        letter-spacing: -0.04em;
        white-space: nowrap;
    }

    .mama-hope-logo span {
        color: #f97316;
        font-style: normal;
    }

    @media (max-width: 640px) {
        .partner-marquee-group {
            width: 50vw;
            gap: 0.75rem;
            padding: 0 0.4rem;
        }

        .crdb-logo-mark {
            width: 6rem;
            height: 6rem;
        }

        .crdb-logo-name {
            font-size: 0.85rem;
        }

        .crdb-logo-bank,
        .crdb-logo-foundation {
            font-size: 0.7rem;
        }

        .crdb-logo-lines::before,
        .crdb-logo-lines::after {
            width: 0.7rem;
        }

        .mama-hope-logo {
            font-size: 1rem;
        }
    }

    @media (prefers-reduced-motion: reduce) {
        .partner-marquee-track {
            animation: none;
        }
    }
</style>

<section class="py-12 bg-white dark:bg-secondary border-t border-gray-100 dark:border-gray-800 overflow-hidden transition-colors duration-500">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-6 md:mb-8">
        <p class="text-center text-xs md:text-sm font-semibold text-gray-400 dark:text-gray-400 uppercase tracking-widest">
            Trusted by our partners
        </p>
    </div>

    <div class="partner-marquee w-full overflow-hidden"
         aria-label="Our partners: CRDB Bank Foundation and Mama Hope">
        <div class="partner-marquee-track">

            <!-- Partner group 1 -->
            <div class="partner-marquee-group">
                <div class="crdb-logo-mark" role="img" aria-label="CRDB Bank Foundation">
                    <div class="crdb-logo-text">
                        <span class="crdb-logo-name">CRDB</span>
                        <span class="crdb-logo-lines">
                            <span class="crdb-logo-bank">BANK</span>
                        </span>
                        <span class="crdb-logo-foundation">Foundation</span>
                    </div>
                </div>

                <div class="mama-hope-logo" role="img" aria-label="Mama Hope">
                    MAMA <span>HOPE</span>
                </div>
            </div>

            <!-- Partner group 2 -->
            <div class="partner-marquee-group" aria-hidden="true">
                <div class="crdb-logo-mark">
                    <div class="crdb-logo-text">
                        <span class="crdb-logo-name">CRDB</span>
                        <span class="crdb-logo-lines">
                            <span class="crdb-logo-bank">BANK</span>
                        </span>
                        <span class="crdb-logo-foundation">Foundation</span>
                    </div>
                </div>

                <div class="mama-hope-logo">
                    MAMA <span>HOPE</span>
                </div>
            </div>

            <!-- Partner group 3 -->
            <div class="partner-marquee-group">
                <div class="crdb-logo-mark" role="img" aria-label="CRDB Bank Foundation">
                    <div class="crdb-logo-text">
                        <span class="crdb-logo-name">CRDB</span>
                        <span class="crdb-logo-lines">
                            <span class="crdb-logo-bank">BANK</span>
                        </span>
                        <span class="crdb-logo-foundation">Foundation</span>
                    </div>
                </div>

                <div class="mama-hope-logo" role="img" aria-label="Mama Hope">
                    MAMA <span>HOPE</span>
                </div>
            </div>

            <!-- Partner group 4 -->
            <div class="partner-marquee-group" aria-hidden="true">
                <div class="crdb-logo-mark">
                    <div class="crdb-logo-text">
                        <span class="crdb-logo-name">CRDB</span>
                        <span class="crdb-logo-lines">
                            <span class="crdb-logo-bank">BANK</span>
                        </span>
                        <span class="crdb-logo-foundation">Foundation</span>
                    </div>
                </div>

                <div class="mama-hope-logo">
                    MAMA <span>HOPE</span>
                </div>
            </div>

        </div>
    </div>
</section>