<div id="snm-tab" class="tab-content hidden">
    <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-xl font-bold text-[#070049] dark:text-white">Orodha ya Waombaji: SNM Scholarship</h2>
            <span class="bg-[#070049] text-white px-3 py-1 rounded-full text-sm font-bold">{{ $totalScholarships ?? 0 }} Maombi</span>
        </div>
        <hr class="mb-4 dark:border-gray-700">

        <div class="overflow-x-auto rounded-lg border border-gray-200 dark:border-gray-700 shadow-sm">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 text-sm">
                <thead class="bg-gray-50 dark:bg-gray-900/50">
                    <tr>
                        <th scope="col" class="px-6 py-4 text-left font-bold text-gray-500 uppercase tracking-wider dark:text-gray-400">Jina Kamili</th>
                        <th scope="col" class="px-6 py-4 text-left font-bold text-gray-500 uppercase tracking-wider dark:text-gray-400">Simu</th>
                        <th scope="col" class="px-6 py-4 text-left font-bold text-gray-500 uppercase tracking-wider dark:text-gray-400">Shule & Darasa</th>
                        <th scope="col" class="px-6 py-4 text-left font-bold text-gray-500 uppercase tracking-wider dark:text-gray-400">Tarehe</th>
                        <th scope="col" class="px-6 py-4 text-right font-bold text-gray-500 uppercase tracking-wider dark:text-gray-400">Taarifa</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                    @if(isset($allScholarships) && $allScholarships->count() > 0)
                        @foreach($allScholarships as $app)
                        <tr onclick="document.getElementById('modal-snm-{{ $app->id }}').classList.remove('hidden')"
                            class="hover:bg-purple-50 dark:hover:bg-purple-900/20 transition-colors cursor-pointer clickable-row group">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="font-bold text-[#070049] dark:text-white group-hover:text-[#070049] dark:group-hover:text-[#070049]">{{ $app->full_name }}</div>
                                <div class="text-xs text-gray-500 dark:text-gray-400">{{ $app->gender }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-gray-700 dark:text-gray-300">{{ $app->phone_number }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-gray-700 dark:text-gray-300">
                                {{ $app->current_school }} <span class="text-xs font-bold text-[#070049]">({{ $app->current_class }})</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-gray-500 dark:text-gray-400 text-xs">{{ $app->created_at?->format('d/m/Y') }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-right">
                                <span class="text-[#070049] text-xs font-bold flex items-center justify-end gap-1 group-hover:underline">
                                    Fungua <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                </span>
                            </td>
                        </tr>

                        {{-- MODAL KWA AJILI YA SNM SCHOLARSHIP --}}
                        <div id="modal-snm-{{ $app->id }}" class="fixed inset-0 z-50 hidden bg-black/60 p-4 sm:p-6 flex items-center justify-center overflow-y-auto" onclick="if(event.target===this)this.classList.add('hidden')">
                            <div class="relative w-full max-w-4xl bg-white dark:bg-gray-800 rounded-xl shadow-2xl overflow-hidden flex flex-col max-h-[90vh]">
                                <div class="flex items-center justify-between px-6 py-4 border-b border-gray-100 dark:border-gray-700 bg-gray-50/50 dark:bg-gray-900/50">
                                    <div>
                                        <h3 class="text-xl font-bold text-[#070049] dark:text-blue-400">Taarifa za Mwombaji: {{ $app->full_name }}</h3>
                                        <p class="text-sm text-gray-500 mt-1">Imepokelewa: {{ $app->created_at?->format('d/m/Y H:i') }} | <strong class="text-[#070049]">Alama za Kipaumbele: {{ $app->priority_score ?? 0 }}</strong></p>
                                    </div>
                                    <button type="button" onclick="document.getElementById('modal-snm-{{ $app->id }}').classList.add('hidden')" class="p-2 text-gray-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition-colors">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path></svg>
                                    </button>
                                </div>

                                <div class="p-6 overflow-y-auto custom-scrollbar space-y-6 text-sm text-gray-700 dark:text-gray-300">
                                    {{-- 1. Taarifa Binafsi --}}
                                    <div>
                                        <h4 class="text-xs font-bold text-[#070049] uppercase tracking-wider mb-3">1. Taarifa Binafsi</h4>
                                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                                            <div><span class="block text-xs text-gray-500 uppercase">Jina Kamili</span><span class="font-semibold text-gray-900 dark:text-white">{{ $app->full_name }}</span></div>
                                            <div><span class="block text-xs text-gray-500 uppercase">Simu</span><span class="font-semibold text-gray-900 dark:text-white">{{ $app->phone_number }}</span></div>
                                            <div><span class="block text-xs text-gray-500 uppercase">Jinsia</span><span class="font-semibold text-gray-900 dark:text-white">{{ $app->gender }}</span></div>
                                            <div><span class="block text-xs text-gray-500 uppercase">Tarehe ya Kuzaliwa</span><span class="font-semibold text-gray-900 dark:text-white">{{ $app->dob ? \Carbon\Carbon::parse($app->dob)->format('d/m/Y') : '' }}</span></div>
                                            <div><span class="block text-xs text-gray-500 uppercase">NIDA / Cheti</span><span class="font-semibold text-gray-900 dark:text-white">{{ $app->national_id ?: 'N/A' }}</span></div>
                                            <div><span class="block text-xs text-gray-500 uppercase">Anwani</span><span class="font-semibold text-gray-900 dark:text-white">{{ $app->home_address }}</span></div>
                                        </div>
                                    </div>

                                    <hr class="border-gray-100 dark:border-gray-700">

                                    {{-- 2. Hali ya Elimu --}}
                                    <div>
                                        <h4 class="text-xs font-bold text-[#070049] uppercase tracking-wider mb-3">2. Hali ya Elimu</h4>
                                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                                            <div><span class="block text-xs text-gray-500 uppercase">Shule ya Sasa</span><span class="font-semibold text-gray-900 dark:text-white">{{ $app->current_school }}</span></div>
                                            <div><span class="block text-xs text-gray-500 uppercase">Kidato / Darasa</span><span class="font-semibold text-gray-900 dark:text-white">{{ $app->current_class }}</span></div>
                                            <div><span class="block text-xs text-gray-500 uppercase">Hali ya Elimu</span><span class="font-semibold text-gray-900 dark:text-white">{{ $app->education_status }}</span></div>
                                            <div class="sm:col-span-2"><span class="block text-xs text-gray-500 uppercase">Sababu za Kuacha Shule</span><span class="font-semibold text-gray-900 dark:text-white">{{ $app->reason_for_leaving ?: 'N/A' }}</span></div>
                                            <div><span class="block text-xs text-gray-500 uppercase">Matokeo ya Form 4</span><span class="font-semibold text-gray-900 dark:text-white">{{ $app->form_four_results ?: 'N/A' }}</span></div>
                                            <div><span class="block text-xs text-gray-500 uppercase">Uongozi wa Shule</span><span class="font-semibold text-gray-900 dark:text-white">{{ $app->was_school_leader ? 'Ndiyo ('.$app->leadership_role.')' : 'Hapana' }}</span></div>
                                        </div>
                                    </div>

                                    <hr class="border-gray-100 dark:border-gray-700">

                                    {{-- 3. Vigezo vya Kipaumbele --}}
                                    <div>
                                        <h4 class="text-xs font-bold text-[#070049] uppercase tracking-wider mb-3">3. Vigezo vya Kipaumbele</h4>
                                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 bg-purple-50/50 dark:bg-purple-900/10 p-4 rounded-lg">
                                            <div><span class="block text-xs text-gray-500 uppercase">Yatima</span><span class="font-semibold text-gray-900 dark:text-white">{{ $app->orphan_status }}</span></div>
                                            <div><span class="block text-xs text-gray-500 uppercase">Mzazi Mmoja</span><span class="font-semibold text-gray-900 dark:text-white">{{ $app->single_parent ? 'Ndiyo' : 'Hapana' }}</span></div>
                                            <div><span class="block text-xs text-gray-500 uppercase">Ulemavu</span><span class="font-semibold text-gray-900 dark:text-white">{{ $app->has_disability ? ($app->disability_type ?: 'Ndiyo') : 'Hapana' }}</span></div>
                                            <div><span class="block text-xs text-gray-500 uppercase">Wategemezi / Watoto</span><span class="font-semibold text-gray-900 dark:text-white">{{ $app->has_dependents ? 'Ndiyo' : 'Hapana' }}</span></div>
                                            <div class="sm:col-span-2"><span class="block text-xs text-gray-500 uppercase">Hali ya Familia</span><span class="font-semibold text-gray-900 dark:text-white">{{ $app->household_situation ?: 'N/A' }}</span></div>
                                        </div>
                                    </div>

                                    <hr class="border-gray-100 dark:border-gray-700">

                                    {{-- 4. Sababu za Kuomba & Malengo --}}
                                    <div>
                                        <h4 class="text-xs font-bold text-[#070049] uppercase tracking-wider mb-3">4. Sababu & Malengo ya Baadaye</h4>
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                            <div class="bg-gray-50 dark:bg-gray-700/30 p-3 rounded">
                                                <strong class="block text-[#070049] dark:text-purple-400 mb-1">Kwanini anahitaji ufadhili:</strong>{{ $app->need_reason }}
                                            </div>
                                            <div class="bg-gray-50 dark:bg-gray-700/30 p-3 rounded">
                                                <strong class="block text-[#070049] dark:text-purple-400 mb-1">Malengo ya baadaye:</strong>{{ $app->career_goals }}
                                            </div>
                                        </div>
                                    </div>

                                    <hr class="border-gray-100 dark:border-gray-700">

                                    {{-- 5. NYARAKA ZILIZOPAKIWA (VIEW & DOWNLOAD) --}}
                                    <div>
                                        <h4 class="text-xs font-bold text-[#070049] uppercase tracking-wider mb-3">5. Nyaraka Zilizopakiwa (Tazama & Download)</h4>
                                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

                                            {{-- Ripoti ya Shule --}}
                                            @if($app->report_card_path)
                                                <div class="flex items-center justify-between p-3 border rounded-lg bg-gray-50 dark:bg-gray-700/30 dark:border-gray-600">
                                                    <div class="flex items-center gap-2">
                                                        <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                                                        <span class="text-sm font-bold text-gray-800 dark:text-white">Ripoti ya Shule</span>
                                                    </div>
                                                    <div class="flex items-center gap-2">
                                                        <a href="{{ Storage::url($app->report_card_path) }}" target="_blank" class="px-3 py-1.5 bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold rounded shadow transition">Tazama</a>
                                                        <a href="{{ Storage::url($app->report_card_path) }}" download class="px-3 py-1.5 bg-gray-700 hover:bg-gray-800 text-white text-xs font-bold rounded shadow transition flex items-center gap-1">
                                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                                                            Download
                                                        </a>
                                                    </div>
                                                </div>
                                            @endif

                                            {{-- Barua ya Shule --}}
                                            @if($app->recommendation_letter_path)
                                                <div class="flex items-center justify-between p-3 border rounded-lg bg-gray-50 dark:bg-gray-700/30 dark:border-gray-600">
                                                    <div class="flex items-center gap-2">
                                                        <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                                                        <span class="text-sm font-bold text-gray-800 dark:text-white">Barua ya Shule</span>
                                                    </div>
                                                    <div class="flex items-center gap-2">
                                                        <a href="{{ Storage::url($app->recommendation_letter_path) }}" target="_blank" class="px-3 py-1.5 bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold rounded shadow transition">Tazama</a>
                                                        <a href="{{ Storage::url($app->recommendation_letter_path) }}" download class="px-3 py-1.5 bg-gray-700 hover:bg-gray-800 text-white text-xs font-bold rounded shadow transition flex items-center gap-1">
                                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                                                            Download
                                                        </a>
                                                    </div>
                                                </div>
                                            @endif

                                            {{-- Passport Photo --}}
                                            @if($app->passport_photo_path)
                                                <div class="flex items-center justify-between p-3 border rounded-lg bg-gray-50 dark:bg-gray-700/30 dark:border-gray-600">
                                                    <div class="flex items-center gap-2">
                                                        <svg class="w-6 h-6 text-[#070049]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                                        <span class="text-sm font-bold text-gray-800 dark:text-white">Passport Photo</span>
                                                    </div>
                                                    <div class="flex items-center gap-2">
                                                        <a href="{{ Storage::url($app->passport_photo_path) }}" target="_blank" class="px-3 py-1.5 bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold rounded shadow transition">Tazama</a>
                                                        <a href="{{ Storage::url($app->passport_photo_path) }}" download class="px-3 py-1.5 bg-gray-700 hover:bg-gray-800 text-white text-xs font-bold rounded shadow transition flex items-center gap-1">
                                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                                                            Download
                                                        </a>
                                                    </div>
                                                </div>
                                            @endif

                                            {{-- Kitambulisho cha Mzazi --}}
                                            @if($app->parent_id_path)
                                                <div class="flex items-center justify-between p-3 border rounded-lg bg-gray-50 dark:bg-gray-700/30 dark:border-gray-600">
                                                    <div class="flex items-center gap-2">
                                                        <svg class="w-6 h-6 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2"/></svg>
                                                        <span class="text-sm font-bold text-gray-800 dark:text-white">ID ya Mzazi</span>
                                                    </div>
                                                    <div class="flex items-center gap-2">
                                                        <a href="{{ Storage::url($app->parent_id_path) }}" target="_blank" class="px-3 py-1.5 bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold rounded shadow transition">Tazama</a>
                                                        <a href="{{ Storage::url($app->parent_id_path) }}" download class="px-3 py-1.5 bg-gray-700 hover:bg-gray-800 text-white text-xs font-bold rounded shadow transition flex items-center gap-1">
                                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                                                            Download
                                                        </a>
                                                    </div>
                                                </div>
                                            @endif

                                        </div>
                                    </div>

                                </div>

                                <div class="px-6 py-4 border-t border-gray-100 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 text-right">
                                    <button type="button" onclick="document.getElementById('modal-snm-{{ $app->id }}').classList.add('hidden')" class="px-5 py-2 bg-gray-200 hover:bg-gray-300 text-gray-800 text-sm font-bold rounded-lg transition">Funga</button>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5" class="px-6 py-10 text-center text-gray-500 dark:text-gray-400 bg-gray-50/50 dark:bg-gray-800/50">
                                <div class="flex flex-col items-center justify-center">
                                    <svg class="w-12 h-12 mb-3 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"/></svg>
                                    <p class="text-sm font-medium">Hakuna maombi yoyote yaliyopatikana kwa SNM Scholarship.</p>
                                </div>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>