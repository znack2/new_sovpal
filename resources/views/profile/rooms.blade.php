@extends('layout.app')

@section('content')

@include('profile.sidebar')

<div class="col-xs-12 col-sm-8 col-md-6 panel">
    @include('profile.menu')  
<div class="row posting_block">

	<h4 class="size18 bold text-center">{{ trans('sovpal.'.Request::input('section')) }} :
    <div class="dropdown">
        <a class="blue_c dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
        <i class="fa fa-question-circle"></i></a>
        <ul class="dropdown-menu" role="menu">
            <li class="size10 blue_c text-center">
                {{ trans('sovpal.profile.'.$data->type .'.'. Request::input('section').'.Help') }}
            </li>
        </ul>
    </div>
    </h4>
    <br>

	<div id="rooms" class="row">
	    <div class="col-md-12 room_list">

		    @if(!$data['rooms']->isEmpty())
		        @include('layout.lists.rooms') 
		    @elseif($currentUser->id == $data->id)
		        @include('layout.buttons.create_room',['room'=>null])
		    @else
		        @include('layout.forms.ajax.empty_profile',['modal_data'=>null])
		    @endif

	    </div>
	</div>
	<br> 

	@include('layout.forms._basic.default',['model' => 'element','method' => 'store','type'=>'modal','modal_data'=>null])

	<div class="tab-content">

	    @foreach($data['rooms'] as $room)
	        <div class="tab-pane fade {{ $room->id == $data['rooms']->first()->id ? 'in active' : '' }} row" id="room_{{ $room->id }}">
		      	@include('profile.one_room')
	        </div>
	    @endforeach 
	</div>

</div>
    @include('profile.footer')
</div>

<div class="hidden-sm hidden-xs col-md-2">
	@include('layout.blogs')
</div>

@endsection


   