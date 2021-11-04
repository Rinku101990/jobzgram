<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookedProgram extends Model
{
    use HasFactory;

    public function getprogram()
    {   
        return $this->belongsTo('App\Models\Program','program_type','title');
    }

    public function getbatch()
    {
        return $this->belongsTo('App\Models\Program','batch','id');
    }

    public function getstudent()
    {
        return $this->belongsTo('App\Models\User','student_id','id');
    }

    public function getteacher()
    {
        return $this->belongsTo('App\Models\User','teacher','id');
    }
}
