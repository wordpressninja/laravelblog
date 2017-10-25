@extends('layouts.app')

@section('content')
	 @include('admin.includes.errors')
	 <div class="panel panel-default">
                <div class="panel-heading">Create New User</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                  <form action="{{ route('user.store') }}" method="post">
                  	{{ csrf_field() }}
             
                  		<fieldset class="form-group">
                  			<label for="userName">User Name</label>
                  			<input type="text" class="form-control" id="userName" placeholder="User Name" name="userName">
                      </fieldset>
                      <fieldset class="form-group">
                        <label for="userEmail">User Email</label>
                        <input type="email" class="form-control" id="userEmail" placeholder="User Email" name="userEmail">
                      </fieldset>
                   		<fieldset class="form-group">
                  			<div class="text-center">
                  				<button type="submit" class="btn btn-success">Create User</button>
                  			</div>
                  		</fieldset>                 	
                  </form>
                </div>
    </div>
@stop