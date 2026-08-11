<style>
    @keyframes marquee {
        0% { transform: translateX(0%); }
        100% { transform: translateX(-50%); }
    }
    .animate-marquee {
        /* Mwendo wa sekunde 20 kwa ulaini */
        animation: marquee 20s linear infinite;
        width: max-content;
    }
    .animate-marquee:hover {
        animation-play-state: paused;
    }
</style>

<section class="py-12 bg-white dark:bg-secondary border-t border-gray-100 dark:border-gray-800 overflow-hidden transition-colors duration-500">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-6 md:mb-8">
        <p class="text-center text-xs md:text-sm font-semibold text-gray-400 dark:text-gray-400 uppercase tracking-widest">
            Trusted by amazing partners and funders
        </p>
    </div>

    <div class="w-full inline-flex flex-nowrap overflow-hidden [mask-image:_linear-gradient(to_right,transparent_0,_black_64px,_black_calc(100%-64px),transparent_100%)] md:[mask-image:_linear-gradient(to_right,transparent_0,_black_128px,_black_calc(100%-128px),transparent_100%)]">
        
        <div class="flex items-center animate-marquee">
            
            <!-- Group 1 -->
            <div class="flex items-center space-x-8 md:space-x-16 mx-4 md:mx-8">
                <div class="text-lg md:text-2xl font-black text-gray-400 dark:text-gray-400 opacity-50 hover:opacity-100 transition-opacity">GLOBAL<span class="text-gray-600 dark:text-gray-300">FUND</span></div>
                <div class="text-lg md:text-2xl font-bold text-gray-500 dark:text-gray-300 italic opacity-50 hover:opacity-100 transition-opacity">EduCare</div>
                <div class="text-base md:text-xl font-bold text-gray-500 dark:text-gray-300 flex items-center opacity-50 hover:opacity-100 transition-opacity">
                    <svg class="w-5 h-5 md:w-6 md:h-6 mr-1 md:mr-2" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L2 22h20L12 2z"/></svg>
                    YOUTH HUB
                </div>
                <div class="text-lg md:text-2xl font-serif font-bold text-gray-500 dark:text-gray-300 opacity-50 hover:opacity-100 transition-opacity">Tanzania <span class="font-light">Trust</span></div>
                <div class="text-lg md:text-2xl font-black text-gray-400 dark:text-gray-400 tracking-tighter opacity-50 hover:opacity-100 transition-opacity">INNO<span class="text-gray-600 dark:text-gray-300">VATE</span></div>
            </div>

            <!-- Group 2 -->
            <div class="flex items-center space-x-8 md:space-x-16 mx-4 md:mx-8">
                <div class="text-lg md:text-2xl font-black text-gray-400 dark:text-gray-400 opacity-50 hover:opacity-100 transition-opacity">GLOBAL<span class="text-gray-600 dark:text-gray-300">FUND</span></div>
                <div class="text-lg md:text-2xl font-bold text-gray-500 dark:text-gray-300 italic opacity-50 hover:opacity-100 transition-opacity">EduCare</div>
                <div class="text-base md:text-xl font-bold text-gray-500 dark:text-gray-300 flex items-center opacity-50 hover:opacity-100 transition-opacity">
                    <svg class="w-5 h-5 md:w-6 md:h-6 mr-1 md:mr-2" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L2 22h20L12 2z"/></svg>
                    YOUTH HUB
                </div>
                <div class="text-lg md:text-2xl font-serif font-bold text-gray-500 dark:text-gray-300 opacity-50 hover:opacity-100 transition-opacity">Tanzania <span class="font-light">Trust</span></div>
                <div class="text-lg md:text-2xl font-black text-gray-400 dark:text-gray-400 tracking-tighter opacity-50 hover:opacity-100 transition-opacity">INNO<span class="text-gray-600 dark:text-gray-300">VATE</span></div>
            </div>

        </div>
    </div>
</section>