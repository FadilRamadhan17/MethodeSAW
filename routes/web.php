<?php

use App\Http\Controllers\DataController;
use App\Http\Controllers\MethodeWpController;
use App\Http\Controllers\ProfileController;
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
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/data', [DataController::class, 'index'])->name('data');
    Route::get('/data/kriteria', [DataController::class, 'indexkriteria'])->name('kriteria');
    Route::get('/data/kriteria/create', [DataController::class, 'createkriteria'])->name('kriteria.create');
    Route::post('/data/kriteria', [DataController::class, 'storekriteria'])->name('kriteria.store');
    Route::get('/data/kriteria/{id}/edit', [DataController::class, 'editkriteria'])->name('kriteria.edit');
    Route::put('/data/kriteria/{id}', [DataController::class, 'updatekriteria'])->name('kriteria.update');
    Route::delete('/data/kriteria/{id}', [DataController::class, 'destroykriteria'])->name('kriteria.destroy');

    Route::get('/data/alternatif', [DataController::class, 'indexalternatif'])->name('alternatif');
    Route::get('/data/alternatif/create', [DataController::class, 'createalternatif'])->name('alternatif.create');
    Route::post('/data/alternatif', [DataController::class, 'storealternatif'])->name('alternatif.store');
    Route::get('/data/alternatif/{id}/edit', [DataController::class, 'editalternatif'])->name('alternatif.edit');
    Route::put('/data/alternatif/{id}', [DataController::class, 'updatealternatif'])->name('alternatif.update');
    Route::delete('/data/alternatif/{id}', [DataController::class, 'destroyalternatif'])->name('alternatif.destroy');

    Route::get('/data/value', [DataController::class, 'indexdata'])->name('data.value');
    Route::get('/data/value/create', [DataController::class, 'createdata'])->name('data.create');
    Route::post('/data/value', [DataController::class, 'storedata'])->name('data.store');
    Route::get('/data/value/{id}/edit', [DataController::class, 'editdata'])->name('data.edit');
    Route::put('/data/value/{id}', [DataController::class, 'updatedata'])->name('data.update');
    Route::delete('/data/value/{id}', [DataController::class, 'destroydata'])->name('data.destroy');


    Route::get('/methodewp', [MethodeWpController::class, 'methodewp'])->name('methodewp');
    Route::get('/methodewp/generate', [MethodeWpController::class, 'methodewp'])->name('methodewp.generate');

    Route::get('/hasil', [MethodeWpController::class, 'hasil'])->name('hasil');
});

require __DIR__ . '/auth.php';
