<?php

namespace App\Http\Controllers;

use App\Http\Requests\articleFormRequest;
use App\Models\Article;
use App\Models\Blog;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ArticlesController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['list', 'details','findArticle']);

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog = Blog::where('sup_id', Auth::user()->id)
                ->where('etat', 0)
                ->first();

        if(!$blog) return view('errors.404');

        $session=session('blog');

        if(!$session) return redirect()->route('index');

        $articles=Article:: where('blo_id',  $session->id)
                            ->get();

        return view('Admin.articles.index', compact('articles'));
    }

    public function findArticle(Request $request)
    {
        $articles=Article::orderBy('id', 'DESC');
       
        $request->id !=null ? $articles=$articles->where('categorie_id', $request->id):$articles=$articles;
        $request->prix !=null ? $articles= $articles->where('prix', $request->prix):$articles=$articles;
        $request->nom !=null ? $articles= $articles->where('nom',"LIKE","%".$request->nom."%"):$articles=$articles;
        $articles= $articles->limit(10)->get();

        $listCategories=Categorie::orderBy('id', 'DESC')->get();

        $articlesPrix=Article::orderBy('id', 'DESC')->get();

        return view('pages.articles.index', compact('articles','listCategories','articlesPrix'));
    }

    public function list()
    {
        $articles=Article::orderBy('id', 'DESC')->get();
        $listCategories=Categorie::orderBy('id', 'DESC')->get();

        $articlesPrix=Article::orderBy('id', 'DESC')->get();

        return view('pages.articles.index', compact('articles','listCategories','articlesPrix'));
       
    }

    public function details($id)
    {
        $articles=Article::find($id);
        if(!$articles) return view('errors.404');

        $details = DB::select('SELECT users.*,blogs.*, articles.*, blogs.id as blog_id, profiles.*
                               FROM users, profiles, blogs, articles
                               WHERE profiles.user_id=users.id
                               AND users.id=blogs.sup_id
                               AND articles.blo_id=blogs.id
                               AND articles.id= "'.$articles->id.'"
                              ');

        $similar=Article::where('categorie_id', $articles->categorie_id)
                            ->where('id', '!=', $articles->id)
                            ->orderBy('id', 'DESC')
                            ->limit(5)->get();


        return view('pages.articles.show', compact('articles', 'similar', 'details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Categorie::all();
        return view('Admin/articles/create', compact('categories') );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(articleFormRequest $request)
    {
        $request->validate([
            'fichier' => 'required|image|mimes:jpeg,jpg,png,gif|max:10000'
        ]);

        $success=Article::create($this->dataArticle($request));

        if($success){

            $notification = array(
                'message' => 'Sauvegarde éffectuée avec succès!',
                'alert-type' => 'success'
            );

        }else{
            $notification = array(
                'message' => 'Erreur l\'ors de l\'enregitrement !',
                'alert-type' => 'error'
            );
        }

        return back()->with($notification);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        // $article=Article:: all() ;
        $categories=Categorie::all();
        return view('Admin/articles/edit', compact('article' , 'categories' ) );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(articleFormRequest $request, Article $article)
    {
        $request->validate([
            'fichier' => 'sometimes|image|mimes:jpeg,jpg,png,gif|max:10000'
        ]);

        $success = $article->update($this->dataArticle($request));
        if($success){

            $notification = array(
                'message' => 'Modification effectué avec succès !',
                'alert-type' => 'success'
            );

            return redirect()->route('articles.index')->with($notification);

        }else {
            $notification = array(
                'message' => 'Erreur l\'ors de l\'enregitrement !',
                'alert-type' => 'error'
            );

            return back()->with($notification);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $article=Article::where('id', $id);
        $article->delete();

        return redirect()->route('articles.index')->with(array(
            'message' => 'Suppression effectué avec succès !',
            'alert-type' => 'success'
        ));

    }

    public function dataArticle($request) {

        $articlePost = [
            'categorie_id' => $request->cat_id,
            'blo_id' => session('blog')->id,
            'nom' => $request->nom,
            'description' => $request->description,
            'prix' => $request->prix,
            'prixRabais' => $request->prixRabais,
            'pourcentRed' => $request->pourcentRed,
            'quantite' => $request->quantite,
            'date_post'=> date('Y-m-d H:m:s' )
        ];

        if(request('fichier'))
        {
            $extension= $request->fichier->getClientOriginalExtension();
            $imagePath = 'img/articles/'.time().'.'.$extension;

            $imageFile=$request->fichier->getClientOriginalName();
            $request->fichier->move(('img/articles'), time().'.'.$extension);

            $articlePost = array_merge($articlePost, ['fichier' => $imageFile, 'fichier_path' => $imagePath]);
            return $articlePost;
        }else
        {
            return $articlePost;
        }
    }
}
