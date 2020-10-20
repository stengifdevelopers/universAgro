<?php

namespace App\Http\Controllers;

use App\Http\Requests\profileFormRequest;
use App\Models\Blog;
use App\Models\Profile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilesController extends Controller
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
        $user=User::where('id', Auth::user()->id)
                    ->first();

        $profile=Profile::where('user_id', Auth::user()->id)
        ->first();

        $blog = Blog::where('sup_id', Auth::user()->id)
                      ->where('etat', 0)
                      ->first();

        session(['blog'=> $blog]);

        return view('Admin.profile.index', compact('user', 'profile'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile )
    {

        $user=User::where('id', Auth::user()->id)
        ->first();
        // $profile=Profile::where('id', Auth::user()->id)
        // ->first();
        return view('Admin.profile.edit', compact('user', 'profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(profileFormRequest $request,  $id )
    {

        $user = User::where('id', Auth::user()->id)
                        ->first();
        $success = $user->update([
            'name' => $request->name,
            'pseudo' => $request->pseudo,
            'email' => $request->email,
            'fonction' => $request->fonction,

        ]);

        $request->validate([
            'image' => 'sometimes|image|mimes:jpeg,jpg,png,gif|max:10000',
            'phone' => 'sometimes|numeric|min:9|nullable',
            'region' => 'sometimes|string|nullable',
            'departement' => 'sometimes|string|nullable',
            'ville' => 'sometimes|string|nullable',
            'facebook' => 'sometimes|string|nullable',
            'url' => 'sometimes|string|url|nullable',
            'whatsapp' => 'sometimes|numeric|min:9|nullable',
            // 'description' => 'sometimes',
            'description' => 'sometimes|string|min:9|nullable',

         ]);
        $profile = Profile::find($id);

        $success2 = $profile->update($this->dataProfile($request));

        if($success && $success2 ){
            return redirect()->route('profile.index')->with('success', 'Modification effectué avec succès');
        }else{
            return back()->with('error', 'Une erreur détectée');

        }

        // return redirect('profile' );
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

    public function dataProfile($request) {

        $profilePost = [
            'phone' => $request->phone,
            'description' => $request->description,
            'region' => $request->region,
            'departement' => $request->departement,
            'ville' => $request->ville,
            'whatsapp' => $request->whatsapp,
            'facebook' => $request->facebook,
            'url' => $request->url
        ];

        if(request('image'))
        {

            $extension= $request->image->getClientOriginalExtension();

            $imageFile=$request->image->getClientOriginalName();

            $imagePath = 'img/profile/'.time().'.'.$extension;

            $request->image->move(('img/profile'), time().'.'.$extension);

            $profilePost = array_merge($profilePost, ['profile' => $imageFile, 'profile_path' => $imagePath]);

            return $profilePost;
        }else
        {
            return $profilePost;
        }
    }
}
