<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebinarAttend extends Model
{
    use HasFactory;

   

    public function getwebinar(){
        return $this->belongsTo('App\Models\ParentingWebinar','webinar','id');
    }
}
