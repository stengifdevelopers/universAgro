<?php
namespace App\Http\Controllers;
use App\Models\Projet;
use Illuminate\Http\Request;
use App\Http\Requests\projetFormRequest;
use App\Models\Comment;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProjetsController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['list', 'details', 'comment','findProjet']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $session=session('blog');

        if(!$session) return redirect()->route('index');

        $projets=Projet::where('blo_id',  $session->id)
        ->get();
        return view('Admin.projets.index', compact('projets'));
    }

    public function list()
    {
        $projets=Projet::all();
        return view('pages.projets.index', compact('projets'));
    }

    
     public function findProjet(Request $request)
    {
        $projets=Projet::orderBy('id', 'DESC');

        $request->libelle !=null ? $projets= $projets->where('libelle',"LIKE","%".$request->libelle."%"):$projets=$projets;
        $projets= $projets->limit(10)->get();

        return view('pages.projets.index', compact('projets'));
    }

    public function comment(Request $request)
    {
        $request->validate([
            'message' => 'required|string|min:5|nullable',
            'projet_id' => 'required|integer',
        ]);
        if (Auth::user()==null) {
            $request->validate([
                'email' => 'required|string|email',]);
        }
        $email = request('email') != null ? request('email') : Auth::user()->email;
        $user = null;
        if(Auth::user()==null){

            $user = User::Where("email", $email)->get()->get(0);
            if($user == null) return back()->with('error', 'L\'adresse email saisi est incorect');
        }else {
            $user = Auth::user();
        }
        $success=Comment::create([

            'user_id' => $user->id,
            'projet_id' => $request->projet_id,
            'email' => $email,
            'message' => $request->message,
        ]);

        if($success){
            return back()->with('success', 'Enregistrement effectué avec succès');
        }

    }

    public function details($id)
    {
        $projets=Projet::find($id);

        if(!$projets) return view('errors.404');
        $user=DB::select('SELECT users.*, blogs.*, profiles.* , projets.* FROM users, blogs, projets, profiles
                          WHERE users.id=blogs.sup_id AND blogs.id=projets.blo_id AND  profiles.user_id=users.id
                          AND projets.id= "'.$projets->id.'"');

        // $comments=Comment::where('projet_id', "$projets->id" )
        //                  ->orderBy('id', 'DESC')->get();
        
        $comments=DB::select('SELECT users.*, comments.*, comments.created_at as creation, profiles.*, projets.* 
                              FROM users, comments, profiles, projets 
                              where users.id = comments.user_id
                              AND projets.id=comments.projet_id
                              AND users.id=profiles.user_id
                              AND comments.projet_id= "'.$projets->id.'"
                              ORDER BY comments.id DESC ');

        return view('pages.projets.show', compact('projets', 'user', 'comments'));
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin/projets/create' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(projetFormRequest $request)
    {
        $session=session('blog');

        if(!$session) return redirect()->route('index');

        $success=Projet::create($this->dataProjet($request));

        if($success){
            return back()->with('success', 'Enregistrement effectué avec succès');
        }else{
            return back()->with('error', 'Une erreur détectée');
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
    public function edit(Projet $projet)
    {
        return view('Admin.projets.edit', compact('projet'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(projetFormRequest $request, Projet $projet)
    {
        $success = $projet->update($this->dataProjet($request));

        if($success){
            return redirect()->route('projets.index')->with('success', 'Modification effectué avec succès');
        }else{
            return back()->with('error', 'Une erreur détectée');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Projet $projet)
    {
        $projet->delete();

        return redirect()->route('projets.index')->with('success', 'Suppression effectué avec succès');
    }

    public function dataProjet($request) {

        $extension= $request->image->getClientOriginalExtension();
        $imagePath = 'img/projets/'.time().'.'.$extension;

        $imageFile=$request->image->getClientOriginalName();
        $request->image->move(('img/projets/'), time().'.'.$extension);

        return [
            'blo_id' =>  session('blog')->id,
            'libelle' => $request->libelle,
            'description' => $request->description,
            'image' => $imageFile,
            'image_path' => $imagePath

        ];
    }
}
