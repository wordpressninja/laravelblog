@extends('layouts.app')

@section('content')
	 @include('admin.includes.errors')
	 <div class="panel panel-default">
                <div class="panel-heading">Edit Blog Settings</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                  <form action="{{ route('settings.update') }}" method="post">
                  	{{ csrf_field() }}
             
                  		<fieldset class="form-group">
                  			<label for="siteName">Site Name</label>
                  			<input type="text" class="form-control" id="siteName" placeholder="Site Name" name="siteName" value=" {{ $settings->site_name }}">
                      	</fieldset>
                      	<fieldset class="form-group">
                        	<label for="siteEmail">Admin Email</label>
                        	<input type="email" class="form-control" id="siteEmail" placeholder="Site Admin Email" name="siteEmail" value="{{ $settings->contact_email }}">
                      	</fieldset>
                      	<fieldset class="form-group">
                  			<label for="contactAddress">Site Address</label>
                  			<input type="text" class="form-control" id="contactAddress" placeholder="Site Name" name="contactAddress" value=" {{ $settings->address }}">
                      	</fieldset>
                      	<fieldset class="form-group">
                  			<label for="contactPhone">Site Phone</label>
                  			<input type="text" class="form-control" id="contactPhone" placeholder="Contact ###-###-####" name="contactPhone" value=" {{ $settings->contact_number }}">
                      	</fieldset>
                   		<fieldset class="form-group">
                  			<div class="text-center">
                  				<button type="submit" class="btn btn-success">Updte Site Settings</button>
                  			</div>
                  		</fieldset>                 	
                  </form>
                </div>
    </div>
@stop