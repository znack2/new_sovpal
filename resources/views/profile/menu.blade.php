<div class="col-md-12 panel_menu">
    <ul class="menu text-center">

    {{------------------   Settings   ------------------}}

        <li class="menu_item {{ Request::input('section') == 'settings' ? 'active' : '' }}">
        <a class="link" href="{{ route('profile',['user'=>$data->slug,'section'=>'settings']) }}">
        <i class="visible-xs fa fa-cog"></i>
        <span class="hidden-xs">{{ trans('sovpal.'.$currentUser->id == $data->id ? 'Settings' : 'BasicInfo') }}</span>
        </a>
        </li>

    {{------------------ Mat/Tool   ------------------}}

        @if($data->type == 'owner')
            <li class="menu_item  {{ Request::input('type') == 'tools' ? 'active' : '' }}">
            <a class="link" href="{{ route('profile',['user'=>$data->slug,'section'=>'items','type'=>'tools']) }}">
            <i class="visible-xs fa fa-wrench"></i>
            <span class="hidden-xs">{{ trans('sovpal.'.$currentUser->id == $data->id ? 'MyTools' : 'Tools') }}</span>
            </a></li> 

             <li class="menu_item  {{ Request::input('type') == 'materials' ? 'active' : '' }}">
            <a class="link" href="{{ route('profile',['user'=>$data->slug,'section'=>'items','type'=>'materials']) }}">
            <i class="visible-xs fa fa-archive"></i>
            <span class="hidden-xs">{{ trans('sovpal.'.$currentUser->id == $data->id ? 'MyMaterials' : 'Materials') }}</span>
            </a></li>
        @endif

        {{------------------ Items/Orders   ------------------}}

        @if($data->type != 'profi')
            <li class="menu_item  {{ Request::input('type') == 'items' ? 'active' : '' }}">
            <a class="link" href="{{ route('profile',['user'=>$data->slug,'section'=>'items','type'=>'items']) }}">
            <i class="visible-xs fa fa-tags"></i>
            <span class="hidden-xs">
                @if($data->type == 'shop')
                    {{ trans('sovpal.'.$currentUser->id == $data->id ? 'MyItems' : 'Items') }}
                @elseif($data->type == 'owner')
                    {{ trans('sovpal.'.$currentUser->id == $data->id ? 'MyOrders' : 'Orders') }}
                @endif
            </span>
             </a></li>
        @endif

    {{------------------ Rooms   ------------------}}

        @if($data->type != 'shop')
            <li class="menu_item {{ Request::input('section') == 'rooms' ? 'active' : ''  }}">
            <a class="link" href="{{ route('profile',['user'=>$data->slug,'section'=>'rooms','type'=>'room']) }}">
            <i class="visible-xs fa fa-home"></i>
            <span class="hidden-xs">
            @if($data->type == 'owner')
                {{ trans('sovpal.'.$currentUser->id == $data->id ? 'MyRooms' : 'Rooms') }}
            @elseif($data->type == 'profi')
                {{ trans('sovpal.'.$currentUser->id == $data->id ? 'MyProjects' : 'Projects') }}
            @endif
            </span>
             </a></li>
        @endif


         {{------------------   Groups   ------------------}}


        @if($data->type == 'owner' || $data->type == 'shop' && $data->items()->count() > 0)
            <li class="menu_item  {{ Request::input('type') == 'groups'? 'active' : '' }}">
            <a class="link" href="{{ route('profile',['user'=>$data->slug,'section'=>'groups']) }}">
            <i class="visible-xs fa fa-users"></i>
            <span class="hidden-xs">{{ trans('sovpal.'.$currentUser->id == $data->id ? 'MyGroups' : 'Groups') }}</span>
            </a></li>
        @endif

    </ul>   
</div>

<div class="clearfix"></div> 




      
