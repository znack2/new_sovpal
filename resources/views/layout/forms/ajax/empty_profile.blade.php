
<tr>
        <div class="col-md-12 empty_result text-center banner_content">
            @if($currentUser->type == 'owner')
            	<h4 class="size18 bold text-center">{{ trans('sovpal.forms.NoResultForUser') }}</h4>
            	<p class="size14 text-center">{{ trans('sovpal.forms.ApplyIfWishToGetNotice') }}
            @elseif($currentUser->type == 'shop')
            	<h4 class="size18 bold text-center">{{ trans('sovpal.forms.NoResultForUser') }}</h4>
            	<p class="size14 text-center">{{ trans('sovpal.forms.ApplyIfWishToGetNotice') }}
            @else
            	<h4 class="size18 bold  text-center">{{ trans('sovpal.forms.NoResultForUser') }}</h4>
            	<p class="size14 text-center">{{ trans('sovpal.forms.ApplyIfWishToGetNotice') }}
            @endif


            <div class="col-md-12 form-group">
            	<input autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" id="empty_form" type="checkbox" name="empty_form" class="css-checkbox" onchange="this.form.submit()">
            	<label class="css-label dark-plus-cyan" for="empty_form">{{ trans('sovpal.forms.Send') }}</label>
            </div>	
            </p>
        </div> 
</tr>