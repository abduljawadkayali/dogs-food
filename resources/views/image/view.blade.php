@extends('layouts.Admin')

@section('header')
    <div >
        <a href="{{ URL::previous() }}" class="btn btn-default">@lang("Back")</a>
    </div>
@endsection
@section('content')

<div class="jumbotron text-center">
	<img src="{{ URL::to('/') }}/images/{{ $data->image }}" class="img-thumbnail" />

</div>
@endsection
