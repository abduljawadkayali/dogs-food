@extends('layouts.User')

@section('header')
@endsection
@section('content')

<h1><i class="fa fa-edit"> </i>@lang("Edit Animal Family")</h1>
<hr>

<form method="post" action="{{ route('family.update', $data->id) }}" enctype="multipart/form-data">

	@csrf
	@method('PATCH')

    <div class="row">


        <div class="col-md-6">
            <div class="form-group">
                <label>@lang("Animal Family Name")</label>

                {{ Form::text('name', $data->name, array('class' => 'form-control')) }}

            </div>
        </div>
    </div>
    <div class="row">

        <div class="col-md-4">
            <div class="form-group">
                <label >@lang("Minimum")</label>
                <br>

                {{ Form::number('min', $data->min, array('class' => 'form-control')) }}

            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label >@lang("Maximum")</label>
                <br>

                {{ Form::number('max', $data->max, array('class' => 'form-control')) }}

            </div>
        </div>
        <div class="col-md-4">

            <div class="form-group">
                <label >@lang("Animal Body")</label>
                <br>

                {{ Form::text('body', $data->body, array('class' => 'form-control')) }}

            </div>
        </div>
        <div class="col-md-4">

            <div class="form-group">
                <label >@lang("Live")</label>
                <br>

                {{ Form::text('age', $data->age, array('class' => 'form-control')) }}

            </div>
        </div>
        <div class="col-md-4">

            <div class="form-group">
                <label >@lang("Boy")</label>
                <br>

                {{ Form::text('boy', $data->boy, array('class' => 'form-control')) }}

            </div>
        </div>
        <div class="col-md-4">

            <div class="form-group">
                <label >@lang("Girl")</label>
                <br>

                {{ Form::text('girl', $data->girl, array('class' => 'form-control')) }}

            </div>
        </div>
    </div>


    <div class="form-group">
		<input type="submit" name="edit" class="btn btn-primary input-lg"/>
	</div>
</form>

@endsection




