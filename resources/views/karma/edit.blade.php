@extends('layouts.User')

@section('header')
@endsection
@section('content')

<h1><i class="fa fa-edit"> </i> @lang("Edit Mixture")</h1>
<hr>

<form method="post" action="{{ route('karma.update', $data->id) }}" enctype="multipart/form-data">

    @csrf
    @method('PATCH')
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="karma"> @lang("Mixture Name")</label>
                <br>

                {{ Form::text('name', $data->name, array('class' => 'form-control')) }}
            </div>
        </div>
    </div>

        @php
            $KarmaFoods = $data->KarmaFood()->get();
            $k= 0;
        @endphp

    <div class="row">
        @foreach ($Food as $row)
            <div class="col-md-3">
                @if($KarmaFoods[$k]->food_id == $row->id)
                    <div class="form-group">
                        <label for="food_specific_id">@lang("Food")  : {{__($row->name)}} </label>
                        {{ Form::number('food[]', $KarmaFoods[$k]->food_amount, ['class' => 'form-control','step'=>'any']) }}
                        {{ Form::hidden('food_id[]', $row->id, array('class' => 'form-control')) }}
                        @php
                            $k= $k+1;
                        @endphp
                    </div>
                @elseif($KarmaFoods[$k]->food_id != $row->id)
                    <div class="form-group">
                        <label for="food_specific_id">@lang("Food")  : {{__($row->name)}} </label>
                        {{ Form::number('food[]', null, array('class' => 'form-control')) }}
                        {{ Form::hidden('food_id[]', $row->id, array('class' => 'form-control')) }}
                    </div>
                @endif
            </div>
        @endforeach
    </div>
    <div class="form-group">
        <a href="{{ URL::previous() }}" class="btn btn-warning">@lang("Back")</a>

        <input type="submit" name="edit" class="btn btn-primary input-lg"/>
    </div>
</form>


@endsection
