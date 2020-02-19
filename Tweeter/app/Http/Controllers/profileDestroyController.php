<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class profileDestroyController extends Controller
{
    public function beginDestroy($id){
        // returns view for the user to confirm profile destroy
        if(Auth::user()->id == $id){
            return view('userDestroy');
        } else {
            return redirect('/tweets');
        }
    }

    public function confirmDestroy($user_id){
        // calls on the auth package to destroy user
        if(Auth::user()->id == $user_id){ //may need to improve this auth later... will think through.
            $id = Auth::user()->id;
            \App\Tweets::where('user_id', $id)->delete();
            \App\Follows::where('user_id', $id)->delete();
            \App\Follows::where('followed_id', $id)->delete();
            \App\Comments::where('user_id', $id)->delete();
            \App\Likes::where('user_id', $id)->delete();
            \App\User::destroy($id);
            return redirect('/home');
        } else {
            return redirect('/tweets');
        }
    }
}
