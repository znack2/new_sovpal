<h4 class="size18 bold text-center"> {{ trans('sovpal.forms.Reset_title') }} </h4>
<p class="size14 text-center"> {!! trans('sovpal.forms.Reset_message') !!} </p>

<input name="token" type="hidden" value="{{ $token }}">

<div class="form-group">
    <label for="email" class="col-md-4 control-label">{{ trans('sovpal.forms.E-Mail') }}</label>
    <div class="col-md-6">
        <input autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" type="email" class="form-control" name="email" id="email"
        placeholder="{{ old( 'email', trans('sovpal.forms.E-Mail') ) }}" required>
        {{$errors->first('email' ,'<li class="error">:message</li>')}}
    </div>
</div>

<div class="form-group">
    <div class="input-group">
   		<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
        <label class="sr-only" for="password">{{ trans('sovpal.forms.Password') }}</label>
        <input autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" id="password" name="password" class="form-control" type="password" required>
        {{$errors->first('password' ,'<li class="error">:message</li>')}}
    </div>
</div>


<div class="form-group">
    <label for="password_confirmation" class="col-md-4 control-label">{{ trans('sovpal.forms.ConfirmPassword') }}</label>
    <div class="col-md-6">
        <input autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" type="password" class="form-control" name="password_confirmation" id="password_confirmation">
        {{$errors->first('password_confirmation' ,'<li class="error">:message</li>')}}
    </div>
</div>