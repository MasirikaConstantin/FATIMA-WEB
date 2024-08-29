<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified','rolemanager:autre'])->name('dashboard');

Route::get('gest-admin/dashboard', function () {
    return view('admin');
})->middleware(['auth', 'verified','rolemanager:admin'])->name('admin');

Route::get('utilisateur/dashboard', function () {
    return view('utilisateur');
})->middleware(['auth', 'verified','rolemanager:utilisateur'])->name('utilisateur');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
