@extends('layouts.Admin')

@section('title', '| Add Role')

@section('content')

    <div class='col-lg-4 col-lg-offset-4'>

        <h1><i class='fa fa-plus'></i> @lang("Add Role")</h1>
        <hr>

        {{ Form::open(array('url' => 'roles')) }}

        <div class="form-group">
            {{ Form::label('name', __('Name')) }}
            {{ Form::text('name', null, array('class' => 'form-control')) }}
        </div>

        <h5><b>@lang("Assign Permissions")</b></h5>

        <div class='form-group'>
            @foreach ($permissions as $permission)
                {{ Form::checkbox('permissions[]',  $permission->id ) }}
                {{ Form::label($permission->name, ucfirst($permission->name)) }}<br>

            @endforeach
        </div>

        {{ Form::submit(__('Add'), array('class' => 'btn btn-primary')) }}

        {{ Form::close() }}

    </div>

@endsection
