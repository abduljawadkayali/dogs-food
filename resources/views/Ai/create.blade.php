@extends('layouts.User')

@section('header')

@endsection
@section('content')

    <div class="container-fluid">
        <h1> <i class="fas fa-plus"></i> @lang("Make an Ai Solution")</h1>


			<hr>
			 {{ Form::open(array('url' => 'Ai', 'method' => 'POST', 'files' => true))}}
        <div class="row">
            <div class="col-md-6">
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
            @foreach ($Food as $row)
            <div class="col-md-3">
            <div class="form-group">
                <label for="food_specific_id">@lang("Max Amount "):{{__($row->name)}} </label>
                {{ Form::number('food[]', null, ['class' => 'form-control','step'=>'any']) }}
                {{ Form::hidden('food_id[]', $row->id, array('class' => 'form-control')) }}
            </div>
            </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
            {{Form::submit(__('Find'), array('class' => 'btn btn-primary')) }}
            {{ Form::close() }}
                </div>

         </div>
        </div>
    </div>

@endsection


