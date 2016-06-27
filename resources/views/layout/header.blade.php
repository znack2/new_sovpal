

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
         @if(!$currentUser)
          	<ul class="nav navbar-nav page-scroll text-center">
          	    <li><a href="/"><div class="logo"></div></a></li>
            	<li class="hidden-xs dropdown">
            	        <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
            	        <i class="fa fa-question-circle "></i>
            	        </a>
            	        <ul class="dropdown-menu help-dropdown" role="menu">
            	    		<li class="{{ Request::url() == route('pages',['type'=>'how']) ? 'active': '' }}">
            	    		<a class="size14" href="{{ route('pages',['page'=>'how']) }}"><span class="white_c" >{{ trans('sovpal.pagehow') }}</span></a></li>

            	    		<li class="{{ Request::url() == route('pages',['type'=>'contacts']) ? 'active': '' }}">
            	    		<a class="size14" href="{{ route('pages',['page'=>'contacts']) }}"><span class="white_c" >{{trans('sovpal.pagecontacts')}}</span></a></li>
            	        </ul>
            	</li>

                <ul class="visible-xs">
                  <li class="{{ Request::url() == route('pages',['type'=>'how']) ? 'active': '' }}">
                  <a href="{{ route('pages',['page'=>'how']) }}"> {{ trans('sovpal.pagehow') }}</a></li>

                  <li class="{{ Request::url() == route('pages',['type'=>'contacts']) ? 'active': '' }}">
                  <a class="size14" href="{{ route('pages',['page'=>'contacts']) }}">{{trans('sovpal.pagecontacts')}}</a></li>
                </ul>

            	<li class="{{ Request::url() == route('pages',['type'=>'premium']) ? 'active': '' }}">
            	<a href="#designers"> {{ trans('sovpal.pagedesigners') }}</a></li>

            	<li class="{{ Request::url() == route('pages',['type'=>'premium']) ? 'active': '' }}">
            	<a href="#shops"> {{ trans('sovpal.pageshops') }}</a></li>

            	<li class="{{ Request::url() == route('pages',['type'=>'premium']) ? 'active': '' }}">
            	<a href="#owners"> {{ trans('sovpal.pageowners') }}</a></li>

			</ul>
         @else
            <ul class="nav navbar-nav page-scroll text-center">

    		           <li class="hidden-xs {{ Request::url() == route('pages',['type'=>'how']) ? 'active': '' }}"> 
    		           <a href="{{ route('pages',['page' => 'how']) }}">{{  trans('sovpal.pagehow') }}</a> </li>

    						@if($currentUser->type != 'profi')
    						      <li class="visible-xs {{ Request::url() == route('groups') && Request::input('type') == '' ? 'active' : '' }}">
    						      <a href="{{ route('groups') }}">{{ trans('sovpal.Groups') }}</a></li>

    						      <li class="visible-xs {{ Request::url() == route('items') && Request::input('type') == ''? 'active' : '' }}">
    						      <a href="{{ route('items') }}">{{ trans('sovpal.Items') }}</a></li>
    						@endif

    						@if($currentUser->type == 'owner')
    						    <li class="visible-xs {{ Request::url() == route('items') && Request::input('type') == 'tools' ? 'active' : '' }}">
    						    <a href="{{ route('items',['type'=>'tools']) }}">{{ trans('sovpal.Tools') }}</a></li>

    						    <li class="visible-xs {{ Request::url() == route('items') && Request::input('type') == 'materials' ? 'active' : '' }}">
    						    <a href="{{ route('items',['type'=>'materials'])  }}">{{ trans('sovpal.Materials') }}</a></li>
    						@endif

    						    <li class="visible-xs {{ Request::url() == route('users') && Request::input('type') == 'owners' ? 'active' : '' }}">
      						    <a href="{{ route('users',['type'=>'owners']) }}"> {{ trans('sovpal.'.$currentUser->type) }} </a></li>

    						@if($currentUser->type == 'owner' || $currentUser->type == 'profi')
    						    <li class="visible-xs {{ Request::url() == route('users') && Request::input('type') == 'profis' ? 'active' : '' }}">
    						    <a href="{{ route('users',['type'=>'profis']) }}">{{ trans('sovpal.Designers') }}</a></li>
    						@endif

    						@if($currentUser->type != 'profi')
    						    <li class="visible-xs {{ Request::url() == route('users') && Request::input('type') == 'shops' ? 'active' : '' }}">
    						    <a href="{{ route('users',['type'=>'shops']) }}">{{ trans('sovpal.Shops') }}</a></li>
    						@endif
                
	           </ul>
            {{-- @include('layout.search') --}}
         @endif
            <ul class="hidden-xs nav navbar-nav navbar-right" style="display: inline-flex;">
             @if (!Auth::check())
               <li class="dropdown">
                       <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><b>{{trans('sovpal.Login')}}</b>
                       <span class="caret"></span></a>
                       <ul id="login-dp" class="dropdown-menu" role="menu">
                       <li>

                       {{--<div class="content text-center">--}}
                          {{--<h3><div class="logo"></div>--}}
                          {{--<p>Sovpal.Ru</p></h3>--}}
                       {{--</div>--}}
                           @include('layout.forms._basic.default',['model' => 'auth','method' => 'login','type'=>'','modal_data'=>null])
                           </li>
                       </ul>
               </li>
               <li>
                <a href="{{ Session::get('locale') == 'en' ? url('lang/ru') : url('lang/en') }}"
                 data-tooltip="{{ Session::get('locale') == 'en' ? 'this is russian' : 'this is not russian' }}" 
                 id="{{ Session::get('locale') == 'en' ? 'ru' : 'en' }}">
                 {{ Session::get('locale') == 'en' ? 'Ru' : 'En' }}</a>

                 {{-- {!! Form::select('locale', ['en' => 'EN', 'fr' => 'FR'], App::getLocale(), ['onchange' => 'this.form.submit()', ] ) !!} --}}
               </li>
             @else
                @include('layout.profile')
            @endif
         </ul>
      </div>





