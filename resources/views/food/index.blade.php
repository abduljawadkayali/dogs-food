@extends('layouts.User')

@section('header')

@endsection
@section('content')

<div class="container-fluid">
 <h1> <i class="fas fa-bone"></i> @lang("Food")</h1>
 <hr>
<div>

</div>
@foreach($data as $row)
      <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">
            <label>@lang("Food") : {{$row->name}}  </label> |
            <label >@lang("Food Group") : {{$row->FoodGroup->name}}</label>
            </h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
            </div>
            </div>

          <div class="card-body">
            <div class="row">
            @foreach($foodRelations as $foodRelation)
              @if($foodRelation->food_id == $row->id)
                <div class="col-md-3">
                    {{$foodRelation->FoodSpecific->name}} : {{$foodRelation->specific_value}}
                 </div>
               @endif
              @endforeach
            </div>
              </div>
          <div class="card-footer text-center">
            <form action="{{ route('food.destroy', $row->id) }}" method="post">
            <a href="{{ route('food.edit', $row->id) }}" class="btn btn-warning">@lang("Edit")</a>
              @csrf
               @method('DELETE')
                <button type="submit" class="btn btn-danger">@lang("Delete")</button>
                 </form>

        </div>
</div>

	@endforeach

<a href="{{ URL::to('food/create') }}" class="btn btn-success">@lang("Add Food")</a>
<br><br>
@endsection
