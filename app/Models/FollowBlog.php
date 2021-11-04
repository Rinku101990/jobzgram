<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FollowBlog extends Model
{
    use HasFactory;

     //following 
     public function getfollowing(){
        return $this->belongsTo('App\Models\User','user','id');
    }

    
     //following 
     public function getfollower(){
        return $this->belongsTo('App\Models\User','following_user','id');
    }
}
