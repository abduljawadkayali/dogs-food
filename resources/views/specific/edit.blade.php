@extends('layouts.User')

@section('header')
@endsection
@section('content')

<h1><i class="fa fa-edit"> </i>@lang("Edit Food Specific")</h1>
<hr>

<form method="post" action="{{ route('specific.update', $data->id) }}" enctype="multipart/form-data">

	@csrf
	@method('PATCH')
    <div class="form-group">
        <label class="col-md-4">@lang("Food Specific Name")</label>
        <div class="col-md-8">
            <input type="text" name="name" value="{{ $data->name }}" class="form-control input-lg"  />
        </div>
    </div>


    <div class="form-group">
        <label for="food_unit_id"> @lang("Select Food Specific Unit")</label>
        <div class="col-md-8">
        <select name="food_unit_id" class="form-control">
            <option value="{{ $data->food_unit_id }}">{{ $data->FoodUnit->name }}</option>

            @foreach ($foodUnit as $key => $value)

                <option value="{{ $value->id }}">{{ $value->name }}</option>

            @endforeach
        </select>
        </div>
    </div>

	<div class="form-group">
		<input type="submit" name="edit" class="btn btn-primary input-lg"/>
	</div>
</form>

@endsection




