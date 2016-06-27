<h4 class="size18 bold text-center"> {{ trans('sovpal.forms.Remind_title') }} </h4>
<p class="size14 text-center"> {!! trans('sovpal.forms.Remind_message') !!} </p>

<div class="form-group">
    <label for="email" class="col-md-4 control-label">{{ trans('sovpal.forms.E-Mail') }}</label>
    <div class="col-md-6">
        <input autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" type="email" class="form-control" name="email" id="email"
        placeholder="{{ old( 'email', trans('sovpal.forms.E-Mail') ) }}" required>
        {{$errors->first('email' ,'<li class="error">:message</li>')}}
    </div>
</div>



	    