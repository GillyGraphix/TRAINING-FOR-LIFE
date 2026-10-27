<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Gallery - Training for Life (TFL)</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-50 font-sans text-slate-800 antialiased transition-colors duration-300 dark:bg-slate-900 dark:text-gray-100">

    @php
        $galleryData = collect($galleryCategories ?? [])
            ->map(function ($category) use ($galleryImages) {
                $categoryImages = collect($galleryImages[$category->slug] ?? [])
                    ->map(function ($image) {
                        return [
                            'url' => \Illuminate\Support\Facades\Storage::url($image->image_path),
                            'description' => $image->description,
                        ];
                    })
                    ->values();

                return [
                    'slug' => $category->slug,
                    'title' => $category->name,
                    'desc' => $category->description ?? '',
                    'images' => $categoryImages,
                ];
            })
            ->values();
    @endphp

    @include('partials.header')

    <main
        class="pb-24 pt-32"
        x-data="{
            categories: {{ \Illuminate\Support\Js::from($galleryData) }},
            currentCategory: null,
            activeImageIndex: null,

            openCategory(category) {
                this.currentCategory = category;
                this.activeImageIndex = null;
            },

            closeCategory() {
                this.currentCategory = null;
                this.activeImageIndex = null;
            },

            openLightbox(index) {
                this.activeImageIndex = index;
            },

            closeLightbox() {
                this.activeImageIndex = null;
            },

            nextImage() {
                if (this.currentCategory && this.currentCategory.images.length > 0) {
                    this.activeImageIndex =
                        (this.activeImageIndex + 1) % this.currentCategory.images.length;
                }
            },

            prevImage() {
                if (this.currentCategory && this.currentCategory.images.length > 0) {
                    this.activeImageIndex =
                        (this.activeImageIndex - 1 + this.currentCategory.images.length)
                        % this.currentCategory.images.length;
                }
            }
        }"
        @keydown.window.escape="activeImageIndex !== null ? closeLightbox() : closeCategory()"
        @keydown.window.arrow-right="if (activeImageIndex !== null) nextImage()"
        @keydown.window.arrow-left="if (activeImageIndex !== null) prevImage()"
    >

        {{-- Kichwa cha ukurasa --}}
        <section class="mx-auto max-w-7xl px-4 pb-12 pt-8 text-center sm:px-6 lg:px-8">
            <span class="rounded-full bg-primary/10 px-4 py-1.5 text-xs font-bold uppercase tracking-[0.25em] text-primary">
                Our Visual Journey
            </span>

            <h1 class="mt-6 text-4xl font-extrabold tracking-tight text-slate-900 dark:text-white sm:text-5xl">
                Impact &amp; Community Gallery
            </h1>

            <p class="mx-auto mt-4 max-w-2xl text-base text-slate-600 dark:text-slate-400 sm:text-lg">
                Explore our moments in action, youth empowerment programs, and the smiling faces
                of the communities we serve. Click a category to view its collection.
            </p>
        </section>

        {{-- Categories kutoka database --}}
        <section class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <template x-if="categories.length === 0">
                <div class="rounded-2xl bg-white p-10 text-center shadow dark:bg-slate-800">
                    <p class="text-lg font-semibold text-slate-700 dark:text-slate-200">
                        The gallery will be added soon.
                    </p>
                </div>
            </template>

            <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
                <template x-for="category in categories" :key="category.slug">
                    <button
                        type="button"
                        @click="openCategory(category)"
                        class="group relative flex h-[380px] flex-col overflow-hidden rounded-3xl border border-gray-100 bg-white text-left shadow-xl transition duration-500 hover:-translate-y-2 hover:shadow-2xl dark:border-slate-700/80 dark:bg-slate-800"
                    >
                        <div class="absolute inset-0 flex items-center justify-center overflow-hidden bg-slate-200 dark:bg-slate-700">
                            <template x-if="category.images.length > 0">
                                <img
                                    :src="category.images[0].url"
                                    :alt="category.title"
                                    class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110"
                                >
                            </template>

                            <template x-if="category.images.length === 0">
                                <span class="text-sm font-medium text-slate-500">
                                    No Photo
                                </span>
                            </template>
                        </div>

                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/60 to-transparent"></div>

                        <div class="relative z-10 flex items-start justify-between p-6">
                            <span class="rounded-full bg-primary/90 px-4 py-1.5 text-[11px] font-black uppercase tracking-widest text-white shadow-lg">
                                <span x-text="category.images.length + ' Photos'"></span>
                            </span>

                            <span class="flex h-10 w-10 items-center justify-center rounded-full bg-white/20 text-white shadow-lg transition-colors group-hover:bg-primary">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/>
                                </svg>
                            </span>
                        </div>

                        <div class="relative z-10 mt-auto p-6">
                            <span class="mb-1 block text-[10px] font-bold uppercase tracking-widest text-orange-400">
                                Explore Collection
                            </span>

                            <h2
                                class="text-2xl font-black leading-tight text-white transition-colors group-hover:text-orange-300"
                                x-text="category.title"
                            ></h2>

                            <p
                                class="mt-3 line-clamp-2 text-sm leading-relaxed text-slate-300"
                                x-text="category.desc"
                            ></p>
                        </div>
                    </button>
                </template>
            </div>
        </section>

        {{-- Category popup --}}
        <div
            x-cloak
            x-show="currentCategory !== null"
            style="display: none;"
            x-transition.opacity
            class="fixed inset-0 z-50 overflow-y-auto bg-slate-950/95 px-4 py-12 backdrop-blur-md"
        >
            <div class="relative mx-auto max-w-7xl">
                <button
                    type="button"
                    @click="closeCategory()"
                    aria-label="Funga category"
                    class="absolute right-0 top-0 z-50 rounded-full bg-white/10 p-3 text-white transition-colors hover:bg-primary md:-right-4"
                >
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>

                <div class="mb-12 mt-8 text-center">
                    <span class="text-xs font-bold uppercase tracking-widest text-orange-400">
                        Category Collection
                    </span>

                    <h2
                        class="mt-2 text-3xl font-extrabold text-white sm:text-5xl"
                        x-text="currentCategory?.title"
                    ></h2>

                    <p
                        class="mx-auto mt-4 max-w-2xl text-base text-slate-400"
                        x-text="currentCategory?.desc"
                    ></p>
                </div>

                <template x-if="currentCategory && currentCategory.images.length === 0">
                    <p class="text-center text-slate-300">No photo in this category.</p>
                </template>

                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                    <template x-for="(image, index) in currentCategory?.images ?? []" :key="index">
                        <button
                            type="button"
                            @click="openLightbox(index)"
                            class="group relative h-64 cursor-pointer overflow-hidden rounded-3xl border border-white/10 bg-slate-800 shadow-lg"
                        >
                            <img
                                :src="image.url"
                                :alt="image.description || currentCategory.title"
                                class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110"
                            >

                            <span
                                x-show="image.description"
                                class="absolute inset-x-0 bottom-0 bg-black/65 p-3 text-left text-sm text-white"
                                x-text="image.description"
                            ></span>
                        </button>
                    </template>
                </div>
            </div>
        </div>

        {{-- Lightbox ya picha --}}
        <div
            x-cloak
            x-show="activeImageIndex !== null"
            style="display: none;"
            x-transition.opacity
            class="fixed inset-0 z-[60] flex select-none items-center justify-center bg-black/95 p-4 backdrop-blur-3xl"
            @click.self="closeLightbox()"
        >
            <button
                type="button"
                @click="closeLightbox()"
                aria-label="Funga picha"
                class="absolute right-6 top-6 z-50 rounded-full bg-white/10 p-3 text-white transition hover:bg-white/20 hover:text-orange-400"
            >
                <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>

            <div class="absolute left-6 top-6 rounded-full border border-white/10 bg-white/10 px-4 py-1.5 text-xs font-bold text-white">
                <span x-text="activeImageIndex + 1"></span>
                /
                <span x-text="currentCategory?.images.length"></span>
            </div>

            <button
                type="button"
                x-show="currentCategory?.images.length > 1"
                @click="prevImage()"
                aria-label="Picha iliyotangulia"
                class="absolute left-4 z-50 rounded-full bg-white/10 p-3 text-white transition hover:bg-white/20 hover:text-orange-400 md:left-8"
            >
                <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/>
                </svg>
            </button>

            <template x-if="activeImageIndex !== null && currentCategory?.images[activeImageIndex]">
                <img
                    :src="currentCategory.images[activeImageIndex].url"
                    :alt="currentCategory.images[activeImageIndex].description || currentCategory.title"
                    class="max-h-[85vh] max-w-full rounded-2xl border border-white/5 object-contain shadow-2xl"
                >
            </template>

            <button
                type="button"
                x-show="currentCategory?.images.length > 1"
                @click="nextImage()"
                aria-label="Picha inayofuata"
                class="absolute right-4 z-50 rounded-full bg-white/10 p-3 text-white transition hover:bg-white/20 hover:text-orange-400 md:right-8"
            >
                <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/>
                </svg>
            </button>
        </div>
    </main>

    @include('partials.footer')

</body>
</html>