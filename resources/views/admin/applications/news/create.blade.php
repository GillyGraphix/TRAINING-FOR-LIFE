<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-[#070049] dark:text-white leading-tight">
            {{ __('Ongeza Habari Mpya (News & Updates)') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-lg rounded-xl p-6 border-t-4 border-[#f79120]">
                
                <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Kichwa cha Habari -->
                        <div class="col-span-2">
                            <label class="block text-sm font-bold text-gray-700 dark:text-gray-300">Kichwa cha Habari (Title)</label>
                            <input type="text" name="title" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#f79120] focus:ring-[#f79120] dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        </div>

                        <!-- Aina (Type) -->
                        <div>
                            <label class="block text-sm font-bold text-gray-700 dark:text-gray-300">Aina ya Chapisho</label>
                            <select name="type" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#f79120] focus:ring-[#f79120] dark:bg-gray-700 dark:text-white">
                                <option value="news">Habari (News)</option>
                                <option value="event">Tukio (Event)</option>
                                <option value="story">Hadithi (Story)</option>
                            </select>
                        </div>

                        <!-- Picha -->
                        <div>
                            <label class="block text-sm font-bold text-gray-700 dark:text-gray-300">Picha ya Habari (Image)</label>
                            <input type="file" name="image" accept="image/*" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-[#070049]/10 file:text-[#070049] hover:file:bg-[#070049]/20 dark:text-gray-300">
                        </div>
                    </div>

                    <!-- Maelezo Mafupi (Excerpt) -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700 dark:text-gray-300">Maelezo Mafupi (Excerpt)</label>
                        <textarea name="excerpt" rows="2" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#f79120] focus:ring-[#f79120] dark:bg-gray-700 dark:text-white"></textarea>
                    </div>

                    <!-- Maelezo Kamili (Body) -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700 dark:text-gray-300">Habari Kamili (Body)</label>
                        <textarea name="body" rows="6" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#f79120] focus:ring-[#f79120] dark:bg-gray-700 dark:text-white"></textarea>
                    </div>

                    <!-- Status -->
                    <div class="flex items-center">
                        <input type="hidden" name="is_active" value="0">
                        <input type="checkbox" name="is_active" value="1" checked class="rounded border-gray-300 text-[#f79120] shadow-sm focus:border-[#f79120] focus:ring-[#f79120] w-5 h-5">
                        <label class="ml-2 block text-sm font-bold text-gray-700 dark:text-gray-300">
                            Chapisha Moja kwa Moja (Is Active)
                        </label>
                    </div>

                    <!-- Vifungo -->
                    <div class="flex justify-end gap-4 pt-4 border-t border-gray-200 dark:border-gray-700">
                        <a href="{{ route('dashboard') }}" class="px-6 py-2 bg-gray-200 text-gray-700 rounded-md font-bold hover:bg-gray-300 transition-colors">Ghairi</a>
                        <button type="submit" class="px-6 py-2 bg-[#f79120] text-white rounded-md font-bold hover:bg-[#070049] transition-colors shadow-md">
                            Hifadhi (Save)
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>