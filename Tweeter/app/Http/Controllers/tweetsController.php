<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class tweetsController extends Controller
{
    public function showAllFollowed(){
        //shows all followed user's tweets
    }

    public function createTweet(){
        //verifies input, Auth, and passes tweet to model
    }

    public function updateTweet(){
        //verifies input, Auth, and passes values to model
    }

    public function destroyTweet(){
        //verifies input, Auth, and passes instructions to model
    }

    public function viewTweet(){
        // returns a view with a single tweet
    }
}
