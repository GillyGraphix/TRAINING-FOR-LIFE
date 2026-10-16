<?php

namespace App\Http\Controllers;

use App\Models\CourseApplication;
use App\Http\Requests\StoreCourseApplicationRequest;
use Illuminate\Http\Request;

class CourseApplicationController extends Controller
{
    // Kwa ajili ya Admin Dashboard
    public function index()
    {
        $applications = CourseApplication::latest()->paginate(10);
        return view('admin.course_applications.index', compact('applications'));
    }

    // Kuonyesha fomu ya maombi kwa mwanafunzi
    public function create()
    {
        return view('frontend.course_applications.create');
    }

    // Kuhifadhi data kwenye database
    public function store(StoreCourseApplicationRequest $request)
    {
        CourseApplication::create($request->validated());

        return redirect()->back()->with('success', 'Maombi yako yamepokelewa kikamilifu. TFL itawasiliana nawe hivi karibuni.');
    }

    // Admin kuona taarifa kamili za mwombaji mmoja
    public function show(CourseApplication $application)
    {
        return view('admin.course_applications.show', compact('application'));
    }
}