@extends('layout.app')
@section('content')
@include('one.sidebar')
	
	<div class="col-xs-12 col-sm-8 col-md-5 panel">

<!-- menu -->

		<div class="panel_menu">

		    @if(url()->previous() == in_array([route('items'),route('users'),route('groups')]))
		        {{ link( url()->previous(), <i class="fa fa-arrow-left fa-lg"></i>, 'Back') }}
		    @endif
		        <span class="red_c bold size18">
		            @if(class_basename($data) == 'Item')
		                {{ trans('sovpal.'.$data->type) .':'. $data->title }}
		            @else
		                <span class="red_c bold size18">{{ trans('sovpal.GroupforItem') }} :
		                    {{ link('item',['item'=>$data['item']->slug], null ,str_limit($data['item']->title,15)) }}
		                </span>
		            @endif
		        </span>
		    	<span class="pull-right item_price">
		            <span class="blue_c bold size26">{{ trans('sovpal.from') . $data->price . trans('sovpal.$') }}</span>
		    	</span>
		        {{ link('profile',['user'=>$data->user->slug,'section'=>'items','type'=>$data->type.'s'],null , 'Shop') }}
		        // + : + $data->user->first_name
		</div>

<!-- item -->

		<div class="clearfix"></div> 
		<div class="posting_block tab-content">
			//{{$data->checkJoin($currentUser)}}
			<div class="row nopadding {{$data->checkAdd($currentUser) ? 'alreadyAdd' : ''.checkCurrentUser($data->user_id,'myItem','')}}">
				<div class="col-md-12 text-center">
			     	{{ link('item',['item' => $data['item']->slug], image($data) , $data->item  }}
				</div>
				<div class="col-md-12 text-center">
				  <table class="table table-striped">
				 	 <tbody>
				 	 	//Element,Price,Brand-Expire, Category-User_Count,Style-Tool,Work-JoinUsers
							<tr>
							    <td class="row size12">{{ trans('sovpal.Element') }}</td>
							    <td class="pull-right size18 bold">{{ trans('tags.'.$data->element->name) }}</td>
							</tr>

							<tr>
							    <td class="row size12">{{ trans('sovpal.Price') }}</td>
							    <td class="pull-right size18 bold">{{ $data->price . trans('sovpal.$') }}</td>
							</tr>

				 	         <tr>
				 	             <td class="row size12">{{ item ? trans('sovpal.Category') : trans('sovpal.UserCount')}}</td>
				 	             <td class="pull-right size18 bold">{{ item ? trans('tags.'.$data->getTag('category') : $data->user_need) }}</td>
				 	         </tr>

				 	         <tr>
				 	             <td class="row size12">{{ item ? trans('sovpal.Brand') : trans('sovpal.Expire') }}</td>
				 	             <td class="pull-right size18 bold">{{ item ? trans('tags.'.$data->getTag('brand') : $data->expire) }}</td>
				 	         </tr>

			 		 		<tr>
			 		 		    <td class="row size12">{{ $data->type == 'item' ? trans('sovpal.Style') : trans('sovpal.Tool') }}</td>
			 		 		    <td class="pull-right size18 bold">{{ $data->type == 'item' ? trans('tags.'.$data->getTag('style')) : trans('tags.'.$data->getTag('tool')) }}</td>
			 		 		</tr>
				 	 	
				 	 		<tr>
				 	 		    <td class="row size12">{{ item ? trans('sovpal.Work') : trans('sovpal.JoinUsers')}}</td>
				 	 		    <td class="pull-right size18 bold">{{ item ? trans('tags.'.$data->getTag('work')) : $data->user_count}}</td>
				 	 		</tr>	
				 		</tbody>
				 </table> 
			</div>
			    @if($currentUser->id == $data->user_id)
			         <div class="col-md-12 text-center full_green_label">
			            <span class="size16 white_c">{{ trans('sovpal.MyItem') : trans('sovpal.MyGroup')}}</span>
			        </div>
			    @elseif(!$data->checkAdd($currentUser))
			    @elseif(!$data->checkJoin($currentUser))
			         <div class="col-md-offset-4 col-md-4 text-center">
			         @include('layout.forms._basic.default',['model' => 'action','method' => $item ? 'add' : 'join','type'=>'modal','modal_data'=>null])
			            <a type="button" class="btn red_c" data-toggle="modal" data-target="#{{ $item ? 'action_add_modal' : 'action_join_modal' }}">
			             {{ trans('sovpal.AddItem') : trans('sovpal.JoinGroup') }}<i class="fa fa-cart-plus fa-lg"></i>
			            </a>
			        </div>
			    @else
			        <div class="col-md-12 text-center full_red_label">
			            <span class="size16 white_c">{{ trans('sovpal.AlreadyAdd') : trans('sovpal.AlreadyJoined') }}</span>
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

			 <h4 class="size18 text-center">{{ item ? trans('sovpal.Groups') : trans('sovpal.Members') }} :</h4>
			 <p class="size12 text-center">{{ item ? trans('sovpal.GroupList') : trans('sovpal.UserList') }}</p>
			 <br>

			<div id="rooms" class="row">
			    <div class="room_list">
				    <table class="table table-striped">
				        <!-- @if(isset($data['items'])) -->
				        @if(!$data['items']->isEmpty())
			    			@include('layout.lists.groups')
			    			@include('layout.lists.users')  	
						@else
							@include('layout.forms.ajax.empty_profile',['modal_data'=>null])
						@endif
					</table>
				</div>
			</div>
			<p class="size12 lh16 text-center">{{ trans('sovpal.One_Help') }}</p>
        </div>    

<!-- footer -->

    	<div class="col-xs-4 col-md-4 btn btn-white btn-large">
    		{{ link($currentRoute,[ $data->type => $data->getPrevious()],'<i class="fa fa-angle-double-left fa-lg"></i>','Previous') }}
    	</div>	
    	<div class="col-xs-push-4 col-xs-4 col-md-4 btn btn-white btn-large">
    		{{ link($currentRoute,[ $data->type => $data->getNext()],'<i class="fa fa-angle-double-right fa-lg"></i>','Next') }}
    	</div>
	</div>

<div class="hidden-sm hidden-xs col-md-2">
	@include('layout.blogs')
</div>

@endsection