
@if(!isset($remove)) 
        <h4 class="form-heading text-center"> {{ trans('sovpal.forms.AddItem') }} </h4>
        <p class="minitext text-center"> {!! trans('sovpal.forms.AddItem_message') !!} </p>

    @if($item->type == 'tool')
        {{-- for how long user wanna take tool --}}
    @elseif($item->type == 'material')    
        {{-- how many user wanna take --}}
    @endif

@else
        <h4 class="form-heading text-center"> {{ trans('sovpal.forms.RemoveItem') }} </h4> 
        <p class="minitext text-center"> {!! trans('sovpal.forms.RemoveItem_message') !!} </p> 
@endif

{{-- 
@if($item->type == 'item')

    @if(isset($myRooms))
        <div class="col-md-12">
            <label for="room" class="col-sm-4 control-label">{{ trans('sovpal.forms.ChooseRoom') }}</label>
            <div class="col-sm-8">
                <select class="form-control" name="room">
                    <option>{{ trans('sovpal.forms.SelectRoom') }}</option>
                          @foreach($myRooms as $room)
                            <option value="{{$room->id}}">{{ trans('tags.'.$room->getTag('room')) }}</option>
                          @endforeach
                </select>
                {{$errors->first('room' ,'<li class="error">:message</li>')}}
            </div>
        </div>
    @endif

    <a href="#hidden_panel" class="col-md-offset-8 col-md-5 link" data-toggle="collapse" ><h5>{{ trans('sovpal.forms.CreateNewRoom') }}</h5></a>
 --}}
{{--     <div id="hidden_panel" class="collapse col-md-12 form-group">
        <label for="new_room" class="col-sm-4 control-label">{{ trans('sovpal.forms.ChooseType') }}</label>
        <div class="col-sm-8">
            <select class="form-control" name="new_room">
                <option>{{ trans('sovpal.forms.SelectRoom') }}</option>
                      @foreach($rooms as $room)
                        <option value="{{$room->id}}">{{ trans('tags.'.$room->getTag('room'))}}</option>
                      @endforeach
            </select>
            {{$errors->first('new_room' ,'<li class="error">:message</li>')}}
        </div>
    </div> --}}

{{-- @endif --}}

