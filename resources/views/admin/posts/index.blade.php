@extends('layouts.app')

@section('content')
	<div class="panel panel-default">
		<div class="panel-heading">
				<h2>Published Post</h2>
		</div>	
		<div class="panel-body">		
			<table class="table table-responsive table-inverse">
				<thead>
					<tr>
						<th>
							Image
						</th>
						<th>
							Title
						</th>
						<th>
							Edit
						</th>
						<th>
							Delete
						</th>
					</tr>
				</thead>
				<tbody>
				@if($posts->count() > 0)
					@foreach($posts as $post)
					<tr>
						<td>
							<img src="{{ $post->featured }}" alt="{{ $post->title }}" width="50px" height="50px" />
						</td>
						<td>
							{{ $post->title }}
						</td>						
						<td>
							<a href="{{ route('post.edit',[ 'id' => $post->id ]) }}" class="btn btn-sm btn-info">
								Edit
							</a>
						</td>
						<td>
							<a href="{{ route('post.delete',[ 'id' => $post->id ]) }}" class="btn btn-sm btn-danger">
								Trash
							</a>
						</td>
					</tr>
					@endforeach
				@else
					<tr>
						<th colspan="5" class="text-center">
							There are no post to display.
						</th>
					</tr>
				@endif
				</tbody>
			</table>
		</div>
	</div>
@stop