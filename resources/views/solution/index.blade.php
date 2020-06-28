@extends('layouts.User')

@section('title', '| Solutions')

@section('content')

<div class="col-lg-12 col-lg-offset-1">
    <h1><i class="fa fa-newspaper"></i>
    @lang("Solutions")
</h1>
    <hr>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th>@lang("Solution Name")</th>
                    <th>@lang("Dog")</th>
                    <th>@lang("Mixture")</th>
                    <th >@lang("Created By")</th>
                    <th>@lang("Operations")</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $row)
                <tr>
                    <td>{{ $row->name }}</td>
                        <td>{{ $row->Animal->name }}</td>
                        <td>{{ $row->Karma->name  }}</td>
                        <td>{!! $row->user->name !!} - @lang("Email") : {!! $row->user->email !!}</td>
                    <td>


                    {!! Form::open(['method' => 'DELETE', 'route' => ['solution.destroy', $row->id] ]) !!}
                       <a href="{{ URL::to('solution/'.$row->id.'/edit') }}" class="btn btn-info pull-left" style="margin-right: 3px;">@lang("Edit")</a>
                       <a href="{{ URL::to('downloadPDF/'.$row->id ) }}" class="btn btn-success pull-left" style="margin-right: 3px;">@lang("Report")</a>
                       <a href="{{ route('solution.show', $row->id ) }}" class="btn btn-warning pull-left" style="margin-right: 3px;">@lang("Show")</a>


                    {!! Form::submit(__('Delete'), ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <a href="{{ URL::to('solution/create') }}" class="btn btn-success">@lang("Make New Solution")</a>

</div>

@endsection
