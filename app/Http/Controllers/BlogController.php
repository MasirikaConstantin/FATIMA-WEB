<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogValidator;
use App\Http\Requests\RechercheBlog;
use App\Http\Requests\ValiderCommentaire;
use App\Models\Blog;
use App\Models\Categorie;
use App\Models\CommentaireBlog;
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
    public function show(string $pro, string $id, Request $request)
{
    $blog = Blog::findOrFail($id);

    if ($blog->slug != $pro) {
        return to_route('blog.show', ['id' => $blog->id, 'pro' => $blog->slug]);
    }

    $autresQuery = Blog::where('id', '!=', $id)->orderBy('id', 'desc');
    $autres = $autresQuery->paginate(5, ['*'], 'autres_page');

    $commentaires = $blog->commentaires()->orderBy('id', 'desc')->paginate(5, ['*'], 'page');

    if ($request->ajax()) {
        if ($request->has('autres_page')) {
            return view('blog.partials.autres', compact('autres'))->render();
        }
        if ($request->has('page')) {
            return view('blog.partials.commentaires', compact('commentaires'))->render();
        }
    }

    return view('blog.lireblog', [
        'blog' => $blog,
        'autres' => $autres,
        'Commentaire' => $commentaires
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
        
           
    }

    public function storecomme(ValiderCommentaire $request , string $pro,string $id)
    {
        //dd($id);
        $blog = Blog::find($id);
       // dd(($blog['id']));
        $data =$request->validated();
        //dd($programe);
        $data['user_id'] = Auth::user()->id;

        $data['blog_id'] = $blog['id'];
        //dd($data);
        CommentaireBlog::create($data);
        if($blog->slug  != $pro){
            return to_route('membre.commentaire',['id'=>$blog,'pro'=>$blog->slug]);
        }

        return redirect()->back()->with('success', 'Commentaire publié avec succès');
        
    }

    public function commentedelete( CommentaireBlog $id ){

        //$post=Commentaire::findOrFail($id);
       // dd('$id');
        $id->delete();
        return back()->with('success','Commentaire supprimer avec success');
    
    }
    public function commenteedit(CommentaireBlog $id) {
        // Vérifiez si l'utilisateur est bien connecté et est propriétaire du commentaire
        if ($id->user_id == Auth::user()->id) {
            // Affiche la vue de modification si l'utilisateur est le propriétaire
            return view('blog.modifblog', ['comm' => $id]);
        } else {
            // Si l'utilisateur n'est pas le propriétaire, redirigez vers la page d'édition
            return redirect()->route('blog.show', ['pro' => $id->slug,'id' => $id->id]);
        }
    }
    

    public function validmodof(ValiderCommentaire $request){
        dd($request->validated());
    }


    public function editComment($id)
{
    $comment = CommentaireBlog::findOrFail($id);
    //dd($comment);

    // Vérifier si l'utilisateur connecté est l'auteur du commentaire
    if ($comment->user_id !== Auth::id()) {
        return redirect()->route('blog.show', ['id' => $comment->blogs->id,"pro" => $comment->blogs->slug])
                         ->with('error', 'Vous n\'êtes pas autorisé à modifier ce commentaire.');
    }
    if (empty($comment)) {
        return redirect()->route('blog.show', ['id' => $comment->blogs->id,"pro" => $comment->blogs->slug])
                         ->with('error', 'Ce commentaire est introuvable');
    }

    // Afficher la vue pour modifier le commentaire
    return view('blog.modifblog', ['comment' => $comment]);
}


public function updateComment(Request $request, $id)
{
    $comment = CommentaireBlog::findOrFail($id);
    $post= ($comment->blogs);


    // Vérifier si l'utilisateur connecté est l'auteur du commentaire
    if ($comment->user_id != Auth::id()) {
        return redirect()->route('blog.show', ['id' => $comment->id])
                         ->with('error', 'Vous n\'êtes pas autorisé à modifier ce commentaire.');
    }
    // Valider les données
    $validatedData = $request->validate([
        'contenus' => 'required|string|max:500',
    ]);
    //dd($validatedData);

    // Mettre à jour le commentaire
    //$comment->content = $validatedData['contenus'];
    $comment->update($validatedData);

    return redirect()->route('blog.show', ['id' => $post->id , "pro" =>$post->slug])
                     ->with('success', 'Commentaire mis à jour avec succès.');
}

}
