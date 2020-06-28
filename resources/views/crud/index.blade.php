@extends('layouts.Admin')

@section('header')

@endsection
@section('content')

<div class="container-fluid">
 <h1> <i class="fas fa-clone"></i>@lang("  Cruds")</h1>
	<div class="row">
	  <div class="col">

	  </div>
	  <div class="col">
	  </div>
	</div>
	<br>
	<br>
<div>

</div>

<table class="table table-bordered table-striped">
	<tr>
		<th>@lang("Photo")</th>
	<th >@lang("Part")</th>
		<th>@lang("Description")</th>
		<th>@lang("Title")</th>
		<th>@lang("Operations")</th>
	</tr>


	@foreach($data as $row)

		<tr>
			<td><img src="{{ URL::to('/') }}/images/{{ $row->image }}" class="img-thumbnail" width="150" /></td>
			<td>{{ $row->web_page }}</td>
			<td>{!! $row->description !!}</td>
			<td>{!! $row->title !!}</td>
			<td>

				<form action="{{ route('crud.destroy', $row->id) }}" method="post">
					<a href="{{ route('crud.show', $row->id) }}" class="btn btn-primary">@lang("Show")</a>
					<a href="{{ route('crud.edit', $row->id) }}" class="btn btn-warning">@lang("Edit")</a>
					@csrf
					@method('DELETE')
					<button type="submit" class="btn btn-danger">@lang("Delete")</button>
				</form>
			</td>
		</tr>




	@endforeach

</table>

<a href="{{ URL::to('crud/create') }}" class="btn btn-success">@lang("Add Crud")</a>
<br>
	<br>
@endsection
