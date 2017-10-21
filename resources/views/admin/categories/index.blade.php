@extends('layouts.app')

@section('content')
	<div class="panel panel-default">
		<div class="panel-heading">
			<h2>Categories</h2>
		</div>	
		<div class="panel-body">
			<table class="table table-responsive table-inverse">
				<thead>
					<tr>
						<th>
							Category Name
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
				@if($categories->count() > 0)	
					@foreach($categories as $category)
					<tr>
						<td>
							{{ $category->name }}
						</td>
						<td>
							<a href="{{ route('category.edit',[ 'id' => $category->id ]) }}" class="btn btn-sm btn-info">
								Edit
							</a>
						</td>
						<td>
							<a href="{{ route('category.delete',[ 'id' => $category->id ]) }}" class="btn btn-sm btn-danger">
								Delete
							</a>
						</td>
					</tr>
					@endforeach
				@else
					<tr>
						<th colspan="5" class="text-center">
							There are not categories, please create some.
						</th>
					</tr>
				@endif		
				</tbody>
			</table>
		</div>
	</div>
@stop