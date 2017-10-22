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

                  <form action="{{ route('tag.store') }}" method="post">
                  	{{ csrf_field() }}
             
                  		<fieldset class="form-group">
                  			<label for="tagName">Tag Name</label>
                  			<input type="text" class="form-control" id="tagName" placeholder="Tag Name" name="tagName">
                      </fieldset>
                   		<fieldset class="form-group">
                  			<div class="text-center">
                  				<button type="submit" class="btn btn-success">Create Tag</button>
                  			</div>
                  		</fieldset>                 	
                  </form>
                </div>
    </div>
@stop