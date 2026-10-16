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

        <!-- Scripts & Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        {{-- ONGEZA HAPA: Muhimu sana kwa Livewire kusoma mitindo yake --}}
        @livewireStyles
    </head>
    <body class="font-sans text-gray-900 antialiased bg-gray-50">
        @if (request()->routeIs('login'))
            {{-- Login page ina muundo wake kamili wa ukurasa --}}
            {{ $slot }}
        @elseif (request()->routeIs('apply.kijana.fursa') || request()->is('apply/*'))
            {{-- Ukurasa wa Fomu ya Maombi utajitanua wenyewe bila kubanwa na max-w-md --}}
            <div class="min-h-screen flex flex-col bg-gray-50">
                {{ $slot }}
            </div>
        @else
            {{-- Kurasa nyingine za auth (register, forgot-password, n.k.) zinabaki kwenye muundo wa kawaida wa box dogo --}}
            <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
                <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                    {{ $slot }}
                </div>
            </div>
        @endif

        {{-- ONGEZA HAPA: Muhimu sana kwa Livewire kuwezesha upload na AJAX requests --}}
        @livewireScripts
    </body>
</html>