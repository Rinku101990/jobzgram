<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    public function getCategoryDetails(){
        return $this->belongsTo('App\Models\BlogCategory','category','id');
    }

    public function getblogview(){
       
        return $this->hasMany('App\Models\BlogView','blog','id')->count();
    }

    public function getblogcomment(){
       
        return $this->hasMany('App\Models\BlogComment','blog','id')->count();
    }

    public function getbloglike()
    {
        return $this->hasMany('App\Models\LikeBlog','blog_id','id')->count();
    }
}
