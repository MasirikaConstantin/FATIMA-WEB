<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogValidator;
use App\Http\Requests\RechercheBlog;
use App\Models\Blog;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function index(){
        return view('blog.index',['blogs' => Blog::where('etat', 0)->paginate(2),'categories' => Categorie::select('id','titre')->get()->where('etat',false)]);
    }

    public function nouveau(Blog $blog){
        return view('blog.creerblog', ['blog' => $blog,"category" => Categorie::select('id','titre')->get()->where('etat',false)]);
    }
    public function save(BlogValidator $request){
        //dd(now());
        
        $data = $request->validated();
        $data['user_id'] = Auth::user()->id;

       // dd($data);
        Blog::create($data);

        return redirect()->route("monprofile")->with('success', 'Post publié avec succès');
    }
    public function show(string $pro , string $id){

         $blog = Blog::find($id);

       
         $autresQuery = Blog::where('id', '!=', $id)
                                  ->orderBy('id', 'desc');
     
         $autres = $autresQuery->paginate(5);
         if($blog->slug  != $pro){
             return to_route('blog.show',['id'=>$blog,'pro'=>$blog->slug]);
         }
 
         
         return view('blog.lireblog', [
             'blog' => $blog,
             'autres' => $autres,
             //'count' => $count,
             //'Commentaire'=>$evenement->commentaires()->orderBy('id','desc')->paginate(5)
         ]);
    }


    public function recherche(RechercheBlog $request){
        $query=Blog::query();
        //dd('$request->validated()');
        if($titre=$request->validated('titre')){
            $query=$query->where('titre','like', "%{$titre}%" );
        }
      
        if($categorie_id=(int)$request->validated('categorie_id')){
            $query=$query->where('categorie_id','=', $categorie_id );
        }
        
            return view ('blog.index',
            [
                'blogs' => $query->orderByDesc('id')->paginate(4),
                'categories' => Categorie::select('id','titre')->get(),
                'input'=>$request->validated()
            ]);
        
            /*if($titre=$request->validated('titre')){
                $query=$query->where('titre','like', "%{$titre}%" );
            }
           
            
                return view ('all', [
                    'program' => $query->orderByDesc('id')->where('id','!=','0')->paginate(4),
                ]);
            
*/
    }
}
