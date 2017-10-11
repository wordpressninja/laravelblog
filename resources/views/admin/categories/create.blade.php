@extends('layouts.app')

@section('content')
	@if(count($errors) > 0)
		        <ul class="list-group">
		        	@foreach($errors->all() as $error)
					<li class="list-group-item text-danger">
						{{ $error }}
					</li>
					@endforeach
				</ul>
	@endif
	 <div class="panel panel-default">
                <div class="panel-heading">Create New Post</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                  <form action="{{ route('category.store') }}" method="post">
                  	{{ csrf_field() }}
             
                  		<fieldset class="form-group">
                  			<label for="categoryName">Category Name</label>
                  			<input type="text" class="form-control" id="categoryName" placeholder="Category Name" name="categoryName">
                      </fieldset>
                   		<fieldset class="form-group">
                  			<div class="text-center">
                  				<button type="submit" class="btn btn-success">Create Category</button>
                  			</div>
                  		</fieldset>                 	
                  </form>
                </div>
    </div>
@stop