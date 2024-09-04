<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Models\Programme;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // Récupérer le dernier enregistrement
    $dernierProgramme = Programme::orderBy('id', 'desc')->first();
    
    // Récupérer tous les programmes sauf le dernier, avec une pagination de 4
    $programmesSansDernierQuery = Programme::orderBy('id', 'desc');
    
    if ($dernierProgramme) {
        $programmesSansDernierQuery = $programmesSansDernierQuery->where('id', '<>', $dernierProgramme->id);
    }
    
    $programmesSansDernier = $programmesSansDernierQuery->paginate(4);

    return view('welcome', [
        "presentation" => Programme::latest()->first(),
        'programmes' => $programmesSansDernier
    ]);
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified','rolemanager:autre'])->name('dashboard');

Route::get('gest-admin/dashboard', function () {

    return view('admin',
[
    'tous'=>Programme::orderBy('id','desc')->paginate(6),
    'nombre'=>Programme::count(),
    'nombre_actif'=>Programme::where("etat", 1)->count()

]);
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

Route::prefix('admin')->name('admin.')->controller(AdminController::class)->middleware(['auth', 'verified','rolemanager:admin'])->group( function () {
    Route::get('newprogram','newprogramme')->name('newprogramme');
    Route::post('newprogram','newprogrammesave');

    Route::get('/modif/{id}','editpro')->name('editpro');
    Route::post('/modif/{id}','edit');
});

Route::prefix('programme')->name('programme.')->controller(UserController::class)->group( function () {
    Route::get('/{pro}-{id}','lirepro')->where([
        'id'=>'[0-9]+',
        'pro'=>'[a-zA-Z0-9\-]+'
    ])->name('lireprogramme');
    Route::post('newprogram','newprogrammesave');

    Route::get('tous','all')->name('tous');
});
