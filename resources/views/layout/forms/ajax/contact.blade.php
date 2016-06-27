 <h2>{{ trans('pages.contacts.SendMessage') }}</h2>

<form class="text-center" action="{{ route('ajax.contact') }}" method="POST" accept-charset="UTF-8">

{!! csrf_field() !!}

<div class="content">

      <div class="form-group">
        <label class="sr-only" for="name">{{ trans('sovpal.forms.First_name') }}</label>
        <input autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" type="text"
        class="form-control" name="name" id="name" required placeholder="{{ trans('sovpal.forms.First_name') }}">
        {{$errors->first('name' ,'<li class="error">:message</li>')}}    
<br>
        <label class="sr-only" for="email">{{ trans('sovpal.forms.E-Mail') }}</label>
        <input autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" type="email"
        class="form-control" name="email" id="email" required placeholder="{{ trans('sovpal.forms.E-Mail') }}">
        {{$errors->first('email' ,'<li class="error">:message</li>')}}   

      </div>


      <div class="form-group">
        <label class="sr-only" for="message">{{ trans('sovpal.forms.Message') }}</label>
        <textarea autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" type="textfield" class="form-control"
         cols="30" rows="5" name="message" id="message" required placeholder="{{ trans('sovpal.forms.Message') }}"></textarea>
        {{$errors->first('message' ,'<li class="error">:message</li>')}}
      </div>

      <div class="form-group">
          <button type="submit" id="send_button" class="btn signup btn-lg">
              {{trans('sovpal.forms.Send')}}
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                x="0px" y="0px" viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve">
                  <path id="paper-plane-icon" d="M462,54.955L355.371,437.187l-135.92-128.842L353.388,167l-179.53,124.074L50,260.973L462,54.955z
              M202.992,332.528v124.517l58.738-67.927L202.992,332.528z"></path>
                </svg>
          </button>
      </div>
</div>
</form>


