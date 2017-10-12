@extends('layouts.app')

@section('content')
	@include('admin.includes.errors')
	 <div class="panel panel-default">
                <div class="panel-heading">Update Category: {{ $category->name }}</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                  <form action="{{ route('category.update', [ 'id' => $category->id ]) }}" method="post">
                  	{{ csrf_field() }}
             
                  		<fieldset class="form-group">
                  			<label for="categoryName">Category Name</label>
                  			<input type="text" class="form-control" id="categoryName" value="{{ $category->name }}" placeholder="Category Name" name="categoryName">
                      </fieldset>
                   		<fieldset class="form-group">
                  			<div class="text-center">
                  				<button type="submit" class="btn btn-success">Update Category</button>
                  			</div>
                  		</fieldset>                 	
                  </form>
                </div>
    </div>
@stop