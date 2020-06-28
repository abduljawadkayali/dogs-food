@extends('layouts.User')

@section('header')

@endsection
@section('content')

    <div class="container-fluid">
        <h1> <i class="fas fa-plus"></i> @lang("Create New Mixture")</h1>


			<hr>
			 {{ Form::open(array('url' => 'karma', 'method' => 'POST', 'files' => true))}}
        <div class="row">
            <div class="col-md-6">
            <div class="form-group">
                <label for="food"> @lang("Mixture Name")</label>
                <br>

                {{ Form::text('name', null, array('class' => 'form-control')) }}
            </div>
            </div>
        </div>
        <div class="row">
            @foreach ($Food as $row)
            <div class="col-md-3">
            <div class="form-group">
                <label for="food_specific_id">{{__($row->name)}} </label>
                {{ Form::number('food[]', null, ['class' => 'form-control','step'=>'any']) }}
                {{ Form::hidden('food_id[]', $row->id, array('class' => 'form-control')) }}
            </div>
            </div>
            @endforeach
        </div>
        <div class="row">
        <div class="col-md-3">
            {{Form::submit(__('Add'), array('class' => 'btn btn-primary')) }}
            {{ Form::close() }}
         </div>
        </div>
    </div>

@endsection


