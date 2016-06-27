<div class="row">
    <div class="panel_menu">
        <ul class="menu_filter">
            @if($data->type =='owner')
                <li class="filter_item {{ Request::input('page') == 'rooms/#items' ? 'active' : ''   }}">
                    <a class="link" type="button" data-toggle="#items" data-target="#items">
                        <i class="fa fa-folder-o"></i>
                        <span>{{ trans('sovpal.Items') }}</span>
                    </a>
                </li>   

                <li class="filter_item {{ Request::input('page') == 'rooms/#items' ? 'active' : '' }}">
                    <a class="link"  type="button" data-toggle="#elements" data-target="#elements">
                        <i class="fa fa-folder-o"></i>
                        <span>{{ trans('sovpal.Elements') }}</span>
                    </a>
                </li>
            @endif
        </ul>
    </div>
</div>


@if('item')
<tr>
    <td><span class="maintext">{{ trans('sovpal.Item') }}</span></td>

        <td><span class="text">
            <a href="{{ route(Request::route()->getName(),
            ['user'=>$data->id,'section'=>Request::input('section'),'type'=> Request::input('type'),'sortBy'=>'title','direction' => (Request::input('direction') == 'desc') ? 'asc' : 'desc']) }}"
            class="link" >{{ trans('sovpal.Name') }}</a></span>
        </td>
        <td><span class="text">
            <a href="{{ route(Request::route()->getName(),
            ['user'=>$data->id,'section'=>Request::input('section'),'type'=> Request::input('type'),'sortBy'=>'default_price','direction' => (Request::input('direction') == 'desc') ? 'asc' : 'desc']) }}"
            class="link">{{ trans('sovpal.Price') }}</a></span>
        </td>
        <td><span class="text">
            <a href="{{ route(Request::route()->getName(),
            ['user'=>$data->id,'section'=>Request::input('section'),'type'=> Request::input('type'),'sortBy'=>'qty','direction' => (Request::input('direction') == 'desc') ? 'asc' : 'desc']) }}"
            class="link">{{ trans('sovpal.qty') }}</a></span>
        </td>

    <td><span class="text">{{ trans('sovpal.actions') }}</span></td>

</tr>
@else
@endif