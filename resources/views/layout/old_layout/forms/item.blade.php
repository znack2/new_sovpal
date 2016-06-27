@if(!isset($item))
  <h4 class="form-heading text-center"> {{ trans('sovpal.forms.AddItem') }} </h4>
  <p class="size12 text-center"> {!! trans('sovpal.forms.AddItem_message') !!} </p>
@else
  <h4 class="form-heading text-center"> {{ trans('sovpal.forms.ChangeItem')}} <br> {{ $item->title }}</h4>
  <p class="size12 text-center"> {!! trans('sovpal.forms.ChangeItem_message') !!} </p>
@endif

<div class="col-sm-12 form-horizontal">

      {{-- image --}}

      <div class="form-group">
        <div class="cc-selector {{ (isset($item) ? 'image_upload' : 'image_upload') }}">
            <input id="image{{ (isset($item) ? $item->id : '')  }}" class="field" name="image{{ (isset($item) ? $item->id : '') }}" type="file" style="display:none;" accept="image/*"  capture="camera">
              <label for="image{{ (isset($item) ? $item->id : '')  }}" class="drinkcard-cc image{{ (isset($item) ? $item->id : '')  }}">
                  @if(isset($item))
                      <img id="image_upload_preview" src="{{ asset('assets/images/items/'.$item->getImage('item')) }}" class="img-responsive" style="cursor: pointer;" alt="your image"/>
                  @else
                      <img id="image_upload_preview" src="{{ asset('assets/images/icons/forms/upload.png') }}" class="img-responsive" style="margin: 0 auto;cursor: pointer;" alt="your image"/>
                  @endif
              </label>
              <h3 class="size16 white_c bold text-center">{{ trans('sovpal.AddImage') }}</h3>
        </div>
        {{$errors->first('image'.(isset($item) ? $item->id : ''), '<li class="error">:message</li>')}}
      </div>

       

      @if(Request::input('type') == 'tools')
          <input type="hidden" name="type" class="form-control" value="tool" />
          <div class="form-group">
         
              <ul class="row cc-selector list-inline text-center">

                @foreach($item_conditions as $condition)
                     <li class="col-sm-3 text-center">
                        <input id="{{ $condition }}" type="radio" name="condition{{ (isset($item) ? $item->id : '') }}" value="{{ $condition }}" 
                        {{ $data->condition == $condition ? 'checked' : '' }}/>
                        <label class="drinkcard-cc {{ $condition }}" for="{{ $condition }}"></label>
                        <div class="clearfix"></div>
                        <span class="size14">{{ trans('sovpal.forms.'.$condition) }}</span>
                      </li>
                  @endforeach

              </ul>

              </div>
      @elseif(Request::input('type') == 'materials')  
          <input type="hidden" name="type" class="form-control" value="material" />
          <div class="form-group {{ $errors->has('qty'.(isset($item) ? $item->id : '')) ? 'has-error has-feedback' : '' }}">
              <label for="qty{{ isset($item) ? $item->id : '' }}" class="col-sm-12">{{ trans('sovpal.forms.Qty') }}</label>
              <div class="col-sm-12">
                  <input type="number" name="qty{{ isset($item) ? $item->id : '' }}" class="form-control" 
                  placeholder="{{ old( 'qty'.(isset($item) ? $item->id : ''), (isset($item)) ? $item->qty : '' ) }}">
                  {{ $errors->has('qty'.(isset($item) ? $item->id : '')) ? '<span class="fa fa-remove form-control-feedback"></span>' : '' }} 
                  {{ $errors->first('qty'.(isset($item) ? $item->id : ''), '<li class="error">:message</li>')}}
              </div>
          </div>
      @else
          <input type="hidden" name="type" class="form-control" value="item" />
          <div class="form-group {{ $errors->has('default_price'.(isset($item) ? $item->id : '')) ? 'has-error has-feedback' : '' }}">
              <label for="default_price{{ isset($item) ? $item->id : '' }}" class="col-sm-12">{{ trans('sovpal.forms.defaultPrice') }}</label>
              <div class="col-sm-12">
                  <input type="number" name="default_price{{ isset($item) ? $item->id : '' }}" class="form-control" 
                  placeholder="{{ old( 'default_price'.(isset($item) ? $item->id : ''), (isset($item)) ? $item -> default_price : '' ) }}">
                  {{ $errors->has('default_price'.(isset($item) ? $item->id : '')) ? '<span class="fa fa-remove form-control-feedback"></span>' : '' }} 
                  {{ $errors->first('default_price'.(isset($item) ? $item->id : ''), '<li class="error">:message</li>')}}
              </div>
          </div>
      @endif

      {{---- category/element --}}

      <div class="form-group">
            <label for="category{{ isset($item) ? $item->id : '' }}" class="col-sm-12">{{ trans('sovpal.forms.ChooseCategory') }}</label>
            <div class="col-sm-6">
              <select id="category_select{{ isset($item) ? $item->id : '' }}" class="form-control" name="category{{ (isset($item) ? $item->id : '') }}">
                  <option>{{  (isset($item) ? trans('tags.'.$item->getTag('category'))  : trans('sovpal.forms.SelectCategory'))  }}</option>

                    @if(Request::input('type') == 'items')
                        @foreach($tagcategories as $tag)
                        <option value="{{$tag->id}}" {{ (old('category'.(isset($item) ? $item->id : ''))==$tag->id) ? selected : ''}}>
                        {{trans('tags.'.$tag->name)}}</option>
                        @endforeach
                    @elseif(Request::input('type') == 'tools')
                        @foreach($tagtools as $tag)
                        <option value="{{$tag->id}}" {{ (old('category'.(isset($item) ? $item->id : ''))==$tag->id) ? selected : ''}}>
                        {{trans('tags.'.$tag->name)}}</option>
                        @endforeach
                    @elseif(Request::input('type') == 'materials')
                        @foreach($tagworks as $tag)
                        <option value="{{$tag->id}}" {{ (old('category'.(isset($item) ? $item->id : ''))==$tag->id) ? selected : ''}}>
                        {{trans('tags.'.$tag->name)}}</option>
                        @endforeach
                    @endif  

              </select>
            </div>

           <div class="col-sm-6">
               <select id="element_select{{ isset($item) ? $item->id : '' }}" class="form-control" name="element{{ isset($item) ? $item->id : '' }}"></select>

               {{-- Request::input('type') == 'items/tools/materials'

                  <option>{{  (isset($item) ? trans('tags.'.$item->element->name)  : trans('sovpal.forms.SelectElement'))  }}</option>
                      @foreach($item_elements/$tool_elements/$material_elements as $element_id => $element_name)
                        <option value="{{$element_id}}" {{ old('element'.(isset($item) ? $item->id : ''))==$element_id ? selected : ''}}>
                        {{trans('tags.'.$element_name)}}</option>
                      @endforeach --}}

               {{$errors->first('category'.(isset($item) ? $item->id : ''), '<li class="error">:message</li>')}}
               {{$errors->first('element'.(isset($item) ? $item->id : '') , '<li class="error">:message</li>')}}
           </div>
      </div>

      {{-- title and conditions --}}

      <div class="form-group {{ $errors->has('title'.(isset($item) ? $item->id : '')) ? 'has-error has-feedback' : '' }}">
          <label for="title{{ isset($item) ? $item->id : '' }}" class="col-sm-12">{{ trans('sovpal.forms.title') }}</label>
          <div class="col-sm-12">
              <input type="text" name="title{{ isset($item) ? $item->id : '' }}" class="form-control" 
              placeholder="{{ old( 'title'.(isset($item) ? $item->id : ''), (isset($item)) ? $item->title : trans('sovpal.put here some title')) }}">
              {{ $errors->has('title'.(isset($item) ? $item->id : '')) ? '<span class="fa fa-remove form-control-feedback"></span>' : '' }} 
              {{ $errors->first('title'.(isset($item) ? $item->id : ''), '<li class="error">:message</li>')}}
          </div>
      </div>

      <div class="form-group {{ $errors->has('order_condition'.(isset($item) ? $item->id : '')) ? 'has-error has-feedback' : '' }}">
          <label for="order_condition{{ isset($item) ? $item->id : '' }}" class="col-sm-12">{{ trans('sovpal.forms.orderCondition') }}</label>
          <div class="col-sm-12">
              <textarea class="form-control" id="order_condition{{ isset($item) ? $item->id : '' }}" name="order_condition{{ (isset($item) ? $item->id : '') }}" rows="5" placeholder="{{ old( 'order_condition'.(isset($item) ? $item->id : ''), (isset($item)) ? $item->order_condition : trans('sovpal.put here some conditional order') ) }}"></textarea>
              {{ $errors->has('order_condition'.(isset($item) ? $item->id : '')) ? '<span class="fa fa-remove form-control-feedback"></span>' : '' }} 
              {{ $errors->first('order_condition'.(isset($item) ? $item->id : ''), '<li class="error">:message</li>')}}
          </div>
      </div>

      {{---- description --}}

      @if(Request::input('type') == 'items') 
        <div class="form-group {{ $errors->has('description'.(isset($item) ? $item->id : '')) ? 'has-error has-feedback' : '' }}">
            <label for="description{{ isset($item) ? $item->id : '' }}" class="col-sm-12">{{ trans('sovpal.forms.Description') }}</label>
            <div class="col-sm-12">
            <textarea class="form-control" id="description" name="description{{ isset($item) ? $item->id : '' }}" cols="30" rows="9" 
            placeholder="{{ old( 'description'.(isset($item) ? $item->id : ''), (isset($item)) ? $item->description : '' ) }}"></textarea>
            {{ $errors->has('description'.(isset($item) ? $item->id : '')) ? '<span class="fa fa-remove form-control-feedback"></span>' : '' }} 
            {{ $errors->first('description'.(isset($item) ? $item->id : ''), '<li class="error">:message</li>')}}
            </div>
        </div>
      @endif  


      {{-- free--}}

      <div class="form-group">
          <div class="col-xs-12 cc-selector list-inline">
              @if(Request::input('type') == 'materials' || Request::input('type') == 'tools')
                  <div class="col-xs-2 text-center">
                       <input class="css-checkbox" id="private" type="checkbox" name="private{{ (isset($item) ? $item->id : '')  }}" 
                        {{ isset($item) && $item->private ? 'checked' : '' }}/>
                       <label class="css-label dark-plus-cyan" for="private{{ (isset($item) ? $item->id : '')  }}"></label>
                  </div>
                  <span class="col-xs-10 size14">{{trans('sovpal.forms.Free?')}}</span>
              @else
                  <div class="col-xs-2 text-center">
                      <input class="css-checkbox" id="private" type="checkbox" name="private{{ (isset($item) ? $item->id : '')  }}" 
                       {{ isset($item) && $item->private ? 'checked' : '' }}/>
                      <label class="css-label dark-plus-cyan" for="private{{ (isset($item) ? $item->id : '')  }}"></label>
                  </div>
                  <span class="col-xs-10 size14">{{trans('sovpal.forms.Private?')}}</span>
              @endif 
          </div>
      </div>

</div>


{{--<label class="drinkcard-cc private" for="private{{ (isset($item) ? $item->id : '')  }}">
    <input id="private" type="checkbox" name="private{{ (isset($item) ? $item->id : '')  }}" 
     {{ isset($item) && $item->private ? 'checked' : '' }}/>
     </label> --}}

 {{--<label class="drinkcard-cc free" for="free{{ (isset($item) ? $item->id : '')  }}">
     <input id="free" type="checkbox" name="free{{ (isset($item) ? $item->id : '')  }}" 
     {{ isset($item) && $item->free ? 'checked' : '' }}/> </label> --}}


