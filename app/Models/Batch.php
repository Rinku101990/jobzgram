<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    use HasFactory;
    //teacher detail
    public function getteacher(){
        return $this->belongsTo('App\Models\User','teacher_id','id');
    }

    public function batchprogram(){
        return $this->belongsTo('App\Models\Program','id','batch');
    }

   

  
}
