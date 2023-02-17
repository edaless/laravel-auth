<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MainController;

Route::get('/', [MainController::class, 'home'])->name('home');

Route::middleware(['auth', 'verified'])
    ->name('admin.')
    ->prefix('admin')
    ->group(function () {
        Route::get('/project/create', [MainController::class, 'create'])->name('project.create');
        Route::post('/project/create', [MainController::class, 'store'])->name('project.store');
        // Route::get('/project/delete/{project}', [MainController::class, 'delete'])->name('project.delete');
    });



// show
Route::get('/project/show/{project}', [MainController::class, 'projectShow'])
    ->name('project.show');





require __DIR__ . '/auth.php';
