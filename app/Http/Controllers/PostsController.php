<?php

namespace App\Http\Controllers;

use Session;
use App\Post;
use App\Category;
use App\Tag;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.posts.index')->with('posts', Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        if ($categories->count() == 0) {
            Session::flash('info', 'You must have some categories before attempting to create a post.');
            return redirect()->back();
        }
        return view('admin.posts.create')->with('categories', $categories)
                                         ->with('tags', Tag::all());

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //store post into fbsql_database
        //dd($request->all());
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'featured' => 'required|image',
            'category_id' => 'required',
            'tags' => 'required'
        ]);
        $featured = $request->featured;
        $featured_new_name = time().$featured->getClientOriginalName();
        $featured->move('uploads/posts/', $featured_new_name);
        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'featured' => 'uploads/posts/'. $featured_new_name,
            'category_id' => $request->category_id,
            'tag_id' => $request->tags,
            'slug' => str_slug($request->title)
        ]);
        $post->tags()->attach($request->tags);
        Session::flash('success', 'Post created successfully.');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('admin.posts.edit')->with('post', $post)->with('categories', Category::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $this->validate($request, [
            'postTitle' => 'required',
            'postContent' => 'required',
            'postCategory' => 'required'

        ]);

        $post = Post::find($id);

        if ($request->hasFile('postImage')) {
            $featured = $request->postImage;
            $featured_new_name = time() . $featured->getClientOriginalName();
            $featured->move('/uploads/posts/', $featured_new_name);
            $post->featured = '/uploads/posts/' . $featured_new_name;
        }
        
        $post->title = $request->postTitle;
        $post->content =$request->postContent;
        $post->category_id = $request->postCategory;
        $post->save();

        Session::flash('success', 'You have successfully updated your post');
        return redirect()->route('posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        $post->delete();

        Session::flash('success', 'The post has been moved to the trash.');

        return redirect()->back();
    }

    public function trashed()
    {
        $posts = Post::onlyTrashed()->get();
        return view('admin.posts.trashed')->with('posts', $posts);
    }

    public function kill($id)
    {
        $post = Post::withTrashed()->where('id', $id)->first();

        $post->forceDelete();

        Session::flash('success', 'Post deleted from database.');
        return redirect()->back();
    }

    public function restore($id)
    {
        $post = Post::withTrashed()->where('id', $id)->first();
        $post->restore();

        Session::flash('success', 'Your post has been restored!');

        return redirect()->route('posts');
    }
}
