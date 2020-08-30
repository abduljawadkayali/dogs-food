@extends('layouts.User')
@include('include.footer')
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="{!! mix('js/app.js') !!}"> </script>
@section('header')


@endsection
@section('content')

    <div class="container-fluid">
        <h1> <i class="fas fa-plus"></i> @lang("Create New Solution")</h1>


			<hr>
			 {{ Form::open(array('url' => 'solution', 'method' => 'POST'))}}
        <div class="row">
            <div class="col-md-4">
        <div class="form-group">
            <label >@lang("Solution Name")</label>


            {{ Form::text('name', null, array('class' => 'form-control')) }}

        </div>
        </div>
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="animal_id">@lang("Select Dog")</label>
                    <select name="animal_id" class="form-control">
                        <option value="">@lang("--- Select Dog ---")</option>

                        @foreach ($Animal as $key => $value)

                            <option value="{{ $value->id }}">{{ __($value->name) }}</option>

                        @endforeach
                    </select>
                </div>
            </div>
        </div>


        <div class="row">

            <div class="col-md-6">
                <div class="form-group">
                    <label for="karma_id">@lang("Select Mixture")</label>
                    <select name="karma_id" class="form-control">
                        <option value="">@lang("--- Select Mixture ---")</option>

                        @foreach ($Karma as $key => $value)

                            <option value="{{ $value->id }}">{{ __($value->name) }}</option>

                        @endforeach
                    </select>
                </div>
            </div>



        </div>
        <div class="row">
        <div class="col-md-3">
            {{Form::submit(__('Make Solution'), array('class' => 'btn btn-primary')) }}
            {{ Form::close() }}
         </div>
        </div>
    </div>


    <div class="form-group">
        <label for="branch">@lang("Select branch:")</label>
        <select name="branch" class="form-control">
            <option>@lang("--branch--")</option>
        </select>
    </div>



    <script type="text/javascript">
        jQuery(document).ready(function ()
        {
            jQuery('select[name="animal_id"]').on('change',function(){
                var animalID = jQuery(this).val();

                if(animalID)
                {
                    jQuery.ajax({
                        url : '/solutions/getAnimal/' +animalID,
                        type : "GET",
                        dataType : "json",
                        success:function(data)
                        {

                            console.log(data);
                            jQuery('select[name="branch"]').empty();
                            jQuery.each(data, function(key,value){
                                jQuery.each(value, function(id,name){
                                    $('select[name="branch"]').append('<option value="'+ id +'">'+ name +'</option>');
                                });
                            });
                        }
                    });


                }
                else
                {

                    $('select[name="branch"]').empty();
                }
            });
        });
    </script>
@endsection


