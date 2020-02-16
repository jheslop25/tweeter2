<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class profileController extends Controller
{
    public function showUser($id){

       if(Auth::check()){
        //shows user profile
        //get user details
        $user = \App\User::where('id', $id)->get();
        //get all user tweets
        //var_dump($user[0]->profile_photo);
        $tweets = \App\Tweets::where('user_id', $id)->get();
        //set comments array to empty
        $allComments = [];
        //get comments

        foreach($tweets as $tweet){
            $id = $tweet->id;
            $comments = \App\Comments::where('tweet_id', $id)->get();
            array_push($allComments, $comments);
        }

        // check follows
        $follows = \App\Follows::where('user_id', Auth::user()->id)->get();
        //get profile pic path
        $profilePic = asset($user[0]->profile_photo);
        //var_dump($profilePic);
        //return view 'profilePic' => $profilePic
        return view('profile', ['tweets' => $tweets, 'user' => $user, 'follows' => $follows, 'profilePic' => $profilePic, 'comments' => [$allComments]]);
        }
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
        } else {
            return redirect('/login');
        }
    }

    public function uploadPhoto(Request $request){
        //var_dump($request->myPhoto);
        $request->file('myPhoto')->storeAs('/public/photos', Auth::user()->name);
        $id = Auth::user()->id;
        $name = Auth::user()->name;
        var_dump($name);
        //Storage::putFileAs('photos', new File("storage/app/public/photos/$name"), $name);
        $path = 'storage/photos/'.$name;
        $user = \App\User::find($id);
        $user->profile_photo = $path;
        $user->save();
        return back();
    }

}
