<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Rules\MatchOldPassword;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PwdupdateController extends Controller
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
        return view('Admin.pwdedit.edit');
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
    public function store(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        $success=User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);

        if($success){

            $notification = array(
                'message' => 'Modification éffectuée avec succès!',
                'alert-type' => 'success'
            );

         return redirect()->route('profile.index')->with($notification);

        }else{
            $notification = array(
                'message' => 'Erreur l\'ors de l\'enregitrement !',
                'alert-type' => 'error'
            );
         return back()->with($notification);
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
        $pwd=User::where('id', $id)
                          ->first();
        return view('Admin.pwdedit.edit', compact('pwd'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $pwd)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        $success=User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);

        if($success){

            $notification = array(
                'message' => 'Modification éffectuée avec succès!',
                'alert-type' => 'success'
            );

         return redirect()->route('profile.index')->with($notification);

        }else{
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
       //
    }
}
