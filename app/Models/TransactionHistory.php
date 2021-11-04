<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionHistory extends Model
{
    use HasFactory;

    public function getuser(){
        return $this->belongsTo('App\Models\User','student','id');
    }

    public function getcounsellor(){
        return $this->belongsTo('App\Models\User','counselor_teacher','id');
    }

    public function getprogram(){
       
        return $this->belongsTo('App\Models\Program','type','title');
    }

    public function getslot(){
        return $this->belongsTo('App\Models\Slot','counselor_teacher','child_counsellor');
    }
}
