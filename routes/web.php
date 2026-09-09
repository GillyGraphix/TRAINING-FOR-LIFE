<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewSubscriberNotification;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
|
*/

// Public Routes
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/programmes', function () {
    return view('our-programmes');
})->name('programmes');

Route::get('/impact', function () {
    return view('impact');
})->name('impact');

Route::get('/get-involved', function () {
    return view('get-involved');
})->name('get-involved');

Route::get('/news-stories', function () {
    return view('news-stories');
})->name('news-stories');

Route::get('/gallery', function () {
    return view('gallery');
})->name('gallery');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// Authenticated Routes
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

use App\Mail\SubscriberWelcomeMail;

Route::post('/newsletter-subscribe', function (Request $request) {
    $request->validate([
        'email' => 'required|email'
    ]);

    $emailIliyojazwa = $request->email;

    // Tuma email kwa TFL Team
    Mail::to('gazellakigongoni@gmail.com')
        ->send(new NewSubscriberNotification($emailIliyojazwa));

    // Tuma email ya shukrani kwa aliyesubscribe
    Mail::to($emailIliyojazwa)
        ->send(new SubscriberWelcomeMail());

    // Kurudisha jibu la JSON badala ya page reload
    return response()->json([
        'success' => true,
        'message' => 'You have successfully subscribed to the Training For Life newsletter!'
    ]);
})->name('newsletter.subscribe');