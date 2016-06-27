<form class="text-center" action="{{ route('ajax.contact') }}" method="POST" accept-charset="UTF-8">

{!! csrf_field() !!}

<div class="content">

      <div class="col-md-6">
        <label class="sr-only" for="name">{{ trans('sovpal.forms.Name') }}</label>
        <input type="text" class="form-control" name="name" id="name" required placeholder="{{ trans('sovpal.forms.Name') }}"> 
        {{$errors->first('name' ,'<li class="error">:message</li>')}}    

        <label class="sr-only" for="email">{{ trans('sovpal.forms.E-Mail') }}</label>
        <input type="email" class="form-control" name="email" id="email" required placeholder="{{ trans('sovpal.forms.E-Mail') }}">  
        {{$errors->first('email' ,'<li class="error">:message</li>')}}   

        <label class="sr-only" for="company">{{ trans('sovpal.forms.Company') }}</label>
        <input type="text" class="form-control" name="company" id="company" placeholder="{{ trans('sovpal.forms.Company') }}">
        {{$errors->first('company' ,'<li class="error">:message</li>')}}
      </div>


      <div class="col-md-6">
        <label class="sr-only" for="message">{{ trans('sovpal.forms.Message') }}</label>
        <input type="textfield" class="form-control" name="message" id="message" required placeholder="{{ trans('sovpal.forms.Message') }}">
        {{$errors->first('message' ,'<li class="error">:message</li>')}}
      </div>

      <div class="clearfix"></div>

      <div class="col-md-offset-3 col-md-6">
          <button type="submit" id="send_button" class="btn signup">
              {{trans('sovpal.forms.Send')}}
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve">
                  <path id="paper-plane-icon" d="M462,54.955L355.371,437.187l-135.92-128.842L353.388,167l-179.53,124.074L50,260.973L462,54.955z
              M202.992,332.528v124.517l58.738-67.927L202.992,332.528z"></path>
                </svg>
          </button>
      </div>
</div>
</form>


