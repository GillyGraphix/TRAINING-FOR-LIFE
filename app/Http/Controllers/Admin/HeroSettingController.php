<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HeroSettingController extends Controller
{
    public function update(Request $request)
    {
        $rules = [
            'title' => ['required', 'string', 'max:255'],
            'highlight_text' => ['nullable', 'string', 'max:255'],
            'highlight_color' => ['nullable', 'regex:/^#[0-9A-Fa-f]{6}$/'],
            'subtitle' => ['required', 'string', 'max:2000'],
        ];

        // Kila picha inaruhusiwa kuwa hadi 3 MB.
        for ($slot = 1; $slot <= 6; $slot++) {
            $rules['image_' . $slot] = [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:3072',
            ];
        }

        $messages = [
            'highlight_color.regex' => 'Chagua rangi halali ya heading.',
        ];

        $validated = $request->validate($rules, $messages);

        $heroSetting = HeroSetting::first() ?? new HeroSetting();

        $heroSetting->title = $validated['title'];
        $heroSetting->highlight_text = filled($validated['highlight_text'] ?? null)
            ? trim($validated['highlight_text'])
            : null;
        $heroSetting->highlight_color = $validated['highlight_color'] ?? '#f97316';
        $heroSetting->subtitle = $validated['subtitle'];

        for ($slot = 1; $slot <= 6; $slot++) {
            $inputName = 'image_' . $slot;
            $pathColumn = 'image_' . $slot . '_path';

            if ($request->hasFile($inputName)) {
                if ($heroSetting->$pathColumn) {
                    Storage::disk('public')->delete($heroSetting->$pathColumn);
                }

                $heroSetting->$pathColumn = $request
                    ->file($inputName)
                    ->store('hero', 'public');
            }
        }

        $heroSetting->save();

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Hero section imesasishwa kikamilifu.',
                'heroSetting' => $heroSetting,
            ]);
        }

        return redirect()
            ->route('admin.dashboard')
            ->with('success', 'Hero section imesasishwa kikamilifu.');
    }
}