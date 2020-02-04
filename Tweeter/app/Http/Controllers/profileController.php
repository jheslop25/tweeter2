<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class profileController extends Controller
{
    public function showUser($id){
        //shows user profile
        //get user details

        //get all user tweets

        //return view
        return view();
    }

    public function updateUser(){
        //verify input, update user profile ?? this may be handled by the auth controllers
    }

}
