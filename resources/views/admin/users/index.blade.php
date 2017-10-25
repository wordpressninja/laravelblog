@extends('layouts.app')

@section('content')
	<div class="panel panel-default">
		<div class="panel-heading">
				<h2>Blog Users</h2>
		</div>	
		<div class="panel-body">		
			<table class="table table-responsive table-inverse">
				<thead>
					<tr>
						<th>
							Image
						</th>
						<th>
							Name
						</th>
						<th>
							Permission
						</th>
						<th>
							Delete
						</th>
					</tr>
				</thead>
				<tbody>
				@if($users->count() > 0)
					@foreach($users as $user)
					<tr>
						<td>
							<img src="{{ asset($user->profile->avatar) }}" alt="{{ $user->name }}" width="60px" height="60px" style="border-radius: 50%;" />
						</td>
						<td>
							{{ $user->name }}
						</td>						
						<td>
							@if($user->admin)
								<a href="{{ route('user.not.admin', ['id' => $user->id ])  }} " class="btn-danger btn-sm">Remove Permission</a>
							@else
								<a href="{{ route('user.admin', ['id' => $user->id ])  }} " class="btn-success btn-sm">Make Admin</a>
							@endif
						</td>
						<td>
							Delete
						</td>
					</tr>
					@endforeach
				@else
					<tr>
						<th colspan="5" class="text-center">
							There are no Users.
						</th>
					</tr>
				@endif
				</tbody>
			</table>
		</div>
	</div>
@stop