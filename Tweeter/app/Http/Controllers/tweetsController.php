<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class tweetsController extends Controller
{
    public function showAllFollowed(){
        //shows all followed user's tweets
        // if(Auth::check()){
        //     $followed = \App\Follows::where('user_id', Auth::user()->id)->get('followed_id');
        //     foreach($followed as $follow){
        //         var_dump($follow->followed_id);
        //     }
        //     if(sizeof($followed)>0){
        //         $id = $followed[1]->followed_id;
        //         $tweets = \App\Tweets::where('user_id', $id)->get();
        //         return view('tweetfeed', ['tweets' => $tweets,]);
        //     }
        //     //else {
        //     //     return redirect('/');
        //     // }
        // }
        //return redirect('/login');
        if(Auth::check()){
            $followed = \App\Follows::where('user_id', Auth::user()->id)->get();
            $tweets = [];
            if(sizeof($followed)>0){
                foreach($followed as $follow){
                    $id = $follow->followed_id;
                    //var_dump($id);
                    $getTweets = \App\Tweets::where('user_id', $id)->get();

                    //var_dump($tweets);
                foreach($getTweets as $tweet){
                    // var_dump($tweet->user_id);
                    // var_dump($tweet->content);
                    array_push($tweets, $tweet);
                }
            }


                return view('tweetfeed', ['tweets' => $tweets,]);
            }

        }
        return redirect('/login');
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

    public function destroyTweet(Request $request){
        //verifies input, Auth, and passes instructions to model
        if(Auth::check()){
            $id = $request->id;
            \App\Tweets::destroy($id);
            return redirect('/tweets');
        }

    }

    public function viewTweet($id){
        // returns a view with a single tweet
        $tweets = \App\Tweets::find($id);
        $comments = \App\Comments::where('tweet_id', $id)->get();
        //var_dump($comments);
        if(sizeof($comments) >0){
            $userId = $comments[0]->user_id;
            $user = \App\User::find($userId);
            //var_dump($user);
            return view('editTweet', ['tweets' => [$tweets], 'comments' => $comments, 'user' => $user]);
        } else {
            return view('editTweet', ['tweets' => [$tweets], 'comments' => $comments]);
        }

    }
}
