
<form action="{{ route('ajax.searchUsers') }}" method="GET" id="search_form" class="container">
     <meta name="csrf_token" content="{{ csrf_token() }}" />
     {{-- <meta name="_token" content="{{ app('Illuminate\Encryption\Encrypter')->encrypt(csrf_token()) }}" /> --}}

      <div class="fieldset col-xs-12 col-lg-offset-2 col-lg-8">
          <div class="form-field street_input col-xs-11 col-sm-8 nopadding">
              <span>
                  <input autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" name="street" id="street"
                  autocomplete="off" type="text" placeholder="{{ trans('sovpal.forms.WhatStreetLive') }}">
                  <li id="streetError" class="red_c" style="display:none;">{{ trans('sovpal.errors.IncorrectStreet') }}</li>
              </span>
          </div>

          <div class="form-field house_input hidden-xs col-sm-2 col-lg-2 nopadding">
              <input autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" name="house" type="text"
              id="house" pattern="[0-9]*" placeholder="{{ trans('sovpal.forms.House') }}" autocomplete="off">
              <li id="streetHouse" class="red_c" style="display:none;">{{ trans('sovpal.errors.IncorrectHouse') }}</li>
          </div>

          <div class="form-field submit-btn hidden-xs col-sm-2 col-lg-2 nopadding">
              <button type="submit" id="search_button" class="btn btn_submit btn-blue blue_color full-width">{{ trans('pages.landing.Search') }}</button>
              <i class="visible-xs fa fa-search"></i>
          </div>

          <div class="form-field submit-btn col-xs-1 visible-xs nopadding">
              <button type="submit" id="search_button" class="btn btn_submit btn-lg full-width"><i class="fa fa-search"></i></button>
          </div>
      </div>
</form>