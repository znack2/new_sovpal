<h3 class="text-center">{{ trans('sovpal.forms.Search_title') }}</h3>
<p class="size12 text-center"> {!! trans('sovpal.forms.Search_message') !!} </p>
<br>

<form action="{{ route('ajax.searchUsers') }}" method="GET" id="search_form" class="container">
     <meta name="csrf_token" content="{{ csrf_token() }}" />
     {{-- <meta name="_token" content="{{ app('Illuminate\Encryption\Encrypter')->encrypt(csrf_token()) }}" /> --}}

      <div class="fieldset">
          <div class="form-field street_input">
              <span>
                  <input name="street" id="street" autocomplete="off" type="text" placeholder="{{ trans('sovpal.forms.WhatStreetLive') }}">
                  <li id="streetError" class="red_c" style="display:none;">{{ trans('sovpal.errors.IncorrectStreet') }}</li>
              </span>
          </div>

          <div class="form-field house_input">
              <input name="house" type="text" id="house" pattern="[0-9]*" placeholder="{{ trans('sovpal.forms.House') }}" autocomplete="off">
              <li id="streetHouse" class="red_c" style="display:none;">{{ trans('sovpal.errors.IncorrectHouse') }}</li>
          </div>

          <div class="form-field submit-btn">
              <button type="submit" id="search_button" class="btn-blue blue_color full-width">{{ trans('sovpal.forms.Search') }}</button>
          </div>
      </div>
</form>