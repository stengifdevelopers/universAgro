<?php

namespace App\Http\Controllers;
use App\Http\Requests\blogFormRequest;
use App\Models\Annonce;
use App\Models\Blog;
use App\Models\Inscrit;
use App\User;
use App\Models\Profile;
use App\Models\Article;
use App\Models\Offre;
use App\Models\Projet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class BlogsController extends Controller
{

   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $datas=Blog::all();
        $blogs = DB::select('SELECT users.*,blogs.*, blogs.id as blog_id, profiles.*
                               FROM users, profiles, blogs
                               WHERE profiles.user_id=users.id
                               AND users.id=blogs.sup_id
                              ');

        return view('pages.blog', compact('blogs', '$datas'));
    }


    public function findBlog(Request $request)
    {
        $datas=Blog::all();

        $blogs = DB::select('SELECT users.*,blogs.*, blogs.id as blog_id, profiles.*
                               FROM users, profiles, blogs
                               WHERE profiles.user_id=users.id
                               AND users.id=blogs.sup_id
                              ');

        if($request->secteur!=null){
            $blogs = DB::select('SELECT users.*,blogs.*, blogs.id as blog_id, profiles.*
            FROM users, profiles, blogs
            WHERE profiles.user_id=users.id
            AND users.id=blogs.sup_id and blogs.secteur="'.$request->secteur.'"
            ');
        }
       
        return view('pages.blog', compact('blogs', '$datas'));
    }
    // public function list(Blog $blog  )
    // {
    //     return view('blogs.list', compact('blog'));
    // }

    public function home($id)
    {

        $blog=Blog::find($id);

        if(!$blog) return view('errors.404');

        $session= session(["blog_id" => $blog->id]);

        if(session('blog_id') == null) return redirect()->route('accueil');

        $datas = DB::select('SELECT users.*,blogs.*, profiles.*
                               FROM users, profiles, blogs
                               WHERE profiles.user_id=users.id
                               AND users.id=blogs.sup_id
                               AND blogs.id="'.$blog->id.'"');

        return view('pages.blogs.accueil', compact('blog', 'datas'));

    }

    public function articles($id)
    {
        $blog=Blog::find($id);
        if(!$blog) return view('errors.404');

        if(session('blog_id') == null) return redirect()->route('accueil');

        $shop=Article::where('blo_id', $blog->id)->get();
        return view('pages.blogs.articles', compact('blog', 'shop'));
    }

    public function offers($id)
    {
        $blog=Blog::find($id);

        if(!$blog) return view('errors.404');

        if(session('blog_id') == null) return redirect()->route('accueil');

        $offers=Offre::where('blo_id', $blog->id)->get();

        if(session('blog_id') == null) return redirect()->route('accueil');

        return view('pages.blogs.offers', compact('blog', 'offers'));
    }

    public function projects($id)
    {
        $blog=Blog::find($id);
        if(!$blog) return view('errors.404');

        if(session('blog_id') == null) return redirect()->route('accueil');

        $projects=Projet::where('blo_id', $id)->get();

        return view('pages.blogs.projects', compact('blog', 'projects'));
    }

    public function annonces($id)
    {
        $blog=Blog::find($id);
        if(!$blog) return view('errors.404');

        if(session('blog_id') == null) return redirect()->route('accueil');

        $annonces=Annonce::where('blo_id', $id)->get();

        return view('pages.blogs.annonces', compact('blog', 'annonces'));
    }

    public function contact($id)
    {
        $blog=Blog::find($id);

        if(!$blog) return view('errors.404');

        if(session('blog_id') == null) return redirect()->route('accueil');


        $datas = DB::select('SELECT users.*,blogs.*, profiles.*
                               FROM users, profiles, blogs
                               WHERE profiles.user_id=users.id
                               AND users.id=blogs.sup_id
                               AND blogs.id="'.$blog->id.'"');

        return view('pages.blogs.contact', compact('blog', 'datas'));
    }

    public function detailarticle($id)
    {
        $detail=Article::find($id);

        if(!$detail) return view('errors.404');

        if(session('blog_id') == null) return redirect()->route('accueil');


        $shop=Article::where('blo_id', session('blog_id') )
                      ->where('id' ,'!=', $detail->id)
                      ->get();

        return view('pages.blogs.detailarticle', compact('blog','shop', 'detail'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('formulaires.create_blog');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $user2 = User::where('email', $request->email)->value('id');

        if($request->choix){
            // $User= new Inscrit();

             request()->validate([
                'nom' => 'required|string|max:255',
                'pseudo' => 'required|string|max:255|unique:users',
                'email' => 'required|string|email|max:255|unique:users',
                'pwd' => 'required|string|confirmed|min:6|',
                'fonction' => 'required|string|min:3',
                'titre' => 'required|min:1',
                'description' => 'required|string|min:5',
                'secteur' => 'required|string',
            ]);


            $User=User::create([
                'name' => $request->nom,
                'pseudo' => $request->pseudo,
                'password' => Hash::make($request->pwd),
                'email' => $request->email,
                'fonction' => $request->fonction,
            ]);


            $selection= explode("-", $request->secteur) ;
            $categories=$selection[0];
            $secteur=$selection[1];

                $success=Blog::create([
                'sup_id' => $User->id,
                'titre' => $request->titre,
                'description' => $request->description,
                'categories' => $categories,
                'secteur' => $secteur,
            ]);

            $profileUSer = new Profile();

            $profileUSer->user_id = $User->id;
            $profileUSer->save();

            return back()->with('success', 'Blog crée avec succès. Vous recevrez un mail dès votre
            blog est validé par votre administrateur');


           }else {



            request()->validate ( [
                            'titre' => 'required|min:1',
                            'description' => 'required|string|min:5',
                            'email2' => 'required|email|string',
                            'secteur' => 'required|string',
                        ]);

            $selection= explode("-", $request->secteur) ;
            $categories=$selection[0];
            $secteur=$selection[1];

             $user = User::where('email', $request->email2)->first();

            if ($user) {
                $exist=Blog::where('sup_id', $user->id)
                             ->where('titre', $request->titre)
                             ->where('etat', 0)
                             ->first();
                if (!$exist) {
                // Le blog ayant les conditions précedentes n'existent pas. On éffectue l'enregistrement
                        $user_Id=$user->id;

                        $success=Blog::create([
                        'sup_id' => $user_Id,
                        'titre' => $request->titre,
                        'description' => $request->description,
                        'categories' => $categories,
                        'secteur' => $secteur,
                    ]);

                    if($success){
                        return back()->with('success', 'Blog crée avec succès. Vous recevrez un mail dès votre
                              blog est validé par votre administrateur');
                        }
                }else
                {
                    // Ici on mentionne que le blog reste à l'attente d'une validation d'un administrateur
                    return back()->with('warning', 'Blog existant, veullez attendre la validation d\'un administrateur');
                }

             }else{
                return back()->with('error', 'Adresse email introuvable. Vous devrez être
                    inscrit avant de créer un blog');
              }
          }



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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
