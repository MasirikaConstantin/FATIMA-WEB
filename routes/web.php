<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommentaireControle;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Models\Actu;
use App\Models\Evenements;
use App\Models\Lecture;
use App\Models\Programme;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
/*
     // Récupérer le dernier enregistrement
    $dernierProgramme = Programme::orderBy('id', 'desc')->where('etat',"==",0)->first();
    
    // Récupérer tous les programmes sauf le dernier, avec une pagination de 4
    $programmesSansDernierQuery = Programme::orderBy('id', 'desc')->where('etat',"==",0);
    
    if ($dernierProgramme) {
        $programmesSansDernierQuery = $programmesSansDernierQuery->where('etat',"==",0)->where('id', '<>', $dernierProgramme->id);
    }
    
    $programmesSansDernier = $programmesSansDernierQuery->paginate(4);
*/
$dernier = Lecture::orderBy('id', 'desc')->first();

    return view('welcome', [
       // "presentation" => Programme::latest()->where('etat',"==",0)->first(),
        'programmes' => Programme::orderBy('id', 'desc')->limit(4)->get()->where('etat',"==",0),
        'evenements' => Evenements::orderBy('id', 'desc')->limit(2)->get()->where('etat',"==",0),
        'actus' => Actu::orderBy('id', 'desc')->limit(3)->get()->where('etat',"==",0),
        'dernier' => $dernier,

    ]);
})->name('welcome');
/*
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified', 'rolemanager:autre'])->name('dashboard');

    Route::get('gest-admin/dashboard', function () {
        //dd(Programme::all());
        return view(
            'admin',
            [
                'tous' => Programme::orderBy('id', 'desc')->paginate(6),
                'tous_eve' => Evenements::orderBy('id', 'desc')->paginate(6),
                'nombre' => Programme::count(),
                'nombre_eve' => Evenements::count(),
                'nombre_actif' => Programme::where("etat", 1)->count(),
                'nombre_actif_eve' => Evenements::where("etat", 1)->count()

            ]
        );
    })->middleware(['auth', 'verified', 'rolemanager:admin'])->name('admin');

    Route::get('utilisateur/dashboard', function () {
        return view('utilisateur');
    })->middleware(['auth', 'verified', 'rolemanager:utilisateur'])->name('utilisateur');
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'rolemanager:autre'])->name('dashboard');

Route::get('gest-admin/dashboard', function () {
    return view('admin', [
        'tous_act' => Actu::orderBy('id', 'desc')->paginate(6),
        'nombre_act' => Actu::count(),
        'nombre_actif_act' => Actu::where("etat", 1)->count(),
    ]);
})->middleware(['auth', 'verified', 'rolemanager:admin'])->name('admin');

Route::get('utilisateur/dashboard', function () {
    return view('utilisateur');
})->middleware(['auth', 'verified', 'rolemanager:utilisateur'])->name('utilisateur');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::prefix('admin')->name('admin.')->controller(AdminController::class)->middleware(['auth', 'verified','rolemanager:admin'])->group( function () {
    Route::get('newprogram','newprogramme')->name('newprogramme');
    Route::post('newprogram','newprogrammesave');

    Route::get('newevent','newevent')->name('newevent');
    Route::post('newevent','saveEvenement');

    Route::get('newactus','newactus')->name('newactus');
    Route::post('newactus','saveActus');


    Route::get('/modif/{id}','editpro')->name('editpro');
    Route::put('/modif/{id}','edit');
    Route::get('/modif_event/{id}','edit_evnt')->name('edit_evnt');
    Route::put('/modif_event/{id}','editevent');

    Route::get('/delet/{id}','deletpro')->name('deletprogram');
    Route::put('/prog/{id}', 'updates')->name('posts.update');

    Route::get('/modif_actus/{id}','edit_actus')->name('edit_actus');
    Route::put('/modif_actus/{id}','editactus');

    Route::get('/modif_news/{id}','edit_news')->name('edit_news');
    Route::put('/modif_news/{id}','editnews');

    Route::get('/delet-news/{id}','deletnews')->name('deletnews');
    //archiver
    Route::put('/modif-news/{id}','editnews_archive')->name('editnews_archive');
    Route::put('/modif_events/{id}','editevents_archive')->name('editevents_archive');



    Route::get('/allpro', 'allpro')->name('allpro');
    Route::get('/alleve', 'alleve')->name('alleve');
    Route::get('/allnew', 'allnew')->name('allnew');
});

Route::prefix('programme')->name('programme.')->controller(UserController::class)->group( function () {
    Route::get('/{pro}-{id}','lirepro')->where([
        'id'=>'[0-9]+',
        'pro'=>'[a-zA-Z0-9\-]+'
    ])->name('lireprogramme');

    

    Route::post('/{pro}-{id}',  'storecomme')->where([
        'id'=>'[0-9]+',
        'pro'=>'[a-zA-Z0-9\-]+'
    ])->name('commentaire');
    Route::get('/supp/{id}', 'commentedelete')->name('deletecomm');


    Route::post('newprogram','newprogrammesave');

    Route::get('tous','all')->name('tous');

   /* Route::post('/{pro}-{id}', 'attend')->where([
        'id'=>'[0-9]+',
        'pro'=>'[a-zA-Z0-9\-]+'
    ])->name('attend');
   -*/
    //Route::get('/{pro}-{id}', 'countParticipants')->name('programs.count');

});

Route::get('lecture-jour',[UserController::class,'lecture'])->name('lecture-jour');
Route::get('dons',[UserController::class,'dons'])->name('dons');
Route::get('galerie',[UserController::class,'galerie'])->name('galerie');
Route::get('news',[UserController::class,'news'])->name('news');
Route::put('/profile', [UserController::class, 'profil'])->name('photo');

Route::get('/{pro}-{id}', [ UserController::class, 'actuslire'])->where([
    'id'=>'[0-9]+',
    'pro'=>'[a-zA-Z0-9\-]+'
])->name('actuslire');

Route::prefix('event')->name('event.')->controller(UserController::class)->group( function () {
    Route::get('tousevents','allevents')->name('tousevent');

    Route::get('/{pro}-{id}','lireevent')->where([
        'id'=>'[0-9]+',
        'pro'=>'[a-zA-Z0-9\-]+'
    ])->name('lireeventsme');

    Route::post('/{pro}-{id}',  'storecommeevent')->where([
        'id'=>'[0-9]+',
        'pro'=>'[a-zA-Z0-9\-]+'
    ])->name('commentaire');
    Route::get('/supp/{id}', 'commentedeleteevent')->name('deletecomm');
 
});

Route::prefix('lecture')->name('lecture.')->controller(AdminController::class)->group(function(){
    Route::get('adm/newlecture',"newlecture")->name("newlecture");
    Route::post('adm/newlecture',"newlecturesave");

    Route::get('adm/newlecture/{id}','modiflect')->name("modiflect");
    Route::put('adm/newlecture/{id}','modiflects');

    Route::get('adm/lecture',"alllecture")->name("alllecture");


});

Route::get('lecture/tous',[ UserController::class,'touslecture'])->name("lecture.lecture");
Route::get('lecture/{id}',[ UserController::class,'lectureid'])->name("lectureid");
