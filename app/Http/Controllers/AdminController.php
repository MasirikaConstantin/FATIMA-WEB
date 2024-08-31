<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValiderProgramme;
use App\Models\Programme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function newprogramme(){
        return view('admin.nouv-programme');
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

        $data['user_id']=Auth::user()->id;
      

        //dd($data);
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
}
