@extends('layouts.Admin')

@section('header')
    <div >
        <a href="{{ URL::previous() }}" class="btn btn-default">@lang("Back")</a>
    </div>
@endsection
@section('content')

    <h3>@lang('Company Name')  :  {!! $data->name !!}</h3>
    <h3>@lang('Company Adress')  :  {!! $data->job !!}</h3>
    <h3>@lang('Company Owner')  :  {!! $data->mail !!}</h3>
    <h3>@lang('Phone')  :  {!! $data->phone !!}</h3>
    <h2>@lang('Description')- {!! $data->description !!}</h2>


@endsection
