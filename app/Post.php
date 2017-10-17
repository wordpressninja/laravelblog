<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    use SoftDeletes;
    protected $fillable = [
        'title', 'content', 'category_id', 'featured', 'slug'
    ];
    protected $dates =['deleted_at'];
    //Category Relationship
    public function category()
    {
    	return $this->belongsTo('App\Category');
    }
}
