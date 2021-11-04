<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogComment extends Model
{
    use HasFactory;

    public function getuser(){
        return $this->belongsTo('App\Models\User','user','id');
    }
}
