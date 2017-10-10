<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //Category Relationship
    public function category()
    {
    	return $this->belongsTo('App\Category');
    }
}
