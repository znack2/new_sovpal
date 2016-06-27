
@foreach($data['rooms'] as $room)
	@include('layout.buttons.update_room')
	<div class="profile_button">
			<a class="link" href="#room_{{ $room->id }}" data-toggle="tab">
			<img src="{{ asset('assets/images/tags/room/'.$room->getTag('room')) }}.png" 
			class="button_image img-responsive" style="width:46px;height:46px;padding:2px;"></a>
	  	@if($currentUser->id == $data->id)
	  		@include('layout.buttons.remove_room')
		@endif
	</div>
@endforeach 

@if($currentUser->id == $data->id)
    @include('layout.buttons.create_room',['room'=>null])
@endif