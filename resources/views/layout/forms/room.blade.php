@if(isset($model_id))
    {{ $title }}
    <p class="minitext text-center"> {!! trans('sovpal.forms.UpdateRoom_message') !!} </p>
@else
    <h4 class="form-heading text-center"> {{ trans('sovpal.forms.CreateRoom') }} </h4>
    <p class="minitext text-center"> {!! trans('sovpal.forms.CreateRoom_message') !!} </p>
@endif



<div class="col-md-12 form-horizontal">
  <div class="form-group carousel slide text-center" id="carousel-example-generic" data-ride="carousel">

  <ol class="carousel-indicators">
   @foreach($tagrooms as $tag_room)
      <li data-target="#carousel-example-generic" data-slide-to="{{$tag_room->id}}" class="{{ $tag_room->id == 39 ? 'active' : '' }}"></li>
   @endforeach
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    @foreach($tagrooms as $tag_room)
        <div class="cc-selector item {{$tag_room->id == 39 ? 'active' : '' }}">
          <input autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" type="radio" id="{{ $tag_room->name }}" name="room" value="{{$tag_room->id}}" checked="{{ (old('room')==$tag_room->id) ? 'checked' : '' }}">
          <label for="{{ $tag_room->name }}" class="drinkcard-cc {{ $tag_room->name }}"></label>
          <div class="carousel-caption"></div>
            <h3>{{ trans('sovpal.room'.$tag_room->id) }}</h3>
            <p>{{ trans('sovpal.room_description'.$tag_room->id) }}</p>
        </div>
    @endforeach
  </div>

  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="fa fa-arrow-left" aria-hidden="true"></span>
    <span class="sr-only">{{trans('sovpal.Previous')}}</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="fa fa-arrow-right" aria-hidden="true"></span>
    <span class="sr-only">{{trans('sovpal.Next')}}</span>
  </a>

  </div>
</div>
