<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

// ==========================================
// MODELS & MAILS
// ==========================================
use App\Models\Programme;
use App\Models\News;
use App\Models\Partner;
use App\Models\HeroSetting;
use App\Models\GalleryImage;
use App\Models\GalleryCategory;
use App\Mail\NewSubscriberNotification;
use App\Mail\SubscriberWelcomeMail;

// ==========================================
// PUBLIC CONTROLLERS
// ==========================================
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NewsStoriesController;

// ==========================================
// ADMIN CONTROLLERS & OTHERS
// ==========================================
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ApplicationController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\ProgrammeController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\HeroSettingController;
use App\Http\Controllers\Admin\GalleryImageController;
use App\Http\Controllers\Admin\GalleryCategoryController;
use App\Http\Controllers\CourseApplicationController;
use App\Http\Controllers\SnmScholarshipController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ==========================================
// 1. PUBLIC ROUTES
// ==========================================
Route::get('/', function () {
    $partners = Partner::where('is_active', true)
        ->orderBy('order')
        ->get();

    $heroSetting = HeroSetting::first() ?? new HeroSetting();

    return view('welcome', compact('partners', 'heroSetting'));
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/programmes', function () {
    $programmes = Programme::where('is_active', true)
        ->orderBy('order')
        ->get();

    return view('our-programmes', compact('programmes'));
})->name('programmes');

Route::get('/impact', function () {
    return view('impact');
})->name('impact');

Route::get('/get-involved', function () {
    return view('get-involved');
})->name('get-involved');

Route::get('/news-stories', [NewsStoriesController::class, 'index'])
    ->name('news-stories');

/*
 * Gallery page:
 * Fetch active categories and images from the database.
 * Images are grouped by the category slug for gallerydash.blade.php.
 */
Route::get('/gallery', function () {
    $galleryCategories = GalleryCategory::where('is_active', true)
        ->orderBy('sort_order')
        ->orderBy('name')
        ->get();

    $galleryImages = GalleryImage::where('is_active', true)
        ->orderBy('sort_order')
        ->orderByDesc('id')
        ->get()
        ->groupBy('category');

    return view('gallery', compact(
        'galleryCategories',
        'galleryImages'
    ));
})->name('gallery');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/apply/kijana-fursa', function () {
    return view('apply-kijana-fursa');
});

// TFL Course 4 application routes
Route::get('/apply-course', [CourseApplicationController::class, 'create'])
    ->name('course.apply');

Route::post('/apply-course', [CourseApplicationController::class, 'store'])
    ->name('course.store');


// ==========================================
// 2. NEWSLETTER SUBSCRIPTION
// ==========================================
Route::post('/newsletter-subscribe', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
    ]);

    $emailIliyojazwa = $request->email;

    Mail::to('gazellakigongoni@gmail.com')
        ->send(new NewSubscriberNotification($emailIliyojazwa));

    Mail::to($emailIliyojazwa)
        ->send(new SubscriberWelcomeMail());

    return response()->json([
        'success' => true,
        'message' => 'You have successfully subscribed to the Training For Life newsletter!',
    ]);
})->name('newsletter.subscribe');


// ==========================================
// 3. DASHBOARD AND PROFILE
// ==========================================
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return redirect()->route('admin.dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});


// ==========================================
// 4. CUSTOM ADMIN DASHBOARD ROUTES
// ==========================================
Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth'])
    ->group(function () {
        Route::get('/', function () {
            return redirect()->route('admin.dashboard');
        });

        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');

        // Hero section
        Route::put('/hero-settings', [HeroSettingController::class, 'update'])
            ->name('hero-settings.update');

        // Gallery images
        Route::post('/gallery-images', [GalleryImageController::class, 'store'])
            ->name('gallery-images.store');

        Route::put('/gallery-images/{id}', [GalleryImageController::class, 'update'])
            ->name('gallery-images.update');

        Route::delete('/gallery-images/{id}', [GalleryImageController::class, 'destroy'])
            ->name('gallery-images.destroy');

        // Gallery categories
        Route::post('/gallery-categories', [GalleryCategoryController::class, 'store'])
            ->name('gallery-categories.store');

        Route::put('/gallery-categories/{id}', [GalleryCategoryController::class, 'update'])
            ->name('gallery-categories.update');

        Route::delete('/gallery-categories/{id}', [GalleryCategoryController::class, 'destroy'])
            ->name('gallery-categories.destroy');

        // Kijana Fursa applications
        Route::prefix('applications')
            ->name('applications.')
            ->group(function () {
                Route::get('/', [ApplicationController::class, 'index'])
                    ->name('index');

                Route::get('/{id}', [ApplicationController::class, 'show'])
                    ->name('show');

                Route::post('/{id}/reply', [ApplicationController::class, 'reply'])
                    ->name('reply');
            });

        // TFL Course 4 applications
        Route::get('/course-applications', [CourseApplicationController::class, 'index'])
            ->name('course_applications.index');

        Route::get('/course-applications/{application}', [CourseApplicationController::class, 'show'])
            ->name('course_applications.show');

        // News
        Route::get('/news/table-rows', [NewsController::class, 'tableRows'])
            ->name('news.table-rows');

        Route::resource('news', NewsController::class);

        // Programmes
        Route::get('/programmes/table-rows', [ProgrammeController::class, 'tableRows'])
            ->name('programmes.table-rows');

        Route::resource('programmes', ProgrammeController::class);

        // Partners
        Route::resource('partners', PartnerController::class);
    });


// ==========================================
// 5. SOMA NA MATUMAINI SCHOLARSHIP
// ==========================================
Route::get('/soma-na-matumaini-scholarship', [SnmScholarshipController::class, 'create'])
    ->name('snm.create');

Route::post('/soma-na-matumaini-scholarship', [SnmScholarshipController::class, 'store'])
    ->name('snm.store');


// ==========================================
// 6. AUTHENTICATION ROUTES
// ==========================================
require __DIR__ . '/auth.php';

Route::view('/privacy-policy', 'pages.privacy-policy')
    ->name('privacy-policy');