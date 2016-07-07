@extends('layout.app')
@section('content')

@include('index.sidebar')

    <div class="col-xs-12 col-sm-12 col-md-8 panel">

            <div class="hidden-xs col-sm-12 col-md-12 nopadding">
              @include('index.menu')
            </div>

            <div class="clearfix"></div>

            <div class="banner_content">
                 @include('layout.forms.ajax.search_index')
                 @include('index.sort')
            </div>

				    <ul id="listdisplay" class="col-md-12 clearfix">

                          @forelse ($data['items'] as $item)
                            <li class="content_one {{ $item->premium or '' }}">

                                    <div class="col-md-2 col-sm-2 col-xs-12">
                                        @if($item->premium)
                                            <p class="icon-pro">{{ trans('sovpal.PRO') }}</p>
                                            <span class="bold">{{ trans('sovpal.level') .' : '. $item->getLevel() }}</span>
                                        @endif
                                        @if(Request::route()->getName() == 'items')
                                            {{ link('item', ['item' => $item->slug], null, $item) }}
                                        @elseif(Request::route()->getName() == 'groups')
                                            {{ link('group', ['group' => $item->slug], null, $item) }}
                                        @else
                                            {{ link('profile', ['user' => $item->slug], null, $item) }}
                                        @endif
                                       <div class="index_icons text-center">
                                           @if(Request::segment(2) == 'items')
                                               @if(Request::input('type') == 'tools' ||  Request::input('type') == 'materials')
                                                 {{ image($item,'free') . image($item,'condition') }}
                                               @endif
                                           @elseif(Request::segment(2) == 'groups')
                                                {{ image($item,'expires') . image($item,'user_need') }}
                                           @else
                                               @if(Request::input('type') == 'owners')
                                                 {{ image($item,'own_remont') . image($item,'with_designer') }}
                                               @elseif(Request::input('type') == 'profis')
                                                  @foreach($item->getTags('skill') as $skill)
                                                    {{ image($item,'skill') }}
                                                  @endforeach
                                               @endif
                                           @endif
                                       </div>
                                    </div>

                                <div class="col-md-10 col-sm-10 col-xs-12">
                                    <div class="content_description">          
                                         <div class="content">
                                             <div class="pull-left">
                                                  @if(class_basename($item) == 'Item')
                                                      {{ link('item', ['item' => $item->slug], null, trans('tags.'.$item->element->name).str_limit($item->title,20)) }}
                                                  @elseif(class_basename($item) == 'Group')
                                                      {{ link('profile',['user'=>$item->user->slug,'section'=>'items'],null, $item->getExpires()) }}
                                                  @else     
                                                      {{ link('profile', ['user' => $item->slug], null, str_limit($item->first_name . ' ' . $item->last_name,20)) }}
                                                  @endif
                                                  <br>
                                                     <span class="bold lh15">{{ str_limit($item->description,80) }}</span>

                                                     <span>{{ trans('sovpal.Item') }} : </span><span class="bold">{{ str_limit($item->item->title,20) }}</span>
                                                     (<span class="size14 bold">{{ trans('tags.'.$item->item->element->name) }}</span>)
                                             </div>
                                             <div class="pull-right" id="price">
                                                   @if(class_basename($item) == 'Item')
                                                       {{ link('item', ['item' => $item->slug],null, $item->price.trans('sovpal.$')) }}
                                                   @elseif(class_basename($item) == 'Group')
                                                       {{ link('group', ['group' => $item->slug], null, $item->price.trans('sovpal.$')) }}
                                                       <br>
                                                       <span class="pull-right blue_c size14">{{ trans('sovpal.perPerson') }}</span>
                                                   @else
                                                       {{ link('profile', ['user' => $item->slug,'page'=>'rooms'],null, $item->type == 'profi' ? $item->hour_cost . trans('sovpal.$') : $item->rooms->count() . trans('sovpal.Room')) }}
                                                   @endif
                                             </div>
                                         </div>

                                            <div class="clearfix"></div>
                                                 <div class="second_content content">
                                                     <hr class="hr">
                                                     <div class="pull-left">
                                                      <span class="size12">{{ trans('sovpal.Groups/Materials/Tools/Items/Shop/Address') }} : </span> 
                                                      {{ link('profile',['user'=>$item->user->slug,'section'=>'items'],null, $item->user->first_name) }} // $item->getAddress()
                                                     </div>
                                                     <div class="pull-right">
                                                            <strong class="red_c size16">{{ 
                                                              $item->type == 'tool'     : $item->returnDate() : 
                                                              $item->type == 'material' : trans('sovpal.leftMaterials') .':'. $item->leftMaterials() : 
                                                              $item->type == 'item'     : $item->getCurrentGroup() 
                                                              $item->type == 'group'    : $item->leftUsers()
                                                              $item->type == 'user'     : $item->getRecent('updated_at')
                                                              $item->type == 'shop'     : $item->material_count
                                                              $item->type == 'shop'     : $item->tool_count
                                                              $item->type == 'shop'     : $item->item_count
                                                              $item->type == 'shop'     : $item->group_count
                                                              $item->type == 'shop'     : $item->join_count
                                                              }}
                                                            </strong>
                                                     </div>
                                                 </div>
                                             </div>
                                         @endif
                                    </div>
                                </div>
                            </li>

                          @empty
                              <li class="empty_result text-center">
                                  @include('layout.forms._basic.default', ['model' => 'ajax','method' => 'empty_index','type'=>null,'modal_data'=>null])
                              </li>
                              <li class="empty_result text-center">
                                  <div class="col-md-12">
                                        @foreach($last_items as $item)
                                            <div class="col-md-4">
                                              <h3 class="text-center">{{ $item->title }}</h3>
                                              {{ image($item,'item') }}
                                            </div>
                                        @endforeach
                                    </div>
                              </li>
                          @endforelse

            <div class="col-md-offset-3 col-md-6 text-center">
                @if(count($data['items'])>1)
                        @include('layout.pagination',['paginator' => $data['items']->appends(
                        ['direction'=>Request::input('direction'),
                        'sortBy'=>Request::input('sortBy'),
                        'search'=>Request::input('search'),
                        'limitBy'=>Request::input('limitBy'),
                        'tag'=>Request::input('tag'),
                        'element'=>Request::input('element'),
                        'type'=>Request::input('type')])])
                @endif
            </div>

		        </ul>
            <div class="clearfix"></div>
        @include('layout.big_footer')
    </div>

  <div class="hidden-sm hidden-xs col-md-2">
      @include('layout.blogs')
  </div>

@endsection


