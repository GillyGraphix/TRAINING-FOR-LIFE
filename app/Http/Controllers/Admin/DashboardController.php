<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CourseApplication;
use App\Models\GalleryCategory;
use App\Models\GalleryImage;
use App\Models\HeroSetting;
use App\Models\KijanaFursaApplication;
use App\Models\News;
use App\Models\Partner;
use App\Models\Programme;
use App\Models\SnmScholarship;

class DashboardController extends Controller
{
    public function index()
    {
        // Hesabu za kadi za dashboard
        $totalApplications = KijanaFursaApplication::count();
        $totalNews = News::count();
        $totalProgrammes = Programme::count();
        $totalPartners = Partner::count();
        $totalGalleryImages = GalleryImage::count();
        $totalGalleryCategories = GalleryCategory::count();
        $totalCourse4 = CourseApplication::count();
        $totalScholarships = SnmScholarship::count();

        // Maombi
        $allKijanaFursa = KijanaFursaApplication::latest()->paginate(10);
        $allCourse4 = CourseApplication::latest()->get();
        $allScholarships = SnmScholarship::latest()->get();

        // News
        $newsList = News::latest()->get();

        // Programmes
        $programmesList = Programme::orderBy('order')
            ->latest()
            ->get();

        // Partners
        $partnersList = Partner::orderBy('order')
            ->get();

        // Picha za gallery kwa admin dashboard
        $galleryImagesList = GalleryImage::orderBy('category')
            ->orderBy('sort_order')
            ->orderByDesc('id')
            ->get();

        // Dropdown ya admin gallery: slug => jina la category
        $galleryCategories = GalleryCategory::orderBy('sort_order')
            ->orderBy('name')
            ->pluck('name', 'slug');

        // Hero settings; tumia maandishi ya msingi kama rekodi haipo
        $heroSetting = HeroSetting::first() ?? new HeroSetting([
            'title' => 'TRANSFORMING YOUTH INTO EMPOWERED LEADERS',
            'subtitle' => 'We equip young Tanzanians from disadvantaged families with the skills, confidence, and opportunities to build productive lives, launch enterprises, and lead their communities.',
        ]);

        return view('admin.dashboard', compact(
            'totalApplications',
            'totalNews',
            'totalProgrammes',
            'totalPartners',
            'totalGalleryImages',
            'totalGalleryCategories',
            'totalCourse4',
            'totalScholarships',
            'allKijanaFursa',
            'allCourse4',
            'allScholarships',
            'newsList',
            'programmesList',
            'partnersList',
            'galleryImagesList',
            'galleryCategories',
            'heroSetting'
        ));
    }
}