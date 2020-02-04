<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class profileController extends Controller
{
    public function showUser($id){
        //shows user profile
        //get user details
        $user = \App\User::where('id', $id)->get('name');
        //get all user tweets
        //var_dump($user);
        $tweets = \App\Tweets::where('user_id', $id)->get();
        //return view
        return view('profile', ['tweets' => $tweets, 'user' => $user]);
    }

    public function updateUser(Request $request){
        //verify input, update user profile ?? this may be handled by the auth controllers
        if($request->validate([
            'name' => 'required | min:3 | max: 50',
            'email' => 'required | email'
        ])){
            $id = Auth::user()->id;
            $user = \App\User::find($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->save();
            return redirect('/user/' . Auth::user()->id);
        }
    }

}
