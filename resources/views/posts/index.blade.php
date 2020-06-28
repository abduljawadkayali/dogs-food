@extends('layouts.Admin')

@section('title', '| Posts')

@section('content')

<div class="col-lg-12 col-lg-offset-1">
    <h1><i class="fa fa-newspaper"></i>
    @lang("Posts")
</h1>
    <hr>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th>@lang("Name")</th>
                    <th>@lang("Body")</th>
                    <th>@lang("Status")</th>
                    <th>@lang("Operations")</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->name }}</td>
                      <td>{{ \Illuminate\Support\Str::limit($post->body, 50, '...') }}</td>
                        <td>{{ __($post->status) }}</td>
                    <td>


                    {!! Form::open(['method' => 'DELETE', 'route' => ['posts.destroy', $post->id] ]) !!}
                       <a href="{{ URL::to('posts/'.$post->id.'/edit') }}" class="btn btn-info pull-left" style="margin-right: 3px;">@lang("Edit")</a>
                       <a href="{{ route('posts.show', $post->id ) }}" class="btn btn-warning pull-left" style="margin-right: 3px;">@lang("Show")</a>

                    {!! Form::submit(__('Delete'), ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <a href="{{ URL::to('posts/create') }}" class="btn btn-success">@lang("Add Post")</a>

</div>

@endsection
