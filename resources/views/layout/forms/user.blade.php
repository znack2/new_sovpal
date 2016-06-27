
<div class="form-horizontal">

	<div class="form-group {{ $errors->has('first_name') ? 'has-error has-feedback' : '' }}">
	    <label for="first_name" class="col-sm-4 control-label">{{trans('sovpal.forms.First_name')}}:</label>
	    <div class="col-sm-8">
	        <input autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" type="text" class="form-control" id="firstname" name="first_name"
	        placeholder="{{ old( 'first_name', $data -> first_name ) }}">
	        {{ $errors->has('first_name') ? ' <span class="fa fa-remove form-control-feedback"></span>' : '' }} 
	        {{ $errors->first('first_name' ,'<li class="error">:message</li>')}} 
	    </div>
	</div>

	<div class="form-group {{ $errors->has('last_name') ? 'has-error has-feedback' : '' }}">
	    <label for="last_name" class="col-sm-4 control-label">{{trans('sovpal.forms.Last_name')}}:</label>
	    <div class="col-sm-8">
	        <input autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" type="text" class="form-control" id="lastname" name="last_name"
	        placeholder="{{ old( 'last_name', $data -> last_name ) }}">
	        {{ $errors->has('last_name') ? ' <span class="fa fa-remove form-control-feedback"></span>' : '' }} 
	        {{ $errors->first('last_name' ,'<li class="error">:message</li>')}} 
	    </div>
	</div>

@if($data->type == 'owner')

	<div class="form-group {{ $errors->has('birthday') ? 'has-error has-feedback' : '' }}">
	    <label for="birthday" class="col-sm-4 control-label">{{trans('sovpal.forms.Birthday')}}:</label>
	    <div class="col-sm-8">
	        <input autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" type="date" class="form-control" id="birthday" name="birthday"
	        placeholder="{{ old( 'birthday',  date("Y-m-d", strtotime($data->birthday)) ) }}">
	        {{ $errors->has('birthday') ? ' <span class="fa fa-remove form-control-feedback"></span>' : '' }} 
	        {{ $errors->first('birthday' ,'<li class="error">:message</li>')}} 
	    </div>
	</div>

	<div class="form-group">
	    <label for="gender" class="col-xs-4 control-label">{{trans('sovpal.forms.Gender')}}:</label>
	    <div class="col-xs-8">
	         <label class="radio-inline">
	              <input autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" id="male" type="radio" name="gender" value="1" {{ $data->gender ? 'checked' : '' }}/>
	              {{trans('sovpal.forms.male')}}
	          </label>

	          <label class="radio-inline">
	              <input autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" id="female" type="radio" name="gender" value="0" {{ $data->gender ? '' : 'checked' }}/>
	              {{trans('sovpal.forms.female')}}
	          </label>
	    </div>
	</div>

	<div class="form-group">
		<label for="own_remont" class="col-xs-12 col-sm-4 control-label">{{trans('sovpal.forms.OwnRemont?')}}:</label>
		<ul class="col-xs-12 col-sm-8 cc-selector list-inline">
		    <li class="col-xs-6 col-md-6 col-sm-6 text-center"><input id="myself" type="radio" name="own_remont" value="1" {{ $data->own_remont ? 'checked' : '' }}/>
		    <label class="drinkcard-cc myself" for="myself"></label>
		    <span class="size14">{{ trans('sovpal.forms.myself') }}</span></li>

		    <li class="col-xs-6 col-md-6 col-sm-6 text-center"><input id="notmyself" type="radio" name="own_remont" value="0" {{ $data->own_remont ? '' : 'checked' }}/>
		    <label class="drinkcard-cc notmyself" for="notmyself"></label>
		    <span class="size14">{{ trans('sovpal.forms.builders_remont') }}</span></li>
		</ul> 
	</div>

	<div class="form-group">
		<label for="with_designer" class="col-xs-12 col-sm-4 control-label">{{trans('sovpal.forms.withDesigner?')}}:</label>
		<ul class="col-xs-12 col-sm-8 cc-selector list-inline">
			<li class="col-xs-6 col-md-6 col-sm-6 text-center"><input id="without" type="radio" name="with_designer" value="0" {{ $data->with_designer ? '' : 'checked' }}/>
			<label class="drinkcard-cc without" for="without"></label>
			<span class="size14">{{ trans('sovpal.forms.myself') }}</span></li>

		    <li class="col-xs-6 col-md-6 col-sm-6 text-center"><input id="with" type="radio" name="with_designer" value="1" {{ $data->with_designer ? 'checked' : '' }}/>
		    <label class="drinkcard-cc with" for="with"></label>
		    <span class="size14">{{ trans('sovpal.forms.with_designer') }}</span></li>
		</ul>
	</div>
