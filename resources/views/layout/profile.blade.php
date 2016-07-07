<li class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
      {{ image($currentUser,'avatar_photo') }}
    <b>{{ $currentUser->first_name or trans('sovpal.Profile') }}</b><span class="caret"></span></a>

      <ul id="login-dp profile-dp" class="dropdown-menu" role="menu">
           <li>{{ link(route('profile',[Auth::id(),'section'=>'settings'],'ViewProfile') }}</li>
           <li class="divider" aria-hidden="true"></li>
            @if($currentUser->type == 'owner')
                 <li>{{ link(route('profile',[Auth::id(),'section'=>'items','type'=>'tools'],'MyTools') }}</li>
                 <li>{{ link(route('profile',[Auth::id(),'section'=>'items','type'=>'materials'],'MyMaterials') }}</li>
             @endif

            @if($currentUser->type != 'profi')
                <li>{{ link(route('profile',[Auth::id(),'section'=>'items','type'=>'items'],$currentUser->type =='shop' ? 'MyItems' : 'MyOrders') }}</li>
            @endif

            @if($currentUser->type != 'shop')
                <li>{{ link(route('profile',[Auth::id(),'section'=>'rooms'],$currentUser->type =='owner' ? 'MyRooms' : 'MyPortfolio') }}</li>
            @endif

             @if($currentUser->type == 'owner' || $currentUser->type == 'shop' && $currentUser->items()->count() > 0)
                 <li>{{ link(route('profile',[Auth::id(),'section'=>'groups'],'MyGroups') }}</li>
                  {{-- MyProjects will be soon --}}
                  {{-- MyGroups will  be soon --}}
            @endif
           <li>{{ link(url('logout'),null,'Logout') }}</li>
      </ul>
 </li> 
