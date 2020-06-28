@extends('layouts.Admin')

@section('header')

@endsection
@section('content')

    <div class="container-fluid">
        <h1> <i class="fas fa-plus"></i>@lang("  Create New Crud")</h1>

     <div class="row">

      <div class="col-sm">
        <div class='col-lg-12 col-lg-offset-12' >

			<hr>
			 {{ Form::open(array('url' => 'crud', 'method' => 'POST', 'files' => true))}}
			 @lang("Part")

			<div class="form-group " >

			{{Form::select('web_page', ['part1' => __('part1'),
			 'part2' => __('part2'),
			 'part3' => __('part3'),
			 'part4' =>  __('part4 '),
			 'part5' =>__('part5'),
			 'part6' => __('part6'),
			 'part7' => __('part7'),
			],null ,['class' => 'browser-default custom-select'])}}
		</div>

            <div class="form-group">
                @lang("Title")
                <br>

                {{ Form::text('title', null, array('class' => 'form-control')) }}

            </div>

            <div class="form-group">
                 @lang("Description")
				 <br>

				{{ Form::textarea('description', null, array('class' => 'form-control', 'id'=>'summary-ckeditor')) }}

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


