<h4 class="form-heading text-center"> {{ trans('sovpal.forms.CreateGroup') }} </h4>
<p class="size12 text-center"> {!! trans('sovpal.forms.CreateGroup_message') !!} </p>
<hr>

<div class="col-md-12 form-horizontal">

    <div class="form-group {{ $errors->has('item'.$group->id or '') ? 'has-error has-feedback' : '' }}">
      <label for="item{{ $group->id or '' }}" class="col-sm-4 control-label">{{ trans('sovpal.forms.ChooseItem') }}</label>
        <div class="col-sm-8">
            <select class="form-control" name="item{{ $group->id or '' }}">
                 <option>{{ trans('sovpal.forms.SelectItem') }}</option>
                      @foreach($data->items()->get() as $item)
                            <option value="{{$item->id}}" {{ (old('item'.$group->id or '')==$item->id) ? selected : ''}}>
                            {{$item->title}}</option>
                      @endforeach
            </select>
            {{ $errors->has('item'.$group->id or '') ? ' <span class="fa fa-remove form-control-feedback"></span>' : '' }}
            {{ $errors->first('item'.$group->id or '') ,'<li class="error">:message</li>')}}
        </div>
    </div>

    <div class="form-group">
      <label for="user_need{{ $group->id or '' }}" class="col-sm-4 control-label">{{trans('sovpal.forms.UserCount')}}:</label>

      <ul class="col-sm-8 cc-selector list-inline">
         
         @foreach($group_user_needs as $user_number)
            <li class="col-xs-3 text-center">
                <input autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false"
                id="count{{ $user_number }}" type="radio" name="user_need{{ $group->id or '' }}" value="{{ $user_number }}"
                {{ isset($group->user_need) && $group->user_need == $user_number ? 'checked' : '' }}/>
                <label class="drinkcard-cc count{{ $user_number }}" for="count{{ $user_number }}"></label>
                <div class="clearfix"></div>
                <span class="size14">{{ $user_number }}</span>
            </li>
          @endforeach

      </ul>
    </div>

    <div class="form-group">
      <label for="count{{ $group->id or '' }}" class="col-sm-4 control-label">{{trans('sovpal.forms.Expire')}}:</label>

      <ul class="col-sm-8 cc-selector list-inline">

          @foreach($group_expires as $expire_number)
              <li class="col-xs-3 text-center">
                <input autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false"
                id="count{{ $expire_number }}" type="radio" name="expire{{ $group->id or '' }}" value="{{ $expire_number }}"
                {{ isset($group->expires) && $group->expires == $expire_number ? 'checked' : '' }}/>
                <label class="drinkcard-cc count{{ $expire_number }}" for="count{{ $expire_number }}"></label>
                <div class="clearfix"></div>
                <span class="size14">{{ $expire_number }} weeks</span>
              </li>
          @endforeach

      </ul>
    </div>

    <div class="form-group {{ $errors->has('price'.$group->id or '') ? 'has-error has-feedback' : ''}}">
        <label for="price{{ $group->id or '' }}" class="col-sm-4 control-label">{{ trans('sovpal.price') }}</label>
        <div class="col-sm-8">

          <input autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" type="number" name="price{{ $group->id or '' }}" class="form-control input-box"
              value="1" min="0" max="100000" placeholder="{{ old( 'price'. $group->id or '', $group->price or '' ) }}"{{ isset($group) ? '' : 'required' }}>

          {{ $errors->has('price'.$group->id or '') ? ' <span class="fa fa-remove form-control-feedback"></span>' : '' }}
          {{$errors->first('price'. $group->id or ''),'<li class="error">:message</li>')}}

        </div>
    </div>

</div>



{{-- <div class="btn-group number-spinner ">
<span class="input-prepend data-dwn">
  <button class="btn btn-default" data-dir="dwn"><i class="fa_icon icon-minus"></i></button>
</span>
<span class="input-append data-up">
    <button class="btn btn-default" data-dir="up"><i class="fa_icon icon-plus"></i></button>
</span>
</div> --}}


