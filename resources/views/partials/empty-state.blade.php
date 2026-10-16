{{-- resources/views/partials/empty-state.blade.php --}}
<div class="flex flex-col items-center justify-center text-center py-14 px-6 bg-white dark:bg-slate-800 rounded-2xl border border-dashed border-gray-200 dark:border-gray-700">
    <div class="w-14 h-14 flex items-center justify-center rounded-full bg-gray-100 dark:bg-slate-700 text-slate-400 dark:text-slate-500 mb-4">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 13h6m-3-3v6m9-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
        </svg>
    </div>
    <p class="text-slate-500 dark:text-gray-400 text-sm">{{ $message }}</p>
</div>