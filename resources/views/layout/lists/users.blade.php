
@foreach($data['items'] as $user)
     <tr class="{{ $currentUser->id == $user->id ? 'my_group' : '' }}">
         <td class="col-sm-2">
             <a class="link" href="{{ route('profile',['user'=>$data->id]) }}">
                 <div class="profile_button">
                   <img src="{{ asset('assets/images/users/'.$user->getImage('avatar')) }}" 
                   class="button_image img-responsive" width="50px";height:50px;>
                 </div>
             </a>
         </td>
         <td style="line-height: 55px">
             <span class="size16" >
                <a class="link" href="{{ route('profile',['user'=>$data->id]) }}" >
                {{ $user->first_name.' '.$user->last_name }}</a>
             </span>
             <br>
         </td>
         <td class="text-center" style="float: right;">
             @if($currentUser->id == $user->id)
                  @include('layout.buttons.join',['remove'=>'true'])
             @else
                <div class="text-center group_number ">
                    <span class="dark_grey size22"></span>
                    <span class="text light_grey size14">{{ $data->WhenjoinGroup($user->id) }}</span>
                </div>
             @endif
          </td>
     </tr>
@endforeach

@if(!$data->checkJoin($currentUser))
        @include('layout.buttons.join')
@endif

@if(count($data['items'])>1)
    <tr>
        <td colspan="5" class="text-center">
          @include('layout.pagination',['paginator' => $data['items']->appends(
          ['page'=>Request::input('page'),'type'=>Request::input('type'),'direction'=>Request::input('direction'),'sortBy'=>Request::input('sortBy')])])
          </td>
      </tr>
@endif

