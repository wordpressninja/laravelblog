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
                  			<label for="title">Title</label>
                  			<input type="text" class="form-control" id="title" placeholder="Post Title" name="title">
                  		</fieldset>
                  		<fieldset class="form-group">
                  			<label for="content">Content</label>
                  			<textarea class="form-control" id="content" cols="10" rows="10" placeholder="Post Text Area" name="content"></textarea>
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