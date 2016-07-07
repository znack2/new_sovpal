<div class="row">
    <div class="panel_menu">
        <ul class="menu_filter">
            @if($data->type =='owner')
                <li class="filter_item {{ active('rooms/#items') }}">
                    {{ button('#items', data-target="#items",'<i class="fa fa-folder-o"></i>', 'Items')}}
                </li>   
                <li class="filter_item {{ active('rooms/#items') }}">
                    {{ button(,'<i class="fa fa-folder-o"></i>', 'Elements')}}
                </li>
            @endif
        </ul>
    </div>
</div>

@if('item')
    <tr>
        <td><span class="maintext">{{ trans('sovpal.Item') }}</span></td>
            <td><span class="text">
                {{ link(route(Request::route()->getName(),
                    ['user'=>$data->id,
                    'section'=>Request::input('section'),
                    'type'=> Request::input('type'),
                    'sortBy'=>'title',
                    'direction' => (Request::input('direction') == 'desc') ? 'asc' : 'desc']),null, 'Name')}}</span>
            </td>
            <td><span class="text">
                {{ link(route(Request::route()->getName(),
                ['user'=>$data->id,
                'section'=>Request::input('section'),
                'type'=> Request::input('type'),
                'sortBy'=>'default_price',
                'direction' => (Request::input('direction') == 'desc') ? 'asc' : 'desc']),null, 'Price')}}</span>
            </td>
            <td><span class="text">
                {{ link(route(Request::route()->getName(),
                ['user'=>$data->id,
                'section'=>Request::input('section'),
                'type'=> Request::input('type'),
                'sortBy'=>'qty',
                'direction' => (Request::input('direction') == 'desc') ? 'asc' : 'desc']),null, 'qty')}}</span>
            </td>
            <td><span class="text">{{ trans('sovpal.actions') }}</span></td>
    </tr>
@else
@endif