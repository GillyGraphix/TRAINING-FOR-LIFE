{{-- =====================================================================
     Fomu ya Maombi ya Programu ya Kijana Fursa — TFL
     ===================================================================== --}}
@php
    $labelCls = 'block text-sm font-semibold text-gray-800';
    $inputBase = 'mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 text-sm shadow-sm placeholder:text-gray-400 focus:border-blue-600 focus:ring-1 focus:ring-blue-600 focus:outline-none transition-colors';
    $field = fn ($name) => $inputBase . ' ' . ($errors->has($name) ? 'border-red-500 focus:border-red-500 focus:ring-red-500' : '');

    $req = '<span class="text-red-600" aria-hidden="true">*</span>';
    $opt = '<span class="font-normal text-gray-500">(si lazima)</span>';

    $showForm4Results = in_array($education_level ?? '', [
        'Nimemaliza Kidato cha 4',
        'Sekondari 5-6 (Sijamaliza)',
        'Nimemaliza Kidato cha 6',
        'Nyingine',
    ], true);

    $bizAnswered = !is_null($has_business ?? null) && $has_business !== '';
    $bizYes      = $bizAnswered && (string) $has_business === '1';
    $bizNo       = $bizAnswered && (string) $has_business === '0';

    $prevTrainAnswered = !is_null($previous_training ?? null) && $previous_training !== '';
    $prevTrainYes = $prevTrainAnswered && (string) $previous_training === '1';

    $assetsAnswered = !is_null($has_startup_assets ?? null) && $has_startup_assets !== '';
    $assetsYes = $assetsAnswered && (string) $has_startup_assets === '1';
@endphp

