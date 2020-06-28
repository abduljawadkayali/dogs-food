@extends('layouts.User')

@section('header')

@endsection
@section('content')

    <div class="container-fluid">
        <h1> <i class="fas fa-plus"></i> @lang("Create New Food Group")</h1>

     <div class="row">

      <div class="col-sm">
        <div class='col-lg-8 col-lg-offset-12' >

			<hr>
			 {{ Form::open(array('url' => 'group', 'method' => 'POST', 'files' => true))}}

            <div class="form-group">
                @lang("Food Group")
                <br>

                {{ Form::text('name', null, array('class' => 'form-control')) }}

            </div>



            {{Form::submit(__('Add'), array('class' => 'btn btn-primary')) }}
            {{ Form::close() }}
         </div>
    </div>
     </div>
</div>

@endsection


