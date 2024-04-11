<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Home;
use App\Http\Controllers\Home\SiteController;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [SiteController::class, 'index'])->name('home');
Route::get('/categories', [SiteController::class, 'categories'])->name('categories');
Route::get('/categories/{id}', [SiteController::class, 'category'])->name('categories.show');
Route::get('/about', [SiteController::class, 'about'])->name('about');
Route::get('/contact-us', [SiteController::class, 'contact'])->name('contact');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['role:admin'])->prefix('dashboard')->name('dashboard.')->group(function () {
    // Routes accessible only to admins

    Route::resource('users', Dashboard\UserController::class);
    Route::resource('usersTrain', Dashboard\UserTrainController::class);
    Route::resource('muscles', Dashboard\MuscleController::class);
    Route::resource('categories', Dashboard\CategoryController::class);
    Route::resource('trains', Dashboard\TrainController::class);
    Route::resource('trains.medias', Dashboard\TrainMediaController::class);
});

require __DIR__ . '/auth.php';
