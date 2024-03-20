<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
/*-----------------------------------Admin--------------------------------*/
    Route::prefix('admin')->group(function () {
        Route::get('/login', [AdminController::class, 'index'])->name('loginAdminForm'); 
        Route::post('/login/owner', [AdminController::class, 'loginAdmin'])->name('loginAdmin'); 
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboardAdmin')->middleware('auth:admin');

    });

/*----------------------------------------------------------------------------*/ 
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

require __DIR__.'/auth.php';
