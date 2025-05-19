<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KalkulatorController;


Route::get('/', function () {
    return view('home');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    // RUTE KALKULATOR UTAMA + READ
    Route::get('/kalkulator', [KalkulatorController::class, 'index'])->name('kalkulator');

    // RUTE CREATE
    Route::post('/kalkulator/store', [KalkulatorController::class, 'store'])->name('storeTransport');

    // RUTE UPDATE
    Route::put('/update-transport/{id}', [KalkulatorController::class, 'update'])
    ->name('updateTransport');

    // RUTE DELETE
    Route::delete('/kalkulator/delete/{id}', [KalkulatorController::class, 'destroy'])->name('deleteTransport');

});



require __DIR__.'/auth.php';
