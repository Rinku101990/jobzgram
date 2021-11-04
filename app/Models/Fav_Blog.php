<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fav_Blog extends Model
{
    use HasFactory;

     //user detail
     public function getuser(){
        return $this->belongsTo('App\Models\User','user','id');
    }
    
     //bLOGOG detail
     public function getblog(){
        return $this->belongsTo('App\Models\Blog','blog','id');
    }
}

