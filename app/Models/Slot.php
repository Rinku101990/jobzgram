<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slot extends Model
{
    use HasFactory;
    public function getweek(){
        return $this->belongsTo('App\Models\Week','week','id');
    }
     //Child Counsellors detail
     public function getchildcounsellors(){
        return $this->belongsTo('App\Models\User','child_counsellor','id');
    }
}
