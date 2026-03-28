<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\aboutController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\experController;
use App\Http\Controllers\skillController;
use App\Http\Controllers\contactController;
use App\Http\Controllers\gallerycontroller;

Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
/*
Route::get('/about', function () {
    return view('admin.about');
})->middleware(['auth', 'verified'])->name('ab');
*/
Route::middleware('auth')->group(function () {
/* about */
Route::get('/about', [aboutController::class, 'index'])->name('ab');
Route::post('/post-about', [aboutController::class, 'store'])->name('post-ab');
Route::put('/edit-about/{id}', [aboutController::class, 'update'])->name('edit-ab');

/*experience */
Route::get('/experience', [experController::class, 'index'])->name('exp');
Route::post('/experience-post', [experController::class, 'store'])->name('post-exp');
Route::delete('/experience-delete{id}', [experController::class, 'destroy'])->name('delete-exp');
Route::put('/experience-edit/{id}', [experController::class, 'update'])->name('edit-exp');

//gallery
Route::get('/gallery', [gallerycontroller::class, 'index'])->name('gall');
route::post('/gallery-post', [gallerycontroller::class, 'store'])->name('post-gall');
route::delete('/gallery-delete/{id}', [gallerycontroller::class, 'destroy'])->name('delete-gall');
route::put('/gallery-edit/{id}', [gallerycontroller::class, 'update'])->name('edit-gall');

/*skill */
Route::get('/skill', [skillController::class, 'index'])->name('skl');
Route::post('/skill-post', [skillController::class, 'store'])->name('post-skl');
Route::put('/skill-edit/{id}', [skillController::class, 'update'])->name('edit-skl');
Route::delete('/skill-delete/{id}', [skillController::class, 'destroy'])->name('delete-skl');

/*contact */
Route::get('/contact', [contactController::class, 'index'])->name('cont');
Route::post('/contact-post', [contactController::class, 'store'])->name('post-cont');
Route::delete('/contact-delete/{id}', [contactController::class, 'destroy'])->name('delete-cont');



});
Route::get('/', [homeController::class, 'index'])->name('home');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
