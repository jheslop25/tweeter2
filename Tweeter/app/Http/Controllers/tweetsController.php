<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class tweetsController extends Controller
{
    public function showAllFollowed(){
        //shows all followed user's tweets
        if(Auth::check()){
            $tweets = \App\Tweets::all();

            return view('tweetfeed', ['tweets' => $tweets]);
        }
    }

    public function createTweet(Request $request){
        //verifies input, Auth, and passes tweet to model
        if($request->validate([
            'content' => 'required | min:3 | max:144'
        ])){
            $tweet = new \App\Tweets;
        $tweet->user_id = Auth::user()->id;
        $tweet->content = $request->content;
        $tweet->save();

        return redirect('/tweets');
        }
    }

    public function returnEdit(Request $request, $user_id){
        if(Auth::user()->id == $user_id){
            $id = $request->edit;
            //var_dump($id);
            $tweets = \App\Tweets::find($id);
            //var_dump($tweets);
            return view('editTweet', ['tweets' => [$tweets]]);

        } else {
            return redirect('/tweets');
        }
    }

    public function updateTweet(Request $request){
        //verifies input, Auth, and passes values to model
        if($request->validate([
            'content' => 'required | min:3 | max:144'
        ])){
        $id = $request->tweet_id;
        var_dump($id);
        $tweet = \App\Tweets::find($id);

        var_dump($tweet);
        $tweet->content = $request->content;

        $tweet->save();

        return redirect('/tweets');
        }

    }

    public function destroyTweet(){
        //verifies input, Auth, and passes instructions to model
    }

    public function viewTweet(){
        // returns a view with a single tweet
    }
}
