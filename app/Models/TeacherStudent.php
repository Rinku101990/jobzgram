<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherStudent extends Model
{
    use HasFactory;

    public function getbatch(){
        return $this->belongsTo('App\Models\Batch','batch','id');
    }

    public function getstudent(){
        return $this->belongsTo('App\Models\User','student','id');
    }

    public function getteacher(){
        return $this->belongsTo('App\Models\User','teacher','id');
    }
}

