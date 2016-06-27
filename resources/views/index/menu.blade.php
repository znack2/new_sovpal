<div class="panel_menu">
<ul class="menu">
   @if($currentUser->type != 'profi')
        <li class="menu_item {{ Request::url() == route('groups') && Request::input('type') == '' ? 'active' : '' }}">
        <a class="link" href="{{ route('groups') }}">{{ trans('sovpal.Groups') }}</a></li>  
        <li class="menu_item {{ Request::url() == route('items') && Request::input('type') == 'items'? 'active' : '' }}">
        <a class="link" href="{{ route('items') }}">{{ trans('sovpal.Items') }}</a></li>
   @endif

  @if($currentUser->type == 'owner')
      <li class="menu_item {{ Request::url() == route('items') && Request::input('type') == 'tools' ? 'active' : '' }}">
      <a class="link" href="{{ route('items',['type'=>'tools']) }}">{{ trans('sovpal.Tools') }}</a></li>

      <li class="menu_item {{ Request::url() == route('items') && Request::input('type') == 'materials' ? 'active' : '' }}">
      <a class="link" href="{{ route('items',['type'=>'materials'])  }}">{{ trans('sovpal.Materials') }}</a></li>
  @endif

      <li class="menu_item {{ Request::url() == route('users') && Request::input('type') == 'owners' ? 'active' : '' }}">
      <a class="link" href="{{ route('users',['type'=>'owners']) }}">
      @if($currentUser->type == 'shop')
      {{ trans('sovpal.Buyers') }}
      @elseif($currentUser->type == 'profi')
      {{ trans('sovpal.Clients') }}
      @elseif($currentUser->type == 'owner')
      {{ trans('sovpal.Neighbors') }}
      @endif
      </a></li>

      @if($currentUser->type == 'owner' || $currentUser->type == 'profi')
          <li class="menu_item {{ Request::url() == route('users') && Request::input('type') == 'profis' ? 'active' : '' }}">
          <a class="link" href="{{ route('users',['type'=>'profis']) }}">{{ trans('sovpal.Designers') }}</a></li>
      @endif

      @if($currentUser->type != 'profi')
          <li class="menu_item {{ Request::url() == route('users') && Request::input('type') == 'shops' ? 'active' : '' }}">
          <a class="link" href="{{ route('users',['type'=>'shops']) }}">{{ trans('sovpal.Shops') }}</a></li>
      @endif

        <li class="pull-right menu_item"><a class="red_c" href="
        {{ route('profile',['user'=>$currentUser->slug,'section'=>'items','type'=>$currentUser->type == 'shop' ? 'items' : 'materials']) }}">
        <i class="visible-sm fa fa-plus"></i>
        <span class="hidden-sm">{{ trans('sovpal.AddItem') }}</span>
        </a>
        </li>

    </ul>  
</div>
<div class="clearfix"></div>
<br> 


