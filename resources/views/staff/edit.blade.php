@extends('layouts.Admin')

@section('header')

@endsection
@section('content')

    <div class="container-fluid">
        <h1><i class="fas fa-users-cog"></i>@lang("Edit Staff")</h1>
        <hr>
        <div class="row">

            <div class="col-sm">
                <div class='col-lg-8 col-lg-offset-12' >



<form method="post" action="{{ route('staff.update', $data->id) }}" enctype="multipart/form-data">

	@csrf
	@method('PATCH')
    <div class="form-group">
        @lang("Name")
        <br>

        {{ Form::text('name', $data->name , array('class' => 'form-control')) }}

    </div>


    <div class="form-group">
        @lang("Job")
        <br>

        {{ Form::text('job', $data->job , array('class' => 'form-control')) }}

    </div>


    <div class="form-group">
        @lang("Description")
        <br>

        {{ Form::textarea('description', $data->description, array('class' => 'form-control', 'id'=>'summary-ckeditor')) }}

    </div>

    <div class="form-group">
        @lang("Mail")
        <br>

        {{ Form::email('mail', $data->mail, array('class' => 'form-control')) }}

    </div>

    <div class="form-group">
        @lang("Phone")
        <br>

        {{ Form::number('phone', $data->phone, array('class' => 'form-control')) }}

    </div>



    <div class="form-group">
	<img src="{{ URL::to('/') }}/images/{{ $data->image }}" class="img-thumbnail" />

          </div>

		<div class="col-md-8">

            <div class="form-group">
                <div class="custom-file">
                    <input name="image" type="file" class="custom-file-input" id="exampleInputFile">
                    <label class="custom-file-label" for="exampleInputFile">@lang("Choose Photo")</label>
                </div>
            </div>




			<input type="hidden" name="hidden_image" value="{{ $data->image }}" />
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




