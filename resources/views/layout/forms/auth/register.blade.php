{{--has-success has-feedback--}}


<p class="size18 bold text-center">{{ trans('sovpal.forms.Register_title') }} :
<div class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
        <i class="fa fa-question-circle"></i></a>

        <ul class="dropdown-menu" role="menu" style="width: 100%;">
            <li class="size10 text-center">
            {!! trans('sovpal.forms.Register_message') !!}</li>
        </ul>
</div>
</p>


<div class="row form-horizontal">
   <div class="col-xs-4">
     <input type="radio" value="profi" name="user_type" id="profi" class="css-checkbox2"/>
     <label for="profi" class="img-circle css-label2 user_type_profi"> {{trans('sovpal.forms.IamDesigner')}}</label>
   </div>
   <div class="col-xs-4">
      <input type="radio" value="owner" name="user_type" id="owner" class="css-checkbox2"/>
      <label for="owner" class="img-circle css-label2 user_type_owner"> {{trans('sovpal.forms.IamOwner')}}</label>
    </div>  
    <div class="col-xs-4">
       <input type="radio" value="shop" name="user_type" id="shop" class="css-checkbox2"/>
       <label for="shop" class="img-circle css-label2 user_type_shop"> {{trans('sovpal.forms.IamShop')}}</label>
    </div>
</div>
{{$errors->first('type' ,'<li class="error">:message</li>')}}
<div class="clearfix"></div>
<hr>

{{-- <p class="bold text-center">{{ trans('sovpal.forms.step1') }}</p> <br>
<p class="text-center">{{ trans('sovpal.forms.step1_message') }}</p> <br> --}}

<div class="row">
    <div class="form-group {{ $errors->has('first_name') ? 'has-error has-feedback' : '' }}">
        <label class="sr-only" for="first_name">{{ trans('sovpal.forms.First_name') }} :</label>
        <input autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" id="first_name" name="first_name" class="form-control border_icons" type="text"
        placeholder="{{ old( 'first_name', trans('sovpal.forms.First_name') ) }}">
        <span class="fa fa-{{ $errors->has('first_name') ? 'remove' : '' }} form-control-feedback"></span>
        {{$errors->first('first_name' ,'<li class="error">:message</li>')}}
    </div>
    <div class="form-group {{ $errors->has('last_name') ? 'has-error has-feedback' : '' }}">
        <label class="sr-only" for="last_name">{{ trans('sovpal.forms.Last_name') }} :</label>
        <input autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" id="last_name" name="last_name" class="form-control border_icons" type="text"
        placeholder="{{ old( 'last_name', trans('sovpal.forms.Last_name') ) }}">
        <span class="fa fa-{{ $errors->has('last_name') ? 'remove' : '' }} form-control-feedback"></span>
        {{$errors->first('last_name' ,'<li class="error">:message</li>')}}
    </div>
</div>

<p class="row bold text-center">{{ trans('sovpal.forms.step2') }}</p>
{{-- <p class="row text-center">{{ trans('sovpal.forms.step2_message') }}</p> <br> --}}

