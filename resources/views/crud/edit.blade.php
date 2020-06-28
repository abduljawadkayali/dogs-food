@extends('layouts.Admin')

@section('header')
@endsection
@section('content')

<h1><i class="fa fa-edit"> </i>@lang("Edit")</h1>
<hr>

<form method="post" action="{{ route('crud.update', $data->id) }}" enctype="multipart/form-data">

	@csrf
	@method('PATCH')


      <div class="form-group">
        <label class="col-md-4 ">@lang("Part")</label>
          <div class="col-md-8">
          <div class="form-group " >

              {{Form::select('web_page', ['part1' => __('part1'),
               'part2' => __('part2'),
               'part3' => __('part3'),
               'part4' =>  __('part4 '),
               'part5' =>__('part5'),
               'part6' => __('part6'),
               'part7' => __('part7'),
              ],$data->web_page ,['class' => 'browser-default custom-select'])}}
          </div>
      </div>

    <div class="form-group">
        <label class="col-md-4">@lang("Title")</label>
        <div class="col-md-8">
            <input type="text" name="title" value="{{ $data->title }}" class="form-control input-lg"  />
        </div>
    </div>



	<div class="form-group">
		<label class="col-md-4">@lang("Description")</label>
		<div class="col-md-8">
			<input type="text" name="description" value="{{ $data->description }}" class="form-control input-lg"  />

		</div>
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
	</div>
	<br />
	<div class="form-group">
		<input type="submit" name="edit" class="btn btn-primary input-lg"/>
	</div>
</form>




@endsection




