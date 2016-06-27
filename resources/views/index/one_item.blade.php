
<li class="content_one {{ $item->premium ? 'item_premium' : '' }}">

    {{-----------------  Image  --------------------}}

        <div class="col-md-2 col-sm-2 col-xs-12">
            @if($item->premium)
                <p class="icon-pro">{{ trans('sovpal.PRO') }}</p>
            @endif

            @if(Request::route()->getName() == 'items')
                   <a class="link" href="{{ route('item', ['item' => $item->slug]) }}">
                     <img src="{{ asset('assets/images/items/'.$item->images()->get(['url']).'.'.$item->images()->get(['file'])) }}"
                     alt="icon" class="image-one-item" width="100" height="100">
                   </a>
            @elseif(Request::route()->getName() == 'groups')
             <a class="link" href="{{ route('group', ['group' => $item->slug]) }}"> 
               <img src="{{ asset('assets/images/items/'.$item->images->get(['url']).'.'.$item->images->get(['file'])) }}"
               alt="icon" class="image-one-item" width="100" height="100">
             </a> 
            @else
                 <a class="link" href="{{ route('profile', ['user' => $item->slug]) }}"> 
                   <img src="{{ asset('assets/images/users/'.$item->images->get(['url']).'.'.$item->images->get(['file'])) }}"
                   alt="icon" class="image-one-item" width="100" height="100">
                 </a> 
            @endif
           <div class="index_icons text-center">
               @if(Request::segment(2) == 'items')
                       @if(Request::input('type') == 'tools' ||  Request::input('type') == 'materials')
                         <img class="inline" width="20px" height="20px" src="{{ asset('assets/images/icons/item_form/free'.$item->free) }}.png">
                         <img class="inline" width="20px" height="20px"  src="{{ asset('assets/images/icons/item_form/condition/'.$item->condition) }}.png">
                       @endif
               @elseif(Request::segment(2) == 'groups')
                       <img class="inline" width="20px" height="20px"  src="{{ asset('assets/images/icons/expires'.$item->expires) }}.png">
                       <img class="inline" width="20px" height="20px"  src="{{ asset('assets/images/icons/user_count'.$item->user_need) }}.png">
               @else
                     @if(Request::input('type') == 'owners')
                         <img class="inline" width="20px" height="20px"  src="{{ asset('assets/images/icons/setting_form/own/own'.$item->own_remont) }}.png">
                         <img class="inline" width="20px" height="20px"  src="{{ asset('assets/images/icons/setting_form/designer/with'.$item->with_designer) }}.png">
                     @elseif(Request::input('type') == 'profis')
                          @foreach($item->getTags('skill') as $skill)
                             <img class="inline" width="20px" height="20px"  src="{{ asset('assets/images/tags/skill/'.$skill->name) }}.png">
                          @endforeach
                     @endif
               @endif
           </div>
        </div>

    <div class="col-md-10 col-sm-10 col-xs-12">
        <div class="content_description">

       {{-----------------  ITEM  --------------------}}.

                  @if(class_basename($item) == 'Item')
                     <div class="content">
                         <div class="pull-left">
                             <a class="link" href="{{ route('item', ['item' => $item->slug]) }}">
                             <span class="bold">{{ trans('tags.'.$item->element->name) }} : </span><span class="blue_c bold size20">{{ str_limit($item->title,20) }}</span> </a><br>
                             <span class="bold lh15">{{ str_limit($item->description,80) }}</span>
                         </div>
                         <div class="pull-right" id="price">
                             <a href="{{ route('item', ['item' => $item->slug]) }}" class="link title bold">{{ $item->default_price }}
                             <span>{{  trans('sovpal.$') }}</span>
                             </a>
                         </div>
                     </div>
                     <div class="clearfix"></div>


                       <div class="second_content content">
                       <hr class="hr">
                           <div class="pull-left">
                            <span class="size12">{{ trans('sovpal.Shop') }} : </span>
                            <a class="size16 bold blue_c" href="{{ route('profile',['user'=>$item->user->slug,'section'=>'items']) }}">{{ $item->user->first_name }}</a>
                           </div>
                           <div class="pull-right">
                               @if($item->type == 'tool')
                                 <strong class="red_c size16">{{ $item->returnDate() }}</strong>
                               @elseif($item->type == 'material')
                                 <strong class="red_c size16">{{ trans('sovpal.leftMaterials') .':'. $item->leftMaterials() }}</strong>
                               @elseif($item->type == 'item')
                                  <strong class="red_c size16">{{ $item->getCurrentGroup() }})</strong>
                               @endif
                           </div>
                       </div>

       {{-----------------  GROUP  --------------------}}

                   @elseif(class_basename($item) == 'Group')
                       <div class="content">
                           <div class="pull-left">
                               <a class="link" href="{{ route('group', ['group' => $item->slug]) }}"> 
                               <span class="bold size20">{{ $item->getExpires() }}</span> </a><br>
                               <span>{{ trans('sovpal.Item') }} : </span><span class="bold">{{ str_limit($item->item->title,20) }}</span>
                               (<span class="size14 bold">{{ trans('tags.'.$item->item->element->name) }}</span>)<br>
                           </div>
                           <div class="pull-right" id="price">
                               <a href="{{ route('group',['group' => $item->slug]) }}" class="link size18 bold">{{ $item->price . trans('sovpal.$') }}
                               </a><br>
                               <span class="pull-right blue_c size14">{{ trans('sovpal.perPerson') }}</span>
                           </div>
                       </div>
                       <div class="clearfix"></div>

                       <hr class="hr">

                       <div class="second_content content">
                           <div class="pull-left">
                            <span class="size12">{{ trans('sovpal.Shop') }} : </span><span class="size16 bold">{{ $item->user->first_name }}</span><br>
                           </div>
                           <div class="pull-right">
                               <span class="red_c bold size16">{{ $item->leftUsers() }}</span>
                           </div>
                       </div>

       {{-----------------  USER  --------------------}}

                   @else
                       <div class="content">
                           <div class="pull-left">
                               <a class="link" href="{{ route('profile', ['user' => $item->slug]) }}">
                               <span class="bold size20">{{ str_limit($item->first_name . ' ' . $item->last_name,20)  }}</span></a><br>
                           </div>

                           <div class="pull-right" id="price">
                            @if($item->type == 'profi')
                               <a href="{{ route('profile', ['user' => $item->slug,'page'=>'rooms']) }}" class="link title bold">
                                   <h4>{{ $item->hour_cost != 0 ? ($item->hour_cost . trans('sovpal.$')) : trans('sovpal.NoDataPrice') }}</h4>
                               </a>
                            @elseif($item->type == 'owner')
                                 <a href="{{ route('profile', ['user' => $item->slug,'page'=>'rooms']) }}" class="link title bold">
                                   <h4>
                                       @if($item->rooms->count() > 0)
                                         {{ $item->rooms->count() . ($item->rooms->count() == 1 ? trans('sovpal.Room') : trans('sovpal.Rooms')) }}
                                       @else
                                         {{ trans('sovpal.NoDataRooms') }}
                                       @endif
                                    </h4>
                                 </a>
                             @endif
                           </div>
                       </div>
                       <br>
                       <div class="second_content content">
                       <hr class="hr">
                         <div class="content">
                             <span class="bold">{{ trans('sovpal.level') .' : '. $item->getLevel() }}</span><br>

                            @if($item->type == 'owner')
                                 <span class="size12"><i class="red_color fa fa-users"></i>
                                 {{ trans('sovpal.Groups') }} : </span><span class="size14 bold">{{ $item->join_count }}</span>|
                            @elseif($item->type == 'shop')
                                 {{ trans('sovpal.Groups') }} : </span><span class="size14 bold">{{ $item->group_count }}</span><br>
                            @endif

                            @if($item->type == 'owner')
                                 <span class="size12"><i class="red_color fa fa-users"></i>
                                 {{ trans('sovpal.Materials') }} : </span><span class="size14 bold">{{ $item->material_count }}</span>|

                                 <span class="size12"><i class="red_color fa fa-users"></i>
                                 {{ trans('sovpal.Tools') }} : </span><span class="size14 bold">{{ $item->tool_count }}</span>
                            @elseif($item->type == 'shop')
                                <span class="size12"><i class="red_color fa fa-users"></i>
                                 {{ trans('sovpal.Items') }} : </span><span class="size14 bold">{{ $item->item_count }}</span>
                            @endif

                             <br>
                         </div>
                          <div class="pull-left">
                                <span class="size12">{{ trans('sovpal.Address') }} :</span><span class="size16 bold">{{ $item->getAddress() }}</span><br>
                          </div>
                          <div class="pull-right">
                                <span class="red_c bold size14"><strong class="size16">{{ $item->getRecent('updated_at') }}</strong></span>
                          </div>
                       </div>
                   @endif
        </div>
    </div>
</li>
