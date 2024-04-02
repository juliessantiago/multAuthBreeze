<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FullCalenderController; 
use App\Http\Controllers\HorariosLivresController; 

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

Route::controller(FullCalenderController::class)->group(function(){

    Route::get('fullcalender', 'index');

    Route::post('fullcalenderAjax', 'ajax');

    Route::get('fullcalender', 'batata'); 

});

Route::get('/horariosLivres/2', [HorariosLivresController::class, 'index']); 

require __DIR__.'/auth.php';
