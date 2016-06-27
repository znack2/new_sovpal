<div class="hidden-xs col-sm-3 col-md-offset-1 col-md-2">
   <div class="text-center">
     <span class="text">{{ trans('sovpal.LastLogin') }} : </span><br>
        {{ $data->getRecent('last_login') }}
     <div class="cc-selector">
       @if($currentUser->id == $data->id)
           @include('layout.forms.ajax.avatar',['modal_data'=>$data])
       @else
             <img src="{{ url('assets/images/users/'.$data->getImage('avatar')) }}" class="avatar img-circle" 
             alt="{{ $data->getImage('avatar',true) }}" width="100" height="100">
       @endif
     </div>

     <div class="profile-usertitle">
        <div class="text bold">{{ $data->id != $currentUser->id ? $data->first_name : trans('sovpal.MyProfile')}}</div>
        <div class="minitext bold">{{ $data->type }}</div>
     </div>
   </div>

    <div class="visible-sm col-sm-12">
        @include('layout.blogs')
    </div>
 </div>

