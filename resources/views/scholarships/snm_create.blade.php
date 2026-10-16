<x-app-layout>
    @php
        $labelCls = 'block text-sm font-semibold text-gray-800';
        $inputBase = 'mt-1 block w-full rounded-md border border-gray-300 bg-white px-3 py-2 text-sm text-gray-900 shadow-sm placeholder:text-gray-400 focus:border-[#f79120] focus:ring-1 focus:ring-[#f79120] focus:outline-none transition-colors';
        $field = fn ($name) => $inputBase . ' ' . ($errors->has($name) ? 'border-red-500 focus:border-red-500 focus:ring-red-500' : '');
        $req = '<span class="text-red-600" aria-hidden="true">*</span>';
        $opt = '<span class="font-normal text-gray-500">(si lazima)</span>';
    @endphp

    <div class="bg-[#070049] py-16 text-center">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl">
                Soma na Matumaini (SNM) Scholarship
            </h1>
            <p class="mt-4 max-w-2xl mx-auto text-xl text-gray-300">
                Fomu ya maombi ya ufadhili wa masomo kwa wanafunzi wa sekondari.
            </p>
        </div>
    </div>

    <div class="bg-gray-50 py-12">
        <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="mx-auto mb-6 max-w-2xl rounded-xl border border-green-300 bg-green-50 p-6 shadow-sm">
                    <div class="flex items-start gap-4">
                        <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-green-600 text-white">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                            </svg>
                        </span>
                        <div>
                            <h2 class="text-xl font-bold text-green-900">Hongera!</h2>
                            <p class="mt-1 text-green-800">{{ session('success') }}</p>
                        </div>
                    </div>

                    <a href="{{ url('/') }}"
                       class="mt-5 inline-flex items-center gap-2 rounded-lg bg-[#070049] px-5 py-3 text-sm font-bold text-white shadow transition hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-[#f79120] focus:ring-offset-2">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        Rudi kwenye website
                    </a>
                </div>
            @else
                <div class="overflow-hidden rounded-xl bg-white shadow-lg ring-1 ring-gray-200">
                    <header class="border-b border-gray-100 bg-white px-6 py-5 text-center sm:px-8">
                        <p class="text-xs font-semibold uppercase tracking-wider text-[#f79120]">Training for Life (TFL)</p>
                        <h2 class="mt-1 text-xl font-bold text-gray-900">Fomu ya Maombi</h2>
                        <p class="mt-2 text-xs text-gray-500">
                            Sehemu zenye alama <span class="font-bold text-red-600">*</span> ni za lazima kujazwa.
                        </p>
                    </header>

                    <form action="{{ route('snm.store') }}" method="POST" enctype="multipart/form-data" class="divide-y divide-gray-100">
                        @csrf

                        {{-- Section 1: Taarifa Binafsi --}}
                        <section class="px-6 py-6 sm:px-8">
                            <h3 class="mb-5 text-sm font-bold uppercase tracking-wider text-[#070049]">1. Taarifa Binafsi (Applicant Information)</h3>

                            <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
                                <div class="md:col-span-2">
                                    <label for="full_name" class="{{ $labelCls }}">Jina Kamili (Full Name) {!! $req !!}</label>
                                    <input id="full_name" name="full_name" type="text" value="{{ old('full_name') }}" class="{{ $field('full_name') }}" required>
                                    @error('full_name') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                                </div>

                                <div>
                                    <label for="dob" class="{{ $labelCls }}">Tarehe ya Kuzaliwa (Date of Birth) {!! $req !!}</label>
                                    <input id="dob" name="dob" type="date" value="{{ old('dob') }}" max="{{ now()->toDateString() }}" class="{{ $field('dob') }}" required>
                                    @error('dob') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                                </div>

                                <div>
                                    <label for="gender" class="{{ $labelCls }}">Jinsia (Gender) {!! $req !!}</label>
                                    <select id="gender" name="gender" class="{{ $field('gender') }}" required>
                                        <option value="">Chagua Jinsia...</option>
                                        <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Mwanaume (Male)</option>
                                        <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Mwanamke (Female)</option>
                                    </select>
                                    @error('gender') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                                </div>

                                <div>
                                    <label for="national_id" class="{{ $labelCls }}">Namba ya NIDA / Cheti cha Kuzaliwa {!! $opt !!}</label>
                                    <input id="national_id" name="national_id" type="text" value="{{ old('national_id') }}" class="{{ $field('national_id') }}">
                                </div>

                                <div>
                                    <label for="phone_number" class="{{ $labelCls }}">Namba ya Simu {!! $req !!}</label>
                                    <input id="phone_number" name="phone_number" type="text" value="{{ old('phone_number') }}" class="{{ $field('phone_number') }}" required>
                                </div>

                                <div class="md:col-span-2">
                                    <label for="home_address" class="{{ $labelCls }}">Anwani (Kata, Wilaya, Mkoa) {!! $req !!}</label>
                                    <input id="home_address" name="home_address" type="text" value="{{ old('home_address') }}" class="{{ $field('home_address') }}" required>
                                </div>
                            </div>
                        </section>

                        {{-- Section 2: Hali ya Elimu --}}
                        <section class="bg-gray-50/50 px-6 py-6 sm:px-8">
                            <h3 class="mb-5 text-sm font-bold uppercase tracking-wider text-[#070049]">2. Hali ya Elimu (Education Status)</h3>

                            <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
                                <div>
                                    <label for="current_school" class="{{ $labelCls }}">Jina la Shule (Current School) {!! $req !!}</label>
                                    <input id="current_school" name="current_school" type="text" value="{{ old('current_school') }}" class="{{ $field('current_school') }}" required>
                                </div>

                                <div>
                                    <label for="current_class" class="{{ $labelCls }}">Darasa / Kidato (Current Form) {!! $req !!}</label>
                                    <select id="current_class" name="current_class" class="{{ $field('current_class') }}" required>
                                        <option value="">Chagua Darasa...</option>
                                        @foreach(['Form 1', 'Form 2', 'Form 3', 'Form 4', 'Form 5', 'Form 6'] as $frm)
                                            <option value="{{ $frm }}" {{ old('current_class') == $frm ? 'selected' : '' }}>{{ $frm }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="md:col-span-2">
                                    <label for="education_status" class="{{ $labelCls }}">Hali ya sasa ya elimu {!! $req !!}</label>
                                    <select id="education_status" name="education_status" class="{{ $field('education_status') }}" required>
                                        <option value="">Chagua Hali...</option>
                                        <option value="Dropped out of school (advanced secondary — Form 5/6)">Nimeacha Shule (Kidato cha 5/6)</option>
                                        <option value="Dropped out of school (ordinary secondary — Form 1–4)">Nimeacha Shule (Kidato cha 1-4)</option>
                                        <option value="Currently at risk of dropping out">Nipo hatarini kuacha shule (Niko Shuleni)</option>
                                        <option value="Completed Form 4, at risk of not continuing to Form 5/6">Nimemaliza Kidato cha 4, niko hatarini kutokwenda Kidato cha 5</option>
                                        <option value="Currently enrolled, not at risk">Nasoma, sina hatari ya kuacha shule</option>
                                        <option value="Other">Nyingine</option>
                                    </select>
                                </div>

                                <div class="md:col-span-2">
                                    <label for="reason_for_leaving" class="{{ $labelCls }}">Sababu ya kuacha shule / hatari ya kuacha shule {!! $opt !!}</label>
                                    <textarea id="reason_for_leaving" name="reason_for_leaving" rows="2" class="{{ $field('reason_for_leaving') }}">{{ old('reason_for_leaving') }}</textarea>
                                </div>

                                <div>
                                    <label for="form_four_results" class="{{ $labelCls }}">Matokeo ya Form 4 (Mfano: Div I, II) {!! $opt !!}</label>
                                    <input id="form_four_results" name="form_four_results" type="text" value="{{ old('form_four_results') }}" class="{{ $field('form_four_results') }}">
                                </div>

                                <div>
                                    <label for="was_school_leader" class="{{ $labelCls }}">Uliwahi kuwa kiongozi wa shule? {!! $opt !!}</label>
                                    <div class="mt-2">
                                        <label class="inline-flex items-center">
                                            <input type="checkbox" name="was_school_leader" value="1" class="rounded border-gray-300 text-[#f79120] focus:ring-[#f79120]">
                                            <span class="ml-2 text-sm text-gray-700">Ndiyo (Tafadhali taja cheo chini)</span>
                                        </label>
                                    </div>
                                </div>

                                <div class="md:col-span-2">
                                    <label for="leadership_role" class="{{ $labelCls }}">Cheo cha Uongozi (Kama ulichagua Ndiyo) {!! $opt !!}</label>
                                    <input id="leadership_role" name="leadership_role" type="text" value="{{ old('leadership_role') }}" class="{{ $field('leadership_role') }}">
                                </div>
                            </div>
                        </section>

                        {{-- Section 3: Vigezo vya Kipaumbele --}}
                        <section class="px-6 py-6 sm:px-8">
                            <div class="mb-5 flex items-center justify-between">
                                <h3 class="text-sm font-bold uppercase tracking-wider text-[#070049]">3. Vigezo vya Kipaumbele (Vulnerability Criteria)</h3>
                                <span class="inline-flex items-center rounded-full bg-red-100 px-2.5 py-0.5 text-xs font-medium text-red-800">Siri (Confidential)</span>
                            </div>

                            <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
                                <div>
                                    <label for="orphan_status" class="{{ $labelCls }}">Je, wewe ni yatima? {!! $req !!}</label>
                                    <select id="orphan_status" name="orphan_status" class="{{ $field('orphan_status') }}" required>
                                        <option value="No">Hapana</option>
                                        <option value="One parent deceased">Mzazi mmoja amefariki</option>
                                        <option value="Both parents deceased">Wazazi wote wamefariki</option>
                                    </select>
                                </div>

                                <div class="mt-6 flex items-center">
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" name="single_parent" value="1" class="rounded border-gray-300 text-[#f79120] focus:ring-[#f79120]">
                                        <span class="ml-2 text-sm font-semibold text-gray-800">Je, unatoka familia ya mzazi mmoja?</span>
                                    </label>
                                </div>

                                <div class="mt-2 flex items-center">
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" name="has_disability" value="1" class="rounded border-gray-300 text-[#f79120] focus:ring-[#f79120]">
                                        <span class="ml-2 text-sm font-semibold text-gray-800">Je, una ulemavu wowote?</span>
                                    </label>
                                </div>

                                <div>
                                    <label for="disability_type" class="{{ $labelCls }}">Aina ya ulemavu {!! $opt !!}</label>
                                    <input id="disability_type" name="disability_type" type="text" value="{{ old('disability_type') }}" class="{{ $field('disability_type') }}">
                                </div>

                                <div class="md:col-span-2 flex items-center">
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" name="has_dependents" value="1" class="rounded border-gray-300 text-[#f79120] focus:ring-[#f79120]">
                                        <span class="ml-2 text-sm font-semibold text-gray-800">Una mtoto au mtegemezi mwenye mahitaji maalum?</span>
                                    </label>
                                </div>

                                <div class="md:col-span-2">
                                    <label for="household_situation" class="{{ $labelCls }}">Elezea kwa ufupi hali ya familia yako {!! $opt !!}</label>
                                    <textarea id="household_situation" name="household_situation" rows="3" class="{{ $field('household_situation') }}">{{ old('household_situation') }}</textarea>
                                </div>
                            </div>
                        </section>

                        {{-- Section 4: Sababu za Kuomba --}}
                        <section class="bg-gray-50/50 px-6 py-6 sm:px-8">
                            <h3 class="mb-5 text-sm font-bold uppercase tracking-wider text-[#070049]">4. Sababu za Kuomba (Motivation)</h3>

                            <div class="grid grid-cols-1 gap-5">
                                <div>
                                    <label for="need_reason" class="{{ $labelCls }}">Kwa nini unahitaji ufadhili huu? {!! $req !!}</label>
                                    <textarea id="need_reason" name="need_reason" rows="4" class="{{ $field('need_reason') }}" required>{{ old('need_reason') }}</textarea>
                                </div>

                                <div>
                                    <label for="career_goals" class="{{ $labelCls }}">Malengo yako ya baadaye ni yapi? {!! $req !!}</label>
                                    <textarea id="career_goals" name="career_goals" rows="3" class="{{ $field('career_goals') }}" required>{{ old('career_goals') }}</textarea>
                                </div>

                                <div>
                                    <label class="{{ $labelCls }} mb-2">Aina ya msaada unaohitaji zaidi {!! $opt !!}</label>
                                    <div class="flex flex-wrap gap-4">
                                        @foreach(['Sare za Shule', 'Vitabu/Madaftari', 'Usafiri', 'Ada', 'Chakula'] as $support)
                                            <label class="inline-flex items-center">
                                                <input type="checkbox" name="support_needed[]" value="{{ $support }}" class="rounded border-gray-300 text-[#f79120] focus:ring-[#f79120]">
                                                <span class="ml-2 text-sm text-gray-700">{{ $support }}</span>
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </section>

                        {{-- Section 5: Nyaraka --}}
                        <section class="px-6 py-6 sm:px-8">
                            <h3 class="mb-5 text-sm font-bold uppercase tracking-wider text-[#070049]">5. Nyaraka Muhimu (Supporting Documents)</h3>
                            <p class="mb-4 text-xs text-gray-500">Kila faili lisizidi 5MB (Inakubali PDF au Picha).</p>

                            <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
                                <div>
                                    <label for="report_card" class="{{ $labelCls }}">Ripoti ya Shule (Report Card) {!! $req !!}</label>
                                    <input id="report_card" name="report_card" type="file" accept=".pdf,image/*" class="{{ $field('report_card') }}" required>
                                    @error('report_card') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                                </div>

                                <div>
                                    <label for="recommendation_letter" class="{{ $labelCls }}">Barua ya Shule (Recommendation) {!! $req !!}</label>
                                    <input id="recommendation_letter" name="recommendation_letter" type="file" accept=".pdf,image/*" class="{{ $field('recommendation_letter') }}" required>
                                    @error('recommendation_letter') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                                </div>

                                <div>
                                    <label for="passport_photo" class="{{ $labelCls }}">Picha ya Passport Size {!! $req !!}</label>
                                    <input id="passport_photo" name="passport_photo" type="file" accept="image/*" class="{{ $field('passport_photo') }}" required>
                                    @error('passport_photo') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                                </div>

                                <div>
                                    <label for="parent_id" class="{{ $labelCls }}">Kitambulisho cha Mzazi {!! $opt !!}</label>
                                    <input id="parent_id" name="parent_id" type="file" accept=".pdf,image/*" class="{{ $field('parent_id') }}">
                                    @error('parent_id') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                                </div>
                            </div>
                        </section>

                        {{-- Section 6: Tamko --}}
                        <section class="bg-gray-50/50 px-6 py-6 sm:px-8">
                            <h3 class="mb-4 text-sm font-bold uppercase tracking-wider text-[#070049]">6. Tamko (Declaration)</h3>

                            <div class="space-y-4">
                                <label class="flex items-start">
                                    <input type="checkbox" name="declaration_accepted" value="1" class="mt-1 rounded border-gray-300 text-[#f79120] focus:ring-[#f79120]" required>
                                    <span class="ml-3 text-sm font-semibold text-gray-800">Ninathibitisha kuwa taarifa zote nilizotoa ni sahihi. (I confirm the information provided is accurate). {!! $req !!}</span>
                                </label>

                                <label class="flex items-start">
                                    <input type="checkbox" name="parent_consent_accepted" value="1" class="mt-1 rounded border-gray-300 text-[#f79120] focus:ring-[#f79120]" required>
                                    <span class="ml-3 text-sm font-semibold text-gray-800">Nina ridhaa ya mzazi/mlezi wangu kutuma maombi haya. (Parent/Guardian consent). {!! $req !!}</span>
                                </label>
                            </div>
                        </section>

                        {{-- Vitufe vya mwisho --}}
                        <div class="flex flex-col gap-4 border-t border-gray-100 bg-white px-6 py-5 sm:flex-row sm:items-center sm:justify-between sm:px-8">
                            <span class="text-sm font-medium text-gray-500">
                                Tarehe ya leo: {{ now()->format('d/m/Y') }}
                            </span>

                            <div class="flex flex-col-reverse gap-3 sm:flex-row">
                                <a href="{{ url('/') }}"
                                   class="inline-flex items-center justify-center gap-2 rounded-lg border border-gray-300 bg-white px-5 py-3 text-sm font-bold text-gray-700 shadow-sm transition hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-[#070049] focus:ring-offset-2">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                                    </svg>
                                    Rudi kwenye chaguo la fomu
                                </a>

                                <button type="submit" class="inline-flex items-center justify-center rounded-lg bg-[#070049] px-8 py-3 text-sm font-bold text-white shadow-md transition hover:bg-blue-800 focus:ring-2 focus:ring-[#f79120] focus:ring-offset-2">
                                    Tuma Maombi Yako
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>