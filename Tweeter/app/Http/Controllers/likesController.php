<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class likesController extends Controller
{
    public function addLike(Request $request){
        // adds a like record to the DB via model

        $tweetId = $request->tweetID;
        // var_dump($tweetId);
        $like = new \App\Likes;
        $like->user_id = Auth::user()->id;
        $like->tweet_id = $tweetId;

        $like->save();
        return response($like);
    }

    public function removeLike(Request $request){
        // deletes like record from DB via model
        $tweetId = $request->tweetID;
        \App\Likes::where('tweet_id', $tweetId)->where('user_id', Auth::user()->id)->delete();
        return response($tweetId);
    }

    public function get(Request $request){
        $likes = sizeOf(\App\Likes::where('tweet_id', $request->input['id'])->get());
        return response()->json(['likes'=> $likes], 200);
    }
}
