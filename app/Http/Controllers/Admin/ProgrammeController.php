<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Programme;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProgrammeController extends Controller
{
    // Fomu zote (create/edit) ziko kwenye modal ndani ya dashboard - si page tofauti
    public function index()
    {
        return redirect()->route('admin.dashboard');
    }

    public function create()
    {
        return redirect()->route('admin.dashboard');
    }

    public function show(string $id)
    {
        return redirect()->route('admin.dashboard');
    }

    public function edit(string $id)
    {
        return redirect()->route('admin.dashboard');
    }

    /**
     * Inarudisha HTML ya <tr> rows pekee - inatumika na programmes.blade.php
     * kusasisha jedwali kwa AJAX bila kureload page nzima.
     */
    public function tableRows()
    {
        $programmesList = Programme::orderBy('order')->latest()->get();

        return view('admin.dashboard.partials.programmes-table-rows', compact('programmesList'));
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request);
        unset($data['remove_image']); // si safu ya database

        $data['slug'] = $this->makeSlug($request->title);
        $data['sections'] = $this->cleanSections($request->sections);
        $data['is_active'] = $request->has('is_active');
        $data['order'] = $request->order ?? 0;

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('programme_images', 'public');
        }

        $programme = Programme::create($data);

        if ($request->wantsJson()) {
            return response()->json([
                'message' => 'Programme imehifadhiwa kikamilifu!',
                'programme' => $programme,
            ]);
        }

        return redirect()->route('admin.dashboard')->with('success', 'Programme imehifadhiwa kikamilifu!');
    }

    public function update(Request $request, Programme $programme)
    {
        $data = $this->validateData($request);
        unset($data['remove_image']); // si safu ya database

        // Badilisha slug tu kama title imebadilika
        if ($request->title !== $programme->title) {
            $data['slug'] = $this->makeSlug($request->title, $programme->id);
        }

        $data['sections'] = $this->cleanSections($request->sections);
        $data['is_active'] = $request->has('is_active');
        $data['order'] = $request->order ?? $programme->order;

        if ($request->hasFile('image')) {
            // Picha mpya: futa ya zamani kisha hifadhi mpya
            if ($programme->image) {
                Storage::disk('public')->delete($programme->image);
            }
            $data['image'] = $request->file('image')->store('programme_images', 'public');
        } elseif ($request->boolean('remove_image')) {
            // Kisanduku cha "Ondoa picha ya sasa" kimewashwa
            if ($programme->image) {
                Storage::disk('public')->delete($programme->image);
            }
            $data['image'] = null;
        }

        $programme->update($data);

        if ($request->wantsJson()) {
            return response()->json([
                'message' => 'Programme imesasishwa kikamilifu!',
                'programme' => $programme->fresh(),
            ]);
        }

        return redirect()->route('admin.dashboard')->with('success', 'Programme imesasishwa kikamilifu!');
    }

    public function destroy(Request $request, Programme $programme)
    {
        if ($programme->image) {
            Storage::disk('public')->delete($programme->image);
        }

        $programme->delete();

        if ($request->wantsJson()) {
            return response()->json([
                'message' => 'Programme imefutwa kikamilifu!',
            ]);
        }

        return redirect()->route('admin.dashboard')->with('success', 'Programme imefutwa!');
    }

    private function validateData(Request $request): array
    {
        return $request->validate([
            'title'                  => 'required|string|max:255',
            'subtitle'               => 'nullable|string|max:255',
            'summary'                => 'required|string|max:500',
            'image'                  => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'remove_image'           => 'nullable|boolean',
            'order'                  => 'nullable|integer|min:0',
            'sections'               => 'nullable|array',
            'sections.*.label'       => 'nullable|string|max:255',
            'sections.*.content'     => 'nullable|string',
            'sections.*.highlight'   => 'nullable|in:0,1',
        ]);
    }

    /**
     * Safisha 'sections': ondoa rows tupu, na hakikisha kila section
     * ina 'label', 'content', 'highlight' (boolean) tu - muundo huu
     * ndio unaosomwa moja kwa moja na our-programmes.blade.php
     */
    private function cleanSections(array $sections): array
    {
        if (empty($sections)) {
            return [];
        }

        return collect($sections)
            ->filter(fn ($s) => !empty($s['label']) && !empty($s['content']))
            ->map(fn ($s) => [
                'label'     => trim($s['label']),
                'content'   => trim($s['content']),
                'highlight' => !empty($s['highlight']),
            ])
            ->values()
            ->all();
    }

    /**
     * Slug ya kipekee: inajaribu "title", kisha "title-1", "title-2"... hadi ipate
     * isiyotumika. (Toleo la zamani lilihesabu slugs zinazofanana, ambalo linaweza
     * kutoa slug iliyopo tayari ukifuta programme kisha ukaunda nyingine yenye jina hilo.)
     */
    private function makeSlug(string $title, $ignoreId = null): string
    {
        $base = Str::slug($title) ?: 'programme';
        $slug = $base;
        $i = 1;

        while (
            Programme::where('slug', $slug)
                ->when($ignoreId, fn ($q) => $q->where('id', '!=', $ignoreId))
                ->exists()
        ) {
            $slug = "{$base}-{$i}";
            $i++;
        }

        return $slug;
    }
}