<div id="kijana-tab" class="tab-content hidden">
    @php
        // Variable salama ili kuzuia kosa la 'Malformed @foreach' endapo data haijafika
        $orodhaYaMaombi = isset($allKijanaFursa) ? $allKijanaFursa : [];
        $idadiYaMaombi = isset($totalApplications) ? $totalApplications : (is_countable($orodhaYaMaombi) ? count($orodhaYaMaombi) : 0);
    @endphp

    <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-xl font-bold text-[#070049] dark:text-white">Orodha ya Waombaji: Kijana Fursa Prog.</h2>
            <span class="bg-blue-600 text-white px-3 py-1 rounded-full text-sm font-bold">{{ $idadiYaMaombi }} Maombi</span>
        </div>
        <hr class="mb-4 dark:border-gray-700">
        <div class="overflow-x-auto rounded-lg border border-gray-200 dark:border-gray-700 shadow-sm">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 text-sm">
                <thead class="bg-gray-50 dark:bg-gray-900/50">
                    <tr>
                        <th class="px-6 py-4 text-left font-bold text-gray-500 uppercase">Jina Kamili</th>
                        <th class="px-6 py-4 text-left font-bold text-gray-500 uppercase">Simu</th>
                        <th class="px-6 py-4 text-left font-bold text-gray-500 uppercase">Kiwango cha Elimu</th>
                        <th class="px-6 py-4 text-left font-bold text-gray-500 uppercase">Tarehe</th>
                        <th class="px-6 py-4 text-right font-bold text-gray-500 uppercase">Taarifa</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                    @forelse ($orodhaYaMaombi as $app)
                        <tr onclick="document.getElementById('modal-kijana-{{ $app->id }}').classList.remove('hidden')" class="hover:bg-blue-50 dark:hover:bg-blue-900/20 transition-colors cursor-pointer clickable-row group">
                            <td class="px-6 py-4">
                                <div class="font-bold text-[#070049] dark:text-white group-hover:text-blue-700">{{ $app->full_name ?: 'Jina halijatolewa' }}</div>
                                <div class="text-xs text-gray-500 dark:text-gray-400">{{ $app->gender ?: 'Jinsia haijatolewa' }}</div>
                            </td>
                            <td class="px-6 py-4 text-gray-700 dark:text-gray-300">{{ $app->phone_number ?: 'Haijatolewa' }}</td>
                            <td class="px-6 py-4 text-gray-700 dark:text-gray-300">
                                {{ $app->education_level ?: 'Haijatolewa' }}
                                @if($app->form4_results)
                                    <div class="text-xs text-gray-500 dark:text-gray-400">Matokeo Form 4: {{ $app->form4_results }}</div>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-gray-500 text-xs">{{ $app->created_at ? \Carbon\Carbon::parse($app->created_at)->format('d/m/Y') : 'Haijulikani' }}</td>
                            <td class="px-6 py-4 text-right">
                                <span class="text-blue-700 text-xs font-bold flex items-center justify-end gap-1 group-hover:underline">
                                    Fungua
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="px-6 py-10 text-center text-gray-500">Bado hakuna maombi ya Kijana Fursa.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Modals zote ziko NJE ya <table>/<tbody> ili HTML iwe sahihi (kama Course 4) --}}
    @if(count($orodhaYaMaombi) > 0)
        @foreach ($orodhaYaMaombi as $app)
        <div id="modal-kijana-{{ $app->id }}" role="dialog" aria-modal="true" aria-labelledby="modal-kijana-title-{{ $app->id }}" class="fixed inset-0 z-50 hidden flex items-center justify-center overflow-y-auto bg-gray-950/60 p-3 sm:p-6" onclick="if(event.target===this)this.classList.add('hidden')">
            <section class="my-auto flex max-h-[92vh] w-full max-w-5xl flex-col overflow-hidden rounded-xl bg-white shadow-2xl dark:bg-gray-800">

                <!-- MODAL HEADER -->
                <header class="flex items-start justify-between gap-4 border-b border-gray-200 bg-gray-50 px-5 py-4 dark:border-gray-700 dark:bg-gray-900 sm:px-6">
                    <div class="min-w-0">
                        <p class="text-xs font-bold uppercase tracking-wider text-blue-700 dark:text-blue-300">Maombi ya Kijana Fursa</p>
                        <h3 id="modal-kijana-title-{{ $app->id }}" class="mt-1 break-words text-lg font-extrabold text-gray-900 dark:text-white sm:text-xl">{{ $app->full_name ?: 'Jina halijatolewa' }}</h3>
                        <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Namba ya ombi: #{{ $app->id }} @if($app->created_at) · Yamepokelewa {{ \Carbon\Carbon::parse($app->created_at)->format('d/m/Y H:i') }} @endif</p>
                    </div>
                    <button type="button" onclick="document.getElementById('modal-kijana-{{ $app->id }}').classList.add('hidden')" aria-label="Funga taarifa" class="shrink-0 rounded-lg p-2 text-gray-500 hover:bg-red-50 hover:text-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 dark:hover:bg-red-900/30">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </header>

                <!-- MODAL BODY -->
                <div class="space-y-8 overflow-y-auto p-5 text-sm text-gray-700 dark:text-gray-300 sm:p-6" id="printable-area-{{ $app->id }}">

                    <!-- SEHEMU YA 1: TAARIFA BINAFSI -->
                    <section>
                        <h4 class="mb-4 border-b border-gray-200 pb-2 text-sm font-bold uppercase tracking-wider text-blue-800 dark:border-gray-700 dark:text-blue-300">1. Taarifa Binafsi</h4>
                        <dl class="grid grid-cols-1 gap-x-6 gap-y-4 sm:grid-cols-2 lg:grid-cols-3">
                            <div class="sm:col-span-2">
                                <dt class="text-xs font-semibold uppercase text-gray-500 dark:text-gray-400">Jina Kamili</dt>
                                <dd class="mt-1 break-words font-bold text-lg text-gray-900 dark:text-white">{{ $app->full_name ?: 'Haijatolewa' }}</dd>
                            </div>
                            <div>
                                <dt class="text-xs font-semibold uppercase text-gray-500 dark:text-gray-400">Jinsia</dt>
                                <dd class="mt-1 font-bold text-gray-900 dark:text-white">{{ $app->gender ?: 'Haijatolewa' }}</dd>
                            </div>
                            <div>
                                <dt class="text-xs font-semibold uppercase text-gray-500 dark:text-gray-400">Namba ya Simu</dt>
                                <dd class="mt-1 break-words">{{ $app->phone_number ?: 'Haijatolewa' }}</dd>
                            </div>
                            <div>
                                <dt class="text-xs font-semibold uppercase text-gray-500 dark:text-gray-400">Tarehe ya Kuzaliwa</dt>
                                <dd class="mt-1">{{ $app->dob ? \Carbon\Carbon::parse($app->dob)->format('d/m/Y') : 'Haijatolewa' }}</dd>
                            </div>
                            <div>
                                <dt class="text-xs font-semibold uppercase text-gray-500 dark:text-gray-400">Namba ya Kitambulisho</dt>
                                <dd class="mt-1 break-words">{{ $app->id_number ?: 'Haijatolewa' }}</dd>
                            </div>
                            <div class="sm:col-span-3">
                                <dt class="text-xs font-semibold uppercase text-gray-500 dark:text-gray-400">Anwani (Kata, Wilaya, Mkoa)</dt>
                                <dd class="mt-1 break-words">{{ $app->address ?: 'Haijatolewa' }}</dd>
                            </div>
                        </dl>
                    </section>

                    <!-- SEHEMU YA 2: HALI YA ELIMU -->
                    <section>
                        <h4 class="mb-4 border-b border-gray-200 pb-2 text-sm font-bold uppercase tracking-wider text-blue-800 dark:border-gray-700 dark:text-blue-300">2. Hali ya Elimu</h4>
                        <dl class="grid grid-cols-1 gap-x-6 gap-y-4 sm:grid-cols-2">
                            <div>
                                <dt class="text-xs font-semibold uppercase text-gray-500 dark:text-gray-400">Kiwango cha Juu cha Elimu</dt>
                                <dd class="mt-1 break-words font-semibold">{{ $app->education_level ?: 'Haijatolewa' }}</dd>
                            </div>
                            @if($app->form4_results)
                            <div>
                                <dt class="text-xs font-semibold uppercase text-gray-500 dark:text-gray-400">Matokeo ya Form 4</dt>
                                <dd class="mt-1 break-words">{{ $app->form4_results }}</dd>
                            </div>
                            @endif
                        </dl>
                    </section>

                    <!-- SEHEMU YA 3: BIASHARA NA UJUZI -->
                    <section>
                        <h4 class="mb-4 border-b border-gray-200 pb-2 text-sm font-bold uppercase tracking-wider text-blue-800 dark:border-gray-700 dark:text-blue-300">3. Biashara na Ujuzi</h4>
                        <div class="mb-6 grid grid-cols-1 gap-x-6 gap-y-4 sm:grid-cols-2 lg:grid-cols-3">
                            <div>
                                <dt class="text-xs font-semibold uppercase text-gray-500 dark:text-gray-400">Anafanya biashara kwa sasa?</dt>
                                <dd class="mt-1 font-bold text-gray-900 dark:text-white">{{ is_null($app->has_business) ? 'Haijajibiwa' : ($app->has_business ? 'Ndiyo' : 'Hapana') }}</dd>
                            </div>
                            @if($app->has_business)
                                <div>
                                    <dt class="text-xs font-semibold uppercase text-gray-500 dark:text-gray-400">Aina ya biashara</dt>
                                    <dd class="mt-1 break-words">{{ $app->business_type ?: 'Haijatolewa' }}</dd>
                                </div>
                                <div>
                                    <dt class="text-xs font-semibold uppercase text-gray-500 dark:text-gray-400">Muda wa biashara</dt>
                                    <dd class="mt-1 break-words">{{ $app->business_duration ?: 'Haijatolewa' }}</dd>
                                </div>
                                <div>
                                    <dt class="text-xs font-semibold uppercase text-gray-500 dark:text-gray-400">Mapato ya mwezi</dt>
                                    <dd class="mt-1 break-words">{{ $app->monthly_income ?: 'Haijatolewa' }}</dd>
                                </div>
                            @endif
                        </div>

                        <dl class="space-y-6">
                            @php
                                $kijanaSectors = $app->sectors;
                                if (is_string($kijanaSectors)) {
                                    $decodedSectors = json_decode($kijanaSectors, true);
                                    if (json_last_error() === JSON_ERROR_NONE && is_array($decodedSectors)) {
                                        $kijanaSectors = $decodedSectors;
                                    }
                                }
                            @endphp
                            <div>
                                <dt class="text-xs font-semibold uppercase text-gray-500 dark:text-gray-400">Sekta anayopenda zaidi</dt>
                                <dd class="mt-1 break-words font-medium">@if(is_array($kijanaSectors)){{ count($kijanaSectors) ? implode(', ', $kijanaSectors) : 'Haijatolewa' }}@else{{ $kijanaSectors ?: 'Haijatolewa' }}@endif</dd>
                            </div>

                            <div class="rounded-lg bg-gray-50 p-4 dark:bg-gray-900/50">
                                <div class="mb-2">
                                    <span class="text-xs font-semibold uppercase text-gray-500 dark:text-gray-400">Amewahi kupata mafunzo ya biashara?</span>
                                    <span class="ml-2 font-bold">{{ is_null($app->previous_training) ? 'Haijajibiwa' : ($app->previous_training ? 'Ndiyo' : 'Hapana') }}</span>
                                </div>
                                @if($app->previous_training && $app->previous_training_details)
                                    <p class="mt-2 text-sm whitespace-pre-line break-words border-l-2 border-gray-300 pl-3 italic text-gray-600 dark:border-gray-600 dark:text-gray-400">{{ $app->previous_training_details }}</p>
                                @endif
                            </div>

                            <div class="rounded-lg bg-gray-50 p-4 dark:bg-gray-900/50">
                                <div class="mb-2">
                                    <span class="text-xs font-semibold uppercase text-gray-500 dark:text-gray-400">Ana mtaji, ardhi au vifaa vya kuanzia?</span>
                                    <span class="ml-2 font-bold">{{ is_null($app->has_startup_assets) ? 'Haijajibiwa' : ($app->has_startup_assets ? 'Ndiyo' : 'Hapana') }}</span>
                                </div>
                                @if($app->has_startup_assets && $app->startup_assets_details)
                                    <p class="mt-2 text-sm whitespace-pre-line break-words border-l-2 border-gray-300 pl-3 italic text-gray-600 dark:border-gray-600 dark:text-gray-400">{{ $app->startup_assets_details }}</p>
                                @endif
                            </div>
                        </dl>
                    </section>

                    <!-- SEHEMU YA 4: SABABU ZA KUOMBA -->
                    <section>
                        <h4 class="mb-4 border-b border-gray-200 pb-2 text-sm font-bold uppercase tracking-wider text-blue-800 dark:border-gray-700 dark:text-blue-300">4. Sababu za Kuomba</h4>
                        <dl class="grid grid-cols-1 gap-6 md:grid-cols-2">
                            <div>
                                <dt class="text-xs font-semibold uppercase text-gray-500 dark:text-gray-400">Kwa nini anataka kujiunga na programu hii?</dt>
                                <dd class="mt-2 whitespace-pre-line break-words rounded-lg border border-gray-100 bg-gray-50 p-4 text-gray-700 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300">
                                    {{ $app->motivation_reason ?: 'Haijatolewa' }}
                                </dd>
                            </div>
                            <div>
                                <dt class="text-xs font-semibold uppercase text-gray-500 dark:text-gray-400">Matarajio ya kufikia nini baada ya mwaka mmoja?</dt>
                                <dd class="mt-2 whitespace-pre-line break-words rounded-lg border border-gray-100 bg-gray-50 p-4 text-gray-700 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300">
                                    {{ $app->future_expectations ?: 'Haijatolewa' }}
                                </dd>
                            </div>
                        </dl>
                    </section>

                    <!-- SEHEMU YA 5: NYARAKA -->
                    <section class="no-print">
                        <h4 class="mb-4 border-b border-gray-200 pb-2 text-sm font-bold uppercase tracking-wider text-blue-800 dark:border-gray-700 dark:text-blue-300">5. Nyaraka Muhimu Zilizopakiwa</h4>
                        <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
                            @php
                                $kijanaDocuments = [
                                    ['label' => 'Picha ya pasipoti', 'field' => 'passport_photo_path'],
                                    ['label' => 'Kitambulisho (NIDA/Cheti)', 'field' => 'id_document_path'],
                                    ['label' => 'Barua ya utambulisho', 'field' => 'introduction_letter_path'],
                                ];
                                $hasKijanaDocument = false;
                            @endphp

                            @foreach ($kijanaDocuments as $document)
                                @php($documentPath = data_get($app, $document['field']))
                                @if($documentPath)
                                    @php($hasKijanaDocument = true)
                                    <div class="flex flex-col gap-3 rounded-lg border border-gray-200 bg-gray-50 p-4 dark:border-gray-700 dark:bg-gray-900/50">
                                        <span class="font-semibold text-gray-900 dark:text-white">{{ $document['label'] }}</span>
                                        <div class="flex gap-2">
                                            <a href="{{ \Illuminate\Support\Facades\Storage::url($documentPath) }}" target="_blank" rel="noopener noreferrer" class="flex-1 rounded-md bg-blue-100 px-3 py-2 text-center text-xs font-bold text-blue-800 hover:bg-blue-200 dark:bg-blue-900/40 dark:text-blue-300 dark:hover:bg-blue-900/60">Tazama</a>
                                            <a href="{{ \Illuminate\Support\Facades\Storage::url($documentPath) }}" download class="flex-1 rounded-md bg-gray-200 px-3 py-2 text-center text-xs font-bold text-gray-800 hover:bg-gray-300 dark:bg-gray-700 dark:text-gray-200 dark:hover:bg-gray-600">Pakua</a>
                                        </div>
                                    </div>
                                @endif
                            @endforeach

                            @unless($hasKijanaDocument)
                                <p class="col-span-full text-gray-500 dark:text-gray-400">Hakuna nyaraka zilizopakiwa.</p>
                            @endunless
                        </div>
                    </section>

                    <!-- TAMKO -->
                    <section class="mt-6 rounded-lg bg-blue-50 p-4 dark:bg-blue-900/20">
                        <div class="flex items-start gap-3">
                            <div class="mt-0.5 shrink-0 text-blue-600 dark:text-blue-400">
                                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                            </div>
                            <div>
                                <p class="font-semibold text-blue-900 dark:text-blue-200">
                                    {{ is_null($app->declaration_accepted) ? 'Hali ya tamko haijarekodiwa.' : ($app->declaration_accepted ? 'Mwombaji amethibitisha kuwa taarifa zote ni sahihi.' : 'Mwombaji hajakubali tamko.') }}
                                </p>
                                @if($app->created_at)
                                    <p class="mt-1 text-xs text-blue-700 dark:text-blue-300">Tarehe ya kuthibitisha: {{ \Carbon\Carbon::parse($app->created_at)->format('d/m/Y') }}</p>
                                @endif
                            </div>
                        </div>
                    </section>
                </div>

                <!-- MODAL FOOTER -->
                <footer class="flex items-center justify-between border-t border-gray-200 bg-gray-50 px-5 py-4 dark:border-gray-700 dark:bg-gray-900 sm:px-6">
                    <button type="button" onclick="document.getElementById('modal-kijana-{{ $app->id }}').classList.add('hidden')" class="rounded-lg bg-gray-200 px-5 py-2.5 text-sm font-bold text-gray-800 hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-400 dark:bg-gray-700 dark:text-white dark:hover:bg-gray-600 transition-colors">
                        Funga
                    </button>
                </footer>
            </section>
        </div>
        @endforeach
    @endif
