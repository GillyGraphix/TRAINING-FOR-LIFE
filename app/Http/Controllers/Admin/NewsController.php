<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    // Hazitumiki kama page tofauti - fomu ziko ndani ya modal kwenye dashboard
    public function index()
    {
        return redirect()->route('admin.dashboard');
    }

    public function create()
    {
        return redirect()->route('admin.dashboard');
    }

    public function edit(News $news)
    {
        return redirect()->route('admin.dashboard');
    }

    public function show(News $news)
    {
        return redirect()->route('admin.dashboard');
    }

    /**
     * Inarudisha HTML ya <tr> rows pekee - inatumika na news.blade.php
     * kusasisha jedwali kwa AJAX bila kureload page nzima.
     */
    public function tableRows()
    {
        $newsList = News::latest()->get();

        return view('admin.dashboard.partials.news-table-rows', compact('newsList'));
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request);
        $data['slug'] = $this->makeSlug($request->title);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('news_images', 'public');
        }
        if ($request->hasFile('file')) {
            $data['file'] = $request->file('file')->store('news_files', 'public');
        }
        if ($request->type === 'media' && $request->video_source === 'upload' && $request->hasFile('video')) {
            $data['video'] = $request->file('video')->store('news_videos', 'public');
        }

        $data['published_at'] = $request->published_at ?: now();
        $data['is_active'] = $request->has('is_active');

        $news = News::create($data);

        if ($request->wantsJson()) {
            return response()->json([
                'message' => 'Taarifa imehifadhiwa kikamilifu!',
                'news' => $news,
            ]);
        }

        return redirect()->route('admin.dashboard')->with('success', 'Taarifa imehifadhiwa kikamilifu!');
    }

    public function update(Request $request, News $news)
    {
        $data = $this->validateData($request);

        if ($request->title !== $news->title) {
            $data['slug'] = $this->makeSlug($request->title, $news->id);
        }

        if ($request->hasFile('image')) {
            if ($news->image) {
                Storage::disk('public')->delete($news->image);
            }
            $data['image'] = $request->file('image')->store('news_images', 'public');
        }
        if ($request->hasFile('file')) {
            if ($news->file) {
                Storage::disk('public')->delete($news->file);
            }
            $data['file'] = $request->file('file')->store('news_files', 'public');
        }
        if ($request->type === 'media' && $request->video_source === 'upload' && $request->hasFile('video')) {
            if ($news->video) {
                Storage::disk('public')->delete($news->video);
            }
            $data['video'] = $request->file('video')->store('news_videos', 'public');
        }

        $data['is_active'] = $request->has('is_active');

        $news->update($data);

        if ($request->wantsJson()) {
            return response()->json([
                'message' => 'Taarifa imesasishwa kikamilifu!',
                'news' => $news->fresh(),
            ]);
        }

        return redirect()->route('admin.dashboard')->with('success', 'Taarifa imesasishwa!');
    }

    public function destroy(Request $request, News $news)
    {
        if ($news->image) {
            Storage::disk('public')->delete($news->image);
        }
        if ($news->file) {
            Storage::disk('public')->delete($news->file);
        }
        if ($news->video) {
            Storage::disk('public')->delete($news->video);
        }

        $news->delete();

        if ($request->wantsJson()) {
            return response()->json([
                'message' => 'Taarifa imefutwa kikamilifu!',
            ]);
        }

        return redirect()->route('admin.dashboard')->with('success', 'Taarifa imefutwa!');
    }

    private function validateData(Request $request): array
    {
        return $request->validate([
            'type'         => 'required|in:news,event,publication,report,media',
            'title'        => 'required|string|max:255',
            'excerpt'      => 'nullable|string|max:255',
            'body'         => 'required|string',
            'image'        => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'file'         => 'nullable|file|mimes:pdf,doc,docx|max:5120',
            'published_at' => 'nullable|date',
            'event_date'   => 'nullable|date|required_if:type,event',
            'location'     => 'nullable|string|max:255|required_if:type,event',
            'video_source' => 'nullable|in:upload,youtube|required_if:type,media',
            'video'        => 'nullable|file|mimes:mp4,mov,avi|max:20480',
            'youtube_url'  => 'nullable|url|required_if:video_source,youtube',
        ]);
    }

    private function makeSlug(string $title, $ignoreId = null): string
    {
        $slug = Str::slug($title);

        $query = News::where('slug', 'LIKE', "{$slug}%");
        if ($ignoreId) {
            $query->where('id', '!=', $ignoreId);
        }
        $count = $query->count();

        return $count > 0 ? "{$slug}-{$count}" : $slug;
    }
}