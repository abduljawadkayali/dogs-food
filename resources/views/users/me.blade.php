@extends('layouts.User')

@section('header')

@endsection
@section('content')
    <div class="container-fluid">
        <div class="row ">

            <div class='col-lg-8 col-lg-offset-4'>

                <h1><i class='fa fa-user'></i> @lang("User Information")</h1>
                <hr>
    <h3>@lang('Name')  :  {!! auth()->user()->name !!}</h3>
    <h3>@lang('Email')  :  {!! auth()->user()->email !!}</h3>


                <div class="form-group">
                    <img src="{{ URL::to('/') }}/images/{{ auth()->user()->image }}" class="img-thumbnail" />

                </div>


    <div>
        <a href = "/profile"  class="btn btn-info pull-left" style="margin-right: 3px;">@lang("Edit")</a>
    </div>
            </div>
        </div>
    </div>

@endsection
