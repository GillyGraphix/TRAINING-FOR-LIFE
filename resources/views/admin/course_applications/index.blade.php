<x-app-layout>
    <style>
        body { background-color: #f8fafc; }
        html.dark body { background-color: #111827; }
    </style>

    <x-slot name="header">
        <div class="flex justify-between items-center bg-[#070049] dark:bg-gray-900 p-4 rounded-xl shadow-lg border-b-4 border-[#f79120]">
            <div class="flex items-center gap-4">
                <img src="{{ asset('images/adminlogo.png') }}" alt="TFL Admin Logo" class="h-12 w-auto object-contain bg-white p-1.5 rounded-lg shadow-sm">
                <h2 class="font-extrabold text-2xl text-white leading-tight hidden sm:block tracking-wide">
                    {{ __('Course 4 Applications') }}
                </h2>
            </div>

            <div class="flex items-center gap-3 sm:gap-5">
                <a href="{{ route('admin.dashboard') }}" class="text-sm font-bold text-[#070049] bg-[#f79120] hover:bg-yellow-500 px-4 py-2 rounded-full shadow transition-all">
                    Rudi Dashboard
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-8 bg-slate-50 dark:bg-gray-900 min-h-screen transition-colors duration-300">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            
            <section class="min-w-0 rounded-xl border border-gray-100 bg-white p-4 shadow-xl dark:border-gray-700 dark:bg-gray-800 sm:p-6">
                <div class="mb-5 border-b border-gray-200 pb-4 dark:border-gray-700 flex justify-between items-end">
                    <div>
                        <h3 class="text-lg font-bold text-[#070049] dark:text-white">Orodha ya Maombi ya TFL Course</h3>
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Gusa jina la mwombaji kuona taarifa zake zote.</p>
                    </div>
                    <div class="text-sm font-bold text-[#f79120] bg-[#f79120]/10 px-4 py-2 rounded-lg">
                        Jumla: {{ $applications->total() ?? 0 }}
                    </div>
                </div>

                @if(isset($applications) && $applications->count() > 0)
                    <div class="grid min-w-0 grid-cols-1 gap-4 lg:grid-cols-2">
                        @foreach($applications as $app)
                            <details class="group min-w-0 rounded-xl border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800">
                                <summary class="list-none cursor-pointer p-4 outline-none transition hover:bg-gray-50 focus-visible:ring-2 focus-visible:ring-blue-600 dark:hover:bg-gray-700/50 [&::-webkit-details-marker]:hidden">
                                    <div class="flex min-w-0 items-start justify-between gap-3">
                                        <div class="min-w-0 flex-1">
                                            <h4 class="break-words text-base font-bold text-[#070049] underline decoration-dotted underline-offset-4 dark:text-white [overflow-wrap:anywhere]">{{ $app->student_name }}</h4>
                                            <p class="mt-2 break-words text-sm text-gray-700 dark:text-gray-300 [overflow-wrap:anywhere]">{{ $app->phone_number }}</p>
                                            <p class="mt-1 break-words text-xs text-gray-500 dark:text-gray-400 [overflow-wrap:anywhere]">{{ $app->school }} <span aria-hidden="true">·</span> {{ $app->created_at?->format('d/m/Y') ?? '—' }}</p>
                                        </div>
                                        <span class="shrink-0 rounded-full bg-[#070049] px-3 py-1.5 text-xs font-semibold text-white group-open:bg-[#f79120]">Fungua</span>
                                    </div>
                                </summary>

                                {{-- Modal Overlay - Inafunguka mtu akibofya Jina --}}
                                <div class="fixed inset-0 z-40 overflow-y-auto bg-black/60 p-3 sm:p-6" onclick="if(event.target===this)this.closest('details').open=false">
                                    <div class="mx-auto my-3 w-full max-w-4xl overflow-hidden rounded-xl bg-white shadow-2xl dark:bg-gray-800 sm:my-6" onclick="event.stopPropagation()">
                                        <div class="flex items-start justify-between gap-4 border-b border-gray-200 p-4 dark:border-gray-700 sm:p-6">
                                            <div class="min-w-0">
                                                <h4 class="break-words text-lg font-bold text-[#070049] dark:text-white [overflow-wrap:anywhere]">Taarifa za {{ $app->student_name }}</h4>
                                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Zimetumwa: {{ $app->created_at?->format('d/m/Y H:i') ?? '' }}</p>
                                            </div>
                                            <button type="button" onclick="this.closest('details').open=false" class="shrink-0 rounded-lg bg-gray-100 px-3 py-2 text-sm font-bold text-gray-700 hover:bg-red-100 hover:text-red-700 dark:bg-gray-700 dark:text-gray-100">Funga</button>
                                        </div>

                                        <div class="max-h-[calc(100vh-7rem)] overflow-y-auto p-4 sm:p-6">
                                            <dl class="grid min-w-0 grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
                                                
                                                {{-- 1. Taarifa Binafsi --}}
                                                <div class="col-span-full mb-2 border-b border-gray-200 dark:border-gray-700 pb-2">
                                                    <h5 class="text-sm font-bold text-[#f79120] uppercase tracking-wider">1. Taarifa Binafsi</h5>
                                                </div>
                                                <div class="min-w-0"><dt class="text-xs font-semibold uppercase text-gray-500">Jina Kamili</dt><dd class="mt-1 text-sm font-medium text-gray-900 dark:text-gray-100">{{ $app->student_name }}</dd></div>
                                                <div class="min-w-0"><dt class="text-xs font-semibold uppercase text-gray-500">Namba ya Simu</dt><dd class="mt-1 text-sm text-gray-900 dark:text-gray-100">{{ $app->phone_number }}</dd></div>
                                                <div class="min-w-0"><dt class="text-xs font-semibold uppercase text-gray-500">Barua Pepe</dt><dd class="mt-1 text-sm text-gray-900 dark:text-gray-100">{{ $app->email ?: '—' }}</dd></div>
                                                <div class="min-w-0"><dt class="text-xs font-semibold uppercase text-gray-500">Tarehe ya Kuzaliwa</dt><dd class="mt-1 text-sm text-gray-900 dark:text-gray-100">{{ \Carbon\Carbon::parse($app->dob)->format('d/m/Y') }}</dd></div>
                                                <div class="min-w-0"><dt class="text-xs font-semibold uppercase text-gray-500">Anwani (Current Address)</dt><dd class="mt-1 text-sm text-gray-900 dark:text-gray-100">{{ $app->current_address }}</dd></div>
                                                <div class="min-w-0"><dt class="text-xs font-semibold uppercase text-gray-500">Mahali Anapoishi</dt><dd class="mt-1 text-sm text-gray-900 dark:text-gray-100">{{ $app->place_of_residence }}</dd></div>
                                                <div class="min-w-0"><dt class="text-xs font-semibold uppercase text-gray-500">Dini</dt><dd class="mt-1 text-sm text-gray-900 dark:text-gray-100">{{ $app->religion ?: '—' }}</dd></div>

                                                {{-- 2. Taarifa za Mzazi --}}
                                                <div class="col-span-full mt-4 mb-2 border-b border-gray-200 dark:border-gray-700 pb-2">
                                                    <h5 class="text-sm font-bold text-[#f79120] uppercase tracking-wider">2. Taarifa za Mzazi/Mlezi</h5>
                                                </div>
                                                <div class="min-w-0"><dt class="text-xs font-semibold uppercase text-gray-500">Jina la Mzazi/Mlezi</dt><dd class="mt-1 text-sm text-gray-900 dark:text-gray-100">{{ $app->parent_name }}</dd></div>
                                                <div class="min-w-0"><dt class="text-xs font-semibold uppercase text-gray-500">Simu ya Mzazi</dt><dd class="mt-1 text-sm font-bold text-[#070049] dark:text-blue-400">{{ $app->parent_phone }}</dd></div>
                                                <div class="min-w-0"><dt class="text-xs font-semibold uppercase text-gray-500">Kazi / Mahali pa Kazi</dt><dd class="mt-1 text-sm text-gray-900 dark:text-gray-100">{{ $app->parent_occupation ?: '—' }}</dd></div>
                                                <div class="min-w-0"><dt class="text-xs font-semibold uppercase text-gray-500">Anwani ya Mzazi</dt><dd class="mt-1 text-sm text-gray-900 dark:text-gray-100">{{ $app->parent_address ?: '—' }}</dd></div>
                                                <div class="min-w-0"><dt class="text-xs font-semibold uppercase text-gray-500">Barua Pepe (Mzazi)</dt><dd class="mt-1 text-sm text-gray-900 dark:text-gray-100">{{ $app->parent_email ?: '—' }}</dd></div>

                                                {{-- 3. Taarifa za Kitaaluma --}}
                                                <div class="col-span-full mt-4 mb-2 border-b border-gray-200 dark:border-gray-700 pb-2">
                                                    <h5 class="text-sm font-bold text-[#f79120] uppercase tracking-wider">3. Taarifa za Kitaaluma</h5>
                                                </div>
                                                <div class="min-w-0"><dt class="text-xs font-semibold uppercase text-gray-500">Shule (School)</dt><dd class="mt-1 text-sm text-gray-900 dark:text-gray-100">{{ $app->school }}</dd></div>
                                                <div class="min-w-0"><dt class="text-xs font-semibold uppercase text-gray-500">Matokeo ya Mock</dt><dd class="mt-1 text-sm text-gray-900 dark:text-gray-100">{{ $app->mock_results }}</dd></div>
                                                <div class="min-w-0"><dt class="text-xs font-semibold uppercase text-gray-500">Mwaka Aliohitimu F4</dt><dd class="mt-1 text-sm font-bold text-gray-900 dark:text-gray-100">{{ $app->form_4_year }}</dd></div>

                                                {{-- 4. TFL Course Essay --}}
                                                <div class="col-span-full mt-4 mb-2 border-b border-gray-200 dark:border-gray-700 pb-2">
                                                    <h5 class="text-sm font-bold text-[#f79120] uppercase tracking-wider">4. Kuhusu Ujuzi wa Kimaisha (TFL)</h5>
                                                </div>
                                                <div class="min-w-0 col-span-full">
                                                    <div class="bg-gray-50 dark:bg-gray-700/50 p-4 rounded-lg">
                                                        <p class="whitespace-pre-wrap text-sm text-gray-800 dark:text-gray-200 leading-relaxed">{{ $app->life_skills_essay }}</p>
                                                    </div>
                                                </div>

                                            </dl>
                                        </div>
                                    </div>
                                </div>
                            </details>
                        @endforeach
                    </div>

                    {{-- Pagination (Ikiwa waombaji wapo wengi) --}}
                    <div class="mt-6">
                        {{ $applications->links() }}
                    </div>

                @else
                    <div class="rounded-lg border border-dashed border-gray-300 p-8 text-center text-gray-500 dark:border-gray-600 dark:text-gray-400">
                        Hakuna maombi ya Course 4 yaliyopokelewa bado.
                    </div>
                @endif
            </section>
        </div>
    </div>
</x-app-layout>