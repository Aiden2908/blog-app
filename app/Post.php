<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //:: A post is owned by a user. :://
    public function user(){
        return $this->belongsTo('App\User');
    }
}
