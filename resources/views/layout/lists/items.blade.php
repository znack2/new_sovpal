@foreach($data['items'] as $item)
    <tr>
        <td>
            <i class="{{ (Request::input('type') == 'materials' || Request::input('type') == 'tools' ? $item->private : $item->free) ? 'fa fa-lock' : null }}"/>
            <a href="{{ route('item',['item'=>$item->id]) }}">
            <div class="profile_button">
                <span style="position: absolute;" >{{ $item->id }}</span>
              <img src="{{ asset('assets/images/items/'.$item->images->get(['url']).'.'.$item->images->get(['file']) ) }}" class="button_image img-responsive" width="50px">
            </div>
            </a>
        </td>
        <td>
            <span class="size16 bold">{{ $item->title }}</span>
        </td>
        <td><span class="text">{{ $item->default_price . trans('sovpal.$') }}</span></td>
        <td class="hidden-xs" >
            @if($item->type == 'Material')
                <span class="text">{{ ($item->qty or trans('sovpal.some')) . trans('sovpal.kg') }}</span>
            @elseif($item->type == 'Tool')
                <span class="text">{{ $item->condition or trans('sovpal.New') }} </span>
            @else
                <p class="minitext">{{ trans('tags.'.$item->element->name) }}</p>
            @endif
        </td>
        <td class="text-center">
            @if($currentUser->id == $data->id)
                @if($item->type == 'item' && $data->type == 'shop' || $item->type != 'item' && $data->type == 'owner')
                    @include('layout.buttons.update_item')
                    @include('layout.buttons.remove_item')
                @else
                    @include('layout.buttons.remove_item')
                @endif
            @endif
            </td>
    </tr>
@endforeach

@if($currentUser->id == $data->id && $data->type == 'shop')
    @include('layout.buttons.create_item',['item'=>null])
@endif

@if(count($data['items'])>1)
    <tr>
        <td colspan="5" class="text-center">
            @include('layout.pagination',['paginator' => $data['items']->appends(
            ['section'=>Request::input('section'),'type'=>Request::input('type'),'direction'=>Request::input('direction'),'sortBy'=>Request::input('sortBy')])])
        </td>
    </tr>
@endif

