<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class followsController extends Controller
{
    public function followUser(){
        // adds follow record to DB via model
    }

    public function unfollowUser(){
        // destroys follow record in DB via Model
    }
}
