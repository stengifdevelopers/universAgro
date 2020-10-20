<?php

namespace App\Http\Controllers;
use App\Http\Requests\fichierFormRequest;

use Illuminate\Http\Request;
use App\Models\Projet;
use App\Models\Fichier;

class FichiersController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Projet $projet)
    {
        // $fichiers=Fichier::All();
        return view('Admin/fichiers/create', compact('projet') );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(fichierFormRequest $request)
    {
        $extension= $request->nom->getClientOriginalExtension();
        $imagePath = 'img/fichiers/projets/'.time().'.'.$extension;

        $imageFile=$request->nom->getClientOriginalName();
        $request->nom->move(('img/fichiers/projets/'), time().'.'.$extension);

        $success=Fichier::create([

            'pro_id' => $request->pro_id,
            'nom' => $imageFile,
            'file_path' => $imagePath,
            'title' => $request->title,
            'type' => getTypeFile($imageFile)
        ]);

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
    public function destroy(Projet $projet, Fichier $fichier)
    {
        $fichier->delete();

        return back()->with('success', 'Suppression effectuée avec succès');
    }
}
