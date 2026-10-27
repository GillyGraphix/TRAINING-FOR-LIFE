{{-- ADMIN PARTIAL: PARTNERS --}}
<div id="partners-tab" class="tab-content hidden">
    <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700">

        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
            <div>
                <h2 class="text-xl font-bold text-[#070049] dark:text-white">Partners</h2>
                <p class="text-sm text-gray-500 dark:text-gray-400">
                    Ongeza au hariri jina, logo na link ya website ya partner.
                </p>
            </div>

            <button type="button" onclick="openPartnerModal()"
                class="inline-flex items-center gap-2 bg-[#f79120] hover:bg-[#e07f10] text-white font-semibold px-4 py-2 rounded-lg shadow transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Ongeza Partner
            </button>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full text-sm text-left">
                <thead class="bg-gray-50 dark:bg-gray-700 text-gray-600 dark:text-gray-300 uppercase text-xs">
                    <tr>
                        <th class="px-4 py-3">Logo</th>
                        <th class="px-4 py-3">Jina</th>
                        <th class="px-4 py-3">Website</th>
                        <th class="px-4 py-3">Mpangilio</th>
                        <th class="px-4 py-3">Hali</th>
                        <th class="px-4 py-3 text-right">Vitendo</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                    @forelse ($partnersList as $partner)
                        <tr>
                            <td class="px-4 py-3">
                                @if ($partner->logo_path)
                                    <img src="{{ asset('storage/' . $partner->logo_path) }}"
                                         alt="{{ $partner->name ?? 'Partner logo' }}"
                                         class="h-12 w-20 object-contain">
                                @else
                                    <span class="text-gray-400">Hakuna logo</span>
                                @endif
                            </td>

                            <td class="px-4 py-3 text-gray-800 dark:text-gray-200">
                                {{ $partner->name ?: '—' }}
                            </td>

                            <td class="px-4 py-3">
                                @if ($partner->website_url)
                                    <a href="{{ $partner->website_url }}"
                                       target="_blank"
                                       rel="noopener noreferrer"
                                       class="text-blue-600 dark:text-blue-400 underline">
                                        Fungua website
                                    </a>
                                @else
                                    <span class="text-gray-400">—</span>
                                @endif
                            </td>

                            <td class="px-4 py-3">{{ $partner->order }}</td>

                            <td class="px-4 py-3">
                                {{ $partner->is_active ? 'Active' : 'Imefichwa' }}
                            </td>

                            <td class="px-4 py-3 text-right whitespace-nowrap">
                                <button type="button"
                                    class="js-edit-partner inline-flex items-center justify-center p-2 text-blue-600 hover:text-blue-800 hover:bg-blue-50 rounded-lg transition"
                                    data-partner-id="{{ $partner->id }}"
                                    data-partner-name="{{ $partner->name }}"
                                    data-partner-logo="{{ $partner->logo_path }}"
                                    data-partner-website="{{ $partner->website_url }}"
                                    data-partner-active="{{ $partner->is_active ? '1' : '0' }}"
                                    data-partner-order="{{ $partner->order }}"
                                    title="Hariri"
                                    aria-label="Hariri partner">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                    </svg>
                                </button>

                                <button type="button"
                                    class="js-delete-partner inline-flex items-center justify-center p-2 text-red-600 hover:text-red-800 hover:bg-red-50 rounded-lg transition"
                                    data-partner-id="{{ $partner->id }}"
                                    title="Futa"
                                    aria-label="Futa partner">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M3 6h18M8 6V4h8v2m-9 0l1 14h8l1-14M10 11v6m4-6v6"></path>
                                    </svg>
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-4 py-6 text-center text-gray-500">
                                Bado hakuna partners walioongezwa.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- MODAL: Ongeza / Hariri Partner --}}
