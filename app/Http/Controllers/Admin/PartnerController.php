<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PartnerController extends Controller
{
    public function index()
    {
        return redirect()->route('admin.dashboard');
    }

    public function create()
    {
        return redirect()->route('admin.dashboard');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['nullable', 'string', 'max:255'],
            'logo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:3072'],
            'website_url' => ['nullable', 'url', 'max:2048'],
            'is_active' => ['nullable', 'boolean'],
            'order' => ['nullable', 'integer', 'min:0'],
        ]);

        if (blank($validated['name'] ?? null) && ! $request->hasFile('logo')) {
            return response()->json([
                'message' => 'Weka jina la partner au pakia logo angalau kimoja.',
                'errors' => [
                    'name' => ['Jina au logo vinahitajika.'],
                    'logo' => ['Jina au logo vinahitajika.'],
                ],
            ], 422);
        }

        $logoPath = $request->file('logo')?->store('partners', 'public');

        $partner = Partner::create([
            'name' => filled($validated['name'] ?? null) ? $validated['name'] : null,
            'logo_path' => $logoPath,
            'website_url' => filled($validated['website_url'] ?? null)
                ? $validated['website_url']
                : null,
            'is_active' => $request->boolean('is_active'),
            'order' => $validated['order'] ?? 0,
        ]);

        return response()->json([
            'message' => 'Partner ameongezwa kikamilifu.',
            'partner' => $partner,
        ], 201);
    }

    public function show(string $id)
    {
        return redirect()->route('admin.dashboard');
    }

    public function edit(string $id)
    {
        return redirect()->route('admin.dashboard');
    }

    public function update(Request $request, string $id)
    {
        $partner = Partner::findOrFail($id);

        $validated = $request->validate([
            'name' => ['nullable', 'string', 'max:255'],
            'logo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:3072'],
            'website_url' => ['nullable', 'url', 'max:2048'],
            'is_active' => ['nullable', 'boolean'],
            'order' => ['nullable', 'integer', 'min:0'],
            'remove_logo' => ['nullable', 'boolean'],
        ]);

        $name = array_key_exists('name', $validated)
            ? (filled($validated['name']) ? $validated['name'] : null)
            : $partner->name;

        $hasLogo = $partner->logo_path && ! $request->boolean('remove_logo');

        if (blank($name) && ! $request->hasFile('logo') && ! $hasLogo) {
            return response()->json([
                'message' => 'Partner lazima awe na jina au logo.',
                'errors' => [
                    'name' => ['Jina au logo vinahitajika.'],
                    'logo' => ['Jina au logo vinahitajika.'],
                ],
            ], 422);
        }

        if ($request->boolean('remove_logo') && $partner->logo_path) {
            Storage::disk('public')->delete($partner->logo_path);
            $partner->logo_path = null;
        }

        if ($request->hasFile('logo')) {
            if ($partner->logo_path) {
                Storage::disk('public')->delete($partner->logo_path);
            }

            $partner->logo_path = $request->file('logo')->store('partners', 'public');
        }

        $partner->name = $name;

        if (array_key_exists('website_url', $validated)) {
            $partner->website_url = filled($validated['website_url'])
                ? $validated['website_url']
                : null;
        }

        if (array_key_exists('order', $validated)) {
            $partner->order = $validated['order'];
        }

        $partner->is_active = $request->boolean('is_active');
        $partner->save();

        return response()->json([
            'message' => 'Taarifa za partner zimesasishwa.',
            'partner' => $partner,
        ]);
    }

    public function destroy(string $id)
    {
        $partner = Partner::findOrFail($id);

        if ($partner->logo_path) {
            Storage::disk('public')->delete($partner->logo_path);
        }

        $partner->delete();

        return response()->json([
            'message' => 'Partner amefutwa kikamilifu.',
        ]);
    }
}