  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
     @if(!$currentUser)
        <ul class="nav navbar-nav page-scroll text-center">
            <li>{{ link('/',<div class="logo"></div>,'') }}
            <li class="hidden-xs dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-question-circle "></i></a>
                  <ul class="dropdown-menu help-dropdown" role="menu">
                    <li class="{{ active('pages','how') }}">{{ link(route('pages',['page'=>'how']),null,'pagehow') }}</li>
                    <li class="{{ active('pages','contacts') }}">{{ link(route('pages',['page'=>'contacts']),null,'pagecontacts') }}</li>
                  </ul>
            </li>
            <ul class="visible-xs">
              <li class="{{ active('pages','contacts') }}">{{ link(route('pages',['page'=>'contacts']),null,'pagecontacts') }}</li>
              <li class="{{ active('pages','contacts') }}">{{ link(route('pages',['page'=>'contacts']),null,'pagecontacts') }}</li>
            </ul>
            <li class="{{ active('pages','profis') }}">{{ link('#designers',null,'pageprofis') }}</li>
            <li class="{{ active('pages','shops') }}">{{ link(route('pages',['page'=>'shops']),null,'pageshops') }}</li>
            <li class="{{ active('pages','owners') }}">{{ link(route('pages',['page'=>'owners']),null,'pageowners') }}</li>
        </ul>
     @else
          <ul class="nav navbar-nav page-scroll text-center">
              <li class="hidden-xs {{ active('pages','contacts') }}">{{ link(route('pages',['page'=>'contacts']),null,'pagecontacts') }}</li>
              @if($currentUser->type != 'profi')
                <li class="visible-xs {{ active('groups','') }}">{{ link(route('groups'),null,'Groups') }}</li>
                <li class="visible-xs {{ active('items','') }}">{{ link(route('items'),null,'Items') }}</li>
              @endif
              @if($currentUser->type == 'owner')
                <li class="visible-xs {{ active('items','tools') }}">{{ link(route('items',['type'=>'tools']),null,'Tools') }}</li>
                <li class="visible-xs {{ active('items','materials') }}">{{ link(route('items',['type'=>'materials']),null,'Materials') }}</li>
              @endif
                <li class="visible-xs {{ active('users','owners') }}">{{ link(route('users',['type'=>'owners']),null,$currentUser->type) }}</li>
              @if($currentUser->type == 'owner' || $currentUser->type == 'profi')
                <li class="visible-xs {{ active('users','profis') }}">{{ link(route('users',['type'=>'profis']),null,'Designers') }}</li>
              @endif
              @if($currentUser->type != 'profi')
                <li class="visible-xs {{ active('users','shops') }}">{{ link(route('users',['type'=>'shops']),null,'Shops') }}</li>
              @endif
           </ul>
          {{-- @include('layout.forms.search') --}}
       @endif
          <ul class="hidden-xs nav navbar-nav navbar-right" style="display: inline-flex;">
           @if (!Auth::check())
             <li class="dropdown">
                 <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><b>{{trans('sovpal.Login')}}</b>
                 <span class="caret"></span></a>
                 <ul id="login-dp" class="dropdown-menu" role="menu">
                 <li>@include('layout.forms._basic.default',['model' => 'auth','method' => 'login','type'=>'','modal_data'=>null])</li>
                 </ul>
             </li>
             <li>{{ link(url('lang/'.Session::get('locale')),null, Session::get('locale'))}}
               <!-- data-tooltip="{{ Session::get('locale') == 'en' ? 'this is russian' : 'this is not russian' }}"  -->
             </li>
           @else
              @include('layout.profile')
          @endif
       </ul>
</div>



{{-- {!! Form::select('locale', ['en' => 'EN', 'fr' => 'FR'], App::getLocale(), ['onchange' => 'this.form.submit()', ] ) !!} --}}




