@extends('layouts.Admin')

@section('header')

@endsection
@section('content')
    <div class="container-fluid">
        <h1> <i class="fas fa-edit"></i>  @lang("Edit Company")</h1>

        <div class="row">
            <div class='col-lg-12 col-lg-offset-12' >

                <hr>


<form method="post" action="{{ route('company.update', $data->id) }}" enctype="multipart/form-data">

	@csrf
	@method('PATCH')

    <div class="form-group">
        @lang("Company Name")
        <br>

        {{ Form::text('name', $data->name, array('class' => 'form-control')) }}

    </div>

    <div class="form-group">
        @lang("Select User:")
        <select name="user_id" class="form-control">
            <option value="{{$data->user->id}}">{{$data->user->name}}</option>

            @foreach ($user as $key => $value)

                <option value="{{ $value->id }}">{{ $value->name }}</option>

            @endforeach
        </select>
    </div>


    <div class="form-group">
        @lang("Adress")
        <br>

        {{ Form::textarea('adress', $data->adress, array('class' => 'form-control', 'id'=>'summary-ckeditor')) }}

    </div>


	<br />
	<div class="form-group">
		<input type="submit" name="edit" class="btn btn-primary input-lg"/>
	</div>
</form>


            </div>
        </div>
    </div>
    </div>





@endsection




