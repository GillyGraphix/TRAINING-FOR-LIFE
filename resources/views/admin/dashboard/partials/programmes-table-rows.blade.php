{{-- Hii partial inatumika NDANI ya programmes.blade.php, na pia inarudishwa moja kwa moja
     na ProgrammeController@tableRows kwa ajili ya AJAX refresh baada ya save/delete --}}
@forelse(($programmesList ?? []) as $programme)
    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50 transition">
        <td class="px-4 py-3">
            @if($programme->image)
                <img src="{{ asset('storage/'.$programme->image) }}" alt="{{ $programme->title }}" class="w-12 h-12 object-cover rounded-lg border border-gray-200 dark:border-gray-600">
            @else
                <div class="w-12 h-12 rounded-lg bg-gray-100 dark:bg-gray-700 flex items-center justify-center text-gray-400">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14M14 8h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                </div>
            @endif
        </td>
        <td class="px-4 py-3 text-gray-500 dark:text-gray-400 font-semibold">{{ $programme->order }}</td>
        <td class="px-4 py-3">
            <div class="font-semibold text-gray-900 dark:text-white max-w-xs truncate">{{ $programme->title }}</div>
            @if($programme->subtitle)
                <div class="text-xs text-[#f79120] font-semibold uppercase tracking-wide">{{ $programme->subtitle }}</div>
            @endif
        </td>
        <td class="px-4 py-3 text-gray-500 dark:text-gray-400 max-w-sm truncate">{{ $programme->summary }}</td>
        <td class="px-4 py-3">
            <span class="px-2 py-1 rounded-full text-xs font-bold bg-blue-100 text-blue-700 dark:bg-blue-900/40 dark:text-blue-300">
                {{ is_array($programme->sections) ? count($programme->sections) : 0 }} sections
            </span>
        </td>
        <td class="px-4 py-3">
            @if($programme->is_active)
                <span class="px-2 py-1 rounded-full text-xs font-bold bg-green-100 text-green-700 dark:bg-green-900/40 dark:text-green-300">Active</span>
            @else
                <span class="px-2 py-1 rounded-full text-xs font-bold bg-gray-100 text-gray-500 dark:bg-gray-700 dark:text-gray-400">Hidden</span>
            @endif
        </td>
        <td class="px-4 py-3">
            <div class="flex justify-end gap-2">
                <button type="button"
                    class="js-edit-programme p-2 rounded-lg bg-blue-50 hover:bg-blue-100 text-blue-600 dark:bg-blue-900/30 dark:hover:bg-blue-900/50 dark:text-blue-400 transition"
                    data-programme="{{ json_encode($programme) }}" title="Hariri">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                </button>
                <form method="POST" action="{{ route('admin.programmes.destroy', $programme->id) }}" class="js-delete-programme-form m-0">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="p-2 rounded-lg bg-red-50 hover:bg-red-100 text-red-600 dark:bg-red-900/30 dark:hover:bg-red-900/50 dark:text-red-400 transition" title="Futa">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                    </button>
                </form>
            </div>
        </td>
    </tr>
@empty
    <tr>
        <td colspan="7" class="px-4 py-10 text-center text-gray-400">Bado hakuna programme zilizowekwa. Bofya "Ongeza Programme" kuanza.</td>
    </tr>
@endforelse