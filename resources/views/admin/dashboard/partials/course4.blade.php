<div id="course4-tab" class="tab-content hidden">
    <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-xl font-bold text-[#070049] dark:text-white">Orodha ya Waombaji: Course 4 Prog.</h2>
            <span class="bg-green-500 text-white px-3 py-1 rounded-full text-sm font-bold">{{ $totalCourse4 ?? 0 }} Maombi</span>
        </div>
        <hr class="mb-4 dark:border-gray-700">
        <div class="overflow-x-auto rounded-lg border border-gray-200 dark:border-gray-700 shadow-sm">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 text-sm">
                <thead class="bg-gray-50 dark:bg-gray-900/50">
                    <tr>
                        <th class="px-6 py-4 text-left font-bold text-gray-500 uppercase">Jina Kamili</th>
                        <th class="px-6 py-4 text-left font-bold text-gray-500 uppercase">Simu</th>
                        <th class="px-6 py-4 text-left font-bold text-gray-500 uppercase">Shule (Matokeo)</th>
                        <th class="px-6 py-4 text-left font-bold text-gray-500 uppercase">Tarehe</th>
                        <th class="px-6 py-4 text-right font-bold text-gray-500 uppercase">Taarifa</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                    @if(isset($allCourse4) && $allCourse4->count() > 0)
                        @foreach($allCourse4 as $app)
                        <tr onclick="document.getElementById('modal-course4-{{ $app->id }}').classList.remove('hidden')" class="hover:bg-green-50 dark:hover:bg-green-900/20 transition-colors cursor-pointer clickable-row group">
                            <td class="px-6 py-4"><div class="font-bold text-[#070049] dark:text-white group-hover:text-green-600">{{ $app->student_name }}</div></td>
                            <td class="px-6 py-4 text-gray-700 dark:text-gray-300">{{ $app->phone_number }}</td>
                            <td class="px-6 py-4 text-gray-700 dark:text-gray-300">{{ $app->school }} ({{ $app->mock_results }})</td>
                            <td class="px-6 py-4 text-gray-500 text-xs">{{ $app->created_at?->format('d/m/Y') }}</td>
                            <td class="px-6 py-4 text-right"><span class="text-green-600 text-xs font-bold flex items-center justify-end gap-1 group-hover:underline">Fungua <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg></span></td>
                        </tr>
                        @endforeach
                    @else
                        <tr><td colspan="5" class="px-6 py-10 text-center text-gray-500">Hakuna maombi ya Course 4.</td></tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    {{-- Modals zote ziko NJE ya <table>/<tbody> ili HTML iwe sahihi --}}
    @if(isset($allCourse4) && $allCourse4->count() > 0)
        @foreach($allCourse4 as $app)
        <div id="modal-course4-{{ $app->id }}" class="fixed inset-0 z-50 hidden flex items-center justify-center overflow-y-auto bg-black/60 p-2 sm:p-4 md:p-6" onclick="if(event.target===this)this.classList.add('hidden')">
            <div class="flex max-h-[95vh] sm:max-h-[90vh] w-full max-w-4xl flex-col overflow-hidden rounded-lg sm:rounded-xl bg-white shadow-2xl dark:bg-gray-800">

                {{-- Header --}}
                <div class="flex items-center justify-between border-b bg-gray-50 px-4 sm:px-6 py-3 sm:py-4 dark:border-gray-700 dark:bg-gray-900">
                    <div class="min-w-0">
                        <h3 class="text-base sm:text-lg font-bold text-[#070049] dark:text-white truncate">Taarifa za Mwombaji: {{ $app->student_name }}</h3>
                        <p class="text-xs text-gray-500">Ameomba: {{ $app->created_at?->format('d/m/Y H:i') }}</p>
                    </div>
                    <button type="button" onclick="document.getElementById('modal-course4-{{ $app->id }}').classList.add('hidden')" class="shrink-0 ml-3 rounded-lg p-2 text-gray-500 hover:bg-red-50 hover:text-red-600" aria-label="Funga">✕</button>
                </div>

                {{-- Body: imepangiliwa kwa makundi 1-4 kama fomu ya maombi --}}
                <div class="overflow-y-auto p-4 sm:p-6 space-y-4">

                    {{-- 1. Taarifa Binafsi za Mwanafunzi --}}
                    <div class="rounded-lg border border-gray-200 dark:border-gray-700 overflow-hidden">
                        <div class="flex items-center gap-2 bg-[#070049]/5 dark:bg-gray-900/60 px-4 py-2 border-b border-gray-200 dark:border-gray-700">
                            <span class="flex items-center justify-center w-5 h-5 shrink-0 rounded-full bg-[#070049] text-white text-[10px] font-bold">1</span>
                            <h4 class="text-sm font-bold text-[#070049] dark:text-green-400">Taarifa Binafsi za Mwanafunzi</h4>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 p-4 text-sm text-gray-700 dark:text-gray-300">
                            <p><strong>Jina Kamili:</strong><br>{{ $app->student_name ?: 'Haijatolewa' }}</p>
                            <p><strong>Simu:</strong><br>{{ $app->phone_number ?: 'Haijatolewa' }}</p>
                            <p><strong>Barua pepe:</strong><br>{{ $app->email ?: 'Haijatolewa' }}</p>
                            <p><strong>Tarehe ya kuzaliwa:</strong><br>{{ $app->dob ? \Carbon\Carbon::parse($app->dob)->format('d/m/Y') : 'Haijatolewa' }}</p>
                            <p><strong>Dini:</strong><br>{{ $app->religion ?: 'Haijatolewa' }}</p>
                            <p><strong>Anwani (Current):</strong><br>{{ $app->current_address ?: 'Haijatolewa' }}</p>
                            <p><strong>Makazi:</strong><br>{{ $app->place_of_residence ?: 'Haijatolewa' }}</p>
                        </div>
                    </div>

                    {{-- 2. Taarifa za Mzazi/Mlezi --}}
                    <div class="rounded-lg border border-gray-200 dark:border-gray-700 overflow-hidden">
                        <div class="flex items-center gap-2 bg-[#070049]/5 dark:bg-gray-900/60 px-4 py-2 border-b border-gray-200 dark:border-gray-700">
                            <span class="flex items-center justify-center w-5 h-5 shrink-0 rounded-full bg-[#070049] text-white text-[10px] font-bold">2</span>
                            <h4 class="text-sm font-bold text-[#070049] dark:text-green-400">Taarifa za Mzazi/Mlezi</h4>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 p-4 text-sm text-gray-700 dark:text-gray-300">
                            <p><strong>Jina la Mzazi/Mlezi:</strong><br>{{ $app->parent_name ?: 'Haijatolewa' }}</p>
                            <p><strong>Simu ya Mzazi:</strong><br>{{ $app->parent_phone ?: 'Haijatolewa' }}</p>
                            <p><strong>Kazi/Sehemu ya Kazi:</strong><br>{{ $app->parent_occupation ?: 'Haijatolewa' }}</p>
                            <p><strong>Anwani ya Mzazi:</strong><br>{{ $app->parent_address ?: 'Haijatolewa' }}</p>
                            <p><strong>Barua pepe ya Mzazi:</strong><br>{{ $app->parent_email ?: 'Haijatolewa' }}</p>
                        </div>
                    </div>

                    {{-- 3. Taarifa za Kitaaluma --}}
                    <div class="rounded-lg border border-gray-200 dark:border-gray-700 overflow-hidden">
                        <div class="flex items-center gap-2 bg-[#070049]/5 dark:bg-gray-900/60 px-4 py-2 border-b border-gray-200 dark:border-gray-700">
                            <span class="flex items-center justify-center w-5 h-5 shrink-0 rounded-full bg-[#070049] text-white text-[10px] font-bold">3</span>
                            <h4 class="text-sm font-bold text-[#070049] dark:text-green-400">Taarifa za Kitaaluma</h4>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 p-4 text-sm text-gray-700 dark:text-gray-300">
                            <p><strong>Matokeo (Div):</strong><br>{{ $app->mock_results ?: 'Haijatolewa' }}</p>
                            <p><strong>Shule:</strong><br>{{ $app->school ?: 'Haijatolewa' }}</p>
                            <p><strong>Mwaka wa Form 4:</strong><br>{{ $app->form_4_year ?: 'Haijatolewa' }}</p>
                        </div>
                    </div>

                    {{-- 4. Kuhusu TFL Course --}}
                    <div class="rounded-lg border border-gray-200 dark:border-gray-700 overflow-hidden">
                        <div class="flex items-center gap-2 bg-[#070049]/5 dark:bg-gray-900/60 px-4 py-2 border-b border-gray-200 dark:border-gray-700">
                            <span class="flex items-center justify-center w-5 h-5 shrink-0 rounded-full bg-[#070049] text-white text-[10px] font-bold">4</span>
                            <h4 class="text-sm font-bold text-[#070049] dark:text-green-400">Kuhusu TFL Course</h4>
                        </div>
                        <div class="p-4 text-sm text-gray-700 dark:text-gray-300">
                            <p><strong>Insha ya ujuzi wa maisha:</strong><br>{{ $app->life_skills_essay ?: 'Haijatolewa' }}</p>
                        </div>
                    </div>

                </div>

                {{-- Footer --}}
                <div class="border-t bg-gray-50 px-4 sm:px-6 py-3 sm:py-4 text-right dark:border-gray-700 dark:bg-gray-900">
                    <button type="button" onclick="document.getElementById('modal-course4-{{ $app->id }}').classList.add('hidden')" class="w-full sm:w-auto rounded-lg bg-gray-200 px-5 py-2 font-bold text-gray-800 hover:bg-gray-300">Funga</button>
                </div>
            </div>
        </div>
        @endforeach
    @endif
</div>