<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use App\Category;
use App\Post;

class FrontEndController extends Controller
{

    public function index()
    {

    	return view('index')
    			->with('title', Setting::first()->site_name)
    			->with('categories', Category::take(5)->get())
    			->with('first_post', Post::orderBy('created_at', 'desc')->first())
    			->with('second_posts', Post::orderBy('created_at', 'desc')->skip(1)->take(2)->get());
    }
}
