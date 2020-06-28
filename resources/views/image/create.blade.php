@extends('layouts.Admin')

@section('header')

@endsection
@section('content')

    <div class="container-fluid">

        <h1><i class="far fa-image"></i>@lang("Add Photo")</h1>

     <div class="row">

      <div class="col-sm">
        <div class='col-lg-12 col-lg-offset-12' >

			<hr>
			 {{ Form::open(array('url' => 'image', 'method' => 'POST', 'files' => true))}}


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


