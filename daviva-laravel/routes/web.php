<?php

use App\Http\Controllers\DoktorController;
use App\Http\Controllers\HastaController;
use App\Http\Controllers\IlacController;
use App\Http\Controllers\KlinikController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReceteController;
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

Route::get('/', function () { return view('welcome'); });

Route::get('/klinikler',[KlinikController::class , 'index'])->name('klinik.index');
Route::get('/doktorlar',[DoktorController::class , 'index'])->name('doktor.index');
Route::get('/ilaclar',[IlacController::class , 'index'])->name('ilac.index');
Route::get('/hastalar',[HastaController::class , 'index'])->name('hasta.index');
Route::get('/receteler',[ReceteController::class , 'index'])->name('recete.index');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
