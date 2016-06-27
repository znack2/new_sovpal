<div class="hidden-xs col-sm-3 col-md-offset-1 col-md-2">   
	<div class="text-center">
		<div class="size16 bold">
			@if($currentUser->id == $data->user->id)
				<span class="green_c"> {{ class_basename($data) == 'Group' ? trans('sovpal.MyGroup') : trans('sovpal.MyItem') }} </span>
			@else
				<span>{{ trans('sovpal.Shop') .':'. str_limit($data->user->first_name,10)}}</span>
			@endif
		</div>

		<a href="{{ route('profile',['user'=>$data->user->slug,'section'=>'items','type'=>$data->type.'s']) }}">
		       <img src="{{ url('assets/images/users/'.$data->user->getImage('avatar')) }}" 
		       class="avatar img-circle" alt="avatar_{{ $data->user->first_name }}" width="100" height="100"></a>

		@if($data->type == 'Item')
			   <div class="profile-usertitle">
			       <ul>
				       <li><span class="bold">{{ trans('sovpal.Element') }} : </span>
				       <span>{{ trans('tags.'.$data->element->name) }}</span></li>

				       <li><span class="bold" >{{ trans('sovpal.Price') }} :</span>
				       <span>{{ $data->default_price . trans('sovpal.$') }}</span></li>

				       @foreach($data->tags() as $category=>$tag)
				       		<li><span class="bold" >{{ trans('tags.'.$category) }} :</span>
				       		<span>{{ trans('tags.'.$tag->name) }}</span></li>
				       @endforeach
			       </ul>
			   </div>
		@endif
	</div>

	<div class="visible-sm col-sm-12">
	    @include('layout.blogs')
	</div> 
</div> 



