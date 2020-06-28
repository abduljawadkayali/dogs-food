@extends('layouts.Admin')

@section('header')

@endsection
@section('content')
    <div class="container-fluid">
        <div class="row ">
            <div class='col-lg-6 col-lg-offset-4'>

                <h1><i class="fas fa-user-edit"></i> @lang("Edit") : {{auth()->user()->name}}</h1>
                <hr>
                {{ Form::model(auth()->user(), array('route' => array('users.updateUser', auth()->user()->id), 'method' => 'PUT', 'files' => true)) }}
                @csrf
                <div class="form-group">
                    {{ Form::label('name', __('Name')) }}
                    {{ Form::text('name', auth()->user()->name, array('class' => 'form-control')) }}
                </div>

                <div class="form-group">
                    {{ Form::label('email', __('Email')) }}
                    {{ Form::email('email', auth()->user()->email, array('class' => 'form-control')) }}
                </div>

                <div class="form-group">
                    {{ Form::label('password', __('Password')) }}<br>
                    {{ Form::password('password', array('class' => 'form-control')) }}

                </div>

                <div class="form-group">
                    {{ Form::label('password', __('Confirm Password')) }}<br>
                    {{ Form::password('password_confirmation', array('class' => 'form-control')) }}

                </div>


                <div class="form-group">
                    <img src="{{ URL::to('/') }}/images/{{ auth()->user()->image }}" class="img-thumbnail" />

                </div>

                <div class="col-md-8">

                    <div class="form-group">
                        <div class="custom-file">
                            <input name="image" type="file" class="custom-file-input" id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">@lang("Choose Photo")</label>
                        </div>
                    </div>




                    <input type="hidden" name="hidden_image" value="{{ auth()->user()->image }}" />
                </div>

                {{ Form::submit(__('Update'), array('class' => 'btn btn-primary')) }}
                <br>  <br>
                {{ Form::close() }}

            </div>
        </div>
    </div>
@endsection
