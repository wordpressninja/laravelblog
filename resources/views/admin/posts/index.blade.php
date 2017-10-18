@extends('layouts.app')

@section('content')
	<div class="panel panel-default">
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
					@foreach($posts as $post)
					<tr>
						<td>
							<img src="{{ $post->featured }}" alt="{{ $post->title }}" width="90px" height="50px" />
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
				</tbody>
			</table>
		</div>
	</div>
@stop