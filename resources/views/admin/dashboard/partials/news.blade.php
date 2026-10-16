{{-- ADMIN PARTIAL: NEWS & UPDATES --}}
<div id="news-tab" class="tab-content hidden">
    <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700">

        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
            <div>
                <h2 class="text-xl font-bold text-[#070049] dark:text-white">News & Updates</h2>
                <p class="text-sm text-gray-500 dark:text-gray-400">Simamia habari, matukio, machapisho, ripoti na media.</p>
            </div>
            <button type="button" onclick="openNewsModal()" class="inline-flex items-center gap-2 bg-[#f79120] hover:bg-[#e07f10] text-white font-semibold px-4 py-2 rounded-lg shadow transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                Ongeza Taarifa
            </button>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full text-sm text-left">
                <thead class="bg-gray-50 dark:bg-gray-700 text-gray-600 dark:text-gray-300 uppercase text-xs">
                    <tr>
                        <th class="px-4 py-3">Picha</th>
                        <th class="px-4 py-3">Kichwa</th>
                        <th class="px-4 py-3">Aina</th>
                        <th class="px-4 py-3">Tarehe</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3 text-right">Vitendo</th>
                    </tr>
                </thead>
                <tbody id="news-table-body" class="divide-y divide-gray-100 dark:divide-gray-700">
                    @include('admin.dashboard.partials.news-table-rows')
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- MODAL: Ongeza / Hariri News --}}
<div id="news-modal" class="fixed inset-0 z-50 hidden items-center justify-center p-4 bg-gray-900/60 backdrop-blur-sm">
    <div class="bg-white dark:bg-gray-800 w-full max-w-2xl rounded-xl shadow-2xl max-h-[90vh] overflow-y-auto">
        <div class="flex items-center justify-between p-5 border-b border-gray-100 dark:border-gray-700 sticky top-0 bg-white dark:bg-gray-800 z-10">
            <h3 id="news-modal-title" class="text-lg font-bold text-[#070049] dark:text-white">Ongeza Taarifa Mpya</h3>
            <button type="button" onclick="closeNewsModal()" class="text-gray-400 hover:text-gray-600 dark:hover:text-white">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>

        <form id="news-form" method="POST" action="{{ route('admin.news.store') }}" enctype="multipart/form-data" class="p-5 space-y-4">
            @csrf
            <input type="hidden" name="_method" id="news-method" value="POST">

            {{-- Aina --}}
            <div>
                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">Aina ya Taarifa</label>
                <select name="type" id="news-type" onchange="toggleNewsFields()" required
                    class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-[#f79120] focus:border-[#f79120]">
                    <option value="news">News</option>
                    <option value="event">Event</option>
                    <option value="publication">Publication</option>
                    <option value="report">Report</option>
                    <option value="media">Media</option>
                </select>
            </div>

            {{-- Kichwa --}}
            <div>
                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">Kichwa (Title)</label>
                <input type="text" name="title" id="news-title" required
                    class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-[#f79120] focus:border-[#f79120]">
            </div>

            {{-- Maelezo mafupi --}}
            <div>
                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">Maelezo Mafupi (Excerpt) <span class="text-gray-400 font-normal">- si lazima</span></label>
                <input type="text" name="excerpt" id="news-excerpt" maxlength="255"
                    class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-[#f79120] focus:border-[#f79120]">
            </div>

            {{-- Maudhui kamili --}}
            <div>
                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">Maudhui Kamili (Body)</label>
                <textarea name="body" id="news-body" rows="5" required
                    class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-[#f79120] focus:border-[#f79120]"></textarea>
            </div>

            {{-- Picha --}}
            <div>
                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">Picha (Cover Image)</label>
                <input type="file" name="image" accept="image/*"
                    class="w-full text-sm text-gray-600 dark:text-gray-300 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-[#f79120]/10 file:text-[#f79120] file:font-semibold hover:file:bg-[#f79120]/20">
                <img id="news-current-image" src="" class="mt-2 h-20 rounded-lg hidden object-cover">
            </div>

            {{-- Tarehe ya kuchapisha --}}
            <div>
                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">Tarehe ya Kuchapisha</label>
                <input type="date" name="published_at" id="news-published_at"
                    class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-[#f79120] focus:border-[#f79120]">
            </div>

            {{-- EVENT FIELDS --}}
            <div id="fields-event" class="hidden grid grid-cols-1 sm:grid-cols-2 gap-4 p-4 rounded-lg bg-purple-50 dark:bg-purple-900/10 border border-purple-100 dark:border-purple-900/30">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">Tarehe ya Event</label>
                    <input type="date" name="event_date" id="news-event_date"
                        class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-[#f79120] focus:border-[#f79120]">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">Mahali (Location)</label>
                    <input type="text" name="location" id="news-location"
                        class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-[#f79120] focus:border-[#f79120]">
                </div>
            </div>

            {{-- PUBLICATION / REPORT FIELDS --}}
            <div id="fields-file" class="hidden p-4 rounded-lg bg-green-50 dark:bg-green-900/10 border border-green-100 dark:border-green-900/30">
                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">Faili (PDF/DOC)</label>
                <input type="file" name="file" accept=".pdf,.doc,.docx"
                    class="w-full text-sm text-gray-600 dark:text-gray-300 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-green-100 file:text-green-700 file:font-semibold hover:file:bg-green-200">
                <a id="news-current-file" href="#" target="_blank" class="hidden text-xs text-green-700 dark:text-green-400 underline mt-2 inline-block">Ona faili la sasa</a>
            </div>

            {{-- MEDIA FIELDS --}}
            <div id="fields-media" class="hidden p-4 rounded-lg bg-pink-50 dark:bg-pink-900/10 border border-pink-100 dark:border-pink-900/30 space-y-3">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">Chanzo cha Video</label>
                    <select name="video_source" id="news-video_source" onchange="toggleVideoSource()"
                        class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-[#f79120] focus:border-[#f79120]">
                        <option value="upload">Pakia Video (Upload)</option>
                        <option value="youtube">YouTube Link</option>
                    </select>
                </div>
                <div id="video-upload-wrap">
                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">Faili la Video</label>
                    <input type="file" name="video" accept="video/*"
                        class="w-full text-sm text-gray-600 dark:text-gray-300 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-pink-100 file:text-pink-700 file:font-semibold hover:file:bg-pink-200">
                </div>
                <div id="video-youtube-wrap" class="hidden">
                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">YouTube URL</label>
                    <input type="url" name="youtube_url" id="news-youtube_url" placeholder="https://www.youtube.com/watch?v=..."
                        class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-[#f79120] focus:border-[#f79120]">
                </div>
            </div>

            {{-- Status --}}
            <div class="flex items-center gap-2">
                <input type="checkbox" name="is_active" id="news-is_active" value="1" checked
                    class="rounded border-gray-300 text-[#f79120] focus:ring-[#f79120]">
                <label for="news-is_active" class="text-sm font-semibold text-gray-700 dark:text-gray-300">Onyesha kwenye website (Active)</label>
            </div>

            <div id="news-form-error" class="hidden p-3 rounded-lg bg-red-50 dark:bg-red-900/30 text-red-700 dark:text-red-400 text-sm"></div>

            <div class="flex justify-end gap-3 pt-4 border-t border-gray-100 dark:border-gray-700">
                <button type="button" onclick="closeNewsModal()"
                    class="px-4 py-2 rounded-lg text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 font-semibold transition">
                    Ghairi
                </button>
                <button type="submit" id="news-submit-btn"
                    class="px-5 py-2 rounded-lg bg-[#070049] hover:bg-[#0a0066] text-white font-semibold shadow transition">
                    Hifadhi
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function toggleNewsFields() {
        const type = document.getElementById('news-type').value;
        document.getElementById('fields-event').classList.toggle('hidden', type !== 'event');
        document.getElementById('fields-file').classList.toggle('hidden', !['publication', 'report'].includes(type));
        document.getElementById('fields-media').classList.toggle('hidden', type !== 'media');
    }

    function toggleVideoSource() {
        const source = document.getElementById('news-video_source').value;
        document.getElementById('video-upload-wrap').classList.toggle('hidden', source !== 'upload');
        document.getElementById('video-youtube-wrap').classList.toggle('hidden', source !== 'youtube');
    }

    function openNewsModal(item = null) {
        const modal = document.getElementById('news-modal');
        const form = document.getElementById('news-form');
        const title = document.getElementById('news-modal-title');
        const methodField = document.getElementById('news-method');

        form.reset();
        document.getElementById('news-current-image').classList.add('hidden');
        document.getElementById('news-current-file').classList.add('hidden');
        document.getElementById('news-form-error').classList.add('hidden');

        if (item) {
            title.textContent = 'Hariri: ' + item.title;
            form.action = `{{ url('admin/news') }}/${item.id}`;
            methodField.value = 'PUT';

            document.getElementById('news-type').value = item.type;
            document.getElementById('news-title').value = item.title;
            document.getElementById('news-excerpt').value = item.excerpt ?? '';
            document.getElementById('news-body').value = item.body ?? '';
            document.getElementById('news-published_at').value = item.published_at ? item.published_at.split('T')[0] : '';
            document.getElementById('news-event_date').value = item.event_date ? item.event_date.split('T')[0] : '';
            document.getElementById('news-location').value = item.location ?? '';
            document.getElementById('news-youtube_url').value = item.youtube_url ?? '';
            document.getElementById('news-video_source').value = item.video_source ?? 'upload';
            document.getElementById('news-is_active').checked = !!item.is_active;

            if (item.image) {
                const img = document.getElementById('news-current-image');
                img.src = `/storage/${item.image}`;
                img.classList.remove('hidden');
            }
            if (item.file) {
                const fileLink = document.getElementById('news-current-file');
                fileLink.href = `/storage/${item.file}`;
                fileLink.classList.remove('hidden');
            }
        } else {
            title.textContent = 'Ongeza Taarifa Mpya';
            form.action = `{{ route('admin.news.store') }}`;
            methodField.value = 'POST';
            document.getElementById('news-is_active').checked = true;
        }

        toggleNewsFields();
        toggleVideoSource();

        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function closeNewsModal() {
        const modal = document.getElementById('news-modal');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }

    // Sasisha jedwali pekee kwa AJAX - bila kureload page nzima
    async function refreshNewsTable() {
        const res = await fetch(`{{ route('admin.news.table-rows') }}`, {
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        });
        const html = await res.text();
        document.getElementById('news-table-body').innerHTML = html;
    }

    // SUBMIT (Ongeza / Hariri) kwa AJAX
    document.getElementById('news-form').addEventListener('submit', async function (e) {
        e.preventDefault();

        const form = e.target;
        const submitBtn = document.getElementById('news-submit-btn');
        const errorBox = document.getElementById('news-form-error');
        errorBox.classList.add('hidden');

        const originalText = submitBtn.textContent;
        submitBtn.disabled = true;
        submitBtn.textContent = 'Inahifadhi...';

        try {
            const formData = new FormData(form);

            const response = await fetch(form.action, {
                method: 'POST', // _method field inashughulikia PUT spoofing
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json',
                },
                body: formData,
            });

            const data = await response.json();

            if (!response.ok) {
                if (response.status === 422 && data.errors) {
                    const messages = Object.values(data.errors).flat().join(' ');
                    errorBox.textContent = messages;
                } else {
                    errorBox.textContent = data.message || 'Kuna tatizo limetokea. Jaribu tena.';
                }
                errorBox.classList.remove('hidden');
                return;
            }

            closeNewsModal();
            await refreshNewsTable();

            Swal.fire({
                icon: 'success',
                title: 'Umefanikiwa!',
                text: data.message || 'Taarifa imehifadhiwa kikamilifu.',
                timer: 1800,
                showConfirmButton: false,
            });
        } catch (err) {
            errorBox.textContent = 'Imeshindikana kuwasiliana na server. Angalia mtandao wako.';
            errorBox.classList.remove('hidden');
        } finally {
            submitBtn.disabled = false;
            submitBtn.textContent = originalText;
        }
    });

    // FUTA (Delete) kwa AJAX + SweetAlert confirm, kwa row yoyote sasa au itakayoongezwa
    document.addEventListener('submit', function (e) {
        if (!e.target.classList.contains('js-delete-news-form')) return;
        e.preventDefault();

        const form = e.target;

        Swal.fire({
            title: 'Una uhakika?',
            text: 'Taarifa hii itafutwa kabisa na haitarudi tena.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ndiyo, futa!',
            cancelButtonText: 'Ghairi',
            confirmButtonColor: '#dc2626',
            cancelButtonColor: '#6b7280',
        }).then(async (result) => {
            if (!result.isConfirmed) return;

            try {
                const formData = new FormData(form);
                const response = await fetch(form.action, {
                    method: 'POST',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json',
                    },
                    body: formData,
                });

                const data = await response.json();

                if (!response.ok) {
                    Swal.fire('Hitilafu!', data.message || 'Imeshindwa kufuta.', 'error');
                    return;
                }

                await refreshNewsTable();

                Swal.fire({
                    icon: 'success',
                    title: 'Imefutwa!',
                    text: data.message || 'Taarifa imefutwa kikamilifu.',
                    timer: 1500,
                    showConfirmButton: false,
                });
            } catch (err) {
                Swal.fire('Hitilafu!', 'Imeshindikana kuwasiliana na server.', 'error');
            }
        });
    });

    // Event delegation: bofya "Hariri" kwenye row yoyote ya jedwali (ikiwemo zilizoongezwa na AJAX refresh)
    document.addEventListener('click', function (e) {
        const editBtn = e.target.closest('.js-edit-news');
        if (!editBtn) return;

        try {
            const item = JSON.parse(editBtn.dataset.news);
            openNewsModal(item);
        } catch (err) {
            console.error('Imeshindwa kusoma taarifa za news kwa ajili ya kuhariri:', err);
        }
    });
</script>