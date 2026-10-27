<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryCategory;
use App\Models\GalleryImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class GalleryCategoryController extends Controller
{
    /**
     * Categories zinasimamiwa ndani ya dashboard kuu.
     */
    public function index()
    {
        return redirect()->route('admin.dashboard');
    }

    /**
     * Ongeza category mpya.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'description' => ['nullable', 'string', 'max:2000'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ], [
            'name.required' => 'Andika jina la category.',
            'name.max' => 'Jina la category lisizidi herufi 100.',
            'description.max' => 'Maelezo ya category yasizidi herufi 2000.',
            'sort_order.integer' => 'Mpangilio lazima uwe namba.',
            'sort_order.min' => 'Mpangilio hauwezi kuwa chini ya sifuri.',
        ]);

        $baseSlug = Str::slug($validated['name']);

        if ($baseSlug === '') {
            $baseSlug = 'gallery-category';
        }

        $slug = $baseSlug;
        $suffix = 2;

        while (GalleryCategory::where('slug', $slug)->exists()) {
            $slug = $baseSlug . '-' . $suffix;
            $suffix++;
        }

        $category = GalleryCategory::create([
            'name' => trim($validated['name']),
            'slug' => $slug,
            'description' => filled($validated['description'] ?? null)
                ? trim($validated['description'])
                : null,
            'sort_order' => $validated['sort_order'] ?? 0,
            'is_active' => $request->boolean('is_active'),
        ]);

        return $this->respond(
            $request,
            'Category mpya imeongezwa.',
            $category,
            201
        );
    }

    /**
     * Sasisha jina, maelezo, mpangilio au hali ya category.
     * Slug inabaki ileile ili picha zilizopo ziendelee kuhusishwa nayo.
     */
    public function update(Request $request, string $id)
    {
        $category = GalleryCategory::findOrFail($id);

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'description' => ['nullable', 'string', 'max:2000'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ], [
            'name.required' => 'Andika jina la category.',
            'name.max' => 'Jina la category lisizidi herufi 100.',
            'description.max' => 'Maelezo ya category yasizidi herufi 2000.',
            'sort_order.integer' => 'Mpangilio lazima uwe namba.',
            'sort_order.min' => 'Mpangilio hauwezi kuwa chini ya sifuri.',
        ]);

        $category->name = trim($validated['name']);
        $category->description = filled($validated['description'] ?? null)
            ? trim($validated['description'])
            : null;
        $category->sort_order = $validated['sort_order'] ?? $category->sort_order;
        $category->is_active = $request->boolean('is_active');
        $category->save();

        return $this->respond(
            $request,
            'Category imesasishwa.',
            $category
        );
    }

    /**
     * Futa category, picha zilizopakiwa ndani yake,
     * pamoja na picha za zamani za category hiyo.
     */
    public function destroy(Request $request, string $id)
    {
        $category = GalleryCategory::findOrFail($id);
        $categorySlug = $category->slug;

        $categoryImages = GalleryImage::where('category', $categorySlug)->get();

        foreach ($categoryImages as $galleryImage) {
            if ($galleryImage->image_path) {
                Storage::disk('public')->delete($galleryImage->image_path);
            }

            $galleryImage->delete();
        }

        // Futa picha za zamani zilizopo public/images/gallery/{slug}/.
        $legacyDirectory = public_path('images/gallery/' . $categorySlug);

        if (File::isDirectory($legacyDirectory)) {
            $allowedImageExtensions = ['jpg', 'jpeg', 'png', 'webp', 'gif'];

            foreach (File::files($legacyDirectory) as $file) {
                if (in_array(strtolower($file->getExtension()), $allowedImageExtensions)) {
                    File::delete($file->getPathname());
                }
            }
        }

        $category->delete();

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Category na picha zake zimefutwa.',
            ]);
        }

        return redirect()
            ->route('admin.dashboard')
            ->with('success', 'Category na picha zake zimefutwa.');
    }

    /**
     * Rudisha JSON kwa AJAX au redirect kwa form ya kawaida.
     */
    private function respond(
        Request $request,
        string $message,
        GalleryCategory $category,
        int $status = 200
    ) {
        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => $message,
                'galleryCategory' => $category,
            ], $status);
        }

        return redirect()
            ->route('admin.dashboard')
            ->with('success', $message);
    }
}