<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class followsController extends Controller
{
    public function followUser(){
        // adds follow record to DB via model
    }

    public function unfollowUser(){
        // destroys follow record in DB via Model
    }
}
