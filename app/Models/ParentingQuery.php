<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParentingQuery extends Model
{
    use HasFactory;

    public function getCategoryDetails(){
        return $this->belongsTo('App\Models\BlogCategory','category','id');
    }

    public function getuser(){
        return $this->belongsTo('App\Models\User','student','id');
    }
   
    public function getChildQuery(){
        return $this->hasMany('App\Models\ParentingQuery','p_id','id');
    }

    public function getChildQueryname(){
        return $this->belongsTo('App\Models\ParentingQuery','p_id','id');
    }
}
