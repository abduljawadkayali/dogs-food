@extends('layouts.User')

@section('header')

@endsection
@section('content')

<div class="container-fluid">
 <h1> <i class="fas fa-bone"></i> @lang("Mixture")</h1>
 <hr>
<div>

</div>
<div class="row">

@foreach($Karma as $row)
<div class="col-md-4">
      <div class="card card-danger  card-outline">
          <div class="card-header">
            <h3 class="card-title">
            <label>@lang("Mixture") : {{__($row->name)}}  </label>
            </h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
            </div>
            </div>
            @php
            $KarmaFoods = $row->KarmaFood()->get();
            @endphp
          <div class="card-body">
            @foreach($KarmaFoods as $KarmaFood)
                <div class="col-md-12">
                   <label>@lang("Food") : {{__($KarmaFood->Food->name)}}  </label></br>
                   <label>@lang("Food Amount") : {{__($KarmaFood->food_amount)}}  </label>
                   <hr>
                 </div>
              @endforeach
            </div>
          <div class="card-footer text-center">
            <form action="{{ route('karma.destroy', $row->id) }}" method="post">
            <a href="{{ route('karma.edit', $row->id) }}" class="btn btn-warning">@lang("Edit")</a>
              @csrf
               @method('DELETE')
                <button type="submit" class="btn btn-danger">@lang("Delete")</button>
                 </form>

        </div>
        </div>
</div>

	@endforeach
</div>

<a href="{{ URL::to('karma/create') }}" class="btn btn-primary">@lang("Create New Mixture")</a>
<br><br>
@endsection
