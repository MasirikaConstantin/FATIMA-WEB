<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActuValidator;
use App\Http\Requests\EvenementsValidateur;
use App\Http\Requests\GallerieValidator;
use App\Http\Requests\LectureRequest;
use App\Http\Requests\ValiderProgramme;
use App\Models\Actu;
use App\Models\Evenements;
use App\Models\Gallerie;
use App\Models\Lecture;
use App\Models\Programme;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function newprogramme(Programme $programme){
        return view('admin.nouv-programme',['programme' => $programme]);
    }
    public function newprogrammesave(ValiderProgramme $request){
        
             // Extraire les heures de début et de fin
             $hDebut = $request->validated('h_debut');
             $hFin = $request->validated('h_fin');
             // Convertir les heures en objets DateTime pour la comparaison
             $debut = \DateTime::createFromFormat('H:i', $hDebut);
             $fin = \DateTime::createFromFormat('H:i', $hFin);
     
               // Vérifier si l'heure de début est avant l'heure de fin
             if ($debut >= $fin) {
     
                 return redirect()->back()->withErrors(['h_debut' => 'L\'heure de début doit être avant l\'heure de fin.']);
             }else{

                Programme::create($this->extractData(new Programme(), $request));
             }

        return redirect()->route('admin.allpro')->with('success','Programme publier avec Success ! ! ! ');

    }

    private function extractData(Programme $programme,ValiderProgramme $request){
        $data=$request->validated();

        
      

       // dd($data);
        /**
        * @var UploadedFile $image
         */
        $image=$request->validated('image');
        if($image==null || $image->getError()){
            return $data;
        }
        if($programme->image){
            Storage::disk('public')->delete($programme->image);
        }
            $data['image']=$image->store("imageprogramme",'public');
        return $data;
    }

    private function extractEventData(Evenements $evenement, Request $request)
{
    // Extraire les données validées
    $data = $request->validated();

    // Gérer l'image
    /**
     * @var \Illuminate\Http\UploadedFile $image
     */
    $image = $request->file('image');
    if ($image && !$image->getError()) {
        if ($evenement->image) {
            // Supprimer l'ancienne image si elle existe
            Storage::disk('public')->delete($evenement->image);
        }
        // Sauvegarder la nouvelle image
        $data['image'] = $image->store('evenements', 'public');
    }

    return $data;
}

    public function editpro(Programme $id){
        //    dd($id);
            return view('admin.nouv-programme',['programme' =>$id]);
    }

    public function edit_evnt(Evenements $id){
        //    dd($id);
            return view('admin.nouv-evenement',['evenement' =>$id]);
    }


    public function edit_news(Actu $id){
        //    dd($id);
            return view('admin.nouv-actus',['actus' =>$id]);
    }
    public function edit(ValiderProgramme $request, Programme $id)
    {
        $data=$request->validated();

        //dd($data);
        $image=$request->validated('image');
        $programme=$id;
        $status=$request->validated('status');

        //dd($id);
        if($image == null || $image->getError()){
            if($status==null){
                $data['status']=0;
                $programme->update($data);
                return redirect()->route('admin.allpro')->with('success','programme  Modifiée  avec Success ! ! ! ');

            }else{
                $programme->update($data);
                return redirect()->route('admin.allpro')->with('success','programme  Modifiée  avec Success ! ! ! ');

            }

        }
        if($programme->image){
            Storage::disk('public')->delete($programme->image);

        }

        if($status==null){
        $data['image']=$image->store('imageprogramme','public');

            $data['status']=0;
            $programme->update($data);
            return redirect()->route('admin.allpro')->with('success','programme  Modifiée  avec Success ! ! ! ');

        }else{
        $data['image']=$image->store('imageprogramme','public');

            $programme->update($data);
        
        return redirect()->route('admin.allpro')->with('success', 'Programme modifié avec succès !');
    }

}

    public function deletpro( Programme  $id ){
        if($id->image){
            Storage::disk('public')->delete($id->image);
        }

        $id->delete();
        return redirect()->route('admin')->with('success','Le Programme  a été supprimer  avec Success ! ! ! ');


    }

    public function updates(Request $request, Programme $id)
        {
            // Valider uniquement le champ 'etat'
            $request->validate([
                'etat' => 'required|boolean',
            ]);
    
            // Récupérer la valeur de 'etat'
            $etat = $request->input('etat');
    
            // Mettre à jour le champ 'etat' du post
            $id->update(['etat' => $etat]);
    
            // Redirection après la mise à jour
            return redirect()->route('dashboard')->with('success', 'Post status updated successfully');
        }

        public function newevent(Evenements $event){
            return view('admin.nouv-evenement',['evenement' =>$event]);
        }


        public function saveEvenement(EvenementsValidateur $request)
{
    // Validation des données
    $validatedData = $request->validated();

    // Extraire les heures de début et de fin
    $hDebut = $validatedData['h_debut'];
    $hFin = $validatedData['h_fin'];

    // Convertir les heures en objets DateTime pour la comparaison
    $debut = \DateTime::createFromFormat('H:i', $hDebut);
    $fin = \DateTime::createFromFormat('H:i', $hFin);

    // Vérifier si l'heure de début est avant l'heure de fin
    if ($debut >= $fin) {
        return redirect()->back()->withErrors(['h_debut' => 'L\'heure de début doit être avant l\'heure de fin.']);
    } else {
        // Créer un nouvel événement
        Evenements::create($this->extractEventData(new Evenements(), $request));
    return redirect()->route('admin')->with('success', 'Événement publié avec succès !');

    }

    return redirect()->route('admin')->with('success', 'Événement publié avec succès !');
}

