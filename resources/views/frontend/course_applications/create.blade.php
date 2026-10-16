<x-app-layout>
    @php
        $labelCls = 'block text-sm font-semibold text-gray-800';

        $inputBase = 'mt-1 block w-full rounded-md border border-gray-300 bg-white px-3 py-2 text-sm text-gray-900 shadow-sm placeholder:text-gray-400 focus:border-blue-600 focus:ring-1 focus:ring-blue-600 focus:outline-none transition-colors';

        $field = fn ($name) => $inputBase . ' ' . ($errors->has($name) ? 'border-red-500 focus:border-red-500 focus:ring-red-500' : '');

        $req = '<span class="text-red-600" aria-hidden="true">*</span>';
        $opt = '<span class="font-normal text-gray-500">(si lazima)</span>';
    @endphp

    {{-- Kichwa cha ukurasa --}}
    <div class="bg-[#070049] py-16 text-center">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl">
                Maombi ya TFL Course 4
            </h1>
            <p class="mx-auto mt-4 max-w-2xl text-xl text-gray-300">
                Karibu kujaza fomu ya maombi ya mafunzo ya kujiandaa na maisha kama kijana na kiongozi wa baadaye chini ya Training for Life (TFL).
            </p>
        </div>
    </div>

    {{-- Sehemu ya fomu --}}
    <div class="bg-gray-50 py-12">
        <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="mx-auto mb-6 max-w-2xl rounded-xl border border-green-300 bg-green-50 p-6 shadow-sm" role="status">
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
                       class="mt-5 inline-flex items-center gap-2 rounded-lg bg-[#070049] px-5 py-3 text-sm font-bold text-white shadow-sm transition hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        Rudi kwenye website
                    </a>
                </div>
            @else
                <div class="overflow-hidden rounded-xl bg-white shadow-lg ring-1 ring-gray-200">
                    <header class="border-b border-gray-100 bg-white px-6 py-5 text-center sm:px-8">
                        <p class="text-xs font-semibold uppercase tracking-wider text-blue-700">Training for Life (TFL)</p>
                        <h2 class="mt-1 text-xl font-bold text-gray-900">Course Application Form</h2>
                        <p class="mt-2 text-xs text-gray-500">
                            Sehemu zenye alama <span class="font-bold text-red-600">*</span> ni za lazima kujazwa.
                        </p>
                    </header>

                    <form action="{{ route('course.store') }}" method="POST" class="divide-y divide-gray-100" novalidate>
                        @csrf

                        {{-- 1. Taarifa Binafsi za Mwanafunzi --}}
                        <section class="px-6 py-6 sm:px-8">
                            <h3 class="mb-5 text-sm font-bold uppercase tracking-wider text-blue-800">
                                1. Taarifa Binafsi za Mwanafunzi
                            </h3>

                            <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
                                <div class="md:col-span-2">
                                    <label for="student_name" class="{{ $labelCls }}">Name(s) {!! $req !!}</label>
                                    <input id="student_name" name="student_name" type="text" value="{{ old('student_name') }}" placeholder="Majina kamili" class="{{ $field('student_name') }}" required>
                                    @error('student_name') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                                </div>

                                <div>
                                    <label for="phone_number" class="{{ $labelCls }}">Phone Number {!! $req !!}</label>
                                    <input id="phone_number" name="phone_number" type="tel" value="{{ old('phone_number') }}" placeholder="Mfano: 0712 345 678" class="{{ $field('phone_number') }}" required>
                                    @error('phone_number') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                                </div>

                                <div>
                                    <label for="email" class="{{ $labelCls }}">Email {!! $opt !!}</label>
                                    <input id="email" name="email" type="email" value="{{ old('email') }}" placeholder="barua pepe yako" class="{{ $field('email') }}">
                                    @error('email') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                                </div>

                                <div>
                                    <label for="dob" class="{{ $labelCls }}">Date of Birth {!! $req !!}</label>
                                    <input id="dob" name="dob" type="date" value="{{ old('dob') }}" max="{{ now()->toDateString() }}" class="{{ $field('dob') }}" required>
                                    @error('dob') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                                </div>

                                <div>
                                    <label for="religion" class="{{ $labelCls }}">Religion {!! $opt !!}</label>
                                    <input id="religion" name="religion" type="text" value="{{ old('religion') }}" placeholder="Dini yako" class="{{ $field('religion') }}">
                                    @error('religion') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                                </div>

                                <div class="md:col-span-2">
                                    <label for="current_address" class="{{ $labelCls }}">Address (Current) {!! $req !!}</label>
                                    <input id="current_address" name="current_address" type="text" value="{{ old('current_address') }}" placeholder="Anwani yako ya sasa" class="{{ $field('current_address') }}" required>
                                    @error('current_address') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                                </div>

                                <div class="md:col-span-2">
                                    <label for="place_of_residence" class="{{ $labelCls }}">Place of Residence {!! $req !!}</label>
                                    <input id="place_of_residence" name="place_of_residence" type="text" value="{{ old('place_of_residence') }}" placeholder="Sehemu unayoishi kwa sasa" class="{{ $field('place_of_residence') }}" required>
                                    @error('place_of_residence') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                                </div>
                            </div>
                        </section>

                        {{-- 2. Taarifa za Mzazi/Mlezi --}}
                        <section class="bg-gray-50/50 px-6 py-6 sm:px-8">
                            <h3 class="mb-5 text-sm font-bold uppercase tracking-wider text-blue-800">
                                2. Taarifa za Mzazi/Mlezi
                            </h3>

                            <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
                                <div class="md:col-span-2">
                                    <label for="parent_name" class="{{ $labelCls }}">Name(s) of Parent/Guardian {!! $req !!}</label>
                                    <input id="parent_name" name="parent_name" type="text" value="{{ old('parent_name') }}" placeholder="Majina kamili ya mzazi au mlezi" class="{{ $field('parent_name') }}" required>
                                    @error('parent_name') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                                </div>

                                <div>
                                    <label for="parent_occupation" class="{{ $labelCls }}">Occupation/Place of Work {!! $opt !!}</label>
                                    <input id="parent_occupation" name="parent_occupation" type="text" value="{{ old('parent_occupation') }}" placeholder="Kazi au mahali anapofanyia kazi" class="{{ $field('parent_occupation') }}">
                                    @error('parent_occupation') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                                </div>

                                <div>
                                    <label for="parent_phone" class="{{ $labelCls }}">Tel. No (Namba ya Simu) {!! $req !!}</label>
                                    <input id="parent_phone" name="parent_phone" type="text" value="{{ old('parent_phone') }}" placeholder="Namba ya mzazi" class="{{ $field('parent_phone') }}" required>
                                    @error('parent_phone') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                                </div>

                                <div class="md:col-span-2">
                                    <label for="parent_address" class="{{ $labelCls }}">Address of Parent/Guardian {!! $opt !!}</label>
                                    <input id="parent_address" name="parent_address" type="text" value="{{ old('parent_address') }}" placeholder="Anwani ya mzazi" class="{{ $field('parent_address') }}">
                                    @error('parent_address') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                                </div>

                                <div class="md:col-span-2">
                                    <label for="parent_email" class="{{ $labelCls }}">Email {!! $opt !!}</label>
                                    <input id="parent_email" name="parent_email" type="email" value="{{ old('parent_email') }}" placeholder="Barua pepe ya mzazi" class="{{ $field('parent_email') }}">
                                    @error('parent_email') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                                </div>
                            </div>
                        </section>

                        {{-- 3. Taarifa za Kitaaluma --}}
                        <section class="px-6 py-6 sm:px-8">
                            <h3 class="mb-5 text-sm font-bold uppercase tracking-wider text-blue-800">
                                3. Taarifa za Kitaaluma
                            </h3>

                            <div class="grid grid-cols-1 gap-5 md:grid-cols-3">
                                <div>
                                    <label for="mock_results" class="{{ $labelCls }}">O-Level Mock results (Div) {!! $req !!}</label>
                                    <input id="mock_results" name="mock_results" type="text" value="{{ old('mock_results') }}" placeholder="e.g. Div II" class="{{ $field('mock_results') }}" required>
                                    @error('mock_results') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                                </div>

                                <div class="md:col-span-2">
                                    <label for="school" class="{{ $labelCls }}">School (Shule Uliyosoma) {!! $req !!}</label>
                                    <input id="school" name="school" type="text" value="{{ old('school') }}" placeholder="Jina la shule" class="{{ $field('school') }}" required>
                                    @error('school') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                                </div>

                                <div>
                                    <label for="form_4_year" class="{{ $labelCls }}">When did you finish Form 4? {!! $req !!}</label>
                                    <input id="form_4_year" name="form_4_year" type="number" value="{{ old('form_4_year') }}" placeholder="e.g. 2023" class="{{ $field('form_4_year') }}" required>
                                    @error('form_4_year') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                                </div>
                            </div>
                        </section>

                        {{-- 4. Kuhusu TFL Course --}}
                        <section class="bg-gray-50/50 px-6 py-6 sm:px-8">
                            <h3 class="mb-5 text-sm font-bold uppercase tracking-wider text-blue-800">
                                4. Kuhusu TFL Course
                            </h3>

                            <div class="grid grid-cols-1 gap-4">
                                <div>
                                    <label for="life_skills_essay" class="{{ $labelCls }}">
                                        The TFL Course trains youths on various life skills. Which skills do you think you need as a young person and a future leader? {!! $req !!}
                                    </label>
                                    <textarea id="life_skills_essay" name="life_skills_essay" rows="5" placeholder="Eleza ujuzi unaofikiri unauhitaji..." class="{{ $field('life_skills_essay') }} mt-3" required>{{ old('life_skills_essay') }}</textarea>
                                    @error('life_skills_essay') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                                </div>
                            </div>
                        </section>

                        {{-- 5. Mahojiano na taarifa za uchaguzi --}}
                        <section class="px-6 py-6 sm:px-8">
                            <div class="rounded-xl border border-blue-100 bg-blue-50/80 p-5 shadow-sm">
                                <h3 class="mb-3 text-sm font-bold uppercase tracking-wider text-blue-900">
                                    5. Interviews &amp; Selection
                                </h3>

                                <ul class="list-disc space-y-2 pl-5 text-sm text-blue-800">
                                    <li>Short listed candidates will be contacted for an interview.</li>
                                    <li>Interviews will take place around Nov and December.</li>
                                    <li>Successful candidates will pay <strong class="font-bold text-blue-950">Tshs. 900,000/=</strong>.</li>
                                </ul>

                                <div class="mt-5 border-t border-blue-200/60 pt-4 text-sm text-blue-900">
                                    <p class="font-medium">In case of any query, please contact TFL Course Coordinator at:</p>
                                    <p class="mt-1">Tel: <strong class="font-bold tracking-wide">(+255) 0782 024 433</strong></p>
                                    <p>TFL, P.O. Box 998, MOSHI</p>
                                </div>
                            </div>
                        </section>

                        {{-- 6. Kutuma maombi --}}
                        <div class="border-t border-gray-100 bg-gray-50 px-6 py-5 sm:px-8">
                            @if($errors->any())
                                <div class="mb-4 rounded-lg border border-red-300 bg-red-50 p-3">
                                    <p class="text-xs font-bold text-red-800">
                                        Kuna makosa kwenye ujazaji, tafadhali yasahihishe sehemu zenye alama nyekundu hapo juu.
                                    </p>
                                </div>
                            @endif

                            <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                                <div class="text-sm font-medium text-gray-500">
                                    Tarehe ya leo: {{ now()->format('d/m/Y') }}
                                </div>

                                <div class="flex flex-col gap-3 sm:flex-row sm:items-center">
                                    <button type="submit"
                                            class="inline-flex items-center justify-center rounded-lg bg-[#070049] px-8 py-3 text-sm font-bold text-white shadow-md transition hover:bg-blue-800 focus:ring-2 focus:ring-blue-600 focus:ring-offset-2">
                                        Wasilisha Maombi
                                    </button>

                                    <a href="{{ url('/') }}"
                                       class="order-last inline-flex items-center justify-center gap-2 rounded-lg border border-gray-300 bg-white px-5 py-3 text-sm font-bold text-gray-700 shadow-sm transition hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2 sm:order-none">
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                                        </svg>
                                        Rudi kwenye chaguo la fomu
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>