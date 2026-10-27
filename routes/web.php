<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\PenitipanController;
use App\Http\Controllers\AdminHewanController;
use App\Http\Controllers\HewanController;

Route::get('/', function () {
    return view('welcome');
});


// ========================
// DASHBOARD (redirect berdasarkan role)
// ========================
Route::get('/dashboard', function () {
    $user = auth()->user();

    if ($user->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }

    return view('customer.dashboard');
})->middleware(['auth'])->name('dashboard');




// ========================
// ROUTE YANG MEMBUTUHKAN LOGIN
// ========================
Route::middleware(['auth'])->group(function () {

    // CRUD Umum yang boleh diakses admin dan customer
    Route::resource('owners', OwnerController::class);
    Route::resource('penitipan', PenitipanController::class);


// ADMIN
Route::prefix('admin')->name('admin.')->middleware('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::resource('hewan', HewanController::class);
});

// CUSTOMER
Route::prefix('customer')->name('customer.')->middleware('customer')->group(function () {
    Route::get('/dashboard', function () {
        return view('customer.dashboard');
    })->name('dashboard');

    Route::resource('hewan', HewanController::class);
});

});


require __DIR__.'/auth.php';
