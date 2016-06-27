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
            <input autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false"
            id="image{{ $item->id or '' }}" class="field" name="image{{ $item->id or '' }}" type="file" style="display:none;" accept="image/*"  capture="camera">
              <label for="image{{ $item->id or ''  }}" class="drinkcard-cc image{{ $item->id or ''  }}">
                  @if(isset($item))
                      <img id="image_upload_preview" src="{{ asset('assets/images/items/'.$item->getImage('item')) }}" class="img-responsive" style="cursor: pointer;" alt="your image"/>
                  @else
                      <img id="image_upload_preview" src="{{ asset('assets/images/icons/forms/upload.png') }}" class="img-responsive" style="margin: 0 auto;cursor: pointer;" alt="your image"/>
                  @endif
              </label>
              <h3 class="size16 white_c bold text-center">{{ trans('sovpal.AddImage') }}</h3>
        </div>
        {{$errors->first('image'.$item->id or '', '<li class="error">:message</li>')}}
      </div>

       

      @if(Request::input('type') == 'tools')
          <input autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" type="hidden" name="type" class="form-control" value="tool" />
          <div class="form-group">
         
              <ul class="row cc-selector list-inline text-center">

                @foreach($item_conditions as $condition)
                     <li class="col-sm-3 text-center">
                        <input autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false"
                        id="{{ $condition }}" type="radio" name="condition{{ $item->id or '' }}" value="{{ $condition }}"
                        {{ $data->condition == $condition ? 'checked' : '' }}/>
                        <label class="drinkcard-cc {{ $condition }}" for="{{ $condition }}"></label>
                        <div class="clearfix"></div>
                        <span class="size14">{{ trans('sovpal.forms.'.$condition) }}</span>
                      </li>
                  @endforeach

              </ul>

              </div>
      @elseif(Request::input('type') == 'materials')  
          <input autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" type="hidden" name="type" class="form-control" value="material" />
          <div class="form-group {{ $errors->has('qty'.$item->id or '') ? 'has-error has-feedback' : '' }}">
              <label for="qty{{ $item->id or '' }}" class="col-sm-12">{{ trans('sovpal.forms.Qty') }}</label>
              <div class="col-sm-12">
                  <input autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" type="number" name="qty{{ $item->id or '' }}" class="form-control"
                  placeholder="{{ old( 'qty'.$item->id or '', $item->qty or ''  }}">
                  {{ $errors->has('qty'.$item->id or '') ? '<span class="fa fa-remove form-control-feedback"></span>' : '' }} 
                  {{ $errors->first('qty'.$item->id or '', '<li class="error">:message</li>')}}
              </div>
          </div>
      @else
          <input autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" type="hidden" name="type" class="form-control" value="item" />
          <div class="form-group {{ $errors->has('default_price'.$item->id or '') ? 'has-error has-feedback' : '' }}">
              <label for="default_price{{ $item->id or '' }}" class="col-sm-12">{{ trans('sovpal.forms.defaultPrice') }}</label>
              <div class="col-sm-12">
                  <input autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" type="number" name="default_price{{ $item->id or '' }}" class="form-control"
                  placeholder="{{ old( 'default_price'.$item->id or '', $item -> default_price or ''  }}">
                  {{ $errors->has('default_price'.$item->id or '') ? '<span class="fa fa-remove form-control-feedback"></span>' : '' }} 
                  {{ $errors->first('default_price'.$item->id or '', '<li class="error">:message</li>')}}
              </div>
          </div>
      @endif

      {{---- category/element --}}

      <div class="form-group">
            <label for="category{{ $item->id or '' }}" class="col-sm-12">{{ trans('sovpal.forms.ChooseCategory') }}</label>
            <div class="col-sm-6">
              <select id="category_select{{ $item->id or '' }}" class="form-control" name="category{{ $item->id or '' }}">
                  <option>{{  (isset($item) ? trans('tags.'.$item->getTag('category'))  : trans('sovpal.forms.SelectCategory'))  }}</option>

                    @if(Request::input('type') == 'items')
                        @foreach($tagcategories as $tag)
                        <option value="{{$tag->id}}" {{ (old('category'.$item->id or '')==$tag->id) ? 'selected' : ''}}>
                        {{trans('tags.'.$tag->name)}}</option>
                        @endforeach
                    @elseif(Request::input('type') == 'tools')
                        @foreach($tagtools as $tag)
                        <option value="{{$tag->id}}" {{ (old('category'.$item->id or '')==$tag->id) ? 'selected' : ''}}>
                        {{trans('tags.'.$tag->name)}}</option>
                        @endforeach
                    @elseif(Request::input('type') == 'materials')
                        @foreach($tagworks as $tag)
                        <option value="{{$tag->id}}" {{ (old('category'.$item->id or '')==$tag->id) ? 'selected' : ''}}>
                        {{trans('tags.'.$tag->name)}}</option>
                        @endforeach
                    @endif  

              </select>
            </div>

           <div class="col-sm-6">
               <select id="element_select{{ $item->id or '' }}" class="form-control" name="element{{ $item->id or '' }}">

                  <option>{{  (isset($item) ? trans('tags.'.$item->element->name)  : trans('sovpal.forms.SelectElement'))  }}</option>
                      @foreach($elements as $element)
                        <option value="{{$element->id}}" {{ old('element'.$item->id or '')==$element->id ? 'selected' : ''}}>
                        {{trans('tags.'.$element->name)}}</option>
                      @endforeach

              </select>

               {{$errors->first('category'.$item->id or '', '<li class="error">:message</li>')}}
               {{$errors->first('element'.$item->id or '' , '<li class="error">:message</li>')}}
           </div>
      </div>

      {{-- title and conditions --}}

      <div class="form-group {{ $errors->has('title'.$item->id or '') ? 'has-error has-feedback' : '' }}">
          <label for="title{{ $item->id or '' }}" class="col-sm-12">{{ trans('sovpal.forms.title') }}</label>
          <div class="col-sm-12">
              <input autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" type="text" name="title{{ $item->id or '' }}" class="form-control"
              placeholder="{{ old( 'title'.$item->id or '', $item->title or trans('sovpal.put here some title')) }}">
              {{ $errors->has('title'.$item->id or '') ? '<span class="fa fa-remove form-control-feedback"></span>' : '' }} 
              {{ $errors->first('title'.$item->id or '', '<li class="error">:message</li>')}}
          </div>
      </div>

      <div class="form-group {{ $errors->has('order_condition'.$item->id or '') ? 'has-error has-feedback' : '' }}">
          <label for="order_condition{{ $item->id or '' }}" class="col-sm-12">{{ trans('sovpal.forms.orderCondition') }}</label>
          <div class="col-sm-12">
              <textarea autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" class="form-control" id="order_condition{{ $item->id or '' }}"
              name="order_condition{{ $item->id or '' }}" rows="5" placeholder="{{ old( 'order_condition'.$item->id or '', (isset($item)) ? $item->order_condition : trans('sovpal.put here some conditional order') ) }}"></textarea>
              {{ $errors->has('order_condition'.$item->id or '') ? '<span class="fa fa-remove form-control-feedback"></span>' : '' }} 
              {{ $errors->first('order_condition'.$item->id or '', '<li class="error">:message</li>')}}
          </div>
      </div>

      {{---- description --}}

      @if(Request::input('type') == 'items') 
        <div class="form-group {{ $errors->has('description'.$item->id or '') ? 'has-error has-feedback' : '' }}">
            <label for="description{{ $item->id or '' }}" class="col-sm-12">{{ trans('sovpal.forms.Description') }}</label>
            <div class="col-sm-12">
            <textarea autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" class="form-control" id="description"
            name="description{{ $item->id or '' }}" cols="30" rows="9"
            placeholder="{{ old( 'description'.$item->id or '', $item->description or '' ) }}"></textarea>
            {{ $errors->has('description'.$item->id or '') ? '<span class="fa fa-remove form-control-feedback"></span>' : '' }} 
            {{ $errors->first('description'.$item->id or '', '<li class="error">:message</li>')}}
            </div>
        </div>
      @endif

      {{-- free/private--}}

      <div class="form-group">
          <div class="col-xs-12 cc-selector list-inline">
              @if(Request::input('type') == 'materials' || Request::input('type') == 'tools')
                  <div class="col-xs-2 text-center">
                       <input autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" class="css-checkbox"
                       id="private" type="checkbox" name="private{{ $item->id or ''  }}"
                        {{ isset($item) && $item->private ? 'checked' : '' }}/>
                       <label class="css-label dark-plus-cyan" for="private{{ $item->id or ''  }}"></label>
                  </div>
                  <span class="col-xs-10 size14">{{trans('sovpal.forms.Free?')}}</span>
              {{--@else--}}
                  <div class="col-xs-2 text-center">
                      <input autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" class="css-checkbox"
                      id="private" type="checkbox" name="private{{ $item->id or ''  }}"
                       {{ isset($item) && $item->private ? 'checked' : '' }}/>
                      <label class="css-label dark-plus-cyan" for="private{{ $item->id or ''  }}"></label>
                  </div>
                  <span class="col-xs-10 size14">{{trans('sovpal.forms.Private?')}}</span>
              @endif 
          </div>
      </div>

</div>
