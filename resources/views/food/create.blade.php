@extends('layouts.User')

@section('header')

@endsection
@section('content')

    <div class="container-fluid">
        <h1> <i class="fas fa-plus"></i> @lang("Create New Food")</h1>


			<hr>
			 {{ Form::open(array('url' => 'food', 'method' => 'POST', 'files' => true))}}
        <div class="row">
            <div class="col-md-6">
            <div class="form-group">
                <label for="food"> @lang("Food Name")</label>
                <br>

                {{ Form::text('name', null, array('class' => 'form-control')) }}
            </div>
            </div>
                <div class="col-md-6">
            <div class="form-group">
                <label for="food_group_id">@lang("Select Food Group")</label>
                <select name="food_group_id" class="form-control">
                    <option value="">@lang("--- Select Food Group ---")</option>

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
                {{ Form::number('food_specific_value[]', null, array('class' => 'form-control')) }}
                {{ Form::hidden('food_specific_id[]', $row->id, array('class' => 'form-control')) }}
            </div>
            </div>
            @endforeach
        </div>
        <div class="row">
        <div class="col-md-3">
            {{Form::submit(__('Add'), array('class' => 'btn btn-primary')) }}
            {{ Form::close() }}
         </div>
        </div>
    </div>

@endsection


