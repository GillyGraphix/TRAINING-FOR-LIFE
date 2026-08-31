<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Training For Life (TFL)</title>

    <!-- Google Fonts: Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Tailwind & Alpine (Vite) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-white text-gray-800 dark:bg-slate-900 dark:text-gray-200 transition-colors duration-300">

    <!-- Header Navigation -->
    @include('partials.header')

    <main>
        <!-- Hero Section -->
        @include('partials.hero')

        <!-- Impact Counters Section -->
        @include('partials.impact-counters')

        <!-- Programme Highlights Section -->
        @include('partials.programme-highlights')

        <!-- Why The Youth Section (Mpya hapa kati) -->
        @include('partials.why-the-youth')

        <!-- Our Approach Section (Mpya hapa) -->
        @include('partials.our-approach')

        <!-- Alumni Story Section -->
        @include('partials.alumni-story')

        <!-- News & Updates Preview Section -->
        @include('partials.news-preview')

        <!-- Partner Logos Section -->
        @include('partials.partner-logos')

        <!-- Interactive WhatsApp Chat Widget -->
        @include('partials.whatsapp-float')
    </main>

    <!-- Footer Section -->
    @include('partials.footer')

    <!-- Scroll to Top Button -->
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
            class="fixed bottom-24 right-6 z-40 p-3 rounded-full bg-primary hover:bg-orange-600 text-white shadow-xl focus:outline-none transform transition-transform hover:-translate-y-1 cursor-pointer"
            style="display: none;"
            aria-label="Scroll to top">
        <!-- Up Arrow Icon -->
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M5 10l7-7m0 0l7 7m-7-7v18" />
        </svg>
    </button>

</body>
</html>