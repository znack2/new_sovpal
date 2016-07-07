@extends('layout.app')
@section('content')

<!-- sidebar -->

    <div class="hidden-xs col-sm-3 col-md-offset-1 col-md-2">
       <div class="text-center">
         <span class="text">{{ trans('sovpal.LastLogin') }} : </span><br>
            {{ $data->getRecent('last_login') }}
         <div class="cc-selector">
           {{ checkCurrentUser($data->id) ? @include('layout.forms.ajax.avatar',['modal_data'=>$data]) : image($data) }} 
         </div>

         <div class="profile-usertitle">
            <div class="text bold">{{ checkCurrentUser($data) ? $data->first_name : trans('sovpal.MyProfile')}}</div>
            <div class="minitext bold">{{ $data->type }}</div>
         </div>
       </div>

        <div class="visible-sm col-sm-12">
            @include('layout.blogs')
        </div>
     </div>

<!-- main -->

<div class="col-xs-12 col-sm-8 col-md-6 panel">
    @include('profile.menu')  
<div class="row posting_block">
	<h4 class="size18 bold text-center">{{ trans('sovpal.'.Request::input('section')) }} :
  {{  dropdown(trans('sovpal.profile.'.$data->type .'.'. Request::input('section').'.Help'))  }}
    </h4>
    <br>
	<div id="rooms" class="col-md-12">
	    <div class="row room_list">
            <table class="table table-striped">
              @if(!$data['items']->isEmpty())

           <!-- items -->

                  @include('layout.lists.items')
              @elseif($currentUser->id == $data->id && $data->type == 'shop')
                  @include('layout.buttons.create_item',['item'=>null])
              @elseif($currentUser->id == $data->id)
                  {{link('items',['type'=>'items'],trans('sovpal.DiscoverNewItems'))}}
              @else
                  @include('layout.forms.ajax.empty_profile',['modal_data'=>null])

            <!-- Groups -->

                @include('layout.lists.groups') 
              @elseif($currentUser->id == $data->id && $data->type == 'shop' &&  $data->items()->count() == 0)
                <tr> <td>{{link('profile',['user'=>$data->slug,'page'=>'rooms'],trans('sovpal.FirstCreateItem'))}}</td> </tr> 
              @elseif($currentUser->id == $data->id && $data->type == 'shop' &&  $data->items()->count() > 0)
                @include('layout.buttons.create_group',['group'=>null])
              @elseif($currentUser->id == $data->id)
                {{link('groups',['type'=>'items'],trans('sovpal.DiscoverNewGroup'))}}
              @else
                @include('layout.forms.ajax.empty_profile',['modal_data'=>null])

            <!-- Rooms -->

                  @include('layout.lists.rooms') 
              @elseif($currentUser->id == $data->id)
                  @include('layout.buttons.create_room',['room'=>null])
              @else
                  @include('layout.forms.ajax.empty_profile',['modal_data'=>null])


                @include('layout.forms._basic.default',['model' => 'element','method' => 'store','type'=>'modal','modal_data'=>null])
                <div class="tab-content">
                    @foreach($data['rooms'] as $room)
                        <div class="tab-pane fade {{ $room->id == $data['rooms']->first()->id ? 'in active' : '' }} row" id="room_{{ $room->id }}">
                          @include('layout.forms._basic.default',
                          ['model' => 'element','method' => 'store','type'=>'modal','room_id'=> $room->id])

                          <div id="carousel" class="carousel slide hidden-xs" data-ride="carousel" data-interval="false">
                              <div class="carousel-inner">
                            
                                  {{-- elements --}}

                                  <div class="item active col-md-12" id="rooms">
                                  <h4 class="size18 bold text-center">
                                  {{ $data->type == 'owner' ? trans('tags.'.$room->getTag('room')) : str_limit($room->getRoomName(),20).trans('sovpal.Elements').dropdown(trans('sovpal.profile.ElementList')) }}
                                        </h4>
                                      <div class="row room_list">
                                              <table class="table table-striped">
                                                  @if(!$room['elements']->isEmpty())
                                                      @include('layout.lists.elements') 
                                                  @elseif($currentUser->id == $data->id)
                                                      @include('layout.buttons.create_element')
                                                  @else
                                                      @include('layout.forms.ajax.empty_profile',['modal_data'=>null])
                                                  @endif
                                              </table>
                                      </div>
                                  </div>
                              </div>
                          </div>
                        </div>
                    @endforeach 
                </div>

           <!-- settings -->

              @include('layout.forms._basic.default',['model' => 'user','method' => 'update','type'=>'','button'=>'SaveChanges','modal_data'=>null])

      	      @endif
      		</table>
  	</div>
  </div>
  <br>
</div>

<!-- footer -->

  <section class="col-md-12" id="footer_down">
      <div class="row">
          <div class="col-md-8 text-center">
            @foreach([] as $button_title)
              <div class="col-sm-4 col-md-4 text-center">
                <h4>{{ image($button_title) }}</h4>
                {{ dropdown(trans('sovpal.profile.'.$data->type.'.SettingHelp')) }}
              </div>  
            @endforeach
          </div>
          <div class="visible-sm hidden-md clearfix"></div>

          <div class="hidden-sm col-md-4 text-center">
              <h4 class="upper">{{ trans('Related Pages') }}</h4>
              <ul>
                <li>{{ link('pages', ['page'=>'premium'],  'pagepremium') }}</li>
                <li>{{ link('pages', ['page'=>'how'],    'pagepremium') }}</li>
                <li>{{ link('pages', ['page'=>'contacts'], 'pagepremium') }}</li>
              </ul>
          </div>
      </div>
      <br>
      <h5 class="row text-center">
          <ul class="list-inline bold upper">
              <li><span>2016</span></li>
              <li>{{ link('pages', ['page'=>'premium'],  'pagepremium') }}</li>
              <li>{{ link('pages', ['page'=>'how'],    'pagepremium') }}</li>
              <li>{{ link('pages', ['page'=>'contacts'], 'pagepremium') }}</li>
          </ul
      </h5>
  </section>

</div>
<div class="hidden-sm hidden-xs col-md-2">
  @include('layout.blogs')
</div>
@endsection