</div>

<!-- JavaScript kwa ajili ya kupakua PDF -->
<script>
    function downloadPDF(appId, appName) {
        const element = document.getElementById(`printable-area-${appId}`);
        const noPrintElements = element.querySelectorAll('.no-print');
        noPrintElements.forEach(el => el.style.display = 'none');

        const pdfContainer = document.createElement('div');
        pdfContainer.innerHTML = `
            <div style="padding: 20px; font-family: sans-serif;">
                <div style="text-align: center; margin-bottom: 20px; border-bottom: 2px solid #1d4ed8; padding-bottom: 10px;">
                    <h2 style="color: #1d4ed8; font-size: 24px; margin: 0;">TRAINING FOR LIFE (TFL)</h2>
                    <h3 style="font-size: 18px; margin: 10px 0;">Fomu ya Maombi: Kijana Fursa</h3>
                </div>
                ${element.innerHTML}
            </div>
        `;

        const opt = {
            margin:       10,
            filename:     `Maombi_Kijana_Fursa_${appName.replace(/\s+/g, '_')}.pdf`,
            image:        { type: 'jpeg', quality: 0.98 },
            html2canvas:  { scale: 2, useCORS: true },
            jsPDF:        { unit: 'mm', format: 'a4', orientation: 'portrait' }
        };

        html2pdf().set(opt).from(pdfContainer).save().then(() => {
            noPrintElements.forEach(el => el.style.display = '');
        });
    }
</script>