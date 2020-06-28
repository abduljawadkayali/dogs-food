@extends('layouts.User')

@section('header')

@endsection
@section('content')

    <div class="container-fluid">
        <h1> <i class="fas fa-plus"></i> @lang("Create New Solution")</h1>


			<hr>
			 {{ Form::open(array('url' => 'solution', 'method' => 'POST'))}}
        <div class="row">
            <div class="col-md-4">
        <div class="form-group">
            <label >@lang("Solution Name")</label>


            {{ Form::text('name', null, array('class' => 'form-control')) }}

        </div>
        </div>
        </div>


        <div class="row">

            <div class="col-md-6">
                <div class="form-group">
                    <label for="karma_id">@lang("Select Mixture")</label>
                    <select name="karma_id" class="form-control">
                        <option value="">@lang("--- Select Mixture ---")</option>

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
                        <option value="">@lang("--- Select Dog ---")</option>

                        @foreach ($Animal as $key => $value)

                            <option value="{{ $value->id }}">{{ __($value->name) }}</option>

                        @endforeach
                    </select>
                </div>
            </div>

        </div>
        <div class="row">
        <div class="col-md-3">
            {{Form::submit(__('Make Solution'), array('class' => 'btn btn-primary')) }}
            {{ Form::close() }}
         </div>
        </div>
    </div>

@endsection


