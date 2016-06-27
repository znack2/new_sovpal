<div class="panel_menu">

    @if(URL::previous() == route('items') || URL::previous() == route('users') || URL::previous() == route('groups'))
        <a class="hidden-xs" href="{{ URL::previous() }}"><div class="round_icon"><i class="fa fa-arrow-left fa-lg"></i>
        <span class="menu_back">{{ trans('back') }}</span></div></a>
    @endif
        <span class="red_c bold size18">
            @if(class_basename($data) == 'Item')
                {{ trans('sovpal.'.$data->type) .':'. $data->title }}
            @else
                <span class="red_c bold size18">{{ trans('sovpal.GroupforItem') }} :
                <a class="link" href="{{ route('item',['item'=>$data['item']->slug]) }}">{{ str_limit($data['item']->title,15)  }}</a>
                </span>
            @endif
        </span>
    	<span class="pull-right item_price">
            <span>{{ trans('sovpal.from') }}</span>
            <span class="blue_c bold size26">{{ $data->default_price }}</span>
            <span>{{ trans('sovpal.$') }}</span>
    	</span>

    <a class="visible-xs grey_c bold" href="{{ route('profile',['user'=>$data->user->slug,'section'=>'items','type'=>$data->type.'s']) }}">
    {{ trans('sovpal.Shop') .' : '. $data->user->first_name }}</a>

</div>

<div class="clearfix"></div> 



