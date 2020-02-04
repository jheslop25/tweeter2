<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class profileDestroyController extends Controller
{
    public function beginDestroy(){
        // returns view for the user to confirm profile destroy
    }

    public function confirmDestroy(){
        // calls on the auth package to destroy user
    }
}
