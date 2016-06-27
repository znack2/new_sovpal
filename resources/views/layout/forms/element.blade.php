<h4 class="size18 bold text-center"> {{ trans('sovpal.forms.CreateElement') }} </h4>
<p class="size14 text-center"> {!! trans('sovpal.forms.CreateElement_message') !!} </p>

<div class="col-md-12 form-horizontal">
  <div class="form-group carousel slide text-center" id="carousel-example-generic2" data-ride="carousel">

  <ol class="carousel-indicators">
   @foreach($elements as $element)
      <li data-target="#carousel-example-generic2" data-slide-to="{{$element->id}}" class="{{ $element->id == 39 ? 'active' : '' }}"></li>
   @endforeach
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    @foreach($elements as $element)
        <div class="cc-selector item {{$element->id == 39 ? 'active' : '' }}">
          <input autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" type="radio" id="{{ $element->name }}" name="room"
          value="{{$element->id}}" checked="{{ (old('room')==$element->id) ? 'checked' : '' }}">
          <label for="{{ $element->name }}" class="drinkcard-cc {{ $element->name }}"></label>
          <div class="carousel-caption"></div>
            <h3>{{ trans('tags.'.$element->name )}}</h3>
            <p>{{ trans('sovpal.room_description'.$element->id) }}</p>
        </div>
    @endforeach
  </div>

  <a class="left carousel-control" href="#carousel-example-generic2" role="button" data-slide="prev">
    <span class="fa fa-arrow-left" aria-hidden="true"></span>
    <span class="sr-only">{{trans('sovpal.Previous')}}</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic2" role="button" data-slide="next">
    <span class="fa fa-arrow-right" aria-hidden="true"></span>
    <span class="sr-only">{{trans('sovpal.Next')}}</span>
  </a>

  </div>
</div>


{{-- MULTIPLE --}}
{{--<select name="groups[]" multiple>--}}
  