@if(Request::segment(2) == 'items')
  {{ 
    link('profile', ['user'=>$item->user->slug] , null, $item->user->first_name , 'user') . 
    link('item',    ['item'=>$item->slug,'page'=>'groups'] , null, 'Groups' .':'. $item->group_count) . 
    link('item',    ['item'=>$item->slug] , null, $item->price)
  }}
@elseif(Request::segment(2) == 'groups')
  {{
    link('group', ['group'=>$item->slug] ,null ,  'total_users' .':'. $item->user_need) . 
    link('group', ['group'=>$item->slug] ,null ,  'join_users' .':'. $item->user_count ) . 
    link('group', ['group'=>$item->slug] ,null ,  $item->price )
  }}
@elseif(Request::segment(2) == 'users')
  {{
     link('profile', ['user'=>$item->slug,'page'=>'items'] ,null ,  $item->type == 'owner' ? 'Items' : 'Materials')  .':'. $item->item_count) .
     link('profile', ['user'=>$item->slug,'page'=>'groups'] ,null , 'Groups' .':'. $item->type == 'owner' ? $item->my_group_count : $item->group_count) .
     link('profile', ['user'=>$item->slug,'page'=>'rooms'] ,null , $item->type == 'owner' ? 'Rooms' : 'Projects'.':'. $item->room_count) .
     link('profile', ['user'=>$item->slug] ,null,  $item->hour_cost )
   }}
@endif