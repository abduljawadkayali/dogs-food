@extends('layouts.Admin')

@section('header')

@endsection
@section('content')

<div class="container-fluid">
 <h1><i class="fas fa-images"></i>@lang("  Photos")</h1>
<hr>

<br>

<table class="table table-bordered table-striped">
	<tr>
		<th>@lang("Photo")</th>
		<th>@lang("Operations")</th>
	</tr>


	@foreach($data as $row)

		<tr>
			<td><img src="{{ URL::to('/') }}/images/{{ $row->image }}" class="img-thumbnail" width="150" /></td>

			<td>

				<form action="{{ route('image.destroy', $row->id) }}" method="post">
					<a href="{{ route('image.show', $row->id) }}" class="btn btn-primary">@lang("Show")</a>
					<a href="{{ route('image.edit', $row->id) }}" class="btn btn-warning">@lang("Edit")</a>
					@csrf
					@method('DELETE')
					<button type="submit" class="btn btn-danger">@lang("Delete")</button>
				</form>
			</td>
		</tr>




	@endforeach

</table>

<a href="{{ URL::to('/image/create') }}" class="btn btn-success">@lang("Add Photo")</a>
<br>
	<br>
@endsection
