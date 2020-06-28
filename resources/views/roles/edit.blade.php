@extends('layouts.Admin')
@section('title', '| Edit Role')

@section('content')

    <div class='col-lg-6 col-lg-offset-4'>
        <h1><i class='fa fa-key'></i>@lang("Edit Role: ") {{$role->name}}</h1>
        <hr>

        {{ Form::model($role, array('route' => array('roles.update', $role->id), 'method' => 'PUT')) }}

        <div class="form-group">
            {{ Form::label('name', __('Role Name')) }}
            {{ Form::text('name', null, array('class' => 'form-control')) }}
        </div>

        <h5><b>@lang("Assign Permissions")</b></h5>
        @foreach ($permissions as $permission)

            {{Form::checkbox('permissions[]',  $permission->id, $role->permissions ) }}
            {{Form::label($permission->name, ucfirst($permission->name)) }}<br>

        @endforeach
        <br>
        {{ Form::submit(__('Edit'), array('class' => 'btn btn-primary')) }}

        {{ Form::close() }}
    </div>

@endsection
