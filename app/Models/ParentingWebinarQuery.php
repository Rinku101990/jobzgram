<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParentingWebinarQuery extends Model
{
    use HasFactory;
    public function getCategoryDetails(){
        return $this->belongsTo('App\Models\BlogCategory','category','id');
    }
}