<div class="mx-auto mt-4 max-w-5xl px-4 pb-12 sm:mt-8">
    @if($isSubmitted)
        <div class="mx-auto max-w-2xl rounded-xl border border-green-300 bg-green-50 p-6 shadow-sm" role="status">
            <div class="flex items-start gap-4">
                <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-green-600 text-white">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                    </svg>
                </span>

                <div>
                    <h2 class="text-xl font-bold text-green-900">Hongera!</h2>
                    <p class="mt-1 text-green-800">Maombi yako ya Kijana Fursa yamepokelewa kikamilifu.</p>
                    <p class="mt-2 text-sm text-green-700">Tafadhali weka simu yako hewani ili tuweze kuwasiliana nawe.</p>
                </div>
            </div>

            <a href="{{ url('/') }}"
               class="mt-5 inline-flex items-center gap-2 rounded-lg bg-blue-700 px-5 py-3 text-sm font-bold text-white shadow-sm transition hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Rudi kwenye website
            </a>
        </div>
    @else
        <div class="overflow-hidden rounded-xl bg-white shadow-lg ring-1 ring-gray-200">
            <header class="border-b border-gray-100 bg-gray-50/50 px-6 py-5 sm:px-8">
                <p class="text-xs font-semibold uppercase tracking-wider text-blue-700">Training for Life (TFL)</p>
                <h2 class="mt-1 text-2xl font-bold text-gray-900">Fomu ya Maombi: Kijana Fursa</h2>
                <p class="mt-1 text-sm text-gray-500">
                    Sehemu zenye alama <span class="font-bold text-red-600">*</span> ni za lazima.
                </p>
            </header>

            <form wire:submit="submit" class="divide-y divide-gray-100" novalidate>
                {{-- 1. Taarifa Binafsi --}}
                <section class="px-6 py-5 sm:px-8">
                    <h3 class="mb-4 text-base font-bold text-blue-800">1. Taarifa Binafsi</h3>

                    <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
                        <div class="md:col-span-2">
                            <label for="full_name" class="{{ $labelCls }}">Jina Kamili {!! $req !!}</label>
                            <input id="full_name" type="text" wire:model="full_name" placeholder="Jina la kwanza, la kati na la ukoo" class="{{ $field('full_name') }}">
                            @error('full_name') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label for="phone_number" class="{{ $labelCls }}">Namba ya Simu {!! $req !!}</label>
                            <input id="phone_number" type="tel" wire:model="phone_number" placeholder="mfano: 0712 345 678" class="{{ $field('phone_number') }}">
                            @error('phone_number') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label for="dob" class="{{ $labelCls }}">Tarehe ya Kuzaliwa {!! $req !!}</label>
                            <input id="dob" type="date" wire:model="dob" max="{{ now()->toDateString() }}" class="{{ $field('dob') }}">
                            @error('dob') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <fieldset>
                            <legend class="{{ $labelCls }}">Jinsia {!! $req !!}</legend>
                            <div class="mt-2 flex items-center gap-4">
                                <label class="inline-flex cursor-pointer items-center gap-2">
                                    <input type="radio" wire:model="gender" name="gender" value="Mwanaume" class="h-4 w-4 border-gray-300 text-blue-600 focus:ring-blue-500">
                                    <span class="text-sm font-medium text-gray-700">Mwanaume</span>
                                </label>
                                <label class="inline-flex cursor-pointer items-center gap-2">
                                    <input type="radio" wire:model="gender" name="gender" value="Mwanamke" class="h-4 w-4 border-gray-300 text-blue-600 focus:ring-blue-500">
                                    <span class="text-sm font-medium text-gray-700">Mwanamke</span>
                                </label>
                            </div>
                            @error('gender') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                        </fieldset>

                        <div>
                            <label for="id_number" class="{{ $labelCls }}">Namba ya Kitambulisho {!! $opt !!}</label>
                            <input id="id_number" type="text" wire:model="id_number" placeholder="NIDA au Cheti cha Kuzaliwa" class="{{ $field('id_number') }}">
                            @error('id_number') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div class="md:col-span-3">
                            <label for="address" class="{{ $labelCls }}">Anwani (Kata, Wilaya, Mkoa) {!! $req !!}</label>
                            <input id="address" type="text" wire:model="address" placeholder="mfano: Majengo, Moshi Mjini, Kilimanjaro" class="{{ $field('address') }}">
                            @error('address') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                        </div>
                    </div>
                </section>

                {{-- 2. Hali ya Elimu --}}
                <section class="bg-gray-50/30 px-6 py-5 sm:px-8">
                    <h3 class="mb-4 text-base font-bold text-blue-800">2. Hali ya Elimu</h3>

                    <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                        <div>
                            <label for="education_level" class="{{ $labelCls }}">Kiwango cha juu cha elimu {!! $req !!}</label>
                            <select id="education_level" wire:model.live="education_level" class="{{ $field('education_level') }}">
                                <option value="">Chagua...</option>
                                <option value="Sijamaliza shule ya msingi">Sijamaliza shule ya msingi</option>
                                <option value="Nimemaliza shule ya msingi">Nimemaliza shule ya msingi</option>
                                <option value="Sekondari (Sijamaliza)">Sekondari — Kidato cha 1-4 (sijamaliza)</option>
                                <option value="Nimemaliza Kidato cha 4">Nimemaliza Kidato cha 4</option>
                                <option value="Sekondari 5-6 (Sijamaliza)">Sekondari — Kidato cha 5-6 (sijamaliza)</option>
                                <option value="Nimemaliza Kidato cha 6">Nimemaliza Kidato cha 6</option>
                                <option value="Nyingine">Nyingine</option>
                            </select>
                            @error('education_level') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                        </div>

                        @if($showForm4Results)
                            <div>
                                <label for="form4_results" class="{{ $labelCls }}">Matokeo ya Kidato cha 4 {!! $opt !!}</label>
                                <input id="form4_results" type="text" wire:model="form4_results" placeholder="mfano: Daraja la II" class="{{ $field('form4_results') }}">
                                @error('form4_results') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                            </div>
                        @endif
                    </div>
                </section>

                {{-- 3. Biashara na Ujuzi --}}
                <section class="px-6 py-5 sm:px-8">
                    <h3 class="mb-4 text-base font-bold text-blue-800">3. Biashara na Ujuzi</h3>

                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                        <div class="space-y-4">
                            <fieldset>
                                <legend class="{{ $labelCls }}">Je, kwa sasa unafanya biashara? {!! $req !!}</legend>
                                <div class="mt-2 flex items-center gap-4">
                                    <label class="inline-flex cursor-pointer items-center gap-2">
                                        <input type="radio" wire:model.live="has_business" name="has_business" value="1" class="h-4 w-4 border-gray-300 text-blue-600 focus:ring-blue-500">
                                        <span class="text-sm font-medium text-gray-700">Ndiyo</span>
                                    </label>
                                    <label class="inline-flex cursor-pointer items-center gap-2">
                                        <input type="radio" wire:model.live="has_business" name="has_business" value="0" class="h-4 w-4 border-gray-300 text-blue-600 focus:ring-blue-500">
                                        <span class="text-sm font-medium text-gray-700">Hapana</span>
                                    </label>
                                </div>
                                @error('has_business') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                            </fieldset>

                            @if($bizYes)
                                <div class="space-y-3 rounded-lg border-l-4 border-blue-500 bg-blue-50/50 p-3">
                                    <div>
                                        <label for="business_type" class="{{ $labelCls }}">Ni biashara gani? {!! $req !!}</label>
                                        <input id="business_type" type="text" wire:model="business_type" class="{{ $field('business_type') }}">
                                        @error('business_type') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                                    </div>

                                    <div class="grid grid-cols-2 gap-3">
                                        <div>
                                            <label for="business_duration" class="{{ $labelCls }}">Muda {!! $req !!}</label>
                                            <input id="business_duration" type="text" wire:model="business_duration" placeholder="Mf: miezi 6" class="{{ $field('business_duration') }}">
                                            @error('business_duration') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                                        </div>

                                        <div>
                                            <label for="monthly_income" class="{{ $labelCls }}">Mapato {!! $opt !!}</label>
                                            <select id="monthly_income" wire:model="monthly_income" class="{{ $field('monthly_income') }}">
                                                <option value="">Wigo...</option>
                                                <option value="Chini ya 50,000">Chini ya 50,000 Tsh</option>
                                                <option value="50,000 - 100,000">50,000 - 100,000 Tsh</option>
                                                <option value="Zaidi ya 100,000">Zaidi ya 100,000 Tsh</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if($bizNo)
                                <div class="rounded-lg border-l-4 border-amber-500 bg-amber-50/60 p-3">
                                    <label for="business_idea" class="{{ $labelCls }}">Wazo la biashara unalotaka kuanzisha {!! $req !!}</label>
                                    <textarea id="business_idea" wire:model="business_idea" rows="3" class="{{ $field('business_idea') }}"></textarea>
                                    @error('business_idea') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                                </div>
                            @endif
                        </div>

                        <div>
                            <fieldset>
                                <legend class="{{ $labelCls }}">Sekta unayopenda zaidi {!! $req !!}</legend>
                                <div class="mt-2 grid grid-cols-1 gap-2 sm:grid-cols-2">
                                    <label class="flex cursor-pointer items-center gap-2 rounded border border-gray-200 bg-white p-2 hover:bg-gray-50">
                                        <input type="checkbox" wire:model="sectors" value="Kilimo" class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                                        <span class="text-xs font-medium text-gray-700">Kilimo</span>
                                    </label>
                                    <label class="flex cursor-pointer items-center gap-2 rounded border border-gray-200 bg-white p-2 hover:bg-gray-50">
                                        <input type="checkbox" wire:model="sectors" value="Biashara na Uuzaji" class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                                        <span class="text-xs font-medium text-gray-700">Biashara na Uuzaji</span>
                                    </label>
                                    <label class="flex cursor-pointer items-center gap-2 rounded border border-gray-200 bg-white p-2 hover:bg-gray-50">
                                        <input type="checkbox" wire:model="sectors" value="Ushonaji na Ufundi" class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                                        <span class="text-xs font-medium text-gray-700">Ushonaji na Ufundi</span>
                                    </label>
                                    <label class="flex cursor-pointer items-center gap-2 rounded border border-gray-200 bg-white p-2 hover:bg-gray-50">
                                        <input type="checkbox" wire:model="sectors" value="Usindikaji wa Chakula" class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                                        <span class="text-xs font-medium text-gray-700">Usindikaji wa Chakula</span>
                                    </label>
                                    <label class="flex cursor-pointer items-center gap-2 rounded border border-gray-200 bg-white p-2 hover:bg-gray-50">
                                        <input type="checkbox" wire:model="sectors" value="Huduma" class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                                        <span class="text-xs font-medium text-gray-700">Huduma</span>
                                    </label>
                                    <label class="flex cursor-pointer items-center gap-2 rounded border border-gray-200 bg-white p-2 hover:bg-gray-50">
                                        <input type="checkbox" wire:model="sectors" value="Nyingine" class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                                        <span class="text-xs font-medium text-gray-700">Nyingine</span>
                                    </label>
                                </div>
                                @error('sectors') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                            </fieldset>
                        </div>
                    </div>

                    <div class="mt-6 grid grid-cols-1 gap-6 md:grid-cols-2">
                        {{-- Mafunzo Awali --}}
                        <div class="space-y-3 rounded-lg border border-gray-100 bg-white p-4 shadow-sm">
                            <fieldset>
                                <legend class="{{ $labelCls }}">Umeshapata mafunzo ya biashara hapo awali? {!! $req !!}</legend>
                                <div class="mt-2 flex items-center gap-4">
                                    <label class="inline-flex cursor-pointer items-center gap-2">
                                        <input type="radio" wire:model.live="previous_training" name="previous_training" value="1" class="h-4 w-4 border-gray-300 text-blue-600 focus:ring-blue-500">
                                        <span class="text-sm font-medium text-gray-700">Ndiyo</span>
                                    </label>
                                    <label class="inline-flex cursor-pointer items-center gap-2">
                                        <input type="radio" wire:model.live="previous_training" name="previous_training" value="0" class="h-4 w-4 border-gray-300 text-blue-600 focus:ring-blue-500">
                                        <span class="text-sm font-medium text-gray-700">Hapana</span>
                                    </label>
                                </div>
                                @error('previous_training') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                            </fieldset>

                            @if($prevTrainYes)
                                <div>
                                    <label for="previous_training_details" class="{{ $labelCls }} text-blue-800">Eleza kwa ufupi (mafunzo gani, lini)</label>
                                    <input id="previous_training_details" type="text" wire:model="previous_training_details" class="{{ $field('previous_training_details') }}">
                                    @error('previous_training_details') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                                </div>
                            @endif
                        </div>

                        {{-- Mtaji/Vifaa --}}
                        <div class="space-y-3 rounded-lg border border-gray-100 bg-white p-4 shadow-sm">
                            <fieldset>
                                <legend class="{{ $labelCls }}">Una mtaji, ardhi, au vifaa vya kuanzia? {!! $req !!}</legend>
                                <div class="mt-2 flex items-center gap-4">
                                    <label class="inline-flex cursor-pointer items-center gap-2">
                                        <input type="radio" wire:model.live="has_startup_assets" name="has_startup_assets" value="1" class="h-4 w-4 border-gray-300 text-blue-600 focus:ring-blue-500">
                                        <span class="text-sm font-medium text-gray-700">Ndiyo</span>
                                    </label>
                                    <label class="inline-flex cursor-pointer items-center gap-2">
                                        <input type="radio" wire:model.live="has_startup_assets" name="has_startup_assets" value="0" class="h-4 w-4 border-gray-300 text-blue-600 focus:ring-blue-500">
                                        <span class="text-sm font-medium text-gray-700">Hapana</span>
                                    </label>
                                </div>
                                @error('has_startup_assets') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                            </fieldset>

                            @if($assetsYes)
                                <div>
                                    <label for="startup_assets_details" class="{{ $labelCls }} text-blue-800">Eleza kwa ufupi (mtaji kiasi gani au vifaa gani)</label>
                                    <input id="startup_assets_details" type="text" wire:model="startup_assets_details" class="{{ $field('startup_assets_details') }}">
                                    @error('startup_assets_details') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                                </div>
                            @endif
                        </div>
                    </div>
                </section>

                {{-- 4. Sababu za Kuomba --}}
                <section class="bg-gray-50/30 px-6 py-5 sm:px-8">
                    <h3 class="mb-4 text-base font-bold text-blue-800">4. Sababu za Kuomba</h3>

                    <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                        <div>
                            <label for="motivation_reason" class="{{ $labelCls }}">Kwa nini unataka kujiunga na programu hii? {!! $req !!}</label>
                            <textarea id="motivation_reason" wire:model="motivation_reason" rows="3" class="{{ $field('motivation_reason') }}"></textarea>
                            @error('motivation_reason') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label for="future_expectations" class="{{ $labelCls }}">Unatarajia kufikia nini baada ya mwaka mmoja? {!! $req !!}</label>
                            <textarea id="future_expectations" wire:model="future_expectations" rows="3" class="{{ $field('future_expectations') }}"></textarea>
                            @error('future_expectations') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                        </div>
                    </div>
                </section>

                {{-- 5. Nyaraka Muhimu --}}
                <section class="px-6 py-5 sm:px-8">
                    <h3 class="mb-4 text-base font-bold text-blue-800">5. Nyaraka Muhimu</h3>

                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
                        {{-- Picha ya pasipoti --}}
                        <div x-data="{ uploading: false, progress: 0 }"
                             x-on:livewire-upload-start="uploading = true; progress = 0"
                             x-on:livewire-upload-finish="uploading = false"
                             x-on:livewire-upload-cancel="uploading = false"
                             x-on:livewire-upload-error="uploading = false"
                             x-on:livewire-upload-progress="progress = $event.detail.progress">

                            <label class="{{ $labelCls }} truncate">Picha ya pasipoti {!! $req !!}</label>

                            @if($passport_photo_path)
                                <div class="mt-1 flex items-center gap-3 rounded-lg border border-green-300 bg-green-50 p-2">
                                    <div class="min-w-0 flex-1">
                                        <p class="truncate text-xs font-semibold text-gray-900">Faili lipo</p>
                                    </div>
                                    <button type="button" wire:click="$set('passport_photo_path', null)" class="text-xs font-bold text-red-600 hover:underline">Ondoa</button>
                                </div>
                            @else
                                <input id="passport_photo_path" type="file" wire:model="passport_photo_path" accept="image/jpeg,image/png" class="mt-1 block w-full text-sm">
                                <div wire:loading wire:target="passport_photo_path" class="mt-1 text-xs text-blue-700">Inapakia faili...</div>
                                <div wire:loading.remove wire:target="passport_photo_path">
                                    @if($passport_photo_path)
                                        <p class="mt-1 text-xs font-semibold text-green-700">Faili limepokelewa: {{ $passport_photo_path->getClientOriginalName() }}</p>
                                    @endif
                                </div>
                                <div x-show="uploading" style="display: none;" class="mt-1" role="progressbar">
                                    <div class="h-1.5 overflow-hidden rounded-full bg-gray-200">
                                        <div class="h-full bg-blue-600 transition-all" :style="`width: ${progress}%`"></div>
                                    </div>
                                    <p class="mt-0.5 text-[10px] font-semibold text-blue-700" x-text="progress + '%'"></p>
                                </div>
                            @endif

                            @error('passport_photo_path') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                        </div>

                        {{-- Kitambulisho --}}
                        <div x-data="{ uploading: false, progress: 0 }"
                             x-on:livewire-upload-start="uploading = true; progress = 0"
                             x-on:livewire-upload-finish="uploading = false"
                             x-on:livewire-upload-cancel="uploading = false"
                             x-on:livewire-upload-error="uploading = false"
                             x-on:livewire-upload-progress="progress = $event.detail.progress">

                            <label class="{{ $labelCls }} truncate">Kitambulisho (NIDA/Cheti) {!! $req !!}</label>

                            @if($id_document_path)
                                <div class="mt-1 flex items-center gap-3 rounded-lg border border-green-300 bg-green-50 p-2">
                                    <div class="min-w-0 flex-1">
                                        <p class="truncate text-xs font-semibold text-gray-900">Faili lipo</p>
                                    </div>
                                    <button type="button" wire:click="$set('id_document_path', null)" class="text-xs font-bold text-red-600 hover:underline">Ondoa</button>
                                </div>
                            @else
                                <input id="id_document_path" type="file" wire:model="id_document_path" accept=".pdf,image/jpeg,image/png" class="mt-1 block w-full text-sm">
                                <div wire:loading wire:target="id_document_path" class="mt-1 text-xs text-blue-700">Inapakia faili...</div>
                                <div wire:loading.remove wire:target="id_document_path">
                                    @if($id_document_path)
                                        <p class="mt-1 text-xs font-semibold text-green-700">Faili limepokelewa: {{ $id_document_path->getClientOriginalName() }}</p>
                                    @endif
                                </div>
                                <div x-show="uploading" style="display: none;" class="mt-1" role="progressbar">
                                    <div class="h-1.5 overflow-hidden rounded-full bg-gray-200">
                                        <div class="h-full bg-blue-600 transition-all" :style="`width: ${progress}%`"></div>
                                    </div>
                                    <p class="mt-0.5 text-[10px] font-semibold text-blue-700" x-text="progress + '%'"></p>
                                </div>
                            @endif

                            @error('id_document_path') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                        </div>

                        {{-- Barua ya Utambulisho --}}
                        <div x-data="{ uploading: false, progress: 0 }"
                             x-on:livewire-upload-start="uploading = true; progress = 0"
                             x-on:livewire-upload-finish="uploading = false"
                             x-on:livewire-upload-cancel="uploading = false"
                             x-on:livewire-upload-error="uploading = false"
                             x-on:livewire-upload-progress="progress = $event.detail.progress">

                            <label class="{{ $labelCls }} truncate">Barua ya Utambulisho {!! $opt !!}</label>

                            @if($introduction_letter_path)
                                <div class="mt-1 flex items-center gap-3 rounded-lg border border-green-300 bg-green-50 p-2">
                                    <div class="min-w-0 flex-1">
                                        <p class="truncate text-xs font-semibold text-gray-900">Faili lipo</p>
                                    </div>
                                    <button type="button" wire:click="$set('introduction_letter_path', null)" class="text-xs font-bold text-red-600 hover:underline">Ondoa</button>
                                </div>
                            @else
                                <input id="introduction_letter_path" type="file" wire:model="introduction_letter_path" accept=".pdf,image/jpeg,image/png" class="mt-1 block w-full text-sm">
                                <div wire:loading wire:target="introduction_letter_path" class="mt-1 text-xs text-blue-700">Inapakia faili...</div>
                                <div wire:loading.remove wire:target="introduction_letter_path">
                                    @if($introduction_letter_path)
                                        <p class="mt-1 text-xs font-semibold text-green-700">Faili limepokelewa: {{ $introduction_letter_path->getClientOriginalName() }}</p>
                                    @endif
                                </div>
                                <div x-show="uploading" style="display: none;" class="mt-1" role="progressbar">
                                    <div class="h-1.5 overflow-hidden rounded-full bg-gray-200">
                                        <div class="h-full bg-blue-600 transition-all" :style="`width: ${progress}%`"></div>
                                    </div>
                                    <p class="mt-0.5 text-[10px] font-semibold text-blue-700" x-text="progress + '%'"></p>
                                </div>
                            @endif

                            @error('introduction_letter_path') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                        </div>
                    </div>
                </section>

                {{-- 6. Tamko na kuwasilisha --}}
                <div class="bg-gray-50 px-6 py-5 sm:px-8">
                    @if($errors->any())
                        <div class="mb-4 rounded-lg border border-red-300 bg-red-50 p-3">
                            <p class="text-xs font-bold text-red-800">Kuna makosa, tafadhali yasahihishe:</p>
                        </div>
                    @endif

                    <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                        <label class="flex cursor-pointer items-start gap-3">
                            <input type="checkbox" wire:model="declaration_accepted" class="mt-0.5 h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-600">

                            <div>
                                <span class="text-sm font-semibold text-gray-800">Nathibitisha kuwa taarifa zote ni sahihi {!! $req !!}</span>
                                @error('declaration_accepted') <p class="text-xs text-red-600">{{ $message }}</p> @enderror
                            </div>
                        </label>

                        <div class="flex flex-col gap-3 sm:flex-row sm:items-center">
                            <span class="text-sm text-gray-500">Tarehe: {{ now()->format('d/m/Y') }}</span>

                            <a href="{{ url('/') }}"
                               class="order-last inline-flex items-center justify-center gap-2 rounded-lg border border-gray-300 bg-white px-5 py-2.5 text-sm font-bold text-gray-700 shadow-sm transition hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-1 sm:order-none">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                                </svg>
                                Rudi kwenye chaguo la fomu
                            </a>

                            <button type="submit"
                                    wire:loading.attr="disabled"
                                    wire:target="submit,passport_photo_path,id_document_path,introduction_letter_path"
                                    class="inline-flex items-center justify-center rounded-lg bg-blue-600 px-6 py-2.5 text-sm font-bold text-white shadow-sm transition hover:bg-blue-700 focus:ring-2 focus:ring-blue-600 focus:ring-offset-1 disabled:opacity-60">
                                <span wire:loading.remove wire:target="submit">Wasilisha Maombi</span>
                                <span wire:loading wire:target="submit">Subiri kidogo...</span>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    @endif
</div>