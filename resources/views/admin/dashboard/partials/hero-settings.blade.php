{{-- ADMIN PARTIAL: HERO SETTINGS --}}
<div id="hero-settings-tab" class="tab-content hidden">
    <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700">

        <div class="mb-6">
            <h2 class="text-xl font-bold text-[#070049] dark:text-white">Hero Section</h2>
            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                Badilisha kichwa, maelezo na picha sita za juu ya ukurasa wa mwanzo.
                Vitufe vya Our Impact, Support TFL na Apply Now havibadilishwi hapa.
            </p>
        </div>

        <form id="hero-settings-form"
              action="/admin/hero-settings"
              method="POST"
              enctype="multipart/form-data"
              class="space-y-6">

            @csrf
            @method('PUT')

            <div>
                <label for="hero-title"
                       class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-1">
                    Kichwa
                </label>

                <input
                    id="hero-title"
                    name="title"
                    type="text"
                    maxlength="255"
                    required
                    value="{{ old('title', $heroSetting->title ?? 'TRANSFORMING YOUTH INTO EMPOWERED LEADERS') }}"
                    class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-[#f79120] focus:border-[#f79120]">

                @error('title')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label for="hero-highlight-text"
                           class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-1">
                        Maneno ya heading yatakayopakwa rangi
                    </label>

                    <input
                        id="hero-highlight-text"
                        name="highlight_text"
                        type="text"
                        maxlength="255"
                        value="{{ old('highlight_text', $heroSetting->highlight_text ?? 'EMPOWERED LEADERS') }}"
                        placeholder="Mfano: EMPOWERED LEADERS"
                        class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-[#f79120] focus:border-[#f79120]">

                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                        Andika maneno kama yanavyoonekana ndani ya heading. Acha tupu kama hutaki sehemu maalum iwe na rangi.
                    </p>

                    @error('highlight_text')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="hero-highlight-color"
                           class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-1">
                        Rangi ya maneno hayo
                    </label>

                    <div class="flex items-center gap-3">
                        <input
                            id="hero-highlight-color"
                            name="highlight_color"
                            type="color"
                            value="{{ old('highlight_color', $heroSetting->highlight_color ?? '#f97316') }}"
                            class="h-11 w-16 cursor-pointer rounded-lg border border-gray-300 bg-white p-1 dark:border-gray-600 dark:bg-gray-700">

                        <span id="hero-highlight-color-value"
                              class="text-sm font-medium text-gray-700 dark:text-gray-200">
                            {{ old('highlight_color', $heroSetting->highlight_color ?? '#f97316') }}
                        </span>
                    </div>

                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                        Bonyeza kisanduku cha rangi ili uchague rangi unayotaka.
                    </p>

                    @error('highlight_color')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div>
                <label for="hero-subtitle"
                       class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-1">
                    Maelezo mafupi
                </label>

                <textarea
                    id="hero-subtitle"
                    name="subtitle"
                    rows="4"
                    required
                    class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-[#f79120] focus:border-[#f79120]">{{ old('subtitle', $heroSetting->subtitle ?? 'We equip young Tanzanians from disadvantaged families with the skills, confidence, and opportunities to build productive lives, launch enterprises, and lead their communities.') }}</textarea>

                @error('subtitle')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <h3 class="text-base font-bold text-[#070049] dark:text-white">
                    Picha za Hero
                </h3>
                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                    Unaweza kubadilisha picha moja au zaidi. JPG, PNG au WebP, hadi 3 MB kwa kila picha.
                    Ukiacha sehemu bila kupakia picha mpya, picha iliyopo itabaki.
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-5">
                @for ($slot = 1; $slot <= 6; $slot++)
                    @php
                        $pathColumn = 'image_' . $slot . '_path';
                        $currentImagePath = $heroSetting->{$pathColumn} ?? null;
                    @endphp

                    <div class="rounded-xl border border-gray-200 dark:border-gray-700 p-4">
                        <label for="hero-image-{{ $slot }}"
                               class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-3">
                            Picha {{ $slot }}
                        </label>

                        <img
                            id="hero-preview-{{ $slot }}"
                            src="{{ $currentImagePath ? asset('storage/' . $currentImagePath) : '' }}"
                            alt="Preview ya picha {{ $slot }}"
                            class="{{ $currentImagePath ? '' : 'hidden' }} mb-3 h-36 w-full rounded-lg bg-gray-100 dark:bg-gray-700 object-cover">

                        @if (!$currentImagePath)
                            <div id="hero-empty-{{ $slot }}"
                                 class="mb-3 flex h-36 items-center justify-center rounded-lg bg-gray-100 dark:bg-gray-700 text-sm text-gray-400">
                                Picha mpya haijapakiwa bado
                            </div>
                        @endif

                        <input
                            id="hero-image-{{ $slot }}"
                            name="image_{{ $slot }}"
                            type="file"
                            accept=".jpg,.jpeg,.png,.webp"
                            data-hero-preview="{{ $slot }}"
                            class="js-hero-image-input block w-full text-sm text-gray-600 dark:text-gray-300">

                        @error('image_' . $slot)
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                @endfor
            </div>

            <div id="hero-settings-error"
                 class="hidden rounded-lg bg-red-50 dark:bg-red-900/30 p-3 text-sm text-red-700 dark:text-red-300">
            </div>

            <div class="flex justify-end border-t border-gray-100 dark:border-gray-700 pt-5">
                <button id="hero-settings-submit"
                        type="submit"
                        class="rounded-lg bg-[#070049] hover:bg-[#0a0066] px-5 py-2.5 font-semibold text-white shadow transition">
                    Hifadhi Mabadiliko
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    const heroSettingsForm = document.getElementById('hero-settings-form');

    if (heroSettingsForm) {
        const heroHighlightColorInput = document.getElementById('hero-highlight-color');
        const heroHighlightColorValue = document.getElementById('hero-highlight-color-value');

        if (heroHighlightColorInput && heroHighlightColorValue) {
            heroHighlightColorInput.addEventListener('input', function () {
                heroHighlightColorValue.textContent = heroHighlightColorInput.value;
            });
        }

        heroSettingsForm.querySelectorAll('.js-hero-image-input').forEach(function (input) {
            input.addEventListener('change', function () {
                const slot = input.dataset.heroPreview;
                const preview = document.getElementById('hero-preview-' + slot);
                const emptyMessage = document.getElementById('hero-empty-' + slot);
                const file = input.files && input.files[0];

                if (!file) {
                    return;
                }

                preview.src = URL.createObjectURL(file);
                preview.classList.remove('hidden');

                if (emptyMessage) {
                    emptyMessage.classList.add('hidden');
                }
            });
        });

        heroSettingsForm.addEventListener('submit', async function (event) {
            event.preventDefault();

            const errorBox = document.getElementById('hero-settings-error');
            const submitButton = document.getElementById('hero-settings-submit');

            errorBox.textContent = '';
            errorBox.classList.add('hidden');
            submitButton.disabled = true;
            submitButton.textContent = 'Inahifadhi...';

            try {
                const response = await fetch(heroSettingsForm.action, {
                    method: 'POST',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json'
                    },
                    body: new FormData(heroSettingsForm)
                });

                const data = await response.json();

                if (!response.ok) {
                    errorBox.textContent = data.errors
                        ? Object.values(data.errors).flat().join(' ')
                        : (data.message || 'Imeshindikana kuhifadhi mabadiliko.');

                    errorBox.classList.remove('hidden');
                    return;
                }

                await Swal.fire({
                    icon: 'success',
                    title: 'Imehifadhiwa!',
                    text: data.message || 'Hero section imesasishwa kikamilifu.',
                    timer: 1600,
                    showConfirmButton: false
                });

                window.location.reload();
            } catch (error) {
                errorBox.textContent = 'Imeshindikana kuwasiliana na server.';
                errorBox.classList.remove('hidden');
            } finally {
                submitButton.disabled = false;
                submitButton.textContent = 'Hifadhi Mabadiliko';
            }
        });
    }
</script>