@elseif($data->type == 'profi')

	<div class="form-group">
		<label for="skills" class="col-sm-4 control-label">{{trans('sovpal.forms.Skills')}}:</label>
		<ul class="col-sm-5 cc-selector list-inline">
			@foreach($tagskills as $tag_id => $skill)
				<li><input autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" tabindex="1" id="{{ 'skill'.$skill->name }}" type="checkbox" name="skills[{{ $tag_id }}]" value="{{ $skill->name }}"
				{{ $data->getTag('skill',$skill->name) ? 'checked' : '' }} />
				<label class="drinkcard-cc {{ 'skill'.$skill->name }}" for="{{ 'skill'.$skill->name }}"></label></li>
			@endforeach
			
		</ul>
	</div>

	<div class="form-group {{ $errors->has('hour_cost') ? 'has-error has-feedback' : '' }}">
	    <label for="hour_cost" class="col-sm-4 control-label">{{trans('sovpal.forms.Hour_cost')}}:</label>
	    <div class="col-sm-8">
	        <input autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" type="number" class="form-control" id="hour_cost" name="hour_cost"
	        placeholder="{{ old( 'hour_cost', $data->hour_cost or trans('sovpal.forms.hour_cost') ) }}">
	        {{ $errors->has('hour_cost') ? ' <span class="fa fa-remove form-control-feedback"></span>' : '' }} 
	        {{ $errors->first('hour_cost' ,'<li class="error">:message</li>')}} 
	    </div>
	</div>

	<div class="clearfix"></div> 

	{{-- 	    <div class="input-group">
        <span class="input-group-addon"> <i class="fa fa-user fa-lg"></i> </span> 
        <label for="hour_cost" class="sr-only">{{ trans('sovpal.forms.Hour_cost') }}</label>
    </div> --}}


	<div class="form-group {{ $errors->has('education') ? 'has-error has-feedback' : '' }}">
	    <label for="education" class="col-sm-4 control-label">{{trans('sovpal.forms.Education')}}:</label>
	    <div class="col-sm-8">
	        <textarea autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" class="form-control" id="education" name="education"
	        placeholder="{{ old( 'education', $data->education or trans('sovpal.put here some place where you studied') ) }}"></textarea>
	        {{ $errors->has('education') ? '<span class="fa fa-remove form-control-feedback"></span>' : '' }}
	        {{ $errors->first('education' ,'<li class="error">:message</li>')}} 
	    </div>
	</div>
@elseif($data->type == 'shop')

	<div class="form-group">
	    <label for="refund_policy" class="col-sm-4 control-label">{{trans('sovpal.forms.refund_policy')}}:</label>
	    <div class="col-sm-8">
	    <textarea autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" class="form-control" id="refund_policy" name="refund_policy" cols="30" rows="5" placeholder="{{ old( 'refund_policy', $data -> refund_policy ) }}"></textarea>
	    {{$errors->first('refund_policy' ,'<li class="error">:message</li>')}} 
	    </div>
	</div>

	<div class="form-group">
	    <label for="delivery_policy" class="col-sm-4 control-label">{{trans('sovpal.forms.delivery_policy')}}:</label>
	    <div class="col-sm-8">
	    <textarea autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" class="form-control" id="delivery_policy" name="delivery_policy" cols="30" rows="5" placeholder="{{ old( 'delivery_policy', $data -> delivery_policy ) }}"></textarea>
	    {{$errors->first('delivery_policy' ,'<li class="error">:message</li>')}} 
	    </div>
	</div>

	<hr>
@endif

@if($currentUser->id == $data->id or $currentUser->getPurchaseContact($data))
	    <hr>
        <h4 class="form-heading text-center">{{ trans('sovpal.forms.Contacts') }} :</h4>
	    <p class="size12 lh16 text-center"> {{ trans('sovpal.forms.Contacts_message') }} </p> 

		<div class="form-group {{ $errors->has('phone') ? 'has-error has-feedback' : '' }}">
		    <label for="phone" class="col-sm-4 control-label">{{trans('sovpal.forms.phone')}}:</label>
		    <div class="col-sm-8">
		        <input autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" type="number" class="form-control" id="phone" name="phone"
		        placeholder="{{ old( 'phone', $data -> phone_code . $data -> phone ) }}">
		        {{ $errors->has('phone') ? ' <span class="fa fa-remove form-control-feedback"></span>' : '' }} 
		        {{ $errors->first('phone' ,'<li class="error">:message</li>') }} 
		    </div>
		</div>
@endif

@if($currentUser->id == $data->id)
	<hr>
	<div class="form-group">
		<div class="col-xs-12 col-sm-6 col-md-6 text-center">
			<h5><a class="grey_c size12 lh16" href="{{ route('auth.email_require') }}">{{ trans('sovpal.forms.ChangePassword?') }}</a></h5>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-6 text-center">
			<button class="btn btn_blue" type="submit">{{ trans('sovpal.forms.SaveChanges') }}</button>
		</div>
	</div>
	<h5 class="col-md-12 text-center minitext">{{ trans('sovpal.forms.ByClickAgree') }}</h5>
@endif  


</div>


 
