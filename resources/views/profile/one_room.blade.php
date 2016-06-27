@include('layout.forms._basic.default',
['model' => 'element','method' => 'store','type'=>'modal','room_id'=> $room->id])

<div id="carousel" class="carousel slide hidden-xs" data-ride="carousel" data-interval="false">
    <div class="carousel-inner">
  
        {{-- elements --}}

        <div class="item active col-md-12" id="rooms">
    		<h4 class="size18 bold text-center">
    			{{ $data->type == 'owner' ? trans('tags.'.$room->getTag('room')) : str_limit($room->getRoomName(),20) }}

        		{{ trans('sovpal.Elements') }} : 
                <div class="dropdown">
                        <a class="blue_c dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        <i class="fa fa-question-circle "></i></a>

                        <ul class="tooltip-dropdown  dropdown-menu" role="menu">
                            <li class="size10 blue_c text-center">{{ trans('sovpal.profile.ElementList') }}</li>
                        </ul>
                </div>
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