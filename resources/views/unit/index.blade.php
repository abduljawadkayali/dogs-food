@extends('layouts.User')

@section('header')

@endsection
@section('content')

<div class="container-fluid">
 <h1> <i class="fas fa-list"></i> @lang("Food Units")</h1>
 <hr>
	<br>
<div>

</div>

<table class="table table-bordered table-striped">
	<tr>
		<th>@lang("Food Unit")</th>
	<th >@lang("Created By")</th>
		<th>@lang("Operations")</th>
	</tr>


	@foreach($data as $row)

		<tr>
			<td>{{ $row->name }}</td>
			<td>{!! $row->user->name !!} - @lang("Email") : {!! $row->user->email !!}</td>
			<td>

				<form action="{{ route('unit.destroy', $row->id) }}" method="post">
					<a href="{{ route('unit.edit', $row->id) }}" class="btn btn-warning">@lang("Edit")</a>
					@csrf
					@method('DELETE')
					<button type="submit" class="btn btn-danger">@lang("Delete")</button>
				</form>
			</td>
		</tr>




	@endforeach

</table>

<a href="{{ URL::to('unit/create') }}" class="btn btn-success">@lang("Add Food Unit")</a>
<br>
	<br>
@endsection
