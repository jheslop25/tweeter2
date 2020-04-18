<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use \App\Exceptions\Handler;

class tweetsController extends Controller
{
    public function showAllFollowed()
    {
        //shows all followed user's tweets
        if (Auth::check()) {
            $followed = \App\Follows::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
            $tweets = [];
            $allComments = [];
            if (sizeOf($followed) > 0) {
                foreach ($followed as $follow) {
                    $id = $follow->followed_id;
                    //var_dump($id);
                    $getTweets = \App\Tweets::where('user_id', $id)->orderBy('created_at', 'desc')->get();

                    //var_dump($tweets);
                    foreach ($getTweets as $tweet) {
                        // var_dump($tweet->user_id);
                        // var_dump($tweet->content);
                        array_push($tweets, $tweet);
                        $id = $tweet->id;
                        $comments = \App\Comments::where('tweet_id', $id)->get();
                        array_push($allComments, $comments);
                    }
                }


                return view('tweetfeed', ['tweets' => $tweets, 'comments' => [$allComments]]);
            } else {
                return redirect('/users');
            }
        }
        return redirect('/login');
    }

    public function createTweet(Request $request)
    {
        //verifies input, Auth, and passes tweet to model
        if (Auth::check()) {
            if ($request->validate([
                'content' => 'required | min:3 | max:144'
            ])) {
                $tweet = new \App\Tweets;
                $tweet->user_id = Auth::user()->id;
                $tweet->content = $request->content;
                $tweet->save();

                if ($request->file()) {
                    $getTweet = \App\Tweets::where('user_id', Auth::user()->id)->where('content', $request->content)->get();
                    $photoName = $getTweet[0]->id . 't_id' . $getTweet[0]->user_id . 'tweet_photo';
                    var_dump($photoName);
                    $request->file('myPhoto')->storeAs('/public/photos', $photoName);
                    $path = '/storage/photos/' . $photoName;
                    $getTweet[0]->tweet_photo = $path;
                    $getTweet[0]->save();
                }

                return back();
            }
        }
    }

    public function returnEdit(Request $request, $user_id)
    {
        if (Auth::user()->id == $user_id) {
            $id = $request->edit;
            //var_dump($id);
            $tweets = \App\Tweets::find($id);
            //var_dump($tweets);
            $comments = \App\Comments::where('tweet_id', $id)->get();

            return view('editTweet', ['tweets' => [$tweets], 'comments' => $comments]);
        } else {
            return redirect('/tweets');
        }
    }

    public function updateTweet(Request $request)
    {
        //verifies input, Auth, and passes values to model
        if (Auth::user()->id == $request->user_id) {
            if ($request->validate([
                'content' => 'required | min:3 | max:144'
            ])) {
                $id = $request->tweet_id;
                var_dump($id);
                $tweet = \App\Tweets::find($id);

                var_dump($tweet);
                $tweet->content = $request->content;

                $tweet->save();

                return back();
            }
        }
    }

    public function destroyTweet(Request $request)
    {
        //verifies input, Auth, and passes instructions to model
        $id = $request->id;
        if (Auth::user()->id == \App\Tweets::find($id)->user_id) {
            \App\Tweets::destroy($id);
            return back();
        }
    }

    public function viewTweet($id)
    {
        // returns a view with a single tweet
        $tweets = \App\Tweets::find($id);
        $comments = \App\Comments::where('tweet_id', $id)->get();
        //var_dump($comments);
        if (sizeof($comments) > 0) {
            $userId = $comments[0]->user_id;
            $user = \App\User::find($userId);
            //var_dump($user);
            return view('editTweet', ['tweets' => [$tweets], 'comments' => $comments, 'user' => $user]);
        } else {
            return view('editTweet', ['tweets' => [$tweets], 'comments' => $comments]);
        }
    }

