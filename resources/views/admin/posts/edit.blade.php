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
                        <textarea name="postContent" class="form-control" id="postContent" cols="5" rows="5" value="{{ $post->content }}">{{ $post->content }}</textarea>
                      </fieldset>
                      <fieldset class="form-group">
                        <label for="featured">Featured Image</label>
                        <input type="file" class="form-control" id="featured" name="featured">
                      </fieldset>

                      <fieldset class="form-group">
                        <label for="category_id">Select Category</label>
                        <select class="form-control" id="category_id" placeholder=" " name="category_id">
                          @foreach($categories as $category)
                            <option value="{{ $category->id }}"
                              @if($post->category_id == $category->id)
                              selected 
                              @endif
                            >{{ $category->name }}</option>
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
                              <input class="form-check-input" type="checkbox" value="{{ $tag->id }}" name="tags[]"
                                @foreach($post->tags as $t)
                                  @if($tag->id == $t->id)
                                    checked 
                                  @endif
                                @endforeach
                              >
                                {{ $tag->tag }}
                            </label>  
                          </div>
                          @endforeach
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

@section('styles')
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.css" rel="stylesheet">
@stop

@section('scripts')
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.js"></script>
   <script>
      $('#postContent').summernote({
        placeholder: 'This is your canvas, where all dreams start',
        tabsize: 2,
        height: 100
      });
    </script>
@stop