 <form class="text-center" action="{{ route('room.change',['user' => $currentUser->id,'room'=>$room->id]) }}" 
 method="POST" accept-charset="UTF-8" enctype="multipart/form-data">

     <div class="col-md-12 form-horizontal">

     <div class="form-group">
      {!! csrf_field() !!}

      <div class="col-sm-2">
        {{-- <label for="start_remont" class="control-label">{{ trans('sovpal.forms.startRemont') }}</label> --}}
        {{-- {{ (old('start_remont')) ? old('start_remont') : '' }} --}}
         <input class="form-control" type="text" name="start_remont" onchange="this.form.submit()"
         placeholder="{{ isset($room) ? $room->start_remont : trans('sovpal.forms.startRemont') }}" >
         {{$errors->first('start_remont' ,'<li class="error">:message</li>')}}    
      </div>

      <div class="col-sm-2">
           {{-- {{ (old('end_remont')) ? old('end_remont') : '' }} --}}
           {{-- <label for="end_remont" class="control-label">{{ trans('sovpal.forms.endRemont') }}</label> --}}
           <input class="form-control" type="text" name="end_remont" onchange="this.form.submit()"
           placeholder="{{ isset($room) ? $room->end_remont : trans('sovpal.forms.endRemont') }}" >
           {{$errors->first('end_remont' ,'<li class="error">:message</li>')}} 
       </div>

      <div class="col-sm-2">
           {{-- {{ (old('area')) ? old('area') : trans('sovpal.area') }} --}}
       {{-- <label for="area" class="col-sm-2 control-label">{{ trans('sovpal.area') }}</label> --}}
           <input class="form-control" type="number" name="area" onchange="this.form.submit()"
           placeholder="{{ isset($room) ? $room->area : trans('sovpal.forms.area') }}" >
           {{$errors->first('area' ,'<li class="error">:message</li>')}} 
       </div>

       <div class="col-sm-3">
           {{-- <label for="style" class="control-label">{{ trans('sovpal.forms.ChooseStyle') }}</label> --}}
           <select class="form-control" name="style" onchange="this.form.submit()">
                <option>{{ trans('sovpal.forms.SelectCategory') }}</option>
                    @foreach($tags['style'] as $tag)
                <option value="{{$tag->id}}" {{ ($room->getTag('style') == $tag->id) ? selected : ''}}>{{trans('tags.'.$tag->name)}}</option>
              @endforeach
           </select>
          {{$errors->first('style' ,'<li class="error">:message</li>')}} 
      </div>

      <div class="col-sm-3">
          {{-- <label for="work" class="control-label">{{ trans('sovpal.forms.ChooseStep') }}</label> --}}
           <select class="form-control" name="work" onchange="this.form.submit()">
                <option>{{ trans('sovpal.forms.SelectStep') }}</option>
                    @foreach($tags['work'] as $tag)
                <option value="{{$tag->id}}" {{ ($room->getTag('work')==$tag->id) ? selected : ''}}>{{trans('tags.'.$tag->name)}}</option>
              @endforeach
           </select>
           {{$errors->first('work' ,'<li class="error">:message</li>')}} 
       </div>

      </div>
    </div>
 </form>





