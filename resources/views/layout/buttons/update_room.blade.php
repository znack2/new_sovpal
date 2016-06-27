@if($currentUser->id == $data->id)

@include('layout.forms._basic.default',
['model' => 'room','method' => 'update','type'=>'modal','title'=>'UpdateRoom'.trans('sovpal.'.$room->getTag('room')) . ' ?','data'=>$room])
	
@endif

<a class="minitext room_type" data-toggle="modal" data-target="#room_update_modal{{ $item->id or '' }}">
	{{$data->type == 'owner' ? trans('tags.'.$room->getTag('room')) : '('.$room->area .')'. str_limit($room->getRoomName(),8))}}
</a>
