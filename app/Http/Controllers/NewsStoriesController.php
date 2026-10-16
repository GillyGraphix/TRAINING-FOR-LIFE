<?php

namespace App\Http\Controllers;

use App\Models\News;

class NewsStoriesController extends Controller
{
    public function index()
    {
        $newsItems    = News::where('type', 'news')->where('is_active', true)->orderByDesc('published_at')->get();
        $events       = News::where('type', 'event')->where('is_active', true)->orderByDesc('event_date')->get();
        $publications = News::where('type', 'publication')->where('is_active', true)->orderByDesc('published_at')->get();
        $reports      = News::where('type', 'report')->where('is_active', true)->orderByDesc('published_at')->get();
        $media        = News::where('type', 'media')->where('is_active', true)->orderByDesc('published_at')->get();

        return view('news-stories', compact('newsItems', 'events', 'publications', 'reports', 'media'));
    }
}