public function editevent(EvenementsValidateur $request, Evenements $id)
    {
        $data=$request->validated();
        $image=$request->validated('image');
        $evenement=$id;
        $status=$request->validated('status');

        //dd($id);
        if($image == null || $image->getError()){
            if($status==null){
                $data['status']=0;
                $evenement->update($data);
                return redirect()->route('admin.alleve')->with('success','evenement  Modifiée  avec Success ! ! ! ');

            }else{
                $evenement->update($data);
                return redirect()->route('admin.alleve')->with('success','evenement  Modifiée  avec Success ! ! ! ');

            }

        }
        if($evenement->image){
            Storage::disk('public')->delete($evenement->image);

        }

        if($status==null){
        $data['image']=$image->store('evenements','public');

            $data['status']=0;
            $evenement->update($data);
            return redirect()->route('admin.alleve')->with('success','evenement  Modifiée  avec Success ! ! ! ');

        }else{
        $data['image']=$image->store('evenements','public');

            $evenement->update($data);
        
        return redirect()->route('admin.alleve')->with('success', 'evenement modifié avec succès !');
    }

}

public function newactus(Actu $ac){
    return view('admin.nouv-actus',['actus' =>$ac]);
}

public function saveActus(ActuValidator $request){
    //dd($request->validated());

    // Validation des données
    $validatedData = $request->validated();

   
        // Créer un nouvel événement
        Actu::create($this->extractActusData(new Actu(), $request));
    return redirect()->route('admin')->with('success', 'Actus publié avec succès !');


    return redirect()->route('admin')->with('success', 'Actus publié avec succès !');


}
private function extractActusData(Actu $evenement, Request $request)
{
    // Extraire les données validées
    $data = $request->validated();

    // Gérer l'image
    /**
     * @var \Illuminate\Http\UploadedFile $image
     */
    $image = $request->file('image');
    if ($image && !$image->getError()) {
        if ($evenement->image) {
            // Supprimer l'ancienne image si elle existe
            Storage::disk('public')->delete($evenement->image);
        }
        // Sauvegarder la nouvelle image
        $data['image'] = $image->store('actus', 'public');
    }

    return $data;
}


    public function allpro(){
        return view('admin.tous-programme',
        [
            'tous' => Programme::orderBy('id', 'desc')->paginate(6),
            'nombre' => Programme::count(),
            'nombre_actif' => Programme::where("etat", 1)->count(),


        ]);
    }

    public function alleve(){
        return view('admin.tous-events',
        [
            'nombre_eve' => Evenements::count(),
            'nombre_actif_eve' => Evenements::where("etat", 1)->count(),
            'tous_eve' => Evenements::orderBy('id', 'desc')->get(),



        ]);
    }

    public function allnew(){
        return view('admin.tous-news',
        [
            'tous_act' => Actu::orderBy('id', 'desc')->get(),
            'nombre_act' => Actu::count(),
            'nombre_actif_act' => Actu::where("etat", 1)->count(),

        ]);
    }




    public function editnews(ActuValidator $request, Actu $id)
    {
        $data=$request->validated();
        $image=$request->validated('image');
        $programme=$id;

        //dd($id);
        if($image == null || $image->getError()){
                $programme->update($data);
                return redirect()->route('admin.allnew')->with('success','Actualité  Modifiée  avec Success ! ! ! ');

           

        }
        if($programme->image){
            Storage::disk('public')->delete($programme->image);

        }

        
        $data['image']=$image->store('actus','public');

            $programme->update($data);
        
        return redirect()->route('admin.allnew')->with('success', 'Actualité modifié avec succès !');

}

public function deletnews( Actu  $id ){
    if($id->image){
        Storage::disk('public')->delete($id->image);
    }

    $id->delete();
    return redirect()->route('admin.allnew')->with('success','Le Programme  a été supprimer  avec Success ! ! ! ');


}
public function editnews_archive(Request $request, Actu $id){

    
     // Valider uniquement le champ 'etat'
     $request->validate([
        'etat' => 'required|boolean',
    ]);

    // Récupérer la valeur de 'etat'
    $etat = $request->input('etat');
    //dd($etat);
    // Mettre à jour le champ 'etat' du post
    $id->update(['etat' => $etat]);

    // Redirection après la mise à jour
    return redirect()->route('admin.allnew')->with('success', 'L\'actus  a été modifier  avec Success ! ! !');
}


