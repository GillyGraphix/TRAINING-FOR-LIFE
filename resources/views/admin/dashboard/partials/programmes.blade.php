{{-- ADMIN PARTIAL: OUR PROGRAMMES --}}
<div id="programmes-tab" class="tab-content hidden">
    <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700">

        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
            <div>
                <h2 class="text-xl font-bold text-[#070049] dark:text-white">Our Programmes</h2>
                <p class="text-sm text-gray-500 dark:text-gray-400">Simamia programmes zinazoonekana kwenye website (Our Programmes page).</p>
            </div>
            <button type="button" onclick="openProgrammeModal()" class="inline-flex items-center gap-2 bg-[#f79120] hover:bg-[#e07f10] text-white font-semibold px-4 py-2 rounded-lg shadow transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                Ongeza Programme
            </button>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full text-sm text-left">
                <thead class="bg-gray-50 dark:bg-gray-700 text-gray-600 dark:text-gray-300 uppercase text-xs">
                    <tr>
                        <th class="px-4 py-3">Picha</th>
                        <th class="px-4 py-3">#</th>
                        <th class="px-4 py-3">Kichwa</th>
                        <th class="px-4 py-3">Muhtasari</th>
                        <th class="px-4 py-3">Sections</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3 text-right">Vitendo</th>
                    </tr>
                </thead>
                <tbody id="programmes-table-body" class="divide-y divide-gray-100 dark:divide-gray-700">
                    @include('admin.dashboard.partials.programmes-table-rows')
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- MODAL: Ongeza / Hariri Programme --}}
<div id="programme-modal" class="fixed inset-0 z-50 hidden items-center justify-center p-4 bg-gray-900/60 backdrop-blur-sm">
    <div class="bg-white dark:bg-gray-800 w-full max-w-3xl rounded-xl shadow-2xl max-h-[90vh] overflow-y-auto">
        <div class="flex items-center justify-between p-5 border-b border-gray-100 dark:border-gray-700 sticky top-0 bg-white dark:bg-gray-800 z-10">
            <h3 id="programme-modal-title" class="text-lg font-bold text-[#070049] dark:text-white">Ongeza Programme Mpya</h3>
            <button type="button" onclick="closeProgrammeModal()" class="text-gray-400 hover:text-gray-600 dark:hover:text-white">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>

        <form id="programme-form" method="POST" action="{{ route('admin.programmes.store') }}" enctype="multipart/form-data" class="p-5 space-y-4">
            @csrf
            <input type="hidden" name="_method" id="programme-method" value="POST">

            {{-- Kichwa + Subtitle --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">Kichwa (Title)</label>
                    <input type="text" name="title" id="programme-title" required
                        class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-[#f79120] focus:border-[#f79120]">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">Subtitle <span class="text-gray-400 font-normal">- si lazima</span></label>
                    <input type="text" name="subtitle" id="programme-subtitle" maxlength="255"
                        class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-[#f79120] focus:border-[#f79120]">
                </div>
            </div>

            {{-- Muhtasari (Summary) --}}
            <div>
                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">Muhtasari (Summary) <span class="text-gray-400 font-normal">- inaonekana kwenye card, kabla ya "Read more"</span></label>
                <textarea name="summary" id="programme-summary" rows="3" maxlength="500" required
                    class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-[#f79120] focus:border-[#f79120]"></textarea>
            </div>

            {{-- Picha + Order --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">Picha <span class="text-gray-400 font-normal">- si lazima</span></label>
                    <input type="file" name="image" id="programme-image-input" accept="image/jpeg,image/png,image/webp"
                        class="w-full text-sm text-gray-600 dark:text-gray-300 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-[#f79120]/10 file:text-[#f79120] file:font-semibold hover:file:bg-[#f79120]/20">
                    <p class="text-xs text-gray-400 mt-1">Picha ya mlalo (uwiano 3:2), mfano 1200&times;800. JPG, PNG au WEBP, isizidi MB 2.</p>
                    <p id="programme-image-error" class="hidden text-xs font-semibold text-red-600 dark:text-red-400 mt-1"></p>

                    {{-- Hakikisho: inaonyesha picha kama itakavyokatwa kwenye card ya website --}}
                    <div id="programme-image-preview-wrap" class="hidden mt-3">
                        <div class="overflow-hidden rounded-lg border border-gray-200 dark:border-gray-600 bg-gray-100 dark:bg-gray-700" style="aspect-ratio: 3 / 2; max-width: 20rem;">
                            <img id="programme-current-image" src="" alt="Hakikisho la picha" class="w-full h-full object-cover">
                        </div>
                        <p id="programme-image-note" class="text-xs text-gray-400 mt-1">Hivi ndivyo picha itakavyoonekana kwenye card.</p>
                    </div>

                    {{-- Inaonekana wakati wa kuhariri programme yenye picha --}}
                    <label id="programme-remove-image-wrap" class="hidden mt-2 inline-flex items-center gap-2 text-xs font-semibold text-red-600 dark:text-red-400">
                        <input type="checkbox" name="remove_image" id="programme-remove-image" value="1" class="rounded border-gray-300 text-red-600 focus:ring-red-500">
                        Ondoa picha ya sasa
                    </label>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">Mpangilio (Order)</label>
                    <input type="number" name="order" id="programme-order" min="0" value="0"
                        class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-[#f79120] focus:border-[#f79120]">
                    <p class="text-xs text-gray-400 mt-1">Namba ndogo huonekana kwanza.</p>
                </div>
            </div>

            {{-- SECTIONS BUILDER --}}
            <div class="p-4 rounded-lg bg-gray-50 dark:bg-gray-700/30 border border-gray-200 dark:border-gray-700">
                <div class="flex items-center justify-between mb-3">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Sections (Vipande vya Maelezo Marefu)</label>
                        <p class="text-xs text-gray-400">Hivi ndivyo vinavyoonekana ukibofya "Read more" kwenye website. Kila section ina Kichwa (Label) na Maudhui (Content).</p>
                    </div>
                    <button type="button" onclick="addSectionRow()" class="shrink-0 inline-flex items-center gap-1 text-xs font-semibold text-[#f79120] hover:text-[#e07f10] border border-[#f79120]/40 hover:border-[#f79120] rounded-lg px-3 py-1.5 transition">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                        Ongeza Section
                    </button>
                </div>

                <div id="sections-container" class="space-y-3"></div>

                <p id="sections-empty-msg" class="text-xs text-gray-400 italic">Bado hakuna sections. Bofya "Ongeza Section" ukitaka programme hii ionyeshe maelezo marefu (modal ya "Read more").</p>
            </div>

            {{-- Status --}}
            <div class="flex items-center gap-2">
                <input type="checkbox" name="is_active" id="programme-is_active" value="1" checked
                    class="rounded border-gray-300 text-[#f79120] focus:ring-[#f79120]">
                <label for="programme-is_active" class="text-sm font-semibold text-gray-700 dark:text-gray-300">Onyesha kwenye website (Active)</label>
            </div>

            <div id="programme-form-error" class="hidden p-3 rounded-lg bg-red-50 dark:bg-red-900/30 text-red-700 dark:text-red-400 text-sm"></div>

            <div class="flex justify-end gap-3 pt-4 border-t border-gray-100 dark:border-gray-700">
                <button type="button" onclick="closeProgrammeModal()"
                    class="px-4 py-2 rounded-lg text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 font-semibold transition">
                    Ghairi
                </button>
                <button type="submit" id="programme-submit-btn"
                    class="px-5 py-2 rounded-lg bg-[#070049] hover:bg-[#0a0066] text-white font-semibold shadow transition">
                    Hifadhi
                </button>
            </div>
        </form>
    </div>
</div>

{{-- TEMPLATE ya section row moja (haitumiki live, JS ina-clone) --}}
<template id="section-row-template">
    <div class="section-row bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-600 rounded-lg p-4 space-y-3">
        <div class="flex items-start justify-between gap-3">
            <div class="flex-1 space-y-3">
                <div>
                    <label class="block text-xs font-semibold text-gray-500 dark:text-gray-400 mb-1">Kichwa cha Section (Label)</label>
                    <input type="text" class="section-label w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white text-sm focus:ring-[#f79120] focus:border-[#f79120]" placeholder="mf. Overview, Malengo, Vigezo vya Kujiunga">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-500 dark:text-gray-400 mb-1">Maudhui (Content)</label>
                    <textarea class="section-content w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white text-sm focus:ring-[#f79120] focus:border-[#f79120]" rows="3" placeholder="Andika maelezo ya kipande hiki..."></textarea>
                </div>
                <label class="inline-flex items-center gap-2 text-xs font-semibold text-gray-600 dark:text-gray-300">
                    <input type="checkbox" class="section-highlight rounded border-gray-300 text-[#f79120] focus:ring-[#f79120]">
                    Highlight (onyesha kwa mtindo maalum - kwa mfano habari muhimu)
                </label>
            </div>
            <button type="button" onclick="removeSectionRow(this)" class="shrink-0 p-2 rounded-lg bg-red-50 hover:bg-red-100 text-red-600 dark:bg-red-900/30 dark:hover:bg-red-900/50 dark:text-red-400 transition" title="Ondoa section hii">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
            </button>
        </div>
    </div>
</template>

<script>
    let sectionRowCounter = 0;

    // ---- Picha: hakikisho + ukaguzi wa aina na ukubwa ----
    const PROGRAMME_IMAGE_MAX_MB = 2;
    const PROGRAMME_IMAGE_TYPES = ['image/jpeg', 'image/png', 'image/webp'];
    let programmeSavedImageUrl = '';   // picha iliyohifadhiwa tayari (wakati wa kuhariri)

    function programmeImageUrl(path) {
        if (!path) return '';
        return /^(https?:)?\/\//.test(path) || path.startsWith('/') ? path : `/storage/${path}`;
    }

    function setProgrammePreview(url, note) {
        const wrap = document.getElementById('programme-image-preview-wrap');
        const img = document.getElementById('programme-current-image');
        const noteEl = document.getElementById('programme-image-note');

        if (!url) {
            img.removeAttribute('src');
            wrap.classList.add('hidden');
            return;
        }
        img.src = url;
        noteEl.textContent = note;
        wrap.classList.remove('hidden');
    }

    function showProgrammeImageError(message) {
        const el = document.getElementById('programme-image-error');
        el.textContent = message || '';
        el.classList.toggle('hidden', !message);
    }

    function resetProgrammeImageUi() {
        programmeSavedImageUrl = '';
        showProgrammeImageError('');
        setProgrammePreview('', '');
        document.getElementById('programme-remove-image-wrap').classList.add('hidden');
        document.getElementById('programme-current-image').classList.remove('opacity-30');
    }

    document.getElementById('programme-image-input').addEventListener('change', function () {
        const file = this.files && this.files[0];
        showProgrammeImageError('');
        document.getElementById('programme-remove-image').checked = false;
        document.getElementById('programme-current-image').classList.remove('opacity-30');

        if (!file) {
            // Hakuna faili mpya: rudisha picha iliyohifadhiwa (kama ipo)
            setProgrammePreview(programmeSavedImageUrl, 'Picha ya sasa. Chagua faili jipya ukitaka kuibadilisha.');
            return;
        }

        if (!PROGRAMME_IMAGE_TYPES.includes(file.type)) {
            this.value = '';
            showProgrammeImageError('Aina ya faili hairuhusiwi. Tumia JPG, PNG au WEBP.');
            setProgrammePreview(programmeSavedImageUrl, 'Picha ya sasa. Chagua faili jipya ukitaka kuibadilisha.');
            return;
        }

        if (file.size > PROGRAMME_IMAGE_MAX_MB * 1024 * 1024) {
            this.value = '';
            const sizeMb = (file.size / 1024 / 1024).toFixed(1);
            showProgrammeImageError(`Picha ni nzito sana (MB ${sizeMb}). Kikomo ni MB ${PROGRAMME_IMAGE_MAX_MB}. Ipunguze kwanza.`);
            setProgrammePreview(programmeSavedImageUrl, 'Picha ya sasa. Chagua faili jipya ukitaka kuibadilisha.');
            return;
        }

        setProgrammePreview(URL.createObjectURL(file), 'Picha mpya (bado haijahifadhiwa). Hivi ndivyo itakavyoonekana kwenye card.');
    });

    document.getElementById('programme-remove-image').addEventListener('change', function () {
        document.getElementById('programme-current-image').classList.toggle('opacity-30', this.checked);
        if (this.checked) {
            document.getElementById('programme-image-input').value = '';
            showProgrammeImageError('');
        }
    });

    function updateSectionsEmptyMsg() {
        const container = document.getElementById('sections-container');
        const emptyMsg = document.getElementById('sections-empty-msg');
        emptyMsg.classList.toggle('hidden', container.children.length > 0);
    }

    function addSectionRow(section = null) {
        const template = document.getElementById('section-row-template');
        const container = document.getElementById('sections-container');
        const clone = template.content.cloneNode(true);

        const index = sectionRowCounter++;

        const labelInput = clone.querySelector('.section-label');
        const contentInput = clone.querySelector('.section-content');
        const highlightInput = clone.querySelector('.section-highlight');

        labelInput.name = `sections[${index}][label]`;
        contentInput.name = `sections[${index}][content]`;
        highlightInput.name = `sections[${index}][highlight]`;
        highlightInput.value = '1';

        if (section) {
            labelInput.value = section.label ?? '';
            contentInput.value = section.content ?? '';
            highlightInput.checked = !!section.highlight;
        }

        container.appendChild(clone);
        updateSectionsEmptyMsg();
    }

    function removeSectionRow(button) {
        const row = button.closest('.section-row');
        row.remove();
        updateSectionsEmptyMsg();
    }

    function clearSections() {
        document.getElementById('sections-container').innerHTML = '';
        updateSectionsEmptyMsg();
    }

    function openProgrammeModal(item = null) {
        const modal = document.getElementById('programme-modal');
        const form = document.getElementById('programme-form');
        const title = document.getElementById('programme-modal-title');
        const methodField = document.getElementById('programme-method');

        form.reset();
        clearSections();
        resetProgrammeImageUi();
        document.getElementById('programme-form-error').classList.add('hidden');

        if (item) {
            title.textContent = 'Hariri: ' + item.title;
            form.action = `{{ url('admin/programmes') }}/${item.id}`;
            methodField.value = 'PUT';

            document.getElementById('programme-title').value = item.title ?? '';
            document.getElementById('programme-subtitle').value = item.subtitle ?? '';
            document.getElementById('programme-summary').value = item.summary ?? '';
            document.getElementById('programme-order').value = item.order ?? 0;
            document.getElementById('programme-is_active').checked = !!item.is_active;

            if (item.image) {
                programmeSavedImageUrl = programmeImageUrl(item.image);
                setProgrammePreview(programmeSavedImageUrl, 'Picha ya sasa. Chagua faili jipya ukitaka kuibadilisha.');
                document.getElementById('programme-remove-image-wrap').classList.remove('hidden');
            }

            if (Array.isArray(item.sections)) {
                item.sections.forEach(section => addSectionRow(section));
            }
        } else {
            title.textContent = 'Ongeza Programme Mpya';
            form.action = `{{ route('admin.programmes.store') }}`;
            methodField.value = 'POST';
            document.getElementById('programme-order').value = 0;
            document.getElementById('programme-is_active').checked = true;
        }

        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function closeProgrammeModal() {
        const modal = document.getElementById('programme-modal');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }

    // Sasisha jedwali pekee kwa AJAX - bila kureload page nzima
    async function refreshProgrammesTable() {
        const res = await fetch(`{{ route('admin.programmes.table-rows') }}`, {
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        });
        const html = await res.text();
        document.getElementById('programmes-table-body').innerHTML = html;
    }

    // SUBMIT (Ongeza / Hariri) kwa AJAX
    document.getElementById('programme-form').addEventListener('submit', async function (e) {
        e.preventDefault();

        const form = e.target;
        const submitBtn = document.getElementById('programme-submit-btn');
        const errorBox = document.getElementById('programme-form-error');
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

            closeProgrammeModal();
            await refreshProgrammesTable();

            Swal.fire({
                icon: 'success',
                title: 'Umefanikiwa!',
                text: data.message || 'Programme imehifadhiwa kikamilifu.',
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

    // FUTA (Delete) kwa AJAX + SweetAlert confirm
    document.addEventListener('submit', function (e) {
        if (!e.target.classList.contains('js-delete-programme-form')) return;
        e.preventDefault();

        const form = e.target;

        Swal.fire({
            title: 'Una uhakika?',
            text: 'Programme hii itafutwa kabisa na haitarudi tena.',
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

                await refreshProgrammesTable();

                Swal.fire({
                    icon: 'success',
                    title: 'Imefutwa!',
                    text: data.message || 'Programme imefutwa kikamilifu.',
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
        const editBtn = e.target.closest('.js-edit-programme');
        if (!editBtn) return;

        try {
            const item = JSON.parse(editBtn.dataset.programme);
            openProgrammeModal(item);
        } catch (err) {
            console.error('Imeshindwa kusoma taarifa za programme kwa ajili ya kuhariri:', err);
        }
    });
</script>