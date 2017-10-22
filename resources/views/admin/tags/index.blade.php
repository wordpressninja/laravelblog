@extends('layouts.app')

@section('content')
	<div class="panel panel-default">
		<div class="panel-heading">
			<h2>Tags</h2>
		</div>	
		<div class="panel-body">
			<table class="table table-responsive table-inverse">
				<thead>
					<tr>
						<th>
							Tag Name
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
				@if($tags->count() > 0)	
					@foreach($tags as $tag)
					<tr>
						<td>
							{{ $tag->tag }}
						</td>
						<td>
							<a href="{{ route('tag.edit',[ 'id' => $tag->id ]) }}" class="btn btn-sm btn-info">
								Edit
							</a>
						</td>
						<td>
							<a href="{{ route('tag.delete',[ 'id' => $tag->id ]) }}" class="btn btn-sm btn-danger">
								Delete
							</a>
						</td>
					</tr>
					@endforeach
				@else
					<tr>
						<th colspan="5" class="text-center">
							There are not tags, please create some.
						</th>
					</tr>
				@endif		
				</tbody>
			</table>
		</div>
	</div>
@stop