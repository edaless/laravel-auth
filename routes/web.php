<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MainController;

Route::get('/', [MainController::class, 'home']);
Route::middleware(['auth', 'verified'])
    ->name('private.')
    ->prefix('private')
    ->group(function () {
        Route::get('/', [MainController::class, 'privateHome']);
    });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/project/show/{project}', [MainController::class, 'projectShow'])
    ->name('project.show');



require __DIR__ . '/auth.php';
