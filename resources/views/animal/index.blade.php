@extends('layouts.User')

@section('header')

@endsection
@section('content')

<div class="container-fluid">
 <h1> <i class="fas fa-dog"></i> @lang("Dogs")</h1>
 <hr>
<div>

</div>
<div class="row">

@foreach($data as $row)
<div class="col-md-4">
      <div class="card card-info  card-outline">
          <div class="card-header">
            <h3 class="card-title">
            <label>@lang("Dog") : {{__($row->name)}}  </label>
            </h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
            </div>
            </div>
          <div class="card-body">
                  <label>@lang("Dog Name") : {{__($row->name)}}  </label><br>
                  <label>@lang("Dog Food Type") : {{__($row->AnimalFoodType->name)}}  </label><br>
                  <label>@lang("Dog Family") : {{__($row->AnimalFamily->name)}}  </label><br>
                  <label>@lang("Dog Motion Type") : {{__($row->AnimalMotion->name)}}  </label><br>
                  <label>@lang("Dog Age Type") : {{__($row->AnimalType->name)}}  </label><br>
                  <label>@lang("Dog Age") : {{__($row->age)}}  </label><br>
                  <label>@lang("Dog Wight") : {{__($row->wight)}}  </label><br>
                  @if($row->gebelik)
                  <label>@lang("Dog Pregnancy") : {{__($row->gebelik)}}  </label><br>
                  @endif
                   @if($row->dogum)
                  <label>@lang("Dog Birth") : {{__($row->dogum)}}  </label><br>
                   @endif
                   @if($row->child_n)
                  <label>@lang("Dog's Children") : {{__($row->child_n +$row->child_m )}}  </label><br>
                   @endif
            </div>
          <div class="card-footer text-center">
            <form action="{{ route('animal.destroy', $row->id) }}" method="post">
            <a href="{{ route('animal.edit', $row->id) }}" class="btn btn-warning">@lang("Edit")</a>
              @csrf
               @method('DELETE')
                <button type="submit" class="btn btn-danger">@lang("Delete")</button>
                 </form>

        </div>
        </div>
</div>

	@endforeach
</div>

<a href="{{ URL::to('animal/create') }}" class="btn btn-primary">@lang("Add New Dog")</a>
<br><br>
@endsection