<div id="partner-modal"
     data-store-url="/admin/partners"
     data-base-url="/admin/partners"
     data-storage-url="/storage"
     class="fixed inset-0 z-50 hidden items-center justify-center p-4 bg-gray-900/60">

    <div class="bg-white dark:bg-gray-800 w-full max-w-xl rounded-xl shadow-2xl max-h-[90vh] overflow-y-auto">
        <div class="flex items-center justify-between p-5 border-b border-gray-100 dark:border-gray-700">
            <h3 id="partner-modal-title" class="text-lg font-bold text-[#070049] dark:text-white">
                Ongeza Partner
            </h3>

            <button type="button" onclick="closePartnerModal()"
                class="text-gray-500 hover:text-gray-800 dark:hover:text-white">
                ✕
            </button>
        </div>

        <form id="partner-form" method="POST" enctype="multipart/form-data" class="p-5 space-y-4">
            @csrf
            <input type="hidden" name="_method" id="partner-method" value="POST">

            <div>
                <label for="partner-name" class="block text-sm font-semibold mb-1 dark:text-gray-200">
                    Jina la Partner
                    <span class="font-normal text-gray-400">(si lazima ukiweka logo)</span>
                </label>
                <input id="partner-name" name="name" type="text" maxlength="255"
                    class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white">
            </div>

            <div>
                <label for="partner-logo" class="block text-sm font-semibold mb-1 dark:text-gray-200">
                    Logo
                    <span class="font-normal text-gray-400">(JPG, PNG au WebP; hadi 3 MB)</span>
                </label>
                <input id="partner-logo" name="logo" type="file" accept=".jpg,.jpeg,.png,.webp"
                    class="w-full text-sm text-gray-600 dark:text-gray-300">
                <img id="partner-current-logo" src="" alt="Logo ya sasa"
                    class="hidden mt-3 h-16 w-28 object-contain">
            </div>

            <div>
                <label for="partner-website" class="block text-sm font-semibold mb-1 dark:text-gray-200">
                    Link ya website
                    <span class="font-normal text-gray-400">(si lazima)</span>
                </label>
                <input id="partner-website" name="website_url" type="url"
                    placeholder="https://example.com"
                    class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white">
            </div>

            <label class="flex items-center gap-2 text-sm dark:text-gray-200">
                <input id="partner-active" name="is_active" type="checkbox" value="1" checked>
                Onyesha kwenye website
            </label>

            <div>
                <label for="partner-order" class="block text-sm font-semibold mb-1 dark:text-gray-200">
                    Mpangilio
                </label>
                <input id="partner-order" name="order" type="number" min="0" value="0"
                    class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white">
            </div>

            <label id="partner-remove-logo-wrap" class="hidden items-center gap-2 text-sm text-red-600">
                <input id="partner-remove-logo" name="remove_logo" type="checkbox" value="1">
                Ondoa logo ya sasa
            </label>

            <div id="partner-error" class="hidden rounded-lg bg-red-50 p-3 text-sm text-red-700"></div>

            <div class="flex justify-end gap-3 pt-4 border-t border-gray-100 dark:border-gray-700">
                <button type="button" onclick="closePartnerModal()"
                    class="px-4 py-2 rounded-lg text-gray-600 hover:bg-gray-100">
                    Ghairi
                </button>

                <button id="partner-submit" type="submit"
                    class="px-5 py-2 rounded-lg bg-[#070049] text-white font-semibold">
                    Hifadhi
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    const partnerModal = document.getElementById('partner-modal');
    const partnerForm = document.getElementById('partner-form');

    function openPartnerModal() {
        partnerForm.reset();
        partnerForm.action = partnerModal.dataset.storeUrl;

        document.getElementById('partner-method').value = 'POST';
        document.getElementById('partner-modal-title').textContent = 'Ongeza Partner';
        document.getElementById('partner-active').checked = true;
        document.getElementById('partner-order').value = 0;
        document.getElementById('partner-current-logo').classList.add('hidden');
        document.getElementById('partner-remove-logo-wrap').classList.add('hidden');
        document.getElementById('partner-error').classList.add('hidden');

        partnerModal.classList.remove('hidden');
        partnerModal.classList.add('flex');
    }

    function editPartner(button) {
        const data = button.dataset;

        partnerForm.reset();
        partnerForm.action = partnerModal.dataset.baseUrl + '/' + data.partnerId;

        document.getElementById('partner-method').value = 'PUT';
        document.getElementById('partner-modal-title').textContent = 'Hariri Partner';
        document.getElementById('partner-name').value = data.partnerName || '';
        document.getElementById('partner-website').value = data.partnerWebsite || '';
        document.getElementById('partner-active').checked = data.partnerActive === '1';
        document.getElementById('partner-order').value = data.partnerOrder || 0;
        document.getElementById('partner-error').classList.add('hidden');

        const logo = document.getElementById('partner-current-logo');
        const removeLogoWrap = document.getElementById('partner-remove-logo-wrap');

        if (data.partnerLogo) {
            logo.src = partnerModal.dataset.storageUrl + '/' + data.partnerLogo;
            logo.classList.remove('hidden');
            removeLogoWrap.classList.remove('hidden');
            removeLogoWrap.classList.add('flex');
        } else {
            logo.classList.add('hidden');
            removeLogoWrap.classList.add('hidden');
        }

        partnerModal.classList.remove('hidden');
        partnerModal.classList.add('flex');
    }

    function closePartnerModal() {
        partnerModal.classList.add('hidden');
        partnerModal.classList.remove('flex');
    }

    partnerForm.addEventListener('submit', async function (event) {
        event.preventDefault();

        const errorBox = document.getElementById('partner-error');
        const submitButton = document.getElementById('partner-submit');

        errorBox.classList.add('hidden');
        submitButton.disabled = true;
        submitButton.textContent = 'Inahifadhi...';

        try {
            const response = await fetch(partnerForm.action, {
                method: 'POST',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                },
                body: new FormData(partnerForm)
            });

            const data = await response.json();

            if (!response.ok) {
                errorBox.textContent = data.errors
                    ? Object.values(data.errors).flat().join(' ')
                    : (data.message || 'Imeshindikana kuhifadhi partner.');
                errorBox.classList.remove('hidden');
                return;
            }

            closePartnerModal();

            await Swal.fire({
                icon: 'success',
                title: 'Imehifadhiwa!',
                text: data.message || 'Taarifa za partner zimehifadhiwa.',
                timer: 1600,
                showConfirmButton: false
            });

            window.location.reload();
        } catch (error) {
            errorBox.textContent = 'Imeshindikana kuwasiliana na server.';
            errorBox.classList.remove('hidden');
        } finally {
            submitButton.disabled = false;
            submitButton.textContent = 'Hifadhi';
        }
    });

    document.addEventListener('click', function (event) {
        const editButton = event.target.closest('.js-edit-partner');

        if (editButton) {
            editPartner(editButton);
            return;
        }

        const deleteButton = event.target.closest('.js-delete-partner');

        if (deleteButton) {
            deletePartner(deleteButton.dataset.partnerId);
        }
    });

    async function deletePartner(id) {
        const confirmation = await Swal.fire({
            title: 'Una uhakika?',
            text: 'Una uhakika unataka kufuta partner huyu?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ndiyo, futa',
            cancelButtonText: 'Ghairi',
            confirmButtonColor: '#dc2626',
            cancelButtonColor: '#6b7280'
        });

        if (!confirmation.isConfirmed) {
            return;
        }

        const formData = new FormData();
        const csrfToken = partnerForm.querySelector('input[name="_token"]').value;

        formData.append('_token', csrfToken);
        formData.append('_method', 'DELETE');

        try {
            const response = await fetch(partnerModal.dataset.baseUrl + '/' + id, {
                method: 'POST',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                },
                body: formData
            });

            const data = await response.json();

            if (!response.ok) {
                await Swal.fire({
                    icon: 'error',
                    title: 'Hitilafu!',
                    text: data.message || 'Imeshindikana kufuta partner.'
                });
                return;
            }

            await Swal.fire({
                icon: 'success',
                title: 'Imefutwa!',
                text: data.message || 'Partner amefutwa kikamilifu.',
                timer: 1500,
                showConfirmButton: false
            });

            window.location.reload();
        } catch (error) {
            await Swal.fire({
                icon: 'error',
                title: 'Hitilafu!',
                text: 'Imeshindikana kuwasiliana na server.'
            });
        }
    }
</script>