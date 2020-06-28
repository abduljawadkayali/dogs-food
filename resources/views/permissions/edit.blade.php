@extends('layouts.Admin')
@section('title', '| Edit Permission')

@section('content')

    <div class='col-lg-4 col-lg-offset-4'>

        <h1><i class='fa fa-key'></i>@lang("Edit")  {{$permission->name}}</h1>
        <hr>
        <br>
        {{ Form::model($permission, array('route' => array('permissions.update', $permission->id), 'method' => 'PUT')) }}{{-- Form model binding to automatically populate our fields with permission data --}}

        <div class="form-group">
            {{ Form::label('name', __('Permission Name')) }}
            {{ Form::text('name', null, array('class' => 'form-control')) }}
        </div>
        <br>
        {{ Form::submit(__('Edit'), array('class' => 'btn btn-primary')) }}

        {{ Form::close() }}

    </div>

@endsection
