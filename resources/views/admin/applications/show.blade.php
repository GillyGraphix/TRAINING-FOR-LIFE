<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Maelezo ya Application') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            {{-- Sehemu ya Kuonyesha Ujumbe kama Email imefanikiwa --}}
            @if (session('success'))
                <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                    <span class="font-medium">Hongera!</span> {{ session('success') }}
                </div>
            @endif

            {{-- Kadi ya Taarifa za Muombaji --}}
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Taarifa za Muombaji</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Jina Kamili</label>
                            <p class="mt-1 text-sm text-gray-900 bg-gray-50 p-2 rounded">{{ $application->full_name ?? 'N/A' }}</p>
                        </div>
                        
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Email Address</label>
                            <p class="mt-1 text-sm text-gray-900 bg-gray-50 p-2 rounded">{{ $application->email ?? 'N/A' }}</p>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Namba ya Simu</label>
                            <p class="mt-1 text-sm text-gray-900 bg-gray-50 p-2 rounded">{{ $application->phone ?? 'N/A' }}</p>
                        </div>
                    </div>

                    {{-- Mfano wa field nyingine kutoka kwenye KijanaFursaForm --}}
                    <div class="mb-4 mt-4">
                        <label class="block text-sm font-medium text-gray-700">Kwanini anataka kushiriki (Motivation)</label>
                        <p class="mt-1 text-sm text-gray-900 bg-gray-50 p-3 rounded border">
                            {{ $application->motivation_reason ?? 'Hakuna maelezo yaliyotolewa.' }}
                        </p>
                    </div>

                    {{-- Hapa unaweza kuongeza fields nyingine na links za kudownload passport/barua n.k --}}
                    {{-- Mfano:
                    @if($application->passport_photo_path)
                        <a href="{{ Storage::url($application->passport_photo_path) }}" target="_blank" class="text-blue-600 hover:underline">Tazama Picha ya Passport</a>
                    @endif
                    --}}
                </div>
            </div>

            {{-- Kadi ya Fomu ya Kujibu Application (Kutuma Email) --}}
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-2xl">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Mtumie Ujumbe / Majibu Muombaji Huyu</h3>
                    
                    <form method="POST" action="{{ route('admin.applications.reply', $application->id) }}">
                        @csrf
                        
                        <div class="mb-4">
                            <label for="reply_message" class="block text-sm font-medium text-gray-700">Ujumbe wako (Utaenda kwenye email yake: {{ $application->email }})</label>
                            <textarea id="reply_message" name="reply_message" rows="6" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required placeholder="Andika majibu yako hapa..."></textarea>
                            <x-input-error class="mt-2" :messages="$errors->get('reply_message')" />
                        </div>

                        <div class="flex items-center gap-4 mt-4">
                            <x-primary-button>
                                {{ __('Tuma Email') }}
                            </x-primary-button>
                            <a href="{{ route('admin.applications.index') }}" class="text-sm text-gray-600 hover:text-gray-900">
                                Rudi Nyuma
                            </a>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>