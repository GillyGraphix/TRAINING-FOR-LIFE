<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

// ==========================================
// MODELS & MAILS
// ==========================================
use App\Models\Programme;
use App\Models\News;
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
use App\Http\Controllers\CourseApplicationController;
use App\Http\Controllers\SnmScholarshipController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ==========================================
// 1. PUBLIC ROUTES (Wageni wa Website)
// ==========================================
Route::get('/', function () {
    return view('welcome');
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

Route::get('/news-stories', [NewsStoriesController::class, 'index'])->name('news-stories');

Route::get('/gallery', function () {
    return view('gallery');
})->name('gallery');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/apply/kijana-fursa', function () {
    return view('apply-kijana-fursa');
});

// TFL Course 4 Application Routes (Wanafunzi kujaza fomu)
Route::get('/apply-course', [CourseApplicationController::class, 'create'])->name('course.apply');
Route::post('/apply-course', [CourseApplicationController::class, 'store'])->name('course.store');


// ==========================================
// 2. NEWSLETTER SUBSCRIPTION (Ajax/Form Post)
// ==========================================
Route::post('/newsletter-subscribe', function (Request $request) {
    $request->validate([
        'email' => 'required|email'
    ]);

    $emailIliyojazwa = $request->email;

    // Tuma barua pepe kwa Admin (Kigongoni)
    Mail::to('gazellakigongoni@gmail.com')
        ->send(new NewSubscriberNotification($emailIliyojazwa));

    // Tuma ujumbe wa ukaribisho kwa aliye-subscribe
    Mail::to($emailIliyojazwa)
        ->send(new SubscriberWelcomeMail());

    return response()->json([
        'success' => true,
        'message' => 'You have successfully subscribed to the Training For Life newsletter!'
    ]);
})->name('newsletter.subscribe');


// ==========================================
// 3. DASHBOARD YAKO & PROFILE (Imelindwa na Auth)
// ==========================================
Route::middleware(['auth', 'verified'])->group(function () {

    // Ukilogin, inakutupa moja kwa moja kwenye Custom Admin Dashboard yako
    Route::get('/dashboard', function () {
        return redirect()->route('admin.dashboard');
    })->name('dashboard');

    // Profile Settings (Zinazoletwa na Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});


// ==========================================
// 4. TFL CUSTOM ADMIN DASHBOARD ROUTES
// ==========================================
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {

    // Hii inazuia 404 ukiandika /admin peke yake (Inakutupa kwenye dashboard)
    Route::get('/', function () {
        return redirect()->route('admin.dashboard');
    });

    // Admin Dashboard Kuu (/admin/dashboard)
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Mambo ya Applications za Kijana Fursa (/admin/applications/...)
    Route::prefix('applications')->name('applications.')->group(function () {
        Route::get('/', [ApplicationController::class, 'index'])->name('index');
        Route::get('/{id}', [ApplicationController::class, 'show'])->name('show');
        Route::post('/{id}/reply', [ApplicationController::class, 'reply'])->name('reply');
    });

    // Mambo ya Applications za TFL Course 4
    Route::get('/course-applications', [CourseApplicationController::class, 'index'])->name('course_applications.index');
    Route::get('/course-applications/{application}', [CourseApplicationController::class, 'show'])->name('course_applications.show');

    // MUHIMU: routes za "table-rows" (AJAX refresh) LAZIMA ziwe KABLA ya Route::resource,
    // la sivyo Laravel itadhani "table-rows" ni {news} au {programme} ID na itavunjika.

    // Routes za News (Habari/Matukio) - Hii inajumlisha Create, Store, Edit, Delete n.k
    Route::get('/news/table-rows', [NewsController::class, 'tableRows'])->name('news.table-rows');
    Route::resource('news', NewsController::class);

    // Routes za Programmes
    Route::get('/programmes/table-rows', [ProgrammeController::class, 'tableRows'])->name('programmes.table-rows');
    Route::resource('programmes', ProgrammeController::class);
});

// Form Route
    Route::get('/soma-na-matumaini-scholarship', [SnmScholarshipController::class, 'create'])->name('snm.create');
    Route::post('/soma-na-matumaini-scholarship', [SnmScholarshipController::class, 'store'])->name('snm.store');

// ==========================================
// 5. AUTHENTICATION ROUTES (Zinazotoka kwenye Breeze)
// ==========================================
require __DIR__.'/auth.php';