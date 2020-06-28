@extends('layouts.User')

@section('header')

@endsection
@section('content')
    <div class="container-fluid">
        <div class="row ">
    <div class='col-lg-6 col-lg-offset-4'>

        <h1><i class="fas fa-user-edit"></i> @lang("Edit") : {{$user->name}}</h1>
        <hr>

        {{ Form::model($user, array('route' => array('kullancilar.update', $user->id), 'method' => 'PUT')) }}{{-- Form model binding to automatically populate our fields with user data --}}

        <div class="form-group">
            {{ Form::label('name', __('Name')) }}
            {{ Form::text('name', $user->name, array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('email', __('Email')) }}
            {{ Form::email('email', $user->email, array('class' => 'form-control')) }}
        </div>

        <h5><b>@lang("Give Role")</b></h5>

        <div class='form-group'>
            @foreach ($roles as $role)
                {{ Form::checkbox('roles[]', $role->id, $user->roles ) }}
                {{ Form::label($role->name, ucfirst($role->name)) }}<br>

            @endforeach
        </div>

        {{ Form::submit(__('Update'), array('class' => 'btn btn-primary')) }}
        <br>
        {{ Form::close() }}

    </div>
        </div>
    </div>
@endsection
