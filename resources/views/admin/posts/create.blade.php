@extends('layouts.app')
@section('content')
  @include('admin.includes.errors')
	 <div class="panel panel-default">
                <div class="panel-heading">Create New Post</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                  <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data" >
                  	{{ csrf_field() }}
             
                  		<fieldset class="form-group">
                  			<label for="postTitle">Title</label>
                  			<input type="text" class="form-control" id="postTitle" placeholder="Post Title" name="postTitle">
                  		</fieldset>
                  		<fieldset class="form-group">
                  			<label for="postContent">Content</label>

                  			<textarea class="form-control" id="summernote" cols="5" rows="5" placeholder="Post Text Area" name="postContent"></textarea>
                  		</fieldset>
                      <fieldset class="form-group">
                        <label for="category_id">Select Category</label>
                        <select class="form-control" id="category_id" placeholder="Post Text Area" name="category_id">
                          @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                          @endforeach
                        </select>
                      </fieldset>
                      <fieldset class="form-group">
                        <label for="tags">
                          Select Tags
                        </label>
                         @foreach($tags as $tag)
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" value="{{ $tag->id }}" name="tags[]">
                                {{ $tag->tag }}
                            </label>  
                          </div>
                          @endforeach
                        
                      </fieldset>

                  		<fieldset class="form-group">
                  			<label for="featured">Featured Image</label>
                  			<input type="file" class="form-control" id="featured" name="featured">
                  		</fieldset>
                   		<fieldset class="form-group">
                  			<div class="text-center">
                  				<button type="submit" class="btn btn-success">Create Post</button>
                  			</div>
                  		</fieldset>                 	
                  </form>
                </div>
    </div>
@stop

@section('styles')
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.css" rel="stylesheet">
@stop

@section('scripts')
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.js"></script>
   <script>
      $('#summernote').summernote({
        placeholder: 'This is your canvas, where all dreams start',
        tabsize: 2,
        height: 100
      });
    </script>
@stop