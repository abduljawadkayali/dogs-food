@extends('layouts.User')

@section('header')

@endsection
@section('content')

    <div class="container-fluid">
        <h1> <i class="fas fa-plus"></i> @lang("Create New Food Specific")</h1>

     <div class="row">

      <div class="col-sm">
        <div class='col-lg-8 col-lg-offset-12' >

			<hr>
			 {{ Form::open(array('url' => 'specific', 'method' => 'POST', 'files' => true))}}

            <div class="form-group">
                @lang("Food Specific Name")
                <br>

                {{ Form::text('name', null, array('class' => 'form-control')) }}

            </div>

            <div class="form-group">
                <label for="food_unit_id">@lang("Select Food Specific Unit")</label>
                <select name="food_unit_id" class="form-control">
                    <option value="">@lang("--- Select Food Specific Unit ---")</option>

                    @foreach ($data as $key => $value)

                        <option value="{{ $value->id }}">{{ $value->name }}</option>

                    @endforeach
                </select>
            </div>




            {{Form::submit(__('Add'), array('class' => 'btn btn-primary')) }}
            {{ Form::close() }}
         </div>
    </div>
     </div>
</div>

@endsection


