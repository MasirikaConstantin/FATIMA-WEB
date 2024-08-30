<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Models\Programme;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // Récupérer le dernier enregistrement
$dernierProgramme = Programme::orderBy('id', 'desc')->first();

  
        $programmesSansDernier = Programme::where('id', '<>', $dernierProgramme->id)->get();
    
   // dd(Programme::paginate(3));
    return view('welcome',["presentation"=> Programme::latest()->first(),'programmes' =>$programmesSansDernier]);
})->name('welcome');

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

Route::prefix('admin')->name('admin.')->controller(AdminController::class)->group( function () {
    Route::get('newprogram','newprogramme')->name('newprogramme');
    Route::post('newprogram','newprogrammesave');
});

Route::prefix('programme')->name('programme.')->controller(UserController::class)->group( function () {
    Route::get('/{pro}-{id}','lirepro')->where([
        'id'=>'[0-9]+',
        'pro'=>'[a-zA-Z0-9\-]+'
    ])->name('lireprogramme');
    Route::post('newprogram','newprogrammesave');
});
