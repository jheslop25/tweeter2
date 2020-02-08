<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class followsController extends Controller
{
    public function showAllUsers(){
        $users = \App\User::all();
        if(Auth::check()){
            $follows = \App\Follows::where('user_id', Auth::user()->id)->get();
            //var_dump($follows);
            return view('users', ['users' => $users, 'follows' => $follows]);
        } else {
            return redirect('/home');
        }

    }

    public function followUser(Request $request){
        //debug_log('in follow user');
        // adds follow record to DB via model
        $userToFollow = $request->followId;
        //var_dump($request->followId);
        $userId = Auth::user()->id;
        $relationship = new \App\Follows();
        $relationship->user_id = $userId;
        $relationship->followed_id = $userToFollow;

        $relationship->save();

        return back();
    }

    public function unfollowUser(Request $request){
        // destroys follow record in DB via Model
        $unfollow = $request->followedID;
        //var_dump($unfollow);
        \App\Follows::where('followed_id', $unfollow)->where('user_id', Auth::user()->id)->delete();

        return back();
    }
}
