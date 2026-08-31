<!-- WHATSAPP INTERACTIVE WIDGET -->
<div class="fixed bottom-6 right-6 z-50 font-sans" x-data="{ openChat: false }">
    
    <!-- CHAT POPUP BOX -->
    <div x-show="openChat" 
         style="display: none;"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 translate-y-4 scale-95"
         x-transition:enter-end="opacity-100 translate-y-0 scale-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 translate-y-0 scale-100"
         x-transition:leave-end="opacity-0 translate-y-4 scale-95"
         class="absolute bottom-20 right-0 w-80 sm:w-85 bg-white dark:bg-slate-800 rounded-3xl shadow-2xl border border-gray-100 dark:border-slate-700 overflow-hidden z-50">
        
        <!-- Widget Header -->
        <div class="bg-green-600 p-4 text-white flex items-center justify-between">
            <div class="flex items-center space-x-3">
                <div class="relative">
                    <!-- Avatar Logo (whatsapp.logo.png) -->
                    <div class="w-10 h-10 rounded-full bg-white flex items-center justify-center overflow-hidden p-1 shadow">
                        <img src="{{ asset('images/whatsapp.logo.png') }}" alt="TFL Agent" class="w-full h-full object-contain">
                    </div>
                    <!-- Online Dot -->
                    <span class="absolute bottom-0 right-0 w-3 h-3 bg-emerald-400 border-2 border-green-600 rounded-full"></span>
                </div>
                <div>
                    <h4 class="font-bold text-sm tracking-wide">Training for Life</h4>
                    <p class="text-[11px] text-green-100 flex items-center">
                        <span class="inline-block w-1.5 h-1.5 bg-emerald-300 rounded-full mr-1.5 animate-pulse"></span>
                        Typically replies instantly
                    </p>
                </div>
            </div>
            <!-- Close Button -->
            <button @click="openChat = false" class="text-white/80 hover:text-white p-1 rounded-full hover:bg-white/10 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>

        <!-- Chat Body / Message Bubble -->
        <div class="p-4 bg-slate-50 dark:bg-slate-900/50 min-h-[140px] flex flex-col justify-end space-y-3">
            <div class="bg-white dark:bg-slate-800 p-3.5 rounded-2xl rounded-tl-none shadow-sm border border-gray-100 dark:border-slate-700 max-w-[85%]">
                <p class="text-xs text-slate-700 dark:text-slate-300 leading-relaxed">
                    Hello! 👋 Welcome to <strong>Training for Life (TFL)</strong>. Do you have any questions or need assistance regarding our programmes and community activities?
                </p>
                <span class="text-[9px] text-slate-400 dark:text-slate-500 mt-1 block text-right">Just now</span>
            </div>
        </div>

        <!-- Widget Footer / Action Button -->
        <div class="p-3 bg-white dark:bg-slate-800 border-t border-gray-100 dark:border-slate-700">
            <a href="https://wa.me/255765082693?text=Hello%20Training%20For%20Life,%20I%20visited%20your%20website%20and%20would%20like%20to%20get%20more%20information." 
               target="_blank" 
               rel="noopener noreferrer"
               class="flex items-center justify-center space-x-2 w-full bg-green-600 hover:bg-green-700 text-white font-bold text-xs uppercase tracking-wider py-3 px-4 rounded-xl shadow-lg shadow-green-600/25 transition-all duration-300 hover:scale-[1.02]">
                <!-- WhatsApp Icon -->
                <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                    <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                </svg>
                <span>Start Chat</span>
            </a>
        </div>
    </div>

    <!-- FLOATING TOGGLE BUTTON -->
    <button @click="openChat = !openChat" 
            class="relative flex items-center justify-center w-14 h-14 bg-green-500 hover:bg-green-600 text-white rounded-full shadow-2xl transition-all duration-300 hover:scale-110 focus:outline-none group">
        
        <!-- Notification Badge -->
        <span class="absolute -top-1 -right-1 flex h-4 w-4">
            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
            <span class="relative inline-flex rounded-full h-4 w-4 bg-red-500 text-[10px] text-white font-bold items-center justify-center">1</span>
        </span>

        <!-- WhatsApp Icon -->
        <svg x-show="!openChat" class="w-8 h-8 fill-current transition-transform duration-300 group-hover:rotate-12" viewBox="0 0 24 24">
            <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
        </svg>

        <!-- Close Icon -->
        <svg x-show="openChat" style="display: none;" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/>
        </svg>

        <!-- Tooltip -->
        <span class="absolute right-full mr-3 px-3 py-1 bg-slate-900 text-white text-xs font-bold rounded-lg shadow-lg opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap pointer-events-none">
            Chat with us
        </span>
    </button>
</div>