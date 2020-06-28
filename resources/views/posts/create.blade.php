@extends('layouts.Admin')

@section('title', '| Create Permission')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <h1><i class="fa fa-plus">@lang(" Create New Post")</i></h1>
            <hr>

            {{-- Using the Laravel HTML Form Collective to create our form --}}
            {{ Form::open(array('route' => 'posts.store')) }}



            <div class="form-group">
                {{ Form::label('name', __('Author Name')) }}
                {{ Form::text('name', null, array('class' => 'form-control')) }}
                <br>
                {{ Form::label('Status', __('Status')) }}

                <input type="checkbox" name="status" checked data-bootstrap-switch data-off-color="danger" data-on-color="success">

                <br>
                <br>

                {{ Form::label('body', __('Post Body')) }}
                {{ Form::textarea('body', null, array('class' => 'form-control')) }}
                <br>

                {{ Form::submit(__('Create Post'), array('class' => 'btn btn-success btn-lg btn-block')) }}
                {{ Form::close() }}
            </div>
        </div>
    </div>

@endsection
