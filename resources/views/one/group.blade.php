<div class="row nopadding {{$data->checkJoin($currentUser) ? 'alreadyAdd' : ''.$data->user_id == $currentUser->id ? 'myItem' : ''}}">
	<div class="col-md-12 text-center">
		<a href="{{ route('item', ['item' => $data['item']->slug]) }}">
		<img src="{{ asset('assets/images/items/'.$data->item->getImage('item')) }}" class="image-one-item" width="200px" ></a>
	</div>
	<div class="col-md-12">
	 <table class="table table-striped">
		 <tbody>
		 		<tr>
		 			<td class="row size12">{{ trans('sovpal.UserCount') }}</td>
		 			<td class="pull-right size18 bold">{{ $data->user_need }} </td>
		 		</tr>	 

		 		<tr>
		 			<td class="row size12">{{ trans('sovpal.Expire') }}</td>
		 			<td class="pull-right size18 bold">{{ $data->expire }} </td>
		 		</tr>		 		

		 		<tr>
		 			<td class="row size12">{{ trans('sovpal.JoinUsers') }}</td>
		 			<td class="pull-right size18 bold">{{ $data->user_count }} </td>
		 		</tr>

		 		<tr>
		 		    <td class="row size12">{{ trans('sovpal.Price') }}</td>
		 		    <td class="pull-right size18 bold">{{ $data->price . trans('sovpal.$') }}</td>
		 		</tr>
		 	
		 		<tr>
		 		    <td class="row size12">{{ trans('sovpal.Element') }}</td>
		 		    <td class="pull-right size18 bold">{{ trans('tags.'.$data['item']->element->name) }}</td>
		 		</tr>

			</tbody>
	</table> 
</div>

    @if($currentUser->id == $data->user_id)
         <div class="col-md-12 text-center full_green_label">
            <span class="size16 white_c">{{ trans('sovpal.MyGroup') }}</span>
        </div>
    @elseif(!$data->checkJoin($currentUser))
         <div class="col-md-offset-4 col-md-4 text-center">
         @include('layout.forms._basic.default',
         ['model' => 'action','method' => 'join','type'=>'modal','modal_data'=>null])

        <a type="button" class="btn red_c" data-toggle="modal" data-target="#action_join_modal">
         {{ trans('sovpal.JoinGroup') }}<i class="fa fa-plus fa-lg"></i>
        </a>
        </div>
    @else
        <div class="col-md-12 text-center full_red_label">
            <span class="size16 white_c">{{ trans('sovpal.AlreadyJoined') }}</span>
        </div>
    @endif

</div>
<br>
<br>

<h4 class="size18 text-center">{{ trans('sovpal.Groups') }} :</h4>
<p class="size12 text-center">{{ trans('sovpal.GroupList') }}</p>
<br>

<div id="rooms" class="row">
    <div class="room_list">
	    <table class="table table-striped">

	        @if(!$data['items']->isEmpty())
    			@include('layout.lists.users') 
			@else
				@include('layout.forms.ajax.empty_profile',['modal_data'=>null])
			@endif

		</table>
	</div>
</div>




