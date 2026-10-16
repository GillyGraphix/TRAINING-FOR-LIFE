<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Programme;
use App\Models\KijanaFursaApplication;
use App\Models\CourseApplication;
use App\Models\SnmScholarship;

class DashboardController extends Controller
{
    public function index()
    {
        // 1. Hesabu idadi ya data zote kwa ajili ya kadi za juu
        $totalApplications = KijanaFursaApplication::count();
        $totalNews = News::count();
        $totalProgrammes = Programme::count();
        $totalCourse4 = CourseApplication::count();
        $totalScholarships = SnmScholarship::count();

        // 2. Vuta maombi Yote
        $allKijanaFursa = KijanaFursaApplication::latest()->paginate(10);
        $allCourse4 = CourseApplication::latest()->get();
        $allScholarships = SnmScholarship::latest()->get();

        // Vuta taarifa ZOTE za News ili zionekane kwenye jedwali la partials/news.blade.php
        // (Jina 'newsList' ndilo linalotumika ndani ya news.blade.php - lisibadilishwe)
        $newsList = News::latest()->get();

        // Vuta Programmes ZOTE, zikiwa zimepangwa kwa 'order'
        // (Jina 'programmesList' ndilo linalotumika ndani ya programmes.blade.php - lisibadilishwe)
        $programmesList = Programme::orderBy('order')->latest()->get();

        // 3. Peleka hizi data zote kwenye view yako ya dashboard
        return view('admin.dashboard', compact(
            'totalApplications',
            'totalNews',
            'totalProgrammes',
            'totalCourse4',
            'totalScholarships',
            'allKijanaFursa',
            'allCourse4',
            'allScholarships',
            'newsList',
            'programmesList'   // <--- MPYA
        ));
    }
}