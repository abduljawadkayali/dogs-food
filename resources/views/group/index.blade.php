@extends('layouts.User')

@section('header')

@endsection
@section('content')

<div class="container-fluid">
 <h1> <i class="fas fa-list"></i> @lang("Food Groups")</h1>
 <hr>
	<br>
<div>

</div>

<table class="table table-bordered table-striped">
	<tr>
		<th>@lang("Food Group")</th>
	<th >@lang("Created By")</th>
		<th>@lang("Operations")</th>
	</tr>


	@foreach($data as $row)

		<tr>
			<td>{{ $row->name }}</td>
			<td>{!! $row->user->name !!} - @lang("Email") : {!! $row->user->email !!}</td>
			<td>

				<form action="{{ route('group.destroy', $row->id) }}" method="post">
					<a href="{{ route('group.edit', $row->id) }}" class="btn btn-warning">@lang("Edit")</a>
					@csrf
					@method('DELETE')
					<button type="submit" class="btn btn-danger">@lang("Delete")</button>
				</form>
			</td>
		</tr>




	@endforeach

</table>

<a href="{{ URL::to('group/create') }}" class="btn btn-success">@lang("Add Food Group")</a>
<br>
	<br>
@endsection
