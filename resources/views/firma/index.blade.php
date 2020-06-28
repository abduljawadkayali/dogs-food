@extends('layouts.User')

@section('header')

@endsection
@section('content')

<div class="container-fluid">
 <h1><i class="fas fa-building"></i>  @lang("My Company")</h1>
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

				<form action="{{ route('firma.destroy', $row->id) }}" method="post">
					<a href="{{ route('firma.edit', $row->id) }}" class="btn btn-warning">@lang("Edit")</a>
					@csrf
					@method('DELETE')

				</form>
			</td>
		</tr>




	@endforeach

</table>

@endsection
