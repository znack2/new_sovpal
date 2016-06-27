@foreach($room['elements'] as $element)
 <tr>
     <td>
         <div class="profile_button">
           <img src="{{ asset('assets/images/elements/'.$element->getImage('element')) }}" 
           class="button_image img-responsive" width="35px">
         </div>
     </td>
     <td  style="padding-top: 30px;"><span class="maintext">{{ trans('tags.'.$element->name) }}</span></td>
     <td class="text-center" style="padding-top: 30px;">
         @if($currentUser->id == $data->id)
         	  @include('layout.buttons.remove_element') 
         @endif
     </td>
 </tr>
@endforeach

@if($currentUser->id == $data->id)
  @include('layout.buttons.create_element',['element'=>null])
@endif


{{-- <tr>
    <td colspan="5" class="text-center">
        @if(count($room['elements'])>1)
          @include('layout.pagination',['paginator' => $room['elements']->appends(
          ['page'=>Request::input('page'),'type'=>Request::input('type'),'direction'=>Request::input('direction'),'sortBy'=>Request::input('sortBy')])])
        @endif
    </td>
</tr> --}}

