@extends('layouts.User')

@section('header')
@endsection
@section('content')

<h1><i class="fa fa-edit"> </i>  @lang("Edit Dog")</h1>
<hr>

<form method="post" action="{{ route('animal.update', $data->id) }}" enctype="multipart/form-data">

    @csrf
    @method('PATCH')
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="food"> @lang("Dog Name")</label>
                <br>

                {{ Form::text('name', $data->name, array('class' => 'form-control')) }}
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label for="animal_food_type_id">@lang("Select Dog Food Type") </label>
                <select name="animal_food_type_id" class="form-control">
                    <option value="{{$data->animal_food_type_id}}">{{__($data->AnimalFoodType->name)}} </option>

                    @foreach ($AnimalFoodType as $key => $value)

                        <option value="{{ $value->id }}">{{ __($value->name) }}</option>

                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label for="animal_family_id">@lang("Select Dog Family")</label>
                <select name="animal_family_id" class="form-control">
                    <option value="{{$data->animal_family_id}}">{{__($data->AnimalFamily->name)}}</option>

                    @foreach ($AnimalFamily as $key => $value)

                        <option value="{{ $value->id }}">{{ __($value->name) }}</option>

                    @endforeach
                </select>
            </div>
        </div>


        <div class="col-md-3">
            <div class="form-group">
                <label for="animal_motion_id">@lang("Select Dog Motion Type")</label>
                <select name="animal_motion_id" class="form-control">
                    <option value="{{$data->animal_motion_id}}">{{__($data->AnimalMotion->name)}}</option>

                    @foreach ($AnimalMotion as $key => $value)

                        <option value="{{ $value->id }}">{{ __($value->name) }}</option>

                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label for="animal_type_id">@lang("Select Dog Age Type")</label>
                <select name="animal_type_id" class="form-control">
                    <option value="{{$data->animal_type_id}}">{{__($data->AnimalType->name)}}</option>

                    @foreach ($AnimalType as $key => $value)

                        <option value="{{ $value->id }}">{{ __($value->name) }}</option>

                    @endforeach
                </select>
            </div>
        </div>


        <div class="col-md-3">
            <div class="form-group">
                <label for="age"> @lang("Dog Age"):(@lang("Week/Young-Year/Others"))</label>
                <br>

                {{ Form::number('age', $data->age, array('class' => 'form-control')) }}
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label for="wight"> @lang("Dog Wight")</label>
                <br>

                {{ Form::number('wight', $data->wight, array('class' => 'form-control')) }}
            </div>
        </div>



        <div class="col-md-3">
            <div class="form-group">
                <label for="gebelik"> @lang("Dog Pregnancy"): (@lang("If Exist"))</label>
                <br>

                {{ Form::number('gebelik', $data->gebelik, array('class' => 'form-control')) }}
            </div>
        </div>


        <div class="col-md-3">
            <div class="form-group">
                <label for="dogum"> @lang("Dog Birth") : (@lang("If Exist"))</label>
                <br>

                {{ Form::number('dogum', $data->dogum, array('class' => 'form-control')) }}
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label for="child"> @lang("Dog's Children") : (@lang("If Exist"))</label>
                <br>

                {{ Form::number('child', $data->child_n + $data->child_m, array('class' => 'form-control')) }}
            </div>
        </div>

    </div>
    <div class="row">
    <div class="form-group">
        <input type="submit" name="edit" class="btn btn-primary input-lg"/>
    </div>
</form>


@endsection
