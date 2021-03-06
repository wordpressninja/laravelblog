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
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    
    protected $fillable = [
        'title', 'content', 'category_id', 'featured', 'slug', 'user_id'
    ];
    public function getFeaturedAttribute($featured)
    {
        return asset($featured);
    }

    //Category Relationship
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    //Tag Relationship
    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
