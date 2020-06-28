@extends('layouts.User')

@section('header')

@endsection
@section('content')

<div class="container-fluid">
 <h1> <i class="fas fa-list"></i> @lang("Animal Families")</h1>
 <hr>
	<br>
<div>

</div>

<table class="table table-bordered table-striped">
	<tr>
		<th>@lang("Animal Family")</th>
		<th>@lang("Minimum")</th>
		<th>@lang("Maximum")</th>
		<th>@lang("Average")</th>
		<th>@lang("Animal Body")</th>
		<th>@lang("Live")</th>
		<th>@lang("Boy")</th>
		<th>@lang("Girl")</th>
	<th >@lang("Created By")</th>
		<th>@lang("Operations")</th>
	</tr>


	@foreach($data as $row)

		<tr>
			<td>{{ __($row->name) }}</td>
			<td>{{ __($row->min) }}</td>
			<td>{{ __($row->max) }}</td>
			<td>{{ __($row->average) }}</td>
			<td>{{ __($row->body) }}</td>
			<td>{{ __($row->age) }}</td>
			<td>{{ __($row->boy) }}</td>
			<td>{{ __($row->girl) }}</td>
			<td>{!! $row->user->name !!} - @lang("Email") : {!! $row->user->email !!}</td>
			<td>

				<form action="{{ route('family.destroy', $row->id) }}" method="post">
					<a href="{{ route('family.edit', $row->id) }}" class="btn btn-warning">@lang("Edit")</a>
					@csrf
					@method('DELETE')
					<button type="submit" class="btn btn-danger">@lang("Delete")</button>
				</form>
			</td>
		</tr>




	@endforeach

</table>

<a href="{{ URL::to('family/create') }}" class="btn btn-success">@lang("Add Animal Family")</a>
<br>
	<br>
@endsection
