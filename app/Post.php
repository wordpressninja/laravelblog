<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'content', 'category_id', 'featured'
    ];
    //Category Relationship
    public function category()
    {
    	return $this->belongsTo('App\Category');
    }
}
