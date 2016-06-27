@if(Auth::check())
    <div class="profile_offcanvas" id="offcanvas_profile">
        <nav class="hidden-xs hidden-sm hidden-md hidden-lg nav-sidebar" id="large-menu2">
            <h3 class="bold size16">{{ trans('sovpal.Profile') .' : '. $currentUser->type == 'shop' ? $currentUser->company : $currentUser->first_name }} </h3>
              <ul>
                    <li class="divider"></li>
                       <li>
                           <a class="link" href="{{ route('profile',[Auth::id(),'section'=>'settings']) }}">
                                   <span class="item_icon"></span>
                               <span cl ass="bold item_name">{{ trans('sovpal.ViewProfile') }}</span>
                           </a>
                       </li>
                       <li class="divider" aria-hidden="true"></li>

                   @if($currentUser->type == 'owner')
                       <li>
                           <a class="link" href="{{ route('profile',[Auth::id(),'section'=>'items','type'=>'tools']) }}">
                                   <span class="item_icon"></span>
                               <span class="bold item_name">{{ trans('sovpal.MyTools') }}</span>
                           </a>
                       </li>
                       <li>
                           <a class="link" href="{{ route('profile',[Auth::id(),'section'=>'items','type'=>'materials']) }}">
                                   <span class="item_icon"></span>
                               <span class="bold item_name">{{ trans('sovpal.MyMaterials') }}</span>
                           </a>
                       </li>
                   @endif

                  @if($currentUser->type != 'profi')
                      <li>
                          <a class="link" href="{{ route('profile',[Auth::id(),'section'=>'items','type'=>'items']) }}">
                                  <span class="item_icon"></span>
                              <span class="bold item_name">{{ $currentUser->type =='shop' ? trans('sovpal.MyItems') : trans('sovpal.MyOrders') }}</span>
                          </a>
                      </li>
                    <li>
                         <a class="link" href="{{ route('profile',[Auth::id(),'section'=>'rooms']) }}">
                                 <span class="item_icon"></span>
                             <span class="bold item_name">{{ $currentUser->type =='owner' ? trans('sovpal.MyRooms') : trans('sovpal.MyPortfolio')}}</span>
                         </a>
                     </li>
                  @endif

                   @if($currentUser->type == 'owner' || $currentUser->type == 'shop' && $currentUser->items()->count() > 0)
                       <li>
                          <a class="link" href="{{ route('profile',[$currentUser->id,'section'=>'groups']) }}">
                                  <span class="item_icon"></span>
                              <span class="bold item_name">{{ trans('sovpal.MyGroups') }}</span>
                          </a>
                      </li>
                   @endif
                       <li>
                           <a class="link" href="{{ url('logout') }}">
                                   <span class="item_icon"></span>
                               <span class="bold item_name">{{ trans('sovpal.Logout') }}</span>
                           </a>
                       </li>
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

