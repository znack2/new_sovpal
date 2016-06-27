
<h4 class="size18 bold text-center">{{ trans('sovpal.forms.Register_title') }} : 
<div class="dropdown">
        <a class="blue_c dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
        <i class="fa fa-question-circle"></i></a>

        <ul class="dropdown-menu" role="menu" style="width: 100%;">
            <li class="size10 blue_c text-center">
            {!! trans('sovpal.forms.Register_message') !!}</li>
        </ul>
</div>
</h4>

<div class="row form-horizontal">
   <div class="col-xs-4">
      <label for="profi">
          <div id="profi" class="user_type_profi img-circle img-responsive img-check"></div>
          <input name="profi" class="hidden" type="radio" value="profi" autocomplete="off"/> {{trans('sovpal.forms.IamDesigner')}}
      </label>
   </div>
   <div class="col-xs-4">
          <label for="owner">
              <div id="owner" class="user_type_owner img-circle img-responsive img-check user_check"></div>
              <input name="owner" class="hidden" type="radio" value="owner" autocomplete="off"/> {{trans('sovpal.forms.IamOwner')}}
          </label>
    </div>  
    <div class="col-xs-4">
          <label for="shop">
              <div id="shop" class="user_type_shop img-circle img-responsive img-check"></div>
              <input name="shop" class="hidden" type="radio" value="shop" autocomplete="off"/> {{trans('sovpal.forms.IamShop')}}
          </label>
    </div>
</div>
{{$errors->first('type' ,'<li class="error">:message</li>')}}
<div class="clearfix"></div>
<hr>

{{-- <p class="bold text-center">{{ trans('sovpal.forms.step1') }}</p> <br>
<p class="text-center">{{ trans('sovpal.forms.step1_message') }}</p> <br> --}}

<div class="row">
    <div class="form-group {{ $errors->has('first_name') ? 'has-error has-feedback' : 'has-success has-feedback' }}">
    <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-user fa-lg"></i></span>
        <label class="sr-only" for="first_name">{{ trans('sovpal.forms.First_name') }} :</label>
        <input id="first_name" name="first_name" class="form-control" type="text"
        placeholder="{{ old( 'first_name', trans('sovpal.forms.First_name') ) }}">
        <span class="fa fa-{{ $errors->has('first_name') ? 'remove' : 'check' }} form-control-feedback"></span>
        {{$errors->first('first_name' ,'<li class="error">:message</li>')}}
    </div>
    </div>
    <div class="form-group {{ $errors->has('last_name') ? 'has-error has-feedback' : 'has-success has-feedback' }}">
        <label class="sr-only" for="last_name">{{ trans('sovpal.forms.Last_name') }} :</label>
        <input id="last_name" name="last_name" class="form-control" type="text" 
        placeholder="{{ old( 'last_name', trans('sovpal.forms.Last_name') ) }}">
        <span class="fa fa-{{ $errors->has('last_name') ? 'remove' : 'check' }} form-control-feedback"></span>
        {{$errors->first('last_name' ,'<li class="error">:message</li>')}}
    </div>
</div>

<p class="row bold text-center">{{ trans('sovpal.forms.step2') }}</p>
{{-- <p class="row text-center">{{ trans('sovpal.forms.step2_message') }}</p> <br> --}}

