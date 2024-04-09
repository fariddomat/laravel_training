<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Dashboard;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['role:admin'])->group(function () {
    // Routes accessible only to admins

    Route::resource('users', Dashboard\UserController::class);
    Route::resource('users.train', Dashboard\UserTrainController::class);
    Route::resource('muscles', Dashboard\MuscleController::class);
    Route::resource('categories', Dashboard\CategoryController::class);
    Route::resource('trains', Dashboard\TrainController::class);
    Route::resource('trains.media', Dashboard\TrainMediaController::class);
});

require __DIR__ . '/auth.php';
