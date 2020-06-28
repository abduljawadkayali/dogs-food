@extends('layouts.Admin')

@section('header')

@endsection
@section('content')

<div class="container-fluid">
 <h1><i class="fas fa-building"></i>  @lang("Companies")</h1>
 <hr>
	<br>
<div>

</div>

<table class="table table-bordered table-striped">
	<tr>
		<th>@lang("Company Name")</th>
	<th >@lang("Company Adress")</th>
		<th>@lang("Company Owner")</th>
		<th>@lang("Operations")</th>
	</tr>


	@foreach($data as $row)

		<tr>

			<td>{{ $row->name }}</td>
			<td>{{ $row->adress }}</td>
			<td>@lang("Name") : {{ $row->user->name }} <br>
			 @lang("Email") : {{ $row->user->email }}</td>
			<td>

				<form action="{{ route('company.destroy', $row->id) }}" method="post">
					<a href="{{ route('company.edit', $row->id) }}" class="btn btn-warning">@lang("Edit")</a>
					@csrf
					@method('DELETE')
					<button type="submit" class="btn btn-danger">@lang("Delete")</button>
				</form>
			</td>
		</tr>




	@endforeach

</table>

<a href="{{ URL::to('company/create') }}" class="btn btn-success">@lang("Add Company")</a>
<br>
	<br>
@endsection