<div class="row">
        <div class="form-group {{ $errors->has('street') ? 'has-error has-feedback' : 'has-success has-feedback' }}">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-home fa-lg"></i></span>
                <label class="sr-only" for="street">{{ trans('sovpal.forms.Street') }} :</label>
                <input id="street" name="street" class="form-control" type="text" 
                placeholder="{{ old( 'street', trans('sovpal.forms.Street') ) }}">
                <span class="fa fa-{{ $errors->has('street') ? 'remove' : 'check' }} form-control-feedback"></span>
                {{$errors->first('street' ,'<li class="error">:message</li>')}}
            </div>
        </div>
        <div class="form-group {{ $errors->has('house') ? 'has-error has-feedback' : 'has-success has-feedback' }}">
            <div class="col-xs-8 nopadding col-lg-8">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-home fa-lg"></i></span>
                    <label class="sr-only" for="house">{{ trans('sovpal.forms.House') }} :</label>
                    <input id="house" name="house" class="form-control" type="text" 
                    placeholder="{{ old( 'house', trans('sovpal.forms.House') ) }}">
                    <span class="fa fa-{{ $errors->has('house') ? 'remove' : 'check' }} form-control-feedback"></span>
                    {{$errors->first('house' ,'<li class="error">:message</li>')}}
                </div>
            </div>

            <div class="col-xs-4 nopadding col-lg-4 {{ $errors->has('corpus') ? 'has-error has-feedback' : 'has-success has-feedback' }}">
                <label class="sr-only" for="corpus">{{ trans('sovpal.forms.Corpus') }} :</label>
                <input id="corpus" name="corpus" class="form-control" type="text"
                placeholder="{{ old( 'corpus', trans('sovpal.forms.Corpus') ) }}">
                <span class="fa fa-{{ $errors->has('corpus') ? 'remove' : 'check' }} form-control-feedback"></span>
                {{-- <p class="help-block">{{ trans('sovpal.forms.NotImportnant') }}</p> --}}
            </div>
        </div> 

        @if(!Session::has('provider'))
            <p style="margin-top:15px" class="col-xs-12 bold text-center">{{ trans('sovpal.forms.step3') }}</p>
            {{-- <p class="row text-center">{{ trans('sovpal.forms.step3_message') }}</p> <br> --}}
            {{-- email --}}
                    <div class="form-group {{ $errors->has('email') ? 'has-error has-feedback' : 'has-success has-feedback' }}">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-envelope fa-lg"></i>
                            </span>
                            <label for="email" class="sr-only">{{ trans('sovpal.forms.E-Mail') }}</label>
                            <input id="email" name="email" class="form-control" type="email" required="required" 
                            placeholder="{{ old( 'email', trans('sovpal.forms.E-Mail') ) }}">
                            <span class="fa fa-{{ $errors->has('email') ? 'remove' : 'check' }} form-control-feedback"></span>
                            {{$errors->first('email' ,'<li class="error">:message</li>')}}
                        </div>
                    </div>
            {{-- password --}}
                    <div class="form-group {{ $errors->has('password') ? 'has-error has-feedback' : 'has-success has-feedback' }}">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-lock fa-lg"></i></span>
                            <label class="sr-only" for="password">{{ trans('sovpal.forms.Password') }}</label>
                            <input id="password" name="password" class="form-control" type="password" required="required" 
                            placeholder="{{ trans('sovpal.forms.Password') }}" >
                            <span class="fa fa-{{ $errors->has('password') ? 'remove' : 'check' }} form-control-feedback"></span>
                            {{$errors->first('password' ,'<li class="error">:message</li>')}}
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error has-feedback' : 'has-success has-feedback' }}">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-lock fa-lg"></i></span>
                            <label class="sr-only" for="password_confirmation">{{ trans('sovpal.forms.ConfirmPassword') }}</label>
                            <input id="password_confirmation" name="password_confirmation" class="form-control" 
                            placeholder="{{ trans('sovpal.forms.ConfirmPassword') }}"  type="password" required="required">
                            <span class="fa fa-{{ $errors->has('password_confirmation') ? 'remove' : 'check' }} form-control-feedback"></span>
                            {{$errors->first('password_confirmation' ,'<li class="error">:message</li>')}}
                        </div>
                    </div>
        @else
          <p class="red_c text-center">{{ $data->getName() }}</p>
          <img src="{{ $data->getAvatar() }}" class="img-responsive">
        @endif

{{-- agree --}}
        <div class="form-group {{ $errors->has('terms') ? 'has-error has-feedback' : 'has-success has-feedback' }}">
                <div class="checkbox">
                    <input type="checkbox" required="required" name="terms" value="1" checked="checked" class="css-checkbox">
                    <label for="terms" class="css-label dark-plus-cyan">{{trans('sovpal.forms.IAgree')}}</label><br>

                    <a class="link" href="{{ route('pages',['page' => 'terms']) }}">{{trans('sovpal.forms.AgreeToEmails')}}</a>
                    {{$errors->first('terms' ,'<li class="error">:message</li>')}}
                </div>
        </div>
</div>

<div class="col-md-12">
     <p class="bold text-center lh15">{{ trans('sovpal.forms.ByClickSignUp') }}
     <a class="link"  href="{{ route('pages',['page' => 'conditions']) }}">{{ trans('sovpal.forms.Terms') }}</a>
     {{ trans('sovpal.forms.ByClickAgree18') }} </p>
</div>
<br>

<div class="form-group">
<button class="btn btn_submit col-xs-12" type="submit">{{ $button or trans('sovpal.forms.Create') }}</button>
</div>


{{-- 
<p class="bold text-center">{{ trans('sovpal.forms.ChooseAddress') }}</p> <br>
<p class="bold text-center">{{ trans('sovpal.forms.ChooseType') }}</p> <br> --}}