    public function retweet(Request $request)
    {
        if (Auth::check()) {
            $retweet = new \App\Tweets;
            $retweet->user_id = Auth::user()->id;
            $retweet->content = $request->content;
            $retweet->orig_tweeter_name = $request->name;
            $retweet->orig_created_at = $request->created_at;
            $retweet->tweet_photo = $request->tweet_photo;

            $retweet->save();

            return back();
        }
    }

    public function ajaxTweets(Request $request)
    {

        $followed = \App\Follows::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        $tweets = [];
        if (sizeOf($followed) > 0) {
            foreach ($followed as $follow) {
                $id = $follow->followed_id;
                //var_dump($id);
                $getTweets = \App\Tweets::where('user_id', $id)->orderBy('created_at', 'desc')->paginate(10);

                //var_dump($tweets);
                foreach ($getTweets as $tweet) {
                    $whole = [];
                    $user = \App\User::find($tweet->user_id);
                    $likes = sizeOf(\App\Likes::where('tweet_id', $tweet->id)->get());
                    array_push($whole, $user);
                    array_push($whole, $tweet);
                    array_push($whole, $likes);
                    $comments = [];
                    $id = $tweet->id;
                    $comment = \App\Comments::where('tweet_id', $id)->get();
                    foreach( $comment as $item){
                        $user = \App\User::find($item->user_id);
                        $name = $user->name;
                        $pkg = [];
                        array_push($pkg, $item);
                        array_push($pkg, $name);
                        array_push($comments, $pkg);
                    }
                    array_push($whole, $comments);
                    if(sizeof(\App\Likes::where('user_id', Auth::user()->id)->where('tweet_id', $tweet->id)->get()) > 0){
                        $liked = true;
                        array_push($whole, $liked);
                    } else {
                        $liked = false;
                        array_push($whole, $liked);
                    }
                    if($tweet->user_id == Auth::user()->id){
                        $owner = true;
                        array_push($whole, $owner);
                    } else {
                        $owner = false;
                        array_push($whole, $owner);
                    }
                    array_push($tweets, $whole);
                }
            }
            return response()->json(['tweets' => $tweets], 200);
        } else {
            return response()->json(['msg' => 'no follows'], 404);
        }
    }

    public function ajaxCreate(Request $request){
        // a function to make or update a tweet with ajax
        $tweet = new \App\Tweets();
        $tweet->user_id = $request->user()->id;
        $tweet->content = $request->input['content'];

        $tweet->save();

        return response()->json(['msg' => 'you created/updated a tweet'],200);
    }

    public function userTweets(Request $request){
        // a function to show all of a user's tweets on their profile page
        $tweets = [];

                $getTweets = \App\Tweets::where('user_id', $request->user)->orderBy('created_at', 'desc')->paginate(10);

                //var_dump($tweets);
                foreach ($getTweets as $tweet) {
                    $whole = [];
                    $user = \App\User::find($tweet->user_id);
                    $likes = sizeOf(\App\Likes::where('tweet_id', $tweet->id)->get());
                    array_push($whole, $user);
                    array_push($whole, $tweet);
                    array_push($whole, $likes);
                    $comments = [];
                    $id = $tweet->id;
                    $comment = \App\Comments::where('tweet_id', $id)->get();
                    foreach( $comment as $item){
                        $user = \App\User::find($item->user_id);
                        $name = $user->name;
                        $pkg = [];
                        array_push($pkg, $item);
                        array_push($pkg, $name);
                        array_push($comments, $pkg);
                    }
                    array_push($whole, $comments);
                    if(sizeof(\App\Likes::where('user_id', Auth::user()->id)->get()) > 0){
                        $liked = true;
                        array_push($whole, $liked);
                    } else {
                        $liked = false;
                        array_push($whole, $liked);
                    }
                    if($tweet->user_id == Auth::user()->id){
                        $owner = true;
                        array_push($whole, $owner);
                    } else {
                        $owner = false;
                        array_push($whole, $owner);
                    }
                    array_push($tweets, $whole);
                }
            return response()->json(['tweets' => $tweets], 200);

    }
}
