@extends('layouts.User')

@section('header')

@endsection
@section('content')

    <div class="container-fluid">
        <h1> <i class="fas fa-plus"></i> @lang("Add New Dog")</h1>


			<hr>
			 {{ Form::open(array('url' => 'animal', 'method' => 'POST', 'files' => true))}}
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="food"> @lang("Dog Name")</label>
                    <br>

                    {{ Form::text('name', null, array('class' => 'form-control')) }}
                </div>
            </div>



        </div>
        <div class="row">
                <div class="col-md-3">
            <div class="form-group">
                <label for="animal_food_type_id">@lang("Select Dog Food Type")</label>
                <select  name="animal_food_type_id" class="form-control">
                    <option value="">@lang("--- Select Dog Food Type ---")</option>

                    @foreach ($AnimalFoodType as $key => $value)

                        <option value="{{ $value->id }}">{{ __($value->name) }}</option>

                    @endforeach
                </select>
            </div>
                </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="animal_type_id">@lang("Select Dog Age Type")</label>
                    <select name="animal_type_id" class="form-control">
                        <option value="">@lang("--- Select Dog Age Type ---")</option>

                        @foreach ($AnimalType as $key => $value)

                            <option value="{{ $value->id }}">{{ __($value->name) }}</option>

                        @endforeach
                    </select>
                </div>
            </div>




            <div class="col-md-3">
                <div class="form-group">
                    <label for="animal_motion_id">@lang("Select Dog Motion Type")</label>
                    <select name="animal_motion_id" class="form-control">
                        <option value="">@lang("--- Select Dog Motion Type ---")</option>

                        @foreach ($AnimalMotion as $key => $value)

                            <option value="{{ $value->id }}">{{ __($value->name) }}</option>

                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="animal_family_id">@lang("Select Dog Family")</label>
                    <select name="animal_family_id" class="form-control">
                        <option value="">@lang("--- Select Dog Family ---")</option>

                        @foreach ($AnimalFamily as $key => $value)

                            <option value="{{ $value->id }}">{{ __($value->name) }}</option>

                        @endforeach
                    </select>
                </div>
            </div>


            <div class="col-md-3">
                <div class="form-group">
                    <label for="age"> @lang("Dog Age"):(@lang("Week/Young-Year/Others"))</label>
                    <br>

                    {{ Form::number('age', null, array('class' => 'form-control')) }}
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="wight"> @lang("Dog Wight")</label>
                    <br>

                    {{ Form::number('wight', null, array('class' => 'form-control')) }}
                </div>
            </div>



            <div id="gebelik" style="visibility: hidden;"  class="col-md-3">
                <div class="form-group">
                    <label for="gebelik"> @lang("Dog Pregnancy"): (@lang("If Exist"))</label>
                    <br>

                    {{ Form::number('gebelik', null, array('class' => 'form-control')) }}
                </div>
            </div>


            <div class="col-md-3">
                <label id="header"> </label><br>
                <label id="ortalama"> </label><br>
                <label id="az"></label><br>
                <label id="cok"></label>

            </div>

            <div id="dogum" style="visibility: hidden;" class="col-md-3">
                <div  class="form-group">
                    <label for="dogum"> @lang("Dog Birth") : (@lang("If Exist"))</label>
                    <br>

                    {{ Form::number('dogum', null, array('class' => 'form-control')) }}
                </div>
            </div>

            <div id="child" style="visibility: hidden;" class="col-md-3">
                <div  class="form-group">
                    <label for="child" > @lang("Dog's Children") : (@lang("If Exist"))</label>
                    <br>

                    {{ Form::number('child', null, array('class' => 'form-control')) }}
                </div>
            </div>

        </div>
        <div class="row">
        <div class="col-md-3">
            {{Form::submit(__('Add'), array('class' => 'btn btn-primary')) }}
            {{ Form::close() }}
         </div>
        </div>
    </div>


    <script>
        jQuery(document).ready(function ()
        {
            jQuery('select[name="animal_family_id"]').on('change',function(){
                var animal_family_id = jQuery(this).val();
                jQuery.ajax({
                    url : '/animalFamily/' +animal_family_id,
                    type : "GET",
                    dataType : "json",
                    success:function(data)
                    {

                        document.getElementById('header').innerHTML = 'Irkın Ergin Canlı Ağırlık Biligisi ';
                        document.getElementById('ortalama').innerHTML = '@lang(" Ortalama ağırlık ")' + data[0][0]['average'] + ' kg ';
                        document.getElementById('az').innerHTML = '@lang(" En Az ")' + data[0][0]['min'] + ' kg ';
                        document.getElementById('cok').innerHTML = '@lang(" En çok ")' + data[0][0]['max'] + ' kg ';
                        console.log(data) ;


                    }
                });
            });
        });


        jQuery(document).ready(function ()
        {
            jQuery('select[name="animal_type_id"]').on('change',function(){
                var animal_family_id = jQuery(this).val();

                if (animal_family_id == 3)
                {
                    document.getElementById("gebelik").style.visibility =  "visible";
                    document.getElementById("dogum").style.visibility =  "hidden";
                    document.getElementById("child").style.visibility =  "hidden";
                }
                else if (animal_family_id == 4)
                {
                    document.getElementById("gebelik").style.visibility =  "hidden";
                    document.getElementById("dogum").style.visibility =  "visible";
                    document.getElementById("child").style.visibility =  "visible";
                }
                else
                {
                    document.getElementById("gebelik").style.visibility =  "hidden";
                    document.getElementById("dogum").style.visibility =  "hidden";
                    document.getElementById("child").style.visibility =  "hidden";
                }
            });

            });
    </script>
@endsection


