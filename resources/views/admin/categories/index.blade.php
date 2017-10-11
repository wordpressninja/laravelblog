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
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@stop