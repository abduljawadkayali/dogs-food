@extends('layouts.User')

@section('header')

@endsection
@section('content')

    <div class="container-fluid">
        <h1> <i class="fas fa-plus"></i> @lang("Create New Animal Family")</h1>

			<hr>
			 {{ Form::open(array('url' => 'family', 'method' => 'POST', 'files' => true))}}

        <div class="row">


            <div class="col-md-6">
            <div class="form-group">
                <label>@lang("Animal Family Name")</label>

                {{ Form::text('name', null, array('class' => 'form-control')) }}

            </div>
            </div>
            </div>
        <div class="row">

        <div class="col-md-4">
            <div class="form-group">
                <label >@lang("Minimum")</label>
                <br>

                {{ Form::number('min', null, array('class' => 'form-control')) }}

            </div>
            </div>
                <div class="col-md-4">
            <div class="form-group">
                <label >@lang("Maximum")</label>
                <br>

                {{ Form::number('max', null, array('class' => 'form-control')) }}

            </div>
            </div>
            <div class="col-md-4">

            <div class="form-group">
                <label >@lang("Animal Body")</label>
                <br>

                {{ Form::text('body', null, array('class' => 'form-control')) }}

            </div>
            </div>
            <div class="col-md-4">

            <div class="form-group">
                <label >@lang("Live")</label>
                <br>

                {{ Form::text('age', null, array('class' => 'form-control')) }}

            </div>
            </div>
            <div class="col-md-4">

            <div class="form-group">
                <label >@lang("Boy")</label>
                <br>

                {{ Form::text('boy', null, array('class' => 'form-control')) }}

            </div>
            </div>
            <div class="col-md-4">

            <div class="form-group">
                <label >@lang("Girl")</label>
                <br>

                {{ Form::text('girl', null, array('class' => 'form-control')) }}

            </div>
            </div>
            </div>



            {{Form::submit(__('Add'), array('class' => 'btn btn-primary')) }}
            {{ Form::close() }}
         </div>
@endsection


