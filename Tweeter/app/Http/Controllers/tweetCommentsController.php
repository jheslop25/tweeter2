<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class tweetCommentsController extends Controller
{
    public function createComment(Request $request){
        // verify input, AUTH, and passes values to model
        if(Auth::check()){
            // if($request->validate([
            //     'comment' => 'required | min:3 | max: 255',
            //     'tweetId' => 'required'
            // ])){
                $comment = new \App\Comments;
                $comment->user_id = Auth::user()->id;
                $comment->tweet_id = $request->input['tweetId'];
                $comment->content = $request->input['comment'];
                $comment->giphy_url = $request->input['giphy_url'];
                $comment->save();
                return response()->json(['msg' => $request->input['comment'], 'name' => Auth::user()->name, 'giphy_url' => $request->input['giphy_url']]);
            //}
        } else {
            return back();
        }
    }

    public function editComment(Request $request){
        // verify input, Auth and pass values to model
            if($request->validate([
                'comment' => 'required | min:3 | max:144',
                'tweetId' => 'required',
                'commentId' => 'required'
            ])){
                $id = $request->commentId;
               $comment = \App\Comments::find($id);
               $comment->content = $request->comment;
               $comment->save();
               return redirect("/tweets/view/$comment->tweet_id");
            } else {
                return redirect("/tweets/view/$comment->tweet_id");
            }
    }

    public function deleteComment(Request $request){
        // verify auth and pass delete to model
        if(Auth::check()){
           $id = $request->delete;
           \App\Comments::destroy($id);
        }
        return back();

    }
}
