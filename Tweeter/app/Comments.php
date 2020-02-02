<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    public function tweet(){
        return $this->belongsTo('App\Tweets');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
