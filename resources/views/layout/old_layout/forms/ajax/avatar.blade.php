 <form class="text-center" action="{{ route('avatar.change',['user' => $currentUser->id]) }}" 
 method="POST" accept-charset="UTF-8" enctype="multipart/form-data">

 	{!! csrf_field() !!}

<style>
.hover_icon
{
position: absolute;
left:115px;
top:110px;
opacity: 0;
}
.hover_icon:hover
{
position: absolute;
opacity: 0.8;
}
</style>

	  <label class="drinkcard-cc avatar_image" for="avatar_image" >
	  	<img src="{{ url('assets/images/users/'.$data->getImage('avatar')) }}" class="avatar img-circle" 
	  	style="cursor: pointer;" alt="{{ $data->getImage('avatar',true) }}" width="100" height="100" />
	  	<h4 class="hover_icon">{{ trans('sovpal.Upload') }}</h4>
		  <input id="avatar_image" class="field" name="avatar_image" type="file" style="display:none;" onchange="this.form.submit()">
	  </label>

	  {{$errors->first('avatar_image' ,'<li class="error">:message</li>')}}
 </form>