<div class="row">
        <div class="form-group {{ $errors->has('street') ? 'has-error has-feedback' : '' }}">
                <label class="sr-only" for="street">{{ trans('sovpal.forms.Street') }} :</label>
                <input autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" id="street" name="street" class="form-control border_icons address" type="text"
                placeholder="{{ old( 'street', trans('sovpal.forms.Street') ) }}">
                <span class="fa fa-{{ $errors->has('street') ? 'remove' : '' }} form-control-feedback"></span>
                {{$errors->first('street' ,'<li class="error">:message</li>')}}
        </div>
        <div class="form-group {{ $errors->has('house') ? 'has-error has-feedback' : '' }}">
            <div class="col-xs-8 nopadding col-lg-8">
                    <label class="sr-only" for="house">{{ trans('sovpal.forms.House') }} :</label>
                    <input autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" id="house" name="house" class="form-control border_icons address" type="text"
                    placeholder="{{ old( 'house', trans('sovpal.forms.House') ) }}">
                    <span class="fa fa-{{ $errors->has('house') ? 'remove' : '' }} form-control-feedback"></span>
                    {{$errors->first('house' ,'<li class="error">:message</li>')}}
            </div>

            <div class="col-xs-4 nopadding col-lg-4 {{ $errors->has('corpus') ? 'has-error has-feedback' : '' }}">
                <label class="sr-only" for="corpus">{{ trans('sovpal.forms.Corpus') }} :</label>
                <input autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" id="corpus" name="corpus" class="form-control border_icons address" type="text"
                placeholder="{{ old( 'corpus', trans('sovpal.forms.Corpus') ) }}">
                <span class="fa fa-{{ $errors->has('corpus') ? 'remove' : '' }} form-control-feedback"></span>
                {{-- <p class="help-block">{{ trans('sovpal.forms.NotImportnant') }}</p> --}}
            </div>
        </div> 

        @if(!Session::has('provider'))
            <p style="margin-top:15px" class="col-xs-12 bold text-center">{{ trans('sovpal.forms.step3') }}</p>
            {{-- <p class="row text-center">{{ trans('sovpal.forms.step3_message') }}</p> <br> --}}
            {{-- email --}}
                    <div class="form-group {{ $errors->has('email') ? 'has-error has-feedback' : '' }}">
                            <label for="email" class="sr-only">{{ trans('sovpal.forms.E-Mail') }}</label>
                            <input autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" id="email" name="email" class="form-control border_icons" type="email" required="required"
                            placeholder="{{ old( 'email', trans('sovpal.forms.E-Mail') ) }}">
                            <span class="fa fa-{{ $errors->has('email') ? 'remove' : '' }} form-control-feedback"></span>
                            {{$errors->first('email' ,'<li class="error">:message</li>')}}
                    </div>
            {{-- password --}}
                    <div class="form-group {{ $errors->has('password') ? 'has-error has-feedback' : '' }}">
                            <label class="sr-only" for="password">{{ trans('sovpal.forms.Password') }}</label>
                            <input id="password" name="password" class="form-control border_icons" type="password" required="required"
                            placeholder="{{ trans('sovpal.forms.Password') }}" >
                            <span class="fa fa-{{ $errors->has('password') ? 'remove' : '' }} form-control-feedback"></span>
                            {{$errors->first('password' ,'<li class="error">:message</li>')}}
                    </div>
                    <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error has-feedback' : '' }}">
                            <label class="sr-only" for="password_confirmation">{{ trans('sovpal.forms.ConfirmPassword') }}</label>
                            <input id="password_confirmation" name="password_confirmation" class="form-control border_icons"
                            placeholder="{{ trans('sovpal.forms.ConfirmPassword') }}"  type="password" required="required">
                            <span class="fa fa-{{ $errors->has('password_confirmation') ? 'remove' : '' }} form-control-feedback"></span>
                            {{$errors->first('password_confirmation' ,'<li class="error">:message</li>')}}
                    </div>
        @else
          <p class="red_c text-center">{{ $data->getName() }}</p>
          <img src="{{ $data->getAvatar() }}" class="img-responsive">
        @endif

{{-- agree --}}
        <div class="form-group">
                <div class="checkbox">
                    <input type="checkbox" required="required" value="1" name="terms" id="terms" class="css-checkbox" />
                    <label for="terms" class="css-label">{{trans('sovpal.forms.IAgree')}}</label>
                    <a style="color:#67C3EC;"  href="{{ route('pages',['page' => 'terms']) }}">{{trans('sovpal.forms.AgreeToEmails')}}</a>
                </div>
        </div>
</div>

<div class="col-md-12">
     <p class="bold text-center lh15">{{ trans('sovpal.forms.ByClickSignUp') }}
     <a style="color:#67C3EC;"  href="{{ route('pages',['page' => 'conditions']) }}">{{ trans('sovpal.forms.Terms') }}</a>
     {{ trans('sovpal.forms.ByClickAgree18') }} </p>
</div>
<br>

<div class="form-group">
<button class="btn btn_submit btn-lg col-xs-12" type="submit"><span class="upper size18">{{ $button or trans('sovpal.forms.Create') }}</span></button>
</div>


{{-- 
<p class="bold text-center">{{ trans('sovpal.forms.ChooseAddress') }}</p> <br>
<p class="bold text-center">{{ trans('sovpal.forms.ChooseType') }}</p> <br> --}}

<script>
  $('.user_check').toggleClass("user_check");
  $(this).toggleClass("user_check");
</script>