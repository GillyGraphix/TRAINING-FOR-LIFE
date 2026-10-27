{{-- ADMIN PARTIAL: GALLERY --}}
<div id="gallery-tab" class="tab-content hidden">
    @php
        // DashboardController inapaswa kutumia pluck('name', 'slug')
        $galleryCategoryNames = $galleryCategories ?? collect();
        $galleryImages = $galleryImagesList ?? collect();
    @endphp

    <style>
        #gallery-tab .gallery-action {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: .5rem;
            min-height: 42px;
            padding: .65rem 1.15rem;
            border: 1px solid transparent;
            border-radius: .65rem;
            font-size: .9rem;
            font-weight: 700;
            line-height: 1.2;
            cursor: pointer;
            transition: background-color .15s ease, transform .15s ease;
        }

        #gallery-tab .gallery-action:hover {
            transform: translateY(-1px);
        }

        #gallery-tab .gallery-action:disabled {
            cursor: wait;
            opacity: .65;
            transform: none;
        }

        #gallery-tab .gallery-action-primary {
            color: #fff !important;
            background: #4338ca !important;
            border-color: #4338ca !important;
        }

        #gallery-tab .gallery-action-primary:hover {
            background: #3730a3 !important;
        }

        #gallery-tab .gallery-action-danger {
            color: #fff !important;
            background: #dc2626 !important;
            border-color: #dc2626 !important;
        }

        #gallery-tab .gallery-action-danger:hover {
            background: #b91c1c !important;
        }

        #gallery-tab .gallery-card {
            min-width: 0;
        }
    </style>

    <section class="rounded-2xl bg-white p-4 shadow-sm dark:bg-gray-900 sm:p-6">
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Gallery</h2>
            <p class="mt-1 text-gray-600 dark:text-gray-300">
                Simamia categories na picha za gallery. Unaweza kuchagua picha mara kadhaa,
                kuziona kwenye preview, kisha kuzihifadhi pamoja.
            </p>
        </div>

        <div id="gallery-message" class="mb-5 hidden rounded-lg p-4 text-sm"></div>

        {{-- Ongeza category --}}
        <div class="mb-8 rounded-xl border border-gray-200 p-4 dark:border-gray-700 sm:p-5">
            <h3 class="mb-4 text-lg font-semibold text-gray-900 dark:text-white">
                Ongeza category
            </h3>

            <form action="{{ route('admin.gallery-categories.store') }}"
                  method="POST"
                  data-gallery-form
                  class="grid grid-cols-1 gap-4 md:grid-cols-2">
                @csrf

                <label class="block">
                    <span class="mb-1 block text-sm font-medium text-gray-700 dark:text-gray-200">
                        Jina la category
                    </span>
                    <input type="text"
                           name="name"
                           required
                           maxlength="255"
                           class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-white"
                           placeholder="Mfano: Training">
                </label>

                <label class="block">
                    <span class="mb-1 block text-sm font-medium text-gray-700 dark:text-gray-200">
                        Maelezo ya category (hiari)
                    </span>
                    <input type="text"
                           name="description"
                           maxlength="1000"
                           class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-white"
                           placeholder="Maelezo mafupi">
                </label>

                <label class="block">
                    <span class="mb-1 block text-sm font-medium text-gray-700 dark:text-gray-200">
                        Mpangilio
                    </span>
                    <input type="number"
                           name="sort_order"
                           min="0"
                           value="0"
                           class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-white">
                </label>

                <label class="flex items-center gap-2 pt-2 text-sm text-gray-700 dark:text-gray-200">
                    <input type="checkbox"
                           name="is_active"
                           value="1"
                           checked
                           class="rounded border-gray-300 text-indigo-600">
                    Category ionekane kwenye website
                </label>

                <div class="md:col-span-2">
                    <button type="submit" class="gallery-action gallery-action-primary">
                        Ongeza category
                    </button>
                </div>
            </form>
        </div>

        {{-- Upload picha nyingi --}}
        <div class="mb-10 rounded-xl border border-gray-200 p-4 dark:border-gray-700 sm:p-5">
            <h3 class="mb-2 text-lg font-semibold text-gray-900 dark:text-white">
                Pakia picha
            </h3>

            <p class="mb-5 text-sm text-gray-600 dark:text-gray-300">
                Chagua category, kisha chagua picha mara moja au zaidi. Unaweza kufungua sehemu
                ya kuchagua picha tena kuongeza picha nyingine. Kila picha inaweza kuwa hadi MB 5.
            </p>

            <form action="{{ route('admin.gallery-images.store') }}"
                  method="POST"
                  enctype="multipart/form-data"
                  id="gallery-upload-form"
                  class="space-y-5">
                @csrf

                <label class="block">
                    <span class="mb-1 block text-sm font-medium text-gray-700 dark:text-gray-200">
                        Category
                    </span>

                    <select name="category"
                            required
                            class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-white">
                        <option value="">-- Chagua category --</option>

                        @foreach($galleryCategoryNames as $slug => $categoryName)
                            <option value="{{ $slug }}">{{ $categoryName }}</option>
                        @endforeach
                    </select>
                </label>

                <label class="block">
                    <span class="mb-1 block text-sm font-medium text-gray-700 dark:text-gray-200">
                        Chagua picha
                    </span>

                    <input type="file"
                           name="images[]"
                           id="gallery-image-files"
                           accept=".jpg,.jpeg,.png,.webp,.gif,image/jpeg,image/png,image/webp,image/gif"
                           multiple
                           class="block w-full rounded-lg border border-gray-300 p-2 text-sm text-gray-700 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-200">

                    <span class="mt-1 block text-xs text-gray-500 dark:text-gray-400">
                        Ruhusa: JPG, PNG, WebP au GIF. Unaweza kuongeza picha zaidi kabla ya kuhifadhi.
                    </span>
                </label>

                <div id="gallery-selected-count"
                     class="hidden text-sm font-semibold text-gray-700 dark:text-gray-200"></div>

                <div id="gallery-image-previews"
                     class="hidden grid grid-cols-2 gap-3 sm:grid-cols-3 lg:grid-cols-5"></div>

                <label class="block max-w-xs">
                    <span class="mb-1 block text-sm font-medium text-gray-700 dark:text-gray-200">
                        Mpangilio wa picha ya kwanza
                    </span>

                    <input type="number"
                           name="sort_order"
                           min="0"
                           value="0"
                           class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-white">

                    <span class="mt-1 block text-xs text-gray-500 dark:text-gray-400">
                        Picha zinazofuata zitapangwa mfululizo kuanzia namba hii.
                    </span>
                </label>

                <label class="flex items-center gap-2 text-sm text-gray-700 dark:text-gray-200">
                    <input type="checkbox"
                           name="is_active"
                           value="1"
                           checked
                           class="rounded border-gray-300 text-indigo-600">
                    Picha zionekane kwenye website
                </label>

                <button type="submit" class="gallery-action gallery-action-primary">
                    Hifadhi picha zote
                </button>
            </form>
        </div>

        {{-- Picha kwa kila category --}}
        <div class="space-y-8">
            @forelse($galleryCategoryNames as $categorySlug => $categoryName)
                @php
                    $categoryImages = $galleryImages->where('category', $categorySlug);
                    $categoryRecord = \App\Models\GalleryCategory::where('slug', $categorySlug)->first();
                @endphp

                <section class="rounded-xl border border-gray-200 p-4 dark:border-gray-700 sm:p-5">
                    <div class="mb-5 flex flex-wrap items-start justify-between gap-4">
                        <div>
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white">
                                {{ $categoryName }}

                                <span class="ml-2 rounded-full bg-gray-100 px-2.5 py-1 text-sm font-medium text-gray-700 dark:bg-gray-800 dark:text-gray-200">
                                    {{ $categoryImages->count() }} picha
                                </span>
                            </h3>
                        </div>

                        @if($categoryRecord)
                            <form action="{{ route('admin.gallery-categories.destroy', $categoryRecord->id) }}"
                                  method="POST"
                                  data-gallery-delete
                                  data-confirm="Una uhakika unataka kufuta category hii pamoja na picha zake zote?">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="gallery-action gallery-action-danger">
                                    Futa category na picha zake
                                </button>
                            </form>
                        @endif
                    </div>

                    @if($categoryImages->isNotEmpty())
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-3">
                            @foreach($categoryImages as $galleryImage)
                                <article class="gallery-card overflow-hidden rounded-xl border border-gray-200 dark:border-gray-700">
                                    <img src="{{ \Illuminate\Support\Facades\Storage::url($galleryImage->image_path) }}"
                                         alt="{{ $galleryImage->description ?: $categoryName }}"
                                         loading="lazy"
                                         class="h-32 w-full bg-gray-100 object-cover dark:bg-gray-800">

                                    <form action="{{ route('admin.gallery-images.update', $galleryImage->id) }}"
                                          method="POST"
                                          enctype="multipart/form-data"
                                          data-gallery-form
                                          class="space-y-3 p-3">
                                        @csrf
                                        @method('PUT')

                                        <label class="block">
                                            <span class="mb-1 block text-sm font-medium text-gray-700 dark:text-gray-200">
                                                Category
                                            </span>

                                            <select name="category"
                                                    required
                                                    class="w-full rounded-lg border-gray-300 text-sm dark:border-gray-600 dark:bg-gray-800 dark:text-white">
                                                @foreach($galleryCategoryNames as $slug => $name)
                                                    <option value="{{ $slug }}"
                                                        @selected($galleryImage->category === $slug)>
                                                        {{ $name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </label>

                                        <label class="block">
                                            <span class="mb-1 block text-sm font-medium text-gray-700 dark:text-gray-200">
                                                Maelezo
                                            </span>

                                            <textarea name="description"
                                                      rows="2"
                                                      maxlength="1000"
                                                      class="w-full rounded-lg border-gray-300 text-sm dark:border-gray-600 dark:bg-gray-800 dark:text-white"
                                                      placeholder="Maelezo mafupi ya picha">{{ $galleryImage->description }}</textarea>
                                        </label>

                                        <details class="text-sm">
                                            <summary class="cursor-pointer font-medium text-indigo-700 dark:text-indigo-300">
                                                Badilisha picha (hiari)
                                            </summary>

                                            <input type="file"
                                                   name="image"
                                                   accept=".jpg,.jpeg,.png,.webp,.gif,image/jpeg,image/png,image/webp,image/gif"
                                                   class="mt-2 block w-full text-sm text-gray-700 dark:text-gray-200">
                                        </details>

                                        <label class="block">
                                            <span class="mb-1 block text-sm font-medium text-gray-700 dark:text-gray-200">
                                                Mpangilio
                                            </span>

                                            <input type="number"
                                                   name="sort_order"
                                                   min="0"
                                                   value="{{ $galleryImage->sort_order }}"
                                                   class="w-full rounded-lg border-gray-300 text-sm dark:border-gray-600 dark:bg-gray-800 dark:text-white">
                                        </label>

                                        <label class="flex items-center gap-2 text-sm text-gray-700 dark:text-gray-200">
                                            <input type="checkbox"
                                                   name="is_active"
                                                   value="1"
                                                   @checked($galleryImage->is_active)
                                                   class="rounded border-gray-300 text-indigo-600">
                                            Ionekane kwenye website
                                        </label>

                                        <button type="submit"
                                                class="gallery-action gallery-action-primary w-full">
                                            Hifadhi mabadiliko
                                        </button>
                                    </form>

                                    <div class="border-t border-gray-200 p-3 dark:border-gray-700">
                                        <form action="{{ route('admin.gallery-images.destroy', $galleryImage->id) }}"
                                              method="POST"
                                              data-gallery-delete
                                              data-confirm="Una uhakika unataka kufuta picha hii pekee?">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="gallery-action gallery-action-danger w-full">
                                                Futa picha hii
                                            </button>
                                        </form>
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    @else
                        <div class="rounded-lg bg-gray-50 p-5 text-center text-gray-600 dark:bg-gray-800 dark:text-gray-300">
                            No picture uploded in this category.
                        </div>
                    @endif
                </section>
            @empty
                <div class="rounded-lg bg-gray-50 p-6 text-center text-gray-600 dark:bg-gray-800 dark:text-gray-300">
                    Bado hakuna category. Ongeza category kwanza.
                </div>
            @endforelse
        </div>
    </section>
</div>

{{-- SweetAlert2; ikiwa tayari imeongezwa kwenye layout, unaweza kuondoa mstari huu. --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
(function () {
    if (window.galleryPartialInitialized) {
        return;
    }
    window.galleryPartialInitialized = true;

    const messageBox = document.getElementById('gallery-message');

    function showInlineMessage(message, isError) {
        if (!messageBox) {
            return;
        }

        messageBox.textContent = message || 'Kuna tatizo limetokea.';
        messageBox.classList.remove(
            'hidden',
            'bg-green-100',
            'text-green-800',
            'bg-red-100',
            'text-red-800'
        );
        messageBox.classList.add(
            isError ? 'bg-red-100' : 'bg-green-100',
            isError ? 'text-red-800' : 'text-green-800'
        );
        messageBox.scrollIntoView({ behavior: 'smooth', block: 'center' });
    }

    async function showSweetAlert(options) {
        if (window.Swal && typeof window.Swal.fire === 'function') {
            return window.Swal.fire(options);
        }

        window.alert(options.text || options.title || 'Imekamilika.');
        return { isConfirmed: true };
    }

    async function sendForm(form) {
        const button = form.querySelector('button[type="submit"]');
        const oldText = button ? button.textContent.trim() : '';

        if (button) {
            button.disabled = true;
            button.textContent = 'Inahifadhi...';
        }

        try {
            const response = await fetch(form.action, {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: new FormData(form)
            });

            const result = await response.json().catch(() => ({}));

            if (!response.ok) {
                const firstError = result.errors
                    ? Object.values(result.errors).flat()[0]
                    : null;

                throw new Error(
                    firstError ||
                    result.message ||
                    'Imeshindikana kuhifadhi taarifa.'
                );
            }

            await showSweetAlert({
                title: 'Imehifadhiwa!',
                text: result.message || 'Mabadiliko yamehifadhiwa.',
                icon: 'success',
                confirmButtonText: 'Sawa',
                confirmButtonColor: '#4338ca'
            });

            window.location.reload();
        } catch (error) {
            await showSweetAlert({
                title: 'Imeshindikana',
                text: error.message || 'Kuna tatizo limetokea.',
                icon: 'error',
                confirmButtonText: 'Sawa',
                confirmButtonColor: '#dc2626'
            });

            showInlineMessage(error.message, true);

            if (button) {
                button.disabled = false;
                button.textContent = oldText;
            }
        }
    }

    // Ongeza category na hifadhi mabadiliko ya picha
    document.querySelectorAll('#gallery-tab [data-gallery-form]').forEach(function (form) {
        form.addEventListener('submit', function (event) {
            event.preventDefault();
            sendForm(form);
        });
    });

    // Preview na picha zilizokusanywa kutoka chaguo nyingi
    const uploadForm = document.getElementById('gallery-upload-form');
    const fileInput = document.getElementById('gallery-image-files');
    const previewContainer = document.getElementById('gallery-image-previews');
    const selectedCount = document.getElementById('gallery-selected-count');

    if (uploadForm && fileInput && previewContainer && selectedCount) {
        const accumulatedFiles = new DataTransfer();
        let descriptions = [];

        function saveDescriptions() {
            previewContainer
                .querySelectorAll('textarea[data-description-index]')
                .forEach(function (textarea) {
                    descriptions[Number(textarea.dataset.descriptionIndex)] = textarea.value;
                });
        }

        function renderPreviews() {
            previewContainer.replaceChildren();

            const files = Array.from(accumulatedFiles.files);

            if (files.length === 0) {
                previewContainer.classList.add('hidden');
                selectedCount.classList.add('hidden');
                selectedCount.textContent = '';
                return;
            }

            previewContainer.classList.remove('hidden');
            selectedCount.classList.remove('hidden');
            selectedCount.textContent =
                'Picha ' + files.length + ' ziko tayari kuhifadhiwa pamoja.';

            files.forEach(function (file, index) {
                const card = document.createElement('div');
                card.className =
                    'min-w-0 rounded-lg border border-gray-200 p-2 dark:border-gray-700';

                const image = document.createElement('img');
                image.className =
                    'mb-2 h-24 w-full rounded-md bg-gray-100 object-cover dark:bg-gray-800';
                image.alt = file.name;
                image.src = URL.createObjectURL(file);

                const fileName = document.createElement('p');
                fileName.className =
                    'mb-2 truncate text-xs font-medium text-gray-600 dark:text-gray-300';
                fileName.textContent = file.name;

                const description = document.createElement('textarea');
                description.name = 'descriptions[' + index + ']';
                description.dataset.descriptionIndex = String(index);
                description.rows = 2;
                description.maxLength = 1000;
                description.className =
                    'w-full rounded-md border-gray-300 text-xs dark:border-gray-600 dark:bg-gray-800 dark:text-white';
                description.placeholder = 'Maelezo ya picha (hiari)';
                description.value = descriptions[index] || '';

                const removeButton = document.createElement('button');
                removeButton.type = 'button';
                removeButton.textContent = 'Ondoa picha hii';
                removeButton.className =
                    'mt-2 w-full rounded-md bg-red-600 px-2 py-1.5 text-xs font-bold text-white hover:bg-red-700';

                removeButton.addEventListener('click', function () {
                    saveDescriptions();
                    accumulatedFiles.items.remove(index);
                    descriptions.splice(index, 1);
                    fileInput.files = accumulatedFiles.files;
                    renderPreviews();
                });

                card.append(image, fileName, description, removeButton);
                previewContainer.appendChild(card);
            });
        }

        fileInput.addEventListener('change', function () {
            saveDescriptions();

            const newlySelectedFiles = Array.from(fileInput.files || []);

            newlySelectedFiles.forEach(function (file) {
                accumulatedFiles.items.add(file);
                descriptions.push('');
            });

            // Hifadhi picha zilizochaguliwa awali, ili chaguo jipya liongezeke.
            fileInput.files = accumulatedFiles.files;
            renderPreviews();
        });

        uploadForm.addEventListener('submit', function (event) {
            event.preventDefault();
            saveDescriptions();

            const category = uploadForm.querySelector('select[name="category"]');

            if (!category || !category.value) {
                showSweetAlert({
                    title: 'Chagua category',
                    text: 'Chagua category ya picha kwanza.',
                    icon: 'warning',
                    confirmButtonText: 'Sawa'
                });
                return;
            }

            if (accumulatedFiles.files.length === 0) {
                showSweetAlert({
                    title: 'Chagua picha',
                    text: 'Chagua angalau picha moja ya kupakia.',
                    icon: 'warning',
                    confirmButtonText: 'Sawa'
                });
                return;
            }

            fileInput.files = accumulatedFiles.files;
            sendForm(uploadForm);
        });
    }

    // Thibitisha kufuta category au picha kwa SweetAlert
    document.querySelectorAll('#gallery-tab [data-gallery-delete]').forEach(function (form) {
        form.addEventListener('submit', async function (event) {
            event.preventDefault();

            const result = await showSweetAlert({
                title: 'Thibitisha kufuta',
                text: form.dataset.confirm || 'Una uhakika unataka kufuta?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ndiyo, futa',
                cancelButtonText: 'Ghairi',
                confirmButtonColor: '#dc2626'
            });

            if (result && result.isConfirmed) {
                sendForm(form);
            }
        });
    });
})();
</script>