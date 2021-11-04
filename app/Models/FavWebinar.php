<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavWebinar extends Model
{
    use HasFactory;
    //user detail
    public function getuser(){
        return $this->belongsTo('App\Models\User','user','id');
    }
    
     //webinar detail
     public function getwebinar(){
        return $this->belongsTo('App\Models\ParentingWebinar','webinar','id');
    }

    
}
