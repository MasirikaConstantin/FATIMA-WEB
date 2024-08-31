<?php

namespace App\Http\Controllers;

use App\Http\Requests\RechercherProgramme;
use App\Models\Programme;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function lirepro(string $pro, string $id){
       $programe = Programme::find($id);
       $autres = Programme::orderBy('id', 'desc')->paginate(5)->where('id', '!=', $id);
       // dump($autres);
        return view('lireprogramme',['programme'=>$programe,'autres'=>$autres]);
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
}
