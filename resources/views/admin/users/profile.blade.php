@extends('layouts.app')

@section('content')
	 @include('admin.includes.errors')
	 <div class="panel panel-default">
                <div class="panel-heading">Edit Your Profile</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                  <form action="{{ route('user.profile.update', [ 'id' => $user->id ]) }}" method="post" enctype="multipart/form-data" >
                  	{{ csrf_field() }}
             
                  		<fieldset class="form-group">
                  			<label for="userName">User Name</label>
                  			<input type="text" class="form-control" id="userName" value="{{ $user->name }}" placeholder="User Name" name="userName">
                      </fieldset>
                      <fieldset class="form-group">
                        	<label for="userEmail">User Email</label>
                        	<input type="email" class="form-control" id="userEmail" value="{{ $user->email }}" placeholder="User Email" name="userEmail">
                      </fieldset>
                      <fieldset class="form-group">
                        	<label for="userAvatar">Edit Your Avatar</label>
                        	<input type="file" class="form-control" id="userAvatar" placeholder="User Avatar" name="userAvatar">
                      </fieldset>
                      <fieldset class="form-group">
                      		<label for="userAbout">Edit Your About Section</label>
							<textarea class="form-control" id="userAbout" placeholder="Please enter a brief bio" name="userAbout">{{ $user->profile->about }}</textarea>
                      </fieldset>
                      <fieldset class="form-group">
                        	<label for="userFacebook">User Facebook</label>
                        	<input type="text" class="form-control" id="userFacebook" value="{{ $user->profile->facebook }}" placeholder="User Facebook" name="userFacebook">
                      </fieldset>
                      <fieldset class="form-group">
                        	<label for="userYoutube">User Youtube</label>
                        	<input type="text" class="form-control" id="userYoutube" value="{{ $user->profile->youtube }}" placeholder="User Youtube" name="userYoutube">
                      </fieldset>
                      <fieldset class="form-group">
                        	<label for="userPassword">Edit Your Password</label>
                        	<input type="text" class="form-control" id="userPassword" placeholder="User Password" name="userPassword">
                      </fieldset>
                   		<fieldset class="form-group">
                  			<div class="text-center">
                  				<button type="submit" class="btn btn-success">Edit Profile</button>
                  			</div>
                  		</fieldset>                 	
                  </form>
                </div>
    </div>
@stop