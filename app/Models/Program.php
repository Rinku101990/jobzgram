<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    public function getbatch(){
        return $this->belongsTo('App\Models\Batch','batch','id');
    }

    public function program_student(){
        return $this->belongsTo('App\Models\BookedProgram','title','program_type');
    }

    public function totalsession(){              
        return $this->hasMany('App\Models\ProgramSession','program','id')->count();
    }

    public function getsession(){              
        return $this->hasMany('App\Models\ProgramSession','program','id');
    }
}
