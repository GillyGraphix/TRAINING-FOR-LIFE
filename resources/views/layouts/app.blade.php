<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Hii script ndogo inazuia ile 'flash' nyeupe kabla site haijasoma kama ipo dark mode -->
        <script>
            if (localStorage.getItem('theme') === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.documentElement.classList.add('dark');
            }
        </script>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    
    <!-- Nimeongeza text-gray-900 na dark:text-gray-100 ili maandishi yote yabadilike -->
    <body class="font-sans antialiased text-gray-900 dark:text-gray-100 transition-colors duration-500">
        
        <!-- Nimeongeza dark:bg-slate-900 hapa kwenye background kuu -->
        <div class="min-h-screen bg-gray-100 dark:bg-slate-900 transition-colors duration-500">
            
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <!-- Nimeongeza dark:bg-slate-800 na kurekebisha shadow kwenye kiza -->
                <header class="bg-white dark:bg-slate-800 shadow dark:shadow-gray-900/50 transition-colors duration-500">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>