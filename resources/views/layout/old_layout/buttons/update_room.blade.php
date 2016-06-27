@if($currentUser->id == $data->id)

@include('......forms._basic.default',
['model' => 'room','method' => 'update','type'=>'modal','title'=>'UpdateRoom'.trans('sovpal.'.$room->getTag('room')) . ' ?','model_id'=>$room->id])
	
@endif

<a class="minitext room_type" data-toggle="modal" data-target="#room_update_modal{{ isset($item)?$item->id:'' }}">
	@if($data->type == 'owner')
		{{  trans('tags.'.$room->getTag('room')) }}
	@elseif($data->type == 'profi' || $data->type == 'shop')
		{{ '('.$room->area .')'. str_limit($room->getRoomName(),8) }}
	@endif
</a>

{{-- '('.$room->area .')'. --}}