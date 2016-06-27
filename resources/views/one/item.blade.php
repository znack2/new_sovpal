<div class="row nopadding {{$data->checkAdd($currentUser) ? 'alreadyAdd' : ''.$data->user_id == $currentUser->id ? 'myItem' : ''}}">
	<div class="col-md-12 text-center">
     	<img src="{{ asset('assets/images/items/'.$data->getImage('item')) }}" class="image-one-item" width="200px">
	</div>
	<div class="col-md-12">
	 <table class="table table-striped">
		 <tbody>
		         <tr>
		             <td class="row size12">{{ trans('sovpal.Category') }}</td>
		             <td class="pull-right size18 bold">{{ trans('tags.'.$data->getTag('category')) }}</td>
		         </tr>

		         <tr>
		             <td class="row size12">{{ trans('sovpal.Brand') }}</td>
		             <td class="pull-right size18 bold">{{ trans('tags.'.$data->getTag('brand')) }}</td>
		         </tr>

			 	@if($data->type == 'item')
			 		<tr>
			 		    <td class="row size12">{{ trans('sovpal.Style') }}</td>
			 		    <td class="pull-right size18 bold">{{ trans('tags.'.$data->getTag('style')) }}</td>
			 		</tr>
			 		<tr>
			 		    <td class="row size12">{{ trans('sovpal.DefaultPrice') }}</td>
			 		    <td class="pull-right size18 bold">{{ $data->default_price . trans('sovpal.$') }}</td>
			 		</tr>
			 	@elseif($data->type == 'tool')
			         <tr>
			             <td class="row size12">{{ trans('sovpal.Tool') }}</td>
			             <td class="pull-right size18 bold">{{ trans('tags.'.$data->getTag('tool') )}}</td>
			         </tr> 
			 	@endif
		 	
		 		<tr>
		 		    <td class="row size12">{{ trans('sovpal.Element') }}</td>
		 		    <td class="pull-right size18 bold">{{ trans('tags.'.$data->element->name) }}</td>
		 		</tr>
		 		<tr>
		 		    <td class="row size12">{{ trans('sovpal.Work') }}</td>
		 		    <td class="pull-right size18 bold">{{ trans('tags.'.$data->getTag('work')) }}</td>
		 		</tr>	

			</tbody>
	</table> 
</div>

    @if($currentUser->id == $data->user_id)
         <div class="col-md-12 text-center full_green_label">
            <span class="size16 white_c">{{ trans('sovpal.MyItem') }}</span>
        </div>
    @elseif(!$data->checkAdd($currentUser))
         <div class="col-md-offset-4 col-md-4 text-center">
             @include('layout.forms._basic.default',
            ['model' => 'action','method' => 'add','type'=>'modal','modal_data'=>null])

            <a type="button" class="btn red_c" data-toggle="modal" data-target="#action_add_modal">
             {{ trans('sovpal.AddItem') }}<i class="fa fa-cart-plus fa-lg"></i>
            </a>
        </div>
    @else
        <div class="col-md-12 text-center full_red_label">
            <span class="size16 white_c">{{ trans('sovpal.AlreadyAdd') }}</span>
        </div>
    @endif

</div>

<div class="sofaset-info">
	 <h4 class="text-center">{{ trans('sovpal.Description') }}</h4>
	 <p class="size12 lh16">{{ $data->description }}</p>
		 <div class="text-center">
		 	<a href="#conditions" class="btn link" data-toggle="collapse">{{ trans('sovpal.Details') }}</a>
		</div>
	 <hr>	 

	 <div id="conditions" class="collapse">
		 <h4 class="text-center">{{ trans('sovpal.PurchaseCondition') }} : </h4>
		 <p class="size12 lh16">{{ $data->order_condition }}</p>
	 </div>
 </div>

 <h4 class="size18 text-center">{{ trans('sovpal.Members') }} :</h4>
 <p class="size12 text-center">{{ trans('sovpal.UserList') }}</p>
 <br>

<div id="rooms" class="row">
    <div class="room_list">
	    <table class="table table-striped">
	        @if(isset($data['items']))
    			@include('layout.lists.groups') 
			@else
				@include('layout.forms.ajax.empty_profile',['modal_data'=>null])
			@endif
		</table>
	</div>
</div>

<p class="size12 lh16 text-center">{{ trans('sovpal.One_Help') }}</p>


