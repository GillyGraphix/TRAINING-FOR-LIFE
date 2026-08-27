<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/programmes', function () {
    return view('our-programmes');
});

Route::get('/impact', function () {
    return view('impact');
});

Route::get('/get-involved', function () {
    return view('get-involved');
});

Route::get('/news-stories', function () {
    return view('news-stories');
});

Route::get('/contact', function () {
    return view('contact');
});

// Authenticated Routes
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';