public function editevents_programme(Request $request, Programme $id){

    
    // Valider uniquement le champ 'etat'
    $request->validate([
       'etat' => 'required|boolean',
   ]);

   // Récupérer la valeur de 'etat'
   $etat = $request->input('etat');
   //dd($etat);
   // Mettre à jour le champ 'etat' du post
   $id->update(['etat' => $etat]);

   // Redirection après la mise à jour
   return redirect()->route('admin.allpro')->with('success', 'Le Programme  a été modifier  avec Success ! ! !');
}

public function editevents_archive(Request $request, Evenements $id){

    
    // Valider uniquement le champ 'etat'
    $request->validate([
       'etat' => 'required|boolean',
   ]);

   // Récupérer la valeur de 'etat'
   $etat = $request->input('etat');
   //dd($etat);
   // Mettre à jour le champ 'etat' du post
   $id->update(['etat' => $etat]);

   // Redirection après la mise à jour
   return redirect()->route('admin.alleve')->with('success', 'L\'événement  a été modifier  avec Success ! ! !');
}

public function newlecture(Lecture $id){
    return view("admin.newlecture",['actus' =>$id]);
}
public function newlecturesave(LectureRequest $request){

   $data = $request->validated();
   Lecture::create($data);
    return view('admin.touslecture',[
        'nombre_eve' => Lecture::count(),
            'nombre_actif_eve' => Lecture::where("etat", 1)->count(),
            'tous_eve' => Lecture::orderBy('id', 'desc')->get(),
    ]) ->with('success', 'La lecture  a été créer  avec Success ! ! !') ;
}
public function alllecture(){
    return view('admin.touslecture', [
        'nombre_eve' => Lecture::count(),
            'nombre_actif_eve' => Lecture::where("etat", 1)->count(),
            'tous_eve' => Lecture::orderBy('id', 'desc')->get(),

    ]);

}
public function modiflect(Lecture $id){
    return view('admin.newlecture',['actus' =>$id]);
}

public function modiflects(LectureRequest $request, Lecture $id)  {
    $data=$request->validated();
        $lecture=$id;
    $lecture->update($data);
        
    return redirect()->route('lecture.alllecture')->with('success', 'Modification réalisée avec avec succès !');
}
public function nommer_admin( User $id){

    //dd($id);
    
    
   $id->update(["role" => 0]);

   // Redirection après la mise à jour
   return redirect()->route('admin')->with('success', "L'utilisateur $id->name  a été nommer Administrateur ! ! !");
}

public function supprimer_admin( User $id){

    //dd($id);
    
    
   $id->update(["role" => 1]);

   // Redirection après la mise à jour
   return redirect()->route('admin')->with('success', "L'utilisateur $id->name  n'est plus Administrateur ! ! !");
}



public function supprimer_user( User $id){

    //dd($id);
    
    
   $id->delete();

   // Redirection après la mise à jour
   return redirect()->route('admin')->with('success', "L'utilisateur $id->name  a était supprimer avec success ! ! !");
}


public function nouvgallerie(Gallerie $galleries){
    return view("admin.creergallerie",['galleries'=>$galleries]);
}

public function envgallerie(GallerieValidator $request){
    //dd($request->validated());
    Gallerie::create($this->extractDataGallerie(new Gallerie(), $request));

    return redirect()->route('admin')->with('success','Photo ajoutée avec Success ! ! ! ');

}
private function extractDataGallerie(Gallerie $programme,GallerieValidator $request){
    $data=$request->validated();

    
  

   // dd($data);
    /**
    * @var UploadedFile $image
     */
    $image=$request->validated('image');
    if($image==null || $image->getError()){
        return $data;
    }
    if($programme->image){
        Storage::disk('public')->delete($programme->image);
    }
        $data['image']=$image->store("imggallerie",'public');
    return $data;
}
public function allgalleries(){
    return view("admin.tous-gallerie",[
       'tous_act' => Gallerie::orderBy('id', 'desc')->get(),
            'nombre_act' => Gallerie::count(),

    ]);
}

public function modif_gallerie(Gallerie $id){
    //    dd($id);
        return view('admin.creergallerie',['galleries' =>$id]);
}




public function modif_galleriev(GallerieValidator $request, Gallerie $id)
    {
        $data=$request->validated();
        $image=$request->validated('image');
        $programme=$id;

        //dd($id);
        if($image == null || $image->getError()){
                $programme->update($data);
                return redirect()->route('admin.allgalleries')->with('success','Gallerie  Modifiée  avec Success ! ! ! ');

           

        }
        if($programme->image){
            Storage::disk('public')->delete($programme->image);

        }

        
        $data['image']=$image->store('imggallerie','public');

            $programme->update($data);
        
        return redirect()->route('admin.allgalleries')->with('success', 'Gallerie modifié avec succès !');

}


public function delet_gallerie( Gallerie  $id ){
    if($id->image){
        Storage::disk('public')->delete($id->image);
    }

    $id->delete();
    return redirect()->route('admin.allgalleries')->with('success','La Gallerie  a été supprimer  avec Success ! ! ! ');


}
}