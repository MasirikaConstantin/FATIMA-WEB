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
        
       // dd($request->validated());
             // Extraire les heures de début et de fin
             $hDebut = $request->validated('h_debut');
             $hFin = $request->validated('h_fin');
             // Convertir les heures en objets DateTime pour la comparaison
             $debut = \DateTime::createFromFormat('H:i', $hDebut);
             $fin = \DateTime::createFromFormat('H:i', $hFin);
             //dd($fin);
     
               // Vérifier si l'heure de début est avant l'heure de fin
             if ($debut >= $fin) {
     
                 return redirect()->back()->withErrors(['h_debut' => 'L\'heure de début doit être avant l\'heure de fin.']);
             }else{

                Programme::create($this->extractData(new Programme(), $request));
                //return back();
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
}