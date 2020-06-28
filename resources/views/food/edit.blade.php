@extends('layouts.User')

@section('header')
@endsection
@section('content')

<h1><i class="fa fa-edit"> </i>@lang("Edit Food")</h1>
<hr>

<form method="post" action="{{ route('food.update', $data->id) }}" enctype="multipart/form-data">

    @csrf
    @method('PATCH')
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="food"> @lang("Food Name")</label>
                <br>

                {{ Form::text('name', $data->name, array('class' => 'form-control')) }}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="food_group_id">@lang("Select Food Group")</label>
                <select name="food_group_id" class="form-control">
                    <option value="{{$data->FoodGroup->id}}">{{$data->FoodGroup->name}}</option>

                    @foreach ($FoodGroup as $key => $value)

                        <option value="{{ $value->id }}">{{ __($value->name) }}</option>

                    @endforeach
                </select>
            </div>
        </div>
        @foreach ($FoodSpecific as $row)
            <div class="col-md-3">
                <div class="form-group">
                    <label for="food_specific_id">{{__($row->name)}} -- {{__($row->FoodUnit->name)}} </label>

                    {{ Form::number('food_specific_value[]',$data->Relation->where('food_specific_id',$row->id)->pluck("specific_value")->first(), array('class' => 'form-control')) }}
                    {{ Form::hidden('food_specific_id[]', $row->id, array('class' => 'form-control')) }}
                </div>
            </div>
        @endforeach
    </div>
    <div class="form-group">
        <input type="submit" name="edit" class="btn btn-primary input-lg"/>
    </div>
</form>


@endsection
