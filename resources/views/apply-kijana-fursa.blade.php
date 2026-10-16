<!-- Tunatumia layout ya public/website yako (siyo ya Admin) -->
<!-- Kama unatumia app layout nyingine kwa wateja (mfano layouts.guest), badilisha hapa chini -->
<x-guest-layout>
    
    <!-- Hero Section / Kichwa cha Ukurasa -->
    <div class="bg-[#070049] py-16 text-center">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl">
                Maombi ya Kijana Fursa
            </h1>
            <p class="mt-4 max-w-2xl mx-auto text-xl text-gray-300">
                Karibu katika programu ya mafunzo ya ujasiriamali na maisha endelevu inayoendeshwa na Training for Life (TFL).
            </p>
        </div>
    </div>

    <!-- Hapa ndipo tunapoweka (render) hiyo Fomu ya Livewire uliyonitumia -->
    <div class="bg-gray-50 py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- 
              JINA LA COMPONENT YA LIVEWIRE:
              Hakikisha jina linalofuata baada ya 'livewire:' linaendana na jina la class yako.
              Kama hujatengeneza component, nitakuonyesha jinsi ya kutengeneza hatua ya 2.
              Hapa tunaichukulia inaitwa 'kijana-fursa-form'
            -->
            @livewire('kijana-fursa-form')

        </div>
    </div>

</x-guest-layout>