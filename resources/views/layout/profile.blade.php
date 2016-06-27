<li class="dropdown">

    <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
    <img class="avatar_photo" src="{{ asset('assets/images/users/'.$currentUser->getImage('avatar')) }}" width="20px">
    <b>
      {{ $currentUser->first_name or trans('sovpal.Profile') }}
    </b><span class="caret"></span></a>


      <ul id="login-dp profile-dp" class="dropdown-menu" role="menu">
           <li>
               <a href="{{ route('profile',[Auth::id(),'section'=>'settings']) }}">
                   <span class="item_icon"></span>
                   <span class="bold item_name">{{ trans('sovpal.ViewProfile') }}</span>
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
            @endif

            @if($currentUser->type != 'shop')
                <li>
                   <a class="link" href="{{ route('profile',[Auth::id(),'section'=>'rooms']) }}">
                           <span class="item_icon"></span>
                       <span class="bold item_name">{{ $currentUser->type =='owner' ? trans('sovpal.MyRooms') : trans('sovpal.MyPortfolio')}}</span>
                   </a>
               </li>
            @endif

             @if($currentUser->type == 'owner' || $currentUser->type == 'shop' && $currentUser->items()->count() > 0)
                 <li>
                    <a class="link" href="{{ route('profile',[Auth::id(),'section'=>'groups']) }}">
                            <span class="item_icon"></span>
                        <span class="bold item_name">{{ trans('sovpal.MyGroups') }}</span>
                    </a>
                </li>
           {{-- MyProjects will be soon --}}
           {{-- MyGroups will  be soon --}}
            @endif

           <li>
               <a class="link" href="{{ url('logout') }}">
                   <span class="item_icon"></span>
                   <span class="bold item_name">{{ trans('sovpal.Logout') }}</span>
               </a>
           </li>
      </ul>
 </li> 
