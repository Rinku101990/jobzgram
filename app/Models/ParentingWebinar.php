<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParentingWebinar extends Model
{
    use HasFactory;

    public function getCategoryDetails(){
        return $this->belongsTo('App\Models\BlogCategory','category','id');
    }

    public function getfav(){
        return $this->belongsTo('App\Models\FavWebinar','id','webinar');
    }

    
}
