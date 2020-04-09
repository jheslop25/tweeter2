<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
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
        $id = Auth::user()->id;
        return view('home');
    }

    public function dev(){
        return view('welcome');
    }

    public function username(Request $request){
        $username = \App\User::find($request->input);

        return response()->json(['username' => $username->name], 200);
    }
}
