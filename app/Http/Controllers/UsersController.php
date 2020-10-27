<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\inscriptionFormRequest;
use App\Models\Profile;
use App\User;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.inscription');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(inscriptionFormRequest $request)
    {
        $newUser = User::create([
            'name' => $request->nom,
            'pseudo' => $request->pseudo,
            'password' => Hash::make($request->pwd),
            'email' => $request->email,
            'fonction' => $request->fonction,
            'role' => 0,
        ]);

        $profileUSer = new Profile();

        $profileUSer->user_id = $newUser->id;
        $profileUSer->save();

        return redirect()->route('blogs.index')->with('success', 'Inscription effectuée avec succès');
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
