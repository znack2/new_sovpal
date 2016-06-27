<div class="hidden-xs">
<div class="row">
   <a class="white_c size14 col-xs-6" href="{{ route('auth.register') }}">{{ trans('sovpal.SignUp') }}</a>
    <p class="white_c size18 col-xs-6">{{ trans('sovpal.forms.PleaseLogIn') }}</p>
    {{--<p class="text-center size12"></p>--}}
</div>
    <div class="clearfix"></div>
    {{--<div class="col-xs-12 form-group">--}}
        {{--<div class="col-xs-6">--}}
            {{--<a href="{{ route('auth.oauth',['provider'=>'facebook']) }}" class="btn-round white_c text-center">--}}
                {{--<i class="fa fa-facebook"></i>--}}
            {{--</a>--}}
        {{--</div>--}}
        {{--<div class="col-xs-6">--}}
            {{--<a href="{{ route('auth.oauth',['provider'=>'vkontakte']) }}" class="btn-round white_c text-center">--}}
                {{--<i class="fa fa-vk"></i>--}}
            {{--</a>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<div class="clearfix"></div>--}}

    {{--<p class="text-center size12">{{ trans('sovpal.forms.OrNormalEnter') }}</p>--}}
</div>

<div class="form-group">
        <label for="email" class="sr-only">{{ trans('sovpal.forms.E-Mail') }}</label>
        <input autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" id="email" name="email" class="form-control" type="email"
        placeholder="{{ old( 'email', trans('sovpal.forms.E-Mail') ) }}" required>
        {{$errors->first('email' ,'<li class="error">:message</li>')}}
</div>

<div class="form-group">
    <label class="sr-only" for="password">{{ trans('sovpal.forms.Password') }}</label>
    <input autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" id="password" name="password" class="form-control"
     placeholder="{{ trans('sovpal.forms.Password') }}" required>
     {{$errors->first('password' ,'<li class="error">:message</li>')}}
</div>

<div class="hidden-xs form-group">
    <div class="checkbox">
        <input type="checkbox" required="required" value="1" name="remember" id="remember" class="css-checkbox" />
        <label for="remember" class="css-label">{{ trans('sovpal.forms.RememberMe') }}</label>
    </div>
</div>



<div class="clearfix"></div>

<button class="col-xs-12 btn btn_submit btn-lg" type="submit">{{ trans('sovpal.Login') }}</button>
<br>
<p class="col-xs-12 size12"><a style="font-size: 12px" href="{{ route('auth.pass_reset') }}">{{ trans('sovpal.forms.ForgotUorP?') }}</a></p>
