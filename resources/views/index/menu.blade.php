<div class="panel_menu">
<ul class="menu">
   @if($currentUser->type != 'profi')
        <li class="menu_item {{ active(route('groups'),'items') }}"> {{ link('groups',[], null, 'Groups')}} </li>
        <li class="menu_item {{ active(route('items'),'items') }}"> {{ link('items',[], null, 'Items')}} </li> 
  @endif

  @if($currentUser->type == 'owner')
      <li class="menu_item {{ active(route('items'),'tools') }}"> {{ link('items',['type'=>'tools'], null, 'Tools')}} </li>
      <li class="menu_item {{ active(route('items'),'materials') }}"> {{ link('items',['type'=>'materials'], null, 'Materials')}} </li>
  @endif
      <li class="menu_item {{ active(route('users'),'owners') }}">

       {{ link('users',['type'=>'owners'],null, 
            @if($currentUser->type == 'shop')
             trans('sovpal.Buyers') 
            @elseif($currentUser->type == 'profi')
             trans('sovpal.Clients') 
            @elseif($currentUser->type == 'owner')
             trans('sovpal.Neighbors') 
            @endif
        )}}
      </li>

      @if($currentUser->type == in_array('owner','profi'))
          <li class="menu_item {{ active(route('users'),'profis') }}"> {{ link('users',['type'=>'profis'],null, 'Designers')}} </li> 
      @endif

      @if($currentUser->type != 'profi')
          <li class="menu_item {{ active(route('users'),'shops') }}"> {{ link('users',['type'=>'shops'],null, 'Shops')}} </li>
      @endif
      
        <li class="pull-right menu_item">
        {{ link('profile',['user'=>$currentUser->slug,'section'=>'items','type'=>$currentUser->type == 'shop' ? 'items' : 'materials'],'<i class="visible-sm fa fa-plus"></i>', 'AddItem')}}
        </li>
    </ul>  
</div>
<div class="clearfix"></div>
<br> 


