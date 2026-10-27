<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Privacy Policy | Training For Life</title>
    <meta name="description" content="Read how Training For Life collects, uses, and protects personal information.">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-white font-sans antialiased text-slate-800 transition-colors duration-300 dark:bg-slate-950 dark:text-slate-200">

    @include('partials.header')

    <main class="min-h-screen bg-slate-50 px-4 pb-20 pt-28 text-slate-800 transition-colors duration-300 dark:bg-slate-950 dark:text-slate-200 sm:px-6 lg:px-8">
        <article class="mx-auto max-w-4xl">

            <header class="mb-12 text-center">
                <p class="mb-3 text-sm font-bold uppercase tracking-[0.18em] text-orange-700 dark:text-orange-300">
                    Training For Life
                </p>

                <h1 class="text-3xl font-extrabold text-slate-950 dark:text-white sm:text-5xl">
                    Privacy Policy
                </h1>

                <div class="mx-auto mt-5 h-1 w-16 rounded-full bg-primary"></div>

                <p class="mt-5 text-sm text-slate-600 dark:text-slate-400">
                    Last updated: 15 October 2026
                </p>

                <p class="mx-auto mt-6 max-w-2xl text-left leading-7 text-slate-700 dark:text-slate-300 sm:text-center">
                    Training For Life (TFL) respects the privacy of people who visit our website,
                    contact us, or apply to our programmes. This policy explains the types of
                    personal information we may collect and how it may be used in connection with
                    TFL’s work.
                </p>
            </header>

            <div class="space-y-8">

                <section>
                    <h2 class="text-xl font-bold text-slate-950 dark:text-white">
                        1. Information we may collect
                    </h2>
                    <p class="mt-3 leading-7 text-slate-700 dark:text-slate-300">
                        Depending on how you interact with TFL, we may collect information such as
                        your name, contact details, age or date of birth, education and programme
                        application details. Some application forms may ask for identification,
                        family, disability, health, or other information relevant to a particular
                        programme or support request.
                    </p>
                    <p class="mt-3 leading-7 text-slate-700 dark:text-slate-300">
                        We may also receive information you choose to provide when contacting us,
                        subscribing to updates, participating in TFL activities, or submitting
                        feedback.
                    </p>
                </section>

                <section>
                    <h2 class="text-xl font-bold text-slate-950 dark:text-white">
                        2. How we use information
                    </h2>
                    <p class="mt-3 leading-7 text-slate-700 dark:text-slate-300">
                        TFL may use personal information to review programme applications, contact
                        applicants, provide services or support, respond to enquiries, administer
                        activities, improve our programmes, and meet applicable legal or
                        organisational requirements.
                    </p>
                    <p class="mt-3 leading-7 text-slate-700 dark:text-slate-300">
                        We aim to collect information that is relevant to the purpose for which it
                        is requested. Where a form requests sensitive information, the form should
                        explain why that information is needed.
                    </p>
                </section>

                <section>
                    <h2 class="text-xl font-bold text-slate-950 dark:text-white">
                        3. Children and young people
                    </h2>
                    <p class="mt-3 leading-7 text-slate-700 dark:text-slate-300">
                        Some TFL programmes serve children and young people. Where an application
                        concerns a person under 18, TFL will handle their information with care and
                        seek parent or guardian involvement or consent where appropriate and
                        required for the application or activity.
                    </p>
                    <p class="mt-3 leading-7 text-slate-700 dark:text-slate-300">
                        Please do not submit another person’s personal information unless you are
                        authorised to provide it for the relevant purpose.
                    </p>
                </section>

                <section>
                    <h2 class="text-xl font-bold text-slate-950 dark:text-white">
                        4. When information may be shared
                    </h2>
                    <p class="mt-3 leading-7 text-slate-700 dark:text-slate-300">
                        TFL may share information with staff or authorised persons who need it for
                        the purposes described in this policy. Information may also be shared with
                        service providers supporting TFL’s website or programmes, where necessary
                        and subject to appropriate safeguards, or when disclosure is required by
                        law.
                    </p>
                    <p class="mt-3 leading-7 text-slate-700 dark:text-slate-300">
                        TFL should explain any additional sharing that applies to a specific
                        programme or application form before the information is submitted.
                    </p>
                </section>

                <section>
                    <h2 class="text-xl font-bold text-slate-950 dark:text-white">
                        5. Storage and retention
                    </h2>
                    <p class="mt-3 leading-7 text-slate-700 dark:text-slate-300">
                        TFL takes steps intended to protect personal information from unauthorised
                        access, loss, misuse, or disclosure. Information should only be kept for as
                        long as needed for the purpose for which it was collected, or as required
                        by applicable legal and organisational requirements.
                    </p>
                    <p class="mt-3 leading-7 text-slate-700 dark:text-slate-300">
                        If you need details about how a particular application or record is stored
                        or retained, please contact TFL using the link below.
                    </p>
                </section>

                <section>
                    <h2 class="text-xl font-bold text-slate-950 dark:text-white">
                        6. Website cookies and external services
                    </h2>
                    <p class="mt-3 leading-7 text-slate-700 dark:text-slate-300">
                        Our website may use cookies or similar technologies needed for website
                        functions. If analytics, embedded media, maps, or other external services
                        are enabled, those services may collect information according to their own
                        privacy policies.
                    </p>
                </section>

                <section>
                    <h2 class="text-xl font-bold text-slate-950 dark:text-white">
                        7. Your questions and requests
                    </h2>
                    <p class="mt-3 leading-7 text-slate-700 dark:text-slate-300">
                        You may contact TFL with questions about this policy or a request relating
                        to personal information you have provided. TFL will review and respond to
                        requests in line with applicable requirements and the circumstances of the
                        request.
                    </p>

                    <a href="{{ route('contact') }}"
                       class="mt-4 inline-flex items-center rounded-full bg-primary px-5 py-3 text-sm font-bold text-[#070049] transition hover:bg-orange-400 focus:outline-none focus-visible:ring-4 focus-visible:ring-orange-300/60">
                        Contact Training For Life
                    </a>
                </section>

                <section>
                    <h2 class="text-xl font-bold text-slate-950 dark:text-white">
                        8. Updates to this policy
                    </h2>
                    <p class="mt-3 leading-7 text-slate-700 dark:text-slate-300">
                        TFL may update this policy when its practices or applicable requirements
                        change. The latest version will be published on this page with an updated
                        revision date.
                    </p>
                </section>

            </div>

            <div class="mt-10 flex justify-center">
                <a href="{{ route('home') }}#footer"
                   class="inline-flex items-center gap-2 rounded-full bg-[#070049] px-6 py-3 text-sm font-bold text-white shadow-md transition hover:-translate-y-0.5 hover:bg-slate-800 focus:outline-none focus-visible:ring-4 focus-visible:ring-orange-300/60">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5m0 0 7 7m-7-7 7-7"></path>
                    </svg>
                    Back to Home
                </a>
            </div>

        </article>
    </main>

    @include('partials.footer')

</body>
</html>