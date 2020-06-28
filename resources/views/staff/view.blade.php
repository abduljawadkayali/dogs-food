@extends('layouts.Admin')

@section('header')
    <div >
        <a href="{{ URL::previous() }}" class="btn btn-default">@lang("Back")</a>
    </div>
@endsection
@section('content')

<div class="jumbotron text-center">
    <h3>@lang('Name')  :  {!! $data->name !!}</h3>
    <h3>@lang('Job')  :  {!! $data->job !!}</h3>
    <h3>@lang('Mail')  :  {!! $data->mail !!}</h3>
    <h3>@lang('Phone')  :  {!! $data->phone !!}</h3>
    <h2>@lang('Description')- {!! $data->description !!}</h2>
	<br />
	<img src="{{ URL::to('/') }}/images/{{ $data->image }}" class="img-thumbnail" />

</div>
@endsection
