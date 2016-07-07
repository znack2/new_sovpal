
@foreach($data['rooms'] as $room)
	@include('layout.buttons.update_room')
	<div class="profile_button">
			{{ link('#room_'.$room->id ,image($room), 'Details')}} //data-toggle="tab"
	  	@if(checkCurrentUser($data->id))
	  		@include('layout.buttons.remove_room')
		@endif
	</div>
@endforeach 

@if(checkCurrentUser($data->id))
    @include('layout.buttons.create_room',['room'=>null])
@endif