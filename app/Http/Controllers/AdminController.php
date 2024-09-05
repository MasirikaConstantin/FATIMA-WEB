<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValiderProgramme;
use App\Models\Programme;
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

        return redirect()->route('admin')->with('success','Programme publier avec Success ! ! ! ');

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

    public function editpro(Programme $id){
        //    dd($id);
            return view('admin.nouv-programme',['programme' =>$id]);
    }


    public function edit(ValiderProgramme $request, Programme $id)
    {
        $data=$request->validated();
        $image=$request->validated('image');
        $programme=$id;
        $status=$request->validated('status');

        //dd($id);
        if($image == null || $image->getError()){
            if($status==null){
                $data['status']=0;
                $programme->update($data);
                return redirect()->route('admin')->with('success','programme  Modifiée  avec Success ! ! ! ');

            }else{
                $programme->update($data);
                return redirect()->route('admin')->with('success','programme  Modifiée  avec Success ! ! ! ');

            }

        }
        if($programme->image){
            Storage::disk('public')->delete($programme->image);

        }

        if($status==null){
        $data['image']=$image->store('imagecat','public');

            $data['status']=0;
            $programme->update($data);
            return redirect()->route('admin')->with('success','programme  Modifiée  avec Success ! ! ! ');

        }else{
        $data['image']=$image->store('imagecat','public');

            $programme->update($data);
        
        return redirect()->route('admin')->with('success', 'Programme modifié avec succès !');
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

        public function newevent(){
            return view('admin.nouv-evenement');
        }


        public function saveEvenement(Request $request)
{
    // Validation des données
    $validatedData = $request->validate([
        'titre' => 'required|string|max:255',
        'description' => 'required|string',
        'date_debut' => 'required|date',
        'date_fin' => 'required|date|after_or_equal:date_debut',
        'h_debut' => 'required|date_format:H:i',
        'h_fin' => 'required|date_format:H:i|after:h_debut',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'slug' => 'required|string|unique:evenements,slug',
        'etat' => 'required|boolean',
        'user_id' => 'nullable|exists:users,id'
    ]);

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
        Evenement::create($this->extractEventData(new Evenement(), $request));
    }

    return redirect()->route('admin')->with('success', 'Événement publié avec succès !');
}

private function extractEventData(Evenement $evenement, Request $request)
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
            \Storage::disk('public')->delete($evenement->image);
        }
        // Sauvegarder la nouvelle image
        $data['image'] = $image->store('evenements', 'public');
    }

    return $data;
}


}