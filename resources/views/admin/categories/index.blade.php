@extends('layouts.app')

@section('content')
	<div class="panel panel-default">
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
				</tbody>
			</table>
		</div>
	</div>
@stop