@extends('layouts.User')

@section('header')
@endsection
@section('content')

<h1><i class="fa fa-edit"> </i> @lang("Edit Solution")</h1>
<hr>

<form method="post" action="{{ route('solution.update', $solution->id) }}" enctype="multipart/form-data">

    @csrf
    @method('PATCH')
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label >@lang("Solution Name")</label>


                {{ Form::text('name', $solution->name, array('class' => 'form-control')) }}

            </div>
        </div>
    </div>


    <div class="row">

        <div class="col-md-6">
            <div class="form-group">
                <label for="karma_id">@lang("Select Mixture")</label>
                <select name="karma_id" class="form-control">
                    <option value="{{$solution->Karma->id }}">{{$solution->Karma->name }}</option>

                    @foreach ($Karma as $key => $value)

                        <option value="{{ $value->id }}">{{ __($value->name) }}</option>

                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="animal_id">@lang("Select Dog")</label>
                <select name="animal_id" class="form-control">
                    <option value="{{ $solution->Animal->id }}">{{ $solution->Animal->name }}</option>

                    @foreach ($Animal as $key => $value)

                        <option value="{{ $value->id }}">{{ __($value->name) }}</option>

                    @endforeach
                </select>
            </div>
        </div>

    </div>
    <div class="form-group">
        <input type="submit" name="edit" class="btn btn-primary input-lg"/>
    </div>
</form>


@endsection
