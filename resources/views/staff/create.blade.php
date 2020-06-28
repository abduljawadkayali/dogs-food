@extends('layouts.Admin')

@section('header')

@endsection
@section('content')

    <div class="container-fluid">
        <h1> <i class="fas fa-user-plus"></i>  @lang("Add Staff")</h1>

     <div class="row">

      <div class="col-sm">
        <div class='col-lg-12 col-lg-offset-12' >

			<hr>
			 {{ Form::open(array('url' => 'staff', 'method' => 'POST', 'files' => true))}}

            <div class="form-group">
                @lang("Name")
                <br>

                {{ Form::text('name', null, array('class' => 'form-control')) }}

            </div>


            <div class="form-group">
                @lang("Job")
                <br>

                {{ Form::text('job', null, array('class' => 'form-control')) }}

            </div>

            <div class="form-group">
                @lang("Description")
                <br>

                {{ Form::textarea('description', null, array('class' => 'form-control', 'id'=>'summary-ckeditor')) }}

            </div>


            <div class="form-group">
                @lang("Mail")
                <br>

                {{ Form::email('mail', null, array('class' => 'form-control')) }}

            </div>

            <div class="form-group">
                @lang("Phone")
                <br>

                {{ Form::number('phone', null, array('class' => 'form-control')) }}

            </div>



            <div class="form-group">
            <div class="custom-file">
                <input name="image" type="file" class="custom-file-input" id="exampleInputFile">
                <label class="custom-file-label" for="exampleInputFile">@lang("Choose Photo")</label>
            </div>
            </div>

            {{Form::submit(__('Add'), array('class' => 'btn btn-primary')) }}
            {{ Form::close() }}
         </div>
    </div>
     </div>
</div>


</br>

@endsection


