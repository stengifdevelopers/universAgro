<?php

namespace App\Http\Controllers;

use App\Http\Requests\emploisFormRequest;
use App\Models\Offre;
use Illuminate\Http\Request;

class EmploisController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['list', 'details','findOffre']);
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

        $emplois=Offre:: where('blo_id',  $session->id)
        ->get();

        return view('Admin.emplois.index', compact('emplois'));
    }

    public function findOffre(Request $request)
    {
        $emplois=Offre::orderBy('id', 'DESC');
       
        $request->type_offre !=null ? $emplois=$emplois->where('type_offre', $request->type_offre):$emplois=$emplois;
        $request->type_contrat !=null ? $emplois= $emplois->where('type_contrat', $request->type_contrat):$emplois=$emplois;
        $request->titre !=null ? $emplois= $emplois->where('titre',"LIKE","%".$request->titre."%"):$emplois=$emplois;
        $emplois= $emplois->limit(10)->get();

        return view('pages.offers.index', compact('emplois'));
    }

    public function list()
    {

        $emplois=Offre::all();

        return view('pages.offers.index', compact('emplois'));
    }

    public function details($id)
    {

        $emplois=Offre::find($id);
        if(!$emplois) return view('errors.404');

        $last=Offre::where('type_contrat', $emplois->type_contrat)
                    ->where('id', '!=', $emplois->id )
                    ->orderBy('id', 'DESC' )  
                    ->limit(4)
                    ->get() ;

        return view('pages.offers.show', compact('emplois', 'last'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin/emplois/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(emploisFormRequest $request )
    {
        $success = Offre::create($this->dataEmploi($request));

        if($success){
            return redirect()->route('emplois.index')->with('success', 'Ajout effectué avec succès');
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
        $emploi = Offre::find($id);
        return view('Admin/emplois/edit', compact('emploi') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( emploisFormRequest $request, $id)
    {

        $emploi = Offre::find($id);
        $success = $emploi->update($this->dataEmploi($request));

        if($success){
            return redirect()->route('emplois.index')->with('success', 'Modification effectué avec succès');
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
    public function destroy($id)
    {
        $emploi = Offre::find($id);
        $del = $emploi->delete();

        if($del){
            return redirect()->route('emplois.index')->with('success', 'Suppression effectuée avec succès');
        }else{
            return back()->with('error', 'Une erreur détectée');
        }
    }

    public function dataEmploi($request) {

        $emploiPost = [
            'blo_id' => session('blog')->id,
            'titre' => $request->titre,
            'description' => $request->description,
            'type_contrat' => $request->type_contrat,
            'type_offre' => $request->type_offre,
            'society' => $request->society,
            'lieu' => $request->localisation,
            'documents' => $request->documents,
            'email_post' => $request->email_post,
            // 'date_debut'=> date('Y-m-d',strtotime($request->date_debut)),
            'date_fin'=>  date('Y-m-d',strtotime($request->date_fin)),

        ];

        if(request('image'))
        {
           
          
            $extension= $request->image->getClientOriginalExtension();

            $imageFile=$request->image->getClientOriginalName();
            $time=time();

            $imagePath = 'img/emplois/'.time().'.'.$extension;

            $request->image->move(('img/emplois'), $time.'.'.$extension);

            $emploiPost = array_merge($emploiPost, ['image' => $imageFile, 'image_path' => $imagePath]);
            return $emploiPost;
        }else
        {
            return $emploiPost;
        }
    }

}
