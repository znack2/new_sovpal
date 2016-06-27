		

@if($currentUser->type == 'owner')
	<h4 class="size18 bold text-center">{{ trans('sovpal.forms.NoResult') }}</h4>
	<p class="size14 text-center">{{ trans('sovpal.forms.ApplyIfWishToSeeNew') }}
@elseif($currentUser->type == 'shop')
	<h4 class="size18 bold text-center">{{ trans('sovpal.forms.NoResult') }}</h4>
	<p class="size14 text-center">{{ trans('sovpal.forms.ApplyIfWishToSeeNew') }}
@else
	<h4 class="size18 bold  text-center">{{ trans('sovpal.forms.NoResult') }}</h4>
	<p class="size14 text-center">{{ trans('sovpal.forms.ApplyIfWishToSeeNew') }}
@endif


<div class="col-md-12 form-group">
	<input id="empty_form" type="checkbox" name="empty_form" class="css-checkbox" onchange="this.form.submit()">
	<label class="css-label dark-plus-cyan" for="empty_form">{{ trans('sovpal.forms.Send') }}</label>
</div>	
</p>

