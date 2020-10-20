<?php

namespace App\Http\Controllers;

use App\Http\Requests\annonceFormRequest;
use App\Models\Annonce;
use Illuminate\Http\Request;

class AnnoncesController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['list', 'details']);
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

        $annonces=Annonce::where('blo_id',  $session->id)
        ->get();

        return view('Admin.annonces.index', compact('annonces'));
    }

    public function list()
    {
        $annonces=Annonce::all();
        $actu=Annonce::where('type_announce', 0)->get();
        $offers=Annonce::where('type_announce', 1)->get();

        return view('pages.annonces.index', compact('annonces', 'actu', 'offers'));
    }

    public function details($id)
    {
        $annonces=Annonce::find($id);
        if(!$annonces) return view('errors.404');

        $similar=Annonce::where('type_announce', "'$annonces->type_announce'")->get();
        return view('pages.annonces.show', compact('annonces', 'similar'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin/annonces/create' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(annonceFormRequest $request)
    {
        $session=session('blog');

        if(!$session) return redirect()->route('index');

        // $request->validate([

        // ]);
        $success=Annonce::create($this->dataAnnonce($request));

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
    public function edit(Annonce $annonce)
    {
        //  $annonce=Annonce::All();
        $session=session('blog');

        if(!$session) return redirect()->route('index');
         return view('Admin.annonces.edit', compact('annonce'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(annonceFormRequest $request, Annonce $annonce)
    {
        // $request->validate([
        //     'fichier' => 'sometimes|mimes:jpeg,jpg,png,gif,docx,doc,pdf,txt,mp4,avi,ogg,mpeg,3gp|max:10000000'
        // ]);

        $success = $annonce->update($this->dataAnnonce($request));

        if($success){
            return redirect()->route('annonces.index')->with('success', 'Modification effectué avec succès');
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
    public function destroy(Annonce $annonce)
    {
        $annonce->delete();

        return redirect()->route('annonces.index')->with('success', 'Suppression effectué avec succès');
    }

    public function dataAnnonce($request) {

        $annoncePost = [
            'blo_id'=> session('blog')->id,
            'titre' => $request->titre,
            'contenu' => $request->contenu,
            'source' => $request->source,
            'editeur' => $request->editeur,

        ];

        if(request('choix')){

            $request->validate([
                'localisation' => 'required|string|max:255',
                'superficie' => 'required|string|min:2',
                'price' => 'required|string|min:3',

            ]);

            $extension= $request->fichier->getClientOriginalExtension();

            $imageFile=$request->fichier->getClientOriginalName();

            $time=time();

            $fichierPath = 'img/annonces/'.time().'.'.$extension;

            $request->fichier->move(('img/annonces'),  $time.'.'.$extension);

            $annoncePost = array_merge($annoncePost,
                    ['localisation' => $request->localisation,
                     'superficie' => $request->superficie,
                     'price' => $request->price,
                     'fichier' => $imageFile,
                     'fichier_path' => $fichierPath,
                     'typ_fichier' => getTypeFile($imageFile),
                     'type_announce' =>1]);
            return $annoncePost;
        }else{

            $extension= $request->fichier->getClientOriginalExtension();

            $imageFile=$request->fichier->getClientOriginalName();

            $time=time();

            $fichierPath = 'img/annonces/'.time().'.'.$extension;

            $request->fichier->move(('img/annonces'),  $time.'.'.$extension);

            $annoncePost = array_merge($annoncePost, ['fichier' => $imageFile, 'fichier_path' => $fichierPath,'typ_fichier' => getTypeFile($imageFile)]);

            // $annoncePost = array_merge($annoncePost, ['fichier' => $imageFile,'typ_fichier' => $this->getTypeFile($imageFile)]);
            return $annoncePost;
        }


    }

    // public function getTypeFile($file){
    //     $fileExtension = (new \SplFileInfo($file))->getExtension();

    //     if(in_array($fileExtension, ['png','PNG','jpg','jpeg','gif'])){
    //       return 'Image';
    //     } else if(in_array($fileExtension, ['txt','docx','doc','pdf',''])){
    //       return 'Fichier';
    //     } else if(in_array($fileExtension, ['mp4','avi','3gp','mpeg','ogg'])){
    //       return 'Video';
    //     }
    // }




}
