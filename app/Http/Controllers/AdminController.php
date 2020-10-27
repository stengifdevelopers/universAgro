<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $blog = Blog::where('sup_id', Auth::user()->id)
                      ->where('etat', 0)
                      ->first();

        //    dd(session('blog')->etat);
                       
        $blog2 = Blog::where('sup_id', Auth::user()->id)
                       ->first();

        session(['blog'=> $blog2]);
        
       

        // dd(session('blog'.$blog->id ));

        return view('Admin.index', compact('blog', 'blog2'));
    }
}
