<?php

namespace App\Http\Controllers;

use App\Http\Requests\Photoprofilvalidator;
use App\Http\Requests\RechercheEvent;
use App\Http\Requests\RechercherProgramme;
use App\Http\Requests\ValiderCommentaire;
use App\Models\Commentaire;
use App\Models\CommentaireEvent;
use App\Models\Evenements;
use App\Models\Programme;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function lirepro(string $pro, string $id){

        // Trouver le programme spécifique par ID
        $programe = Programme::find($id);

       
        // Filtrer les programmes en excluant celui avec l'ID donné
        $autresQuery = Programme::where('id', '!=', $id)
                                 ->orderBy('id', 'desc');
    
        // Appliquer la pagination
        $autres = $autresQuery->paginate(5);
        if($programe->slug  != $pro){
            return to_route('programme.commentaire',['id'=>$programe,'pro'=>$programe->slug,'Commentaire'=>$programe->Commentaire()->orderBy('id','desc')->paginate(5)]);
        }

        
        $count = $programe->users()->count();
    
//dd($count);
        
        // Passer les données à la vue
        return view('lireprogramme', [
            'programme' => $programe,
            'autres' => $autres,
            'count' => $count,
            'Commentaire'=>$programe->Commentaire()->orderBy('id','desc')->paginate(5)
        ]);
    }
    
    
    public function all(RechercherProgramme $request){

        $query=Programme::query();
        if($titre=$request->validated('titre')){
            $query=$query->where('titre','like', "%{$titre}%" );
        }
       
        
            return view ('all', [
                'program' => $query->orderByDesc('id')->where('id','!=','0')->paginate(4),
            ]);
        
        

        //$programes = Programme::paginate(2);

       // return view('all',['program'=>$programes]);
    }
    public function storecomme(ValiderCommentaire $request , string $pro,string $id)
    {
        //dd($id);
        $programe = Programme::find($id);
        $data =$request->validated();
        //dd($programe);
        $data['user_id'] = Auth::user()->id;

        $data['programme_id'] = $programe['id'];
        //dd($data);
        Commentaire::create($data);
        if($programe->slug  != $pro){
            return to_route('programme.commentaire',['id'=>$programe,'pro'=>$programe->slug]);
        }

        return redirect()->back()->with('success', 'Commentaire publié avec succès');
        
    }

    public function commentedelete( Commentaire $id ){

        //$post=Commentaire::findOrFail($id);
        //dd($id);
        $id->delete();
        return back()->with('success','Commentaire supprimer avec success');
    
    }



    public function attend(string $pro, string $id)

    {
        $program = Programme::findOrFail($id);
        $user = Auth::user();

        if ($user->programs->contains($program)) {
            $user->programs()->detach($program);
        } else {
            $user->programs()->attach($program);
        }

        return redirect()->back();
    }

    public function countParticipants(string $pro, string $id)
    {
        $program = Programme::findOrFail($id);
        $count = $program->users()->count();
        return response()->json(['count' => $count]);
    }

    public function lecture(){
        return view('lecture');
    }
    public function dons(){
        return view('dons');
    }

    public function galerie(){
        return view('galerie');
    }
    public function allevents(RechercheEvent $request){
        $query=Evenements::query();
        if($titre=$request->validated('titre')){
            $query=$query->where('titre','like', "%{$titre}%" );
        }
       
        
            return view ('allevent', [
                'events' => $query->orderByDesc('id')->where('id','!=','0')->paginate(4),
            ]);
        
    }
    public function lireevent(string $pro, string $id){
        // Trouver le programme spécifique par ID
        $evenement = Evenements::find($id);

       
        // Filtrer les programmes en excluant celui avec l'ID donné
        $autresQuery = Evenements::where('id', '!=', $id)
                                 ->orderBy('id', 'desc');
    
        // Appliquer la pagination
        $autres = $autresQuery->paginate(5);
        if($evenement->slug  != $pro){
            return to_route('programme.commentaire',['id'=>$evenement,'pro'=>$evenement->slug]);
        }

        
       // $count = $programe->users()->count();
    
//dd($count);
        
        // Passer les données à la vue
        return view('lireevent', [
            'evenement' => $evenement,
            'autres' => $autres,
            //'count' => $count,
            'Commentaire'=>$evenement->commentaires()->orderBy('id','desc')->paginate(5)
        ]);
        //return Evenements::findorfail($id);
    }


    public function storecommeevent(ValiderCommentaire $request , string $pro,string $id)
    {
        //dd($id);
        $evenement = Evenements::find($id);
        $data =$request->validated();
        //dd($programe);
        $data['user_id'] = Auth::user()->id;

        $data['evenements_id'] = $evenement['id'];
        //dd($data);
        CommentaireEvent::create($data);
        if($evenement->slug  != $pro){
            return to_route('programme.commentaire',['id'=>$evenement,'pro'=>$evenement->slug]);
        }

        return redirect()->back()->with('success', 'Commentaire publié avec succès');
        
    }

    public function commentedeleteevent( CommentaireEvent $id ){

        //$post=Commentaire::findOrFail($id);
       // dd($id);
        $id->delete();
        return back()->with('success','Commentaire supprimer avec success');
    
    }

    public function profil( Photoprofilvalidator $profile){
        //dd($profile->validated());
        $user= User::find(Auth::user()->id);
        if($user){
            $image=$profile->validated('image');

            if($image==null || $image->getError()){
                
                return null;
            }
            if($user->image){
            //dd($data);
    
                Storage::disk('public')->delete($user->image);
            }
                $data['image']=$image->store("profilimage",'public');
            $user->image=($data['image']);
            $user->save();
            return to_route('dashboard');
        }
        

    }
}
