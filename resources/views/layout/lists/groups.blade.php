{{-- @include('layout.lists.filter') --}}
{{-- @include('layout.lists.sort') --}}

@foreach($data['items'] as $group)
    <tr>
        <td style="padding:5px 15px 5px 20px;width:60px;">
              <div class="row text-center">
                  @if($currentUser->id == $group->user_id && $data->type == 'shop')
                      @if(!$group->active)
                        @include('layout.buttons.remove_group')
                      @else
                        @include('layout.buttons.update_group')
                      @endif
                  @elseif( $group->CheckJoin($currentUser) )
                    @include('layout.buttons.join',['remove'=>'true','data'=>$group])
                  @else
                    @include('layout.buttons.join',['data'=>$group])
                    {{-- <h3 class="size16 red_color text-center"><i class="fa fa-arrow-left"></i>{{ trans('Be first in this group') }}</h3> --}}
                  @endif
                <br>
              </div>
              <div class="row text-center">
                  <a class="link size12" href="{{ route('group',['group'=>$group->id]) }}">{{ trans('sovpal.Details') }}</a>
              </div>
        </td>

        <td colspan="2">
            <div class="progress">
                <span class="grey_c size12"><i class="fa fa-user"></i> {{ $group->user_count . trans('sovpal.JoinUsers') }}</span>
                <div data-percentage="{{ $group->progress }}%" style="width: {{ $group->progress }}%;" 
                class="row progress-bar progress-bar-success progress-bar-striped" role="progressbar">
                </div>
            </div>
            <div class="grey_c size12" style="margin-top: 5px;">
                <span class="pull-left"><i class="fa fa-clock-o"></i> {{ $group->getExpires() }}</span>
                <span class="pull-right grey_c">{{ $group->price . trans('sovpal.$') }}</span>
            </div>
        </td>
    </tr>
@endforeach

<tr>
    <td colspan="5" class="text-center">
        @if(count($data['items'])>1)
          @include('layout.pagination',['paginator' => $data['items']->appends(
          ['section'=>Request::input('section'),'type'=>Request::input('type'),'direction'=>Request::input('direction'),'sortBy'=>Request::input('sortBy')])])
        @endif
    </td>
</tr>
