<div class="col-md-12 panel_menu">
    <ul class="menu text-center">

        <li class="menu_item {{ active('settings') }}">
        {{  link('profile',['user'=>$data->slug,'section'=>'settings'],'<i class="visible-xs fa fa-cog"></i>',
        checkCurrentUser($data,'Settings','BasicInfo') }}
        </li>

        @if($data->type == 'owner')
            <li class="menu_item  {{ active('materials') }}">
            {{ link('profile',['user'=>$data->slug,'section'=>'items','type'=>'materials'],'<i class="visible-xs fa fa-archive"></i>',
            checkCurrentUser($data,'MyMaterials','Materials'))) }}</li> 

             <li class="menu_item  {{ active('tools') }}">
            {{ link('profile',['user'=>$data->slug,'section'=>'items','type'=>'tools'],'<i class="visible-xs fa fa-wrench"></i>',
            checkCurrentUser($data,'MyTools','Tools'))) }}</li>
        @endif

        @if($data->type != 'profi')
            <li class="menu_item  {{ active('items') }}">
            {{ link('profile',['user'=>$data->slug,'section'=>'items','type'=>'items'],'<i class="visible-xs fa fa-tags"></i>',
            checkCurrentUser($data, $data->type == 'shop' ? 'MyItems' : 'MyOrders', $data->type == 'owner' ? 'Orders' :'Items')) ) }}
            </li>
            @if($data->items()->count() > 0)
                <li class="menu_item  {{ active('groups') }}">
                {{ link('profile',['user'=>$data->slug,'section'=>'groups'],'<i class="visible-xs fa fa-users"></i>', 
                checkCurrentUser($data,'MyGroups','Groups'))) }}</li>
            @endif
        @endif

        @if($data->type != 'shop')
            <li class="menu_item {{ active('rooms')  }}">
            {{ link('profile',['user'=>$data->slug,'section'=>'rooms','type'=>'room'],'<i class="visible-xs fa fa-home"></i>',
            checkCurrentUser($data,$data->type == 'owner' ? 'MyRooms' : 'MyProjects', $data->type == 'profi' ? 'Projects' :'Rooms'))) }}
            </li>
        @endif

    </ul>   
</div>
<div class="clearfix"></div> 




      
