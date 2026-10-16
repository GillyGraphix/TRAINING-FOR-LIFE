<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Applications za Kijana Fursa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <!-- Hapa utaweka Table yako ya ku-loop $applications -->
                Orodha ya Applications itakaa hapa.
            </div>
        </div>
    </div>
</x-app-layout>