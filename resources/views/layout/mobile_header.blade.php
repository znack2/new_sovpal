
    <a class="hidden-xs navbar-brand" href="{{ route('groups') }}"> <div class="logo"></div> </a>

<!-- Mobile left -->
  @if(Request::url() == route('items') || Request::url() == route('groups') || Request::url() == route('users'))
    <a data-toggle="offcanvas_sidebar" class="col-xs-4 pull-left" style="padding:15px">
      <i class="fa fa-arrow-right fa-lg" style="line-height: 20px;"></i>
    </a>
  @elseif(URL::previous() == route('items') || URL::previous() == route('users') || URL::previous() == route('groups') && Request::url() !=  route('profile'))
    <a class="col-xs-4 pull-left size16 lh15" href="{{ URL::previous() }}" style="padding:10px 0;">
      <div class="round_icon"><i class="fa fa-arrow-left fa-lg"></i>
      <span class="menu_back" style="margin-left:-10px;">{{ trans('back') }}</span></div>
    </a>
  @else
  <div class="col-xs-4">
    <button type="button" class="pull-left btn-navbar navbar-toggle collapsed text-center" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        {{--<span class="sr-only">Toggle Navigation</span>--}}
        {{--<span class="icon-bar"></span>--}}
        {{--<span class="icon-bar"></span>--}}
        {{--<span class="icon-bar"></span>--}}
        <span class="fa fa-bars fa-lg"></span>
    </button>
    </div>
  @endif


<!-- Mobile center -->
  @if($currentRoute == 'profile' || $currentRoute == 'items' || $currentRoute == 'users' || $currentRoute == 'groups')
    <h3 class="col-xs-4 text-center size12 white_c">
        @if(Request::url() == route('items',['type'=>'items'])){{ trans('sovpal.Items') }}
        @elseif(Request::url() == route('items',['type'=>'tools'])){{ trans('sovpal.Tools') }}
        @elseif(Request::url() == route('items',['type'=>'materials'])){{ trans('sovpal.Materials') }}
        @elseif(Request::url() == route('groups')){{ trans('sovpal.Groups') }}
        @elseif(Request::url() == route('users',['type'=>'owners'])){{ trans('sovpal.Owners') }}
        @elseif(Request::url() == route('users',['type'=>'shops'])){{ trans('sovpal.Shops') }}
        @elseif(Request::url() == route('users',['type'=>'profis'])){{ trans('sovpal.Designers') }}
        @elseif($currentRoute == 'profile'){{ trans('sovpal.Profile') }}
        @endif
    </h3>
  @else
   <!--  <a class="col-xs-4 text-center navbar-brand" href="{{ route('pages',['page'=>'landing']) }}">
       <div class="logo"></div>
       <span style="color:#e3e7eb;display:inline-block;">Sovpal</span>
    </a> -->
  @endif


<!-- Mobile right -->
  @if(!Auth::check())
    {{--<div class="col-xs-4 text-center pull-right" style="padding-top: 15px;">--}}
      {{--<a data-toggle="offcanvas_login"><span class="size16">{{ trans('sovpal.Login') }}</span></a><span style="margin: 0 10px;color: #fff">|</span>--}}
      {{--<div class="dropdown">--}}
             {{--<a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><b>{{trans('sovpal.Login')}}</b>--}}
             {{--<span class="caret"></span></a>--}}
             {{--<ul id="login-dp" class="dropdown-menu" role="menu">--}}
             {{--<li> @include('layout.forms._basic.default',['model' => 'auth','method' => 'login','type'=>'','modal_data'=>null]) </li>--}}
             {{--</ul>--}}
      {{--</div>--}}
        {{--<a href="{{ Session::get('locale') == 'en' ? url('lang/ru') : url('lang/en') }}"--}}
       {{--data-tooltip="this is russian/this is not russian" id="{{ Session::get('locale') == 'en' ? 'ru' : 'en' }}">--}}
       {{--{{ Session::get('locale') == 'en' ? 'Ru' : 'En' }}</a>--}}
    {{--</div>--}}
  @else
    <a data-toggle="offcanvas_profile" class="col-xs-4 pull-right">
      <i class="pull-right fa fa-user fa-lg profile_sidebar_button"></i>
    </a>
  @endif
