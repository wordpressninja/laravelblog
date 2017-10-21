@extends('layouts.app')

@section('content')
	@include('admin.includes.errors')
	 <div class="panel panel-default">
                <div class="panel-heading">Update Post: {{ $post->title }}</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                  <form action="{{ route('post.update', [ 'id' => $post->id ]) }}" method="post">
                  	{{ csrf_field() }}
                      
                      <fieldset class="form-group">
                        <label for="postTitle">Post Ttile</label>
                        <input type="text" class="form-control" id="postTitle" value="{{ $post->title }}" placeholder="Post Title" name="postTitle">
                      </fieldset>

                      <fieldset class="form-group">
                        <label for="postContent">Post Content</label>
                        <textarea name="postContent" class="form-control" id="postContent" cols="10" rows="10"  value="{{ $post->content }}"></textarea>
                      </fieldset>
                      <fieldset class="form-group">
                        <label for="postImage">Featured Image</label>
                        <input type="file" class="form-control" id="postImage" name="postImage">
                      </fieldset>

                      <fieldset class="form-group">
                        <label for="postCategory">Select Category</label>
                        <select class="form-control" id="postCategory" placeholder=" " name="postCategory">
                          @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                          @endforeach
                        </select>
                      </fieldset>

                   		<fieldset class="form-group">
                  			<div class="text-center">
                  				<button type="submit" class="btn btn-success">Update Post</button>
                  			</div>
                  		</fieldset>                 	
                  </form>
                </div>
    </div>
@stop