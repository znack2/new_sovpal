@if(Auth::check())
    <div class="profile_offcanvas" id="offcanvas_profile">
        <nav class="hidden-xs hidden-sm hidden-md hidden-lg nav-sidebar" id="large-menu2">
            <h3 class="bold size16">{{ trans('sovpal.Profile') .' : '. $currentUser->first_name }} </h3>
              <ul>
                  <li class="divider"></li>
                     <li>{{ link(route('profile',[Auth::id(),'section'=>'settings'],null,'ViewProfile') }}</li>
                     <li class="divider" aria-hidden="true"></li>
                  @if($currentUser->type == 'owner')
                     <li>{{ link(route('profile',[Auth::id(),'section'=>'items','type'=>'tools'],null,'MyTools') }}</li>
                     <li>{{ link(route('profile',[Auth::id(),'section'=>'items','type'=>'materials'],null,'MyMaterials') }}</li>
                  @endif

                  @if($currentUser->type != 'profi')
                      <li>{{ link(route('profile',[Auth::id(),'section'=>'items','type'=>'items'],null,$currentUser->type =='shop' ? 'MyItems' : 'MyOrders') }}</li>
                      <li>{{ link(route('profile',[Auth::id(),'section'=>'rooms'],null,$currentUser->type =='owner' ? 'MyRooms' : 'MyPortfolio') }}</li>
                  @endif

                   @if($currentUser->type == 'owner' || $currentUser->type == 'shop' && $currentUser->items()->count() > 0)
                       <li>{{ link(route('profile',[$currentUser->id,'section'=>'groups']),null,'MyGroups') }}</li>
                   @endif
                       <li>{{ link(url('logout'),null,'Logout') }}</li>
              </ul>
        </nav>
    </div>
@else
    {{--<div class="login_offcanvas" id="offcanvas_login">--}}
        {{--<nav class="hidden-sm hidden-md hidden-lg nav-sidebar" id="large-menu3">--}}
        {{--@include('layout.forms._basic.default',['model' => 'auth','method' => 'login','type'=>'','modal_data'=>null])--}}
        {{--</nav>--}}
    {{--</div>--}}
@endif

