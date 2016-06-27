
@if(!isset($remove)) 
        <h4 class="form-heading text-center"> {{ trans('sovpal.forms.AddItem') }} </h4>
        <p class="minitext text-center"> {!! trans('sovpal.forms.AddItem_message') !!} </p>

{{--during--}}

    @if($data->type == 'tool')
        <div class="form-group  {{ $errors->has('during') ? 'has-error has-feedback' : '' }}">
             <label for="during" class="col-sm-4 control-label">{{ trans('sovpal.forms.during') }}</label>
             <div class="col-sm-8">
                 <input autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" type="date" name="during" class="form-control" value="{{ (old('during')) ? old('during') : '' }}"
                 placeholder="{{ old( 'during', trans('sovpal.forms.during') ) }}"/>
                 {{ $errors->has('during') ? ' <span class="fa fa-remove form-control-feedback"></span>' : '' }}
                 {{ $errors->first('during' ,'<li class="error">:message</li>')}}
             </div>
        </div>

{{--qty--}}

    @elseif($data->type == 'material' || $data->type == 'item')
        <div class="form-group {{ $errors->has('qty') ? 'has-error has-feedback' : '' }}">
             <label for="qty" class="col-sm-4 control-label">{{ trans('sovpal.forms.qty') }}</label>
             <div class="col-sm-8">
                 <input autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" type="number" name="qty" class="form-control" value="{{ (old('qty')) ? old('qty') : '' }}"
                   placeholder="{{ old( 'qty', trans('sovpal.forms.qty') ) }}"/>
                 {{ $errors->has('qty') ? ' <span class="fa fa-remove form-control-feedback"></span>' : '' }}
                 {{ $errors->first('qty' ,'<li class="error">:message</li>')}}
             </div>
        </div>
    @endif

{{--when--}}


 	<div class="form-group  {{ $errors->has('when') ? 'has-error has-feedback' : '' }}">
         <label for="when" class="col-sm-4 control-label">{{ trans('sovpal.forms.when') }}</label>
         <div class="col-sm-8">
             <input autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" type="date" name="when" class="form-control" value="{{ (old('when')) ? old('when') : '' }}"
             placeholder="{{ old( 'when', trans('sovpal.forms.when') ) }}"/>
             {{ $errors->has('when') ? ' <span class="fa fa-remove form-control-feedback"></span>' : '' }}
             {{ $errors->first('when' ,'<li class="error">:message</li>')}}
         </div>
    </div>

@else
        <h4 class="form-heading text-center"> {{ trans('sovpal.forms.RemoveItem') }} </h4> 
        <p class="minitext text-center"> {!! trans('sovpal.forms.RemoveItem_message') !!} </p> 
@endif
