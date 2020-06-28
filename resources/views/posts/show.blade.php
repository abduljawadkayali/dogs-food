@extends('layouts.Admin')

@section('title', '| Posts')

@section('content')

    <div class="container">

        <h1>@lang("Author Name")  : {{ $post->name }}</h1>
        <hr>
        @lang("Body")
        <p class="lead">{{ $post->body }} </p>
        <hr>
        {!! Form::open(['method' => 'DELETE', 'route' => ['posts.destroy', $post->id] ]) !!}
        <a href="{{ url()->previous() }}" class="btn btn-primary">@lang("Back")</a>

        {!! Form::close() !!}

    </div>

@endsection
