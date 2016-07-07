
@foreach($data['items'] as $user)
     <tr class="{{ checkCurrentUser($user->id,'my_group')}}">
         <td class="col-sm-2">
         <div class="profile_button">{{ link(route('profile',['user'=>$data->id]),image($user), 'Details')}} </div>
         </td>
         <td style="line-height: 55px">
             <span class="size16" >
                {{ link(route('profile',['user'=>$data->id]),null , $user->first_name.' '.$user->last_name)}} 
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
          ['page'=>Request::input('page'),
          'type'=>Request::input('type'),
          'direction'=>Request::input('direction'),
          'sortBy'=>Request::input('sortBy')])])
          </td>
      </tr>
@endif

