@extends('layouts.Admin')

@section('header')

@endsection
@section('content')

<div class="container-fluid">
 <h1> <i class="fas fa-users"></i> @lang("Staff")</h1>
 <hr>
	<br>
<div>

</div>

<table class="table table-bordered table-striped">
	<tr>
		<th>@lang("Name")</th>
	<th >@lang("Job")</th>
		<th>@lang("Description")</th>
		<th>@lang("Mail")</th>
		<th>@lang("Phone")</th>
			<th>@lang("Photo")</th>
		<th>@lang("Operations")</th>
	</tr>


	@foreach($data as $row)

		<tr>

			<td>{{ $row->name }}</td>
			<td>{{ $row->job }}</td>
			<td>{{ $row->description }}</td>
			<td>{{ $row->mail }}</td>
			<td>{{ $row->phone }}</td>
			<td><img src="{{ URL::to('/') }}/images/{{ $row->image }}" class="img-thumbnail" width="100" /></td>
			<td>

				<form action="{{ route('staff.destroy', $row->id) }}" method="post">
					<a href="{{ route('staff.show', $row->id) }}" class="btn btn-primary">@lang("Show")</a>
					<a href="{{ route('staff.edit', $row->id) }}" class="btn btn-warning">@lang("Edit")</a>
					@csrf
					@method('DELETE')
					<button type="submit" class="btn btn-danger">@lang("Delete")</button>
				</form>
			</td>
		</tr>




	@endforeach

</table>

<a href="{{ URL::to('staff/create') }}" class="btn btn-success">@lang("Add Staff")</a>
<br>
	<br>
@endsection
