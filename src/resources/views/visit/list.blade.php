@extends('layout')
@section('content')
<h1>{{ $title }}</h1>
@if (count($items) > 0)
	<table class="table table-sm table-hover table-striped">
		<thead class="thead-light">
			<tr>
				<th>ID</th>
				<th>Visit name</th>
				<th>Leader</th>
				<th>Start date</th>
				<th>End date</th>
				<th>Cost</th>
				<th>&nbsp;</th>
			</tr>
		</thead>
		<tbody>
		@foreach($items as $visit)
			<tr>
				<td>{{ $visit->id }}</td>
				<td>{{ $visit->event_name }}</td>
				<td>{{ $visit->leader->name }}</td>
				<td>{{ $visit->start_date}}</td>
				<td>{{ $visit->end_date}}</td>
				<td>&euro; {{ number_format($visit->cost, 2, '.') }}</td>
				<td>{!! $visit->display ? '&#x2714;' : '&#x274C;' !!}</td>
				<td>
					<a
						href="/visits/update/{{ $visit->id }}"
						class="btn btn-outline-primary btn-sm"
					>Edit</a>
					<form
						action="/visits/delete/{{ $visit->id }}"
						method="post"
						class="deletionform d-inline"
					>
						@csrf
						<button
							type="submit"
							class="btn btn-outline-danger btn-sm"
						>Delete</button>
					</form>
				</td>
			</tr>
		@endforeach
		</tbody>
	</table>
@else
	<p>No entries found in database </p>
@endif
	<a href="/visits/create" class="btn btn-primary">Add new visit</a>
@endsection
