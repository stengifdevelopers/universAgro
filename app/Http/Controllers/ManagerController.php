<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\inscriptionFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManagerController extends Controller
{

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

        $users=User::All();

        $blog2 = Blog::where('sup_id', Auth::user()->id)
                       ->first();
        session(['blog'=> $blog2]);

        return view('Admin/users/index', compact('users') );


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin/users/create' );
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
            'role' => $request->role,
        ]);

        $profileUSer = new Profile();

        $profileUSer->user_id = $newUser->id;
        $profileUSer->save();

        return back()->with('success', 'Enregistrement effectué avec succès');
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
    public function edit(User $user)
    {
        return view('Admin/users/edit', compact('user') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'pseudo' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'fonction' => 'required|string|min:3',
            'role' => 'required|numeric',
        ]);

        $success = $user->update([
            'name' => $request->nom,
            'pseudo' => $request->pseudo,
            'email' => $request->email,
            'fonction' => $request->fonction,
            'role' => $request->role,
        ]);

        if($success){

            $notification = array(
                'message' => 'Modification effectuée avec succès !',
                'alert-type' => 'success'
            );

            return redirect()->route('users.index')->with($notification);

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
        $user = User::where('id', $id );
        $user->delete();

        return back()->with( array(
            'message' => 'Suppression éffectuée avec succès!',
            'alert-type' => 'success'
        ));
    }
}
