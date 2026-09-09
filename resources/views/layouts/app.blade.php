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

        {{-- Preloader: logo (public/images/logo.png) + progress bar 0->100% kabla site haijafunguka --}}
        @include('partials.preloader')

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
    <!-- Success Message Toast (Weka chini kabisa kwenye footer au layout) -->
@if(session('success'))
    <div x-data="{ show: true }" 
         x-show="show" 
         x-init="setTimeout(() => show = false, 5000)"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 transform translate-y-4"
         x-transition:enter-end="opacity-100 transform translate-y-0"
         x-transition:leave="transition ease-in duration-300"
         x-transition:leave-start="opacity-100 transform translate-y-0"
         x-transition:leave-end="opacity-0 transform translate-y-4"
         class="fixed bottom-8 right-8 z-[100] bg-green-600 text-white px-6 py-4 rounded-lg shadow-2xl flex items-center gap-3 border border-green-500/50">
        
        <!-- Icon ya V (Checkmark) -->
        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        
        <div>
            <h4 class="font-bold text-sm">Success!</h4>
            <p class="text-sm text-green-50">{{ session('success') }}</p>
        </div>
        
        <!-- Button ya Kufunga manual -->
        <button @click="show = false" class="ml-4 text-green-200 hover:text-white transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
        </button>
    </div>
@endif
</html>