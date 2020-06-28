@extends('layouts.Admin')

@section('header')

@endsection
@section('content')
<div class="container-fluid">
 <div class="row ">
<div class="col-lg-12 col-lg-offset-1">
 <h1><i class="fa fa-users"></i> @lang("User Administration")</h1>
      <hr>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th>@lang("Name")</th>
                    <th>@lang("Email")</th>
                    <th>@lang("Date/Time Added")</th>
                    <th>@lang("User Roles")</th>
                    <th>@lang("Operations")</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($users as $user)
                <tr>

                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at->format('F d, Y h:ia') }}</td>
                    <td>{{  $user->roles()->pluck('name')->implode(' ') }}</td>{{-- Retrieve array of roles associated to a user and convert to string --}}
                    <td>


                    {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id] ]) !!}
                       <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info pull-left" style="margin-right: 3px;">@lang("Edit")</a>
                    {!! Form::submit(__('Delete'), ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}

                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>

    <a href="{{ route('users.create') }}" class="btn btn-success">@lang("Add User")</a>

</div>
</div>
</div>

@endsection
