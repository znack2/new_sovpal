{{--items - shop/groups/price--}}
@if(Request::segment(2) == 'items')
  <a href="{{ route('profile',['user'=>$item->user->slug]) }}" class="link btn btn-blog"> <i class="fa fa-user"> {{ $item->user->first_name }}</i></a>
  <a href="{{ route('item',['item'=>$item->slug,'page'=>'groups']) }}" class="link btn btn-blog">{{ trans('sovpal.Groups') .':'. $item->group_count }}</a>
  <div class="pull-right">
      <a href="{{ route('item',['item'=>$item->slug]) }}" class="{{$item->default_price != 0 ? 'link' : 'green_c'}} size18 bold">
      {{ $item->default_price != 0 ? $item->default_price . trans('sovpal.$') : trans('sovpal.Free')}}</a>
  </div>
  {{--groups - user need/user count /price --}}
@elseif(Request::segment(2) == 'groups')
	<a href="{{ route('group',['group'=>$item->slug]) }}" class="link btn btn-blog">{{ trans('sovpal.total_users') .':'. $item->user_need }}</a>
	<a href="{{ route('group',['group'=>$item->slug]) }}" class="link btn btn-blog">{{ trans('sovpal.join_users') .':'. $item->user_count }}</a>
	<div class="pull-right">
        <a href="{{ route('group',['group'=>$item->slug]) }}" class="{{ $item->price != 0 ? 'link' : 'green_c' }} size18 bold">
        {{ $item->expire != 0 ? $item->price . trans('sovpal.$') : trans('sovpal.Free') }}</a>
	</div>
	{{--users - item count / groups count / room or projects count / price--}}
@elseif(Request::segment(2) == 'users')

    <a href="{{ route('profile',['user'=>$item->slug,'page'=>'items']) }}" class="link btn btn-blog">
    {{ $item->type == 'owner' ? trans('sovpal.Items') : trans('sovpal.Materials')  .':'. $item->item_count }} </a>

    <a href="{{ route('profile',['user'=>$item->slug,'page'=>'groups']) }}" class="link btn btn-blog">
    {{ trans('sovpal.Groups') .':'. $item->type == 'owner' ? $item->my_group_count : $item->group_count}} </a>

	<a href="{{ route('profile',['user'=>$item->slug,'page'=>'rooms']) }}" class="link btn btn-blog">
	{{ trans('sovpal.' .$item->type == 'owner' ? 'Rooms' : 'Projects').':'. $item->room_count }} </a>

	<div class="pull-right">
            <a href="{{ route('profile',['user'=>$item->slug]) }}" class="{{$item->hour_cost != 0 ? 'link' : 'green_c'}} size18 bold">
            {{ $item->hour_cost != 0 ? $item->hour_cost . trans('sovpal.$') : trans('sovpal.See_more')}}</a>
	</div>
@endif