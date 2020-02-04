<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class profileDestroyController extends Controller
{
    public function beginDestroy(){
        // returns view for the user to confirm profile destroy
        return view('userDestroy');
    }

    public function confirmDestroy(){
        // calls on the auth package to destroy user
        if(Auth::check()){ //may need to improve this auth later... will think through.
            $id = Auth::user()->id;
            \App\User::destroy($id);
            return redirect('/home');
        }
    }
}
