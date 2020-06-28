@extends('layouts.Admin')

@section('header')

@endsection
@section('content')

    <div class="container-fluid">
        <h1> <i class="fas fa-plus"></i>  @lang("Add Company")</h1>

     <div class="row">
        <div class='col-lg-12 col-lg-offset-12' >

			<hr>
			 {{ Form::open(array('url' => 'company', 'method' => 'POST'))}}

            <div class="form-group">
                @lang("Company Name")
                <br>

                {{ Form::text('name', null, array('class' => 'form-control')) }}

            </div>

            <div class="form-group">
                @lang("Select User:")
                <select name="user_id" class="form-control">
                    <option value="">@lang("--- Select User ---")</option>

                    @foreach ($data as $key => $value)

                        <option value="{{ $value->id }}">{{ $value->name }}</option>

                    @endforeach
                </select>
            </div>


            <div class="form-group">
                @lang("Adress")
                <br>

                {{ Form::textarea('adress', null, array('class' => 'form-control', 'id'=>'summary-ckeditor')) }}

            </div>

            {{Form::submit(__('Add'), array('class' => 'btn btn-primary')) }}
            <br>   </br>
            {{ Form::close() }}
         </div>

    </div>
     </div>



@endsection


