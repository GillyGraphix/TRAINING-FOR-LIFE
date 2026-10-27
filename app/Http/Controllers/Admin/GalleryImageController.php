<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class GalleryImageController extends Controller
{
    /**
     * Gallery inasimamiwa ndani ya dashboard kuu.
     */
    public function index()
    {
        return redirect()->route('admin.dashboard');
    }

    /**
     * Hifadhi picha nyingi za gallery kwa pamoja.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category' => [
                'required',
                'string',
                Rule::exists('gallery_categories', 'slug'),
            ],
            'images' => [
                'required',
                'array',
                'min:1',
            ],
            'images.*' => [
                'required',
                'image',
                'mimes:jpg,jpeg,png,webp,gif',
                'max:5120',
            ],
            'descriptions' => [
                'nullable',
                'array',
            ],
            'descriptions.*' => [
                'nullable',
                'string',
                'max:1000',
            ],
            'sort_order' => [
                'nullable',
                'integer',
                'min:0',
            ],
            'is_active' => [
                'nullable',
                'boolean',
            ],
        ], [
            'category.required' => 'Chagua category ya picha.',
            'category.exists' => 'Category uliyochagua haipo.',
            'images.required' => 'Chagua angalau picha moja ya kupakia.',
            'images.array' => 'Chagua picha kwa usahihi.',
            'images.min' => 'Chagua angalau picha moja ya kupakia.',
            'images.*.required' => 'Kila picha iliyochaguliwa inahitajika.',
            'images.*.image' => 'File zote zilizochaguliwa lazima ziwe picha.',
            'images.*.mimes' => 'Picha ziruhusiwe ziwe JPG, PNG, WebP au GIF.',
            'images.*.max' => 'Kila picha isizidi MB 5.',
            'descriptions.*.max' => 'Maelezo ya picha yasizidi herufi 1000.',
        ]);

        $createdImages = collect();
        $descriptions = $validated['descriptions'] ?? [];
        $startingOrder = $validated['sort_order'] ?? 0;

        foreach ($request->file('images', []) as $index => $imageFile) {
            $imagePath = $imageFile->store('gallery', 'public');
            $description = $descriptions[$index] ?? null;

            $galleryImage = GalleryImage::create([
                'category' => $validated['category'],
                'image_path' => $imagePath,
                'description' => filled($description)
                    ? trim($description)
                    : null,
                'sort_order' => $startingOrder + $index,
                'is_active' => $request->boolean('is_active'),
            ]);

            $createdImages->push($galleryImage);
        }

        return $this->respond(
            $request,
            $createdImages->count() . ' picha zimeongezwa kwenye gallery.',
            $createdImages,
            201,
            'galleryImages'
        );
    }

    /**
     * Sasisha taarifa za picha moja au badilisha picha yenyewe.
     */
    public function update(Request $request, string $id)
    {
        $galleryImage = GalleryImage::findOrFail($id);

        $validated = $request->validate([
            'category' => [
                'required',
                'string',
                Rule::exists('gallery_categories', 'slug'),
            ],
            'image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp,gif',
                'max:5120',
            ],
            'description' => [
                'nullable',
                'string',
                'max:1000',
            ],
            'sort_order' => [
                'nullable',
                'integer',
                'min:0',
            ],
            'is_active' => [
                'nullable',
                'boolean',
            ],
        ], [
            'category.required' => 'Chagua category ya picha.',
            'category.exists' => 'Category uliyochagua haipo.',
            'image.image' => 'File uliyochagua lazima iwe picha.',
            'image.mimes' => 'Picha iruhusiwe iwe JPG, PNG, WebP au GIF.',
            'image.max' => 'Picha isizidi MB 5.',
            'description.max' => 'Maelezo ya picha yasizidi herufi 1000.',
        ]);

        if ($request->hasFile('image')) {
            $newImagePath = $request->file('image')->store('gallery', 'public');

            if ($galleryImage->image_path) {
                Storage::disk('public')->delete($galleryImage->image_path);
            }

            $galleryImage->image_path = $newImagePath;
        }

        $galleryImage->category = $validated['category'];
        $galleryImage->description = filled($validated['description'] ?? null)
            ? trim($validated['description'])
            : null;

        if (
            array_key_exists('sort_order', $validated)
            && $validated['sort_order'] !== null
        ) {
            $galleryImage->sort_order = $validated['sort_order'];
        }

        $galleryImage->is_active = $request->boolean('is_active');
        $galleryImage->save();

        return $this->respond(
            $request,
            'Taarifa za picha zimesasishwa.',
            $galleryImage
        );
    }

    /**
     * Futa picha moja na file lake.
     */
    public function destroy(Request $request, string $id)
    {
        $galleryImage = GalleryImage::findOrFail($id);
        $imagePath = $galleryImage->image_path;

        $galleryImage->delete();

        if ($imagePath) {
            Storage::disk('public')->delete($imagePath);
        }

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Picha imefutwa kwenye gallery.',
            ]);
        }

        return redirect()
            ->route('admin.dashboard')
            ->with('success', 'Picha imefutwa kwenye gallery.');
    }

    /**
     * Rudisha JSON kwa AJAX au redirect kwa form ya kawaida.
     */
    private function respond(
        Request $request,
        string $message,
        mixed $data,
        int $status = 200,
        string $dataKey = 'galleryImage'
    ): mixed {
        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => $message,
                $dataKey => $data,
            ], $status);
        }

        return redirect()
            ->route('admin.dashboard')
            ->with('success', $message);
    }
}