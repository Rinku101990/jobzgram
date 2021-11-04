<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookedSlot extends Model
{
    use HasFactory;

    public function getuser(){
        return $this->belongsTo('App\Models\User','user','id');
    }

    public function getcounsellor(){
        return $this->belongsTo('App\Models\User','child_counsellor','id');
    }

    public function getslot(){
        return $this->belongsTo('App\Models\Slot','slot','id');
    }

   
}
